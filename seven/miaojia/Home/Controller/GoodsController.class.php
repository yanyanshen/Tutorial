<?php
namespace Home\Controller;
use Home\Model\CategoryModel;
use Home\Model\GoodsModel;
use Home\Model\CartModel;
use Home\Model\PingjiaModel;
use Think\Controller;
use Think\Page;
header("Content-type:text/html;charset=utf8");
class GoodsController extends Controller{
    public function detail(){
        $firstCate=F('firstCate/cate');
        $id=I('id');
        $obj=new GoodsModel();
        $detail=$obj->detail($id);

        $category=new CategoryModel();
        $catePath=$category->getCateFromCid($detail['cid']);

        $pjobj=new PingjiaModel();
        $pjList=$pjobj->getPjByGid($id);

        if(empty($detail)){
            $this->error("对不起，此商品不存在或已下架，请选择其他商品");
        }
        $hot_tj=$obj->hot_tj();
        $detailimage=explode(',',$detail['image']);
        $goodsargs=explode(',',$detail['goodsargs']);
        $cart=new CartModel();
        $cartCount=count($cart->getAllCartByUid(session('uid')));
        $this->assign('cartCount',$cartCount);
        $this->assign('detailimage',$detailimage);
        $this->assign('goodsargs',$goodsargs);
        $this->assign('catePath',$catePath);
        $this->assign('pjList',$pjList);
        $this->assign('detail',$detail);
        $this->assign('firstCate',$firstCate);
        $this->assign('hot_tj',$hot_tj);
        $this->display();
    }
    public function order(){
        $this->chkSession();
        $this->display();
    }
    //商品列表
    public function goodsList(){
        $firstCate=F('firstCate/cate');
        $goods['goodsname']=I('goodsname')?I('goodsname'):'';
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
        $cart=new CartModel();
        if($goods['goodsname']==''){
            $category=new CategoryModel();
            $catePath='当前位置:'.$category->getCateFromCid($goods['cid']);
        }else{
            $catePath='您搜索的:'.$goods['goodsname'].',有以下商品';
        }
        $cartCount=count($cart->getAllCartByUid(session('uid')));
        $this->assign('cartCount',$cartCount);
        $this->assign('catePath',$catePath);
        $this->assign('goodsname',$goods['goodsname']);
        $this->assign('goodsList',$goodsList);
        $this->assign('firstCate',$firstCate);
        $this->assign('page',$show);
        $this->display();
    }
}