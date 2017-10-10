<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class CommentController extends BgController{
    public function commentList(){
            //搜索条件判断
                if(isset($_GET['goodsId']) && $_GET['goodsId']){//判断商品ID
                    $goodsId=I('get.goodsId');
                    $where['gid']=$goodsId;
                    $this->assign('goodsId',$goodsId);
                }
                if(isset($_GET['keywords']) && $_GET['keywords']){//判断关键字
                    $keywords=I('get.keywords');
                    $where['g.goodsname']=array('like',"%{$keywords}%");
                    $this->assign('keywords',$keywords);
                }
                if(isset($_GET['membername']) && $_GET['membername']){//判断用户名
                    $membername=I('get.membername');
                    $where['m.username']=array('like',"%{$membername}%");
                    $this->assign('membername',$membername);
                }
                if(isset($_GET['level'])){//判断评价水平
                    if(I('get.level')!=0){
                        $level=I('get.level');
                        $where['level']=$level;
                        $this->assign('level',$level);
                    }else{
                        $this->assign('level',0);
                    }
                }else{
                    $this->assign('level',0);
                }
                if(I('get.date1') && I('get.date2')){//判断时间选择
                    $time1=strtotime(I('get.date1'));
                    $time2=strtotime(I('get.date2'));
                    $this->assign('date1',I('get.date1'));
                    $this->assign('date2',I('get.date2'));
                    $where['c.addtime']=array(array('gt',$time1),array('lt',$time2),'and');
                }elseif(I('get.date2') && !I('get.date1')){
                    $time2=strtotime(I('get.date2'));
                    $this->assign('date2',I('get.date2'));
                    $where['c.addtime']=array('lt',$time2);
                }elseif(I('get.date1') && !I('get.date2')){
                    $time1=strtotime(I('get.date1'));
                    $this->assign('date1',I('get.date1'));
                    $where['c.addtime']=array('gt',$time1);
                }

        $data=M('Comment');
        $count=$data->alias('c')->join("ybc_goods g on c.gid=g.id")->join("ybc_member m on c.mid=m.id")->where($where)->count();
        $page=new Page($count,5);
        $show=$page->show();
        $comment=$data      //------获取评价列表--------
            ->alias('c')
            ->field('c.id as id,gid,goodsname,pic,username as membername,text as text1,c.addtime as addtime1,level')
            ->join('ybc_goods g ON c.gid = g.id')
            ->join('ybc_member m ON c.mid = m.id')
            ->where($where)
            ->order('c.addtime desc')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        foreach($comment as $k=>$v){
            $id=$v['id'];
            $commentA=M('Comment_admin');
            $admin=M('Admin');
            $aid=$commentA->where(array('cid'=>$id))->getField('aid');
            $comment[$k]['adminname']=$admin->where(array('id'=>$aid))->getField('username');
            $comment[$k]['text2']=$commentA->where(array('cid'=>$id))->getField('text');
            $comment[$k]['addtime2']=$commentA->where(array('cid'=>$id))->getField('addtime');
        }
        $this->assign('firstRow',$page->firstRow);
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->assign('comment',$comment);
        $this->display();
    }

    public function delComment(){//-------删除评价--------
        $id=I('post.id');
        $comment=M('Comment');
        $commentA=M('Comment_admin');
        $res=$comment->where(array('id'=>$id))->delete();
        $commentA->where(array('cid'=>$id))->delete();
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    public function commentDetail(){//------评价详情-------
        $id=I('get.id');
        $comment=M('Comment');
        $goods=M('Goods');
        $member=M('Member');
        $commentA=M('Comment_admin');
        $admin=M('Admin');
        $commentInfo=$comment->where(array('id'=>$id))->field('id,gid,mid,text,level,addtime')->find();
        $goodsInfo=$goods->where(array('id'=>$commentInfo['gid']))->field('id,goodsname')->find();
        $memberInfo=$member->where(array('id'=>$commentInfo['mid']))->field('username')->find();
        $aCommentInfo=$commentA->where(array('cid'=>$id))->field('aid,text,addtime')->find();
        $adminInfo=$admin->where(array('id'=>$aCommentInfo['aid']))->field('username')->find();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('memberName',$memberInfo['username']);
        $this->assign('commentInfo',$commentInfo);
        $this->assign('aCommentInfo',$aCommentInfo);
        $this->assign('adminName',$adminInfo['username']);
        $this->display();
    }

    public function editComment(){//回复评价
        $cid=I('post.cid');
        if(I('post.aComment')){
            $data['aid']=session('aid');
            $data['cid']=$cid;
            $data['text']=I('post.aComment');
            $data['addtime']=time();
            $aComment=M('Comment_admin');
            if($aComment->add($data)){
                $this->success('回复成功');
            }else{
                $this->error('回复失败');
            }
        }else{
            $this->error('您没有填写回复内容哦');
        }
    }
}