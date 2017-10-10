<?php
namespace Admin\Model;

use Think\Model;

class GroupModel extends Model{
    protected $_validate=array(
        array('gid','require','请填写商品的ID！'),
        array('price','require','请填写团购价格！'),
        array('startime','require','请选择团购开始时间'),
        array('endtime','require','请选择团购结束的时间'),
        array('price','number','价格请填写整数'),
        array('groupnum','require','请填写团购人数'),
        array('groupnum','number','团购人数请填写整数'),

    );


    //-----------------将团购信息写入数据库-------------
    public function addData($data){
        $row=$this->add($data);
        if($row){
            return $row;
        }else{
            return false;
        }
    }


    //------------------上下架操作----------------------
    public function put($id){
        $active=$this->where(array('id'=>$id))->getField('active');
        if($active=='1'){
            $res=$this->where(array('id'=>$id))->save(array('active'=>'0'));
        }else{
            $res=$this->where(array('id'=>$id))->save(array('active'=>'1'));
        }

        if($res){
            return $res;
        }else{
            return false;
        }
    }



    //------------------删除团购商品--------------------
    public function del($id){
        $res=$this->where(array('id'=>$id))->delete();
        if($res){
            return $res;
        }else{
            return false;
        }
    }


    //-----------------------根据ID查询团购商品信息-------------
    public function refer($id){
        $info=$this->where(array('id'=>$id))->find();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

    //**************************修改团购商品****************
    public function edit($id,$info){
        $row=$this->where(array('id'=>$id))->save($info);
        if($row){
            return $row;
        }else{
            return false;
        }
    }


    //*************************查询今日开团商品***************
    public function todayGroup(){
        $where['startime']=array('LT',time());
        $where['endtime']=array('GT',time());
        $info=$this->alias('gp')->where($where)
            ->join('ybc_goods g ON gp.gid=g.id')
            ->field("g.goodsname as goodsname,g.pic as pic,gp.groupnum as groupnum,gp.applynum as applynum,gp.id as gid,g.price as price")
            ->select();
        if($info){
            return $info;
        }else{
            return false;
        }
    }



}