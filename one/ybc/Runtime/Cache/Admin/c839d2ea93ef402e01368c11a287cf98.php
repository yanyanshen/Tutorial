<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        .formbody{
            width: 600px;
            float: left;
        }
        .leftIm{
            width: 800px;
            height: 600px;
            float: right;
            margin-right: 250px;
        }
        .leftIm ul {
            width: 400px;
            float: left;
            font-size: 14px;
        }
        .leftIm ul li{
            margin-top: 20px;
        }
        .leftIm .image{
            float: right;
        }
    </style>


  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
    <script type="text/javascript">
        $(function(){
            $(".btn").click(function(){
                $.post("<?php echo U('add');?>",$('#form1').serialize(),function(res){
                    if(res){
                       layer.msg(res,{icon:2,time:1500},function(){
                       })
                    }else{
                        layer.confirm('发布成功，还要继续发布吗？',{
                            btn:['不发布了','还要发布'],
                            title:'温馨提示',
                            icon:1
                        },function(){
                            location="<?php echo U('index');?>"
                        },function(){
                            location=location.href;
                        })
                    }
                })
            });

            $("input[name='gid']").blur(function(){
                var gid=$(this).val();
                $.get("<?php echo U('image');?>",{gid:gid},function(res){
                    if(res.status==1){
                        $("span[class='goodsname']").html(res.info['goodsname']);
                        $("span[class='price']").html(res.info['price']);
                        $("span[class='num']").html(res.info['num']);
                        $(".image").html("<img src=\"\"  id=\"pic123\" width=\"400\"/>");
                        $("#pic123").attr({src:"/Uploads/goodsPic/"+res.info['pic']})
                    }else{
                        $(".image").html(res.info).css({color:'red'})
                    }
                })
            })

            $("input[name='gid']").focus(function(){
                $("span[class='price']").html('');
                $("span[class='goodsname']").html('');
                $("span[class='num']").html('');
                $(".image").html('');
            })

        })
    </script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">团购管理</a></li>
    <li><a href="#">发布团购</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <form action="" method="post" id="form1">
    <ul class="forminfo">
    <li><label>商品ID<b>*</b></label><input name="gid" type="text" class="dfinput" value="<?php echo ($info["id"]); ?>"  placeholder="请填写团购商品的ID，如果不清楚，可以查询商品表" style="width:360px;"/></li>
    <li><label>团购价格<b>*</b></label><input name="price" type="text" class="dfinput" value=""  placeholder="请设置团购价格" style="width:360px;"/></li>
    <li><label>团购人数<b>*</b></label><input name="groupnum" type="text" class="dfinput" value=""  placeholder="请设置团购人数" style="width:360px;"/></li>
    <li><label>首席推荐<b>*</b></label>
        <span style="float: left;line-height: 34px;">是:</span><input name="important" type="radio" class="dfinput" value="1"  style="width: 20px;float: left;margin-left: 20px;"/>
        <span style="float: left;padding-left: 100px;line-height: 34px;">否:</span><input checked="checked" name="important" type="radio" class="dfinput" value="0"  style="width: 20px;margin-left: 20px;"/>
    </li>
    <li><label>请选择时间<b>*</b></label>
        <input placeholder="请选择开始日期" style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor: pointer" class="inline laydate-icon" id="start" name="startime" value="" > 至
        <input placeholder="请选择结束日期" style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor:pointer;" class="inline laydate-icon" id="end" name="endtime" value="" >
    </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发布"/></li>
    </ul>

    </form>

    </div>
	</div>
    </div>


<div class="leftIm">
<div style="margin-top: 20px; color:rgb(182,194,154);font-size: 14px;width: 600px;border-bottom: 2px dashed rgb(232,221,203)">
    商品信息预览：
</div>
    <div class="info" style="margin-top: 20px;">
        <ul style="color: rgb(69,137,148)">
            <li>商品名称：</li><span class="goodsname" style="font-size: 14px;color: red"><?php echo ($info["price"]); ?></span>
            <li>商城价格：</li><span  class="price" style="font-size: 14px;color: red"><?php echo ($info["oldprice"]); ?></span>
            <li>数量：</li><span  class="num" style="font-size: 14px;color: red"><?php echo ($info["num"]); ?></span>
        </ul>
        <div class="image">
            <?php if(empty($info)): else: ?>
                <img src="/Uploads/goodsPic/400/400_<?php echo ($info["pic"]); ?>" id=pic123 width="400" alt=""/><?php endif; ?>
        </div>
    </div>
</div>

</body>

</html>

<script type="text/javascript">

    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-06-16',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，充值开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
</script>