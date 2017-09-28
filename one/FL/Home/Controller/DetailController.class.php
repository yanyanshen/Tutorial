<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{
    //    购物车添加
    public $prodNum;
    public function cart($e){
        $c=$_SESSION['fl_home']['mid'];
        $pid=$e["id"];
        $num=$e['num'];
        $cu=D("prod");

        if($c){
            if($_SESSION["cart_$c"]["$pid"]){

                if($_SESSION["cart_$c"]["$pid"][0]["num"]<200){
                    $_SESSION["cart_$c"]["$pid"][0]["num"]=$_SESSION["cart_$c"]["$pid"][0]["num"]+$num;
                    return "添加成功";
                }else{
                    return "添加失败";
                }

            }else{
                $pa=$cu->where("prod_id=$pid")->select();
                $pa[0]['num']=$num;
                $_SESSION["cart_$c"]["$pid"]=$pa;
                return "添加成功";
            }
        }else{
            if($_SESSION["cart"]["$pid"]){
                if($_SESSION["cart"]["$pid"][0]["num"]<200){
                    $_SESSION["cart"]["$pid"][0]["num"]=$_SESSION["cart"]["$pid"][0]["num"]+$num;
                    return "添加成功";
                }else{
                    return "添加失败";
                }

            }else{
                $pa=$cu->where("prod_id=$pid")->select();
                $pa[0]['num']=$num;
                $_SESSION["cart"]["$pid"]=$pa;
                return "添加成功";
            }
            return"添加成功";
        }


    }

    public function index(){
        if(IS_AJAX) {  
            //评论异步分页
            $pn=I('get.p');
            if($pn){
                $prod_id=I('get.pid');
                $cdn=I("get.cid");
                $commentList=self::getCommentList($prod_id,$cdn);
                $this->assign("commentList",$commentList[0]);   //评论
                $this->assign("appendList",$commentList[1]);    //追加评论
                $this->assign("page",$commentList[2]);          //分页
                $this->assign("total",$commentList[3]);         //评论总条数
                $this->assign("good",$commentList[4]);          //好评条数
                $this->assign("notbad",$commentList[5]);        // 中评条数
                $this->assign("bad",$commentList[6]);           //差评条数
                $this->assign("cid",$cdn);

                $goodRate=$commentList[4]*100/$commentList[3];//好评率
                $goodRate=sprintf("%.1f",substr(sprintf("%.2f", $goodRate), 0, -1));
                $this->assign("goodRate",$goodRate);

                $this->assign("cusCount",$commentList[7]);//评论总人数

                $this->display('page');
            }else{
                //购物车
                if(!$_POST['item']){
                    $data = $this->cart($_POST);
                }
                $cid=$_SESSION["fl_home"]['mid'];
                if($cid){
                    $z=array_reverse($_SESSION["cart_$cid"]);
                    $this->assign('cart',$z);
                    $this->assign('count',count($_SESSION["cart_$cid"]));
                    $count=count($_SESSION["cart_$cid"]);
                }else{
                    $z=array_reverse($_SESSION["cart"]);
                    $this->assign('cart',$z);
                    $this->assign('count',count($_SESSION["cart"]));
                    $count=count($_SESSION["cart"]);
                }

                foreach($z as $key=>$val){
                    $totalPrice+=$val[0]['prod_price']*$val[0]['num'];
                }

                if($_POST['item']){
                    $this->assign("url",$_SERVER[REQUEST_URI]);
                    $this->assign("totalPrice",$totalPrice);
                    $this->display('cartPage');
                }else{
                    $this->ajaxReturn(array("status"=>"$data","count"=>$count));
                }
            }  
        }else{
        $prod_id=I('get.prod_id');
            if($prod_id){
                $leisiprod1=self::leisi($prod_id);
                $bigPic=M("Pic");
                $count=$bigPic->where(array('pic_prod_id'=>$prod_id,'pic_size'=>'350*350'))->count();
                $prodBigPic=$bigPic->where(array('pic_prod_id'=>$prod_id,'pic_size'=>'350*350'))->getField("pic_name",$count);
                $prod=M('Prod');
                $prods=$prod->where(array('prod_id'=>$prod_id))->select();
                $firstBigPic=$prod->where(array('prod_id'=>$prod_id))->getField("prod_pic");
                $littlePic=M("Pic");
                $prodLittlePics=$littlePic->where(array('pic_prod_id'=>$prod_id,'pic_size'=>'140*140'))->select();
                $this->assign('prodsdata',$prods);
                $this->assign("prodBigPic",$prodBigPic);
                $this->assign("prodLittlePic",$prodLittlePics);
                $this->assign('leisiprod',$leisiprod1);
                $this->assign("firstBigPic",$firstBigPic);
                $this->assign("pid",$prod_id);
                $this->assign("prod_number",$prods[0]['prod_number']);

    // 足迹
                cookie("[$prod_id]", $prod_id);
                $s='';
                foreach($_COOKIE["fl_home"] as $v){
                    $s=$s.$v.',';
                }
                $wh['prod_id']=array("in","$s");
               $d= $prod->where($wh)->select();
                $d=array_reverse($d);
                $ss=count($d);
               $this->assign('zj',$d);
               $this->assign('zjss',$ss);
    // 足迹结束
    //购物车
                $cid=$_SESSION["fl_home"]['mid'];
                if($cid){
                    $z=array_reverse($_SESSION["cart_$cid"]);
                    $this->assign('cart',$z);
                    $this->assign('count',count($_SESSION["cart_$cid"]));
                }else{
                    $z=array_reverse($_SESSION["cart"]);
                    $this->assign('cart',$z);
                    $this->assign('count',count($_SESSION["cart"]));
                }


    //购物车数据结束

            //达人选购
                $popularList=self::popularProd($prod_id);
                $this->assign("popularProds",$popularList);

                //看了又看
                $sessProd=session("prod");
                unset($sessProd[$prod_id]);
                $lookedProd=self::lookedProd($sessProd,$prod_id);
                $this->assign("lookedProds",$lookedProd);
                session("prod.$prod_id",$prod_id);

                //产品信息
                $prodinfo=self::getProdInfo($prod_id);
                $this->assign("prodinfo",$prodinfo);

                //顶级分类列表
                $class=new \Home\Controller\IndexController();
                $classList=$class->getClassList();
                $this->assign("firstClassList",$classList[0]);

                $this->display();
            }else{
                $this->redirect("Home/Index/index");
            }
        }
    }

	protected function leisi($id){
        $prod=M('Prod');
        $prodcid1=$prod->where(array('prod_id'=>$id))-> getField("prod_cid");
        $class=M("Class");
        $pid=$class->where(array("class_cid"=>$prodcid1))->getField("class_pid");
        $cids=$class->where(array("class_pid"=>$pid))->field("class_cid")->select();
        foreach($cids as $val){
            $cidArr[]=$val['class_cid'];
        }
        $where['prod_cid']=array('in',$cidArr);
        $prodList=$prod->where($where)->select();
        return $prodList ;
    }

    protected function popularProd($id){
        $prod=M("Prod");
        $prodcid=$prod->where(array('prod_id'=>$id))-> getField("prod_cid");
        $class=M("Class");
       $path=$class->where(array("class_cid"=>$prodcid))->getField("class_path");
        $firstPid=substr($path,0,1);
        $where['class_path']=array('like',"$firstPid,%,%");
        $cids=$class->where($where)->field("class_cid")->select();
        foreach($cids as $val){
            $cidArr[]=$val['class_cid'];
        }
        $where1['prod_cid']=array('in',$cidArr);
        $prodList=$prod->where($where1)->limit(5)->select();
        return $prodList;
    }

    protected function lookedProd($idArr){
        $prod=M("Prod");

        if($idArr){
            shuffle($idArr);
            $where['prod_id']=array('in',$idArr);
            $prodList=$prod->where($where)->limit(3)->select();

        }else{
            $where['prod_id']=array('between',"20,30");
            $prodList=$prod->where($where)->limit(3)->select();
        }
        return $prodList;
    }

    protected function getProdInfo($prodId){
        $prod=M("Prod");
        $prodinfo=$prod->where(array("prod_id"=>$prodId))->select();
        $comment=M("Comment");
        $prodinfo[0]['prod_comment_num']=$comment->where(array("comment_prod_id"=>$prodId))->count();
        $brand=M("Brand");
        $brandname=$brand->where(array("brand_bid"=>$prodinfo[0]['prod_bid']))->getField("brand_name");
        $prodinfo[0]['prod_bid']=$brandname;
        $class=M("Class");
        $classPid=$class->where(array("class_cid"=>$prodinfo[0]['prod_cid']))->getField("class_pid");
        $classname=$class->where(array("class_pid"=>$classPid))->getField("class_name");
        $prodinfo[0]["prod_cid"]=$classname;
        return $prodinfo;
    }
    
    protected function getCommentList($prodId,$cdn){

        //获取评论
        $comment=M("Comment");
        $where['comment_prod_id']=$prodId;
        switch($cdn){
            case 1:$where['comment_star']=array('gt',3);            //好评条件
                break;
            case 2:$where['comment_star']=array('between','2,3');   //中评条件
                break;
            case 3:$where['comment_star']=array('between','0,1');   //差评条件
                break;
        }

        $allCount=$comment->where(array("comment_prod_id"=>$prodId))->count();//所有评论
        $goodCount=$comment->where(array("comment_prod_id"=>$prodId,"comment_star"=>array('gt',3)))->count();           //好评
        $notbadCount=$comment->where(array("comment_prod_id"=>$prodId,"comment_star"=>array('between','2,3')))->count();//中评
        $badCount=$comment->where(array("comment_prod_id"=>$prodId,"comment_star"=>array('between','0,1')))->count();   //差评
        $customCount=count($comment->where(array("comment_prod_id"=>$prodId))->group("comment_custom_id")->select());   //评论人数

        $count=$comment->where($where)->count();
        $limitRows=2;
        $ajaxpage=new \Org\Util\AjaxPage($count,$limitRows,'index');    //实例化ajax分页类
        $commentList=$comment->where($where)->order("comment_custom_id")->limit($ajaxpage->firstRow.','.$ajaxpage->listRows)->select(); //获取该页评论
        $page=$ajaxpage->show();    //获取分页
        if($commentList){
            foreach($commentList as $val){
                $customIds[]=$val['comment_custom_id'];     //获取当前页用户id
            }
            $custom=M("Custom");
            $where1["custom_id"]=array('in',$customIds);
            $customName=$custom->where($where1)->select();      //获取当前页用户名
            foreach($customName as $k1=>$v1){
                //用户名保密处理
                $customName[$k1]['custom_username']=str_replace(substr($customName[$k1]['custom_username'],1,-1),'***',$customName[$k1]['custom_username']);
            }
            $customLen=count($customName);      //获取当前页评论用户个数
            foreach($commentList as $k2=>$v2){
                foreach($customName as $k3=>$v3){
                        if($v3['custom_id']==$v2['comment_custom_id']){
                            $commentList[$k2]['comment_custom_id']=$customName[$k2]['custom_username'];     //将用户id替换为用户名
                        }
                    if($k2>$customLen-1){
                        //追加评论处理
                        if($v3['custom_id']==$v2['comment_custom_id']){
                            $append=$commentList[$k2];
                            unset($commentList[$k2]);
                            $append['comment_custom_id']=$v3['custom_username'];
                            $appendList[]=$append;
                         }
                    }
                }
            }
        }
        $list[0]=$commentList;
        $list[1]=$appendList;
        $list[2]=$page;
        $list[3]=$allCount;
        $list[4]=$goodCount;
        $list[5]=$notbadCount;
        $list[6]=$badCount;
        $list[7]=$customCount;
        return $list;
    }
}