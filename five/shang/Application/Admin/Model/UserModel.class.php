<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    //自动验证
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('username','require','用户名不能为空'),
        array('username','3,15','用户名长度在3-15个字符之间',0,'length'),
        array('username','','用户名已存在',1,'unique',3),
        array('pwd','require','密码不能为空'),
        array('pwd','3,15','密码长度在3-15个字符之间',0,'length'),
        array('repwd','require','确认密码不能为空'),
        array('repwd','pwd','两次密码不一致',1,'confirm'),

        //验证规则  默认：require(字段必填)、email、url、currency(货币)、number、integer(整数)、double、zip(邮政编码)、english
        //验证条件  0代表字段存在时验证，1代表必须验证，2代表字段非空时验证
        //附加规则  默认为regex，附加规则直接影响验证规则的值
        //验证时间  1是添加时验证，2更新时验证，3任何情况下都验证（默认）
    );
//自动完成
    protected $_auto=array(
        //array('完成字段','完成规则',['完成条件','附加规则'])
        array('pwd','md5',3,'function'),
        array('username','trim',3,'function'),
        array('pwd','trim',3,'function'),

    );



}