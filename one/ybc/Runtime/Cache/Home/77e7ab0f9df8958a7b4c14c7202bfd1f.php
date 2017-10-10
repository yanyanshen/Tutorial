<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/show.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/js/jqzoom.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<link href="/Public/Home/css/fixedBox.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" href="assets//Public/Home/css/font-awesome-ie7.min.css">
<![endif]-->
<title><?php echo ($goodsInfo[0]['goodsname']); ?></title>
</head>
<body>
<!--顶部样式-->
<style type="text/css">
    .Navigation_name li.onon { background:#9d9d9d;color: #fff; }
</style>
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
        $(".Navigation_name li").removeClass();
        var reg1=/\/Home\/Integral\//;
        var reg2=/\/Home\/Group\//;
        var reg3=/\/Home\/Index\//;
        var nowurl=document.URL;
        if(reg1.test(nowurl)){

        }else if(reg2.test(nowurl)){
            $('#jrtgli').addClass("on");
            $(".Navigation_name li").mouseleave(function(){
                $(this).removeClass("on");
            })
        }else if(reg3.test(nowurl)){

        }else{

        }


    });
</script>
<!--顶部样式-->
<div id="top">
    <div class="top">
        <div class="Collection"><em></em><a href="javascript:;" title="收藏我们" id="fav">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <?php if(!isset($_SESSION['ybc_id'])): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                    <?php else: ?>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('UserCenter/usercenter');?>" target="_blank" class="red">[<?php echo (session('ybc_username')); ?>]</a><a href="<?php echo U('Login/logout');?>" class="red">[退出登录]</a></li><?php endif; ?>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Order/myOrderList');?>" target="_blank">我的订单</a></li>
                <li class="hd_menu_tit msg" data-addclass="hd_menu_hover"> <a href="<?php echo U('UserCenter/usermsg');?>" target="_blank">我的消息(<b id="msgNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>">购物车(<b id="cartNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('UserCenter/myCollect');?>">我的收藏</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Index/guanyuwomen');?>" target="_blank">关于我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--logo和搜索样式-->
<div id="header"  class="header">
    <div class="logo">
        <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
        <div class="phone">
            免费咨询热线:<span class="telephone">400-3404-000</span>
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
<!--导航栏样式-->
<!--<div class="prompt"></div><div class="nogoods"  style="height: 69px;"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
<div id="Menu" class="clearfix">
    <div class="Menu_style">
        <div id="allSortOuterbox" class="display">
            <div class="Category"><a href="#" class="Menu_img"><em></em></a></div>
            <div class="hd_allsort_out_box_new">
                <!--左侧栏目开始-->
                <div class="Menu_list">
                    <div class="menu_title">茶叶品种</div>
                    <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
                </div>
                <div class="Menu_list">
                    <div class="menu_title">茶叶价格</div>
                    <a href="<?php echo U('Goodslist/index');?>?price=1">0-50</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=2">50-150</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=3">150-500</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=4">500-1000</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=5">1000以上</a>
                </div>
                <div class="Menu_list">
                    <div class="menu_title">推荐茶叶</div>
                    <ul class="recommend">

                    </ul>
                </div>
            </div>
        </div>
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name">
                <li id="syli"><a class="nav_on" id="mynav1"  href="<?php echo U('Index/index');?>"><span>首页</span></a></li>
                <li><a class="nav_on" id="mynav2"  href="<?php echo U('goodslist/index');?>?category1=26"><span>乌龙茶</span></a></li>
                <li><a class="nav_on" id="mynav3"  href="<?php echo U('goodslist/index');?>?category1=27"><span>绿茶</span></a></li>
                <li><a class="nav_on" id="mynav7"  href="<?php echo U('goodslist/index');?>?category1=29"><span>黑茶</span></a></li>
                <li><a class="nav_on" id="mynav4"  href="<?php echo U('goodslist/index');?>?category1=44"><span>茶具</span></a></li>
                <li id="jrtgli"><a class="nav_on" id="mynav8"  href="<?php echo U('Group/index');?>" target="_blank"><span>今日团购</span></a></li>
                <li id="jfscli"><a class="nav_on" id="mynav9"  href="<?php echo U('Integral/integral');?>" target="_blank"><span>积分商城</span></a></li>
                <li><a class="nav_on" id="mynav11"  href="<?php echo U('Sign/index');?>"><span>每日签到</span></a></li>
                <li><a class="nav_on" id="mynav10"  href="<?php echo U('Index/lianxiwomen');?>" target="_blank"><span>联系我们</span></a></li>
            </ul>
        </div>
        <script type="text/javascript">
            $(function(){
                reg1=/Home\/Group\//;
                reg2=/Home\/Integral\//;
                reg3=/Home\/Sign\//;
                nowUrl=document.URL;
                if(reg1.test(nowUrl)){
                    $("#jrtgli").addClass('oonn');
                }
                if(reg2.test(nowUrl)){
                    $("#jfscli").addClass('oonn');
                }
                if(reg3.test(nowUrl)){
                    $("#jrqdli").addClass('oonn');
                }

                $("#Navigation>ul>li").mouseenter(function(){
                    $(this).addClass('on');
                })
                $("#Navigation>ul>li").mouseleave(function(){
                    $(this).removeClass('on');
                })
            })
        </script>
        <!--购物车-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em></em><a href="<?php echo U('Cart/cart');?>">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
            <div class="dorpdown-layer" style="width: 321px">
                <div class="spacer"></div>
                <div class="prompt"></div><div class="nogoods"  style="height: 69px;"><b></b>购物车中还没有商品，赶紧选购吧！</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        getMyCart=function(){
            $.post("<?php echo U('Cart/getMyCart');?>",'',function(res){
                if(res.status==1){
                    var str='';
                    var num=0;
                    var price=0;
                    str+="<div class='spacer'></div><ul class='p_s_list' style='max-height: 240px;overflow: auto; margin-bottom: 50px;'>";
                    for(var i in res.info){
                        num+=parseInt(res['info'][i]['buynum']);
                        price+=(parseInt(res['info'][i]['buynum'])*parseInt(res['info'][i]['price']));
                        str+="<li><div class='img'><img style='width: 50px;height: 50px' src='/Uploads/goodsPic/100/100_"+res['info'][i]['pic']+"'></div>";
                        str+="<div class='content'><p>产品名称：</p><p>";
                        str+="<a href='<?php echo U('Home/Detail/detail');?>?id="+res['info'][i]['id']+"' title="+res['info'][i]['goodsname']+">";
                        str+=res['info'][i]['goodsname'].substring(0,13);
                        str+=" </a></p></div>";
                        str+="<div class='Operations'> <p class='Price' style='color: lightslategray'>￥<span class='singlePrice'>";
                        str+=res['info'][i]['price'];
                        str+="</span>   x   <span class='buyNums'>";
                        str+=res['info'][i]['buynum'];
                        str+="<span/></p><p><a class='del' onclick='delCart("+res['info'][i]['id']+");' style='cursor: pointer'>移除</a></p></div> </li>";
                    }
                    str+="<ul/>";
                    str+="<div class='Shopping_style' style='position: absolute;bottom: 0px; width: 290px;'><div class='p-total'>共  <b>"+num+"</b> 件商品　共计￥<strong id='totalPrice1' style='font-size: 16px; color: #ff5555;'>"+price+"</strong></div>";
                    str+="<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods' class='Shopping'>去购物车结算</a></div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(num);
                }else{
                    var str='';
                    str+="<div class='spacer'></div><div class='prompt'></div><div class='nogoods'  style='height: 69px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(0);
                }
            })
        }
        getMyCart();

        //中文字符串的截取  str字符串  len长度  hasDot所要追加的内容
        function subString(str, len, hasDot)
        {
            var newLength = 0;
            var newStr = "";
            var chineseRegex = /[^\x00-\xff]/g;
            var singleChar = "";
            var strLength = str.replace(chineseRegex,"**").length;
            for(var i = 0;i < strLength;i++)
            {
                singleChar = str.charAt(i).toString();
                if(singleChar.match(chineseRegex) != null)
                {
                    newLength += 2;
                }
                else
                {
                    newLength++;
                }
                if(newLength > len)
                {
                    break;
                }
                newStr += singleChar;
            }

            if(hasDot && strLength > len)
            {
                newStr += "...";
            }
            return newStr;
        }








        $.get("<?php echo U('Index/left');?>",'',function(res){
            if(res.status==1){
                var str='';
                for(var i in res.info){
                    str+="<li><a href='<?php echo U('Detail/detail');?>?id="+res.info[i]['gid']+"' title='"+res.info[i]['goodsname']+"'>"+subString(res.info[i]['goodsname'],25,'...')+"</a></li>";
                }
                $(".recommend").html(str);
            }
        })



    })

    delCart=function(gid){
        $.post("<?php echo U('Cart/delCart');?>",{gid:gid},function(res){
            if (res.status==1) {
                layer.msg('移除成功',{time:1000,icon:1},function(){
                    getMyCart();
                    refreshCart();
                    getMyCart1();
                });
            }else{
                layer.msg('移除失败',{time:1000,icon:2},function(){
                    getMyCart();
                    refreshCart();
                    getMyCart1();
                });
            }
        })
    }

