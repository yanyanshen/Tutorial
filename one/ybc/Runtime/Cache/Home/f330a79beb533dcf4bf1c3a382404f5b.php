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
    <style type="text/css">
        .middle{ width: 100%;height: 300px;}
        .middle ul{ float: left;margin-left: 30px;margin-top: 30px;}
        .middle ul li{ margin: 10px; font-size: 16px;}
    </style>
</head>

<script type="text/javascript">
    jQuery.fn.addFavorite = function(l, h) {
        return this.click(function() {
            var t = jQuery(this);
            if(jQuery.browser.msie) {
                window.external.addFavorite(h, l);
            } else if (jQuery.browser.mozilla || jQuery.browser.opera) {
                t.attr("rel", "sidebar");
                t.attr("title", l);
                t.attr("href", h);
            } else {
                layer.alert("浏览器不支持，请使用Ctrl+D将本页加入收藏夹！",{title:"提示",icon:7});
            }
        });
    };
    $(function(){
        $('#fav').addFavorite(document.title,location.href);
    });


</script>
<!--宽度1000的购物车样式-->
<body>
<div id="top">
    <div class="carts">
        <div class="Collection"><em></em> <a href="javascript:;" title="加入收藏" id="fav">加入收藏</a></div>
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

    <div class="prompt_step">
        <img src="/Public/Home/images/cart_step_03.png" />
    </div>
    <!--订单详情-->
<div class="middle">
    <img src="/Public/Home/images/success.jpg" alt="订单提交成功" height="200" style="float: left; margin-top: 30px;"/>
    <ul>
        <li><h1>您已成功提交订单！</h1></li>
        <li>订单编号：<?php echo ($order["ordersyn"]); ?></li>
        <li>本次应付：<span style="color: #ee0000">￥<?php echo ($order["orderprice"]); ?></span></li>
        <li>交货方式：送货</li>
        <li>支付方式：<?php echo ($order['paymethod']==1?'货到付款':''); echo ($order['paymethod']==2?'支付宝':''); echo ($order['paymethod']==3?'微信支付':''); ?></li>
    </ul>
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
        </div>
    </div>

    <!--结束-->
</div>
</body>
</html>