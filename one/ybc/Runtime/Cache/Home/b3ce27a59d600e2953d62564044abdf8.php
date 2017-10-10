<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
    <link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/Home/css/font-awesome-ie7.min.css">
    <![endif]-->
    <title>确认订单信息</title>

</head>
<style>
    a:hover{
        color: #ff8800;
    }
</style>
<script type="text/javascript">
    $(function(){
        $("#payBtn").click(function(){
            $.post("<?php echo U('IntegralOrder/submit');?>",{oid:<?php echo ($oid); ?>},function(res){
                if(res.status==1){
                    location="<?php echo U('integralPaySuccess');?>?oid=<?php echo ($oid); ?>"
                }else{
                    layer.msg(res.info,{icon:5,time:1000});
                }
            })
        })
    })
</script>
<script>
    $(function(){
        $('#cancelbtn').click(function(){
            $.post("<?php echo U('IntegralOrder/cancelOrder');?>",{oid:<?php echo ($oid); ?>},function(res){
                if(res.status==1){
                    layer.msg(res.info,{icon:6,time:1000},function(){
                        location=res.url;
                    })
                }else{
                    layer.msg(res.info,{icon:5,time:1000},function(){
                        location="<?php echo U('IntegralOrder/integralOrder');?>";
                    });
                }
            })
        })
    })
