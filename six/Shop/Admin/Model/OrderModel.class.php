<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model
{
    public function getOrderList($status,$oid,$firstRow='',$lastRow='')
    {
        //过期订单
        $where1['orderstatus']=array('eq',1);
        $where1['createtime']=array('lt',time()-(60*60*48));
        $date1['orderstatus']=8;
        $orderout=M('order')->where($where1)->field('ordersyn')->select();
        foreach($orderout as $out=>$val){
            M('order')->where(array('ordersyn'=>$val['ordersyn']))->save($date1);
        }

        $order = M('order');
        if(empty($status)){
            $where['ordersyn']=array('like',"%$oid%");
        }elseif(empty($oid)){
            $where['orderstatus']=array('eq',$status);
        }
        $orderlist = $order->alias('o')
            ->join('sk_orderstatus s on o.orderstatus=s.id')
            ->join('sk_users u on o.uid=u.id')
            ->join('sk_address a on o.aid=a.id')
            ->where($where)
            ->limit($firstRow,$lastRow)
            ->order('o.tx desc,o.createtime')
            ->field('o.ordersyn,u.username,a.name,a.mobile,a.address,o.orderstatus,o.id,s.statusname,o.prices,o.createtime')
            ->select();

        //把一个订单中所有的商品名，拼接成一个字符串，放在遍历数组中
        $str='';
        foreach($orderlist as $k=>$v){
            $where['oid']=array('eq',$v['id']);
            $ordergoods=M('ordergoods')->field('goodsname')->where($where)->select();
            foreach($ordergoods as $gname){
                $gname['goodsname']=mb_substr($gname['goodsname'],0,20,'utf-8');//限制每个商品的名字长度
                $str.=$gname['goodsname'].',';
            }
            $str=substr($str,0,-1);
            $orderlist[$k]['goodsname']=$str;
            $str='';
        }
        return $orderlist;
    }

    //订单删除
    public function orderDel($id){
        $order=M('order');
        $order->startTrans();//开启事务
        $where1['id']=array('eq',$id);
        $rel1=$order->where($where1)->delete();
        $where2['oid']=array('eq',$id);
        $rel2=$order->table('sk_ordergoods')->where($where2)->delete();
        if($rel1 && $rel2){
            $order->commit();
            echo 1;
        }else{
            $order->rollback();
            echo 0;
        }
    }


    //发货订单信息
    public function sendinfo($ordersyn){
        $order=M('order')->where(array('ordersyn'=>$ordersyn))->find();
        $address=M('address')->where(array('id'=>$order['aid']))->find();
        $user=M('users')->where(array('id'=>$order['uid']))->field('username')->find();
        $ordergoods=M('ordergoods')->where(array('oid'=>$order['id']))->field('gid,price')->select();
        foreach($ordergoods as $k=>$v){
            $goods=M('goods')->where(array('id'=>$v['gid']))->field('goodsname,image')->find();
            $order['goods'][$k]['goodsname']=$goods['goodsname'];//商品名称
            $order['goods'][$k]['image']=$goods['image'];//商品图片
        }
        $order['username']=$user['username'];//购买账户昵称
        $order['name']=$address['name'];//收货人姓名
        $order['address']=$address['address'].$address['detailaddress'];//收货人地址
        $order['mobile']=$address['mobile'];//收货人联系方式
        $order['price']=$ordergoods['price'];//商品价格
        return $order;
    }

    //订单发货
    public function send($ordersyn){
        $status['orderstatus']=3;
        $status['tx']=0;
        return $rel=M('order')->where(array("ordersyn"=>$ordersyn))->save($status);
    }
}