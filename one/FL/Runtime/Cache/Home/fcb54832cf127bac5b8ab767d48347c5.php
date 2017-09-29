<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人资料</title>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
<script type="text/javascript" src="/Public/js/zhonglin.js"></script>

    <script src="/Public/js/jquery-1.7.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/js/layer/layer.js"></script>


</head>

<body style="position:relative;">
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <ul class="t-con-l f-l">
            <li><span><span style="font-weight:bold;color:red"><?php echo session('name')?session('name'):'';?></span><?php echo session('name')?'，':'您好，';?>欢迎来到丰林</span></li>
            <li><a href="<?php echo u('Custom/login');?>"><?php echo session('mid')?'':'请登录';?></a></li>
            <li><a href="javascript:out();"><?php echo session('mid')?'退出':'';?></a></li>
            <li><a href="<?php echo u('Custom/register');?>">免费注册</a></li>
        </ul>
        <ul class="t-con-r f-r">
            <li><a href="<?php echo u('User/index');?>">我 (个人中心)</a></li>
            <li><a href="#">我的订单</a></li>
            <li class="erweima">
                <a href="#">扫描二维码</a>
                <div class="ewm-tu">
                    <a href="#"><img src="/Public/Home/images/erweima-tu.jpg" /></a>
                </div>
            </li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--logo search 开始-->
<div class="hd-info1 w1200">
    <div class="logo f-l">
        <h1><a href="<?php echo u('Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
    </div>
    <div class="dianji f-r">
    </div>
    <div class="search f-r">
        <ul class="sp">

            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <form action="<?php echo U('Search/index');?>" method="get" id="classform">
                    <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" value="<?php echo ($dd); ?>"/>
                </form>
            </div>
            <button id="jk" class="f-r">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <?php if(is_array($classProd)): $i = 0; $__LIST__ = array_slice($classProd,3,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valclass): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Search/index',array('class_name'=>$valclass['class_name']));?>"><?php echo ($valclass['class_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div>


<!--内容开始-->
    <div class="personal w1200">
    	<div class="personal-left f-l">
        	<div class="personal-l-tit">
            	<h3>个人中心</h3>
            </div>
            <ul>
            	<li class="per-li2 "><a href="<?php echo u('User/index');?>">个人资料<span>></span></a></li>
            	<li class="per-li3"><a href="<?php echo u('User/order');?>">我的订单<span>></span></a></li>

            	<li class="per-li5 "><a href="<?php echo u('User/cart');?>">购物车<span>></span></a></li>
            	<li class="per-li6 current-li"><a href="<?php echo u('User/site');?>">管理收货地址<span>></span></a></li>
                <li class="per-li9"><a href="<?php echo u('User/zj');?>">浏览记录<span>></span></a></li>




            </ul>
        </div>


        <!--三级联动-->
            <div class="management f-r">
                <div class="tanchuang-con">
                    <div class="tc-title">
                        <h3>我的收货地址</h3>
                    </div>
                    <font class="xinxi">请认真填写以下信息！</font>
                    <form action="<?php echo u('User/site');?>" method="post" id="form1">
                    <ul class="tc-con2">
                        <li class="tc-li1">
                            <center>
                                <select id="seachprov" name="seachprov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                                <select id="seachcity" name="homecity" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                                <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"></select></span>
                                <input type="hidden" name="site" id="site"/>
                            </center>

                        </li>
                        <li class="tc-li1">
                            <p class="l-p">详细地址<span>*</span></p>
                            <textarea class="textarea1" placeholder="请如实填写您的详细信息，如街道名称、门牌号、楼层号和房间号。" name="site_content"></textarea>
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">邮政编码<span></span></p>
                            <input type="text" id='zip' name="site_zip" />
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">收货人姓名<span>*</span></p>
                            <input type="text" name="site_name"/>
                            <div style="clear:both;"></div>
                        </li>
                        <li class="tc-li1">
                            <p class="l-p">联系电话<span>*</span></p>
                            <input type="text" name="site_tel"/>
                            <div style="clear:both;"></div>
                        </li>
                    </ul>
                    <button class="btn-pst2" id="submit12">保存</button>
                    </form>
                </div>
                <div class="man-info">
                    <font>您已经保存三个地址！</font>
                    <div class="man-if-con">
                        <div class="man-tit">
                            <p class="p1">收货人</p>
                            <p class="p2">所在地区</p>
                            <p class="p3">详细地址</p>
                            <p class="p4">邮编</p>
                            <p class="p5">电话/手机</p>
                            <p class="p6">操作</p>
                        </div>
                        <ul class="man-ul1 ">



                            <?php if(is_array($site)): $i = 0; $__LIST__ = $site;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["site_m"]); ?>">
                                <p class="p1"><?php echo ($vo["site_name"]); ?></p>
                                <p class="p2"><?php echo ($vo["site_area"]); ?></p>
                                <p class="p3"><?php echo ($vo["site_content"]); ?></p>
                                <p class="p4"><?php echo ($vo["site_zip"]); ?></p>
                                <p class="p5"><?php echo ($vo["site_tel"]); ?></p>
                                <p class="p6">
                                    <a href="<?php echo u('User/site',array('del_id'=>$vo['site_id']));?>">删除</a>
                                </p>
                                <p class="p7"><a href="<?php echo u('User/site',array('site_id'=>$vo['site_id']));?>">默认地址</a></p>
                                <div style="clear:both;"></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>





                        </ul>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>


    
    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
</body>
<?php echo ($alert); ?>



<script src="/Public/js/Area.js" type="text/javascript"></script>
<script src="/Public/js/AreaData_min.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>
</html>