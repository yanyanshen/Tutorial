<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\GoodsModel;
use Home\Model\GoodsDetail;
use Home\Model\History;
class GoodsController extends Controller{
    public function shop_cart(){
        $this->display();
    }
 public function goodsList(){
        $goods=D('goods');
        $goodsdetail=I('get.goodsdetail');
         $history=D('history');
        $info3=$history->getHistory();
        // $info=$model->search();
        $obj=new GoodsModel();
        $info=$obj->search();
        $arr=A("Cart")->status();

        foreach($info["info"] as $k1=>$v1){
            if(in_array($v1["id"],$arr)){
                $info["info"][$k1]["status"]=1;
            }else{
                $info["info"][$k1]["status"]=0;
            }

        }



        foreach(session("goods_id") as $k){
                $g['id']=$k;
                $info1[]=$goods->where($g)->find();

        }
        $info1=array_reverse($info1);
        $this->assign('info1',$info1);
        $this->assign($info);

        $this->assign('empty','<span class="empty">对不起，没有当前条件下的商品！</span>');
        $this->assign('empty1','<span class="empty1">赶紧选购吧!</span>');
        $this->assign('goodsdetail',$goodsdetail);
        $this->assign('id2',I('get.id2'));
        $this->assign('id3',I('get.id3'));
        $this->assign('id1',I('get.id1'));
        // $this->assign('odby',$odby);
        $this->assign('bname1',I('get.bname'));
        $this->assign('info3',$info3);
        $this->display();
    }


