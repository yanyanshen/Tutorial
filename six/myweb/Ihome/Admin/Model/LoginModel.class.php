<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
   public function login($username,$pwd){
       $userInfo=$this->where(array('username'=>$username,'pwd'=>$pwd))->find();
       if($userInfo){
         return $userInfo;
       }else{
         return false;
       }
   }
}