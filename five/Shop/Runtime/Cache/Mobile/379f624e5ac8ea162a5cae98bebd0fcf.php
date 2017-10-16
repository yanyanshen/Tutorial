<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>首页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Mobile/js/rem.js"></script>
    <link href="/Public/Mobile/iconfont/iconfont.css" rel="stylesheet">
    <link href="/Public/Mobile/css/mui.min.css" rel="stylesheet">
    <link href="/Public/Mobile/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
</head>
<body>
    <header class="mui-bar mui-bar-nav" id="header">
        <div class="top-sch-box flex-col">
            <div class="centerflex">
                <i class="fdj iconfont icon-search"></i>
                <div class="sch-txt">我爱吃零食^^</div>
                <span class="shaomiao"><i class="iconfont icon-saoma"></i></span>
            </div>
        </div>
        <a class="btn" href="<?php echo U('Login/login');?>">
            <i class="iconfont icon-tixing"></i>
        </a>
        <a class="btn" href="<?php echo U('Cart/cartList');?>">
            <i class="iconfont icon-cart"></i>
        </a>
    </header>

<div id="main" class="mui-clearfix">
    <!-- 搜索层 -->
    <div class="pop-schwrap">
        <div class="ui-scrollview">
            <form action="<?php echo U('Mobile/ProductList/searchList');?>" method="get" id="SearchGoods">
            <div class="mui-bar mui-bar-nav clone">
                <a class="btn btn-back" href="javascript:;"></a>
                <div class="top-sch-box flex-col">
                    <div class="centerflex">
                        <input class="sch-input mui-input-clear" type="text" name="search" id="search" placeholder="我爱吃零食^^" />
                    </div>
                </div>
                <a class="mui-btn mui-btn-primary sch-submit" href="javascript:document:SearchGoods.submit();" >搜索</a>
            </div>
            </form>
            <div class="scroll-wrap">
                <div class="mui-scroll">
                    <div class="sch-cont">
                        <div class="section ui-border-b">
                            <div class="tit"><i class="iconfont icon-hot"></i>热门搜索</div>
                            <div class="tags">
                                <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/Detail/detail',array('gid'=>$value['id']));?>"><span class="tag actice"><?php echo (mb_substr($value["goodsname"],0,8,'utf-8')); ?>...</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                       <!-- <div class="section">
                            <div class="tit"><i class="iconfont icon-time"></i>最近搜索</div>
                            <div class="tags">
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span><span class="tag">睡衣</span>
                                <span class="tag">外套</span><span class="tag">连衣裙</span><span class="tag">运动鞋</span>
                            </div>
                        </div>-->
                    </div>
                    <!--<div class="sch-clear">-->
                        <!--<a href="javascript:void"><i class="iconfont icon-shanchu"></i>清除搜索历史</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>


    <div class="mui-content">
        <div class="banner swiper-container">
            <div class="swiper-wrapper">
                <?php if(is_array($list5)): $i = 0; $__LIST__ = $list5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href="javascript:void(0)"><img class="swiper-lazy"   data-src="/Public/Admin/Uploads/ads/<?php echo ($value['adlogo']); ?>" alt=""></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="home-nav ui-box">
            <div class="ui-flex flex-justify-sb">
                <?php if(is_array($list4)): $i = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div><a href="<?php echo U('Mobile/ProductList/brandList',array('bid'=>$value['id']));?>"><img src="/Public/Admin/Uploads/brand/<?php echo ($value['logo']); ?>" alt="" /></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

        <div class="home-qnav ui-box">
            <div class="ui-flex flex-justify-sb">
                <div><a href="<?php echo U('Index/seckill');?>"><img src="/Public/Mobile/images/img/qnav1.png" class="ico" /><span class="name">淘抢购</span></a></div>
                <div><a href="<?php echo U('Integral/showlist');?>"><img src="/Public/Mobile/images/img/qnav2.png" class="ico" /><span class="name">积分兑换</span></a></div>
                <div><a href="<?php echo U('Index/recommend');?>"><img src="/Public/Mobile/images/img/qnav3.png" class="ico" /><span class="name">商城推荐</span></a></div>
                <div><a href="<?php echo U('Index/like');?>"><img src="/Public/Mobile/images/img/qnav4.png" class="ico" /><span class="name">猜你喜欢</span></a></div>
            </div>
        </div>

        <div class="home-newgoods ui-box">
            <img class="home-imgtit" src="/Public/Mobile/images/img/hometit1.jpg" alt="" />
            <div class="list-type1 plist-puzzle">
                <a class="b" href=""><img src="/Public/Mobile/images/y3.png" alt="" /></a>
                <div class="s ui-flex-vt flex-justify-sb">
                    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a class="box" href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>"><img src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <img class="home-imgtit" src="/Public/Mobile/images/img/hometit2.jpg" alt="" />
            <div class="list-type2 ui-flex flex-justify-sb">
                <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a class="box" href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>"><img class="figure" src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>" alt="" /><span class="tit">新品上市</span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

        <div class="home-fashion ui-box ui-border-t">
            <img class="home-imgtit" src="/Public/Mobile/images/hometit3.png" alt="" />
            <a href="#"><img class="db margin-b-s" src="/Public/Mobile/images/y1.png" width="100%" alt="" /></a>
            <div class="fastion-plist mui-row">

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="mui-col-xs-4">
                        <a href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>" class="item">   <!--链接到购物流程-->
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>" alt="" class="figure" /><span class="tit"><?php echo (mb_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>

        <div class="home-fashion ui-box ui-border-t">
            <img class="home-imgtit" src="/Public/Mobile/images/hometit3.png" alt="" />
            <a href="#"><img class="db margin-b-s" src="/Public/Mobile/images/t1.png" width="100%" alt="" /></a>
            <div class="fastion-plist mui-row">

                <?php if(is_array($add1)): $i = 0; $__LIST__ = $add1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="mui-col-xs-4">
                        <a href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>" class="item">   <!--链接到购物流程-->
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>" alt="" class="figure" /><span class="tit"><?php echo (mb_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>


        <div class="home-fashion ui-box ui-border-t">
            <img class="home-imgtit" src="/Public/Mobile/images/hometit3.png" alt="" />
            <a href="#"><img class="db margin-b-s" src="/Public/Mobile/images/t2.png" width="100%" alt="" /></a>
            <div class="fastion-plist mui-row">

                <?php if(is_array($add2)): $i = 0; $__LIST__ = $add2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="mui-col-xs-4">
                        <a href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>" class="item">   <!--链接到购物流程-->
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>" alt="" class="figure" /><span class="tit"><?php echo (mb_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>


    </div> <!--mui-content end-->