    public function goodsDetail(){
        $goodsDel=D("Goods");
        $history=D('history');
        $goods=$goodsDel->goodsDetail(I('id'));
        $images=explode(",",$goods["image"]);
        $goods_id=I('id');
        $this->history();
        $info3=$history->getHistory();
       // $info1=$goodsDel->history();

        //分页
        $lev=I('level');
        $level=isset($lev)?$lev:0;
        if($level==0){
            $level="level";
        }elseif($level==3){
            $level="3,4,5";
        }
        // $goods = M('goods');
        $user = M('users');
        $ordergoods = M('ordergoods');
        $order = M('order');
        $pingjia = M('pingjia');

        $count = $pingjia->where("gid=".$goods_id." and level in(".$level.")")->count(); //计算记录数

        $limitRows = 10; // 设置每页记录数
        $p = new \Org\Util\AjaxPage($count, $limitRows,"search"); //第三个参数是你需要调用换页的ajax函数名
        //$p->rollPage=2;
        $limit_value = $p->firstRow . "," . $p->listRows;

        $data = $pingjia->field("createtime,pjtime,sk_users.username as username,sk_users.avatar as images,pingjia,sk_pingjia.`return`,sk_pingjia.`level`,gid,sk_pingjia.id as id")->join("sk_order on sk_pingjia.oid=sk_order.id")
            ->join("sk_users on sk_pingjia.uid=sk_users.id")
            ->where("gid=".$goods_id." and level in(".$level.")")->order('sk_pingjia.id desc')->limit($limit_value)->select(); // 查询数据
        $str="";
        foreach($data as $k1=>$v1){
            $arr=str_split($v1["username"]);
            $str.=reset($arr);
            $str.="****";
            $str.=end($arr)."(匿名)";
            $data[$k1]["username"]=$str;
            $str="";
            $cou=M("userful")->field("count(sk_userful.id) as userful")->join("sk_pingjia on sk_userful.pid=sk_pingjia.id")->where("status=1 and gid=".$v1["gid"])->find();
            $data[$k1]["userful"]=$cou["userful"];
        }



        $all=$pingjia->where("gid=".$goods_id)->count(); // 好评度,$good[0]总共评论数量，$good[1]差评率，$good[2]中评率，$good[3]好评率，$good[4]默认被选中评论率
        $good=array();
        $good[0]=$all;
        $good[4]=$level=="level"?0:$level;
        if($all==0){
            $good[1]=0;
            $good[2]=0;
            $good[3]=0;
        }else{
            $good[1] = $pingjia->where("level=1 and gid=".$goods_id)->count();
            $good[1]=round($good[1]*100/$all);
            $good[2] = $pingjia->where("level=2 and gid=".$goods_id)->count();
            $good[2]=round($good[2]*100/$all);
            $good[3] = $pingjia->where("level in (3,4,5) and gid=".$goods_id)->count();
            $good[3]=100-$good[1]-$good[2];

        }
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成

        //收藏
        $arr=A("Cart")->status();

            if(in_array($goods_id,$arr)){
                $goods["status"]=1;
            }else{
                $goods["status"]=0;
            }
       $collect=M("collect")->where("status=1 and gid=".$goods_id)->count();


        $this->assign('info3',$info3);
        $this->assign('total',$count);//
        $this->assign('list',$data);//评论信息
        $this->assign('page',$page);//分页
        $this->assign('info1',$info1);//
        $this->assign("images",$images);//图片
        $this->assign("goods",$goods);//商品信息
        $this->assign("good",$good);//好评度
        $this->assign("collect",$collect);//收藏数量
        $this->assign("empty","<div style='margin:40px auto 0; font-size:30px;color:#a9a9a9;text-align: center '>暂时没有评论</div>");
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display("goodsDetail");
        }


    }


    //限时抢购
    public function goodsGroup(){
        $obj=new GoodsModel();
        if(IS_AJAX){
            $gettime=I("post.time");
            $starttimestr = substr($gettime,0,5).':00';
            $endtimestr = substr($gettime,6,5).':00';

            $time['starttime'] = strtotime($starttimestr);
            $time['endtime'] = strtotime($endtimestr);
            $time['nowtime'] = time();
            $time['lefttime'] = $time['endtime']-$time['nowtime']; //实际剩下的时间（秒）
            $info=$obj->hotsale($starttimestr,$endtimestr);
            $this->assign('time',$time);
            $this->assign('info',$info);
            $this->assign('empty',"<h2 style='font-size: 20px'>该时间段暂时没有特价商品</h2>");
            $this->display('group');


        }else{
            $starttimestr = "08:00:00";
            $endtimestr = "10:00:00";
            $time['starttime'] = strtotime($starttimestr);
            $time['endtime'] = strtotime($endtimestr);
            $time['nowtime'] = time();
            $time['lefttime'] = $time['endtime']-$time['nowtime']; //实际剩下的时间（秒）
            $this->assign("time",$time);
            $info=$obj->hotsale($starttimestr,$endtimestr);
            $this->assign('empty',"<h2 class='empty'>该时间段暂时没有特价商品</h2>");
            $this->assign('info',$info);
            $this->display();
        }
    }
    //刷新页面初始化价格
    public function setprice(){
        $obj=new GoodsModel();
        $obj->setprice();
    }
    //动态改变价格
    public function starprice(){
        $obj=new GoodsModel();
        $time=date("H:i:s",I('post.time'));
        //echo $time;
        $obj->starprice($time);
    }
    //结束回复价格
    public function endprice(){
        $obj=new GoodsModel();
        $time=date("H:i:s",I('post.time'));
        //echo $time;
        $obj->endprice($time);
    }



    //分类搜索
    public function cat_search(){
        $get=D('category');
        $inf=$cat->select();
        $this->assign('inf',$inf);
        $this->display('goodsList');
    }

    //有用
    public function useful(){
        $uid=I("uid");
        $pid=I("pid");
        $info= M("userful")->where("pid=".$pid." and uid=".$uid)->find();
        if(!$info){
            $data["uid"]=$uid;
            $data["pid"]=$pid;
            $data["status"]=1;
            $_POST=$data;
            M("userful")->create();
            $id=M("userful")->add();
            if($id){
                echo $this->success("添加成功");
            }else{
                echo $this->error("添加失败");
            }
        }else{
            echo  $this->error("添加失败");
        }
    }
    // 浏览记录
    public function history(){
        $history=D('goods');
        if(isset($_SESSION['uid'])&&$_SESSION['uid']>0){

            $res=$history->history();
           
        }else{
            if(isset($_SESSION['history'][I('id')])&&$_SESSION['history'][I('id')]>0){
                $_SESSION['history'][I('id')]['addtime']=time();
            }else{
                $_SESSION['history'][I('id')]=array("gid"=>I('id'),"addtime"=>time());
                
            }
        }
    }

    public function clothing(){
        $category=D('category');
        $goods=D('goods');

        $man=$this->fenlei($id1=1);
        $a=$goods->ssearch();
        if($a){
            $info1=$goods->where($man)->order($a['orderby'],$a['orderway'])->select();
        }else{
            $info1=$goods->where($man)->select();
        }
        

        $men=$this->fenlei($id1=2); 
        if($a){
            $info2=$goods->where($men)->order($a['orderby'],$a['orderway'])->select();
        }else{
            $info2=$goods->where($men)->select();
        }
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->display();
    }
    public function shoes(){
         $category=D('category');
        $goods=D('goods');
        $man=$this->fenlei($id1=3);
        $info1=$goods->where($man)->select();

        $men=$this->fenlei($id1=4); 
        $info2=$goods->where($men)->select();
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->display();
    }
    public function bags(){
         $category=D('category');
        $goods=D('goods');
        $man=$this->fenlei($id1=5);
        $info1=$goods->where($man)->select();

       
        $this->assign('info1',$info1);
        $this->display();
    }

    public function jewelry(){
        $category=D('category');
        $goods=D('goods');
        $man=$this->fenlei($id1=6);
        $info1=$goods->where($man)->select();

       
        $this->assign('info1',$info1);
        $this->display();
    }
    public function fenlei($id1){
            $category=D('category');
        
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

            return $cid;
    }
}
?>