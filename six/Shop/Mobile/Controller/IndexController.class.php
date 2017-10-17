<?php
namespace Mobile\Controller;
use Think\Controller;
use Mobile\Model\CartModel;
class IndexController extends Controller {
    public function index(){
    	$this->cate();
    	$this->banner();
      	$this->display();
    }
    public function banner(){
        $advertising=M('advertising')->query("select image,url,status from sk_advertising WHERE status='可用' order by sale desc limit 0,4");
        $this->assign('advertising',$advertising);
    }


   public function cate(){
    $a=D('Category');
    $cateList=$a->Cate();
    $this->assign("Cate",$cateList);
    $this->show();
    $this->hot();
    $this->showtwo($pid=0,$x=0,$y=2);

}

    public function show(){
        $s=M('Goods');
        $tj= $show=$s->query("select id,goodsname,image,saleprice from sk_goods where tj=1 order by createtime desc limit 0,10");
        $this->assign('Show',$show);
        $this->assign('tj',$tj);
    }

    public function hot(){
        $s=M('Goods');
        $show=$s->query("select id,goodsname,image,saleprice,markprice,saleprice from sk_goods where hot_sale=1 order by createtime desc limit 0,6");
        $this->assign('Show',$show);
    }


    public function showtwo($pid,$x,$y){
        $s=M('Goods');
        $m=M('Category');
        $B=M('Brands');
        $a=$m->query("select id,catename from sk_category where pid={$pid} limit {$x},{$y}");
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $goodsinfo = $s->field('id,goodsname,createtime,image,saleprice,bid')->order('createtime desc')->where('cid='.$v3['id'])->find();
                    if($goodsinfo){
                        $goods[$goodsinfo['createtime']]=$goodsinfo;
                        $logoid=$goods[$k3]['bid'];
                        if(isset($logoid)&&$logoid){
                            $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
//                            $logoinfo1=$B->field('id,logo')->where('id='.$logoid)->find();
//                            $logoinfo[$logoinfo1["id"]]=$logoinfo1;
                        }

                    }
                }

            }}
        krsort($goods);
        $this->assign('goods',$goods);
        $this->assign('logoinfo',$logoinfo);

        $this->showtwo2($pid=0,$x=2,$y=2);
//        $this->display('index');
    }
    public function showtwo2($pid,$x,$y){
        $s=M('Goods');
        $m=M('Category');
        $B=M('Brands');
        $a=$m->query("select id,catename from sk_category where pid={$pid} limit {$x},{$y}");
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $goodsinfo = $s->field('id,goodsname,image,saleprice,bid')->order('createtime desc')->where('cid='.$v3['id'])->find();
                    if($goodsinfo){
                        $goods[]=$goodsinfo;
                        $logoid=$goods[$k3]['bid'];
                        if(isset($logoid)&&$logoid){
                            $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
                        }
                    }
                }

            }}
        $this->assign('logoinfo2',$logoinfo);
        $this->assign('goods2',$goods);
        $this->showtwo3($pid=0,$x=4,$y=1);
//        $this->display('index');
    }
    public function showtwo3($pid,$x,$y){
        $s=M('Goods');
        $m=M('Category');
        $B=M('Brands');
        $a=$m->query("select id,catename from sk_category where pid={$pid} limit {$x},{$y}");
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $goodsinfo = $s->field('id,goodsname,image,saleprice,bid')->order('createtime desc')->where('cid='.$v3['id'])->find();
                    if($goodsinfo){
                        $goods[]=$goodsinfo;
                        $logoid=$goods[$k3]['bid'];

                        if(isset($logoid)&&$logoid){
                            $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
                        }
                    }
                }

            }}
        $this->assign('logoinfo3',$logoinfo);
        $this->assign('goods3',$goods);
        $this->showtwo4($pid=0,$x=5,$y=1);
//        print_r($logoinfo);
//        $this->display('index');
    }
    public function showtwo4($pid,$x,$y){
        $s=M('Goods');
        $m=M('Category');
        $B=M('Brands');
        $a=$m->query("select id,catename from sk_category where pid={$pid} limit {$x},{$y}");
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $goodsinfo = $s->field('id,goodsname,image,saleprice,bid')->order('createtime desc')->where('cid='.$v3['id'])->find();
                    if($goodsinfo){
                        $goods[]=$goodsinfo;
                        $logoid=$goods[$k3]['bid'];
                       if($logoid){
                            $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
                        }
                    }
                }

            }}
        $this->assign('logoinfo4',$logoinfo);
        $this->assign('goods4',$goods);
    }
}