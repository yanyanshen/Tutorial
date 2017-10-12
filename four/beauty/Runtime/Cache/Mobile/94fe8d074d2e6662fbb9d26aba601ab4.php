<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>购物车 - 订单结算</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="拍鞋网,拍鞋网官方网站,拍鞋网商城" />
    <meta name="description" content="买鞋子哪个网站好，当然首选拍鞋网!中国最早成立的正品鞋子购物网站,国内最大的品牌鞋子销售广场。所售鞋子100%厂家授权,全国包邮,货到付款,提供最完美的购物体验！" />
    <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
</head>
<body>
<!--改版后 com1-3.css可以去掉-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-3.css?2015091516" />
<!--新改的-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-4.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/download.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/public-adaptation1-1.css?2015091516" />
<script src="/Public/Mobile/js/jquery.js?2015091516"></script>
<script>var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','order','trolly'],'2015/09/15 16:10:43',0,false]; var DOMIN = {MAIN:"http://m.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};</script>
<script>
    var JAVASCRIPT_LIB = (('\v' !== 'v') ? 'zepto' : 'jquery');
    JAVASCRIPT_LIB="jquery";
    DOMIN.MAIN = 'http://m.paixie.net';
    DOMIN.PAIXIE = 'http://www.paixie.net';
    // uc浏览器添加书签功能
    window.onmessage = function(event){
        if(event.data.message != ''){
            $('#otherPage').remove();
        }else{
            $('#otherPage').show();
        }
    };
</script>
<link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
<script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
<!--红包分享，临时添加-->
<!-- uc 浏览器添加书签 start --->
<iframe src="http://app.uc.cn/appstore/AppCenter/frame?uc_param_str=nieidnutssvebipfcp&amp;api_ver=2.0&amp;id=1904" width="100%" height="160" style="display:none" id="otherPage"></iframe>
<!-- uc 浏览器添加书签 end   ---->
<script>
</script>
        <div class="mask hidden"></div>
        <!--content-->
        <div class="page-role cart-page cart-trolly-page" id="js-cart-trolly-page">
            <div class="com-title" >
                <div style="float: left;margin-left: 10px;">
                    <a title="返回" href="<?php echo U('Mobile/MyCart/orderlist',array('oid'=>$oid));?>" style="color: white;">
                    &lt;&nbsp;&nbsp;选择收货地址
                    </a>
                </div>
                <div style="float: right;">
                    <a href="<?php echo U('Mobile/Address/manageAddress',array('oid'=>$oid));?>" style="color: white;"><span>管理</span></a>
                </div>

            </div>
                <div class="pxui-area" id="js-trolly" style="display:block;">
                    <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ress): $mod = ($i % 2 );++$i;?><div class="address" style="margin-top: 20px;" >
                                <input type="hidden" value="<?php echo ($ress["id"]); ?>" name="addid" addid="<?php echo ($ress["id"]); ?>"/>
                            <div>
                                <span id="js-trolly-address-name" style="float: left;margin-left: 10px;font-size: 16px;"><?php echo ($ress["username"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="js-trolly-address-phone" style="float: right;margin-right: 10px;font-size: 16px;"><?php echo ($ress["mobile"]); ?></span><br />
                            </div>
                            <div style="margin-top: 20px;margin-left: 10px;">
                                <span id="js-trolly-address-province" style="font-size: 16px;"><?php echo ($ress["province"]); ?></span>
                                <span id="js-trolly-address-city" style="font-size: 16px;"><?php echo ($ress["country"]); ?></span>
                                <span id="js-trolly-address-area" style="font-size: 16px;"><?php echo ($ress["city"]); ?></span>
                                <span id="js-trolly-address-address" style="font-size: 16px;"><?php echo ($ress["address"]); ?></span>
                                <span id="js-trolly-address-zipcode" style="font-size: 16px;"><?php echo ($ress["ecode"]); ?></span> <br />
                           </div>
                    </div>
                        <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
        </div>
<script type="text/javascript">
    $(function(){
        $('.address').click(function(){
           /* 获取地址id*/
            addid=$(this).children('input[name="addid"]').val();
            location="<?php echo U('Mobile/MyCart/orderlist',array('oid'=>$oid));?>"+'?addid='+addid;
        })
    })
</script>
<div class="com-footer-area" id="js-com-footer-area">
    <span class="top"></span>
    <div class="footer">
        <div class="nav">
            <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
                <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>
            <span></span>
            <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
                <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
            <span></span>

            <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
                <?php else: ?>
                <a class="gray6" href="<?php echo U('Mobile/Login/Dologin');?>">用户反馈</a><?php endif; ?>
            <span></span>
            <a class="gray6" href="/help/app.html#button">客户端</a>
        </div>
        <div class="copy">
            &copy;2007-2015
            <a href="http://m.paixie.net/" style="color:#9ea4b1;">Paixie</a> All Rights Reserved
            <br />闽B2-20110084
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Mobile/Login/LoginOut');?>", function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        type:1,
                        skin:'msg',
                        time:3,
                        end: function () {
                            location.href = "<?php echo U('Mobile/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        type:1
                    });
                }
            }, 'json')
        });
    })
</script>
</body>
</html>