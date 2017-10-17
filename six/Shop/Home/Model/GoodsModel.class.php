<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{
    public function search($goodsdetail){
        $goods=M('goods');
        $brands=M('brands');
        $category=M('category');
        $where=array();
        $price=array();
        $bnam=array();

        //根据品牌
        $bname=I('get.bname');
        if($bname){
            $bnam['bname']=array('like','%$bname%');
        }
        // print_r($bname);
        // exit();
        //根据分类排序

        //根据一级分类
        $id1=I('get.id1');
        // echo $id1;
        if($id1){
            //面包屑路径
            $mb1=$category->getFieldByid($id1,'catename');
            $mb=array($mb1);


            $id1=$id1.',';
            $path1=array();
            $path1['path']=array('like',"$id1%");
            $inf=$category->where($path1)->select();
            $str='';
            foreach($inf as $k){
                $str.=$k["id"].',';
            }
            $str=substr($str,0,-1);
            $cid['cid']=array('in',$str);
            
            // echo $mb;
        }

        // 根据二级分类
        $id2=I('get.id2');
        if($id2){
            //面包屑路径
            $mb2=$category->getFieldByid($id2,'catename');
            $pid=$category->getFieldByid($id2,'pid');
            $mb1=$category->getFieldByid($pid,'catename');
            $mb=array($mb1,$mb2);




            $id2=','.$id2.',';
            // echo $id2;
            $path2=array();
            $path2['path']=array('like',"%$id2%");
            $inf=$category->where($path2)->select();
            // print_r($inf);
            $str='';
            foreach($inf as $k){
                $str.=$k["id"].',';
            }
            $str=substr($str,0,-1);
            // echo $str;
            $cid['cid']=array('in',$str);
            

        }
        

        // 根据三级分类
        $id3=I('get.id3');
        if($id3){
            //面包屑
            $mb3=$category->getFieldByid($id3,'catename');
            $pid=$category->getFieldByid($id3,'pid');
            $mb2=$category->getFieldByid($pid,'catename');
            $pid2=$category->getFieldByid($pid,'pid');
            $mb1=$category->getFieldByid($pid2,'catename');
            
            $mb=array($mb1,$mb2,$mb3);



            $id3=','.$id3;
            $path3=array();
            $path3['path']=array('like',"%$id3");
            $inf=$category->where($path3)->select();
            $str='';
            foreach($inf as $k){
                $str.=$k["id"].',';
            }
            $str=substr($str,0,-1);
            $cid['cid']=array('in',$str);
        }
       
        // print_r($path3);

        // $this->assign('info',$info);
        // $this->display('Goods/goodsList');



        //根据商品名搜索
        $goodsdetail=trim(I('get.goodsname'));
        session('goodsdetail',$goodsdetail);
        if($goodsdetail){
            $where['goodsname']=array('like',"%$goodsdetail%");
            session('where',$where);
        }
        //根据不同方式排序排序
        $orderby='sk_goods.id';
        $orderway='desc';
        $odby=I('get.odby');
        // print_r($odby);
        // echo count($cid);
        // exit;
        if($odby){
            //根据id排序
             if($odby=='id'){
                $orderby='sk_goods.id';
            }
            //根据销售数量排序
            if($odby=='num'){
                $orderby='salenum';
                // dump($orderby);

            }
            // 根据价格排序
            if($odby=='price'){
                $orderby='markprice';
            }
            //根据时间
            if($odby=='time'){
                $orderby='createtime';
            }
            // 根据价格区间
            if($odby=='price1'){
                $orderby='markprice';
                $price['markprice']=array('between',array(0,50));
            }
            if($odby=='price2'){
                $orderby='markprice';
                $price['markprice']=array('between',array(50,150));
            }
            if($odby=='price3'){
                $orderby='markprice';
                $price['markprice']=array('between',array(150,500));
            }
            if($odby=='price4'){
                $orderby='markprice';
                $price['markprice']=array('between',array(500,1000));
            }
            if($odby=='price5'){
                $orderby='markprice';
                $price['markprice']=array('egt',1000);
            }
            if($odby=='price6'){
                $orderby='markprice';
                $price['markprice']=array('egt',0);
            }
            //根据品牌
            // if($odby=='bname'){
            //     $orderby='bname';
            // }
        }

        $perPage=8;
        // 取出总的记录数
        // $count = $goods->where($_SESSION['where'])->where($price)->where($bnam)->count();
        if($str){
            $count=$brands->join('sk_goods on sk_brands.id=sk_goods.bid')->order("$orderby $orderway")->where($price)->where($bnam)->where($cid)->limit($pageObj->firstRow.','.$pageObj->listRows)->count();
        }else{
            $count=$brands->join('sk_goods on sk_brands.id=sk_goods.bid')->order("$orderby $orderway")->where($_SESSION['where'])->where($price)->where($bnam)->limit($pageObj->firstRow.','.$pageObj->listRows)->count();
        }
        // 生成翻页类的对象
        $pageObj = new \Think\Page($count, $perPage);
        // 设置样式
        $pageObj->setConfig('next', '下一页');
        $pageObj->setConfig('prev', '上一页');
        // 生成页面下面显示的上一页、下一页的字符串
        $pageString = $pageObj->show();
        if($str){
            $info=$brands->join('sk_goods on sk_brands.id=sk_goods.bid')->order("$orderby $orderway")->where($price)->where($bnam)->where($cid)->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
            session('goodsdetail',null);
        }else{
            $info=$brands->join('sk_goods on sk_brands.id=sk_goods.bid')->order("$orderby $orderway")->where($_SESSION['where'])->where($price)->where($bnam)->limit($pageObj->firstRow.','.$pageObj->listRows)->select();
        }

        // echo "<pre>";
        // dump($info);

        //返回数据
        return array(
            'info'=>$info,
            'page'=>$pageString,
            'mb'=>$mb,
            'odby'=>$odby,

        );
    }


     public function goodsDetail($id){
        $goodsInfo=M("goods")->find($id);

        //该商品信息
        $brand=M("brands")->find($goodsInfo["bid"]);
        $path=M("category")->field("path")->find($goodsInfo["cid"]);
        $cate=M("category")->field("id,catename")->where("id in ({$path['path']})")->order("id")->select();
        $pingjia=M("pingjia")->where("gid=".$id)->select();
        $goodsInfo["brand"]=$brand;
        $goodsInfo["cate"]=$cate;
        $goodsInfo["pingjia"]=$pingjia;

        //该顶级分类下所有商品
        $str="";
        foreach($cate as $k=>$v){
            $cate1=M("category")->field("id")->where("pid=".$v["id"])->select();
            if($cate1){
                foreach($cate1 as $k1=>$v1){
                    $str.=$v1["id"].",";

                }
            }

        }
        $str=substr($str,0,-1);
        $like=M("goods")->field("id,goodsname,saleprice,image")->where("cid in ($str) and id!=$id")->limit("0,4")->select();
        $goodsInfo["like"]=$like;
        return $goodsInfo;

    }

    public function hotsale($starttimestr,$endtimestr){
        $active=M('active');
        $hotsale=$active->alias('a')
            ->join('sk_goods g on a.gid=g.id')
            ->order('jointime desc')
            ->where(array('startime'=>substr($starttimestr,0,-3)))
            ->limit('0,10')
            ->field('goodsname,image,g.id,goodsintro,activeprice,a.saleprice,activenum,goodsnum')
            ->select();
        return $hotsale;
    }
    //降价
    public function starprice($time){
        $active=M('active')->where(array('startime'=>substr($time,0,5)))->select();
        foreach($active as $k=>$val){
            $price['saleprice']=$val['activeprice'];
            M('goods')->where(array("id"=>$val['gid']))->save($price);
        }
    }
    //活动结束价格恢复
    public function endprice($time){
        $active=M('active')->where(array('startime'=>substr($time,0,5)))->select();
        foreach($active as $k=>$val){
            $date['saleprice']=$val['saleprice'];
            $date['is_active']=0;
            M('goods')->where(array("id"=>$val['gid']))->save($date);
        }
    }
    //刷新页面初始化价格
    public function setprice(){
        $active=M('active')->select();
        foreach($active as $k=>$val){
            $date['saleprice']=$val['saleprice'];
            M('goods')->where(array("id"=>$val['gid']))->save($date);
        }
    }


    public function getcid($id)
    {
        $str = $id;
        $second = $this->query("select id,catename from sk_category where pid=$id");
        if($second){
            foreach ($second as $k1 => $v1) {
                $str.=",".$v1["id"];
                $third = $this->query("select id,catename from sk_category where pid={$v1['id']}");
                if($third){
                    foreach ($third as $k2 => $v2) {
                        $str .= ",".$v2["id"];
                    }
                }
            }
        }
        return $str;

    }

    public function history(){
        $goods=M('goods');
        $history=M('history');
        $goods_id=I('id');


        $hist=array();
        $hist['uid']=$_SESSION["uid"];
        $hist['addtime']=time();
        $hist['gid']=$goods_id;

        $info=$history->where("uid=".$hist["uid"]." and gid=".$hist["gid"])->find();

        if(isset($hist['uid'])&&$hist['uid']>0){
            if($info){
                $history->create();
                $hist['addtime']=time();
                $id=$history->where("uid=".$hist["uid"]." and gid=".$hist["gid"])->setField("addtime",$hist['addtime']);
            }else{
                $history->create();
                $id=$history->add($hist); 
            }
           
        }
           
        
        if($id){
            return true;
        }else{
            return false;
        }
       
    }

    public function ssearch(){
        //根据不同方式排序排序
        $orderby='sk_goods.id';
        $orderway='desc';
        $odby=I('get.odby');
        if($odby){
            //根据id排序
             if($odby=='id'){
                $orderby='sk_goods.id';
            }
            //根据销售数量排序
            if($odby=='num'){
                $orderby='salenum';
                // dump($orderby);

            }
            // 根据价格排序
            if($odby=='price'){
                $orderby='markprice';
            }
            //根据时间
            if($odby=='time'){
                $orderby='createtime';
            }
           
        }
        return array(
                'orderby'=>$orderby,
                'orderway'=>$orderway

            );
    }

}