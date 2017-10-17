<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录/注册</title>
    <link rel="stylesheet" href="/Public/Home/style/login.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript">
        $(function () {
            $("form").validator({
                fields:{
                    username:"用户名:required",
                    passwd:"密码:required"
                },
                valid:function(form){
                    var me = this;
                    me.holdSubmit();
                    $(form).ajaxSubmit(function(res){
                        if(res=='登录成功'){
                            layer.msg(res+',即将跳转',{
                                icon:1,
                                time:1000
                            },function(){
                                location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>";
                            })
                        }else{
                            layer.msg(res,{
                                icon:1,
                                time:2000
                            },function(){
                                me.holdSubmit(false);
                            })
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>
<!-- 头部开始 -->
    <div class="header">
        <div class="headerCont wid_1200 clearfix">
            <div class="logo clearfix"><a href="../Index/index.html"><img src="/Public/Home/images/logo.png" alt=""></a></div>
            <!--<span><input class="btn" type="button" value="搜索"><input type="text" value="血丸子" placeholder="血丸子" /></span>-->
        </div>
    </div>
<!-- 主体内容开始 -->
    <div class="cont">
        <img src="/Public/Home/images/loginbg.jpg" alt="">
        <div class="form">
            <p class="top">会员登录<a href="reg.html">立即注册</a></p>
            <div class="tips">公共场所不建议自动登录，以防账号丢失</div>
            <form action="logined" method="post" autocomplete="off" disableautocomplete>
                <div class="clearfix">
                    <div class="user"></div>
                    <input type="text" name="username">
                </div>
                <div class="clearfix">
                    <div class="pass"></div>
                    <input type="password" name="passwd">
                </div>
               <div class="psw clearfix">
                    <div class="zddl fl">
                        <input type="checkbox" class="inp"><span>自动登录</span>
                    </div>
                    <div class="jzmm fl">
                        <input type="checkbox" class="inp"><span>记住密码</span>
                    </div>
                    <div class="wjmm fl"><span><a href="#"></a></span></div>
               </div>
                <input type="submit" class="btn" value="登录">
            </form>

            <div class="bottom">
                <p>使用合作网站账号登录：<a href="#"><span class="wx">1121</span></a><a href="#"><span class="qq">1112</span></a><a href="#"><span class="wb">1113</span></a></p>
            </div>
        </div>
    </div>
</body>
</html>