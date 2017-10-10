<?php
namespace Mobile\Model;
use Think\Model;
class OrderModel extends Model{
    protected $tableName='order';
    public function getOrder($where='',$start=0){
        $where['mid']=session("ybc_id");
        $resArr=$this->alias("o")->join("ybc_order_status s on o.orderstatus=s.id")->where($where)->field(array(
            "o.id"=>"id","o.mid","o.ordersyn","o.orderstatus","o.addtime","address_id","paymethod","message","status","mnext"
        ))->order('addtime desc')->limit($start,5)->select();
        return $resArr;
    }

    public function getOrderGoods($oid,$status){
        $where['oid']=$oid;
        if($status==1){
            $resArr=M('order_goods')->alias('og')->join("ybc_goods g on og.gid=g.id")->where($where)
                ->field(array('g.goodsname','g.price','og.buynum','g.pic','og.gid'))->select();
        }else{
            $resArr=M('history')->where($where)->field(array('id','goodsname','price','buynum','pic','gid','sfpj'))->select();
        }
        return $resArr;
    }

    public function getSingleOrder($oid){
        $arr1=$this->alias("o")->join('ybc_order_status s on o.orderstatus=s.id')
            ->join("ybc_member_address a on o.address_id=a.id")
            ->field(array("o.id"=>"id","o.mid","o.ordersyn","o.orderprice","o.postage","o.points","o.orderstatus","o.addtime","address_id","paymethod","message","status","mnext","a.name","a.phone","a.province","a.city","a.town","a.address"))
            ->where(array('o.id'=>$oid))->find();

        if($arr1){
            return $arr1;//如果订单带有收货信息，直接返回
        }else{
            $arr2=$this->alias("o")->join('ybc_order_status s on o.orderstatus=s.id')//如果没有收货信息，先查询到订单信息
                ->field(array("o.id"=>"id","o.mid","o.ordersyn","o.orderprice","o.postage","o.points","o.orderstatus","o.addtime","address_id","paymethod","message","status","mnext"))
                ->where(array('o.id'=>$oid))->find();
            $ma=M('member_address');
            $mid=session("ybc_id");
            $addr=$ma->where(array('mid'=>$mid,'def'=>'1'))->find();//在查询默认收货信息
            if(!$addr){
                $addr=$ma->where(array('mid'=>$mid,'def'=>array('neq','2')))->find();//如果没有默认收货信息，查询第一条收货信息
            }
            $arr2['name']=$addr['name'];
            $arr2['phone']=$addr['phone'];
            $arr2['address']=$addr['province'].$addr['city'].$addr['town'].$addr['address'];
            return $arr2;
        }
    }

    public function getMyAddr(){
        $ma=M("member_address");
        $where['mid']=session("ybc_id");
        $where['def']=array('neq','2');
        $arr=$ma->where($where)->order("def desc")->select();
        return $arr;
    }

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

    public function changeSaleNum($id){
        $og=M('order_goods');
        $g=M('goods');
        $oginfo=$og->where(array('oid'=>$id))->select();
        foreach($oginfo as $v){
            $num=$g->where(array('id'=>$v['gid']))->field("num")->find();
            if($num['num']>=$v['buynum']){
                $g->where(array('id'=>$v['gid']))->setDec("num",$v['buynum']);
                $g->where(array('id'=>$v['gid']))->setInc("salenum",$v['buynum']);
            }else{
                return false;
            }
        }
        return true;
    }

    public function changeStatus($id,$status){
        $data['orderstatus']=$status;
        $res=$this->where(array("id"=>$id))->save($data);
        return $res;
    }

    public function moveToHistory($id){//将订单里的商品信息移动到购买过的商品history表里,用户付款时调用
        $mid=session('ybc_id');
        $og=M('order_goods');
        $where['oid']=$id;
        $arr=$og->alias('og')->join("ybc_goods g on og.gid=g.id")->where($where)->field(array(
            'oid','gid','price','buynum','goodsname','pic'
        ))->select();
        foreach($arr as $k=>$v){
            $arr[$k]['mid']=$mid;
            $arr[$k]['buytime']=time();
            $arr[$k]['active']=0;
        }
        return M('history')->addAll($arr);
    }
}