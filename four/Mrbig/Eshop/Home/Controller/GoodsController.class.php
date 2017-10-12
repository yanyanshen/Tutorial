<?php
namespace Home\Controller;
use Home\Model\AddressModel;
use Home\Model\GoodsModel;
use Think\Controller;
class GoodsController extends Controller{
    public function goods(){

        //商品展示
        $id=$_GET['id'];
        $res=new GoodsModel();
        $arr=$res->detail($id);
        $this->information=$arr[0]['information'];
        $this->name=$arr[0]['name'];
        $this->price=$arr[0]['price'];
        $this->pic=$arr[0]['pic'];
        $this->marketprice=$arr[0]['marketprice'];
        $pic=explode(',',$arr[0]['pic']);
        $this->mrid=$_SESSION['Mr_home']['mrid'];
        $this->assign('pic',$pic);
        $this->id=$arr[0]['id'];


        //热卖展示
        $arrHot=$res->showHot();
        $this->assign('arr',$arrHot);

        //收藏展示
        //左侧收藏栏
        $id=$_SESSION['Mr_home']['mrid'][0]['id'];
        $oldArr=$res->showOld($id);
        foreach($oldArr as $oldK=>$oldV) {
            $oldGoodArr = $res->detail($oldV['pid']);
            foreach ($oldGoodArr as $oldK1 => $oldV1) {
                $oldGoods[]=$oldV1;
            }

        }
        $this->assign('oldArr',$oldGoods);


        $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);
        $this->display();
    }

    //收藏商品
    public function old()
    {
        $session = $_SESSION['Mr_home'];
        if (!$session['mrid']) {
            $this->ajaxReturn(array('status' => 'no', 'msg' => '请登陆后在执行操作'));
        } else {
            $pid = $_GET['pid'];
            $res = new GoodsModel();
            $where['uid']=$_SESSION['Mr_home']['mrid'];
            $arr = $res->where($where)->chkPid($pid);
            if ($arr) {
                $this->ajaxReturn(array('status' => 'old', 'msg' => '商品已收藏'));
            } else {
                $arr['pid']=$_GET['pid'];
                $arr['uid']=$session['mrid'];
                $arr['oldtime']=time();
                $id = $res->old($arr);
                if ($id) {
                    $this->ajaxReturn(array('status' => 'ok', 'msg' => '收藏成功'));
                } else {
                    $this->ajaxReturn(array('status' => 'error', 'msg' => '收藏失败'));
                }
            }
        }
    }

