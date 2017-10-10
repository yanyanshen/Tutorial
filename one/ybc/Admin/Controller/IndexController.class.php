<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class IndexController extends BgController {
    public function index(){
        $this->display('index');
    }
    public function main(){
        $this->display('main');
    }
    public function top(){
        $this->display('Public/top');
    }
    public function left(){

        $nav=D('AdminNav');
        $navList=$nav->getNavTree();

        $this->assign('navList',$navList);

        $this->display('Public/left');
    }
    public function footer(){
        $this->display('Public/footer');
    }
    public function getGoodsTop(){
           $model=D('Goods');
           $list=$model->getgoods(10);
            $goodslist=array();
            foreach($list as $k=>$v){
                $goodslist['x'][$k]=mb_substr($v['goodsname'],0,10,'utf-8');
                $goodslist['y'][$k]=$v['salenum'];
            }

        $this->success($goodslist);

    }


    public function send_message(){
        if(IS_POST){
            if(I('post.title')){
                $title=I('post.title');
            }else{
                $this->error("请填写站内信标题");
            }

            if(I('post.message')){
                $message=I('post.message');
            }else{
                $this->error("请填写站内信内容");
            }

            $member=M('Member');
            $info=$member->select();
            $t='';
            foreach($info as $v){
                $mid=$v['id'];
                $data['message']=$message;
                $data['title']=$title;
                $data['mid']=$mid;
                $data['time']=time();
               $memberMessage=M('MemberMessage');
                $res=$memberMessage->add($data);
                $t.=$res;
            }
            if($t){
                $this->success("发送成功");
            }else{
                $this->error("发送失败");
            }
        }else{
            $this->display('message');
        }

    }



}
