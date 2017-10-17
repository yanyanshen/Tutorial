<?php
namespace Home\Controller;
use Home\Model\GoodsModel;
use Home\Model\CategoryModel;
use Home\Model\CartModel;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->banner();
        $this->advertising();
     $this->cate();
        $man=$this->brands($type=1);
        $female=$this->brands($type=2);
        $home=$this->brands($type=3);
        $external=$this->brands($type=4);
        $this->assign('female',$female);
        $this->assign('man',$man);
        $this->assign('home',$home);
        $this->assign('external',$external);
       $this->display();
    }

    public function banner(){
        $banner=M('advertising')->query("select image,url,status,place from sk_advertising WHERE status='可用' and place='首页' order by sale desc limit 0,4");
        $this->assign('banner',$banner);
    }
    public  function advertising(){
        $first=M('advertising')->query("select image,url,status,place from sk_advertising WHERE status='可用' and place='1F' order by sale desc limit 0,2");
        $secend=M('advertising')->query("select image,url,status,place from sk_advertising WHERE status='可用' and place='2F' order by sale desc limit 0,2");
        $three=M('advertising')->query("select image,url,status,place from sk_advertising WHERE status='可用' and place='3F' order by sale desc limit 0,2");
        $four=M('advertising')->query("select image,url,status,place from sk_advertising WHERE status='可用' and place='4F' order by sale desc limit 0,2");

        $this->assign('first',$first);
        $this->assign('secend',$secend);
        $this->assign('three',$three);
        $this->assign('four',$four);
    }
    public function login(){
        $this->display();
    }
    public function helper(){
        $this->display();
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
        $str='';
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $str.=$v3['id'].',';
                }

            }}
        $str=mb_substr($str,0,-1);
        $goods = $s->field('id,goodsname,image,saleprice,bid,createtime')->order('createtime desc')->where("cid in ({$str})")->select();
        foreach($goods as $k6=>$v6){
            $logoid=$v6['bid'];
            if(isset($logoid)&&$logoid){
                $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
            }
        }
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
        $str='';
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $str.=$v3['id'].',';
                }

            }}
        $str=mb_substr($str,0,-1);
        $goods = $s->field('id,goodsname,image,saleprice,bid,createtime')->order('createtime desc')->where("cid in ({$str})")->select();
        foreach($goods as $k6=>$v6){
            $logoid=$v6['bid'];
            if(isset($logoid)&&$logoid){
                $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
            }
        }
