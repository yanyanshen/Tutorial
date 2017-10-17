<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class VerifyController extends Controller{
    public function index(){
        if(IS_POST){
            $code=I('post.verify');
            if($this->check_verify($code)){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            $this->display();
        }
    }

    public function verify(){
        $config=array(
            'fontSize' => '36',  //验证码字体大小
            'length'   => '2',   //验证码位数
            'useNoise' => false,   //关闭验证码杂点
            'useCurve' => false,   //关闭验证码曲线
//            'imageW'   => '90',  //验证码长度
//            'imageH'  =>  '22',   //验证码高度
            'codeSet'     => '1234567890',

            'bg'      => array(200,206,200),  //验证码背景颜色
//            'bg'      => array(225,200,000),
        );
        $verify=new Verify($config);
        $verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code,$id =''){
        $verify = new Verify();
        return $verify->check($code, $id);
    }

}