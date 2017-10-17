<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    //添加购物车操作
    public function addToCart($data){
        $obj=M('cart');
        $map['gid']=$data['gid'];
        $map['uid']=$data['uid'];
        $map['goodsargs']=$data['goodsargs'];
        $incart=$obj->where($map)->find();
        if($incart){
            return $obj->where($map)->setInc('buynum',$data['buynum']);
        }else{
            if($obj->create($data)){
                return $obj->add();
            }
        }
    }
    //取得当前操作用户的购物车所有商品
    public function getAllCartByUid($uid,$firstRow='',$listRows=''){
        $obj=M('cart');
        $cart=$obj->where(array('uid'=>$uid))->limit($firstRow,$listRows)->select();
        foreach($cart as $k=>$v){
            $goods=new GoodsModel();
            $cartgoods=$goods->detail($v['gid']);
            $cart[$k]['goods']=$cartgoods;
        }
        return $cart;
    }

    //删除购物车商品
    public function delCart($data){
        $obj=M('cart');
        return $obj->where($data)->delete();
    }

    //更新购物车
    public function saveCart($data){
        $obj=M('cart');
        $info['uid']=session('uid');
        $info['gid']=$data['gid'];
        $info['goodsargs']=$data['goodsargs'];
        $change['buynum']=$data['buynum'];
        if($obj->create($change)){
            return $obj->where($info)->save();
        }else{
            return false;
        }
    }

    //加入收藏
    public function addToSc($data){
        $obj=M('goodssc');
        if($obj->create($data)){
            return $obj->add();
        }else{
            return false;
        }
    }
}