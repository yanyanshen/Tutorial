<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>购物车 - 订单结算</title> 
  <meta charset="utf-8" /> 
  <meta name="keywords" content="拍鞋网,拍鞋网官方网站,拍鞋网商城" /> 
  <meta name="description" content="买鞋子哪个网站好，当然首选拍鞋网!中国最早成立的正品鞋子购物网站,国内最大的品牌鞋子销售广场。所售鞋子100%厂家授权,全国包邮,货到付款,提供最完美的购物体验！" /> 
  <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" /> 
  <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" /> 
  <meta content="yes" name="apple-mobile-web-app-capable" /> 
  <meta content="black" name="apple-mobile-web-app-status-bar-style" /> 
  <meta content="telephone=no" name="format-detection" /> 
 </head> 
 <body> 
  <!--改版后 com1-3.css可以去掉--> 
  <link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-3.css?2015091516" /> 
  <!--新改的--> 
  <link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-4.css?2015091516" /> 
  <link type="text/css" rel="stylesheet" href="/Public/Mobile/css/download.css?2015091516" /> 
  <link type="text/css" rel="stylesheet" href="/Public/Mobile/css/public-adaptation1-1.css?2015091516" /> 
  <script src="/Public/Mobile/js/jquery.js?2015091516"></script> 
  <script>var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','order','trolly'],'2015/09/15 16:10:43',0,false]; var DOMIN = {MAIN:"http://m.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};</script> 
  <script>
			var JAVASCRIPT_LIB = (('\v' !== 'v') ? 'zepto' : 'jquery');
			JAVASCRIPT_LIB="jquery"; 
            DOMIN.MAIN = 'http://m.paixie.net';
			DOMIN.PAIXIE = 'http://www.paixie.net';
            // uc浏览器添加书签功能   
           window.onmessage = function(event){
                if(event.data.message != ''){
                    $('#otherPage').remove();
                }else{
                    $('#otherPage').show();
                }
            };
        </script> 
  <script src="/Public/Mobile/js/com.js?2015091516"></script> 
  <script src="/Public/Mobile/js/px-verify.js?2015091516"></script> 
  <script src="/Public/Mobile/js/template.js?2015091516"></script>
  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
  <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
  <!--红包分享，临时添加--> 
  <!-- uc 浏览器添加书签 start ---> 
  <iframe src="http://app.uc.cn/appstore/AppCenter/frame?uc_param_str=nieidnutssvebipfcp&amp;api_ver=2.0&amp;id=1904" width="100%" height="160" style="display:none" id="otherPage"></iframe> 
  <!-- uc 浏览器添加书签 end   ---->
  <div class="com-content"> 
   <script>
			function open_notice(id){
            	setCookie('touch_notice_close',1);
                var url = '/new/info/'+id+'.html';
                window.location.href=url;
			};
			var touch_notice_close = getCookie('touch_notice_close');
			if(touch_notice_close == '1' && typeof(document.getElementById('js-com-notification2')) != 'undefined' && document.getElementById('js-com-notification2') != null){
				document.getElementById('js-com-notification2').style.display = 'none';
			}
		</script> 
   <script>
			$(document).ready(function(e) {
				publicHeadFoot(); // 首页公共部分进行头尾部公用
				$('.dload a.close').click(function(){
					$(this).parent().remove();
					setCookie('tipdownapp',1);
				});
			});
		</script>
   <div class="com-header-area" style="display:none"> 
    <header> 
     <!--正常--> 
     <a href="http://m.paixie.net/" class="logo" title="拍鞋网"><img src="/Public/Mobile/images/250X70.gif" width="100%" alt="拍鞋网" /></a> 
     <ul> 
      <li><a rel="nofollow" class="seek" href="search.html"></a></li> 
      <li><a rel="nofollow" class="email" href="http://m.paixie.net/member/user_msg"></a></li> 
      <li><a rel="nofollow" class="me" href="http://m.paixie.net/member/"></a></li> 
      <li> <a rel="nofollow" class="buy" href="http://m.paixie.net/cart/"> <span class="number spec-num">1</span> </a> </li> 
     </ul> 
    </header>
   </div> 
   <div class="clearboth"></div> 
   <div class="com-content-area" id="js-com-content-area"> 
    <div class="mask hidden"></div> 
    <!--content--> 
    <style type="text/css">
