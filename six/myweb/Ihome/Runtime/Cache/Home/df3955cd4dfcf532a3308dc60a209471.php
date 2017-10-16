<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Home/style/reset.css">
	<link rel="stylesheet" href="/Public/Home/style/member.css">
	<script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/carousel.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
	<title>我的订单</title>
    <style>
        .myShopCar1{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
        .carlist{position: absolute;width:450px;padding:10px;background: #fff;left:1302px;top:125px;border:1px solid #F1F1F1;display:none;z-index:999;  }
        #goodslist dd{position:relative;float:left;margin-left: 8px;}
        #myShopCar{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
    </style>
</head>
<body>
<!--  顶部开始 --> 
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家频道！</a></p>
        <ul class="fr">
            <li><a href="userinfo.html"><?php echo (session('membername')); ?></a></li>
            <li><a href="javascript:logout()">退出</a>|</li>
            <li><a href="<?php echo u('Member/member');?>"><span>会员中心</span></a>|</li>
            <li><a href="<?php echo u('Member/order');?>">我的订单</a></li>
        </ul>
    </div>
</div>
    <!-- 导航搜索栏 -->
    <div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
            <div class="bd fl">
                <!--<form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">-->
                    <!--<input name="searchwords" type="text" class="msg"  value="" placeholder="家具">-->
                    <!--<a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>-->
                <!--</form>-->
                <!--<p class="msg1">-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">儿童家具 |</a>-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">户外 |</a>-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">沙发</a>-->
                <!--</p>-->
            </div>
            <!--<div class="buy clearfix">-->
                <!--<span class="fl">1</span>-->
                <!--<a class="fl" id='mycart' href="<?php echo U('Home/Cart/showcart');?>">购物车</a>-->
                <!--<div class="carlist">-->
                    <!--<dl id="goodslist" style="font-size: 15px">-->
                        <!--<dt>商品名称</dt>-->
                        <!--<dd>商品图片</dd>-->
                        <!--<dd>购买数量</dd>-->
                        <!--<dd>价钱</dd>-->
                    <!--</dl>-->
                <!--</div>-->
            <!--</div>-->
    </div>

    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <?php if(is_array($firstlist)): $i = 0; $__LIST__ = $firstlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="menu1" id="list">
                            <h4><?php echo ($value["catename"]); ?></h4>
                            <?php if(is_array($value['second'])): $i = 0; $__LIST__ = array_slice($value['second'],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="#"><?php echo ($val["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="submenu">
                                <h4><?php echo ($value["catename"]); ?></h4>
                                <?php if(is_array($value['second'])): $i = 0; $__LIST__ = $value['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p><?php echo ($val["catename"]); ?></p>
                                    <?php if(is_array($val['third'])): $i = 0; $__LIST__ = $val['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/search');?>?cid=<?php echo ($v["cid"]); ?>"><?php echo ($v["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                <!--<li><a href="#f1">卧室家具</a></li>-->
                <!--<li><a href="#f2">儿童家具</a></li>-->
                <!--<li><a href="#">书房家具</a></li>-->
                <!--<li><a href="#">阳台户外</a></li>-->
                <!--<li><a href="#">热销商品</a></li>-->
            </ul>
        </div>
     
    </div>
</div>
       
<!-- 导航开始 -->
<div class="car clearfix frm_sty">
	<div class="sidebar frm_sty">
	<!-- 侧边栏导航 结束 -->
		<ul class="fl">
			<li class="li01" style="background: #f1f1f1;"><a href="#"><span>全部功能</span></a></li>
			<li class="no"><a href="<?php echo U('Home/Member/member');?>">会员中心</a></li>
			<li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
            <li><a href="<?php echo U('Home/Member/userInfo');?>">个人信息</a></li>
			<li><a href="<?php echo U('Home/Member/adress');?>">收货地址</a></li>
		</ul>	
	</div>
	<!-- 侧边栏导航 结束 -->
	<div class="manage fl" style="height:700px">
	<!-- 账户信息 开始 -->
        <div class="account">
            <h3>你好<a href="#"><span><?php echo (session('membername')); ?></span></a>，欢迎登录会员中心</h3>
            <ul>
                <li>&nbsp;</li>
                <!--<li class="li04"><a href="#">待付款（<span>0</span>）</a></li>-->
                <!--<li class="li05"><a href="#">待收货（<span>0</span>）</a></li>-->
                <!--<li class="li06"><a href="#">待评价（<span>0</span>）</a></li>-->
                <!--<li><a href="#">账户余额:<span>￥0:00</span></a></li>-->
            </ul>
        </div>
	<!-- 账户信息 结束 -->
	<!-- 我的关注 开始 -->
        <div class="attention clearfix" style="height: auto">
            <div class="title">
                <h3>我的关注</h3>
            </div>
            <ul style="margin-left: 30px">
                <?php if(isset($history)): if(is_array($focus)): $i = 0; $__LIST__ = array_slice($focus,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li" style="margin-right: 30px">
                            <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($vo["gid"]); ?>">
                                <img  src="/Public/Upload/Goodspic/thumb_390_<?php echo ($vo["pic"]); ?>" style="width: 160px;height:160px " alt="">
                                <p class="p2" style="position: absolute;z-index: 400"><?php echo ($vo["goodsname"]); ?>   <p class="p1" style="position: absolute;top: -20px;" > </p> </p>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                    <li class="li">
                        <p >暂时没有关注记录 </p>
                    </li><?php endif; ?>
            </ul>
        </div>
	<!-- 我的关注 结束 -->
	<!-- 浏览记录 开始 -->
        <div class="record">
            <div class="title"><h3>浏览记录</h3></div>
            <div class="lb">
                <ul class="lb-img">
                    <li>
                        <ul>
                            <?php if(isset($history)): if(is_array($history)): $k = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="li">
                                        <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($vo["gid"]); ?>">
                                            <img  src="/Public/Upload/Goodspic/thumb_390_<?php echo ($vo["pic"]); ?>" style="width: 160px;height:160px " alt="">
                                            <p class="p2" style="position: absolute;z-index: 400"><?php echo ($vo["goodsname"]); ?>   <p class="p1" style="position: absolute;top: -20px;" > </p> </p>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php else: ?>
                                <li class="li">
                                    <p>暂时没有浏览记录</p>
                                </li><?php endif; ?>
                        </ul>
                    </li>
                </ul>
                <div class="btn_l">&lt;</div>
                <div class="btn_r">&gt;</div>
            </div>
        </div>
	<!-- 浏览记录 结束 -->
	</div>
</div>
<div class="jilu frm_sty clearfix">
	<div class="title">
		<h3>浏览记录</h3>
	</div>
    <ul>
		<?php if(isset($history)): if(is_array($history)): $i = 0; $__LIST__ = array_slice($history,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li">
                    <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($vo["gid"]); ?>">
                        <img  src="/Public/Upload/Goodspic/thumb_390_<?php echo ($vo["pic"]); ?>" style="width: 190px;height:270px " alt="">
                        <p class="p2" style="position: absolute;z-index: 400"><?php echo ($vo["goodsname"]); ?>   <p class="p1" style="position: absolute;top: -0px;" > </p> </p>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
                <li class="li"><p >暂时没有浏览记录 </p></li><?php endif; ?>
    </ul>
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
                <p>爱家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
    </div>
</div>
<!-- 底部结束 -->
</body>
<script>
    $('#mycart').mouseenter(function(){
        $(this).addClass('myShopCar1');
        $('.carlist').show();
        $.post('/Home/Cart/mycart?act=getCartList',null,function(res){
            $("#goodslist").html(res);
        })
    });

    $("#mycart").mouseleave(function(){
        $(this).removeClass("myShopCar1");
        $('.carlist').hide();
    });
</script>

<script>
    function logout(){
//询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo u('Login/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo u('Index/index');?>"
                };
            })
        });
    }
</script>
</html>