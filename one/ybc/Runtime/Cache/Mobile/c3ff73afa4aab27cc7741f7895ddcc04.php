<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo ($goodsInfo[0]['goodsname']); ?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link href="" rel="stylesheet">
<link href="/Public/Mobile/css/details.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome-ie7.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome-ie7.css" rel="stylesheet">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link href="/Public/Mobile/css/swiper.min.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/swiper.min.js"></script>
<script src="/Public/Mobile/js/details.js"></script>
<script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style type="text/css">
        .evaluate .great .highlight{background: orangered;color: white}
    </style>
</head>
<body>
<!-- banner开始 -->
    <!-- Swiper -->

    <div class="swiper-container" >
        <div class="swiper-wrapper" >
            <div class="swiper-slide" style="position: relative"><div style="width: 100%;height: 0.5rem;background-color: rgba(5,5,5,0.5);position: absolute;color: #ffffff">
                <a href="javascript:history.go(-1);"><span style="color: #fff;font-size: 0.4rem">&lt;返回</span></a></div><img src="/Uploads/integralGoodsPic/800/800_<?php echo ($goodsInfo[0][pic]); ?>" style="width: 7.5rem;height: 5.25rem;"></div>
            <?php if(is_array($goodsPic)): $i = 0; $__LIST__ = $goodsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><div style="width: 100%;height: 0.5rem;background-color: rgba(5,5,5,0.5);position: absolute;color: #ffffff">
                    <a href="javascript:history.go(-1);"><span style="color: #fff;font-size: 0.4rem">&lt;返回</span></a></div><img src="/Uploads/integralGoodsPic/800/800_<?php echo ($pic["picname"]); ?>" style="width: 7.5rem;height: 5.25rem;" alt=""></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Initialize Swiper -->

<!--    详情开始  -->
    <form action="" id="form1">
    <input type="hidden" name="gid" value="<?php echo ($gid); ?>"/>
    <div class="introduct">
        <div class="wrapper font ">
            <span class="name" style="margin-top: 0.2rem;width: 5.27rem"><?php echo ($goodsInfo[0]['goodsname']); ?></span>
                <span class="share" id="noCollect" style="border: 0rem;color: gray">收藏</span>
            <span class="price">积分<?php echo ($goodsInfo[0]['points']); ?></span>
            <span class="price-2"><i>特惠</i></span>
            <span class="price-3"><i>促销</i></span>
            <p class="price-4">市场价值<span>￥<?php echo ($goodsInfo[0]['price']); ?></span></p>
	        <span class="price-5">快递：免运费<span>已兑换<?php echo ($sum); ?>笔</span>河南郑州</span>
        </div>
        <div class="statement" style="margin-top: 0.2rem;">
                <i class="icon-heart"></i>
                <span>卖家承诺7天内发货</span>
                <i class="icon-heart"></i>
                <span>七天无理由</span>
                <i class="icon-heart"></i>
                <span>正品</span>
        </div>
        <div class="jiathis_style_m" style="margin-top: 0.2rem;font-size: 0.28rem;width: 100%;height: 0.6rem;background: #eee;line-height: 0.6rem;padding-left: 0.3rem;box-sizing: border-box;color: #7b7b7b;"></div>
    </div>
    </form>
