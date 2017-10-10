<?php
namespace Mobile\Controller;
use Think\Controller;
class CartController extends Controller{
    public function cart(){
        $goodsCart=array();
        $mid=session('ybc_id');
        if($mid){
            $goodsCart=M('Cart')->field('gid,goodsname,pic,price,buynum,num')
                ->join('ybc_goods ON ybc_cart.gid = ybc_goods.id')
                ->where(array('mid'=>$mid))
                ->select();
            $goodsCart=array_reverse($goodsCart);
        }else{
            foreach(array_reverse(session('mycart')) as $k=>$v){
                $gid=$v['gid'];
                $goodsCart[$k]=M('Goods')->field('id as gid,goodsname,pic,price,oldprice,num,active')->where(array('id'=>$gid))->find();
                $goodsCart[$k]['buynum']=$v['buynum'];
            }
        }
        $this->assign('goodsCart',$goodsCart);
        $this->display();
    }

//*****************删除购物车商品*********************
    public function delCart(){
        $gid=I('post.gid');
        if(session('ybc_id')){
            $mid=session('ybc_id');
            $cart=M('cart');
            $where['mid']=$mid;
            $where['gid']=$gid;
            if($cart->where($where)->delete()){
                $this->success('移除成功');
            }else{
                $this->error('移除失败');
            }
        }else{
            session("mycart.$gid",null);
            if(session("mycart.$gid")){
                $this->success('移除失败');
            }else{
                $this->success('移除成功');
            }
        }
    }

    //*****去结算按钮*****
    public function toBuy(){
        if(session('ybc_id')){
            $this->success('生成订单');
        }else{
            session('url',U('Cart/cart'));
            $this->error('未登录');
        }
    }


//***********登录时把session中商品转移到购物车**********
    public function addCart(){
        if(session('mycart')){
            $mycart=session('mycart');
            $mid=session('ybc_id');
            foreach($mycart as $v){
                $v['mid']=$mid;
                $v['addtime']=time();
                //判断购物车数据表中是否存在该用户的该商品信息
                $cart=M('Cart');
                $cart1=$cart->field('id')->where(array('gid'=>$v['gid'],'mid'=>$mid))->find();
                if($cart1){
                    $data['buynum']=array('exp',"buynum+{$v['buynum']}");
                    $data['addtime']=time();
                    $res=$cart->where(array('id'=>$cart1['id']))->save($data);
                }else{
                    $res=$cart->add($v);
                }
            }
            if($res){
                session('mycart',null);
            }
        }
    }
}