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

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/login/jquery.validate.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    &lt;!&ndash;新加样式&ndash;&gt;
    <style type="text/css">
        *{margin:0;padding:0;list-style-type:none;}
        a,img{border:0;}
        body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
        .error{
            color: red;
            display: block;
        }
    </style>
 <script>
        $(function () {
            var Obj=$('.form1').validate({
                rules:{
                    content:{
                        required:true,
                        minlength:6,
                        maxlength:1000
                    }
                },
                messages:{
                    content:{
                        required:'请填写评论',
                        minlength:'用户名至少6个字符',
                        maxlength:'用户名最多1000个字符'
                    }
                }
            })
            $('.btn').click(function(){
                if (Obj.form()){
                    $.post("<?php echo U('News/sendInfo');?>", $('.form1').serialize(), function (res) {
                        if (res.status ==1) {
                            layer.msg(res.msg,{
                                icon: 1,
                                time:1000
                            });
                        } else {
                            layer.msg(res.msg,{
                                icon: 2,
                                time:1000
                            });
                        }
                    }, 'json')
                }

            })

        })
    </script>
    <script type="text/javascript">
        var url="<?php echo U('Index/buyCart');?>";
        var  delurl="<?php echo U('Cart/del');?>";
        var pub="/Public";
        $(function(){
            new ZoomPic("jswbox");
            $('img.lazy').lazyload(function(){effect:"fadein";});
            $(document).scroll(function(){
                var T=$("body").scrollTop();
                if(T>1600){$(".floor_nav").slideDown();}
                else{$(".floor_nav").slideUp();}
                if(T>=3500){$(".floor_nav li").eq(4).addClass("focus").siblings().removeClass("focus");}
                else if(T>=3100){$(".floor_nav li").eq(3).addClass("focus").siblings().removeClass("focus");}
                else if(T>=2600){$(".floor_nav li").eq(2).addClass("focus").siblings().removeClass("focus");}
                else if(T>=2100){$(".floor_nav li").eq(1).addClass("focus").siblings().removeClass("focus");}
                else if(T>=1500){$(".floor_nav li").eq(0).addClass("focus").siblings().removeClass("focus");}
                else{$(".floor_nav li").eq(0).addClass("focus").siblings().removeClass("focus");};
            });
            $('#navList li').click(function(){
                var i=$(this).index();
                if(i==4){$("body").scrollTop('3800')}
                else if(i==3){$("body").scrollTop('3400')}
                else if(i==2){$("body").scrollTop('2900')}
                else if(i==1){$("body").scrollTop('2400')}
                else if(i==0){$("body").scrollTop('1800')}
            })
        })
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
        function del(gid){
            $.get(delurl,{gid:gid},function(res){
                if(res.status=="ok"){
                    $("div.hd_Shopping_list").click();
                }else{
                    layer.msg(res.msg,{icon:2});
                }
            });
        }
    </script>


    <title>新闻页面</title>
</head>

