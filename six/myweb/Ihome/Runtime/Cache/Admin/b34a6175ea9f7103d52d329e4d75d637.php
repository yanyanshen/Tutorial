<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>  
<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
        <li><a href="#">回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>    
</div>
    
<div class="loginbody">
    <span class="systemlogo"></span>
    <div class="loginbox loginbox1">
        <form action="<?php echo u('Login/index','Admin');?>" method="post">
            <ul>
                <li><input name="username" type="text" class="loginuser" value="用户名" onclick="JavaScript:this.value=''"/></li>
                <li><input name="pwd" type="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/></li>
                <li class="yzm">
                    <span><input name="verify" type="text" value="验证码" onclick="JavaScript:this.value=''"/></span>
                    <cite><img src="<?php echo u('Login/verify','Admin');?>" alt=""  width='114px' height='46px' onclick="this.src='<?php echo u('Login/verify',array('id'=>mt_rand()));?>'"></cite>
                </li>
                <li>
                    <input name="" type="submit" class="loginbtn" value="登录" />
                    <label><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
                    <label><a href="#">忘记密码？</a></label>
                </li>
            </ul>
        </form>
    </div>
</div>	
    
</body>
</html>