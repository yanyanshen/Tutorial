<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>

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
            <form action="<?php echo U('Admin/Goods/goodsedit');?>" method="post" enctype="multipart/form-data" onsubmit="return validate">
                <input type="hidden" name="id" value="<?php echo ($goods["id"]); ?>" />
            <ul class="forminfo">
                <li><label>商品名称<b>*</b></label>
                    <input name="goodsname" type="text" class="dfinput" value="<?php echo ($goods["goodsname"]); ?>"  style="width:344px;"/>
                </li>

                <li><label>商品分类<b>*</b></label>


                    <div class="vocation">
                        <select class="select1" name="cid">
                            <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo (str_repeat("&nbsp;&nbsp;&nbsp;",$vo['level'])); echo ($vo['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>

                </li>
 
                <li><label>商品数量<b>*</b></label>
                    <input name="number" type="text" class="dfinput" value="<?php echo ($goods["number"]); ?>"  style="width:167px;"/>
                </li>

                <li><label>商城价格<b>*</b></label>
                    <input name="price" type="text" class="dfinput" value="<?php echo ($goods["price"]); ?>"  style="width:167px;"/>
                </li>

                <li><label>市场价格<b>*</b></label>
                    <input name="marketprice" type="text" class="dfinput" value="<?php echo ($goods["marketprice"]); ?>"  style="width:167px;"/>
                </li>
                
                <li><label>商品图片<b>*</b></label>
                    <input name="pic[]" type="file" />  <input name="pic[]" type="file" /> 
                </li>
            
                </li>
                <li><label>商品描述<b>*</b></label>

                    <textarea id="content7" name="description" style="width:700px;height:250px;visibility:hidden;"><?php echo ($goods["description"]); ?></textarea>

                </li>
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="修改"/></li>
            </ul>
            </form>
        </div>
    </div>   
</div>

</body>

</html>