<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>商品推荐列表</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="/Public/Mobile/css/seckill.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/seckill.js"></script>
<link href="/Public/Mobile/css/index.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery.lazyload.js" type="text/javascript"></script>
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
    <!--图片延迟加载-->
    <script type="text/javascript">
        $(function(){
            $('img').lazyload({
                effect:"fadeIn"
            })
        })
    </script>
</head>
<style>
   .on{
       background-color: #FF3300;
   }
   .header ul li p{ padding-top: 0.2rem;}
   .header ul li{
      margin: 0 0.3rem;
       border: 0;
   }
   .Bar {
       position: absolute;
       bottom: 0.2rem;
       left: 2.8rem;
       width: 2rem;
       background:white;
       padding: 0.01rem;
       border-radius:0;
   }
   .Bar div {
       display: block;
       position: relative;
       background:white;
       height: 0.4rem;
       line-height: 0.4rem;
       border-radius:0;
   }
   .Bar div span a {
       color: #000000;
       position: absolute;
       width: 3rem;
       text-indent: 0.25rem;
       font-size: 0.18rem;
   }
   .purchase {
       background: #fff;
       width: 100%;
       height: 16.23rem;
       margin-top: 0.3rem;
       padding-top: 0.2rem;
       position: relative;
   }
   #time {
       width: 2.22rem;
       height: 0.5rem;
       border-radius: 0.06rem;
       background: space;
       position: absolute;
       top: 0.1rem;
       left: 3rem;
       font-size: 0.24rem;
       line-height: 0.5rem;
       margin-top: 0.07rem;
   }
   .purchase p span {
       float: right;
       margin-right: 3rem;
       color: red;
       text-align: center;
   }
</style>
<body>
<script type="text/javascript">
       $(function(){
           $('.wrapper ul li').click(function(){
                   $(this).addClass('on').siblings('li').removeClass('on');
           })
           /*----------------------------*/

           $('#a').click(function(){
                  $(".purchase").css({display:'none'});
                   $('#one').css("display","block");
           })
           $('#b').click(function(){
               $(".purchase").css({display:'none'});
               $('#two').css("display","block");
           })
           $('#c').click(function(){
               $(".purchase").css({display:'none'});
               $('#three').css("display","block");
           })


       })
</script>

 <!--头部开始-->
 <div class="header">
  <div class="wrapper" id="wrapper3" style="text-align: center">
     <ul>
         <li class="" id="a">
             <a href="#">
                     <p>新品推荐</p>
             </a>
        </li>
         <li class="on" id="b">
             <a href="#">
                 <p>热销产品</p>

             </a>
         </li>
         <li class="" id="c">
             <a href="#">
                 <p>限时促销</p>
             </a>
         </li>
     </ul>

     </div>


 </div>
 <!-- 抢购 -->
<div class="purchase" id="one" style="display: none">

    <div class="wrapper">

       <?php if(is_array($newgoods)): $i = 0; $__LIST__ = $newgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content clearfix">
            <div class="fl pic01"><img class="lazy" data-original="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" src="/Public/Mobile/images/loading.gif" alt=""></div>
            <div class=" fl">
                <p ><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
                    <?php echo (mb_substr($val['goodsname'],0,30,'utf-8')); ?>
                </a></p>
                <p>￥<?php echo (substr($val['price'],0,-3)); ?></p><p>￥<?php echo (substr($val['oldprice'],0,-3)); ?></p>
                <p>
                <div class="Bar">
                    <div>
                        <span><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><?php echo ($val['commentnum']); ?>人已评价</a></span>
                    </div>
                </div>
                </p>

                <p class="meu02"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">立即购买</a></p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
</div>

<div class="purchase" id="two">
    <div class="wrapper">
    <?php if(is_array($hotsalegoods)): $i = 0; $__LIST__ = $hotsalegoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content clearfix">
            <div class="fl pic01"><img class="lazy" data-original="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" src="/Public/Mobile/images/loading.gif" alt=""></div>
            <div class=" fl">
                <p ><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
                    <?php echo (mb_substr($val['goodsname'],0,30,'utf-8')); ?>
                </a></p>
                <p>￥<?php echo (substr($val['price'],0,-3)); ?></p><p>￥<?php echo (substr($val['oldprice'],0,-3)); ?></p>

                <p>
                <div class="Bar">
                    <div>
                        <span><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><?php echo ($val['commentnum']); ?>人已评价</a></span>
                    </div>
                </div>
                </p>

                <p class="meu02"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">立即购买</a></p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<div class="purchase" id="three" style="display: none">
    <div class="wrapper">
        <?php if(($nowtime < $endtime)): ?><p>
            <i></i>
            距活动结束还有
            <!-- <span>22:03:04</span> -->
            <span id="time">

            </span>
        </p>
    <?php if(is_array($hotsalegoods)): $i = 0; $__LIST__ = $hotsalegoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content clearfix">
            <div class="fl pic01"><img class="lazy" data-original="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" src="/Public/Mobile/images/loading.gif" alt=""></div>
            <div class=" fl">
                <p ><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">
                    <?php echo (mb_substr($val['goodsname'],0,30,'utf-8')); ?>
                </a></p>
                <p>￥<?php echo (substr($val['price'],0,-3)); ?></p><p>￥<?php echo (substr($val['oldprice'],0,-3)); ?></p>

                <p>
                <div class="Bar">
                    <div>
                        <span><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>"><?php echo ($val['commentnum']); ?>人已评价</a></span>
                    </div>
                </div>
                </p>

                <p class="meu02"><a href="<?php echo U('detail/detail');?>?id=<?php echo ($val['id']); ?>">立即购买</a></p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php elseif(($nowtime > $endtime)): ?>
            <p>
                <i></i>
              活动已结束
                <!-- <span>22:03:04</span> -->
            <span id="time" style="display: none">

            </span>
            </p>
            <?php if(is_array($hotsalegoods)): $i = 0; $__LIST__ = $hotsalegoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content clearfix">
                    <div class="fl pic01"><img class="lazy" data-original="/Uploads/goodsPic/800/800_<?php echo ($val['pic']); ?>" src="/Public/Mobile/images/loading.gif" alt=""></div>
                    <div class=" fl">
                        <p ><a href="#">
                            <?php echo (mb_substr($val['goodsname'],0,30,'utf-8')); ?>
                        </a></p>
                        <p>￥<?php echo (substr($val['price'],0,-3)); ?></p><p>￥<?php echo (substr($val['oldprice'],0,-3)); ?></p>

                        <p>
                        <div class="Bar">
                            <div>
                                <span><a href="#"><?php echo ($val['commentnum']); ?>人已评价</a></span>
                            </div>
                        </div>
                        </p>

                        <p class="meu02"><a href="#">已结束</a></p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
</div>











 <!-- 底部 -->
 <!--<div class="foot">
 <div class="wrapper">
     <p><a href="#" class="now">正在抢购</a></p>
     <p ><a href="#">明日预告</a></p>
</div>
 </div>-->
<div class="outside">
    <div class="footer">
        <ul>
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
</body>
<script src="/Public/Mobile/js/index.js"></script>
</html>