<?php
namespace Admin\Model;

use Think\Model;

class AdgoodModel extends Model{
    public function put($id){
        $active=$this->where(array('id'=>$id))->getField('active');
        if($active=='1'){
            $data['active']='0';
        }else{
            $data['active']='1';
        }
        $res=$this->where(array('id'=>$id))->save($data);
        if($res){
            return $res;
        }else{
            return false;
        }
    }


    public function del($id){
        $res=$this->where(array('id'=>$id))->delete();
        if($res){
            return $res;
        }else{
            return false;
        }
    }


}