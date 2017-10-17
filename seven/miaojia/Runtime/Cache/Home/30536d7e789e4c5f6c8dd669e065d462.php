<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Home/style/reset.css">
	<link rel="stylesheet" href="/Public/Home/style/affirm.css">
	<script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/click.js"></script>
	<script type="text/javascript" src="/Public/Home/js/geo.js"></script>
	<script type="text/javascript" src="/Public/Home/js/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript">
        function promptinfo(){
            var address = document.getElementById('address');
            var s1 = document.getElementById('s1');
            var s2 = document.getElementById('s2');
            var s3 = document.getElementById('s3');
            address.value = s1.value + s2.value + s3.value;
        }
        $(function(){
            $("#submit").click(function(){
                $("#form3").submit(false);
                $("#address").val($("#address").val()+$("#ls_address").val());
                $("#form3").ajaxSubmit(function(res){
                    layer.msg(res,{
                        icon:1,
                        time:2000
                    },function(){
                        $(".overlay").hide();
                        $(".pop").hide();
                        location.reload();
                    })
                })
            });

            $("#gotocart").click(function(){
                <?php if(session('username')?1:0): ?>location.href="<?php echo u('Cart/shopping');?>";
                <?php else: ?>
                layer.confirm('您尚未登录，请登录后进行购物车相关操作!',{
                    btn:['登录','返回']
                },function(){
                    location.href="<?php echo u('User/login');?>";
                },function(){
                    layer.tips('如果您喜欢网站的商品，请点击这里登录后进行操作','#login',{
                        tips: [1, '#3595CC'],
                        time: 5000
                    });
                });<?php endif; ?>
            });

            $("#backToCart").click(function(){
                location.href="<?php echo u('Cart/shopping');?>";
            })
            $("#fr").click(function(){
                if($(".shaddress").length>0){
                    $.ajax({
                        url:"<?php echo u('addCartToOrder');?>",
                        data:"address="+$("#orderaddress").text(),
                        type:"post",
                        success:function(data){
                            if(data=='订单生成成功'){
                                layer.msg(data+'正在跳转到个人中心',{
                                    icon:1,
                                    time:4000
                                },function(){
                                    location.href="<?php echo u('User/member');?>";
                                })
                            }else{
                                layer.msg(data);
                            }
                        }
                    })
                }else{
                    layer.msg("请先添加收货地址再提交订单!");
                }

            })
        })
    </script>

	<title>确认信息</title>
</head>
<body>

<!--  顶部开始 --> 
<div class="header">
    <div class="headerCont frm_sty clearfix">
        <p>欢迎光临<?php echo C('WEB_NAME');?>！</p>
        <p class="tel"><?php echo C('WEB_TEL');?></p>
        <a href="#">帮助中心</a>
        <?php if(session('username')?1:0): ?><a href="javascript:void(0)" id="safe_logout">安全退出</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">会员中心</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">用户名:<?php echo (session('username')); ?></a>
            <?php else: ?>
            <a href="<?php echo u('User/register');?>">注册</a>
            <a href="<?php echo u('User/login');?>" id="login">登录</a><?php endif; ?>
    </div>
</div>
<!-- 导航搜索栏 -->
<div class="search">
    <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
        <h1 class="fl"><a href="<?php echo u('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" alt=""></a></h1>
        <div class="bd fl">
            <form action="<?php echo u('Goods/goodsList');?>" method="post" id="searchForm">
                <select class="op">
                    <option value="商品">商品</option>
                    <!--<option value="店铺">店铺</option>-->
                </select>
                <input name="goodsname" type="text" class="msg" placeholder="搜索商品名称" value="<?php echo ($goodsname); ?>">
                <!-- <input class="btn" type="submit" value="搜索"/> -->
            </form>
            <a href="#" class="btn fl" id="goodsSearch">搜索</a><!--
            <p class="msg1">
                <a href="#">干笋 |</a>
                <a href="#">腊肉 |</a>
                <a href="#">银耳环 |</a>
                <a href="#">糯米糕</a>
            </p>-->
        </div>
        <div class="buy clearfix">
            <span class="fl">1</span>
            <a class="fl" href="javascript:void (0);" id="gotocart">购物车(<?php echo ($cartCount); ?>)</a>
            <!-- <p class="fl"></p> -->
        </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <?php if(is_array($firstCate)): $i = 0; $__LIST__ = array_slice($firstCate,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="menu1">
                            <h4><?php echo (mb_substr($vo["catename"],0,10,'UTF-8')); ?></h4>
                            <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo1['id']));?>"><?php echo (mb_substr($vo1["catename"],0,3,'UTF-8')); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="submenu">
                                <h4><?php echo ($vo["catename"]); ?></h4>
                                <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1["catename"]); ?></p>
                                    <?php if(is_array($vo1['third'])): $i = 0; $__LIST__ = array_slice($vo1['third'],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo2['id']));?>"><?php echo ($vo2["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                <!--<img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>-->
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo u('Index/index');?>">首页</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>1));?>">生鲜</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>2));?>">食品饮料</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>3));?>">酒类</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>4));?>">地方特产</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>5));?>">全球购美食</a></li>
            </ul>
        </div>

    </div>
