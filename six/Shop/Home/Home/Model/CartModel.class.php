<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    public function addCart($post){
        $id="";
        $_POST=$post;
        $_POST["uid"]=$_SESSION["uid"];
        $_POST["addtime"]=time();
//        print_r($_POST);
//        exit();
        $cart=M("cart");
        $info=$cart->where("uid=".$_POST["uid"]." and gid=".$_POST["gid"])->find();
        if($info){
            $cart->create();
            $_POST["buynum"]=$_POST["buynum"]+$info["buynum"];
            $id=$cart->where("uid=".$_POST["uid"]." and gid=".$_POST["gid"])->setField("buynum",$_POST["buynum"]);
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

    public function getgoods($id){
            $cart=M("cart");
            $info=$cart->field("image,goodsname,gid,saleprice,buynum,markprice,goodsnum")->join('sk_goods on sk_goods.id=sk_cart.gid')->where("uid=".$id)->select();
            return $info;
    }
    public  function order($order){
        $_POST=$order;
        $orders=M("order");
        $orders->create();
        $id=$orders->add();
        if($id) {
            return $id;
        }else{
            return false;
        }
    }
    public function orderGoods($goods,$id,$uid){
        $aid=array();
        foreach($goods as $k=>$v){
            M("cart")->where("uid=".$uid." and gid=".$v["gid"])->delete();
            $name=M("goods")->field("goodsname")->find($v["gid"]);
            $v["goodsname"]=$name["goodsname"];
            $v["oid"]=$id;
            $_POST=$v;
            M("ordergoods")->create();
            $aid[]=M("ordergoods")->add();
        }
        if(!in_array("false",$aid)){
            return true;
        }
        return false;
    }
    public function del($id,$uid){
        $cart=M("cart");
        $rel=$cart->where("uid=".$uid." and gid=".$id)->delete();
        if($rel){
            return true;
        }else{
            return false;
        }
    }
    public function alldel($idarr,$uid){
        $cart=M("cart");
        $str=implode(",",$idarr);
        $rel=$cart->where("uid=".$uid." and gid in (".$str.")")->delete();
        if($rel){
            return true;
        }else{
            return false;
        }
    }




}