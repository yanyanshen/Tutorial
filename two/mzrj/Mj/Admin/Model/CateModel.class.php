<?php
namespace Admin\Model;
use  Think\Model;
class CateModel extends Model{
   //自动验证
        protected $_validate = array(
            array('catename','require','商品分类名称不能为空')

        );


}