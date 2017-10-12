<?php
namespace Home\Controller;
use Think\Controller;
class MycarController extends Controller {
    public function addtocar(){
        if(IS_POST){
            $uid=session('id');
            $gid=I('post.gid');
            session('car_gid',$gid);
            $buynum=I('post.buynum');
            $g=M('Goods');
            $goods=$g->where(array('gid'=>$gid))->find();
            //判断商品是否存在
            if($goods){
                if($uid>0){
                    //用户登录状态下
                    $sname='mycart_'.$uid;
                    if(empty($_SESSION[$sname][$gid])){
                        $goods['buynum']=$buynum;
                        $_SESSION[$sname][$gid]=$goods;
                    }else{
                        $_SESSION[$sname][$gid]['buynum']+=$buynum;
                    }
                }else{
                    //用户未登录状态下
                    //判断购物车是否存在该商品
                    if(empty($_SESSION['mycart'][$gid])){
                        $goods['buynum']=$buynum;
                        $_SESSION['mycart'][$gid]=$goods;
                    }else{
                        $_SESSION['mycart'][$gid]['buynum']+=$buynum;
                    }
                }
                $this->ajaxReturn(array('status'=>'ok','msg'=>'成功','gid'=>$gid,'buynum'=>$buynum));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'失败'));
            }
        }else{
            $gid=I('get.gid');
            $uid=session('id');
            $buynum=I('get.buynum');
            $goodsname=M('Goods');
            $goods= $goodsname->where(array('gid'=>$gid))->find();
            $goodslist=$goodsname->limit(10)->select();

            if($uid>0){
                $sname='mycart_'.$uid;
                $mygoods=$_SESSION[$sname];

            }else{
                $mygoods=$_SESSION['mycart'];
            }
            $num=count(array_filter($mygoods));
            session('num',$num);
            $this->assign('mygoods',$goods);
            $this->assign('goodslist',$goodslist);
            $this->assign('buynum',$buynum);
            $this->display();
        }
    }

    public function mycar(){
        $uid=session('id');
        if( $uid>0){
            $sname='mycart_'.$uid;
            $mygoods=$_SESSION[$sname];
            //没有登录时
        }else{
            $mygoods=$_SESSION['mycart'];
        }
        $this->assign('mygoods',$mygoods);
        $num=count(array_filter($mygoods));
        session('num',$num);
        $this->assign('num',$num);
        $this->display();
    }

   public function createorder(){
        $uid=session('id');
        if($uid>0){
            $data['uid']=$uid;
            $data['ordersyn']=date('Y-m-d',time()).substr(uniqStr(),0,16);
            $data['prices']=I('post.prices');
            $data['createtime']=time();
            //将原价和折扣价写入数据库
            $data['preprices']=$data['prices'];
            $level=session('level');
            if($level==1){
                $data['prices']=$data['preprices']*0.99;
            }elseif($level==2){
                $data['prices']=$data['preprices']*0.96;
            }elseif($level==3){
                $data['prices']=$data['preprices']*0.92;
            }elseif($level==4){
                $data['prices']=$data['preprices']*0.89;
            }elseif($level==5){
                $data['prices']=$data['preprices']*0.85;
            }
            $order=M('Order');
            $oid=$order->add($data);
            if($oid){
                foreach(I('post.chk') as $k=>$v){
                    $goods['oid']=$oid;
                    $goods['gid']=$v;
                    $goods['buynum']=$_POST['buynum'.$v];
                    $order_goods=M('Order_goods');
                    $order_goods->add($goods);
                }
                $sname='mycart_'.$uid;
                $_SESSION[$sname]=array();
                session('num',null);
                $cart=M('Cart');
                $cart->where(array('uid'=>$uid))->delete();
                $this->ajaxReturn(array('status'=>'ok','msg'=>'生成订单成功','oid'=>$oid));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'生成订单失败'));
            };
        }else{
            session('gid',0);
            $this->ajaxReturn(array('status'=>'login','msg'=>'请先登录'));
        }

    }
    public function del(){
        $uid=session('id');
        $gid=I('get.gid');
        if($uid>0){
            $sname='mycart_'.$uid;
            $_SESSION[$sname][$gid]=array();
            $cart=M('Cart');
            $arr['uid']=$uid;
            $arr['gid']=$gid;
                if($cart->where($arr)->find()){
                    $rows=$cart->where($arr)->delete();
                    if($rows){
                        $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
                    }else{
                        $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
                    }
                }else{
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
                }
        }else{
            $_SESSION['mycart'][$gid]=array();
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }

    }
    function test(){
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

    }
}