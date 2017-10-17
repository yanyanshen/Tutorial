<?php
namespace Home\Controller;
use Think\Controller;
class MemberOrderController extends Controller{
    public function order_list(){
        //加载标题：
        $title="淘书网-用户中心-我的订单-订单列表";
        $this->assign("title",$title);
        //购物车列表：
        $data=M('order');
        $orderList=$data->select();
        $this->assign("orderList",$orderList);
        //显示页面：
        $this->display();
    }
    public function order_detail(){
        //订单详情：
        $id=I('get.id');
        if(M('goods')->where('id='.$id)->select()){
            $this->redirect(U('Home/Detail/order_detail'));
        }
    }
    public function order_delete(){
        //订单删除：
        $data = M('order');
        $id = I('get.id');
        if ($data->where('id='.$id)->delete()) {
            echo "<script>alert('删除成功！');window.location.href='/Home/MemberOrder/order_list'</script>";
        } else {
            echo "<script>alert('删除失败！');window.location.href='/Home/MemberOrder/order_list'</script>";
        }
    }
}
