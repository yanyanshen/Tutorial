<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="/Public/Admin/css/login.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/layer.js"></script>
	<title>后台登陆</title>
    <script type="text/javascript">
        $(function(){
            $("form").validator({
                fields:{
                    username:"用户名:required;username;",
                    passwd:"密码:required",
                    yzm: "验证码:required;remote[chk_verify]"
                },
                valid:function(form){
                    var me=this;
                    me.holdSubmit();
                    $(form).ajaxSubmit(function(res){
                        if(res=='登录成功'){
                            layer.msg(res+',即将跳转到首页',{
                                icon:1,
                                time:1000
                            },function(){
                                location.href="<?php echo u('Index/index');?>";
                            })
                        }else{
                            layer.msg(res,{
                                icon:1,
                                time:3000
                            },function(){
                                me.holdSubmit(false);
                            })
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			欢迎使用管理系统
		</div>
		<div id="back">
			<a href="#">返回首页</a>&nbsp;&nbsp; | &nbsp;&nbsp;
			<a href="#">帮助</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
				<form action="<?php echo u('logined');?>" method="post" autocomplete="off" disableautocomplete>
					<div id="login_tip">
						用户登录&nbsp;&nbsp;UserLogin
					</div>
					<div><input type="text" class="username" name="username"></div>
                    <span class="msg-box" for="username"></span>
					<div><input type="password" class="pwd" name="passwd"></div>
                    <span class="msg-box" for="passwd"></span>
					<div id="btn_area">
						<input type="submit" name="submit" id="sub_btn" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" class="verify" name="yzm">
						<img src="<?php echo u('Adminlogin/verify_code');?>" alt="" width="80" height="40" onclick="this.src='<?php echo u('Adminlogin/verify_code',array('id'=>mt_rand()));?>'"><span class="msg-box" for="yzm"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		版权所有
	</div>
</body>
</html>