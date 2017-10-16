<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller{
//商城购物车控制器  加入 删除
//我写了一个addcar.css 在public home style里面
    //购买商品加入购物车
    public function addtoCart(){
        //根据post方式提交的gid 查找商品信息
        $goods=M('Goods');
        $res=$goods->where(array('gid'=>I('post.gid')))->getField('issale');
        $buynum=I('post.buynum');
        //判断商品是否存在
        if($res==1){
            //商品在售
            //判断用户是否登录
            if(empty($_SESSION['mid'])){
                //未登录状态
                $data['mid']=0;
            }else{
                //登录状态
                $data['mid']=$_SESSION['mid'];
            }
            //查找购物车里面是否已有该商品
            $cart=M('Cart');
            //获取购物车信息id
            $arr1=$cart->where(array('gid'=>I('post.gid'),'mid'=>$data['mid']))->find();
            if($arr1['id']){
                //购物车里面已有该商品
                $data['buynum']=$buynum+$arr1['buynum'];
                //将改变信息写入数据库
                $cart->where(array('gid'=>I('post.gid')))->data($data)->save();
            }else{
                //购物车里面没有该商品
                //根据gid从商品数据表里面查找信息
                $arr=$goods->where(array('gid'=>I('post.gid')))->find();
                $data['gid']=I('post.gid');
                $data['buynum']=I('post.buynum');
                $data['goodsname']=$arr['goodsname'];
                $data['color']=$arr['color'];
                $data['price']=$arr['price'];
                $data['pic']=$arr['pic'];
                //将信息写入购物车数据库
                $cart->data($data)->add();
            }
        }else{
            //商品已下架
            $this->error('您购买的商品已售完');
        }
        //展示添加购物车成功信息
        $da=$goods->where(array('gid'=>I('post.gid')))->select();
        foreach($da as $v){
            $this->assign('goodsname',$v['goodsname']);
            $this->assign('price',$v['price']);
            $this->assign('color',$v['color']);
            $this->assign('pic',$v['pic']);
        }
        $this->assign('buynum',I('post.buynum'));
        $this->display('Cart/addcar');
    }

    //展示购物车信息
    public function showCart(){
        //判断用户是否登陆
        if(empty($_SESSION['mid'])){
            $mid=0;
        }else{
            $mid=$_SESSION['mid'];
        }
        //依据用户Mid 查找购物车信息
        //列表分页显示
        $count=M('Cart')->where(array('mid'=>$mid))->count();
        $page=new \Think\Page($count,5);
        $show=$page->show();
        $cartlist=M('Cart')->where(array('mid'=>$mid))->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('cartlist',$cartlist);
        $this->assign('page',$show);
        $this->display('mycart');
    }

    //删除购物车商品
    public function delCart(){
            $res=M("Cart")->where(array('id'=>I('get.id')))->delete();
            if($res){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
    }

/*商城支付控制器*/
    public function pay(){
        //判断用户是否登陆 登陆了进订单页面 没登录进登录页面，登录后跳转到订单页面
        if(empty($_SESSION['mid'])){
        }
        //收货地址展示
        $data['mid']=session('mid');
        $adress=M('Adress');
        $adressInfo=array_reverse($adress->where($data)->select());
        $this->assign('adressInfo',$adressInfo);
        $goods=M('Goods');
        $da['gid']=$_POST['gid'];
        $buynum=$_POST['buynum'];
        $goodsList=$goods->where($da)->select();
        $this->assign('sum',$buynum*$goodsList['0']['price']);
        $this->assign('goodsList',$goodsList);
        $this->assign('buynum',$buynum);
        $this->display('Cart/pay');
    }

    /*提交订单控制器*/
    public function submit_order(){
        if(IS_POST){
            $order=M('Order');
            $data['ordersyn']=date("Y-m-d",time()).md5(mt_rand(99,9999));
            $data['mid']=session('mid');
            $data['gid']=$_POST['gid'];
            $data['createtime']=time();
            $data['buynum']=$_POST['buynum'];
            $data['prices']=$_POST['price']*$_POST['buynum'];
            $data['adressid']=$_POST['adressid'];
            $order->add($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'订单提交成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'订单提交失败'));
        }
        $this->display('Cart/pay');
    }


    //G购物车到订单
    public function cartToOrder(){
        //收货地址
        $data['mid']=session('mid');
        $adress=M('Adress');
        $adressInfo=array_reverse($adress->where($data)->select());
        $this->assign('adressInfo',$adressInfo);

        //订单商品信息
        foreach($_POST['buythis'] as $k=>$v){
            $goods[$k]['id']=$v;
            $goodsList[$k]=M('Goods')->where(array('gid'=>$v))->find();
            $goodsList[$k]['buynum']=$_POST[$v];
            $goodsList[$k]['prices']=$_POST[$v]*$goodsList[$k]['price'];
        }
        $this->assign('goodsList',$goodsList);
        $this->display('Cart/pay1');
    }
}