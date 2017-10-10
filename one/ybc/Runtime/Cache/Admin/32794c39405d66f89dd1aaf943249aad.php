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
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        .formbody{
            width:800px;
            float: left;
        }
        .leftBody{
            width: 800px;
            float: right;


            margin-right: 70px;
            text-align: center;
        }
    </style>
<script type="text/javascript">
    $(function(){
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                filterMode: true,
                afterBlur:function(){
                    this.sync('#content7');
                }
            });
        });
    })
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
                $.post("<?php echo U('send_mail');?>",$("#form1").serialize(),function(res){
                    if(res.status==1){
                        layer.msg("团购消息发送成功!",{icon:6,time:2000},function(){
                            location=location.href;
                        })
                    }else{
                        layer.msg(res.info,{icon:5,time:2000})
                    }
                })
            })
        })
    </script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">团购管理</a></li>
    <li><a href="#">发送团购提醒</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <form action="" method="post" id="form1">
    <ul class="forminfo">
        <li><label>团购ID<b>*</b></label><input name="gid" type="text" class="dfinput" value=""  placeholder="请填写您要发送团购商品的ID，参考右边开团信息表" style="width:360px;"/></li>

        <li><label>消息标题<b>*</b></label><input name="title" type="text" class="dfinput" value=""  placeholder="请填写消息标题" style="width:360px;"/></li>

        <li><label>消息内容<b>*</b></label>
            <textarea id="content7" name="content" style="width:670px;height:250px;visibility:hidden;"></textarea>
        </li>



    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发送"/></li>
    </ul>

    </form>

    </div>
	</div>
    </div>

<div class="leftBody">

    <table class="tablelist" style="margin-top: 20px;">
        <caption style="color:black;font-size:18px;font-weight: bolder;margin-bottom: 10px;">
            已开团商品
        </caption>
        <thead>
        <tr >
            <th style="text-align: center">团购ID<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
            <th style="text-align: center">商品图片</th>
            <th style="text-align: center">商品名称</th>

            <th style="text-align: center">团购价格</th>
            <th style="text-align: center">开团人数</th>
            <th style="text-align: center">已报名人数</th>

        </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="text-align: center">
                <td><?php echo ($val["gid"]); ?></td>
                <td><img src="/Uploads/goodsPic/100/100_<?php echo ($val["pic"]); ?>" alt="" width="100"/></td>
                <td><?php echo ($val["goodsname"]); ?></td>
                <td><?php echo ($val["price"]); ?></td>
                <td><?php echo ($val["groupnum"]); ?></td>
                <td><?php echo ($val["applynum"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>


</div>



</body>

</html>