<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo C('WEB_NAME');?>-商品详情</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link href="" rel="stylesheet">
<link href="/Public/Mobile/css/details.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome-ie7.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome-ie7.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/Mobile/css/swiper.min.css">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            //加入购物车操作
            $(".shopping").click(function(){
                <?php if(!session('uid')): ?>location.href="<?php echo u('User/login');?>";
                <?php else: ?>
                $.ajax({
                    type:"post",
                    url:"<?php echo u('Cart/addToCart');?>",
                    data:"buynum=1&goodsargs="+$("select[name=goodsargs]").val()+"&gid="+<?php echo ($goodsinfo["id"]); ?>,
                    success:function(data){
                        layer.open({
                            btn:['继续购物','进入购物车'],
                            content:data,
                            yes:function(){
                                location.reload();
                            },
                            no:function(){
                                location.href="<?php echo u('Cart/cart');?>";
                            }
                        })
                    }
                })<?php endif; ?>
            });

            //立即购买操作
        $(".buy").click(function(){
            <?php if(!session('uid')): ?>location.href="<?php echo u('User/login');?>";
            <?php else: ?>
            $.ajax({
                        type:"post",
                        url:"<?php echo u('Cart/addToCart');?>",
                        data:"buynum=1&goodsargs="+$("select[name=goodsargs]").val()+"&gid="+<?php echo ($goodsinfo["id"]); ?>,
                    success:function(data){
                layer.open({
                    type:2,
                    time:2,
                    shadeClose:false,
                    end:function(){
                        location.href="<?php echo u('Order/affirm');?>";
                    }
                })
            }
        })<?php endif; ?>
        });

            //加入收藏
            $(".icon-heart-empty").click(function(){
                <?php if(!session('uid')): ?>location.href="<?php echo u('User/login');?>";
                <?php else: ?>
                $.ajax({
                        type:"post",
                        url:"<?php echo u('Cart/addToSc');?>",
                        data:"gid="+<?php echo ($goodsinfo["id"]); ?>,
                        success:function(data){
                            layer.open({
                                type:2,
                                time:1,
                                end:function(){
                                    location.reload();
                                }
                            })
                        }
                    })<?php endif; ?>
            })


        //删除收藏
        $(".icon-heart").click(function(){
            $.ajax({
                        type:"post",
                        url:"<?php echo u('User/delGoodsSc');?>",
                        data:"gid="+<?php echo ($goodsinfo["id"]); ?>,
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
        //显示购物车
        $(".icon-shopping-cart").click(function(){
            var gwc='<div class="shopping"><ul><?php if(is_array($cartList)): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "您购物车中暂时还没有商品" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="lf"><img src="/upload/n3/<?php echo (array_shift(explode(',',(isset($vo["goods"]["image"]) && ($vo["goods"]["image"] !== ""))?($vo["goods"]["image"]):'default.jpg'))); ?>"/></span> <span class="ce"><?php echo (mb_substr($vo["goods"]["goodsname"],0,15,'UTF-8')); ?> x <?php echo ($vo["buynum"]); ?>件</span> <span class="rf"><a href="javascript:void (0)" rel="<?php echo ($vo["goods"]["id"]); ?>" mall="<?php echo ($vo["goodsargs"]); ?>" class="delCart">删除</a> </span> </li><?php endforeach; endif; else: echo "您购物车中暂时还没有商品" ;endif; ?></ul></div>'
            layer.open({
                type:1,
                title:"我的购物车<span style='width: 4rem;display: inline-block'></span><a href='javascript:void(0)' id='delAllCart'>清空</a>",
                style:"width:100%;position:fixed;bottom:0;left:0;padding:0.2rem",
                anim:false,
                content:gwc
            })
        });
        $(document).on('click','.delCart',function(){
            $.ajax({
                type:"post",
                url:"<?php echo u('Cart/delCart');?>",
                data:"gid="+$(this).attr('rel')+"&goodsargs="+$(this).attr('mall'),
                success:function(data){
                    layer.open({
                        content:data,
                        btn:['我知道了'],
                        end:function(){
                            location.reload();
                        }
                    })
                }
            })
        })
        $(document).on('click','#delAllCart',function(){
            $.ajax({
                type:"post",
                url:"<?php echo u('Cart/delCart');?>",
                success:function(data){
                    layer.open({
                        content:"购物车已清空",
                        btn:['我知道了'],
                        end:function(){
                            location.reload();
                        }
                    })
                }
            })
        })
        //左上角返回按钮
        $("#goBack").click(function(){
            location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>";
        });

        //右上角popMenu
        $("#popMenu").click(function(){
            var popContent='<div class="popMenu"><ul><li><a href="<?php echo u('Mobile/Index/index');?>">首页</a></li><?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo['id']));?>"><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; if(empty($_SESSION['uid'])): else: ?><li><a href="<?php echo u('User/member');?>">个人中心</a></li><li><a href="<?php echo u('User/logout');?>">退出登录</a></li><?php endif; ?></ul></div>';
            layer.open({
                type:1,
                style:"width:100%;height:auto;text-align:center;position:fixed;bottom:0;left:0;opacity:1;filter:alpha(opacity=100);",
                content:popContent,
                anim:1
            })
        });

        })
    </script>

</head>

<body>

<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <p><a href="javascript:void (0)" id="goBack"><返回</a></p>
        <h2><a href="#">商品详情</a></h2>
        <ul>
            <a href="javascript:void(0)" id="popMenu">
                <li></li>
                <li></li>
                <li></li>
            </a>
        </ul></div>
</div>
<!--头部 结束-->
<!-- banner开始 -->
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if(is_array($goodsimage)): $i = 0; $__LIST__ = $goodsimage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href=""><img src="/upload/n0/<?php echo ((isset($vo) && ($vo !== ""))?($vo):'default.jpg'); ?>" alt=""></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Initialize Swiper -->

<!--    详情开始  -->
    <div class="introduct">
        <div class="wrapper font ">
           <span class="name"><?php echo (mb_substr($goodsinfo["goodsname"],0,18,'UTF-8')); ?></span>
            <span class="share">
             <a href=""><i class="icon-share"></i><br>分享</a>
            </span><br/>
            <span class="price">本站价格:￥<?php echo ($goodsinfo["siteprice"]); ?></span>
            <span class="price-2"><i>促销</i></span><br/>
            <p class="price-4">市场价格￥<?php echo ($goodsinfo["busiprice"]); ?></p>
	        <span class="price-5">快递：免运费</span>
        </div>
        <div class="statement" >
                <i class="icon-heart"></i>
                <span>卖家承诺7天内发货</span>
                <i class="icon-heart"></i>
                <span>七天无理由</span>
                <i class="icon-heart"></i>
                <span><?php if(($goodsinfo["hot"]) == "1"): ?>热销<?php else: ?>新品<?php endif; ?></span>
        </div>
        <div class="choose-color" >
                选择商品属性<select name="goodsargs">
            <?php if(is_array($goodsargs)): $i = 0; $__LIST__ = $goodsargs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </div>              
    </div>
<!-- 商品评价 -->
<div class="evaluate">
        <div class="wrapper font ">
                <p>商品评价（<?php echo (count($pjList)); ?>条）</p>
                <div class="content">
                    <?php if(is_array($pjList)): $i = 0; $__LIST__ = $pjList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="user ">
                            <p class="border"></p>
                            <img src="/upload/UserPic/small/<?php echo ((isset($vo["pic"]) && ($vo["pic"] !== ""))?($vo["pic"]):'default.jpg'); ?>" class="people-2">
                            <span class="tel"><?php echo ($vo["pjname"]); ?></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="time"><?php echo (date('Y-m-d',$vo["pjtime"])); ?></span>
                            <p><?php echo ($vo["pjintro"]); ?></p>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>  
        </div>
</div>
<!-- 底部开始   -->
<div class="foot">
    <div class="bg">
    </div>
    <ul class="memu">
        <li class='<?php if(in_array(($goodsinfo["id"]), is_array($goodsSc)?$goodsSc:explode(',',$goodsSc))): ?>icon-heart<?php else: ?>icon-heart-empty<?php endif; ?> icon'></li>
        <li class='icon-shopping-cart icon <?php if(in_array(($goodsinfo["id"]), is_array($cartid)?$cartid:explode(',',$cartid))): ?>color<?php endif; ?>'></li>
        <li class="shopping">加入购物车</li>
        <li class="buy">立即购买</li>
    </div>
</div>
<!-- js -->
    <!-- Swiper JS -->
<script src="/Public/Mobile/js/swiper.min.js"></script>
<script src="/Public/Mobile/js/details.js"></script>
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
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });
</script>

</body>
</html>