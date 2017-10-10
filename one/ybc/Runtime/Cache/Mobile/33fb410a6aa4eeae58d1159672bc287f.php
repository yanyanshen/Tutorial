<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>收藏夹</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
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
    <div class="wrapper" style="color: #fff">
        <a href="<?php echo U('UserCenter/usercenter');?>"><span style="color: #fff;font-size: 0.3rem">&lt;返回</span></a>
        <span style="color: #ffffff;margin-left: 1.7rem">我的收藏</span>
    </div>
</div>

<!-- 产品详情 -->
<div class="product" style="margin-top: 0.2rem">
    <span style="font-size: 0.3rem;color: darkslategray;margin-left: 0.2rem;">亲，您一共收藏了<span style="color: darkgoldenrod;font-size: 0.4rem"><?php echo ($count); ?></span>件商品</span>
    <?php if(is_array($collectList)): $i = 0; $__LIST__ = $collectList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="pro1 clearfix" style="height: 2.1rem">
            <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($val["pic"]); ?>" style="width: 1.44rem;height: 1.44rem">
            <p class="fl"><?php echo ($val["goodsname"]); ?></p></a>
            <p class="mony fl">
                ￥<span style="width: 2rem;display: inline-block"><?php echo ($val["price"]); ?></span>
                <span onclick="delCollect(<?php echo ($val['gid']); ?>)" style="margin-left: 1.2rem;color: darkgoldenrod">取消收藏</span>
            </p>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script type="text/javascript">
    delCollect=function(gid){
        $.post("<?php echo U('Detail/outCollect');?>",{gid:gid},function(res){
            if(res.status==1){
                layer.open({
                    content: '取消收藏成功'
                    ,skin: 'msg'
                    ,time: 1.5
                    ,end:function(){
                        location.reload();
                    }
                });
            }else{
                layer.open({
                    content: '取消收藏失败'
                    ,skin: 'msg'
                    ,time: 1.5
                });
            }
        })
    }
</script>
</body>
</html>