<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>会员中心 - 消息中心</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <meta charset="utf-8" /> 
  <link rel="dns-prefetch" href="//ued.paixie.net" /> 
  <link rel="dns-prefetch" href="//img-cdn2.paixie.net" /> 
  <link rel="icon" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="bookmark" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="shortcut icon" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
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
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','user_msg'],'2015/09/15 16:07:09',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script> 
  <link rel="stylesheet" href="/beauty/Public/Mobile/css/zip.touch.member2_0.user_msg.v3901.css" type="text/css" /> 
  <script type="text/javascript" src="/beauty/Public/Mobile/js/zepto.min.js"></script> 
  <style type="text/css">
.m_header,
.body{max-width: 640px;}
.m_header{left:50%;margin-left: -320px;}
      table{width: 80%;margin: 10px auto;font-size: 18px;text-align: center;}
      table tr{height: 40px}
</style> 
  <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script> 
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header"> 
    <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p> 
    <h1 class="ellipsis bt_title"> 信息中心 </h1> 
    <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p> 
   </div> 
   <div class="m_menu hidden"> 
    <div> 
     <i class="rotate45"></i> 
     <a href="index.html"><span><i class="m_bg"></i></span>首页</a>
     <a href="cat.html"><span><i class="m_bg"></i></span>分类搜索</a>
     <a href="cart.html"><span><i class="m_bg"></i></span>购物车</a>
     <a href="member_index.html"><span><i class="m_bg"></i></span>我的拍鞋</a> 
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content"> 
    <!--<div class="m_tab m_tab_full m_tab_full3 bg_white">
     <a class="selected" href="user_msg?type=1"> 系统消息 </a> 
     <a class="" href="user_msg?type=2"> 优惠消息 </a> 
     <a class="" href="user_msg?type=3"> 降价提醒 </a> 
    </div> -->
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="js_textstring">
        <table>
            <tr>
                <th>编号</th>
                <th>类型</th>
                <th>主题</th>
                <!--<th>内容</th>-->
                <th>时间</th>
            </tr>
            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($val["status"] == 1): ?><tr style="font-weight: bold">
                        <td><?php echo ($k); ?></td>
                        <?php switch($val['type']): case "1": ?><td>系统消息</td><?php break;?>
                            <?php case "2": ?><td>活动消息</td><?php break; endswitch;?>
                        <td><?php echo mb_substr($val['title'],0,30);?></td>
                        <!--<td><?php echo mb_substr($val['content'],0,21);?></td>-->
                        <td><?php echo date('Y-m-d H:i:s',$val['time']);?></td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td><?php echo ($k); ?></td>
                        <?php switch($val['type']): case "1": ?><td>系统消息</td><?php break;?>
                            <?php case "2": ?><td>活动消息</td><?php break; endswitch;?>
                        <td><?php echo mb_substr($val['title'],0,30);?></td>
                        <!--<td><?php echo mb_substr($val['content'],0,21);?></td>-->
                        <td><?php echo date('Y-m-d H:i:s',$val['time']);?></td>
                    </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </table>
     <!--<ul class="m_list m_list_top_line bg_white message_list" id="msg_list">
         <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
         <li>4444</li>
     </ul> -->
     <div class="m_loading m_loaded" data-url="/member/user_msg?act=more&amp;type=1&amp;lastid=@lastid" data-lastid="1" data-listid="msg_list" data-template="tpl_list">
       正在加载... 
     </div> 
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div>
    <script type="text/javascript">
		var add_class="js_textstring";
	</script> 
   </div> 
   <div class="m_footer clear"> 
    <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a> 
    <script type="text/javascript" src="/beauty/Public/Mobile/js/layer_mobile/layer.js"></script>

<div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
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
  <script type="text/javascript" src="/beauty/Public/Mobile/js/zip.touch.member2_0.user_msg.v1361.js"></script> 
  <script type="text/javascript" src="/beauty/Public/Mobile/js/jweixin-1.0.0.js"></script>
 </body>
<script>

</script>
</html>