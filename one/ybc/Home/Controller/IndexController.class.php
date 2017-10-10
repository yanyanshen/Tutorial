<?php

namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {
    public function index(){

       //显示主页推荐广告
        $leftRecom=D('adgood')->leftRecommed();
        foreach($leftRecom as $k=>$v){
            $id=$v['gid'];
            $leftRecom[$k]['goodsname']=M('goods')->where(array('id'=>$id))->getField('goodsname');
        }
        $this->assign('leftRecom',$leftRecom);


        //-------展示茶叶百科内容--------
        $article=M('Article');
        $ArticleInfo=$article->order('dateline desc')->limit('0,8')->select();
        $this->assign('ArticleInfo',$ArticleInfo);

        //---------修改过后的乌龙茶广告展示

        $wuLong=D('Adgood')->wuLongCha();
        $this->assign('wuLong',$wuLong);

        //--------修改过后的绿茶广告展示
        $lvCha=D('Adgood')->lvCha();
        $this->assign('lvCha',$lvCha);

        //---------修改过后的茶具广告展示
        $str11=D('Adcategory')->getTeaSet();
        //print_r($str11);
        $teaSetInfo=D('Adgood')->teaSet($str11);
        $this->assign('teaSetInfo',$teaSetInfo);

        //---------修改过后的导航广告
        $str12=D('Adcategory')->navi();
        $naviInfo=D('Adgood')->naviga($str12);
        $this->assign('naviInfo',$naviInfo);


        //---------修改过后的网站推荐
        $str13=D('Adcategory')->recommed();
        $recommedInfo=D('Adgood')->recommed($str13);
        foreach($recommedInfo as $k=>$v){
            $gid=$v['gid'];
            $recommedInfo[$k]['goodsname']=M('Goods')->where(array('id'=>$gid))->getField('goodsname');
        }

        $this->assign('recommedInfo',$recommedInfo);

        //----------展示开场广告
        $openInfo=D('Adgood')->open();
        $this->assign('openInfo',$openInfo);



        //------获取茶叶品种-------

        $model=D('Index');
        $res=$model->cateinfo();
        array_pop($res);//删除茶具分类
        $this->assign('res',$res);
        //搜索框下面的分类名称
        $cateres=$model->cateinfo();
        $this->assign('cateres',$cateres);

        //获取品牌
        /* $brandlist=$model->brand();
         $this->assign('brandlist',$brandlist);*/


        //获取商品信息
        $goodsinfo1=$model->goodsinfo(26);//乌龙茶系列
        $this->assign('goodsinfo1',$goodsinfo1);

         $wulongtea=$model->twocate(26);
          $this->assign('wulongtea',$wulongtea);//乌龙茶的二级分类
                $this->assign('wulongteaone',26);//乌龙茶的一级分类

         $greentea=$model->twocate(27);
         $this->assign('greentea',$greentea);//绿茶的二级分类
         $this->assign('greenteaone',27);//绿茶的一级分类

        $goodsinfo2=$model->goodsinfo(27);//绿茶的系列
        $this->assign('goodsinfo2',$goodsinfo2);

        $goodsinfo3=$model->goodsinfo(44);//茶具系列
        $this->assign('goodsinfo3',$goodsinfo3);

        $teaju=$model->twocate(44);
        $this->assign('teaju',$teaju);//茶具的二级分类
        $this->assign('teajuone',44);//茶具的一级分类

       //获取新品系列
         $newgoods=$model->newgoods();
        $this->assign('newgoods',$newgoods);


        //获取热销产品
         $hotsalegoods=$model->hotsalegoods();
        $this->assign('hotsalegoods',$hotsalegoods);




      //获取限时促销结束时间
        $endtime=strtotime('2016-12-20 0:00:00');

        $this->assign('endtime',$endtime);
        $this->assign('nowtime',time());

       $this->display();
    }


    public function left(){
        $leftRecom=D('adgood')->leftRecommed();
        foreach($leftRecom as $k=>$v){
            $id=$v['gid'];
            $leftRecom[$k]['goodsname']=M('goods')->where(array('id'=>$id))->getField('goodsname');
        }
        if($leftRecom){
            $this->success($leftRecom);
        }
    }

}