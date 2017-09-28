<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
//    查询返回所有订单订单
    public function ordera(){
        $order=D('order');
        $r=$order->select();
        return $r;
    }
//    分页
    public function page($n){
        $Page       = new \Think\Page($n,10);
        $Page -> setConfig('header','共%TOTAL_ROW%条');
        $Page -> setConfig('first','首');
        $Page -> setConfig('last','共%TOTAL_PAGE%页');
        $Page -> setConfig('prev','<<');
        $Page -> setConfig('next','>>');
        $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        return $Page;
    }
//    查询指定订单
    public function orderb($e){
        $order=D('order');
        $s=array('order_feel'=>$e);
        $r=$order->where($s)->select();
        return $r;
    }
    public function index(){
        if(IS_POST){
          $e=  trim($_POST['feel']);
            $r=$this->orderb($e);
        }else{
            $r=$this->ordera();
        }

        $e=count($r);
       $page= $this->page($e);
        $show=$page->show();
        $this->assign('order',$r);
        $this->assign('page',$show);
        $this->assign('fast',$page->listRows);
        $this->assign('end',$page->firstRow);
        $this->display();
    }
}