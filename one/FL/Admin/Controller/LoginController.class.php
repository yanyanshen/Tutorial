<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
        public function login(){
            $this->display();
        }
    //验证码设置
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
            // 'useImgBg'   => true,
            // 'useCurve'  => false,
            //  'fontttf'   => 'msyh.ttf',
            // 'useZh' => true,
            // 'zhSet' => '河南云和数据科技有限公司网站开发工程师我们是最棒的'
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }


    //检测验证码是否一致
    public function chkVerify(){
        $verify = new \Think\Verify();
        $code=I('post.yzm');
        if($verify->check($code, '')){
            echo 'true';
        }else{
            echo 'false';
        };

    }
}