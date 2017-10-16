<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>商城</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/swiper.min.css"/>
      <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js" type="text/javascript"></script>
    <script type="text/javascript">
    	$(window).load(function(){
    		$(".loading").addClass("loader-chanage")
    		$(".loading").fadeOut(300)
    	})
       function collect(gid){
           $.get("<?php echo U('Detail/collect');?>","gid="+gid,function(res){
               if(res.status==1) {
                   layer.open({content: res.msg, skin: 'msg', time: 2})
                   $('.collect img').attr("src", "/Public/Mobile/images/detail-heart-lv.png")}
               else if(res.status==2){layer.open({content: res.msg, skin: 'msg', time: 2})}
               else{layer.open({content: res.msg, skin: 'msg', time: 2})}
           })
        }
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
	<header class="detail-header fixed-header">
		<a href="javascript:history.go(-1)"><img src="/Public/Mobile/images/detail-left.png"/></a>
		<a href="<?php echo U('Cart/cartList');?>" class="right"><img src="/Public/Mobile/images/shopbar.png"/></a>
	</header>
	<form action="<?php echo U('Cart/addToCart');?>" method="post" id="form2">
	<div class="contaniner fixed-contb">
		<section class="detail">
			<figure class="swiper-container">
				<ul class="swiper-wrapper">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="swiper-slide">
                            <a href="#">
                                <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($val['picname']); ?>"/>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="swiper-pagination">
				</div>
			</figure>
			<dl class="jiage">
				<dt>
					<h3><?php echo (mb_substr($detail["goodsname"],0,30,'utf-8')); ?></h3>

                <!--收藏这儿 需要用户登陆-->
                    <div class="collect">

                        <?php if($cid != null): ?><a href="javascript:collect(<?php echo ($gid); ?>)">
                                <img src="/Public/Mobile/images/detail-heart-lv.png"/>
                                <p>收藏</p>
                            </a>
                        <?php else: ?>
                            <?php if($_SESSION['shop_']['mid']!= null): ?><a href="javascript:collect(<?php echo ($gid); ?>)">
                                <img src="/Public/Mobile/images/detail-heart-hei.png"/>
                                <p>收藏</p>
                                </a>
                             <?php else: ?>
                                <a href="<?php echo U('Detail/tologin',array('gid'=>$detail['id']));?>">
                                    <img src="/Public/Mobile/images/detail-heart-hei.png"/>
                                    <p>收藏</p>
                                </a><?php endif; endif; ?>
					</div>

				</dt>
				<dd>
                    <input name="price" type="hidden" value="<?php echo ($detail["price"]); ?>">
					<b>￥<?php echo ($detail["price"]); ?></b>
					<del>￥<?php echo ($detail["marketprice"]); ?></del>
                    <span style="color: rgba(83, 83, 83, 0.87)">库存量<?php echo ($detail["num"]); ?></span>
					<small>+<?php echo (floor($detail['price']/10)); ?>积分</small>
				</dd>
			</dl>
