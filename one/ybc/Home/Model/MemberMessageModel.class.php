<?php
namespace Home\Model;

use Think\Model;

class MemberMessageModel extends Model{
    //查询未读消息的数量
    public function unRead($mid){
        $unNum=$this->where(array('mid'=>$mid,'status'=>'0'))->count();
        return $unNum;
    }

    //查询所有消息的数量
    public function all($mid){
        $all=$this->where(array('mid'=>$mid))->count();
        return $all;
    }

    //查询所有消息的信息
    public function msgInfo($mid){
        $info=$this->where(array('mid'=>$mid))->select();
        return $info;
    }
}