<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
        <meta name="format-detection" content="telephone=no" />
    <title>地址管理</title>
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
			<h3>地址管理</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
    <form action="<?php echo U('Personal/setDefault');?>" method="post" id="form1">
	<div class="contaniner fixed-cont">

		<section class="to-buy">
			<header>
                <?php if(is_array($addressInfo)): $i = 0; $__LIST__ = $addressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i; if($val2['isdefault'] == 1): ?><div class="now">
					<span><img src="/Public/Mobile/images/map-icon.png"/></span>
						<dl>
							<dt>
								<b><?php echo ($val2["name"]); ?></b>
								<strong><?php echo ($val2["mobile"]); ?></strong>
							</dt>
							<dd><?php echo ($val2["address"]); ?></dd>
							<p><a style="color:#CF605D;" href="<?php echo U('Personal/addAddress');?>">新增地址</a></p>
						</dl>
				</div>
                <?php else: ?>
				<div class="to-now">
					<div>
							<!--<label for="tonow"  onselectstart="return false" ></label>-->
							<input style="margin-left:20px;height:30px;height:30px;" value="<?php echo ($val2['id']); ?>" name="radio" type="radio"/>
					</div>
					<dl style="margin-left:10px;">
							<dt>
								<b><?php echo ($val2["name"]); ?></b>
								<strong><?php echo ($val2["mobile"]); ?></strong>
							</dt>
							<dd><?php echo ($val2["address"]); ?></dd>
					</dl>
					<h3>
                        <a style="margin-bottom:10px;" href="<?php echo U('Personal/editAddress',array('id'=>$val2['id']));?>"><img src="/Public/Mobile/images/write.png"/></a>
                        <a style="margin-left:10px;color:#666666" href="javascript:del(<?php echo ($val2['id']); ?>)">删除</a>
                    </h3>
				</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</header>
		</section>

		<!--底部不够-->
		<div style="margin-bottom: 9%;"></div>
	</div>
	<footer class="buy-footer fixed-footer">
				<input id="setdefault" type="button" value="设为默认地址"/>
	</footer>
    </form>
	<script type="text/javascript">
		$(".to-now .tonow label").on('touchstart',function(){
			if($(this).hasClass('ton')){
                $(this).removeClass("ton")
			}else{
                $(this).addClass("ton")
			}
		})
	</script>
<script>
    //设置默认地址
    $(function(){
        $("#setdefault").click(function(){
            $.post("<?php echo U('Personal/setDefault');?>",$("#form1").serialize(),function(res){
                if(res.status=="ok"){
                    //信息框
                    layer.open({
                        content:res.msg
                        ,btn: '我知道了'
                        ,yes:function(index){
                            location.href="<?php echo U('Personal/address');?>";
                            layer.close(index);
                        }
                    });
                }else{
                    //信息框
                    layer.open({
                        content: res.msg
                        ,btn: '我知道了'
                    });
                }
            })
        })
    })
    //地址删除
    function del(id){
        layer.open({
            content: '您确定要删除我吗？'
            ,btn: ['确定', '取消']
            ,yes: function(index){
                $.post("<?php echo U('Personal/del');?>",{id:id},function(res){
                    if(res.status=="ok"){
                        //信息框
                        layer.open({
                            content:res.msg
                            ,btn: '我知道了'
                            ,yes:function(index){
                                location.href="<?php echo U('Personal/address');?>";
                                layer.close(index);
                            }
                        });
                    }else{
                        //信息框
                        layer.open({
                            content: res.msg
                            ,btn: '我知道了'
                        });
                    }
                })
                layer.close(index);
            }
        });
    }
</script>
</body>
</html>