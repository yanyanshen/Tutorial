<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
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
            /*margin-left:120px;*/  /*200px你自己随便调*/
        }
        #yzmimg{
            margin-left:146px;
            margin-top:-38px;
            margin-bottom:10px

        }
        #qq{
            margin-top:-38px;
            margin-right:120px;
        }
        #xinlang{
            margin-top:-38px;
            margin-right:70px;
        }
        #wangji{
            margin-right:290px;
        }
    </style>
</head>

<body>

<!--top 开始-->
<div class="reg">
    <div class="reg-head w1200" >
        <div class="" >
            <h1 style="padding-left:130px;"><a href="<?php echo u('Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
            <div class="reg-title">欢迎登录</div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>


<form  action="<?php echo U('Home/Custom/login');?>" name="loginForm" method="post" id="loginForm">
<div class="sign-con w1200">
    <img src="/Public/images/123123.gif" class="sign-contu f-l" />
    <div class="sign-ipt f-l">

    <div class="ipt-input">
        <p>用户名</p>
        <input type="text" class="custom_username" name="custom_username" placeholder="手机号/邮箱" />
    </div>
    <div class="ipt-input">
        <p>密码</p>
        <input type="password" class="custom_pwd" name="custom_pwd" placeholder="密码" /><br />
    </div>
    <div class="ipt-input">
        <p>验证码</p>
        <input type="text" class="yzm" name="yzm" id="yzm" placeholder="验证码" /><br />
        <img id='yzmimg' src="<?php echo U('Home/Custom/verify');?>"  class='yzmImg' height="38px" width="140px"  onclick="this.src='<?php echo U('Home/Custom/verify',array('num'=>mt_rand()));?>'" />
    </div>
        <button type="button" class="slig-btn">登录</button>
        <p>没有账号？请<a href="<?php echo U('Home/Custom/register');?>">注册</a><a id="wangji" href="#" class="wj">忘记密码？</a></p>
        <div class="sign-qx">
            <a href="#" class="f-r"><img id="qq" src="/Public/images/sign-xinlan.gif" /></a>
            <a href="#" class="qq f-r"><img id="xinlang" src="/Public/images/sign-qq.gif" /></a>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
</form>
<input type="hidden" value="<?php echo ($url); ?>" id="url"/>

<!--底部服务-->


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
            rules:{
                custom_username:{
                    required:true
                },
                custom_pwd:{
                    required:true
                },
                yzm:{
                    required:true,
                    remote:{
                        url:'<?php echo U("Home/Custom/chkVerify");?>',
                        type:'post'
                    }
                }
            },
            messages:{
                custom_username:{
                    required:'用户名不能为空'
                },
                custom_pwd:{
                    required:'密码不能为空'
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

        jQuery.validator.onfocus=true;

        $('.slig-btn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Home/Custom/login');?>",$('#loginForm').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                               var  url=$("#url").val();
                                if(url.indexOf('/')>=0){
                                    location.href=url;
                                }else{
                                    location.href="/"+url.replace(/_/g,'/')+".html";
                                }

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