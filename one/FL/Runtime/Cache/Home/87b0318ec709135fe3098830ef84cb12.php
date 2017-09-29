<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付成功</title>
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
    <div class="payment w1200">
    	<div class="payment-hd">
        	<h3 class="success">支付成功</h3>
        </div>
        <div class="payment-bd">
            <ul class="ul-bd">
            	<li><span>订单号</span><p><?php echo ($order[0]["order_feel"]); ?></p></li>
            	<li><span>下单时间</span><p><?php echo date('Y-m-d H:i:s',$order[0][order_date]);?></p></li>
            	<li><span>送货至</span><p><?php echo ($order[0][s][0]["site_area"]); ?></p></li>
            	<li><span>邮编</span><p><?php echo ($order[0][s][0]["site_zip"]); ?></p></li>
            	<li><span>价格</span><p><i>¥<?php echo ($order[0]["order_tot"]); ?></i></p></li>
            	<li><span>收货信息</span><p><?php echo ($order[0][s][0]["site_content"]); ?></p></li>
            	<li><span>收货人</span><p><?php echo ($order[0][s][0]["site_name"]); ?></p></li>
            	<li><span>收货人电话</span><p><?php echo ($order[0][s][0]["site_tel"]); ?></p></li>

                <table>
                    <th>商品</th>
                    <th>商品名称</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>总价</th>
                    
                    
                    
                    <?php if(is_array($prod)): $i = 0; $__LIST__ = $prod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><a href="<?php echo u('Detail/index',array('prod_id'=>$vo['prod_id']));?>"><img src="/Uploads/Prod/140_<?php echo ($vo["prod_pic"]); ?>" alt="商品图片"/></a></td>
                            <td><a href="<?php echo u('Detail/index',array('prod_id'=>$vo['prod_id']));?>"><div style="width: 300px;"><?php echo ($vo["prod_name"]); ?></div></a></td>
                            <td><div style="width: 100px;"><center><?php echo ($vo["prod_price"]); ?></center></div></td>
                            <td><div style="width: 100px;"><center><?php echo ($vo[order]["order_num"]); ?></center></div></td>
                            <td><div style="width: 100px;"><center><?php echo ($vo[order][order_num]*$vo[prod_price]); ?></center></div></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  
                </table>





            </ul>
        </div>
        <div class="payment-ft">
        	<button class="btn2"><a href="<?php echo u('User/index');?>">返回个人中心</a></button>
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

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>

</html>