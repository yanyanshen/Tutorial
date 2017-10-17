<?php
namespace Mobile\Controller;
use Mobile\Model\CartModel;
use Think\Controller;
use Think\Page;

class CartController extends Controller{
    public function _initialize(){
        $this->chkSession();
    }
    public function addToCart(){
        $this->chkSession();
        $data=I('post.');
        $data['uid']=session('uid');
        $obj=new CartModel();
        if($obj->addToCart($data)){
            echo "商品已成功加入购物车";
        }else{
            echo "添加购物车失败";
        }
    }
    //渲染购物车模板
    public function cart(){
        $obj=new CartModel();
        $cart=$obj->getAllCartByUid(session('uid'));
        $count=count($cart);
        $page=new Page($count,10);
        $show=$page->show();
        $cartList=$obj->getAllCartByUid(session('uid'),$page->firstRow,$page->listRows);
        $this->assign('cartList',$cartList);
        $this->assign('page',$show);
        $this->display();
    }

    //删除购物车
    public function delCart(){
        $cart['gid']=I('gid')?I('gid'):0;
        $cart['uid']=session('uid');
        $cart['goodsargs']=I('goodsargs');
        $obj=new CartModel();
        if($obj->delCart($cart)){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }

    //更新购物车
    public function saveCart(){
        $data=I('post.data');
        foreach($data as $k=>$v){
            if($v['name']=='saveCartPro'){
                $cart[]=$v['value'];
            }
        }
        foreach($cart as $k=>$v){
                $lscart=explode(',',$v);
                $cartInfo[$k]['gid']=$lscart[0];
                $cartInfo[$k]['goodsargs']=$lscart[1];
                $cartInfo[$k]['buynum']=$lscart[2];
            }
        foreach($cartInfo as $v){
            $obj=new CartModel();
            $obj->saveCart($v);
        }
    }

    //加入收藏
    public function addToSc(){
        $data['uid']=session('uid');
        $data['gid']=I('gid');
        $obj=new CartModel();
        $res=$obj->addToSc($data);
        if($res){
            echo "成功加入收藏";
        }elseif($res===0){
            echo "已收藏过此商品,无需再次收藏";
        }else{
            echo "加入收藏失败";
        }
    }
}