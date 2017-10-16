<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/Uploads/minilogo.ico" type="image/x-icon"/>
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <link href="/Public/Home/css/addtocart.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/ordersuccess.css" rel="stylesheet" type="text/css">
    <!--支付-->
    <link rel="shortcut icon" href="/Public/Home/images/bitbug_favicon.icon" />
    <link rel="stylesheet" href="/Public/Home/css/showcart.css" />
    <link rel="stylesheet" href="/Public/Home/css/reset1.css" />
    <!--支付-->
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <style type="text/css">
        /*.nav_on{ background:#FF7200;color:#ffffff}*/
       .nav_on{ background:#FF7200;color:white;}
    </style>
    <script type="text/javascript">
        $(function(){
            $(".Navigation_name li").removeClass();
            var reg1=/\/Home\/Index\//;
            var reg2=/\/Home\/ProductList\//;
            var reg3=/\/Home\/Sale\//;
            var reg4=/\/Home\/Vote\//;
            var reg5=/\/Home\/Auction\//;
            var reg6=/\/Home\/Integral\//;
            var reg7=/\/Home\/Connect\//;
            var nowurl=document.URL;
            if(reg1.test(nowurl)){
                $('#cplb').addClass("nav_on");
            }else if(reg2.test(nowurl)){
                $('#cplb').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg3.test(nowurl)){
                $('#xsqg').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg4.test(nowurl)){
                $('#tptj').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg5.test(nowurl)){
                $('#pmsc').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg6.test(nowurl)){
                $('#jfdh').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg7.test(nowurl)){
                $('#lxwm').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }
        })

    </script>
    <script type="text/javascript">
        url="<?php echo U('Index/buyCart');?>";
        delurl="<?php echo U('Cart/del');?>";
        pub="/Public";
        //退出
        function logout(){
            layer.confirm("你确定要退出吗？",{icon:3,btn:['确定','取消']},function(){
                $.get("<?php echo U('Home/Member/logout');?>",function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Home/Index/index');?>"
                        })
                    }
                })
            })
        }
        //我的购物车删除
        function del(gid){
            $.get(delurl,{gid:gid},function(res){
                if(res.status=="ok"){
                    $("div.hd_Shopping_list").click();
                }else{
                    layer.msg(res.msg,{icon:2});
                }
            });
        }
        //会员中心判断是否登陆过
        function islogin(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/showlist');?>";
            }else{
                layer.confirm("登陆后才能进入",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
        //我的订单判断是否登陆
        function isorder(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/order');?>";
            }else{
                layer.confirm("登陆后才能查看",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
    </script>

    <title>产品详细页</title>
</head>
<body>

<!--顶部样式-->
<div id="header_top">
    <input type="hidden" value="<?php echo (session('mid')); ?>" id="islogin"/>
    <div id="top">
        <div class="Inside_pages">
            <?php if($_SESSION['shop_']['mid']>= 1): ?><div class="Collection">下午好,<?php echo (session('username')); ?>,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div>
                <?php else: ?>
                <div class="Collection">下午好,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div><?php endif; ?>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <!--<li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>-->
                    <?php if($_SESSION['shop_']['mid']>= 1): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a id="logout" href="javascript:logout()" class="red">[退出]</a>
                        </li>
                        <?php else: ?>
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a href="<?php echo U('Home/Member/login');?>" class="red">[登录]</a>
                            新用户<a href="<?php echo U('Home/Member/register');?>" class="red">[免费注册]</a>
                        </li><?php endif; ?>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="javascript:isorder()">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/Cart/mycart');?>">购物车</a> </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        <a href="javascript:islogin()" class="red">[会员中心]</a>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/erweima.jpg"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--顶部样式1-->
    <div id="header"  class="header page_style">
        <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
        <!--结束图层-->
        <div class="Search">
            <!--<p><input name="" type="text"  class="text"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>-->
            <form action="<?php echo U('Home/ProductList/searchlist',array('maxprice'=>0,'minprice'=>0));?>" method="get">
                <p>
                    <input name="words" type="text"  value="<?php echo ($cx); ?>" class="text"/>
                    <input name="" type="submit" value="搜 索"  class="Search_btn" />
                </p>
            </form>
            <p class="Words"><a href="<?php echo U('Home/ProductList/catelist',array('path'=>1,'minprice'=>0,'maxprice'=>0));?>">甜品</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>3,'minprice'=>0,'maxprice'=>0));?>">零食</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>5,'minprice'=>0,'maxprice'=>0));?>">水果</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>7,'minprice'=>0,'maxprice'=>0));?>">生鲜蔬菜</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>8,'minprice'=>0,'maxprice'=>0));?>">肉类</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>2,'minprice'=>0,'maxprice'=>0));?>">饮品</a></p>
        </div>
        <!--购物车样式-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em class="iconfont icon-cart2"></em><a href="#">我的购物车</a>
                <!--<i class="ci-right">&gt;</i>-->
                <!--<i class="ci-count" id="shopping-amount">
                <?php if($_SESSION['shop_']['sum']>= 0): echo (session('sum')); ?>
                    <?php else: ?>
                    0<?php endif; ?>
            </i>-->
            </div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                <ul class="p_s_list">
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共<b id="totalnum"></b>件商品　共计<strong id="totalprice"></strong></div>
                    <a href="<?php echo U('Home/Cart/myCart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>
            </div>
            <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <!--<ul class="Navigation_name">-->
                <ul class="Navigation_name">
                    <li id="sy"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                    <li id="cplb"><a href="<?php echo U('Home/ProductList/showlist',array('bid'=>0,'minprice'=>0,'maxprice'=>0));?>">产品列表</a></li>
                    <li id="xsqg"><a href="<?php echo U('Home/Sale/showlist');?>">限时抢购</a><em class="hot_icon"></em></li>
                    <li id="tptj"><a href="<?php echo U('Home/Vote/showlist');?>">投票统计</a></li>
                    <li id="pmsc"><a href="<?php echo U('Home/Auction/showlist');?>">拍卖商城</a></li>
                    <li id="jfdh"><a href="<?php echo U('Home/Integral/showlist');?>">积分兑换</a></li>
                    <li id="lxwm"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                </ul>
            </div>
            <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
            <!-- <a href="#" class="link_bg"><img src="/Public/Home/images/link_bg_03.png" /></a>-->
        </div>
    </div>
