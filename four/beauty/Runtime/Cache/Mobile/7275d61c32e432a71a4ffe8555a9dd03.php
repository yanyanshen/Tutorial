<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>会员中心 - 修改密码</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <meta charset="utf-8" /> 
  <link rel="dns-prefetch" href="//ued.paixie.net" /> 
  <link rel="dns-prefetch" href="//img-cdn2.paixie.net" /> 
  <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <meta http-equiv="X-UA-Compatible" content="edge" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <meta name="format-detection" content="telphone=no, email=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta name="HandheldFriendly" content="true" /> 
  <meta name="MobileOptimized" content="320" /> 
  <meta name="screen-orientation" content="portrait" /> 
  <meta name="x5-orientation" content="portrait" /> 
  <meta name="full-screen" content="yes" /> 
  <meta name="x5-fullscreen" content="true" /> 
  <meta name="browsermode" content="application" /> 
  <meta name="x5-page-mode" content="app" /> 
  <meta name="msapplication-tap-highlight" content="no" /> 
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" /> 
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','password'],'2015/09/15 16:08:10',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script> 
  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.member2_0.password.v3901.css" type="text/css" /> 
  <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script> 
  <style type="text/css">
.m_header,
.body{max-width: 640px;}
.m_header{left:50%;margin-left: -320px;}
</style> 
  <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script> 
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header"> 
    <p> <a class="bt_prev" href="<?php echo U('Member/accout');?>"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
    <h1 class="ellipsis bt_title"> 修改密码 </h1> 
    <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p> 
   </div> 
   <div class="m_menu hidden"> 
    <div> 
     <i class="rotate45"></i>
        <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
        <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
        <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
        <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content"> 
    <div class="placeholder"></div> 
    <div class="gray9 f28 w600">
     同时修改微小店登录密码
    </div> 
    <div class="placeholder"></div> 
    <!--<ul form-submit="js_submit" class="m_list m_list_form m_list_form_separate">-->
       <form id="form" action="">
           <ul  class="m_list m_list_form m_list_form_separate">
     <li class="password"> <label class="gray6">当前密码</label> <input id="js_password" name="oldpassword" placeholder="请输入当前密码" type="password" />
      <div class="right text-v"> 
       <a class="m_icon m_icon_del"> <dfn class="rotate45"></dfn> <dfn class="rotate135"></dfn> </a> 
      </div> </li> 
     <li class="password"> <label class="gray6">新密码</label> <input id="js_password2"  name="newpassword" placeholder="请输入新密码" type="password" />
      <div class="right text-v"> 
       <a class="m_icon m_icon_del"> <dfn class="rotate45"></dfn> <dfn class="rotate135"></dfn> </a> 
      </div> 
      <div class="grayc f24">
       密码由6-20位英文字母、数字或者符号组成
      </div> 
      <div id="js_strength" class="gray9 hidden">
       密码强度：
       <span class="orange">强</span>
      </div> </li> 
    </ul> 
    <div class="placeholder"></div> 
    <div class="w600 f24 gray9"> 
     <label class="m_setting m_setting_password"> <i></i> <span><b><dfn></dfn><dfn></dfn><dfn></dfn></b></span> <strong><b>ABC</b></strong> <input id="js_show_password" type="checkbox" /> </label> 
     <label>显示密码</label> 
    </div> 
    <a id="submit" class="m_button m_button_orange m_button_block" >提交</a>
       </form>

       <div class="placeholder"></div>
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
   </div> 
   <div class="m_footer clear"> 
    <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
       <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>

<div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
        <?php else: ?>
        <a class="gray6" href="<?php echo U('Mobile/Login/Dologin');?>">用户反馈</a><?php endif; ?>
    <span></span>
    <a class="gray6" href="/help/app.html#button">客户端</a>
