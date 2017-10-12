<?php
namespace Admin\Controller;
use Admin\Model\GoodsModel;
use Admin\Model\OrderpidModel;
use Think\Controller;
use Think\Page;
class OrderController extends Controller {
        public function index(){
        }
/*$arr=$obj->M()->query("select * from mr_orderpid as p , mr_orderdetail as o , mr_goods as g , mr_address as a , mr_orderstatus as t
                        where o.addressid= a.id and o.id=p.oid and p.pid=g.id and t.id=o.statusid");*/
    //未付款订单列表
    public function order_1(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=1')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=1')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'<br/>'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //渲染订单详情
    public function seeOrder(){

        $id=$_GET['id'];
        //获得订单信息
        $obj=new OrderpidModel();
        $list=$obj->getOneOrder($id);
        //用户信息
        $user=$obj->getUserByid($list['mrid']);
        $list['use']=$user['username'];
        //地址信
        $adr=$obj->getAddressById($list['addressid']);
        $list['add']=$adr['address'].'/'.$adr['town'];
        $list['addname']=$adr['addname'];
        $list['tel']=$adr['mobile'];
        //状态信息
        $stu=$obj->getStutasById($list['statusid']);
        $list['sta']=$stu['status'];
        //获得商品信息
        $shop=$obj->getOrderById($list['id']);
        $good=new GoodsModel();
        foreach($shop as $k=>$v){
            $gd=$good->getGoodsByid($v['pid']);//用户信息
            $shop[$k]['pname']=$gd['name'];
            $shop[$k]['pic']=$gd['pic'];
            $shop[$k]['pri']=$gd['price'];

        }
        $this->assign('list',$list);
        $this->assign('shop',$shop);
        $this->display();
    }


    //确认发货
    public function send(){
        if(IS_POST){
            $id=I('post.id');

            $obj=new OrderpidModel();
            $ad = M("Orderdetail");
            $ord=$obj->getOneOrder($id);
            $sta=$ord['statusid'];
            if($sta==2){
                 $data['statusid']=3;
                 if($ad->where(array("id"=>$id))->save($data)>0){
                     $this->ajaxReturn(array('status' => 'ok', 'msg' => '发货成功'));
                 }
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '订单未付款'));
            }
        }
    }
    //允许退货
    public function de(){
        if(IS_POST){
            $id=I('post.id');
            $obj=new OrderpidModel();
            $ad = M("Orderdetail");
            $ord=$obj->getOneOrder($id);
            $sta=$ord['statusid'];
            if($sta==5){
                 $data['statusid']=6;
                 if($ad->where(array("id"=>$id))->save($data)>0){
                     $this->ajaxReturn(array('status' => 'ok', 'msg' => '已退货'));
                 }
            }else{
                $this->ajaxReturn(array('status' => 'error', 'msg' => '未申请退货'));
            }
        }
    }
    //已付款未发货
    public function order_2(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=2')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=2')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'/'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //已发货
    public function order_3(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=3')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=3')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'/'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //成功
    public function order_4(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=4')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=4')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'/'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //退货
    public function order_5(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=5')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=5')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'/'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function order_6(){
        $arr=M('Orderdetail');
        $count=$arr->where('statusid=6')->count();
        $Page=new \Think\Page($count,5);
        $show=$Page->show();
        $list=$arr->where('statusid=6')->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $msg=new OrderpidModel;
        foreach($list as $k=>$v){
            $user=$msg->getUserByid($v['mrid']);//用户信息
            $list[$k]['use']=$user['username'];
        }
        foreach($list as $k=>$v){
            $adr=$msg->getAddressById($v['addressid']);//地址信息
            $list[$k]['add']=$adr['address'].'<br/>'.$adr['town'];
        }
        foreach($list as $k=>$v){
            $stu=$msg->getStutasById($v['statusid']);//状态信息
            $list[$k]['sta']=$stu['status'];
        }
        $this->assign('arr',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

        //删除订单
        public function delOrder(){
            $id=I('orderpid');
            $obj=new OrderpidModel();
            if($obj->delOrder($id)){
                $this->success("删除成功");
            }else{
                $this->error("删除失败");
            }
        }
}