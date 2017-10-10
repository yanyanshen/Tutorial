<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <title>确认订单</title>
    <style type="text/css">
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.28rem; background:#fff;}
        ul,ul li { list-style: none;}
        .myul{ padding: 0 1rem;}
        .myul li{ margin-top: 1rem; }
    </style>
</head>
<script type="text/javascript">
    $(function(){
        selectAddr=function(){
        }
    })
</script>
<body>
<div style=" background: #ee0000; width: 100%;height: 2.5rem;line-height: 2.5rem;padding-right: 0.5rem;">
    <a href="<?php echo U('Order/index');?>" style=" float: right; font-size: 1.3rem;text-decoration: none; color: #fff;">完成</a></div>
<div style="text-align: center;"><img src="/Public/Mobile/images/success.jpg" style="width:40%; margin: 0.5rem auto;" alt=""/></div>
<ul class="myul">
    <li>订单编号：<?php echo ($order["ordersyn"]); ?></li>
    <li>下单时间：<?php echo date("Y-m-d H:i:s",$order['addtime']);?></li>
    <li>送货方式：快递</li>
    <li>支付方式：<?php echo ($order['paymethod']==1?'货到付款':''); echo ($order['paymethod']==2?'支付宝':''); echo ($order['paymethod']==3?'微信':''); ?></li>
</ul>
</body>
</html>