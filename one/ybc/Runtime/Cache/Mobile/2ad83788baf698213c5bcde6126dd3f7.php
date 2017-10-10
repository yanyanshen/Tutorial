<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN" style="font-size: 34.722px;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>会员注册</title>
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
       #form1 input{
           width: 100%;
           height: 20px;
           margin-bottom: 10px;
       }
       #form1 li{
           width: 60%;
           margin-top: 30px;
           height: 42px;
           margin-left: 60px;
       }
        #password-error.error,#c_password-error.error,#mobile-error.error{
            font-size: 14px;
            color: #ff0000;
            padding-left: 20px;
            background: url("/Public/Mobile/images/error.png") no-repeat 3px 6px;
        }
        #password-error.ok,#c_password-error.ok,#mobile-error.ok{
            font-size: 14px;
            color: green;
            padding-left: 20px;
            background: url("/Public/Mobile/images/ok.png") no-repeat 3px 6px;
        }
    </style>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
    <script language="javascript">
        function get_mobile_code(){
            $.post('<?php echo U("Registered/mobileRegist");?>', {mobile:jQuery.trim($('#mobile').val())},function(msg){
                layer.open({
                    content: jQuery.trim(unescape(msg)),
                    skin: 'msg',
                    time: 2
                });
                if(msg=='提交成功'){
                    RemainTime();
                }
            })
        }
        var iTime = 59;
        var Account;
        function RemainTime(){
            document.getElementById('zphone').disabled = true;
            var iSecond,sSecond="",sTime="";
            if (iTime >= 0){
                iSecond = parseInt(iTime%60);
                iMinute = parseInt(iTime/60)
                if (iSecond >= 0){
                    if(iMinute>0){
                        sSecond = iMinute + "分" + iSecond + "秒";
                    }else{
                        sSecond = iSecond + "秒";
                    }
                }
                sTime=sSecond;
                if(iTime==0){
                    clearTimeout(Account);
                    sTime='获取手机验证码';
                    iTime = 59;
                    document.getElementById('zphone').disabled = false;
                }else{
                    Account = setTimeout("RemainTime()",1000);
                    iTime=iTime-1;
                }
            }else{
                sTime='没有倒计时';
            }
            document.getElementById('zphone').value ='重发验证码(' +sTime+')';
        }
    </script>
    <script>
        $(function(){
            var validate= $('#form1').validate({
                //设置规则
                rules:{
                    password:{
                        required:true,
                        rangelength:[5,10]
                    },
                    c_password:{
                        required:true,
                        equalTo:'#password'
                    },
                    mobile:{
                        required:true,
                        mobile:true,
                        remote:{
                            url:'<?php echo U("Registered/chkMobile");?>',
                            type:'post'
                        }
                    }
                },
                //设置提示信息
                messages:{
                    password:{
                        required:'密码不能为空',
                        rangelength:'密码长度为5-10字符'
                    },
                    c_password:{
                        required:'重复密码不能为空',
                        equalTo:'两次密码输入不符'
                    },
                    mobile:{
                        required:'手机号不能为空',
                        mobile:'手机号格式不正确',
                        remote:'该手机号已经注册'
                    }
                },
                success:function(div){
                    div.addClass('ok').text('验证成功');
                },
                validClass:'ok',
                errorElement:'div',
                errorPlacement:function(error,element){
                    error.appendTo(element.parent());
                }
            })
            jQuery.validator.addMethod("mobile",function(value,element){
                var mobileReg=/^1[34578]{1}[0-9]{9}$/;
                return this.optional(element)||(mobileReg.test(value));
            },'请填写正确的手机号码')
            $('#mobileRegist').click(function () {
                if(validate.form()) {
                    $.post('<?php echo U("mobile");?>', $('#form1').serialize(), function (res) {
                        if (res.status == 1) {
                            layer.open({
                                content: res.info,
                                skin: 'msg',
                                btn: ['确定', '取消'],
                                yes: function () {
                                    location = "<?php echo U('Login/login');?>"
                                }
                            })
                        } else {
                            layer.open({
                                content:res.info,
                                skin:'msg',
                                time:2
                            })
                        }
                    });
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

<div class="login clearfloat box-s">
    <h3 style="color: #25cb83">会员注册</h3>

    <form id="form1" method="post">
    <div class="clearfloat">
        <ul>
            <li class="ra3">
                    <span class="opa3"></span>
                    <input type="text" name="mobile" id="mobile" value="" placeholder="手机号">
            </li>
            <li class="ra3">
                    <span class="opa3"></span>
                    <input type="password" name="password" value="" id="password" placeholder="登录密码">
            </li>
            <li class="ra3">
                    <span class="opa3"></span>
                    <input type="password" name="c_password" value="" placeholder="重复密码">
            </li>
            <li class="ra3" style="width: 80%;">
                    <span class="opa3"></span>
                    <input style="width: 40%;"  type="text" name="mobile_code" value="" placeholder="手机验证码"><input id="zphone" type="button" value=" 获取验证码 " style="font-size:14px;margin-left:0;width: 25%;height: 28px; background-color:#999999;cursor: pointer" onClick="get_mobile_code();">
            </li>
        </ul>
    </div>
    </form>
    <div class="login-btn">
        <a id="mobileRegist" >
            注册
        </a>
    </div>
    <div class="mima mimaone clearfloat">
        <ul>
            <li class="fr">
                <a href="<?php echo U('Login/login');?>" style="text-decoration: none">立即登录</a>
            </li>
        </ul>
    </div>
</div>


</body></html>