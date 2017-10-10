<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="/Public/Mobile/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Mobile/js/TouchSlide.1.1.js" type="text/javascript"></script>
    <script src="/Public/Mobile/integral/js/jquery.lazyload.js" type="text/javascript"></script>
    <title>移动端积分商城首页</title>
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
    </style>
</head>
<body>
<!-- 头部搜索框 START -->
<div class="search">
    <h1 class="logo"></h1>
    <input type="text" id="search" placeholder="动动手指，总有一款是你想要的">
    <i></i>
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
                <?php if(is_array($adInfo)): $i = 0; $__LIST__ = $adInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Detail/detail',array('id'=>$val['gid']));?>"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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

<!-- 网站推荐 START -->
<div class="tspecial market">
    <div class="title clearfix">
        <i class="fl"></i>
        <h3 class="fl"><img src="/Public/Mobile/images/present.png" alt="" style="width: 0.38rem;height: 0.28rem"/><span style="color: red">积分商城</span></h3>
        <i class="fl"></i>
    </div>
    <div class="sales">
        <ul>
            <?php if(is_array($goodsList)): $k = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k%2 == 0): ?><li class="ts<?php echo ($k); ?> end" style="background: url(/Uploads/integralGoodsPic/<?php echo ($val["pic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;height: 4.6rem;border: 0.01rem solid hotpink"><a href="<?php echo U('IntegralDetail/integralDetail');?>?id=<?php echo ($val['id']); ?>"><p style="bottom: 0.7rem;background: #f5f5f5;color: #25bc00"><i><?php echo (truncate_cn($val["goodsname"],35,'',0)); ?>...</i></p><p style="bottom: 0.35rem;text-align: left;padding-left: 0.25rem;background: #f5f5f5;color: red">积分：<?php echo ($val["points"]); ?></p><p style="text-align: right;padding-right: 0.2rem;background: #f5f5f5"><span style="border: 0.05rem solid #f43838;background-color: #f43838;margin-bottom: 0.2rem;padding: 0.1rem;border-radius: 0.1rem">立即兑换</span></p></a></li>
                    <?php else: ?>
                    <li class="ts<?php echo ($k); ?>" style="background: url(/Uploads/integralGoodsPic/<?php echo ($val["pic"]); ?>) no-repeat 0 0; background-size: 3.52rem 3.52rem;height: 4.6rem;border: 0.01rem solid yellowgreen"><a href="<?php echo U('IntegralDetail/integralDetail');?>?id=<?php echo ($val['id']); ?>"><p style="bottom: 0.7rem;background: #f5f5f5;color: #25bc00"><i><?php echo (truncate_cn($val["goodsname"],35,'',0)); ?>...</i></p><p style="bottom: 0.35rem;text-align: left;padding-left: 0.25rem;background: #f5f5f5;color: red">积分：<?php echo ($val["points"]); ?></p><p style="text-align: right;padding-right: 0.2rem;background: #f5f5f5"><span style="border: 0.05rem solid #f43838;background-color: #f43838;margin-bottom: 0.2rem;padding: 0.1rem;border-radius: 0.1rem">立即兑换</span></p></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- 网站推荐 START -->


<!-- 底部导航 STRAT -->
<div class="outside">
    <div class="footer">
        <ul>
            <li style="width: 25%;text-align: center"><a href="<?php echo U('Index/index');?>">
                <i class="on"><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li style="width: 25%;text-align: center"><a href="<?php echo U('Category/index');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li style="width: 25%;text-align: center"><a href="<?php echo U('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end" style="width: 25%;text-align: center"><a href="<?php echo U('UserCenter/usercenter');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!-- 底部导航 STRAT -->
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<!--<script src="/Public/Mobile/js/index.js"></script>-->
</body>
</html>