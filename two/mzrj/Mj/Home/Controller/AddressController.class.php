<?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends Controller{
    //收货地址管理

    public function address(){
        if(IS_POST){
            $obj=D("Address");
            if($obj->create()){
                $data['shr']=I('post.shr');
                $data['province']=I('post.province');
                $data['city']=I('post.city');
                $data['town']=I('post.town');
                $data['mobile']=I('post.mobile');
                $data['detail_address']=I('post.detailaddress');
                $data['youbian']=I('post.youbian');
                $data['mid']=session('mid');
                $data['order_id']=I('post.order_id');
                //print_r($data);
                $address=$data['province'].$data['city'].$data['town'].$data['detail_address'];
                $num=$obj->add($data);
                if($num){
                    M('Address')->where(array('id'=>$num))->save(array('order_id'=>$data['order_id']));
                    $info=$data;
                    $info['status']='ok';
                    $info['address']=$address;
                    $this->ajaxReturn($info);

                }





               /*
                if(){
                     $info=$data;
                     $info['status']='ok';
                    $info['address']=$address;
                   $this->ajaxReturn($info);

                }*/
            }else{
                $this->ajaxReturn(array('status'=>'no'));
            }
        }
        // $this->display();
    }


}
