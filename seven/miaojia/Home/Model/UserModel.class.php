<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $_auto=array(
        array('level',1),
        array('money',0),
        array('status',1),
        array('passwd','md5',3,'function'),
    );
    protected $_validate=array(
        array('yzm','require','验证码不能为空'),
        array('username','','用户名已存在!',0,'unique',1)
    );
    public function chkUser($username){
        $User=M('user');
        if(!$User->where(array('username'=>$username))->find()){
            $arr=array('ok'=>'恭喜，用户名可以注册');
        }else{
            $arr=array('error'=>'对不起，用户名已存在');
        }
        return json_encode($arr);
    }
    public function registered($data){
        $User=D('User');
        $User->create($data);
        $User->regtime=time();
        $User->birthday=strtotime($data['year'].'-'.$data['month'].'-'.$data['day']);
        return $User->add();
    }
    public function logined($data){
        $obj=D('User');
        $data['passwd']=md5($data['passwd']);
        $data['status']=1;
        return $obj->where($data)->find();
    }
    //根据用户名查找用户资料
    public function meminfo($username){
        $User=M('user');
        return $User->where(array('username'=>$username))->find();
    }

    //根据UID查找用户信息
    public function getMeminfoByUid($uid){
        $User=M('user');
        return $User->where(array('id'=>$uid))->find();
    }

    //修改密码
    public function changepwd($data){
        $obj=M('user');
        $data['passwd']=md5($data['pwd']);
        if($obj->where(array('username'=>session('username'),'passwd'=>md5($data['oldpwd'])))->find()){
            $obj->where(array('username'=>session('username')))->field('passwd')->save($data);
            return "修改成功";
        }else{
            return "原密码输入错误,请重新输入";
        }
    }

    //添加收货地址
    public function addAddress($data){
        $obj=M('address');
        if($obj->create($data)){
            return $obj->add();
        }else{
            return false;
        }
    }

    //更新用户头像
    public function savePic($data){
        $obj=M('user');
        $oldpic=$this->meminfo(session('username'))['pic'];
        unlink('./upload/UserPic/'.$oldpic);
        unlink('./upload/UserPic/small/'.$oldpic);
        if($obj->create($data)){
            return $obj->save();
        }else{
            return false;
        }
    }

    //更新会员中心用户信息
    public function updateInfo($data){
        $obj=M('user');
        if($obj->create($data)){
            return $obj->save();
        }else{
            return false;
        }
    }

    //订单付款，扣款，更新积分操作
    public function payOrder($data){
        $uid=$data['id'];
        $orderprices=$data['orderprices'];
        $obj=M('user');
        $prices=$obj->where(array('id'=>$uid))->setDec('money',$orderprices);
        $score=$obj->where(array('id'=>$uid))->setInc('score',$orderprices);
        if($prices && $score){
            return true;
        }else{
            return false;
        }
    }

    //确认收货操作
    public function confirmSh($data){
        $obj=M('order');
        if($obj->create($data)){
            $obj->orderstatus=4;
            return $obj->where($data)->save();
        }else{
            return false;
        }
    }

    //积分兑换操作
    public function scoreToMoney($score){
        $obj=M('user');
        $user=$this->meminfo(session('username'));
        if($score>$user['score'] || $score<100){
            return false;
        }else{
            $obj->startTrans();
            $money=$obj->where(array('id'=>session('uid')))->setInc('money',$score/100);
            $score=$obj->where(array('id'=>session('uid')))->setDec('score',$score);
            if($money && $score){
                $obj->commit();
                return true;
            }else{
                $obj->rollback();
                return false;
            }
        }
    }
}