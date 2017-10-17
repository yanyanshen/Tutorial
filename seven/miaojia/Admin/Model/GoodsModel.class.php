<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    //添加商品到数据库
    public function saveGoods($data){
        $obj=M('goods');
        $data['createtime']=time();
        if($obj->create($data)){
            return $obj->add();

        }
    }
    //保存编辑商品到数据库
    public function editSave($data){
        $obj=M('goods');
        if($obj->create($data)){
            return $obj->save();
        }
    }

    //删除商品
    public function delGoods($id){
        $obj=M('goods');
        $goods=$this->getGoodsById($id);
        foreach(explode(',',$goods['image']) as $v){
            for($i=0;$i<=3;$i++){
                unlink("./upload/n".$i.'/'.$v);
            }
        }
        return $obj->delete($id);
    }
    //获取所有商品列表
    public function getAllGoods($goodssearch='',$firstRow='',$listRows=''){
        $obj=M('goods');
        if($goodssearch==''){
            return $obj->order('id desc')->limit($firstRow,$listRows)->select();
        }else{
            $map['goodsname']=array('like','%'.$goodssearch['goodsname'].'%');
            return $obj->where($map)->order('id desc')->limit($firstRow,$listRows)->select();
        }
    }
    //根据ID查找商品
    public function getGoodsById($id){
        $obj=M('goods');
        return $obj->where(array('id'=>$id))->find();
    }
}