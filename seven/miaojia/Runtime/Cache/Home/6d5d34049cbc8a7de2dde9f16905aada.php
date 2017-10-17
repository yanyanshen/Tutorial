<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>购物车</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="/Public/Home/style/reset.css" />
<link rel="stylesheet" href="/Public/Home/style/shoppingcar.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/shoppingcar.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer.js"></script>
    <script type="text/javascript">
        function GetCount() {
            var conts = 0;
            var aa = 0;
            $(".gwc_tb2 .newslist").each(function () {
                $(this).attr('checked',true);
                $(this).attr('disabled',true);
                $("#invert").attr('checked',true);
                $("#invert").attr('disabled',true);
                if ($(this).attr("checked")) {
                    for (var i = 0; i < $(this).length; i++) {
                        conts += parseInt($(this).val());
                        aa += 1;
                    }
                }
            });
            $("#shuliang").text(aa);
            $("#zong1").text((conts).toFixed(2));
            if(parseFloat($("#zong1").text())){
                $("#jz1").css("display", "none");
                $("#jz2").css("display", "block");
            }else{
                $("#jz1").css("display", "block");
                $("#jz2").css("display", "none");
            }
        }
        $(function(){
            $("input[type=text]").keyup(function(){
                $(this).each(function(){
                    if(!$(this).val()){
                        $(this).val("1");
                    }
                })
            })

            GetCount();

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
            $(".btn1").click(function(){
                $.ajax({
                    type:'get',
                    url:"<?php echo u('delCart');?>",
                    data:"gid="+$(this).attr('rel')+"&goodsargs="+$(this).attr('args'),
                    success:function(data){
                        if(data=='删除成功'){
                            location.reload();
                        }else{
                            layer.msg(data);
                        }
                    }
                })
            });

            $(".btn2").click(function(){
                $.ajax({
                    type:'get',
                    url:"<?php echo u('addToSc');?>",
                    data:"gid="+$(this).siblings('a').attr('rel'),
                    success:function(data){
                        layer.msg(data,{
                            icon:1,
                            time:3000
                        },function(){
                            location.reload();
                        })
                    }
                })
            });

            $("#safe_logout").click(function () {
                $.ajax({
                    type:"GET",
                    url:"<?php echo u('User/logout');?>",
                    success:function(){
                        layer.msg("安全退出",{
                            icon:1,
                            time:1000
                        },function(){
                            location.href="<?php echo u('Index/index');?>";
                        });
                    }
                })
            });

            //提交购物车
            $("#jz2").click(function(){
                var flag=0;
                $("input[type=text]").each(function(){
                    if(parseInt($(this).val())<=0){
                        layer.msg("购买商品数量必须大于0,请检查");
                    }else{
                        flag+=1;
                    }
                });
                if(flag==$("input[type=text]").length){
                    for(i=0;i<=$(".gwc_tb2 .newslist").length;i++){
                        $("#cartPro"+i).val($("#cartPro"+i).val()+$("#text_box"+i).val());
                    }
                    $.ajax({
                        url:"<?php echo u('saveCart');?>",
                        data:{data:$("#form1").serializeArray()},
                        type:"post",
                        success:function(data){
                            if(data=='购买数量非法'){
                                layer.msg(data,'',function(){
                                    location.reload();
                                })
                            }else{
                                location.href="<?php echo u('Order/affirm');?>";
                            }
                        }
                    })
                }
            })
            //全选
            $("#invert").click(function () {
                $(".gwc_tb2 .newslist").each(function () {
                    if ($("#invert").attr("checked")) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                });
                GetCount();
            });

            //计算金额
            $(".gwc_tb2 .newslist").click(function () {
                GetCount();
            });
        })
    </script>


</head>
<body>


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
<!-- 全部商品 开始 -->
<div class="name frm_sty clearfix">
    <p class="p1">全部商品</p>
    <i></i>
</div> 

