<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class OrderController extends Controller{
    //在本控制器所以方法之前会执行该方法，防止未登录进入
    public function _initialize(){
        if(session('aid')<1||session('status')<1){
            header('location:/Admin/Login/login');
        }}
    public function index(){
        $order=M('Order');
        //搜索
        $ordersyn=I('get.ordersyn');
        $status=I('get.status');
        $search['ordersyn|prices']=array('like',"%".I('get.ordersyn')."%");
        $search['status']=array('like',"%".I('get.status')."%");
        $usersearch['username']=array('like',"%".I('get.username')."%");
        $user=M('User');
        $userlist=$user->where($usersearch)->find();
        $name=I('get.username');
        if(!$name){
          $search['uid']=array('like',"%".''."%");
      }else{

          $search['uid']=$userlist['id'];
      }

        $count=$order->where($search)->count();
        $page=new \Think\Page($count,10);
        $show=$page->show();
        $list=$order->where($search)->order('createtime desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('firthRow',$page->firstRow);

        $this->assign('ordersyn',$ordersyn);
        $this->assign('name',$name);
        $this->assign('status',$status);
        $this->display('index');
    }
   /* //删除
    public function del(){
        $oid=I('get.oid');
        $order=M('order');
        $res=$order->where("oid=$oid")->save();
        if($res){
            $this->ajaxReturn(array('status' => 'ok', 'msg' => '删除成功'));
        }else{
            $this->ajaxReturn(array('status' => 'error', 'msg' => '删除失败'));
        }
    }*/

    //编辑
    public function edit(){
        //订单表
        $oid=I('get.oid');
        $uid=I('get.uid');
        $order=M('order');
        $sql="select goodsname,pic,price,buynum from  shang_order_goods o,shang_goods g where o.gid=g.gid and o.oid={$oid}";
        $orderlist=$order->query($sql);

       /* $orderinfo=$order->where("oid=$oid")->find();
       //订单商品
        $ordergoods=M('Order_goods');
        $goodsinfo=$ordergoods->where("oid=$oid")->find();
        $gid=$goodsinfo['gid'];
        $goods=M('Goods');
        $goodslist=$goods->where("gid=$gid")->find();*/
        //用户
        $user=M('User');
        $userinfo=$user->where("id=$uid")->find();
       //地址
        $address=M('address');
        $addressinfo= $address->where("uid=$uid and isdefault=1")->find();
        $orderinfo=$order->find($oid);
//联合查询
        if(IS_POST){
          $data['oid']=$oid;
          $data['status']=trim(I('post.status'));
            $res=$order->save($data);
            if($res||$res==0){
                echo "<script>alert('保存成功');location='../../index'</script>";
            }else{
                echo "<script>alert('保存是失败');location='../../index'</script>";
            }
        }else{
            $this->assign('orderinfo',$orderinfo);
            $this->assign('orderlist',$orderlist);

            $this->assign('userinfo',$userinfo);
            $this->assign('addressinfo',$addressinfo);
            $this->display();
        }

    }


    //同意退货
    public function agree(){
        $data['oid']=I('get.oid');
        $data['status']=7;
        $order=M('Order');
        $res=$order->save($data);
        if($res){
           // $this->success('申请成功');
            echo "<script>alert('申请成功');location='../../index'</script>";
        }else{
           // $this->error('申请失败');
            echo "<script>alert('申请失败');location='../../index'</script>";
        }
    }
    //商家取消 缺货
    public function cancel(){
        $data['oid']=I('get.oid');
        $data['status']=9;
        $order=M('Order');
        $res=$order->save($data);
        if($res){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'取消成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'取消失败'));
        }
    }
    //发货
    public function send(){
        $data['oid']=I('get.oid');
        $data['status']=3;
        $order=M('Order');
        $res=$order->save($data);
        if($res){
            echo "<script>alert('成功');location='../../index'</script>";
        }else{
            echo "<script>alert('失败');location='../../index'</script>";
        }
    }
    //完成
    public function over(){
        $data['oid']=I('get.oid');
        $data['status']=8;
        $order=M('Order');
        $res=$order->save($data);
        if($res){
            echo "<script>alert('成功');location='../../index'</script>";
        }else{
            echo "<script>alert('失败');location='../../index'</script>";
        }
    }

}