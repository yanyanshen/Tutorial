<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class DetailController extends Controller{
    public function detail(){

        if(session('ybc_footmark')){
            $arr=session("ybc_footmark");
        }else{
            $arr=array();
        }
        $arr[]=I('get.id');
        session("ybc_footmark",$arr);


        $hid=I('get.hid');
        $this->assign('hid',$hid);
        //---------根据商品的id从goods商品表中读取相应数据-----------
        $id=I('get.id');
        $mid=session('ybc_id');
        $goods=M('Goods');
        $goodsInfo=$goods->field('goodsname,pic,price,oldprice,weight,salenum,num,bid,cid,detail,active')->where(array('id'=>$id))->select();
        $cid=$goodsInfo[0]['cid'];
        $category=M('Category');
        $category1=$category->where(array('id'=>$cid))->field('catename,pid')->find();
        $pid=$category1['pid'];
        $category2=$category->where(array('id'=>$category1['pid']))->field('catename')->find();
        $this->assign('category1',$category1);
        $this->assign('category2',$category2);
        $this->assign('gid',$id);
        $this->assign('cid',$cid);
        $this->assign('pid',$pid);
        $this->assign('goodsInfo',$goodsInfo);

        //-----------从goodsPic表中获取商品图片信息--------
        $goodsPic=M('Goods_pic')->field('picname')->where(array('gid'=>$id))->select();
        $this->assign('goodsPic',$goodsPic);

        //---------------收藏商品时的判断--------------
        if($mid){
            $loginStatus=true;
        }else{
            $loginStatus=false;
        }
        if($this->chkCollect($id)){
            $ifCollect=true;
        }else{
            $ifCollect=false;
        }
        $this->assign('loginStatus',$loginStatus);
        $this->assign('ifCollect',$ifCollect);

        //------------------修改后的广告商品-----------------------
        $bid=$goodsInfo[0]['bid'];
        $adgood1=M('Goods')->where(array('bid'=>$bid))->where(array('ad'=>1))->select();
        $adstr='';
        foreach($adgood1 as $v){
            $adstr.=$v['id'].',';
        }
        $detailAd=D('adgood')->detail($adstr);
        foreach($detailAd as $k=>$v){
            $gid=$v['gid'];
            $detailAd[$k]['goodsname']=M('Goods')->where(array('id'=>$gid))->getField('goodsname');
            $detailAd[$k]['price']=M('Goods')->where(array('id'=>$gid))->getField('price');
            $detailAd[$k]['oldprice']=M('Goods')->where(array('id'=>$gid))->getField('oldprice');
        }
        $this->assign('detailAd',$detailAd);

        //-----------------获取评价列表----------------
        $comment=M('Comment');
        $member=M('member');
        $commentA=M('Comment_admin');
        $count=$comment->where(array('gid'=>$id))->count();
        $count1=$comment->where(array('gid'=>$id,'level'=>1))->count();//好评数
        $count2=$comment->where(array('gid'=>$id,'level'=>2))->count();//中平数
        $count3=$comment->where(array('gid'=>$id,'level'=>3))->count();//差评数
        $commentList=$comment->where(array('gid'=>$id))->order('addtime desc')->select();
        $commentList1=$comment->where(array('gid'=>$id,'level'=>1))->order('addtime desc')->select();//好评
        $commentList2=$comment->where(array('gid'=>$id,'level'=>2))->order('addtime desc')->select();//中评
        $commentList3=$comment->where(array('gid'=>$id,'level'=>3))->order('addtime desc')->select();//差评
        foreach($commentList as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList1 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList1[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList1[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList1[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList2 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList2[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList2[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList2[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList3 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList3[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList3[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList3[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        $this->assign('count',$count);
        $this->assign('count1',$count1);
        $this->assign('count2',$count2);
        $this->assign('count3',$count3);
        $this->assign('commentList',$commentList);
        $this->assign('commentList1',$commentList1);
        $this->assign('commentList2',$commentList2);
        $this->assign('commentList3',$commentList3);
        $this->display();
    }

//*********收藏商品*******************
    public function toCollect(){
        $gid=I('post.gid');
        $mid=session('ybc_id');
        $collect=M('goods_collect');
        $data['gid']=$gid;
        $data['mid']=$mid;
        $data['addtime']=time();
        if($collect->add($data)){
            $this->success('收藏成功');
        }else{
            $this->error('收藏失败');
        }
    }
//*********取消收藏商品*******************
    public function outCollect(){
        $gid=I('post.gid');
        $mid=session('ybc_id');
        $collect=M('goods_collect');
        $data['gid']=$gid;
        $data['mid']=$mid;
        if($collect->where($data)->delete()){
            $this->success('取消收藏成功');
        }else{
            $this->error('取消收藏失败');
        }
    }
    public function chkCollect($gid){//判断商品是否已被收藏
        $gc=M('goods_collect');
        $where['mid']=session('ybc_id');
        $where['gid']=$gid;
        return $gc->where($where)->find();
    }

//*********获取商品收藏人数**************
    public function getCollectNum(){
        $gid=I('post.gid');
        $collect=M('Goods_collect');
        $collecters=$collect->where(array('gid'=>$gid))->field('count(mid) as num')->select();
        $this->success($collecters[0]['num']);
    }

//*********加入购物车*******************
    public function toCart(){
        $gid=I('post.gid');
        $buynum=I('post.buy-num');
        $addtime=time();
        if(session('ybc_id')){
            //用户登录情况下，直接写入数据库
            //判断数据库中是否存在该用户的该商品信息，存在则数量增加
            $mid=session('ybc_id');
            $cart=M('Cart');
            if($cart->field('buynum')->where(array('gid'=>$gid,'mid'=>$mid))->find()){
                $data['buynum']=array('exp',"buynum+$buynum");
                $data['addtime']=$addtime;
                if($cart->where(array('gid'=>$gid,'mid'=>$mid))->save($data)){
                    $this->success('加入成功');
                }else{
                    $this->error('加入失败');
                };
            }else{
                $data['mid']=$mid;
                $data['gid']=$gid;
                $data['buynum']=$buynum;
                $data['addtime']=$addtime;
                if($cart->add($data)){
                    $this->success('加入成功');
                }else{
                    $this->error('加入失败');
                };
            }
        }else{
            //用户未登录情况下，写入session
            //判断购物车中是否存在此商品，存在则数量增加，不存在则加入此商品
            if(isset($_SESSION['mycart'][$gid])){
                if($_SESSION['mycart'][$gid]['buynum']+=$buynum){
                    $this->success("加入成功");
                }else{
                    $this->error('加入失败');
                }
            }else{
                $cart['gid']=$gid;
                $cart['buynum']=$buynum;
                if($_SESSION['mycart'][$gid]=$cart){
                    $this->success('加入成功');
                }else{
                    $this->error('加入失败');
                };
            }
        }
    }

//************用户评价*******************
    public function toComment(){
        $mid=session('ybc_id');
        $gid=I('post.gid');
        $hid=I('post.hid');
        $data['mid']=$mid;$data['gid']=$gid;$data['hid']=$hid;
        $data['text']=I('post.content');$data['level']=I('post.level');$data['addtime']=time();
        $history=M('History');
        $comment=M('Comment');
        if($comment->where(array('hid'=>$hid))->find()){
            $this->error('您已评价过该商品哦');
        }elseif($comment->add($data)){
            $history->sfpj=1;
            $history->where(array('id'=>$hid))->save();
            $oid=$history->where(array('id'=>$hid))->getField('oid');
            if(!$history->where(array('oid'=>$oid,'sfpj'=>0))->find()){
                $where1['orderstatus']=5;
                M('Order')->where(array('id'=>$oid))->save($where1);
            }
            $count=$comment->where(array('gid'=>$gid))->count();
            $where2['commentnum']=$count;
            M('goods')->where(array('id'=>$gid))->save($where2);
            $this->success('评价成功！');
        }
    }
}