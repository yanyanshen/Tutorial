<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>订单确认-<?php echo C('WEB_NAME');?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Mobile/css/font-awesome-ie7.css">
    <link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/cart.css"/>
    <script type="text/javascript">
        (function(){
            function w() {
                var r = document.documentElement;
                var a = r.getBoundingClientRect().width;
                if (a > 750 ){
                    a = 750;
                }
                rem = a / 7.5;
                r.style.fontSize = rem + "px"
            }
            var t;
            w();
            window.addEventListener("resize", function() {
                clearTimeout(t);
                t = setTimeout(w, 300)
            }, false);
        })();

        $(function(){
            $(".js").click(function(){
                if($("input[type=radio]:checked").length<=0){
                    layer.open({
                        content:"请先选择收货地址!",
                        time:2
                    })
                }else{
                    $.ajax({
                        url:"<?php echo u('addCartToOrder');?>",
                        data:"addressid="+$("input[name=Shaddress]").val(),
                        type:"post",
                        success:function(data){
                            layer.open({
                                type:2,
                                time:2,
                                end:function(){
                                    layer.open({
                                        content:data,
                                        time:2,
                                        end:function(){
                                            location.href="<?php echo u('User/order',array('s'=>1));?>";
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>
<!-- 头部 开始 -->
<div class="header">
    <div class="shop clearfix">
        <p class="fl">选择收货地址</p>
        <p class="right fr"><a href="<?php echo u('User/addShAddress');?>">新增</a></p>
    </div>
</div>
<!-- 头部 结束 -->

<div class="product">
        <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="tab1">
                <tr>
                    <td class="tab1-td1 ">
                        <input type="radio" value="<?php echo ($vo["id"]); ?>" class="newslist-5" name="Shaddress" />
                    </td>
                    <td class="tab1-td3">收货地址:<?php echo (mb_substr($vo["address"],0,15,'UTF-8')); ?>,收货人<?php echo ($vo["name"]); ?> </td>
                </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<!-- 产品详情 开始-->
<div class="product">
        <?php if(is_array($cartList)): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="tab1">
                <tr>
                    <td class="tab1-td2">
                        <a href="<?php echo u('Goods/detail',array('id'=>$vo['goods']['id']));?>" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["goods"]["image"]) && ($vo["goods"]["image"] !== ""))?($vo["goods"]["image"]):'default.jpg'))); ?>"/></a></td>
                    <td class="tab1-td3">
                        <a href="<?php echo u('Goods/detail',array('id'=>$vo['goods']['id']));?>" target="_blank"><?php echo (mb_substr($vo["goods"]["goodsname"],0,20,'UTF-8')); ?></a>
                        <span class="tex">商品属性:<?php echo ($vo["goodsargs"]); ?></span>
                        <span class="price">￥<i><?php echo ($vo["goods"]["siteprice"]); ?> x <?php echo ($vo["buynum"]); ?>件</i>&nbsp;&nbsp;小计:<?php echo ($vo['goods']['siteprice']*$vo['buynum']); ?></span>
                    </td>
                </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<!-- 产品详情 结束 -->

<!-- 全选结算 开始 -->
<div class="affirm">
     <div class="js"><a href="javascript:void (0)">结算</a></div>
</div>


<!-- 全选结算 结束 -->

<!-- 底部导航 开始 -->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Category/categoryList');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo u('Cart/cart');?>">
                <i class="on"><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo u('User/member');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
<!-- 底部导航 结束 -->
</body>
</html>