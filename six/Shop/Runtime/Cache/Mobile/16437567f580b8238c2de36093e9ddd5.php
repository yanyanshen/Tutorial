<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">

<title>个人中心</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Shop/Public/Mobile/css/personal.css" rel="stylesheet">
    <link href="/Shop/Public/Mobile/css/address.css" rel="stylesheet">
<script src="/Shop/Public/Mobile/js/jquery-1.9.1.min.js"></script>
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

    //查看订单
    $(".order ul li").click(function(){
        var index=$(this).index()+1;
        location.href="<?php echo U('Order/order');?>?status="+index;
    })
});

</script>

</head>
<body>
<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <p><a href="#"><返回</a></p>
        <h2><a href="#">个人中心</a></h2>
        <ul class="menu">
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<div class="m_menu hidden">
    <div>
        <i class="rotate45"></i>
        <a href="/"><span><i class="m_bg"></i></span></a>
        <a href="/category/"><span><i class="m_bg"></i></span>分类搜索</a>
        <a href="/cart/"><span><i class="m_bg"></i></span>购物车</a>
        <a href="/member/"><span><i class="m_bg"></i></span>我的拍鞋</a>
    </div>
</div>
<!--头部 结束-->

<!--个人中心 开始-->
 <div class="person clearfix">
    <div class="wrapper">
        <div class="img fl">
            <a href="<?php echo U('MyInfo/myInfo');?>" style="cursor: pointer;" title="修改头像">
                <!--<img src="/uploads/avatar/<?php echo (session('avatar')); ?>" style="width: 60px;height: 60px;cursor: pointer;" alt="头像"/>-->
                <?php if($_SESSION['avatar']!= ''): ?><img src="/uploads/avatar/<?php echo (session('avatar')); ?>" style="width: 60px;height: 60px;cursor: pointer;" alt="头像" />
                    <?php else: ?>
                    <img src="/uploads/avatar/a.jpg" style="width: 60px;height: 60px;cursor: pointer;" alt="头像" /><?php endif; ?>
            </a>
        </div>
        <div class="fl">
            <h3><?php echo ($userinfo["username"]); ?></h3>
            <!--<p>世界那么大 我想去看看</p>-->
        </div>
    </div>
</div>
<!--个人中心 结束-->

<!--订单 开始-->
<div class="order">
    <div class="wrapper">
    <p class="p"><a href="<?php echo U('Order/order');?>">全部订单<i>></i></a></p>
    <ul>
          <li class="first"><p><img src="/Shop/Public/Mobile/imgs/icon_09.png" alt=""></p><p>待付款</p></li>
          <li class="second"><p><img src="/Shop/Public/Mobile/imgs/icon_11.png" alt=""></p><p>待发货</p></li>
          <li class="three"><p><img src="/Shop/Public/Mobile/imgs/icon_13.png" alt=""></p><p>待收货</p></li>
          <li class="four"><p><img src="/Shop/Public/Mobile/imgs/icon_03.png" alt=""></p><p>待评价</p></li>
          <li class="last"><p><img src="/Shop/Public/Mobile/imgs/icon_06.png" alt=""></p><p>退款</p></li>
    </ul>  
    </div>
</div>
<!--订单 结束-->

<!--收藏 开始-->
<div class="collect">
    
    <ul>
        <li class="li01"><a href="<?php echo U('Member/collect');?>"><img src="/Shop/Public/Mobile/imgs/collect_21.png" alt="">我的收藏夹</a><i>></i></li>
        <li class="li02"><a href="<?php echo U('MyInfo/myInfo');?>"><img src="/Shop/Public/Mobile/imgs/bb.png" alt="" style="width: 35px;height: 51px;margin-top: -10px">我的资料</a><i>></i></li>
        <li class="li03"><a href="<?php echo U('Address/address');?>"><img src="/Shop/Public/Mobile/imgs/collect_28.png" alt="">我的收货地址管理</a><i>></i></li>
    </ul>
</div>
<!--收藏 结束-->

<!--猜你喜欢 开始-->

  <div class="like">
   
        <h3>猜你喜欢</h3>
        <p class="change">换一批</p>
        <ul>
            <?php if(is_array($like)): $i = 0; $__LIST__ = $like;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><img src="/uploads/n1/<?php echo (array_shift(explode(',',(isset($val["image"]) && ($val["image"] !== ""))?($val["image"]):'default.jpg'))); ?>" alt="" class="img01"><p style="display: block; height:0.8rem;"><?php echo ($val["goodsname"]); ?></p><b>￥<?php echo ($val["saleprice"]); ?></b>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </ul>
     
   </div>
<!--猜你喜欢 结束-->

<!--底部导航  开始-->
<!--底部导航  开始-->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Goods/category');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo U('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a  href="<?php echo U('Member/personal');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!--底部导航  结束-->
<!--底部导航  结束-->

<script type="text/javascript">
    $(function(){
        $(".i4").parent().addClass('on');
    })
</script>
</body>
</html>