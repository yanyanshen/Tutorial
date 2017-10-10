<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/Home/css/font-awesome-ie7.min.css">
    <![endif]-->
    <title>确认订单信息</title>
    <style type="text/css">
        /*#myDiv{  width: 400px;  height: 200px;  border: solid 1px #eeeeee;  margin: 0 auto;  }*/
        #paymethod{  list-style: none;  }
        #paymethod li{  float: left; padding: 0px; margin-left: 10px; margin-top: 10px; }
        #paymethod li input{  display: none;}
        #paymethod li label{ display: inline-block; cursor: pointer;  width: 100px;  height: 30px; border: solid 1px #eeeeee; line-height: 30px; text-align: center; }
        #paymethod li:first-child{  margin-left: 0;  }
        .blue{  background-color: dodgerblue;  color: white;  }
        /*#myDiv .pay{  padding: 20px 0 0 20px;  display: block;  color: black;  font-size: 20px;  font-weight: bold;  }*/
    </style>


</head>
<script type="text/javascript">
    $(function(){
        $("#payBtn").click(function(){
            $.post("<?php echo U('Order/pay');?>",{ oid:<?php echo ($oid); ?>,paymethod:$("[name='paymethod']:checked").val(),message:$(":input[name='message']").val()},function(res){
                if(res.status==1){
                    location="<?php echo U('paySuccess');?>?oid=<?php echo ($oid); ?>"
                }else{
                    layer.alert(res.info,{icon:5});
                }
            })
        })

        caaa=function(){
            num=$(":radio[name='paymethod']").length;
            for(var i=0;i < num;i++){
                a=$(":radio[name='paymethod']").eq(i);
                if(a.attr("checked")){
                    a.next().addClass("blue");
                    a.next().children(":first").html("√");
                }else{
                    a.next().removeClass("blue");
                    a.next().children(":first").html("￥");
                }
            }
        }
        caaa();
        $(":radio[name='paymethod']").click(function(){
            caaa();
        })


    })
</script>
<!--宽度1000的购物车样式-->
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

        refreshCart=function(){
            $.post("<?php echo U('Cart/getNum');?>",'',function(res){
                if(res.info){
                    $("#cartNum").text(res.info);
                }else{
                    $("#cartNum").text(0);
                }
            })
        }
        refreshCart();
    });