</script>
<!--宽度1000的购物车样式-->
<body>
<div id="top">
    <div class="carts">
        <div class="Collection"><em></em><a href="#">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <?php if(!isset($_SESSION['ybc_id'])): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                    <?php else: ?>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('UserCenter/usercenter');?>" class="red">[<?php echo (session('ybc_username')); ?>]</a><a href="<?php echo U('Login/logout');?>" class="red">[退出登录]</a></li><?php endif; ?>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Order/myOrderList');?>">我的订单</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>">购物车(<b>0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">联系我们</a></li>
                <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
                    <div class="hd_menu_list">
                        <ul>
                            <li><a href="http://www.zuipin.cn/4010653124.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">常见问题</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_service.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h3" target="_blank">在线退换货</a></li>
                            <li><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju">媒体报道</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_shipment.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h2" target="_blank">配送范围</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="shop_cart">
    <div id="header">
        <div class="logo">
            <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
            <div class="phone">
                免费咨询热线:<span class="telephone">400-3454-343</span>
            </div>
        </div>
        <div class="Search">
            <form action="<?php echo U('Goodslist/index');?>">
                <p>
                    <input name="keywords" type="text"  value="<?php echo ($keywords); ?>" class="text"/><input name="" type="submit" value="" class="Search_btn"/>
                </p>
            </form>
            <p class="Words">
                <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><?php echo ($val['catename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
    </div>
    <!--提示购物步骤-->


    <!--订单详情-->
    <div id="Orders" class="Inside_pages  clearfix" style="width: 100%">
        <div class="Orders_style clearfix">
            <div class="address clearfix">
                <div class="title">收货人信息</div>
                <div class="adderss_list clearfix">
                    <div class="title_name">选择收货地址 <a href="<?php echo U('IntegralOrder/selectAddr');?>?oid=<?php echo ($orderInfo["id"]); ?>" style="color: #ff005d;">更改收货信息</a></div>

                    <div class="Shipping_address">
                        <ul class="detailed">

                                <li><label>收货人姓名</label><span><?php echo ($userInfo["name"]); ?></span></li>
                                <li><label>详细地址</label><span><?php echo ($userInfo["address"]); ?></span></li>
                                <li><label>邮政编码</label><span><?php echo ($userInfo["postcode"]); ?></span></li>
                                <li><label>联系电话</label><span><?php echo ($userInfo["phone"]); ?></span></li>

                            </if>
                        </ul>
                    </div>
                </div>

                <div class="title">订单信息</div>
                <div class="adderss_list clearfix">

                    <div class="Shipping_address">
                        <ul class="detailed">

                                <li><label>订单编号</label><span><?php echo ($orderInfo["ordersyn"]); ?></span></li>
                                <li><label>订单状态</label><span><?php echo ($orderInfo["status"]); ?></span></li>
                                <li><label>订单时间</label><span><?php echo date("Y-m-d H:i:s",$orderInfo['addtime']);?></span></li>
                                <li><label>订单积分</label><span><?php echo ($orderInfo["orderpoints"]); ?>积分</span></li>


                        </ul>
                    </div>
                </div>

                <form class="form" method="post">
                    <fieldset>

                        <!--付款方式-->

                        <!--产品列表-->
                        <div class="Product_List">
                            <table>
                                <thead><tr class="title"><td class="name">商品名称</td><td class="price">商品价值</td>
                                    <td class="Quantity">商品积分</td></tr></thead>
                                <tbody>

                                    <tr valign="middle">
                                        <td  class="Product_info">
                                            <div style="display: inline;"><a href="<?php echo U('IntegralDetail/integralDetail');?>?id=<?php echo ($goodsInfo["id"]); ?>"><img src="/Uploads/integralGoodsPic/100/100_<?php echo ($goodsInfo["pic"]); ?>" width="100px" height="100px"/></a></div>
                                            <div style="display: inline;"><a href="<?php echo U('IntegralDetail/integralDetail');?>?id=<?php echo ($goodsInfo["id"]); ?>" class="product_name"><?php echo ($goodsInfo["goodsname"]); ?></a></div>
                                        </td>
                                        <td><i>￥</i><?php echo ($goodsInfo["price"]); ?></td>
                                        <td><?php echo ($goodsInfo["points"]); ?>积分</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="price_style">
                                <div class="right_direction" style="width: 300px;">
                                    <ul style="width: 150px;">
                                        <li><label>商品总价</label><span><?php echo ($goodsInfo["points"]); ?>积分</span></li>
                                        <li><label>支付方式</label><span>积分支付</span></li>
                                        <li><label>配送费&nbsp;</label><i>包邮</i>
                                    </ul>
                                    <?php if(($orderInfo['orderstatus'] != 1)): ?><div class="btn" style="width: 320px"><a href="<?php echo U('UserCenter/userintegral');?>"><input id="return" style="background-image:none;border: 1px solid #ccc;background-color: #ff131a" type="button" value="返回" class="submit_btn"/></a></div>
                                        <?php else: ?>
                                    <div class="btn" style="width: 320px"><input id="cancelbtn" style="background-image:none;border: 1px solid #ccc;background-color: #ff131a;width: 125px" type="button" value="取消订单" class="submit_btn"/><input id="payBtn" style="width:125px;background-image:none;border: 1px solid #ccc;background-color: #ff131a" type="button" value="支付订单" class="submit_btn"/></div><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!--友情链接-->
        <div class="Links">
            <div class="link_title">友情链接</div>
            <div class="link_address"><a href="#">四川茶叶协会</a>  <a href="#">链接地址</a>  <a href="#">链接地址</a>  <a href="#">链接地址 </a>   <a href="#">链接地址</a> <a href="#">链接地址</a> <a href="#">链接地址</a></div>
        </div>
    </div>

    <!--底部样式-->
    <div class="footer help-box  clearfix">
        <div class="right_footer clearfix">
            <dl>
                <dt><em class="icon_img"></em>购物指南</dt>
                <dd><a href="#">怎样购物</a></dd>
                <dd><a href="#">积分政策</a></dd>
                <dd><a href="#">会员优惠</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">快递资费及送达时间</a></dd>
                <dd><a href="#">快递覆盖地区查询</a></dd>
                <dd><a href="#">验货与签收</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">货到付款</a></dd>
                <dd><a href="#">支付宝</a></dd>
                <dd><a href="#">财付通</a></dd>
                <dd><a href="#">网银支付</a></dd>
                <dd><a href="#">银联支付</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>售后服务</dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">退换货要求与运费规则</a></dd>
                <dd><a href="#">退换货流程</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>关于我们</dt>
                <dd><a href="#">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
        <div class="Copyright">
            <p><a href="#">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
            <p>Copyright 2010 - 2015 巴山雀舌 四川巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
            <p>川ICP备10200063号-1</p>
            <a href="#" class="return_img"></a>
        </div>
    </div>

    <!--结束-->
</div>
</body>
</html>