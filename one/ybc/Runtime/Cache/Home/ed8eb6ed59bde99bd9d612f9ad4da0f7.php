<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
<title>用户登录</title>
</head>
<style>
    .form .item{
        margin-bottom: 35px;
    }
    #username-error.error{
        padding-left: 20px;
        margin-top: 10px;
        color: #ff0000;
        font-size: 14px;
    }
    #password-error.ok,#username-error.ok{
        padding-left: 20px;
        color: green;
        font-size: 14px;
    }
    #username-error.error, #password-error.error, #verify-error.error{
        display: inline-block;
        background: url("/Public/Home/images/error.png") no-repeat 5px 3px;
        padding-left: 20px;
        margin-top: 10px;
        color: #ff0000;
        font-size: 14px;
    }
    #verify-error.ok{
        display: inline-block;
        padding-left: 25px;
        color: green;
        font-size: 14px;
    }
</style>
<script>
    $(function(){
        var validate=$('#form1').validate({
            //设置规则
            rules:{
                username: {
                    required: true
                },
                password:{
                    required:true
                },
                verify:{
                    required:true
                }
            },
            //设置提示信息
            messages:{
                username:{
                    required:'请输入用户名'
                },
                password:{
                    required:'请输入密码'
                },
                verify:{
                    required:'请输入验证码'
                }
            },
            success:function(label){
                label.addClass('ok').text('');
            },
            validClass:"ok",
            errorPlacement:function(error,element){
                error.appendTo(element.parent());
            }
        })
        $('#login').click(function(){
            if(validate.form()){
            $.post('<?php echo U("Login/login");?>',$('#form1').serialize(),function(res){
            if(res.status==1){
                    layer.msg(res.info,{
                        icon:6,
                        time:1000
                    }, function(){
                     location=res.url;
                    });
            }else{
                    layer.msg(res.info, {
                        icon:5,
                        time:1000
                    }, function(){
                        location="<?php echo U('Login/login');?>";
                    });
                }
            });
         }
        })
        $(window).keydown(function(event){
            if(event.keyCode==13){
                if(validate.form()){
                    $.post('<?php echo U("Login/login");?>',$('#form1').serialize(),function(res){
                        if(res.status==1){
                            layer.msg(res.info,{
                                icon:6,
                                time:1000
                            }, function(){
                                location=res.url;
                            });
                        }else{
                            layer.msg(res.info, {
                                icon:5,
                                time:1000
                            }, function(){
                                location="<?php echo U('Login/login');?>";
                            });
                        }
                    });
                }
            }

        })
    })
</script>
<body>
<!--顶部样式-->
<div class="common_top">
 <div class="Narrow">
  <div class=" left logo"><a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
  <!--电话图层-->
  <div class="phone"><label>全国服务热线：</label><em>400-345-5633</em></div>
 </div>
</div>
<div class="login_bg">
<div class="login Narrow">
   <div class="login_advertising"><img src="/Public/Home/images/bg_03.png" /></div>
  <div class="login_frame">
   <div class="login-form">
     <div class="login-name"><h1 class="name">用户登录</h1><span class="login_link"><a href="<?php echo U('Registered/registered');?>"><b></b>用户注册</a></span></div>
	  <!--提示信息-->
	    <!--<div class="Prompt">账号密码不能为空！ </div>-->
	    <div class="form clearfix">
            <form id="form1" action="" method="post">
	     <div class="item item-fore1"><label for="loginname" class="login-label name-label"></label><input name="username" type="text"  class="text" placeholder="请输入用户名/手机号"/>
		 </div>
		 <div class="item item-fore2"><label for="nloginpwd" class="login-label pwd-label" ></label><input name="password" type="password"  class="text" placeholder="用户密码"/>
	     </div>
         <div class="item item-fore2"><label for="nloginpwd" class="login-label pwd-label" ></label><input name="verify" type="text" style="width: 174px;"  class="text" placeholder="请输入验证码"/><img
                 src="<?php echo U('verify');?>" id="verify" alt="验证码" onclick="this.src='<?php echo U('verify?vid=1',array('id',mt_rand()));?>'" style="width: 80px;height: 38px;cursor: pointer;float: right;border: none;border-left: 1px solid #cccccc;margin-top: -38px"/>
         </div>
	     <div class="Forgetpass"><a href="<?php echo U('Forgetpwd/forgetpwd');?>">忘记密码？</a></div>
	    <div class="login-btn">
            <a href="javascript:;" id="login" class="btn_login">登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
            <!--<input type="submit" value="登录" style="width: 238px;height:38px;background-image: url('/Public/Home/images/Button_img.png');border: none" />-->
	  </div>
       </form>
    </div>
    <div class="Login_Method">
     
    </div>
  </div>
</div>
</div>

<!--底部样式-->
 <div class="bottom_footer">
     <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a>| <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a>  </p>
     <p>Copyright©2010-2016河南巴山雀舌有限公司zuipin.cn.All Rights Reserved. </p>
     <p>豫ICP备09150084号</p>
   </div>
    </div>
</body>
</html>