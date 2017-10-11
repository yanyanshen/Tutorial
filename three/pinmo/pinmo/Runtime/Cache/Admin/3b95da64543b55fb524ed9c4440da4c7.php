<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery-1.8.2.js"></script>
<script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>

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
        <form id="login" action="<?php echo U('Admin/Login/index');?>" method="post" >
        <ul>
            <li><input name="adminname" type="text" class="loginuser" value="" /></li>
            <li><input name="password" type="password" class="loginpwd" value="" /></li>
            <li class="yzm">
                <span><input name="verify" class="loginverify" type="text" value="" /></span>
                <cite><img src="<?php echo u('Admin/Login/verify');?>" width="160px" height="46px" alt="验证码" onclick="this.src='<?php echo u('verify',array('id'=>mt_rand()));?>'"/></cite>
            </li>
            <li>
                <input type="button" class="loginbtn" value="登录"  />
                <label><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
                <label><a href="#">忘记密码？</a></label>
            </li>
        </ul>
        </form>
    </div>
</div>
<script src="/Public/Admin/layer/layer.js" type="text/javascript"></script>
<script src="/Public/Admin/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
        var validate=$('#login').validate({
            rules:{
                adminname:{
                    required:true
                },
                password:{
                    required:true
                },
                verify:{
                    required:true,
                    remote:{
                        url:"<?php echo U('Admin/Login/chkVerify');?>",
                        type:'post'
                    }
                }
            },
            messages:{
                adminname:{
                    required:'用户名不能为空'
                },
                password:{
                    required:'密码不能为空'
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
        })


        $('.loginbtn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Admin/Login/index');?>",$('#login').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo U('Admin/Index/index');?>";
                            }
                        });
                    }else{
                        layer.alert(res.msg);
                    };
                })
            }

        })




</script>
    
</body>
</html>