<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/JBen/css/jquery.mobile-1.3.2.min.css">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/JBen/css/style.css">
<link rel="stylesheet" type="text/css" href="/Shop/Public/Mobile/JBen/css/theme.css">
<body>
<form action="<?php echo U('Users/send_sms_code');?>" method="post" name="form1" id="form1">
    <div data-role="page" data-theme="f">
        <div data-role="header" data-theme="f" style="position:relative;">
            <a href="<?php echo U('Users/login');?>" data-ajax="false" class="back" data-role="none" data-direction="reverse"><img src="/Shop/Public/Mobile/JBen/images/back.png" style="height: 27px"></a>
            <h3 style="position:absolute;top:-0.7rem;left:2.5rem;">返回</h3>
        </div>
        <div data-role="content" >
            <div class="login-input-box">
                <div class="line1">
                    <img src="/Shop/Public/Mobile/JBen/images/user.png">
                    <input type="text" class="user" value="用户名" id="username"    onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}" data-role="none">
                </div>
                <!-- <div class="line3">
                     <img src="/Shop/Public/Mobile/JBen/images/mail.png">
                     <input type="text" class="mail" value="注册邮箱" onfocus="if(value=='注册邮箱') {value=''}" onblur="if (value=='') {value='注册邮箱'}" data-role="none">
                 </div>-->
                <div class="line2">
                    <img src="/Shop/Public/Mobile/JBen/images/phone.png">
                    <input type="text" class="lock" value="手机号"  name="mobile" id="mobile" onfocus="if(value=='手机号') {value=''}" onblur="if (value=='') {value='手机号'}" data-role="none">
                </div>
                <div class="line3">
                    <img src="/Shop/Public/Mobile/JBen/images/message.png">
                    <input type="text" class="lock" value="短信校验码"  id="code"    onfocus="if(value=='短信校验码') {value=''}" onblur="if (value=='') {value='短信校验码'}" data-role="none">
                    <input data-inline="true" id="btn-code"  type="button" value="点击获取" onclick="sendCode()" >
                </div>
                <div class="chose">
                    <a class="register" data-role="none" ></a>
                    <a class="forgive" data-role="none"></a>
                    <a href="javascript:void(0);" data-ajax="false" date-rel="dialog" data-role="none" class="login" onclick="send_Code()"> 确定</a>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<script src="/Shop/Public/mobile/Jben/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<!-- <<script src="/Shop/Public/mobile/Jben/js/jquery.mobile-1.3.2.min.js" type="text/javascript"></script> -->
