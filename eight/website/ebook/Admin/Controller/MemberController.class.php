<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CommonController {
    public function member(){
        $data=M('Member');
        $memberList=$data->select();
        $this->assign("memberList",$memberList);
        $this->display();
    }
}