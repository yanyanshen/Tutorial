<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录/注册</title>
    <link rel="stylesheet" href="/Public/Home/style/login.css" />
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{  color:#ff0300;  font-weight: bold;  font-size: 14px;  }
    </style>
<body>
<!-- 头部开始 -->
    <div class="header">
        <div class="headerCont wid_1200 clearfix">
            <div class="logo clearfix"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt=""></a></div>
        </div>
    </div>
<!-- 主体内容开始 -->
    <div class="cont">
        <img src="/Public/Home/images/b1.jpg" alt="">
        <div class="form">
            <p class="top">会员登录<a href="reg.html">立即注册</a></p>
            <div class="tips">公共场所不建议自动登录，以防账号丢失</div>
            <form action="<?php echo u('Login/login');?>" method="post" id="form1">
                <div class="clearfix">
                    <div class="user"></div>
                    <input class="btn1" type="text" name="username" value="">
                </div>
                <div class="clearfix">
                    <div class="pass"></div>
                    <input class="btn2" type="password" name="pwd" value=""><br />
                </div>
               <!--<div class="psw clearfix">-->
                    <!--&lt;!&ndash;<div class="zddl fl">&ndash;&gt;-->
                        <!--&lt;!&ndash;&lt;!&ndash;<input type="checkbox" class="inp"><span>自动登录</span>&ndash;&gt;&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;<div class="jzmm fl">&ndash;&gt;-->
                        <!--&lt;!&ndash;&lt;!&ndash;<input type="checkbox" class="inp"><span>记住密码</span>&ndash;&gt;&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;&lt;!&ndash;<div class="wjmm fl"><span><a href="#">忘记密码？</a></span></div>&ndash;&gt;&ndash;&gt;-->
               <!--</div>-->
                <input class="btn" type="button" value="登&nbsp;&nbsp;录"/>
            </form>
            <div class="bottom">
                <p>使用合作网站账号登录：<a href="#"><span class="wx">1121</span></a><a href="#"><span class="qq">1112</span></a><a href="#"><span class="wb">1113</span></a></p>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function(){
        var validate=$('#form1').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true
                },
                pwd:{
                    required:true
                }
            },
            messages:{
                username:{
                    required:'用户名不能为空'
                },
                pwd:{
                    required:'密码不能为空'
                }
            },
            errorElement:'div',
            errorPlacement:function(error,element){
                error.appendTo(element.parent());
            }
        })
        jQuery.validator.onfocus=true;
        $('.btn').click(function(){
            if(validate.form()){
                $.post("<?php echo u('Login/login');?>",$('#form1').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo u('Index/index');?>";
                            }
                        });
                    }else{
                        layer.alert(res.msg);
                    };
                })
            }
        })
        //回车键提交表单
        $("#form1").keydown(function(e){
            var e = e || event,
                    keycode = e.which || e.keyCode;
            if (keycode==13) {
                if(validate.form()){
                    $.post("<?php echo u('Login/login');?>",$('#form1').serialize(),function(res){
                        if(res.status=='ok'){
                            layer.alert(res.msg,{
                                yes:function(){
                                    location.href="<?php echo u('Index/index');?>";
                                }
                            });
                        }else{
                            layer.alert(res.msg);
                        };
                    })
                }
            }
        });

    })
</script>
</html>