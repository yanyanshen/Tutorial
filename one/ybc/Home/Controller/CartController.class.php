<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller{
    //******获取购物车商品列表*****
    public function cart(){
        $goodsCart=array();
        $mid=session('ybc_id');
        if($mid){
            $goodsCart=D('Cart')->getCartList($mid);
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

//*****************删除购物车商品*********************
    public function delCart(){
        $gid=explode(',',I('post.gid'));
        if(session('ybc_id')){
            $mid=session('ybc_id');
            $cart=M('cart');
            $where['mid']=$mid;
            $where['gid']=array('IN',$gid);
            if($cart->where($where)->delete()){
                $this->success('移除成功');
            }else{
                $this->error('移除失败');
            }
        }else{
            foreach($gid as $k){
                session("mycart.$k",null);
                if(session("mycart.$k")){
                    $this->success('移除失败');
                }else{
                    $this->success('移除成功');
                }
            }
        }
    }
    //*****去结算*****
    public function toBuy(){
        if(session('ybc_id')){
            $this->success('生成订单');
        }else{
            session('url',U('Cart/cart'));
            $this->error('未登录');
        }
    }

    public function getNum(){
        $mid=session('ybc_id');
        if($mid){
            $goodsNum=D('Cart')->field('SUM(buynum) as num')->where("mid=$mid")->select();
            $this->success($goodsNum[0]['num']);
        }else{
            $goodsNum=session("mycart");
            $num=0;
            foreach($goodsNum as $v){
                $num+=$v['buynum'];
            }
            $this->success($num);
        }
    }
    public function getMyCart(){
        $mid=session('ybc_id');
        if($mid){//判断是否登录
            $cart=M('cart');
            $where['mid']=$mid;
            $cartinfo=$cart->alias('c')->join("ybc_goods g on g.id=c.gid")->where($where)->field("g.id,price,goodsname,pic,buynum,c.addtime as addtime")->order('addtime desc')->select();
            if($cartinfo){
                $this->success($cartinfo);
            }else{
                $this->error();
            }
        }else{
            $goods=M('goods');

            if(session("mycart")){
                $arr=array_reverse(session("mycart"));
                foreach($arr as $k=>$v){
                    $cartinfo[$k]=$goods->where(array('id'=>$v['gid']))->field("id,price,goodsname,pic")->find();
                    $cartinfo[$k]['buynum']=$v['buynum'];
                }
                $this->success($cartinfo);
            }else{
                $this->error();
            }

        }

    }
}