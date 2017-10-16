<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
        <meta name="format-detection" content="telephone=no" />
    <title>去结算</title>
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
			<h3>去结算</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
	<form action="<?php echo U('Pay/payList');?>" method="post" id="form1">
        <input type="hidden" name="oid" value="<?php echo ($oid); ?>">
	<div class="contaniner fixed-cont">
		<section class="to-buy">
			<header>
				<div class="now">
					<span><img src="/Public/Mobile/images/map-icon.png"/></span>
						<dl>
							<dt>
								<b><?php echo ($addInfo["name"]); ?></b>
								<strong><?php echo ($addInfo["mobile"]); ?></strong>
							</dt>
							<dd><?php echo ($addInfo["address"]); ?></dd>
							<p><a href="<?php echo U('Address/otherAddress',array('oid'=>$oid));?>">其他地址</a></p>
						</dl>
				</div>
				
				<div class="to-now">
					<div class="tonow">
							<label for="tonow"  onselectstart="return false" ></label>
							<input name="address" type="radio" value="<?php echo ($addInfo['id']); ?>" id="tonow"/>
					</div>
					<dl>
							<dt>
								<b><?php echo ($addInfo["name"]); ?></b>
								<strong><?php echo ($addInfo["mobile"]); ?></strong>
							</dt>
							<dd><?php echo ($addInfo["address"]); ?></dd>
					</dl>
					<h3><a href="<?php echo U('Address/editAddress',array('id'=>$addInfo['id'],'oid'=>$oid));?>"><img src="/Public/Mobile/images/write.png"/></a></h3>
				</div>
			</header>
			<div class="buy-list">
                <?php if(is_array($goodsInfo)): $k1 = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($k1 % 2 );++$k1;?><ul>
					<a href="<?php echo U('Detail/detail',array('gid'=>$val1['id']));?>">
						<figure>
							<img src="/Public/Admin/Uploads/goods/<?php echo ($val1['pic']); ?>"/>
						</figure>
						<li>
							<h3><?php echo ($val1['goodsname']); ?></h3>
							<span>
								颜色：经典绮丽款
							</span>
							<b>￥<?php echo ($val1['price']); ?></b>
							<small>×<?php echo ($val1['buynum']); ?></small>
						</li>
					</a>
				</ul><?php endforeach; endif; else: echo "" ;endif; ?>
				<dl>
					<dd>
						<span>运费</span>
						<small>包邮</small>
					</dd>
					<dd>
						<span>商品总额</span>
						<small>￥<?php echo ($orderInfo["order_price"]); ?></small>
					</dd>
					<dt>
						<textarea name="content" rows="4" placeholder="给卖家留言（50字以内）"></textarea>
					</dt>
				</dl>
			</div>
			
		</section>
		<!--底部不够-->
		<div style="margin-bottom: 9%;"></div>
	</div>
	
	<footer class="buy-footer fixed-footer">
			<p> 
				<small>总金额</small>
				<b>￥<?php echo ($orderInfo["order_price"]); ?></b>
			</p>
				
				<input id="subPay" type="button" value="去付款"/>
	</footer>
    </form>
	<script type="text/javascript">
		$(".to-now .tonow label").on('touchstart',function(){
			if($(this).hasClass('ton')){
				$(".to-now .tonow label").removeClass("ton")
			}else{
				$(".to-now .tonow label").addClass("ton")
			}
		})
        $(function(){
            $("#subPay").click(function(){
                $.post("<?php echo U('Pay/paylist');?>",$("#form1").serialize(),function(res){
                    if(res.status=="ok"){
                        layer.open({
                            content:res.msg
                            ,btn: '去支付'
                            ,yes:function(index){
                                location.href="<?php echo U('Pay/payList');?>?order_syn="+res.order_syn+"&order_price="+res.order_price+"&oid="+res.oid;
                                layer.close(index);
                            }
                        });
                    }else{
                        layer.open({
                            content:res.msg
                            ,btn: '我看看'
                        });
                    }
                })
                return false;
            })
        })
	</script>

</body>
</html>