<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
    //制作方法实现用户名 和 密码的校验
    //返回值
    //成功-->当前用户的信息记录
    //失败-->返回false
    public function checkNamePwd($username,$pwd){
      //首先验证名字，其次验证密码
        $info= $this->where("username='$username'")->find();
       // var_dump($info);
        if($info!==NULL){
            //验证密码
            if($info['pwd']===$pwd){
                return $info;
            }else{
                return false;
                //echo "<script>alert('用户名或者密码错误')</script>";
            }
        }
        return false;
    }

    public function order($mid){
        $sql="select ordersyn,buynum,prices,goodsname,pic,username,order_status_name from ihome_order as o,ihome_goods as g,ihome_adress as a,ihome_order_status as s
                where o.gid=g.gid and o.adressid=a.id and o.statusid=s.statusid and o.mid='{$mid}'";
        $model=new Model();
        $list=$model->query($sql);
        return $list;
    }



}