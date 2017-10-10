<?php if (!defined('THINK_PATH')) exit();?><html><head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>html</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="http://at.alicdn.com/t/font_1459473269_4751618.css">
    <link href="/Public/Mobile/integral/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Mobile/integral/css/style.css" rel="stylesheet">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/integral/js/jquery.min.js"></script>
    <script src="/Public/Mobile/integral/js/bootstrap.min.js"></script>
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/integral/css/menu_elastic.css">
    <script src="/Public/Mobile/integral/js/snap.svg-min.js"></script>
    <!--[if IE]>
    <script src="/Public/Mobile/integral/js/html5.js"></script>

    <![endif]-->
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
</head>
<script type="text/javascript">
    $(function(){
        mnext=function(id,status){
            if(status==3){
                layer.open({
                    content:"是否确认收货？",
                    btn:["yes","no"],
                    yes:function(){
                        $.post("<?php echo U('UserCenter/qrsh');?>",{id:id},function(res){
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

            }else if(status==1){
                location="<?php echo U('IntegralOrder/integralOrder');?>?id="+id;
            }else if(status==4){
                location="<?php echo U('IntegralOrder/order');?>?oid="+id+"#Product_List";
            }
        }
    })
</script>

<body class="huibg">

<nav class="navbar text-center" style="background-color: #000;line-height: 3rem">
    <button class="topleft" onclick="javascript:history.go(-1);"><span style="color: #fff;font-size: 2rem">&lt;返回</span></button>
    <a class="navbar-tit center-block" style="color: #ffffff">我的积分</a>
    <!--<button class="topnav" id="open-button"><span class="iconfont icon-1"></span></button>-->
</nav>
<div style="width: 100%;height: 4.2rem;"><span style="font-size: 1.4rem;line-height: 4.2rem"><img src="/Public/Mobile/images/integral11.png" alt="" style="width: 2rem;height: 2rem"/>当前剩余积分：<span style="color: #f00;"><?php echo ($points); ?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 1.4rem"><img src="/Public/Mobile/images/123.png" alt="" style="width: 2rem;height: 2rem"/>消费积分：<span style="color: #f00;"><?php echo ($consume); ?></span></span></div>

<ul id="myTab" class="nav nav-tabs" >
    <li class="active" ><a href="#sp1" data-toggle="tab" id="getintegral">积分获取记录</a>
    </li>
    <li class="" ><a href="#sp2" data-toggle="tab" id="useintegral">积分使用记录</a></li>
</ul>

<div id="myTabContent" class="tab-content" >
    <div class="tab-pane fade active in" id="sp1">
        <ul class="ddlist">
            <?php if(is_array($integralList)): $i = 0; $__LIST__ = $integralList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li style="border: 0.3rem solid #ccc">
                <a href="ddinfo.html">
                    <p>订单时间：<?php echo (date('Y-m-d H:i:s',$val["addtime"])); ?></p>
                    <p>订单号：<?php echo ($val["ordersyn"]); ?></p>
                    <p>订单金额：<?php echo ($val["orderprice"]); ?></p>
                    <p><span>积分：+<?php echo ($val["points"]); ?></span></p>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="sp2">
        <ul class="ddlist">
            <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valu): $mod = ($i % 2 );++$i;?><li style="border: 0.3rem solid #ccc">
                <a href="ddinfo.html">
                    <span style="float: right"><?php echo ($valu["orderstatus"]); ?></span>
                    <p>订单时间：<?php echo (date('Y-m-d H:i:s',$valu["addtime"])); ?></p>
                    <p>订单号：<?php echo ($valu["ordersyn"]); ?></p>
                    <p style="float: right;"><a href="<?php echo U('IntegralOrder/lookorder');?>?id=<?php echo ($valu["id"]); ?>" style="color: #fff;background-color: #999;cursor: pointer;padding: 0.3rem">查看</a>
                        <?php if(($valu['status'] == 1) OR ($valu['status'] == 3)): ?><a onclick="mnext(<?php echo ($valu["id"]); ?>,<?php echo ($valu["status"]); ?>);" style="cursor: pointer;color: #fff;background-color: #999;padding: 0.3rem"><?php echo ($valu["mnext"]); ?></a><?php endif; ?></p>
                    <?php if(($valu['status'] == 1)): ?><p><span>积分：<?php echo ($valu["orderpoints"]); ?></span></p>
                        <?php else: ?>
                        <p><span>积分：-<?php echo ($valu["orderpoints"]); ?></span></p><?php endif; ?>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>


<script src="/Public/Mobile/integral/js/classie.js"></script>
<!--<script src="/Public/Mobile/integral/js/main3.js"></script>-->
<!--<script type="text/javascript">
    $(function(){
        $('#getintegral').click(function(){
            $.get("<?php echo U('userintegral');?>", function (res) {
                $('.tab-content').html(res);
            })
        })
        $('#useintegral').click(function(){
            $.get("<?php echo U('userintegral1');?>", function (res) {
                $('.tab-content').html(res);
            })
        })
    })
    /*function search1(id) {
        var id = id ? id : 1;
        $.get("<?php echo U('userintegral1');?>", {"p": id}, function (res) {
            $('.tab-content').html(res);
        })
    }
    function search(id) {
        var id = id ? id : 1;
        $.get("<?php echo U('userintegral');?>", {"p": id}, function (res) {
            $('.tab-content').html(res);
        })*/
    }
</script>-->
</body></html>