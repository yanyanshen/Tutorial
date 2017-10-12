<?php
namespace Home\Controller;
use Home\Model\CategoryModel;
use Home\Model\GoodsModel;
use Think\Controller;
class IndexController extends Controller {
    //通过id拿所有子分类
    public function getAllChildCateByCid($id){
        $cidarr=M()->query("select id from mr_category where path like '{$id},%' ");
        $str='';
        foreach($cidarr as $v){
            $str.=$v['id'].',';
        }
        return substr($str,0,-1);
    }
    //得到商品分类
    public function getGoodslist($id=0,$num=0){
        if($id>0){
            $cidList=$this->getAllChildCateByCid($id);
            $where="where cid in ($cidList) and state=1";
        }else{
            $where="where state=1";
        }
        $limit=$num>0?"limit $num":'';
        $goodslist=M()->query("select id,name,price,pic from mr_goods $where $limit ");
        return  $goodslist;
    }


    public function index(){

        $goods=new GoodsModel();


        //首页购物车展示
        $mrid=$_SESSION['Mr_home']['mrid'][0]['id'];
        $info=M()->query("select * from mr_cart as c , mr_goods as g where c.pid=g.id and c.uid='{$mrid}'");
        $this->assign('array1',$info);

        //购物车内商品数量
        $num=count($info);
        $this->assign('num',$num);


        //广告区轮播图
        $arrAd=$goods->showAd();
        $this->assign('array',$arrAd);

        //商品分类展示
        //拿到一级分类
        $res=new CategoryModel();
        $firstArr=$res->firstCate();
        foreach($firstArr as $k3=>$v3){
            $this->assign('firstCateId',$v3['id']);
            //拿到二级分类
            $secondArr=$res->secondCate($v3['id']);
            $cateArr[$v3['catename']]=$secondArr;
        }
        $this->assign('cateArr',$cateArr);


        //左侧收藏栏
        $id=$_SESSION['Mr_home']['mrid'][0]['id'];
        $oldArr=$goods->showOld($id);
        foreach($oldArr as $oldK=>$oldV) {
            $oldGoodArr = $goods->detail($oldV['pid']);
            foreach ($oldGoodArr as $oldK1 => $oldV1) {
                $oldGoods[]=$oldV1;
            }

        }
        $this->assign('oldArr',$oldGoods);




        //所有商品分类
        $cate=new CategoryModel();
        $cateList=$cate->firstCate();
        foreach($cateList as $k=>$v){
            $cateList[$k]['secondCate']=$cate->secondCate($v['id']);
            foreach($cateList[$k]['secondCate'] as $key=>$val){
                $cateList[$k]['secondCate'][$key]['thirdCate']=$cate->secondCate($val['id']);
            }
        }

        //一层
        $goodslist1=$this->getGoodslist(1,4);      //第一个参数为商品大类，第二个参数为读取条数
        //二层
        $goodslist2=$this->getGoodslist(2,3);
        //三层
        $goodslist3=$this->getGoodslist(3,4);
        //四层
        $goodslist4=$this->getGoodslist(18,4);
        //五层
        $goodslist5=$this->getGoodslist(16,4);
        //六层22
        $goodslist6=$this->getGoodslist(25,4);
        $this->assign('cateList',$cateList);
        $this->assign('goodslist1',$goodslist1);
        $this->assign('goodslist2',$goodslist2);
        $this->assign('goodslist3',$goodslist3);
        $this->assign('goodslist4',$goodslist4);
        $this->assign('goodslist5',$goodslist5);
        $this->assign('goodslist6',$goodslist6);


        //登录后用户名写入session
        $this->mrid=$_SESSION['Mr_home']['mrid'];
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);



        $this->display();
    }

}