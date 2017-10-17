<?php
namespace Mobile\Model;
use Think\Model;

class OrderModel extends Model{
    public function orderList($status='',$ordersyn=''){
        $order=M('order');
        if($status==0){$status='orderstatus';}
        if($ordersyn==''){$str='orderstatus='.$status;}
        else{$str="ordersyn like '%$ordersyn%'";}
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        $orderlist=$order->alias('o')
            ->join("sk_orderstatus s on o.orderstatus=s.id")
            ->field("o.id,ordersyn,uid,createtime,prices,statusname,orderstatus")
            ->where(array('uid'=>$uid['id']))
            ->where($str)
            ->order('createtime desc')
            ->select();
        foreach($orderlist as $ko=>$vo){
            $ordergoods=M('ordergoods')->where(array("oid"=>$vo['id']))->field('gid,buynum,price')->select();
            foreach($ordergoods as $kg=>$vg){
                $goods=M('goods')->where(array("id"=>$vg['gid']))->field('goodsname,goodsdetail,image')->find();
                $orderlist[$ko]['goods'][$kg]['goodsname']=$goods['goodsname'];
                $orderlist[$ko]['goods'][$kg]['image']=$goods['image'];
                $orderlist[$ko]['goods'][$kg]['goodsdetail']=$goods['goodsdetail'];
                $orderlist[$ko]['goods'][$kg]['buynum']=$vg['buynum'];
                $orderlist[$ko]['goods'][$kg]['price']=$vg['price'];
                $orderlist[$ko]['goods'][$kg]['id']=$vg['gid'];
            }
        }
        //print_r($orderlist);
        return $orderlist;
    }




    //订单支付
    public function pay($ordersyn){
        $price=M('order')->where(array('ordersyn'=>$ordersyn))->field('prices')->find();
        $user=M('users');
        $money=$user->where(array('username'=>session('username')))->field('money')->find();
        if($price['prices']>$money){
            return 1;//余额不足
        }else{
            $user->startTrans();
            $rel1=$user->where(array('username'=>session('username')))->setDec('money',$price['prices']);
            $rel2=$user->where(array('username'=>session('username')))->setInc('jifen',($price['prices']/10));
            $date['orderstatus']=2;
            $date['createtime']=time();
            $rel3=M('order')->where(array('ordersyn'=>$ordersyn))->save($date);
            if($rel1&&$rel2&&$rel3){
                $this->commit();
                return 0;
            }else{
                $this->rollback();
                return 2;
            }
        }

    }
}
?>