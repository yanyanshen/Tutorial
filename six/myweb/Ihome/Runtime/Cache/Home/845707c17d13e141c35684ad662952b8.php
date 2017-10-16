<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Home/style/reset.css">
	<link rel="stylesheet" href="/Public/Home/style/affirm.css">
	<script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/click.js"></script>
	<title>确认信息</title>
</head>
<body>

<!--  顶部开始 --> 
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临苗家频道！</a></p>
        <ul class="fr">
            <li><a href="../Member/password.html"><span>叶叶 </span></a></li>
            <li><a href="#">退出</a>|</li>
            <li><a href="../Member/member.html">会员中心</a>|</li>
            <li><a href="../Member/order.html">我的订单</a>|</li>
            <li><a href="../Member/denglu.html">消息[<span>1</span>]</a>|</li>
            <li class="l1"><a href="#">网站导航</a></li>
        </ul>
    </div>
</div>


<!--  导航搜索栏 -->
<div class="logo frm_sty clearfix">
    <a href="../Index/index.html"><img src="/Public/Home/images/logo.png" alt=""></a>
    <h3 class="fl">确认信息</h3>
    <ul class="fr">
        <li class="li01"><a href="shopping.html">我的购物车</a></li>
        <li class="li02"><a href="affirm.html">填写核对结算信息</a></li>
        <li class="li03"><a href=" #">成功提交订单</a></li>
    </ul>
</div>
<i></i>


<div class="title frm_sty">
	<h3>填写并核对订单信息</h3>
</div>
<div class="car frm_sty clearfix">
<!-- 收货人信息  开始 -->
	<div class="site">
		<div class="title clearfix">
			<h3 class="fl">收货人信息</h3>
			<!-- <span class="fr"><a href="#">新增收货地址</a></span> -->
		</div>
		<div class="siteCont clearfix">
			<div class="show"><a href="javascript:void(0);">新增收货地址</a></div>
			<p class="p1"><a href="#">叶叶</a></p>
			<p class="p2">河南省 郑州市 高新区 冬青街 26号 18699053882</p>
			<p class="p3"><a href="#">默认地址</a></p><br/>
			<h4><a href="#">更多地址 ∨</a></h4>
		</div>
	</div>


    <div class="overlay"></div>
<div class="pop">
        <h3><a href="javascript:void(0);">
        <img src="/Public/Home/images/gb_btn.png" alt="关闭" style="margin-top: 17px;">
        </a>收货人信息
        </h3>
    <div class="form clearfix">
        <p>收货人姓名:<input type="text" id="user"></p>
        <p class="p2"><span>收货地址:</span>
        	<select name="shengfen" id="shengfen">
				<option value="1">中国</option>
			<!--<option value="2">上海</option>
				 <option value="3">北京</option>
				<option value="4">上海</option> -->
			</select>
			<select name="shengfen" id="shengfen">
				<option value="1">河南省</option>
			<!--<option value="2">上海</option>
				<option value="3">北京</option>
				<option value="4">上海</option> -->
			</select>
			<select name="shengfen" id="shengfen">
				<option value="1">郑州市</option>
			<!--<option value="2">上海</option>
				 <option value="3">北京</option>
				<option value="4">上海</option> -->
			</select>
			<select name="shengfen" id="shengfen">
				<option value="1">高新区</option>
			<!--<option value="2">上海</option>
				 <option value="3">北京</option>
				<option value="4">上海</option> -->
			</select>
        </p>
        <p><input type="text" id="user" value="详情街道 楼层号"></p>
        <p>手机号:<input type="text" id="user"></p>
        <p>邮编:<input type="text" id="user"></p>
        <p class="p1"><input name="checkbox" type="checkbox" id="checkbox" />默认</p>
        <button>使用并保存</button>

    </div>
        <!-- <p class="popTips">您的优惠快到期了！！！！</p> -->
        <!-- <p><input type="button" value="登录"><input type="button" value="注册"></p> -->
</div>

	
<!-- 收货人信息  结束-->
<!-- 支付方式 开始 -->
	<div class="way">
		<div class="title clearfix">
			<h3 class="fl">支付方式</h3>
		</div>
		<div class="wayCont">
			<ul>
					<li>在线支付</li>
					<li>网上银行</li>
					<li>货到付款</li>
					<li>账户余额</li>
			</ul>	
		</div>
	</div>
<!-- 支付方式 结束 -->
<!-- 送货清单 开始 -->
	<div class="opt clearfix">
		<div class="title clearfix">
			<h3 class="fl">送货清单</h3>
			<span class="fr"><a href="#">返回购物车修改</a></span>
		</div>
		<div class="optCont fl clearfix">
			<h3>配送方式</h3>
			<ul>
				<li>快递运输</li>
				<li>顺风速递</li>
				<li>韵达快递</li>
				<li>中通快递</li>
				<li>圆通速递</li>
				<li>申通快递</li>
				<li>国通快递</li>
				<li>默认配送</li>
			</ul>	
			</div>
			<div class="goods01 fl">
				<h3 class="fl"><a href="#">农家柴火烟熏宝庆猪血丸子真空包装猪血粑血豆腐</a></h3>
				<p class="p1"><a href="#"><span>￥6:00</span></a></p>
				<p class="p2"><a href="#"><span>×1</span></a></p>
				<p class="p3"><a href="#">有货</a></p>
			</div>
			<div class="goods02 fl">
				<h3 class="fl"><a href="#">农家柴火烟熏报请猪血丸子真空包装猪血粑血豆腐</a></h3>
				<p class="p1"><a href="#"><span>￥6:00</span></a></p>
				<p class="p2"><a href="#"><span>×1</span></a></p>
				<p class="p3"><a href="#">有货</a></p>
			</div>
	</div>
<!-- 送货清单 结束 -->
<!-- 发票信息 开始 -->
	<div class="invoice">
		<div class="title">
			<h3>发票信息</h3>
		</div>
		<div class="invoiceCont">
			<p class="fl">公司名称:</p>
			<input name="user" type="text" id="user">
			<span><a href="#">修改</a></span>
		</div>
	</div>
<!-- 发票信息 结束 -->
</div>

<!-- 优惠劵 开始 -->
<div class="privilege frm_sty clearfix">
	<div class="privilegeCont fr ">
		<p><span>2 </span>件 商品总金额： ￥12.00</p>
		<p class="p2">返现： -￥0.00</p>
		<p class="p3">运费： ￥0.00</p>
	</div>
	<span><a href="#">使用优惠卷</a></span>
</div>
<!-- 优惠劵 结束 -->
<!-- 总金额 开始 -->
<div class="rental frm_sty">
	<div class="rentalCont fr">
		<h3>应付金额:<span>￥12.00</span></h3>
		<p>配送至：河南省郑州市高新区长春路冬青街 26号 收货人：叶叶 18699053882</p>
	</div>
</div>
<!-- 总金额 结束 -->
<!-- 提交按钮 开始 -->
<!-- 提交按钮 结束 -->
<div class="btn frm_sty">
	<button class="fr">提交订单</button>
</div>



<!-- 底部 开始 -->
<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>苗家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 苗家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
        
    </div>
</div>
<!-- 底部结束 -->
</body>
</html>