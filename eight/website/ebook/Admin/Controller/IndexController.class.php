<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{

    public function index(){
        $this->ses=M('user')->select();
        $this->display();
    }
    //退出
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Login/login');
    }
    public function main(){
        $this->assign('session', session());
        $this->display();
    }

}