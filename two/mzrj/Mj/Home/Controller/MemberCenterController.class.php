<?php
namespace Home\Controller;
use Think\Controller;
class MemberCenterController extends Controller
{
    /*  public function memberCenter(){
          $this->display();
      }*/
    //获取全部订单列表
    public function orderlist()
    {
       /* S(array(
                'type' => 'File',
                'hoSt' => '172.16.11.123',
                'port' => '11211',
                //  'prefix'=>'think',        //缓存前缀
                'expire' => 10,          //缓存时间
            )

        );*/
        //echo  C('DATA_CACHE_TYPE' );
        //if (!$orderlist = S('orderlist')) {
            $id = session('mid');
            //print_r($id);
            $count = M('Order')->where(array('mid' => $id))->count();
            // print_r($count);
            $Page = new\Think\Page($count, 3);

            //多表查询订单   //分页
            $orderlist = M()->query("select mid, orderid,goodsname,picname,price,buynum,ordersyn,status from mj_goods as g,mj_order as o,mj_order_goods as og,
                                mj_member as m where g.id=og.gid and o.oid=og.orderid  and o.mid=m.id and m.id={$id} order by orderid desc limit {$Page->firstRow},{$Page->listRows}");

            //print_r($orderlist);
            //订单状态
            foreach ($orderlist as $k => $v) {
                $orderstatus = M()->query("select order_status from mj_order_status where sid={$v['status']}");
                $status = $orderstatus[0]['order_status'];
                $orderlist[$k]['orderstatus'] = $status;
            }
            $show = $Page->show();
         //   S('orderlist', $orderlist);          //设置缓存
       // }


        //账户余额

        $arr = M('Member_money')->field('money')->where(array('mid' => session('mid')))->find();
        $yue = $arr['money'];


        $this->assign('yue', $yue);
        $this->assign('orderlist', $orderlist);
        $this->assign('show', $show);
        $this->assign('count', $count);
        $this->display('membercenter');

    }


//查看订单详情
    public function chakan()
    {

        $orderid = I('oid');
        $orderdetail = M()->query("select mid,orderid,goodsname,picname,price,buynum,ordersyn,status from mj_goods as g,mj_order as o,mj_order_goods as og
                                 where g.id=og.gid and o.oid=og.orderid and orderid=$orderid");

        // print_r($orderdetail);
        $this->assign('orderdetail', $orderdetail);
        $this->display('Order/order');
    }

    //删除订单
    public function del()
    {

        $oid = I('get.oid');
        M('Order')->where(array('oid' => $oid))->delete();

        //$this->display('membercenter');
    }


//修改密码
    public function repwd()
    {
        $mid = session('mid');
        $pwd1 = md5(I('post.pwd1'));
        $pwd2 = md5(I('post.pwd2'));
        $pwd3 = md5(I('post.pwd3'));

        $res = M('Member')->field('pwd')->where(array('id' => $mid))->find();

        if (empty($pwd1) || empty($pwd2) || empty($pwd3)) {
            $this->ajaxReturn(array('status' => 'no'));
        } elseif ($pwd1 != $res['pwd']) {
            $this->ajaxReturn(array('status' => 'no'));
        } elseif ($pwd2 != $pwd3) {
            $this->ajaxReturn(array('status' => 'no'));
        } else {
            if (M('Member')->where(array('id' => $mid))->save(array('pwd' => $pwd3)) > 0) {
                $this->ajaxReturn(array('status' => 'ok'));
            }
        }
        $this->display('memberinfo');
    }


//积分
    public function jifen()
    {
        $count = M('Order')->where(array('mid' => session('mid')))->count();
        $this->assign('count', $count);
        $this->display('jifen');
    }


//充值

    public function chongzhi()
    {
        if (IS_POST) {
            $money = I('post.chongzhi');
            //print_r($money);
            if (!$money || $money <= 0) {
                $this->ajaxReturn(array('status' => 'no'));
            } else {
                $arr = M('Member_money')->field('money')->where(array('mid' => session('mid')))->find();
                $mey = $arr['money'] + $money;
                // print_r($mey);
                if (M('Member_money')->where(array('mid' => session('mid')))->save(array('money' => $mey))) {
                    $this->ajaxReturn(array('status' => 'ok'));
                } else {
                    $this->ajaxReturn(array('status' => 'no'));
                }
            }
        }
        $this->display();

    }


    //地址
    public function address()
    {
        $addlist = M('Address')->where(array('mid' => session('mid')))->select();
        //print_r($addlist);
        $this->assign('addlist', $addlist);
        $this->display();
    }

//删除del
    public function deladdress()
    {
          $id=I("get.id");
         M('Address')->delete(array('id'=>$id));

       $this->display('address');
    }

}