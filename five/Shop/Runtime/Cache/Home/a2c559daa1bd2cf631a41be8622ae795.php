<?php if (!defined('THINK_PATH')) exit();?>
<link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/Home/css/snow.css">
<!-- <link rel="stylesheet" href="css/responsive.css">  -->
<script src="/Public/Home/js/jquery-1.8.3.min.js"></script>
<script src="/Public/Home/js/snowstorm-min.js"></script>

<body>
<!-- 头部 -->
<div id="hero">
	<div class="redoverlay">
		<div class="container">
			<div class="row">
				<div class="herotext">
					<h1 class="wow flipInY">云和商城特卖会</h1>
					<img style="margin-top:200px;" src="/Public/Home/images/img/bell.png" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 头部结束 -->
<div id="overview" class="container">       
	<div class="sectionhead">            
		<h2> <span class="highlight">店长推荐商品</span></h2>
		<hr>
	</div>
	<!--循环商品-->
	<div class="row">
        <?php if(is_array($one)): $i = 0; $__LIST__ = $one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="col-md-6 col-lg-4">
			<a href="<?php echo U('Detail/detail',array('gid'=>$val['id']));?>"><img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($val['pic']); ?>" alt=""></a>
			<h4><?php echo ($val["goodsname"]); ?></h4>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
<!-- 循环商品结束 -->
</div>
<div class="calltoaction">
<div class="lightoverlay">
	<div class="container">
		<div class="col-md-4">
			<img src="/Public/Home/images/img/tree.gif" alt="">
		</div>
<!--心灵鸡汤 看不懂-->
		<div class="sectionhead content col-md-8">
			<h2>Best <span class="highlight">free landing page</span> template</h2>
			<p>SantaGo is another free Christmas sales and affiliate landing page template built and distributed as a small cristmas gift under Creative Commons 3.0 license. If you have any question, suggestion or need assistance, feel free to anytime.
</p>
		</div>
        <!--心灵鸡汤结束-->
	</div>
</div>
</div>

<div id="products" class="container">

	<div class="sectionhead text-center">
		<h2>疯狂 <span class="highlight">清仓</span> 处理</h2>
		<hr>
	</div>

	<div class="row moreitems">
		<div class="col-md-6">
			<div class="col-md-4 text-center">
				<a href=""><img class="productimg" src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($one[0]['pic']); ?>" alt=""></a>
				<div class="smalltag offertag percentoffer">
					<h4>30%</h4>
					<p>off</p>
				</div>
			</div>
			<div class="col-md-8">
				<h4><a href=""><?php echo (mb_substr($one[0]['goodsname'],0,15,'utf-8')); ?></a></h4>
				<p style="height: 70px;"><?php echo ($one[0]['introduction']); ?></p>
				<p class="price">US <span class="highlight">$4.25</span> / piece</p>
				<p>Original Price: US $8.49 , You Save:US $4.24</p>
			</div>
		</div>
        <div class="col-md-6">
            <div class="col-md-4 text-center">
                <a href="">
                    <img class="productimg" src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($one[1]['pic']); ?>" alt="">
                </a>
                <div class="smalltag offertag percentoffer">
                    <h4>30%</h4>
                    <p>off</p>
                </div>
            </div>
            <div class="col-md-8">
                <h4><a href=""><?php echo (mb_substr($one[1]['goodsname'],0,15,'utf-8')); ?></a></h4>
                <p style="height: 70px;"><?php echo ($one[1]['introduction']); ?></p>
                <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                <p>Original Price: US $8.49 , You Save:US $4.24</p>
            </div>
        </div>
	</div>
</div>
</body>
</html>