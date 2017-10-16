<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>分类</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
      <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
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
<body style="background-color: #fff;">
	<header class="page-header fixed-header">

        <form action="<?php echo U('Mobile/ProductList/searchList');?>" method="get" id="SearchGoods">
            <input type="text" name="search" id="searchwords" placeholder="我爱吃零食^^" />
            <a class="mui-btn mui-btn-primary sch-submit" href="javascript:document:SearchGoods.submit();">
                <span>
			        <img src="/Public/Mobile/images/serach.png"/>
		        </span>
            </a>
        </form>
	</header>
	
	<div class="contaniner fixed-cont">
		<aside class="assort">
			<ul>
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                        <img src="/Public/Mobile/images/cate/cate<?php echo ($val['id']); ?>.png"/>
                        <a href="<?php echo U('Mobile/ProductList/productList',array('id'=>$val['id']));?>"><span><?php echo ($val["catename"]); ?></span></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</aside>
		
		<section class="assort-cont">
			<figure>
				<a href="#">
					<img src="/Public/Mobile/images/classify-ph01.png"/>
				</a>
			</figure>
			<dl>
				<dt>新品推荐</dt>
                <?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><dd>
                        <a href="<?php echo U('Detail/detail',array('gid'=>$val1['id']));?>">
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($val1["pic"]); ?>"/>
                            <p><?php echo (mb_substr($val1["goodsname"],0,6,'utf-8')); ?>...</p>
                        </a>
                    </dd><?php endforeach; endif; else: echo "" ;endif; ?>
			</dl>
			<dl>
				<dt>热销专区</dt>
                <?php if(is_array($salelist)): $i = 0; $__LIST__ = $salelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><dd>
                        <a href="#">
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($val2["pic"]); ?>"/>
                            <p><?php echo (mb_substr($val2["goodsname"],0,6,'utf-8')); ?>...</p>
                        </a>
                    </dd><?php endforeach; endif; else: echo "" ;endif; ?>
			</dl>
		</section>
	</div>
	
	<footer class="page-footer fixed-footer">
		<ul>
			<li>
				<a href="<?php echo U('Mobile/Index/index');?>">
					<img src="/Public/Mobile/images/footer001.png"/>
					<p>首页</p>
				</a>
			</li>
			<li class="active">
				<a href="<?php echo U('Mobile/Category/cateList');?>">
					<img src="/Public/Mobile/images/footer02.png"/>
					<p>分类</p>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Mobile/Cart/cartList');?>">
					<img src="/Public/Mobile/images/footer003.png"/>
					<p>购物车</p>
				</a>
			</li>
			<li>
				<a href="javascript:islogin()">
					<img src="/Public/Mobile/images/footer004.png"/>
					<p>个人中心</p>
				</a>
			</li>
		</ul>
	</footer>
    <input name="mid" value="<?php echo (session('mid')); ?>" id="mid">
	<script>
        //判断用户是否登陆
        function islogin(){
            var mid=$("#mid").val();
            if(mid){
                location.href="<?php echo U('Personal/personalList');?>";
            }else{
                //信息框
                layer.open({
                    content:"登陆后才能进入"
                    ,btn: ['去登陆','再逛逛']
                    ,yes:function(index){
                        location.href="<?php echo U('Login/login');?>";
                        layer.close(index);
                    }
                });
            }
        }
    </script>
</body>
</html>