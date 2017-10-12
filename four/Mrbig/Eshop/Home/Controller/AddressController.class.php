<?php
namespace Home\Controller;
use Home\Model\AddressModel;
use Think\Controller;
class AddressController extends Controller{
    public function address(){
        if($_SESSION['Mr_home']['mrid']){

            //get传值接收方式
            $arr['addname']=$_GET['name'];
            $arr['address']=$_GET['province'].$_GET['city'].$_GET['town1'];
            $arr['town']=$_GET['town'];
            $arr['mobile']=$_GET['mobile'];
            $arr['yid']=$_GET['yid'];
            $arr['mrid']=$_SESSION['Mr_home']['mrid'];
            $res=new AddressModel();
            $id=$res->address($arr);
            if($id){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'保存成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'保存失败'));
            }
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'请先登录再执行操作'));
        }
    }
    //删除某条地址信息
    public function del(){
        $id=$_GET['id'];

        $res=new AddressModel();
        $num=$res->del($id);
        if($num){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
    }
}