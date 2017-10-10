<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{
    protected $tableName='order';

    public function mulChange($arr,$newStatus){//批量发货
        $map['id']=array("IN",$arr);
        $data['orderstatus']=$newStatus;
        $pd=$this->where($map)->save($data);
        return $pd;
    }

    public function chkStatus($id){//检测订单的当前状态
        return $this->where(array('id'=>$id))->field('orderstatus')->find();
    }

    public function mulRemind1($arr){//批量提醒付款
        foreach($arr as $v){
            $a=$this->where(array('id'=>$v))->find();
            $mid=$a['mid'];
            $data[]=array('mid'=>$mid,'title'=>'亲,看中了就买了吧!','message'=>'亲，您订单里的宝贝马上就要失效了，赶紧付款哦！','time'=>time());
        }
        $res=M("member_message")->addAll($data);
        return $res;
    }

    public function mulRemind2($arr){//批量提醒收货
        foreach($arr as $v){
            $a=$this->where(array('id'=>$v))->find();
            $mid=$a['mid'];
            $data[]=array('mid'=>$mid,'title'=>'收货提醒!','message'=>'亲，您的宝贝已经向您飞奔而去，请注意查收哦！','time'=>time());
        }
        $res=M("member_message")->addAll($data);
        return $res;
    }

    public function mulRemind3($arr){//批量提醒评价
        foreach($arr as $v){
            $a=$this->where(array('id'=>$v))->find();
            $mid=$a['mid'];
            $data[]=array('mid'=>$mid,'title'=>'您的满意的我们的追求!','message'=>'亲，您收到的宝贝还满意吗，请及时给予评价，我们将竭力为您提供更优的产品，更好的服务！','time'=>time());
        }
        $res=M("member_message")->addAll($data);
        return $res;
    }


    public function page1($condition=''){
        $count= $this->alias('o')
            ->join("ybc_member m ON o.mid=m.id")
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                'o.id'=>'id',
                'o.ordersyn'=>'ordersyn',
                'm.username'=>'username',
                's.status'=>'status',
                'o.addtime'=>'addtime',
                'm.id'=>'mid',
                'o.orderprice'=>'price'
            ))
            ->where($condition)
            ->where("o.mid=m.id and o.orderstatus=s.id")
            ->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $Page->setConfig('theme','<span class="rows">共 %TOTAL_ROW% 条记录 %NOW_PAGE%/%TOTAL_PAGE%页</span> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $this->alias('o')
            ->join("ybc_member m ON o.mid=m.id")
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                'o.id'=>'id',
                'o.ordersyn'=>'ordersyn',
                'm.username'=>'username',
                's.status'=>'status',
                'o.addtime'=>'addtime',
                'm.id'=>'mid',
                'o.orderprice'=>'price',
                's.next'
            ))
            ->where($condition)
            ->where("o.mid=m.id and o.orderstatus=s.id")
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        return array(
            'firstRow'=>$Page->firstRow,
            'list'=>$list,
            'page'=>$show
            );
    }

    public function detail($id){//查询订单详情信息
        //订单状态、订单号、下单时间、收货地址、收货人、联系方式、支付方式、

        $arr1=$this->alias('o')
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                "o.id"=>"id",
                's.status'=>'status',
                'o.ordersyn'=>'ordersyn',
                'o.addtime'=>'addtime',
                'o.paymethod'=>'paymethod',
                "o.orderprice"=>"orderprice",
                "o.postage"))
            ->where("o.id={$id}")
            ->find();
        $arr2=$this->alias('o')
            ->join("ybc_member_address a ON o.address_id=a.id")
            ->field(array(
                'a.address'=>'address',
                'a.name'=>'username',
                'a.phone'=>'phone'))
            ->where("o.id={$id}")
            ->find();

        return array($arr1,$arr2);
    }

    public function orderGoods($id){//查询订单详情里的商品信息
        //商品图片、商品名称、单价、购买数量、订单总价、邮费
        $arr=$this->alias('o')
            ->join("ybc_order_goods og ON o.id=og.oid")
            ->join("ybc_goods g ON og.gid=g.id")
            ->field(array(
                "g.pic"=>"pic",
                "g.goodsname"=>'goodsname',
                "g.price"=>'price',
                "og.buynum"=>"buynum"
            ))
            ->where("o.id={$id}")
            ->select();
        return $arr;
    }

    public function getAll($where){

        $arr= $this->alias('o')
            ->join("ybc_member m ON o.mid=m.id")
            ->join("ybc_order_status s ON o.orderstatus=s.id")
            ->field(array(
                'o.id'=>'id',
                'o.ordersyn'=>'ordersyn',
                'm.username'=>'username',
                's.status'=>'status',
                'o.addtime'=>'addtime',
                'm.id'=>'mid',
                'o.orderprice'=>'price'
            ))
            ->where($where)
            ->order("m.id")
            ->select();
        return $arr;
    }
}