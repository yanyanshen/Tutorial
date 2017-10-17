<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>易购网-用户注册</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/public.css">
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/register.css">
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>
<!--  头部开始 -->
	<div class="header">		
		<div class="box logoBar">
			<div class="logo lf">
				<a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png"></a>
			</div>	
			<div class="reg lf">
				|    <span>用户注册</span>
			</div>		
		</div>
		<hr class="headLine" />
	</div>
<!-- 头部结束 -->
<!-- 注册表单开始 -->
   <div class="box">
	  	  <div class="regArea">
	  		   	<div class="regLeft lf">
	  		   		<img src="/Public/Home/images/reg.png" />
	  		   	</div>
	  		   	<div class="regRight lf">
	  		   	  <form action="login.html" method="post" name="loginForm" id="loginForm">
	  		   		<table border="0">
	  		   			<tr>
	  		   				<td><label>用户名：</label></td>
	  		   				<td>
	  		   					<input type="text" name="username" id="username" placeholder="请输入用户名"   />
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>密码：</label></td>
	  		   				<td>
	  		   					<input type="password" name="password" id="pwd" placeholder="请输入密码" />
	  		   				</td>
	  		   			</tr>
	  		   			<tr>
	  		   				<td><label>确认密码：</label></td>
	  		   				<td>
	  		   					<input type="password" name="repwd" id="repwd" placeholder="请再次输入密码" />
	  		   				</td>
	  		   			</tr>
                        <tr>
                            <td><label>验证码：</label></td>
                            <td>
                                <input type="text"  name="yzm" class='yzm' id="yzm"/>
                                 <img src="<?php echo U('Home/Login/verify');?>"  class='yzmImg' id='yzmimg' onclick="this.src='<?php echo U('Home/Login/verify',array('num'=>mt_rand()));?>'"/>
                                <!-- <img style="cursor:pointer;" width="100" height="20" src="<?php echo U('Home/Login/verify');?>" onclick="this.src='<?php echo U('Home/Login/verify');?>?num='+Math.random()"/>-->
                            </td>
                        </tr>                                            
                        <tr id="protocol">
                            <td colspan="2">
                                <input type="checkbox"  checked  name="protocol" id="myprotocol" onclick="chkProtocol();" />
                                     <span>我已阅读并同意</span> <a href="#">用户服务协议</a>
                            </td>
                         </tr>
                        <tr>
                            <td colspan="2" id="loginTd">
                                <a class="loginBtn">注册</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id="tologin">
                                <span>
                                您已注册账号？请立即 <a href="<?php echo U('Home/Login/login');?>" >登录</a>
                                </span>
                                <span>
                                忘记密码？<a href="#" class="">找回密码</a>
                                </span>
                            </td>
                        </tr>
                    </table>
                  </form>
                </div>
       </div>
</div>
<!-- 注册表单结束 -->
<!-- 尾部开始 -->
	<div class="footer">
			<p>版权所有：河南云和数据信息技术有限公司</p>
			<p>© CopyRight2016 All rights reserved.</p>
			<p>豫ICP备14003305号</p>
	</div>
<!-- 尾部结束 -->

</body>
<script src="/Public/Home/js/jQuery.1.8.2.min.js"></script>
<script src="/Public/Home/js/jquery.validate.min.js"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        var validate=$('#loginForm').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:15,
                    remote:{
                        url:'<?php echo U("Home/Login/chkUsername");?>',
                        type:'post'
                    }
                },
                password:{
                    required:true,
                    minlength:5,
                    maxlength:20
                },

                repwd:{
                    required:true,
                    equalTo:"#pwd"

                },
                yzm:{
                    required:true,
                    remote:{
                        url:'<?php echo U("Home/login/chkVerify");?>',
                        type:'post'
                    }
                }

            },
            messages:{
                username:{
                    required:'用户名不能为空',
                    minlength:'用户名至少需要2个字符',
                    maxlength:'用户名最多15个字符',
                    remote:'用户名已被占用'
                },
                password:{
                    required:'密码不能为空',
                    minlength:'密码长度至少5个字符',
                    maxlength:'密码长度最多20个字符'
                },

                repwd:{
                    required:'重复密码不能为空',
                    equalTo:'两次密码输入不一致'
                },
                yzm:{
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
     

        $('.loginBtn').click(function(){
     
            if(validate.form()){

                $.post("<?php echo U('Home/Login/register');?>",$('#loginForm').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo U('Home/Index/index');?>";
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