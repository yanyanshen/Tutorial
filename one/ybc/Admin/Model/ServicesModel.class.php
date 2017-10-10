<?php
namespace Admin\Model;
use Think\Model;
class ServicesModel extends Model{
    public function getList($condition=''){
        //用户名，商品名，商品价格，商品数量，申请时间，状态，处理人，处理时间

        

        $count=$this->alias('s')->join('ybc_history h on s.hid=h.id')->join('ybc_member m on s.mid=m.id')->where($condition)
            ->field(array("s.id","m.username"=>"mname","h.goodsname","h.price","h.buynum","s.applytime","s.status","s.cltime"))
            ->order('applytime')
            ->count();
        $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $Page->setConfig('theme','<span class="rows">共 %TOTAL_ROW% 条记录 %NOW_PAGE%/%TOTAL_PAGE%页</span> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show       = $Page->show();// 分页显示输出
        $list=$this->alias('s')->join('ybc_history h on s.hid=h.id')->join('ybc_member m on s.mid=m.id')->where($condition)
            ->field(array("s.id","m.username"=>"mname","h.goodsname","h.price","h.pic","h.buynum","s.applytime","s.status","s.cltime"))
            ->order('applytime')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        return array(
            'firstRow'=>$Page->firstRow,
            'list'=>$list,
            'page'=>$show
        );
    }

    public function detail($sid){
        return $this->alias('s')->join("ybc_history h on s.hid=h.id")->join('ybc_member m on s.mid=m.id')->where(array('s.id'=>$sid))->find();
    }
}