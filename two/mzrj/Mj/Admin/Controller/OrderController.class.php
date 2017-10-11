<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
    public function index(){
        $this->display('order');
    }


    public function fenye()
    {
        $p=I('get.p');
        $key=I('get.key');
        if(isset($key)&& !empty($key)){
            $message['ordersyn']=array('like',"%".$key."%");
        }
        $count=M('Order')->where($message)->count();
        $page = new \Think\Page($count, 8);
       /* $goods = M('')->query("select o.oid,o.order_createtime,m.username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where  o.mid=m.id and  o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.ordersyn {$m} limit {$page->firstRow},{$page->listRows} ");*/
        $g=M('Order');
      $goods=$g->join('mj_member ON mj_member.id = mj_order.mid')->join('mj_order_status ON mj_order_status.sid = mj_order.status') ->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
        $show = $page->show();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist',$goods);
        $this->assign('firstRow', $page->firstRow);
        $this->display('order');
    }
    public  function detail(){
        $oid=I('get.oid');
        $message['oid']=$oid;

        $g=M('Order');
        $goods=$g->join('mj_member ON mj_member.id = mj_order.mid')->join('mj_order_status ON mj_order_status.sid = mj_order.status')->join('mj_address ON mj_address.mid=mj_member.id')->join('mj_order_goods ON mj_order_goods.orderid=mj_order.oid')->join('mj_goods ON mj_goods.id=mj_order_goods.gid') ->where($message)->select();
       //$goods=M()->query("select d.price,d.goodsname,o.money,d.picname,g.buynum,o.order_createtime,m.username,totaprice,o.ordersyn,s.order_status,a.city,a.town,a.mobile,a.shr from  mj_address as a,mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where o.mid=m.id and o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.aid=a.id  and  o.oid=$oid" );

//print_r($goods);
      $detail=$goods[0]['province'].$goods[0]['city'].$goods[0]['town'];
      $this->assign('username',$goods[0]['username']);
      $this->assign('detail',$detail);
      $this->assign('shr',$goods[0]['shr']);
      $this->assign('mobile',$goods[0]['mobile']);
      $this->assign('username',$goods[0]['username']);
      $this->assign('createtime',$goods[0]['order_createtime']);
      $this->assign('ordersyn',$goods[0]['ordersyn']);
      $this->assign('status',$goods[0]['order_status']);
      $this->assign('goods',array_reverse($goods));
        $this->display();
    }


    //已支付订单
    public function pay(){
        $p=I('get.p');
        $key=I('get.key');
        if(isset($key)&& !empty($key)){
            $message['ordersyn']=array('like',"%".$key."%");

        }
        $message['status']=20;
        $count=M('Order')->where($message)->count();
        $page = new \Think\Page($count, 2);
        /* $goods = M('')->query("select o.oid,o.order_createtime,m.username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where  o.mid=m.id and  o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.ordersyn {$m} limit {$page->firstRow},{$page->listRows} ");*/
        $g=M('Order');
        $goods=$g->join('mj_order_goods ON mj_order.oid = mj_order_goods.orderid') ->join('mj_member ON mj_member.id = mj_order.mid')->join('mj_order_status ON mj_order_status.sid = mj_order.status') ->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
        $show = $page->show();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist',$goods);
        $this->assign('firstRow', $page->firstRow);
        $this->display('pay');
    }
    public  function paydetail(){
        $oid=I('get.oid');
       // $goods=M()->query("select price,goodsname,money,picname,buynum,order_createtime,username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m
       //                    where o.mid=m.id and o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.oid=$oid order by o.order_createtime desc");

       $goods=M()->query("select goodsname,price,buynum,order_createtime,ordersyn,username,totaprice,order_status from mj_goods as g ,mj_order as o,mj_order_goods as og,mj_order_status as os,mj_member as m,
                          where g.id=og.gid and o.oid=og.orderid and o.mid=m.id and o.status=os.sid and o.oid=$oid");
       /* $arr=M('Address')->where(array('mid'=>session('mid')))->find();
        print_r($goods);*/
        $this->assign('username',$goods[0]['username']);
        $this->assign('createtime',$goods[0]['order_createtime']);
        $this->assign('ordersyn',$goods[0]['ordersyn']);
        $this->assign('status',$goods[0]['order_status']);
        $this->assign('goods',array_reverse($goods));
        $this->display();
    }


    public function send(){
        $p=I('get.p');
        $key=I('get.key');
        if(isset($key)&& !empty($key)){
            $message['ordersyn']=array('like',"%".$key."%");

        }
        $message['status']=30;
        $count=M('Order')->where($message)->count();
        $page = new \Think\Page($count,5);
        /* $goods = M('')->query("select o.oid,o.order_createtime,m.username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where  o.mid=m.id and  o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.ordersyn {$m} limit {$page->firstRow},{$page->listRows} ");*/
        $g=M('Order');
        $goods=$g->join('mj_order_goods ON mj_order.oid = mj_order_goods.orderid') ->join('mj_member ON mj_member.id = mj_order.mid')->join('mj_order_status ON mj_order_status.sid = mj_order.status') ->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
        $show = $page->show();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist',$goods);
        $this->assign('firstRow', $page->firstRow);
        $this->display('');
    }
    public  function senddetail(){
        $oid=I('get.oid');
        $goods=M()->query("select price,goodsname,money,picname,buynum,order_createtime,username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where o.mid=m.id and o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.oid=$oid");

        $this->assign('username',$goods[0]['username']);
        $this->assign('createtime',$goods[0]['order_createtime']);
        $this->assign('ordersyn',$goods[0]['ordersyn']);
        $this->assign('status',$goods[0]['order_status']);
        $this->assign('goods',array_reverse($goods));
        $this->display();
    }

    public function finish(){
        $p=I('get.p');
        $key=I('get.key');
        if(isset($key)&& !empty($key)){
            $message['ordersyn']=array('like',"%".$key."%");

        }
        $message['status']=40;
        $count=M('Order')->where($message)->count();
        $page = new \Think\Page($count,5);
        /* $goods = M('')->query("select o.oid,o.order_createtime,m.username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where  o.mid=m.id and  o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.ordersyn {$m} limit {$page->firstRow},{$page->listRows} ");*/
        $g=M('Order');
        $goods=$g->join('mj_order_goods ON mj_order.oid = mj_order_goods.orderid') ->join('mj_member ON mj_member.id = mj_order.mid')->join('mj_order_status ON mj_order_status.sid = mj_order.status') ->where($message)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();

        $show = $page->show();
        $map['key'] = I('get.key');
        foreach ($map as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }

        $this->assign('count',$count);
        $this->assign('p',$p);
        $this->assign('page', $show);
        $this->assign('goodslist',$goods);
        $this->assign('firstRow', $page->firstRow);
        $this->display('');
    }
    public  function findetail(){
        $oid=I('get.oid');
        $goods=M()->query("select price,goodsname,money,picname,buynum,order_createtime,username,totaprice,ordersyn,order_status from mj_order as o,mj_order_goods as g,mj_goods as d,mj_order_status as s,mj_member as m where o.mid=m.id and o.oid=g.orderid and g.gid=d.id and o.status=s.sid and o.oid=$oid");

        $this->assign('username',$goods[0]['username']);
        $this->assign('createtime',$goods[0]['order_createtime']);
        $this->assign('ordersyn',$goods[0]['ordersyn']);
        $this->assign('status',$goods[0]['order_status']);
        $this->assign('goods',array_reverse($goods));
        $this->display();
    }

public function sends(){

    if(IS_GET){
        $oid=I('get.oid');
        $order=M('Order');
        $data['status']=30;
        $data['sendtime']=time();
        $id=$order->where("oid=$oid")->save($data);
        if($id>0){
            $this->success("发货成功");
        }
    }
}

public function del(){
    if(IS_GET){
        $oid=I('get.oid');
        $order=M('Order');
        $id=$order->where(array("oid"=>$oid))->delete();
        $order_goods=M('Order_goods');
        $cid=$order_goods->where(array("orderid"=>$oid))->delete();
        if($id && $cid){
            $this->success('删除成功');
        }
    }

}

}