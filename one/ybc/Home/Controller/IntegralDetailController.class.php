<?php
namespace Home\Controller;
use Think\Controller;
class IntegralDetailController extends Controller{
    public function integralDetail(){
        //---------根据商品的id从goods商品表中读取相应数据-----------
        $id = I('get.id');
        $mid = session('ybc_id');
        $goods = M('Goods_integral');
        $goodsInfo = $goods->field('goodsname,pic,price,points,salenum')->where(array('id' => $id))->select();
        $this->assign('gid', $id);
        $this->assign('goodsInfo', $goodsInfo);
        //-----------从goodsPic表中获取商品图片信息--------
        $goodsPic = M('Goods_pic_integral')->field('picname')->where(array('gid' => $id))->select();
        //从订单商品表中读取商品的销售数量
        $sale=M('order_goods_integral');
        $sum=$sale->where(array('gid'=>$id))->count();
        $this->assign('sum',$sum);
        $this->assign('goodsPic', $goodsPic);
        $this->display();
    }
    public function buy(){
        if(IS_POST){
            $gid=I('post.gid');
            if(session('ybc_id')){
                    $this->success('生成订单');
            }else{
                session('url',U('IntegralDetail/integralDetail?id='.$gid));
                $this->error('未登录');
            }
        }
    }
    public function points(){
        $gid=I('post.gid');
        $points=M('Member')->where(array('id'=>session('ybc_id')))->field('points')->find();
        $goodspoints=M('goods_integral')->where(array('id'=>$gid))->field('points')->find();
        if($points['points'] > $goodspoints['points']){
            $this->success('生成订单');
        }else{
            $this->error('您的积分不足，赶快去获取积分吧');
        }
    }
}