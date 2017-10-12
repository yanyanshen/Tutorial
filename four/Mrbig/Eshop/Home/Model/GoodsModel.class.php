<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
    public function ad(){

    }
    public function goods($id){
        //$goods=M('goods');
        $where['id']=$id;
        $arr=$this->where($where)->select();
        return $arr;
    }
    //判断收藏表中有无商品
    public function chkPid($pid){
        $res=M('collect');
        $where['pid']=$pid;
        $arr=$res->where($where)->select();
        return $arr;
    }
    //收藏商品;
    public function old($arr){
        $res=M('collect');
        $id=$res->add($arr);
        return $id;
    }
    //展示收藏
    public function showOld($id){
        $res=M('collect');
        $where['uid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function pay($id){
        $goods=M('goods');
        $where['id']=$id;
        $arr=$goods->where($where)->select();
        return $arr;
    }
    //获取商品详情
    public function detail($id){
        $where['id']=$id;
        return $arr=$this->where($where)->select();
       //$this->getLastSql();

    }
    //热卖商品
    public function showHot(){
        $sql="select * from mr_goods where num>10 limit 5";
        $arr=M()->query($sql);
        return $arr;
    }

    public function fetchOne($id){
        $where['id']=$id;
        $res=M('goods');
        return $res->where($where)->find();
    }
    //商品加入购物车
    public function add($arr){
        $res=M('cart');
        //同一个用户
        $where['pid']=$arr['pid'];
        $where['uid']=$_SESSION['Mr_home']['mrid'];
        $num=$res->where($where)->select();
        if($num){
            //如果购物车中存在此商品那么数量加上此次添加的数量
            $data['num']=$arr['num']+$num[0]['num'];
            $data['addTime']=time();
            $data['pid']=$num[0]['pid'];
            $data['uid']=$num[0]['uid'];
            $we['id']=$num[0]['id'];
            $result=$res->data($data)->where($we)->save();
            return $result;
        }else{
            //购物车中不存在，添加商品到购物车中
            return $res->add($arr);
        }
    }
    //订单商品写入商品相关表中
    public function toOrderpid($arr){
        $res=M('orderpid');
        $res->add($arr);
    }
    //写入订单详情表中
    public function toOrderDetail($arr){
        $res=M('orderdetail');
        $id=$res->add($arr);
        return $id;
    }
    public function fetchOid($id){
        $res=M('orderpid');
        $arr=$res->select($id);
        return $arr;
    }
    //展示订单
    public function showOrder(){
        $mrid=$_SESSION['Mr_home']['mrid'][0]['id'];
        $sql="select * from  mr_orderstatus as t , mr_orderdetail as o  where o.statusid=t.id and o.mrid='{$mrid}' ORDER BY o.id DESC ";
        $arr=M()->query($sql);
        return $arr;
    }
    //展示订单中商品
    public function orderToDetail($id){
        $res=M('orderpid');
        $where['oid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    //展示订单中收货人信息
    public function orderToAddress($id){
        $res=M('address');
        $where['id']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }

    //展示购物车
    public function selCart($id){
        $res=M('cart');
        $where['pid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    //广展示
    public function showAd(){
        $res=M('ad');
        $where['adstate']=1;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function data($arr,$id){
        $res=M('cart');
        $where['pid']=$id;
        $num=$res->where($where)->data($arr);
        return $num;
    }
    //购物车中寻找商品所有内容
    public function fetchCart($id){
        $res=M('cart');
        $where['id']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function fetchAll($id){
        $res=M('goods');
        $where['cid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function cartToOrder(){
        $sql="select * from  mr_goods as g , mr_cart as c  where c.pid=g.id";
        $arr=M()->query($sql);
        return $arr;
    }
    //
    public function cartNum(){
        $id=$_SESSION['Mr_home']['mrid'];
        $res=M('cart');
        $where['uid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function searchAll(){
        $sql="select * from mr_goods as g , mr_category as c where g.cid=c.id ";
        $arr=M()->query($sql);
        return $arr;
    }
    public function fetchAllCate($id){
        $res=M('category');
        $where['pid']=$id;
        $arr=$res->where($where)->select();
        return $arr;
    }
    public function cateToGoods($id){
        $where['cid']=$id;
        return $arr=$this->where($where)->select();
    }
    public function searchCate($id){
        $where['cid']=$id;
        return $arr=$this->where($where)->select();
    }
    //删除购物新中某件商品
    public function delCar($id){
        $res=M('cart');
        $where['id']=$id;
        return $num=$res->where($where)->delete();
    }
    public function showCart($id){

    }

    public function getGoods($data,$firstRow='',$listRows=''){
        $obj=new CategoryModel();
        $goods=M('goods');
        if($data['cid']!=0 && $data['name']==''){
            $goods_category=$obj->getChildCate($data['cid']);
            $map['cid']=array('in',$goods_category);
            return $goods->where($map)->limit($firstRow,$listRows)->select();
        }elseif($data['cid']==0 && $data['name']==''){
            return $goods->limit($firstRow,$listRows)->select();
        }elseif($data['cid']==0 && $data['name']!=''){
            $map['name']=array('like','%'.$data['name'].'%');
            return $goods->where($map)->limit($firstRow,$listRows)->select();
        }
    }
}