<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">

<title>修改密码</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/Public/Mobile/css/personal.css" rel="stylesheet">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/jquery.validate.js"></script>
<script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
<script>
$(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
    // console.log(a);
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
});

</script>
    <style>
        #password-error.error,#n_password-error.error,#cn_password-error.error{
            color: #ff0000;
            background: url("/Public/Mobile/images/error.png") no-repeat 35px 4px;
            padding-left: 1rem;
            font-size: 14px;
        }
        #password-error.ok,#n_password-error.ok,#cn_password-error.ok{
            color: green;
            background: url("/Public/Mobile/images/ok.png") no-repeat 35px 4px;
            padding-left: 1rem;
            font-size: 14px;
        }
    </style>
    <script>
        $(function(){
            var validate=$('#form1').validate({
                //设置规则
                rules:{
                    password: {
                        required: true,
                        remote:{
                            url:"{U:('UserCenter/chkpassword')}",
                            type:'post'
                        }
                    },
                    n_password:{
                        required:true,
                        rangelength:[5,15]
                    },
                    cn_password:{
                        required:true,
                        equalTo:'#n_password'
                    }
                },
                //设置提示信息
                messages:{
                    password:{
                        required:'请输入原密码',
                        remote:'原密码错误'
                    },
                    n_password:{
                        required:'请输入新密码',
                        rangelength:'新密码长度在5-15个字符之间'
                    },
                    cn_password:{
                        required:'请确认密码',
                        equalTo:'重复密码错误'
                    }
                },
                success:function(label){
                    label.addClass('ok').text('验证成功');
                },
                validClass:"ok",
                errorPlacement:function(error,element){
                    error.appendTo(element.parent());
                }
            })
            $('#btn').click(function(){
                if(validate.form()){
                    $.post('<?php echo U("UserCenter/changepassword");?>',$('#form1').serialize(),function(res){
                        if(res.status==1){
                            layer.open({
                                content:'修改成功,请重新登录',
                                btn:['确定','取消'],
                                yes:function () {
                                    location = "<?php echo U('Login/login');?>"
                                }
                            });
                        }else{
                            layer.open({
                                content:'修改失败',
                                btn:['确定','取消'],
                                yes:function () {
                                    location = "<?php echo U('UserCenter/changepassword');?>"
                                }
                            });
                        }
                    });
                }
            })
        })
    </script>
</head>
<body>
<!--头部 开始-->
<div class="header">
    <div class="wrapper">
        <p><a href="javascript:history.go(-1)"><返回</a></p>
        <h2><a href="#">修改密码</a></h2>
        </div>
</div>
<!--头部 结束-->
<!--收藏 开始-->
<div class="collect">
    <form action="" id="form1" method="post">
    <ul>
        <li class="li02" style="font-size: 0.3rem;margin-top: 0.7rem">原&nbsp;密&nbsp;码&nbsp;:<input type="password"  name="password" style="width:5rem;height: 0.7rem;border: none;font-size: 0.4rem;margin-left: 0.3rem;outline: none"/></li>
        <li class="li02" style="font-size: 0.3rem;margin-top: 0.7rem">新&nbsp;密&nbsp;码&nbsp;:<input type="password"  name="n_password" id="n_password" style="width:5rem;height: 0.7rem;border: none;font-size: 0.3rem;margin-left: 0.3rem;outline: none"/></li>
        <li class="li02" style="font-size: 0.3rem;margin-top: 0.7rem">重复密码:<input type="password"  name="cn_password" style="width:5rem;height: 0.7rem;border: none;font-size: 0.3rem;margin-left: 0.3rem;outline: none"/></li>
    </ul>
    </form>
    <input type="button" value="确认修改" id="btn" style="cursor:pointer;width: 6rem;height: 0.8rem;margin-left: 0.7rem;margin-top: 1rem;border: none;background-color: #f00;color: #ffffff;font-size: 0.4rem"/>
</div>
<!--收藏 结束-->

</body>
</html>