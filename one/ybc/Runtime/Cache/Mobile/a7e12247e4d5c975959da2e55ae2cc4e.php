<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>发表评价</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
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
        <a onclick="javascript:history.go(-1);"><span style="color: #fff;font-size: 0.3rem">&lt;返回</span></a>
        <span style="color: #ffffff;margin-left: 1.7rem">发表评价</span>
    </div>
</div>

<!-- 产品详情 -->
<div class="product" style="margin-top: 0.2rem">
    <div style="margin-left: 0.2rem;margin-right:0.2rem;">
        <form action="" method="post" id="form1">
            <input type="hidden" name="gid" value="<?php echo ($gid); ?>"/><input type="hidden" name="hid" value="<?php echo ($hid); ?>"/>
            <img src="/Uploads/goodsPic/100/100_<?php echo ($pic); ?>" style="float: left">
            <span style="float: left;margin-top: 0.2rem;width: 5rem;font-size: 0.32rem"><?php echo ($goodsname); ?></span>
            <textarea placeholder="在这里填写您的评价内容哦" name="content" type="text" style="width: 7rem;height: 4rem;margin-top: 0.25rem;font-size: 0.32rem"></textarea>
            <div style="margin-top: 0.4rem">
                <span>选择评价级别：</span>
                <input id="comment1" type="radio" value="1" name="level" checked/>
                <label for="comment1"><span style="background: #ff6600;color: #fff;border-radius: 0.08rem;padding: 0.1rem">好评</span></label>
                <input id="comment2" type="radio" value="2" name="level"/>
                <label for="comment2"><span style="background: #ff6600;color: #fff;border-radius: 0.08rem;padding: 0.1rem">中评</span></label>
                <input id="comment3" type="radio" value="3" name="level"/>
                <label for="comment3"><span style="background: #ff6600;color: #fff;border-radius: 0.08rem;padding: 0.1rem">差评</span></label>
            </div>
        </form>
    </div>
</div>
<div style="position: fixed;bottom: 0;width: 100%;height: 1rem">
    <span id="toComment" style="background: #ff6600;float: right;padding: 0.28rem 1rem;color: #fff;font-size: 0.32rem">发表评价</span>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('#toComment').click(function(){
            $.post("<?php echo U('toComment');?>",$('#form1').serialize(),function(res){
                if(res.status==1){
                    layer.open({content:res.info,time:1000});
                    setInterval(function(){
                        location.href=document.referrer;
                    },1000)
                }else{
                    layer.open({content:res.info,time:1500});
                }
            })
        })
    })
</script>
</html>