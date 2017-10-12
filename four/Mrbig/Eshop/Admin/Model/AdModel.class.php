<?php
namespace Admin\Model;
use Think\Model;
class AdModel extends Model{
    //添加广告
    public function saveAd($data){
        $obj=M('Ad');
        $data['addtime']=time();
        if($obj->create($data)){
            return $obj->add();
        }
    }
    //保存编辑商品到数据库
    public function saveeditAd($data){
        $obj=M('Ad');
        $data['addtime']=time();
        $gd=$obj->where(array('id'=>$data['id']))->find();
        /*if($obj->create($data)){
            return $obj->save();
        }*/
        if(is_int($data['id'])){
            unlink('./Public/Home/AD/n0/'.$gd['image']);
            unlink('./Public/Home/AD/n0/'.$gd['image']);
            unlink('./Public/Home/AD/n0/'.$gd['image']);
            unlink('./Public/Home/AD/n0/'.$gd['image']);
        }elseif($obj->create($data)){
            return $obj->save();}
    }
    //删除广告
    public function del($id){
        $del=$this->getAdById($id);
        unlink('./Public/Home/AD/n0/'.$del['image']);
        unlink('./Public/Home/AD/n1/'.$del['image']);
        unlink('./Public/Home/AD/n2/'.$del['image']);
        unlink('./Public/Home/AD/n3/'.$del['image']);
        return $this->delete($id);
    }
//获取所有商品列表
    public function getAllad($adsearch='',$firstRow='',$listRows=''){
        $obj=M('Ad');
        if($adsearch==''){
            return $obj->order('addtime desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['adname']=array('like','%'.$adsearch['adname'].'%');
            return $obj->where($map)->order('addtime desc')->limit($firstRow,$listRows)->select();
        }
    }
    //根据ID查找商品
    public function getAdById($id){
        $obj=M('Ad');
        return $obj->where(array('id'=>$id))->find();
    }

}