<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model{
    //一级分类
    public function firstCate(){
        $obj=M('category');
        return $obj->where(array('pid'=>0,'flag'=>1))->select();
    }
    public function secondCate($id){
        $obj=M('category');
        return $obj->where(array('pid'=>$id,'flag'=>1))->select();
    }
    public function getChildCate($id){
        $condition['id']=array('eq',$id);
        $condition['path']=array(array('like','%,'.$id.',%'),array('exp','RLIKE(\'^,*'.$id.',.*\')'),'OR');
        $condition['_logic']='OR';
        $obj=M('category');
        $res=$obj->where($condition)->field('id')->select();
        $res1='';
        foreach($res as $v){
            $res1.=','.$v['id'];
        }
        return substr($res1,1);
    }

    public function getCatenameByCid($id){
        $obj=M('category');
        return $obj->where(array('id'=>$id))->field('catename')->find()['catename'];
    }

    public function getCateFromCid($cid){
        $obj=M('category');
        $path=$obj->where(array('id'=>$cid))->field('path')->find()['path'];
        $cate='';
        foreach(explode(',',$path) as $k=>$v){
            $cate.='>>'.'<a href='.U('Goods/goodsList',array('cid'=>$v)).'>'.$this->getCatenameByCid($v).'</a>';
        }
        return substr($cate,2);
    }
}