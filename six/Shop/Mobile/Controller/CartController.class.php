<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\CartModel;
class CartController extends Controller {
    public function addcart(){
    	$cart=D('cart');
    	if(isset($_SESSION["uid"])&&$_SESSION["uid"]){
    		$result=$cart->addcart(I("post."));
    		if($result){
    		
    			echo $this->success();
    		}else{
    		
    			echo $this->error();
    		}
    	}else{
    		if(isset($_SESSION['cart'][I("gid")])&&$_SESSION['cart'][I("gid")]>0){
    			$_SESSION['cart'][I("gid")]["buynum"]=$_SESSION['cart'][I("gid")]["buynum"]+I("buynum");
    		}else{
    			$_SESSION['cart'][I("gid")]=array("gid"=>I("gid"),"buynum"=>I("buynum"),"addtime"=>time());
    		}
    		
    		if(isset($_SESSION['cart'][I("gid")])&&$_SESSION['cart'][I("gid")]>0){
    			echo $this->success();
    		}else{
    			echo $this->error();
    		}
    	}
    	
    }
    public function cart(){
        $obj=new CartModel();
        $uid=M('users')->where(array('username'=>session('username')))->field('id')->find();
        if($uid){
            $goodsinfo=$obj->cartList($uid['id']);
        }else{
            $goodsinfo=$obj->secarList();
        }
        $this->assign("empty","<span class='empty'>购物车还是空的，赶紧去逛逛吧</span>");
        $this->assign('goodsinfo',$goodsinfo);
        if(IS_AJAX){
            $this->display('delcart');
        }else{
            $this->display('cart');
        }
    	
    }
    //购物车商品数量增加
    public function addnum(){
        M('cart')->where(array('id'=>I('post.id')))->setInc('buynum');
    }
    //删除购物车里的商品
    public function delcart(){
        $cart=D('cart');
        $gid=I('post.gid');


        //登录状态喜爱
        if(isset($_SESSION['uid'])&&$_SESSION['uid']>0){
            $res=$cart->where('gid='.$gid.' and uid='.$_SESSION['uid'])->delete();

            if($res){
                echo $this->success('删除成功！');
            }else{
                echo $this->error('删除失败！');
            }
        }else{  //未登录
            unser($_SESSION['cart'][$gid]);
            if($_SESSION['cart'][$gid]){
                echo $this->error('删除失败！');
            }else{
                echo $this->success('删除成功！');
            }
        }
    }
}