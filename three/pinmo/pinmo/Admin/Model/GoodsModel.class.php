<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    protected $_validate = array(
        array('goodsname','require','商品名称不能为空'), // 在新增的时候验证商品字段是否为空
        array('marketprice','require','市场价格不能为空'), // 在新增的时候验证市场价格是否为空
        array('price','require','价格不能为空'), // 在新增的时候验证价格字段是否为空
        array('num','require','库存不能为空'), // 在新增的时候验证库存字段是否为空
        //array('brand','require','价格不能为空'), // 在新增的时候验证字段是否为空
        //array('price','require','价格不能为空'), // 在新增的时候验证价格字段是否为空

    );
}
