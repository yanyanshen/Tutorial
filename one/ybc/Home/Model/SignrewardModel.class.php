<?php
namespace Home\Model;
use Think\Model;

class SignRewardModel extends Model{

    //将前阿东信息写到添加到签到记录表中
    public function sign($data){
        $row1=$this->add($data);
        return $row1;
    }
}