<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎光临爱家频道！</title>
    <LINK rel=stylesheet type=text/css href="/Public/Home/style/common.css">
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/DetailPages.css" />
    <link rel="stylesheet" href="/Public/Home/style/addcar.css" />
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.imagezoom.min.js"></script>
    <script src="/Public/Home/js/DetailPages.js"></script>
    <script type=text/javascript src="/Public/Home/js/kefu.js"></script>
    <style>
        .myShopCar1{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
        .carlist{position: absolute;width:450px;padding:10px;background: #fff;left:1302px;top:125px;border:1px solid #F1F1F1;display:none;z-index:999;  }
        #goodslist dd{position:relative;float:left;margin-left: 8px;}
        #myShopCar{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
    </style>
</head>

<body>
<!-- 顶部开始 -->
<div class="header">
    <div class="headerCont frm_sty clearfix">
        <p class="p1">欢迎光临爱家频道！</p>
        <p class="tel">4008-8888-8888</p>
        <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/login');?>">用户中心</a><?php else: ?><a href="<?php echo u('Member/member');?>">会员中心</a><?php endif; ?></a>
        <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/register');?>">注册</a><?php else: ?><a href="javascript:logout()">退出</a><?php endif; ?></a>
        <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/login');?>">亲，请登录</a><?php else: ?><a href="<?php echo u('Member/userInfo');?>"><?php echo (session('membername')); ?></a><?php endif; ?></a>
    </div>
</div>
<!-- 导航搜索栏 -->
<div class="search">
    <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
        <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
        <div class="bd fl">
            <form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">
                <input name="searchwords" type="text" class="msg" id="msg" value="" placeholder="家具">
                <a href="javascript:document.getElementById('searchform').submit();" class="btn fl" id="abtn">搜索</a>
            </form>
            <p class="msg1">
                <a href="<?php echo U('Home/Search/search');?>">&nbsp;</a>
                <!--<a href="<?php echo U('Home/Search/search');?>">户外 |</a>-->
                <!--<a href="<?php echo U('Home/Search/search');?>">沙发</a>-->
            </p>
        </div>
        <!--<div class="buy clearfix">-->
            <!--<span class="fl">1</span>-->
            <!--<a class="fl" id='mycart' href="<?php echo U('Home/Cart/myCart');?>">购物车</a>-->
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
<!-- 导航开始结束 -->
<!-- 全部商品 开始 -->
<div class="show">
    <div class="notice">
        <p>商品已加入购物车</p>
    </div>
    <div class="info">
        <div class="infoImg"><img src="/Public/Upload/Goodspic/<?php echo ($pic); ?>" alt=""></div>
        <div class="infoName"><a><?php echo ($goodsname); ?></a></div>
        <div class="info1">
            <span>颜色：<?php echo ($color); ?></span>
            <span>单价：<?php echo ($price); ?></span>
            <span>数量：<?php echo ($buynum); ?></span>
        </div>
    </div>

    <div class="info2">
        <a href="javascript:;" onclick="history.back()">返回</a>&nbsp;&nbsp;
        <a href="/index.php/Home/Cart/showCart">去购物车结算</a>
    </div>
</div>
<!-- 底部  开始-->
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
                <a href="#"><img src="/Public/Home/images/erweima.jpg"></a>
            </div>
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
    </div>
</div>
<!-- 底部 结束 -->
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

    $('#abtn').click(function(){
        if(!$('#msg').val()){
            layer.alert('请输入要搜索的商品名称');
            return false;
        }
    })
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