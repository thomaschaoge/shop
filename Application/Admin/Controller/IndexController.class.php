<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('login');
    }
    public function check_login(){
    	$check=M("glyadmins");
        //$_POST['isdeleted']='0';
        /*存用户登录的session*/
    	$data=$check->where($_POST)->find();
    	if(!empty($data)){
            if($data['isdeleted']==0){
    		    session_start();
    		    $_SESSION['admin']=$data;
                if($data['levelId']==1){
                    $_SESSION['admin']['power']=1;
                }else{
                    $power=M('relation_level_power');
                    $list=$power->where('levelId='.$data['levelId'])
                                     ->field('powerId')
                                     ->select();
                    $powerList=array();
                    foreach($list as $k=>$v){
                        $powerList[]=$v['powerId'];
                    }//获取权限列表
                    $_SESSION['admin']['power']=$powerList;
                }
                $loginCount=M('logincount');
                $loginData=$loginCount->where('adminId='.$data['adminId'])->find();
                cookie('loginData',$loginData,60);
                $now['lastTime']=time();//管理员登录信息统计
                $now['loginNum']=$loginData['loginNum']+1;
                $loginCount->where('adminId='.$data['adminId'])
                           ->data($now)
                           ->save();
    		    echo 0;
            }else{
                echo 2;
            }
    	}else{
    		echo 1;
    	}
    }
}
