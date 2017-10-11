<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
    protected $_validate=array(
        array('mobile','require','收货人电话不能为空'),
        array('username','require','收货人不能为空'),
        array('mobile','/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/','请填写正确的手机号',0,'regex'),
    );

}
