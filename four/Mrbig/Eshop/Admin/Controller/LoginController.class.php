<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        $this->display('login');

    }

    public function login(){
        if (IS_POST) {
            $log['name'] = trim(strtolower(I('post.name')));
           /*$log['password']= trim(I('post.password'));*/
            md5(trim($log['password']))== trim(I('post.password'));
            $obj=M('Admin');
            $aid=$obj->where($log)->getField('id');
            $id=$obj->where($log)->getField('id_law');
                if ($aid>0){
                    session('level',$id);
                    session('aid', $aid);
                    session('aname', trim(I('post.name')));
                    session('ipaddress',get_client_ip());
                    $this->ajaxReturn(array('status' => 'ok', 'msg' => '恭喜,登录成功'));

                } else {
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '用户名或密码错误'));

                }

            }

    }


    /*验证码*/
    public function verify(){
        $config =    array(
            'fontSize'    =>    100,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            /*'useNoise'    => false, // 关闭验证码杂点
            'useImgBg'   => true,
            'useCurve'  => false,*/
            'fontttf'   => '1.ttf'

        );
        $Verify = new \Think\Verify($config);
        $Verify->codeSet="0123456789";
        $Verify->entry();
    }
    /*登录验证码验证*/
    public function checkVerify(){
         $verify = new \Think\Verify();
         $code=trim(strtolower(I('post.verify')));
        if($verify->check($code, '')){
            echo 'true';
        }else{
            echo 'false';
        };
    }

    public function loginout(){
        session('aid',null);
        session('aname',null);
        $this->ajaxReturn(array('status'=>'ok'));
    }
}