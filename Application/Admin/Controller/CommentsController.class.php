<?php
namespace Admin\Controller;
use Think\Controller;
class CommentsController extends CommonController {
    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(5);
        if($access!==0){
            $this->error('权限不够');
        }
    }
    public function index(){
    	
    	$this -> display();
    }
    /*商品评论*/
    public function comments(){
       header("content-type:text/html;charset=utf-8");
        $db = M('comments');
        /*查看商品的评论信息*/
        $r = $db -> table('jd_comments as C,jd_prods as P,jd_users as U,jd_products as Pr')
        -> where('C.uId = U.userId and C.cId=P.prodId and P.prodId = Pr.prodId and C.is_delete = 0')
        -> select();
        // dump($r);exit;
        $this -> assign('arr',$r);
        //查看本商品评价的回复信息
        $id = I('get.id');
         // echo $id;exit;
        $db1 = M('callback');
        $r2 = $db1 -> where('jd_callback.prodId = '.$id." and jd_callback.status = 0")
                   -> join('left join jd_comments ON jd_callback.objectId = jd_comments.uId')
                   -> group('jd_callback.callbackId')
                   -> select();
        // $r1 = $db -> where('jd_comments.cId = '.$id.' and jd_callback.status = 0')
        //          -> join('left join jd_callback ON jd_comments.cId = jd_callback.prodId')
        //          -> field('jd_callback.*')
        //          -> select();
        $this -> assign('arr1',$r2);
        $this -> display();
    }
    /*删除商品评论*/
    public function do_del_comments(){
        $id = I('get.id');
        $db = M('comments');
        $data["is_delete"] = 1;
        //dump($data);exit;
        $r = $db -> where('commentsId = '.$id) -> save($data);
        if($r){
            $this -> redirect('comments');
        }else{
            $this -> error('删除失败！');
        }
    }
    /*商品评论回复信息*/
    public function callback(){
        header("content-type:text/html;charset=utf-8");
        $db = M('callback');
        $r = $db -> where('status = 0') -> select();
        $this -> assign('arr',$r);
        $this -> display();
    }
    /*删除商品回复信息*/
    public function do_del_callback(){
        $id = I('get.id');
        $db = M('callback');
        $pId = $db -> where('callbackId =  '.$id) -> field('prodId') -> select();
        $prodId = 0;
        foreach($pId as $vo){
            $prodId = $vo['prodId'];
        }
        $data['status'] = 1;
        $del = $db -> where('callbackId = '.$id) -> save($data);
        if($del){
            $this -> redirect('Comments/comments?id='.$prodId);
        }else{
            $this -> error('删除失败！');
        }
    }
}