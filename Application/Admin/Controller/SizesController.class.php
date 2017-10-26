<?php
namespace Admin\Controller;
use Think\Controller;
class SizesController extends Controller {

    public function index(){
    	$goods = M('sizes');
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

        $types = M('protype');
        $typesData = $types->order('proPath')->select();
        $options = '';
        foreach ($typesData as $key => $v) {
            $options .= '<option value="'.$v['proTypeId'].'">'.$v['proName'].'</option>';
        }

    	$this->assign('options',$options);
    	$this->display();
    }

    //品牌添加处理函数
    function add_doit(){
        $sizes = M('sizes');
		$data = I('post.');

        if($sizes->create($data)){
            $res = $sizes->add();
            if($res){
                $this->success('尺寸添加成功',U('sizes/index'));
            }else{
                $this->error('尺寸添加失败',U('sizes/index'));
            }
        }

    }


    //编辑商品信息
    public function edit(){
    	$type = M('protype');
        $sizes = M('sizes');
    	//获取商品的分类信息,根据proPath排序
    	$cate = $type->order('proPath')->select(); //二维数组
        $sizeId = I('get.sizeId');
        $brandsData = $sizes->where('sizeId='.$sizeId)->find();

        $cateId = $brandsData['proTypeId'];
    	$cateData = $this->demo($cate);
    	$cateOptions = $this->option($cateData,$cateId);
        
        $this->assign('brandsData',$brandsData);
        $this->assign('cateOptions',$cateOptions);
    	$this->display();
    }


    function edit_doit(){
        $sizes = M('sizes');     
        $data = I('post.');

        $res = $sizes->save($data);

        if($res === 0){
            $this->error('更新失败~未修改任何值',U('Sizes/index'));
        }else if($res !== false){
            $this->success('尺寸更新成功',U('Sizes/index'));
        }else{
            $this->error('尺寸更新失败',U('Sizes/index'));
        }
    }


    //删除品牌数据
    function delete(){
        $sizes = M('sizes');
        $bid = I('get.sizeId');
        $res = $sizes->delete($bid);
        if($res){
            $this->success('尺寸删除成功',U('Sizes/index'));
        }else{
            $this->error('尺寸删除失败',U('Sizes/index'));
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