</div>

<script type="text/javascript">
    $("#goodsSearch").click(function(){
        if($("input[name=goodsname]").val().length<1){
            layer.msg("搜索商品名称不能为空");
        }else{
            $("#searchForm").submit();
        }
    })

</script>


<div class="title frm_sty">
	<h3>填写并核对订单信息</h3>
</div>
<div class="car frm_sty clearfix">
<!-- 收货人信息  开始 -->
	<div class="site">
		<div class="title clearfix">
			<h3 class="fl">收货人信息</h3>
		</div>
		<div class="siteCont clearfix">
            <div class="show"><a href="javascript:void(0);">新增收货地址</a></div>
            <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="shaddress">
                    <p><a href="javascript:void (0)"><?php echo ($vo["name"]); ?></a></p>
                    <p class="p2"><?php echo ($vo["address"]); ?>&nbsp;&nbsp;手机号:<?php echo ($vo["tel"]); ?></p>
                    <!--<p class="p3"><?php if(($vo["default"]) == "1"): ?>默认地址<?php else: ?><a href="javascript:void(0)">设为默认</a><?php endif; ?></p>-->
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>


    <div class="overlay"></div>
<div class="pop">
        <h3><a href="javascript:void(0);">
        <img src="/Public/Home/images/gb_btn.png" alt="关闭" style="margin-top: 17px;">
        </a>收货人信息
        </h3>
    <form action="<?php echo u('User/addAddress');?>" method="post" id="form3">
        <input type="hidden" name="uid" value="<?php echo (session('uid')); ?>"/>
        <div class="form clearfix">
            <p>收货人姓名:<input type="text" class="user" name="name"></p>
            <p class="p2"><span>收货地址:</span>
                <select class="shengfen">
                    <option value="1">中国</option>
                </select>
                <select class="shengfen" id="s1">
                </select>
                <select class="shengfen" id="s2">
                </select>
                <select class="shengfen" id="s3">
                </select>
            </p>
            <p><input type="text" id="ls_address" class="user" placeholder="详情街道 楼层号"><input type="hidden" name="address" id="address"/></p>
            <p>手机号:<input type="text" class="user" name="tel"></p>
            <p>邮编:<input type="text" class="user" name="code"></p>
            <p class="p1"></p>
            <button id="submit">使用并保存</button>
        </div>
    </form>
</div>

	
<!-- 收货人信息  结束-->
<!-- 支付方式 开始 -->
	<!--<div class="way">
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
	</div>-->
<!-- 支付方式 结束 -->
<!-- 送货清单 开始 -->
	<div class="opt clearfix">
		<div class="title clearfix">
			<h3 class="fl">送货清单</h3>
			<span class="fr"><a href="javascript:void (0)" id="backToCart">返回购物车修改</a></span>
		</div>
        <?php if(is_array($cartList)): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goods01 fl">
                <h3 class="fl"><img src="/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["goods"]["image"]) && ($vo["goods"]["image"] !== ""))?($vo["goods"]["image"]):'default.jpg'))); ?>"/>&nbsp;&nbsp;<a href="<?php echo u('Goods/detail',array('id'=>$vo['goods']['id']));?>" target="_blank"><?php echo ($vo["goods"]["goodsname"]); ?>&nbsp;&nbsp;<?php echo ($vo["goodsargs"]); ?></a></h3>
                <p class="p1"><a href="#"><span>￥<?php echo ($vo['buynum'] * $vo['goods']['siteprice']); ?></span></a></p>
                <p class="p2"><a href="#"><span>×<?php echo ($vo["buynum"]); ?></span></a></p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
<!-- 送货清单 结束 -->
</div>
<!-- 总金额 开始 -->
<div class="rental frm_sty">
	<div class="rentalCont fr">
		<h3>应付金额:<span>￥<?php echo ($cartList["0"]["prices"]); ?></span></h3><br/><br/><br/>
		<p>配送至：<span id="orderaddress"></span></p>
	</div>
</div>
<!-- 总金额 结束 -->
<!-- 提交按钮 开始 -->
<!-- 提交按钮 结束 -->
<div class="btn frm_sty">
	<button class="fr" id="fr">提交订单</button>
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
        <p>Copyright © 2016-2028 <?php echo C('WEB_NAME');?>版权所有 <?php echo C('WEB_ICP');?></p>

    </div>
</div>
<!-- 底部结束 -->
</body>
</html>