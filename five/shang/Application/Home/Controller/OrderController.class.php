<?php
namespace Home\Controller;
use Think\Controller;
class orderController extends controller{
    public function buy(){
        $data['uid']=session('id');
        $goods=M('Goods');
        $gid=I('post.gid');
        $data['buynum']=I('post.buynum');
        if(!session('id')){
            session('gid',$gid);
            $this->ajaxReturn(array('status'=>'login','msg'=>'请先登录'));
        }else{
           if($res=$goods->find($gid)) ;
            $data['ordersyn']=date('Y-m-d',time()).substr(uniqStr(),0,16);
            $data['prices']=$res['price']*$data['buynum'];
            $data['createtime']=time();
            //将原价和折扣价写入数据库
            $data['preprices']=$res['price']*$data['buynum'];
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
            $oid=$order->add($data);//将订单信息写入订单表
            if($oid){
                $mygoods['oid']=$oid;
                $mygoods['gid']=$gid;
                $mygoods['buynum']=$data['buynum'];
                $order_goods=M('Order_goods');
                $id=$order_goods->add($mygoods);//将购买的各个商品Id，数量,订单ID写入订单商品表
                if($id){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'生成订单','oid'=>$oid));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'服务器繁忙'));
                }
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'服务器繁忙'));
            }
        }

    }
    public function order (){
        $oid=I('get.oid');
        $order_g=M('Order_goods');
        $sql="select goodsname,pic,price,buynum from  shang_order_goods o,shang_goods g where o.gid=g.gid and o.oid={$oid}";
        $order_goods=$order_g->query($sql);
        $id=session('id');
        $address=M('Address');
        $condition['isdefault']=1;
        $condition['uid']=$id;
        $data=$address->where($condition)->find();
        $arr=explode('-',$data['address']);
        $data['address']=join('',$arr);
        $order=M('Order');
        $orderList=$order->find($oid);
        $this->assign('order_goods',$order_goods);
        $this->assign('orderList',$orderList);
        $this->assign('address',$data);
        $this->assign('username',session('username'));
        $this->display();

    }
    public function pay(){
            $oid=I('get.oid');
            //调用第三方支付接口
            //支付成功之后订单状态修改为已支付
        $order=M('order');
        $data['oid']=$oid;
        $data['status']=2;
        $rows=$order->save($data);

        //增加消费额度
        $orderlist=$order->where("oid=$oid")->find();
        $ord['prices']=$orderlist['prices'];
        $uid=session('id');
        $user=M('User');
        $userlist=$user->where("id=$uid")->find();
        $userlist['expense']=$userlist['expense']+$ord['prices'];
        //等级变化
        if($userlist['expense']<=4999){
            $userlist['level']=1;
        }elseif($userlist['expense']>=5000&&$userlist['expense']<=29999){
            $userlist['level']=2;
        }elseif($userlist['expense']>=30000&&$userlist['expense']<=49999){
            $userlist['level']=3;
        }elseif($userlist['expense']>=50000&&$userlist['expense']<=99999){
            $userlist['level']=4;
        }elseif($userlist['expense']>=100000){
            $userlist['level']=5;
        }


        $ret=$user->where("id=$uid")->save( $userlist);
        if($rows&&$ret){
            $sql="select gid,buynum from shang_order o,shang_order_goods og where o.oid=og.oid and o.oid={$oid}";
            $res=$order->query($sql);
            if($res){
                foreach($res as $v){
                    $goods=M('Goods');
                    $gds['gid']=$v['gid'];
                    $gds['saled_num']=$v['buynum'];
                    $g=$goods->where(array('gid'=>$gds['gid']))->find();
                    $gds['saled_num']=$g['saled_num']+$gds['saled_num'];
                        if( $goods->save($gds)){
                            $this->ajaxReturn(array('status'=>'ok','msg'=>'支付成功'));
                        }else{
                            $this->ajaxReturn(array('status'=>'error','msg'=>'支付失败'));
                        }
                    }
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'支付失败'));
            }

        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'支付失败'));
        }

    }
    public function add_ars(){
        if(IS_POST){
            $data['uid']=session('id');
            $data['name']=I('post.name');
            $a1=I('post.a1');
            $a2=I('post.a2');
            $a3=I('post.a3');
            $detail=I('post.detail');
            $data['address']=$a1.'-'.$a2.'-'.$a3.'-'.$detail;
            $data['tel']=I('post.tel');
            $data['zip']=I('post.zip');
            $data['isdefault']=1;
            $address=M('address');
            $address->where(array('isdefault'=>1,'uid'=>session('id')))->save(array('isdefault'=>0));
            $id=$address->add($data);
            if($id){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'新增地址成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'新增地址失败'));

            }
        }else{
            $this->display();
        }
    }
    public function edit_ars(){
        if(IS_POST){
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $a1=I('post.a1');
            $a2=I('post.a2');
            $a3=I('post.a3');
            $detail=I('post.detail');
            $data['address']=$a1.'-'.$a2.'-'.$a3.'-'.$detail;
            $data['tel']=I('post.tel');
            $data['zip']=I('post.zip');
            $address=M('address');
            $rows=$address->save($data);
            if($rows>0||$rows===0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'编辑地址成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'编辑地址失败'));

            }
        }else{
            $condition['id']=I('get.id');
            $address=M('address');
            $data=$address->where($condition)->find();
            $arr=explode('-',$data['address']);
            $data['a1']=$arr[0];
            $data['a2']=$arr[1];
            $data['a3']=$arr[2];
            $data['detail']=$arr[3];


            $this->assign('address',$data);
            $this->display();
        }
    }
}