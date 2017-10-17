<?php
namespace Admin\Controller;
use Admin\Model\OrderModel;
use Think\Controller;
use Think\Page;


class   OrderController extends Controller{
    /*public function _initialize(){
        if(!session('admin')){//如果没登录  就必须在登录界面
            $this->redirect('Admin/Login/login');
        }
    }*/

    public  function orderList(){
        $obj=new OrderModel();
        $oid=I('oid');//获取查询用的订单编号
        $status=I('get.status');

        //分页设置
        $order=$obj->getOrderList($status,$oid);
        $count=count($order);//查询总记录数
        $Page=new Page($count,10);//总记录数，和  每页显示的记录数
        $Page->rollPage=3;//控制显示的页数
        $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('end','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $Page->parameter=array('oid'=>$oid,'status'=>$status);//查询的时候将查询条件作为参数传入URL地址
        $show=$Page->show();//显示分页
        $nowpage=I('p');//获取当前页 ,,序号需要用到
        //查询数据
        $orderlist=$obj->getOrderList($status,$oid,$Page->firstRow,$Page->listRows);
        $this->assign('orderlist',$orderlist);
        $this->assign('status',$status);//判断当前页面位置
        $this->assign('oid',$oid);//保留上一个查询到value里面
        $this->assign('Page',$show);
        $this->assign('nowpage',$nowpage);//获取当前页
        $this->assign('empty',"<div class='empty'>没有相关数据！</div>");
        $this->display();
    }
    public  function orderEdit(){
        $obj=new OrderModel();
        $ordersyn=I('ordersyn');
        $status=I('get.status');
        $order=$obj->sendinfo($ordersyn);
        $this->assign("status",$status);
        $this->assign("order",$order);
        $this->display();
    }
    public function orderSearch(){  //订单搜索

    }

    public function orderDel(){  //订单删除
        $orderDel=new OrderModel();
        $id=I('id');
        echo $orderDel->orderDel($id);

    }

    //发货处理
    public function send(){
        $obj=new OrderModel();
        if($obj->send(I('ordersyn'))!==false){
            echo $this->success('发货成功');
        }else{
            echo $this->error('发货失败');
        }
    }


    //新订单提醒
    public function ordernews(){
        $rel=M('order')->where(array('tx'=>1))->field('ordersyn')->select();
        if($rel&&session('ordernews')){
            echo json_encode($rel);
        }else{
            echo false;
        }
    }
    //清除session
    public function clearSession(){
        session('ordernews',null);
    }

    /*public function orderold(){
        $date['tx']=0;
        $rel=M('order')->where('id=id')->save($date);
    }*/
}