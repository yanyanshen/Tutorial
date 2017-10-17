<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no" />
<title>我的订单-<?php echo C('WEB_NAME');?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/indent.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css"/>
<script>
(function(){
    function w() {
    var r = document.documentElement;
    var a = r.getBoundingClientRect().width;
    // console.log(a);
        if (a > 750 ){
            a = 750;
        } 
        rem = a / 7.5;
        r.style.fontSize = rem + "px"
    }
    var t;
    w();
    window.addEventListener("resize", function() {
        clearTimeout(t);
        t = setTimeout(w, 300)
    }, false);
})();
$(function(){
    $("#returnGoods").click(function(){
        layer.open({
            content:"暂不支持退货操作!"
        })
    });
    $("#returnGoods").click(function(){
        layer.open({
            content:"暂不支持退款操作!",
            btn:['知道了']
        })
    })

    //付款操作
    $(".toPay").click(function(){
        $.ajax({
            type:"post",
            url:"<?php echo u('Order/payOver');?>",
            data:"ordersyn="+$(this).attr('rel'),
            success:function(data){
                layer.open({
                    type:2,
                    time:2,
                    shadeClose:false,
                    end:function(){
                        layer.open({
                            content:data,
                            time:2,
                            end:function(){
                                location.href="<?php echo u('order',array('s'=>2));?>";
                            }
                        })
                    }
                })
            }
        })
    });

    //确认收货操作
    $(document).on('click','#confirmSh',function(){
        $.ajax({
            type: "post",
            url: "<?php echo u('User/confirmSh');?>",
            data: "ordersyn=" + $("input[name=ordersyn]").val()+"&passwd="+$("input[name=passwd]").val(),
            success: function (data) {
                layer.open({
                    type: 2,
                    time: 2,
                    shadeClose: false,
                    end: function () {
                        layer.open({
                            content: data,
                            time: 2,
                            end: function () {
                                location.reload();
                            }
                        })
                    }
                })
            }
        })
    })
    $(".toConfirm").click(function(){
        var me =$(this);
        layer.open({
            content: "确认后款项将会立即打给卖家,请谨慎操作!",
            btn: ['确认', '取消'],
            shadeClose:false,
            style:"width:2rem;",
            yes: function (index) {
                layer.close(index);
                var passform="<div style='padding: 0.1rem 0.1rem;'>" +
                        "<input type='password' name='passwd' style='width:1.8rem;height: 0.35rem;line-height: 0.35rem;border: 0.01rem solid #333'/><input type='hidden' name='ordersyn'/> &nbsp;&nbsp;" +
                        "<a href='javascript:void(0)' style='font-size: 0.26rem' id='confirmSh'>确认</a> </div>";
                layer.open({
                    type: 1,
                    title:"请输入密码确认收货",
                    content: passform,
                    anim: 0,
                    style: 'border-radius:0.05rem;padding:0.2rem'
                });
                $("input[name=ordersyn]").val(me.attr('rel'));
            }
        })
    });

    //评价操作
    $(document).on('click','.pjsubmit',function(){
        if($("textarea[name=pjintro]").val().length<1){
            layer.open({
                content:"评价内容不能为空!",
                time:2
            })
        }else{
            $.ajax({
                type:"post",
                url:"<?php echo u('toPj');?>",
                data:"gid="+$('#pjgid').val()+"&pjintro="+$("textarea[name=pjintro]").val()+"&goodsargs="+$('#pjgoodsargs').val()+"&orderid="+$('#pjorderid').val(),
                success:function(data){
                    layer.open({
                        type:2,
                        time:2,
                        end:function(){
                            layer.open({
                                content:data,
                                time:2,
                                end:function(){
                                    location.reload();
                                }
                            })
                        }
                    })
                }
            })
        }
    });
    $(".toPj").click(function(){
        var me=$(this);
        var pjdiv='<div class="pj"><input type="hidden" id="pjgid" value="'+me.attr('rel')+'"/><input type="hidden" id="pjorderid" value="'+me.attr('orderid')+'"/><input type="hidden" id="pjgoodsargs" value="'+me.attr('mall')+'"/> <textarea name="pjintro"></textarea><br/><button class="pjsubmit">提交评价</button></div>';
        var index=layer.open({
            title:['感谢您的评价','background-color:#8DCE16; color:#fff;'],
            content:pjdiv,
            shadeClose:false
        })
    })
})
</script>
</head>
<body>

    <!-- 菜单 开始 -->
    <div class="menu">
        <ul>
            <li class="all"><a href="<?php echo u('order');?>" class="one">全部</a></li>
            <li><a href="<?php echo u('order',array('s'=>1));?>">待付款</a></li>
            <li><a href="<?php echo u('order',array('s'=>2));?>">待发货</a></li>
            <li><a href="<?php echo u('order',array('s'=>3));?>">待收货</a></li>
            <li><a href="<?php echo u('order',array('s'=>4));?>">待评价</a></li>
            <li class="refund"><a href="javascript:void (0)" class="two" id="returnGoods">退款</a></li>
        </ul>
    </div>
    <!-- 菜单 结束 -->



