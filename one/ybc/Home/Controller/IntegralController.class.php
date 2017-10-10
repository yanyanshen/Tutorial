<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IntegralController extends Controller{
    public function integral(){
        $ad=M('adgood');
        $adInfo=$ad->where(array('aid'=>47))->where(array('active'=>1))->select();
        $member=M('member');
        $points=$member->where(array('id'=>session('ybc_id')))->field('points')->find();
        $goods = M('goods_integral');
        $count = $goods->count();
        $page = new Page($count, 35);
        $show = $page->show();
        $goodsList = $goods->limit($page->firstRow . ',' . $page->listRows)->where(array('active'=>1))->select();
        $this->assign('adInfo',$adInfo);
        $this->assign('points',$points['points']);
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('firstrow', $page->firstRow);
        $this->assign('goodsList', $goodsList);
        $this->display();
    }

    public function search(){
        if (isset($_GET['keywords'])) {
            $keywords = $_GET['keywords'];
            $where1['goodsname'] = array('like', "%{$keywords}%");
            $where1['active']=1;
            $this->assign('keywords', $keywords);
        }
        $goods = M('goods_integral');
        $count = $goods->where($where1)->count();
        $page = new Page($count, 4);
        $show = $page->show();
        $goodsList = $goods->alias('g')
            ->where($where1)
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('firstrow', $page->firstRow);
        $this->assign('goodsList', $goodsList);
        $this->display();
    }
}