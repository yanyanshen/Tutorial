<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    public function cart(){
        $cart=M('cart');
        $where['id']=$_GET['id'];
        $arr=$cart->where($where)->select();
        return $arr;
    }
}