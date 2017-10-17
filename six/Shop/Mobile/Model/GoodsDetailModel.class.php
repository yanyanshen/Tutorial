<?php
namespace Mobile\Model;
use Think\Model;

class GoodsDetailModel extends Model{
    protected $name="goods";

    //获取商品信息s
    public function getgoodsinfo($id){
        $goods=M('goods');
        return $goods->where(array("id"=>$id))->find();
    }
}

?>