<div class="gwc" style=" margin:auto;">
  <table cellpadding="0" cellspacing="0" class="gwc_tb1">
    <tr>
      <td class="tb1_td1"><input id="invert" type="checkbox" /></td>
      <td class="tb1_td2">全选</td>
      <td class="tb1_td3">商品名称(商品属性)</td>
      <td class="tb1_td4">单价（元）</td>
      <td class="tb1_td5">数量</td>
      <td class="tb1_td6">小计</td>
      <td class="tb1_td7">编辑</td>
    </tr>
  </table>
    <form id="form1">
        <?php if(is_array($cartList)): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2">
                <input type="hidden" name="saveCartPro" value="<?php echo ($vo["gid"]); ?>,<?php echo ($vo["goodsargs"]); ?>," id="cartPro<?php echo ($key); ?>"/>
                <tr>
                    <td class="tb2_td1"><input type="checkbox" value="<?php echo ($vo['buynum']*$vo['goods']['siteprice']); ?>" class="newslist" id="newslist-<?php echo ($key); ?>"/></td>
                    <td class="tb2_td2"><a href="#"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["goods"]["image"]) && ($vo["goods"]["image"] !== ""))?($vo["goods"]["image"]):'default.jpg'))); ?>"/></a></td>
                    <td class="tb2_td3"><a href="#"><?php echo ($vo["goods"]["goodsname"]); ?></a>&nbsp;&nbsp;(<?php echo ($vo["goodsargs"]); ?>)</td>
                    <td class="tb2_td4<?php echo ($key); ?>"><span><?php echo ($vo["goods"]["siteprice"]); ?></span>元</td>
                    <td class="tb2_td5">
                        <input id="min<?php echo ($key); ?>" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
                        <input id="text_box<?php echo ($key); ?>" name="buynum<?php echo ($key); ?>" type="text" value="<?php echo ($vo["buynum"]); ?>" style=" width:30px; text-align:center; border:1px solid #ccc;" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" />
                        <input id="add<?php echo ($key); ?>" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
                    </td>
                    <td class="tb2_td6"><label id="total<?php echo ($key); ?>" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
                    <td class="tb2_td7"><a href="javascript:void (0);" class="btn1" rel="<?php echo ($vo["gid"]); ?>" args="<?php echo ($vo["goodsargs"]); ?>">删除</a><br/><?php if(in_array(($vo["gid"]), is_array($userSc)?$userSc:explode(',',$userSc))): ?>已关注此商品<?php else: ?><a href="javascript:void (0);" class="btn2">移到我的关注</a><?php endif; ?></td>
                </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>

<?php echo ($page); ?>

  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
    <tr>
      <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
      
      <td class="tb3_td3">合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style=""></label>  </span> </td>
      
      <td class="tb3_td4"><span id="jz1">暂无选中商品</span><a href="javascript:void(0)" style=" display:none;"  class="jz2" id="jz2">提交订单</a></td>
    </tr>
  </table>
</div>
<!-- 猜您喜欢 开始 -->
<div class="guess frm_sty clearfix">
    <ul class="ul11">
      <li class="l11"><a href="#">猜您喜欢</a></li>
      <li class="l12"><a href="#">更多></a></li>
    </ul>
    
    <ul class="Cont">
        <li><a href="#"><img src="/Public/Home/images/tu1.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu2.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu3.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu4.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu5.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l6"><a href="#"><img src="/Public/Home/images/tu6.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l7"><a href="#"><img src="/Public/Home/images/tu7.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l8"><a href="#"><img src="/Public/Home/images/tu8.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
     </ul>
  
</div>
<!-- 猜您喜欢  -->

 <!-- 底部  开始-->
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
        <p>Copyright © 2016-2028 <?php echo C('WEB_NAME');?>版权所有 <?php echo C('WEB_ICP');?></p>

    </div>
</div>
    
<!-- 底部 结束 -->
<!---商品加减算总数-->
  <script type="text/javascript">
  $(function () {
      <?php $__FOR_START_26809__=0;$__FOR_END_26809__=10;for($i=$__FOR_START_26809__;$i < $__FOR_END_26809__;$i+=1){ ?>var t<?php echo ($i); ?> = $("#text_box<?php echo ($i); ?>");
    $("#add<?php echo ($i); ?>").click(function () {
        if(!t<?php echo ($i); ?>.val()){
            t<?php echo ($i); ?>.val("1");
        }else{
            t<?php echo ($i); ?>.val(parseInt(t<?php echo ($i); ?>.val()) + 1);
        }
      setTotal<?php echo ($i); ?>(); GetCount();
    })
    $("#min<?php echo ($i); ?>").click(function () {
      t<?php echo ($i); ?>.val(parseInt(t<?php echo ($i); ?>.val()) - 1);
       if (t<?php echo ($i); ?>.val()<0){ t<?php echo ($i); ?>.val(0);}
      setTotal<?php echo ($i); ?>(); GetCount();
    })
    function setTotal<?php echo ($i); ?>() {
      $("#total<?php echo ($i); ?>").text((parseInt(t<?php echo ($i); ?>.val()) * parseFloat($(".tb2_td4<?php echo ($i); ?> span").text())).toFixed(2));
          $("#newslist-<?php echo ($i); ?>").attr('value',(parseInt(t<?php echo ($i); ?>.val()) * parseFloat($(".tb2_td4<?php echo ($i); ?> span").text())).toFixed(2));
    }
    setTotal<?php echo ($i); ?>();<?php } ?>
  })
  </script>

  <!---总数-->
  <script type="text/javascript">
// 猜您喜欢 覆盖层
 $(function(){
        //给每个li中a添加元素overlay
        $(".guess li").append("<span class='overlay'></span>");
        //经过li时让overlay,txt过渡动画
        $(".guess li").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });

  </script>
    
</body>
</html>