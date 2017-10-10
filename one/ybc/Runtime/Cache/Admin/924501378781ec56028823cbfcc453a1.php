<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单详情</title>
    <meta name="keywords" content="标题">
    <meta name="description" content="内容">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/index.css">
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="/Public/Admin/css/membercenter.css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">
        .ordersta01,.ordersta02,.ordersta03{ padding-left:80px!important;}
        .ordersta01{ font-size:16px; font-weight:700; background:url(/Public/Admin/images/orderstate.png) no-repeat 35px 5px;}
        .ordersta02{ color:#CCC}
        .ordersta02 span{ color:#333; padding:0 5px;}
        .ordersta02 span i{ color:#F7980A}
        .ordersta03{ margin:10px 0 15px;}
        .orderstaa01{ padding:5px 12px; background-color:#D80C18; color:#FFFFFF;}
        .orderstaa02{ margin-left:20px; color:#88C6E2}
        .orderproduct{ }
        .orderpro01{ height:40px; line-height:40px; background-color:#F7F7F7; border-bottom:1px solid #D9D9D9}
        .orderpro01 span{ height:40px; line-height:40px; padding:0 20px;}
        .orderpro01 .orderprospan03{ border-right:0}
        .orderpro01 span i{ color:#969696}
        .orderprocon{ padding:0 20px 20px;}
        .orderproinfo{ border-bottom:2px solid #E8E8E8!important}
        .orderproinfo span{ font-size:14px; font-weight:700; display:inline-table; width:60px; text-align:center; height:35px; line-height:35px; border-bottom:2px solid #88C6E2; margin-bottom:-2px; color:#000!important;}
        .orderprodiv{ padding:12px 0 22px;width:40%; padding-right:5%; float:left;}
        .orderprodiv p{ height:35px; line-height:35px;}
        .orderprodiv p span{ color:#969696; display:inline-table; width:60px; text-align:right; padding-right:20px;}
        .orderinfomation{ width:100%; text-align:center}
        .orderinfomation thead tr{ height:35px; line-height:35px; color:#969696; font-weight:700;}
        .orderinfomation tbody td{ border:1px solid #E8E8E8;}
        .orderdetitle{ width:30%; padding:10px 0;}
        .orderdestate{ width:20%;}
        .orderdejiage{ width:10%;}
        .orderdesum{ width:10%;}
        .orderdepinjia{ width:20%;}
        .orderdezjia{ width:10%; }
        .orderdezjia02{ font-weight:700; font-size:14px;}
        .orderdetitle img{ float:left;}
        .orderdetitle p{ float:left; width:415px; padding:10px;}
        .orderdetitle p a,.orderdestatguo{ color:#0088ff}
        .orderdetitle p a:hover{ color:#D80C18}
        .orderdestameiguo{ color:#F7980A}
        .ordersumer{ background-color:#F7F7F7; border:1px solid #e8e8e8; text-align:right;padding-top:20px; padding-right:10px; height:50px; line-height:50px;}
        .orderred{ color:#f00;}
        .selmore{ padding-left:10px; color:#209FE0}
        .wuliucon{ position: absolute;left:0;;*top:20px;color:#666;color:#555;z-index:99999;text-align: left;top:180px;width:399px;background-color:#f8f8f8;color: #474747;padding-bottom: 10px;border: 1px solid #88C6E2;padding:15px 8px;display:none}
        .wuliuconn{ padding:4px;}
        .wlconleft{ float: left;}
        .wlconright{ float: left; padding-left:10px; width:160px;text-align: left;}
        .wuliudiv{ border: 1px solid #f7980a;padding: 8px;}
        .wuliuimg{ margin-bottom: -1px;padding-left:95px;vertical-align: bottom;}
        .wuliupp i{ font-weight: 700;}
        .remarks{ border: 1px solid #ccc; width: 100%; font-size: 16px;}
    </style>
</head>
<script type="text/javascript">
    $(function(){
        layer.ready(function(){ //为了layer.ext.js加载完毕再执行
            layer.photos({
                photos: '#picList',
                shift: 5, //0-6的选择，指定弹出图片动画类型，默认随机
                offset: 0
            });
        });

        allow=function(){
            layer.confirm("是否通过？",function(){
                $.post("<?php echo U('Services/allow');?>",{ id:<?php echo ($sid); ?>},function(res){
                    layer.msg(res.info,{time:1000},function(){
                        location.href=document.referrer;
                    });
                });

            });
        }

        deny=function(){
            layer.confirm("是否拒绝？",function(){
                $.post("<?php echo U('Services/deny');?>",{ id:<?php echo ($sid); ?>},function(res){
                    layer.msg(res.info,{time:1000},function(){
                        location.href=document.referrer;
                    });
                });

            });
        }

        saveRemarks=function(){
            $.post("<?php echo U('Services/saveRemarks');?>",{ id:<?php echo ($sid); ?>,remarks:$("#remarks").val()},function(res){
                layer.alert(res.info);
            });
        }
    })
</script>
<body>
<div class="buyerbox box">

    <p class="orderpro01"><span><i>申请信息</i></span></p>
    <div class="orderprocon">
        <div class="clearfix" style="width:100%;">
            <div class="orderprodiv clearfix">
                <p class="orderproinfo"><span>商品信息</span></p>
                <p><span>商品名称：</span><em class="orderred"><?php echo mb_substr($info['goodsname'],0,35,'utf-8');?></em></p>
                <p><span>商品价格：</span>￥<?php echo ($info["price"]); ?></p>
                <p><span>商品数量：</span><?php echo ($info["buynum"]); ?></p>
            </div>
            <div class="orderprodiv clearfix" style="position:relative">
                <p class="orderproinfo orderproinfo001"><span>商品图片</span></p>
                <img src="/Uploads/goodsPic/400/400_<?php echo ($info["pic"]); ?>" style=" width: 400px; height: 400px; margin-top: 10px;" alt=""/>
            </div>
            <div class="orderprodiv clearfix" style="position:relative;margin-top: -200px;">
                <p class="orderproinfo orderproinfo001"><span>用户信息</span></p>
                <p><span>用户名：</span><?php echo ($info["username"]); ?></p>
                <p><span>申请时间：</span><?php echo date("Y-m-d",$info['applytime']);?></p>
                <p><span>申请类型：</span><em class="orderred"><?php echo ($info['type']==1?'换货':'退货'); ?></em></p>
                <p><span>申请状态：</span>
                    <?php if(($info["status"]) == "1"): ?>未处理<?php endif; ?>
                    <?php if(($info["status"]) == "2"): ?>未通过<?php endif; ?>
                    <?php if(($info["status"]) == "3"): ?>已通过<?php endif; ?>
                    <?php if(($info["status"]) == "4"): ?>顾客取消<?php endif; ?>
                </p>
                <?php if(($info["status"] == 2) OR ($info["status"] == 3)): ?><p><span>处理人：</span><?php echo ($info["aname"]); ?></p>
                    <p><span>处理时间：</span><?php echo ($info["cltime"]); ?></p><?php endif; ?>
            </div>

        </div>
        <p class="orderproinfo"><span>申请理由</span></p>
        <div style="padding:30px 0;">
            <?php echo ($info["reason"]); ?>
        </div>
        <p class="orderproinfo"><span>详细说明</span></p>
        <div style="padding:30px 0;">
            <?php echo ($info["message"]); ?>
        </div>
        <p class="orderproinfo"><span>图片说明</span></p>
        <div style="padding:30px 0;" id="picList">
            <?php if(empty($picList)): ?><span style="color: #ff5555;font-size: 20px;">无图片</span>
                <?php else: ?>
                <?php if(is_array($picList)): $k = 0; $__LIST__ = $picList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($k % 2 );++$k;?><img id='pic<?php echo ($k); ?>' width='350' src='/Uploads/servicePic/<?php echo ($va); ?>' alt='图片说明'/><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <p class="orderproinfo"><span>备注</span></p>
        <div style="padding:30px 0;">
            <textarea name="remarks" id="remarks" <?php echo ($info['status']==4?'disabled':''); ?> class="remarks" cols="30" rows="2"><?php echo ($info["remarks"]); ?></textarea>
        </div>
        <div class="ordersumer" id="buy" style="background-color: #fff; border: 0px;">
            <?php if(($info["status"]) != "4"): ?><a href="javascript:saveRemarks();" class="tobuy">保存备注</a><?php endif; ?>
            <?php if(($info["status"]) == "1"): ?><a href="javascript:allow();" class="tobuy">通过</a>
                <a href="javascript:deny();" class="tobuy">拒绝</a>
                <a href="javascript:history.go(-1);" class="tobuy">暂不处理</a>
                <?php else: ?>
                <a href="javascript:history.go(-1);" class="tobuy">返回</a><?php endif; ?>
        </div>




    </div>
</div>
</body>

</html>