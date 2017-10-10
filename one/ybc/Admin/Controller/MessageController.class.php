<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;

class MessageController extends BgController{
    public function index(){

    }

    public function getCount(){
        $message=M('message');
        $count=$message->where(array('active'=>'0'))->count();
        if($count){
            $this->success($count);
        }else{
            return false;
        }
    }
}