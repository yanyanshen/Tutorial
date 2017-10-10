<?php
namespace Mobile\Controller;
use Think\Controller;
class DetailController extends Controller{
    public function detail(){
        //---------根据商品的id从goods商品表中读取相应数据-----------
        $id=I('get.id');
        $mid=session('ybc_id');
        $goods=M('Goods');
        $goodsInfo=$goods->field('goodsname,pic,price,oldprice,weight,salenum,num,bid,cid,detail,active')->where(array('id'=>$id))->select();
        $this->assign('gid',$id);
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

        //-----------------获取评价列表----------------
        $comment=M('Comment');
        $member=M('member');
        $commentA=M('Comment_admin');
        $count=$comment->where(array('gid'=>$id))->count();
        $count1=$comment->where(array('gid'=>$id,'level'=>1))->count();//好评数
        $count2=$comment->where(array('gid'=>$id,'level'=>2))->count();//中评数
        $count3=$comment->where(array('gid'=>$id,'level'=>3))->count();//差评数
        $commentList=$comment->where(array('gid'=>$id))->order('addtime desc')->select();
        $commentList1=$comment->where(array('gid'=>$id,'level'=>1))->order('addtime desc')->select();//好评
        $commentList2=$comment->where(array('gid'=>$id,'level'=>2))->order('addtime desc')->select();//中评
        $commentList3=$comment->where(array('gid'=>$id,'level'=>3))->order('addtime desc')->select();//差评
        foreach($commentList as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList[$k]['avatar']=$member->where(array('id'=>$mid))->getField('avatar');
            $commentList[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList1 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList1[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList1[$k]['avatar']=$member->where(array('id'=>$mid))->getField('avatar');
            $commentList1[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList1[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList2 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList2[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList2[$k]['avatar']=$member->where(array('id'=>$mid))->getField('avatar');
            $commentList2[$k]['text1']=$commentA->where(array('cid'=>$cid))->getField('text');
            $commentList2[$k]['addtime1']=$commentA->where(array('cid'=>$cid))->getField('addtime');
        }
        foreach($commentList3 as $k=>$v){
            $cid=$v['id'];
            $mid=$v['mid'];
            $commentList3[$k]['username']=$member->where(array('id'=>$mid))->getField('username');
            $commentList3[$k]['avatar']=$member->where(array('id'=>$mid))->getField('avatar');
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
    public function tCollect(){//详情页去收藏夹
        if(session('ybc_id')){
            $this->success('ok');
        }else{
            session('url',U('UserCenter/myCollect'));
            $this->error('toLogin');
        }
    }

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
}