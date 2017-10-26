<?php
namespace Admin\Controller;
use Think\Controller;
class ColorsController extends Controller {

    public function index(){
    	$goods = M('colors');
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
        $colors = M('colors');
		$data = I('post.');

		if($_FILES['rgbimg']['error'] === 0){ //如果图片上传
    		$pic = $this->upload();
    		$data['rgbimg'] = $pic['smimg'];
    	}

        if($colors->create($data)){
            $res = $colors->add();
            if($res){
                $this->success('颜色信息添加成功',U('Colors/index'));
            }else{
                $this->error('颜色信息添加失败',U('Colors/index'));
            }
        }
    }


    //编辑商品信息
    public function edit(){
    	
        $colors = M('colors');
    	//获取商品的分类信息,根据proPath排序
    	
        $colorId = I('get.colorId');
        $colorsData = $colors->where('colorId='.$colorId)->find();

        $this->assign('colorsData',$colorsData);
    	$this->display();
    }


    function edit_doit(){
        $colors = M('colors');     
        $data = I('post.');

        if($_FILES['rgbimg']['error'] === 0){ //如果图片上传
    		$pic = $this->upload();
    		$data['rgbimg'] = $pic['smimg'];
    	}
    	
        $res = $colors->save($data);
        // echo $colors->getLastSql();
        // return;

        if($res === 0){
            $this->error('颜色信息更新失败~未修改任何值',U('Colors/index'));
        }else if($res !== false){
            $this->success('颜色信息更新成功',U('Colors/index'));
        }else{
            $this->error('颜色信息更新失败',U('Colors/index'));
        }
    }

    protected function upload($url){ //上传图片，如果有传递$url参数的话就删除对应的图片
    	$upload = new \Think\Upload(); //实例化tp的上传类
    	$upload->exts = array('jpg','gif','png','jpeg'); //设置附件上传类型
    	$upload->rootPath = './Public/Uploads/'; //相对于站点根目录jd
    	$upload->savePath = ''; //设置附件上传目录,地址是相对于根目录(rootPath的)

    	$info = $upload->upload(); //开始上传
    	if(!$info){
    		$this->error($upload->getError());
    	}else{
    		foreach($info as $v) {
    			$pic['file'] = $v['savepath'].$v['savename']; //获取文件名
    			$pic['smimg'] = $v['savepath'].'sm_'.$v['savename']; //获取缩略图的文件名
    			$pic['img'] = $upload->rootPath.$v['savepath'].$v['savename']; //获取完整的图片地址
    			$image = new \Think\Image(); // 利用tp的图片处理类对上传的图片进行处理
    			$image->open($pic['img']);
    			
    			$image->thumb(50, 50)->save($upload->rootPath.$v['savepath'].'xs_'.$v[savename]); //根据网站需要生成50*50的缩略图
    			$image->thumb(160, 160)->save($upload->rootPath.$v['savepath'].'sm_'.$v[savename]); //生成160*160的缩略图
    			return $pic; //返回相关信息数组
    	}
    }
  }

    //删除品牌数据
    function delete(){
        $colors = M('colors');
        $cid = I('get.colorId');
        $res = $colors->delete($cid);
        if($res){
            $this->success('颜色信息删除成功',U('Colors/index'));
        }else{
            $this->error('颜色信息删除失败',U('Colors/index'));
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
