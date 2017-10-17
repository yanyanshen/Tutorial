<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/Public/Home/css/style1.css" />
    <!--[if IE 6]>
    <script src="/Public/Home/js1/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/Public/Home/js1/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/Public/Home/js1/jquery.bxslider_e88acd1b.js"></script>

    <script type="text/javascript" src="/Public/Home/js1/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/menu.js"></script>

	<script type="text/javascript" src="/Public/Home/js1/select.js"></script>

	<script type="text/javascript" src="/Public/Home/js1/lrscroll.js"></script>

    <script type="text/javascript" src="/Public/Home/js1/iban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/fban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/f_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/mban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/bban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/hban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/tban.js"></script>
    
	<script type="text/javascript" src="/Public/Home/js1/lrscroll_1.js"></script>
    
    
<title>淘书网</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                    <div class="s_city_t"></div>
                    <div class="s_city_c">
                        <h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>A</th>
                                <td class="c_h"><span>安徽</span><span>澳门</span></td>
                            </tr>
                            <tr>
                                <th>B</th>
                                <td class="c_h"><span>北京</span></td>
                            </tr>
                            <tr>
                                <th>C</th>
                                <td class="c_h"><span>重庆</span></td>
                            </tr>
                            <tr>
                                <th>F</th>
                                <td class="c_h"><span>福建</span></td>
                            </tr>
                            <tr>
                                <th>G</th>
                                <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                            </tr>
                            <tr>
                                <th>H</th>
                                <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                            </tr>
                            <tr>
                                <th>J</th>
                                <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                            </tr>
                            <tr>
                                <th>L</th>
                                <td class="c_h"><span>辽宁</span></td>
                            </tr>
                            <tr>
                                <th>N</th>
                                <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                            </tr>
                            <tr>
                                <th>Q</th>
                                <td class="c_h"><span>青海</span></td>
                            </tr>
                            <tr>
                                <th>S</th>
                                <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                            </tr>
                            <tr>
                                <th>T</th>
                                <td class="c_h"><span>台湾</span><span>天津</span></td>
                            </tr>
                            <tr>
                                <th>X</th>
                                <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                            </tr>
                            <tr>
                                <th>Y</th>
                                <td class="c_h"><span>云南</span></td>
                            </tr>
                            <tr>
                                <th>Z</th>
                                <td class="c_h"><span>浙江</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
        	<span class="fl">
                <?php if(session('mid')): ?>欢迎您，
                    <a href="<?php echo U('Home/MemberCenter/member_info');?>" style="color:#ff4e00;font-weight: bold">
                        <?=session('mname')?>
                    </a>
                    <?php else: ?>您还没有登录，请先
                    <a href="<?php echo U('Home/Login/login');?>" style="color:#ff4e00;">登录！</a>&nbsp;|&nbsp;
                    <a href="<?php echo U('Home/Login/register');?>" style="color:#ff4e00;">免费注册</a><?php endif; ?>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/MemberCenter/member_info');?>">会员中心</a>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/Login/logout');?>">安全退出</a>&nbsp;|
            </span>
            <span class="fr">&nbsp;<a href="#">手机版&nbsp;<img src="/Public/Home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
    <div class="search">
        <form>

            <input type="text" value="" placeholder="请输入搜索内容（书籍名/作者名）" class="s_ipt" />

            <input type="submit" value="搜索" class="s_btn" />
        </form>

        <a href="">《纨绔》|</a>
        <a href="#">《花醉三千》|</a>
        <a href="#">辰东|</a>
        <a href="#">云霓</a>
        </span>

    </div>
    <div class="i_car">
        <div class="car_t"><a href="<?php echo U('Home/BuyCar/buyCar');?>">购物车[ <span></span> ]</a></div>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="<?php echo U('Home/Login/login');?>" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,1,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>

                        <div class="img"><a href="#"><img src="/Public/Home/images/car1.jpg" width="58" height="58" /></a></div>
                        <div class="name"><a href="#"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End-->
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->
    	<div class="nav">
        	<div class="nav_t">全部图书分类</div>
            <div class="leftNav">
                <ul>
                    <?php if(is_array($cateList)): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <div class="fj">
                                <span class="n_img"><span></span><img src="" /></span>
                                <span class="fl"><?php echo ($vo[catename]); ?></span>
                            </div>
                            <div class="zj" style="top:-<?php echo ($key*40); ?>px">
                                <div class="zj_l">
                                    <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = $vo['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><div class="zj_l_c">
                                            <h2><?php echo ($v1["catename"]); ?></h2>
                                            <?php if(is_array($v1['third'])): $i = 0; $__LIST__ = $v1['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/search');?>"><?php echo ($v2["catename"]); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>

                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="zj_r">
                                    <a href="#"><img src="/Public/Home/images/91.jpg" width="236" height="200" /></a>
                                    <a href="#"><img src="/Public/Home/images/92.jpg" width="236" height="200" /></a>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--End 商品分类详情 End-->
    	<ul class="menu_r">
        	<li><a href="">首页</a></li>
            <li><a href="">特卖场</a></li>
            <li><a href="">最新特价</a></li>
            <li><a href="">特价精选</a></li>
            <li><a href="">淘书会</a></li>
            <li><a href="">排行榜</a></li>
        </ul>

    </div>
</div>
<!--End Menu End-->
<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><img src="/Public/Home/images/ban1.jpg" width="740" height="401" /></li>
                    <li><img src="/Public/Home/images/ban2.jpg" width="740" height="401" /></li>
                    <li><img src="/Public/Home/images/ban3.jpg" width="740" height="401" /></li>
                </ul>
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
            	<li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
            	<li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
            	<li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
            	<li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
            	<li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
            </ul>
            <div class="charge_t">
            	话费充值<div class="ch_t_icon"></div>
            </div>
            <form>
            <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td width="33">号码</td>
                <td><input type="text" value="" class="c_ipt" /></td>
              </tr>
              <tr height="35">
                <td>面值</td>
                <td>
                	<select class="jj" name="city">
                      <option value="0" selected="selected">100元</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                </td>
              </tr>
              <tr height="35">
                <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
    <!--Begin 限时特卖 Begin-->
    <div class="i_t mar_10">
    	<span class="fl">新书速递</span>
    </div>
    <div class="content">
    	<div class="i_sell">
            <div id="imgPlay">
                <ul class="imgs" id="actor">
                    <li><a href="#"><img src="/Public/Home/images/tm_b1.jpg" width="211" height="400" /></a></li>
                </ul>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                    <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                    <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                        <font><span></span></font> &nbsp;
                    </div>
                    <div class="img">
                        <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/Public/Home/images/tel_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/tel_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>
    <!--End 新书速递 End-->
    <div class="content mar_20">
    	<img src="/Public/Home/images/95.jpg" width="1200" height="110" />
    </div>
	<!--Begin 畅销图书 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num" style="color: #000000">1F</span>
    	<span class="fl">畅销图书</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp; &nbsp; <a href="#"></a>&nbsp; &nbsp; &nbsp; <a href="#"></a>&nbsp; &nbsp; &nbsp; <a href="#"></a>&nbsp; &nbsp; &nbsp; <a href="#"></a></span>
    </div>
    <div class="content">
        <div class="i_sell">
            <div id="imgPlay1">
                <ul class="imgs" id="actor1">
                    <li><a href="#"><img src="/Public/Home/images/tm_r.jpg" width="211" height="400" /></a></li>
                </ul>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,6,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">
                            <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/Public/Home/images/83.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/84.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>
    <!--End 畅销图书End-->
    <!--Begin 独家特供 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num" style="color: #000000;">2F</span>
    	<span class="fl">独家特供</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a></span>
    </div>
    <div class="content">
    	<div class="food_left">
        	<div class="food_ban">
            	<div id="imgPlay2">
                    <ul class="imgs" id="actor2">
                        <li><a href="#"><img src="/Public/Home/images/tm_b2.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/tm_b2.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/tm_b2.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_f">上一张</div>
                    <div class="next_f">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#">读万卷书，不如行万里路。</a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,12,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">

                            <img src="/Uploads/<?php echo ($v1['pic']); ?>" />


                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/Public/Home/images/85.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/86.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>
    <!--End 独家特供 End-->
    <!--Begin 中国古典文学 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num" style="color: #000000;">3F</span>
    	<span class="fl">中国古典文学</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a></span>
    </div>
    <div class="content">
    	<div class="make_left">
        	<div class="make_ban">
            	<div id="imgPlay3">
                    <ul class="imgs" id="actor3">
                        <li><a href="#"><img src="/Public/Home/images/39.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/40.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/41.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_m">上一张</div>
                    <div class="next_m">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<br><a href="#">博览世间好书，弘扬中华文明。</a></br>
                    <a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,18,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">
                            <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                            </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/Public/Home/images/87.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/88.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>
    <!--End 中国古典文学 End-->
    <div class="content mar_20">
    	<img src="/Public/Home/images/95.jpg" width="1200" height="110" />
    </div>
    <!--Begin 读者推荐 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">4F</span>
    	<span class="fl">读者推荐</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a></span>
    </div>
    <div class="content">
    	<div class="baby_left">
        	<div class="baby_ban">
            	<div id="imgPlay4">
                    <ul class="imgs" id="actor4">
                        <li><a href="#"><img src="/Public/Home/images/38.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/baby_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/baby_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_b">上一张</div>
                    <div class="next_b">下一张</div>
                </div>
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,24,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">
                            <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/Public/Home/images/89.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/90.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>
    <!--End 读者推荐 End-->
    <!--Begin 军事科技书籍 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">5F</span>
    	<span class="fl">军事 科技书籍</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp; &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a></span>
    </div>
    <div class="content">
    	<div class="home_left">
        	<div class="home_ban">
            	<div id="imgPlay5">
                    <ul class="imgs" id="actor5">
                        <li><a href="#"><img src="/Public/Home/images/35.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/34.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/35.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_h">上一张</div>
                    <div class="next_h">下一张</div>
                </div>
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,30,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">
                            <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="/Public/Home/images/36.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/36.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 军事科技书籍 End-->
    <!--Begin 图书排行榜Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">6F</span>
    	<span class="fl">图书排行榜</span>
        <span class="i_mores fr"><a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp; &nbsp; &nbsp;<a href="#"></a>&nbsp; &nbsp;  &nbsp; &nbsp;<a href="#"></a></span>
    </div>
    <div class="content">
    	<div class="tel_left">
        	<div class="tel_ban">
            	<div id="imgPlay6">
                    <ul class="imgs" id="actor6">
                        <li><a href="#"><img src="/Public/Home/images/tel_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/tel_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/Public/Home/images/tel_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_t">上一张</div>
                    <div class="next_t">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,36,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li>
                        <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a></div>
                        <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                            <font><span></span></font> &nbsp;
                        </div>
                        <div class="img">
                            <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="/Public/Home/images/tel_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/Public/Home/images/tel_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 数码家电 End-->
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
        <span class="fl">猜你喜欢</span>
    </div>
    <div class="like">
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <?php if(is_array($goodsList)): $i = 0; $__LIST__ = array_slice($goodsList,42,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class="featureBox">
                                                <div class="box">
                                                    <div class="imgbg">
                                                        <img src="/Uploads/<?php echo ($v1['pic']); ?>"/>
                                                    </div>
                                                    <div class="name"><a href="<?php echo U('Home/Detail/detail',array('id'=>$v1['id']));?>"><?php echo ($v1['goodsname']); ?></a>
                                                        <h2></h2>
                                                        </a>
                                                    </div>
                                                    <div class="price"><span>￥<?php echo ($v1['price']); ?></span>
                                                        <font><span></span></font> &nbsp;
                                                    </div>
                                                </div>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->
    
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
    <div class="b_btm">
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
            </tr>
        </table>
    </div>
</div>
<div class="b_nav">
    <dl>
        <dt><a href="#">新手上路</a></dt>
        <dd><a href="#">售后流程</a></dd>
        <dd><a href="#">购物流程</a></dd>
        <dd><a href="#">订购方式</a></dd>
        <dd><a href="#">隐私声明</a></dd>
        <dd><a href="#">推荐分享说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">配送与支付</a></dt>
        <dd><a href="#">货到付款区域</a></dd>
        <dd><a href="#">配送支付查询</a></dd>
        <dd><a href="#">支付方式说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">会员中心</a></dt>
        <dd><a href="#">资金管理</a></dd>
        <dd><a href="#">我的收藏</a></dd>
        <dd><a href="#">我的订单</a></dd>
    </dl>
    <dl>
        <dt><a href="#">服务保证</a></dt>
        <dd><a href="#">退换货原则</a></dd>
        <dd><a href="#">售后服务保证</a></dd>
        <dd><a href="#">产品质量保证</a></dd>
    </dl>
    <dl>
        <dt><a href="#">联系我们</a></dt>
        <dd><a href="#">网站故障报告</a></dd>
        <dd><a href="#">购物咨询</a></dd>
        <dd><a href="#">投诉与建议</a></dd>
    </dl>
    <div class="b_tel_bg">
        <a href="#" class="b_sh1">新浪微博</a>
        <a href="#" class="b_sh2">腾讯微博</a>
        <p>
            服务热线：<br />
            <span>400-123-4567</span>
        </p>
    </div>
    <div class="b_er">
        <div class="b_er_c"><img src="/Public/Home/images/er.gif" width="118" height="118" /></div>
        <img src="/Public/Home/images/ss.png" />
    </div>
</div>
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/Public/Home/images/b_1.gif" width="98" height="33" /><img src="/Public/Home/images/b_2.gif" width="98" height="33" /><img src="/Public/Home/images/b_3.gif" width="98" height="33" /><img src="/Public/Home/images/b_4.gif" width="98" height="33" /><img src="/Public/Home/images/b_5.gif" width="98" height="33" /><img src="/Public/Home/images/b_6.gif" width="98" height="33" />
    </div>
</div>

    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>