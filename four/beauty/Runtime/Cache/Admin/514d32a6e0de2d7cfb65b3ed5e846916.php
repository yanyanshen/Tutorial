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
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.btn').click(function(){
                $.post('<?php echo U("Admin/Sale/update");?>',$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg('编辑成功',{icon:1},{time:500},function(){
                            location.href='<?php echo U("Sale/index");?>'
                        })
                    }else{
                        if(res.info==2){
                            layer.msg("该时间已过期",{icon:1},{time:500})
                        }
                    }
                })
            })
        })
    </script>
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
                <ul class="forminfo">
                    <form action="" method="post" id="form1">
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <li>
                            <label style="width: 100px">参加活动的品牌<b>*</b></label>
                            <div class="vocation">
                                <select name="bname" class="select1">
                                    <option><?php echo ($bname); ?></option>
                                    <?php if(is_array($bransList)): $i = 0; $__LIST__ = $bransList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><option><?php echo ($date["bname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </li>
                        <li><label style="width: 100px">活动名称<b>*</b></label><input name="aname" type="text" class="dfinput" value="<?php echo ($aname); ?>"  style="width:518px;"/></li>
                        <li><label style="width: 100px">活动规则<b>*</b></label><input name="rules" type="text" class="dfinput" value="<?php echo ($rules); ?>"  style="width:518px;"/></li>
                        <li>
                            <label style="width: 100px">发布时间<b>*</b></label>
                            <input id="d11" name="time1" value="<?php echo (date('Y-m-d',$starttime)); ?>" type="text" onClick="WdatePicker()" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
                            <span style="display: inline-block;">-</span>
                            <input class="Wdate"  name="time2" value="<?php echo (date('Y-m-d',$stoptime)); ?>" type="text" id="d15" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
                        </li>
                        <li><label style="width: 100px">&nbsp;</label><input type="button" class="btn" value="马上编辑"/></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>