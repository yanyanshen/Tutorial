<?php
namespace Home\Controller;
use Home\Model\CartModel;
use Home\Model\GoodsscModel;
use Think\Controller;
use Think\Exception;
use Think\Page;

class CartController extends Controller{
    public function _initialize(){
        if(!session('uid')){
            $this->error('您尚未登录!',U('User/login'));
        }
    }
    public function addToCart(){
        $data=I('post.');
        $data['uid']=session('uid');
        $obj=new CartModel();
        if($obj->addToCart($data)){
            echo "成功加入购物车";
        }else{
            echo "添加购物车失败";
        }
    }
    //渲染购物车模板
    public function shopping(){
        $firstCate=F('firstCate/cate');
        $obj=new CartModel();
        $cart=$obj->getAllCartByUid(session('uid'));
        $count=count($cart);
        $page=new Page($count,10);
        $show=$page->show();
        $cartList=$obj->getAllCartByUid(session('uid'),$page->firstRow,$page->listRows);
        $goodssc=new GoodsscModel();
        $userSc=$goodssc->getScByUid();
        $cartCount=count($cart);
        $this->assign('cartList',$cartList);
        $this->assign('cartCount',$cartCount);
        $this->assign('userSc',$userSc);
        $this->assign('firstCate',$firstCate);
        $this->assign('page',$show);
        $this->display();
    }

    //删除购物车
    public function delCart(){
        $cart['gid']=I('gid');
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
            if($v['buynum']<=0){
                throw new Exception("购买数量非法");
            }else{
                $obj=new CartModel();
                $obj->saveCart($v);
            }
        }
    }

    //加入收藏
    public function addToSc(){
        $data['uid']=session('uid');
        $data['gid']=I('gid');
        $obj=new CartModel();
        if($obj->addToSc($data)){
            echo "成功加入收藏";
        }else{
            echo "加入收藏失败";
        }
    }
}