<?php
namespace Home\Controller;
use Home\Model\AddressModel;
use Home\Model\MemberModel;
use Home\Model\OrderModel;
use Home\Model\HistoryModel;
use Think\Controller;
USE Think\Upload;
use Think\Verify;
use Org\Yh;
use Org\Util;
class MemberController extends Controller{
    public function _initialize(){
        if(!session("username")){
            $this->redirect("Users/login");
        }
    }
    //收货地址管理
    public function memberAddress(){
        $obj=new AddressModel();
        $addressList=$obj->getAddressList();
        $this->assign('addressList',$addressList);
        $this->display();
    }
    //添加收货地址
    public function addAddress(){
        $obj=new AddressModel();
        $date=$obj->create();
        $date['detailAddress']=I('detailAddress');
        $date['address']=I('province').I('city').I('county');
        if($obj->create()) {
            $rel = $obj->addAddress($date);
            if ($rel) {
                $this->success("添加成功");
            } else {
                $this->error("添加失败");
            }
        }else{
            $this->error($obj->getError());
        }
    }
    //编辑收货地址
    public function editAddress(){
        $obj=new AddressModel();
        $rel=$obj->getAddress(I('aid'));
        $this->ajaxReturn($rel);
    }

    //订单管理
    public function memberOrderlist(){
        $obj=new OrderModel();
        $orderList=$obj->getMemberorders(I('post.status'));
        $this->assign("orderList",$orderList);
        if(IS_POST){
            $this->display("Orders");
        }else{
            $this->display();
        }
    }
    //确认收货
    public function affirm(){
        $obj=new OrderModel();
        $rel=$obj->affirm(I('pwd'),I('oid'));
        if($rel){
            $this->success('收获成功');
        }else{
            $this->error('收获失败');
        }
    }
    //评价
    public function pingjia(){
        $obj=new OrderModel();
        $date=I('post.');
        $rel=$obj->pingjia($date);
        if($rel){
            echo $this->success("评论成功");
        }else{
            echo $this->error('评论失败');
        }
    }
    //收藏
    public function memberCollect(){
        $obj=new  \Home\Model\CollectModel();
        $like=$obj->like();
        $collect=$obj->memberCollect();
        $this->assign('empty',"<div class='empty'>你还没有收藏商品</div>");
        $this->assign('like',$like);
        $this->assign('collect',$collect);
        if(IS_AJAX){
            $this->display('collect');
        }else{
            $this->display('memberCollect');
        }
    }
    //取消收藏
    public function delCollect(){
        $obj=new \Home\Model\CollectModel();
        $rel=$obj->delcollect(I('post.id'));
        if($rel){
            $this->success('取消收藏成功');
        }else{
            $this->error('取消收藏失败,请稍后再试');
        }
    }
    //在线充值
    public function memberCZ(){
        //判断哪个页面传进来的
        if(I('get.oid')){
            $this->assign('oid',I('get.oid'));
        }
        if(IS_AJAX){
            $rel=M('users')->where(array('username'=>I('post.username')))->setInc('money',I('post.money'));
            if($rel){
                $this->success('支付成功');
            }else{
                $this->error('支付失败,请稍后再试');
            }
        }else{
            $this->display('memberCZ');
        }
    }
    //验证用户名是否存在
    public function checkusername(){
        $rel=M('users')->where(array('username'=>I('post.username')))->find();
        if($rel){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    //设置支付密码
    public function paypwd(){
        $pwd=I('post.');
        $where['mobile']=$pwd['mobile'];
        $where['id']=session('uid');
        $rel=M('users')->where($where)->find();
        if($rel){
            $date['paypwd']=md5($pwd['paypwd']);
            $rel1=M('users')->where(array('id'=>session('uid')))->save($date);
            if($rel1){
                $this->success('设置成功');
            }else{
                $this->error('设置失败，请稍后再试');
            }
        }else{
            $this->error("请输入绑定的手机号");
        }
    }







    public function layer(){
        $add=M('add');
        $where['name']=session('username');
        $result=$add->where($where)->field('id,name,address,code')->find();
        if($result){
            session('aid',$result['id']);
            session('name',$result['name']);
            session('add',$result['address']);
            session('code',$result['code']);
        }
        dump($result);
        $this->display();

    }
    public function memberInfo(){
        $time=M('Users');
        $where=array();
        $where['id']=session('uid');
        $result=$time->where($where)->field('id,lastdate,username,money,jifen,avatar')->find();
        $result['lastdate']=date('Y-m-d H:i:s',$result['lastdate']);
        if($result){
            session('sid',$result['id']);
            session('avatar',$result['avatar']);
            session('lastdate',$result['lastdate']);
            session('money',$result['money']);
            session('jifen',$result['jifen']);
            $where['id']=session('sid');
            M('users')->where($where)->setInc('loginnum');
            M('users')->where($where)->save();
        }
        //续写
        $result2=M('Order')->where(array('uid'=>$result['id']))->where('orderstatus=5')->field('orderstatus')->select();
        $result3=M('Order')->where(array('uid'=>$result['id']))->where('orderstatus!=5')->field('orderstatus')->select();
        $this->assign('order',$result2);
        $this->assign('dingdan',$result3);
        $m2=M('Order')->where(array('uid'=>$result['id']))->field('id')->select();
        $t='';
        foreach($m2 as $val2){
            $t.=$val2['id'].',';
        }
            if($t){
                $t=substr($t,0,-1);
                $wh='oid  in ('.$t.')';
                $total = M('Ordergoods')->where($wh)->count();
                $page = new \Think\Page($total,3);
                $page -> rollPage =5;
                $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%   %HEADER%');
                $page->setConfig('first','首页');
                $page->setConfig('prev','上一页');
                $page->setConfig('next','下一页');
                $page->setConfig('last','尾页');
                $pageHtml = $page -> show();
                $amod=M('Ordergoods')->where($wh)
                    ->order('oid desc')
                    ->join("sk_order on sk_ordergoods.oid=sk_order.id")
                    ->join("sk_goods on sk_ordergoods.goodsname=sk_goods.goodsname")
                    ->limit($page->firstRow,$page->listRows)
                    ->select();
            }else{
                $pageHtml='共0条记录';
            }
            $this -> assign('amod',$amod);
            $this -> assign('pageHtml',$pageHtml);

        $this->display();
    }

    public function memberEdit(){
        $where=array();
        $amod = M('Users')->where($where)->where(array('username'=>session('username')))->field('username,loginnum,jifen,mobile,money,id,avatar')->find();
        $this->assign('amod',$amod);
        session('avatar',$amod['avatar']);
        $firstStr     = mb_substr($amod['mobile'], 0, 3, 'utf-8');
        $lastStr     = mb_substr($amod['mobile'], -4, 4, 'utf-8');
        $strlen = $firstStr .'****' . $lastStr;
        session('mobile',$strlen);
            $mod =D("Users");
            if ($_FILES['pic']['tmp_name']!=''){
                $upload = new \Think\Upload();
                $upload->maxSize = 6666666666;
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg',',');
                $upload->rootPath = './uploads/';
                $upload->savePath = './avatar/';
                $upload->autoSub = false;
                $info = $upload->uploadOne($_FILES['pic']);
                if($info){
                    //删掉原来的图片
                    $cp = M('Users')->find(session('uid'));
                    unlink($cp['avatar']);
                    $data['avatar'] = basename($info['savepath'].$info['savename']);
                        if($mod->where("id=".session("uid"))->save($data)){
                            echo $this->success('更改成功');
                        }else{
                            echo $this ->error('更改失败');
                        }
                    return;
                }else{
                    echo $this->error($this->geterror());
                }
                return;
            }

        //设置修改密码，判断进来的页面
        if(I('get.oid')){
            $this->assign('oid',I('get.oid'));
        }

        $this->display();
    }
    public function Code_send(){
        $mobile = I('post.mobile');
        $code = rand(1000, 9999);
        session('code', $code, time() + 60 * 10);
        session('tel', $mobile, time() + 60 * 10);
        $users = M('Users');
        $user = $users->where(array('mobile' => $mobile))->field('mobile,nickname')->find();
        $phone = $user['mobile'];
        if($mobile == $user['mobile']){
            $send_sms_code=send_sms_code($phone,$code);
            if($send_sms_code==null){
                echo 2;
            }else{
                echo 0;
            }
        }else{
            echo 1;
        }
    }
    public function send_Code()
    {
        $password = md5(I('post.password'));
        $rePassword = md5(I('post.rePassword'));
        $send_code = I('post.code');
        $user = M('users');
        $code = session('code');
        $tel = session('tel');
        $id = session('uid');
        $users = $user->where(array('mobile' => $tel, 'id' => $id))->field('id,mobile,password')->find();
        if ($tel !== '' && $code == $send_code) {
            if ($rePassword !== $password) {
                if ($password == $users['password']) {
                    $user->where(array('id' => $users['id'], 'mobile' => $users['mobile']))->setField(array('password' => $rePassword));
                    session('tel', null);
                    session('code', null);
                    session('uid', null);
                    session('username', null);
                    echo 3;
                } else {
                    echo 1;
                }
            } else {
                echo 0;
            }
        }
    }
    //我的足迹
    public function memberHistory(){
        $history=D('history');
        $info3=$history->getHistory();
        $this->assign('info3',$info3);
        
        if(IS_AJAX){
            $this->display('history');
        }else{
            $this->display('memberHistory');
        }
    }
    public function delHistory(){
        $history=D('history');
        $id=I('gid');
        $res=$history->delHistory($id);
        if($res){
            $this->success('删除成功!');
        }else{
            $this->error('删除失败!');
        }
    }
}