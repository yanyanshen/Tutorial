<?php
namespace Home\Model;
use Think\Model;
class CustomModel extends Model{
/*    //自动验证
 protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则  默认：require(字段必填)、email、url、currency(货币)、number、integer(整数)、double、zip(邮政编码)、english
        //验证条件  0代表字段存在时验证，1代表必须验证，2代表字段非空时验证
        //附加规则  默认为regex，附加规则直接影响验证规则的值
        //验证时间  1是添加时验证，2更新时验证，3任何情况下都验证（默认）
        array('custom_username','require','用户名不能为空'),
        array('custom_username','3,18','用户必须为3-18个数字',0,'length')
        //array('username','english','用户名必须为英文'),        array('pwd','repwd','两次密码输入不匹配',0,'confirm'),
        //array('pwd','checkPwd','密码不满足要求',0,'callback',3,array('3','6'))
        //array('pwd','checkPwd','密码也不满足要求',0,'function',3,array('3','6'))
    );*/

    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        array('custom_username','require','用户名不能为空'),
        array('custom_username','3,18','用户名长度在3-18个字符之间',0,'length'),
        array('custom_pwd','6,18','密码长度在6-18字符之间',0,'length'),
        array('custom_pwd','repwd','两次密码输入不匹配',0,'confirm')
    );

    public function register(){
        $data=$this->create();
            $data['custom_pwd']=md5(trim(I('post.custom_pwd')));
            $data['custom_time']=time();
            return $this->add($data);
    }


    public function login(){
        $condition['custom_username']=trim(I('post.custom_username'));
        $condition['custom_pwd']=md5(trim(I('post.custom_pwd')));
        return  $this->where($condition)->field('custom_id,custom_go')->find();
    }







    //    创建新图片删除原图片 返回图片新图片名称
    public function Uploads($e){
        $cu=M('custom');
        $s=$cu->where("custom_id=1")->select();
        $upload = new \Think\Upload();
        if(!empty($e)){
//            $cu->query("SET AUTOCOMMIT=0");
//            $cu->query("BEGIN");
            if(!$z=$upload->uploadOne($e['custom_pic'])){
//                mysql_query("ROLLBACK");
            }
            if($z['savename']){
                $bigimg=$z['savename'];
                if(!unlink('./Uploads/'.$s[0]['custom_pic'])){
//                    mysql_query("ROLLBACK");
                }
            }else{
                $bigimg=$s[0]['custom_pic'];
            }

            $data['custom_pic']=$bigimg;
//           $cu->query("SET AUTOCOMMIT=1");
        }
        return $data;
    }
//    返回商品的上一级分类名称
    public function Classify($e){
        $cu=M('class');
        $s=$cu->where("class_cid=$e")->select();
        return$s[0]['class_name'];
    }

}