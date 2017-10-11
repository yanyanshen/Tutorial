<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Crypt\Driver\Think;

class AdminController extends Controller{
    public function index(){
        if(session('aname')){
            $this->display('Index/index');
        }else{
            $this->display('login');
        }

    }





    public function getVerify(){
        $config=array(
            'fontSize'=>36,
            'length'=>4,
            'useNoise'=>false,
            //  '参数  描述

            'useCurve'=>false,

            //'useImgBg'=>true,
            //'fontttf'=>'msyh.ttf',
            //'useZh'=>true,
            // 'zhSet' => '郑州高新区'

        );
        $Verify = new \Think\Verify($config);

        $Verify->entry();

    }

    function checkYzm(){
        $code=trim(I('post.yzm'));
        $verify = new \Think\Verify();
        if($verify->check($code,'')){
            echo 'true';
        }else{
            echo 'false';
        }
    }
//退出
    public function out(){
       session('aid',null);
        session('aname',null);

        $this->display('login');

        //session(null);
       //$this->ajaxReturn(array('status'=>'ok'));

    }


    //登录
    public function login(){
        if(IS_POST){
            $member=D('Admin');
            $id=$member->login();

            if($id>0){
                session('aid',$id);
                session('aname',trim(I('post.username')));
                session('logintime',time());
                session('loginip',$_SERVER['REMOTE_ADDR']);
                $info['status']='ok';
                $info['msg']='登录成功';
            }else{
                $info['status']='error';
                $info['msg']='登录失败';
            }
            $this->ajaxReturn($info);
        }else{
            $this->display('login');
        }
    }


}
