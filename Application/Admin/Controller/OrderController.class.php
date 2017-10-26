<?php
/*
	*后台订单管理页
*/
namespace Admin\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class OrderController extends CommonController {

	/*访问权限*/
    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(6);
        if($access!==0){
            $this->error('权限不够');
        }
    }


	//查询所有的订单
	public function orderAll() {

		//实例化订单表对象
		$order = M('Orders');
		
		//查询所有订单
		$list = $order
			->join('__USERS__ on __USERS__.userId = __ORDERS__.userId')
			->select();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('Order/order');
	}


	//修改订单展示
	public function updateOrder() {

		//接收参数
		$data = I('param.');

		//实力化订单表
		$orders = M('Orders');

		//查询
		$list = $orders
		->where($data)
		->field('jd_orders.*,jd_users.uname')
		->join('__USERS__ on __USERS__.userId = __ORDERS__.userId')
		->find();

		//分配变量
		$this->assign('list',$list);

		//加载模板
		$this->display('editOrder');

	}


	//修改订单状态
	public function orderUpdate() {

		//获取提交的数据
		$data = I('param.');
		
		//实例化订单表对象
		$order = M('Orders');

		//根据条件保存修改的数据
		$result = $order->save($data);

		//判断是否修改成功
		if($result !== false) {

			//重新定向查询订单方法
			$this->success('修改成功',U('Order/orderAll'));
		}else{

			//失败跳转
			$this->error('修改失败');
		}
	}


	//查询订单详情
	public function detail() {

		//获取提交的数据
		$data = I('param.');

		//实例化订单详情表对象
		$detail = M('Details');

		//统计总价
		$total = $detail
			->where('jd_details.orderId='.$data['orderId'])
			->join('__ORDERS__ on __DETAILS__.orderId = __ORDERS__.orderId')
			->field('SUM(amount*price) as tsum')
			->select();

		//多表查询	
		$list = $detail
			->where('jd_details.orderId='.$data['orderId'])
			->field('jd_details.*,jd_details.price as p,jd_details.amount as a,jd_orders.*,jd_prods.*,jd_products.*,jd_users.uname')
			->join('__PRODUCTS__ on __DETAILS__.productId = __PRODUCTS__.productId')
			->join('__PRODS__ on __PRODS__.prodId = __PRODUCTS__.prodId')
			->join('__ORDERS__ on __DETAILS__.orderId = __ORDERS__.orderId')
			->join('__USERS__ on __ORDERS__.userId = __USERS__.userId')
			->select();


		//分配变量
		$this->assign('list',$list);
		$this->assign('total',$total);

		//加载模板
		$this->display('Order/detail');
	}





}