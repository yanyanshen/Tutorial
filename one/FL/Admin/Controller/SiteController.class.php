<?php
namespace Admin\Controller;
use Think\Controller;
class SiteController extends Controller{
    //订单列表页
    public function siteList(){
        $Order=M("Order");
        $Order_prod=M("Order_prod");
        $Site = M("Site");

        $map['key']=I("post.key");
        $count=$Order->count();
        if($count>0){

            $Page=new \Think\Page($count,10);
            $show=$Page->show();

            $orders=$Order->limit($Page->firstRow.','.$Page->listRows)->select();

            foreach($map as $key=>$val){
                $Page->parameter[$key]=urlencode($val);
            }

            foreach($orders as $key=>$val){
                $siteArr[]=$val['order_site'];
            }

            $wheres['site_id']=array('in',$siteArr);
            $siteList=$Site->where($wheres)->select();

            foreach($orders as $key=>$val) {
                foreach ($siteList as $k => $v) {
                    if($val['order_site']==$v['site_id']){
                        $orders[$key]['site_name']=$v['site_name'];
                        $orders[$key]['site_area']=$v['site_area'];
                        $orders[$key]['site_content']=$v['site_content'];
                        $orders[$key]['site_tel']=$v['site_tel'];
                    }
                }
            }

            $orderSend=$Order_prod->select();
           /* foreach($orders as $key=>$val){
                foreach($orderSend as $d=>$v){
                    if($val['order_feel']==$v['order_feel']){
                        if(!isset($orders[$key]['order_prod_send'])||$orders[$key]['order_prod_send']){
                            $orders[$key]['order_prod_send']=$v['order_prod_send'];
                        }
                    }
                }
            }*/

            $firstRow = $Page->firstRow;
            $this->assign("firstRow", $firstRow);
            $this->assign("page", $show);
            $this->assign("siteList", $orders);

            //$this->assign("keywords", $map['key']);  //给查询模板传值
        }


        $this->display();
    }




    public function orderDetail(){
        $Order=M("Order");
        $Order_prod=M("Order_prod");
        $Prod=M("Prod");
        $order_feel=I("get.order_feel");

        $whereo['order_feel']=$order_feel;
        $orderProds=$Order_prod->where($whereo)->select();
        foreach($orderProds as $key=>$val){
            $prodIdArr[]=$val['order_prod_id'];
        }

        $wherep['prod_id']=array('in',$prodIdArr);
        $count=$Prod->where($wherep)->count;
        $Page=new \Think\Page($count,5);
        $show=$Page->show();

        $prods=$Prod->where($wherep)->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($prods as $key=>$val){
            foreach($orderProds as $k=>$v){
                if($v['order_prod_id']==$val['prod_id']){
                    $prods[$key]['prod_num']=$v['order_num'];
                    $prods[$key]['prod_send']=$v['order_prod_send'];
                    $prods[$key]['order_pl']=$v['order_pl'];
                    $prods[$key]['order_feel']=$v['order_feel'];
                }
            }
        }

        $orderStatus=$Order->where(array('order_feel'=>$order_feel))->getField("order_status");

        $this->assign("orderStatus",$orderStatus);
        $this->assign('prods',$prods);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);
        $this->display();
    }

    public function sendProd(){
        $Order=M("Order");
//        $order_prod_id=I("get.prod_id");
        $order_feel=I("get.order_feel");
//        $whereo['order_prod_id']=$order_prod_id;
        $whereo['order_feel']=$order_feel;
        if($Order->where($whereo)->save(array('order_status'=>'已发货'))>0){
            $this->ajaxReturn('已发货');
        }else{
            $this->ajaxReturn('操作失败');
        }
    }

    public function delOrder(){
        $Order=M("Order");
        $Order_prod=M("Order_prod");
        $order_feel=I("get.order_feel");

        $orderStatus=$Order->where(array('order_feel'=>$order_feel))->getField("order_status");
        $order_prod_send=$Order_prod->where(array('order_feel'=>$order_feel))->field('order_prod_send')->select();

        foreach($order_prod_send as $key=>$val){
            if(!$val['order_prod_send']&&($orderStatus=='已付款')){
                $this->ajaxReturn("当前订单未发货完成，不能删除");
            }
        }

        $Order->where(array('order_feel'=>$order_feel))->delete();
        $Order_prod->where(array('order_feel'=>$order_feel))->delete();
        $this->ajaxReturn("删除成功");

    }

}