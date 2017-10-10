<?php
namespace Mobile\Model;
use Think\Model;
class HistoryModel extends Model{
    protected $tableName='history';
    public function getGoodsList($mid){
        $count=$this->alias('h')
            ->join('ybc_goods g ON h.gid = g.id')
            ->field(array(
                "g.goodsname"=>'goodsname',
                "g.pic"=>'pic',
                "h.buynum"=>'buynum',
                "g.id"=>'gid'
            ))
            ->where(array('mid'=>$mid,'h.active'=>1))
            ->count();
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('first',"首页");
        $Page->setConfig('last',"尾页");
        $Page->setConfig('prev',"<<");
        $Page->setConfig('next',">>");
        $Page->setConfig('theme','<span class="rows">共 %TOTAL_ROW% 条记录 %NOW_PAGE%/%TOTAL_PAGE%页</span> %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show       = $Page->show();// 分页显示输出
        $goods=$this->alias('h')
            ->join('ybc_goods g ON h.gid = g.id')
            ->field(array(
                "g.goodsname"=>'goodsname',
                "g.pic"=>'pic',
                "h.buynum"=>'buynum',
                "g.id"=>'gid'
            ))
            ->where(array('mid'=>$mid,'h.active'=>1))
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        return array(
            'firstRow'=>$Page->firstRow,
            'goods'=>$goods,
            'page'=>$show
        );
    }
}