<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
    <form action="<?php echo u('Admin/Brand/editBrand',array('brand_bid'=>$brand_bid));?>" method="post" enctype="multipart/form-data" id="form1">
        <div id="usual1" class="usual">
            <div id="tab1" class="tabson">
                <ul class="forminfo">
                    <li><label>品牌名称<b>*</b></label>
                        <input type="text" name="brand_name" class="dfinput" style="width:167px;" value="<?php echo ($brand_name); ?>"/>
                    </li>
                    <li><label>品牌图片<b>*</b></label>
                        <input name="brand_pic" type="file" style="width:170px;" value="{}"/>
                        <img src="<?php echo substr($brand_pic,1);?>" alt="" width="80px;"/>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="提交"/><!--<button class="btn" >添加品牌</button>--></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#form1").submit(function(){
            var submit_able=true;
            if(!$("[name='brand_name']").val()){
                $(".forminfo li").eq(0).append("<b>品牌名称不能为空</b>");
                submit_able=false;
            }
            if(!submit_able){
                return false;
            }
        });
    })
</script>
</body>

</html>