//        print_r(mb_substr($str,0,-1));
//        print_r($g);
//        print_r($goods);
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
        $str='';
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {

                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $str.=$v3['id'].',';
                }

            }}
        $str=mb_substr($str,0,-1);
        $goods = $s->field('id,goodsname,image,saleprice,bid,createtime')->order('createtime desc')->where("cid in ({$str})")->select();
        foreach($goods as $k6=>$v6){
            $logoid=$v6['bid'];
            if(isset($logoid)&&$logoid){
                $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
            }
        }
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
        $str='';
        foreach($a as $k=>$v1){
            $b[$k]=$m->query("select id,catename from sk_category where pid={$v1['id']}");
            foreach($b[$k] as $k2=>$v2) {
                $c[$k][$k2] = $m->query("select id,catename from sk_category where pid={$v2['id']}");
                foreach ($c[$k][$k2] as $k3 => $v3){
                    $str.=$v3['id'].',';
//                    $goodsinfo = $s->field('id,goodsname,image,saleprice,bid')->order('createtime desc')->where('cid='.$v3['id'])->find();
//                    if($goodsinfo){
//                        $goods[]=$goodsinfo;
//                        $logoid=$goods[$k3]['bid'];
//                       if($logoid){
//                            $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
//                        }
//                    }
                }

            }}
        $str=mb_substr($str,0,-1);
        $goods = $s->field('id,goodsname,image,saleprice,bid,createtime')->order('createtime desc')->where("cid in ({$str})")->select();
        foreach($goods as $k6=>$v6){
            $logoid=$v6['bid'];
            if(isset($logoid)&&$logoid){
                $logoinfo[]=$B->field('id,logo')->where('id='.$logoid)->find();
            }
        }
        $this->assign('logoinfo4',$logoinfo);
        $this->assign('goods4',$goods);
    }

    //购物车
    public function smallcar(){
         $cart = D("cart");
        $good=M("goods");
        $cargoods="";
        if (isset($_SESSION["uid"]) && $_SESSION["uid"] > 0) {
            $cargoods=$cart->getgoods($_SESSION["uid"]);
        }else{
            foreach($_SESSION["cart"] as $k=>$v){
                $cargoods[$k]=$good->field("image,goodsname,markprice,saleprice,goodsnum")->find($k);
                $cargoods[$k]["gid"]=$v["gid"];
                $cargoods[$k]["buynum"]=$v["buynum"];

            }

        }
        foreach($cargoods as $k1=>$v1){
            $cargoods[$k1]["image"]=reset(explode(",",$v1["image"]));
        }
        //$this->ajaxReturn($cargoods);
        $cargoods=array_reverse($cargoods);
        if($cargoods){
            echo json_encode($cargoods);
        }else{
            echo "";
        }
        // return $cargoods;
        // print_r($cargoods);
        // $this->assign('cargoods',$cargoods);
        // $this->display('index');
    }


    public function brands($type)
    {
        $brand = M('Brands');
        $logo = $brand->order('addtime')->field('logo,id')->where('type=' . $type)->select();
//       print_r($logo);
        return $logo;
    }



    //顶级分类获取子分类字符串数组
    public function allcate(){
        $str="";
        $arr=array();
        $cate=M("category");

        $fcate=$cate->field("id,catename")->where("pid=0")->limit(0,6)->select();
        foreach($fcate as $k1=>$v1){
            $str.=$v1["id"].",";
            $scate=$cate->field("id")->where("pid=".$v1['id'])->select();
            foreach($scate as $k2=>$v2){
                $str.=$v2["id"].",";
                $tcate=$cate->field("id")->where("pid=".$v2['id'])->select();
                foreach($tcate as $k3=>$v3) {
                    $str.=$v3["id"].",";
                }
            }
            $str=substr($str,0,-1);
            $arr[$v1['id']]=$str;
            $str="";
        }
        return $arr;
    }

    //第一次异步
    public function fcate(){
        $arr=$this->allcate();
        $cate=M("category");
        $good=M("goods");
        $goods=$cate->field("id,catename")->where("pid=0")->limit(0,6)->select();
        foreach($goods as $k=>$v){
//            $info=$good->field("id,goodsname,cid")->where("cid in (".$arr[$v['id']].")")->order('createtime desc')->limit("0,3")->select();
//            $goods[$k]["child"]=$info;
            $info=$cate->field("id,catename")->where("pid=".$v['id'])->select();
            $goods[$k]["child"]=$info;
            foreach($goods[$k]["child"] as $k1=>$val){
                $info=$cate->field("id,catename")->where("pid=".$val['id'])->select();
                $goods[$k]["child"][$k1]['c']=$info;

            }



        }
        //$this->ajaxReturn($goods,true);
        echo json_encode($goods);



    }
    //第二次异步
    public function scate(){
        $id=isset($_GET["id"])?I("get.id"):1;
        $arr=$this->allcate();
        $cate=M("category");
        $good=M("goods");
        $second=$cate->field("id,catename")->where("id in (".$arr[$id].") and pid=".$id)->select();
        foreach($second as $k=>$v){
            $third=$cate->field("id,catename")->where("id in (".$arr[$id].") and pid=".$v['id'])->select();
            $second[$k]["child"]=$third;

        }
        $goods[0]=$second;
        $info=$good->field("id,image")->where("cid in (".$arr[$id].")")->order('createtime desc')->limit("0,5")->select();
        foreach($info as $k1=>$v1){
            $info[$k1]["image"]=reset(explode(",",$v1['image']));
        }
        $goods["image"]=$info;


        //$this->ajaxReturn($goods,true);
echo json_encode($goods);


    }



}