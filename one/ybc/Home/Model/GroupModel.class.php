<?php
namespace Home\Model;

use Think\Model;

class GroupModel extends Model{
    //查询左边团购
    public function seven(){
        $leftInfo=$this->order('addtime desc')->limit(0,7)->where(array('important'=>'0','active'=>1))->select();
        if($leftInfo){
            return $leftInfo;
        }else{
            return false;
        }
    }


    //查询主要团购商品
    public function one(){
        $mainInfo=$this->order('addtime desc')->where(array('important'=>'1','active'=>1))->limit('0,1')->select();
        if($mainInfo){
            return $mainInfo;
        }else{
            return false;
        }
    }



    //查询右边团购商品
    public function eight(){
        $rightInfo=$this->order('addtime desc')->limit(7,6)->where(array('important'=>'0','active'=>1))->select();
        if($rightInfo){
            return $rightInfo;
        }else{
            return false;
        }
    }


    //修改团购里面的人数信息
    public function num($gid){
        $info=$this->where(array('id'=>$gid))->field('groupnum,applynum')->find();
        $data['groupnum']=$info['groupnum']-1;
        $data['applynum']=$info['applynum']+1;
        $row=$this->where(array('id'=>$gid))->save($data);
        if($row){
            return $row;
        }else{
            return false;
        }
    }


}