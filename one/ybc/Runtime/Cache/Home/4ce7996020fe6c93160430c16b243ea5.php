<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Public/Home/css/article.css" rel="stylesheet" tyle="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<title>一杯茶/茶叶百科</title>
</head>

<body style="background-color:white;">
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
<!--顶部样式-->
<div id="top">
  <div class="top">
    <div class="Collection"><em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的订单</a></li> 
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车(<b>0</b>)</a> </li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
	   <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
	    <div class="hd_menu_list">
		   <ul>
		    <li><a href="#">常见问题</a></li>
			<li><a href="#">在线退换货</a></li>
		    <li><a href="#">在线投诉</a></li>
			<li><a href="#">配送范围</a></li>
		   </ul>
		</div>	   
	   </li>
	  </ul>
	</div>
  </div>
</div>
<!--logo和搜索样式-->
<div id="header"  class="header">
  <div class="logo">
  <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
  <div class="phone">
   <em class="icon_img"></em><span style="font-size:30px;font-weight:bold;"><a href="<?php echo U('Article/index');?>">茶叶百科</a></span>
  </div>
  </div>
  <div class="Search">
      <form action="<?php echo U('index');?>" method="get">
    <p><select name="search" id="" style="font-size:14px;color:#000000;width: 80px;height: 40px;background-color: rgb(247,247,247);border: 4px solid rgb(184, 184, 173);margin-left: 10px">

        <?php switch($search): case "title": ?><option value="title" selected>按标题</option>
                <option value="author">按作者</option>
                <option value="teatag">按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "author": ?><option value="title">按标题</option>
                <option value="author" selected>按作者</option>
                <option value="teatag">按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "teatag": ?><option value="title">按标题</option>
                <option value="author">按作者</option>
                <option value="teatag" selected>按标签</option>
                <option value="content">按内容</option><?php break;?>
            <?php case "content": ?><option value="title">按标题</option>
                <option value="author">按作者</option>
                <option value="teatag">按标签</option>
                <option value="content" selected>按内容</option><?php break;?>
            <?php default: ?>
            <option value="title">按标题</option>
            <option value="author">按作者</option>
            <option value="teatag">按标签</option>
            <option value="content">按内容</option><?php endswitch;?>



    </select>
        <input name="keyword" type="text" placeholder="请输入搜索关键字" value="<?php echo ($keyword); ?>"  class="text" /><input name="" type="submit" value=""  class="Search_btn"/></p>
      </form>
</div>
</div>



<!--菜单栏样式-->

<!-- 中间内容部分 开始-->

<div class="content1" style="background-color: white;">


    <!--文章循环内容！-->

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content2">
		<div class="teaimg">
            <a href="<?php echo U('detail');?>?id=<?php echo ($val["id"]); ?>"><img src="/Uploads/teapic/<?php echo (date('Y-m-d',$val["dateline"])); ?>/<?php echo ($val["teapic"]); ?>" alt=""  style="width: 300px;  padding:auto 0;" /></a>
		</div>
		<div class="maincontent1">
			<!-- 这是文章主要内容 -->
			<div class="title">
                <a href="<?php echo U('detail');?>?id=<?php echo ($val["id"]); ?>"><h1><?php echo ($val["title"]); ?></h1></a>
			</div>
			<div class="author1" style="color:#ccc;font-size:14px;padding-top:10px;float:right;"><?php echo (date('Y-m-d H:i:s',$val["dateline"])); ?>&nbsp;&nbsp;&nbsp;作者:<?php echo ($val["author"]); ?></div>
			<div class="descript" style="padding-top:50px">
				<p style="font-size:17px;color: #235a81;">
						<?php echo ($val["descript"]); ?>
				<a href="<?php echo U('detail');?>?id=<?php echo ($val["id"]); ?>" style="font-size:14px;color:#f90;">&nbsp;&nbsp;&nbsp;[详细]</a></p>
			</div>
            <div style="color:#ccc;font-size: 14px;">标签:&nbsp;&nbsp;&nbsp;<?php echo ($val["teatag"]); ?></div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(empty($list)): ?><div style="width: 700px;height: 100px;margin: 0 auto;padding-top: 100px;font-size: 20px;color: #979797">很遗憾，没有找到相关条件的文章......
            <a href="<?php echo U('index');?>" >&nbsp;&nbsp;&nbsp;去看看其他茶叶小知识吧。</a></div><?php endif; ?>






    <!--分页信息-->

    <div class="bottom_page" ><?php echo ($page); ?></div>

</div>

<!-- 中间内容部分 结束-->

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

</body>
</html>