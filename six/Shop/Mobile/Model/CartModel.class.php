<?php
namespace Mobile\Model;
use Think\Model;

class CartModel extends Model{
	public function addcart($post){
		$id="";
		$cart=M('cart');
		$_POST['uid']=$_SESSION['uid'];
		$_POST['addtime']=time();
		$_POST['buynum']=$_POST['buynum'];
		$info=$cart->where("uid=".$_POST['uid']." and gid=".$_POST["gid"])->find();
		//登录状态
		if($info){
			$cart->create();
			$_POST['buynum']=$_POST['buynum']+$info['buynum'];
			$id=$cart->where("uid=".$_POST['uid']." and gid=".$_POST['gid'])->setField("buynum",$_POST["buynum"]);
		}else{
			$cart->create();
			$id=$cart->add();
		}
		if($id){
			return true;
		}else{
			return false;
		}
	}

    //遍历购物车商品
    public function cartList($uid){
        $cart=M('cart')->where(array('uid'=>$uid))->order("addtime desc")->select();
        foreach($cart as $k=>$val){
            $goods=M('goods')->where(array('id'=>$val['gid']))->find();
            $cart[$k]['goodsname']=$goods['goodsname'];
            $cart[$k]['image']=$goods['image'];
            $cart[$k]['goodsdetail']=$goods['goodsdetail'];
            $cart[$k]['saleprice']=$goods['saleprice'];
        }
        return $cart;
    }
    //未登录状态下的购物车
    public function secarList(){
        $cart=session('cart');
        foreach($cart as $k=>$val){
            $goods=M('goods')->where(array('id'=>$val['gid']))->find();
            $cart[$k]['goodsname']=$goods['goodsname'];
            $cart[$k]['image']=$goods['image'];
            $cart[$k]['goodsdetail']=$goods['goodsdetail'];
            $cart[$k]['saleprice']=$goods['saleprice'];
        }
        return $cart;

    }

}
