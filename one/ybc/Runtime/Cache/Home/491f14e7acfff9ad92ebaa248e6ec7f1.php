<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>一茶杯 - 联系方式</title>
    <link href="/Public/Home/css/lianxiwomen.css" rel="stylesheet" type="text/css"/>
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
    jQuery.fn.addFavorite = function(l, h) {
        return this.click(function() {
            var t = jQuery(this);
            if(jQuery.browser.msie) {
                window.external.addFavorite(h, l);
            } else if (jQuery.browser.mozilla || jQuery.browser.opera) {
                t.attr("rel", "sidebar");
                t.attr("title", l);
                t.attr("href", h);
            } else {
                layer.alert("浏览器不支持，请使用Ctrl+D将本页加入收藏夹！",{title:"提示",icon:7});
            }
        });
    };
      $(function(){

          $('#fav').addFavorite(document.title,"www.ybc.com");
      })

</script>
<script type="text/javascript">

</script>
<div class="top">
    <div class="logo align-left"><a href="<?php echo U('Index/index');?>"  title="一杯茶 - 巴山雀舌茶叶网"><img src="/Public/Home/images/logo.png" border="0" style="width:130px;height: 60px;"/></a><span>联系方式</span></div>
    <div class="nav align-right">
        <a href="<?php echo U('Index/index');?>">网站首页</a> ┊&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://news.t0001.com/">资讯</a>┊&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Article/index');?>">茶叶百科</a>
    </div>
    <div class="menu align-right">
        <ul>
            <li><a href="javascript:;" title="收藏我们" id="fav">加入收藏</a></li>
            <li><a href="<?php echo U('goodslist/index');?>">茶叶搜索</a></li>
            <li><a href="<?php echo U('Registered/registered');?>">免费注册</a></li>
            <li><a href="<?php echo U('Login/login');?>">会员登录</a></li>
        </ul>
    </div>
</div>
<div class="line"></div>
<div class="main align-left">
    <center>
        <table width="80%" border="0" cellpadding="5" cellspacing="1" bgcolor="#EBEBEB">
            <tr>
                <td width="22%" align="right" bgcolor="#FFFFFF"><strong>公司名称</strong>：</td>
                <td width="78%" align="left" bgcolor="#FFFFFF">巴山雀舌茶叶有限公司 </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF"><strong>公司传真</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">0591-87666885</td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF"><strong>客服电话</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">0591-87666885</td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF">　<strong>广告热线</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">0591-87666881</td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF">　<strong>新闻热线</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">0591-83895880</td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF"><strong>联系邮箱</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">ybc_1001@126.com</td>
            </tr>

            <tr>
                <td align="right" bgcolor="#FFFFFF"><b>新闻QQ</b>：</td>
                <td align="left" bgcolor="#FFFFFF"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=781075774&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:781075774:51"></a></td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF"><strong>联系地址</strong>：</td>
                <td align="left" bgcolor="#FFFFFF">河南省郑州市高新区科技大道春藤路301号电子商务产业园2号楼</td>
            </tr>
        </table>
    </center>
</div>
<div class="bottom">
    <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
    <p>Copyright 2010 - 2016 巴山雀舌 河南巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
    <p>川ICP备10200063号-1</p>
    <a href="#" class="return_img"></a>
</div>
</body>
</html>