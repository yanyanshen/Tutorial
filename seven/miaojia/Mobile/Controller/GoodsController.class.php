<?php
namespace Mobile\Controller;
use Mobile\Model\CartModel;
use Mobile\Model\GoodsModel;
use Mobile\Model\GoodsscModel;
use Mobile\Model\PingjiaModel;
use Think\Controller;
use Think\Page;
class GoodsController extends Controller {
    public function index(){

    }
    public function detail(){
        $cateList=F('firstCate/cate');
        $obj=new GoodsModel();
        $goodsinfo=$obj->detail(I('id'));
        $cart=new CartModel();
        $cartList=$cart->getAllCartByUid(session('uid'));
        $sc=new GoodsscModel();
        $goodsSc=$sc->getScByUid();
        $cartid=$cart->getAllCartId();
        if(empty($goodsinfo)){
            $this->error("对不起，此商品不存在或已下架，请选择其他商品");
        }
        foreach(explode(',',$goodsinfo['image']) as $k=>$v){
            $goodsimage[$k]=$v;
        }
        foreach(explode(',',$goodsinfo['goodsargs']) as $k=>$v){
            $goodsargs[$k]=$v;
        }

        $pjobj=new PingjiaModel();
        $pjList=$pjobj->getPjByGid(I('id'));
        $this->assign('goodsinfo',$goodsinfo);
        $this->assign('pjList',$pjList);
        $this->assign('goodsargs',$goodsargs);
        $this->assign('cartList',$cartList);
        $this->assign('goodsSc',$goodsSc);
        $this->assign('cartid',$cartid);
        $this->assign('cateList',$cateList);
        $this->assign('goodsimage',$goodsimage);
        $this->display();
    }

    public function order(){
        $this->chkSession();
        $this->display();
    }
    //商品列表
    public function goodsList(){
        $goods['goodsname']=I('goodsname');
        $goods['cid']=I('cid')?I('cid'):0;
        $obj=new GoodsModel();
        $goodsCount=$obj->getGoods($goods);
        $count=count($goodsCount);
        $page=new Page($count,12);
        foreach($goods as $k=>$v){
            $page->parameter[$k]=$v;
        }
        $show=$page->show();
        $goodsList=$obj->getGoods($goods,$page->firstRow,$page->listRows);
        if(session('username')){
            $user=new \Home\Model\UserModel();
            $meminfo=$user->meminfo(session('username'));
            $this->assign('meminfo',$meminfo);
        }
        $this->assign('goodsList',$goodsList);
        $this->assign('page',$show);
        $this->display();
    }
}