</script>


<script type="text/javascript">
    $(function(){
        $.get("<?php echo U('MemberMessage/index');?>",'',function(res){
            if(res.status==1){
                $("#msgNum").text(res.info);
                layer.tips("<a style='cursor:pointer;color:black;' href='"+"<?php echo U('UserCenter/usermsg');?>"+"'>"+"您有"+res.info+"条消息未读，点击查看"+"</a>", '.msg', {
                    tips: 3
                    ,time:10000000000
                });
            }else{
                $("#msgNum").text("0");
            }
        });
    })
</script>
<!--内页样式-->
<div class="Inside_pages">
<!--面包屑-->
 <div class="Location_link">
     <em></em><a href="">产品中心</a>  &lt;   <a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($pid); ?>"><?php echo ($category2['catename']); ?></a>  &lt;   <a href="<?php echo U('Goodslist/index');?>?category1=<?php echo ($pid); ?>&cate=<?php echo ($cid); ?>"><?php echo ($category1['catename']); ?></a>
 </div>
 <!--产品购买介绍样式-->
 <div class="Detailed">
     <!--产品详细介绍-->
 <div class="Details_style clearfix" id="goodsInfo">
  <div class="mod_picfold clearfix">
    <div class="clearfix" id="detail_main_img">
	 <div class="layout_wrap preview">
     <div id="vertical" class="bigImg">
		<img src="/Uploads/goodsPic/800/800_<?php echo ($goodsInfo[0][pic]); ?>" width="" height="" alt="" id="midimg" />
		<div style="display:none;" id="winSelector"></div>
	</div>
     <div class="smallImg">
		<div class="scrollbutton smallImgUp disabled">&lt;</div>
		<div id="imageMenu">
			<ul>
                <li><img src="/Uploads/goodsPic/800/800_<?php echo ($goodsInfo[0][pic]); ?>" width="68" height="68" alt=""/></li>
                <?php if(is_array($goodsPic)): $i = 0; $__LIST__ = $goodsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><li><img src="/Uploads/goodsPic/800/800_<?php echo ($pic["picname"]); ?>" width="68" height="68" alt=""/></li><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
		</div>
		<div class="scrollbutton smallImgDown">&gt;</div>
	</div><!--smallImg end-->	
	<div id="bigView" style="display:none;"><div><img width="800" height="800" alt="" src="" /></div></div>
	 </div>
  
	</div>
		 <div class="Sharing">
             <div class="bdsharebuttonbox">
                 <a href="#" class="bds_more" data-cmd="more"></a>
                 <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                 <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                 <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                 <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
             </div>
