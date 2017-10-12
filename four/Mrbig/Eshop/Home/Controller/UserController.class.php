<?php
namespace Home\Controller;
use Home\Model\AddressModel;
use Home\Model\GoodsModel;
use Home\Model\UserModel;
use Think\Controller;
use Think\Think;
use Think\Upload;
class UserController extends Controller{
    //用户中心展示
    public function user(){
        if(!$_SESSION['Mr_home']['mrid']){
            //判断是否登录
            $this->ajaxReturn(array('status'=>'no','msg'=>'请登录'));
        }else{
            //个人相关信息展示
            $username=$_SESSION['Mr_home']['mrusername'];

            $this->username=$username;

            //订单展示
            $res=new GoodsModel();
            $arr=$res->showOrder();
            $this->arr=$arr;

            //订单个数展示
            $orderNum=0;
            foreach($arr as $k=>$v){
                $orderNum=$orderNum+1;
            }
            $this->assign('orderNum',$orderNum);

            //订单详情展示


            //个人信息展示
            $info=new UserModel();
            $uid=$_SESSION['Mr_home']['mrid'][0]['id'];
            $arr1=$info->showUser($uid);
            $this->arr1=$arr1;

            //金钱
            $this->assign('money',$arr1[0]['umoney']);
            //收货地址展示
            $result=new AddressModel();
            $arr2=$result->showAdd();
            $this->assign('arraydz',$arr2);


            //购物车展示；
            $mrid=$_SESSION['Mr_home']['mrid'][0]['id'];
            $arr3=M()->query("select * from  mr_goods as g , mr_cart as c  where c.pid=g.id and c.uid='{$mrid}'");
            $this->assign('arr3',$arr3);

            //消费记录显示
            $infor=M('information');
            $uid=$_SESSION['Mr_home']['mrid'][0]['id'];
            $where['uid']=$uid;
            $inforArr=$infor->where($where)->page($_GET['p'].',1')->select();
            $i=0;
            foreach($inforArr as $inforK=>$inforV){
                $inforArr[$i]['inforTime']=date('Y/m/d H:i:s',$inforV['time']);
                $i=$i+1;
            }
            $this->assign('inforArr',$inforArr);
            $count=count($inforArr);  //统计总数

            $this->assign('total',$count);
            $this->assign('inforArr',$inforArr);

            //我的收藏
            $arr4=$res->showOld($uid);
            foreach($arr4 as $k=>$v){
                $arr5=$res->detail($v['pid']);
                foreach($arr5 as $k5=>$v5){
                    $arrOld[$v['pid']]=$v5;
                }
            }

            $this->assign('arrOld',$arrOld);

            $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
            $this->assign('username',$_SESSION['Mr_home']['mrusername']);

            $this->display();
        }

    }
    //修改个人密码
    public function chkPwd(){
        if($_POST['newPwd']=$_POST['reNewPwd']){
            $username=$_POST['username'];
            $pwd=$_POST['pwd'];
            $rePwd=$_POST['newPwd'];
            $res=new UserModel();
            $id=$res->chkNamePwd($username,$pwd);
            if($id){
                $num=$res->pwdData($username,$rePwd);
                if($num){
                    $this->ajaxReturn(array('status'=>'ok','msg'=>'修改成功'));
                }else{
                    $this->ajaxReturn(array('status'=>'error','msg'=>'修改失败'));
                }
        }
        }else{
            $this->ajaxReturn(array('status'=>'no','msg'=>'两次新密码不同，请重新输入'));
        }

    }
    //修改个人信息
    public function chkInformetion(){
        $id=$_SESSION['Mr_home']['mrid'];
        $arr['sex']=$_POST['sex'];
        $arr['QQ']=$_POST['QQ'];
        $arr['mobile']=$_POST['mobile'];
        $arr['tname']=$_POST['tname'];
        $arr['birthday']=$_POST['YYYY'].'/'.$_POST['MM'].'/'.$_POST['DD'];
        $res=new UserModel();
        $id=$res->chkInforMetion($arr,$id);
        if($id){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'保存成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'保存失败'));
        }
    }
    //清空购物车
    public function clearCart(){
        $res=M('cart');
        $sql="truncate table mr_cart";
        $num=$res->query($sql);
        if($num){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'购物车已清空'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'未知错误'));
        }
    }
    //充值
    public function chong(){
        $uname=$_SESSION['Mr_home']['mrid'][0]['id'];
        $res=M('uuser');
        $result=M('information');
        $where['uname']=$uname;
        $arr=$res->where($where)->select();
        $data['umoney']=$_POST['money']+$arr[0]['umoney'];
        $num=$res->where($where)->data($data)->save();
        $data1['money']='+'.$_POST['money'];
        $data1['way']=$_POST['pay'];
        $data1['time']=time();
        $data1['uid']=$uname;
        $num1=$result->add($data1);
        if($num && $num1){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'充值成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'充值失败'));
        }
    }
    //申请退货
    public function back(){
        $id=$_GET['id'];
        $res=M('orderdetail');
        $where['id']=$id;
        $data['statusid']=5;
        $num=$res->where($where)->data($data)->save();
        if($num){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'申请成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'系统繁忙,请稍候再试'));
        }
    }
    //确认收货
    public function orderOk(){
        $id=$_GET['id'];
        $res=M('orderdetail');
        $where['id']=$id;
        $data['statusid']=4;
        $num=$res->where($where)->data($data)->save();
        if($num){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'确认收货成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'系统繁忙,请稍候再试'));
        }
    }
    //上传头像
    public function uploadHead(){
        //print_r($_FILES);
       if($_FILES['image']){
           $upload = new Upload();// 实例化上传类
           $upload->maxSize  = 3145728 ;// 设置附件上传大小
           $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->savePath = '';// 设置附件上传目录
           $upload->rootPath='./Public/Home/Head/';
           $upload->autoSub=false;
           $info=$upload->upload();
           if(!$info) {// 上传错误提示错误信息
               //echo $upload->getError();
               $this->ajaxReturn(array('status'=>'error','msg'=>'服务器繁忙请稍后再试'));
           }else{ // 上传成功 获取上传文件信息
               $res=M('uuser');
               $where['uname']=$_SESSION['Mr_home']['mrid'][0]['id'];
               $data['head']=$info['image']['savename'];
               $result=$res->where($where)->data($data)->save();
               if($result){
                   $this->ajaxReturn(array('status'=>'ok','msg'=>'上传成功'));
               }else{
                   $this->ajaxReturn(array('status'=>'error','msg'=>'网络繁忙,请稍后再试'));
               }
           }
       }else{
           $this->ajaxReturn(array('status'=>'error','msg'=>'未选择图片'));
       }

    }


}