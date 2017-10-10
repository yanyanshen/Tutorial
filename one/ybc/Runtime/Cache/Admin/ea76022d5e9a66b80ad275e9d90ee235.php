<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加列表</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
        });

    </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 180
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
              $('#add').click(function(){
                  $.post("<?php echo U('Category/add');?>",$('#cateform').serialize(),function(res){
                         if(res.status==1){
                               layer.msg(res.info,{icon:1},function(){
                                   location.href="<?php echo U('index');?>"
                               })
                         }else{
                             layer.msg(res.info,{icon:2})
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
    <li><a href="#">首页</a></li>
    <li><a href="#">添加分类</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

        <form action="<?php echo U('Category/add');?>" method="post" id="cateform">
    <ul class="forminfo">
    <li><label>分类名称<b>*</b></label><input name="catename" type="text" class="dfinput" placeholder="请填写分类名称"  style="width:167px;"/></li>
    <li><label>分类选择<b>*</b></label>
        <div class="vocation" >
            <select class="select2" name="pid">
                <option value="0">请选择</option>
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </li>

    <li><label>&nbsp;</label><input id="add" type="button" class="btn" value="马上添加"/></li>
    </ul>
        </form>


    </div>
	</div> 

    </div>


</body>

</html>