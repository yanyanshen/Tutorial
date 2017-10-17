<?php
namespace Mobile\Model;
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
    //取得当前操作用户所有购物车ID，以逗号分隔
    public function getAllCartId(){
        $obj=M('cart');
        $cartGid=$obj->where(array('uid'=>session('uid')))->field('gid')->select();
        $str='';
        foreach($cartGid as $v){
            $str.=','.$v['gid'];
        }
        return substr($str,1);
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
        if($data['gid']==0){
            return $obj->where(array('uid'=>session('uid')))->delete();
        }else{
            return $obj->where($data)->delete();
        }
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
        $scInfo=$obj->where($data)->find();
        if($scInfo){
            return 0;
        }else{
            if($obj->create($data)){
                return $obj->add();
            }else{
                return false;
            }
        }
    }
}