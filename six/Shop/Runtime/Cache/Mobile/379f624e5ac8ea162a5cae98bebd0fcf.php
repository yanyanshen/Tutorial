<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>商城首页</title>
<meta name="description" content="洋货是一个专注于做潮流商品收售的商城app">
<meta name="keywords" content="洋货,潮流,时尚,商品收售,APP商城">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="/Shop/Public/Mobile/css/index.css" rel="stylesheet">
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
    <div class="search">
        <form action="<?php echo U('Goods/goodsList');?>" method="get" name="search" id="searchForm">
            <h1 class="logo"></h1>
            <input type="text" id="search" placeholder="动动手指，总有一款是你想要的" name="keywords">
            <a onclick="document.getElementById('searchForm').submit();return false"><i></i></a>
        </form>
    </div>
<!-- 头部搜索框 END -->

<!-- BANNER STRAT-->
    <div class="banner">                                 
        <ul class="banner-img">
            <?php if(is_array($advertising)): $i = 0; $__LIST__ = $advertising;if( count($__LIST__)==0 ) : echo "11" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="/uploads/AdImgs/<?php echo ($vo["image"]); ?>" alt="洋货APP"></li><?php endforeach; endif; else: echo "11" ;endif; ?>
        </ul>
        <ul class="banner-btn">
            <li class="focus"></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
       <span class="prev">&lt;</span>
       <span class="next">&gt;</span>
    </div>
<!-- BANNER END-->

<!-- 快捷导航 STRAT -->
   <!--  <div class="easynav">
            <ul>
                <li>
                    <a href="#">
                        <i class="bg1"><img src="/Shop/Public/Mobile/imgs/easynav_1.png" alt=""></i>
                        <p>聚划算</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bg2"><img src="/Shop/Public/Mobile/imgs/easynav_2.png" alt=""></i>
                        <p>新品试用</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bg3"><img src="/Shop/Public/Mobile/imgs/easynav_3.png" alt=""></i>
                        <p>爱团购</p>
                    </a>
                </li>
                <li class="end">
                    <a href="#">
                        <i class="bg4"><img src="/Shop/Public/Mobile/imgs/easynav_4.png" alt=""></i>
                        <p>乐闪购</p>
                    </a>
                </li>
            </ul>
    </div> -->
<!-- 快捷导航 END -->

<!-- 洋货头条 STRAT -->
   <!--  <div class="hot">
        <h3 class="fl"></h3>
        <i class="fl"></i>
        <div class="text fl">
            <ul>
                <li><p class="p1">下一代电视来袭</p><p>手把手教你做烘焙系列之曲奇</p></li>
                <li><p class="p1">双行文本滚动第二行</p><p>手把手教你做烘焙系列之曲奇</p></li>
                <li><p class="p1">这里是双行文本滚动</p><p>手把手教你做烘焙系列之曲奇</p></li>
            </ul>
        </div>
    </div> -->
<!-- 洋货头条 END -->

<!-- 争分夺秒 STRAT -->
  <!--   <div class="rushup">
        <div class="title clearfix">
            <h3 class="fl"></h3>
            <div class="time-l fl" id="time-h">20点场</div>
            <div class="time-r fl" id="time">
            </div>
            <div class="more fr"><a href="<?php echo U('Goods/seckill');?>">查看更多&gt;&gt;</a></div>
        </div>
        <ul class="pro">
        	<li><a href="#">
	        	<div class="img clearfix"><img src="/Shop/Public/Mobile/imgs/rush_1.jpg" alt=""><span><i class="l1 fl"></i><p class="fl">简易立柜限时抢</p></span></div>
	        	<div class="price clearfix"><span class="l fl">￥98</span><span class="r fr">￥20</span></div>
	        </a></li>
        	<li><a href="#">
	        	<div class="img clearfix"><img src="/Shop/Public/Mobile/imgs/rush_1.jpg" alt=""><span><i class="l2 fl"></i><p class="fl">简易立柜限时抢</p></span></div>
	        	<div class="price clearfix"><span class="l fl">￥98</span><span class="r fr">￥20</span></div>
	        </a></li>
        	<li class="end"><a href="#">
	        	<div class="img clearfix"><img src="/Shop/Public/Mobile/imgs/rush_1.jpg" alt=""><span><i class="l3 fl"></i><p class="fl">简易立柜限时抢</p></span></div>
	        	<div class="price clearfix"><span class="l fl">￥98</span><span class="r fr">￥20</span></div>
	        </a></li>
        </ul>
    </div>
    <div class="rushdown clearfix">
        <div class="fl"><a href="#"><div class="rushdown1 w"><h4>大聚惠</h4><p>最新款ipone6p</p><span>￥4699</span></div></a></div>
        <div class="fr"><a href="#"><div class="rushdown2 w"><h4>品牌团</h4><p class="p1"><i>楼兰蜜语1.8折起</i></p><p><i>红枣夹核桃 买一送一</i></p><span><i>￥79.9</i></span></div></a></div>
        <div class="fr t1"><a href="#"><div class="rushdown3 w"><h4>美食团</h4><p>五一出游零食降价</p><span><i>￥79.9</i></span></div></a></div>
        <div class="fr t2"><a href="#"><div class="rushdown4 w"><h4>量贩团</h4><p>前200名买一送一</p><span><i>￥79.9</i></span></div></a></div>
    </div> -->
