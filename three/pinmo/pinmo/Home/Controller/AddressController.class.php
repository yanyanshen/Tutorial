<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class AddressController extends CommonController{
    public function address(){

            $uid=session('mid');
        $list=D('address');
        $address=$list->order('id desc')->where("uid=$uid")->select();
            $this->assign('list',$address);
        $mid=session('mid');
        $b=count($_SESSION['m'.$mid]);
        $this->assign('num',$b);
        $this->display();

        //$id=session('uid');
        //$address=M('address');
        //$data=$address->query('');
        //$this->assign('address',$data);

    }
    //新增收货地址
    public function addeidt(){

        $add=D('Address');
        if(IS_POST){
            $data=I('post.');
            $data['uid']=session('mid');
            $uid=$data['uid'];
            $num=M('address')->where("uid=$uid")->select();
            if($num>0){
                $data['isdefault']=1;
                if($add->add($data)){
                    //dump($add->create());
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'地址添加成功'));
                }else{
                    $error=$add->getError() ;
                    $this->ajaxReturn(array('status'=>'error','msg'=>$error));
                }
            }else{
                if($add->add($data)){
                    //dump($add->create());
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'地址添加成功'));
                }else{
                    $error=$add->getError() ;
                    $this->ajaxReturn(array('status'=>'error','msg'=>$error));
                }
            }
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'地址添加失败'));
        }
    }
    //收货地址删除
    public function del(){
        $id=I('post.id');
        $del=M('address');
        $a=$del->where("id=$id")->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }

    }
    //收货地址编辑
    public function edit(){

        if(IS_POST){
            $edit=D('address');
            $data=I('post.');
            $a=$edit->save($data);
            if($a>0){
                $this->ajaxReturn(array('status'=>'ok','msg'=>'编辑成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'编辑失败'));
            }

            }else{
            $id=I('get.id');
            $this->assign('id',$id);
            $this->display('address_edit');
        }


    }
    //设置默认收获地址
    public function defa(){
        $id=I('post.id');

        $uid=session('mid');
        //$uid=0;
        $address=M('address');
        $data['isdefault']=0;
        $data1['isdefault']=1;
        $a=$address->where("uid=$uid")->save($data);
        $b=$address->where("uid=$uid && id=$id")->save($data1);
        if($a>0 && $b>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'默认地址设置成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'默认地址设置失败'));
        }
    }
}