</div>


<style>
    .pagination{
        float: right;
        letter-spacing: 3px;
        font-size: 12px;
        text-align: center;
    }
    .pagination a{
        border-radius: 50px;
        margin: 2px;
        width: 50px;
        height: 20px;
        line-height: 20px;
        border: 1px solid #ccc;
        display: inline-block;
        text-align: center;
        background-color:orangered ;
        padding: 5px;
        font-weight: bolder;
    }
    .pagination a:hover{
        background-color: yellowgreen;
        color: black;
        font-weight: bolder;
    }
    .current{
        border-radius: 50px;
        width: 50px;
        height: 20px;
        border: 1px solid #ccc;
        background-color: yellowgreen;
        line-height: 23px;
        display: inline-block;
        padding: 5px;
        text-align: center;}
    .bs{
        width: 60px;
        float: left;
        text-align: center;
        margin: 0 10px;
    }
    .bs a{
        display: block;
        text-align: center;
        padding: 8px;
        color: #FFFFFF;
        background: #FF6060;
        width: 50px;
        height: 20px;

    }
    .hy{
        width: 60px;
        float: left;
        text-align: center;
        margin: 0 10px;
    }
    .hy a{ display: block;
        text-align: center;
        padding: 8px;
        width: 50px;
        height: 20px;
    }

</style>
<script type="text/javascript">
    $(function(){
        var i=$('#brandstyle input:hidden').val();
         var b=$('#brandstyle #'+i).attr('id');
         $('#'+b).css('color','red');

    })