<body>
&lt;!&ndash;顶部样式&ndash;&gt;
<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <?php if($_SESSION['shop_']['mid']>= 1): ?><div class="Collection">下午好,<?php echo (session('username')); ?>,欢迎光临本小店！<em></em><a href="#">收藏我们</a></div>
                <?php else: ?>
                <div class="Collection">下午好,欢迎光临本小店！<em></em><a href="#">收藏我们</a></div><?php endif; ?>
            &lt;!&ndash;<div class="Collection">下午好，欢迎<?php echo (session('username')); ?>光临锦宏颜！<em></em><a href="#">收藏我们</a></div>&ndash;&gt;
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <?php if($_SESSION['shop_']['mid']>= 1): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a id="logout" href="javascript:logout()" class="red">[退出]</a>
                        </li>
                        <?php else: ?>
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a href="<?php echo U('Home/Member/login');?>" class="red">[登录]</a>
                            新用户<a href="<?php echo U('Home/Member/register');?>" class="red">[免费注册]</a>
                        </li><?php endif; ?>
                    &lt;!&ndash;<li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>&ndash;&gt;
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Personal/order');?>">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/Cart/mycart');?>">购物车</a> </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        <a href="<?php echo U('Home/Personal/showlist');?>" class="red">[会员中心]</a>
                    </li>
                    &lt;!&ndash; <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
                         <div class="hd_menu_list">
                             <ul>
                                 <li><a href="#">常见问题</a></li>
                                 <li><a href="#">在线退换货</a></li>
                                 <li><a href="#">在线投诉</a></li>
                                 <li><a href="#">配送范围</a></li>
                             </ul>
                         </div>
                     </li>&ndash;&gt;
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/erweima.png"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    &lt;!&ndash;顶部样式1&ndash;&gt;
    <div id="header"  class="header page_style">
        <div class="logo"><a href="../Index/index.html"><img src="/Public/Home/images/logo.png" /></a></div>
        &lt;!&ndash;结束图层&ndash;&gt;
        <div class="Search">
            <form action="<?php echo U('Home/ProductList/showlist',array('bid'=>0,'maxprice'=>0,'minprice'=>0));?>" method="post">
                <p>
                    <input name="words" type="text"  class="text"/>
                    <input name="" type="submit" value="搜 索"  class="Search_btn"/>
                </p>
            </form>
            <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p>
        </div>
        &lt;!&ndash;购物车样式&ndash;&gt;
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart" style="cursor: pointer"><em class="iconfont icon-cart2"></em><a >我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount"><?php echo ($sum); ?></i></div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                &lt;!&ndash;<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>&ndash;&gt;
                <ul class="p_s_list">
                    &lt;!&ndash; <li>
                         <div class="img"><img src="/Public/Home/images/tianma.png"></div>
                         <div class="content"><p><a href="#">产品名称</a></p><p>颜色分类:紫花8255尺码:XL</p></div>
                         <div class="Operations">
                             <p class="Price">￥55.00</p>
                             <p><a href="#">删除</a></p></div>
                     </li>&ndash;&gt;
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共<b class="totalnum"></b>件商品　共计<strong id="totalprice"></strong></div>
                    <a href="<?php echo U('Home/Cart/mycart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    &lt;!&ndash;菜单导航样式&ndash;&gt;
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>

            </div>
            <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
            &lt;!&ndash;菜单栏&ndash;&gt;
            <div class="Navigation" id="Navigation">
                <ul class="Navigation_name">
                    <li><a href="Home.html">首页</a></li>
                    <li><a href="product_list.html">产品列表</a></li>
                    <li><a href="Limit_buy.html">限时特卖</a><em class="hot_icon"></em></li>
                    <li><a href="#">联系我们</a></li>
                    <li><a href="#">鲜盟人才</a></li>
                    <li><a href="#">鲜盟金融</a></li>
                    <li><a href="#">鲜盟投资</a></li>
                    <li><a href="Brands.html">销售品牌</a></li>
                </ul>
            </div>
            <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
            &lt;!&ndash; <a href="#" class="link_bg"><img src="/Public/Home/images/link_bg_03.png" /></a>&ndash;&gt;
        </div>
    </div>
</div>-->


<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
    .error{
        color: red;
        display: block;
    }
    .catepage{

        margin-top:30px ;
    }
    .catepage a{
        border-radius: 50px;
        margin: 2px;
        width: 25px;
        height: 15px;
        line-height: 15px;
        border: 1px solid #ccc;
        display: inline-block;
        text-align: center;
        background-color:orangered;
        padding: 5px;
        font-weight: bolder;

    }
    .catepage a:hover{
        background-color: white;
        color: #00aaee;
        font-weight: bolder;
    }
    .current{
        border-radius: 50px;
        width: 25px;
        height: 25px;
        border: 1px solid #ccc;
        line-height: 23px;
        display: inline-block;
        padding: 5px;
        text-align: center;
    }
    .zan{
        background-color: #ccc;
        border: 1px solid #6c6c6c;
        border-radius: 10px;
        height: 130px;
        float: left;
        margin-left: 150px;;
        position: absolute;
        left: 600px;
       top: 580px;


    }

</style>
<script src="/Public/Home/js/login/jquery.validate.js"></script>
<script>
    $(function () {
        var Obj=$('.form1').validate({
            rules:{
                content:{
                    required:true,
                    minlength:6,
                    maxlength:1000
                }
            },
            messages:{
                content:{
                    required:'请填写评论',
                    minlength:'用户名至少6个字符',
                    maxlength:'用户名最多1000个字符'
                }
            }
        })
        $('.btn').click(function(){
            if (Obj.form()){
                $.post("<?php echo U('News/sendInfo');?>", $('.form1').serialize(), function (res) {
                    if (res.status ==1) {
                        layer.msg(res.msg,{
                            icon: 1,
                            time:1000
                        },function () {
                           window.location.reload();
                            $(".btn").attr('disabled','true');
                            $(".btn").val("已提交");
                        });
                    } else {
                        layer.msg(res.msg,{
                            icon: 2,
                            time:1000
                        });
                    }
                }, 'json')
            }

        })

    })
</script>


