<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/beauty/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/beauty/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/beauty/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/beauty/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/lrtk.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/beauty/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        label.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 14px;
        }
        label.ok {
            color:green;
        }
        </style>

        <script>

            $(function(){
            //validate表单验证
            var validate=$('#form1').validate({
                //设置验证规则
                rules:{
                    username:{
                        required:true,
                        remote:{
                            url:'<?php echo U("isSetUserName");?>',
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
                        equalTo:"#password"

                    },
                    verify:{
                        required:true,
                        remote:{
                            url:'<?php echo U("Login/chkVerify");?>',
                            type:'post'
                        }
                    },
                    email: {
                        required: true,
                        email: true

                    }

                },
                messages:{
                    username:{
                        required:'用户名不能为空',
                        remote:'用户名输入错误'
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
                    },
                    email:{
                        required:'请输入邮箱',
                        email:'请输入正确的邮箱格式'
                    }
                },
               success: function(label) {
                    label.addClass("ok").text('通过验证');
                },
                validClass:'ok'
                //errorElement:'div'
            });


            $('.log_btn').click(function(){
                //表单提交之前判断前端验证是否通过，只有通过时才提交表单
                if(validate.form()){
                    $.post("<?php echo U('ChangPassword/ChangPassword');?>",$('#form1').serialize(),function(res){
                        if(res.status==1){
                            layer.open({
                                content : res.info,
                                icon : 1,
                                yes : function(){
                                    location.href="<?php echo U('Home/Login/login');?>";
                                }
                            });
                        }else{
                            layer.open({
                                content:res.info,
                                icon:2,
                                title : '错误提示'
                            });
                        };
                    },'json')
                }

            })
        })
    </script>



    <title>修改密码</title>
</head>

<body>
<div class="log_bg">
<div class="top">
   <div class="logo"><div class="logo_link"><a href="<?php echo U('Index/Index');?>"><img src="/beauty/Public/Home/images/logo.png"></a></div><div class="phone">免费咨询热线：<b>400-567-4556</b></div></div>
  </div>
  <div class="regist">
    <div class="log_img"><img src="/beauty/Public/Home/images/imgbg_03.png" width="611" height="425"></div>
    <div class="reg_c" id="registered">
      <div class="hd">
      <ul>
       <li>忘记密码</li>

      </ul>
      </div>
      <div class="bd">
        <ul>
        <form id="form1" action="<?php echo U('ChangPsaaword');?>" method="post" name="loginForm">
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tbody><tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">密码修改</span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_user" name="username">
                </td>
              </tr>

              <tr height="50">
                  <td align="right"><font color="#ff4e00">*</font>&nbsp;新密码 &nbsp;</td>
                  <td>
                      <input type="password" value="" class="l_pwd" id="password" name="password">
                  </td>
              </tr>

              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td>
                    <input type="password" value="" class="l_pwd" name="repwd">
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱验证 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_email" name="email">
                </td>
              </tr>            
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" value="" class="l_ipt" name="verify">
                    <img  src="<?php echo U('Register/verify');?>" alt="验证码" onclick="this.src='<?php echo U('Register/verify?vid=1',array('id',mt_rand()));?>'" style="cursor: pointer;width:80px;height:40px;display: inline-block; position:relative;top: 15px;left: -4px"/>

                   </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" checked></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="button" value="确认修改" class="log_btn" id="send-btn"></td>
              </tr>
            </tbody></table>
            </form>
        </ul>

      </div>   
    </div>
    <script>jQuery("#registered").slide({trigger:"click"});</script>
  </div>
  <div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br>

    </div>    	
</div>
</div>
<script>
    $("#send-btn").click(function(){
        var username=$('input[class=1_user]').val();
    })

</script>
</body>
</html>