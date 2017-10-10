<?php
namespace Mobile\Controller;
use Mobile\Common\Controller\BgController;
use Think\Image;
use Think\Page;
use Think\Upload;

class UserCenterController extends BgController{
    //用户中心首页
    public function usercenter(){
        //浏览记录
        if(session("ybc_footmark")){
            $whe['id']=array('in',session("ybc_footmark"));
            $fmInfo=M('goods')->where($whe)->select();
            shuffle($fmInfo);
            $this->assign('fmInfo',$fmInfo);
        }else{//没有浏览记录则显示推荐商品
            $idArr1=M('goods')->order('addtime desc')->limit(0,30)->field('id')->select();
            $idArr2=array_slice($idArr1,0,10);
            foreach($idArr2 as $v){
                $idArr3[]=$v['id'];
            }
            $whe['id']=array('in',$idArr3);
            $tjInfo=M('goods')->where($whe)->select();
            shuffle($tjInfo);
            $this->assign('tjInfo',$tjInfo);
        }

//购买记录
        $user = M('Member');
        $where['id'] = session('ybc_id');
        $userInfo = $user->where($where)->select();
        $this->assign('deavatar',$userInfo[0]['avatar']);
        $this->assign('userInfo', $userInfo);
        $mid=session('ybc_id');
        $db=D('History');
        $arr=$db->getGoodsList($mid);
        $this->assign('firstRow',$arr['firstRow']);
        $this->assign('goods',$arr['goods']);// 赋值数据集
        $this->assign('page',$arr['page']);// 赋值分页输出
        //我的收藏
        $collect=M('Goods_collect');
        $collectList=$collect->alias('c')
            ->field('gid,goodsname,pic,price')
            ->join('ybc_goods g ON c.gid = g.id')
            ->where(array('mid'=>$mid))
            ->order('c.addtime desc')
            ->select();

        //查询已完成订单和未完成订单
        $order=M('order');
        $where1['mid']=array('eq',session('ybc_id'));
        $where1['orderstatus']=array('egt',4);
        $total=$order->where(array('mid'=>session('ybc_id')))->count();
        $ok=$order->where($where1)->count();
        $this->assign('wait',$total-$ok);
        $this->assign('ok',$ok);
        $this->assign('collectList',$collectList);
        $this->display('usercenter');
    }
//修改密码
    public function changepassword(){
        if (IS_AJAX) {
            $member = M('Member');
            $where['id'] = session('ybc_id');
            $where['password'] = md5(I('post.password'));
            $result = $member->where($where)->find();
            if ($result) {
                $data['password'] = md5(I('post.n_password'));
                $update = $member->where($where)->save($data);
                if ($update) {
                    session('ybc_id',null);
                    $this->success('密码修改成功,请重新登录');
                } else {
                    $this->error('修改失败');
                }
            } else {
                $this->error('原密码输入错误');
            }
        } else {
            $this->display('changepassword');
        }
    }
//验证密码
    public function chkpassword(){
        $where['id'] = session('ybc_id');
        $where['password'] = md5(I('post.password'));
        if (M('Member')->where($where)->find()) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
//用户信息
    public function userinfo(){
        if (session('ybc_id')) {
            $user = M('Member');
            $where['id'] = session('ybc_id');
            $userInfo = $user->where($where)->select();
            $this->assign('userInfo', $userInfo);
            $this->assign('deavatar',$userInfo[0]['avatar']);
            $this->display('userinfo');
        }
    }
//用户修改保存信息
    public function saveinfo(){
        if (IS_AJAX) {
            $model = M('Member');
            $data = $model->create();
            $where['id']=session('ybc_id');
            if ($data) {
                $upload=new Upload();
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/avatar/'; // 设置附件上传根目录
                $upload->autoSub = false;
                $info= $upload->upload();
                if($info){
                    $filename = './Uploads/avatar/' . $info['avatar']['savename'];
                    $imge = new Image();
                    $avatarpic = './Uploads/avatar/100/' . '100_' . $info['avatar']['savename'];
                    $imge->open($filename)->thumb(100, 100)->save($avatarpic);
                    $data['avatar']=$info['avatar']['savename'];
                    $id=$model->where($where)->save($data);
                    if($id){
                        session('avatar1',$info['avatar']['savename']);
                        $this->success('保存成功');
                    }else{
                        $this->error('保存失败');
                    }
                }else{
                    $id=$model->where($where)->field('username,sex,mobile,mail,qq')->save($data);
                    // 往团购表里面更改action
                    if($id){
                        $this->success('保存成功');
                    }else{
                        $this->error('保存失败');
                    }
                }

            }else{
                $this->error($model->getError());
            }
        }
        $this->display();
    }
    public function userintegral(){
        $points=M('Member');
        $point=$points->where(array('id'=>session('ybc_id')))->select();
        //积分获取记录
        $integral=M('Order');
        $where['mid']=array('eq',session('ybc_id'));
        $where['orderstatus']=array('egt',4);
        $integralList=$integral->where($where)->select();
        $this->assign('integralList',$integralList);
        //查询积分消费订单
        $pointsorder=M('Orderintegral');
        $where1['mid']=array('eq',session('ybc_id'));
        $where1['orderstatus']=array('gt',1);
        $consume=$pointsorder->where($where1)->sum('orderpoints');
        $mid=session('ybc_id');
        $order=$pointsorder->alias('o')
            ->join("ybc_order_status_integral s ON o.orderstatus=s.id")
            ->field(array(
                "o.id"=>'id',
                "o.ordersyn"=>'ordersyn',
                "o.orderpoints"=>'orderpoints',
                "o.addtime"=>'addtime',
                "o.orderstatus"=>'status',
                "s.status"=>'orderstatus',
                "s.mnext"=>'mnext'
            ))
            ->where(array('mid'=>$mid))
            ->select();
        $this->assign('order',$order);
        $this->assign('consume',$consume);
        $this->assign('points',$point[0]['points']);
        $this->assign('totalpoints',$point[0]['totalpoints']);
        $this->display('userintegral');
    }

    public function qrsh(){//用户确认收货
        $condition['id']=I('post.id');
        $data['orderstatus']=5;
        $res2=M('Orderintegral')->where($condition)->save($data);
        if($res2){
            $this->success("确认收货成功");
        }else{
            $this->error("确认收货失败");
        }
    }


//*****************我的评论****************
    public function myComment(){
        $mid=session('ybc_id');
        $comment=M('Comment');
        $count=$comment->where(array('mid'=>$mid))->count();
        $commentList=$comment->alias('c')
            ->field('c.id as id,c.gid as gid,hid,pic,goodsname,text,level,buytime,c.addtime as addtime')
            ->join('ybc_history h ON c.hid = h.id')
            ->where(array('c.mid'=>$mid))
            ->order('c.addtime desc')
            ->select();
        $this->assign('count',$count);
        $this->assign('commentList',$commentList);
        $this->display();
    }
    public function commentDetail(){//------评价详情-------
        $id=I('get.id');
        $hid=I('get.hid');
        $comment=M('Comment');
        $history=M('History');
        $commentA=M('Comment_admin');
        $goodsInfo=$history->where(array('id'=>$hid))->field('goodsname,pic')->find();
        $commentInfo=$comment->where(array('id'=>$id))->field('text,level,addtime')->find();
        $aCommentInfo=$commentA->where(array('cid'=>$id))->field('text,addtime')->find();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('commentInfo',$commentInfo);
        $this->assign('aCommentInfo',$aCommentInfo);
        $this->display();
    }
    public function editComment(){//------重新评价界面-------
        $id=I('get.id');
        $hid=I('get.hid');
        $comment=M('Comment');
        $text=$comment->where(array('id'=>$id))->getField('text');
        $this->assign('text',$text);
        $history=M('History');
        $goodsInfo=$history->where(array('id'=>$hid))->field('pic,goodsname')->find();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('id',$id);
        $this->display();
    }
    public function reComment(){//--------更新评价数据---------
        $id=I('post.id');
        $comment=M('Comment');
        if(I('post.content')){
            $data['text']=I('post.content');
        }else{
            $data['text']='好评！';
        }
        $data['level']=1;
        $data['addtime']=time();
        if($comment->where(array('id'=>$id))->save($data)){
            $this->success('评价成功');
        }else{
            $this->error('评价失败');
        }
    }

//*****************我的收藏*****************
    public function myCollect(){
        $mid=session('ybc_id');
        $collect=M('Goods_collect');
        $count=$collect->where(array('mid'=>$mid))->count();
        $collectList=$collect->alias('c')
            ->field('gid,goodsname,pic,price,c.addtime as addtime')
            ->join('ybc_goods g ON c.gid = g.id')
            ->where(array('mid'=>$mid))
            ->order('c.addtime desc')
            ->select();
        $this->assign('count',$count);
        $this->assign('collectList',$collectList);
        $this->display();
    }
}