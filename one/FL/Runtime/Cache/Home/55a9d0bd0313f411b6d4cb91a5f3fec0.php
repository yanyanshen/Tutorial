<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人资料</title>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/zhonglin.js"></script>
<script type="text/javascript" src="/Public/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/js/layer/layer.js"></script>
</head>

<body style="position:relative;">
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <ul class="t-con-l f-l">
            <li><span><span style="font-weight:bold;color:red"><?php echo session('name')?session('name'):'';?></span><?php echo session('name')?'，':'您好，';?>欢迎来到丰林</span></li>
            <li><a href="<?php echo u('Custom/login');?>"><?php echo session('mid')?'':'请登陆';?></a></li>
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
            	<li class="per-li5 current-li"><a href="<?php echo u('User/cart');?>">购物车<span>></span></a></li>
            	<li class="per-li6"><a href="<?php echo u('User/site');?>">管理收货地址<span>></span></a></li>
                <li class="per-li9"><a href="<?php echo u('User/zj');?>">浏览记录<span>></span></a></li>
            </ul>
        </div>
    	<div class="personal-r f-r">
        	<div class="personal-right">
                <div class="cart-content">
                    <ul class="cart-tit-nav">
                        <li class="current"><a href="#">全部商品</a></li>

                        <div style="clear:both;"></div>
                    </ul>
                    <div class="cart-con-tit">

                        <p class="p2">商品信息</p>

                        <p class="p4">数量</p>
                        <p class="p5">单价（元）</p>
                        <p class="p6">金额（元）</p>
                        <p class="p7">操作</p>
                    </div>


<form action="<?php echo u('Order/index');?>" method="post" onsubmit="return test();" id="form2">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,$star,$end,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="cart-con-info">
                        <div class="info-mid">
                            <input type="checkbox"  name="chk[]" value="<?php echo ($vo[0]["prod_id"]); ?>" class="mid-ipt f-l"  onchange="gettotalprice();" />

                            <div class="mid-tu f-l ">
                                <a href="#"><img src="/Uploads/Prod/140_<?php echo ($vo[0]["prod_pic"]); ?>" /></a>
                            </div>
                            <div class="mid-font f-l ">
                                <a href="#"><?php echo ($vo[0]["prod_name"]); ?></a>


                            </div>

                            <div class="mid-sl f-l ">
                                <a href="javascript:jian(<?php echo ($i); ?>);" class="decrement">-</a>&nbsp;
                                <input type="text" value="<?php echo ($vo[0]["num"]); ?>"  class="num" id="buynum<?php echo ($i); ?>" name="num_<?php echo ($vo[0]["prod_id"]); ?>" onkeyup="chgnum(this)" />&nbsp;
                                <a href="javascript:jia(<?php echo ($i); ?>);" class="increment">+</a>

                            </div>
                            <p  class="mid-dj f-l">¥ <span class="price"><?php echo ($vo[0]["prod_price"]); ?></span></p>
                            <p  class="mid-je f-l">¥ <span class="prices"><?php echo ($vo[0]["prod_prices"]); ?></span></p>

                            <div class="mid-chaozuo f-l">
                                <a href="<?php echo u('User/del',array('prod_id'=>$vo[0][prod_id]));?>">删除</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                        <input type="hidden" value="account" name="act"/><?php endforeach; endif; else: echo "" ;endif; ?>


</form>

                    <!--分页-->
                    <div class="paging pages">
                        <?php echo ($page); ?>
                    </div>
                    <div class="cart-con-footer">
                        <input type="checkbox"   onchange="gettotalprice();" id="chkAll" name="chkAll" />
                        <span>全选</span>
                      <span class="f-r"><center><button style="height: 40px;line-height: 40px;background: #b00000;width: 100px;" id="submit">去结算</button> </center> </span>
                        <span class="f-r">总价:<b id="totalprice">￥888.88</b></span>
                        <p>（此处始终在屏幕下方）</p>
                    </div>
                </div>

            </div>
        </div>
        <div style="clear:both;"></div>
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
    function chk(){
        var chkAll=document.getElementById('chkAll');
        var chks=document.getElementsByName('chk[]');
        for(var i=0;i<chks.length;i++){
            chks[i].checked=chkAll.checked;
        }
    }
    document.getElementById('chkAll').onclick=chk;
    $('.cateList').hide();
    function jian(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
            document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
    }
    function jia(n){
        var buynum=document.getElementById('buynum'+n).value;

        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>199){
            v.value=199;
        }
        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }

    function getprices(){
        var nums=document.getElementsByClassName('num');
        var price=document.getElementsByClassName('price');
        var prices=document.getElementsByClassName('prices');
        for(var i=0;i<price.length;i++){
           prices[i].innerHTML=(price[i].innerHTML*parseInt(nums[i].value)).toFixed(2);

        };
    }

    function gettotalprice(){
        getprices();
        var inputs=document.getElementsByName('chk[]');
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<inputs.length;i++){
            if(inputs[i].checked){
                totalprice+=parseFloat(prices[i].innerHTML);
            };
        };
        totalprice=totalprice.toFixed(2);
        document.getElementById('totalprice').innerHTML='￥'+totalprice;
    }
    function test(){
        if($("input[type='checkbox']").is(':checked') ){
            return true;
        }else{
           layer.alert("您还没选择")
            return false;
        }}
    $("#submit").click(function(){
        $('#form2').submit();
    })

    gettotalprice();
</script>

<script type="text/javascript">
    function out(){
        $.post("<?php echo u('Custom/logout');?>",null,function(res){
            if(res.status=='ok'){
                location.reload();
            }
        })
    }
</script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>

</html>