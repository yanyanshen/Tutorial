<?php
namespace Home\Controller;

use Home\Common\Controller\BgController;

class MemberMessageController extends BgController{
    //查询用户有多少条未读消息
    public function index(){
        $mid=session('ybc_id');
        $message=M('MemberMessage');
        $count=$message->where(array('mid'=>$mid,'status'=>'0'))->count();
        if($count){
            $this->success($count);
        }else{
            $this->error($message->getError());
        }
    }






}