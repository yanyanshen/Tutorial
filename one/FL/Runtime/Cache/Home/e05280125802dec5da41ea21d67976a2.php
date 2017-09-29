<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>搜索列表页(有品牌)</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/zhonglin.js"></script>
   <link rel="stylesheet" type="text/css" href="/Public/Home/css/lrtk.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/magiczoomplus.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/shopping-mall-index.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/detail.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/gwc.css" />
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <style>
        #loginForm li{width:360px;height:36px; font-size:16px; margin-top:40px;padding-left:20px;}
        #loginForm li input{width:270px;height:36px;margin-left:10px; padding-left:5px;}
        #loginForm li:nth-child(3) input{width:125px;}
        #loginForm li:nth-child(3) img{position:relative;left:48px;}
        #loginForm li:last-child input{margin-left:38px;margin-top:10px;;background-color:#FF5160;border:0;color:#fff;font-size:18px;height:36px;line-height:36px;}
        #custom_username-error,#custom_pwd-error,#yzm-error{padding-left:56px;}
    </style>
</head>

<body>

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
        <h1><a href="<?php echo U('Home/Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
    </div>
    <div class="dianji f-r">

    </div>
    <div class="search f-r">

        <ul class="sp">
          <br/>

            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <form action="<?php echo U('Search/index');?>" method="get" id="classform">
                <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" value="<?php echo ($dd); ?>" />
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

<!--切换城市-->
<div class="switch-city w1200">

</div>

<!--nav 开始-->
<div style="border-bottom:2px solid #F09E0B;">
    <div class="nav w1200">
        <a href="JavaScript:;" class="sp-kj" kj="">
            商品分类快捷
        </a>
        <ul>
            <?php if(is_array($bigClass)): $i = 0; $__LIST__ = $bigClass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$leiming): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Search/index',array('prods'=>$dd,'class_cid'=>$leiming['class_cid'],'bigclass'=>1));?>"><?php echo ($leiming['class_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!-- buycar -->
<div class="J-global-toolbar">
    <div class="toolbar-wrap J-wrap">
        <div class="toolbar">
            <div class="toolbar-panels J-panel">
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out" id="item-content">
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
                            <div class="jtc-number"> <strong class="J-count">商品种类数量</strong><?php echo ($count); ?> </div>
                            <div class="jtc-number"> <strong class="J-count">商品总价</strong><span id="pric">￥<?php echo ($totalPrice); ?></span></div>
                            <a class="jtc-btn J-btn" href="<?php echo u('User/cart');?>" target="_blank" >去购物车结算</a>
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
                    <span class="tab-sub J-count " id="prodCount"><?php echo ($count); ?></span>
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
<!-- end buycar -->
<!--内容开始-->
<!--购物车-->

<!--筛选结果-->
<div class="screening-results w1200">

    </div>
</div>
<!--品牌-->
<div class="hover-brand">
    <p class="ho-pingpai f-l">品牌</p>
    <ul class="f-l">
        <?php if(is_array($brandPic)): $i = 0; $__LIST__ = $brandPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bpic): $mod = ($i % 2 );++$i;?><li style="width:152px; height:60px; margin:auto;">
            <a href="<?php echo U('Search/index',array('prods'=>$dd,'brand_bid'=>$bpic['brand_bid'],'brandsname'=>$bpic['brand_name'],'pinpai'=>1));?>"><img src="<?php echo substr($bpic['brand_pic'],1);?>" alt="<?php echo ($bpic['brand_name']); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <div style="clear:both;"></div>
    </ul>
    <div class="duoxuan f-r">
        <button ppgd="">多选</button>
        <a href="JavaScript:;" ppgd="">更多 ∨</a>
    </div>
    <div style="clear:both;"></div>
</div>

<!--品牌 更多-->
<div class="re-brand">
    <div class="brand-top">
        <div class="br-t">
            <p class="pingpai f-l">品牌</p>


        </div>
        <div class="br-b">
            <ul>
                <form action="<?php echo U('Search/index',array('brand_bid'=>$bpic['brand_bid']));?>" method="get" id="brandform">
                    <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brandname): $mod = ($i % 2 );++$i;?><li>
                            <input type="checkbox" class="hb1" name="hobby[]" value="<?php echo ($brandname['brand_bid']); ?>" <?php echo ($brandname['check']?'checked':''); ?>></input>
                            <span><?php echo mb_substr($brandname['brand_name'],0,4,'utf8');?></span>
                    <input type="hidden" name="hb" value="<?php echo ($Hb); ?>"/>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
         </form>
                <div style="clear:both;"></div>
            </ul>
        </div>
    </div>
    <div class="brand-bt">
        <button id="subbrand">确定</button>
        <button class="quxiao" quxiao1="">取消</button>
    </div>
