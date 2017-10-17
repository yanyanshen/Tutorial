<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎光临苗家频道！</title>
<LINK rel=stylesheet type=text/css href="/Public/Home/style/common.css">
<link rel="stylesheet" href="/Public/Home/style/reset.css" />
<link rel="stylesheet" href="/Public/Home/style/DetailPages.css" />
<script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/layer.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.imagezoom.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/DetailPages.js"></script>
<script type="text/javascript" src="/Public/Home/js/kefu.js"></script>
<script type="text/javascript">
    $(function(){
        $("#text_box1").keyup(function(){
            $(this).val($(this).val().replace(/[^\d]/g,''));
            if($(this).val().length < 1 || $(this).val()==0){
                $(this).val("1");
            }
        })
        $(".menu").hide();
        $(".fenlei").mouseenter(function(){
            $(".menu").show();
        })
        $(".fenlei").mouseleave(function(){
            $(".menu").hide();
        })
        $(".menu").mouseenter(function(){
            $(this).show();
        })
        $(".menu").mouseleave(function(){
            $(this).hide();
        })
        $("#safe_logout").click(function () {
            $.ajax({
                type:"GET",
                url:"<?php echo u('User/logout');?>",
                success:function(){
                    layer.msg("安全退出",{
                        icon:1,
                        time:1000
                    },function(){
                        location.reload();
                    });
                }
            })
        });

        $("#gotocart").click(function(){
            <?php if(session('username')?1:0): ?>location.href="<?php echo u('Cart/shopping');?>";
            <?php else: ?>
            layer.confirm('您尚未登录，请登录后进行购物车相关操作!',{
                btn:['登录','返回']
            },function(){
                location.href="<?php echo u('User/login');?>";
            },function(){
                layer.tips('如果您喜欢网站的商品，请点击这里登录后进行操作','#login',{
                    tips: [1, '#3595CC'],
                    time: 5000
                });
            });<?php endif; ?>
        });

        $("input[name='goodsargs']").attr('value',$("#ul2 p:first").text());
        $("#ul2 p").click(function(){
            $("input[name='goodsargs']").attr('value',$(this).text());
        })
        //立即购买操作
        $(".span1").click(function(){
            <?php if(!session('uid')): ?>location.href="<?php echo u('User/login');?>";
            <?php else: ?>
            $.ajax({
                url:"<?php echo u('Cart/addToCart');?>",
                data:$("#form1").serialize(),
                type:"post",
                success: function (data) {
                    if(data=='成功加入购物车'){
                        location.href="<?php echo u('Order/affirm');?>";
                    }
                }
            })<?php endif; ?>
        })
        //加入购物车操作
        $(".span2").click(function(){
            <?php if(!session('uid')): ?>location.href="<?php echo u('User/login');?>";
            <?php else: ?>
            $.ajax({
                url:"<?php echo u('Cart/addToCart');?>",
                data:$("#form1").serialize(),
                type:"post",
                success: function (data) {
                    if(data=='成功加入购物车'){
                        layer.confirm(data,{
                            btn:['进入购物车','继续购物']
                        },function(){
                            location.href="<?php echo u('Cart/shopping');?>";
                        },function(){
                            //继续购物相关操作
                        })
                    }
                }
            })<?php endif; ?>
        })
    })
</script>
</head>

<body>
<!-- 顶部开始 -->
<div class="header">
    <div class="headerCont frm_sty clearfix">
        <p>欢迎光临<?php echo C('WEB_NAME');?>！</p>
        <p class="tel"><?php echo C('WEB_TEL');?></p>
        <a href="#">帮助中心</a>
        <?php if(session('username')?1:0): ?><a href="javascript:void(0)" id="safe_logout">安全退出</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">会员中心</a>&nbsp;&nbsp;<a href="<?php echo u('User/member');?>">用户名:<?php echo (session('username')); ?></a>
            <?php else: ?>
            <a href="<?php echo u('User/register');?>">注册</a>
            <a href="<?php echo u('User/login');?>" id="login">登录</a><?php endif; ?>
    </div>
