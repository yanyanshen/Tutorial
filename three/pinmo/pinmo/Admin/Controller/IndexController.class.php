<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
        if(session('aid')<1){
            $this->redirect('Admin/index');

        }
    }
    public function index(){

        $this->display();
    }
    public function top(){
        $admin=session('aname');
        $this->assign('admin',$admin);
        $this->display();
    }
    public function left(){
        $this->display();
    }
    public function main(){
        $admin=session('aname');
        $id=session('aid');
        $ip=M('adminuser')->where("id=$id")->getField('ip');
        $time=M('adminuser')->where("id=$id")->getField('lasttime');
        $think=$_SERVER;
        $php=PHP_VERSION;

        //dump($think);
        $this->assign('soft',$think['SERVER_SOFTWARE']);
        $this->assign('admin',$admin);
        $this->assign('time',$time);
        $this->assign('php',$php);

        $this->assign('ip',$ip);
        $this->display();
    }
    public function footer(){
        $this->display();
    }

}