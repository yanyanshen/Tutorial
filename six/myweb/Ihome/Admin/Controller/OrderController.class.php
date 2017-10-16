<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller{
/*后台管理系统订单管理列表*/
    public function orderList(){
        //实例化订单类
        $order=M('Order');
        //分页显示样式

        $count=$order->count();
        $page=new \Think\Page($count,4);
        $show=$page->show();
         //数据表联合查询
        $orderlist=$order
            ->join('ihome_member ON ihome_order.mid=ihome_member.mid')
            ->join('ihome_order_status ON ihome_order.statusid=ihome_order_status.statusid')
            ->join('ihome_goods ON ihome_order.gid=ihome_goods.gid')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        //var_dump($orderlist);
        $n=$page->firstRow;
        $this->assign('n',$n);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('num',($n+4)/4);
        $this->assign('orderlist',$orderlist);
        $this->display('Order/list');
    }

    /*订单操作*/
    public function affirm(){
        $id=trim(I('get.id'));
        $info=M('order')->where(array('id'=>$id,'statusid'=>20))->save(array('statusid'=>30));
        if($info){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'发货成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'发货失败'));
        }
    }

}