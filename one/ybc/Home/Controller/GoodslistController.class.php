<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
 class GoodslistController extends Controller
 {
     public function  index()
     {
         $model = D('Goodslist');
         if (isset($_GET['keywords'])) {
             $keywords = $_GET['keywords'];
             $this->assign('keywords', $keywords);
         } else {
             $keywords = false;
         }
         if (isset($_GET['category1'])) {
             $category1 = $_GET['category1'];
             $this->assign('category1', $category1);
             //获取二级分类
             $catelist2 = $model->category2($category1);
         } else {
             $category1 = false;
         }
         if (isset($_GET['brand'])) {
             $brand = $_GET['brand'];
             $this->assign('brand', $brand);

         } else {
             $brand = false;
         }
         if (isset($_GET['cate'])) {
             $cate = $_GET['cate'];
             $this->assign('cate', $cate);
         } else {
             $cate = false;
         }
         if (isset($_GET['price'])) {
             $price = $_GET['price'];
             $this->assign('price', $price);
         } else {
             $price = false;
         }

         if (isset($_GET['order'])) {
             $order = $_GET['order'];
             $this->assign('order', $order);
         } else {
             $order = false;
         }
         $arr = $model->goodsinfo($keywords, $category1, $brand, $cate, $price, $order);
         //获取品牌列表
         $brandlist = $model->brand();
         //获取一级分类
         $catelist1 = $model->category1();
         $teacate = $model->category1();
         array_pop($teacate);
         //获取产品中心面包屑
         $catename = $model->catename($category1);
         //获取推荐茶叶
         $adNameIfo = D('adgood')->leftRecommed();
         foreach ($adNameIfo as $k => $v) {
             $id = $v['gid'];
             $adNameIfo[$k]['goodsname'] = M('goods')->where(array('id' => $id))->getField('goodsname');
         }
         $mid = session('ybc_id');
         $res = $arr['res'];
         foreach ($res as $k => $v) {
             $gid = $v['id'];
             $id = M('goods_collect')->field('id')->where(array('mid' => $mid, 'gid' => $gid))->select();
             $goodsInfo = M('goods')->where(array('id' => $gid))->find();
             $res[$k]['goodsname'] = $goodsInfo['goodsname'];
             $res[$k]['pic'] = $goodsInfo['pic'];
             $res[$k]['price'] = $goodsInfo['price'];
             $res[$k]['oldprice'] = $goodsInfo['oldprice'];
             $res[$k]['commentnum'] = $goodsInfo['commentnum'];
             $res[$k]['collect'] = $id;


         }


         $nowpage=$arr['nowpage']/10 + 1;


         $this->assign('total', $arr['count']);
         $this->assign('nowpage', $nowpage);
         $this->assign('totalpage', ceil($arr['count'] / 10));
         $this->assign('cateres', $teacate);
         $this->assign('adNameIfo', $adNameIfo);
         $this->assign('page', $arr['show']);
         $this->assign('cate1', $catelist1);
         $this->assign('catename', $catename);
         $this->assign('cate2', $catelist2);
         $this->assign('brandlist', $brandlist);
         $this->assign('res', $res);

         if (IS_AJAX) {
             $this->display('result');
         } else {
             $this->display();
         }

     }

     public function addcart()
     {
         //判断用户是否登录
         $model = D('goodslist');
         $mid = session('ybc_id');
         $gid = I('post.id');
         $data = $model->table('ybc_goods')->field('id,goodsname,pic,oldprice,price')->where(array('id' => I('post.id')))->find();
         if (isset($mid) && session('ybc_id') > 0) {

             $data['addtime'] = time();
             $data['gid'] = $gid;
             $data['mid'] = $mid;
             $res = $model->getcartgoods($gid, $mid);
             if ($res) {//判断购物车中是否有该商品
                 $data['buynum'] = array('exp', $res['buynum'] + 1);
                 $id = M('cart')->save($data);
             } else {
                 $data['buynum'] = 1;
                 $id = M('cart')->add($data);
             }
             if ($id) {
                 $this->success('加入成功');
             } else {
                 $this->error('加入失败');
             }
         } else {
             //未登录添加到session
             if (isset($_SESSION['mycart'][$gid])) {//seession存在增加数量
                 if ($_SESSION['mycart'][$gid]['buynum'] += 1) {
                     $this->success('加入成功');
                 } else {
                     $this->error('加入失败');
                 }
             } else {
                 $data['gid'] = $gid;
                 $data['buynum'] = 1;
                 if ($_SESSION['mycart'][$gid] = $data) {//seession不存在写入到seession
                     $this->success('加入成功');
                 } else {
                     $this->error('加入失败');
                 }
             }
         }


     }

     public function addcollect()
     {
         $mid = session('ybc_id');
         $gid = I('post.id');
         if ($mid && $mid > 0) {
             $data['gid'] = $gid;
             $data['mid'] = $mid;
             $data['addtime'] = time();

             $id = M('goods_collect')->add($data);
             if ($id) {
                 $this->success('收藏成功');
             } else {
                 $this->error('收藏失败');
             }
         } else {

             $this->error('请先登录');


         }


     }

     public function deletcollect()
     {
         $mid = session('ybc_id');
         $gid = I('post.id');
         $res=D('Goodslist')->deletcollect($gid,$mid);
         if ($res) {
             $this->success('取消收藏成功');
         } else {
             $this->error('取消收藏失败');
         }
     }
 }