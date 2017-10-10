<?php
namespace Admin\Controller;

use Admin\Common\Controller\BgController;



class GroupController extends BgController{

    //-------------------------显示团购列表--------------------------------
    public function index(){

        /***********查询条件判断************/
        if(IS_GET){
            $keyword=trim(I('get.keyword'));
            $way=I('get.way');
            $startime=strtotime(I('get.startime'));
            $endtime=strtotime(I('get.endtime'));
            $this->assign('keyword',I('get.keyword'));
            $this->assign('way',I('get.way'));
            if($startime && $endtime){
                $where['startime']=array('EGT',$startime);
                $where['endtime']=array('ELT',$endtime);
                $this->assign('startime',I('get.startime'));
                $this->assign('endtime',I('get.endtime'));

            }elseif($endtime && !$startime){
                $where['endtime']=array('ELT',$endtime);
                $this->assign('endtime',I('get.endtime'));
            }elseif($startime && !$endtime){
                $where['startime']=array('EGT',$startime);
                $this->assign('startime',I('get.startime'));
            }
            if($keyword){
                if($way=='goodsname'){
                    $condition['goodsname']=array('like',"%$keyword%");
                    $gid=M('Goods')->where($condition)->getField('id');
                    $where=array('gid'=>$gid);
                }elseif($way=='brandname'){
                    $condition['brandname']=array('like',"%$keyword%");
                    $bid=M('Brand')->where($condition)->getField('id');
                    $info=M('Goods')->where(array('bid'=>$bid))->select();
                    $str='';
                    foreach($info as $v){
                        $str.=$v['id'].",";
                    }
                    $where['gid']=array('in',$str);
                }
            }
        }else{
            $where='';
        }
        $group=M('Group');
        $count=$group->where($where)->count();
        $limitRows=4;
        $page=new \Org\Page\AjaxPage($count,$limitRows,"search");

        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');

        $show=$page->show();
        $list=$group->order('addtime desc')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $k=>$v){
            $id=$v['gid'];
            $goods=M('Goods');
            $bidname=M('Brand');
            $list[$k]['goodsname']=$goods->where(array('id'=>$id))->getField('goodsname');
            $bid=$goods->where(array('id'=>$id))->getField('bid');
            $list[$k]['pic']=$goods->where(array('id'=>$id))->getField('pic');
            $list[$k]['brandname']=$bidname->where(array('id'=>$bid))->getField('brandname');
        }
        $this->assign('count',$count);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('firstRow',$page->firstRow);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display('list');
        }
    }






    //----------------------------增加团购-----------------------------------
    public function add(){
        if(IS_POST){
            $group=D('Group');
          if($results=$group->create()){
              $gid=trim(I('post.gid'));
              $price=trim(I('post.price'));
              $important=I('post.important');
              $data['important']=$important;
              $data['gid']=$gid;
              $data['groupnum']=I('post.groupnum');
              $data['startime']=strtotime(I('post.startime'));
              $data['endtime']=strtotime(I('post.endtime'));
              $data['price']=$price;
              $data['addtime']=time();

              $info=M('Goods')->where(array('id'=>$gid))->find();
              if($info){
                  if($info['ad']=='1'){
                      echo "该商品为广告商品";
                  }else{
                      $res=M('Goods')->where(array('id'=>$gid))->save(array('price'=>$price,'group'=>'1'));
                      if($res){
                          $row=$group->addData($data);
                          if(!$row){
                              echo "添加团购商品失败";
                          }
                      }else{
                          echo M('Goods')->getError();
                      }
                  }
              }else{
                  echo "请填写正确的商品ID";
              }
          }else{
              echo $group->getError();
          }
        }else{
            $this->display('add');
        }

    }

    /****************************上下架操作**********************/

    public function put(){
        if(IS_GET){
            $id=I('get.id');
            $gid=M('Group')->where(array('id'=>$id))->getField('gid');
            D('Goods')->group($gid);
            $res=D('Group')->put($id);
            if($res){
                echo '操作成功';
            }else{
                echo false;
            }
        }else{
            $this->display('index');
        }
    }


    /*********************************删除操作**********************/

    public function del(){
        if(IS_GET){
            $id=I('get.id');
            $res=D('Group')->del($id);
            if($res){
                echo "删除成功";
            }else{
                echo false;
            }
        }else{
            $this->display('index');
        }
    }


    /******************************显示修改团购信息***********************/
    public function edit(){
        if(IS_GET){
            $id=I('get.id');
            $info=D('Group')->refer($id);
            if($info){
                $info['goodsname']=M('Goods')->where(array('id'=>$info['gid']))->getField('goodsname');
                $info['pic']=M('Goods')->where(array('id'=>$info['gid']))->getField('pic');
                $info['oldprice']=M('Goods')->where(array('id'=>$info['gid']))->getField('oldprice');
                $this->assign('info',$info);
                $this->display('edit');
            }else{
                $this->display('edit');
            }
        }else{
            $this->display('edit');
        }




    }


    /*************修改团购信息操作****************/
    public function test(){
        if(IS_POST){
            $info=D('Group')->create();
            $info['startime']=strtotime($info['startime']);
            $info['endtime']=strtotime($info['endtime']);
            $id=$info['id'];
            $row=D('Group')->edit($id,$info);
            if(!$row){
                echo "修改失败";
            }
        }
    }


    //**********************查找商品图片**********

    public function image(){
        $gid=I('get.gid');
        $goods=M('goods')->where(array('id'=>$gid))->find();
        if($goods){
            if($goods['ad']=='1'){
                $this->error("该商品为广告商品!");
            }else{
                $this->success($goods);
            }

        }else{
            $this->error("没有查询到相关ID的商品");
        }
    }


    //************************发送邮件******************
    public function send_mail(){
        $info=D('group')->todayGroup();
        if($info){
            $this->assign('info',$info);
        }
        if(IS_POST){
            if(I('post.gid')){
                $gid=I('post.gid');
            }else{
                $this->error("请填写商品ID");
            }
            if(I('post.title')){
                $title=I('post.title');
            }else{
                $this->error('请填写消息标题');
            }
            if(I('post.content')){
                $content=I('post.content');
            }else{
                $this->error("请填写消息内容");
            }

            $message=M("MemberMessage");
            $info1=M('groupnum')->where(array('gid'=>$gid))->where(array('action'=>1))->select();
            //print_r($idInfo);
            $t='';
            foreach($info1 as $v){
                $data['mid']=$v['mid'];
                $data['from']="团购提醒";
                $data['time']=time();
                $data['message']=$content;
                $data['title']=$title;
                $res=$message->add($data);
                $t.=$res;
            }
            if($t){
                $this->success();
            }else{
                $this->error('消息发送失败');
            }
        }else{

            $this->display('email');
        }
    }


    //**************导出团购表操作**********
    public function export(){
        $file_name   = "团购一览表-".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
        $info=M('Group')->alias('gp')
            ->join('ybc_goods g ON gp.gid=g.id')
            ->join('ybc_brand b ON g.bid=b.id')
            ->join('ybc_category c ON g.id=c.id')
            ->field('g.goodsname as goodsname,b.brandname as brandname,c.catename as catename,gp.startime as startime,gp.endtime as endtime,g.price as price')
            ->select();
        $this->assign('info',$info);
        $this->display('export');
    }


    //从商品表发布团购
    public function publish(){
        if(IS_GET){
            $id=I('get.id');
            $info=M('Goods')->where(array('id'=>$id))->find();
            $this->assign('info',$info);
            $this->display('add');
        }
    }








}