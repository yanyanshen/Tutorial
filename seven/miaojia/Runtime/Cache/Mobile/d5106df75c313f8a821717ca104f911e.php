<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>收藏夹</title>
<meta name="description" content="">
<meta name="keywords" content="">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/layer.js"></script>
<!-- <script src="/Public/Mobile/js/1.js"></script> -->
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

$(function(){
    $(".delGoodsSc").click(function(){
        $.ajax({
            type:"post",
            url:"<?php echo u('delGoodsSc');?>",
            data:"gid="+$(this).attr('rel'),
            success:function(data){
                layer.open({
                    type:2,
                    time:1,
                    shadeClose:false,
                    end:function(){
                        location.reload();
                    }
                })
            }
        })
    })
})
</script>
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/collection.css"/>
</head>
<!-- 头部开始 -->
<body>
<div class="collection clearfix">
    <div class="wrapper">
        <p class="left fl">您收藏了<?php echo count($goodsScList);?>个商品</p>
        <p class="right fr"></p>
    </div>    
</div>

<!-- 产品详情 -->
<div class="product">
    <?php if(is_array($goodsScList)): $i = 0; $__LIST__ = $goodsScList;if( count($__LIST__)==0 ) : echo "您暂无收藏商品" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="pro1 clearfix">
            <a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" alt="商品图片"></a>
                <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><?php echo (mb_substr($vo["goodsname"],0,20,'UTF-8')); ?></a></p>
                <p class="mony fl">￥<?php echo ($vo["siteprice"]); ?></p>
                <p class="mony fl"><a href="javascript:void (0)" rel="<?php echo ($vo["id"]); ?>" class="delGoodsSc">删除此收藏</a> </p>
            </a>
        </div><?php endforeach; endif; else: echo "您暂无收藏商品" ;endif; ?>
</div>

<!-- 底部导航 STRAT -->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Goods/goodsList');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo u('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo u('User/member');?>">
                <i class="on"><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!-- 底部导航 STRAT -->
</body>
</html>