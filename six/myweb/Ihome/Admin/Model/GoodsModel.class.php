<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
/*商品信息添加*/
    public function addGoods($data){
        $addInfo=$this->add($data);
        return $addInfo;
    }

/*商品编辑页*/
    public function editPage($data,$info){
        $result=$this->where($data)->save($info);
        return $result;
    }

/*商品列表编辑*/
    public function editGoods($data){
        $editInfo=$this->where($data)->find();
        return $editInfo;
    }

/*商品列表删除*/
    public function delGoods($data){
        $result=$this->where($data)->delete();
        return $result;
    }

/*商品状态处理*/
    public function sale($data,$sale){
        $result=$this->where(array('gid'=>$data))->save(array('issale'=>$sale));
        return $result;
    }

/*商品列表搜索*/
    public function search($goodsname){
        $searchInfo=$this->where("goodsname like '%{$goodsname}%'")->select();
        return $searchInfo;
    }
}