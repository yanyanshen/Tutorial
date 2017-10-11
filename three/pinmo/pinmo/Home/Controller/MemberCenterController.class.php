<?php

namespace Home\Controller;
use Think\Controller;
use Think\Model;
class MemberCenterController extends CommonController{
    public function _initialize(){
        if(session('mid')<1){
            $this->redirect('Login/login');

        }


        //logo
        $ad=D('ad');
        $list6=$ad->where('state=1 AND position="logo"')->limit(1)->select();
        $this->assign('list6',$list6);
        //个人头像;
        $username=session('mname');
        $user=M('user');
        $uphoto=$user->where("username='$username'")->getField('photo');
        $this->assign('photo',$uphoto);
        //遍历分类
        $category=M('Category');
        $catelist=$category->where("pid=0")->select();
        foreach($catelist as $k1=>$v1) {
            $catelist[$k1]['second'] = $category->where(array('pid' => $v1['cid']))->select();
            foreach($catelist[$k1]['second'] as $k2=>$v2){
                $catelist[$k1]['second'][$k2]['third']= $category->where(array('pid' => $v2['cid']))->select();
            }
        }
        $this->assign('catelist',$catelist);
//购物车;
        $mid=session('mid');
        $b=count($_SESSION['m'.$mid]);
        $this->assign('num',$b);

    }




   /* public function index(){


        $username=session('mname');
        $user=M('user');
        $uphoto=$user->where("username='$username'")->getField('photo');
        $this->assign('photo',$uphoto);


        $this->display('member');
    }*/


    public function password_edit()
    {
    $rules= array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
       // array('username','require','用户名不能为空'),
        // array('username','5,12','用户名长度在5-12个字符之间',0,'length'),
        // array('email','email','邮箱格式不正确'),
        // array('mobile','/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/','请输入一个手机号',0,'regex',3),
        // array('password','md5',1,'function'),
            array('password','require','用户密码不能为空'),
        array('password','5,12','密码长度在5-12个字符'),
          array('password','repassword','两次输入新密码不一致',0,'confirm'),
         //array('password','checkPwd','密码错误！',1,'function',4),

    );

        if (IS_POST) {
            $data['password']=md5(I('post.password'));
            $username=I('post.username');
            $opassword=md5(I('post.opassword'));
            $user=D('user');
            $chklist=$user->where("username='$username'")->select();
            //print_r($chkpassword);
            //exit;
            foreach($chklist as $value){
                $chkpwd=$value['password'];
            }
            if($opassword==$chkpwd){


           // if ($_POST['opassword'] == $_SESSION['passwoed']){
            $User =D('User');

            if (!$User->validate($rules)->create()) {
                $error=$User->getError();

                $this->ajaxReturn(array('status'=>'error','msg'=>$error));
            } else {
                $User->where("username='$username'")->field("password")->save($data);
                $this->ajaxReturn(array('status'=>'ok','msg'=>'修改成功！'));
            }
        }else{
                $this->ajaxReturn(array('status'=>'error','msg'=>'请输入正确的原密码！'));
            }

        }

        $this->display();
    }
    //收藏管理
    public function del_favor(){
        $id=I('post.id');
        $uid=session('mid');
        $collect=D('collect');
        $data['uid']=$uid;
        $data['goodsid']=$id;
        $a=$collect->where($data)->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'删除成功！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败！'));;
        }
    }

