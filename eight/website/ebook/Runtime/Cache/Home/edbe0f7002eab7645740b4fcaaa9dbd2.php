<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>淘书网</title>
    <script src="/Public/Home/js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input, a');
    </script>
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/style1.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/public1.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/detail.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/jquery.jqzoom.css">
    <script type="text/javascript" src="/Public/Home/js1/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery.jqzoom-core.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/jquery.bxslider_e88acd1b.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/menu.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/lrscroll_1.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/n_nav.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/milk_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/paper_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/baby_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/select.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/iban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/fban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/f_ban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/mban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/bban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/hban.js"></script>
    <script type="text/javascript" src="/Public/Home/js1/tban.js"></script>

    <script type="text/javascript" src="/Public/Home/js1/lrscroll_1.js"></script>

    <style>

    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.jqzoom').jqzoom({
                zoomType: 'standard',
                lens:true,
                preloadImages: true,
                alwaysOn:false,
                title:false,
                zoomWidth:430,
                zoomHeight:430,
                xOffset:20,
                yOffset:0
            });

        });
    </script>
</head>
<body>
<!--  头部开始 -->
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
        	<?php if(session('mid')): ?>欢迎您，
                <a href="<?php echo U('Home/Member/member_info');?>" style="color:#ff4e00;font-weight: bold">
                    <?=session('mname')?>
                </a>
                <?php else: ?>您还没有登录，请先
                <a href="<?php echo U('Home/Login/login');?>" style="color:#ff4e00;">登录！</a>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/Login/register');?>" style="color:#ff4e00;">免费注册</a><?php endif; ?>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/Member/member_info');?>">会员中心</a>&nbsp;|&nbsp;
                <a href="<?php echo U('Home/Login/logout');?>">安全退出</a>&nbsp;|
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images//ts-logo.png" /></a></div>
    <div class="search">
        <form>

            <input type="text" value="" placeholder="请输入搜索内容（书籍名/作者名）" class="s_ipt" />

            <input type="submit" value="搜索" class="s_btn" />
        </form>
        <span class="fl"> <a href="<?php echo U('Home/Detail/detail');?>">《小时代》|</a>
                <a href="#">《花醉三千》|</a>
                <a href="#">《奈何》|</a>
                <a href="#">云霓</a></span>
    </div>
    <div class="i_car">
        <div class="car_t">购物车 [ <span></span> ]</div>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
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
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span></span></div>
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

        <!-- 头部结束 -->
        <div class="box goodsinfo">
            <div class="lf leftinfo">
                <!--jQzoom开始-->

                <!--显示上面大图和放大镜-->
                <div class="img">

                    <img src="/Uploads/<?php echo ($sp['pic']); ?>"/>
                    </a>
                </div>
                <!--显示下面三张小图-->
                <div >
                    <ul id="thumblist" class="clear"  >
                    </ul>
                </div>

                <!--jQzoom结束-->
            </div>
            <div class="lf rightinfo">
                <form action="<?php echo U('Home/BuyCar/buyCar_add');?>" method="post" id="form1">
                    <h1><span class="name"><?php echo ($sp['goodsname']); ?></span></h1>
                    <dl>
                        <dd>市场价：￥<span class='marketprice'><?php echo ($sp['marketprice']); ?></span></dd>
                        <dd>本店售价：￥<span class='price'><?php echo ($sp['price']); ?></span></dd>
                        <dd>内容简介：<span class="description"><?php echo ($sp['description']); ?></span> &nbsp;&nbsp;
                    </dl>
                   <dl>
                       <dd><a style="color:red; font-weight: bold; font-size: 20px;" href="<?php echo U('BuyCar/buyCar');?>">返回购物车</a></dd>
                   </dl>
                </form>
            </div>
        </div>
      </div>
   </div>
</body>
        <div class="b_btm_bg bg_color">
    <div class="b_btm"  >
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b1.png" width="62" height="62"  /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:80px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="/Public/Home/images//b4.png" width="62" height="62" /></td>
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
        <div class="b_er_c"><img src="/Public/Home/images//er.gif" width="118" height="118" /></div>
        <img src="/Public/Home/images//ss.png" />
    </div>
</div>
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="/Public/Home/images//b_1.gif" width="98" height="33" /><img src="/Public/Home/images//b_2.gif" width="98" height="33" /><img src="/Public/Home/images//b_3.gif" width="98" height="33" /><img src="/Public/Home/images//b_4.gif" width="98" height="33" /><img src="/Public/Home/images//b_5.gif" width="98" height="33" /><img src="/Public/Home/images//b_6.gif" width="98" height="33" />
    </div>
</div>
<!--End Footer End -->
</div>

</body>


</html>


<!-- 尾部结束 -->
        <!--[if IE 6]>
        <script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>

        <![endif]-->
</html>


<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop"></a>
<!--返回顶部结束-->
</body>
<script type="text/javascript">
    $('.cateList').hide();
    function jian(){
        var buynum=document.getElementById('buynum').value;
        if(buynum>1){
            document.getElementById('buynum').value=parseInt(buynum)-1;
        }
    }

    function jia(){
        var buynum=document.getElementById('buynum').value;

        if(buynum<199){
            document.getElementById('buynum').value=parseInt(buynum)+1;
        }
    }

    document.getElementById('buynum').onkeyup=function(){
        if(this.value<1){
            this.value=1;
        }
        if(this.value>199){
            this.value=199;
        }
        if(isNaN(this.value)){
            this.value=1;
        }
    }
</script>
</html>