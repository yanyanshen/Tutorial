<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>登陆</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/Jben/css/style.css">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/Jben/css/theme.css">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/Jben/css/jquery.mobile-1.3.2.min.css">

<body style="background-color: beige">
<form method="post" action="<?php echo U('Users/login');?>" name="form1" id="form1">
<div data-role="page" >
    <div data-role="header" data-theme="f">
        <a href="<?php echo U('Users/personal');?>" data-ajax="false" class="back" data-role="none" data-direction="reverse"><img src="/Shop/Public/Mobile/Jben/images/back.png" style="height: 27px;width: 30px"></a>
        <h1>返回</h1>
    </div>
    <div data-role="content" class="login-wrap">
        <div class="login-input-box">
           <!-- <div class="logo">
                <p>登录</p>
            </div>-->
            <div class="head-img">
                <div id="preview">
                    <a class="a-file" href="javascript:void(0)" type="file" data-role="none"><img id="imghead" src="/Shop/Public/Mobile/Jben/images/logo2.png"  /></a>
                </div>
                <input type="file" data-role="none" class="hidden" onchange="previewImage(this)" />
            </div>
            <div class="line1">
                <img src="/Shop/Public/Mobile/Jben/images/user.png">
                <input type="text" class="user" value="用户名" name="username" id="username"   onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}" data-role="none">
            </div>
            <div class="line2">
                <img src="/Shop/Public/Mobile/Jben/images/lock.png"><span style="margin-top: 10px ;color:#4d4d4d;font-size: 18px;margin-left: 10px;line-height: 2.4rem;font-family: 'Blokk', sans-serif"> 密&nbsp;码</span>

                <input type="password" class="lock" value="" name="password" id="password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value=''}" data-role="none">

            </div>
            <div class="chose">
                <a href="<?php echo U('Users/register');?>" data-ajax="false" class="register" data-role="none" data-transition="slide">注册</a>
                <a href="<?php echo U('Users/forget');?>" data-ajax="false"  class="forgive" data-role="none">忘记密码</a>
                <a class="login" href="javascript:void(0);" data-ajax="false" data-role="none" data-transition="slide" onclick="">登陆</a>

            </div>
        </div>
    </div>
<div style="text-align:center;margin:10px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<!--<p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>-->
<!--<p>来源：<a href="http://sc.chinaz.com/" target="_blank">站长素材</a></p>-->
</div>
</div>
</form>
</body>
<script src="/Shop/Public/Mobile/Jben/js/jquery-1.8.3.min.js"></script>
<script src="/Shop/Public/Mobile/Jben/js/jquery.mobile-1.3.2.min.js"></script>
<script src="/Shop/Public/Mobile/Jben/js/jquery.validate.min.js"></script>
<script src="/Shop/Public/Mobile/Jben/js/layer_mobile/layer.js"></script>
<script>
 $(document).ready(function(){
        var validate=$('#form1').validate({
            rules:{
                username:{
                    required:true,
                    remote:{
                        url:'<?php echo U("Users/chkName");?>',
                        type:'post'
                    }
                }
            },
            messages:{
                username:{
                    required:layer.open({
                        content: '请填写用户名'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    }),
                    remote:''
                }

            }

        });
        $('.login').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Users/login');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        location.href="<?php echo U('Member/personal');?>";
                    }else{
                        layer.open({
                            content: '用户名或密码错误'
                            ,skin: 'msg'
                            ,time:2
                    });
                    }
                },'json')
            }

        })
    })
</script>
<style>
    label#username-error.error{
        color: #f82032;
        margin-left: 50px;
        font-size: 14px;
    }
</style>
</html>