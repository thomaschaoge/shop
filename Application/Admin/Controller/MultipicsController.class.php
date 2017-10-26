<?php
	namespace Admin\Controller;
	use Think\Controller;

	class MultipicsController extends Controller {

		//多图片上传
		public function index(){
			$multipics  = M('prodimg');
			$color = M('colors');
      $pid = I('get.prodId');
      if(!empty($pid)){
        $where['prodId'] = $pid;
      }
      
			
			
			$count = $multipics->where($where)->count();
			$page = new \Think\Page($count,10);
			$show = $page->show();
			$colorData = $color->select();
			$data = $multipics->where($where)->limit($page->firstRow.','.$page->listRows)->select();

			$colorArr = array();
			foreach ($colorData as $k => $v) {
				$colorArr[$v['colorId']] = $v['colorName'];
			}
			
			$this->assign('show',$show);
			$this->assign('colorArr',$colorArr);
			$this->assign('data',$data);
			$this->display();
		}

		public function add(){
			$gid = I('get.gid'); //先随便给他付一个值
			$colors = M('colors');
			$colorsData = $colors->field('')->select();
			$colorsOption = '';

			foreach ($colorsData as $k => $v) {
				$colorsOption .= '<option value="'.$v['colorId'].'">'.$v['colorName'].'</option>';
			}
			
			$this->assign('colorsOption',$colorsOption);
			$this->assign('gid',$gid);
			$this->display();
		}

		//多图片添加处理函数,因为每张图片还要和自己的图片颜色关联起来，所以每次只能上传一张，解决方法可以改变设置的前后的顺序，先上传图片后设置图片的颜色属性
		public function add_doit(){
			$multipics = M('prodimg');
			$data = I('post.');

			if($_FILES['image']['error'] === 0){ //如果图片上传
	    		$pic = $this->upload();
	    		$data['image'] = $pic['smimg'];
    		}

    		if($multipics->create($data)){
    			$res = $multipics->add();

    			if($res){
    				$this->success('图片添加成功',U('Multipics/index'));
    			}else{
    				$this->error('图片添加失败',U('Multipics/index'));
    			}
    		}

		}

    function multiupload(){
        $prodImg = M('prodimg');
        $upload = new \Think\Upload(); //实例化tp的上传类
        $upload->exts = array('jpg','gif','png','jpeg'); //设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; //相对于站点根目录jd
        $upload->savePath = ''; //设置附件上传目录,地址是相对于根目录(rootPath的)
        //定义空数组，用于存储上传的图片地址
        $datalist = array();

        $info = $upload->upload(); //开始上传
        if(!$info){
          $this->error($upload->getError());
        }else{
          foreach($info as $v) {
            $datalist['prodId'] = I('prodId'); //商品id
            $datalist['colorId'] = I('colorId'); //颜色id
            
            $pic['file'] = $v['savepath'].$v['savename']; //获取文件名
            $pic['smimg'] = $v['savepath'].'sm_'.$v['savename']; //获取缩略图的文件名
            $pic['img'] = $upload->rootPath.$v['savepath'].$v['savename']; //

            $datalist['image'] = $pic['file'];

            //商品id获取完整的图片地址
            $image = new \Think\Image(); // 利用tp的图片处理类对上传的图片进行处理
            $image->open($pic['img']);
            
            $image->thumb(50, 50)->save($upload->rootPath.$v['savepath'].'xs_'.$v['savename']); //根据网站需要生成50*50的缩略图
            $image->thumb(160, 160)->save($upload->rootPath.$v['savepath'].'sm_'.$v['savename']); //生成160*160的缩略图
            if($prodImg->create($datalist)){
                $res = $prodImg->add();
              if($res){
                echo "1";
              }else{
                echo "0";
              }
            }
        }
      }
      

    }

		//上传函数
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

  	function edit(){
  		$cid = I('get.cid');
  		$multipics = M('prodimg');
  		$colors = M('colors')->select();
  		$pics = $multipics->find($cid);

  		$colorId = $pcis['colorId'];
  		$colorOption = '';
  		foreach ($colors as $k => $v) {
  			$selected = '';
  			if($colorId == $v['colorId']){
  				$selected = "selected";
  			}
  			$colorOption .= '<option value="'.$v['colorId'].'" '.$selected.'>'.$v['colorName'].'</option>';
  		}

  		$this->assign('colorOption',$colorOption);
  		$this->assign('pics',$pics);
  		$this->display();
  	}


  	function edit_doit(){
  		$pics = M('prodimg');
  		$data = I('post.');
  		
  		if($_FILES['image']['error'] === 0){ //如果图片上传
	    		$pic = $this->upload();
	    		$data['image'] = $pic['smimg'];
    	}

    	if($pics->create($data)){
    		$res = $pics->save();
    		if($res){
    			$this->success('更新成功',U('Multipics/index'));
    		}else{
    			$this->error('更新失败',U('Multipics/index'));
    		}
    	}
  	}

  	function delete(){
  		$pics = M('prodimg');
  		$cid = I('get.cid');
  		$res = $pics->delete($cid);
  		if($res){
  			$this->success('删除成功',U('Multipics/index'));
  		}else{
  			$this->error('删除失败',U('Multipics/index'));
  		}
  	}
}