<?php
namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller{
    public  function search(){
        $keywords=I('get.keywords');
        $condition['name'] =array('like',array("%{$keywords}%"));
        $credit = M('goods');
        $count = $credit->where($condition)->count(); //计算记录数
        $limitRows = 12; // 设置每页记录数
        $p = new \Org\Util\AjaxPage($count, $limitRows,"search"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
        $data = $credit->where($condition)->order('price desc')->limit($limit_value)->select(); //查询数据
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
        $this->assign('total',$count);
        $this->assign('list',$data);
        $this->assign('page',$page);
        $this->assign('mrid',$_SESSION['Mr_home']['mrid']);
        $this->assign('username',$_SESSION['Mr_home']['mrusername']);
        $this->assign('keywords',$keywords);
        if(IS_AJAX){
            $this->display('result');
        }else{
            $this->display();
        }
    }
}