<script src="/Shop/Public/mobile/Jben/js/main.js" type="text/javascript"></script>
<script src="/Shop/Public/mobile/Jben/js/layer_mobile/layer.js" type="text/javascript"></script>
<style>
    .chose .login {background:#da5959;  margin: 40px 0;  width: 65%;  font-size: 18px;  line-height: 2.0rem;  text-align: center;  color:white!important;  background: #da5959;  border-radius: 20px;  margin-top: 55px;  margin-right: 70px;  }
    .layui-m-layercont {  padding: 27px 10px 25px 10px;  text-align: center;  border: 1px solid #aaa;  background:#aaa ;  color: #2e4767;  }  .layui-m-layerbtn span[yes] {  color: #2d4b5f;  }  .layui-m-layerbtn span[no] {  color:rgba(18, 32, 41, 0.71);  }
    .line3{position: relative;}
    #btn-code{position: absolute;top: 0.5rem;right: 0;border:0.1rem solid black;height: 1.5rem;}
</style>
<script>
    function send_Code() {
        var mobile = $('#mobile').val();
        var username = $('#username').val();
        var Length = parseInt($('#username').val().length);
        var Mol = $('#mobile').val().length;
        var Code=$('#code').val();
        if (username == '' || username == '用户名') {
            layer.open({
                content: '请填写用户名',
                skin: 'msg',
                time: 2
            });
        } else if (mobile == '' || mobile == '手机号') {
            layer.open({
                content: '请填写手机号',
                skin: 'msg',
                time: 2
            });
        }else if(Code==''||Code=='短信校验码'){
            layer.open({
                content: '请填写校验码',
                skin: 'msg',
                time: 2
            });
        } else {
            if (Length <= 5) {
                if (!username.match(/^[a-zA-z0-9][a-zA-Z0-9_]{5,9}$/)) {
                    layer.open({
                        content: '请填写6-12位的用户名',
                        skin: 'msg',
                        time: 2
                    });
                }
            } else {
                if (Mol !== 11) {
                    layer.open({
                        content: '请填写11位的手机号'
                        , skin: 'msg'
                        , time: 2 //2秒后自动关闭
                    });
                } else {
                    if (!mobile.match(/^1[3|4|5|7|8][0-9]\d{4,8}$/)) {
                        layer.open({
                            content: '手机号格式不正确'
                            , skin: 'msg'
                            , time: 2
                        });
                    } else {
                        $.ajax({
                            url: '<?php echo U("Users/send_Code");?>',
                            type: 'post',
                            data: {
                                'username': $('#username').val(),
                                'mobile': $('#mobile').val(),
                                'Code': $('#code').val()
                            },
                            error: function () {
                                layer.open({
                                    content: '网络错误 请重新填写',
                                    skin: 'msg',
                                    time: 2
                                });
                            },
                            success: function (res) {
                                if (res == 0) {

                                            location.href = "<?php echo U('Users/revisions');?>"


                                } else if(res == 1) {
                                    layer.open({
                                        content: '用户名和手机号不匹配',
                                        style: 'background-color:#09C1FF; color:#fff; border:none;',
                                        time: 3
                                    });
                                } else  {
                                    if(res==3){
                                        layer.open({
                                            content: '验证码错误(错误号:172001)',
                                            style: 'background-color:#09C1FF; color:#fff; border:none;',
                                            time: 3
                                        });
                                    }
                                }
                            }
                        })
                    }
                }
            }
        }
    }
</script>
<script>
      //验证码倒计时处理函数
    function setRemainTime(){
        if(curCount==0){
            window.clearInterval(InterValObj);//停止计时
            $("#btn-code").removeAttr("disabled");
            $("#btn-code").val('重新获取');
        }else{
          
            curCount--;
            // alert(curCount);
            $("#btn-code").attr("value",curCount+'秒后获取');
            // alert($('#btn-code').val());
        }

    }

    var InterValObj;//timer变量 控制时间
    var count=60;//失效时间
    var curCount;//剩余秒数
    function sendCode(){
        var tel=$('#mobile').val();
        var tellength=$('#mobile').val().length;
        var username=$('#username').val();
        if(username==''|| username=='用户名') {
            layer.open({
                content: '请填写用户名'
                , skin: 'msg'
                , time: 2 //2秒后自动关闭
            });
        }else if(tel==''||  tel=='手机号'){
            layer.open({
                content: '请填写手机号'
                , skin: 'msg'
                , time: 2 //2秒后自动关闭
            });
        }else{
            if(tellength==11){
                if(!tel.match(/^1[3|4|5|7|8][0-9]\d{4,8}$/)){
                    layer.open({
                        content: '格式不正确'
                        ,skin: 'msg'
                        ,time: 2
                    });
                }else{
                    $.ajax({
                        url:'<?php echo U("Users/send_sms_code");?>',
                        type:'post',
                        data:{'tel':$('#mobile').val(),'username':$('#username').val()},
                        error:function(){
                            layer.open({
                                content: '获取验证码失败'
                                ,skin: 'msg'
                                ,time: 2
                            });
                        },
                        success:function(msg){
                            if(msg==1){
                                curCount=count;
                                //设置button效果开始计时
                                $("#btn-code").attr("disabled",true);
                                $("#btn-code").val(curCount+'秒后获取');
                                InterValObj=window.setInterval(setRemainTime,1000);
                                
                                layer.open({
                                    content: '验证吗已发送 请注意接收'
                                    , skin: 'msg'
                                    , time: 2 //2秒后自动关闭
                                });
                                //启动计时器
                            }else if(msg==2){
                              
                                layer.open({
                                    content: '用户名和手机号不匹配'
                                    ,skin: 'msg'
                                    ,time: 2
                                });
                            }else{
                                 curCount=count;
                                //设置button效果开始计时
                                $("#btn-code").attr("disabled",true);
                                $("#btn-code").val(curCount+'秒后获取');
                                InterValObj=window.setInterval(setRemainTime,1000)
                                
                                layer.open({
                                    content: '验证吗已发送 请注意接收'
                                    , skin: 'msg'
                                    , time: 2 //2秒后自动关闭
                                });
                                
                                if(msg==3){
                                    
                                    layer.open({
                                        content: '手机号和用户名不匹配'
                                        ,skin: 'msg'
                                        ,time: 2
                                    });
                                    $('#btn-code').val("重新获取")
                                }
                            }
                        }

                    });
                }
            }else{
                layer.open({
                    content: '请填写11位的手机号'
                    ,skin: 'msg'
                    ,time: 2
                });
            }
        }

    }
  
</script>
</html>