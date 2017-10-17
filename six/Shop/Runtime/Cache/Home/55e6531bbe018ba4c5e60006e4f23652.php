<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/Shop/Public/Home/css/common.css" rel="stylesheet" type="text/css"/>
    <link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/Shop/Public/Home/css/registered.css" rel="stylesheet" type="text/css"/>
    <title>用户注册</title>
    <script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript" ></script>
    <script src="/Shop/Public/Home/js/jQuery.validate.min.js" type="text/javascript" ></script>
    <script src="/Shop/Public/Home/js/layer/layer.js" type="text/javascript" ></script>
    <style type="text/css">
        div.error{  background: url("/Shop/Public/Home/imgs/error/error.png") no-repeat 0px 12px;  left: 177px;  font-size: 12px;  }
        div.ok{  background: url("/Shop/Public/Home/imgs/ok/ok.png")#ffffff no-repeat 0px 12px ;  left: 290px;  font-size: 12px;  margin-top: 3px;  }
        div#verify-error.error.ok{
            left: 237px;  font-size: 12px;  }
        div#verify-error.error.error{  left: 177px;  }
        div.form.clearfix{
           margin-top:-30px
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            var validate=$('#form1').validate({
                // 设置验证规则
                rules:{
                    username:{
                        required:true,
                        minlength:6,
                        maxlength:12,
                        remote:{
                            url:'<?php echo U("chkUserName");?>',
                            type:'post'
                        }
                    },
                    pwd:{
                        required:true,
                        minlength:6,
                        maxlength:12
                    },
                    repassword:{
                        required:true,
                        equalTo:"#pwd"
                    },
                    mobile:{
                        required:true,
                        mobile:true
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
                        required:'用户名不能为空',
                        minlength: '最少输入6个字符',
                        maxlength: '最多输入12个字符',
                        remote:'用户名已被占用'

                    },
                    pwd:{
                        required:'密码不能为空',
                        minlength:'最少输入6个字符',
                        maxlength:'醉倒输入12个字符'
                    },
                    repassword:{
                        required:'重复密码不能为空',
                        equalTo:'与上一次输入的密码不一致'
                    },
                    mobile:{
                        required:'请输入手机号'
                    },

                    verify:{
                        required:'请输入验证码',
                        remote:'验证码不正确'
                    }
                },

                success:function(div){
                    div.addClass('ok').text('通过验证');
                },
                validClass:'ok',
                errorElement:'div'
            });
            //手机号码验证
             jQuery.validator.addMethod("mobile", function(value, element) {
             var mobileReg = /^1[34578]{1}[0-9]{9}$/;
             return this.optional(element) || (mobileReg.test(value));
             }, "请正确填写您的手机号码");
            //验证前端表单是否通过 只有通过才能提交
            $('.loginBtn').click(function(){
                if(validate.form()){
                    //ajax 提交 serialize 序列化

                    $.post("<?php echo U('registered');?>", $('#form1').serialize(),function(res){
                        if(res.status==1){
                            layer.open({
                                content:res.info,
                                icon:1,
                                yes:function(){
                                    location.href="<?php echo U('Index/index');?>";
                                }
                            });
                        }else{
                            layer.open({
                                content:res.info,
                                icon:2,
                                title:'错误提示'
                            });
                        }

                    },'json')
                }
            })


        });


    </script>
</head>
<body>
<!--顶部样式-->
<div class="top">
    <div class="Narrow">
        <div class=" left logo"><a href="<?php echo U('Index/index');?>"><img src="/Shop/Public/Home/imgs/images/logo.png"/></a></div>
        <!--可修改图层-->
        <div class=" left festival"><a href="#"><img src="/Shop/Public/Home/imgs/images/logo_yd.png"/></a></div>
        <!--电话图层-->
        <div class="phone">全国服务热线：<em>400-345-5633</em></div>
    </div>
</div>


<div class="rgister Narrow">
    <div class="Sign">
        <div class="AD_img"><img src="/Shop/Public/Home/imgs/images/adbg_03.png"/></div>

        <div class="rgister-form">
            <div class="rgister-name"><span class="name">用户注册</span> <span class="English">REGISTER</span></div>

            <form id="form1" name="form1" method="post" action="<?php echo U('Home/Users/registered');?>">
                <div class="form clearfix">


                    <div class="item">
                        <label class="rgister-label" >用&nbsp;&nbsp;&nbsp;户&nbsp;&nbsp;&nbsp;名：</label>
                        <input name="username" type="text" class="text"/><b>*</b>

                    </div>

                    <div class="item">
                        <label class="rgister-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
                        <input name="pwd" type="password" id="pwd" class="text" /><b>*</b>
                    </div>


                    <div class="Password_qd">

                        <!--<ul>
                            <li class="r">弱</li>
                            <li class="z">中</li>
                            <li class="q">强</li>
                        </ul>-->
                    </div>


                    <div class="item">
                        <label class="rgister-label ">确&nbsp;认&nbsp;密&nbsp;码：</label>
                        <input name="repassword" type="password" class="text"/><b>*</b>
                    </div>

                    <!--<div class="item">
                        <label class="rgister-label">电&nbsp;子&nbsp;邮&nbsp;箱：</label>
                        <input name="email" type="text" class="text"/><b>*</b>
                    </div>-->

                    <div class="item">
                        <label class="rgister-label">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
                        <input name="mobile" type="text" class="text"/><b>*</b>
                    </div>

                    <!--<div class="item" style="position: relative">
                        <label class="rgister-label">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
                        	<input type="radio" id="male" name="sex" vale="male" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	<label for="male" style="position: absolute;left: 110px;top: 10px;"> 男</label>
                        	<input type="radio" id="female" name="sex" value="female"/>
                        	<label for="female" style="position: absolute;left: 160px;top: 10px;">女</label>
                    </div>-->


                    <div class="item ">
                        <label class="rgister-label "> 验&nbsp;&nbsp;&nbsp;证&nbsp;&nbsp;&nbsp;码：</label>
                        <input name="verify" type="text" class="Recommend_text"/>
                        <img src="<?php echo U('verify');?>" alt="验证码" onclick="this.src='<?php echo U('Home/Users/verify',array('num',mt_rand()));?>'" style="width:80px;height:36px;margin-right:90px;cursor:pointer;vertical-align:middle;margin-top:-3px"/>

                    </div>

                    <div class="item-ifo">
                        <input type="checkbox" name="agree" value="1"   class="checkbox left" checked="checked" id="readme"
                               onclick="">
                        <label for="protocol" class="left">我已阅读并同意<a href="#" class="blue" id="protocol">《福际商城用户注册协议》</a></label>
                    </div>

                </div>

                <div class="rgister-btn">
                    <a class="loginBtn" style="cursor:pointer">注&nbsp;&nbsp;&nbsp;&nbsp;册</a>
                    <!--<button type="submit" class="regBtn" value="">点击注册</button>-->
                </div>

                <div class="Note"><span class="login_link">已是会员<a href="<?php echo U('Users/login');?>">请登陆</a></span></div>
            </form>
        </div>

    </div>
</div>

<!--底部样式-->
<div class="bottom_footer">
    <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">商家入驻</a> | <a href="#">法律申明</a> | <a href="#">友情链接</a>
    </p>
    <p>Copyright©2014四川金祥保险销售有限公司.All Rights Reserved. </p>
    <p>川ICP备09150084号</p>
</div>
</body>
</html>