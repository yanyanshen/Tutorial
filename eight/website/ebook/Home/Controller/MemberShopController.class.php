<?php
namespace Home\Controller;
use Think\Controller;
class MemberShopController extends Controller
{
    public function shop_list(){
        //加载页面：
        $title = "淘书网-用户中心-我的购物车-购物车列表";
        $this->assign("title", $title);
        //购物车列表：
        $data = M('shop');
        $shopList = $data->select();
        $this->assign("shopList", $shopList);
        //输出页面：
        $this->display();
    }
    public function shop_detail(){
        //购物车详情：
        $id=I('get.id');
        if(M('goods')->where('id='.$id)->select()){
            $this->redirect(U('Home/Detail/detail'));
        }
    }
    public function shop_delete(){
        //购物车删除：
        $data = M('shop');
        $id = I('get.id');
        if ($data->where('id=' . $id)->delete()) {
            echo "<script>alert('删除成功！');window.location.href='/Home/MemberShop/shop_list'</script>";
        } else {
            echo "<script>alert('删除失败！');window.location.href='/Home/MemberShop/shop_list'</script>";
        }
    }
}
