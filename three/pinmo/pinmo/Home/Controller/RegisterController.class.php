<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller
{
    public function  register()
    {
        //dump($_SERVER);
        if(IS_POST){
            $register=D('Register');
            $mid=$register->register();
            if($mid){
                session('mid',$mid);
                session('mname',trim(I('post.username')));
                $info['status']='ok';
                $info['msg']='用户注册成功';
            }else{
                $info['status']='error';
                $info['msg']='用户注册失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display();
        }
    }

    public function verify()
    {
        $config = array(
            'fontSize' => 30,    // 验证码字体大小
            'length' => 3,     // 验证码位数
            'useNoise' => true, // 关闭验证码杂点
            'useImgBg' => true,
            'useCurve' => false,

        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function chkVerify()
    {
        $verify = new \Think\Verify();
        $code = I('post.code');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        };
    }
//待改
    public function chkUsername(){
        $register=M('user');
        $username=I('post.username');

        if($register->where(array('username'=>$username))->count()){
            echo  'false';
        }else{
            echo 'true';
        }
    }
}