<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>用户注册</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/dist/jquery.validator.min.js?local=zh_CN"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/geo.js"></script>
    <script src="/Public/Mobile/js/layer.js"></script>
    <script src="/Public/Home/js/YMDClass.mini.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/login.css"/>
    <script type="text/javascript">
        function promptinfo(){
            var address = document.getElementById('address');
            var s1 = document.getElementById('s1');
            var s2 = document.getElementById('s2');
            var s3 = document.getElementById('s3');
            address.value = s1.value + s2.value + s3.value;
        }
        (function(){
            function w() {
                var r = document.documentElement;
                var a = r.getBoundingClientRect().width;
                if (a > 750 ){
                    a = 750;
                }
                rem = a / 7.5;
                r.style.fontSize = rem + "px"
            }
            var t;
            w();
            window.addEventListener("resize", function() {
                clearTimeout(t);
                t = setTimeout(w, 300)
            }, false);
        })();

        $(function(){
            $("form").validator({
                fields:{
                    username:"用户名:required;username;remote[chkUser]",
                    passwd:"密码:required;password",
                    repasswd:"确认密码:required;match(pwd)",
                    tel:"手机号码:required;mobile",
                    email:"邮箱:required;email",
                    sex:"checked"
                },
                valid:function(form){
                    var me = this;
                    me.holdSubmit();
                    $(form).ajaxSubmit(function(res){
                        if(res=='注册成功'){
                            layer.open({
                                type:2,
                                time:2,
                                end:function(){
                                    layer.open({
                                        content:res,
                                        time:2,
                                        end:function(){
                                            location.href="<?php echo U('Index/index');?>"
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            });
            new YMDselect('year','month','day');
            setup();preselect('北京市');promptinfo();
            $("#s3").change(promptinfo);
            $("#reg").click(function(){
                $("form").submit();
            })
        })
    </script>
</head>
<body>
<!-- 头部 开始 -->
<div class="header">
    <div class="shop clearfix">
        <p>用户注册</p>
    </div>
</div>
<!-- 头部 结束 -->
<div class="main">
    <form action="<?php echo u('registered');?>" method="post">
        <ul>
            <li>
                <span class="lf"> 用户名:</span><span class="rf"><input type="text" class="inputt" name="username"/></span>
            </li>
            <li>
                <span class="lf"> 密码:</span><span class="rf"><input type="password" class="inputt" name="passwd"/></span>
            </li>
            <li>
                <span class="lf"> 确认密码:</span><span class="rf"><input type="password" class="inputt" name="repasswd"/></span>
            </li>
            <li>
                <span class="lf"> 性别:</span><span class="rf" style="margin-left: 0.3rem"><input class="sex" type="radio" name="sex" value="男" data-msg-checked="性别为必选,且无法更改,请慎重选择!">男<input class="sex" type="radio" name="sex" value="女">女</span>
            </li>
            <li>
                <span class="lf"> 所在地:</span><span class="rf" style="margin-left: 0.3rem"><select class="select" id="s1">
                <option></option>
            </select>
                        <select class="select" id="s2">
                            <option></option>
                        </select>
                        <select class="select" id="s3">
                            <option></option>
                        </select>
                        <input id="address" name="address" type="hidden" value="" /></span>
            </li>
            <li>
                <span class="lf"> 出生年月:</span><span class="rf" style="margin-left: 0.3rem"><select name="year"></select>
                    <select name="month"></select>
                    <select name="day"></select></span>
            </li>
            <li>
                <span class="lf"> 手机号:</span><span class="rf"><input type="text" class="inputt" name="tel"/></span>
            </li>
            <li>
                <span class="lf"> 邮箱:</span><span class="rf"><input type="text" class="inputt" name="email"/></span>
            </li>
            <div class="fenge"><a href="javascript:void (0)" id="reg">注册</a></div>
        </ul>
    </form>
</div>
</body>
</html>