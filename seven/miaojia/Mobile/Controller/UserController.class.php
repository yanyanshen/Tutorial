<?php
namespace Mobile\Controller;
use Mobile\Model\AddressModel;
use Mobile\Model\GoodsscModel;
use Mobile\Model\OrdergoodsModel;
use Mobile\Model\OrderModel;
use Mobile\Model\UserModel;
use Mobile\Model\PingjiaModel;
use Think\Controller;
use Think\Exception;
use Think\Image;
use Think\Page;
use Think\Upload;
use Think\Verify;

class UserController extends Controller{
    public function register(){
        $this->display('reg');
    }
    public function registered(){
        $obj=new UserModel();
        if($res=$obj->registered(I('post.'))){
            session('username',I('username'));
            session('uid',$res);
            echo '注册成功';
        }else{
            echo '注册失败';
        }
    }
    public function chkUser(){
        $username=I('username');
        $obj=new UserModel();
        $res=$obj->chkUser($username);
        echo $res;
    }
    public function login(){
        $this->display();
    }
    public function logined(){
        $obj=new UserModel();
        if($res=$obj->logined(I('post.'))){
            session('username',I('username'));
            session('uid',$res['id']);
            echo "登录成功";
        }else{
            echo "用户状态异常或密码错误，请重试";
        }
    }
    public function logout(){
        session('username',null);
        session('uid',null);
        $this->success('安全退出',U('Mobile/Index/index'));
    }
    public function verify_code(){
        $verify_config=array(
            'imageW'=>'200',
            'imageH'=>'45',
            'length'=>'4',
            'codeSet'=>'0123456789',
            'useCurve'=>false,
        );
        $verify=new Verify($verify_config);
        $verify->entry();
    }
    public function chk_verify(){
        $verify_code=I('yzm');
        $obj=new Verify();
        if($obj->check($verify_code)){
            $arr=array('ok'=>'');
        }else{
            $arr=array('error'=>'验证码输入错误');
        }
        echo json_encode($arr);
    }
    //渲染会员中心模板
    public function member(){
        $this->chkSession();
        $data['uid']=session('uid');
        $data['orderstatus']=I('s')?I('s'):0;
        $obj=new OrderModel();
        $order=$obj->getAllOrder($data);
        $count=count($order);
        $page=new Page($count,10);
        $show=$page->show();
        $orderList=$obj->getAllOrder($data,$page->firstRow,$page->listRows);
        $order1=count($obj->getAllOrder(array('uid'=>session('uid'),'orderstatus'=>1)));
        $order3=count($obj->getAllOrder(array('uid'=>session('uid'),'orderstatus'=>3)));
        $order4=count($obj->getAllOrder(array('uid'=>session('uid'),'orderstatus'=>4)));
        $user=new UserModel();
        $meminfo=$user->meminfo(session('username'));
        $this->assign('orderList',$orderList);
        $this->assign('order1',$order1);
        $this->assign('meminfo',$meminfo);
        $this->assign('order3',$order3);
        $this->assign('order4',$order4);
        $this->assign('page',$show);
        $this->display();
    }
    public function meminfo(){
        $this->chkSession();
        $username=session('username');
        $obj=new UserModel();
        $meminfo=$obj->meminfo($username);
        $this->assign('meminfo',$meminfo);
        $this->display();
    }
    public function changepwd(){
        $this->chkSession();
        $obj=new UserModel();
        if(!I('oldpwd')){
            exit("原密码不能为空!");
        }elseif(!I('pwd')){
            exit("新密码不能为空");
        }elseif(I('pwd')!=I('repwd')){
            exit('确认密码和密码不相同');
        }else{
            echo $obj->changepwd(I('post.'));
        }
    }
    public function message(){
        $this->chkSession();
        $this->display();
    }
    //添加收货地址
    public function addAddress(){
        $this->chkSession();
       $obj=new UserModel();
        if($res=$obj->addAddress(I('post.'))){
            $message="保存成功";
        }else{
            $message="保存失败";
        }
        echo $message;
    }

    //上传头像
    public function uploadPic(){
        $this->chkSession();
        $UserPic=$_FILES['pic'];
        $upload=new Upload();
        $upload->maxSize=1024*1024*3;
        $upload->exts=array('jpg','gif','png','jpeg');
        $upload->rootPath='./upload/';
        $upload->savePath='UserPic/';
        $upload->autoSub=false;
        $info=$upload->uploadOne($UserPic);
        if(!$info){
            $this->error('系统异常，上传头像失败');
        }else{
            $thumb=new Image();
            $thumb->open('./upload/UserPic/'.$info['savename']);
            $thumb->thumb(130,130)->save('./upload/UserPic/small/'.$info['savename']);
            $data['id']=session('uid');
            $data['pic']=$info['savename'];
            $obj=new UserModel();
            $obj->savePic($data);
        }
    }

