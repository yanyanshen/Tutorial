<?php
namespace Home\Controller;
use Think\Controller;
class EnrollController extends Controller{
    public function enroll(){
        $this->display();
    }
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    true, // 关闭验证码杂点
    );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

}