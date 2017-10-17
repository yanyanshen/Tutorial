<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{
    public function detail2(){
        $category=M('Category');
        $cateList=$category->where(array('pid'=>0))->select();
        foreach($cateList as $k1=>$v1) {
            $cateList[$k1]['second'] = $category->where(array('pid' => $v1['id']))->select();
            foreach ($cateList[$k1]['second'] as $k2 => $v2) {
                $cateList[$k1]['second'][$k2]['third'] = $category->where(array('pid' => $v2['id']))->select();
            }
        }
        $this->assign("cateList",$cateList);
        //
        $goods=M('goods');
        $goodsList=$goods->select();
        $this->assign("goodsList",$goodsList);
        $this->display();
//商品详情

        }
        public function detail(){
            $id=I('id');
            $sp=M('Goods')->where('id='.$id)->find();
            $this->assign('sp',$sp);
            $this->display();
        }
    public function detail1(){
        $id=I('id');
        $sp=M('shop')->where('id='.$id)->find();
        $this->assign('sp',$sp);
        $this->display();
    }

}
