<?php
/*
	*后台广告管理页
*/
namespace Admin\Controller;
use Think\Controller;
class AdvanceController extends CommonController {
	
	/*访问权限*/
    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(7);
        if($access!==0){
            $this->error('权限不够');
        }
    }

	//浏览广告
	public function advance() {

		//实例化广告表对象
		$advance = M('Advances');

		//查询所有的数据
		$list = $advance->select();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('Advance/advance');

	}

	//展示添加广告页
	public function advanceAdd() {

		//加载模板
		$this->display('Advance/advanceAdd');

	}


	//展示修改广告页
	public function advanceEdit() {

		//获取变量
		$data = I('param.');

		//实例化广告表
		$advance = M('Advances');

		//查询
		$list = $advance->where($data)->find();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('Advance/advanceEdit');
	}


	//添加
	public function advanceInsert() {

		//获取变量
		$data = $_POST;
		$data['addtime'] = time();
		$img = $this->upFile();
		$data['img'] = $img[1];

		//实例化广告表对象
		$advance = M('Advances');

		//添加数据
		$result = $advance->data($data)->add();
		
		//判断是否添加成功
		if(!$result) {
			$this->error('添加广告失败');
		}else{
			$this->success('添加成功',U('Advance/advance'));
		}	
	}


	//修改
	public function advanceUpdate() {

		//实例化广告表对象
		$advance = M('Advances');

		//获取变量
		$data = I('param.');

		//判断有修改图片
		if($_FILES['photo']['error'] != 4) {

			//上传并获取名
			$img = $this->upFile();
			$data['img'] = $img[1];

			//获取原图
			$old = $advance->where($data['advanceId'])->getField('img');
		
			if($old) {

				//删除旧图片
				unlink('./Public/Uploads/Advance/'.$old);
				unlink('./Public/Uploads/Advance/m_'.$old);
				unlink('./Public/Uploads/Advance/one_'.$old);
				unlink('./Public/Uploads/Advance/two_'.$old);
			}

		}

		//修改数据
		$result = $advance->data($data)->save();
		//判断是否添加成功
		if(!$result) {
			$this->error('修改失败');
		}else{
			$this->success('修改成功',U('Advance/advance'));
		}

	}


	public function advanceDel() {

		//实例化表对象
		$advance = M('Advances');

		//获取数据
		$data = I('param.advanceId');

		//获取老图片
		$old = $advance->where('advanceId='.$data)->getField('img');

		//根据条件删除
		$del = $advance->where('advanceId='.$data)->delete();

		//判断是否删除成功
		if($del) {

			//删除图片
			unlink('./Public/Uploads/Advance/'.$old);
			unlink('./Public/Uploads/Advance/m_'.$old);
			unlink('./Public/Uploads/Advance/one_'.$old);
			unlink('./Public/Uploads/Advance/two_'.$old);

			$this->success('删除成功',U('Advance/advance'));
		}else{
			$this->error('删除失败',U('Advance/advance'));
		}
	}


	//上传文件
	public function upFile() {

		//实例化上传类
		$upload = new \Think\Upload();

		//设置上传大小
		$upload->maxSize = 3145728;

		//设置上传类型
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');

		// 设置上传目录
		$upload->rootPath = './Public/';
		$upload->savePath  = './Uploads/Advance/';
		$upload->autoSub = false;
		//var_dump($upload);
	
		//设置保存的文件名
		$upload->saveName = 'time';

		//上传文件
		$info = $upload->upload();

		if(!$info) {

			//上传失败
			$this->error($upload->getError());

		}else{

			//上传成功
			//图片处理
			$image = new \Think\Image();
			$image->open('./Public/'.$info['photo']['savepath'].$info['photo']['savename']);
			
			$image->thumb(150, 150)->save('./Public/'.$info['photo']['savepath'].'m_'.$info['photo']['savename']);
			
			/*
			//二级页面
			$image->thumb(766, 240,\Think\Image::IMAGE_THUMB_FIXED)->save('./Public/'.$info['photo']['savepath'].'two_'.$info['photo']['savename']);
			
			//首页
			$image->thumb(670)->save('./Public/'.$info['photo']['savepath'].'one_'.$info['photo']['savename']);
			*/
			
			//返回上传的文件名
			$imgname = array();
			$imgname[] = $info['photo']['savepath'];
			$imgname[] = $info['photo']['savename'];
			return $imgname;	
		}

	}



	
}