//直接购买生成订单，写入数据表orderdetial中；
    public function pay(){

            $id=$_GET['id'];
            $res=new GoodsModel();
            $arr=$res->detail($id);
            if($arr){
                $arr[0]['payNum']=$_POST['num'];
                $arr[0]['prices']=$arr[0]['price']*$_POST['num'];
                $this->count=$arr[0]['prices'];
                $this->assign('info',$arr);
                   //显示所有保存地址
                $reslut=new AddressModel();
                $array=$reslut->showAdd();
                $this->array=$array;
                //显示时间订单号
                $this->oid='mr_'.substr(md5(time()),0,16);
                $this->time=date('Y/m/d H-i-s',time());
                //输出
                $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
                $this->assign('username',$_SESSION['Mr_home']['mrusername']);
                $this->display('orderDetail');
            }else{
                $this->error('未知错误');
            }
    }

    //订单详情
    public function showOid(){
        $id=$_GET['id'];
        $sql="select * from mr_orderpid as p , mr_orderdetail as o , mr_goods as g , mr_address as a
              where p.oid=o.id and o.addressid=a.id and p.pid=g.id and o.id={$id}";
        $arr=M()->query($sql);
        $this->assign('info',$arr);
        $this->assign('mrid',$_SESSION['Mr_home']['mrid'][0]['id']);
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);
        $this->display('orderDetailOld');
    }

    //购物车提交到订单
    public function toPay(){
            $count='';
            foreach($_GET['num'] as $k=>$v){
                $res=new GoodsModel();
                $array=$res->detail($k);

                foreach($array as $key=>$val){
                        $val['payNum']=$v;
                        $prices=$val['price']*$val['payNum'];
                        $val['prices']=$prices;
                        $info[]=$val;
                        $count=$count+$val['prices'];
                }
                //删除购物车中已提交的内容
                $data=M('cart');
                $where['pid']=$k;
                $data->where($where)->delete();

            }



            //商品总价显示
            $this->assign('count',$count);
            $this->info=$info;
            //显示所有保存地址
            $reslut=new AddressModel();
            $array=$reslut->showAdd();
            $this->array=$array;
            //生成订单号日期
            $this->oid='mr_'.substr(md5(time()),0,16);
            $this->time=date('Y/m/d H-i-s',time());
            //在订单详情页输出
            $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
            $this->assign('username',$_SESSION['Mr_home']['mrusername']);
            $this->display('orderDetail');
    }


    //展示购物车内容
    public function showCar(){
        if($_SESSION['Mr_home']['mrid']){
            $mrid=$_SESSION['Mr_home']['mrid'][0]['id'];
            $arr=M()->query("select * from  mr_goods as g , mr_cart as c  where c.pid=g.id and c.uid={$mrid} ORDER BY c.id DESC ");
            $count='';
            foreach($arr as $k=>$v){
                $prices=$v['num']*$v['price'];
                $v['prices']=$prices;
                $count=$count+$prices;
                $array[]=$v;
            }
            //展示添加的时间
            foreach($array as $k=>$v){
                $this->assign('time',date('Y/m/d H-i-s',$v['addtime']));
            }
            $this->assign('arr',$array);
            $this->assign('count',$count);

            $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
            $this->assign('username',$_SESSION['Mr_home']['mrusername']);

            $this->display();
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'请先登录再执行操作'));
        }
    }
    //删除购物车中内容
    public function delCar(){
        $id=$_GET['id'];
        if($id){
            $res=new GoodsModel();
            $num=$res->delCar($id);
            if($num){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
            }
        }
    }
    //加入购物车
    public function toCar(){
        $s=$_SESSION['Mr_home'];
        if(!$s['mrid']){
            $this->ajaxReturn(array('status'=>'no','msg'=>'请登陆后在执行操作'));
        }else{
            $arr['pid']=$_GET['id'];
            $arr['num']=$_POST['num'];
            $arr['uid']=$s['mrid'][0]['id'];
            $arr['addTime']=time();
            $res=new GoodsModel();
            $result=$res->add($arr);
            if($result){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'添加购物车成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'添加失败'));
            }
        }
    }
    //删除某个保存地址
    public function del(){
        $id=$_GET['id'];
        $res=new AddressModel();
        $num=$res->del($id);
        if($num){
            $this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
        }
    }
    //展示订单
    public function showOrder(){
        $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);
        $res=new GoodsModel();
        $arr=$res->showOrder();
        $this->arr=$arr;
        $this->display();
    }
    //写入订单详情表以及订单表
    public function order(){
       //判断是否登录
        if($_SESSION['Mr_home']['mrid']){
            //判断是否填写地址
            if($_POST['aid']){
                //判断是否购买过
                $res1=M('orderdetail');
                $where['oid']=$_POST['oid'];
                $arrOid=$res1->where($where)->select();
                if(!$arrOid){
                    //写入订单详情表
                    $arr1['oid']=$_POST['oid'];
                    $arr1['wlname']=$_POST['wlname'];
                    $arr1['pmoney']=$_POST['count'];
                    $arr1['addressid']=$_POST['aid'];
                    $arr1['mrid']=$_SESSION['Mr_home']['mrid'][0]['id'];
                    $arr1['statusid']=1;
                    $arr1['time']=$_POST['time'];
                    $arr=$_POST['pid']; //$arr是商品和该商品数量的组合键名为商品ID键值为所购买商品数量
                    $data=new GoodsModel();
                    $id=$data->toOrderDetail($arr1);
                    foreach($arr as $k=>$v){
                        $res=new GoodsModel();
                        $array=$res->detail($k);
                        foreach($array as $k1=>$v1){
                            $v1['payNum']=$v;
                            $info[]=$v1;
                        }
                    }
                    if($id){
                        //写入订单商品详情表
                        foreach($info as $key=>$val){
                            $arr2['pid']=$val['id'];
                            $arr2['oid']=$id;
                            $arr2['pnum']=$val['payNum'];
                            $arr3[]=$arr2;
                        }
                        foreach($arr3 as $k2=>$v2){
                            $data->toOrderpid($v2);
                        }
                    }
                    //输出订单详情
                    $this->assign('order',$info);
                    //输出订单编号
                    $this->assign('oid',$_POST['oid']);
                    //写出收件人地址详情
                    $result=new AddressModel();
                    $addArr=$result->sel($_POST['aid']);
                    $this->assign('addArr',$addArr);
                    //输出订单总价
                    $this->assign('count',$_POST['count']);

                    $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
                    $this->assign('username',$_SESSION['Mr_home']['mrusername']);


                    $this->display();
                }else{
                    if($arrOid[0]['statusid']>1){
                        $this->ajaxReturn(array('status'=>'re','msg'=>'该订单您已付款如想重复购买请再洗下单'));
                    }else{
                        //写入订单详情表
                        $arr1['oid']=$_POST['oid'];
                        $arr1['wlname']=$_POST['wlname'];
                        $arr1['pmoney']=$_POST['count'];
                        $arr1['addressid']=$_POST['aid'];
                        $arr1['mrid']=$_SESSION['Mr_home']['mrid'];
                        $arr1['statusid']=1;
                        $arr1['time']=$_POST['time'];
                        $arr=$_POST['pid']; //$arr是商品和该商品数量的组合键名为商品ID键值为所购买商品数量
                        $data=new GoodsModel();
                        $id=$data->toOrderDetail($arr1);
                        foreach($arr as $k=>$v){
                            $res=new GoodsModel();
                            $array=$res->detail($k);
                            foreach($array as $k1=>$v1){
                                $v1['payNum']=$v;
                                $info[]=$v1;
                            }
                        }
                        if($id){
                            //写入订单商品详情表
                            foreach($info as $key=>$val){
                                $arr2['pid']=$val['id'];
                                $arr2['oid']=$id;
                                $arr2['pnum']=$val['payNum'];
                                $arr3[]=$arr2;
                            }
                            foreach($arr3 as $k2=>$v2){
                                $data->toOrderpid($v2);
                            }
                        }
                        //输出订单详情s
                        $this->assign('order',$info);
                        //输出订单编号
                        $this->assign('oid',$_POST['oid']);
                        //写出收件人地址详情
                        $result=new AddressModel();
                        $addArr=$result->sel($_POST['aid']);
                        $this->assign('addArr',$addArr);
                        //输出订单总价
                        $this->assign('count',$_POST['count']);

                        $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
                        $this->assign('username',$_SESSION['Mr_home']['mrusername']);


                        $this->display();
                    }
                }
            }else{
                echo "选择收货地址!";
                return false;
            }

        }else{
            echo "<script>alert('请登录在执行操作')</script>";
            return false;
        }
    }

