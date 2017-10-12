<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('adminname','require','用户名不能为空'),
        array('adminname','2,15','用户名长度在2-15个字符之间',0,'length'),
        array('pwd','3,20','密码长度在3-20字符之间',0,'length'),
    );

    public function login(){
        $data['adminname']=trim(I('post.adminname'));
        $data['pwd']=md5(trim(I('post.pwd')));
        return $this->where($data)->find();//返回查询数据
    }
}