</div>

<!--品牌热销-->

<div class="brand-sales">
    <div class="hover-brand">
    <dl>
        <dt>产品分类</dt>
        <dd>

            <?php if(is_array($bigClass)): $i = 0; $__LIST__ = $bigClass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$leiming): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/index',array('prods'=>$dd,'class_cid'=>$leiming['class_cid'],'bigclass'=>1));?>"><?php echo ($leiming['class_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

        </dd>

        <div style="clear:both;">

    </dl>

</div>
    <dl style="border-bottom:none;">
        <dt>商品分类</dt>
        <dd>
            <?php if(is_array($smallClass)): $i = 0; $__LIST__ = $smallClass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prodclass): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/index',array('class_cid'=>$bcn,'prods'=>$dd,'class2_cid'=>$prodclass['class_cid'],'class_path'=>$prodclass['class_path'],'smallclass'=>1));?>"><?php echo ($prodclass['class_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>

        <div style="clear:both;"></div>
    </dl>
</div>

<!--内容↓↑-->
<div class="shop-page-con w1200">
    <div class="shop-pg-left f-l" style="width:215px">
        <div class="shop-left-buttom" style="margin-top:0;">
            <div class="sp-tit1">
                <h3>商品推荐</h3>
            </div>
            <ul class="shop-left-ul">
                <?php if(is_array($tuijianProd)): $i = 0; $__LIST__ = array_slice($tuijianProd,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tuijian): $mod = ($i % 2 );++$i;?><li>
                    <div class="li-top">
                        <div class="item">
                            <a href="<?php echo U('Detail/index',array('prod_id'=>$tuijian['prod_id']));?>" class="li-top-tu"><img src="/Uploads/Prod/140_<?php echo ($tuijian['prod_pic']); ?>" /></a>
                        </div>
                        <p class="jiage"><span class="sp1">￥<?php echo ($tuijian['prod_sale_price']); ?></span><span class="sp2">￥<?php echo ($tuijian['prod_price']); ?></span></p>
                    </div>
                    <p class="miaoshu"><a href="<?php echo U('Detail/index',array('prod_id'=>$tuijian['prod_id']));?>" class="li-top-tu"><?php echo mb_substr($tuijian['prod_name'],0,24,'utf8');?></a></p>
                    <div class="li-md">

                        <div class="md-l f-l" style="margin-left:20px;">
                            <input type="text" class="md-l-l f-l" ap="" name="num_<?php echo ($prodsdata[0]["prod_id"]); ?>" value="1">
                            <input type="hidden" value="<?php echo ($tuijian['prod_id']); ?>" name="chk[]"/>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs " at="" >∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="" >∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>

                        <div class="md-r f-l">

                            <button class="md-l-btn2 add-to-cart" style="margin-left:12px;width:100px;">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>


                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="shop-pg-right f-r">
        <div class="shop-right-cmp" style="margin-top:0;">
            <ul class="shop-cmp-l f-l">

                <li class="current">
                    <a href="<?php echo U('Search/index',array('hobbyname'=>$hobbyname,'prods'=>$dd,'brand_bid'=>$brandbid,'zonghe'=>1,'class_cid'=>$classcid,'class2_cid'=>$class2cid));?>">综合 ↓</a></li>

                <li>  <a href="<?php echo U('Search/index',array('hobbyname'=>$hobbyname,'prods'=>$dd,'brand_bid'=>$brandbid,'xiaoliang'=>1,'class_cid'=>$classcid,'class2_cid'=>$class2cid));?>">销量 ↓</a></li>
                <li><a href="<?php echo U('Search/index',array('hobbyname'=>$hobbyname,'prods'=>$dd,'brand_bid'=>$brandbid,'xinpin'=>1,'class_cid'=>$classcid,'class2_cid'=>$class2cid));?>">新品 ↓</a></li>
                <li><a href="#">评价 ↓</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div class="shop-cmp-m f-l">
                <form action="<?php echo U('Search/index',array('hobbyname'=>$hobbyname,'prods'=>$dd,'class_cid'=>$classcid,'prod_bid'=>$brandbid,'brand_bid'=>$brandbid,'class_path'=>$prodclass['class_path'],'class2_cid'=>$class2cid,'form2'=>1));?>" method="get" id="subform">

                <span>价格</span><input type="text" name="small" /><span>-</span><input type="text" name="big"/>
            </div>
            <div class="shop-cmp-r f-l">
                <ul class="f-l">
                    <li>
                        <input type="checkbox" name="mail" value="1"></input>
                        <span>包邮</span>
                    </li>
                    <li>
                        <input type="checkbox" name="area" value="1"></input>
                        <span>进口</span>
                    </li>
                    <li>
                        <input type="checkbox" name="offt" value="1"></input>
                        <span>仅显示有货</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value="1"></input>
                        <span>满赠</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value=""></input>
                        <span>满减</span>
                    </li>
                    <div style="clear:both;"></div>
                </ul>
                </form>
                <button id="sub1">确定</button>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="shop-right-con">
            <ul class="shop-ul-tu shop-ul-tu1">
                <!--综合-->
                <?php echo ($tishi); ?>
                <?php if(is_array($zongheProd)): $i = 0; $__LIST__ = $zongheProd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zonghe): $mod = ($i % 2 );++$i;?><li style="width:237px">
                    <div class="li-top">
                        <div class="item" style="position: relative">
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$zonghe['prod_id']));?>" class="li-top-tu"><img src="/Uploads/Prod/140_<?php echo ($zonghe['prod_pic']); ?>" /></a>
                         </div>
                        <p class="jiage"><span class="sp1">￥<?php echo ($zonghe['prod_sale_price']); ?></span><span class="sp2">￥<?php echo ($zonghe['prod_price']); ?></span></p>
                    </div>
                    <p class="miaoshu"><a href="<?php echo U('Detail/index',array('prod_id'=>$zonghe['prod_id']));?>" class="li-top-tu"><?php echo mb_substr($zonghe['prod_name'],0,14,'utf8');?></a></p>

                    <div class="li-md">

                            <div class="md-l f-l" style="margin-left:20px;">
                                <input type="text" class="md-l-l f-l" ap="" name="num_<?php echo ($prodsdata[0]["prod_id"]); ?>" value="1">
                                <input type="hidden" value="<?php echo ($zonghe['prod_id']); ?>" name="chk[]"/>
                                <div class="md-l-r f-l">
                                    <a href="JavaScript:;" class="md-xs " at="" >∧</a>
                                    <a href="JavaScript:;" class="md-xx" ab="" >∨</a>
                                </div>
                                <div style="clear:both;"></div>
                            </div>

                        <div class="md-r f-l">

                            <button class="md-l-btn2 add-to-cart" style="margin-left:12px;width:100px;">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>


                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

            <!--分页-->
            <div class="paging">
                <div class="pag-left f-l ">

                    <ul class="pages f-l">
                  <?php echo ($Pages); ?>
                        <div style="clear:both;"></div>
                    </ul>

                    <div style="clear:both;"></div>
                </div>
                <div class="pag-right f-l">
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<input type="hidden" id="prod_id" value="<?php echo ($prodsdata[0]["prod_id"]); ?>" />

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
</html>
<script type="text/javascript" src="/Public/Home/js/gwc.js"></script>
<script>
    $('#sub1').click(function(){
        $('#subform').submit();
    });


