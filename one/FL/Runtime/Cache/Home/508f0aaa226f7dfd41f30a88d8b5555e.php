<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/js/zhonglin.js"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
            margin-left:120px;  /*200px你自己随便调*/
        }
    </style>
</head>

<body>

<!--top 开始-->

<!--logo search 开始-->
<div class="reg">
    <div class="reg-head w1200" >
        <div class="" >
            <h1><a href="<?php echo u('Index/index');?>}" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
            <div class="reg-title">欢迎注册</div>
            <p>已有账号？<a href="<?php echo u('Home/Custom/login');?>">请登陆</a></p>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>

<!--内容开始-->
<form class="frista" action="<?php echo U('Home/Custom/register');?>" id="loginForm" name="loginForm" method="post" >
<div class="password-con registered">
    <div class="psw">
        <p class="psw-p1">用户名</p>
        <input type="text" name="custom_username" id="custom_username" placeholder="HR了" />
        <span class=""></span>
    </div>
    <div class="psw">
        <p class="psw-p1">输入密码</p>
        <input type="text" name="custom_pwd" id='pwd' placeholder="请输入密码" />
        <span class=""></span>
    </div>
    <div class="psw">
        <p class="psw-p1">确认密码</p>
        <input type="text" name="repwd" id="repwd" placeholder="请再次确认密码" />
        <span class=""></span>
    </div>
<!--    <div class="psw psw2">
        <p class="psw-p1">手机号</p>
        <input type="text" name="mobile" placeholder="请输入手机号" />
        <button>获取短信验证码</button>
    </div>-->
    <div class="psw ">
        <p class="psw-p1">邮箱</p>
        <input type="text" name="custom_email" placeholder="请输入邮箱" />
        <!--<button>获取邮箱验证码</button>-->
    </div>
<!--    <div class="psw psw3">
        <p class="psw-p1">验证码</p>
        <input type="text" placeholder="请输入手机/邮箱验证码" />
    </div>-->
    <div class="psw psw3">
        <p class="psw-p1">验证码</p>
        <input type="text" name="yzm" id="yzm" placeholder="请输入验证码" />
        <img width="160" height="46" src="<?php echo U('Home/Custom/verify');?>" alt="" onclick="this.src='<?php echo U('Home/Custom/verify',array('id'=>mt_rand()));?>'" style="float:right"/>
    </div>
    <div class="agreement">
        <input type="checkbox" name="hobby"/>
        <p>我有阅读并同意<span>《宅客微购网站服务协议》</span></p>
    </div>
    <button  type="button" class="psw-btn">立即注册</button>
    <p class="sign-in">已有账号？请<a href="<?php echo U('Home/Custom/login');?>">登录</a></p>
</div>
</form>
<!--底部服务-->


<!--底部 版权-->
<div class="reg-foot">
<div class="footer w1200" >
    <p>
        <a href="#">关于我们</a><span>|</span>
        <a href="#">友情链接</a><span>|</span>
        <a href="#">宅客微购社区</a><span>|</span>
        <a href="#">诚征英才</a><span>|</span>
        <a href="#">商家登录</a><span>|</span>
        <a href="#">供应商登录</a><span>|</span>
        <a href="#">热门搜索</a><span>|</span>
        <a href="#">宅客微购新品</a><span>|</span>
        <a href="#">开放平台<?php echo ($sssss); ?></a>
    </p>
    <p>
        沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
    </p>
</div>
</div>
</body>
<script src="/Public/js/jQuery-1.8.2.min.js"></script>
<script src="/Public/js/jquery.validate.js"></script>
<script src="/Public/js/layer/layer.js"></script>
<script type="text/javascript">
      $(function(){
        var validate=$('#loginForm').validate({
            //设置验证规则
            rules: {
                custom_username: {
                    required: true,
                    minlength: 3,
                    maxlength: 18,
                    remote: {
                        url: "<?php echo U('Home/Custom/chkUsername');?>",
                        type: 'post'
                    }
                },
                custom_pwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 18
                },
                repwd: {
                    required: true,
                    equalTo: "#pwd"
                },
                mobile:{
                    required:true,
                    mobile:true
                    },
                custom_email:{
                    required:true,
                    email:true,
                    remote:{
                        url:"<?php echo u('Home/Custom/chkEmail');?>",
                        type:'post'
                    }
                },
                yzm:{
                    required:true,
                    remote: {
                        url: "<?php echo U('Home/Custom/chkVerify');?>",
                        type: 'post'
                    }
                }

            },
            messages: {
                custom_username: {
                    required: "用户名不能为空",
                    minlength: "用户名至少需要3个字符",
                    maxlength: "用户名最多18个字符",
                    remote: "用户名已存在"
                },
                custom_pwd: {
                    required: "密码不能为空",
                    minlength: "密码最少为6个字符",
                    maxlength: "密码最多为18个字符"
                },
                repwd: {
                    required: "重复密码不能为空",
                    equalTo: "两次密码输入不一致"
                },
                mobile:{
                    required:"手机号不能为空",
                    mobile:"手机号格式不正确"
                },
                custom_email: {
                    required:'邮箱不能为空',
                    email:'邮箱格式不正确',
                    remote:'邮箱已被注册'
                },
                yzm:{
                    required:'验证码不能为空',
                    remote:"验证码不正确"
                }

            },
           /* success: function(label) {
                label.addClass("ok");
            },
            validClass: "ok",*/
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }
        })
                // 手机号码验证
/*        jQuery.validator.addMethod("mobile", function (value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");
        $('#form1').submit(function () {
            if (validate.form()) {
                $('#form1').ajaxSubmit(function (res) {
                    alert(res);
                })
                return false;
            }
        })*/

   jQuery.validator.onfocus=true;

    $('.psw-btn').click(function(){
        if(validate.form()){
            $.post("<?php echo U('Home/Custom/register');?>",$('#loginForm').serialize(),function(res){
                if(res.status=='ok') {
                    layer.alert(res.msg, {
                        yes: function () {
                            location.href = "<?php echo U('Home/Index/index');?>";
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