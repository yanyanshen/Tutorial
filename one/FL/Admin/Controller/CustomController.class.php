<?php
namespace Admin\Controller;
use Think\Controller;
class CustomController extends Controller{

    public function memberList(){
        //会员列表分页
        $Custom=M('Custom');
        $where['custom_username']=array('like',"%".I("post.key")."%"); //like模糊查询 针对custom_username用户名
        $count=$Custom->where($where)->count();  // 条件是对数据库所有数据都进行模糊查询

        if($count){
        $page=new \Think\Page($count,5);
        $show=$page->show();
        $memberList=$Custom->where($where)->order("custom_id desc")->limit($page->firstRow.','.$page->listRows)->select();
                            //where把模糊条件放入查询语句中
        $map['key']=I("post.key");   //搜索
        foreach($map as $key=>$val) {
            $page->parameter[$key] = urlencode($val);
        }

        $firstRow=$page->firstRow;
        $this->assign("firstRow",$firstRow);    //便利的是5页 每次翻页是5页
        $this->assign("page",$show);           //输出分页
        $this->assign("memberList",$memberList); //便利的时5条

        $this->assign("keywords",$map['key']);
        }
        $this->display();
    }



    public function toggleCustom(){
        //更改会员禁用启用状态
        //print_r($_GET);
        $custom_id=I("get.Custom_id");
        //echo $custom_id;
        $custom=M("Custom");
        $custom_go=$custom->where(array("custom_id"=>$custom_id))->getField("custom_go");
        $data['custom_go']=$custom_go?0:1;
        if($custom->where(array("custom_id"=>$custom_id))->save($data)>0){
            echo "状态修改成功！";
        };
    }


    public function delCustom(){
        //删除商品
        $custom_id=I("get.Custom_id");
        $prod=M("Custom");
        if($prod->where(array("custom_id"=>$custom_id))->delete()>0){
            echo "商品删除成功";
        };
    }
}