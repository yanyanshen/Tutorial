<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>商品分类-<?php echo C('WEB_NAME');?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/class.css" rel="stylesheet">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/class.js"></script>
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

<!--热销分类-->
<div class="class clearfix">
    <div class="left fl">
        <ul class="clearfix">
            <?php if(is_array($firstCate)): $k = 0; $__LIST__ = $firstCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if(($k) == "1"): ?><li class="active"><?php echo ($vo["catename"]); ?></li>
                    <?php else: ?>
                    <li><?php echo ($vo["catename"]); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="right fl">
        <?php if(is_array($firstCate)): $i = 0; $__LIST__ = $firstCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
            <?php if(is_array($vo["second"])): $i = 0; $__LIST__ = $vo["second"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><ul>
                        <div class="title01"><?php echo ($vo1["catename"]); ?></div>
                        <?php if(is_array($vo1["third"])): $i = 0; $__LIST__ = array_slice($vo1["third"],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li class="fl"><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo2['id']));?>"><p><?php echo ($vo2["catename"]); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<!--底部导航-->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Category/categoryList');?>">
                <i class="on"><span class="i2"></span></i>
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