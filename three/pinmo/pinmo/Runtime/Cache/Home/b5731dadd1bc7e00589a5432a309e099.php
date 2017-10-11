<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>商品搜索列表页</title>
    <link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_list.js" ></script>
    <style>
        #page{ padding:20px 0; text-align:center; clear: both}
        #page a{ padding:5px 10px;  text-align:center; border:solid 1px #CCCCCC;}
        #page a:hover{background-color: #FF6B00;color:#fff;font-weight: bold;}
        #page a.current{background-color: #C91623;color:#fff;font-weight: bold;}
        #page span{ margin:0 10px;}
        #page input{ width:30px; margin:0 5px; border:solid 1px #CCCCCC;}

    </style>

</head>
<body>
<!-- Header  -wll-2013/03/24 -->

<script>

    window.onscroll = function(){
        var ht=document.documentElement.scrollTop || document.body.scrollTop;
        if(ht>10){$("#daohang").css({"position":"fixed","margin":"auto","right":"0px","left":"0","top":"0","z-index":"999"});}
        else{$("#daohang").css({"position":"relative"});}
    }
</script>
<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
    <!-- Header TopNav -->
    <div class="shop_hd_topNav">
        <div class="shop_hd_topNav_all">
            <!-- Header TopNav Left -->
            <div class="shop_hd_topNav_all_left">
                <p>您好<?php echo (session('mname')); ?>，欢迎来到品墨书城
                    <?php if(($_SESSION['pm_home']['mid']) > "0"): ?><a href="javascript:logout();">退出</a>
                        <?php else: ?>
                        [<a href="<?php echo U('Home/Login/login');?>">登录</a>][<a href="<?php echo U('Home/Register/register');?>">注册</a>]<?php endif; ?>
                </p>
            </div>
            <!-- Header TopNav Left End -->

            <!-- Header TopNav Right -->
            <div class="shop_hd_topNav_all_right">
                <ul class="topNav_quick_menu">

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/MemberCenter/grxx');?>" class="topNavHover">个人中心<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;" >
                                <ul>
                                    <li><a title="已买到的商品" target="_top" href="<?php echo U('Home/MemberCenter/order');?>">已买到的商品</a></li>
                                    <li><a title="个人主页" target="_top" href="<?php echo U('Home/MemberCenter/grxx');?>">个人主页</a></li>
                                    <!-- <li><a title="我的好友" target="_top" href="#">我的好友</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <!--<div class="topNav_menu">
                            <a href="#" class="topNavHover">卖家中心<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;">
                                <ul>
                                  <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
                                  <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
                                </ul>
                            </div>
                        </div>-->
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/Shopcar/addcar');?>" class="topNavHover">购物车(<b style="color:red;"><?php echo ($num); ?></b>)种商品</a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="<?php echo U('Home/MemberCenter/favorite');?>" class="topNavHover">我的收藏</a>

                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="javascript:help();">帮助中心</a>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Header TopNav Right End -->
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Header TopNav End -->

    <!-- TopHeader Center -->
    <div class="shop_hd_header">
        <div class="shop_hd_header_logo">

            <?php if(is_array($list6)): $i = 0; $__LIST__ = $list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><h1 class="logo"><a href=""><img src="/Uploads/<?php echo ($value["adpic"]); ?>" alt="" width="250px" height="80px"/></a><span>1234</span></h1><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="shop_hd_header_search">
            <ul class="shop_hd_header_search_tab">
                <li id="search" style="visibility: hidden" class="current"></li>

            </ul>
            <div class="clear"></div>
            <div class="search_form">
                <form method="get" action="<?php echo U('Home/Search/search');?>">
                    <div class="search_formstyle">
                        <input type="text" class="search_form_text" name="keywords" value="<?php echo ($keywords); ?>" placeholder="搜索其实很简单！" />
                        <input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="search_tag">
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'余罪'));?>">余罪</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'时间之间'));?>">时间之间</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'悟空传'));?>">悟空传</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'魔兽'));?>">魔兽</a>
                <a href="<?php echo U('Home/Search/search',array('keywords'=>'历史上的今天'));?>">历史上的今天</a>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    <!-- TopHeader Center End -->

    <!-- Header Menu -->
    <div class="shop_hd_menu" id="daohang">
        <!-- 所有商品菜单 -->

        <div id="shop_hd_menu_all_category" class="shop_hd_menu_all_category"><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
            <div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:cate();">所有商品分类</a></h2><i></i></div>
            <div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
                <ul class="shop_hd_menu_all_category_hd_menu clearfix">
                    <!-- 单个菜单项 -->
                    <!--<li><h3><a href="">品牌推荐</a></h3>
                   <div class="cat_menu clearfix" style="margin-bottom: 0px">
                        <dl class="clearfix">
                    <?php if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dd><img src="/Uploads/<?php echo ($value["pic"]); ?>" width="150px" style="margin:5px "/></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                       </div>
                    <li>-->
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value1): $mod = ($i % 2 );++$i;?><li id="cat_1" class="" style="margin-top: 10px">
                            <h3><a href="<?php echo U('Home/Index/letter',array('cid'=>$value1['cid'],'catename'=>$value1['catename']));?>" title=""><?php echo ($value1["catename"]); ?></a></h3>
                            <div id="cat_1_menu" class="cat_menu clearfix" style="">

                                <?php if(is_array($value1)): $i = 0; $__LIST__ = $value1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value2): $mod = ($i % 2 );++$i; if(is_array($value2)): $i = 0; $__LIST__ = $value2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value3): $mod = ($i % 2 );++$i;?><dl class="clearfix">

                                            <dt><a href="<?php echo U('Home/Search/search2',array('cid'=>$value3['cid'],'catename'=>$value3['catename']));?>"><?php echo ($value3["catename"]); ?></a></dt>

                                            <dd>

                                                <a href=""><?php echo ($value["catename"]); ?></a>



                                            </dd>

                                        </dl><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 单个菜单项 End -->
                </ul>
            </div>
        </div>
        <!-- 所有商品菜单 END -->

        <!-- 普通导航菜单 -->
        <ul class="shop_hd_menu_nav">
            <li class="current_link"><a href="<?php echo U('Home/Index/index');?>"><span>首页</span></a></li>
            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="link"><a href="<?php echo U('Home/Index/letter',array('cid'=>$value['path'],'catename'=>$value['catename']));?>"><span><?php echo ($value["catename"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>


            <!--<li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>24));?>"><span>社科频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>30));?>"><span>经营频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>36));?>"><span>文教频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>43));?>"><span>生活频道</span></a></li>
            <li class="link"><a href="<?php echo U('Home/Index/letter',array('pid'=>16));?>"><span>音象</span></a></li>-->

        </ul>
        <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->