</div>
<!-- 导航搜索栏 -->
<div class="search">
    <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
        <h1 class="fl"><a href="<?php echo u('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" alt=""></a></h1>
        <div class="bd fl">
            <form action="<?php echo u('Goods/goodsList');?>" method="post" id="searchForm">
                <select class="op">
                    <option value="商品">商品</option>
                    <!--<option value="店铺">店铺</option>-->
                </select>
                <input name="goodsname" type="text" class="msg" placeholder="搜索商品名称" value="<?php echo ($goodsname); ?>">
                <!-- <input class="btn" type="submit" value="搜索"/> -->
            </form>
            <a href="#" class="btn fl" id="goodsSearch">搜索</a><!--
            <p class="msg1">
                <a href="#">干笋 |</a>
                <a href="#">腊肉 |</a>
                <a href="#">银耳环 |</a>
                <a href="#">糯米糕</a>
            </p>-->
        </div>
        <div class="buy clearfix">
            <span class="fl">1</span>
            <a class="fl" href="javascript:void (0);" id="gotocart">购物车(<?php echo ($cartCount); ?>)</a>
            <!-- <p class="fl"></p> -->
        </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <?php if(is_array($firstCate)): $i = 0; $__LIST__ = array_slice($firstCate,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="menu1">
                            <h4><?php echo (mb_substr($vo["catename"],0,10,'UTF-8')); ?></h4>
                            <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo1['id']));?>"><?php echo (mb_substr($vo1["catename"],0,3,'UTF-8')); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="submenu">
                                <h4><?php echo ($vo["catename"]); ?></h4>
                                <?php if(is_array($vo['second'])): $i = 0; $__LIST__ = array_slice($vo['second'],0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1["catename"]); ?></p>
                                    <?php if(is_array($vo1['third'])): $i = 0; $__LIST__ = array_slice($vo1['third'],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo2['id']));?>"><?php echo ($vo2["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                <!--<img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>
                                <img src="/Public/Home/images/menu1.jpg" alt=""/>-->
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo u('Index/index');?>">首页</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>1));?>">生鲜</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>2));?>">食品饮料</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>3));?>">酒类</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>4));?>">地方特产</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>5));?>">全球购美食</a></li>
            </ul>
        </div>

    </div>
</div>

<script type="text/javascript">
    $("#goodsSearch").click(function(){
        if($("input[name=goodsname]").val().length<1){
            layer.msg("搜索商品名称不能为空");
        }else{
            $("#searchForm").submit();
        }
    })

</script>
<!-- 导航开始结束 -->
<!-- 淘宝产品区域开始 -->
<!--当前位置开始-->
<div class="frm_sty now">
    <ul class="clearfix">
        <li>
            <p>当前位置：</p>
        </li>
        <li>
            首页>><?php echo ($catePath); ?>
        </li>
        <li>
            <span><?php echo (mb_substr($detail["goods_name"],0,60,'UTF-8')); ?></span>
        </li>
    </ul>
