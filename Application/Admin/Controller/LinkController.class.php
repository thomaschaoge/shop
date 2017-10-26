<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
    
    /*访问权限*/
    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(8);
        if($access!==0){
            $this->error('权限不够');
        }
    }


	//查询所有友情链接
	public function link() {

		//实例化友情链接表
		$flink = M('Links');

		//查询
		$list = $flink->select();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('Link/link');
	}


	//友情链接添加页
	public function addLink() {

		//加载模板
		$this->display('Link/addLink');
	}


	//友情链接修改页
	public function editLink() {

		//实例化友情链接表
		$flink = M('Links');

		//获取提交信息
		$data = I('param.');
		
		//查询
		$list = $flink->where($data)->find();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('Link/editLink');
	}


	public function insertLink() {

		//实例化友情链接表
		$flink = M('Links');

		//获取提交信息
		$data = I('param.');

		//添加
		$link = $flink->data($data)->add();

		//判断是否成功
		if($link) {
			$this->success('添加成功',U('Link/link'),3);
		}else{
			$this->error('添加失败',U('Link/link'));
		}
	}


	//修改
	public function updateLink() {

		//实例化友情链接表
		$flink = M('Links');

		//获取提交信息
		$data = I('param.');

		//查询
		$list = $flink->data($data)->save();

		//判断
		if($list) {
			$this->redirect('Link/Link');
		}else{
			$this->error('修改失败',U('Link/editLink'));
		}

	}


	//删除
	public function delLink() {
		//实例化友情链接表
		$flink = M('Links');

		//获取提交信息
		$data = I('param.');

		//查询
		$list = $flink->where($data)->delete();

		//判断
		if($list) {
			$this->success('删除成功',U('Link/link'));
		}else{
			$this->error('删除失败',U('Link/link'));
		}

	}

}
