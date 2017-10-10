<?php
namespace Mobile\Controller;
   use Think\Controller;
   class CategoryController extends Controller{
       public function index(){



           $model=D('Category');
           $cateinfo=$model->cateinfo();//左侧分类
           $arr=$model->hotcate();//热销分类
            $hotcate=$arr['hotcate'];
             $goodsinfo=$arr['goodsinfo'];

              //新品上架
             $arr1=$model->newcate();
             $newcate=$arr1['newcate'];
             $newgoods=$arr1['newgoods'];


           $this->assign('newcate',$newcate);
           $this->assign('newgoods',$newgoods);

           $arr2=$model->twocate(27);
           $greentea=$arr2['twocate'];
           $goods=$arr2['goods'];
           $this->assign('goods',$goods);
           $this->assign('greentea',$greentea);//绿茶的二级分类

           $arr4=$model->twocate(26);//乌龙茶下面的二级分类
            $wulongcate=$arr4['twocate'];
            $wulongtea=$arr4['goods'];
           $this->assign('wulongtea',$wulongtea);
           $this->assign('wulongcate',$wulongcate);

           $arr5=$model->twocate(28);//红茶下面的二级分类
           $redcate=$arr5['twocate'];
           $redtea=$arr5['goods'];
           $this->assign('redtea',$redtea);
           $this->assign('redcate',$redcate);

           $arr6=$model->twocate(29);//黑茶下面的二级分类
           $blackcate=$arr6['twocate'];
           $blacktea=$arr6['goods'];
           $this->assign('blacktea',$blacktea);
           $this->assign('blackcate',$blackcate);


           $arr7=$model->twocate(30);//黄茶下面的二级分类
           $yellowcate=$arr7['twocate'];
           $yellowtea=$arr7['goods'];
           $this->assign('yellowtea',$yellowtea);
           $this->assign('yellowcate',$yellowcate);


           $arr8=$model->twocate(44);//茶具下面的二级分类
           $teasetcate=$arr8['twocate'];
           $teaset=$arr8['goods'];
           $this->assign('teaset', $teaset);
           $this->assign('teasetcate',$teasetcate);

           //获取热销品牌
           $arr3=$model->hotbrand();
           $hotbrand=$arr3['hotbrand'];
           $hotgoods=$arr3['hotgoods'];
           $this->assign('hotbrand',$hotbrand);
           $this->assign('hotgoods',$hotgoods);

           $this->assign('cateinfo',$cateinfo);
           $this->assign('goodsinfo',$goodsinfo);

           $this->assign('hotcate',$hotcate);
           $this->display();
       }
}