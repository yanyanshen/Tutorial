<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员注册</title>
    <link rel="stylesheet" href="/Public/Admin/css/reg.css">
    <script src="/Public/Admin/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Admin/js/lr.js"></script>
    <script src="/Public/Admin/js/jquery.validate.js"></script>
    <script src="/Public/Admin/js/jquery.form.js"></script>
    <style>div.error{  color:#ff0300;  font-weight: bold;  font-size: 14px;  position: absolute;  }</style>
</head>
<body>

<!-- 添加模块开始 -->
<div class="reg wid_1200">
    <ul class="clearfix">
        <li><a href="#">会员添加</a></li>
    </ul>
    <div>
        <form action="<?php echo u('Member/MemberAdd');?>" method="post" id="form1">
            <p>用户名：<input type="text" name="username"><span class="red">*</span></p><br />
            <p>密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd" id="pwd"><span class="red">*</span></p><br />
            <p>确认密码：<input type="password" class="password" name="repwd"><span class="red">*</span></p><br />
            <p>手机号：<input type="text" name="mobile"><span class="red">*</span></p><br />
            <p>E-mail：<input type="text" name="email"><span id="msgMail" class="tips"></span></p><br />
            <p><input class="btn" type="submit" name="btn" value="添&nbsp;&nbsp;&nbsp;&nbsp;加">
        </form>
    </div>

</div>
</body>
<script>
    $(function(){
        $('.btn').click(function(){
            if($('#form1').valid())
            {
                $('#form1').submit();
            }
        })

        $('#form1').validate({
            rules:{
                username:{
                    required:true,
                    minlength:5,
                    maxlength:8,
                    remote:{
                        url:"check_user",
                        type:'post'
                    }
                },
                pwd:{
                    required:true,
                    minlength: 6,
                    maxlength:10
                },
                repwd:{
                    required:true,
                    equalTo:"#pwd"
                },
                mobile : {
                    required : true,
                    mobile:true,
                    trmote:{
                        url:"checkMobile",
                        type:'post'
                    }
                },
                email:'email'

            },
            messages:{
                username:{
                    required:'* 用户名不能为空',
                    minlength:"用户名最少5个字符",
                    maxlength:"用户名最多8个字符",
                    remote:'用户名已存在'
                },

                pwd:{
                    required:'密码不能为空',
                    minlength:'密码长度至少6个字符',
                    maxlength:'密码长度最多10个字符'
                },
                repwd:{
                    required:'重复密码不能为空',
                    equalTo:'两次密码输入不一致'
                },
                mobile:{
                    required:'手机号码不能为空',
                    mobile:'手机号码格式不正确',
                    remote:'该手机号已被使用'
                },
                email:'你的邮箱格式不正确'
            },
            success: function(label) {
                label.addClass("ok");
            },
            validClass: "ok",
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }

        });
        jQuery.validator.addMethod("mobile", function(value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");

    });
</script>
</html>