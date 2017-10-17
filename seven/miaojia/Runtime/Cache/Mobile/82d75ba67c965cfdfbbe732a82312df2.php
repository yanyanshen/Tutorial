<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo C('WEB_NAME');?></title>
<meta name="description" content="云和商城">
<meta name="keywords" content="云和商城">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="/Public/Mobile/css/index.css" rel="stylesheet">
    <!-- 底部导航 STRAT -->
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/index.js"></script>

<script>
(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
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
<body>
<!-- 头部搜索框 START -->
<form action="<?php echo u('Goods/goodsList');?>" method="post">
    <div class="search">
        <h1 class="logo"></h1>
        <input type="text" id="search" name="goodsname" placeholder="动动手指，总有一款是你想要的">
        <i></i>
    </div>
    </form>
<!-- 头部搜索框 END -->

<!-- BANNER STRAT-->
    <div class="banner">                                 
        <ul class="banner-img">
            <li><img src="/Public/Mobile/images/banner_5.png" alt="洋货APP"></li>
            <li><img src="/Public/Mobile/images/banner_2.png" alt="洋货APP"></li>
            <li><img src="/Public/Mobile/images/banner_3.png" alt="洋货APP"></li>
            <li><img src="/Public/Mobile/images/banner_4.png" alt="洋货APP"></li>
            <li><img src="/Public/Mobile/images/banner_1.png" alt="洋货APP"></li>
        </ul>
        <ul class="banner-btn">
            <li class="focus"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
       <span class="prev">&lt;</span>
       <span class="next">&gt;</span>
    </div>
<!-- BANNER END-->

<!-- 快捷导航 STRAT -->
    <div class="easynav">
            <ul>
                <li>
                    <a href="<?php echo u('Goods/goodsList',array('cid'=>1));?>">
                        <i class="bg1"><img src="/Public/Mobile/images/easynav_1.png" alt=""></i>
                        <p>生鲜</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo u('Goods/goodsList',array('cid'=>2));?>">
                        <i class="bg2"><img src="/Public/Mobile/images/easynav_2.png" alt=""></i>
                        <p>食品</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo u('Goods/goodsList',array('cid'=>3));?>">
                        <i class="bg3"><img src="/Public/Mobile/images/easynav_3.png" alt=""></i>
                        <p>酒类</p>
                    </a>
                </li>
                <li class="end">
                    <a href="<?php echo u('Goods/goodsList',array('cid'=>4));?>">
                        <i class="bg4"><img src="/Public/Mobile/images/easynav_4.png" alt=""></i>
                        <p>地方特产</p>
                    </a>
                </li>
            </ul>
    </div>
<!-- 快捷导航 END -->

<!-- 洋货头条 STRAT -->
    <div class="hot">
        <h3 class="fl"></h3>
        <i class="fl"></i>
        <div class="text fl">
            <ul>
                <?php if(is_array($hot_tj)): $i = 0; $__LIST__ = $hot_tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><li><p class="p1"><?php echo (mb_substr($vo["goodsname"],0,11,'UTF-8')); ?></p><p><?php echo (mb_substr($vo["goodsname"],11,20,'UTF-8')); ?></p></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
<!-- 洋货头条 END -->

<!-- 争分夺秒 STRAT -->
    <div class="rushup">
        <div class="title clearfix">
            <h3 class="fl"></h3>
            <div class="more fr" id="time"><a href="<?php echo u('Category/categoryList');?>">查看更多&gt;&gt;</a></div>
        </div>
        <ul class="pro">
            <?php if(is_array($hot_tj)): $i = 0; $__LIST__ = array_slice($hot_tj,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>">
                    <div class="img clearfix"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" alt="<?php echo ($vo["goodsname"]); ?>"><span><i class="l1 fl"></i><p class="fl"><?php echo (mb_substr($vo["goodsname"],0,7,'UTF-8')); ?></p></span></div>
                    <div class="price clearfix"><span class="r fr">￥20</span></div>
                </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="rushdown clearfix">
        <?php if(is_array($floor["1_1"])): $i = 0; $__LIST__ = array_slice($floor["1_1"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><div class="rushdown1 w" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 0.32rem 1.5rem"><h4>大聚惠</h4><p><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?></p><span>￥<?php echo ($vo["siteprice"]); ?></span></div></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($floor["3_1"])): $i = 0; $__LIST__ = array_slice($floor["3_1"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fr"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><div class="rushdown2 w" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 2.2rem 0"><h4>品牌团</h4><p class="p1"><i><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?></i></p><p><i>现货包邮</i></p><span><i>￥<?php echo ($vo["siteprice"]); ?></i></span></div></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($floor["2_1"])): $i = 0; $__LIST__ = array_slice($floor["2_1"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fr t1"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><div class="rushdown3 w" style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 1.29rem 0.94rem"><h4>美食团</h4><p><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?></p><span><i>￥<?php echo ($vo["siteprice"]); ?></i></span></div></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($floor["4_1"])): $i = 0; $__LIST__ = array_slice($floor["4_1"],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="fr t2"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><div class="rushdown4 w" style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 1.25rem 0.96rem"><h4>量贩团</h4><p><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?></p><span><i>￥<?php echo ($vo["siteprice"]); ?></i></span></div></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
<!-- 争分夺秒 END -->

<!-- 今日特惠 START -->
<div class="tspecial market">
	<div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">今日特惠</h3>
	        <i class="fl"></i>	
	</div>
	<div class="sales">
		<ul>
            <?php if(is_array($floor["rand"])): $k = 0; $__LIST__ = $floor["rand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; switch($k): case "1": ?><li class="ts1" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><p><i><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?>只需￥<?php echo ($vo["siteprice"]); ?></i></p></a></li><?php break;?>
                    <?php case "2": ?><li class="ts1 end" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><p><i><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?>只需￥<?php echo ($vo["siteprice"]); ?></i></p></a></li><?php break;?>
                    <?php case "3": ?><li class="ts1" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><p><i><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?>只需￥<?php echo ($vo["siteprice"]); ?></i></p></a></li><?php break;?>
                    <?php case "4": ?><li class="ts1 end" style="background: url('/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><p><i><?php echo (mb_substr($vo["goodsname"],0,10,'UTF-8')); ?>只需￥<?php echo ($vo["siteprice"]); ?></i></p></a></li><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<!-- 今日特惠 START -->

<!-- 热门市场 START -->
    <div class="hotgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">热门市场</h3>
	        <i class="fl"></i>
        </div>
        <div class="sales">
        	<ul>
                <?php if(is_array($floor["rand"])): $k = 0; $__LIST__ = $floor["rand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; switch($k): case "1": ?><li class="li01"style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 2.1rem 0.78rem"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,15,'UTF-8')); ?></h4></a></li><?php break;?>
                        <?php case "2": ?><li class="li02 end"style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 2.2rem 0.78rem"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,15,'UTF-8')); ?></h4></a></li><?php break;?>
                        <?php case "3": ?><li class="li03"style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>') no-repeat 1.95rem 0.48rem;"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,15,'UTF-8')); ?></h4></a></li><?php break;?>
                        <?php case "4": ?><li class="li04 end"style="background: url('/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>')  no-repeat 2.1rem 0.58rem;"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,15,'UTF-8')); ?></h4></a></li><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
        	</ul>
        </div> 
    </div>
<!-- 热门市场 STRAT -->

<!-- 特色市场 STRAT -->
    <div class="specialgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">特色市场</h3>
	        <i class="fl"></i>
        </div> 
        <div class="sales">
        	<ul>
                <?php if(is_array($floor["rand"])): $k = 0; $__LIST__ = $floor["rand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; switch($k): case "1": ?><li class="li01"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,13,'UTF-8')); ?></h4><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>"></a></li><?php break;?>
                        <?php case "2": ?><li class="li02 end"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,13,'UTF-8')); ?></h4><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>"></a></li><?php break;?>
                        <?php case "3": ?><li class="li03"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,13,'UTF-8')); ?></h4><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>"></a></li><?php break;?>
                        <?php case "4": ?><li class="li04 end"><a href="<?php echo u('Goods/detail',array('id'=>$vo['id']));?>"><h4><?php echo (mb_substr($vo["goodsname"],0,13,'UTF-8')); ?></h4><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>"></a></li><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
        	</ul>
        </div>  
    </div>
<!-- 特色市场 STRAT -->

<!-- 底部导航 STRAT -->
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