</div>
<!-- 描述开始 -->
<div class="frm_sty detail clearfix">
<!-- 淘宝风聚焦图 -->
<div class="box">
    <div class="tb-booth tb-pic tb-s310">
        <a href="/upload/n0/<?php echo ((isset($detailimage[0]) && ($detailimage[0] !== ""))?($detailimage[0]):'default.jpg'); ?>"><img src="/upload/n1/<?php echo ((isset($detailimage[0]) && ($detailimage[0] !== ""))?($detailimage[0]):'default.jpg'); ?>"  rel="/upload/n0/<?php echo ((isset($detailimage[0]) && ($detailimage[0] !== ""))?($detailimage[0]):'default.jpg'); ?>" class="jqzoom" /></a>
    </div>
    <ul class="tb-thumb" id="thumblist">
        <?php if(is_array($detailimage)): $k = 0; $__LIST__ = array_slice($detailimage,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="<?php if(($k) == "1"): ?>tb-selected<?php endif; ?>"><div class="tb-pic tb-s40"><a href="#"><img src="/upload/n2/<?php echo ((isset($detailimage[$key]) && ($detailimage[$key] !== ""))?($detailimage[$key]):'default.jpg'); ?>" width="80" height="80" mid="/upload/n1/<?php echo ((isset($detailimage[$key]) && ($detailimage[$key] !== ""))?($detailimage[$key]):'default.jpg'); ?>" big="/upload/n0/<?php echo ((isset($detailimage[$key]) && ($detailimage[$key] !== ""))?($detailimage[$key]):'default.jpg'); ?>"></a></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<!-- 右部描述 -->
<div class="fr">
    <h3><?php echo (mb_substr($detail["goodsname"],0,60,'UTF-8')); ?></h3>
    <p><?php echo (mb_substr(strip_tags($detail["goodsintro"]),0,200,'UTF-8')); ?></p>
    <div class="price">
    <ul class="clearfix">
        <li class="li1">
            <p>价格</p>
        </li>
        <li><p><b style="text-decoration: line-through">市场价:￥<?php echo ($detail["busiprice"]); ?></b></p></li>
        <li>
            <p><b>本站价:￥<?php echo ($detail["siteprice"]); ?></b></p>
        </li>
        <li class="li3">
            <p>已有<span><?php echo (count($pjList)); ?></span>人评价</p>
        </li>
    </ul>
    <ul class="clearfix">
        <li class="li1"><p>净重</p></li>
        <li><p><?php echo ($detail["weight"]); ?></p></li>
    </ul>
    </div>
    <div class="sale clearfix">
        <!--<ul class="clearfix">
            <li class="li1"><p>促销</p></li>
            <li><p>以下促销可在购物车任选其:</p>
            <p><span>满减</span>满68.00元即赠热销商品，赠完即止，请在购物车点击领取</p>
            <p><span>满减</span>满99.00元减20.00,满108.00减30.00</p>
            <p><span>包邮</span>本店消费满￥79包邮</p>
            </li>
        </ul>-->
        <h4>可选属性</h4>
        <ul class="ul2" id="ul2">
            <?php if(is_array($goodsargs)): $i = 0; $__LIST__ = $goodsargs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <p><?php echo ($vo); ?></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="buycar clearfix">
    <p>数量</p>
    <td class="tb1_td5">
        <form method="post" id="form1">
            <input type="hidden" name="goodsargs" value=""/>
            <input type="hidden" name="gid" value="<?php echo ($detail["id"]); ?>"/>
            <input id="min1" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" />
            <input id="text_box1" name="buynum" type="text" value="1" style=" width:30px;height:14px; text-align:center; border:1px solid #ccc;" />
            <input id="add1" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="+" />
        </form>
    </td>
    <a href="#" ><span class="span1">立即购买</span></a>
    <a href="#"><span class="span2">加入购物车</span></a>
    </div>
</div>
</div>
<!-- 描述结束 -->

<!-- 产品详情页开始 -->
<div class="frm_sty container clearfix">
    <!-- 左侧分栏目 -->
    <div class="slidebar">
    <div class="s1">
    <h4 class="title"><a href="#">HOT 热门商品</a></h4>
    <ul>
        <?php if(is_array($hot_tj)): $i = 0; $__LIST__ = array_slice($hot_tj,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('detail',array('id'=>$vo['id']));?>"><img src="/upload/n1/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" alt="" /></a><a href="<?php echo u('detail',array('id'=>$vo['id']));?>"><span class="txt"><?php echo (mb_substr($vo["goodsname"],'0','20','utf-8')); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    </div>
    </div>

    <!-- 右部内容详情 -->
    <div class="content">
    <!-- 标题内容 -->
    <!-- 右侧导航 -->
        <div class="title">
        <ul class="clearfix">
            <li class="focus">
                <a href="javascript:void(0);">产品参数</a>
            </li>
            <li >
                <a href="javascript:void(0);">商品信息</a>
            </li>
            <li>
                <a href="javascript:void(0);">累计评价</a>
            </li>
            <li>
                <a href="javascript:void(0);">食用方法</a>
            </li>
        </ul>
        </div>
    <!-- 商品描述内容 -->
    <div class="m">
        <div class="detail">
            <div class="canshu">
            <ul class="clearfix">
                <li class="li1"><p>产品参数：</p></li>
                <li class="li2"><?php echo (html_entity_decode($detail["goodspro"])); ?></li>
            </ul>
            </div>
        </div>
         <div class="pmsg">
            <h3>商品信息</h3>
            <?php echo (html_entity_decode($detail["goodsdetail"])); ?>
        </div>
        <!-- 累计评价开始 -->
        <div class="msg">
            <h3>累计评价<span>(<?php echo (count($pjList)); ?>条）</span></h3>
            <?php if(is_array($pjList)): $i = 0; $__LIST__ = $pjList;if( count($__LIST__)==0 ) : echo "当前没有此商品评价" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
                    <li class="li1" style="background: url('/upload/UserPic/small/<?php echo ((isset($vo["pic"]) && ($vo["pic"] !== ""))?($vo["pic"]):'default.jpg'); ?>') no-repeat center center;">
                    </li>
                    <li class="li2">
                        <p><?php echo ($vo["pjname"]); ?></p>
                        <p><?php echo ($vo["pjintro"]); ?></p>
                        <p><?php echo (date('Y-m-d',$vo["pjtime"])); ?></p>
                    </li>
                </ul><?php endforeach; endif; else: echo "当前没有此商品评价" ;endif; ?>
        </div>
        <div class="use">
        <h3>食用方法</h3>
        </div>
        </div>
        <!-- 使用方法开始   -->

    </div>
    </div>
    <div>

</div>
<!-- 猜你喜欢 -->
<!--<div class="guess frm_sty clearfix">
    <ul class="ul11">
      <li class="l11"><a href="#">猜您喜欢</a></li>
      <li class="l12"><a href="#">更多></a></li>
    </ul>
    &lt;!&ndash;<ul class="Cont">
        <li><a href="#"><img src="/Public/Home/images/tu1.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu2.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu3.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu4.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu5.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
        <li class="l6"><a href="#"><img src="/Public/Home/images/tu6.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏</span></a></li>
     </ul>&ndash;&gt;
</div>-->
<!-- 底部开始 -->
<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>苗家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>

        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 苗家频道有限公司版权所有 桂ICP备10101010号-201600001</p>

    </div>
</div>
<!-- 返回顶部 -->
<div class="toTop">返回<br/>顶部</div>
<!-- 右侧导航 -->
<div class="rightNav">
  <ul>
    <li class="focus"><a href="#" >产品参数</a></li>
    <li><a href="#">商品信息</a></li>
    <li><a href="#" >累计评价</a></li>
    <li><a href="#">食用方法</a></li>
  </ul>
</div>


<script>
 // 置顶导航的右部导航效果
$(function(){
    $(".rightNav li").click(function(){
        var i=$(this).index();
        T=$(".container .content .m>div").eq(i).offset().top;
        $(this).addClass("focus").siblings().removeClass("focus");
        $("body").animate({scrollTop: T},1000);
    });
   $(document).scroll(function(){
       var T=$("body").scrollTop();
           for(var j=0;j<4;j++){
              divT=$(".container .content .m>div").eq(j).offset().top-70;
              if (T>divT){
                $(".rightNav li").eq(j).addClass("focus").siblings().removeClass("focus");
              }
           }
    });
});
 //右部详情信息的滚屏效果
 $(function(){
    $(".container .content .title li").click(function(){
        var i=$(this).index();
        T=$(".container .content .m>div").eq(i).offset().top;
        $(this).addClass("focus").siblings().removeClass("focus");
        $("body").animate({scrollTop: T},1000);
    });
    $(document).scroll(function(){
       var T=$("body").scrollTop();
           for(var j=0;j<4;j++){
              divT=$(".container .content .m>div").eq(j).offset().top;
              if (T>divT){
                $(".container .content .title li").eq(j).addClass("focus").siblings().removeClass("focus");
              }
           }
    });
});
</script>
</body>
</html>