<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class MemberController extends Controller{
    /*商城个人中心控制器*/
    public function member(){
        $this->history();////浏览记录
        $this->display('Member/member');
    }

    /*个人中心订单管理控制器*/
    public function order(){
        $model=new \Home\Model\MemberModel();
        $list=$model->order($_SESSION['mid']);
        $this->assign('list',$list);
        $this->display('Member/order');
    }

    /*删除订单控制器*/
    public function deleteOrder($ordersyn){
        $order=M('order');
        $order->where(array('ordersyn'=>$ordersyn))->delete();
        $this->ajaxReturn(array('status'=>'ok'));
    }

    /*支付订单，改变状态*/
    public function changeStatus($ordersyn){
        $order=M('Order');
        $data['statusid']=20;
        $order->where(array('ordersyn'=>$ordersyn))->save($data);
        $this->ajaxReturn(array('status'=>'ok'));
    }

    /*确认收货*/
    public function take(){
        $syn=trim(I('get.ordersyn'));
        M('order')->where(array('ordersyn'=>$syn))->save(array('statusid'=>40));
        $this->ajaxReturn(array('status'=>'ok'));
    }

    /*评价*/
    public function com(){
        $syn=trim(I('get.ordersyn'));
        $content=trim(I('get.content'));
        $info=M('order')->where(array('ordersyn'=>$syn))->find();
        $name=M('member')->where(array('mid'=>$info['mid']))->find();
        $com['gid']=$info['gid'];
        $com['comtime']=time();
        $com['username']=$name['username'];
        $com['content']=$content;
        $comment=M('goods_comment')->add($com);
        if($comment) {
            M('order')->where(array('ordersyn'=>$syn))->save(array('statusid'=>50));
            $this->ajaxReturn(array('status'=>'ok'));
        }else{
            $this->ajaxReturn(array('status'=>'error'));
        }
    }

    /*个人信息控制器*/
    public function userInfo(){
        $member=M('Member');
        $value=session('membername');
        $map['username']=$value;
        $memberInfo=$member->where($map)->select();
        $this->assign("memberInfo",$memberInfo);
        $this->history();////浏览记录
        $this->display('Member/userinfo');
    }

    /*密码修改控制器*/
    public function changePwd(){
        if(!empty($_POST)) {
            $pwd=md5($_POST['pwd']);
            $npwd = md5($_POST['npwd']);
            $User = M("Member");
            $id = session('mid');
            $res= $User->where($id)->find();
            if($pwd==$res['pwd']){
                $User->pwd = $npwd;
                $User->where("mid=$id")->save();
                $this->ajaxReturn(array('status'=>'ok','msg'=>'密码修改成功'));
            }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'原密码输入错误,密码修改失败'));
            }
        }

    }