<?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "暂无此状态商品" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; switch($vo["orderstatus"]): case "1": ?><div class="payment">
                <div class="payment-top">
                    <p >未付款</p>
                    <p class="txt01"><a href="javascript:void (0)" rel="<?php echo ($vo["ordersyn"]); ?>" class="toPay">付款</a></p>
                </div>
                <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="payment-bottom clearfix">
                        <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo2["image"]) && ($vo2["image"] !== ""))?($vo2["image"]):'default.jpg'))); ?>" alt="商品图片"></a></p>
                        <div class="payment-bottom-right fl">
                            <p><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>" target="_blank" title="<?php echo ($vo2["goodsname"]); ?>"><?php echo (mb_substr($vo2["goodsname"],0,25,'UTF-8')); ?></a>
                            </p>
                            <p class="money">￥<?php echo ($vo2["siteprice"]); ?><span><?php echo ($vo2["buynum"]); ?>件</span><span style="color:#f00;font-weight: bold">小计<?php echo ($vo2['buynum']*$vo2['siteprice']); ?>元</span></p>
                        </div>
                    </div><?php endforeach; endif; else: echo "暂无此状态商品" ;endif; ?>
            </div><?php break;?>
        <?php case "2": ?><div class="payment">
                <div class="payment-top">
                    <p >待发货</p>
                    <p class="txt01"><a href="#">待发货</a></p>
                </div>
                <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="payment-bottom clearfix">
                        <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo2["image"]) && ($vo2["image"] !== ""))?($vo2["image"]):'default.jpg'))); ?>" alt="商品图片"></a></p>
                        <div class="payment-bottom-right fl">
                            <p><a href="#"><?php echo (mb_substr($vo2["goodsname"],0,20,'UTF-8')); ?></a>
                            </p>
                            <p class="money">￥<?php echo ($vo2["siteprice"]); ?><span><?php echo ($vo2["buynum"]); ?>件</span><span style="color:#f00;font-weight: bold">小计<?php echo ($vo2['buynum']*$vo2['siteprice']); ?>元</span></p>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php break;?>
        <?php case "3": ?><div class="goods">
                <div class="goods-top">
                    <p><?php echo ($vo["logisticsname"]); ?>:<?php echo ($vo["logisticsinfo"]); ?></p>
                    <p class="txt01"><a href="javascript:void (0)" rel="<?php echo ($vo["ordersyn"]); ?>" class="toConfirm">收货</a></p>
                </div>
                <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="goods-bottom clearfix">
                        <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo2["image"]) && ($vo2["image"] !== ""))?($vo2["image"]):'default.jpg'))); ?>" alt="商品图片"></a></p>
                        <div class="goods-bottom-right fl">
                            <p><a href="#"><?php echo (mb_substr($vo2["goodsname"],0,20,'UTF-8')); ?></a>
                            </p>
                            <p class="money">￥<?php echo ($vo2["siteprice"]); ?><span><?php echo ($vo2["buynum"]); ?>件</span><span style="color:#f00;font-weight: bold">小计<?php echo ($vo2['buynum']*$vo2['siteprice']); ?>元</span></p>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php break;?>
        <?php case "4": ?><div class="evaluate">
                <div class="evaluate-top">
                    <p >待评价</p>
                </div>
                <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="evaluate-bottom clearfix">
                        <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo2["image"]) && ($vo2["image"] !== ""))?($vo2["image"]):'default.jpg'))); ?>" alt="商品图片"></a></p>
                        <div class="evaluate-bottom-right fl">
                            <p><a href="#"><?php echo (mb_substr($vo2["goodsname"],0,20,'UTF-8')); ?></a>
                            </p>
                            <p class="money">￥<?php echo ($vo2["siteprice"]); ?><span><?php echo ($vo2["buynum"]); ?>件</span><span style="color:#f00;font-weight: bold">小计<?php echo ($vo2['buynum']*$vo2['siteprice']); ?>元</span></p>
                        </div>
                        <p class="pj"><?php if(($vo2["isPj"]) == "1"): ?>已评价<?php else: ?><a href="javascript:void (0)" rel="<?php echo ($vo2["id"]); ?>" class="toPj" mall="<?php echo ($vo2["ordergoodsargs"]); ?>" orderid="<?php echo ($vo["id"]); ?>">去评价</a><?php endif; ?></p>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php break;?>

        <?php case "5": ?><div class="evaluate">
                <div class="evaluate-top">
                    <p >已评价</p>
                </div>
                <?php if(is_array($vo["ordergoods"])): $i = 0; $__LIST__ = $vo["ordergoods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="evaluate-bottom clearfix">
                        <p class="fl"><a href="<?php echo u('Goods/detail',array('id'=>$vo2['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo2["image"]) && ($vo2["image"] !== ""))?($vo2["image"]):'default.jpg'))); ?>" alt="商品图片"></a></p>
                        <div class="evaluate-bottom-right fl">
                            <p><a href="#"><?php echo (mb_substr($vo2["goodsname"],0,20,'UTF-8')); ?></a>
                            </p>
                            <p class="money">￥<?php echo ($vo2["siteprice"]); ?><span><?php echo ($vo2["buynum"]); ?>件</span><span style="color:#f00;font-weight: bold">小计<?php echo ($vo2['buynum']*$vo2['siteprice']); ?>元</span></p>
                        </div>
                        <p class="pj"><?php if(($vo2["isPj"]) == "1"): ?>已评价<?php else: ?><a href="javascript:void (0)" rel="<?php echo ($vo2["id"]); ?>" class="toPj" mall="<?php echo ($vo2["ordergoodsargs"]); ?>" orderid="<?php echo ($vo["id"]); ?>">去评价</a><?php endif; ?></p>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>

    <?php echo ($page); ?>

    <!--底部导航  开始-->
    <div class="outside">
        <div class="footer">
            <ul>
                <li><a href="<?php echo u('Index/index');?>">
                    <i><span class="i1"></span></i>
                    <h5>首页</h5>
                </a></li>
                <li><a href="<?php echo u('Goods/goodsList');?>">
                    <i><span class="i2"></span></i>
                    <h5>分类</h5>
                </a></li>
                <li><a href="<?php echo u('Cart/cart');?>">
                    <i><span class="i3"></span></i>
                    <h5>购物车</h5>
                </a></li>
                <li class="end"><a href="<?php echo u('User/member');?>">
                    <i class="on"><span class="i4"></span></i>
                    <h5>我的</h5>
                </a></li>
            </ul>
        </div>
    </div>
    <!--底部导航  结束-->
</body> 
</html>