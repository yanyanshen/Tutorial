<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>我的订单</title>
    <!--<link rel="stylesheet" href="/Public/Home/style/member.css">-->
    <link rel="stylesheet" href="/Public/Home/style/order.css">
    <link rel="stylesheet" href="/Public/Home/style/swiper.min.css">
    <link rel="stylesheet" href="/Public/Home/style/reset.css">
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/order.js"></script>
    <script src="/Public/Home/js/reset.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <style>
        .myShopCar1{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
        .carlist{position: absolute;width:450px;padding:10px;background: #fff;left:1302px;top:125px;border:1px solid #F1F1F1;display:none;z-index:999;  }
        #goodslist dd{position:relative;float:left;margin-left: 8px;}
        #myShopCar{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
    </style>
</head>
<body>
<div>
    <div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家频道！</a></p>
        <ul class="fr">
            <li><a href="#"><?php echo (session('membername')); ?></a></li>
            <li><a href="javascript:logout()">退出</a>|</li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a>|</li>
            <li><a href="<?php echo U('Home/Member/order');?>"><span>我的订单</span></a></li>
        </ul>
    </div>
</div>
    <!-- 导航搜索栏 -->
    <div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
            <!--<div class="bd fl">-->
                <!--<form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">-->
                    <!--<input name="searchwords" type="text" class="msg"  value="" placeholder="家具">-->
                    <!--<a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>-->
                <!--</form>-->
                <!--<p class="msg1">-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">儿童家具 |</a>-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">户外 |</a>-->
                    <!--<a href="<?php echo U('Home/Search/search');?>">沙发</a>-->
                <!--</p>-->
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
</div>
<!-- 我的订单开始 myorder-->
<!-- 左侧边栏开始 -->
<div class="myorder frm_sty clearfix">
    <div class="sidebar fl">
        <p><?php echo (session('membername')); ?></p>
        <a href="<?php echo U('Home/Member/member');?>">会员中心</a>
        <a class="no" href="<?php echo U('Home/Member/order');?>">我的订单</a>
        <a href="<?php echo U('Home/Member/userInfo');?>">个人信息</a>
        <a href="<?php echo U('Home/Member/adress');?>">收货地址</a>
    </div>
<!-- 左侧边栏结束 -->
    <div class="order fl">
        <h4>我的订单</h4>
        <div class="orderCont">
            <div class="orderCont01 clearfix">
                <ul class="clearfix">
                    <li class="or_li1"><a href="#">订单详情&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li class="or_li2"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <!--<li class="or_li3"><a href="#">收货人</a></li>-->
                    <!--<li class="or_li4"><a href="#">金额</a></li>-->
                    <!--<li class="or_li5"><a href="#">状态</a></li>-->
                    <!--<li><a href="#">操作</a></li>-->
                </ul>
            </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="orderCont02">
                    <p><span class="span1"></span><span class="span2">订单号:<?php echo ($value["ordersyn"]); ?></span></p>
                    <ul class="clearfix">
                        <li class="or_li11"><img src="/Public/Upload/Goodspic/thumb_80_<?php echo ($value["pic"]); ?>"></li>
                        <li class="or_li22"><a href="#"><?php echo (mb_substr($value["goodsname"],0,10,'utf-8')); ?></a></li>
                        <li class="or_li33"><a href="#">×<?php echo ($value["buynum"]); ?></a></li>
                        <li class="or_li44"><a href="#"><?php echo ($value["username"]); ?></a></li>
                        <li class="or_li55"><a href="#">总额￥<?php echo ($value["prices"]); ?></a><br/><span><a href="#">应付￥<?php echo ($value["prices"]); ?></a></span></li>
                        <?php if($value["order_status_name"] == 未付款，未发货): ?><li class="or_li66">
                                <a href="javascript:;"><?php echo ($value["order_status_name"]); ?></a><br/>
                            </li>
                            <li class="or_li77"><a href="javascript:changeStatus('<?php echo ($value["ordersyn"]); ?>')" style="color: red">立即支付</a><br/><span>
                                <a href="javascript:deleteOrder('<?php echo ($value["ordersyn"]); ?>')">取消订单</a></span></li>
                        <?php else: ?>
                            <li class="or_li66">
                                <a><?php echo ($value["order_status_name"]); ?></a><br/>
                                <?php if($value["order_status_name"] == 已付款，已发货): ?><a href="javascript:take('<?php echo ($value[ordersyn]); ?>');">确认收货</a><?php endif; ?>
                            </li>
                            <?php if($value["order_status_name"] == 已完成，未评论): ?><li class="or_li77"><a href="#"></a><br/><span><a href="javascript:com('<?php echo ($value["ordersyn"]); ?>');">我要评论</a></span></li><?php endif; endif; ?>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
   
    
</div>
 <!-- hot样式开始 -->
 <div class="hit frm_sty ">
     <!-- Swiper JS -->
    <script src="/Public/Home/js/swiper.min.js"></script>
    <script>
    var swiper1 = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
        paginationClickable: true,
        // 左右箭头js
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        loop:true
    });
    </script>
</div>
<script src="/Public/Home/js/swiper.min.js"></script>
<!-- 底部样式开始 -->
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
</body>
<script>
//    $('#mycart').mouseenter(function(){
//        $(this).addClass('myShopCar1');
//        $('.carlist').show();
//        $.post('/Home/Cart/mycart?act=getCartList',null,function(res){
//            $("#goodslist").html(res);
//        })
//    });
//
//    $("#mycart").mouseleave(function(){
//        $(this).removeClass("myShopCar1");
//        $('.carlist').hide();
//    });
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

/*取消订单*/
function deleteOrder(ordersyn) {
    layer.prompt({
        title: '您确定要取消该订单吗？取消原因是...',
        formType: 2 //prompt风格，支持0-2
    }, function (pass) {
        $.get("/index.php/Home/Member/deleteOrder/ordersyn/" + ordersyn, '', function (res) {
            if (res.status == 'ok') {
                location.reload();
            }
        })
    });
}
    function changeStatus(ordersyn){
            layer.confirm('您确定要支付订单?', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.get("/index.php/Home/Member/changeStatus/ordersyn/"+ordersyn,'',function(res){
                    if(res.status=='ok'){
                        location.reload();
                    };
                })
            });
    }

    function take(syn){
        layer.confirm('您确定收货么?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/Member/take');?>",{ordersyn:syn},function(res){
                if(res.status=='ok'){
                    layer.msg('确认成功',{icon: 1});
                    location.reload();
                };
            })
        });
    }

    function com(syn){
        layer.prompt({
            title: '评论',
            formType: 2
        }, function (res) {
            $.get("<?php echo U('Home/Member/com');?>",{ordersyn:syn,content:res},function (v) {
//                if (v.status == 'ok') {
//                    layer.msg('评论成功',{icon: 1});
//                    location.reload();
//                }else{
//                    layer.msg('评论失败',{icon: 1});
//                }
                layer.msg('评论成功',{icon: 1});
                location.reload();
            })
        });
    }
</script>
</html>