<!--			<div class="chose">
				<ul>
					<h3>颜色</h3>
					<li>黑色</li>
					<li>粉色</li>
					<li>灰色</li>
					<li>红色</li>
				</ul>
				<ul>
					<h3>尺寸</h3>
					<li>L</li>
					<li>XL</li>
					<li>XXL</li>
				</ul>
			</div>-->
			
			<div class="seven" style="background: #fff;">
				<span id="sss">
                    购买数量:
                    <div style="width: 20px;height: 40px;margin: -20px 0 0 90px;position: relative;">
                       <input style="width:30px;float: left;position: absolute;"  readonly class="text" name="buynum" id="buy-num" value="1" onkeyup="setAmount.modify('#buy-num');">
                    <div style="position: absolute;float: left;left: 50px;top:-8px;color:#535353">
                        <a class="btn-add" id="jian" href="javascript:jia();">+</a>
                        <a class="btn-reduce" id="jia" href="javascript:jian()" >-</a>
                    </div>
                    </div>
                    <input id="gid" name="gid" type="hidden" value="<?php echo ($gid); ?>"/><!--为购物流程保存的商品id-->
                </span>
                <script type="text/javascript">
                    //加
                    function jia(){
                        var num=document.getElementById("buy-num").value;
                        num++;
                        if(num > <?php echo ($detail['num']); ?>){
                            num=<?php echo ($detail['num']); ?>;
                        }
                        document.getElementById("buy-num").value=num;
                    }
                    //减
                    function jian(){
                        var num=document.getElementById("buy-num").value;
                        num--;
                        if(num  <= 1){
                            num=1;
                        }
                        document.getElementById("buy-num").value=num;
                    }
                    </script>

			</div>
			
			<ul class="same">
                <span>同类推荐</span>
                    <?php if(is_array($tj)): $i = 0; $__LIST__ = $tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Detail/detail',array('gid'=>$value['id']));?>">
                        <li class="one" style="margin: 0 4px;">
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($value['pic']); ?>"/>
                            <p>￥<?php echo ($value["price"]); ?></p>
                        </li>
                            </a><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
			
			<article class="detail-article">
				<nav>
					<ul class="article">
						<li id="talkbox1" class="article-active">商品详情</li>
						<li id="talkbox2">评价</li>
					</ul>
				</nav>

				<section class="talkbox1">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div >
                                <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($val['picname']); ?>" style="width:300px;height: 300px;margin-left: 57px;"/>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div style="margin-top: 10px;text-align: center;">产品描述:<?php echo ($detail["description"]); ?></div>
				</section>

				<section class="talkbox2" style="display: none;">
					<ul class="talk">
                        <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                                <figure>
                                    <?php if($value['pic'] != null): ?><img src="/Public/Admin/Uploads/member/thumb100/100_<?php echo ($value['pic']); ?>"/>
                                        <?php else: ?>
                                    <img src="/Public/Mobile/images/null.gif"/><?php endif; ?>
                                </figure>
                                <dl>
                                    <dt>
                                        <p><?php echo ($value["username"]); ?></p>
                                        <time><?php echo date('Y-m-d H:i:s',$value['addtime']);?></time>
                                    <?php if($value['start'] != null): ?><div class="star">
                                            <?php $__FOR_START_6946__=0;$__FOR_END_6946__=$value['start'];for($i=$__FOR_START_6946__;$i < $__FOR_END_6946__;$i+=1){ ?><span><img src="/Public/Mobile/images/detail-iocn01.png"/></span><?php } ?>
                                            <?php $__FOR_START_6579__=$value['start'];$__FOR_END_6579__=5;for($i=$__FOR_START_6579__;$i < $__FOR_END_6579__;$i+=1){ ?><span><img src="/Public/Mobile/images/detail-iocn001.png"/></span><?php } ?>
                                        </div><?php endif; ?>
                                    </dt>
                                    <dd><?php echo ($value["commentcontent"]); ?></dd>
                                    <?php if(is_array($value['picname'])): $i = 0; $__LIST__ = $value['picname'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/Public/Admin/Uploads/comments/<?php echo ($v['picname']); ?>" style="width: 70px;height: 70px;float: left;margin-left: 5px;"><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                                    <?php if($value['replycontent'] != null): ?><br /><br /><br /><br />
                                        <dd><span style="color:#e15e6b;">商家回复:</span><?php echo ($value['replycontent']); ?></dd><?php endif; ?>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</section>
			</article>
		</section>
	</div>
	
	
		<footer class="detail-footer fixed-footer">
			<a href="#" class="go-car">
				<input id="subCart" type="button" value="加入购物车"/>
			</a>
			<a href="javascript:toBuyCreateOrder()" class="buy">
				立即购买
			</a>
		</footer>
    </form>
    <input type="hidden" value="<?php echo (session('mid')); ?>" id="mid">
<script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(window).scroll(function() {
	    if ($(".detail-header").offset().top > 50) {
        $(".detail-header").addClass("change");
    } else {
        $(".detail-header").removeClass("change");
    }
	});
</script>
<script src="/Public/Mobile/js/swiper.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			var mySwiper = new Swiper('.swiper-container',{
				    loop: true,
				    speed:1000,
					autoplay: 2000,
					pagination: '.swiper-pagination',
				  });
		})
	</script>
<script type="text/javascript">
	$(function(){
		$('.chose li').click(function(){
				
			$(this).addClass('chose-active').siblings().removeClass('chose-active');

			var tags=document.getElementsByClassName('chose-active');//获取标签

			var tagArr = "";
	        for(var i=0;i < tags.length; i++)
	        {
	            tagArr += tags[i].innerHTML;//保存满足条件的元素

	        }
	       
	        $('#sss').html(tagArr);

		});

		$('.article li').click(function(){

			$(this).addClass('article-active').siblings().removeClass('article-active');
			if($(this).attr("id")=="talkbox1"){
				$('.talkbox1').show();
				$('.talkbox2').hide();
			}else{
				$('.talkbox2').show();
				$('.talkbox1').hide();
			}

		});	
	});
    //加入购物车
        $(function(){
            $("#subCart").click(function(){
                $.post("<?php echo U('Cart/addToCart');?>",$("#form2").serialize(),function(res){
                    if(res.status=="ok"){
                        layer.open({
                            content: res.msg
                            ,btn: ['去我的购物车', '再逛逛']
                            ,yes: function(index){
                                location.href="<?php echo U('Cart/cartList');?>"
                                layer.close(index);
                            }
                            ,no: function(index){
                                location.href="<?php echo U('Index/index');?>"
                                layer.close(index);
                            }
                        });
                    }else{
                        layer.open({
                            content: res.msg
                            ,btn: '我知道了'
                        });
                    }
                })
            })
        })
    //立即购买
    function toBuyCreateOrder(){
        var mid=document.getElementById("mid").value;
        var gid=document.getElementById("gid").value;
        if(mid){
            $.post("<?php echo U('Order/toBuyCreateOrder');?>",$("#form2").serialize(),function(res){
                if(res.status=="ok"){
                    layer.open({
                        content: res.msg
                        ,btn: ['去付款']
                        ,yes: function(index){
                            location.href="<?php echo U('Order/orderList');?>?oid="+res.oid
                            layer.close(index);
                        }
                    });
                }else{
                    layer.open({
                        content: res.msg
                        ,btn: '我知道了'
                    });
                }
            })
        }else{
            layer.open({
                content:"登陆后才能购买"
                ,btn: ['去登陆','再逛逛']
                ,yes:function(index){
                    location.href="<?php echo U('Detail/tologin');?>?gid="+gid;
                    layer.close(index);
                }
            });
        }

    }

</script>
</body>
</html>