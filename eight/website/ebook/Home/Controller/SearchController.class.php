<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller{
    public function search(){
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
        //


    }
    public function buyCar(){
        $id=I('id');
        $goods=M(Goods)->where('id='.$id)->find();
        $getgoods['goodsname']=$goods['goodsname'];
        $getgoods['property']=$goods['property'];
        $getgoods['number']=$goods['number'];
        $getgoods['price']=$goods['price'];
        if(M('shop')->add($getgoods)){
            $this->success('添加成功！',U('Shop/shop_list'));
        }
    }

}