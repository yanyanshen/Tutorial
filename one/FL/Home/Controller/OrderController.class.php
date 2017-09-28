<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15
 * Time: 14:28
 */
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
class OrderController extends Controller{
    public function cart($e){
        $prod=D('prod');
        if($id=$_SESSION['fl_home']['mid']){


            if($e['act']){
                $cart='';
                if($e['chk']){
                    for($i=0;$i<=count($e['chk'])-1;$i++){
                        $cart[]=$e['chk']["$i"];
                    }
                }else{
                    $cart[]=$e['prod_id'];
                }
                foreach($cart as $key=>$val){
                    $number[$val]=$e["num_$val"];
                }

                foreach($_SESSION["cart_$id"] as $key=>$val){
                    foreach($number as $key1=>$val1){
                        if($key1==$val[0]['prod_id']){
                            $val[0]['num']=$val1;
                            $aa[]=$val[0];
                        }
                    }
                }

            }else{
                $pid=$e['chk'][0];
                $num=$e["num_$pid"];
                if($_SESSION["cart_$id"]["$pid"]){
                    if($_SESSION["cart_$id"]["$pid"][0]["num"]<200){
                        $_SESSION["cart_$id"]["$pid"][0]["num"]=$_SESSION["cart_$id"]["$pid"][0]["num"]+$num;
                    }

                }else{
                    $pa=$prod->where("prod_id=$pid")->select();
                    $pa[0]['num']=$num;
                    $_SESSION["cart_$id"]["$pid"]=$pa;
                }

                foreach($_SESSION["cart_$id"] as $key=>$val){
                    $aa[]=$val[0];
                }
            }

            return $aa;
        }else{
            $this->redirect('Custom/login');
        }



    }
    public function index(){
        $cid=$_SESSION['fl_home']['mid'];
        $cu=D('site');
        if($cid){

             $user= new UserController;
            if(IS_GET){
                $id=$_GET['site_id'];
                $user->sitee($id);
            }else{
                $this->assign('num',$_POST);
                $x=$this->cart($_POST);
            }

            $z=$cu->where("site_custom_id=$cid")->select();
            if($z){
                $e=$cu->where(array('site_custom_id'=>$_SESSION['fl_home']['mid'],'site_m'=>'site'))->select();
                $this->assign('site',$z);

            }else{
    //            $this->assign('s','<script>layer.alert("请先设置收货地址");</script>');

            }

            $this->assign('cart',$x);

            if($e){
                $this->assign('sit',$e);
            }else{
                $this->assign('sit','未设置默认地址');
            }
            if($_POST['act']){
                $this->display();
            }elseif(IS_GET){
                $this->ajaxReturn('设置成功');
            }else{
                $this->redirect("User/cart");
            }

        }else{
            $this->redirect('Custom/login');
        }
    }
    public function orderc(){
        $prod=D('order_prod');
        $pr=D('prod');
        $site=D('site');
        $or=D('order');
        $custom=D('custom');
        $mid=$_SESSION['fl_home']['mid'];
        $cus=$custom->where("custom_id=$mid")->select();
        $si=$site->where(array('site_custom_id'=>"$mid","site_m"=>'site'))->select();
        $d=date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $order['order_feel']=$d;                                                //订单号
        $order['order_date']=time();                                            //订单时间
        $order['order_custom_id']=$mid;                                         //下单用户ID
        $order['order_custom_name']=$cus[0]['custom_username'];                 //下单用户用户名
        $order['order_custom_pic']=$cus[0]['custom_pic'];                       //下单用户头像
        $order['order_tot']=$_POST['tot'];                                      //下单总价
        $order['order_site']=$si[0]['site_id'];                                 //地址
        $or->add($order);
        for($i=1;$i<count($_POST);$i++){
             $data['order_num']=$_POST[$i][0]  ;                                //数量
            $data['order_prod_id']=$_POST[$i][1]     ;                          //商品ID
           unset( $_SESSION["cart_$mid"][$data['order_prod_id']]);              //释放购物车中数据
            $data['order_price']= $_POST[$i][2];                            //商品单价
            $data['order_feel']=$d;                                             //订单号
            $prod->add($data);
            $data='';
        }

        $this->redirect('Order/orderz',array('order_feel'=>$d));
    }
    public function orderz(){
        $this->assign('feel',$_GET['order_feel']);
        $this->display();

    }
    public function orderx(){
        $mid=$_SESSION['fl_home']['mid'];

        if($mid){
        $order_prod=D('order_prod');
        $site=D('site');
        $order=D('order');
        $prod=D('prod');
        $feel=$_GET['order_feel'];
        $z=$order->where("order_feel=$feel")->select();

        $status['order_status']="已付款";
        $order->where("order_feel=$feel")->save($status);
        $c=$order_prod->where("order_feel=$feel")->select();
        $o='';
        for($i=0;$i<count($c);$i++){
           $o=$o.$c[$i]['order_prod_id'].',';
        }
        $where['prod_id']=array('in',$o);

        $d=$prod->where($where)->select();
        for($i=0;$i<count($d);$i++){
            $d[$i]['order']=$c[$i];
        }
        $sit=  $z[0]['order_site'];
        $sitt=$site->where("site_id=$sit")->select();
        $z[0]['s']=$sitt;
        $this->assign('order',$z);
        $this->assign('prod',$d);
        $this->display();

    }else{
            $this->redirect('Custom/login');
        }
    }



}
