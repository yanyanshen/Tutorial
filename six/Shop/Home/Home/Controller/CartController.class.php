<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CartModel;
class CartController extends Controller{
    public function addcart(){
        $cart = D("cart");
        $_POST["buynum"]=isset($_POST["buynum"])?I("buynum"):"1";
        if (isset($_SESSION["uid"]) && $_SESSION["uid"] > 0) {
            $rel=$cart->addCart(I("post."));
            if($rel){
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }
        } else {
            if (isset($_SESSION["cart"][I("gid")]) && $_SESSION["cart"][I("gid")] > 0) {
                $_SESSION["cart"][I("gid")]["buynum"] =  $_SESSION["cart"][I("gid")]["buynum"]+ I("buynum");
            }else{
                $_SESSION["cart"][I("gid")] = array("gid" => I("gid"), "buynum" => I("buynum"),"addtime"=>time());
            }


            if(isset($_SESSION["cart"][I("gid")])&& $_SESSION["cart"][I("gid")]>0){
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }
        }
    }

    public function cart(){
        $cart = D("cart");
        $good=M("goods");
        $goods="";
        if (isset($_SESSION["uid"]) && $_SESSION["uid"] > 0) {
            $goods=$cart->getgoods($_SESSION["uid"]);
        }else{
            foreach($_SESSION["cart"] as $k=>$v){
                $goods[$k]=$good->field("image,goodsname,markprice,saleprice,goodsnum")->find($k);
                $goods[$k]["gid"]=$v["gid"];
                $goods[$k]["buynum"]=$v["buynum"];

            }

        }
        $arr=$this->status();

        foreach($goods as $k1=>$v1){
            $goods[$k1]["image"]=reset(explode(",",$v1["image"]));
            if(in_array($v1["gid"],$arr)){
                $goods[$k1]["status"]=1;
            }else{
                $goods[$k1]["status"]=0;
            }
        }
        
        $this->assign("goods",$goods);
        $this->assign("empty","<div style='margin:40px auto 0; font-size:30px;color:#a9a9a9;text-align: center '>购物车空空如也，赶紧去购物吧</div>");
        $this->display("shop_cart");
    }



    public function buy(){
        $goodsAll=I("post.");
        $goods="";
        foreach($goodsAll["id"] as $k=>$v){
            if(in_array($v,$goodsAll["gid"])){
                $goods[$k]["gid"]=$v;
                $goods[$k]["buynum"]=$goodsAll["num"][$k];
                $goods[$k]["price"]=$goodsAll["price1"][$k];
                $goods["allprice"]=$goodsAll["allprice"];
            }
        }
        $order["uid"]=$_SESSION["uid"];
        $order["prices"]=$goods["allprice"];
        //$order["ordersyn"]=date('Ymd').uniqid(rand(),10);
        $order["ordersyn"]=md5(uniqid(rand()));
        $order["createtime"]=time();
        $order["orderstatus"]=1;
        $cart=D("cart");
        $rel=$cart->order($order);
        if($rel){
            unset($goods["allprice"]);
            $rel1=$cart->orderGoods($goods,$rel,$order["uid"]);
            if($rel1){
                $this->success($rel);
            }else{
                $this->error("订单提交失败1");
            }
        }else{
            $this->error("订单提交失败2");
        }


    }

    public function cartdel(){
        $cart=D("cart");
        $id = I("gid");

        if (isset($_SESSION["uid"]) && $_SESSION["uid"] > 0) {
            // $uid=$_SESSION["uid"];
            $rel=$cart->del($id,$_SESSION["uid"]);
            if($rel){
                $this->success("删除成功");
            }else{
                $this->error("删除失败1");
            }
        }else{
            unset($_SESSION["cart"][$id]);
            if(!$_SESSION["cart"][$id]){
                $this->success("删除成功");
            }else{
                $this->error("删除失败");
            }
        }


    }



