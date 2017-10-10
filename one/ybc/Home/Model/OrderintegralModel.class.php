<?php
namespace Home\Model;
use Think\Model;
class OrderintegralModel extends Model{
    protected $tableName='orderintegral';
    public function bindAddr($id){//将收货地址复制并绑定该订单
        $res1=$this->where(array('id'=>$id))->field("orderstatus,address_id")->find();
        $aid=$res1['address_id'];
        if($res1['orderstatus']==1){
            if($res1){
                $maddr=M("member_address");
                $addrInfo=$maddr->where(array('id'=>$aid))->find();
                if($addrInfo){
                    $addrInfo['def']=2;
                    array_shift($addrInfo);
                    $newId=$maddr->add($addrInfo);
                    if($newId){
                        $data['address_id']=$newId;
                        $res2=$this->where(array('id'=>$id))->save($data);
                        return $res2;
                    }else{return false;}
                }else{return false;}
            }else{return false;}
        }else{return false;}
    }
}