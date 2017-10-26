<?php
namespace Admin\Controller;
use Think\Controller;
class BrandsController extends Controller {

    public function index(){
    	$goods = M('brands');
        $count = $goods->count(); //查询满足条件的总记录数
        $page = new \Think\Page($count,10);
        $show = $page->show(); //分页显示输出
        $data = $goods
            ->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('page',$show);
    	$this->assign('data', $data);
       	$this->display();
    }


    //添加商品
    public function add(){

     //    $types = M('protype');
     //    $typesData = $types->order('proPath')->select();
     //    $options = '';
     //    foreach ($typesData as $key => $v) {
     //        $options .= '<option value="'.$v['proTypeId'].'">'.$v['proName'].'</option>';
     //    }

    	// $this->assign('options',$options);
    	$this->display();
    }

    //品牌添加处理函数
    function add_doit(){
		$data = I('post.');
        $brands = M('brands');
        if($brands->create($data)){
            $res = $brands->add();
            if($res){
                $this->success('品牌添加成功',U('Brands/index'));
            }else{
                $this->error('品牌添加失败',U('Brands/index'));
            }
        }

    }


    //编辑商品信息
    public function edit(){
        $brands = M('brands');
    	//获取商品的分类信息,根据proPath排序
    	
        $brandId = I('get.brandId');
        $brandsData = $brands->where('brandId='.$brandId)->find();

        $this->assign('brandsData',$brandsData);
        
    	$this->display();
    }


    function edit_doit(){
        $brands = M('brands');
    	$data = I('post.');
    	$bid = I('brandId');
        $res = $brands->save($data);
        if($res === 0){
            $this->error('更新失败~未修改任何值',U('Brands/index'));
        }else if($res !== false){
            $this->success('品牌更新成功',U('Brands/index'));
        }else{
            $this->error('品牌更新失败',U('Brands/index'));
        }
    }


    //删除品牌数据
    function delete(){
        $brands = M('brands');
        $bid = I('get.brandId');
        $res = $brands->delete($bid);
        if($res){
            $this->success('品牌删除成功',U('Brands/index'));
        }else{
            $this->error('品牌删除失败',U('Brands/index'));
        }
    }

    //递归获取分类信息
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

   	//根据传入的数组生成对应的option
    private function option($r, $id){
    	//如果有传cateid，则当前的分类为选中状态
	   	$cateid = $_GET['cateid'] ? $_GET['cateid'] : 0; 
	   	$disabled = '';	//判断分类是否需要禁用(如果当前分类下面还有子分类，那么在商品的时候，该分类就应该隐藏，因为非最终目录下面是不能够有商品的)
	   	$selected = ''; // 判断分类是否选中
	   	$options = '';

	   	//可以改进的地方，遍历出最后一层的分类后展示出来，其余的都disabled(只有有子类的分类都disabled掉)
	   	foreach($r as $v){
	   		if($v['proTypeId'] == $id){
	   			$selected = 'selected';
	   		}
	   		$options .= '<option value="'.$v['proTypeId'].'" '.$selected.' disabled>'.$v['proName'].'</option>';
	   			$selected = '';

	   			if($v['child']){
	   				foreach ($v['child'] as $v2) {
	   					if($v2['proTypeId'] == $id){
	   						$selected = "selected";
	   					}

	   					$options.= '<option value="'.$v2['proTypeId'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;'.$v2['proName'].'</option>';
	   					$selected = '';
	   			}
	   		}
	   	}
	   	return $options;
   }
   

    private function order($data, $parentid=0) {
		static $arr = array();
		foreach($data as $volist) {
			if($volist['parentid'] == $parentid) { // 得到所有的一级分类
				$arr[] = $volist;
				// 继续调用当前方法  - 递归函数
				$this->order($data, $volist['id']);
			}
		}
		return $arr;
	}


	private function order2($data, $parentid=0) {
		$arr = array();
		foreach($data as $volist) {
			if($volist['parentid'] == $parentid) { // 得到所有的一级分类
				$volist['child'] = $this->order2($data, $volist['id']);
				$arr[] = $volist;
				// 继续调用当前方法  - 递归函数
			}
		}
		return $arr;
	}
}