<!-- 商品评价 -->
<div class="evaluate">
    <div class="wrapper font ">
        <p>宝贝评价（<?php echo ($count); ?>）</p>
        <div class="great">
            <span id="comment" class="highlight">全部(<?php echo ($count); ?>)</span>
            <span id="comment1">好评(<?php echo ($count1); ?>)</span>
            <span id="comment2">中评(<?php echo ($count2); ?>)</span>
            <span id="comment3">差评(<?php echo ($count3); ?>)</span>
        </div>
        <div class="content" id="content">
            <div class="user ">
                <p class="border"></p>
                <?php if($commentList): if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><img src="/Uploads/avatar/100/100_<?php echo ($list["avatar"]); ?>" class="people-2" style="width: 0.5rem;height: 0.5rem">
                        <span class="tel"><?php echo ($list["username"]); ?></span>
                        <?php if(($list["level"]) == "1"): ?><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "2"): ?><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "3"): ?><span class="icon-star"></span></span><?php endif; ?>
                        <span class="time"><?php echo (date('Y-m-d',$list["addtime"])); ?></span>
                        <p><?php echo ($list["text"]); ?></p>
                        <?php if(empty($list["text1"])): else: ?>
                            <span style="font-size: 0.2rem">卖家回复：<?php echo ($list["text1"]); ?>  回复时间：<?php echo (date('Y-m-d',$list["addtime1"])); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <span>暂时还没有评价哦</span><?php endif; ?>
            </div>
        </div>
        <div class="content"  id="content1" style="display: none">
            <div class="user ">
                <p class="border"></p>
                <?php if($commentList1): if(is_array($commentList1)): $i = 0; $__LIST__ = $commentList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><img src="/Uploads/avatar/100/100_<?php echo ($list["avatar"]); ?>" class="people-2" style="width: 0.5rem;height: 0.5rem">
                        <span class="tel"><?php echo ($list["username"]); ?></span>
                        <?php if(($list["level"]) == "1"): ?><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "2"): ?><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "3"): ?><span class="icon-star"></span></span><?php endif; ?>
                        <span class="time"><?php echo (date('Y-m-d',$list["addtime"])); ?></span>
                        <p><?php echo ($list["text"]); ?></p>
                        <?php if(empty($list["text1"])): else: ?>
                            <span style="font-size: 0.2rem">卖家回复：<?php echo ($list["text1"]); ?>  回复时间：<?php echo (date('Y-m-d',$list["addtime1"])); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <span>暂时还没有评价哦</span><?php endif; ?>
            </div>
        </div>
        <div class="content"  id="content2" style="display: none">
            <div class="user ">
                <p class="border"></p>
                <?php if($commentList2): if(is_array($commentList2)): $i = 0; $__LIST__ = $commentList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><img src="/Uploads/avatar/100/100_<?php echo ($list["avatar"]); ?>" class="people-2" style="width: 0.5rem;height: 0.5rem">
                        <span class="tel"><?php echo ($list["username"]); ?></span>
                        <?php if(($list["level"]) == "1"): ?><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "2"): ?><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "3"): ?><span class="icon-star"></span></span><?php endif; ?>
                        <span class="time"><?php echo (date('Y-m-d',$list["addtime"])); ?></span>
                        <p><?php echo ($list["text"]); ?></p>
                        <?php if(empty($list["text1"])): else: ?>
                            <span style="font-size: 0.2rem">卖家回复：<?php echo ($list["text1"]); ?>  回复时间：<?php echo (date('Y-m-d',$list["addtime1"])); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <span>暂时还没有评价哦</span><?php endif; ?>
            </div>
        </div>
        <div class="content"  id="content3" style="display: none">
            <div class="user ">
                <p class="border"></p>
                <?php if($commentList3): if(is_array($commentList3)): $i = 0; $__LIST__ = $commentList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><img src="/Uploads/avatar/100/100_<?php echo ($list["avatar"]); ?>" class="people-2" style="width: 0.5rem;height: 0.5rem">
                        <span class="tel"><?php echo ($list["username"]); ?></span>
                        <?php if(($list["level"]) == "1"): ?><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "2"): ?><span class="icon-star"></span><span class="icon-star"></span><?php endif; ?>
                        <?php if(($list["level"]) == "3"): ?><span class="icon-star"></span></span><?php endif; ?>
                        <span class="time"><?php echo (date('Y-m-d',$list["addtime"])); ?></span>
                        <p><?php echo ($list["text"]); ?></p>
                        <?php if(empty($list["text1"])): else: ?>
                            <span style="font-size: 0.2rem">卖家回复：<?php echo ($list["text1"]); ?>  回复时间：<?php echo (date('Y-m-d',$list["addtime1"])); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <span>暂时还没有评价哦</span><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#comment').click(function(){
            $('#content').show();$('#content1').hide();$('#content2').hide();$('#content3').hide();
        })
        $('#comment1').click(function(){
            $('#content1').show();$('#content').hide();$('#content2').hide();$('#content3').hide();
        })
        $('#comment2').click(function(){
            $('#content2').show();$('#content').hide();$('#content1').hide();$('#content3').hide();
        })
        $('#comment3').click(function(){
            $('#content3').show();$('#content1').hide();$('#content2').hide();$('#content').hide();
        })
        $('.evaluate .great span').click(function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
        })
    })
</script>
<!-- 底部开始   -->
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="/Public/Mobile/js/jiathis_m.js" ></script>
<!-- JiaThis Button END -->
<div class="foot">
    <div class="bg">
    </div>
    <ul class="memu">
        <li class="buy" id="btn1" style="width: 100%">立即兑换</li>
    </ul>
</div>
<script>
    $(function(){
        $('#btn1').click(function(){
            $.post('<?php echo U("IntegralDetail/buy");?>',$('#form1').serialize(),function(res){
                if(res.status==1){
                    layer.open({
                        content:'确定兑换该商品吗？',
                        btn: ['确定','取消'] ,//按钮,
                        yes: function(){
                        $.post('<?php echo U("IntegralDetail/points");?>',$('#form1').serialize(),function(res){
                            if(res.status==1){
                                    $.post("<?php echo U('IntegralOrder/createOrder');?>",$('#form1').serialize(),function(res1){
                                        if(res1.status==1){
                                            location=res1.url;
                                        }else{
                                            layer.open({content:'兑换失败',skin:'msg'});
                                        }
                                    })
                            }else{
                                layer.open({content:res.info,time:2});
                            }
                        })
                    }
                })
                }else{
                    layer.open({content:'请先登录',btn:['确定','取消'],yes:function(){
                        location.href="<?php echo U('Home/Login/login');?>";
                    }
                })
                }
            })
        })
    })
</script>
<!-- js -->
    <!-- Swiper JS -->
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
        spaceBetween: 30
    });
</script>

</body>
</html>