<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎登录后台管理系统</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Admin/js/jQuery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.validate.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Admin/images/logo.ico" media="screen" />
    <script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
    <style type="text/css">
        div.error{ font-weight:bold;color:red;top:5px;background:url(/Public/Admin/images/error.png) no-repeat 2px 3px; margin-left: 5px; padding-left: 18px;}
        div.ok{ color:green;top:5px;background:url(/Public/Admin/images/ok.png) no-repeat 2px 3px;margin-left: 5px; padding-left: 18px;width:400px;}
    </style>
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
<script>
    $(function(){
        var validate=$('#form1').validate({
            //设置规则
            rules:{
                username:{
                    required:true,
                    minlength:5,
                    maxlength:15,
                    remote:{
                        url:'<?php echo U("checkLogin");?>',
                        type:'post'
                    }
                },
                password:{
                    required:true
                },
                verify:{
                    required:true,
                    remote:{
                        url:'<?php echo U("checkVerify");?>',
                        type:'post'
                    }
                }
            },
            //设置提示信息
            messages:{
                username:{
                    required:'用户名不能为空',
                    minlength:'用户名至少为5个字符位',
                    maxlength:'用户名至多为15个字符位',
                    remote:'用户名不存在'

                },
                password:{
                    required:'密码不能为空'
                },
                verify:{
                    required:'验证码不能为空',
                    remote:'验证码错误'
                }
            },
            success:function(div){
                div.addClass('ok').text('验证通过');
            },
            validClass:"ok",
            errorElement:'div',
            errorPlacement:function(error,element){
                error.appendTo(element.parent());
            }
        })
        //如果输入正确，跳转至首页
        $('#login').click(function(){
            if(validate.form()){
                $.post('<?php echo U("Login/login");?>',$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info,{
                            icon:1,
                            time:1000
                        },function() {
                            location="<?php echo U('Index/index');?>";
                        });
                    }else{
                        layer.msg(
                                res.info,
                                {
                                    icon: 2,
                                    time:1000
                                },function(){
                                    location="<?php echo U('Login/login');?>";
                                });
                    }
                },'json')
            }

        })
    })
</script>
<div class="logintop">
    <span>欢迎登录一杯茶后台管理界面</span>
    <ul>
        <li style="float: right"><a href="<?php echo U('Index/index');?>">回首页</a></li>
    </ul>
</div>
<div class="loginbody">
    <span class="systemlogo" style="background-image: url(/Public/Admin/images/logo.ico);background-repeat:no-repeat;"></span>
    <div class="loginbox loginbox1" style="margin: 0 auto;">
        <form id="form1" action="" method="post">
        <ul style="margin-top: 0; padding-top: 80px;">
            <li style="width:405px;height:54px;"><input name="username" type="text" class="loginuser" value="" onclick="JavaScript:this.value=''"/></li>
            <li style="width:405px;height:54px;"><input name="password" type="password" class="loginpwd" value="" onclick="JavaScript:this.value=''"/></li>
            <li class="yzm" >
                <span><input name="verify" type="text" value="验证码" onclick="JavaScript:this.value=''"/></span>
                <cite><img src="<?php echo U('verify');?>" width="118" height="46" style="cursor: pointer" onclick="this.src='<?php echo U('verify');?>?num='+Math.random()"/></cite>
            </li>
            <li>
                <input name="" id="login" type="button" class="loginbtn" value="登录"/>
                <label><input name="remember" type="checkbox" value="1"  />记住密码</label>
            </li>
        </ul>
       </form>
    </div>
</div>

</body>
</html>