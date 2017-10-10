<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
    <style>
         .form .item{
            margin-bottom: 25px;
        }
        #username-error.error,#password-error.error,#c_password-error.error,#mobile-error.error,#f_password-error.error{
            color: #ff0000;
            background: url("/Public/Home/images/error.png") no-repeat 105px 4px;
            padding-left: 120px;
            font-size: 14px;
            /*float:left;*/
        }
        #username-error.ok,#password-error.ok,#c_password-error.ok,#mobile-error.ok,#f_password-error.ok{
            color: green;
            background: url("/Public/Home/images/ok.png") no-repeat 105px 4px;
            padding-left: 120px;
            font-size: 14px;
        }
    </style>
    <script>
        $(function () {
           var validate= $('#form2').validate({
                //设置规则
                rules:{
                    username: {
                        required: true,
                        rangelength: [3, 10],
                        remote:{
                            url:"<?php echo U('Registered/chkName');?>",
                            type:"post"
                        }
                    },
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
                    username:{
                        required:'用户名不能为空',
                        rangelength:'长度为3-10字符',
                        remote:'用户名已经存在'
                    },
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
                $('#regist').click(function () {
                    if(validate.form()) {
                        $.post('<?php echo U("registered");?>', $('#form2').serialize(), function (res) {
                            if (res.status == 1) {
                                layer.msg('注册成功', {
                                    icon: 6,
                                    time:1000
                                }, function () {
                                    location = "<?php echo U('Index/index');?>";
                                });
                            } else {
                                layer.msg('注册失败,请重新注册', {
                                    icon: 6,
                                    time:1000
                                }, function () {
                                    location = "<?php echo U('Registered/registered');?>";
                                });
                            }
                        });
                    }
                })
        })
    </script>
    <script language="javascript">
        function get_mobile_code(){
            $.post('<?php echo U("Registered/mobileRegist");?>', {mobile:jQuery.trim($('#mobile').val())},function(msg){
            layer.msg(jQuery.trim(unescape(msg)));
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
                        equalTo:'#f_password'
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
            $('#mobileRegist').click(function () {
                if(validate.form()) {
                    $.post('<?php echo U("mobile");?>', $('#form1').serialize(), function (res) {
                        if (res.status == 1) {
                            layer.msg('注册成功', {
                                icon: 6,
                                time:1000
                            }, function () {
                                location = "<?php echo U('Index/index');?>";
                            });
                        } else {
                            layer.msg('注册失败,请重新注册', {
                                icon: 5,
                                time:1000
                            }, function () {
                                location = "<?php echo U('Registered/registered');?>";
                            });
                        }
                    });
                }
            })

        })
    </script>
<title>用户注册</title>
</head>
<body>
<!--顶部样式-->
<div class="common_top">
 <div class="Narrow">
  <div class=" left logo"><a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
  <!--电话图层-->
  <div class="phone"><label>全国服务热线：</label><em>400-345-5633</em></div>
 </div>
</div>
<!--用户注册样式-->
<div class="registered_style Narrow clearfix" style="width: 1280px">
   <div class="left_advertising" style="margin-top: 60px">
    <img src="/Public/Home/images/bg_03.png" />
   </div>
   <div class="right_register" style="width: 660px;margin-left: 60px">
     <div class="register_Switching" id="register_Switching" style="margin-top: 60px">
       <div class="hd">
        <ul><li>快速注册</li><li>普通注册</li></ul>
       </div>
       <div class="bd" style="padding: 40px 40px">
        <ul>
         <form id="form1" name="form1" method="post" action="<?php echo U('Registered/registered');?>">
	   <div class="form clearfix">
           <div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px">密&nbsp;&nbsp;码：</label><input name="password" id="f_password" type="password"  class="text" /></div>
        <div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px" >确认密码：</label><input name="c_password" type="password"  class="text" /></div>
        <div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px">手机号&nbsp;：</label><input id="mobile" name="mobile" type="text"  class="text" /><input id="zphone" type="button" value=" 获取手机验证码 " style="width: 120px;height:34px;border: 1px solid #ccc;cursor: pointer" onClick="get_mobile_code();"></div>
           <div id="time" class="item" style="height:20px;display: none">验证码已发送,请注意查收短信,60秒内有效！</div>
           <div class="item"><label class="rgister-label" style="width: 100px">验证码&nbsp;：</label><input name="mobile_code" type="text"  class="text" /></div>
        <div class="item-ifo">
                    <input type="checkbox" class="checkbox left" checked="checked" id="readme" onclick="agreeonProtocol();">
                    <label for="protocol" class="left">我已阅读并同意<a href="#" class="blue" id="protocol">《福际商城用户注册协议》</a></label>
                </div>
       </div>
       <div class="rgister-btn">
	  <a href="javascript:;" id="mobileRegist" class="btn_rgister">注&nbsp;&nbsp;&nbsp;&nbsp;册</a>
	  </div>
	  <div class="Note"><span class="login_link">已是会员<a href="<?php echo U('Login/login');?>">请登录</a></span></div>
       </form>
        </ul>
        <ul>
     <form id="form2" name="form1" method="post">
	   <div class="form clearfix">	
	    <div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px">用户名&nbsp;：</label><input name="username" type="text"  class="text" /><b>*</b></div>
		<div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px">密&nbsp;&nbsp;码：</label><input name="password" id="password" type="password"  class="text" p/><b>*</b></div>
		<div class="item" style="height: 36px"><label class="rgister-label " style="width: 100px">确认密码：</label><input name="c_password" type="password"  class="text" /><b>*</b></div>
        <div class="item" style="height: 36px"><label class="rgister-label" style="width: 100px">手&nbsp;&nbsp;机：</label><input name="mobile" type="text"  class="text" /><b>*</b></div>
	    <div class="item "><label  class="rgister-label " style="width: 100px">验证码&nbsp;：</label><input name="verify" type="text"  class="Recommend_text" /><img
                src="<?php echo U('verify');?>" id="verify" alt="验证码" onclick="this.src='<?php echo U('verify');?>'" style="width: 80px;height: 36px;cursor: pointer;float: right;margin-right: 252px"/></div>
		<div class="item-ifo">
                    <input type="checkbox" class="checkbox left" checked="checked" id="readme" onclick="agreeonProtocol();">
                    <label for="protocol" class="left">我已阅读并同意<a href="#" class="blue" id="protocol">《福际商城用户注册协议》</a></label>
                </div>
	  </div>	
	  <div class="rgister-btn">
          <!--<input type="submit" value="注册" style="width: 238px;height:38px;background-image: url('/Public/Home/images/Button_img.png');border: none" />-->
          <a href="javascript:;" id="regist"  class="btn_rgister">注&nbsp;&nbsp;&nbsp;&nbsp;册</a>
	  </div>
	  <div class="Note"><span class="login_link">已是会员<a href="<?php echo U('Login/login');?>">请登录</a></span></div>
	  </form>
        </ul>
       </div>
     </div>
     <script>jQuery(".register_Switching").slide({trigger:"click"});</script>
    </div>
</div>
<!--底部样式-->
 <div class="bottom_footer">
   <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a>| <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a>  </p>
	 <p>Copyright©2010-2016河南巴山雀舌有限公司zuipin.cn.All Rights Reserved. </p>
	 <p>豫ICP备09150084号</p>
   </div>
</body>
</html>