<script type="text/javascript">
    window._bd_share_config={
        "common":{
            "bdPopTitle":"您的自定义pop窗口标题",
            "bdSnsKey":{},
            "bdText":"此处填写自定义的分享内容",
            "bdMini":"2",
            "bdMiniList":false,
            "bdPic":"http://localhost/centlight/public/attachment/201410/24/14/5449ef39574f5_282x220.jpg", /* 此处填写要分享图片地址 */
            "bdStyle":"0",
            "bdSize":"16"
        },
        "share":{}
    };
    with(document)0[
            (getElementsByTagName('head')[0]||body).
                    appendChild(createElement('script')).
                    src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)
            ];

    $(function(){
        refreshCollect=function(){
            var gid=<?php echo ($gid); ?>;
            $.post("<?php echo U('Detail/getCollectNum');?>",{gid:gid},function(res){
                if(res.info){
                    $("#collectNum").text(res.info);
                }else{
                    $("#collectNum").text(0);
                }
            })
        }
        refreshCollect();
    });
</script>
<!--收藏-->
   <div class="Collect">
       <?php if($loginStatus): if($ifCollect): ?><img src="/Public/Home/images/heart1.png" class="heart1" style="margin-right: 4px;cursor: pointer;display: none"/>
               <img src="/Public/Home/images/heart2.png" class="heart2" style="margin-right: 4px;cursor: pointer;"/>
           <?php else: ?>
               <img src="/Public/Home/images/heart1.png" class="heart1" style="margin-right: 4px;cursor: pointer"/>
               <img src="/Public/Home/images/heart2.png" class="heart2" style="margin-right: 4px;cursor: pointer;display: none"/><?php endif; ?>
       <?php else: ?>
           <img src="/Public/Home/images/heart1.png" class="heart3" style="margin-right: 4px;cursor: pointer"/><?php endif; ?>
      收藏商品( <span id="collectNum">0</span> )</div>
   </div>
   </div>
   <script type="text/javascript">
       $(function(){
           $(".heart1").click(function(){
               $(this).hide().siblings().show();
               var gid=<?php echo ($gid); ?>;
               $.post("<?php echo U('toCollect');?>",{gid:gid},function(res){
                   if(res.status==1){
                       refreshCollect();
                       layer.msg(res.info,{time:1000,icon:1});
                   }else{
                       layer.msg(res.info,{time:1000,icon:5});
                   }
               })
           })
           $(".heart2").click(function(){
               $(this).hide().siblings().show();
               var gid=<?php echo ($gid); ?>;
               $.post("<?php echo U('outCollect');?>",{gid:gid},function(res){
                   if(res.status==1){
                       refreshCollect();
                       layer.msg(res.info,{time:1000,icon:1});
                   }else{
                       layer.msg(res.info,{time:1000,icon:5});
                   }
               })
           })
           $(".heart3").click(function(){
               layer.msg('登录后您才能收藏商品哦',{time:1500,icon:6});
           })
       })
   </script>
   <!--信息样式-->
    <div class="textInfo">
    <form method="post" action="<?php echo U('Detail/toCart');?>" id="ECS_FORMBUY">
        <input type="hidden" name="gid" value="<?php echo ($gid); ?>"/>
	  <div class="title"><h1><?php echo ($goodsInfo[0]['goodsname']); ?></h1><p>优质生活--高端享受</p></div>
	  <div class="mod_detailInfo_priceSales">
	  <div class="margins">
	  <div class="Price clearfix text_name"><label>价格</label><span class="Prices"><h4>¥<?php echo ($goodsInfo[0]['price']); ?></h4> <b><?php echo ($goodsInfo[0]['oldprice']); ?></b></span></div>
	  <div class="Activity clearfix text_name"><label>重量</label><span class="weight"><?php echo ($goodsInfo[0]['weight']); ?>克</span></div>
      <div class="Size clearfix text_name" style="cursor: pointer"><label>特色</label><a>茶味清香</a><a>包装精美</a><a>优质服务</a></div>
      <div class="Sales_volume">
       <div class="Sales_info"><h5>销量</h5><b><?php echo ($goodsInfo[0]['salenum']); ?></b></div>
      </div>
	  </div>
	  <div class="s_Review">
	   <a href="#coms1">好评率<b><?php echo (substr($count1/$count*100,0,4)); ?>%</b>[评论<b><?php echo ($count); ?></b>条]</a>
	  </div>
	  </div>
	 <div class="buyinfo" id="detail_buyinfo">
		<dl>
        <dt>数量</dt>
        <dd>
		  <div class="choose-amount left">
			<a class="btn-reduce" href="javascript:jian()">-</a>
			<a class="btn-add" href="javascript:jia()">+</a>
			<input type="text" id="buy-num" name="buy-num" value="1">
		 </div>
		 <div class="P_Quantity">剩余：<?php echo ($goodsInfo[0]['num']); ?>件</div>
        </dd>
        <?php if(($goodsInfo[0]['num']) == "0"): ?><dd>
                <div class="wrap_btn0" style="background: gray;width: 150px;height:30px;line-height: 30px;text-align: center;border-radius: 5px;margin-left: 20px;margin-top: 10px;">
                    <a class="wrap_btn0" id="toCart0" title="已售空" style="cursor: pointer;color: #ffffff">已售空</a>
                </div>
            </dd>
        <?php else: ?>
          <dd>
            <div class="wrap_btn"> <a class="wrap_btn1" id="toCart" title="加入购物车" style="cursor: pointer"></a></div>
          </dd><?php endif; ?>
	  </dl>
	  </div>
	  <div class="Guarantee clearfix">
	   <dl><dt>商城服务</dt><dd><em></em>正品保障</dd><dd><em></em>售后无忧</dd><dd><em></em>原产认证</dd> 
	   <dd class="manner"> <div class="payment " id="payment">
                                    <a href="javascript:void(0);" class="paybtn">支付方式<span class="icon-angle-down"></span></a>
                                <ul><li>货到付款</li><li>礼品卡支付</li><li>网上支付</li><li>银行转账</li></ul></div>
	  </dd></dl></div>	  
	</form>
  </div>
  </div> 
 </div>
 <!----------------------------------- 相似精品推荐----------------->
  <div class="clearfix">
  <div class="left_style">
   <div class="Records">
     <div class="title_name">相似精品推荐</div>
	 <ul>

	  <?php if(is_array($detailAd)): $i = 0; $__LIST__ = $detailAd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
	   <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>">
	   <p><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" data-bd-imgshare-binded="1"></p>
	   <p class="p_name"><?php echo ($val["goodsname"]); ?></p>
	   </a>
	   <p><span class="p_Price">￥<?php echo ($val["price"]); ?></span><b><?php echo ($val["oldprice"]); ?></b></p>
	  </li><?php endforeach; endif; else: echo "" ;endif; ?>

	 </ul>
   </div>
   </div>
   <div class="right_style">
    <div class="inDetail_boxOut ">
	 <div class="inDetail_box">
	  <div class="fixed_out ">
	   <ul class="inLeft_btn fixed_bar">
                  <li><a id="property-id" href="#shangpsx" class="current">商品属性</a></li>
                  <li><a id="detail-id" href="#shangpjs">图文详情</a></li>
                  <li><a id="coms1-id" href="#coms1">买家评论</a></li>
                </ul>
	  </div>
      <!--商品详情-->
      <div class="product_details">
      <div id="shangpsx">
       <div class="title"><img src="/Public/Home/images/title_name_03.png" /></div>
       <ul class="shangpsx_info">
        <li><label>生产许可证编号</label><span>QS3301 1401 0973</span></li>
        <li><label>产品标准号</label><span>GB/T 18650</span></li>
        <li><label>生产日期</label><span>2015年4月</span></li>
        <li><label>有效期</label><span>三年</span></li>
        <li><label>产品名称</label><span>艺福堂茶叶 绿茶 龙井茶 西湖龙井 雨前靠谱茶</span></li>
        <li><label>净含量</label><span>250g</span></li>
        <li><label>包装</label><span>礼盒包装</span></li>
        <li><label>品牌</label><span>艺福堂</span></li>
        <li><label>食品工艺</label><span>炒青绿茶</span></li>
        <li><label>级别</label><span>三级</span></li>
        <li><label>产地</label><span>中国大陆杭州</span></li>
        <li><label>价格</label><span>100-199元</span></li>
       </ul>
      </div>
      <div id="shangpjs">
       <img src="/Public/Home/images/pro_img.png" />
      </div>
      <div id="coms1">
        <div class="productContent" id="status2">
	 <div class=""></div>
      <div class="iComment clearfix">
        <div class="rate"><strong id="goodRate"><?php echo (substr($count1/$count*100,0,4)); ?><span>%</span></strong><br>
          <span>好评度</span></div>
        <div class="percent" id="percentRate">
          <dl>
            <dt>好评<span>(<?php echo (substr($count1/$count*100,0,4)); ?>%)</span></dt>
            <dd>
              <div style="width:<?php echo ($count1/$count*100); ?>%;"></div>
            </dd>
          </dl>
          <dl>
            <dt>中评<span>(<?php echo (substr($count2/$count*100,0,4)); ?>%)</span></dt>
            <dd class="d1">
              <div style="width:<?php echo ($count2/$count*100); ?>%;"> </div>
            </dd>
          </dl>
          <dl>
            <dt>差评<span>(<?php echo (substr($count3/$count*100,0,4)); ?>%)</span></dt>
            <dd class="d1">
              <div style="width:<?php echo ($count3/$count*100); ?>%;"> </div>
            </dd>
          </dl>
        </div>
        <div class="actor">
          <dl>
            <dt>发表评价即可获得10积分，精华评论更有 <font color="red">额外奖励</font> 积分；<br>
              还有7个多倍积分名额哦，赶紧抢占吧！<br>
              只有购买过该商品的用户才能进行评价。</dt>           
          </dl>
        </div>
      </div>
        <?php if($hid): ?><div class="commentBox" style="display: block;">
                <form action="<?php echo U('toComment');?>" method="post" name="commentForm" id="commentForm" >
                    <input type="hidden" name="gid" value="<?php echo ($gid); ?>"/><input type="hidden" name="hid" value="<?php echo ($hid); ?>"/>
                    <h3>商品评分</h3>
                    <p class="tip">请直接点击相应的星级进行评分</p>
                    <div id="star" style="margin-top: 20px;">
                        <ul>
                            <li><input id="Comment1" type="radio" name="level" value="1" checked/><label for="Comment1"><img id="Img1" src="/Public/Home/images/star2.png"/></label><p>3分</p><p>好评</p></li>
                            <li><input id="Comment2" type="radio" name="level"  value="2"/><label for="Comment2"><img id="Img2" src="/Public/Home/images/star1.png"/></label><p>2分</p><p>中评</p></li>
                            <li><input id="Comment3" type="radio" name="level" value="3"/><label for="Comment3"><img id="Img3" src="/Public/Home/images/star1.png"/></label><p>1分</p><p>差评</p></li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(function(){
                            $(".btn_common").click(function(){
                                //alert($(":radio[name='Comment']:checked").val());
                                $.post("<?php echo U('toComment');?>",$('#commentForm').serialize(),function(res){
                                    if(res.status==1){
                                        layer.msg(res.info,{time:1500,icon:1},function(){
                                            location.reload();
                                        });
                                    }else{
                                        layer.msg(res.info,{time:1500,icon:6},function(){
                                            location.href="<?php echo U('UserCenter/myComment');?>";
                                        });
                                    }
                                })
                            })
                            $("#Comment1").click(function(){
                                $("#Img1").attr({src:"/Public/Home/images/star2.png"});
                                $("#Img2").attr({src:"/Public/Home/images/star1.png"});
                                $("#Img3").attr({src:"/Public/Home/images/star1.png"});
                            })
                            $("#Comment2").click(function(){
                                $("#Img1").attr({src:"/Public/Home/images/star1.png"});
                                $("#Img2").attr({src:"/Public/Home/images/star2.png"});
                                $("#Img3").attr({src:"/Public/Home/images/star1.png"});
                            })
                            $("#Comment3").click(function(){
                                $("#Img1").attr({src:"/Public/Home/images/star1.png"});
                                $("#Img2").attr({src:"/Public/Home/images/star1.png"});
                                $("#Img3").attr({src:"/Public/Home/images/star2.png"});
                            })

                        })
                    </script>
                    <h4>评论内容</h4>
                    <div class="bd">
                        <textarea name="content" id="content" class="textarea_long" style="font-size: 16px;" onkeyup="checkLength(this);"></textarea>
                        <p class="g">
                            <label>&nbsp; </label>
                            <input type="button" value="发表" class="btn_common">
                            <span t="word_calc" class="word"><b id="sy">0</b>/1000</span> </p>
                    </div>
                </form>
            </div><?php endif; ?>
      <div id="ECS_COMMENT"> <div class="Comment">