</script>
<!--产品列表样式-->
<div class="Inside_pages clearfix">
    <!--筛选样式-->
    <div id="Filter_style">
        <!--条件筛选样式-->
        <div class="Filter">
            <div class="Filter_list clearfix">
                <div class="Filter_title"><span>品牌：</span></div>
                <div class="Filter_Entire"><a href="<?php echo U('Home/ProductList/showlist',array('bid'=>0,'maxprice'=>0,'minprice'=>0,'words'=>'0'));?>">全部</a></div>
                <div class="p_f_name infonav_hidden brandslist ">
                    <input type="hidden" value="<?php echo ($bid); ?>">
                    <p>
                        <?php if(is_array($brandlist)): $key = 0; $__LIST__ = $brandlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 8 );++$key;?><a id="<?php echo ($val["id"]); ?>"  href="<?php echo U('Home/ProductList/showlist',array('bid'=>$val['id'],'maxprice'=>0,'minprice'=>0));?>" ><?php echo ($val["bname"]); ?></a>
                            <?php if(($mod) == "7"): ?><p/><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </p>
                </div>

                <p class="infonav_more"><a href="#" class="more" onclick="infonav_more_down(0);return false;">更多<em class="pullup"></em></a></p>
            </div>
            <div class="Filter_list clearfix">
                <div class="Filter_title"><span>价格：</span></div>
                <div class="<?php echo ($min==0?'bs':'hy'); ?>"><a  href="<?php echo U('Home/ProductList/catelist',array('minprice'=>0,'maxprice'=>0));?>">全部</a></div>
                <div class="<?php echo ($min==1?'bs':'hy'); ?>"><a   href="<?php echo U('Home/ProductList/catelist',array('minprice'=>1,'maxprice'=>50));?>">1-50</a></div>
                <div class="<?php echo ($min==50?'bs':'hy'); ?>"><a   href="<?php echo U('Home/ProductList/catelist',array('minprice'=>50,'maxprice'=>150));?>">50-150</a></div>
                <div class="<?php echo ($min==150?'bs':'hy'); ?>"> <a  href="<?php echo U('Home/ProductList/catelist',array('minprice'=>150,'maxprice'=>500));?>">150-500</a></div>
                <div class="<?php echo ($min==500?'bs':'hy'); ?>"><a  href="<?php echo U('Home/ProductList/catelist',array('minprice'=>500,'maxprice'=>1000));?>">500-1000</a></div>
                <div class="<?php echo ($min==1000?'bs':'hy'); ?>"><a  href="<?php echo U('Home/ProductList/catelist',array('minprice'=>1000,'maxprice'=>10000000));?>">1000以上</a></div>
            </div>
        </div>
    </div>



    <!--样式-->
    <div  class="scrollsidebar side_green clearfix" id="scrollsidebar">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <!--左侧样式-->
        <div class="page_left_style side_content"  >
            <!--浏览记录-->
            <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
            <div class=" side_list">
                <div class="Record">
                    <div class="title_name">浏览记录</div>
                    <ul>
                        <?php if(is_array($historyInfo)): $k = 0; $__LIST__ = $historyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$historyList): $mod = ($k % 2 );++$k; if($k <= 6): if($historyList['id'] > 0): ?><li>
                                        <a href="<?php echo U('Detail/detail',array('gid'=>$historyList['id']));?>">
                                            <p><img src="/Public/Admin/Uploads/goods/<?php echo ($historyList['pic']); ?>" data-bd-imgshare-binded="1"></p>
                                            <p class="p_name"><?php echo ($historyList['goodsname']); ?></p>
                                        </a>
                                        <p><b class="p_Price"><i>￥</i><?php echo ($historyList['price']); ?></b></p>
                                    </li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!--销售排行-->
                <div class="pro_ranking">
                    <div class="title_name"><em></em>销量排行</div>
                    <div class="ranking_list">
                        <ul id="tabRank">
                            <li class="t_p on">
                                <em class="icon_ranking">1</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">2</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">3</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">4</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">5</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">6</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">7</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">8</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">9</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                            <li class="t_p">
                                <em class="icon_ranking">10</em>
                                <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
                                <dd class="clearfix">
                                    <a href="#"><img src="/Public/Home/images/products/p_29.jpg" width="90" height="90" /></a>
                                    <span class="Price">￥23.00</span>
                                </dd>
                            </li>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery("#tabRank li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });
                    jQuery("#tabRank").slide({ titCell:"dt h3",autoPlay:false,effect:"left",delayTime:300 });
                </script>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $("#scrollsidebar").fix({
                    float : 'left',
                    //minStatue : true,
                    skin : 'green',
                    durationTime : 600
                });
            });
        </script>
        <!--列表样式属性-->
        <div class="page_right_style">
            <div id="Sorted" >
                <div class="Sorted">
                    <div class="Sorted_style">
                        <a id="a0" class="<?php echo ($orderIT==0?'on':''); ?>" href="<?php echo U('Home/ProductList/catelist',array('order'=>0));?>" class="on">综合<i class="iconfont icon-fold"></i></a>
                        <a id="a1" class="<?php echo ($orderIT==1?'on':''); ?>"  href="<?php echo U('Home/ProductList/catelist',array('order'=>1));?>">销量<i class="iconfont icon-fold"></i></a>
                        <a id="a2" class="<?php echo ($orderIT==2?'on':''); ?>" href="<?php echo U('Home/ProductList/catelist',array('order'=>2));?>">价格<i class="iconfont icon-fold"></i></a>
                        <a id="a3" class="<?php echo ($orderIT==3?'on':''); ?>" href="<?php echo U('Home/ProductList/catelist',array('order'=>3));?>">新品<i class="iconfont icon-fold"></i></a>
                    </div>
                </div>
            </div>
            <!--产品列表样式-->
            <div class="p_list  clearfix">
                <ul>
                    <?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="gl-item">
                            <em class="icon_special tejia"></em>
                            <div class="Borders">
                                <div class="img"><a href="<?php echo U('Detail/detail',array('gid'=>$val['id']));?>"><img src="/Public/Admin/Uploads/goods/<?php echo ($val['pic']); ?>" style="width:220px;height:220px"></a></div>
                                <div class="Price"><b>¥<?php echo ($val["price"]); ?></b><span style="text-decoration: line-through">[¥<?php echo ($val["marketprice"]); ?>]</span></div>
                                <div class="name"><a href="<?php echo U('Detail/detail',array('gid'=>$val['id']));?>"><?php echo ($val["goodsname"]); ?></a></div>
                                <div class="Review">已有<span style="color: #f43838"><?php echo ($val['salenum']?$val['salenum']:'0'); ?></span>人购买</div>
                            </div>
                        </li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </ul>
                <div class="pagination">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>
