<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>我的评价</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <!-- <script src="/Public/Mobile/js/1.js"></script> -->
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
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/collection.css"/>
</head>
<!-- 头部开始 -->
<body>
<div class="collection clearfix" style="height: 1rem;line-height: 1rem;font-size: 0.4rem;">
    <div class="wrapper">
        <a href="<?php echo U('UserCenter/usercenter');?>"><span style="color: #fff;font-size: 0.3rem">&lt;返回</span></a>
        <span style="color: #ffffff;margin-left: 1.7rem">我的评价</span>
    </div>
</div>

<!-- 产品详情 -->
<div class="product" style="margin-top: 0.2rem">
    <?php if(empty($commentList)): ?><div class="pro1 clearfix" style="font-size: 0.4rem;height: 2rem;line-height: 2rem">
            <p style="color: gray">没有评价记录哦</p>
        </div>
    <?php else: ?>
        <span style="font-size: 0.3rem;color: darkslategray;margin-left: 0.2rem;">亲，您共有<span style="color: darkgoldenrod;font-size: 0.4rem"><?php echo ($count); ?></span>条评价记录</span>
        <?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="pro1 clearfix">
                <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($val["pic"]); ?>" style="width: 1.2rem;height: 1.2rem;float: left"/></a>
                <span style="float: left;margin-top: 0.25rem;color: #ff6600;font-size: 0.24rem">
                    <?php if(($val['level']) == "1"): ?>好评<?php endif; ?>
                    <?php if(($val['level']) == "2"): ?>中评<?php endif; ?>
                    <?php if(($val['level']) == "3"): ?>差评<?php endif; ?>
                </span>
                <span style="float: left;margin-top: 0.25rem;margin-left: 0.2rem;font-size: 0.24rem;color: darkslategray"><?php echo (mb_substr($val["goodsname"],0,21,'utf-8')); ?>...</span>
                <span style="float: left;margin-top: 0.25rem;width: 5.2rem"><?php echo ($val["text"]); ?></span>
                <span style="float: right;margin-right: 0.4rem;font-size: 0.2rem;color: dimgray"><?php echo (date('Y-m-d H:i:s',$val['addtime'])); ?></span>
            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
</body>
</html>