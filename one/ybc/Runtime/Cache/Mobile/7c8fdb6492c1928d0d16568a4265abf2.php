<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>我的订单</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/indent.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/common.css"/>
    <style type="text/css">
        .menu { padding: 0;}
        .menu ul li { width: 20%; margin: 0; text-align: center;}
        .menu ul li.on { border-bottom: 1px solid #f00; }
        .menu ul .on a{ color:#f00 !important;}
        .search { height: 0.6rem; border: 0.007rem solid #ccc; border-radius: 0.02rem; width: 90%;float: left;}
        .sear { height: 0.7rem; width: 9%; float: right; background: url("/Public/Mobile/images/search1.png") no-repeat; background-position: center center; background-size: 0.5rem;}
    </style>
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
    </script>
    <script type="text/javascript">
        $(function(){
            $("#getMore").click(function() {
                        $.post("<?php echo U('Order/getMore');?>", {status: "<?php echo ($status?$status:''); ?>",keywords:"<?php echo ($keywords); ?>" ,start: "<?php echo ($start); ?>"}, function (res) {
                            $("#getMore").replaceWith(res);
                        })
                    }
            )
        })

        txfh=function(id){
            layer.open({content:"已发送提醒"});
        }

        qrsh=function(id){
            layer.open({
                content:"是否确认收货？",
                btn:["yes","no"],
                yes:function(){
                    $.post("<?php echo U('Order/qrsh');?>",{id:id},function(res){
                        if(res.status==1){
                            layer.open({content:res.info,btn:'我知道了',shadeClose:false,yes:function(index){
                                location.reload();
                                layer.close(index);
                            }});
                        }else{
                            layer.open({content:res.info});
                        }
                    })
                }
            })
        }

        goDetail=function(id){
            location.href="<?php echo U('Order/orderDetail');?>?id="+id;
        }

        search=function(){
            keywords=$(".search").val();
            location.href="<?php echo U('Order/index');?>?keywords="+keywords+"<?php echo ($status?'&status=':''); echo ($status?$status:''); ?>";
        }
    </script>
</head>
<body>
<div style="display: inline-block; background:#000;color:#fff;width: 100%;height: 1rem;line-height: 1rem;padding-left: 0.2rem;">
    <a href="<?php echo U('UserCenter/userCenter');?>" style="font-size: 0.5rem;text-decoration: none; color: #fff  ;">&lt; 我的订单</a>
</div>
<!-- 头部 开始 -->
<div class="header bk">
    <input class="search" name="keywords" type="text" value="<?php echo ($keywords); ?>" placeholder="订单编号"><div onclick="search()" class="sear"></div>
</div>
<!-- 头部 结束 -->
<!-- 菜单 开始 -->
<div class="menu">
    <ul>
        <li class="<?php echo ($status?'':'on'); ?> all"><a href="<?php echo U('Order/index'); echo ($keywords?'?keywords=':''); echo ($keywords?$keywords:''); ?>" class="one">全部</a></li>
        <li class="<?php echo ($status==1?'on':''); ?>"><a href="<?php echo U('Order/index');?>?status=1<?php echo ($keywords?'&keywords=':''); echo ($keywords?$keywords:''); ?>">待付款</a></li>
        <li class="<?php echo ($status==2?'on':''); ?>"><a href="<?php echo U('Order/index');?>?status=2<?php echo ($keywords?'&keywords=':''); echo ($keywords?$keywords:''); ?>">待发货</a></li>
        <li class="<?php echo ($status==3?'on':''); ?>"><a href="<?php echo U('Order/index');?>?status=3<?php echo ($keywords?'&keywords=':''); echo ($keywords?$keywords:''); ?>">待收货</a></li>
        <li class="<?php echo ($status==4?'on':''); ?>"><a href="<?php echo U('Order/index');?>?status=4<?php echo ($keywords?'&keywords=':''); echo ($keywords?$keywords:''); ?>">待评价</a></li>
    </ul>
</div>
<!-- 菜单 结束 -->
<?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="evaluate">
    <div class="evaluate-top">
        <?php switch($v["orderstatus"]): case "1": ?><p><a href="javascript:goDetail(<?php echo ($v["id"]); ?>);"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
            <?php case "2": ?><p><a href="javascript:txfh(<?php echo ($v["id"]); ?>);"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
            <?php case "3": ?><p><a href="javascript:qrsh(<?php echo ($v["id"]); ?>);"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
            <?php case "4": ?><p><a href="javascript:goDetail(<?php echo ($v["id"]); ?>);"><?php echo ($v["mnext"]); ?></a></p><?php break;?>
            <?php default: ?>
            <p><a href="#"><?php echo ($v["mnext"]); ?></a></p><?php endswitch;?>
        <p style="padding-left: 0.28rem;color: #000" onclick="goDetail(<?php echo ($v["id"]); ?>)"><?php echo ($v["ordersyn"]); ?></p>
    </div>
    <?php if(is_array($v["goods"])): $i = 0; $__LIST__ = $v["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="evaluate-bottom clearfix">
            <p class="fl"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($va["gid"]); ?>"><img src="/Uploads/goodsPic/100/100_<?php echo ($va["pic"]); ?>" alt=""></a></p>
            <div class="evaluate-bottom-right fl" style="width: 60%;">
                <p><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($va["gid"]); ?>"><?php echo ($va["goodsname"]); ?></a></p>
                <p class="money">￥<?php echo ($va["price"]); ?><span>×<?php echo ($va["buynum"]); ?>件</span></p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(empty($orderList)): ?><div style="text-align: center; font-size: 0.5rem;">没有订单信息</div>
    <?php else: ?>
    <div id="getMore" style="text-align: center;height: 30px;line-height: 30px;margin-top: -25px;">点击加载更多</div><?php endif; ?>
</body>

</html>