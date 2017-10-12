<?php

namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;

header("Content-Type:text/html;charset=utf-8");
class LoginController extends Controller
{
    public function index(){
        $this->display('login');
    }
    //验证码
    public function verify(){
        $con=array(
            'fontsize'=>25,
            'length'=>4,
        );
        $verify=new \Think\Verify($con);
        $verify->entry();
    }
    //检测用户名
    public function chkUsername(){
        $name=$_POST['username'];
        $res=new UserModel();
        $num=$res->chkusername($name);
        if($num){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    //检测验证码
    public function chkVerify(){
        $verify=new \Think\Verify();
        $code=I('post.verify');
        if($verify->check($code,'')){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    //注册
    public function register(){
        if(IS_POST){
            if($_POST['password']=$_POST['rePassword']){
                $res=new UserModel();
                $arr['username']=$_POST['username'];
                $arr['pwd']=$_POST['password'];
                $arr['email']=$_POST['email'];
                $arr['time']=time();
                $id=$res->register($arr);
                if($id){
                    $data=M('uuser');
                    $data1=M('information');
                    $info['uname']=$id;

                    $data->add($info);
                    $data1->add($info);
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'注册成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'no','msg'=>'注册失败'));
                }
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'两次输入密码不同'));
            }
        }else{
            $this->display();
        }
    }
    //登录
    public function login(){
        if(IS_POST){
            $user=new UserModel();
            $num=$user->login();
            if($num){
                session('mrid',$num);
                session('mrusername',$_POST['username']);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'用户登录成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'密码错误请重新输入'));
            }
        }else{
            $this->display();
        }
    }
    //安全退出
    public function logout(){
        $_SESSION['Mr_home']['mrid']=null;
        $_SESSION['Mr_home']['username']=null;
        $this->ajaxReturn(array('status'=>'ok'));
    }
}