</div>


    <footer class="page-footer fixed-footer" id="footer">
		<ul>
			<li class="active">
				<a href="<?php echo U('Index/index');?>">
					<img src="/Public/Mobile/images/footer01.png"/>
					<p>首页</p>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Mobile/Category/cateList');?>">
					<img src="/Public/Mobile/images/footer002.png"/>
					<p>分类</p>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Cart/cartList');?>">
					<img src="/Public/Mobile/images/footer003.png"/>
					<p>购物车</p>
				</a>
			</li>
			<li>
				<a href="javascript:islogin()">
					<img src="/Public/Mobile/images/footer004.png"/>
					<p>个人中心</p>
				</a>
			</li>
		</ul>
	</footer>
<input name="mid" value="<?php echo (session('mid')); ?>" id="mid">
</body>
<script type="text/javascript" src="/Public/Mobile/js/jquery-1.8.3.min.js" ></script>
<script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
<script src="/Public/Mobile/js/fastclick.js"></script>
<script src="/Public/Mobile/js/mui.min.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/hmt.js" ></script>
<!--插件-->
<link rel="stylesheet" href="/Public/Mobile/js/swiper/swiper.min.css">
<script src="/Public/Mobile/js/swiper/swiper.jquery.min.js"></script>
<!--插件-->
<script src="/Public/Mobile/js/global.js"></script>
<script >
    //判断用户是否登陆
    function islogin(){
        var mid=$("#mid").val();
        if(mid){
            location.href="<?php echo U('Personal/personalList');?>";
        }else{
            //信息框
            layer.open({
                content:"登陆后才能进入"
                ,btn: ['去登陆','再逛逛']
                ,yes:function(index){
                    location.href="<?php echo U('Login/login');?>";
                    layer.close(index);
                }
            });
        }
    }
    $(function () {
        var banner = new Swiper('.banner',{
            autoplay: 5000,
            pagination : '.swiper-pagination',
            paginationClickable: true,
            lazyLoading : true,
            loop:true
        });

         mui('.pop-schwrap .sch-input').input();
        var deceleration = mui.os.ios?0.003:0.0009;
         mui('.pop-schwrap .scroll-wrap').scroll({
                bounce: true,
                indicators: true,
                deceleration:deceleration
        });
        $('.top-sch-box .fdj,.top-sch-box .sch-txt,.pop-schwrap .btn-back').on('click',function () {
            $('html,body').toggleClass('holding');
            $('.pop-schwrap').toggleClass('on');
            if($('.pop-schwrap').hasClass('on')) {;
                $('.pop-schwrap .sch-input').focus();
            }
        });

    });
</script>
</html>