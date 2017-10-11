<?php
namespace Home\Controller;
use \Think\Controller;
class CommonController extends Controller{
    function _initialize(){
        //logo
        if(!$list6=S('list6')){
            $ad=D('ad');
            $list6=$ad->where('state=1 AND position="logo"')->limit(1)->select();
            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S('list6',$list6);
        }

        $this->assign('list6',$list6);

        //遍历分类
        if(!$catelist=S('catelist')){
            $category=M('Category');
            $catelist=$category->where("pid=0")->select();
            foreach($catelist as $k1=>$v1) {
                $catelist[$k1]['second'] = $category->where(array('pid' => $v1['cid']))->select();
                foreach($catelist[$k1]['second'] as $k2=>$v2){
                    $catelist[$k1]['second'][$k2]['third']= $category->where(array('pid' => $v2['cid']))->select();
                }
            }

            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S('catelist',$catelist);
        }

        $this->assign('catelist',$catelist);

        //商品推荐
        if(!$tglist=S('tglist')){
            $goods=M('goods');
            $tglist=$goods->order("salenum desc")->where("issale=1")->limit(3)->select();
            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S('tglist',$tglist);
        }

        $this->assign('tglist',$tglist);
//个人头像;
        if(!$uphoto=S('uphoto')){
            $username=session('mname');
            $user=M('user');
            $uphoto=$user->where("username='$username'")->getField('photo');
            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S('uphoto',$uphoto);
        }

        $this->assign('photo',$uphoto);

//按品牌
       // S('blist',null);
        if(!$blist=S('blist')){
            $brand=M('brand');
            $blist=$brand->limit(4)->select();
            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>10
            ));
            S('blist',$blist);
        }
        $this->assign('blist',$blist);

//按分类
        if(!$clist=S('clist')){
            $cate=M('category');
            $clist=$cate->where("pid=0")->select();
            S(array(
                'type'=>'memcache',
                'host'=>'127.0.0.1',
                'port'=>'11211',
                'expire'=>86400
            ));
            S('clist',$clist);
        }
        $this->assign('clist',$clist);

//购物车数量
        $mid=session('mid');
        $b=count($_SESSION['m'.$mid]);
        $this->assign('num',$b);
//浏览记录;
        $goods=M('goods');
       foreach($_SESSION['u'.$mid] as $val){

            $look[]=$goods->where("id='$val'")->select();
        }

        foreach($look as $val2=>$llist){
            $look1[$val2]=$llist[0];
        }
        //dump($look1);
        $look1=array_reverse($look1);
        array_splice($look1,3);
        $this->assign('look1',$look1);









}}