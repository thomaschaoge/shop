<?php
namespace Admin\Controller;
use Think\Controller;
// 继承公共的控制器
class CateController extends CommonController {

   public function _initialize(){
       parent::_initialize();
       $access=\Home\Common\checkpower(9);
       if($access!==0){
           $this->error('权限不够');
       }
      }

   public function index(){
   	$type = M('protype');
   	$data = $type->order('proPath')->select();
   	
   	$this->assign("data", $data);
   	$this->display();
   }


   public function add(){
   	$type = M('protype');
   	$data = $type->order('proPath')->select();

   	$r = $this->demo($data, 0);
   	$options = $this->option($r);

   	$this->assign('options',$options);
   	$this->display();
   }

   //启用相关栏目，如果启用底层栏目，也需要启用其直接的父级目录(如果被禁用的话)
   function active_doit(){
      $type = M('protype');
      $cateId = I('get.cateid'); //获取cateId
      $data['proTypeId'] = $cateId;
      $data['proLive'] = 1;
      if($type->create($data)){
         $res = $type->save();
         if($res){
            $pid = $type->where('proTypeId='.$cateId)->getField('proPid');
            $pstatus = $type->where('proTypeId='.$pid)->getField('proLive');
            if(!$pstatus){ //判断直接父级是否被禁用，如果禁用，则启用
               $data2['proLive'] = 1;
               $res2 = $type->where('proTypeId='.$pid)->save($data2);

               $ppid = $type->where('proTypeId='.$pid)->getField('proPid');
               $ppstatus = $type->where('proTypeId='.$ppid)->getField('proLive');
               if(!$ppstatus){   //判断第二层父级是否被禁用，如果禁用，则启用
                  $data3['proLive'] = 1;
                  $res3 = $type->where('proTypeId='.$ppid)->save($data3);
               }
            }

            $this->success('启用成功',U('Cate/index'));
         }else{
            $this->error('启用失败',U('Cate/index'));
         }
      }
   }

   //用来将导航按照需要生成我们想要的数据
   protected function demo($data, $pid=0){
   	$arr = array();
   	foreach($data as $v){
   		if($v['proPid'] == $pid){
   			$v['child'] = $this->demo($data, $v['proTypeId']);
   			$arr[] = $v;
   		}
   	}
   	return $arr;
   }

   function option($r){
   	$cateid = $_GET['cateid'] ? $_GET['cateid'] : 0;
   	$select = '';
   	$options = '<option value="0">根分类</option>';

   	foreach ($r as $v) {
   		//判断proTypeId是否和传过来的cateid相等
   		if($cateid==$v['proTypeId']){
   			$select = 'selected';
   		}
   		$options .= '<option value="'.$v['proTypeId'] . '" '.$select.'>&nbsp;&nbsp;'.$v['proName'].'</option>';
   		//再次清空select的值，不然如果第一次为selected，那么下一次也依然为selected
   		$select = '';
   		//如果其child数组不为空-->表示带有下级元素
   		//可以完善的地方，可以判断数组的长度，然后一直遍历到最后一层
   		if($v['child']){
   			foreach ($v['child'] as $vc) {
   				if($cateid==$vc['proTypeId']){
   					$select = "selected";
   				}
   			$options.= '<option value="'.$vc['proTypeId'].'" '.$select.'>&nbsp;&nbsp;&nbsp;&nbsp;'.$vc['proName'].'</option>';
   			//同样需要清空select的值
   			$select = "";
               if($vc['child']){
                  foreach ($vc['child'] as $vc2) {
                     if($cateid==$vc2['proTypeId']){
                        $select = "selected";
                     }
                  $options.= '<option value="'.$vc2['proTypeId'].'" '.$select.'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$vc2['proName'].'</option>';
                  //同样需要清空select的值
                  $select = "";
                  }
               }
   			}
   		}
   	}
   	return $options;
   }

   //添加分类
   public function add_doit(){
   		//获得传递过来的分类名称
   		//$type = M()->table('proType','jd_');
   		$type = M('protype');
   		
   		$data['proName'] = I('proName');
   		//如果不给父类id号的话，默认是0
   		$data['proPid'] = I('proPid')?I('proPid'):0;

   		//拼凑路径，如果父类id是0(说明是一级分类),那么路径就是插入的ID号(可以由count + 1)获得，如果有传递父类id，那路劲就是 父类proPath,本次插入的ID号(这里使用，作为分隔符),事实上，这是理想状态，即id号没有增加也没有删除
   		// $count = $type->count()+1;
   		// echo $type->getLastSql();
   		// $data['proPath'] = I('proPid') ? (I('proPid').','.$count.',') : ($count+',');
         if(!$data['proPid']){
            $shortcut = "0";
         }else{
            $shortcut = rtrim($type->find($data['proPid'])['proPath'],',');
         }

   		//第二种方法则是先插入部分数据，插入后然后获得插入的ID号，然后通过此ID号来跟新路径
   		// $r = $type->create($data)->add(); 最好的方法是使用事务
   		if($type->create($data)){
   			$r = $type->add();
   			if($r){
   				$id = $r;
   				echo $id;
   				echo $data['proPid'];
   				$path['proPath'] = $shortcut . "," . $r . ",";

   				if($type->create($path)){
   					$res =  $type->where("proTypeId = ".$id)->save();

   					if(false !== $res){
   						$this->success('新增成功','index');
   					}else{
   						$this->error('添加目录失败','index');
   					}
   				}
   				
   			}
   		}
   }


   //删除对应的分类
   //删除当前分类的时候，其子分类也需要删除(将它的proLive值设为0)
   function delete_doit(){
   	$type = M('protype');
      $cateId = I('cateid');
   	$data['proTypeId'] = $cateId;
      $data['proTypeId'] = $cateId;
      $data['proLive'] = 0;
   	$res = $type->save($data);
   	if($res){  //判断当前分类是否有子类，如果有的话就禁用其子类...
         $child = $type->where('proPid='.$cateId)->getField('proTypeId',true);
         if($child){
            $child = array_values($child);
            $data2['proTypeId'] = array('in',$child);
            $data2['proLive'] = 1;
            $map['proLive'] = 0;
            $res = $type->where($data2)->save($map);

            $sonmap['proPid'] = array('in',$child);
            $son = $type->where($sonmap)->getField('proTypeId',true);
            if($son){
               $son = array_values($son);
               $data3['proTypeId'] = array('in',$son);
               $data3['proLive'] = 1;
               $sondata['proLive'] = 0;
               $res = $type->where($data3)->save($sondata);
               // echo $type->getLastSql();
               // return;
            }
         }
   		$this->success('禁用成功',U('Cate/index'));
   	}else{
   		$this->error('禁用失败',U('Cate/index'));
   	}
   }


   //修改相应的分类
   //可以修改---父级名称、分类名称
   public function update(){
   	$type = M('protype');
   	$id = I('id');
   	$val = $type->find($id);
 	$data = $type->order('proPath')->select();

 	$r = $this->demo($data, 0);
 	$options = $this->option($r);

 	$this->assign('val',$val);
 	$this->assign('options',$options);
   	$this->display('update');
   }


   //修改分类
   function update_doit(){
   	$type = M('protype');
   	$data = $type->create();
   	if($data){
   		$res = $type->save($data);
   		if(false !==$res){
   			$this->success('更新成功',U('Cate/index'));
   		}else{
   			$this->error('更新失败',U('Cate/index'));
   		}
   	}
   }


}