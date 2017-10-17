<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\AddressModel;

class AddressController extends Controller{
    public function address(){
        $obj=new AddressModel();
        $addresslist=$obj->addressList();
        $this->assign("empty","<span class='empty'>您还没有添加收货地址</span>");
        $this->assign("addresslist",$addresslist);
        $this->display();
    }
    //增加收货地址
    public function addAddress(){
        if(IS_AJAX){
            $obj=new AddressModel();
            $date=$obj->create();
            if($date){
                $rel=$obj->addAddress($date,I('post.default'),I('post.id'));
                if($rel){
                    $this->success("保存成功");
                }else{
                    $this->error("保存失败,请稍后再试");
                }
            }else{
                $this->error($obj->getError());
            }
        }else{
            if(I('get.id')){
                $obj=new AddressModel();
                $address=$obj->editaddress(I('get.id'));
                $this->assign("address",$address);
            }
            $this->display();
        }
    }
    //删除收货地址
    public function deladdress(){
        $obj=new AddressModel();
        $rel=$obj->deladdress(I('post.id'));
        if($rel){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
    //设置默认收货地址
    public function defaultaddress(){
        $obj=new AddressModel();
        $rel=$obj->defaultaddress(I('post.id'));
        if($rel){
            $this->success("设置成功");
        }
        else{
            $this->error('设置失败');
        }
    }


    public function selectAddress(){
        $obj=new AddressModel();
        $addresslist=$obj->addressList();
        $this->assign("addresslist",$addresslist);
        $this->display();
    }
}


?>