//商品列表
    public function goodsList(){
        $goods['name']=I('name');
        $goods['cid']=I('cid')?I('cid'):0;
        $obj=new GoodsModel();
        $goodsCount=$obj->getGoods($goods);
        $count=count($goodsCount);
        $page=new \Think\Page($count,12);;
        foreach($goods as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $goodsList=$obj->getGoods($goods,$page->firstRow,$page->listRows);
        $this->assign('total',$count);
        $this->assign('goodsList',$goodsList);
        $this->assign('page',$show);
        $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);
        $this->display();
    }
    //商品购买成功跳转页面
    public function orderToPay(){
        $pay=$_POST['pay'];
        $order=$_POST['order'];
        if($pay=='mb'){
            $res=M('uuser');
            $mrid=$_SESSION['Mr_home']['mrid'][0]['id'];
            $where['uname']=$mrid;
            $arr=$res->where($where)->select();
            if($arr[0]['umoney']>=$_POST['money']){
                $money=$arr[0]['umoney']-$_POST['money'];
                $data['umoney']=$money;
                $num=$res->where($where)->data($data)->save();
                if($num){
                    $info=M('orderdetail');
                    $where['order']=$order;
                    $row['statusid']=2;
                    $result=$info->where($where)->data($row)->save();
                    $info1=M('information');
                    $data1['time']=time();
                    $data1['way']=$pay;
                    $data1['money']='-'.$_POST['money'];
                    $data1['uid']=$mrid;
                    $num1=$info1->add($data1);
                    if($result && $num1){
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'支付成功'));
                    }
                }else{
                    $this->ajaxReturn(array('status'=>'no','msg'=>'支付失败,请稍后重试!'));
                }
            }else{
                $this->ajaxReturn(array('status'=>'no','msg'=>'您的MB余额不足请去我的达人充值!'));
            }
        }else{
            $info=M('orderdetail');
            $we['order']=$order;
            $row['statusid']=2;
            $result=$info->where($we)->data($row)->save();
            if($result){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'支付成功'));
            }
        }
    }


}
