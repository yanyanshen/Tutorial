<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">

<title>个人中心</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/personal.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script>
  
$(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
    // console.log(a);
        if (a > 750 ){
            a = 750;
        } 
        rem = a / 7.5;
        r.style.fontSize = rem + "px"
    }
    var t;
    w();
    window.addEventListener("resize", function() {
        clearTimeout(t);
        t = setTimeout(w, 300)
    }, false);
});

</script>
</head>
<body>
<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <!--<p><a href="#" >&lt;返回</a></p>-->
        <h2><a href="#">个人中心</a></h2>
        <!--<ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>-->
    </div>
</div>
<!--头部 结束-->

<!--个人中心 开始-->
 <div class="person clearfix" style="height: 3.32rem;padding-left: 0;">
     <?php if(is_array($userInfo)): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="wrapper">
        <?php if(empty($deavatar)): ?><a href="<?php echo U('UserCenter/userinfo');?>"><div class="img fl" style="margin-left: 3rem;float: none"><img src="/Uploads/avatar/100/deavatar.jpg" alt="" style="width: 0.98rem;height: 0.98rem;border-radius: 0.49rem"/>
        </div></a>
            <?php else: ?>
            <a href="<?php echo U('UserCenter/userinfo');?>"><div class="img fl" style="margin-left: 3rem;float: none"><img src="/Uploads/avatar/100/100_<?php echo ($val["avatar"]); ?>" alt="" style="width:0.98rem;height: 0.98rem;border-radius: 0.49rem"/>
            </div></a><?php endif; ?>
        <div class="fl" style="float: none;margin-left: 2.8rem">
            <h3><?php echo ($val["username"]); ?></h3>
        </div></div>

     <div class="wrapper" style="width: 100%;left: 0;">
         <ul style="list-style: none;display: block;">
             <a href=""><li style="float: left;width: 25%;height:1rem;position: relative;text-align: center;padding-top: 0.1rem;line-height: 0.51rem"><span class="opa" style="opacity: 0.6;background-color: #000;width: 100%;position: absolute;height:1rem;left: 0; "></span><p style="color: #ffffff;position: relative;">剩余积分</p><p style="color: #ffffff;position: relative;"><?php echo ($val["points"]); ?></p></li></a>
             <a href=""><li style="float: left;width: 25%;height:1rem;position: relative;text-align: center;padding-top: 0.1rem;line-height: 0.51rem"><span class="opa" style="opacity: 0.6;background-color: #000;width: 100%;position: absolute;height:1rem;left: 0;"></span><p style="color: #ffffff;position: relative;">历史积分</p><p style="color: #ffffff;position: relative;"><?php echo ($val["totalpoints"]); ?></p></li></a>
             <a href=""><li style="float: left;width: 25%;height:1rem;position: relative;text-align: center;padding-top: 0.1rem;line-height: 0.51rem"><span class="opa" style="opacity: 0.6;background-color: #000;width: 100%;position: absolute;height:1rem;left: 0;"></span><p style="color: #ffffff;position: relative;">未完成订单</p><p style="color: #ffffff;position: relative;"><?php echo ($wait); ?></p></li></a>
             <a href=""><li style="float: left;width: 25%;height:1rem;position: relative;text-align: center;padding-top: 0.1rem;line-height: 0.51rem"><span class="opa" style="opacity: 0.6;background-color: #000;width: 100%;position: absolute;height:1rem;left: 0;"></span><p style="color: #ffffff;position: relative;">已完成订单</p><p style="color: #ffffff;position: relative;"><?php echo ($ok); ?></p></li></a>

         </ul>
     </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--个人中心 结束-->

