<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>用户登录</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" />
	<link rel="stylesheet" href="/Public/Home/css/global.css" />
	<link rel="stylesheet" href="/Public/Home/css/login-register.css" />
	
</head>
<body>
	<!--顶部信息start-->
	<!--
	<div id="topnav">
		<div class="topwrap">
			<dl class="users-entry">
				<dt>您好，欢迎来到ShopCZ商城<a href=""></a></dt>
				<dd>[<a href="">登录</a>]</dd>
				<dd>[<a href="">注册</a>]</dd>
				<dd></dd>
			</dl>
			<ul class="quick-menu">
				<li class="users-center">
					<div class="menu">
						<a href="" class="menu-hd">我的商城</a>
						<div class="menu-bd">
							<ul>
								<li><a href="">已买到的商品</a></li>
								<li><a href="">我的空间</a></li>
								<li><a href="">我的好友</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li class="cart">
					<div class="menu">
						<span class="menu-hd">购物车<strong>0</strong>种商品</span>
						<div class="menu-bd">
							<div class="no-order">
								<span>您的购物车中暂无商品，赶快选择心爱的商品吧！</span>
								<a href="" class="button">查看购物车</a>
							</div>
						</div>
					</div>
				</li>
				<li class="favorite">
					<div class="menu">
						<a href="" class="menu-hd">我的收藏</a>
						<div class="menu-bd">
							<ul>
								<li><a href="">收藏的商品</a></li>
								<li><a href="">收藏的店铺</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li class="pm">
					<a href="">站内信</a>
				</li>
			</ul>
		</div>
	</div>
	-->
	<!--顶部信息end-->
	
	<div class="header wrap1000">
		<a href=""><img src="/Public/Home/images/logo.png" alt="" /></a>
	</div>
	
	<div class="main">
		<div class="login-form fr">
			<div class="form-hd">
				<h3>用户登录</h3>
			</div>
			<div class="form-bd">
				<form id="form" action="<?php echo u('Home/Login/login');?>" method="POST">
					<dl>
						<dt>用户名</dt>
						<dd><input type="text" name="username" class="text" /></dd>
					</dl>
					<dl>
						<dt>密&nbsp;&nbsp;&nbsp;&nbsp;码</dt>
						<dd><input type="password" name="password" class="text"/></dd>
					</dl>
					<dl>
						<dt>验证码</dt>
						<dd><input type="text" name="code" class="text" size="10" style="width:58px;"> <img width="180px" height="28px" src="<?php echo U('Home/Login/verify');?>" alt="" align="absmiddle" style="position:relative;top:-2px;" onclick="this.src='<?php echo u('Home/Login/verify',array('id'=>mt_rand()));?>'"/></dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>
						<dd><input type="button" value="登  录" class="submit"/> <a href="" class="forget">忘记密码?</a></dd>
					</dl>
				</form>
				<dl>
					<dt>&nbsp;</dt>
					<dd> 还不是本站会员？立即 <a href="<?php echo u('Home/Register/register');?>" class="register">注册</a></dd>
				</dl>
				<dl class="other">
					<dt>&nbsp;</dt>
					<dd>
						<p>您可以用合作伙伴账号登录：</p>
						<a href="" class="qq"></a>
						<a href="" class="sina"></a>
					</dd>
				</dl>
			</div>
			<div class="form-ft">
			
			</div>		
		</div>
		
		<div class="login-form-left fl">
			<img src="/Public/Home/images/left.jpg" alt="" />
		</div>
	</div>
	
	<div class="footer clear wrap1000">
		<p> <a href="">首页</a> | <a href="">招聘英才</a> | <a href="">广告合作</a> | <a href="">关于品墨</a> | <a href="">联系我们</a></p>
		<p>Copyright 2004-2016 pmstore Inc.,All rights reserved.</p>
	</div>
	
	
</body>
<script src="/Public/Home/js/jquery-1.8.2.js"></script>
<script src="/Public/Home/js/jquery.validate.min.js"></script>
<script src="/Public/Home/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        var validate=$('#form').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true
                },
                password:{
                    required:true
                },
                code:{
                    required:true,
                    remote:{
                        url:'<?php echo U("Home/Login/chkVerify");?>',
                        type:'post'
                    }
                }
            },
            messages:{
                username:{
                    required:'用户名不能为空'
                },
                password:{
                    required:'密码不能为空'
                },
                code:{
                    required:'请输入验证码',
                    remote:'验证码不正确'
                }

            },
            /*            success: function(label) {
             label.addClass("ok");
             },
             validClass: "ok",*/
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }



        })
        jQuery.validator.onfocus=true;

        $('.submit').click(function(){

            if(validate.form()){

                $.post("<?php echo U('Home/Login/login');?>",$('#form').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>";
                                //location.href="<?php echo U('Home/Index/index');?>";
                            }
                        });
                    }else{
                        layer.alert(res.msg);
                    };
                })
            }

        })

    })
</script>
</html>