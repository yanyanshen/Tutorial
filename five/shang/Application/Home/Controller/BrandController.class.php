<?php
namespace Home\Controller;
use Think\Controller;
class BrandController extends Controller {
    public function index()
    {
        //遍历商品
        $this->display();
    }

 public function brand(){
     //轮播显示图
     $ad=M('Ads');
     $adlist=$ad->where('pid=6')->select();
     //搜索品牌中的商品
     $goods=M('Goods');
     $bid=I('get.bid');
     //$search['brand_name']=array('like',"%".I('get.brand_name')."%");
     $data['bid']=$bid;
     $data['cid']=22;
     $goodslist=$goods->where($data)->limit('6')->select();
     //echo $goods->getLastSql();

     $data['id']=$bid;
     $data['cid']=7;
     $goodslist1=$goods->where($data)->limit('6')->select();
     $data['id']=$bid;
     $data['cid']=6;
     $goodslist2=$goods->where($data)->limit('6')->select();

     $this->assign('goodslist',$goodslist);
     $this->assign('goodslist1',$goodslist1);
     $this->assign('goodslist2',$goodslist2);
     $this->assign('adlist',$adlist);
     $this->display();
 }

    }
