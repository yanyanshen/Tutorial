<?php
namespace Admin\Model;
use Think\Model;
class AdvertisingModel extends Model{
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('name','require','广告名称不能为空！'), //默认情况下用正则进行验证，
        array('sale','require','广告位售价不能为空！'),
        array('place','require','请输入广告位位置！'),
        array('url','require','商品链接不能为空！'),
        //在这改动过status
        array('status','require','请选择广告展示状态！'),
        array('image','require','广告图片不能为空！'),
        array('details','require','请将广告详情或其它数据填写完整！'),//默认情况下用正则进行验证
    );
}