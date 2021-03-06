<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>欢迎您的到来</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/styles.css">
    <script src="/Public/Home/js/login/jQuery-1.8.2.min.js"></script>
    <script src="/Public/Home/js/login/jquery.validate.js"></script>
   <script src="/Public/Home/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/abc.js"></script>
    <script>
        $(function(){
            //validate表单验证
            var validate=$('#form1').validate({
                //设置验证规则
                rules:{
                    username:{
                        required:true,
                        minlength:2,
                        maxlength:15,
                        remote:{
                            url:'<?php echo U("chkUserName");?>',
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
                    verify:{
                        required:'请输入验证码',
                        remote:'验证码不正确'
                    }
                },
                success: function(div) {
                    div.addClass("ok").text('通过验证');
                },
                validClass:'ok',
                errorElement:'div'
            })


            $('.floating-btn').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单


                    if (validate.form()) {
                        $.post("<?php echo U('register');?>", $('#form1').serialize(), function (res) {
                            if (res.status == 1) {
                                layer.open({
                                    content: res.info,
                                    icon: 1,
                                    yes: function () {
                                        location.href = "<?php echo U('Home/Index/index');?>";
                                    }
                                });
                            } else {
                                layer.open({
                                    content: res,
                                    icon: 2,
                                    title: '错误提示'
                                });
                            }
                        }, 'json')
                    }

            })
        })
    </script>
</head>
<body>
<div class="login-top">
    <div class="wrapper">
        <span class="logo"><img src="/Public/Home/images/logo2.png" alt=""></span>
    </div>
</div>
<div class="zhu">
    <img src="/Public/Home/images/zs.png" alt="左上" class="zs">
    <img src="/Public/Home/images/ys.png" alt="右上" class="ys">
    <!--<div class="ad"><img src="/Public/Home/images/1.png" alt="" class="yuan"></div>-->
    <div class="panel-lite">
        <div class="img"><img  src="/Public/Home/images/h1.png" alt=""/></div>
        <h4>用户注册</h4>
        <form action="<?php echo U('Member/register');?>" method="post" id="form1">
            <div class="form-group">
                <input name="username" required="required" class="form-control" autocomplete="off"/>
                <label class="form-label">用户名    </label>
            </div>
            <div class="form-group">
                <input name="password" id="pwd" type="password" required="required"  class="form-control"/>
                <label class="form-label">密　码</label>
            </div>
            <div class="form-group">
                <input name="repwd" type="password" required="required" class="form-control"/>
                <label class="form-label">重复密码</label>
            </div>
            <div class="form-group" style="position: relative">
                <label class="form-label"> <img   class="verify" src="<?php echo U('verify');?>" alt="验证码" onclick="this.src='<?php echo U('verify?vid=1',array('id',mt_rand()));?>'"></label>
                <input type="text" name="verify" required="required" class="form-control1" autocomplete="off"/>
                <label class="form-label">验证码</label>
            </div>
            <div class="denglu">
                <!--<div class="qq"><img src="/Public/Home/images/qq.png"></div>
                <div class="wb"><img src="/Public/Home/images/wb.png"></div>
                <div class="zfb"><img src="/Public/Home/images/zfb.png"></div>-->
                <span id="hzy_fast_login"></span>
            </div>
            <span style="margin-left:200px;"><a href="<?php echo U('Member/login');?>">已有账号,去登录</a></span>
            <div>
                <button id="btnSub" class="floating-btn" type="button" ><i class="icon-arrow"></i></button>
            </div>

        </form>
    </div>
    <img src="/Public/Home/images/zx.png" alt="左下" class="zx">
    <img src="/Public/Home/images/yx.png" alt="右下" class="yx">
</div>


<div class="footer">
    关于我们 | 联系我们 | 人才招聘 | 商家入驻 | 广告服务 | 手机电商 | 友情链接 | 销售联盟 | 美食社区 | 热爱公益 | English Site<br>
    <span>Copyright © 2004-2016  我爱我家wawj.com 版权所有</span>
</div>
</body>
</html>