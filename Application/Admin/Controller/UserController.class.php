<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
     public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(4);
        if($access!==0){
            $this->error('权限不够');
        }
    }
    /*会员基本信息*/
    public function user(){
        header("content-type:text/html;charset=utf-8");
        $id = I('get.id');
        $aid = I('get.aid');
    	$order = M('orders');
        //获取购物次数
        $count = $order -> where('userId = '.$id) -> field('count(userId)') -> select();
        $num = $count[0]['count(userId)'];//购物次数
        //获取成长值        
        $o = $order -> table('jd_orders as O,jd_details as D')
                    -> where('O.orderId = D.orderId and O.userId = '.$id)
                    -> field('O.userId,O.orderId,O.receiver,D.productId,D.amount,D.price')
                    -> select();
        $total = 0;//购物总金额
        $cz = 0;//成长值
        foreach($o as $key => $v){
            $total += $v['amount'] * $v['price'];
            $cz += ceil($v['price']*$v['amount']*1.2);
        }
        $user = M('users');
        /*判定会员等级*/
        if($cz == 0){
            $data['userHYdjId'] = 0;
        }else if($cz < 2000){
            $data['userHYdjId'] = 1;
        }else if($cz < 10000){
            $data['userHYdjId'] = 2;
        }else if($cz < 30000){
            $data['userHYdjId'] = 3;
        }else if($cz >= 30000){
            $data['userHYdjId'] = 4;
        }
        /*判定会员购物行为等级*/
        if($num == 0){
            $data['userGWdjId'] = 0;
        }else if($num < 5){
            $data['userGWdjId'] = 1;
        }else if($num < 10){
            $data['userGWdjId'] = 2;
        }else if($num < 20){
            $data['userGWdjId'] = 3;
        }else if($num < 30){
            $data['userGWdjId'] = 4;
        }else if($num > 50){
            $data['userGWdjId'] = 0;
            if($data['userHYdjId'] < 5){
                $data['userHYdjId'] += 1;
            }else{
                $data['userHYdjId'] = 5;
            }
        }
        $data['userCZ'] = $cz;
        $data['userGCS'] = $num;
        $save = $user -> where('userId='.$id) -> save($data);//更新成长值和购物次数

        //查询会员信息
    	$r = $user 	->table('jd_users as U,jd_userhydj as UH') 
    				-> where('U.userHYdjId = UH.userHYdjId')
    				-> select();
    	//dump($r);exit;
    	$this -> assign("arr",$r);//分配到会员基本信息
        $db1 = M('orders');
        $r1 = $db1 -> where('jd_orders.userId = '.$id) 
                   -> join('left join jd_address ON jd_orders.userId = jd_address.userId')
                   -> join('left join jd_users ON jd_orders.userId = jd_users.userId')
                   -> group('jd_orders.orderId')
                    -> select();
        $this -> assign("arr1",$r1);//分配到会员收货信息查询
        $r2 = $user -> where('jd_users.userId = '.$aid)
        			-> join('left join jd_usergwxwdj ON jd_users.userGWdjId = jd_usergwxwdj.userGWdjId')
                    -> select();
        $str = null;
        foreach($r2 as $vo){
            $str = $vo['userdizhi'];
        }
        $areas = explode("/", $str);
        $ad = array();
         for($i=0;$i<count($areas);$i++){
             $area = M("areasid");
             $address = $area -> where('areaid = '.$areas[$i]) -> select();
             $ad[] = $address;
         }
         $ads = array();
         for($j=0;$j<count($ad);$j++){
            $ads[] = $ad[$j][0]['diqu'];
         }
         $dizhi = implode("/",$ads);
        $this -> assign('dizhi',$dizhi);
        $this -> assign('arr2',$r2);//分配到会员详细信息查询
    	$this -> display('User/user');
    }
    
}