<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    public function getCartList($mid){
        $goods=$this->field('gid,goodsname,pic,price,oldprice,buynum,num')
                ->join('ybc_goods ON ybc_cart.gid = ybc_goods.id')
                ->where(array('mid'=>$mid))
                ->select();
        if($goods){
            return $goods;
        }else{
            return false;
        }
    }
}