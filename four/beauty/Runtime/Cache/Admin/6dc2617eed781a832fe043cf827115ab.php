<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
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

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">系统设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">


        <form action="" method="post" id="form1" enctype="multipart/form-data">
            <?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul class="forminfo">
                    <li>
                        <label>图片主图<b>*</b></label>
                        <img src="/Uploads/<?php echo ($val["imageurl"]); ?>100_<?php echo ($val["imagename"]); ?>" alt=""/>
                    </li>
                    <li>
                        <label>图片名称<b>*</b></label>
                        <input name="" type="text" class="dfinput" value="<?php echo ($val["goodsname"]); ?>"  style="width:518px;"/>
                        <input type="hidden" value="<?php echo ($val["gid"]); ?>" name="gid"/>
                        <input type="hidden" value="<?php echo ($val["oid"]); ?>" name="oid"/>
                        <input type="hidden" value="<?php echo ($val["coaddtime"]); ?>" name="coaddtime"/>
                    </li>
                    <li>用户<b style="margin-right: 55px;">*</b>
                        <input name="" type="text" class="dfinput" value="<?php echo ($val["username"]); ?>"  style="width:100px;"/>
                        <input type="hidden" value="<?php echo ($val["mid"]); ?>" name="mid"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        评价类别<b>*</b>
                        <input name="" type="text" class="dfinput" value="<?php echo ($val["costatus"]); ?>"  style="width:100px;"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        买家评价<b>*</b><input name="" type="text" class="dfinput" value="<?php echo ($val["content"]); ?>"  style="width:518px;"/>
                    </li>
                    <li><label>回复内容<b>*</b></label><textarea  id="" name="content" cols="30" rows="10"  style="width:600px;height:200px;border:1px solid #cccccc;"></textarea></li>
                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            <input id="response" type="button" value="立即回复" style="width: 100px;height: 30px;background-color: #408ad5;border-radius: 5px;margin-left: 300px;"/>
        </form>

    </div>
	</div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(function(){
        $('#response').click(function(){
            $.post("<?php echo U('Admin/Comment/response');?>",$('#form1').serialize(),function(res){
                if(res.status==1){
                    layer.msg(res.info,{time:500},function(){
                        location='<?php echo U("Admin/Comment/index");?>';
                    });
                }
                else{
                    layer.msg('回复内容不能为空',{time:500});
                }
            })
        })
    })
</script>