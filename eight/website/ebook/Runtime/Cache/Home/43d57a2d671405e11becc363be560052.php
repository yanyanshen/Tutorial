<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单详情</title>
<meta name="keywords" content="标题">
<meta name="description" content="内容">
    <script src="/Public/Home/js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input, a');
    </script>
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/style1.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/public1.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/detail.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/jquery.jqzoom.css">
    <script type="text/javascript" src="/Public/Home/js1/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery.jqzoom-core.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery.bxslider_e88acd1b.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/menu.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/lrscroll_1.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/n_nav.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/milk_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/paper_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/baby_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/select.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/iban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/fban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/f_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/mban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/bban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/hban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/tban.js"></script>


<style type="text/css">
.ordersta01,.ordersta02,.ordersta03{ padding-left:80px!important;}
.ordersta01{ font-size:16px; font-weight:700; background:url(..//Public/Home/images/orderstate.png) no-repeat 35px 5px;}
.ordersta02{ color:#CCC}
.ordersta02 span{ color:#333; padding:0 5px;}
.ordersta02 span i{ color:#F7980A}
.ordersta03{ margin:10px 0 15px;}
.orderstaa01{ padding:5px 12px; background-color:#D80C18; color:#FFFFFF;}
.orderstaa02{ margin-left:20px; color:#88C6E2}
.orderproduct{}
.orderpro01{ height:40px; line-height:40px; background-color:#F7F7F7; border-bottom:1px solid #D9D9D9}
.orderpro01 span{height:40px; line-height:40px; padding:0 20px;}
.orderpro01 .orderprospan03{ border-right:0}
.orderpro01 span i{ color:#969696}
.orderprocon{ padding:0 20px 20px;}
.orderproinfo{ border-bottom:2px solid #E8E8E8!important}
.orderproinfo span{ font-size:14px; font-weight:700; display:inline-table; width:60px; text-align:center; height:35px; line-height:35px; border-bottom:2px solid #88C6E2; margin-bottom:-2px; color:#000!important;}
.orderprodiv{ padding:12px 0 22px;width:40%; padding-right:5%; float:left;}
.orderprodiv p{ height:35px; line-height:35px;}
.orderprodiv p span{ color:#969696; display:inline-table; width:60px; text-align:right; padding-right:20px;}
.orderinfomation{ width:100%; text-align:center}
.orderinfomation thead tr{ height:35px; line-height:35px; color:#969696; font-weight:700;}
.orderinfomation tbody td{ border:1px solid #E8E8E8;}
.orderdetitle{ width:30%; padding:10px 0;}
.orderdestate{ width:20%;}
.orderdejiage{ width:10%;}
.orderdesum{ width:10%;}
.orderdepinjia{ width:20%;}
.orderdezjia{ width:10%; }
.orderdezjia02{font-weight:700; font-size:14px;}
.orderdetitle img{ float:left;}
.orderdetitle p{ float:left; width:415px; padding:10px;}
.orderdetitle p a,.orderdestatguo{ color:#0088ff}
.orderdetitle p a:hover{ color:#D80C18}
.orderdestameiguo{ color:#F7980A}
.ordersumer{ background-color:#F7F7F7; border:1px solid #e8e8e8; text-align:right;padding-top:20px; padding-right:10px; height:50px; line-height:50px;}
.orderred{ color:#f00;}
.selmore{ padding-left:10px; color:#209FE0}
.wuliucon{position: absolute;left:0;;*top:20px;color:#666;color:#555;z-index:99999;text-align: left;top:180px;width:399px;background-color:#f8f8f8;color: #474747;padding-bottom: 10px;border: 1px solid #88C6E2;padding:15px 8px;display:none}
.wuliuconn{padding:4px;}
.wlconleft{float: left;}
.wlconright{float: left; padding-left:10px; width:160px;text-align: left;}
.wuliudiv{ border: 1px solid #f7980a;padding: 8px;}
.wuliuimg{margin-bottom: -1px;padding-left:95px;vertical-align: bottom;}
.wuliupp i{font-weight: 700;}
</style>
</head>

<body>
<!--  头部开始 -->
<div class="soubg">
    <div class="sou">
        <!--Begin 所在收货地区 Begin-->
    	    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                    <div class="s_city_t"></div>
                    <div class="s_city_c">
                        <h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>A</th>
                                <td class="c_h"><span>安徽</span><span>澳门</span></td>
                            </tr>
                            <tr>
                                <th>B</th>
                                <td class="c_h"><span>北京</span></td>
                            </tr>
                            <tr>
                                <th>C</th>
                                <td class="c_h"><span>重庆</span></td>
                            </tr>
                            <tr>
                                <th>F</th>
                                <td class="c_h"><span>福建</span></td>
                            </tr>
                            <tr>
                                <th>G</th>
                                <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                            </tr>
                            <tr>
                                <th>H</th>
                                <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                            </tr>
                            <tr>
                                <th>J</th>
                                <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                            </tr>
                            <tr>
                                <th>L</th>
                                <td class="c_h"><span>辽宁</span></td>
                            </tr>
                            <tr>
                                <th>N</th>
                                <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                            </tr>
                            <tr>
                                <th>Q</th>
                                <td class="c_h"><span>青海</span></td>
                            </tr>
                            <tr>
                                <th>S</th>
                                <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                            </tr>
                            <tr>
                                <th>T</th>
                                <td class="c_h"><span>台湾</span><span>天津</span></td>
                            </tr>
                            <tr>
                                <th>X</th>
                                <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                            </tr>
                            <tr>
                                <th>Y</th>
                                <td class="c_h"><span>云南</span></td>
                            </tr>
                            <tr>
                                <th>Z</th>
                                <td class="c_h"><span>浙江</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
        	<span class="fl">
                <?php if(session('mid')): ?>欢迎您，
                    <a href="<?php echo U('Home/MemberCenter/member_info');?>" style="color:#ff4e00;font-weight: bold">
                        <?=session('mname')?>
                    </a>
                    <?php else: ?>您还没有登录，请先
                    <a href="<?php echo U('Home/Login/login');?>" style="color:#ff4e00;">登录！</a>&nbsp;|&nbsp;
                    <a href="<?php echo U('Home/Login/register');?>" style="color:#ff4e00;">免费注册</a><?php endif; ?>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/MemberCenter/member_info');?>">会员中心</a>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/Login/logout');?>">安全退出</a>&nbsp;|
            </span>
            <span class="fr">&nbsp;<a href="#">手机版&nbsp;<img src="/Public/Home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
    <div class="search">
        <form>

            <input type="text" value="" placeholder="请输入搜索内容（书籍名/作者名）" class="s_ipt" />

            <input type="submit" value="搜索" class="s_btn" />
        </form>
        <span class="fl"> <a href="<?php echo U('Home/Detail/detail');?>">《小时代》|</a>
                <a href="#">《花醉三千》|</a>
                <a href="#">《奈何》|</a>
                <a href="#">云霓</a></span>
    </div>
    <div class="i_car">
        <div class="car_t">购物车 [ <span></span> ]</div>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="<?php echo U('Login/Login');?>" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>

                        <div class="img"><a href="#"><img src="/Public/Home/images/car1.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span></span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End-->
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->
        <div class="nav">
            <div class="nav_t">全部图书分类</div>
            <div class="leftNav none">
                <ul>
                    <?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <div class="fj">
                                <span class="n_img"><span></span><img src="" /></span>
                                <span class="fl"><?php echo ($vo[catename]); ?></span>
                            </div>
                            <div class="zj" style="top:-<?php echo ($key*40); ?>px">
                                <div class="zj_l">
                                    <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = $vo['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><div class="zj_l_c">
                                            <h2><?php echo ($v1["catename"]); ?></h2>
                                            <?php if(is_array($v1['third'])): $i = 0; $__LIST__ = $v1['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="#"><?php echo ($v2["catename"]); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>

                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="zj_r">
                                    <a href="#"><img src="/Public/Home/images//n_img1.jpg" width="236" height="200" /></a>
                                    <a href="#"><img src="_/Public/Home/images//n_img2.jpg" width="236" height="200" /></a>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--End 商品分类详情 End-->
        <ul class="menu_r">
            <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
            <li><a href="../web/web.html">特卖场</a></li>
            <li><a href="SuitDress.html">最新特价</a></li>
            <li><a href="MakeUp.html">特价精选</a></li>
            <li><a href="Digital.html">淘书会</a></li>
            <li><a href="GroupBuying.html">排行榜</a></li>
        </ul>
            </div>
        </div>
    </div>
<!-- 头部结束 -->
<div class="buyerbox box">
		<div class="orderprocon">
		  <div class="clearfix" style="width:100%;">
			<div class="orderprodiv clearfix">
                <p class="orderproinfo"><span>订单信息</span></p>
				<p><span>订单状态：</span><em class="orderred">待付款</em></p>
				<p><span>订单号：</span>12566889554456</p>
				<p><span>下单时间：</span>2015-2-21</p>
			</div>
            
			<div class="orderprodiv clearfix" style="position:relative">
                <p class="orderproinfo orderproinfo001"><span>收货信息</span></p>
				<p><span>收货地址：</span>河南省郑州市高新区电子商务中心</p>
				<p><span>收货人：</span>张三</p>
				<p><span>联系方式：</span>15237150303</p>
			</div>
           </div>
           	<p class="orderproinfo"><span>支付方式</span></p>
           	<div style="padding:30px 0;">
           	<form action="">
           		<input type="radio" checked name="paytype" id="hdfk" style="width:18px;vertical-align:middle"/>货到付款
           		<input type="radio"  name="paytype" id="alipay" style="width:18px;vertical-align:middle"/>支付宝支付
           		<input type="radio"  name="paytype" id="wxpay" style="width:18px;vertical-align:middle"/>微信支付
           	</form>
           	</div>
            <form action="<?php echo U('Home/Detail/orderDetail');?>">
			<p class="orderproinfo"><span>商品信息</span></p>
			<table class="orderinfomation" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th class="orderdetitle">商品名称</th>						
						<th class="orderdejiage">单价（元）</th>
						<th class="orderdesum">总量（件）</th>
						<th class="orderdezjia">商品总价</th>
					</tr>
				</thead>
				<tbody>

					<tr>
                        <?php if(is_array($orderDetail)): $i = 0; $__LIST__ = $orderDetail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td class="orderdetitle" style="text-align:left;">
							<img style="width:60px;vertical-align:middle" src="/Uploads/<?php echo ($v['pic']); ?>" />
							<p><a href="#"><?php echo ($v['goodsname']); ?></a></p>
						</td>					
						<td class="orderdejiage"><?php echo ($v['price']); ?></td>
						<td class="orderdesum"><?php echo ($v['number']); ?></td>
						<td class="orderdezjia"></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="ordersumer" id="buy">
				商品总价:￥20 + 运费:￥10 = 实付款<span style="color:red;font-size:20px;">￥918.88</span><a class="tobuy">提交定单</a>
			</div>
	</form>
            </div>
</div>
    <div style="clear:both;"></div>
<!-- 尾部开始 -->
<div class="b_btm_bg bg_color">
    <div class="b_btm"  >
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b1.png" width="62" height="62"  /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
            </tr>
        </table>
    </div>
</div>
<div class="b_nav">
    <dl>
        <dt><a href="#">新手上路</a></dt>
        <dd><a href="#">售后流程</a></dd>
        <dd><a href="#">购物流程</a></dd>
        <dd><a href="#">订购方式</a></dd>
        <dd><a href="#">隐私声明</a></dd>
        <dd><a href="#">推荐分享说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">配送与支付</a></dt>
        <dd><a href="#">货到付款区域</a></dd>
        <dd><a href="#">配送支付查询</a></dd>
        <dd><a href="#">支付方式说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">会员中心</a></dt>
        <dd><a href="#">资金管理</a></dd>
        <dd><a href="#">我的收藏</a></dd>
        <dd><a href="#">我的订单</a></dd>
    </dl>
    <dl>
        <dt><a href="#">服务保证</a></dt>
        <dd><a href="#">退换货原则</a></dd>
        <dd><a href="#">售后服务保证</a></dd>
        <dd><a href="#">产品质量保证</a></dd>
    </dl>
    <dl>
        <dt><a href="#">联系我们</a></dt>
        <dd><a href="#">网站故障报告</a></dd>
        <dd><a href="#">购物咨询</a></dd>
        <dd><a href="#">投诉与建议</a></dd>
    </dl>
    <div class="b_tel_bg">
        <a href="#" class="b_sh1">新浪微博</a>
        <a href="#" class="b_sh2">腾讯微博</a>
        <p>
            服务热线：<br />
            <span>400-123-4567</span>
        </p>
    </div>
    <div class="b_er">
        <div class="b_er_c"><img src="/Public/Home/images//er.gif" width="118" height="118" /></div>
        <img src="/Public/Home/images//ss.png" />
    </div>
</div>
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/Public/Home/images//b_1.gif" width="98" height="33" /><img src="/Public/Home/images//b_2.gif" width="98" height="33" /><img src="/Public/Home/images//b_3.gif" width="98" height="33" /><img src="/Public/Home/images//b_4.gif" width="98" height="33" /><img src="/Public/Home/images//b_5.gif" width="98" height="33" /><img src="/Public/Home/images//b_6.gif" width="98" height="33" />
    </div>
</div>
<!--End Footer End -->
</div>

</body>


</html>


<!-- 尾部结束 -->
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop">返回顶部</a>
<!--返回顶部结束-->
</body>

</html>