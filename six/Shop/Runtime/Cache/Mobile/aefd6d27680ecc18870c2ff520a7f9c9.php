<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>个人中心</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/Shop/Public/Mobile/css/personal.css" rel="stylesheet">
    <link href="/Shop/Public/Mobile/css/zip.touch.member2_0._all_.v390.css" rel="stylesheet">
    <link href="/Shop/Public/Mobile/css/address.css" rel="stylesheet">
    <script src="/Shop/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Shop/Public/Mobile/js/layer_mobile/layer.js"></script>
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

            //查看订单
            $(".order ul li").click(function(){
                var index=$(this).index()+1;
                location.href="<?php echo U('Order/order');?>?status="+index;
            })
        });
    </script>
    <style>
        .loginout{
            font-size: 24px;
            font-weight: 900;
            letter-spacing: 20px;
            color: #ffffff;
            width: 260px;
            height: 60px;
            border:1px solid red;
            background-color: #c10000;
            border-radius: 8px;
            line-height: 60px;
            text-align: center;
            cursor: pointer;
            box-shadow: 3px 3px 3px #969696;
        }
    </style>
</head>
<body>
<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <p><a href="<?php echo U('Member/personal');?>" style="cursor: pointer;"><返回</a></p>
        <h2><a href="#">我的资料</a></h2>
        <ul class="menu">
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

<div class="collect">
    <ul>
        <li class="av" style="height: 110px;line-height: 110px" >
            <a href="<?php echo U('MyInfo/edit');?>">头像
                <!--<img src="/uploads/avatar/<?php echo (session('avatar')); ?>" alt="avatar" style="width: 105px;height: 105px;border-radius: 4px;margin-left: 190px" />-->
                <?php if($_SESSION['avatar']!= ''): ?><img src="/uploads/avatar/<?php echo (session('avatar')); ?>"  alt="头像" style="width: 105px;height: 105px;border-radius: 4px;margin-left: 190px" />
                    <?php else: ?>
                    <img src="/uploads/avatar/a.jpg"  alt="头像" style="width: 105px;height: 105px;border-radius: 4px;margin-left: 190px" /><?php endif; ?>

            </a>
            <i style="float: right;margin-right: 45px">></i>
        </li>
        <li class="li04"><a href="#">会员名</a><div style="float: right;margin-right: 45px;"><?php echo (session('username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;></div></li>
        <li class="l3"><a href="#">修改性别</a>
                <div style="margin-right: 45px;float: right"><?php echo ($amod['sex']); ?>&nbsp;&nbsp;&nbsp;&nbsp;></div>
        </li>
        <li ><a href="<?php echo U('Address/address');?>">收货地址管理<i style="float: right;margin-right: 45px;">></i></a></li>
    </ul>
</div>

<div style="width: 100%;height: 50px;margin-top: 100px;margin-left: 20%">
    <div class="loginout">退出</div>
</div>
<!--收藏 结束-->

<!--底部导航  开始-->
<!--底部导航  开始-->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Goods/category');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo U('Cart/cart');?>">
                <i><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a  href="<?php echo U('Member/personal');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!--底部导航  结束-->
<!--底部导航  结束-->

<script type="text/javascript">
    $(function(){
        $(".i4").parent().addClass('on');
    })
</script>
<script type="text/javascript">
    $(function(){
        $(".li04").click(function(){
            layer.open({
                content:"会员名作为登录名不可修改...",
                time:2,
                skin:'msg'
            })
        })
        $(".l3").click(function(){
                //页面层
                layer.open({
                    type: 1
                    ,content: '<div> <form action="" method="post" enctype="multipart/form-data" id="form1"> <div style="width: 100%;height: 20px; font-weight: 500;font-size: 18px; line-height: 20px;color: #808080; border-bottom: 1px solid #808080; "> <b>&nbsp;修改性别</b> </div><br>&nbsp;<lable> <input type="radio" value="男" name="sex"/>男 </lable> <lable> <input type="radio" value="女" name="sex"/>女 </lable></br></br> <input type="button" style="width: 100%;height: 25px; font-size: 20px; background: red;color: white;text-align: center; font-weight: 600;border-radius: 2px;" name="ok"  value="确           定"/> </form> </div> '
                    ,anim: 'up'
                    ,style: 'position:fixed; bottom:50; left:0; width: 100%; height: 80px; padding:10px 0; border:none;'
                });
            $("input[name='ok']").click(function(){
                $.post("<?php echo U('MyInfo/myInfo');?>",$("#form1").serialize(),function(res){
                    if(res.status==1){
                        location.reload();
                    }else{
                        layer.open({
                            content: '修改失败'
                            ,skin: 'msg'
                            ,time: 2
                        });
                    }
                })
            })

        })


    })
</script>

<script>
    $(function(){
        $(".loginout").click(function(){
            $.post("<?php echo U('MyInfo/loginout');?>",function(res){
                layer.open({
                    content:res.info,
                    skin:'msg',
                    time:1
                })
                function a(){
                    location.href="<?php echo U('Index/index');?>"
                }
                setTimeout(a,1000);
            })
        })
    })
</script>
</body>
</html>