<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>购物车</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Mobile/js/cart.js"></script>
    <script src="/Public/Mobile/js/layer.js"></script>
<link rel="stylesheet" href="/Public/Mobile/css/font-awesome-ie7.css">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/cart.css"/>
<script type="text/javascript">
    (function(){
        function w() {
            var r = document.documentElement;
            var a = r.getBoundingClientRect().width;
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
        //结算按钮更新购物车
        $(".js").click(function(){
            if($("input[name=saveCartPro]").length<=0){
                layer.open({
                    content:"您购物车中没有商品,赶快去选购吧",
                    time:2,
                    end:function(){
                        location.href="<?php echo u('Category/categoryList');?>"
                    }
                })
            }else{
                $("table").each(function(){
                    $(this).find('input[name=saveCartPro]').val($(this).find('input[name=saveCartPro]').val()+$(this).find('.text_box5').val())
                })
                $.ajax({
                    url:"<?php echo u('saveCart');?>",
                    data:{data:$("#form1").serializeArray()},
                    type:"post",
                    success:function(data){
                        layer.open({
                            type:2,
                            time:2,
                            end:function(){
                                location.href="<?php echo u('Order/affirm');?>";
                            }
                        })
                    }
                })
            }
        });

        //删除购物车商品操作
        $(".delCart").click(function(){
            $.ajax({
                type:"post",
                url:"<?php echo u('delCart');?>",
                data:"gid="+$(this).attr('rel')+"&goodsargs="+$(this).attr('mall'),
                success:function(data){
                    layer.open({
                        content:data,
                        btn:['我知道了'],
                        end:function(){
                            location.reload();
                        }
                    })
                }
            })
        })
    })
</script>
</head>
<body>
    <!-- 头部 开始 -->
    <div class="header">
        <div class="shop clearfix">
            <p class="fl">购物车</p>
            <p class="right fr"><a href="#"></a></p>
        </div>
    </div>
    <!-- 头部 结束 -->

    <!-- 产品详情 开始-->
    <div class="product">
        <form id="form1">
            <?php if(is_array($cartList)): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "购物车空空如也" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="tab1">
                    <input type="hidden" name="saveCartPro" value="<?php echo ($vo["gid"]); ?>,<?php echo ($vo["goodsargs"]); ?>,"/>
                    <tr>
                        <td class="tab1-td1 ">
                            <input type="checkbox" value="1" class="newslist-5" />
                        </td>
                        <td class="tab1-td2">
                            <a href="<?php echo u('Goods/detail',array('id'=>$vo['goods']['id']));?>" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',(isset($vo["goods"]["image"]) && ($vo["goods"]["image"] !== ""))?($vo["goods"]["image"]):'default.jpg'))); ?>"/></a></td>
                        <td class="tab1-td3">
                            <a href="<?php echo u('Goods/detail',array('id'=>$vo['goods']['id']));?>" target="_blank"><?php echo (mb_substr($vo["goods"]["goodsname"],0,20,'UTF-8')); ?></a>
                            <span class="tex"><?php echo ($vo["goodsargs"]); ?></span>
                            <span class="price">￥<i><?php echo ($vo["goods"]["siteprice"]); ?></i> &nbsp;&nbsp;<a href="javascript:void (0)" rel="<?php echo ($vo["gid"]); ?>" mall="<?php echo ($vo["goodsargs"]); ?>" class="delCart">删除此商品</a> </span>
                            <input class="min5" type="button" value="-"/>
                            <input class="text_box5" type="text" value="<?php echo ($vo["buynum"]); ?>"/>
                            <input class="add5" type="button" value="+"/>
                        </td>
                    </tr>
                </table><?php endforeach; endif; else: echo "购物车空空如也" ;endif; ?>
        </form>

     </div> 
   
   
    <!-- 产品详情 结束 -->

    <!-- 全选结算 开始 -->
    <div class="clase">
        <table cellpadding="0" cellspacing="0" class="tab2">
            <tr>
                <td class="tab2-td1">
                    <input id="invert" type="checkbox" />全选
                </td>
                <td class="tab2-td2">已选商品 <label class="num">0</label> 件</td>
                <td class="tab2-td3">合计:<span>￥</span><span class="fr"><label id="tatle" style="">0</label></span></td>
                <td class="tab2-td4"><span class="js"><a href="javascript:void (0)">结算</a></span></td>
            </tr>
        </table>
    </div>


    <!-- 全选结算 结束 -->

    <!-- 底部导航 开始 -->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo u('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo u('Category/categoryList');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo u('Cart/cart');?>">
                <i class="on"><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo u('User/member');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
    <!-- 底部导航 结束 -->
</body>
</html>