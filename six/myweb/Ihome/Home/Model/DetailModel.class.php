<?php
namespace Home\Model;
use Think\Model;
class DetailModel extends Model{
    public function GoodsInfo($gid){
        $info=M('goods')->where($gid)->find();
        return $info;
    }
    public function Goodspic($gid){
        $pic=M('goods_pic')->where($gid)->select();
        return $pic;
    }
    public function comment($gid){
        $comment=M('goods_comment')->where($gid)->select();
        return $comment;
    }
    public function guess(){
        $list=M('goods')->select();
        return $list;
    }
}