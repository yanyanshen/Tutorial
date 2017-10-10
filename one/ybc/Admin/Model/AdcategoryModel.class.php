<?php
namespace Admin\Model;

use Think\Model;

class AdcategoryModel extends Model{

    //上下架操作
    public function modify($id){
        $active=$this->where(array('id'=>$id))->field('active')->find();
        $path=$this->where(array('id'=>$id))->field('path')->find();
        $where['path']=array('like',"{$path['path']}%");
        if($active['active']=='1'){
            $active['active']='0';
        }else{
            $active['active']='1';
        }
       $res=$this->where($where)->save($active);
        if($res){
            return $res;
        }else{
            return false;
        }
    }

    //查询分类操作
    public function getCateByAid($aid){
        $cateList=$this->where(array('aid'=>$aid))->select();
        if($cateList){
            return $cateList;
        }else{
            return false;
        }
    }

    //检测分类名称是否存在
    public function chkName($adcatename){
        $res=$this->where(array('adcatename'=>$adcatename))->select();
        if($res){
            return false;
        }else{
            return true;
        }
    }

    //查询分类的path
    public function getCatePath($id){
        $data=$this->where(array('id'=>$id))->field('path')->find();
        if($data){
            return $data['path'];
        }else{
            return false;
        }
    }


    //添加分类到数据库
    public function addCate($data){
        $id=$this->add($data);
        if($id){
            return $id;
        }else{
            return false;
        }
    }

    //更新数据库
    public function Updata($id,$path){
        $dataInfo['path']=$path;
        $ref=$this->where(array('id'=>$id))->save($dataInfo);
        if($ref){
            return true;
        }else{
            return false;
        }
    }

    //删除分类操作
    public function del($id){
        $res=$this->where(array('id'=>$id))->delete();
        if($res){
            return $res;
        }else{
            return false;
        }
    }


}