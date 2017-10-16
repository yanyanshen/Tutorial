<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的足迹</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
      <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
      <script type="text/javascript" src="/Public/Mobile/js/jaliswall.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style>
        .contaniner .list .wall{position: relative; display: block; width: 100%; overflow: hidden; margin: 2% 0; z-index: 0;}
        .contaniner .list .wall .pic{ width:100%; margin-bottom: 8%; float: left; background-color: #fff; padding-bottom: 3%;}
        .contaniner .list .wall .pic a{ width: 100%; display: block;}
        .contaniner .list .wall .pic img{ width: 100%;}
        .contaniner .list .wall .pic p{ font-size: 1.45em; width: 90%; margin: 2% 5%; text-align: justify; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #333;}
        .contaniner .list .wall .pic b{ color: #FC605A; font-size: 1.7em; font-weight: normal; margin-right: 4%; margin-left: 4%; }
        .contaniner .list .wall .pic del{ color: #999; font-size: 1.169em; }
        #orderPage{height:30px;margin-bottom:20px;width:100%;line-height:30px;font-size:16px;text-align:center}
        #orderPage span{display:inline-block;height:30px;background-color:#F2F2F2;}
        #orderPage a{display:inline-block;height:30px;}
    </style>
    <script type="text/javascript">
    	$(window).load(function(){
    		$(".loading").addClass("loader-chanage")
    		$(".loading").fadeOut(300);
    		$('.wall').jaliswall({ item: '.pic' });
    		$(".text-top").on("touchstart",function(){
    			$(".collectbar").fadeToggle(500);
    		});
    	})
    	function mycheck(val)
		{
			if($("#collect"+val).is(':checked'))
			{
				$(".label"+val).addClass("collectd");
				$(".collectbox").fadeIn(300)
				$(".kong").fadeIn()
			}
			else
			{
				$(".label"+val).removeClass("collectd");
				$(".collectbox").fadeOut(300)
				$(".kong").fadeOut()
			}
		}

        $(function() {
            $(".collectbox").click(function () {
                var spCodesTemp = "";
                $('input:checkbox:checked').each(function (i) {
                    if (i == 0) {
                        spCodesTemp = $(this).val();
                    }
                    else {
                        spCodesTemp += ("," + $(this).val());
                    }
                });
                layer.open({
                    content: '您确定要删除吗？'
                    , btn: ['删除', '不要']
                    , yes: function () {
                        $.get("<?php echo U('Personal/footdel');?>", "cid=" + spCodesTemp, function (res) {
                            if (res.status == 1) {
                                layer.open({
                                    content: res.msg
                                    , skin: 'msg'
                                    , time: 1 //2秒后自动关闭
                                });
                                location.reload();
                            } else {
                                layer.open({
                                    content: '删除失败'
                                    , skin: 'msg'
                                    , time: 1 //2秒后自动关闭
                                });
                            }
                        })
                    }
                });
            })
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
		<h3>我的足迹</h3>
			
			<a class="text-top">
				编辑
			</a>
	</header>
	
	<div id="box" class="contaniner fixed-conta">
		<div style="margin-top: 3%;"></div>
		<section class="list">
			<ul class="wall">

                <?php if(is_array($foot)): $i = 0; $__LIST__ = $foot;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="pic">
                        <a href="<?php echo U('Detail/detail',array('gid'=>$value['gid']));?>">
                            <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($value['pic']); ?>"/>
                            <p><?php echo ($value["goodsname"]); ?></p>
                            <b>￥<?php echo ($value["price"]); ?></b><del>￥<?php echo ($value["marketprice"]); ?></del>
                            <div class="collectbar">
                                <label for="collect<?php echo ($value['id']); ?>"  onselectstart="return false" class="label<?php echo ($value['id']); ?>"></label>
                                <input type="checkbox" value="<?php echo ($value['id']); ?>" onclick="mycheck(<?php echo ($value['id']); ?>)" id="collect<?php echo ($value['id']); ?>"/>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
			</ul>
		</section>
		<div class="kong" style="margin-bottom: 16%;"></div>
        <div id="orderPage"><?php echo ($page); ?></div>
	</div>
	
<footer class="collectbox fixed-footer">
	
	<input type="button" value="确认删除" />
</footer>

</body>
<script>
    //异步分页
    function page(id){
        var id=id?id:1;
        $.get("<?php echo U('Personal/foot');?>",{"p":id},function(res){
            $('#box').html(res);
        })
    }
</script>

</html>