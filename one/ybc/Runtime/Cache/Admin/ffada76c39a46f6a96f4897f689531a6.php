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
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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


    //三级联动
    var getCate=function(aid,name){
        $.post('<?php echo U("addCategory");?>',{aid:aid},function(res){
            if(res.status){
                var str='<option value="0" selected>请选择</option>';
                for(var i in res.info){
                    str+='"<option value="' + res.info[i].id + '">' +"---" +res.info[i].adcatename+"---" + '</option>"';
                }
                $('select[name="'+name+'"]').html(str);
                $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
            };
        })
    }
    getCate(0,'firstCate');

    $('select[name="firstCate"]').change(function(){
        getCate($(this).val(),'secondCate');
        $(this).parents('.vocation').next('.vocation').show();
        $('select[name="thirdCate"]').empty().parents('.vocation').hide();
    })

    $('select[name="secondCate"]').change(function(){
        getCate($(this).val(),'thirdCate');
        $(this).parents('.vocation').next('.vocation').show();
    })



});
</script>
<script type="text/javascript">
    $(function(){
        $(".btn").click(function(){
            $.post("<?php echo U('addAdCate');?>",$("#form1").serialize(),function(res){
                if(res.status){
                    layer.msg(res.info,{time:1500,icon:1},function(){
                        location="<?php echo U('Adcategory/index');?>";
                    })
                }else{
                    layer.msg(res.info,{time:2000,icon:2})
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
    <li><a href="#">广告管理</a></li>
    <li><a href="#">添加广告分类</a></li>
    </ul>
    </div>

    <form action="" method="post" id="form1">

    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
    <ul class="forminfo">
    <li><label>分类名称<b>*</b></label><input name="adcatename" type="text" class="dfinput" value="" placeholder="请填写要添加的分类"  style="width:167px;"/></li>
   
    <li><label>分类选择<b>*</b></label>
        <div class="vocation">
            <select class="select2" name="firstCate">
            </select>
        </div>
        <div class="vocation" style="display:none">
            <select class="select2" name="secondCate" >

            </select>
        </div>
        <div class="vocation" style="display:none">
            <select class="select2" name="thirdCate" >
            </select>
        </div>

    </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上添加"/></li>
    </ul>
    </div>
	</div>
    </div>

    </form>

</body>

</html>