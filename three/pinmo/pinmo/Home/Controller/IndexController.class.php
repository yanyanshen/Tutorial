<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController{
    public function index(){

        //广告图片 ;
        $ad=D('ad');
        $list1=$ad->where('state=1 AND position="r1"')->limit(1)->select();
        $list7=$ad->where('state=1 AND position="r2"')->limit(1)->select();
        $list8=$ad->where('state=1 AND position="r3"')->limit(1)->select();
        $list9=$ad->where('state=1 AND position="r4"')->limit(1)->select();
        $list2=$ad->where('state=1 AND position="l1"')->limit(1)->select();
        $list3=$ad->where('state=1 AND position="l2"')->limit(1)->select();
        $list4=$ad->where('state=1 AND position="l3"')->limit(1)->select();
        $list5=$ad->where("state=1 AND position='lunbo'")->limit(5)->select();
        $list6=$ad->where('state=1 AND position="logo"')->limit(1)->select();
        //dump($list5);
        foreach($list5 as $k=>$val){
            $list5[$k]['des']=htmlspecialchars_decode(html_entity_decode($val['des']));
        }
        $this->assign('list1',$list1);
        $this->assign('list2',$list2);
        $this->assign('list3',$list3);
        $this->assign('list4',$list4);
        $this->assign('list5',$list5);
        $this->assign('list6',$list6);
        $this->assign('list7',$list7);
        $this->assign('list8',$list8);
        $this->assign('list9',$list9);

//商品图片;
        $goods=D('goods');
        $glist1=$goods->where('issale=1 AND cid=20')->limit(6)->select();
        $glist2=$goods->where('issale=1 AND cid=17')->limit(6)->select();
        $glist3=$goods->where('issale=1 AND cid=19')->limit(6)->select();
//热卖、排行商品;
        $glist4=$goods->order('num desc')->where('issale=1')->limit(4)->select();
        $glist5=$goods->order('salenum desc')->where('issale=1')->limit(4)->select();
        $glist6=$goods->order('createtime')->where('issale=1')->limit(4)->select();
        $glist7=$goods->order('num desc')->where('issale=1')->limit(5,3)->select();
        $glist8=$goods->order('salenum desc')->where('issale=1')->limit(5,3)->select();
        $glist9=$goods->order('createtime desc')->where('issale=1')->limit(5,3)->select();



        $this->assign('glist1',$glist1);
        $this->assign('glist2',$glist2);
        $this->assign('glist3',$glist3);
        $this->assign('glist4',$glist4);
        $this->assign('glist5',$glist5);
        $this->assign('glist6',$glist6);
        $this->assign('glist7',$glist7);
        $this->assign('glist8',$glist8);
        $this->assign('glist9',$glist9);



           /* //遍历分类
            $category=M('Category');
            $catelist=$category->where("pid=0")->select();
            foreach($catelist as $k1=>$v1) {
                 $catelist[$k1]['second'] = $category->where(array('pid' => $v1['cid']))->select();
                foreach($catelist[$k1]['second'] as $k2=>$v2){
                   $catelist[$k1]['second'][$k2]['third']= $category->where(array('pid' => $v2['cid']))->select();
                }
            }



            $this->assign('catelist',$catelist);*/



        //商品数量

            $mid=session('mid');
            $b=count($_SESSION['m'.$mid]);
            $this->assign('num',$b);



        $this->display();

    }

   /* public function cate(){
        //遍历分类
        $category=M('Category');
        $catelist=$category->where("pid=0")->select();
        foreach($catelist as $k1=>$v1) {
            $catelist[$k1]['second'] = $category->where(array('pid' => $v1['cid']))->select();
            foreach($catelist[$k1]['second'] as $k2=>$v2){
                $catelist[$k1]['second'][$k2]['third']= $category->where(array('pid' => $v2['cid']))->select();
            }
        }



        $this->assign('catelist',$catelist);
        $this->display();
    }*/






    public function letter(){
                //文艺频道;
        $pid=I('get.cid');


        /* $cate=$category->where("pid='$pid'")->select();
 foreach($cate as $val){
     //$data['cid']=$val;
 $a=$val['cid'];
     $letlist[]=$goods->where("cid=$a")->select();
 }
         foreach($letlist as $val1){
            foreach($val1 as $val2){
                $list[]=$val2;
            }
         }*/

       $Model=new \Think\Model();
        $letlist=$Model->query("select * from __CATEGORY__ as a,__GOODS__ as g where a.cid=g.cid and a.pid='$pid'" );

 //dump(sizeof($letlist));
        $count=sizeof($letlist);
        $limitRows = 2; // 设置每页记录数
foreach($letlist as $k=>$val){
    $letlist[$k]['goodsname']=mb_substr($val['goodsname'],0,10,'utf-8');
}
        //var_dump($obj);

        /*$p = new \Org\Util\AjaxPage($count, $limitRows,"change"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
        $letlist=$letlist->limit($limit_value)->select();
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成*/


        $pd=I('get.catename');
        $this->assign('pd',$pd);
        $this->assign('cid',$pid);
        $this->assign('letlist',$letlist);
       // $this->assign("page",$page);
        // $this->assign("firstRow",$Page->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            //$this->assign('keywords',$content2);
            $this->display('letter');
        }
    }



}
