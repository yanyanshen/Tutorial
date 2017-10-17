<?php
namespace Admin\Model;
use Think\Model;
class  ActiveModel extends  Model{
    protected $_validate=array(
        array("gid","require","商品ID不允许为空"),
        array("activenum","require","活动数量不允许为空"),
        array("activeprice","require","活动价格不允许为空"),
        array("activetime","require","活动时间不允许为空")
    );

    public function activeList(){
        $active=M('active');
        return $active->alias('a')
            ->join('sk_goods g on a.gid= g.id')
            ->field('goodsname,image,activenum,activeprice,startime,endtime,gid,is_active,a.id')
            ->select();
    }

    public function getgoodsinfo($id){
        $active=M('goods');
        return $active->where(array("id"=>$id))->field('id,goodsname,goodsnum,saleprice,goodsdetail,image')->find();
    }

    public function addactive($date){
        $active=M('active');
        $active->startTrans();
        $date['startime']=substr(I('post.activetime'),0,5);
        $date['endtime']=substr(I('post.activetime'),6,5);
        $date['saleprice']=I('post.saleprice');
        $date['jointime']=time();
        $rel1=$active->add($date);
        $is_active['is_active']=1;
        $rel2=M('goods')->where(array("id"=>$date['gid']))->save($is_active);
        if($rel1&&$rel2){
            $this->commit();
            return true;
        }else{
            $this->rollback();
            return false;
        }
    }

    public function delactive($gid){
        $active=M('active');
        return $active->where(array("gid"=>$gid))->delete();
    }
}