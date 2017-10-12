<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //在本控制器所以方法之前会执行该方法，防止未登录进入
    public function _initialize(){
    if(session('aid')<1||session('status')<1){
        header('location:/Admin/Login/login');
    }
}
    public function top(){
        $this->display();
    }
    public function left(){
        $admin=M('Admin');
        $adminlist=$admin->where(array('adminname'=>session('adminname')))->find();
        $this->assign('adminlist',$adminlist);
        $this->display();
    }
    public function main(){
        $admin=M('Admin');
        $res=$admin->where(array('adminname'=>session('adminname')))->find();
        $time=$res['last_time'];

        $ip=$res['last_ip'];
        $this->assign('adminname',session('adminname'));
        $this->assign('time',date('Y-m-d H:i:s',$time));
        $this->assign('ip',$ip);
        $this->assign('serverName',$_SERVER["SERVER_NAME"]);//域名
        $this->assign('serverSoftware',$_SERVER  ["SERVER_SOFTWARE"]);//服务器软件
        $this->assign('developLang',$_SERVER  ["SERVER_SOFTWARE"]);//开发语言
        $this->assign('developLang','PHP');//开发语言
        $this->assign('database','MYSQL');//数据库
        $this->display();
    }
    public function footer(){
        $this->display();
    }
}