<div style="width: 1200px;margin: 0px auto">
<img src="/Public/Home/images/AD/ad-4.jpg" alt=""  >
</div>
<div style="width: 1200px;margin: 0 auto;left: 5px">
    <form action="<?php echo U('News/newsdetail');?>" class="form1" method="post" name="form1">

        <!--文章内容-->
                <div style="position: relative">
                 <div class="neirong" style="width: 980px;max-height:500px;min-height:100px;overflow: auto;float: left;">
                                   <?php if(is_array($abc)): $i = 0; $__LIST__ = $abc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input id="nid" type="hidden" name="nid" value="<?php echo ($v['id']); ?>">
                                    <p style="text-align: center;font-size: 25px;font-weight: bold;margin-top: 50px;"><?php echo ($v["title"]); ?></p>
                                    <p style="text-align: center;font-size: 15px;font-weight: bold;margin-top: 50px;"><?php echo ($v["author"]); ?>&nbsp;&nbsp;&nbsp;<?php echo (date('Y-m-d',$v["addtime"])); ?></p>
                                    <m style="margin:60px 50px;line-height: 40px;padding-top: 30px;font-size: 15px"><?php echo ($v["content"]); ?></m>
                                    <div class="zan" style="color: orangered;font-size: 25px;padding-top: 20px;">
                                        <div id="fondNum" style="text-align: center"><?php echo ($v['likenum']); ?></div>
                                        <img class="likeBtn" style="display: block;cursor:pointer;width: 80px" src="/Public/Home/images/dianzan.jpg" alt="">
                                        <div class="likeBtn" style="font-size: 25px;text-align: center;cursor:pointer">+</div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>



                </div>
                </div>
        <!--<div class="zan" style="color: orangered;font-size: 25px;padding-top: 20px;">
            <div id="fondNum" style="text-align: center"><?php echo ($v['likenum']); ?></div>
            <img style="display: block;width: 80px" src="/Public/Home/images/dianzan.jpg" alt="">
            <div id="likeBtn" style="font-size: 25px;text-align: center;cursor:pointer">+</div>
        </div>-->
        <!--侧边新闻内容-->
                <div style="width: 199px;height: 280px;line-height: 20px;border: 5px solid orangered;border-radius: 10px;float: left;margin-top: 50px">
                    <table style="margin: 0 auto">
                        <th colspan="2" style="font-size: 20px;text-align: center;margin: 0px auto;color: orangered">最近新闻</th>
                        <br>
                    <?php if(is_array($cenews)): $i = 0; $__LIST__ = $cenews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr style="border-bottom: 1px solid #ccc;color: #ccc">
                            <td style="color: #ccc;height: 30px"><a style="color: #6c6c6c" href="<?php echo U('Home/News/newsdetail',array('id'=>$v['id']));?>" target="_self" ><?php echo ($v["title"]); ?></a></td>

                            <td style="color: #ccc "><?php echo (date("Y/m/d",$v["addtime"])); ?></td>

                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                </div>



        <!--//评论区-->

        <div class="comment" style="clear: both;padding-top: 50px;">


                        <div style="font-size: 20px;color: orangered;">会员评论</div>

                        <textarea name="content" class="content"  placeholder="文明上网,登录评论 !" style="border: 1px solid #6c6c6c;width: 500px;margin: 20px 0;height: 100px;display: block;float: left"></textarea>


                        <input type="button" value="提交评论" class="btn" style="margin:20px 0;font-size: 18px;width: 120px;height: 40px;clear:both; display: block;">

                </div>
    </form>
</div>

<div style="width:1200px;margin: 0 auto;">
    <div class="response" style="width: 600px;max-height:600px;line-height: 30px;border: 1px solid #ccc;border-radius: 10px;margin-top: 80px;">
        <p style="font-size: 18px">全部评论</p>
        <br>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><dl>
                <dd style="padding-left:20px ">用户名:<?php echo ($val['username']); ?></dd>
                <dd style="padding-left: 50px;color: #6c6c6c">评论:<?php echo ($val['commentcontent']); ?><dd style="padding-left: 50px;margin-right: 300px;color: #6c6c6c">评论时间:<?php echo (date("Y/m/d H:i:s",$val['addtime'])); ?></dd></dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="catepage" style="with:100px;padding-left: 20px">
            <?php echo ($page); ?>
        </div>
    </div>
</div>
<div>
</div>

<script>
    $(function () {
        $(".likeBtn").click(function(){
            var nid=$("#nid").val();
            $.get("<?php echo U('News/likeNum');?>",{nid:nid},function (res) {
                if(res.status=="ok"){
                    $("#fondNum").html(res.msg);
                }
            })
        })
    })
    /*function addToLogin(){
        //判断用户是否登陆过
        var mid=$('#mid').val();
        if( mid){
            $.post("/index.php/Home/Order/toBuyCreateOrder.html",$("#ECS_FORMBUY").serialize(),function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="/index.php/Home/Order/showlist.html?oid="+res.oid;
                    })
                }else{
                    layer.msg(res.msg,{icon:2,time:1000})
                }
            });
        }else{
            layer.open({
                type:2,
                title:"",
                skin:'demo-class',
                area:["480px","56%"],
                shadeClose: true,
                shade: 0.8,
                content:"/index.php/Home/Detail/tologin.html"
            })
        }


    }*/

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