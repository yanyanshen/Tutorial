<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>积分兑换</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/swiper.min.css"/>
    <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="page-header">
    <h3>积分兑换</h3>
</header>
<div class="contaniner fixed-contb">
    <figure class="ban swiper-container">
        <ul class="swiper-wrapper">
            <li class="swiper-slide">
                <img src="/Public/Mobile/images/yang1.png"/>
            </li>
            <li class="swiper-slide">
                <img src="/Public/Mobile/images/yang2.jpg"/>
            </li>
            <li class="swiper-slide">
                <img src="/Public/Mobile/images/index-ban03.png"/>
            </li>
        </ul>
    </figure>
    <section class="shop">
        <h3>积分商品</h3>
        <dl>
            <?php if(is_array($integralgoods)): $i = 0; $__LIST__ = $integralgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dd>
                    <a href="<?php echo U('Integral/detail',array('gid'=>$value['id']));?>">
                        <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($value['pic']); ?>"/>
                        <b><?php echo (mb_substr($value['goodsname'], 0,20,'utf-8')); ?></b>
                    </a>
                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
        </dl>
    </section>
</div>
<footer class="page-footer fixed-footer">
    <ul>
        <li class="active">
            <a href="<?php echo U('Index/index');?>">
                <img src="/Public/Mobile/images/footer01.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Category/cateList');?>">
                <img src="/Public/Mobile/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Cart/cartList');?>">
                <img src="/Public/Mobile/images/footer003.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Personal/personalList');?>">
                <img src="/Public/Mobile/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>

<script src="/Public/Mobile/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var mySwiper = new Swiper('.swiper-container',{
            loop: true,
            speed:1000,
            autoplay: 2000
        });
    })
</script>
</body>
</html>