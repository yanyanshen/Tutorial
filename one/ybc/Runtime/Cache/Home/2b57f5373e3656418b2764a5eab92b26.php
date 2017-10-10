<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<!--[if IE 7]>
<link rel="stylesheet" href="/Public/Home/css/font-awesome-ie7.min.css">
<![endif]-->
<title>我的购物车</title>
<script type="text/javascript">
$(function () {
   //全选
   $("#CheckedAll").click(function () {
	   if (this.checked) {                 //如果当前点击的多选框被选中
		   $('input[type=checkbox][name="checkitems[]"]').attr("checked", true);
           getTotalPrice();
	   } else {
		   $('input[type=checkbox][name="checkitems[]"]').attr("checked", false);
           $("#sumPrice").html('￥'+0);
           $("#orderPrice").attr('value',0);
           $('#savePrice').html('￥'+0);
	   }
   });
   $('input[type=checkbox][name="checkitems[]"]').click(function () {
	   var flag = true;
	   $('input[type=checkbox][name="checkitems[]"]').each(function () {
		   if (!this.checked) {
			   flag = false;
		   }
	   });
	   if (flag) {
		   $('#CheckedAll').attr('checked', true);
	   } else {
		   $('#CheckedAll').attr('checked', false);
	   }
   });
    //*************删除购物车商品*****************
   $("#send").click(function () {
       if($("input[type='checkbox'][name='checkitems[]']:checked").attr("checked")){
           var gid='';
           $('input[type=checkbox][name="checkitems[]"]:checked').each(function () {
               gid+=$(this).val()+',';
           })
           var str = "您是否要从购物车移除选中的商品？";
           layer.confirm(str,{icon:7,title:'提示',btn:['不了，我要再看看','狠心移除']},
                   function(){
                       layer.msg('您可以再逛逛其他商品哦',{time:1500,icon:6});
                   },
                   function(){
                       $.post("<?php echo U('delCart');?>",{gid:gid},function(res){
                           if (res.status==1) {
                               layer.msg('移除成功',{time:1000,icon:1},function(){
                                   location.reload();
                               });
                           }else{
                               layer.msg('移除失败',{time:1000,icon:2},function(){
                                   location.reload();
                               });
                           }
                       })
                   }
           )
       }else{
           var str = "您未选中任何商品，请选择后在操作！";
           layer.msg(str,{time:1000,icon:6});
       }
   });
   delCart=function(gid){
       var str="您是否要从购物车移除此商品？";
       layer.confirm(str,{icon:7,title:'提示',btn:['不了，我要再看看','狠心移除']},
           function(){
                layer.msg('您可以再逛逛其他商品哦',{time:1500,icon:6});
           },
           function(){
               $.post("<?php echo U('delCart');?>",{gid:gid},function(res){
                   if (res.status==1) {
                       layer.msg('移除成功',{time:1000,icon:1},function(){
                           location.reload();
                       });
                   }else{
                       layer.msg('移除成功',{time:1000,icon:1},function(){
                           location.reload();
                       });
                   }
               })
           }
       )
   }
    toCollect=function(gid){
        $.post("<?php echo U('toCollect');?>",{gid:gid},function(res){
            if (res.status==1) {
                layer.msg('收藏成功',{time:1000,icon:1},function(){
                    location.reload();
                });
            }else{
                layer.msg('收藏失败',{time:1000,icon:2},function(){
                    location.reload();
                });
            }
        })
    }
    $(".collect3").click(function(){
        layer.msg('登录后您才能收藏商品哦',{time:1500,icon:6});
    })
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
})
</script>
</head>
<!--宽度1000的购物车样式-->
<body>
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
              <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('UserCenter/myCollect');?>">我的收藏</a></li>
              <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a></li>
              </li>
          </ul>
      </div>
  </div>
</div>


<div id="shop_cart">
 <div id="header">
  <div class="logo">
  <a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
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
<?php if(!isset($_SESSION['ybc_id'])): ?><div class="toLogin" style="width: 998px;background: #fffdee;height: 42px;border: 1px solid #edd28b">
    <div style="margin-top: 8px;color: #f70;line-height: 22px;">
        <img src="/Public/Home/images/11.png" style="margin-left: 42px;"/>
        您还没有登录！登录后购物车的商品将保存到您账号中
        <input class="toLogin" type="button" style="height: 30px;width: 89px;margin-left: 10px;background: darkorange;color: white;cursor: pointer;border-radius: 5px;" value="立即登录"/>
    </div>
</div><?php endif; ?>
<script type="text/javascript">
    $('.toLogin').click(function(){
        $.post("<?php echo U('Cart/toBuy');?>",function(res){
            if(!res.status==1){
                location.href="<?php echo U('Home/Login/login');?>";
            }
        })
    })