<script type="text/javascript" charset="UTF-8">
    <!--
    //点击效果start
    function infonav_more_down(index)
    {
        var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
        if(inHeight > 60){
            $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
            $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
        }else{
            return false;
        }
    }
    function infonav_more_up(index)
    {
        var infonav_height = 85;
        $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
        $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
    }

    function onclick(event) {
        info_more_down();
        return false;
    }
    //点击效果end
    //-->
</script>
<script type="text/javascript">
    $(function(){
        var i=$('.brandslist input:hidden').val();
        var b=$('.brandslist #'+i).attr('id');
        $('#'+b).css('color','red');
    })
</script>




<!--<div class="slogen">
    <div class="index_style">
        <ul class="wrap">
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_34.png" data-bd-imgshare-binded="1"></a>
                <b>安全保证</b>
                <span>多重保障机制 认证商城</span>
            </li>
            <li><a href="#"><img src="/Public/Home/images/slogen_28.png" data-bd-imgshare-binded="2"></a>
                <b>正品保证</b>
                <span>正品行货 放心选购</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_30.png" data-bd-imgshare-binded="3"></a>
                <b>七天无理由退换</b>
                <span>七天无理由保障消费权益</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_31.png" data-bd-imgshare-binded="4"></a>
                <b>天天低价</b>
                <span>价格更低，质量更可靠</span>
            </li>
        </ul>
    </div>
</div>-->
<!--底部图层-->
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>售后保障</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>13));?>">&nbsp;售后政策</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>14));?>">&nbsp;价格保护</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>15));?>">&nbsp;退款说明</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>16));?>">&nbsp;取消订单 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>17));?>">&nbsp;货到付款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>18));?>">&nbsp;在线支付</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>19));?>">&nbsp;分期付款</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>20));?>">&nbsp;异常情况</a></dd>
            </dl>
            <dl>
                <dt>新手上路</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>2));?>">&nbsp;交易条款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>6));?>">&nbsp;售后流程</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>7));?>">&nbsp;购物流程</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>8));?>">&nbsp;隐私说明 </a></dd>
            </dl>
            <dl>
                <dt>特色服务</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>21));?>">&nbsp;次日送达</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>22));?>">&nbsp;送货入库</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>23));?>">&nbsp;无忧退换货</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>24));?>">&nbsp;全国联保</a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>9));?>">&nbsp;保险需求测试</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>10));?>">&nbsp;专题及活动</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>11));?>">&nbsp;挑选保险产品</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>12));?>">&nbsp;常见问题 </a></dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
<!--右侧菜单栏购物车样式-->
<div class="fixedBox">
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/showlist');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong>
                </a>
                <?php else: ?>
                <a href="<?php echo U('Member/login');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong></a><?php endif; ?>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-service"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <div class="bjfffs"></div>

                <dl onclick="javascript:;">
                    <dd> <strong style="float: left;top:12px;left: 30px;position: absolute">QQ客服1</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=993001867&site=qq&menu=yes">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:993001867:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                    </dd><br><br>
                    <dd> <strong style="float: left;top:52px;left: 30px;position: absolute">QQ客服2</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=211663882&site=qq&menu=yes">
                            <img border="0" style="" src="http://wpa.qq.com/pa?p=2:211663882:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                        <!--                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=591813766&site=qq&menu=yes">
                                                    <img border="0" src="http://wpa.qq.com/pa?p=2:591813766:53" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>-->
                    </dd>
                </dl>

            </div>
        </li>
        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
            <span class="fixeBoxSpan iconfont icon-erweima"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <div class="QR_code">
                    <p><img src="/Public/Home/images/two-code.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <span style="color: #000">微信扫一扫，关注我们</span>
                </div>
            </div>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/collection');?>"> <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/foot');?>"> <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="#"> <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>

</body>
</html>