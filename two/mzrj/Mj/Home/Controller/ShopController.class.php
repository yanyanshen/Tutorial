<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller{
    public function _initialize(){
        // $list=A('Home/Index')->categoryList();
        $goods=array_reverse($_SESSION['mycar_'],true);
        // print_r($goods);

        $this->assign('goods',$goods);
       // $this->assign('list',$list);


        if(session('mid')<1){
                $this->redirect('Index/index');
            }

    }

    public  function index(){
//        $id=I('get.id');
//        $num=I('get.num');
//   print_r($_SESSION);
//        $_SESSION['mycar_'][$id][0]['num']=$num;
//        print_r($_SESSION['mycar_']);

        $goods=array_reverse($_SESSION['mycar_'],true);
        //print_r($goods);
       // $this->assign('gid',$id);
//        $this->assign('num',$num);
        $this->assign('goods',$goods);
        $this->display('shop');

    }

    public  function addcar(){
        if(session('mid')){
            $id=I('post.id');
            $buynum=$_POST['buynum'];
            $obj=M('Goods');
            $goods1=$obj->where("id=$id")->find();

               $goods1['buynum']=$buynum;
               if (empty($_SESSION['mycar_'][$id])) {
                   $_SESSION["mycar_"][$id] = $goods1;
               } else {
                   $_SESSION['mycar_'][$id]['buynum']+=$buynum;
               }
            $this->assign('goods1',$goods1);
               $this->display('addcar');
        }else{
           
        }
    }


    public  function tobuy(){

        $id=I('post.id');
        $price=I('post.price');
        $buynum=I('post.buynum');
        $orderlist['mid']=session('mid');
        $orderlist['ordersyn']=date('Y-m-d',time()).substr($this->uniqStr(),0,16);
        $orderlist['order_createtime']=time();
        $orderlist['money']=$price*$buynum;


        $order=M('Order');
        $orderid=$order->add($orderlist);
        $goods=M('Goods')->where(array('id'=>$id))->find();

        $data=$goods;
        $data['gid']=$goods['id'];
        $data['buynum']=$buynum;
        $data['totaprice']=$buynum*$goods['price'];
        $data['orderid']=$orderid;
        $datalist[][]=$data;

       M('Order_goods')->add($data);
        //地址
        $addresslist=M("Address")->where(array('mid'=> session('mid')))->order('id desc')->find();
        $this->assign('addresslist',$addresslist);

        $this->assign('syn',$orderlist['ordersyn']);
        $this->assign('orderid',$orderid);
        $this->assign('ordertime',$orderlist['order_createtime']);
        $this->assign('money',$data['totaprice']);
        $this->assign('goods',$datalist);
      $this->display("Order/affirm");
    }
//删除
    public function del(){
        $id=I('get.id');
        if($id){
            unset($_SESSION['mycar_'][$id]);
        }
        $goods=array_reverse($_SESSION['mycar_'],true);
        $this->assign('goods',$goods);
       $this->display('shop');
    }


    //删除
   /* public function del(){
        $id=I('post.id');
       if($id){
           unset($_SESSION['mycar_'][$id]);
            $goods=array_reverse($_SESSION['mycar_'],true);
            $goods['status']='ok';
            $this->ajaxReturn('goods' ,$goods);
        }else{
            $goods['status']='no';
            $this->ajaxReturn('goods' ,$goods);
        }

    }*/

public function toaction(){

    if(I('get.act')=='tobuy'){
      $this->tobuy();

    }
    if(I('get.act')=='add'){
        $this->addcar();
    }
}

    function uniqStr(){
        return md5(uniqid(microtime(true)));
    }


}