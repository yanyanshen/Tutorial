<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14
 * Time: 15:57
 */
namespace Home\Model;
use Think\Model;
class SiteModel extends Model{
    //自动验证
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则  默认：require(字段必填)、email、url、currency(货币)、number、integer(整数)、double、zip(邮政编码)、english
        //验证条件  0代表字段存在时验证，1代表必须验证，2代表字段非空时验证
        //附加规则  默认为regex，附加规则直接影响验证规则的值
        //验证时间  1是添加时验证，2更新时验证，3任何情况下都验证（默认）
        array('site_content','5,250','请输入详细地址',0,'length'),
        array('site_name','require','用户名不能为空'),
        array('site_zip','require','邮箱不能为空'),
        array('site_tel','/^1[3|4|5|8][0-9]\d{4,8}$/','手机号码错误！','0','regex',1),
        array('site_name','/^[\x{4e00}-\x{9fa5}]+$/u','写入正确收件人！','0','regex',1),

        //array('username','/^\d{3,6}$/','用户必须为3-6个数字',0,'regex',3),
        //array('username','rose','用户名必须为rose',0,'equal'),
        //array('username','rose','用户名不能为rose',0,'notequal'),
        //array('username',array('rose','jack'),'用户名不在要求的范围之内',0,'in')
        //array('username','rose,jack','用户名不在要求范围之内',0,'in'),
        //array('username','3,6','用户名长度在3-6个字符之间',0,'length')
        //array('username','88,99','用户名必须是88-99之间的数字',0,'between')
        //array('username','2012-1-15,2013-1-15','不在时间范围内',0,'expire')
        //array('username','172.16.11.90','不在Ip要求范围内111',0,'ip_allow'),
        //array('username','127.0.0.1','不在Ip要求范围内',0,'ip_deny')
        //array('username','english','用户名必须为英文'),
        //array('pwd','repwd','两次密码输入不匹配',0,'confirm'),
        //array('pwd','checkPwd','密码不满足要求',0,'callback',3,array('3','6'))
        //array('pwd','checkPwd','密码也不满足要求',0,'function',3,array('3','6'))


    );
    public function index(){

    }
}