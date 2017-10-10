<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>一茶杯 - 关于我们</title>
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
    <div class="logo align-left"><a href="<?php echo U('Index/index');?>" title="一杯茶 - 巴山雀舌茶叶网"><img src="/Public/Home/images/logo.png" border="0" style="width:130px;height: 60px;"/></a><span>关于我们</span></div>
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
    <p>河南巴山雀舌有限公司运营的《第一茶叶网》（www.ybc.com）——中国茶叶第一门户，以“资讯.商务.社区”三架马车齐头并进，共22个频道，760多个栏目，是国内业界资讯最丰富、快捷、权威的内容提供商；服务最贴心、周到、有效的商务运营商；互动最专业、方便与人性化的交流服务商。</p>
    　　<p>《第一茶叶网》的定位是“中国茶叶综合型批发网站”，为茶资讯之海洋、茶商务之CBD、茶销售之超市、茶人之沙龙，以实现“资讯+商务” 服务的双赢。</p>
    　　<p>人无我有，是《第一茶叶网》最大的特色；强强联合，是《第一茶叶网》之实力；多、快、好、省，是《第一茶叶网》之不懈追求。</p>
       <div class="map_logo">
             <h2>
                 <img src="/Uploads/goodsPic/800/800_581c834f01b31.jpg" alt=""/>
             </h2>

       </div>
                                    <p>
                                        <b>《第一茶叶网》之十大特色——</b>
                                    </p>
                                    　　<p>国内唯一有独家报道的茶新闻网；</p>
                                    　　<p>国内唯一茶领域专业的茶博客网；</p>
                                    　　<p>国内唯一有在线书刊的茶读书网；</p>
                                    　　<p>国内唯一建名店联盟的茶销售网；</p>
                                    　　<p>国内唯一能在线维权的茶315网；</p>
                                    　　<p>国内唯一架在线视窗的茶视频网；</p>
                                    　　<p>国内唯一做市场调查的茶调研网；</p>
                                    　　<p>国内唯一承品牌推广的茶策划网；</p>
                                    　　<p>国内唯一开茶人沙龙的茶社区网；</p>
                                    　　<p>国内唯一供网址大全的茶网址网；</p>
                                    　　<p>
                                          <b>《第一茶叶网》之四大追求——</b>
                                            </p>
                                    　　<p><b>多</b>：资讯最丰富，人气最兴旺的茶网；</p>
                                    　　<p><b>快</b>：新闻最快捷，操作最简单的茶网；</p>
                                    　　<p><b>好</b>：内容最威权，界面最友好的茶网；</p>
                                    　　<p><b>省</b>：服务最省时，交易最省钱的茶网；</p>
</div>
<div class="bottom">
    <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
    <p>Copyright 2010 - 2016 巴山雀舌 河南巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
    <p>川ICP备10200063号-1</p>
    <a href="#" class="return_img"></a>

</div>
</body>
</html>