<div class="CommentTab">
  <ul>
	<li class="active" onclick="javascript:gotoPage(1,78,0,0);">全部评论( <?php echo ($count); ?> )</li>
	<li onclick="javascript:gotoPage(1,78,0,1);">好评( <?php echo ($count1); ?> )</li>
	<li onclick="javascript:gotoPage(1,78,0,2);">中评( <?php echo ($count2); ?> )</li>
	<li onclick="javascript:gotoPage(1,78,0,3);">差评( <?php echo ($count3); ?> )</li>
  </ul>
</div>
<div class="CommentText" id="goodsdetail_comments_list" style="display:block">
  <ul class="clearfix">
  </ul>
  <div class="discuss_Paging">
      <?php if($commentList): if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="commentOne">
          <div class="comment-lt">
              <div class="comment-mem">
                  <p><img src="/Public/Home/images/people.png"/>用户：<span><?php echo ($list["username"]); ?></span></p>
                  <p>评价级别：
                      <?php if(($list["level"]) == "1"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                      <?php if(($list["level"]) == "2"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                      <?php if(($list["level"]) == "3"): ?><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                  </p>
                  <p>评价时间：<?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?></p>
              </div>
          </div>
          <div class="comment-rt1">
              <p>评价内容：<span><?php echo ($list["text"]); ?></span></p>
          </div>
          <?php if(empty($list["text1"])): else: ?>
              <div class="comment-rt2">
                  <p>商家回复：<span><?php echo ($list['text1']); ?></span></p>
                  <p>回复时间：<span><?php echo (date('Y-m-d H:i:s',$list['addtime1'])); ?></span></p>
              </div><?php endif; ?>
      </div>
      <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="discuss" style=""><span class="f_l f6">共 <b><?php echo ($count); ?></b> 条评论</span></div>
      <?php else: ?>
        <div>暂时还没有人评价哦</div><?php endif; ?>
  </div>
</div>
<div class="CommentText">
    <ul class="clearfix">
    </ul>
    <div class="discuss_Paging">
        <?php if($commentList1): if(is_array($commentList1)): $i = 0; $__LIST__ = $commentList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="commentOne">
                <div class="comment-lt">
                    <div class="comment-mem">
                        <p><img src="/Public/Home/images/people.png"/>用户：<span><?php echo ($list["username"]); ?></span></p>
                        <p>评价级别：
                            <?php if(($list["level"]) == "1"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                            <?php if(($list["level"]) == "2"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                            <?php if(($list["level"]) == "3"): ?><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                        </p>
                        <p>评价时间：<?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?></p>
                    </div>
                </div>
                <div class="comment-rt1">
                    <p>评价内容：<span><?php echo ($list["text"]); ?></span></p>
                </div>
                <?php if(empty($list["text1"])): else: ?>
                    <div class="comment-rt2">
                        <p>商家回复：<span><?php echo ($list['text1']); ?></span></p>
                        <p>回复时间：<span><?php echo (date('Y-m-d H:i:s',$list['addtime1'])); ?></span></p>
                    </div><?php endif; ?>
            </div>
            <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="discuss" style=""><span class="f_l f6">共 <b><?php echo ($count1); ?></b> 条评论</span></div>
        <?php else: ?>
            <div>暂时还没有人评价哦</div><?php endif; ?>
    </div>
</div>
<div class="CommentText">
    <ul class="clearfix">
    </ul>
    <div class="discuss_Paging">
        <?php if($commentList2): if(is_array($commentList2)): $i = 0; $__LIST__ = $commentList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="commentOne">
                <div class="comment-lt">
                    <div class="comment-mem">
                        <p><img src="/Public/Home/images/people.png"/>用户：<span><?php echo ($list["username"]); ?></span></p>
                        <p>评价级别：
                            <?php if(($list["level"]) == "1"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                            <?php if(($list["level"]) == "2"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                            <?php if(($list["level"]) == "3"): ?><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                        </p>
                        <p>评价时间：<?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?></p>
                    </div>
                </div>
                <div class="comment-rt1">
                    <p>评价内容：<span><?php echo ($list["text"]); ?></span></p>
                </div>
                <?php if(empty($list["text1"])): else: ?>
                    <div class="comment-rt2">
                        <p>商家回复：<span><?php echo ($list['text1']); ?></span></p>
                        <p>回复时间：<span><?php echo (date('Y-m-d H:i:s',$list['addtime1'])); ?></span></p>
                    </div><?php endif; ?>
            </div>
            <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="discuss" style=""><span class="f_l f6">共 <b><?php echo ($count2); ?></b> 条评论</span></div>
        <?php else: ?>
            <div>暂时还没有人评价哦</div><?php endif; ?>
    </div>
</div>
<div class="CommentText">
    <ul class="clearfix">
    </ul>
    <div class="discuss_Paging">
        <?php if($commentList3): if(is_array($commentList3)): $i = 0; $__LIST__ = $commentList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="commentOne">
                    <div class="comment-lt">
                        <div class="comment-mem">
                            <p><img src="/Public/Home/images/people.png"/>用户：<span><?php echo ($list["username"]); ?></span></p>
                            <p>评价级别：
                                <?php if(($list["level"]) == "1"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                                <?php if(($list["level"]) == "2"): ?><img src="/Public/Home/images/star2.png"/><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                                <?php if(($list["level"]) == "3"): ?><img src="/Public/Home/images/star2.png"/><?php endif; ?>
                            </p>
                            <p>评价时间：<?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?></p>
                        </div>
                    </div>
                    <div class="comment-rt1">
                        <p>评价内容：<span><?php echo ($list["text"]); ?></span></p>
                    </div>
                    <?php if(empty($list["text1"])): else: ?>
                        <div class="comment-rt2">
                            <p>商家回复：<span><?php echo ($list['text1']); ?></span></p>
                            <p>回复时间：<span><?php echo (date('Y-m-d H:i:s',$list['addtime1'])); ?></span></p>
                        </div><?php endif; ?>
                </div>
                <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="discuss" style=""><span class="f_l f6">共 <b><?php echo ($count3); ?></b> 条评论</span></div>
        <?php else: ?>
            <div>暂时还没有人评价哦</div><?php endif; ?>
    </div>
</div>
</div>

</div>
    <script type="text/javascript">
        $('.CommentTab ul').find('li').click(function(){
            $('.CommentTab ul').find('li').removeClass('active');
            $('.CommentText').css({display:'none'});
            $(this).addClass('active');
            $('.CommentText').eq($(this).index()).css({display:'block'});
        });
    </script>
    </div>
      </div>
      </div>
	 </div>	  
	</div>
   </div>
  </div>
</div>
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
<!--右侧菜单栏购物车样式-->
<script type="text/javascript">
    $(function(){
        getMyCart1=function(){
            $.post("<?php echo U('Cart/getMyCart');?>",'',function(res){
                if(res.status==1){
                    var str='';
                    var num=0;
                    var price=0;
                    str+="<div class='mycart' style='font-size: 15px;color: #008800;height: 29px;'><b>我的购物车</b></div><ul class='p_s_list' style='overflow: auto;max-height: 272px;margin-bottom: 40px;'>";
                    for(var i in res.info){
                        num+=parseInt(res['info'][i]['buynum']);
                        price+=(parseInt(res['info'][i]['buynum'])*parseInt(res['info'][i]['price']));
                        str+="<li class='goodsList' style='height: 60px;'><div class='img' style='float: left;margin-left: 6px;'><img style='width:55px;height:55px' src='/Uploads/goodsPic/100/100_"+res['info'][i]['pic']+"'></div>";
                        str+="<div class='content' style='float: left;width: 120px;height: 60px;'><p class='goodsNames' style='float: left;margin-left: 6px;color: lightslategray;height: 22px'>产品名称：</p><p class='goodsName' style='float: left;margin-left: 9px;margin-top: 5px;height: 22px'>";
                        str+="<a href='<?php echo U('Home/Detail/detail');?>?id="+res['info'][i]['id']+"' title="+res['info'][i]['goodsname']+">";
                        str+=res['info'][i]['goodsname'].substring(0,9);
                        str+=" </a></p></div>";
                        str+="<div class='Operations' style='float: right;height: 60px;'> <p class='Price' style='color: lightslategray;height: 22px'>￥<span class='singlePrice'>";
                        str+=res['info'][i]['price'];
                        str+="</span>   x   <span class='buyNums1'>";
                        str+=res['info'][i]['buynum'];
                        str+="</span><p><a class='del1' onclick='delCart("+res['info'][i]['id']+");' style='cursor: pointer'>移除</a></p></div> </li><hr/>";
                    }
                    str+="<ul/>";
                    str+="<div class='Shopping_style' style='position: absolute;width: 280px;height: 34px;line-height: 34px;'><div class='p-total' style='float: left;margin-left: 5px'>共  <b>"+num+"</b> 件商品　共计￥<b class='tPrice' id='totalPrice2' style='font-size: 16px; color: #ff5555;'>"+price+"</b></div>";
                    str+="<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods1' class='Shopping' style='height:22px;line-height:22px;font-size:10px;margin-top:10px;margin-right:10px;float:right;background-color:#008800;color:#fff0f0;border-radius:2px'>去购物车结算</a></div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(num);
                }else{
                    var str='';
                    str+="<div class='message' style='height: 83px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(0);
                }
            })
        }
        getMyCart1();
    });
</script>
<div class="fixedBox">
    <ul class="fixedBoxList">
        <?php if(isset($_SESSION['ybc_id'])): ?><li class="fixeBoxLi user"><a href="<?php echo U('UserCenter/usercenter');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li>
            <?php else: ?>
            <li class="fixeBoxLi user"><a href="<?php echo U('Login/login');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li><?php endif; ?>

        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart" id="cartBox-num">0</p>
            <a href="<?php echo U('Cart/cart');?>"><span class="fixeBoxSpan"></span> <strong>购物车</strong></a>
            <div class="cartBox" id="cartGoods">
                <span class="mycart"><b>我的购物车</b></span>
                <div class="message">购物车内暂无商品，赶紧选购吧</div>
            </div>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服1</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=781075774&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:781075774:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服2</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=872233743&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:872233743:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
            </div>
        </li>

        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartbox">
            <span class="fixeBoxSpan"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="QR_code">
                    <p><img src="/Uploads/public/erweima.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <p>微信扫一扫，关注我们</p>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi Home" id="collectLi">
            <a href="<?php echo U('UserCenter/myCollect');?>"> <span class="fixeBoxSpan"></span> <strong>收藏</strong></a>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $('#toCart').click(function(){
            $.post("<?php echo U('Detail/toCart');?>",$('#ECS_FORMBUY').serialize(),function(res){
                if(res.status==1){
                    getMyCart();
                    getMyCart1();
                    refreshCart();
                    layer.confirm('成功加入购物车',{icon:1,title:'提示',area:['290px','190px'],btn:['去购物车结算','继续浏览'],closeBtn: 0},
                        function(){
                            location.href="<?php echo U('Cart/cart');?>";
                        }
                    );
                }else{
                    layer.msg('加入失败，请重新添加',{time:2000,icon:5});
                }
            },'json')
        })
    })

    function jian(){
        var buynum=document.getElementById('buy-num').value;
        if(buynum>1){
            document.getElementById('buy-num').value=parseInt(buynum)-1;
        }
    }
    function jia(){
        var buynum=document.getElementById('buy-num').value;
        if(buynum<<?php echo ($goodsInfo[0]['num']); ?> && buynum<129){
            document.getElementById('buy-num').value=parseInt(buynum)+1;
        }
    }
    document.getElementById('buy-num').onkeyup=function(){
        if(this.value<1){
            this.value=1;
        }
        if(this.value>129){
            this.value=129;
        }
        if(this.value><?php echo ($goodsInfo[0]['num']); ?>){
            this.value=<?php echo ($goodsInfo[0]['num']); ?>;
        }
        if(isNaN(this.value)){
            this.value=1;
        }
    }

    //<![CDATA[
    var cmt_empty_username = "请输入您的用户名称";
    var cmt_empty_email = "请输入您的电子邮件地址";
    var cmt_error_email = "电子邮件地址格式不正确";
    var cmt_empty_content = "您没有输入评论的内容";
    var captcha_not_null = "验证码不能为空!";
    var cmt_invalid_comments = "无效的评论内容!";

    /**
     * 提交评论信息
     */
    function submitComment(frm)
    {
        var cmt = new Object;

        //cmt.username        = frm.elements['username'].value;
        cmt.email           = frm.elements['email'].value;
        cmt.content         = frm.elements['content'].value;
        cmt.type            = frm.elements['cmt_type'].value;
        cmt.id              = frm.elements['id'].value;
        cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
        cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
        cmt.rank            = frm.elements['rank'].value;

        /*  for (i = 0; i < frm.elements['comment_rank'].length; i++)
         {
         if (frm.elements['comment_rank'][i].checked)
         {
         cmt.rank = frm.elements['comment_rank'][i].value;
         }
         }*/

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

        if (cmt.email.length > 0)
        {
            if (!(Utils.isEmail(cmt.email)))
            {
                alert(cmt_error_email);
                return false;
            }
        }
        else
        {
            alert(cmt_empty_email);
            return false;
        }

        if (cmt.content.length == 0)
        {
            alert(cmt_empty_content);
            return false;
        }

        if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
        {
            alert(captcha_not_null);
            return false;
        }

        Ajax.call('comment.php', 'cmt=' + cmt.toJSONString(), commentResponse, 'POST', 'JSON');
        frm.elements['content'].value = '';
        return false;
    }

    /**
     * 处理提交评论的反馈信息
     */
    function commentResponse(result)
    {
        if (result.message)
        {
            alert(result.message);
        }

        if (result.error == 0)
        {
            var layer = document.getElementById('ECS_COMMENT');

            if (layer)
            {
                layer.innerHTML = result.content;
            }
        }
    }

    //]]>
</script>
</html>