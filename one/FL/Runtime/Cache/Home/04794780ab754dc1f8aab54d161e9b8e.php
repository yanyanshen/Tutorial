<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>丰林食品-首页</title>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
<script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/Public/Home/js/zhonglin.js"></script>
</head>
<body>
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
            	<li><a href="<?php echo u('Home/User/index',array('url'=>'Home_User_index'));?>">我 (个人中心)</a></li>
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
            <h1><a href="#" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
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
                        <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" />
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
    
    <!--nav 开始-->
    <div class="nav w1200">
    	<a href="JavaScript:;" class="sp-kj" kj="">
        	商品分类快捷
        </a>
        <div class="kj-show">
        </div>
       <div class="kj-show2" kj-sh="">
            <?php if(is_array($firstClassList)): $i = 0; $__LIST__ = $firstClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="kj-info1" mg="shiping">
                    <dl class="kj-dl1">
                        <dt>
                            <a href="<?php echo u('Search/index',array('class_cid'=>$val[class_cid],'bigclass'=>1));?>"><?php echo ($val["class_name"]); ?></a>
                        </dt>
                        <?php if(is_array($secondClassList)): $k = 0; $__LIST__ = $secondClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($k % 2 );++$k; if($val2[class_pid] == $val[class_cid]): ?><dd>
                                    <a href="<?php echo u('Search/index',array('prods'=>str_replace('/','_',$val2[class_name])));?>"><?php echo ($val2["class_name"]); ?></a>
                                </dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <div class="kj-if-show" mg2="muying">
                        <?php if(is_array($secondClassList1)): $k = 0; $__LIST__ = $secondClassList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k % 2 );++$k; if($val3[class_pid] == $val[class_cid]): ?><dl>
                                <dd>
                                    <a href="<?php echo u('Search/index',array('prods'=>$val3[class_name]));?>"><?php echo ($val3["class_name"]); ?></a>
                                </dd>
                            </dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <ul>
        	<?php if(is_array($firstClassList)): $i = 0; $__LIST__ = $firstClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('class_cid'=>$val[class_cid],'bigclass'=>1));?>"><?php echo ($val["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    
    <!--banner 开始-->
    <div class="banner-box">
    	<div class="banner w1200">
        	<ul>
            	<!--<li><a href="JavaScript:;"><img src="/Public/Home/images/taiwan2.png" /></a></li>
                <li><a href="JavaScript:;"><img src="/Public/Home/images/rouganroupu2.png" /></a></li>
                <li><a href="JavaScript:;"><img src="/Public/Home/images/jushihui2.png" /></a></li>
                <li><a href="JavaScript:;"><img src="/Public/Home/images/enshi2.png" /></a></li>
                <li><a href="JavaScript:;"><img src="/Public/Home/images/dove2.png" /></a></li>
                <li><a href="JavaScript:;"><img src="/Public/Home/images/taiwan2.png" /></a></li>-->
                <?php if(is_array($adBanner)): $i = 0; $__LIST__ = $adBanner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adB): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Detail/index',array('prod_id'=>$adB[ad_url]));?>"><img src="/Uploads/Advertise/<?php echo ($adB["ad_pic"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="<?php echo u('Home/Detail/index',array('prod_id'=>$firstBannerUrl));?>"><img src="/Uploads/Advertise/<?php echo ($firstBannerPic); ?>" /></a></li>
                <div style="clear:both;"></div>
            </ul>
            <a href="JavaScript:;" class="bnr bnr-left"><</a>
            <a href="JavaScript:;" class="bnr bnr-right">></a>
        </div>
    </div>
    <div class="hot-recommend w1200">
    	<h3>美食集汇</h3>
        <ul class="">
        	<?php if(is_array($adFloor)): $i = 0; $__LIST__ = $adFloor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adF): $mod = ($i % 2 );++$i;?><li class="ys1">
                    <a href="<?php echo u('Home/Detail/index',array('prod_id'=>$adF[ad_url]));?>"><img src="/Uploads/Advertise/<?php echo ($adF["ad_pic"]); ?>" /></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>

    <!--购物车-->
    <div class="J-global-toolbar">
        <div class="toolbar-wrap J-wrap">
            <div class="toolbar">
                <div class="toolbar-panels J-panel">
                    <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
                        <h3 class="tbar-panel-header J-panel-header">
                            <a href="" class="title"><i></i><em class="title">购物车</em></a>
                            <span class="close-panel J-close"></span>
                        </h3>

                        <?php if(is_array($cart)): $i = 0; $__LIST__ = array_slice($cart,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tbar-cart-item" >
                                <div class="jtc-item-goods">
                                    <span class="p-img"><a href="#" target="_blank"><img src="/Uploads/Prod/<?php echo ($vo[0]["prod_pic"]); ?>" alt="" height="50" width="50" /></a></span>
                                    <div class="p-name">
                                        <a href="#"><?php echo ($vo[0]["prod_name"]); ?></a>
                                    </div>
                                    <div class="p-price"><strong>¥<?php echo ($vo[0]["prod_price"]); ?></strong>×<?php echo ($vo[0]["num"]); ?><p  class="mid-je f-r">¥ <span class="prices"><?php echo ($vo[0][prod_price]*$vo[0][num]); ?></span></p></div>

                                    <a href="<?php echo u('');?>" class="p-del J-del">删除</a>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        <div class="tbar-panel-footer J-panel-footer">
                            <div class="tbar-checkout">
                                <div class="jtc-number"> <strong class="J-count"></strong><?php echo ($count); ?>件商品 </div>
                                <div class="jtc-number"> <strong class="J-count">总价</strong><span id="pric"></span></div>
                                <a class="jtc-btn J-btn" href="<?php echo u('User/cart');?>" target="_blank">去购物车结算</a>
                            </div>
                        </div>
                    </div>
                    <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
                        <h3 class="tbar-panel-header J-panel-header">
                            <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
                            <span class="close-panel J-close"></span>
                        </h3>
                        <div class="tbar-panel-footer J-panel-footer">

                            <?php if(is_array($zj)): $i = 0; $__LIST__ = array_slice($zj,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tbar-cart-item" >
                                    <div class="jtc-item-goods">
                                        <span class="p-img"><a href="#" target="_blank"><img src="/Uploads/Prod/<?php echo ($vo["prod_pic"]); ?>" alt="" height="50" width="50" /></a></span>
                                        <div class="p-name">
                                            <a href="#"><?php echo ($vo["prod_name"]); ?></a>
                                        </div>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div>
                </div>
                <div class="toolbar-header"></div>

                <div class="toolbar-tabs J-tab">
                    <div class="toolbar-tab tbar-tab-cart">
                        <i class="tab-ico" id="tabbbb"></i>
                        <span id="gwc"></span>
                        <em class="tab-text">购物车</em>
                        <span class="tab-sub J-count "><?php echo ($count); ?></span>
                    </div>
                    <div class=" toolbar-tab tbar-tab-history ">
                        <i class="tab-ico"></i>
                        <em class="tab-text">我的足迹</em>
                        <span class="tab-sub J-count "><?php echo ($zjss); ?></span>
                    </div>
                </div>

                <div class="toolbar-mini"></div>

            </div>

            <div id="J-toolbar-load-hook"></div>

        </div>
    </div>




    <!--1 在线商城-->
    <div class="mall w1200 mt20">
    	<div class="title1">
        	<h3><span>1F </span>进口食品</h3>
            <ul>
            	<?php if(is_array($floorClassList1)): $i = 0; $__LIST__ = $floorClassList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fval1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('prods'=>$fval1[class_name]));?>"><?php echo ($fval1["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
        <div class="sa-con">
             <ul class="sa-con-l f-l">
              <?php if(is_array($prodList1)): $i = 0; $__LIST__ = $prodList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><li class="li-ys">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val1[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/350_<?php echo ($val1['prod_pic']); ?>" width="230px" height="230px"/></a>
                        <div>
                            <h3><?php echo mb_substr($val1[prod_name],0,18,"utf-8");?></h3>
                            <h3 class="sp1">¥<?php echo ($val1["prod_sale_price"]); ?></h3>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <ul class="sa-con-r f-l">
                <?php if(is_array($prodList1_1)): $i = 0; $__LIST__ = $prodList1_1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1_1): $mod = ($i % 2 );++$i;?><li class="">
                        <h3><?php echo mb_substr($val1_1[prod_name],0,18,"utf-8");?></h3>
                        <h3 class="sp1">¥<?php echo ($val1_1["prod_sale_price"]); ?></h3>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val1_1[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/140_<?php echo ($val1_1[prod_pic]); ?>" width="100px" height="100px" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--广告栏 二-->
    <ul class="advertisement2">
        <?php if(is_array($firstFloorBrands)): $i = 0; $__LIST__ = $firstFloorBrands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bval1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('brand_bid'=>$Bval1[brand_bid],'brandsname'=>$Bval1['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($Bval1[brand_pic],1);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <li><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <li><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <div style="clear:both;"></div>
    </ul>
    
    <!--2 餐饮娱乐-->
    <div class="dining w1200">
    	<div class="title1">
        	<h3><span style="color:#FDA30C;">2F </span>休闲零食</h3>
            <ul>
            	<?php if(is_array($floorClassList2)): $i = 0; $__LIST__ = $floorClassList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fval2): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('prods'=>$fval2[class_name]));?>"><?php echo ($fval2["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
        <div class="sa-con">
            <ul class="sa-con-l f-l">
                <?php if(is_array($prodList2)): $i = 0; $__LIST__ = $prodList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><li class="li-ys">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val2[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/350_<?php echo ($val2[prod_pic]); ?>" width="230px" height="230px"/></a>
                        <div>
                            <h3><?php echo mb_substr($val2[prod_name],0,18,"utf-8");?></h3>
                            <h3 class="sp1">¥<?php echo ($val2["prod_sale_price"]); ?></h3>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <ul class="sa-con-r f-l">
                <?php if(is_array($prodList2_2)): $i = 0; $__LIST__ = $prodList2_2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2_2): $mod = ($i % 2 );++$i;?><li class="">
                        <h3><?php echo mb_substr($val2_2[prod_name],0,18,"utf-8");?></h3>
                        <h3 class="sp1">¥<?php echo ($val2_2["prod_sale_price"]); ?></h3>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val2_2[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/140_<?php echo ($val2_2[prod_pic]); ?>" width="100px" height="100px" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
     <!--广告栏 二-->
    <ul class="advertisement2">
        <?php if(is_array($secondFloorBrands)): $i = 0; $__LIST__ = $secondFloorBrands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bval2): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('brand_bid'=>$Bval2[brand_bid],'brandsname'=>$Bval2['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($Bval2[brand_pic],1);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <div style="clear:both;"></div>
    </ul>
    
    <!--3 家政服务-->
    <div class="service w1200">
    	<div class="title1">
        	<h3><span style="color:#6995D8;">3F </span>茶水冲调</h3>
            <ul>
            	<?php if(is_array($floorClassList3)): $i = 0; $__LIST__ = $floorClassList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fval3): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('prods'=>$fval3[class_name]));?>"><?php echo ($fval3["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
         <div class="sa-con">
            <ul class="sa-con-l f-l">
                <?php if(is_array($prodList3)): $i = 0; $__LIST__ = $prodList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($i % 2 );++$i;?><li class="li-ys">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val3[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/350_<?php echo ($val3[prod_pic]); ?>" width="230px" height="230px"/></a>
                        <div>
                            <h3><?php echo mb_substr($val3[prod_name],0,16,"utf-8");?></h3>
                            <h3 class="sp1">¥<?php echo ($val3["prod_sale_price"]); ?></h3>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <ul class="sa-con-r f-l">
                <?php if(is_array($prodList3_3)): $i = 0; $__LIST__ = $prodList3_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3_3): $mod = ($i % 2 );++$i;?><li class="">
                        <h3><?php echo mb_substr($val3_3[prod_name],0,16,"utf-8");?></h3>
                        <h3 class="sp1">¥<?php echo ($val3_3["prod_sale_price"]); ?></h3>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val3_3[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/140_<?php echo ($val3_3[prod_pic]); ?>" width="100px" height="100px" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
   <!--广告栏-->
    <ul class="advertisement2">
        <?php if(is_array($thirdFloorBrands)): $i = 0; $__LIST__ = $thirdFloorBrands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bval3): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('brand_bid'=>$Bval3[brand_bid],'brandsname'=>$Bval3['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($Bval3[brand_pic],1);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <div style="clear:both;"></div>
    </ul>
    
    <!--4 美容美发-->
    <div class="salon w1200 mt20">
    	<div class="title1">
        	<h3><span style="color:#FF6B7F;">4F </span>坚果蜜饯</h3>
            <ul>
            	<?php if(is_array($floorClassList4)): $i = 0; $__LIST__ = $floorClassList4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fval4): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('prods'=>$fval4[class_name]));?>"><?php echo ($fval4["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
        <div class="sa-con">
            <ul class="sa-con-l f-l">
                <?php if(is_array($prodList4)): $i = 0; $__LIST__ = $prodList4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($i % 2 );++$i;?><li class="li-ys">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val4[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/350_<?php echo ($val4[prod_pic]); ?>" width="230px" height="230px"/></a>
                        <div>
                            <h3><?php echo mb_substr($val4[prod_name],0,16,"utf-8");?></h3>
                            <h3 class="sp1">¥<?php echo ($val4["prod_sale_price"]); ?></h3>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <ul class="sa-con-r f-l">
                <?php if(is_array($prodList4_4)): $i = 0; $__LIST__ = $prodList4_4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4_4): $mod = ($i % 2 );++$i;?><li class="">
                        <h3><?php echo mb_substr($val4_4[prod_name],0,16,"utf-8");?></h3>
                        <h3 class="sp1">¥<?php echo ($val4_4["prod_sale_price"]); ?></h3>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val4_4[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/140_<?php echo ($val4_4[prod_pic]); ?>" width="100px" height="100px" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--广告栏 二-->
    <ul class="advertisement2">
        <?php if(is_array($forthFloorBrands)): $i = 0; $__LIST__ = $forthFloorBrands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bval4): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('brand_bid'=>$Bval4[brand_bid],'brandsname'=>$Bval4['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($Bval4[brand_pic],1);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <div style="clear:both;"></div>
    </ul>
    
    <!--5 教育培训-->
    <div class="education w1200">
    	<div class="title1">
        	<h3><span style="color:#FF6B7F;">5F </span>地方特产</h3>
            <ul>
            	<?php if(is_array($floorClassList5)): $i = 0; $__LIST__ = $floorClassList5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fval5): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('prods'=>$fval5[class_name]));?>"><?php echo ($fval5["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
        <div class="sa-con">
            <ul class="sa-con-l f-l">
                <?php if(is_array($prodList5)): $i = 0; $__LIST__ = $prodList5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val5): $mod = ($i % 2 );++$i;?><li class="li-ys">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val5[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/350_<?php echo ($val5[prod_pic]); ?>" width="230px" height="230px"/></a>
                        <div>
                            <h3><?php echo mb_substr($val5[prod_name],0,16,"utf-8");?></h3>
                            <h3 class="sp1">¥<?php echo ($val5["prod_sale_price"]); ?></h3>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <ul class="sa-con-r f-l">
                <?php if(is_array($prodList5_5)): $i = 0; $__LIST__ = $prodList5_5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val5_5): $mod = ($i % 2 );++$i;?><li class="">
                        <h3><?php echo mb_substr($val5_5[prod_name],0,16,"utf-8");?></h3>
                        <h3 class="sp1">¥<?php echo ($val5_5["prod_sale_price"]); ?></h3>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$val5_5[prod_id]));?>" class="li-tu"><img src="/Uploads/Prod/140_<?php echo ($val5_5[prod_pic]); ?>" width="100px" height="100px" /></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--广告栏-->
    <ul class="advertisement2">
        <?php if(is_array($fifthFloorBrands)): $i = 0; $__LIST__ = $fifthFloorBrands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Bval5): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('brand_bid'=>$Bval5[brand_bid],'brandsname'=>$Bval5['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($Bval5[brand_pic],1);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li style="border-right:none;"><a href="#"><img src="/Public/Home/images/hover-br-li-tu2.gif" /></a></li>
        <div style="clear:both;"></div>
    </ul>

    
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
<script type="text/javascript" >
    function out(){
        $.post("<?php echo u('Custom/logout');?>",null,function(res){
            if(res.status=='ok'){
                location.reload();
            }
        })
    }

    function gettotalprice(){
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<prices.length;i++){

            totalprice+=parseInt(prices[i].innerHTML);

        };

        document.getElementById('pric').innerHTML='￥'+totalprice;
    }
    gettotalprice();
</script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>
</html>