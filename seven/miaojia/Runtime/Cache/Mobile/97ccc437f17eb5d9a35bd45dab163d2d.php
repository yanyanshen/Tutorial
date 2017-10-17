<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>商品列表-<?php echo C('WEB_NAME');?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/list.css" rel="stylesheet">
<script>
(function(){
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
})();

</script>
</head>
<!--头部-->
<body>
<div class="header">
    <div class="wrapper">
        <form action="<?php echo u('Goods/goodsList');?>" method="post">
            <div class="search">
                <i></i>
                <input class="txt" name="goodsname" type="text" placeholder="动动手指，总有一款你想要的">
            </div>
        </form>
    </div>
</div>


<!--产品展示-->
<div class="pro">
    <div class="wrapper">
        <ul class="clearfix">
            <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class"li01"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>">
                <div><i style="background: url('/upload/n1/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>');background-size:3.38rem 2.98rem;"></i></div>
                <p class="txt"><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?></p>
                <p><span class="pice">￥<?php echo ($vo["siteprice"]); ?></span><span class="txt01"><?php echo mt_rand(000,19999);?>人付款</span></p>
            </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php echo ($page); ?>
    </div>
</div>

<!--底部导航-->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i class="on"><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Category/categoryList');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo u('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo u('User/member');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>

</body>
</html>