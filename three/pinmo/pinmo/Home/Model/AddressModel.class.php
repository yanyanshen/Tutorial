<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
    protected $_validate = array(
        array('recever','require','收货人不能为空'), // 在新增的时候验证收货人字段是否为空
        array('address1','require','地址不能为空'), // 在新增的时候验证地址字段是否为空
        array('address2','require','地址不能为空'), // 在新增的时候验证地址字段是否为空
        array('post','zip','邮编格式不正确'), // 在新增的时候验证post字段是否为空
        array('mobile','/^1[34578]\d{9}$/','手机号不正确',0,'regex'), // 在新增的时候验证手机号字段是否为空

    );

}