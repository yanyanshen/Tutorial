<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{

    protected $_validate = array(
        array('username','','帐号名称已经存在！',0,'unique',1)
    );


      public function ck(){

          if (!$this->create()){
              // 如果创建失败 表示验证没有通过 输出错误提示信息
              return $this->getError();
          }
      }

    public function add_admin(){
        if($this->create()){
            $result = $this->add(); // 写入数据到数据库
            if($result){
             return   $insertId = $result;
            }else{
                return false;
            }
        }
    }

    public function admin(){   ///管理员列表
        return $this ->order('vip desc,createtime')->select();
    }

   public function update($data){
       $this->save($data); // 根据条件更新记录
   }
}
