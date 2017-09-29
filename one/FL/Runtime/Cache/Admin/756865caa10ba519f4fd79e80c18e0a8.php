<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎登录后台管理系统</title>
    <link href="/Public/Admin/Login/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/Login/js/jquery.js"></script>
    <script src="/Public/Admin/Login/js/cloud.js" type="text/javascript"></script>

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
            position: absolute;
            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
            /*margin-left:120px;*/  /*200px你自己随便调*/
        }
    </style>

</head>

<body style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



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
        <form action="/Admin/Login/login" method="post" id="loginForm">
            <ul>
                <li><input name="username" type="text" class="loginpwd" placeholder="用户名" /></li>
                <li><input name="pwd" type="password" class="loginpwd" placeholder="密码" /></li>
                <li class="yzm">
                    <span><input name="yzm" type="text" placeholder="验证码" /></span>
                    <img id="yzmimg" src="/Admin/Login/verify" style="width:114px;height:46px;cursor: pointer;" onclick="this.src='/Admin/Login/verify?num=+Math.radom()'"/>
                </li>
                <li>
                    <input type="button" class="loginbtn" value="登录"   />
                    <label><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
                    <label><a href="#">忘记密码？</a></label>
                </li>
            </ul>
        </form>
    </div>
</div>

<div class="loginbm">版权所有  2013 </div>
</body>
<script src="/Public/js/jQuery-1.8.2.min.js"></script>
<script src="/Public/js/jquery.validate.js"></script>
<script src="/Public/js/layer/layer.js"></script>
<script type="text/javascript">


    $(function(){
        var validate=$('#loginForm').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true
                },
                pwd:{
                    required:true
                },
                yzm:{
                    required:true,
                    remote:{
                        url:"<?php echo U('Admin/Login/chkVerify');?>",
                        type:'post'
                    }
                }
            },
            messages:{
                username:{
                    required:'用户名不能为空'
                },
                pwd:{
                    required:'密码不能为空'
                },
                yzm:{
                    required:'验证码不能为空',
                    remote:'验证码不正确'
                }
            },
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }
        })
        jQuery.validator.onfocus=true;

        $('.loginbtn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('login');?>",$('#loginForm').serialize(),function(res){
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