/*个人信息修改控制器*/
    public function changeUserInfo(){
        if(!empty($_POST)){
            $nickname=trim($_POST['nickname']);
            $sex=$_POST['sex'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $year=$_POST['year1'];
            $month=$_POST['month1'];
            $day=$_POST['day1'];
            $User = M("Member");
            $id=session('mid');
            $User->nickname =$nickname;
            $User->sex =$sex;
            $User->mobile =$mobile;
            $User->email =$email;
            $User->year =$year;
            $User->month =$month;
            $User->day =$day;
            $User->where("mid=$id")->save();
            $this->ajaxReturn(array('status'=>'ok','msg'=>'保存成功'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'保存失败'));
            }
        }

  //验证手机号码是否是原来的手机号，或者是别人注册过的手机号码已经使用
    public function check_mobile(){
        $data['mobile']=trim($_POST['mobile']);
        $h=M('member');
        $res= $h->where($data)->find();
        if($res['mid']==session('mid')){
            echo 'true';
        }else{
            if($res){
                echo "false";
            }else{
                echo "true";
            }
        }
    }

    /*验证邮箱是否为原来的邮箱，或者是别人注册过的邮箱*/
    public function check_email(){
        $data['email']=trim($_POST['email']);
        $h=M('member');
        $res= $h->where($data)->find();
        if($res['mid']==session('mid')){
            echo 'true';
        }else{
            if($res){
                echo "false";
            }else{
                echo "true";
            }
        }
    }

    /*个人收货地址表格展示*/
    public function adress(){
        $adress=M('Adress');
        $data['mid']=session('mid');
        $count=$adress->where($data)->count();
        $Page=new \Think\Page($count,8);
        $show=$Page->show();
        $adressInfo=$adress->where($data)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('adressInfo',$adressInfo);
        $this->assign("Page",$show);
        $this->assign("firstRow",$Page->firstRow);
        $this->display();
    }

    /*新增收货地址*/
    public function adressForm(){
        if(IS_POST){
            $adress=M('Adress');
            $data['username']=$_POST['username'];
            $data['mid']=session('mid');
            $data['province']=$_POST['province'];
            $data['city']=$_POST['city'];
            $data['town']=$_POST['town'];
            $data['adressdetail']=$_POST['adressdetail'];
            $data['mobile']=$_POST['mobile'];
            $data['tel']=$_POST['tel'];
            $data['code']=$_POST['code'];
            $adress->add($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'新增地址成功'));
        }
        $this->display();
    }

    /*修改收货地址信息,将信息返回到表单中*/
    public function changeAdress($id){
        $adress=M('Adress');
        $adressInfo=$adress->where(array('id'=>$id))->select();
        $this->assign('adressInfo',$adressInfo);
        $this->display('Member/changeAdress');
    }

    /*修改收货地址信息*/
    public function changeAdress1(){
        if(IS_POST){
            $adress=M('Adress');
            $data['username']=$_POST['username'];
            $data['id']=$_POST['id'];
            $data['province']=$_POST['province'];
            $data['city']=$_POST['city'];
            $data['town']=$_POST['town'];
            $data['adressdetail']=$_POST['adressdetail'];
            $data['mobile']=$_POST['mobile'];
            $data['tel']=$_POST['tel'];
            $data['code']=$_POST['code'];
            $adress->save($data);
            $this->ajaxReturn(array('status'=>'ok','msg'=>'修改地址成功'));
        }
    }

    /*删除收货地址*/
    public function deleteAdress($id){
        $adress=M('Adress');
        $adress->where(array('id'=>$id))->delete();
        $this->ajaxReturn(array('status'=>'ok'));
    }

    public function focus(){   ///添加关注
        $gid=$_GET['gid'];
        if(!empty($_SESSION['mid']) && !empty($_SESSION['membername'])){
            $uid=$_SESSION['mid'];
            if($uid>0){   ////登陆
                $focus=D('Member_focus')->where("uid='$uid'")->find();
                $count= count(D('Member_focus')->where("uid='$uid'")->select());
                if($count==1){
                    if($focus['focus']==null){
                        if( D('Member_focus')->where("uid='$uid'")->save(array("focus"=>"$gid"))>0){
                            echo "关注成功";
                        }
                    }else{
                        $history= array_count_values(explode(',',$focus['focus']));
                        if($history["$gid"]<1){
                            $newgid=$focus['focus'].",$gid";
                            if( D('Member_focus')->where("uid='$uid'")->save(array("focus"=>"$newgid"))>0){
                                echo  "关注成功";
                            }
                        }else{
                            echo  "不能重复关注";
                        }
                    }
                }else{
                    $data['uid'] = "$uid";
                    $data['focus'] = "$gid";
                    if( $res=D('Member_focus')->add($data)>0){
                        echo  "关注成功";
                    }
                }
            }
        }else{
            echo  "请登录后关注";
        }
    }

    public function history(){    ///关注，浏览记录
        $member=$_SESSION['mid'];
        if(!empty($_SESSION['mid'])){
            $res=  D('Member_focus')->where("uid='$member'")->find();
            $focus=array_reverse(explode(',',$res['focus']));
            $focusarr=array();
            $i=O;
            foreach ($focus as $v){
                $i++;
                $focusarr[$i]= D('Goods')->where("gid='$v'")->find();
            }
            $this->assign('focus',$focusarr);
        }
        empty($_SESSION['membername'])?$history=array_reverse(explode(',',$_SESSION['history'])):$history=array_reverse(explode(',',$res['history']));  ////浏览记录
        $historyarr=array();
        $i=O;
        foreach ($history as $v){
            $i++;
            $historyarr[$i]= D('Goods')->where("gid='$v'")->find();
        }
        $this->assign('history',$historyarr);
    }
}