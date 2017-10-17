<?php
namespace Mobile\Model;
use Think\Model;

class AddressModel extends Model{
    protected $_validate=array(
        array("name","require","收货人姓名不能为空"),
        array("mobile","require","手机号码不能为空"),
        array("mobile",'/^1[3|4|5|7|8][0-9]\d{8}$/',"请填写正确的手机格式"),
        array("address","require","请选择收货地址"),
        array("detailaddress","require","请填写详细地址")
    );
    public function addressList(){
        $uid=M('users')->where(array("username"=>session("username")))->field('id')->find();
        $address=M('address');
        return $address->where(array("uid"=>$uid['id']))->order("setdefault desc")->select();
    }
    //添加收货地址
    public function addAddress($date,$default='',$id=''){
        $address=M('address');
        $uid=M('users')->where(array("username"=>session("username")))->field('id')->find();
        $date['uid']=$uid['id'];
        if($default==1){
            $def['setdefault']=0;
            $address->where(array("uid"=>$uid['id']))->save($def);
            $date['setdefault']=$default;
        }
        //存在ID就更新   不存在就添加
        if($id==''){
            return $address->add($date);
        }else{
            return $address->where(array("id"=>$id))->save($date);
        }

    }

    //删除收货地址
    public function deladdress($id){
        $address=M('address');
        return $address->where(array("id"=>$id))->delete();
    }

    //编辑收货地址
    public function editaddress($id){
        $address=M('address');
        return $address->where(array('id'=>$id))->find();
    }

    //默认收货地址
    public function defaultaddress($id){
        $address=M("address");
        //如果已经是默认值，则设置失败
        $d=$address->where("id=".$id)->field("setdefault")->find();
        if($d['setdefault']==1){
            return false;
        }else{
            $address->startTrans();//开启事务
            //设置前先清除以前的默认
            $where['username']=array("eq",session("username"));
            $uid=M("users")->where($where)->field("id")->find();
            $date0['setdefault']=0;
            $rel1=$address->where("id=id")->where(array("uid"=>$uid['id']))->save($date0);//如果初始全部为0  则这条语句会返回0 所以下面判断的时候加1
            //根据id设置当前的默认值
            $where['id']=array("eq",$id);
            $date1['setdefault']=1;
            $rel2=$address->where($where)->save($date1);
            if(($rel1+1)&&$rel2){
                $address->commit();//都成功则写入数据库，否则全部退回
                return 1;
            }else{
                $address->rollback();
                return false;
            }
        }
    }
}

?>