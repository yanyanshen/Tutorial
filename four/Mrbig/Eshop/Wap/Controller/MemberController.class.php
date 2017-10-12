<?php
namespace Wap\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function add(){
        if(IS_POST){
            $member=D('Member');
            if($member->create()){
                echo "OK";
            }else{
                echo $member->getError();
            };

            //$member->add($data);
        }else{
            $this->assign("title","注册列表");
            $this->assign("conn","注册账号");
            $this->display('add');
        }
    }
    public function index(){
        if(IS_POST){
            $code=I('post.verify');
            if($this->checkVerify($code)){
                echo "验证码正确";
            }else{
                echo "验证码错误";
            } ;
        }else{
            $this->display('add');
        }

    }
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    => false, // 关闭验证码杂点
            'useImgBg'   => true,
            'useCurve'  => false,
            'fontttf'   => '2.ttf',
            //'useZh' => true,
            //'zhSet' => '某人是个大帅哥美女'
        );
        $Verify = new \Think\Verify($config);

        $Verify->entry();
    }

    public function checkVerify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}