<?php
namespace Admin\Model;
use Think\Model;
class AdModel extends Model{
    protected $_validate = array(
        array('adname','require','广告名称不能为空'), // 在新增的时候验证品牌字段是否为空
        array('descript','require','品牌描述不能为空'), // 在新增的时候验证品牌描述字段是否为空
        array('adpic','require','图片不能为空'), // 在新增的时候验证图片字段是否为空
    );
}
