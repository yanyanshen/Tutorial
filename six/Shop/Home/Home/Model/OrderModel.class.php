<?php
namespace Home\Model;
use Think\Model;

class OrderModel extends Model{

    //订单页面订单商品遍历
    public function goodsList($oid){
        $gid=M('ordergoods')->where(array("oid"=>$oid))->field('gid')->select();
        $str='';
        foreach($gid as $k=>$v){//遍历每个商品id,拼接成字符串，放在in里面查找
            $str.=$v['gid'].',';
            //每个商品的购买数量
            $buynum[$k]=M('ordergoods')->where(array("gid"=>$v['gid'],"oid"=>$oid))->field('buynum')->find();
        }
        $str=substr($str,0,-1);
        $where['id']=array('in',$str);
        $goodsList=M('goods')->where($where)->field('id,goodsname,saleprice,image')->select();
        foreach($goodsList as $k1=>$g){
            $goodsList[$k1]['buynum']=$buynum[$k1]['buynum'];
            $goodsList[$k1]['oid']=$oid;
        }
        $tataolprice=M('order')->where(array("id"=>$oid))->field('prices')->find();
        $goodsList[0]['prices']=$tataolprice['prices'];
        return $goodsList;
    }
    //支付
    public function pwd(){
        $uid=M('users')->where(array("username"=>session('username')))->field('id')->find();
        $paypwd=M('users')->field('paypwd')->where(array("id"=>$uid['id']))->find();
        return $paypwd['paypwd'];
    }
    public function money($num){
        $money1=M('users')->where(array("username"=>session('username')))->field('money')->find();//账户余额

        if($money1['money']>=$num['money']){
            $gid=M('ordergoods')->where(array("oid"=>$num['oid']))->field('gid,buynum')->select();
            foreach($gid as $k=>$v){
                M('goods')->where(array("id"=>$v['gid']))->setInc('salenum',$v['buynum']);//销量曾加
                M('goods')->where(array("id"=>$v['gid']))->setDec('goodsnum',$v['buynum']);//数量减少
            }
            $status['orderstatus']=2;
            $order=M('order')->where(array("id"=>$num['oid']))->save($status);
            M('users')->startTrans();
            $jifen=M('users')->where(array("username"=>session('username')))->setInc('jifen',$num['jifen']);//增加积分
            $money=M('users')->where(array("username"=>session('username')))->setDec('money',$num['money']);//扣款
            if($jifen&&$money&&$order){
                M('users')->commit();
                return true;
            }else{
                M('users')->rollback();
                return false;
            }
        }else{
            return false;
        }

    }





    //提交订单页面去支付的时候往订单表添加收货地址
    public function pay($date){
        $order=M('order');
        $uid=M('users')->where(array("username"=>session('username')))->field('id')->find();
        //$id=$order->where(array("gid"=>$date['gid']))->field("id")->find();
        $where['id']=array("eq",$date['oid']);
        $where['uid']=array("eq",intval($uid['id'],10));
        $date['createtime']=time();
        return  $order->where($where)->save($date);
    }

        //个人中心遍历订单
    public function getMemberorders($status){
        //判断未付款订单是否过期
        $where1['uid']=array('eq',session('uid'));
        $where1['orderstatus']=array('eq',1);
        $where1['createtime']=array('lt',time()-(60*60*48));
        $date1['orderstatus']=8;
        $orderout=M('order')->where($where1)->field('ordersyn')->select();
        foreach($orderout as $out=>$val){
                M('order')->where(array('ordersyn'=>$val['ordersyn']))->save($date1);
        }

        $order=M("order");
        if($status==0){$status='orderstatus';}//判断点击的那种类型的订单
        $where['username']=array("eq",session("username"));
        $uid=M("users")->where($where)->field("id")->find();
        $orderList=$order->where(array("uid"=>$uid['id']))->where("orderstatus=".$status)
            ->join("sk_orderstatus s on sk_order.orderstatus=s.id")
            ->field("sk_order.id,prices,ordersyn,createtime,orderstatus,statusname")
            ->order('createtime desc')
            ->select();
        foreach($orderList as $k=>$v){
            $goodsList=M("ordergoods")->where(array("oid"=>$v['id']))->field("gid,buynum,ispj")->select();
            foreach($goodsList as $k1=>$v1){
                $goodsinfo=M("goods")->where(array("id"=>$v1['gid']))->field("id,goodsname,image,saleprice,goodsintro")->find();
                $orderList[$k]['goodsname'][$k1]=$goodsinfo['goodsname'];
                $orderList[$k]['gid'][$k1]=$goodsinfo['id'];
                $orderList[$k]['image'][$k1]=$goodsinfo['image'];
                $orderList[$k]['saleprice'][$k1]=$goodsinfo['saleprice'];
                $orderList[$k]['goodsintro'][$k1]=$goodsinfo['goodsintro'];
                $orderList[$k]['buynum'][$k1]=$v1['buynum'];
                $orderList[$k]['ispj'][$k1]=$v1['ispj'];
            }
        }
        return $orderList;
    }

//    个人中心
    public function pingjia($date){

        $pingjia=M("pingjia");
        $pingjia->startTrans();
        $uid=M('users')->where(array("username"=>session('username')))->field('id')->find();
        $date['uid']=$uid['id'];
        $date['pjtime']=time();
        $rel1= $pingjia->add($date);
        $where['oid']=$date['oid'];
        $where['gid']=$date['gid'];
        $pj['ispj']=1;
        $rel2=M('ordergoods')->where($where)->save($pj);
        if($rel1&&$rel2){
            $pingjia->commit();
            return true;
        }else{
            $pingjia->rollback();
            return false;
        }
    }


    //确认收货
    public function affirm($pwd,$oid){
        $order=M('order');
        $paypwd['paypwd']=md5($pwd);
        $paypwd['id']=session('uid');
        $rel=M('users')->where($paypwd)->select();
        $date['orderstatus']=4;
        if($rel){
            return $order->where(array('id'=>$oid))->save($date);
        }else{
            return false;
        }
    }
}