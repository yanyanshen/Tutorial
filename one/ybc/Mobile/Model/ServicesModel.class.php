<?php
namespace Mobile\Model;
use Think\Model;
class ServicesModel extends Model{
    public function getServList($start=0){
        $mid=session("ybc_id");
        return $this->alias("s")->join("ybc_history h on s.hid=h.id")->where(array('s.mid'=>$mid))
            ->field(array("s.id","s.type","s.applytime","s.status","h.price","h.buynum","h.goodsname","h.pic","h.gid"))->order("applytime desc")->limit($start,5)->select();
    }
    public function getHistory($start=0){
        $where['mid']=session("ybc_id");
        $where['active']=1;
        $user=M('history');
        $arr = $user->where($where)->order("buytime desc")->limit($start,5)->select();// 查询满足要求的总记录数
        return $arr;
    }
}