</script>
<div id="top">
    <div class="carts">
        <div class="Collection"><em></em><a href="javascript:;" title="收藏我们" id="fav">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <?php if(!isset($_SESSION['ybc_id'])): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                    <?php else: ?>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('UserCenter/usercenter');?>" class="red">[<?php echo (session('ybc_username')); ?>]</a><a href="<?php echo U('Login/logout');?>" class="red">[退出登录]</a></li><?php endif; ?>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Order/myOrderList');?>">我的订单</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>">购物车(<b id="cartNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">联系我们</a></li>
                <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
                    <div class="hd_menu_list">
                        <ul>
                            <li><a href="http://www.zuipin.cn/4010653124.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">常见问题</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_service.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h3" target="_blank">在线退换货</a></li>
                            <li><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju">媒体报道</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_shipment.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h2" target="_blank">配送范围</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="shop_cart">
    <div id="header">
        <div class="logo">
            <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
            <div class="phone">
                免费咨询热线:<span class="telephone">400-3454-343</span>
            </div>
        </div>
        <div class="Search">
            <form action="<?php echo U('Goodslist/index');?>" method="get">
                <p>
                    <input name="keywords" type="text"  value="<?php echo ($keywords); ?>" class="text"/><input name="" type="submit" value="" class="Search_btn"/>
                </p>
            </form>
            <p class="Words">
                <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
                <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
                <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
                <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
                <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
                <a href="<?php echo U('goodslist/index');?>?category1=44">茶具</a>
            </p>
        </div>
    </div>
    <!--提示购物步骤-->

    <div class="prompt_step">
        <img src="/Public/Home/images/cart_step_02.png" />
    </div>
    <!--订单详情-->
    <div id="Orders" class="Inside_pages  clearfix" style="width: 100%">
        <div class="Orders_style clearfix">
            <div class="address clearfix">
                <div class="title">收货人信息</div>
                <div class="adderss_list clearfix">
                    <div class="title_name">选择收货地址 <?php if(($status) == "1"): ?><a href="<?php echo U('selectAddr');?>?oid=<?php echo ($info["id"]); ?>&new=1">+选择地址</a><?php endif; ?></div>

                    <div class="Shipping_address">
                        <ul class="detailed">
                            <?php if($info['address_id']): ?><li><label>收货人姓名</label><span><?php echo ($info["username"]); ?></span></li>
                                <li><label>详细地址</label><span><?php echo ($info["address"]); ?></span></li>
                                <li><label>邮政编码</label><span><?php echo ($info["postcode"]); ?></span></li>
                                <li><label>联系电话</label><span><?php echo ($info["phone"]); ?></span></li>
                                <?php else: ?>
                                <li><span style="color: red">暂无收货地址信息</span></li><?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="title">订单信息</div>
                <div class="adderss_list clearfix">

                    <div class="Shipping_address">
                        <ul class="detailed">
                                <li><label>订单编号</label><span><?php echo ($info["ordersyn"]); ?></span></li>
                                <li><label>订单状态</label><span><?php echo ($info["status"]); ?></span></li>
                                <li><label>订单时间</label><span><?php echo date("Y-m-d H:i:s",$info['addtime']);?></span></li>
                                <li><label>收货时间</label><span><?php if($info['contime']): echo date("Y-m-d H:i:s",$info['contime']);?>
                                    <?php else: ?>
                                    暂未收货<?php endif; ?></span></li>
                        </ul>
                    </div>
                </div>

                <form class="form" method="post">
                    <fieldset>

                        <!--付款方式-->
                        <div class="payment">
                            <div class="title_name">支付方式</div>

                            <ul id="paymethod">
                                <li><input type="radio" <?php echo ($info['paymethod']==1?'checked':''); ?> name="paymethod" value="1" id="ridio1"><label for="ridio1"><span>√</span>货到付款</label></li>
                                <li><input type="radio" <?php echo ($info['paymethod']==2?'checked':''); ?> name="paymethod" value="2" id="ridio2"><label for="ridio2"><span>￥</span>支付宝</label></li>
                                <li><input type="radio" <?php echo ($info['paymethod']==3?'checked':''); ?> name="paymethod" value="3" id="ridio3"><label for="ridio3"><span>￥</span>微信支付</label></li>
                            </ul>

                        </div>
                        <!--产品列表-->
                        <div class="Product_List">
                            <table>
                                <thead><tr class="title"><td class="name">商品名称</td><td class="price">商品价格</td>
                                    <td class="Quantity">购买数量</td><td class="Money">金额</td></tr></thead>
                                <tbody>
                                <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><tr valign="middle">
                                        <td  class="Product_info">
                                            <div style="display: inline;"><a href="#"><img src="/Uploads/goodsPic/100/100_<?php echo ($va["pic"]); ?>" width="100px" height="100px"/></a></div>
                                            <div style="display: inline;"><a href="#" class="product_name"><?php echo ($va["goodsname"]); ?></a></div>
                                        </td>
                                        <td><i>￥</i><?php echo ($va["price"]); ?></td>
                                        <td><?php echo ($va["buynum"]); ?></td>
                                        <td class="Moneys"><i>￥</i><?php echo ($va["total"]); ?></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                            <div class="Pay_info">
                                <label>订单留言</label><input name="message" value="<?php echo ($info["message"]); ?>" type="text" <?php echo ($status!="1"?"disabled":''); ?>  onkeyup="checkLength(this);" class="text_name " />  <span class="wordage">剩余字数：<span id="sy" style="color:Red;">50</span></span>
                            </div>
                            <!--价格-->
                            <div class="price_style">
                                <div class="right_direction" style="width: 300px;">
                                    <ul style="width: 150px;">
                                        <li><label>商品总价</label><i>￥</i><span><?php echo ($totalprice); ?></span></li>
                                        <li><label>配送费&nbsp;</label><i>￥</i><span>
            <?php if(($status) == "1"): if($totalprice >= 68): ?>0<?php else: ?>10<?php endif; ?>
                <?php else: ?>
                <?php echo ($info["postage"]); endif; ?>
         </span></li>
                                        <li class="shiji_price"><label>实付款&nbsp;</label><i>￥</i><span>
            <?php if(($status) == "1"): if($totalprice >= 68): echo ($totalprice); else: echo ($totalprice+10); endif; ?>
                <?php else: ?>
                <?php echo ($info["orderprice"]); endif; ?>
         </span></li>
                                    </ul>
                                    <div class="btn"><input id="payBtn" type="button" value="<?php echo ($info["mnext"]); ?>" class="submit_btn"/></div>
                                    <?php if(($status) == "1"): ?><div class="integral right">待订单确认后，你将获得<span><?php echo ($totalprice); ?></span>积分</div><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!--友情链接-->
        <div class="Links">
            <div class="link_title">友情链接</div>
            <div class="link_address"><a href="#">四川茶叶协会</a>  <a href="#">链接地址</a>  <a href="#">链接地址</a>  <a href="#">链接地址 </a>   <a href="#">链接地址</a> <a href="#">链接地址</a> <a href="#">链接地址</a></div>
        </div>
    </div>

    <!--底部样式-->
    <div class="footer help-box  clearfix">
        <div class="right_footer clearfix">
            <dl>
                <dt><em class="icon_img"></em>购物指南</dt>
                <dd><a href="#">怎样购物</a></dd>
                <dd><a href="#">积分政策</a></dd>
                <dd><a href="#">会员优惠</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">快递资费及送达时间</a></dd>
                <dd><a href="#">快递覆盖地区查询</a></dd>
                <dd><a href="#">验货与签收</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">货到付款</a></dd>
                <dd><a href="#">支付宝</a></dd>
                <dd><a href="#">财付通</a></dd>
                <dd><a href="#">网银支付</a></dd>
                <dd><a href="#">银联支付</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>售后服务</dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">退换货要求与运费规则</a></dd>
                <dd><a href="#">退换货流程</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>关于我们</dt>
                <dd><a href="#">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
        <div class="Copyright">
            <p><a href="#">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
            <p>Copyright 2010 - 2015 巴山雀舌 四川巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
            <p>川ICP备10200063号-1</p>
            <a href="#" class="return_img"></a>
        </div>
    </div>

    <!--结束-->
</div>
</body>
<script type="text/javascript">
    function checkLength(which) {
        var maxChars = 50; //
        if(which.value.length > maxChars){
            layer.alert("您出入的字数超多限制!",{icon:7});
            // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
            which.value = which.value.substring(0,maxChars);
            return false;
        }else{
            var curr = maxChars - which.value.length; //250 减去 当前输入的
            document.getElementById("sy").innerHTML = curr.toString();
            return true;
        }
    }
</script>

</html>