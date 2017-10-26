<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends CommonController {

    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(10);
        if($access!==0){
            $this->error('权限不够');
        }
    }
    
    public function index(){

    	$goods = M('prods');
        $prodName = I('prodName');
        $price1 = I('price1');
        $price2 = I('price2');

        if(!empty($prodName)){   //构造搜索条件
            $where['prodName'] = array('like','%'.$prodName.'%');
        }

        if((!empty($price1)) && (!empty($price2))){
            $where['price2'] = array('between',array($price1, $price2));
        }else if(!empty($price1)){
            $where['price2'] = array('gt',$price1);
        }else if(!empty($price2)){
            $where['price2'] = array('lt',$price2);
        }


        $count = $goods->
            join("jd_products on jd_prods.prodId = jd_products.prodId")
            ->where($where)
            ->count(); //查询满足条件的总记录数
        
        $page = new \Think\Page($count,10);
        $show = $page->show(); //分页显示输出
        $data = $goods
            ->join("INNER JOIN jd_products on jd_prods.prodId = jd_products.prodId")
            ->limit($page->firstRow.','.$page->listRows)
            ->where($where)
            ->select();
        
        $this->assign('page',$show);
    	$this->assign('data', $data);
       	$this->display();
    }


    //商品详情表
    function detail(){

        $goods = M('prods');
        $brands = M('brands');
        $sizesData = M('sizes');
        $sexsData = M('gendars');
        $gid = I('get.gid');

        $goodsData = $goods->where('jd_prods.prodId = '.$gid)
            ->join('INNER JOIN jd_products on jd_prods.prodId = jd_products.prodId')
            ->join('jd_colors on jd_products.colorId = jd_colors.colorId')
            ->join('jd_sizes on jd_products.sizeId = jd_sizes.sizeId')
            ->select();
        
        //这里是两种不同的遍历方式，一种是传统的通过数组的遍历来实现
        $sizes = $sizesData->getField('sizeId, sizeName');
        $sexs = $sexsData->getField('gendarId, gendarName');
        $brandsArr = $brands->getField('brandId, brandName');

        $this->assign('brandsArr',$brandsArr);
        $this->assign('goodData',$goodsData[0]);
        $this->assign('sizes',$sizes);
        $this->assign('sexs',$sexs);
        $this->display();
    }


    //添加商品
    public function add(){

    	$data = M('protype');
        $colors = M('colors');
        $sizes = M('sizes');
        $brands = M('brands');

        $colorsData = $colors->select();
    	$r = $data->order('proPath')->where('proLive=1')->select();
    	$r = $this->demo($r, 0);
    	$options = $this->option($r);
        $sizeArr = $sizes->getField('sizeId, sizeName');
        $brandsArr = $brands->getField('brandId, brandName');

        //拼凑color前端页面代码
        $colorOptions = '';
        foreach ($colorsData as $v) {
            $colorOptions .= '<li><input type="radio" name="colorId" value="'.$v['colorId'].'"> <label>'.$v['colorName'].'</label></li>';
        }

        //拼凑brands列表前端数据
        $brandOption = '<select name="brandId"><option value="0" disabled="" selected="selected">请选择：</option>';
        foreach ($brandsArr as $k => $v) {
            $brandOption .= '<option value="'.$k.'">'.$v.'</option>';
        }
        $brandOption .= "</select>";

        //拼凑尺寸size前端页面代码
        $sizeOption = '<select name="sizeId"><option value="0" disabled="" selected="selected">请选择：</option>';
        foreach ($sizeArr as $k => $v) {
            $sizeOption .= '<option value="'.$k.'">'.$v.'</option>';
        }
        $sizeOption .= "</select>";
        
        $this->assign('sizeArr',$sizeArr);
        $this->assign('sizeOption',$sizeOption);
        $this->assign('brandOption',$brandOption);
        $this->assign('colorOptions',$colorOptions);
    	$this->assign('options',$options);
    	$this->display();
    }


    //商品添加处理函数
    function add_doit(){

		//获取整个表单数据并赋值给$data
		$data = I('post.');
        $data['addtime'] = time();
		$data['price'] = I('price2');

        //上传图片
        $pic = $this->upload();
        if($pic){
            $data['img'] = $pic['ori'];
            $data['image'] = $pic['file'];
            $data['simimg'] = $pic['smimg'];
        }
		
		//需要同时把数据添加到几张表中去，tp中有简便的处理方法
		$prods = M('prods'); 
		$prodImg = M('prodimg');
		$products = M('products');

		if($prods->create($data)){
			//添加数据到prods中获得插入的id作为下次添加的源数据使用
			$res = $prods->add();
			if($res){
				$data['prodId'] = $res; //获取上次插入的id号

				if(($datares = $prodImg->create($data)) && $products->create($data)){
					$res = $prodImg->add();
					$res2 = $products->add();
					if($res && $res2){
						$this->success('数据添加成功',U('Goods/index'));
					}else{
						$this->error('数据添加失败',U('Goods/index'));
					}
				}
			}else{
				$this->error($prods->getError(), U('Goods/index'));
			}
		}

    }


    //编辑商品信息
    public function edit(){
    	$goods = M('prods');
        $products = M('products');
        $brands = M('brands');
    	$color = M('colors');
    	$sex = M('gendars');
    	$size = M('sizes');
    	$type = M('protype'); //用来获取相应的分类信息
    	$gid = I('gid');
    	$cateData = $products->where('prodId='.$gid)->find();
    	$cateId = $cateData['proTypeId']; //获取分类Id

    	$imgId = $goods->where('prodId='.$gid)->find()['img']; //商品原图


    	//获取商品的分类信息,根据proPath排序
    	$cate = $type->order('proPath')->select(); //二维数组
    	$cateData = $this->demo($cate);
    	$cateOptions = $this->option($cateData,$cateId);

    	//获取商品的所有关联信息(二维数组)并分配
    	$data = $goods->where('jd_prods.prodId = '.$gid)
    		->join('jd_products on jd_prods.prodId = jd_products.prodId')
            ->join("jd_protype on jd_products.proTypeId = jd_protype.proTypeId")
    		->select();
        
    	$colorData = $color->select();
    	$colorRadio = "";

		//遍历取得color列表 并输出
    	foreach ($colorData as $cols) {
    	 	$checked = '';
    	 	if($cols['colorId'] == $data[0]['colorId']){ //判断是否选中
    	 		$checked = "checked";
    	 	}
    	 	$colorRadio .= '<li><input type="radio" name="colorId" value="'.$cols['colorId'].'" '.$checked.'/><label>'.$cols['colorName'].'</label></li>';
    	 }

    	 //获取商品的所属性别并分配
    	$sexData = $sex->select();
    	$sexRadio = '';
    	foreach ($sexData as $v) {
    		$checked = '';
    		if($v['gendarId'] == $data[0]['gendarId']){
    			$checked = "checked";
    		}
    		$sexRadio .= '<li><input type="radio" name="gendarId" value="'.$v['gendarId'].'" '.$checked.'> <label>'.$v['gendarName'].'</label></li>';
            $checked = '';
    	}


    	//获取尺寸相关数据并分配
    	$sizeData = $size->select();
    	$sizeRadio = '<select name="sizeId">';
    	foreach ($sizeData as $v) {
    		$checked = '';
    		if($v['sizeId'] == $data[0]['sizeId']){
    			$selected = "selected";
    		}
    		$sizeRadio .= '<option value="'.$v['sizeId'].'" '.$selected.'>'.$v['sizeName'].'</option>';
            $selected = '';
    	}
        $sizeRadio .= "</select>";


        //获取品牌信息并分配
        $brandsData = $brands->select();
        $brandsOption = "<select name='brandId'>";
        foreach ($brandsData as $k => $v) {
            $selected = '';
            if($v['brandId'] == $data[0]['brandId']){   //判断当前元素是否被选中
                $selected = "selected";
            }
            $brandsOption .= '<option value="'.$v['brandId'].'" '.$selected.'>'.$v['brandName'].'</option>';
            $selected = '';
        }
    	$brandsOption .= '</select>';


    	//将产品id分配过去放入隐藏表单中
    	$this->assign('gid',$gid);
    	//将图片的地址分配到隐藏表单中..
    	$this->assign('img',$imgId);
    	$this->assign('cateOptions',$cateOptions);
        $this->assign('brandsOption',$brandsOption);
    	$this->assign("data",$data[0]);
    	$this->assign('colorRadio',$colorRadio);
    	$this->assign('sexRadio',$sexRadio);
    	$this->assign('sizeRadio',$sizeRadio);
    	$this->display();
    }


    function edit_doit(){

    	$data = I('post.');
    	$gid = I('prodId');    //隐藏域传递过来的商品id
    	$data['price'] = I('price2');
        $img_220 = I('post.oriimg');    //隐藏域传递过来的原图片地址
        $img_50 = str_replace('220_','50_',$img_220);
        $img_350 = str_replace('220_','350_',$img_220);
        $img_800 = str_replace('220_','800_',$img_220);
        $img_ori = str_replace('220_','',$img_220);
        

    	//这三个需要根据条件来判断，如果有重新上传图片，那么就删除旧的图片并重新生成新的图片并写入数据库，如果没有，则不更新proImg表
    	//判断图片是否上传以及如何处理
    	if($_FILES['img']['error'] === 0){ //如果图片上传
    		$pic = $this->upload();
    		$data['img'] = $pic['ori'];
    		$data['image'] = $pic['file'];
    		$data['simimg'] = $pic['smimg'];
    	}
       
       
    	//需要同时把数据添加到几张表中去，tp中有简便的处理方法
    	$prods = M('prods'); 
    	$prodImg = M('prodimg');
    	$products = M('products');
        $types = M('protype');

        $finalRes = false; //定义变量用于确定最终数据是否添加成功
        if($prods->create($data)){
            $res = $prods->where("prodId=".$gid)->save();
            if($res != false){
                $finalRes = ture;
            }
        }

        if($prodImg->create($data)){    //更新商品图片数据，如果上传成功并删除原图
            $res = $prodImg->where('prodId='.$gid)->save();
            if($res != false){
                $finalRes = ture;   //如果图片上传成功，则删除原来的图片
                unlink('./Public/Uploads/'.$img_220);
                unlink('./Public/Uploads/'.$img_50);
                unlink('./Public/Uploads/'.$img_350);
                unlink('./Public/Uploads/'.$img_800);
                unlink('./Public/Uploads/'.$img_ori);
            }
        }
        
        if($products->create($data)){   //更新商品信息
            $res = $products->where("prodId=".$gid)->save();
            if($res != false){
                $finalRes = ture;
            }
        }

        if($finalRes){  //根据最终的结果来判断数据是否更新成功
            $this->success('数据更新成功',U('Goods/index'));
        }else{
            $this->error('数据更新失败',U('Goods/index'));
        }
    }


    public function delete(){
        $goods = M('prods');
        $gid = I('get.gid');
        $res = $goods->delete($gid);
        if($res){
            $this->success('删除成功',U('Goods/index'));
        }else{
            $this->error('删除失败',U('Goods/index'));
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
                //ori是根据需要进行更改的
                $pic['ori'] = $v['savepath'].'220_'.$v['savename'];
    			$pic['smimg'] = $v['savepath'].'50_'.$v['savename']; //获取缩略图的文件名
    			$pic['img'] = $upload->rootPath.$v['savepath'].$v['savename']; //获取完整的图片地址

    			$image = new \Think\Image(); // 利用tp的图片处理类对上传的图片进行处理
    			$image->open($pic['img']);
    			
                $image->thumb(800, 800)->save($upload->rootPath.$v['savepath'].'800_'.$v[savename]);

                $image->thumb(350, 350)->save($upload->rootPath.$v['savepath'].'350_'.$v[savename]);

                 $image->thumb(220, 220)->save($upload->rootPath.$v['savepath'].'220_'.$v[savename]);

    			$image->thumb(50, 50)->save($upload->rootPath.$v['savepath'].'50_'.$v[savename]); 

    			return $pic; //返回相关信息数组
    	}
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
	   	$selected = ''; // 判断分类是否选中，如果被选中，其值为select，没有选中的话其值为空
	   	$options = '';  //用来存储我们要生成的option信息

	   	//通过遍历获得我们需要的格式组成的option
	   	foreach($r as $v){ //第一层的遍历
	   		if($v['proTypeId'] == $id){
	   			$selected = 'selected';
	   		}
	   		$options .= '<option value="'.$v['proTypeId'].'" '.$selected.' disabled>'.$v['proName'].'</option>';
	   		$selected = ''; //及时的将$selected的值清空，保证后面的状态

	   			if($v['child']){
	   				foreach ($v['child'] as $v2) { //第二层分类
	   					if($v2['proTypeId'] == $id){
	   						$selected = "selected";
	   					}
                        if($v2['child']){
                        //如果仍然有子级的话，就加上disabled
                            $options.= '<option value="'.$v2['proTypeId'].'" '.$selected.' disabled>&nbsp;&nbsp;&nbsp;&nbsp;'.$v2['proName'].'</option>';
                        $selected = '';

                        }else{ //如果没有子级的话
	   					$options.= '<option value="'.$v2['proTypeId'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;'.$v2['proName'].'</option>';
	   					$selected = '';
                        }
                            if($v2['child']){ //第三层分类
                                foreach ($v2['child'] as $v3) {
                                    if($v3['proTypeId'] == $id){
                                        $selected = "selected";
                                    }

                                    $options.= '<option value="'.$v3['proTypeId'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$v3['proName'].'</option>';
                                    $selected = '';
                            }
                        }
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


	function demo2() {
		$kinds = M('lamp86_shop.kinds','tb_');
		// 将表中所有的数据都查到
		$data = $kinds -> select();
		// 获取所有的一级分类
		$r=$this->order2($data);
		
		foreach($r as $v) {
			echo $v['name'].'<br>';
			foreach($v['child'] as $v1) {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$v1['name'].'<br>';
				foreach($v1['child'] as $v2) {
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$v2['name'].'<br>';
			
				}
			}
		}
		
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
