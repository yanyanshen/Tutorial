<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>商品分类</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/class.css" rel="stylesheet">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script> -->
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
    <style>
        .header .search input {
            width: 5.85rem;
            height: 0.7rem;
            font-size: 0.24rem;
            margin-top: 0.2rem;
            background: #fff;
            padding-left: 0.55rem;
        }
        .sear { height: 0.52rem; width: 0.52rem; float: right;
            background: url("/Public/Mobile/images/search1.png") no-repeat;
            background-size: 0.5rem;
            margin-top: 0.4rem;

            background-position: center;
        }
    </style>
</head>
<script type="text/javascript">
    $(function(){
        search=function(){
            keywords=$('.txt').val();
            location.href="<?php echo U('goodslist/index');?>?keywords="+keywords+"<?php echo ($brand?'&brand=':''); echo ($brand?$brand:''); echo ($category1?'&category1=':''); echo ($category1?$category1:''); echo ($order?'&order=':''); echo ($order?$order:''); ?>";
        }
    })
</script>
<!--头部-->
<body>
<div class="header">
    <div class="wrapper">
        <div class="search">
            <input class="txt" name="keywords" type="text" placeholder="输入商品名称关键字" value="<?php echo ($keywords); ?>">
            <div class="sear" onclick="search()"></div>
        </div>
    </div>
</div>

<!--热销分类-->
<div class="class clearfix">
    <div class="left fl">
        <ul class="clearfix">
            <li class="active">热门推荐</li>
            <?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><?php echo ($val['catename']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
    <div class="right fl">      
        <div>
            <ul class="ul01">
                <div class="title01">热销品类</div>
                <?php if(is_array($hotcate)): $k = 0; $__LIST__ = $hotcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li0<?php echo ($k); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($goodsinfo[$k]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul02">
                <div class="title02">新品上架</div>
                <?php if(is_array($newcate)): $k = 0; $__LIST__ = $newcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if(($k+6 < 10)): ?><li class="li0<?php echo ($k+6); ?>">
                        <?php else: ?>
                        <li class="li<?php echo ($k+6); ?>"><?php endif; ?>
                  <a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($newgoods[$k]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul03">
                <div class="title03">绿茶</div>
                <?php if(is_array($greentea)): $k = 0; $__LIST__ = $greentea;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+12); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($newgoods[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <ul class="ul04">
                <div class="title04">热销品牌</div>
                <?php if(is_array($hotbrand)): $k = 0; $__LIST__ = $hotbrand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+15); ?>"><a href="<?php echo U('Goodslist/index');?>?brand=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($newgoods[$k+10]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['brandname']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            </div>
            <div>
                <ul class="ul05">
                    <div class="title05">热销品类</div><!--乌龙茶-->
                      <?php if(is_array($wulongcate)): $k = 0; $__LIST__ = $wulongcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+21); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($wulongtea[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="ul06">
                    <div class="title06">新品上架</div>
                    <?php if(is_array($wulongcate)): $k = 0; $__LIST__ = $wulongcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+27); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($wulongtea[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div>
                <ul class="ul07">
                    <div class="title07">热销品类</div><!--绿茶-->
                    <?php if(is_array($greentea)): $k = 0; $__LIST__ = $greentea;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+33); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($goods[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <ul class="ul08">
                    <div class="title08">新品上架</div>
                    <?php if(is_array($greentea)): $k = 0; $__LIST__ = $greentea;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+39); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($goods[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        <div>
            <ul class="ul07">
                <div class="title07">热销品类</div><!--红茶-->
                <?php if(is_array($redcate)): $k = 0; $__LIST__ = $redcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+33); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($redtea[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul08">
                <div class="title08">新品上架</div>
                <?php if(is_array($redcate)): $k = 0; $__LIST__ = $redcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+39); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($redtea[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
        <div>
            <ul class="ul07">
                <div class="title07">热销品类</div><!--黑茶-->
                <?php if(is_array($blackcate)): $k = 0; $__LIST__ = $blackcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+33); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($blacktea[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul08">
                <div class="title08">新品上架</div>
                <?php if(is_array($blackcate)): $k = 0; $__LIST__ = $blackcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+39); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($blacktea[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
        <div>
            <ul class="ul07">
                <div class="title07">热销品类</div><!--黄茶-->
                <?php if(is_array($yellowcate)): $k = 0; $__LIST__ = $yellowcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+33); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($yellowtea[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul08">
                <div class="title08">新品上架</div>
                <?php if(is_array($yellowcate)): $k = 0; $__LIST__ = $yellowcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+39); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($yellowtea[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
        <div>
            <ul class="ul07">
                <div class="title07">热销品类</div><!--茶具-->
                <?php if(is_array($teasetcate)): $k = 0; $__LIST__ = $teasetcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+33); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($teaset[$k+5]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="ul08">
                <div class="title08">新品上架</div>
                <?php if(is_array($teasetcate)): $k = 0; $__LIST__ = $teasetcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="li<?php echo ($k+39); ?>"><a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($val['id']); ?>"><i><img src="/Uploads/goodsPic/800/800_<?php echo ($teaset[$k+2]['pic']); ?>" style="width: 1.4rem;height: 1.38rem;"></i><p><?php echo ($val['catename']); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
        </div>
            <div class="poa3">
               
            </div>
    </div>
</div>

<!--底部导航-->
<div class="outside">
    <div class="footer">
        <ul style="width:100%;">
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Category/index');?>">
                <i class="on"><span class="i2"></span></i>
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
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/class.js"></script>
</body>
</html>