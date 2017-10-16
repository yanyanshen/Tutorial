<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    public function cartInfo(){
        $goods['gid']=trim(I('post.gid'));
        $info=M('goods')->where($goods)->find();
        return $info;
    }
}