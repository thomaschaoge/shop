<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
    private $levelName=array(
            '1'=>'超级级管理员',
            '2'=>'高级管理员',
            '3'=>'中级管理员',
            '4'=>'初级管理员',
        );
    /*访问权限*/
    public function _initialize(){
        parent::_initialize();
        $access=\Home\Common\checkpower(2);
        if($access!==0){
            $this->error('权限不够');
        }
    }
    /*所有权限表信息展示*/
    public function index(){
        $gshow=M("glyadmins");
        $pshow=M("powers");
        $rshow=M("relation_level_power");
        $lshow=M("levels");
        /*获取权限管理员表数据*/
        $gdatalist=$gshow->select();
        /*权限表*/
        $pdatalist=$pshow->select();
        /*角色权限表*/
        $rdatalist=$rshow->select();
        /*角色表*/
        $ldatalist=$lshow->select();


        /*分配权限管理员表数据*/
        $this->assign("gdatalist",$gdatalist);
        /*分配权限表数据*/
        $this->assign("pdatalist",$pdatalist);
        /*分配角色权限表数据*/
        $this->assign("rdatalist",$rdatalist);
        /*分配角色表数据*/
        $this->assign("ldatalist",$ldatalist);

        $this->assign("levelname",$this->levelName);
        
        $this->display('Admin/index');
    }
    /*添加管理员界面*/
    public function register(){
        $this->display('Admin/register');  
    }
    /*锁定管理员帐号*/
    public function gdo_delete(){
        $gdelete=M("glyadmins");
        $_POST['isdeleted']=!$_POST['isdeleted'];
        $result=$gdelete->where('adminId='.$_POST['adminId'])->field('levelId')->find();
        if($_SESSION['admin']['levelId']>$result['levelId']){
            echo 0;
        }else{
            $data=$gdelete->create($_POST);
            echo $gdelete->save();
        }
    }
    /*删除非超级管理员帐号*/
    public function gDelete(){
        $gdelete=M("glyadmins");
        $result=$gdelete->where($_POST)->field('levelId')->find();
        if($_SESSION['admin']['levelId']>=$result['levelId']){
            echo 0;
        }else{
            $data=$gdelete->where($_POST)->delete();
            echo $data;
        }
    }
     /*管理员信息表，用户名信息ajax验证*/
    public function gdo_addtest(){
        $gadd=M("glyadmins");
        $r=$gadd->where($_POST)->find();
        if(empty($r)){
            echo 0; 
        }else{
            echo 1;
        }
    } 
    /*添加管理员信息，数据库是实现*/
    public function gdo_add(){
        $gadd=M("glyadmins");
        if($_SESSION['admin']['levelId']>$_POST['levelId']){
            echo 0;
        }else{
            $gadd->create($_POST);
            $gadd->upwd=md5($_POST['upwd']);
            $r=$gadd->add();
            $loginCount=M('logincount');
            $data['adminId']=$r;
            $data['lastTime']=0;
            $loginCount->create($data);
            $loginCount->add();
            echo $r;
        }
    }
    /*添加管理员信息修改页面展示*/
    public function gaEdit(){
        $gadd=M("glyadmins");
        $adminId=$_GET['adminId'];
        $data=$gadd->where('adminId='.$adminId)->find();
        if($_SESSION['admin']['levelId']>=$data['levelId']){
            $this->error("权限不够");
            return;
        }
        $this->assign("data",$data);
        $this->display('Admin/gaEdit');
    }
    /*添加管理员信息修改实现*/
    public function gado_edit(){
        $gadd=M("glyadmins");
        $data=$gadd->where('adminId='.$_POST['adminId'])->field('levelId')->find();
         /*过滤字段值为空的的字段*/
         /*修改同级权限*/
        if($_SESSION['admin']['levelId']>=$data['levelId']){
            echo -1;
         }else{
            /*提升下级权限*/
            if($_SESSION['admin']['levelId']>$_POST['levelId']){
                echo -1;
            }else{
                $field=array();
                foreach($_POST as $k=>$v){
                    $v=trim($v);
                    if(!empty($v)){
                        if($k=='upwd'){
                            $field[$k]=md5($v);
                        }else{
                            $field[$k]=$v;
                        }
                    }
                }
                $gadd->create($field);
                $r=$gadd->save();
                echo $r;
            }
        }
    }
}
