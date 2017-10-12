<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
 <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
 <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js "></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script>
    <style>
        div.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 14px;
            position: absolute;
        }
    </style>
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
        <form action="<?php echo U('Login/login');?>" method="post" id="loginForm">
            <ul>
                <li><input name="adminname" type="text" class="loginuser" placeholder="用户名"/></li>
                <li><input name="pwd" type="password" class="loginpwd"placeholder="密码"/></li>
                <li class="yzm">
                    <span><input type="text" name="verify" placeholder="验证码" ></span>
                    <cite><img src="<?php echo U('verify');?>" alt="" onclick="this.src='<?php echo u('verify',array('id'=>mt_rand()));?>'">
                    </cite>
                </li>
                <li>
                    <input name="" type="button" class="loginbtn" value="登录"/>
                </li>
            </ul>
        </form>
    </div>
</div>	
    
</body>
<script type="text/javascript">
    $(function(){
        var validate=$('#loginForm').validate({
            //设置验证规则
            rules:{
                adminname:{
                    required:true,
                    minlength:2,
                    maxlength:15
                },
                pwd:{
                    required:true,
                    minlength:3,
                    maxlength:20
                },

                verify:{
                    required:true,
                    remote:{
                        url:"<?php echo u('Login/checkVerify');?>",
                        type:'post'
                    }
                }
            },
            messages:{
                adminname:{
                    required:'用户名不能为空',
                    minlength:'用户名至少为2个字符',
                    maxlength:'用户名最多不能超过15个字符'
                },
                pwd:{
                    required:'密码不能为空',
                    minlength:'密码长度至少为3个字符',
                    maxlength:'密码最多不能超过20个字符'
                },
                verify:{
                    required:'请输入验证码',
                    remote:'验证码不正确'
                }

            },
            success: function(label) {
                label.addClass("ok");
            },
            validClass: "ok",
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }

        });
        jQuery.validator.onfocus=true;

        $('.loginbtn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Login/login');?>",$('#loginForm').serialize(),function(res){
                     if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo U('Admin/Index/index');?>";
                            }
                        });
                    }else{
                        layer.alert(res.msg);
                    }
                })
            }
        })
    })
</script>
</html>