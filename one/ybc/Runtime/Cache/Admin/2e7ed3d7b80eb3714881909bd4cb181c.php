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
    <script type="text/javascript">
        $(function(){
            $(".btn").click(function(){
                layer.confirm("确认修改？",{
                    btn:['确认','取消'],
                    title:"温馨提示"
                },function(){
                    $.post("<?php echo U('test');?>",$("#form1").serialize(),function(res){
                        if(res){
                            layer.msg(res,{icon:2,time:1500})
                        }else{
                            layer.msg("修改成功",{icon:1,time:1500},function(){
                                location="<?php echo U('index');?>"
                            })
                        }
                    })
                })
            })
        })
    </script>
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

</head>

<body>
	<div class="place" >
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">团购管理</a></li>
    <li><a href="#">发布团购</a></li>
    </ul>
    </div>
    <div class="formbody" style="width: 600px;float: left ;">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
    <form action="" method="post" id="form1">
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
    <ul class="forminfo">
    <li><label>商品名称<b>*</b></label><input name="" readonly type="text" class="dfinput" value="<?php echo ($info["goodsname"]); ?>"  style="width:360px;"/></li>
    <li><label>团购价格<b>*</b></label><input name="price" type="text" class="dfinput" value="<?php echo ($info["price"]); ?>"   style="width:360px;"/></li>
    <li><label>团购人数<b>*</b></label><input name="groupnum" type="text" class="dfinput" value="<?php echo ($info["groupnum"]); ?>"  style="width:360px;"/></li>
    <li><label>首席推荐<b>*</b></label>
        <?php if($info['important'] == 1): ?><span style="float: left;line-height: 34px;">是:</span><input checked="checked" name="important" type="radio" class="dfinput" value="1"  style="width: 20px;float: left;margin-left: 20px;"/>
            <span style="float: left;padding-left: 100px;line-height: 34px;">否:</span><input  name="important" type="radio" class="dfinput" value="0"  style="width: 20px;margin-left: 20px;"/>
            <?php else: ?>
            <span style="float: left;line-height: 34px;">是:</span><input name="important" type="radio" class="dfinput" value="1"  style="width: 20px;float: left;margin-left: 20px;"/>
            <span style="float: left;padding-left: 100px;line-height: 34px;">否:</span><input checked="checked" name="important" type="radio" class="dfinput" value="0"  style="width: 20px;margin-left: 20px;"/><?php endif; ?>
    </li>
    <li><label>请选择时间<b>*</b></label>
        <input  style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor: pointer" class="inline laydate-icon" id="start" name="startime" value="<?php echo (date('Y-m-d',$info["startime"])); ?>" > 至
        <input  style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor:pointer;" class="inline laydate-icon" id="end" name="endtime" value="<?php echo (date('Y-m-d',$info["endtime"])); ?>" >
    </li>
        <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认修改"/></li>
    </ul>
    </form>
    </div>
	</div>
    </div>

    <div class="leftIm" style="width: 600px;height: 400px; float: right;margin-right: 450px;">
    <div style="margin-top: 30px;width: 550px;border-bottom: 2px dashed #ccc;font-size: 14px;color:rgb(182,194,154)">商品图片预览:</div>
     <div style="margin-top: 30px;text-align: center"><img src="/Uploads/goodsPic/800/800_<?php echo ($info["pic"]); ?>" alt="" width="300"/><span style="margin-top: 10px;color: rgb(207,191,140);font-size: 18px;">市场价：￥<?php echo ($info["oldprice"]); ?></span></div>
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
            end.start = datas ;//将结束日的初始值设定为开始日
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