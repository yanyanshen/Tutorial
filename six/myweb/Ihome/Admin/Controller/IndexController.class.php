<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function index(){
        if(isset($_SESSION["login"])){
            $this->display();
        }else{
            $this->display('Login/login');
        }
    }

    public function footer(){
        $this->display('Index/footer');

    }
    public function left(){
        $this->display('Index/left');

    }
    public function mainpage(){
        $this->display('Notice/notice');

    }
    public function top(){
        $this->display('Index/top');
    }
}