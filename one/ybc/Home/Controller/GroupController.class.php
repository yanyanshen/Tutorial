<?php
namespace Home\Controller;

use Think\Controller;

class GroupController extends Controller{
    public function index(){

        $mid=session("ybc_id");
        //查询轮播图广告
        $groupAd=D('Adgood')->group();
        $this->assign('groupAd',$groupAd);

        if($mid){
            $loginStatus=true;
        }else{
            $loginStatus=false;
        }
        $this->assign('loginStatus',$loginStatus);

        //按照发布时间查询左边团购商品
        $leftInfo=D('Group')->seven();
        if($leftInfo){
            foreach($leftInfo as $k=>$v){
                $id=$v['gid'];
                $collect=M('goods_collect')->where(array('mid'=>$mid,'gid'=>$id))->getField('id');
                $goodsInfo=M('Goods')->where(array('id'=>$id))->find();
                $cid=$goodsInfo['cid'];
                $leftInfo[$k]['catename']=M('Category')->where(array('id'=>$cid))->getField('catename');
                $leftInfo[$k]['goodsname']=$goodsInfo['goodsname'];
                $leftInfo[$k]['oldprice']=$goodsInfo['oldprice'];
                $leftInfo[$k]['weight']=$goodsInfo['weight'];
                $leftInfo[$k]['pic']=$goodsInfo['pic'];
                $leftInfo[$k]['collect']=$collect;
                $leftInfo[$k]['brand']=M('Brand')->where(array('id'=>$goodsInfo['bid']))->getField('brandname');
            }
        }



        //查找主要团购商品
        $mainInfo=D('Group')->one();
        if($mainInfo){
            foreach($mainInfo as $k=>$v){
                $id=$v['gid'];
                $collect=M('goods_collect')->where(array('mid'=>$mid,'gid'=>$id))->getField('id');
                $goodsInfo=M('Goods')->where(array('id'=>$id))->find();
                $cid=$goodsInfo['cid'];
                $mainInfo[$k]['catename']=M('Category')->where(array('id'=>$cid))->getField('catename');
                $mainInfo[$k]['goodsname']=$goodsInfo['goodsname'];
                $mainInfo[$k]['oldprice']=$goodsInfo['oldprice'];
                $mainInfo[$k]['weight']=$goodsInfo['weight'];
                $mainInfo[$k]['pic']=$goodsInfo['pic'];
                $mainInfo[$k]['collect']=$collect;
                $mainInfo[$k]['brand']=M('Brand')->where(array('id'=>$goodsInfo['bid']))->getField('brandname');
            }
        }



        //按照发布时间查询右边团购商品
        $rightInfo=D('Group')->eight();
        if($rightInfo){
            foreach($rightInfo as $k=>$v){
                $id=$v['gid'];
                $collect=M('goods_collect')->where(array('mid'=>$mid,'gid'=>$id))->getField('id');
                $goodsInfo=M('Goods')->where(array('id'=>$id))->find();
                $rightInfo[$k]['goodsname']=$goodsInfo['goodsname'];
                $rightInfo[$k]['oldprice']=$goodsInfo['oldprice'];
                $rightInfo[$k]['weight']=$goodsInfo['weight'];
                $rightInfo[$k]['pic']=$goodsInfo['pic'];
                $rightInfo[$k]['collect']=$collect;
                $rightInfo[$k]['brand']=M('Brand')->where(array('id'=>$goodsInfo['bid']))->getField('brandname');
            }
        }


        $this->assign('rightInfo',$rightInfo);
        $this->assign('mainInfo',$mainInfo);
        $this->assign('nowtime',time());
        $this->assign('leftInfo',$leftInfo);
        $this->display('GroupBuy');
    }
    //判断是否登录
    public function check(){
        if(IS_GET){
            if(session('ybc_id')){
                $this->success("报名成功");
            }else{
                session('url',U('Group/index'));
                $this->error("请先登录哦亲");

            }
        }
    }

    //判断是否已经报名
    public function apply(){
        if(IS_GET){
            $gid=I('get.id');//8
            $mid=session('ybc_id');//6
            $groupNum=M('groupnum');
            $idInfo=$groupNum->where(array('mid'=>$mid))->field('gid')->select();//13
            $str='';
            foreach($idInfo as $v){
                $str.=$v['gid'].",";
            }
            /*判断gid是否在这个字符串中*/
            if(strstr($str,$gid)){
                $this->error('你已经报过名啦亲');
            }else{
                $data['gid']=$gid;
                $data['mid']=$mid;
                $res=$groupNum->add($data);
                if($res){
                    $row=D('group')->num($gid);
                    if($row){
                        $this->success($gid);
                    }else{
                        $this->error('报名失败，请重新报名');
                    }
                }else{
                    $this->error('报名失败，请重新报名');
                }
            }
        }else{
            $this->display();
        }
    }

    //**********************判断是否设置邮箱了*************
    public function chkMail(){
            $mid=session('ybc_id');
            $gid=I('get.gid');
            $res=M('groupnum')->where(array('gid'=>$gid))->where(array('mid'=>$mid))->save(array('action'=>1));
            if($res){
                $this->success('团购开始时我们会通知您哟~');
            }else {
                $this->error(M('groupnum')->getError());
            }
    }


}