</div>
<div class="copyright gray9">© 2007-2015 Paixie All Rights Reserved<br>闽B2-20110084</div>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Mobile/Login/LoginOut');?>", '', function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        type:1,
                        skin:'msg',
                        time:3,
                        end: function () {
                            location.href = "<?php echo U('Mobile/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        type:1
                    });
                }
            }, 'json')
        });
    })
 </script>
   </div> 
   <div style="display:none;"> 
   </div> 
  </div> 
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.member2_0.password.v361.js"></script>
  <script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script> 
  <script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		url: "ajax.php",
		type: "post",
		datatype: "json",
		success: function (data) {
			data = $.parseJSON(data);
			wx.config({
				debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
				appId: data["appId"], // 必填，公众号的唯一标识
				timestamp: data["timestamp"], // 必填，生成签名的时间戳
				nonceStr: data["nonceStr"], // 必填，生成签名的随机串
				signature: data["signature"],// 必填，签名，见附录1
				jsApiList: ['onMenuShareTimeline',"onMenuShareAppMessage"] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
			});
		}
	});
	//微信分享
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		//获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
		if(window.shareData==undefined){
			window.shareData = {
				"link": window.location.href,
				"imgUrl": "http://ued.paixie.net/template/statics/site_touch//Public/Mobile/images/public/weixin_paixie.jpg",
				"title": "会员中心-拍鞋网",
				"desc": ""
			};
		}
			//获取“分享给朋友”按钮点击状态及自定义分享内容接口
			wx.onMenuShareAppMessage({
				title: window.shareData.title, // 分享标题
				desc: window.shareData.desc, // 分享描述
				link: window.shareData.link, // 分享链接
				imgUrl: window.shareData.imgUrl, // 分享图标
				type: 'link', // 分享类型,music、video或link，不填默认为link
				dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				success: function () {
					// 用户确认分享后执行的回调函数
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});
			// 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
			wx.onMenuShareTimeline({
				title: window.shareData.title, // 分享标题
				link: window.shareData.link, // 分享链接
				imgUrl: window.shareData.imgUrl, // 分享图标
				success: function () {
					// 用户确认分享后执行的回调函数
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});

			//获取“分享到QQ”按钮点击状态及自定义分享内容接口
			wx.onMenuShareQQ({
				title: window.shareData.title, // 分享标题
				desc: window.shareData.desc, // 分享描述
				link: window.shareData.link, // 分享链接
				imgUrl: window.shareData.imgUrl, // 分享图标
				success: function () {
				   // 用户确认分享后执行的回调函数
				},
				cancel: function () {
				   // 用户取消分享后执行的回调函数
				}
			});

			wx.onMenuShareWeibo({
				title: window.shareData.title, // 分享标题
				desc: window.shareData.desc, // 分享描述
				link: window.shareData.link, // 分享链接
				imgUrl: window.shareData.imgUrl, // 分享图标
				success: function () {
				   // 用户确认分享后执行的回调函数
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});

			wx.onMenuShareQZone({
				title: window.shareData.title, // 分享标题
				desc: window.shareData.desc, // 分享描述
				link: window.shareData.link, // 分享链接
				imgUrl: window.shareData.imgUrl, // 分享图标
				success: function () {
				   // 用户确认分享后执行的回调函数
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});




		});
});
</script>
 <script>
     $(function() {
         var newpassword = function (value) {
             value = $.trim(value);
             if (value == '') {
                 return '密码不能为空!';
             }else if (!/^.{6,20}$/.test(value)) {
                 return '密码为6-20位数字与字母组合，区分大小写！';
             }else if (value.indexOf(' ') >= 0) {
                 return '密码不能包含空格';
             }else if (/^((\d+)|([a-zA-Z]+)){1}$/.test(value)) {
                 return '密码太简单，请您更改密码，如字母+数字的组合!';
             }else{
                 return true;
             }
         }
         $('#submit').click(function () {
             if(newpassword($("input[name=newpassword]").val())==1){
                 $('#form').submit();
             }else{
                 layer.open({
                     content:newpassword($("input[name=newpassword]").val()),
                     skin:'msg',
                     type:1,
                     time:3
                 })
             }
         })
         $('#form').submit(function(){
             $.post("<?php echo U('chgPwd');?>",$('#form').serialize(),function(res){
                 if(res.status==1){
                     layer.open({
                         content:res.info,
                         skin:'msg',
                         type:1,
                         time:3
                     })
                 }else{
                     layer.open({
                         content:res.info,
                         skin:'msg',
                         type:1,
                         time:3
                     })
                 }
             })
         })
     })
 </script>
 </body>
</html>