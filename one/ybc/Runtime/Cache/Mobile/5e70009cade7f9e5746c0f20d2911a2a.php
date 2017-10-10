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
    <title>订单详情</title>
    <style type="text/css">
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.28rem; background:#fff;}
        .top { display: inline-block; height: 4rem;background-color: #EE7712; width: 100%; color: #fff;line-height: 4rem; font-size: 1rem; padding-left: 2rem;}
        .shxx { font-size: 0.8rem;}
        .shxx ul li { padding: 0.5rem;}
        .shxx ul li span { float: right;}
        .goods { padding: 0.5rem; height: 7.25rem;background-color: #eee;margin-bottom: 0.2rem;}
        .goods .left { float: left;width: 30%;}
        .goods .right { float: left; margin-left: 1rem; width: 60%; height:6.25rem;position: relative;font-size: 1rem;}
        .goods .right a { text-decoration: none; color: #000;}

        .toComment{ width: 100%;height: 1.5rem;line-height: 1.5rem; font-size: 0.8rem; padding-right: 0.5rem;margin-bottom: 0.2rem; q q q }
        .toComment input { height: 1.5rem;line-height: 1.5rem; font-size: 0.8rem; float: right; background: #ee0000; padding: 0 0.5rem; border: 0; border-radius: 0.2rem; color: #fff;}
    </style>
</head>
<script type="text/javascript">
    $(function(){
        qrsh=function(id){
            layer.open({
                content:"是否确认收获？",
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

        selectAddr=function(){
            location.href="<?php echo U('Order/selectAddr');?>?oid=<?php echo ($info["id"]); ?>";
        }

        toPay=function(oid){
            $.post("<?php echo U('Order/pay');?>",{id:oid,paymethod:$(":radio[name='paymethod']:checked").val()},function(res){
                location.href="<?php echo U('Order/paySuccess');?>?oid="+oid;
            })
        }

        toComment=function(hid,gid){
            location.href="<?php echo U('Order/comment');?>?hid="+hid+"&gid="+gid;
        }
    })
</script>
<body>
<div style="width: 100%;height: 2.5rem;line-height: 2.5rem;padding-left: 0.5rem;"><a href="<?php echo U('Order/index');?>" style="font-size: 1.3rem;text-decoration: none; color: #000;">&lt; 返回</a></div>
<div class="top"><?php echo ($info["status"]); ?></div>
<!--收货信息-->
<div class="shxx">
<ul>
    <li onclick="<?php echo ($info['orderstatus']==1?'selectAddr()':''); ?>">收货人：<?php echo ($info["name"]); ?><span><?php echo ($info["phone"]); ?></span></li>
    <li onclick="<?php echo ($info['orderstatus']==1?'selectAddr()':''); ?>">收货地址：<?php echo ($info["address"]); ?></li>
    <li>订单编号：<?php echo ($info["ordersyn"]); ?></li>
    <li>支付方式：
        <input type="radio" <?php echo ($info['orderstatus']==1?'':'disabled'); ?> <?php echo ($info['paymethod']==1?'checked':''); ?> name="paymethod" id="radio1" value="1"/><label for="radio1">货到付款</label>
        <input type="radio" <?php echo ($info['orderstatus']==1?'':'disabled'); ?> <?php echo ($info['paymethod']==2?'checked':''); ?> name="paymethod" id="radio2" value="2"/><label for="radio2">支付宝</label>
        <input type="radio" <?php echo ($info['orderstatus']==1?'':'disabled'); ?> <?php echo ($info['paymethod']==3?'checked':''); ?> name="paymethod" id="radio3" value="3"/><label for="radio3">微信</label>
    </li>
</ul>
</div>
<!--商品详情-->
<?php if(is_array($info["goods"])): $i = 0; $__LIST__ = $info["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="goods">
        <a class="left" href="<?php echo U('Detail/detail');?>?id=<?php echo ($v["gid"]); ?>"><img class="img" src="/Uploads/goodsPic/100/100_<?php echo ($v["pic"]); ?>" alt=""></a>
        <div class="right">
            <p><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($v["gid"]); ?>"><?php echo mb_substr($v['goodsname'],0,25,'utf-8');?></a></p>
            <p style="position: absolute;bottom: 0; width: 100%;font-size: 0.8rem;" class="money">单价：￥<?php echo ($v["price"]); ?><span style="float: right;">×<?php echo ($v["buynum"]); ?>件 </span></p>
        </div>
    </div>
    <?php if(($info["orderstatus"]) == "4"): if($v['sfpj'] == 0): ?><div class="toComment"><input type="button" onclick="toComment(<?php echo ($v["id"]); ?>,<?php echo ($v["gid"]); ?>);" value="去评价"/></div>
            <?php else: ?>
            <div class="toComment"><input type="button" disabled style="background: #fff; color: #000;" value="已评价"/></div><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
<div class="shxx">
    <ul>
        <li>商品总价：<span>￥<?php echo ($info["orderprice"]); ?></span></li>
        <li>运费(快递)：<span>￥<?php echo ($info["postage"]); ?></span></li>
        <li>订单总价：<span>￥<?php echo ($info["orderprice"]); ?></span></li>
        <li>积分：<span>￥<?php echo ($info['points']?$info['points']:$info['orderprice']); ?></span></li>
    </ul>
</div>
<div style="height: 2.1rem;"></div>
<?php if(($info["orderstatus"]) != "4"): ?><div onclick="<?php echo ($info['orderstatus']==0?'del':''); echo ($info['orderstatus']==1?'toPay':''); echo ($info['orderstatus']==2?'txfh':''); echo ($info['orderstatus']==3?'qrsh':''); ?>(<?php echo ($info["id"]); ?>)" style="position: fixed;bottom: 0; width: 100%; background: #EE7712; color: #fff; font-size: 1.2rem;text-align: center; padding: 0.3rem;"><?php echo ($info["mnext"]); ?></div>
<?php else: ?>
    <div onclick="history.back();" style="position: fixed;bottom: 0; width: 100%; background: #EE7712; color: #fff; font-size: 1.2rem;text-align: center; padding: 0.3rem;">返回</div><?php endif; ?>
</body>
</html>