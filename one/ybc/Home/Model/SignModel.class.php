<?php
namespace Home\Model;

use Think\Model;

class SignModel extends Model{
    //查询今天是否已经签到
    public function chkSign($mid){
        $thistime=$this->where(array('mid'=>$mid))->getField('thistime');
        $now=date("Ymd",time());
        if($thistime==$now){
            //签到了返回false
            return false;
        }else{
            //没有签到返回true
            return true;
        }
    }


    //签到
    public function sign($mid){
        $info=$this->where(array('mid'=>$mid))->find();
        if($info){
            //不是第一次签到
            $lasttime=$info['thistime'];
            $thistime=date('Ymd',time());
            $mouth=$info['mouth'];
            $total=$info['total'];
            $days=$info['days'];
            $day=date('d',time());//今天的时间
            if(date('ym',time())==date('ym',strtotime($lasttime))){       //判断是不是同一个月登陆的
                $days=$days.$day.',';
            }else{
                $days="$day,";
            }

            //判断是否连续签到
            $yestoday=date("Ymd",strtotime("-1 day"));
            if($lasttime==$yestoday){
                $mouth=$mouth+1;
            }else{
                $mouth=1;
            }
            $data['lasttime']=$info['thistime'];
            $data['thistime']=$thistime;
            $data['mouth']=$mouth;
            $data['total']=$total+1;
            $data['days']=$days;
            $row=$this->where(array('mid'=>$mid))->save($data);
        }else{

            //第一次签到
            $data['lasttime']=date("Ymd",time());
            $data['thistime']=date("Ymd",time());
            $data['mouth']=1;
            $data['total']=1;
            $data['days']=date('d',time()).',';
            $data['mid']=$mid;
            $row=$this->add($data);
        }
        return $row;
    }

    //查询签到信息
    public function signInfo($mid){
        $info=$this->where(array('mid'=>$mid))->find();
        return $info;
    }

}