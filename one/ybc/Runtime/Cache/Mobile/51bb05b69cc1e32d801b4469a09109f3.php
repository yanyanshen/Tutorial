<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN" style="font-size: 34.722px;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Mobile/js/rem.js"></script>
    <script src="/Public/Mobile/js/jquery.validate.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/page.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/all.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/slick.css">
    <style>
        a{
            cursor: pointer;
        }
        #form1 input{
            width: 100%;
            height: 20px;
            margin-bottom: 10px;
        }
        #form1 li{
            margin-top: 30px;
            height: 70px;
            margin-left: 60px;
        }
        #password-error.ok,#username-error.ok{
            padding-left: 20px;
            color: green;
            font-size: 14px;
        }
        #username-error.error, #password-error.error, #verify-error.error{
            /*display: inline-block;*/
            background: url("/Public/Mobile/images/error.png") no-repeat 5px 3px;
            padding-left: 20px;
            color: #ff0000;
            margin-bottom: 30px;
            font-size: 14px;
        }
        #verify-error.ok{
            display: inline-block;
            padding-left: 25px;
            color: green;
            font-size: 14px;
        }
    </style>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
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
                        required:'请输入用户名或手机号'
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
                               location=res.url;
                        }else{
                            layer.open({
                                skin: 'msg',
                                content:res.info,
                                time:2
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
                                location=res.url;
                            }else{
                                layer.open({
                                    skin: 'msg',
                                    content:res.info,
                                    time:2
                                    /*success:function(){
                                        location=res.url;
                                    }*/
                                });
                            }
                        });
                    }
                }

            })
        })
    </script>
</head>
<!--loading页开始-->
<body>
<div  style="position:absolute; width:100%; height:100%; z-index:-1"><img src="/Public/Mobile/images/tea6.jpg" style="width: 100%;height: 100%;filter: blur(2px) brightness(0.6);"/></div>
<div class="loading loader-chanage" style="display: none;">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<div style="color: #25cb83;padding-top: 0.3rem;padding-left: 0.3rem"><i><</i><a href="<?php echo U('Index/index');?>" style="color: #25cb83">去首页</a></div>
<div class="login clearfloat box-s">
    <h3 style="color: #25cb83">会员登录</h3>

    <form id="form1" method="post">
        <ul>
            <li class="ra3" style="background-color: #ffffff;height: 42px;width: 60%;margin-bottom: 20px;margin-top: 50px">
                    <span class="opa3"></span>
                    <input type="text" name="username" value="" placeholder="用户名/手机号">
            </li>
            <li class="ra3" style="background-color: #ffffff;height: 42px;width: 60%;margin-bottom: 20px">
                    <span class="opa3"></span>
                    <input type="password" name="password" value="" placeholder="密码">
            </li>
            <li class="ra3" style="background-color: #ffffff;height: 42px;width: 68%;">
                    <span class="opa3"></span>
                    <input type="text" name="verify"  placeholder="验证码" style="width:40%;border-right: none">
                    <img src="<?php echo U('verify');?>" id="verify" alt="验证码" onclick="this.src='<?php echo U('verify?vid=1',array('id',mt_rand()));?>'" style="width: 80px;height: 42px;cursor: pointer;float: right;border: none;border-radius: 3px"/>
            </li>
        </ul>
    </form>
    <div class="login-btn" >
        <a id="login">登录</a>
    </div>
    <div class="mima clearfloat" style="margin-top: 10px">
        <ul>
            <li class="fr" style="height: 20px;float: left">
                <a href="<?php echo U('Registered/registered');?>" style="color: #25cb83">立即注册</a>
            </li>
            <li class="fr" style="height: 20px;">
                <a href="<?php echo U('Forgetpwd/forgetpwd');?>" style="color: #25cb83">找回密码？</a>
            </li>
        </ul>
    </div>
</div>


</body></html>