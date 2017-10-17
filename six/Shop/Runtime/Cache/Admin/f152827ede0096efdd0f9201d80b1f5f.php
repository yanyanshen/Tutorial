<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />
    <title>用户登录</title>
    <link href="/Public/Admin/css/User_Login.css" type="text/css" rel="stylesheet" />/
    <script type="text/javascript" src="/Public/Adminjs/jquery-1.8.3.min.js"></script>
    <script src="/Public/Admin/js/jQuery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script src="/Public/Admin/js/layer.js"></script>

</head>
<body id="userlogin_body"  onload="onLoginLoaded()">
<div></div>
<div id="user_login" style="margin-top: 320px;">
    <dl>
        <dd id="user_top">
            <ul>
                <li class="user_top_l"></li>
                <li class="user_top_c"></li>
                <li class="user_top_r"></li></ul>
        </dd><dd id="user_main">
        <form action="/index.php/Admin/Login/Login/" method="post" id="form1">
            <ul>
                <li class="user_main_l"></li>
                <li class="user_main_c">
                    <div class="user_main_box">
                        <ul>
                            <li class="user_main_text">用户名： </li>
                            <li class="user_main_input">
                                <input class="TxtUserNameCssClass" id="username" maxlength="60" name="username"
                                       value="" placeholder="请输入用户名" style="width: 140px;
                                            height: 20px;position: relative;float: left" required="required">
                                <span style="position: relative; float: left; margin-left: 3px"></span>
                                <!--<div></div>-->
                            </li>
                        </ul>
                        <ul>
                            <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                            <li class="user_main_input">
                                <input class="TxtPasswordCssClass" id="password" maxlength="60" name="password" type="password"
                                       value="" placeholder="请输入密码"  style="width: 140px;
                                            height: 20px;position: relative;float: left" required="required" />
                                <span style="position: relative; float: left; margin-left: 3px"></span>
                                <!--<div></div>-->
                            </li>
                        </ul>
                        <ul>
                            <li class="user_main_text">验证码： </li>
                            <li class="user_main_input">
                                <input class="TxtValidateCodeCssClass" name="captcha" required="required"
                                       placeholder="验证码" type="text" style="width: 65px;height: 17px;
                                                   padding-top: 4px;position: relative;float: left;border-right: groove" />
                                <div></div>
                                <!--验证码此处可更改-->
                                <!--<img style=" width: 70px;height: 20px;-->
                                            <!--position: relative;float: left;margin-top: -22px;margin-left: 94px; border-radius: 3px;-->
                                             <!--border: 1px solid #808080;border-left: hidden;border-top: hidden;-->
                                            <!--cursor: pointer " title="看不清？点击更换另一个验证码。"-->
                                     <!--src="/index.php/Admin/Login/Code" id="code" alt="CAPTCHA" onclick=this.src="index.php?act=captcha&"+Math.random();>-->

                                <img style=" width: 70px;height: 30px;
                                            position: relative;float: left;margin-top: -22px;margin-left: 94px; border-radius: 3px;
                                             border: 1px solid #808080;border-left: hidden;border-top: hidden;
                                            cursor: pointer " title="看不清？点击更换另一个验证码。"
                                     src="/index.php/Admin/Login/Code" id="code" alt="CAPTCHA" onclick=this.src="index.php?act=captcha&"+Math.random();>
                                <span style="position: relative; float: left;padding-top: -16px"></span>
                            </li>
                            <li style="padding-left: 40px">
                                <input name="remember" id="remember" type="checkbox" value="1" checked='1'
                                       style="cursor: pointer;margin-left: 20px;padding-top: 3px;
                                                   width: 14px;height: 14px;position: relative;float: left" />
                                <label style="height: 13px;cursor: pointer" for="remember">记住密码</label>
                                <label><a href="#" style="text-decoration: none;color: #000000;font-size: 13px;
                                            padding-left: 8px">忘记密码？</a></label>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="user_main_r">
                    <input style="border: medium none; margin-top: 12px;margin-left: -10px;
                                 background: url('/Public/Admin/img/user_botton.gif') repeat-x scroll left top transparent;
                                  height: 84px; width: 84px; display: block; cursor: pointer;" value="" type="submit" onclick="Save()" id="loginbtn">
                </li>
            </ul>
        </form>
    </dd><dd id="user_bottom">
        <ul>
            <li class="user_bottom_l"></li>
            <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
            <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;">
                            </span><span id="ValrPassword" style="display: none; color: red;"></span>
<span id="ValrValidateCode" style="display: none; color: red;"></span>
<div id="ValidationSummary1" style="display: none; color: red;"></div>
<script>
    window.onload = function(){
        document.getElementById("code").onclick = function(){
            this.src = "/index.php/Admin/Login/code/_/"+new Date().getTime();
        }
    }
</script>

</body>
</html>