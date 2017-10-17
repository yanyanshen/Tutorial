<?php
namespace Home\Controller;
use Think\Controller;
class BuyCarController extends Controller{
    public function buyCar(){
        //购物车列表：
        $data=M('Shop');
        $buyCarList=$data->select();
        $this->assign("buyCar",$buyCarList);
        //输出页面：
        $this->display();
    }
    public function buyCar_add(){
        $id=I('post.id');
        $formnum=I('post.number');
        $data=M('Goods')->where('id='.$id)->find();
        $addgoodsname=$data['goodsname'];
        $shop=M('shop')->where("goodsname='$addgoodsname'")->find();
        $shopnum=$shop['number'];
        if($shop) {
            $num['number']=$formnum+$shopnum;
            M('shop')->where("goodsname='$addgoodsname'")->save($num);
            $this->success("添加成功！",U('BuyCar/buyCar'),1);
        }else{
            $shop1=M('Goods')->where('id='.$id)->find();
            $shop2['goodsname']=$shop1['goodsname'];
            $shop2['price']=$shop1['price'];
            $shop2['pic']=$shop1['pic'];
            $shop2['number']=$formnum;
            $shop2['marketprice']=$shop1['marketprice'];
            $shop2['description']=$shop1['description'];
            M('shop')->add($shop2);
            $this->success("添加成功！",U('BuyCar/buyCar'),1);
        }
    }
    public function buyCar_delete(){
        //购物车删除：
        $data = M('shop');
        $id = I('get.id');
        if ($data->where('id=' . $id)->delete()) {
            $this->success("修改成功！",U('BuyCar/buyCar'),0);
        } else {
            $this->error("修改失败！",U('BuyCar/buyCar'),1);
        }
    }
}
