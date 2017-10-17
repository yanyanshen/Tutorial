<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\CartModel;
use Mobile\Model\GoodsDetailModel;
use Mobile\Model\GoodsModel;
use Mobile\Model\History;
class GoodsController extends Controller {
    public function category(){
    	$this->cate();
      	$this->display();
    }
    public function details(){
        $obj=new GoodsDetailModel();
        $goodsinfo=$obj->getgoodsinfo(I("get.id"));
        // $history=D('history');
        // $info3=$history->getHistory();
        $goods_id=I('id');
        // print_r($goods_id);

        $user = D('users');
        $ordergoods = D('ordergoods');
        $order = D('order');
        $pingjia = D('pingjia');
        $lev=I('level');
        $level=isset($lev)?$lev:0;
        if($level==0){
            $level="level";
        }elseif($level==3){
            $level="3,4,5";
        }
        
        $data = $pingjia->field("createtime,pjtime,sk_users.username as username,sk_users.avatar as images,pingjia,sk_pingjia.`return`,sk_pingjia.`level`,gid,sk_pingjia.id as id")->join("sk_order on sk_pingjia.oid=sk_order.id")
            ->join("sk_users on sk_pingjia.uid=sk_users.id")
            ->where("gid=".$goods_id." and level in(".$level.")")->order('sk_pingjia.id desc')->select();
        // print_r($data);

        $str="";
        foreach($data as $k1=>$v1){
            $arr=str_split($v1["username"]);
            $str.=reset($arr);
            $str.="****";
            $str.=end($arr)."(匿名)";
            $data[$k1]["username"]=$str;
            $str="";
            $cou=M("userful")->field("count(sk_userful.id) as userful")->join("sk_pingjia on sk_userful.pid=sk_pingjia.id")->where("status=1 and gid=".$v1["gid"])->find();
            $data[$k1]["userful"]=$cou["userful"];
        }

        $this->assign('data',$data);
        
        $this->assign("goodsinfo",$goodsinfo);
        $this->display();
    }
    public function goodsList(){
        $goods=D('goods');
        $obj=new GoodsModel();
        $info=$obj->search();
        $this->assign('info',$info);
    	$this->display();
    }
    public function seckill(){
    	$this->display();
    }


    public function cate(){
    $a=D('Category');

    $cateList=$a->Cate();
    // print_r($cateList);
    $this->assign("Cate",$cateList);
    // $this->show();
    // $this->hot();
    // $this->showtwo($pid=0,$x=0,$y=2);

}




    //提交订单页面
    public function submitOrder(){

        //选择收货地址
        if(I('get.aid')){
            $address=M('address')->where(array('id'=>I('get.aid')))->field("name,mobile,address,detailaddress")->find();
            $this->assign('address',$address);
        }else{
            $uid=M('users')->where(array("username"=>session("username")))->field('id')->find();
            $address=M('address')->where(array("uid"=>$uid['id']))->where(array('setdefault'=>1))->field("id,name,mobile,address,detailaddress")->find();
            $this->assign('address',$address);
        }

        //遍历商品
        $goodsAll=I('post.');
        foreach($goodsAll['gid'] as $k=>$v){
            $goodsinfo=M('goods')->where(array('id'=>$v))->find();
            $goodslist[$k]['goodsname']=$goodsinfo['goodsname'];
            $goodslist[$k]['image']=$goodsinfo['image'];
            $goodslist[$k]['gid']=$v;
            $goodslist[$k]['price']=$goodsAll['price'][$k];
            $goodslist[$k]['buynum']=$goodsAll['buynum'][$k];
        }
        $totalprice=$goodsAll['totalprice'];
//        print_r($goodslist);
        $this->assign("totalprice",$totalprice);
        $this->assign('goodslist',$goodslist);
        $this->display();
    }

    //订单提交
    public function submit(){
        $obj=new GoodsModel();
        $date=I("post.");
        $rel=$obj->ordersubmit($date);
        if($rel){
            $this->success("订单提交成功",$rel);
        }else{
            $this->error("订单提交失败，请稍候再试");
        }
    }
       // 浏览记录
    public function history(){
        $history=D('goods');
        if(isset($_SESSION['uid'])&&$_SESSION['uid']>0){

            $res=$history->history();
           
        }else{
            if(isset($_SESSION['history'][I('id')])&&$_SESSION['history'][I('id')]>0){
                $_SESSION['history'][I('id')]['addtime']=time();
            }else{
                $_SESSION['history'][I('id')]=array("gid"=>I('id'),"addtime"=>time());
                
            }
        }
    }
}
