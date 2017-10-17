<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>收货地址-<?php echo C('WEB_NAME');?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/Public/Mobile/css/addressList.css" rel="stylesheet">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer.js"></script>
    <script>
        $(function(){
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
        });
        $(function(){
            $("#goBack").click(function(){
                history.back();
            });
            $(".delAddress").click(function(){
                $.ajax({
                    type:"post",
                    url:"<?php echo u('delAddress');?>",
                    data:"id="+$(this).attr('rel'),
                    success:function(data){
                        layer.open({
                            content:data,
                            btn:['好的'],
                            end:function(){
                                location.reload();
                            }
                        })
                    }
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
        <h2><a href="#">个人中心</a></h2>
    </div>
</div>
<!--头部 结束-->
<!--个人中心 开始-->
<div class="person clearfix">
    <div class="wrapper">
        <div class="img fl"><img src="/upload/UserPic/small/<?php echo ($meminfo["pic"]); ?>"/> </div>
        <div class="fl">
            <h3><?php if(($meminfo["nickname"]) == ""): echo ($meminfo["username"]); else: echo ($meminfo["nickname"]); endif; ?></h3>
            <p><?php echo ($meminfo["address"]); ?></p>
        </div></div>
</div>
<!--个人中心 结束-->

<!--订单 开始-->
<div class="order">
    <div class="wrapper">
        <p class="p">收货地址<a href="<?php echo u('addShAddress');?>" id="addAddress"><i>添加</i></a></p>
    </div>
        <ul style="width: 7.2rem">
            <?php if(is_array($addressList)): $i = 0; $__LIST__ = $addressList;if( count($__LIST__)==0 ) : echo "暂无收货地址" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["address"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<i><a href="javascript:void (0)" class="delAddress" style="color:#000;" rel="<?php echo ($vo["id"]); ?>">删除</a></i></li><?php endforeach; endif; else: echo "暂无收货地址" ;endif; ?>
        </ul>
</div>
<!--订单 结束-->

<!--底部导航  开始-->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Goods/goodsList');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo u('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo u('User/member');?>">
                <i class="on"><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!--底部导航  结束-->
</body>
</html>