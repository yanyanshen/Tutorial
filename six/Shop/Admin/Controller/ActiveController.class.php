<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\ActiveModel;
use Think\Page;

class ActiveController extends Controller{
    public function activeList(){
        $obj=new ActiveModel();
        $active=$obj->activeList(I('post.activetime'));
        $this->assign("active",$active);
        $this->display();
    }
    public function add_active(){
        $obj=new ActiveModel();
        $goods=$obj->getgoodsinfo(I('get.id'));
        $this->assign("goods",$goods);
        $this->display();
    }

    public function del_active(){
        $obj=new ActiveModel();
        $gid=I('post.gid');
        $rel=$obj->delactive($gid);
        if($rel){
            echo $this->success("删除成功");
        }else{
            echo $this->error("删除失败");
        }
    }

    public function add(){
        $obj=new ActiveModel();
        $date=$obj->create();
        if($date){
            if(I('activenum')>I('goodsnum') or I('activenum')<1){
                echo $this->error("活动数量最少为一个，且不能大于库存量");
            }else if(I('activeprice')>I('saleprice') or I('activeprice')<0){
                echo $this->error("活动价格不能小于0， 且不能大于原价格");
            }else{
                if($obj->addactive($date)){
                    echo $this->success('参加活动成功');
                }else{
                    echo $this->error('参加失败');
                }
            }

        }else{
            echo $this->error($obj->getError());
        }
    }
}