//我的收藏
    public function favorite(){
        if(session('mid')){
            $id=session('mid');
            $Model=new \Think\Model();
            $cglist=$Model->query("select * from __COLLECT__ as o,__GOODS__ as g where o.goodsid=g.id and o.uid='$id' limit 5" );
            //print_r($cglist);
            $this->assign('cglist',$cglist);

            $this->display();

        }else{
            $this->redirect('Login/login');
        }

    }
    //头像上传
    public function photo(){
        if(IS_POST){
            $username=session('mname');
            $user=D('user');


            $upload=new \Think\Upload();
            $upload->rootPath = './Uploads/';
            $upload->maxSize  =3145728 ;// 设置附件上传大小
            $upload->autoSub  =false ;// 设置附件上传大小
            //$upload->subName  = array('date','Ymd');
            $upload->exts=array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

            $info=$upload->upload();

            if(!$info){
                $this->error('图片不能为空');
            }else{ foreach($info as $file){
                //echo $file['savepath'].$file['savename'];
               // echo $file['savename'];
            }}
            $data['photo']=$file['savename'];
            $a=$user->where("username='$username'")->save($data);
            /*if($a>0){
                $this->success('头像添加成功');
            }else{
                $this->error('头像添加失败，请重新添加');
            }*/
        }

        $this->display();
    }

    public function member_info(){

        $rules= array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('addresss','require','地址不能为空'),
         array('truename','2,8','姓名长度在2-8个字符之间',0,'length'),
         array('email','email','邮箱格式不正确'),
         array('mobile','/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/','请输入一个手机号',0,'regex',3),
        );
        if(IS_POST){
            $username=I('post.username');
            $data['username']=$username;
            $data['email']=I('post.email');
            $data['truename']=I('post.truename');
            $data['sex']=I('post.sex');
            $data['mobile']=I('post.mobile');
            $data['address']=I('post.address');
            //print_r($data);
            //exit;
            $member_info=D('user');
            if($member_info->validate($rules)->create()){

                $member_info->where("username='$username'")->save($data);
                //$this->success('修改成功','member_info','');
                $this->ajaxReturn(array('status'=>'ok','msg'=>'修改成功！'));


            }else{
                 $error=$member_info->getError();
                $this->ajaxReturn(array('status'=>'error','msg'=>$error));
            };
//print_r($member_info);

        }else{
            $this->display();
        }
    }
//商品评价列表页
    public function comment(){

        $mid=session('mid');
        $comment=new \Think\Model();
        $commentlist1=$comment->query("select * from __DISCUSS__ as d,__USER__ as u,__GOODS__ as g where d.mid=$mid and u.id=$mid and g.id=d.goodsid");
       $commentlist=array_reverse($commentlist1);
        $this->assign('discuss',$commentlist);
        $this->display();
    }
    //商品评价删除
    public function deldiscuss(){
        //$data['mid']=session('mid');
        $data['did']=I('post.id');
        $a=M('discuss')->where($data)->delete();
        if($a>0){
            $this->ajaxReturn(array('status'=>'ok','msg'=>'该商品评价已经删除！'));
        }else{
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败，请重试！'));
        }
    }
    //订单页面
    public function order(){
        $mid=session('mid');

        $username=session('mname');
        $user=M('user');
        $uphoto=$user->where("username='$username'")->getField('photo');
        $this->assign('photo',$uphoto);
        $mid['mid']=session('mid');
        $order=M('order')->order('id desc')->where("mid=$mid")->select();
        foreach($order as $k=>$val){
        $id=$val['id'];
            $Model = new \Think\Model() ;// 实例化一个model对象 没有对应任何数据表
            $order[$k]['temp']=$Model->query("select * from __ORDER__ as o,__GOODS__ as g,__ORDERGOODS__ as s ,__ORDERSTATUS__ as r where r.id=o.status and g.id=s.goodsid and s.orderid=o.id and  o.id='$id'");
        }

        /*$Model = new \Think\Model() ;// 实例化一个model对象 没有对应任何数据表
        $orderinfo=$Model->query("select * from __ORDER__ as o,__GOODS__ as g,__ORDERGOODS__ as s ,__ORDERSTATUS__ as r where r.id=o.status and g.id=s.goodsid and s.orderid=o.id and  o.mid='$mid'");
        *///dump($order);
        $this->assign('order',$order);
        $this->display();
    }
   //个人信息显示
    public function grxx(){

        $username=session('mname');
        $user=M('user');

        $grxx=$user->where("username='$username'")->getField('username,sex,email,mobile,address');
        //print_r($grxx);
        $this->assign("grxx",$grxx);



        $this->display();
    }
    //商品评价
    public function discuss(){
        $id['orderid']=I('get.id');
        $a=$id['orderid'];
        $ordergoods=M('ordergoods')->where($id)->select();
        //dump($ordergoods);
        $this->assign('ordergoods',$ordergoods);
        $this->assign('orderid',$a);
        $this->display();

    }


}