<!--订单 开始-->
<div class="order">
    <div class="wrapper">
    <p class="p"><a href="<?php echo U('Order/index');?>">全部订单<i>></i></a></p>
    <ul>
          <li class="first"><p onclick="location.href='<?php echo U('Order/index');?>?status=1'"><img src="/Public/Mobile/images/icon_09.png" alt=""></p><p>待付款</p></li>
          <li class="second"><p onclick="location.href='<?php echo U('Order/index');?>?status=2'"><img src="/Public/Mobile/images/icon_11.png" alt=""></p><p>待发货</p></li>
          <li class="three"><p onclick="location.href='<?php echo U('Order/index');?>?status=3'"><img src="/Public/Mobile/images/icon_13.png" alt=""></p><p>待收货</p></li>
          <li class="four"><p onclick="location.href='<?php echo U('Order/index');?>?status=4'"><img src="/Public/Mobile/images/icon_03.png" alt=""></p><p>待评价</p></li>
          <li class="last"><p onclick="location.href='<?php echo U('Services/index');?>'"><img  src="/Public/Mobile/images/icon_06.png" alt=""></p><p>售后</p></li>
    </ul>  
    </div>
</div>
<!--订单 结束-->

<!--收藏 开始-->
<div class="collect">
    
    <ul>
        <li class="li01"><a href="<?php echo U('UserCenter/userinfo');?>"><img src="/Public/Mobile/images/userinfo.png" alt="">我的资料&nbsp;&nbsp;&nbsp;<i>></i></a></li>
        <li class="li01"><a href="<?php echo U('UserCenter/changepassword');?>"><img src="/Public/Mobile/images/changepassword.png" alt="">修改密码&nbsp;&nbsp;&nbsp;<i>></i></a></li>
        <li class="li01"><a href="<?php echo U('UserCenter/userintegral');?>"><img src="/Public/Mobile/images/integral.png" alt="">我的积分&nbsp;&nbsp;&nbsp;<i>></i></a></li>
        <li class="li01"><a href="<?php echo U('UserCenter/myCollect');?>"><img src="/Public/Mobile/images/collect_21.png" alt="">我的收藏夹<i>></i></a></li>
        <li class="li02"><a href="<?php echo U('UserCenter/myComment');?>"><img src="/Public/Mobile/images/collect_24.png" alt="">我的评价<i style="margin-left: 4.85rem">></i></a></li>
        <li class="li02"><a href="<?php echo U('Services/history');?>"><img src="/Public/Mobile/images/collect_24.png" alt="">购买记录<i style="margin-left: 4.85rem">></i></a></li>
        <li class="li03"><a href="<?php echo U('Order/myAddress');?>"><img src="/Public/Mobile/images/collect_28.png" alt="">我的收货地址管理<i>></i></a></li>
        <a href="<?php echo U('Login/logout');?>" style="color: #ffffff!important;"><li class="li03" style="text-align: center;background-color: #fb3f3f;width: 6rem;margin: 0 auto;margin-top: 0.5rem;font-size: 0.3rem">退出登录</li></a>
    </ul>
</div>
<!--收藏 结束-->

<!--猜你喜欢 开始-->

  <div class="like">
   
        <h3>猜你喜欢</h3>
        <p class="change">换一批</p>
        <ul>
            <li><img src="/Public/Mobile/images/tu_07.png" alt="" class="img01"><p>韩后水动力补水<br>嫩白提亮套装</p><b>￥99</b>
            </li>
            <li><img src="/Public/Mobile/images/tu_04.png" alt="" class="img02"><p>韩后水动力补水<br>嫩白提亮套装</p><b>￥99</b></li>
            <li><img src="/Public/Mobile/images/tu_03.png" alt="" class="img03"><p>女神专属夏季女<br>长袖白色上衣</p><b>￥99</b></li>
        </ul>
     
   </div>
<!--猜你喜欢 结束-->

<!--底部导航  开始-->
<div class="outside">
    <div class="footer">
        <ul style="width: 100%;">
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Category/index');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo U('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo U('UserCenter/usercenter');?>">
                <i class="on"><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!--底部导航  结束-->
</body>
</html>