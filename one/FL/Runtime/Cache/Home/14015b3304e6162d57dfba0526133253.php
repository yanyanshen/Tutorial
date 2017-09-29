<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人资料</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/Public/js/zhonglin.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/zzsc.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/starability-all.min.css"/>
    <script src="/Public/js/jquery-1.7.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/js/layer/layer.js"></script>


</head>
<style>
    td{
        text-align:center;
    }
</style>

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
            	<li class="per-li3 current-li"><a href="<?php echo u('User/order');?>">我的订单<span>></span></a></li>

            	<li class="per-li5 "><a href="<?php echo u('User/cart');?>">购物车<span>></span></a></li>
            	<li class="per-li6 "><a href="<?php echo u('User/site');?>">管理收货地址<span>></span></a></li>
                <li class="per-li9"><a href="<?php echo u('User/zj');?>">浏览记录<span>></span></a></li>




            </ul>
        </div>
        <form action="<?php echo u('User/ping');?>" method="post">
        <table id="table">

            <th style="width: 150px">商品</th>
            <th style="width: 200px">商品名称</th>
            <th style="width: 100px">订单号</th>
            <th  style="width: 100px">商品单价</th>
            <th  style="width: 100px">商品数量</th>
            <th style="width: 100px">订单总价</th>
            <th style="width: 100px">订单状态</th>


            <?php if(is_array($prod)): $i = 0; $__LIST__ = $prod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><img src="/Uploads/Prod/140_<?php echo ($vo["prod_pic"]); ?>" alt=""/></td>
                    <td><?php echo ($vo["prod_name"]); ?></td>
                    <td><?php echo ($vo[order][order_feel]); ?></td>
                    <td><?php echo ($vo["prod_price"]); ?></td>
                    <td><?php echo ($vo[order][order_num]); ?></td>
                    <td><?php echo ($vo[order][order_num]*$vo[prod_price]); ?></td>
                    <td><?php if($vo[order][order_pl] == '未评论'): ?>未评论
                        </td>
                    <tr>
                        <td>
                            <section class="content bgcolor-3">
                                <span class="input input--kyo">
                                    <input class="input__field input__field--kyo" type="text" id="input-19" name="content<?php echo ($i); ?>" />
                                    <label class="input__label input__label--kyo" for="input-19">
                                        <span class="input__label-content input__label-content--kyo">Knock on my head！</span>
                                    </label>

                                </span>
                            </section>
                        </td>

                    </tr>
                        <?php else: ?>已评论
                </td>
                </tr><?php endif; ?>
                <input type="hidden" name="order_feel" value="<?php echo ($vo[order]["order_feel"]); ?>"/>
                <input type="hidden" name="prod_id<?php echo ($i); ?>" value="<?php echo ($vo["prod_id"]); ?>"/>
                <input type="hidden" name="num" value="<?php echo ($i); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>



            <section>
                <div class="starability-container">
                        <fieldset class="starability-growRotate">
                            <legend>五星服务五星好评:</legend>

                            <input type="radio" id="rate5-4" name="rating" value="5" />
                            <label for="rate5-4" title="Amazing">5 stars</label>

                            <input type="radio" id="rate4-4" name="rating" value="4" />
                            <label for="rate4-4" title="Very good">4 stars</label>

                            <input type="radio" id="rate3-4" name="rating" value="3" />
                            <label for="rate3-4" title="Average">3 stars</label>

                            <input type="radio" id="rate2-4" name="rating" value="2" />
                            <label for="rate2-4" title="Not good">2 stars</label>

                            <input type="radio" id="rate1-4" name="rating" value="1" />
                            <label for="rate1-4" title="Terrible">1 star</label>
                        </fieldset>
                </div>
            </section>


            <input type="submit" class="btn-style-01 f-r" value="提交" />

        </form>





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
<div style="width: 400px;background:#0094D6; "></div>


<script src="/Public/js/Area.js" type="text/javascript"></script>
<script src="/Public/js/AreaData_min.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>

</html>