<?php
namespace Home\Model;
use Home\Model\GoodsModel;
use Think\Model;
class OrdergoodsModel extends Model{
    //添加到购物车商品表(ordergoods)
    public function addToTable($data){
        $obj=M('ordergoods');
        if($obj->create($data)){
            return $obj->add();
        }else{
            return false;
        }
    }

    //根据Orderid查找对应商品信息
    public function getGoodsByOrderId($orderid){
        $obj=M('ordergoods');
        $gid=$obj->where(array('orderid'=>$orderid))->select();
        $goods=new GoodsModel();
        foreach($gid as $k=>$v){
            $ordergoods[$k]=$goods->detail($v['gid']);
            $ordergoods[$k]['ordergoodsargs']=$v['goodsargs'];
            $ordergoods[$k]['buynum']=$v['buynum'];
            $pjobj=new PingjiaModel();
            $data['gid']=$v['gid'];
            $data['goodsargs']=$v['goodsargs'];
            $data['uid']=session('uid');
            $data['orderid']=$v['orderid'];
            if($pjobj->isPj($data)){
                $ordergoods[$k]['isPj']=1;
            }else{
                $ordergoods[$k]['isPj']=0;
            }
        }
        return $ordergoods;
    }


    //更新商品评价信息
    public function updatePj($data){
        $obj=M('ordergoods');
        $obj->isPj=1;
        if($obj->where($data)->save()){
            $flag=0;
            $ordergoods=$this->getGoodsByOrderId($data['orderid']);
            foreach($ordergoods as $v){
                if($v['isPj']==1){
                    $flag++;
                }
            }
            if($flag==count($ordergoods)){
                $order=new OrderModel();
                $order->updateOrderStatusById($data['orderid'],5);
            }
            return true;
        }else{
            return false;
        }
    }
}