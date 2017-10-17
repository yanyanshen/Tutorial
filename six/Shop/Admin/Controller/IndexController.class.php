<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Controller;
class IndexController extends BgController{
    public function index(){
        $this->display();
    }
    public function main(){
        $goods=D("goods");
        $info=$goods->order('salenum desc')->limit('0,10')->select();

        $this->assign('info',$info);
        $this->display();
    }
    public function left(){
        $rule=D("AuthRule");
        $info=$rule->getNev();
        $this->assign("info",$info);
        $this->display('Public/left');
    }
    public function memberList(){
        $this->display('Public/memberList');
    }
    public function head(){
        $this->display('Public/head');
    }
  
}