<!-- 争分夺秒 END -->

<!-- 今日特惠 START -->
<div class="tspecial market">
	<div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">今日推荐</h3>
	        <i class="fl"></i>	
	</div>
	<div class="sales">
		<ul>
        <?php if(is_array($tj)): $i = 0; $__LIST__ = array_slice($tj,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="ts1">
                <a href="<?php echo U('Goods/details',array('id'=>$val['id']));?>">
                    <img src="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>" alt=""> 
                    <p><?php echo ($val["goodsname"]); ?>&nbsp;&nbsp;只需&nbsp;&nbsp;￥<?php echo ($val["saleprice"]); ?></p>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<!-- 今日特惠 START -->

<!-- 热门市场 START -->
   <!--  <div class="hotgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">热门市场</h3>
	        <i class="fl"></i>
        </div>
        <div class="sales">
        	<ul>
        		<li class="li01"><a href="#">
        			<h4>手机通讯</h4>
        			<p class="p1">荣耀畅想5s</p>
        			<p>预约抽手机</p>
        			</a>
        		</li>
        		<li class="li02 end"><a href="#">
        			<h4>母婴用品</h4>
        			<p>抢1200元生日礼金</p>
        			</a>
        		</li>
        		<li class="li03"><a href="#">
        			<h4>美妆个护</h4>
        			<p>卡姿兰CC霜129元</p>
        			</a>
        		</li>
        		<li class="li04 end"><a href="#">
        			<h4>美食街</h4>
        			<p>阿胶糕120g一元抢</p>
        			</a>
        		</li>
        	</ul>
        </div> 
    </div> -->
<!-- 热门市场 STRAT -->

<!-- 特色市场 STRAT -->
    <div class="specialgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">男装*女装</h3>
	        <i class="fl"></i>
        </div> 
        <div class="sales">
        	<ul>
            <?php if(is_array($goods)): $k = 0; $__LIST__ = array_slice($goods,4,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="li02">
                    <a href="<?php echo U('Goods/details',array('id'=>$vo['id']));?>">
            			<!-- <h4></h4> -->
            			<p><?php echo ($vo["goodsname"]); ?></p>
            			<img src="/uploads/n1/<?php echo reset(explode(',',$vo['image']));?>" alt="">
                    </a>
        		</li><?php endforeach; endif; else: echo "" ;endif; ?>	
        	</ul>
        </div>  
    </div>
    <div class="specialgoods market">
        <div class="title clearfix">
            <i class="fl"></i>
            <h3 class="fl">男鞋*女鞋</h3>
            <i class="fl"></i>
        </div> 
        <div class="sales">
            <ul>
            <?php if(is_array($goods2)): $k = 0; $__LIST__ = array_slice($goods2,4,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k % 2 );++$k;?><li class="li02">
                    <a href="<?php echo U('Goods/details',array('id'=>$vo2['id']));?>">
                        <p><?php echo ($vo2["goodsname"]); ?></p>
                        <!-- <p>闲置商品换钱</p> -->
                        <img src="/uploads/n1/<?php echo reset(explode(',',$vo2['image']));?>" alt="">
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>   
            </ul>
        </div>  
    </div>
    <div class="specialgoods market">
        <div class="title clearfix">
            <i class="fl"></i>
            <h3 class="fl">精品配饰</h3>
            <i class="fl"></i>
        </div> 
        <div class="sales">
            <ul>
            <?php if(is_array($goods4)): $k = 0; $__LIST__ = $goods4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($k % 2 );++$k;?><li class="li02">
                    <a href="<?php echo U('Goods/details',array('id'=>$vo4['id']));?>">
                        <p><?php echo ($vo4["goodsname"]); ?></p>
                        <!-- <p>闲置商品换钱</p> -->
                        <img src="/uploads/n1/<?php echo reset(explode(',',$vo4['image']));?>" alt="">
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>   
            </ul>
        </div>  
    </div>
    <div class="specialgoods market">
        <div class="title clearfix">
            <i class="fl"></i>
            <h3 class="fl">箱包大全</h3>
            <i class="fl"></i>
        </div> 
        <div class="sales">
            <ul>
            <?php if(is_array($goods3)): $k = 0; $__LIST__ = $goods3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($k % 2 );++$k;?><li class="li02">
                    <a href="<?php echo U('Goods/details',array('id'=>$vo3['id']));?>">
                        <p><?php echo ($vo3["goodsname"]); ?></p>
                        <!-- <p>闲置商品换钱</p> -->
                        <img src="/uploads/n1/<?php echo reset(explode(',',$vo3['image']));?>" alt="">
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>   
            </ul>
        </div>  
    </div>
    
<!-- 特色市场 STRAT -->

<!-- 底部导航 STRAT -->
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

<script src="/Shop/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Shop/Public/Mobile/js/index.js"></script>
<script type="text/javascript">
    $(function(){
        $(".i1").parent().addClass('on');
    })
</script>
</body>
</html>