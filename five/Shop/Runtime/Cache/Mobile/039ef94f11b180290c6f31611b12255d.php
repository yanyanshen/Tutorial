<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的订单</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
      <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
    <script type="text/javascript">
    	$(window).load(function(){
    		$(".loading").addClass("loader-chanage")
    		$(".loading").fadeOut(300)
    	})
    </script>
    <style>
        #orderPage{height:30px;margin-bottom:20px;width:100%;line-height:30px;font-size:16px;text-align:center}
        #orderPage span{display:inline-block;height:30px;background-color:#F2F2F2;}
        #orderPage a{display:inline-block;height:30px;}
    </style>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
<body>
	<header class="top-header fixed-header">
		<a class="icona" href="javascript:history.go(-1)">
				<img src="/Public/Mobile/images/left.png"/>
			</a>
		<h3>我的订单</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
	
	<div id="box" class="contaniner fixed-conta">
		<section class="order">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><dl>
				<dt>
                    <time>订单编号:<?php echo ($value["order_syn"]); ?></time><br/>
					<time>下单时间:<?php echo date("Y-m-d",$value["addtime"]);?></time>
					<span><?php echo ($value['status']["status_name"]); ?></span>
				</dt>
                <?php if(is_array($value['goods'])): $i = 0; $__LIST__ = $value['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul>
					<a href="detail.html">
						<figure><img src="/Public/Admin/Uploads/goods/<?php echo ($val['pic']); ?>"/></figure>
						<li>
							<p><?php echo ($val['goodsname']); ?></p>
							<!--<small>颜色：经典绮丽款</small>
							<span>尺寸：XL</span>-->
							<b>￥<?php echo ($val['price']); ?></b>
							<strong>×<?php echo ($val['buynum']); ?></strong>
						</li>
					</a>
				</ul><?php endforeach; endif; else: echo "" ;endif; ?>
				<dd>
					<h3>商品总额</h3>
					<i>￥<?php echo ($value["order_price"]); ?></i>
				</dd>
				<dd>
                    <?php if($value['status']['id'] == 1): ?><input onclick="topay(<?php echo ($value['id']); ?>)" id="pay" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                        <?php elseif($value['status']['id'] == 2): ?>
                        <input type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                        <?php elseif($value['status']['id'] == 3): ?>
                        <input onclick="confirm(<?php echo ($value['id']); ?>)" id="confirm" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                        <?php elseif($value['status']['id'] == 4): ?>
                        <input onclick="comment(<?php echo ($value['id']); ?>)" id="comment" type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/>
                        <?php elseif($value['status']['id'] == 5): ?>
                        <input type="button" value="<?php echo ($value['status']['member_opt']); ?>" class="order-que"/><?php endif; ?>
					<!--<input type="button" value="查看物流" onclick="javascript:location.href='wuliu.html'" />-->
					<input onclick="delOrder(<?php echo ($value['id']); ?>)" type="button" value="删除订单" />
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>
		</section>
        <div id="orderPage"><?php echo ($page); ?></div>
        <input type="hidden" name="order_status" value="<?php echo ($where); ?>" id="where">
	</div>

</body>
<script>
    //异步分页
    function page(id){
        var wh=$("#where").val();
        var id=id?id:1;
        $.get("<?php echo U('Personal/order');?>",{"p":id,"order_status":wh},function(res){
            $('#box').html(res);
        })
    }
    //订单删除
    function delOrder(oid){
        //询问框
        layer.open({
            content: '您确定要删除我吗？'
            ,btn: ['确定', '取消']
            ,yes: function(index){
                $.get("<?php echo U('Order/delOrder');?>",{id:oid},function(res){
                    if(res.status=="ok"){
                        //信息框
                        layer.open({
                            content:res.msg
                            ,btn: '我知道了'
                            ,yes:function(index){
                                location.reload();
                                layer.close(index);
                            }
                        });
                    }else{
                        //信息框
                        layer.open({
                            content:res.msg
                            ,btn: '我知道了'
                        });
                    }
                })
                layer.close(index);
            }
        });
    }
    //去付款
    function topay(oid){
        window.location.href="<?php echo U('Order/orderList');?>?oid="+oid;
    }
    //去签收
    function confirm(oid){
        $.get("<?php echo U('Order/confirm');?>",{id:oid},function(res){
            if(res.status=="ok"){
                //信息框
                layer.open({
                    content:res.msg
                    ,time: 2
                    ,end:function(index){
                        location.reload();
                        layer.close(index);
                    }
                });
            }else{
                //信息框
                layer.open({
                    content:res.msg
                    ,btn: '我知道了'
                });
            }
        })
    }
    //去评价
    function comment(oid){
        window.location.href="<?php echo U('Personal/comment');?>?oid="+oid;
    }
</script>
</html>