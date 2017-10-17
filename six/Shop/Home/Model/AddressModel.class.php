<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model{
    protected $_validate=array(
        array("address","require","地区不能为空"),
        array("detailAddress","require","请填写详细地址"),
        array("name","require","请填写收件人姓名"),
        array("mobile","require","请填写联系方式"),
        //array("code","/^[1-9][0-9]{5}$/","请填写正确的格式"),
        array("mobile"," /^1[34578]\\d{9}$/","请填写正确的手机号码")
    );
    //添加收货地址
    public function addAddress($date){
        $address=M('address');
        //通过session找到会员表中对应的id  写入收货地址中的uid
        $where['username']=array("eq",session("username"));
        $uid=M("users")->where($where)->field("id")->find();
        $date['uid']=$uid['id'];
        //如果存在id   表示编辑更新，， 否则表示添加
        if($date['id']){
            return $address->save($date);
        }else{
            return   $address->add($date);
        }
    }
    //删除收货地址
    public function delAddress($id){
        $address=M("address");
        $uid=M("users")->where(array("username"=>session("username")))->field('id')->find();
        $where['uid']=$uid['id'];
        $where['id']=array("eq",$id);
        return  $address->where($where)->delete();
    }

    //遍历收货地址
    public function getAddressList(){
        $address=M("address");
        $where['username']=array("eq",session("username"));
        $uid=M("users")->where($where)->field("id")->find();
        //先根据默认值排序，在通过id
        $addressList=$address->where(array("uid"=>$uid['id']))->field("id,name,address,detailaddress,mobile,code")->order("setdefault desc,id desc")->select();
        return $addressList;
    }

    //更新收货地址
    public function getAddress($id){
        $address=M("address");
        //根据id找到对应的数据，反馈到input的value值里面
        $where['id']=array("eq",$id);
        return $address->where($where)->field("id,code,name,address,detailaddress,mobile")->find();
    }
    public function setDefaultAddress($id){
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