<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="/Public/Mobile/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Mobile/js/TouchSlide.1.1.js" type="text/javascript"></script>
<title>移动端商城首页</title>
<meta name="description" content="洋货是一个专注于做潮流商品收售的商城app">
<meta name="keywords" content="洋货,潮流,时尚,商品收售,APP商城">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="/Public/Mobile/css/index.css" rel="stylesheet">
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
    <style type="text/css">
        /* 本例子css -------------------------------------- */
        .tabBox .hd{ height:0.4rem; line-height:0.4rem; padding:0 0.1rem; font-size:0.2rem; background:#f4f4f4; border-bottom:0.01rem solid #F5AB38; position:relative;  }
        .tabBox .hd ul{ position:absolute; height:0.41rem; top:0; overflow:hidden;  }
        .tabBox .hd ul li{ float:left; padding:0 0.1rem; color:#666;  }
        .tabBox .hd ul .on{ border:0.02rem solid #F5AB38; border-bottom-color:#fff; background:#fff; color:#CF7F21;   }
        .tabBox .hd ul .on a{ display:block; /* 修复Android 4.0.x 默认浏览器当前样色无效果bug */  }
        .tabBox .bd ul{ padding:0.1rem 0 0.1rem 0.1rem;  }
        .tabBox .bd li{ height:0.33rem; line-height:0.33rem;   }
        .tabBox .bd li a{ color:#666;  }
        .tabBox .bd li a{ -webkit-tap-highlight-color:rgba(0,0,0,0); }  /* 去掉链接触摸高亮 */


        .rushup .time-l {
            line-height: 0.26rem;
            color: #f8313a;
            font-size: 0.24rem;
            margin-left: 0;
            font-weight: bold;
            margin-right: 0.1rem;
        }
        .rushup #time {
            line-height: 0.26rem;
            color: #f8313a;
            font-size: 0.24rem;
            font-weight: bold;
            margin-right: 0.1rem;
        }
        .sear { height: 0.7rem; width: 0.6rem; float: right;
            background: url("/Public/Mobile/images/search1.png") no-repeat;
            background-size: 0.5rem;
            margin-top: 0.15rem;
            background-position: center;
        }
        .search #search {
            border: 0;
            width: 6.1rem;
            height: 0.6rem;
            background: #fff;
            color: #333;
            font-size: 0.24rem;
            text-align: center;
            position: absolute;
            top: 16%;
            left: 10%;
            border-radius: 0.08rem;
        }
        .search .logo {
            background: url("/Public/Mobile//images/logo.png") no-repeat 0.2rem 0.14rem;
            width: 0.8rem;
            height: 1rem;
            background-size: 0.5rem 0.5rem;
            display: inline-block;
        }
        .rushdown p {
            font-size: 0.20rem;
            color: #666;
            line-height: 0.20rem;
        }
        .easynav { background: #fff; width: 100%; height: 2rem; padding: 0.3rem 0.3rem 0;}
        .easynav ul { font-size: 0;}
        .easynav ul li { display: inline-block; *display: inline; *zoom: 1;margin-right: 1.08rem; text-align: center; width: auto;}
        .easynav ul .end { margin-right: 0;}
        .easynav ul li a { display: block;}
        .easynav ul li a .bg1 { display:block; width: 0.8rem; height: 0.8rem; border-radius: 0.4rem; line-height: 0.8rem;  background: #f8313a; transition: all .8s ease; margin: 0 auto;}
        .easynav ul li a .bg2 { display:block; width: 0.8rem; height: 0.8rem; border-radius: 0.4rem; line-height: 0.8rem;  background: #b1f060; transition: all .8s ease; margin: 0 auto;}
        .easynav ul li a .bg3 { display:block; width: 0.8rem; height: 0.8rem; border-radius: 0.4rem; line-height: 0.8rem;  background: #6d43d9; transition: all .8s ease; margin: 0 auto;}
        .easynav ul li a .bg4 { display:block; width: 0.8rem; height: 0.8rem; border-radius: 0.4rem; line-height: 0.8rem;  background: #f7ea55; transition: all .8s ease; margin: 0 auto;}
        .easynav ul li a img { transform: rotate(0deg); transition: all .5s; width: 0.33rem; height: 0.33rem;}
        .easynav ul li a img { transform:rotate(360deg);}
        .easynav ul li  p { font-size: 0.26rem; color: #333; line-height: 0.3rem; padding-top: 0.3rem; height: 0.6rem;}

    </style>
</head>
<script type="text/javascript">
       $(function(){
              search=function(){
                         keywords=$('#search').val();
                         location.href="<?php echo U('goodslist/index');?>?keywords="+keywords;
              }
       })
</script>
<body>
<!-- 头部搜索框 START -->
    <div class="search">
        <h1 class="logo"></h1>
        <input type="text" id="search" class="search1" name="keywords" placeholder="动动手指，总有一款是你想要的">
         <div class="sear" onclick="search()"></div>
    </div>
<!-- 头部搜索框 END -->

<!-- BANNER STRAT-->
<div class="banner">


<!--------------------轮播图循环----------------------->
    <div id="focus" class="focus">
        <div class="hd">
            <ul></ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($naviInfo)): $i = 0; $__LIST__ = $naviInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Detail/detail',array('id'=>$val['gid']));?>"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#focus",
            titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell:".bd ul",
            effect:"leftLoop",
            autoPlay:true,//自动播放
            autoPage:true //自动分页
        });



    </script>


</div>

<!-- BANNER END-->

<!-- 快捷导航 STRAT -->
    <div class="easynav">
            <ul>
                <li>
                    <a href="<?php echo U('Seckill/index');?>">
                        <i class="bg1"><img src="/Public/Mobile/images/re1.png" alt=""></i>
                    </a>
                    <p>热销</p>
                </li>
                <li>
                    <a href="#">
                        <i class="bg2"><img src="/Public/Mobile/images/tuan.png" alt=""></i>
                    </a>
                    <p>团购</p>
                </li>
                <li>
                    <a href="<?php echo U('Integral/integral');?>">
                        <i class="bg3"><img src="/Public/Mobile/images/ji.png" alt=""></i>
                    </a>
                    <p>积分商城</p>
                </li>
                <li class="end">
                    <a href="#">
                        <i class="bg4"><img src="/Public/Mobile/images/qian.png" alt=""></i>
                    </a>
                    <p>签到</p>
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
                <?php if(is_array($leftRecom)): $i = 0; $__LIST__ = $leftRecom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Detail/detail',array('id'=>$val['gid']));?>" style="color: #000000;font-size:0.2rem;"><p class="p1"><?php echo (truncate_cn($val["goodsname"],45,'',0)); ?>...</p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
<!-- 洋货头条 END -->

<!-- 争分夺秒 STRAT -->
    <div class="rushup">
        <div class="title clearfix">
            <div class="time-l fl" id="time-h">

            </div>
            <div class="time-r fl" id="time">

            </div>
            <div class="more fr"><a href="<?php echo U('Seckill/index');?>">查看更多&gt;&gt;</a></div>
        </div>
        <ul class="pro">
            <li><a href="<?php echo U('detail/detail');?>?id=<?php echo ($newgoods[3]['id']); ?>">
                <div class="img clearfix"><img src="/Uploads/goodsPic/800/800_<?php echo ($newgoods[3][pic]); ?>" alt=""><span><i class="l1 fl"></i><p class="fl"><?php echo (mb_substr($newgoods[3]['goodsname'],0,7,'utf-8')); ?></p></span></div>
                <div class="price clearfix"><span class="l fl" style="font-size: 0.2rem">￥<?php echo (substr($newgoods[3]['oldprice'],0,-3)); ?></span><span class="r fr" style="font-size: 0.2rem">￥<?php echo (substr($newgoods[3]['price'],0,-3)); ?></span></div>
            </a></li>
            <li><a href="<?php echo U('detail/detail');?>?id=<?php echo ($hotsalegoods[3]['id']); ?>">
                <div class="img clearfix"><img src="/Uploads/goodsPic/800/800_<?php echo ($hotsalegoods[3][pic]); ?>" alt=""><span><i class="l2 fl"></i><p class="fl"><?php echo (mb_substr($hotsalegoods[3]['goodsname'],0,5,'utf-8')); ?></p></span></div>
                <div class="price clearfix"><span class="l fl" style="font-size: 0.2rem">￥<?php echo (substr($hotsalegoods[3]['oldprice'],0,-3)); ?></span><span class="r fr" style="font-size: 0.2rem">￥<?php echo (substr($hotsalegoods[3]['price'],0,-3)); ?></span></div>
            </a></li>
            <li class="end"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($hotsalegoods[3]['id']); ?>">
                <div class="img clearfix"><img src="/Uploads/goodsPic/800/800_<?php echo ($hotsalegoods[4][pic]); ?>" alt=""><span><i class="l3 fl"></i><p class="fl"><?php echo (mb_substr($hotsalegoods[4]['goodsname'],0,5,'utf-8')); ?></p></span></div>
                <div class="price clearfix"><span class="l fl" style="font-size: 0.2rem">￥<?php echo (substr($hotsalegoods[4]['oldprice'],0,-3)); ?></span><span class="r fr" style="font-size: 0.2rem">￥<?php echo (substr($hotsalegoods[4]['price'],0,-3)); ?></span></div>
            </a></li>

        </ul>
    </div>
    <div class="rushdown clearfix">
        <div class="fl"><a href="<?php echo U('goodslist/index');?>?category1=<?php echo ($newgoods[0]['cid']); ?>"><div class="rushdown1 w" style="background: url(/Uploads/goodsPic/800/800_<?php echo ($newgoods[0]['pic']); ?>) no-repeat 0.32rem 1.5rem;
  background-size: 1.98rem 1.98rem;"><h4>新品</h4><p><?php echo (mb_substr($newgoods[0]['goodsname'],0,8,'utf-8')); ?></p><span>￥<?php echo (substr($newgoods[0]['price'],0,-3)); ?></span></div></a></div>
        <div class="fr"><a href="<?php echo U('goodslist/index');?>?category1=<?php echo ($hotsalegoods[0]['cid']); ?>"><div class="rushdown2 w" style="  background: url(/Uploads/goodsPic/800/800_<?php echo ($hotsalegoods[0]['pic']); ?>) no-repeat 2.87rem 0.5rem;
  background-size: 1.52rem 1.52rem;"><h4>热销</h4><p class="p1"><i><?php echo (mb_substr($hotsalegoods[0]['goodsname'],0,4,'utf-8')); ?>1.8折起</i></p><p><i><?php echo (mb_substr($hotsalegoods[2]['goodsname'],0,4,'utf-8')); ?> 买一送一</i></p><span><i>￥<?php echo (substr($hotsalegoods[0]['price'],0,-3)); ?></i></span></div></a></div>
        <div class="fr t1"><a href="<?php echo U('goodslist/index');?>?brand=48"><div class="rushdown3 w" style="background: url(/Uploads/goodsPic/800/800_<?php echo ($hotsalegoods[3]['pic']); ?>) no-repeat 0.95rem 0.76rem;
  background-size: 1.2rem 1.2rem;"><h4>品牌</h4><p>双十二降价</p><span><i>￥<?php echo (substr($hotsalegoods[3]['price'],0,-3)); ?></i></span></div></a></div>
        <div class="fr t2"><a href="<?php echo U('goodslist/index');?>?category1=<?php echo ($hotsalegoods[1]['cid']); ?>"><div class="rushdown4 w" style="background: url(/Uploads/goodsPic/800/800_<?php echo ($hotsalegoods[4]['pic']); ?>) no-repeat 0.95rem 0.76rem;
  background-size: 1.2rem 1.2rem;"><h4>限时促销</h4><p>前200名买一送一</p><span><i>￥<?php echo (substr($hotsalegoods[4]['price'],0,-3)); ?></i></span></div></a></div>
    </div>
<!-- 争分夺秒 END -->

<!-- 今日特惠 START -->
<div class="tspecial market">
    <div class="title clearfix">
        <i class="fl"></i>
        <h3 class="fl">网站推荐</h3>
        <i class="fl"></i>
    </div>
    <div class="sales">
        <ul>
            <?php if(is_array($recommedInfo)): $k = 0; $__LIST__ = $recommedInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k%2 == 0): ?><li class="ts<?php echo ($k); ?> end" style="background: url(/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;"><a href="<?php echo U('Detail/detail',array('id'=>$val['gid']));?>"><p><i><?php echo (truncate_cn($val["goodsname"],35,'',0)); ?>...</i></p></a></li>
                    <?php else: ?>
                    <li class="ts<?php echo ($k); ?>" style="background: url(/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;"><a href="<?php echo U('Detail/detail',array('id'=>$val['gid']));?>"><p><i><?php echo (truncate_cn($val["goodsname"],35,'',0)); ?>...</i></p></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- 今日特惠 START -->
<div class="tspecial market">
    <div class="title clearfix">
        <i class="fl"></i>
        <h3 class="fl">乌龙茶系列</h3>
        <i class="fl"></i>
    </div>
    <div class="sales">
        <ul>
            <?php if(is_array($goodsinfo1)): $k = 0; $__LIST__ = $goodsinfo1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k%2 == 0): ?><li class="ts<?php echo ($k); ?> end" style="background: url(/Uploads/goodsPic/<?php echo ($val["pic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><p><i><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>￥<?php echo ($val['price']); ?></i></p></a></li>
                    <?php else: ?>
                    <li class="ts<?php echo ($k); ?>" style="background: url(/Uploads/goodsPic/<?php echo ($val["pic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><p><i><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>￥<?php echo ($val['price']); ?></i></p></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- 网站推荐 START -->

<!-- 网站推荐 START -->


<!-- 热门市场 START -->
    <div class="hotgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">绿茶系列</h3>
	        <i class="fl"></i>
        </div>
        <div class="sales">
        	<ul>
                <?php if(is_array($goodsinfo2)): $k = 0; $__LIST__ = $goodsinfo2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k%2 == 0): ?><li class="li0<?php echo ($k); ?> end" style="background: url(/Uploads/goodsPic/800/800_<?php echo ($val["pic"]); ?>) no-repeat 2.1rem 0.78rem; background-size: 0.86rem 1.34rem;">
                        <?php else: ?>
                        <li class="li0<?php echo ($k); ?>" style="background: url(/Uploads/goodsPic/800/800_<?php echo ($val["pic"]); ?>) no-repeat 2.1rem 0.78rem; background-size: 0.86rem 1.34rem;"><?php endif; ?>
                            <a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
                                <h4><?php echo (mb_substr($val['goodsname'],0,4,'utf-8')); ?></h4>
                                <p class="p1"><?php echo (mb_substr($val['goodsname'],4,8,'utf-8')); ?></p>
                                <p><?php echo (mb_substr($val['goodsname'],6,9,'utf-8')); ?></p>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

        	</ul>
        </div> 
    </div>
<!-- 热门市场 STRAT -->

<!-- 特色市场 STRAT -->
    <div class="specialgoods market">
        <div class="title clearfix">
	        <i class="fl"></i>
	        <h3 class="fl">茶具系列</h3>
	        <i class="fl"></i>
        </div> 
        <div class="sales">
        	<ul>
                <?php if(is_array($goodsinfo3)): $k = 0; $__LIST__ = $goodsinfo3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k%2 == 0): ?><li class="li0<?php echo ($k); ?> end">
                        <?php else: ?>
                        <li class="li0<?php echo ($k); ?>"><?php endif; ?>
                    <a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
        			<h4><?php echo (mb_substr($val['goodsname'],0,6,'utf-8')); ?></h4>
        			<p><?php echo (mb_substr($val['goodsname'],6,9,'utf-8')); ?></p>
        			<img src="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" alt=""></a>
        		</li><?php endforeach; endif; else: echo "" ;endif; ?>
        	</ul>
        </div>  
    </div>
<!-- 特色市场 STRAT -->



<!-- 特色市场 STRAT -->



<!-- 底部导航 STRAT -->
<div class="outside">
    <div class="footer">
   		<ul style="width: 100%">
   			<li><a href="<?php echo U('Index/index');?>">
   				<i class="on"><span class="i1"></span></i>
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
   				<i><span class="i4"></span></i>
   				<h5>我的</h5>
   			</a></li>
   		</ul>
    </div>
</div>
<!-- 底部导航 STRAT -->
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/index.js"></script>
</body>
</html>