</div>



</div>
<div class="clear"></div>
<script src="/Public/Home/js/jquery-1.8.2.js"></script>
<script src="/Public/Home/layer/layer.js"></script>
<script>

    function logout() {
        layer.confirm('您是真的要退出吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("<?php echo U('Home/Login/logout');?>", null, function (res) {
                if (res.status == 'ok') {
                    layer.alert(res.msg, {
                        yes:function(){
                            location.href="<?php echo U('Home/Index/index');?>";
                        }
                    });
                }
            })
        })
    }
    function help(){
         //为了layer.ext.js加载完毕再执行
            layer.alert("有任何问题请拨打400-8888888，我们将提供令您满意的解决方案！"
            );

    }

</script>


<!-- Header End -->


<!-- List Body 2013/03/27 -->
<div class="shop_bd clearfix">
    <div class="shop_bd_list_left clearfix">
        <!-- 左边商品分类 -->

        <!-- 左边商品分类 End -->

        <!-- 热卖推荐商品 -->


        <!-- 浏览过的商品 -->
        
<div class="shop_bd_list_bk clearfix">
    <div class="title">商品分类</div>
    <div class="contents clearfix">
        <dl class="shop_bd_list_type_links clearfix">
            <dt><strong>品墨书城</strong></dt>
            <dd>
                <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U('Home/Index/letter',array('cid'=>$val['cid'],'catename'=>$val['catename']));?>"><?php echo ($val["catename"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>

            </dd>
        </dl>
    </div>