</script>
 <div class="prompt_step">
  <img src="/Public/Home/images/cart_step_01.png" />
 </div>
 <!--购物车商品-->
 <div class="Shopping_list">
  <div class="title_name">
    <ul>
	<li class="checkbox">&nbsp;</li>
	<li class="name">商品名称</li>
	<li class="scj">市场价</li>
	<li class="bdj">本店价</li>
	<li class="sl">购买数量</li>
	<li class="x" style="width: 120px">小计（元）</li>
	<LI class="cz">操作</LI>
  </ul>
 </div>
<?php if(empty($goodsCart)): ?><div style="width: 1000px;height: 199px;">
        <img src="/Public/Home/images/settleup-nogoods.png" style="margin-left: 210px;margin-top: 49px"/>
        <span style="font-size: 29px;color: lightslategray">购物车内暂无商品，赶紧选购吧</span>
        <a href="<?php echo U('Home/Index/index');?>" style="color: honeydew;">
            <div style="cursor: pointer;font-size: 21px;line-height: 49px;text-align: center;width: 129px;height: 49px;margin-top: 52px;margin-left: 869px;border-radius: 15px;;background: darkseagreen;">
                去逛逛
            </div>
        </a>
    </div>
<?php else: ?>
    <div class="shopping">
        <form  method="post" action="" id="form1">
            <input type="hidden" name="orderPrice" id="orderPrice"/>
            <?php if(is_array($goodsCart)): $i = 0; $__LIST__ = $goodsCart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><table class="table_list">
                    <tr class="tr">
                        <td class="checkbox"><input name="checkitems[]" onchange="getTotalPrice()" checked type="checkbox" value="<?php echo ($data["gid"]); ?>" /></td>
                        <td class="name">
                            <div class="img"><a href="<?php echo U('Home/Detail/detail');?>?id=<?php echo ($data["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($data["pic"]); ?>" /></a></div>
                            <div class="p_name"><a title="<?php echo ($data["goodsname"]); ?>" href="<?php echo U('Home/Detail/detail');?>?id=<?php echo ($data["gid"]); ?>"><?php echo (mb_substr($data["goodsname"],0,21,'utf-8')); ?></a></div>
                        </td>
                        <td class="scj sp"><?php echo ($data["oldprice"]); ?></td>
                        <td class="bgj sp"><?php echo ($data["price"]); ?></td>
                        <td class="sl">
                            <div class="Numbers">
                                <a href="javascript:jian<?php echo ($data['gid']); ?>('<?php echo ($key); ?>');" class="jian">-</a>
                                <input style="height: 30px" id="number_text<?php echo ($key); ?>" name="number_text<?php echo ($data["gid"]); ?>" onkeyup="changeNum<?php echo ($data['gid']); ?>(this)" type="text" value="<?php echo ($data["buynum"]); ?>" class="number_text" />
                                <a href="javascript:jia<?php echo ($data['gid']); ?>('<?php echo ($key); ?>');" class="jia">+</a>
                            </div>
                        </td>
                        <td class="xj"></td>
                        <td class="cz">
                            <p><a onclick="delCart(<?php echo ($data['gid']); ?>);" class="del" style="cursor: pointer">移除</a><P>

                        </td>
                    </tr>
                </table>

                <script type="text/javascript">
                    function jian<?php echo ($data['gid']); ?>(n){
                        var buynum=document.getElementById('number_text'+n).value;
                        if(buynum>1){
                            document.getElementById('number_text'+n).value=parseInt(buynum)-1;
                        }
                        getTotalPrice();
                    }
                    function jia<?php echo ($data['gid']); ?>(n){
                        var buynum=document.getElementById('number_text'+n).value;
                        var num1=<?php echo ($data['num']); ?>;
                        if(buynum<num1 && buynum<129){
                            document.getElementById('number_text'+n).value=parseInt(buynum)+1;
                        }
                        getTotalPrice();
                    }
                    function changeNum<?php echo ($data['gid']); ?>(v){
                        if(v.value<1){
                            v.value=1;
                        }
                        var num1=<?php echo ($data['num']); ?>;
                        if(v.value>num1){
                            v.value=num1;
                        }
                        if(v.value>129){
                            v.value=129;
                        }
                        if(isNaN(v.value)){
                            v.value=1;
                        }
                        getTotalPrice();
                    }
                </script><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="sp_Operation">
                <div class="select-all">
                    <div class="cart-checkbox"><input type="checkbox" id="CheckedAll" checked class="jdcheckbox" >全选</div>
                    <div class="operation"><a id="send" style="cursor: pointer">移除选中的商品</a></div>
                </div>

                <!--结算-->
                <div class="toolbar_right">
                    <div class="p_Total">
                        <span class="text">商品总价：</span><span id="sumPrice" class="price sumPrice"></span>
                    </div>
                    <div class="Discount"><span class="text">已节省：</span><span class="price" id="savePrice"></span></div>
                    <div class="btn">
                        <a class="cartsubmit" style="cursor: pointer"></a>
                        <a class="continueFind" href="<?php echo U('Home/Index/index');?>"></a>
                    </div>
                </div>
            </div>
        </form>
    </div><?php endif; ?>