    public function alldel(){
        $goods=$_POST;
        if (isset($_SESSION["uid"]) && $_SESSION["uid"] > 0) {
            $cart=D("cart");
            $rel=$cart->alldel($goods["gid"],$_SESSION["uid"]);
            if($rel){
                echo $this->success("删除成功");
            }else{
                echo $this->error("删除失败");
            }
        }else{
            $info="true";
            foreach($goods["gid"] as $k=>$v){
                unset($_SESSION["cart"][$v]);
                if(isset($_SESSION["cart"][$v])){
                    $info="false";
                }
            }

            if($info){
                echo $this->success("删除成功");
            }else{
                echo $this->error("删除失败");
            }
        }
    }
    public function d_cart(){
       // print_r(I("post."));
        $goods=I("post.");
        $info["gid"][0]=$goods["gid"];
        $info["id"][0]=$goods["gid"];
        $info["num"][0]=$goods["num"];
        $info["price1"][0]=$goods["price"]*$goods["num"];
        $info["allprice"]=$info["price1"][0];
        $_POST=$info;
        $this->buy();
    }
    public function cartnum(){
        $num=0;
        if(isset($_SESSION["uid"])&&$_SESSION["uid"]>0){
            $uid=$_SESSION["uid"];
            $num=M("cart")->where("uid=".$uid)->count();
        }else{
            $num=count($_SESSION["cart"]);
        }
        echo json_encode($num);
    }






        //收藏操作
    public function collect(){
        $gid=I("gid");
        //有漏洞，前台uid不传时自动转未登录
        if(I("uid")>0){
            //登录时
            $uid=I("uid");
            $info=M("collect")->where("gid=".$gid." and uid=".$uid)->find();
            if($info){
                //更改collect表status字段
                if($info["status"]==0){
                    //开始收藏

                    $info1=M("collect")->where("gid=".$gid." and uid=".$uid)->setField("status",1);
                    if($info1){
                        M("collect")->where("gid=".$gid." and uid=".$uid)->setField("coltime",time());
                        echo $this->success("收藏成功");
                    }else{
                        echo $this->error("收藏失败");
                    }
                }else{
                    //取消收藏
                    $info1=M("collect")->where("gid=".$gid." and uid=".$uid)->setField("status",0);
                    if($info1){
                        echo  $this->success("取消收藏成功");
                    }else{
                        echo $this->error("取消收藏失败");
                    }
                }
            }else{
                //添加表数据
                $collect=M("collect");
                $data=array();
                $data["gid"]=$gid;
                $data["uid"]=$uid;
                $data["status"]=1;
                $data["coltime"]=time();
                $_POST=$data;
                $collect->create();
                $id=$collect->add();
                if($id){
                    echo $this->success("收藏成功");
                }else{
                    echo $this->error("收藏失败");
                }
            }


        }else{
            //没有登录时
            if(!$_SESSION["collect"][$gid]){
                $_SESSION["collect"][$gid]["gid"]=$gid;
                $_SESSION["collect"][$gid]["coltime"]=time();
                if($_SESSION["collect"][$gid]){
                    echo $this->error("收藏成功");
                }else{
                    echo $this->error("收藏失败");
                }

            }else{
                unset($_SESSION["collect"][$gid]);
                if(!$_SESSION["collect"][$gid]){
                    echo $this->error("成功取消收藏");
                }else{
                    echo $this->error("取消收藏失败");
                }
            }

        }
    }





    //收藏状态
    public function status(){
        $gid=array();
        if($_SESSION["uid"]){
            //从表中取数据，拼数组
            $uid=$_SESSION["uid"];
            $collect=M("collect");

            $info=$collect->field("gid")->where("status=1 and uid=".$uid)->select();
            foreach($info as $k=>$v){
                $gid[$k]=$v["gid"];
            }

        }else{
            //从$_SESSION中取数据
            foreach($_SESSION["collect"] as $k1=>$v1){
                $gid[$k1]=$v1["gid"];
            }



        }
        return $gid;
    }
    //收藏人数
    public function collect_all(){
        $goods_id=I("gid");
        $collect=M("collect")->where("status=1 and gid=".$goods_id )->count();
        if($collect==0){
            $collect=0;
        }else{
        }
        echo $this->success($collect);
    }
}