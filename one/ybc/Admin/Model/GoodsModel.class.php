<?php
namespace Admin\Model;
use Think\Model;
 class GoodsModel extends Model{
    protected $tableName="goods";
     protected $_validate=array(
         //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
         //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
         //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
         //附加规则:默认为regex,附加规则的值决定了验证规则的值
         //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
         array('goodsname','require','商品名称不能为空'),
         //array('goodsname','','商品名称已经存在！',0,'unique',1), // 在新增的时候验证goodsname字段是否唯一
         array('price','require','商城价格不能为空'),
         array('price','/^[0-9]+(\.[0-9]{2})?$/','商品价格必须为数字！',0,'regex',3),
         //array('price','number','商城价格必须为数字'),
         array('oldprice','require','市场价格不能为空'),
         //array('oldprice','number','市场价格必须为数字'),
         array('oldprice','/^[0-9]+(\.[0-9]{2})?$/','商品价格必须为数字！',0,'regex',3),
         array('num','require','库存数量不能为空'),
         array('num','number','库存数量必须为数字'),
         array('weight','require','规格不能为空'),
         array('weight','number','商品规格必须为数字')
     );
    public function chkActiveById($id){
        $res=$this->where(array('id'=>$id))->find();
        return $res;
     }
     public function activeById($id){
         $data['active']=1;
         $res=$this->where(array('id'=>$id))->save($data);
         if($res){
             return $res;
         }else{
             return false;
         }
     }
     public function xiajiaById($id){
         $data['active']=0;
         $res=$this->where(array('id'=>$id))->save($data);
         if($res){
             return $res;
         }else{
             return false;
         }
     }
  public function addGoods($data){
        $gid=$this->add($data);
      return $gid;
  }


     //---------------------更改团购信息---------
     public function group($gid){
         $group=$this->where(array('id'=>$gid))->getField('group');
         if($group=='1'){
             $data=array('group'=>'0');
         }else{
             $data=array('group'=>'1');
         }
        $this->where(array('id'=>$gid))->save($data);


     }
     public function getgoods($num){
          $res=$this->limit(0,$num)->order('salenum desc')->select();
          return $res;
     }


 }