    //更新用户信息
    public function updateInfo(){
        $this->chkSession();
        $data=I('post.');
        if(I('year')){
            $data['birthday']=strtotime(I('year').'-'.I('month').'-'.I('day'));
        }
        $obj=new UserModel();
        if($res=$obj->updateInfo($data)){
            $this->ajaxReturn(array('message'=>'更新成功'));
        }elseif(is_int($res)){
            $this->ajaxReturn(array('message'=>'数据没有任何变化'));
        }else{
            $this->ajaxReturn(array('message'=>'更新失败'));
        }
    }
    //收货地址信息
    public function addressList(){
        $this->chkSession();
        $obj=new AddressModel();
        $addressList=$obj->affirm(session('uid'));
        $user=new UserModel();
        $meminfo=$user->meminfo(session('username'));
        $this->assign('meminfo',$meminfo);
        $this->assign('addressList',$addressList);
        $this->display();
    }

    public function order(){
        $this->chkSession();
        $data['uid']=session('uid');
        $data['orderstatus']=I('s')?I('s'):0;
        $user=new UserModel();
        $meminfo=$user->meminfo(session('username'));
        $obj=new OrderModel();
        $order=$obj->getAllOrder($data);
        $count=count($order);
        $page=new Page($count,5);
        $show=$page->show();
        $orderList=$obj->getAllOrder($data,$page->firstRow,$page->listRows);
        $ordergoods=new OrdergoodsModel();
        foreach($orderList as $k=>$v){
            $orderList[$k]['ordergoods']=$ordergoods->getGoodsByOrderId($v['id']);
        }
        $this->assign('orderList',$orderList);
        $this->assign('meminfo',$meminfo);
        $this->assign('page',$show);
        $this->display();
    }

    //删除收货地址
    public function delAddress(){
        $this->chkSession();
        $data['id']=I('id');
        $data['uid']=session('uid');
        $obj=new AddressModel();
        if($obj->delAddress($data)){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }

    //确认收货
    public function confirmSh(){
        $this->chkSession();
        $data['id']=session('uid');
        $data['passwd']=I('passwd');
        $map['ordersyn']=I('ordersyn');
        $user=new UserModel();
        if($user->logined($data)){
            if($user->confirmSh($map)){
                echo "确认收货成功";
            }else{
                echo "确认收货失败";
            }
        }else{
            echo "密码错误";
        }
    }

    //商品收藏信息
    public function goodsScList(){
        $this->chkSession();
        $obj=new GoodsscModel();
        $goodsScList=$obj->getScGoodsByUid();
        $this->assign('goodsScList',$goodsScList);
        $this->display();
    }

    //删除商品收藏
    public function delGoodsSc(){
        $this->chkSession();
        $data['gid']=I('gid');
        $data['uid']=session('uid');
        $obj=new GoodsscModel();
        if($obj->delGoodsSc($data)){
            $this->success("删除成功",U('goodsScList',array('r'=>time())));
        }else{
            $this->error('删除失败');
        }
    }

    public function myscore(){
        $this->chkSession();
        $obj=new UserModel();
        $userinfo=$obj->meminfo(session('username'));
        $this->assign('meminfo',$userinfo);
        $this->display();
    }

    public function scoreToMoney(){
        $this->chkSession();
        $score=I('score');
        $obj=new UserModel();
        if($obj->scoreToMoney($score)){
            echo "积分兑换成功";
        }else{
            echo "积分兑换失败";
        }
    }

    //评价
    public function toPj(){
        $this->chkSession();
        $data['gid']=I('gid');
        $data['uid']=session('uid');
        $data['pjtime']=time();
        $data['pjintro']=trim(strip_tags(str_replace(' ','',I('pjintro'))));
        $data['orderid']=I('orderid');
        $data['goodsargs']=I('goodsargs');
        if(strlen($data['pjintro'])<1){
            echo "评价内容太短!";
            exit;
        }
        $obj=new PingjiaModel();
        $obj->startTrans();
        if($obj->toPj($data)){
            $ordergoods=new OrdergoodsModel();
            if($ordergoods->updatePj($data)){
                if(strlen($data['pjintro'])>30){
                    $user=new UserModel();
                    $user->where(array('id'=>$data['uid']))->setInc('score',10);
                    echo "评价成功,10字以上评价可以获得10积分,所得积分已存入您的个人积分账户";
                    $obj->commit();
                }else{
                    echo "评价成功";
                    $obj->commit();
                }
            }else{
                $obj->rollback();
                echo "评价失败";
            }
        }else{
            $obj->rollback();
            echo "网络异常，请稍后再试";
        }
    }
}