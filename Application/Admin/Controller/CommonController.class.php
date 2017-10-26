<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	// 控制器初始化方法
	protected function _initialize() {
		if(empty($_SESSION['admin'])) {
			$this->error('您没有登录，或权限过期,请重新登录', __APP__.'/Index/index'); 
		}
	}
}