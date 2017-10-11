<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{

    public function _initialize(){

       $goods=array_reverse($_SESSION['mycar_'],true);
        $this->assign('goods',$goods);

    }
    public function index(){

        $id=I('get.id');
        $goods=M('Goods');
        $arr=$goods->where(array('id'=>$id))->find();
        $goodslist[]=$arr;
        $this->assign('id',$id);
        $this->assign('goodsname',$arr['goodsname']);
        $this->assign('price',$arr['price']);
        $this->assign('marketprice',$arr['marketprice']);
        $this->assign('picname',$arr['picname']);
        $this->display('detail');

    }
}