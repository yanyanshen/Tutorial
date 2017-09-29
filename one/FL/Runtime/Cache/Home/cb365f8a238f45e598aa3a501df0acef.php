<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>支付界面</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/zhonglin.js"></script>
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
            <li><a href="<?php echo u('User/order');?>">我的订单</a></li>
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
<div class="payment-interface w1200">
    <div class="pay-info">
        <div class="info-tit">
            <h3>选择银行</h3>
        </div>
        <ul class="pay-yh">
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-right:0; width:298px;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li>
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-right:0; width:298px;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-bottom:0;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-bottom:0;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-bottom:0;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <li style="border-right:0;border-bottom:0; width:298px;">
                <input type="radio" value="" name="hobby"/>
                <img src="/Public/Home/images/jiangheng.gif" />
                <div style="clear:both;"></div>
            </li>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div class="pay-info">
        <div class="info-tit">
            <h3>输入卡号</h3>
        </div>
        <div class="pay-kahao">
            <input type="text" placeholder="请输入银行卡号或支付宝账号"/>
            <p>输入正确</p>
        </div>
    </div>
    <div class="pay-info">
        <div class="info-tit">
            <h3>输入密码</h3>
        </div>
        <div class="pay-mima">
            <p class="mima-p1">你在安全的环境中，请放心使用！</p>
            <div class="mima-ipt">
                <p>支付宝或银行卡密码：</p>
                <input type="text" style="border-left:1px solid #E5E5E5;" /><input type="text" /><input type="text" /><input type="text" /><input type="text" /><input type="text" />
                <span>请输入6位数字支付密码</span>
            </div>
            <form action="<?php echo u('Order/orderx');?>" method="get" id="form1">
                <input type="hidden" value="<?php echo ($feel); ?>" name="order_feel"/>
            <button class="mima-btn" id="zf">立即支付</button>
            </form>
        </div>
    </div>
</div>

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
<script>
    $('#zf').click(function(){
        $('form1').submit();
    })
</script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>
</html>