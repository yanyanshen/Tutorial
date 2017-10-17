<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css"/>
    <link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css"/>
    <title>用户登录</title>
    <style>.other{width: 306px;height: 60px;margin-top: 20px;}  .other span{float: left;width: 120px;height: 60px;}  .other ul{width: 180px;height: 60px;float: left;}  .other ul li{float: left;width: 60px;}
    #form1{position: relative;margin-top: 40px;}  #username-error{  width:283px;  position: absolute;  top: -22px;  left:0px;  padding:1px 10px; background: #FFFF99;  border:1px solid rgba(179, 12, 9, 0.62);  color:#FF0000;  margin-bottom:20px;  line-height: 16px;  background: url("/Shop/Public/Home/imgs/error/error.png") no-repeat 5px 0px ;  vertical-align: text-top;  text-align:center;  }  input#username.text.valid{font-family: "Microsoft YaHei", "Hiragino Sans GB";  }
    #verify-error {  width: 283px;  position: absolute;  top: -22px;  left: 0px;  padding: 1px 10px;  background: #FFFF99;  border: 1px solid rgba(179, 12, 9, 0.62);  color: #FF0000;  margin-bottom: 20px;  line-height: 16px;  background: url(/Shop/Public/Home/imgs/error/error.png) no-repeat 5px 0px;  vertical-align: text-top;  text-align: center;  }
    </style>
</head>
<script type="text/javascript" src="/Shop/Public/Home/js/jQuery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Shop/Public/Home/js/jQuery.validate.min.js"></script>
<script type="text/javascript" src="/Shop/Public/Home/js/layer/layer.js"></script>
<script>
    $(document).ready(function(){
       var validate=$('#form1').validate({
            rules:{
                username:{
                    required:true,
                    remote:{
                        url:'<?php echo U("chkName");?>',
                        type:'post'
                    }
                },
                verify:{
                    required:true,
                    remote:{
                        url:'<?php echo U("chkVerify");?>',
                        type:'post'
                    }
                }
            },
            messages:{
              username:{
                  required:'请输入用户名',
                  remote:'用户不存在'
              },
                verify:{
                    required:'请输入验证码',
                    remote:'验证码不正确'
                }
            },
            errorElement:'div'
        });
        $('.btn_login').click(function(){
            if(validate.form()){
          $.post("<?php echo U('login');?>",$('#form1').serialize(),function(res){
                   if(res.status==1){
                       location.href="<?php echo U('Index/index');?>";
                  }else{
                        layer.open({
                            content:res.info,
                            icon:2,
                            title:'登陆信息'
                        })
                    }
                },'json')
            }

        })
    })
</script>
<body>
<form action="<?php echo U('Users/login');?>" method="post" id="form1">
<!--顶部样式-->
<div class="common_top">
    <div class="Narrow">
        <div class=" left logo"><a href="<?php echo U('Index/index');?>"><img src="/Shop/Public/Home/imgs/images/logo.png"/></a></div>
        <!--可修改图层-->
        <div class=" left festival"><a href=""><img src="/Shop/Public/Home/imgs/images/logo_yd.png"/></a></div>
        <!--电话图层-->
        <div class="phone">全国服务热线：<em>400-345-5633</em></div>
    </div>
</div>
<div class="login Narrow">
    <div class="login_advertising"><img src="/Shop/Public/Home/imgs/images/login_img_03.png"/></div>
    <div class="login_frame">
        <div class="login-form right">
            <div class="login-name"><h1 class="name">用户登录</h1><span class="login_link"><a
                    href="<?php echo U('Users/registered');?>"><b></b>用户注册</a></span></div>
                <div class="form clearfix">

                    <div class="item item-fore1"><label for="username" class="login-label name-label"></label>
                        <input name="username" type="text" class="text" id="username" placeholder="请输入用户名"/>
                    </div>

                    <div class="item item-fore2">
                        <label for="password" class="login-label pwd-label"></label>
                        <input name="password" type="password" class="text" id="password" placeholder="用户密码"/>
                    </div>
                    <div class="item item-fore2">
                        <label for="password" class="verify-label pwd-label"><img src="<?php echo U('verify');?>" alt="验证码" onclick="this.src='<?php echo U('Home/Users/verify',array('num',mt_rand()));?>'" style="width:100px;height:40px;cursor:pointer;vertical-align:middle;margin-left: 205px;margin-top: -1px"/></label>
                        <input name="verify" type="text" class="text" id='verify' placeholder="验证码"/>

                    </div>

                </div>
                <div class="login-btn">
                    <!--javascript:document.getElementById('form1').submit()-->
                    <a class="btn_login" style="cursor:pointer">登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
                </div>
            <div class="other">
                <li><div class="Forgetpass"><a href="<?php echo U('Users/reword');?>" style="color:red; margin-right: auto">忘记密码？</a></div></li>
                </ul>
            </div>
        </div>
    </div>
                <ul>
</div>
</form>
<!--底部样式-->
<div class="bottom_footer">
    <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">商家入驻</a> | <a href="#">法律申明</a> | <a href="#">友情链接</a>
    </p>
    <p>Copyright©2014四川金祥保险销售有限公司.All Rights Reserved. </p>
    <p>川ICP备09150084号</p>
</div>

</body>
</html>