</div>
<script type="text/javascript">
    $(function(){
        $('.cartsubmit').click(function(){
            $.post("<?php echo U('Cart/toBuy');?>",function(res){
                if(res.status==1){
                    $.post("<?php echo U('Order/createOrder');?>",$('#form1').serialize(),function(res1){
                        if(res1.status==1){
                            location="<?php echo U('Order/newOrder');?>?id="+res1.info;
                        }else{
                            layer.msg('error',{time:1500,icon:6});
                        }
                    })
                }else{
                    layer.msg('请您先去登录哦',{time:1500,icon:6},function(){
                        location.href="<?php echo U('Home/Login/login');?>";
                    });
                }
            })
        })
    })
    function getPrices(){
        var num=document.getElementsByClassName('number_text');
        var price=document.getElementsByClassName('bgj sp');
        var prices=document.getElementsByClassName('xj');
        for(var i=0;i<price.length;i++){
            prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(num[i].value);
        }
    }
    function getTotalPrice(){
        getPrices();
        var input=document.getElementsByName('checkitems[]');
        var marketPrice=document.getElementsByClassName('scj sp');
        var num=document.getElementsByClassName('number_text');
        var prices=document.getElementsByClassName('xj');
        var totalPrice=0;
        var savePrice=0;
        for(var i=0;i<input.length;i++){
            if(input[i].checked){
                totalPrice+=parseInt(prices[i].innerHTML);
                savePrice+=parseInt(marketPrice[i].innerHTML)*parseInt(num[i].value)-parseInt(prices[i].innerHTML);
            }
        }
        document.getElementById('sumPrice').innerHTML='￥'+totalPrice;
        document.getElementById('orderPrice').value=totalPrice;
        document.getElementById('savePrice').innerHTML='￥'+savePrice;
    }
    getTotalPrice();

</script>
<!--底部样式-->

    <div class="footerbox">
    <!--友情链接-->
    <div class="Links">
        <div class="link_title">友情链接</div>
        <div class="link_address"><a href="http://www.t0001.com/" target="_blank">河南茶叶协会</a>  <a href="http://news.t0001.com/" target="_blank">茶叶咨询频道</a>  <a href="http://news.t0001.com/" target="_blank">茶叶动态频道</a> <a href="http://news.t0001.com/" target="_blank">名家紫砂馆 </a>   <a href="http://news.t0001.com/" target="_blank">中国茶友会频道</a> <a href="http://news.t0001.com/" target="_blank">茶叶论坛</a> <a href="http://news.t0001.com/" target="_blank">茶叶大全</a></div>
    </div>
</div>
<div class="footer">
    <div class="streak"></div>
    <div class="footerbox clearfix">
        <div class="left_footer">
            <div class="img"><img src="/Public/Home/images/img_33.png" /></div>
            <div class="phone">
                <h2>服务咨询电话</h2>
                <p class="Numbers">400-3455-334</p>
            </div>
        </div>
        <div class="right_footer">
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
                <dd><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
    </div>
    <div class="slogen">
        <div class="footerbox clearfix ">
            <ul class="wrap">
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_02.png" data-bd-imgshare-binded="1"></a>
                    <b>正品保证</b>
                    <span>正品行货 放心选购</span>
                </li>
                <li><a href="#"><img src="/Public/Home/images/icon_img_03.png" data-bd-imgshare-binded="2"></a>
                    <b>满68元包邮</b>
                    <span>购物满68元，免费快递</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_04.png" data-bd-imgshare-binded="3"></a>
                    <b>厂家直供</b>
                    <span>价格更低，质量更可靠</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_05.png" data-bd-imgshare-binded="4"></a>
                    <b>权威认证</b>
                    <span>政府扶持单位，安全保证</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="footerbox Copyright">
        <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
        <p>Copyright 2010 - 2016 巴山雀舌 河南巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
        <p>豫ICP备10200063号-1</p>
        <a href="#" class="return_img"></a>
    </div>
</div>
<!--结束-->
</div>
</body>
</html>