<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminModel;
use Think\Verify;
class AdminloginController extends Controller{
    public function login(){
        $this->display('Admin/login');
    }
    //验证码
    public function verify_code(){
        $verify_config=array(
            'imageW'=>'300',
            'imageH'=>'50',
            'length'=>'4',
            'useCurve'=>false,
            'useNoise'=>false,
            'codeSet'=>'23456789',
            'fontttf'=>'msyh.ttf'
        );
        $verify=new Verify($verify_config);
        $verify->entry();
    }
    public function chk_verify(){
        $verify_code=I('yzm');
        $obj=new Verify();
        if($obj->check($verify_code)){
            $arr=array('ok'=>'');
        }else{
            $arr=array('error'=>'验证码输入错误');
        }
        echo json_encode($arr);
    }

    public function logined(){
        $data['username']=I('username');
        $data['passwd']=md5(I('passwd'));
        $obj=new AdminModel();
        if($obj->logined($data)){
            echo "登录成功";
        }else{
            echo "用户名或密码错误,请重新登录";
        }
    }
}