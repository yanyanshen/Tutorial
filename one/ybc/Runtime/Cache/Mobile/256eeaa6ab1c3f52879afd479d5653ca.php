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
<link rel="stylesheet" href="/Public/Mobile/css/font-awesome-ie7.css">
<link href="/Public/Mobile/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Mobile/css/cart.css"/>
<script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
<script>
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
</script>
</head>
<body>
    <!-- 头部 开始 -->
    <div class="header" style="position: fixed;top: 0rem">
        <div class="shop clearfix">
            <p class="fl">我的购物车</p>
        </div>
    </div>
    <!-- 头部 结束 -->

    <!-- 产品详情 开始-->
    <?php if(empty($goodsCart)): ?><div style="width: 100%;height: 1.5rem;margin-top: 5rem;line-height: 1.5rem;font-size: 0.29rem">
        <img src="/Public/Mobile/images/settleup-nogoods.png" style="width: 1.4rem;height: 1.4rem;margin-left: 1rem"/>
        <span>购物车内暂无商品，赶紧选购吧</span>
    </div>
    <a href="<?php echo U('Category/index');?>">
    <div style="margin-top: 1rem;margin-left: 4rem;width: 1.5rem;height: 0.8rem;background: orangered;color: wheat;font-size: 0.29rem;line-height: 0.8rem;text-align: center;border-radius: 0.1rem">去逛逛</div>
    </a>
    <?php else: ?>
    <form method="post" action="<?php echo U('Order/pay');?>" id="form1">
    <?php if(!isset($_SESSION['ybc_id'])): ?><div style="margin-top: 1.2rem;margin-left: 0.5rem;font-size: 0.22rem">
            您还没有登录！登录后购物车的商品将保存到您账号中
            <input class="toLogin" type="button" value="去登录" style="background: #ff6600;color: #fff;border-radius: 0.08rem"/>
        </div>
        <div class="product">
    <?php else: ?>
        <div class="product" style="margin-top: 1rem"><?php endif; ?>
        <?php if(is_array($goodsCart)): $i = 0; $__LIST__ = $goodsCart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="tab1">
                <tr>
                    <td class="tab1-td1">
                        <input type="checkbox" value="<?php echo ($data["gid"]); ?>" name="checkitems[]" id="newslist-5" style="  width: 0.25rem;height: 0.25rem"/>
                    </td>
                    <td class="tab1-td2">
                        <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($data["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($data["pic"]); ?>"/></a>
                    </td>
                    <td class="tab1-td3">
                        <span style="width: 4rem"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($data["gid"]); ?>" ><?php echo ($data["goodsname"]); ?></a></span>
                        <span class="price" style="margin-top: 0.1rem">
                            ￥<i><?php echo ($data["price"]); ?></i>
                            <span onclick="delCart(<?php echo ($data['gid']); ?>);" style="float: right;margin-right: 0.6rem;color: gray">移除</span>
                        </span>
                        <input style="height: 0.4rem;width: 0.4rem;font-size: 0.18rem" type="button" id="min5" value="-">
                        <input style="width: 0.5rem;text-align: center;height: 0.29rem;font-size: 0.18rem" id="text_box5" name="number_text<?php echo ($data["gid"]); ?>" type="text" value="<?php echo ($data["buynum"]); ?>" onkeyup="changeNum(this)"/>
                        <input style="height: 0.4rem;width: 0.4rem;font-size: 0.18rem" type="button" id="add5" value="+">
                    </td>
                </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
    <!-- 产品详情 结束 -->

    <!-- 全选结算 开始 -->
    <div class="clase" style="position: fixed;bottom: 1rem;">
        <table cellpadding="0" cellspacing="0" class="tab2">
            <tr>
                <td class="tab2-td1">
                    <input id="invert" type="checkbox"/>全选
                </td>
                <td class="tab2-td2" style="padding-right: 0rem">已选商品 <label class="num">0</label> 件</td>
                <td class="tab2-td3" style="padding-right:0.7rem;padding-left:0.1rem;">
                    合计:<span>￥</span><span class="fr"><label id="tatle">0</label></span>
                </td>
                <input type="hidden" name="orderPrice" id="orderPrice"/>
                <td class="tab2-td4" style="padding-right: 0rem"><span class="js" style="color: #ffffff">结算</span></td>
            </tr>
        </table>
    </div>
    </form><?php endif; ?>
    <!-- 全选结算 结束 -->

    <!-- 底部导航 开始 -->
<div class="outside">
    <div class="footer">
        <ul>
            <li><a href="<?php echo U('Index/index');?>">
                <i><span class="i1"></span></i>
                <h5>首页</h5>
            </a></li>
            <li><a href="<?php echo U('Category/index');?>">
                <i><span class="i2"></span></i>
                <h5>分类</h5>
            </a></li>
            <li><a href="<?php echo U('Cart/cart');?>">
                <i class="on"><span class="i3"></span></i>
                <h5>购物车</h5>
            </a></li>
            <li class="end"><a href="<?php echo U('UserCenter/usercenter');?>">
                <i><span class="i4"></span></i>
                <h5>我的</h5>
            </a></li>
        </ul>
    </div>
</div>
    <!-- 底部导航 结束 -->
</body>
<script type="text/javascript">
    $(function(){
        $('.js').click(function(){
            $.post("<?php echo U('Cart/toBuy');?>",function(res){
                if(res.status==1){
                    $.post("<?php echo U('Order/createOrder');?>",$('#form1').serialize(),function(res1){
                        if(res1.status==1){
                            location.href="<?php echo U('Order/orderDetail');?>?id="+res1.info;
                        }else{
                            layer.open({
                                content: '请选择商品'
                                ,skin: 'msg'
                                ,time: 1.5
                            });
                        }
                    })
                }else{
                    location.href="<?php echo U('Login/login');?>";
                }
            })
        })
        $('.toLogin').click(function(){
            $.post("<?php echo U('Cart/toBuy');?>",function(res){
                if(!res.status==1){
                    location.href="<?php echo U('Login/login');?>";
                }
            })
        })
    })

    delCart=function(gid){
        layer.open({
            content: '您确定要把此商品从购物车中移除吗？'
            ,btn: ['不了，再看看吧', '狠心移除']
            ,yes: function(index){
                layer.close(index);
            }
            ,no: function(){
                $.post("<?php echo U('delCart');?>",{gid:gid},function(res){
                    if(res.status==1) {
                        layer.open({
                            content: '移除成功'
                            ,skin: 'msg'
                            ,time: 1.5
                            ,end:function(){
                                location.reload();
                            }
                        });
                    }else{
                        layer.open({
                            content: '移除失败'
                            ,skin: 'msg'
                            ,time: 1.5
                        });
                    }
                })
            }
        });
    }
</script>
</html>