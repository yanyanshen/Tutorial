<?php
namespace Home\Controller;

use Think\Controller;

class SignController extends Controller{
    public function index(){
        $mid=session('ybc_id');
        $sign=D('Sign');
        $info=$sign->signInfo($mid);
        $info['sum']=M('signreward')->where(array('mid'=>$mid))->sum('reward');
        $info['reward']=M('signreward')->where(array('mid'=>$mid))->getField('reward');
        $info['count']=count(explode(',',$info['days']))-1;
        $reward=M('signreward')->where(array('mid'=>$mid))->order('id desc')->limit('0,8')->select();
        $this->assign('reward',$reward);
        $this->assign('info',$info);
        $this->display('index');
    }

    //查询是否已经登录
    public function chkLogin(){
        if(session('ybc_id')){
            $this->success();
        }else{
            session('url',U('Sign/index'));
            $this->error("请先登录哦亲~");
        }
    }


    //查询今天是否已经签到
    public function chkSign(){
        $mid=session('ybc_id');
        $sign=D('Sign');
        $res=$sign->chkSign($mid);
        if($res){
            //没有签到
            $this->success();
        }else{
            //已经签到
            $this->error();
        }
    }

    //签到
    public function sign(){
        $mid=session('ybc_id');
        $sign=D('Sign');
        $row=$sign->sign($mid);
        if($row){
            $mouth=$sign->where(array('mid'=>$mid))->getField('mouth');
            if($mouth>=7){
                $data['reward']=30;
            }else{
                $data['reward']=10;
            }
            $data['mid']=$mid;
            $data['signtime']=time();
            $signReward=D('Signreward');
            $row1=$signReward->sign($data);
            /*$member=M('Member');
            $points=$member->where(array('id'=>$mid))->getField('points');
            $points=$points+$data['reward'];
            $member->where(array('id'=>$mid))->save($points);*/
            $member=D('Member');
            if($mouth>=7){
                $data1=30;
            }else{
                $data1=10;
            }
            $res2=$member->addPoints($mid,$data1);
            if($row1 && $res2){
                $this->success();
            }else{
                $this->error();
            }
        }else{
            $this->error();
        }
    }


    //判断是否是同一个月
    public function mouth(){
        $mid=session('ybc_id');
        $sign=M('sign');
        if($mid){
            $lasttime=$sign->where(array('mid'=>$mid))->getField('thistime');
            $now=date('ym',time());
            if($now==date('ym',strtotime($lasttime))){

            }else{
                $day='';
                $sign->where(array('mid'=>$mid))->save(array('days'=>$day));
            }
        }
    }


}