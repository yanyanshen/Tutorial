<?php
namespace Mobile\Model;
use Think\Model;
class GoodsscModel extends Model{
    public function getScByUid(){
        $obj=M('goodssc');
        $res=$obj->where(array('uid'=>session('uid')))->select();
        $str='';
        foreach($res as $v){
            $str.=$v['gid'].',';
        }
        return substr($str,0,-1);
    }

    public function getScGoodsByUid(){
        $obj=M('goodssc');
        $res=$obj->where(array('uid'=>session('uid')))->select();
        $goods=new GoodsModel();
        foreach($res as $k=>$v){
            $goodsScList[]=$goods->detail($v['gid']);
        }
        return $goodsScList;
    }

    public function delGoodsSc($data){
        $obj=M('goodssc');
        return $obj->where($data)->delete();
    }
}