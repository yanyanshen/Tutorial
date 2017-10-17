<?php
namespace Mobile\Model;
use Think\Model;
class GoodsModel extends Model{
    public function detail($id){
        $obj=M('goods');
        return $obj->where(array('id'=>$id,'issale'=>1))->find();
    }
    public function hot_tj(){
        $obj=M('goods');
        return $obj->where(array('hot'=>1,'tj'=>1,'issale'=>1))->order('rand()')->select();
    }
    public function getGoods($data,$firstRow='',$listRows=''){
        $obj=new CategoryModel();
        $goods=M('goods');
        $map['issale']=1;
        if($data['cid']!=0 && $data['goodsname']==''){
            $goods_category=$obj->getChildCate($data['cid']);
            $map['cid']=array('in',$goods_category);
            return $goods->where($map)->order('createtime desc')->limit($firstRow,$listRows)->select();
        }elseif($data['cid']==0 && $data['goodsname']==''){
            return $goods->where($map)->order('createtime desc')->limit($firstRow,$listRows)->select();
        }elseif($data['cid']==0 && $data['goodsname']!=''){
            $map['goodsname']=array('like','%'.$data['goodsname'].'%');
            return $goods->where($map)->order('createtime desc')->limit($firstRow,$listRows)->select();
        }
    }
    //随机抽取商品
    public function getRandGoods(){
        $obj=M('goods');
        return $obj->order('rand()')->limit(0,4)->select();
    }
}