</div>

<div class="shop_bd_list_bk clearfix">
    <div class="title">热卖推荐商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($tglist)): $i = 0; $__LIST__ = $tglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href=""><?php echo ($value["goodsname"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($value["price"]); ?> </span><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong><?php echo ($value["salenum"]); ?></strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>



        </ul>
    </div>
</div>
<!-- 热卖推荐商品 -->
<div class="clear"></div>

<!-- 浏览过的商品 -->
<div class="shop_bd_list_bk clearfix">
    <div class="title">浏览过的商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($look1)): $i = 0; $__LIST__ = $look1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href=""><?php echo ($value["goodsname"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($value["price"]); ?> </span><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong><?php echo ($value["salenum"]); ?></strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
    </div>
</div>
        <!-- 浏览过的商品 -->

    </div>

    <div class="shop_bd_list_right clearfix">
        <!-- 条件筛选框 -->
        <div class="module_filter">
            <div class="module_filter_line">
                <dl>
                    <dd>搜索&nbsp;&nbsp;"<b><?php echo ($catename); ?></b>"&nbsp;&nbsp;,共有&nbsp;&nbsp;<b><?php echo ($count); ?></b>&nbsp;&nbsp;条记录</dd>
                </dl>



                <!--<dl>
                    <dt>类型：</dt>
                    <dd>
                        <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U('Home/Index/letter',array('cid'=>$val['cid']));?>"><?php echo ($val["catename"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>-->

                <dl>
                    <dt>品牌：</dt>
                    <dd>
                        <?php if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U('Home/Search/search4',array('bid'=>$val['id'],'catename'=>$val['brand'] ));?>"><img src="/Uploads/<?php echo ($val["pic"]); ?>" width="100px" height="26.25px"/></a></span><?php endforeach; endif; else: echo "" ;endif; ?>


                    </dd>
                </dl>


                <dl>
                    <dt>价格：</dt>
                    <dd>
                        <span><a href="<?php echo U('Home/Search/search3',array('lt'=>0,'gt'=>9));?>">0-9元</a></span>
                        <span><a href="<?php echo U('Home/Search/search3',array('lt'=>10,'gt'=>29));?>">10-29元</a></span>
                        <span><a href="<?php echo U('Home/Search/search3',array('lt'=>30,'gt'=>49));?>">30-49元</a></span>
                        <span><a href="<?php echo U('Home/Search/search3',array('lt'=>50,'gt'=>99));?>">50-99元</a></span>
                        <span><a href="<?php echo U('Home/Search/search3',array('lt'=>100));?>">100元以上</a></span>

                    </dd>
                </dl>


            </div>
            <div class="bottom"></div>
        </div>
        <!-- 条件筛选框 -->

        <!-- 显示菜单 -->
       <!-- <div class="sort-bar">
            <div class="bar-l">
                &lt;!&ndash; 查看方式S &ndash;&gt;
                <div class="switch"><span class="selected"><a title="以方格显示" ecvalue="squares" nc_type="display_mode" class="pm" href="javascript:void(0)">大图</a></span><span style="border-left:none;"><a title="以列表显示" ecvalue="list" nc_type="display_mode" class="lm" href="javascript:void(0)">列表</a></span></div>
                &lt;!&ndash; 查看方式E &ndash;&gt;
                &lt;!&ndash; 排序方式S &ndash;&gt;
                <ul class="array">
                    <li class="selected"><a title="默认排序" onclick="javascript:dropParam(['key','order'],'','array');" class="nobg" href="javascript:void(0)">默认</a></li>
                    <li><a title="点击按销量从高到低排序" onclick="javascript:replaceParam(['key','order'],['sales','desc'],'array');" href="javascript:void(0)">销量</a></li>
                    <li><a title="点击按人气从高到低排序" onclick="javascript:replaceParam(['key','order'],['click','desc'],'array');" href="javascript:void(0)">人气</a></li>
                    <li><a title="点击按信用从高到低排序" onclick="javascript:replaceParam(['key','order'],['credit','desc'],'array');" href="javascript:void(0)">信用</a></li>
                    <li><a title="点击按价格从高到低排序" onclick="javascript:replaceParam(['key','order'],['price','desc'],'array');" href="javascript:void(0)">价格</a></li>
                </ul>
                &lt;!&ndash; 排序方式E &ndash;&gt;
                &lt;!&ndash; 价格段S &ndash;&gt;
                <div class="prices"> <em>¥</em>
                    <input type="text" value="" class="w30">
                    <em>-</em>
                    <input type="text" value="" class="w30">
                    <input type="submit" value="确认" id="search_by_price">
                </div>
                &lt;!&ndash; 价格段E &ndash;&gt;
            </div>
        </div>-->
        <div class="clear"></div>
        <!-- 显示菜单 End -->

        <!-- 商品列表 -->
        <div class="shop_bd_list_content clearfix" id="pxlist">
<div>
            <ul>
                <?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                        <dl>

                            <dt><a href="<?php echo U('Home/Goods/details',array('id'=>$value['id']));?>"><img src="/Uploads/<?php echo ($value["goodspic"]); ?>" /></a></dt>

                            <dd class="title"><a href=""><?php echo mb_substr($value['goodsname'],0,12,"utf-8");?></a></dd>
                            <dd class="content">
                                <span class="goods_jiage">￥<strong><?php echo ($value["price"]); ?></strong></span>
                                <span class="goods_chengjiao">最近成交<?php echo ($value["salenum"]); ?>笔</span>
                            </dd>
                        </dl>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
</div>







        <div class="pagination" id="page">
            <p><?php echo ($page); ?></p>
        </div>
    </div>


 <!-- 商品列表 End -->



</div>
<!-- List Body End -->
</div>
<!-- Footer - wll - 2013/3/24 -->
<!-- Footer - wll - 2013/3/24 -->
<div class="clear"></div>
<div class="shop_footer">
    <div class="shop_footer_link">
        <p>
            <a href="">首页</a>|
            <a href="">招聘英才</a>|
            <a href="">广告合作</a>|
            <a href="">品墨书城</a>|
            <a href="">关于我们</a>
        </p>
    </div>
    <div class="shop_footer_copy">
        <p>Copyright 2008-2016 PmStore Inc.,All rights reserved.</p>
    </div>
</div>
<!-- Footer End -->
<!-- Footer End -->

</body>
<script type="text/javascript">

    function search(id){
        var keywords= $("input[name='keywords']").val();


        var id=id;
//alert (id);
        $.get("<?php echo U('search');?>",{"p":id,"keywords":keywords},function(res){
            $("#pxlist").html(res);
        })
    }
</script>

<script type="text/javascript">

    function search2(id){
        //var keywords= $("input[name='keywords']").val();


        var id=id;var cid=<?php echo ($value['cid']); ?>;
//alert (id);
        $.get("<?php echo U('Home/Search/search2');?>",{"p":id,"cid":cid},function(res){
            $("#pxlist").html(res);
        })
    }
</script>
<script type="text/javascript">

    function search3(id){
        //var keywords= $("input[name='keywords']").val();


        var id=id;var lt=<?php echo ($lt); ?>;var gt=<?php echo ($gt); ?>;
//alert (id);
        $.get("<?php echo U('Home/Search/search3');?>",{"p":id,"lt":lt,"gt":gt},function(res){
            $("#pxlist").html(res);
        })
    }
</script>
<script type="text/javascript">

    function search4(id){
        //var keywords= $("input[name='keywords']").val();


        var id=id;var bid=<?php echo ($content); ?>;

//alert (id);
        $.get("<?php echo U('Home/Search/search4');?>",{"p":id,"bid":bid},function(res){
            $("#pxlist").html(res);
        })
    }
</script>
</html>