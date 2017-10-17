<?php
namespace Home\Controller;
use Think\Controller;
class OrderDetailController extends Controller
{
    public function orderDetail()
    {
        $category = M('Category');
        $cateList = $category->where(array('pid' => 0))->select();
        foreach ($cateList as $k1 => $v1) {
            $cateList[$k1]['second'] = $category->where(array('pid' => $v1['id']))->select();
            foreach ($cateList[$k1]['second'] as $k2 => $v2) {
                $cateList[$k1]['second'][$k2]['third'] = $category->where(array('pid' => $v2['id']))->select();
            }
        }
        $this->assign("cateList", $cateList);
        //
        $goods = M('goods');
        $goodsList = $goods->select();
        $this->assign("goodsList", $goodsList);
        $this->display();
    }

    public function orderDetail_add()
    {

        $id = I('post.id');
        $formnum = I('post.number');
        $data = M('Goods')->where('id=' . $id)->find();
        $addgoodsname = $data['goodsname'];
        $shop = M('shop')->where("goodsname='$addgoodsname'")->find();
        $shopnum = $shop['number'];
        if ($shop) {
            $num['number'] = $formnum + $shopnum;
            M('shop')->where("goodsname='$addgoodsname'")->save($num);
            $this->success("添加成功！", U('Detail/orderDetail'), 1);
        } else {
            $shop1 = M('Goods')->where('id=' . $id)->find();
            $shop2['goodsname'] = $shop1['goodsname'];
            $shop2['price'] = $shop1['price'];
            $shop2['pic'] = $shop1['pic'];
            $shop2['number'] = $formnum;
            $shop2['marketprice'] = $shop1['marketprice'];
            $shop2['description'] = $shop1['description'];
            M('shop')->add($shop2);
            $this->success("添加成功！", U('Detail/orderDetail'), 1);
        }

    }
}

