<?php
namespace Admin\Model;
use Think\Model;
class PingjiaModel extends Model{
    public function __condtruct(){
        parent::__construct();
    }
//    public function pingjia(){
//        $list=$this->order('pjtime desc')->select();
//        return $list;
//    }

    public function pJReturn(){
        $id=I('get.id');
        $where=array('id'=>$id);
        $res=$this->where($where)->select();

            return $res;

}

}