</script>
<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
    </script>
 <script>
     $("#subbrand").click(function(){
         $("#brandform").submit();
     })
 </script>


            <script>
        if( $("[name=hb]").val()){

            $(".hover-brand").hide();
            $(".re-brand").show();
        }
            </script>
<script type="text/javascript">
    $("#buynum").keyup(function(){
        var num=this.value;
        if(num>100){
            this.value=100;
        }
        if(num<1){
            this.value=1;
        }
        if(isNaN(num)){
            this.value=1;
        }
    })

    $('.add-to-cart').on('click', function () {


        var num=$(this).parent().siblings("div").find("[type=text]").val();
        var prod_id=$(this).parent().siblings("div").find("[type=hidden]").val();

        var cart = $('#tabbbb');   //目标地点
        /*var imgtodrag = $('.item').find('img').eq(0);  //抓取图片*/
        var imgtodrag = $(this).parent().parent().siblings("div").find(".item");  //抓取图片


        if (imgtodrag) {

            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            }).css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '1000'

            }).appendTo($('body')).animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 75,
                'height': 75
            },1000);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {

                $(this).detach();

                $.post("<?php echo U('index');?>",{'id':prod_id,'num':num},function(res){

                    layer.alert(res.status);
                    $("#prodCount").html(res.count);
                    layer.msg(res.status, {icon: 1});
                })
            });
        }

    });
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

    $(".toolbar-tab").click(function(){
        $.post("<?php echo U('index');?>",{'item':1},function(res){
            $("#item-content").html(res);
        })
    })
</script>
<script type="text/javascript">
    function index(id){
        var id=id;
        var pid=$("input:hidden").val();
        var cid=$(".current-li").index();
        $.get("<?php echo U('index');?>",{"p":id,"pid":pid,"cid":cid},function(res){
            $('[com-det-show=dt2]').html(res);
        })
    }
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