.m_bg{background-image: url(/Public/Mobile/images/base.png);background-size: 345px 350px;}
.holdspace{ height:50px;}
.com-title{ position:fixed; height:45px; left:0; z-index:3; top:0; width:100%; font-family:微软雅黑 !important;}
.com-title .home_menu{display: inline-block;vertical-align: middle; right:2%; top:-4%; width:10%;}
.com-title .home_menu span:after,
.com-title .home_menu span:before,
.com-title .home_menu span{display: inline-block;vertical-align: middle;width: 6px;height: 6px;border-radius: 3px;background: #ffffff;position: relative;}
.com-title .home_menu span:after{content: ' ';position: absolute;right:-10px;top:0;}
.com-title .home_menu span:before{content: ' ';position: absolute;left:-10px;top:0;}
.rotate45{webkit-transform:rotate(45deg) scale(1.00,1.00) translate(0px,0px) skew(0deg,0deg); transform:rotate(45deg) scale(1.00,1.00) translate(0px,0px) skew(0deg,0deg)}
.m_menu{z-index: 20;position: fixed;top:45px;right:5px;margin-left: -320px;}
.m_menu>div{margin-left:340px;width: 160px;background: #292c33;border-radius: 6px;}
.m_menu>div>i{width: 26px;height: 26px;position: absolute;right:15px;top:-12px;background: #292c33;}
.m_menu>div>a{color: #949599;text-decoration: none;display: block;height: 50px;line-height: 50px;border-bottom:2px solid #1f2126;padding-left:65px;position: relative;}
.m_menu>div>a:last-child{border-bottom:0;line-height: 50px;}
.m_menu>div>a>span{position: absolute;top:0;left:24px;}
.m_menu>div>a>span>i{width: 23px;height: 21px;display: inline-block;vertical-align: middle;}
.m_menu>div>a:nth-child(2)>span>i{background-position: 0 -251px;}
.m_menu>div>a:nth-child(3)>span>i{background-position: -25px -251px;}
.m_menu>div>a:nth-child(4)>span>i{background-position: -52px -251px;}
.m_menu>div>a:nth-child(5)>span>i{background-position: -78px -251px;}
.spaceholder{ height:45px;}
.hidden{ display:none;}
.mask{ background: #FFF; opacity: 0.01;z-index: 19; width: 100%;height: 100%; position: absolute;top: 0;left: 0;}
</style> 
    <script type="text/javascript">
$(document).ready(function() {
    var $header = $('.com-title');
    if($header.length){
        $header.find('.home_menu').click(function(){
               // var _menu = $('.m_menu')
				//if(_menu.hasClass('hidden')){_menu.removeClass('hidden');}else{_menu.addClass('hidden');}
				var _menu = $('.m_menu').removeClass('hidden');
				var _mask = $('.mask').removeClass('hidden');
                _menu.unbind('click').click(function(){
                    _mask.click();
                });
                _mask.click(function(){
                    _menu.addClass('hidden');
                    _mask.addClass('hidden');
                });
            })
    };
});
</script>
    <div class="page-role cart-page cart-trolly-page" id="js-cart-trolly-page"> 
     <link type="text/css" rel="stylesheet" href="/Public/Mobile/css/checkout.css" /> 
     <script src="/Public/Mobile/js/consignee.js"></script>
     <div class="com-title">
         <a title="返回" href="<?php echo U('Mobile/MyCart/mycart');?>">
             <span  style="display: inline-block;width: 50px;margin-left: 0;color: white;" >&lt;</span>
         </a>
      <a title="菜单" href="javascript:void(0);" class="home_menu"> <span></span> </a> 购物结算
     </div>
     <div class="m_menu hidden"> 
      <div> 
       <i class="rotate45"></i>
          <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
          <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
          <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
          <?php if($_SESSION['beauty_']['mid']> '0'): ?><a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
              <?php else: ?>
              <a href="<?php echo U('Mobile/Login/Dologin');?>"><span><i class="m_bg"></i></span>用户中心</a><?php endif; ?>
      </div> 
     </div> 
     <div class="spaceholder"></div>
     <form id="js-trolly-form" action="<?php echo U('Mobile/MyCart/tosubmit');?>" method="post">
         <input type="hidden" name="oid" value="<?php echo ($oid); ?>"/>
      <div class="pxui-area" id="js-trolly" style="display:block"> 
       <h1>选择收货地址</h1>
          <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ress): $mod = ($i % 2 );++$i;?><div class="address"> 
        <a id="js-other-use-address-2" style="display:none">您还未添加任何地址，请先添加地址！</a> 
        <span>
            <input type="hidden" id="js-trolly-address-id" value="<?php echo ($ress["id"]); ?>" name="address"/>
            <span id="js-trolly-address-name"><?php echo ($ress["username"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="js-trolly-address-phone"><?php echo ($ress["mobile"]); ?></span><br />
            <span id="js-trolly-address-province"><?php echo ($ress["province"]); ?></span>
            <span id="js-trolly-address-city"><?php echo ($ress["country"]); ?></span>
            <span id="js-trolly-address-area"><?php echo ($ress["city"]); ?></span>
            <span id="js-trolly-address-address"><?php echo ($ress["address"]); ?></span>
            <span id="js-trolly-address-zipcode"><?php echo ($ress["ecode"]); ?></span> <br/>
        </span>
        <a href="<?php echo U('Mobile/Address/totaladdresslist',array('oid'=>$oid));?>" class="a" style="display:block;" id="js-other-use-address"><b>+</b> 使用其他收货地址</a>
       </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div style="width: 100%;height: 100px;">
              <div style="">
                  <div style="float: left;width: 30%"><img src="/Uploads/<?php echo ($list["imageurl"]); ?>100_<?php echo ($list["imagename"]); ?>" alt=""/></div>
                  <div style="float: left;width: 67%;margin-left: 10px;">
                      <p>商品名称:<span><?php echo ($list["goodsname"]); ?></span></p>
                      <p>属性：<span><?php echo ($list["ml"]); ?>ml</span></p>
                      <p><span style="color: red;float: left;">￥<?php echo ($list["saleprice"]); ?></span><span style="float: right;">数量： X<?php echo ($list["buynum"]); ?></span></p>
                  </div>
              </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
       <h1>选择支付方式</h1> 
       <div class="paytype" id="js-paytype">
        <a id="js-pay-4" value="4,">货到付款<i></i></a> 
        <a id="js-pay-1" value="1,200">支付宝<i></i></a> 
        <a value="1,201">财付通<i></i></a>
       </div>
       <div class="goodlist" id="js-item-list"></div> 
       <h1>优惠</h1> 
       <div class="offer alloffer" id="js-all-offers">
        <input type="text" name="hongbao" id="hongbao" value="<?php echo ($money); ?>" style="border: none;"/>
           <input type="hidden" name="hid" />
        <a class="a" id="js-use-card-button">使用红包<i class="arrow-right"></i></a>
           <input type="hidden" value="<?php echo ($hlist[0]['money']); ?>" name="hbarr"/>
       </div> 
       <h1>买家留言：</h1>
       <div class="message"> 
        <textarea id="js-trolly-message" name="inform" maxlength="100" placeholder="订单留言，最多支持100个字符！"></textarea>
       </div>
          <div class="fixed_price" style="height:1rem;padding: 0 0 0 0.14rem">
              <div class="price_info" style="line-height: 1rem;">
                  <p class="total" style="margin: 0;padding: 0;margin-top: 15px;">
                      <span style="float: left;">合计：</span><span style="color:red;display: inline-block;float: left;">￥</span>
                      <input type="hidden" name="orderprice" value="<?php echo ($orderprice); ?>"/>
                      <input type="text" value="<?php echo ($orderprice); ?>" name="totalprice" readonly style="background-color: #ffffff;width:120px;margin:0;padding:0;display:inline-block;color: red;height: 30px;font-size:26px;float:left;line-height: 30px;"/>
                  </p>
              </div>
              <input class="submit" type="submit" value="提交订单" />
              <em class="clear"></em>
          </div>
      </div>
     </form>
    </div>
   </div> 
  </div>
  <script type="text/javascript">
top.ztetbdata = null; 
</script>  
  <script src="/Public/Mobile/js/trolly.js?12"></script>
 </body>
</html>
<script type="text/javascript">
    $(function(){
        arr=$('input[name="hbarr"]').val();
            $('#js-use-card-button').click(function(){
                if(!arr){
                    layer.open({
                        content: '没有可以使用的红包哦'
                        ,skin: 'msg'
                        ,time: 2//2秒后自动关闭
                        ,style:'line-heght:100px;'
                    });
                }else {
                    layer.open({
                        type: 1
                        ,content: '<div>' +
                        '<div style="margin-top: 16px;">' +
                        '<span style="display: inline-block;width: 100%;height: 50px;text-align: center;line-height: 50px;font-size: 32px;">选择可以使用的红包</span>' +
                        '<span style="display: inline-block;width: 100%;height: 50px;text-align: center;line-height: 50px;font-size: 32px;">' +
                        '<select name="hongbao" style="width: 80px;border: none;margin-top: 50px;">' +
                        '<?php if(is_array($hlist)): $i = 0; $__LIST__ = $hlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>' +
                        '<option value="<?php echo ($v["id"]); ?>" style="text-align: center;font-size: 20px;"><?php echo ($v["money"]); ?></option>' +
                        '<?php endforeach; endif; else: echo "" ;endif; ?>' +
                        '</select>' +
                        '</span>' +
                        '<a class="confirmhong" style="width: 100%;background-color: orangered;display: inline-block;text-align: center;height: 30px;line-height: 30px;color: white;font-size: 32px;margin-top: 81px;">确定</a>' +
                        '</div>' +
                        '</div>' + ';'
                        ,anim: 'up'
                        ,style: 'position:fixed; bottom:0; left:0; width: 100%; height: 250px; padding: 0;margin:0; border:none;'
                    });
                }
        });

        //在使用红包的同时，将商品的总价进行更新
        $('.confirmhong').live('click',function(){
            hongbao=$('select[name="hongbao"]').val();
            $.post('<?php echo U("Mobile/Order/money");?>',{money:hongbao},function(res){
                if(res.status==1){
                    $('#hongbao').attr('value',res.info);
                    //将红包的id给隐藏域
                    $('input[name="hid"]').attr('value',hongbao);
                    money=res.info;
                    totalprice=$('input[name="orderprice"]').val();
                    orderprice=totalprice-money;
                    $('input[name="totalprice"]').val(orderprice);
                }
            })
            parent.layer.closeAll();
        })
        money=$('#hongbao').val();
        if(money){
            totalprice=$('input[name="orderprice"]').val();
            orderprice=totalprice-money;
            $('input[name="totalprice"]').val(orderprice);
        }else{
            totalprice=$('input[name="orderprice"]').val();
            $('input[name="totalprice"]').val(totalprice);
        }
    })
</script>