<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>用户登录</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Mobile/js/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/login.css"/>
    <script type="text/javascript">
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

        $(function(){
            $("#login").click(function(){
                $("form").submit();
            })
            $("form").validator({
                fields:{
                    username:"用户名:required",
                    passwd:"密码:required",
                    yzm:"remote[<?php echo u('chk_verify');?>]"

                },
                valid:function(form){
                    var me = this;
                    me.holdSubmit();
                    $(form).ajaxSubmit(function(res){
                        if(res=='登录成功'){
                            layer.open({
                                content:res,
                                time:2,
                                end:function(){
                                    location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>";
                                }
                            })
                        }else{
                            layer.open({
                                content:res,
                                time:2
                            })
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>
<!-- 头部 开始 -->
<div class="header">
    <div class="shop clearfix">
        <p>用户登录</p>
    </div>
</div>
<!-- 头部 结束 -->
<div class="main">
    <form action="<?php echo u('logined');?>" method="post">
        <div class="fenge">用户名:<input type="text" class="inputt" name="username"/></div>
        <div class="fenge">密<span style="width: 0.20rem;display: inline-block"></span> 码:<input type="password" class="inputt" name="passwd"/></div>
        <div class="fenge">验证码:<input type="text" class="inputt" name="yzm"/><br/><br/><img src="<?php echo u('User/verify_code');?>" onclick="this.src='<?php echo u('User/verify_code');?>'"/> </div>
        <div class="fenge"></div>
        <div class="fenge"><a href="javascript:void (0)" id="login">登录</a> <a href="<?php echo u('reg');?>">注册</a></div>
    </form>
</div>
</body>
</html>