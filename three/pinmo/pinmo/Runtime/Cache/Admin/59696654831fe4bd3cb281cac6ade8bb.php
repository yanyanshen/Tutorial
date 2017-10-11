<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
    <style type="text/css">
        .upload1{
            display: block;
            width: 80px;
            height:30px;
            border:1px solid #eee;
            margin-left: 86px;

            margin-bottom: 20px;
            background:#00C4F6;
            font-size: 14px;
            color: #fff;
            text-align: center;
            line-height: 30px;
        }
    </style>
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
	<form action="<?php echo U('Admin/Brand/add');?>" method="post" id="form" enctype="multipart/form-data">
            <ul class="forminfo">

                <li><label>品牌名称<b>*</b></label>
                    <input name="brand" type="text" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>品牌介绍<b>*</b></label>
                    <input name="descript" type="text" class="dfinput" value=""  style="width:167px;"/></li>
                <li><label>品牌图片<b>*</b></label>
                    <div id="preview"></div>
                    <input id="pic1" onchange="preview(this)" name="pic" type="file"  value=""  style="display: none; width:167px;" /></li>
                <label for="pic1" class="upload1">添加图片</label>
                <li><label>&nbsp;</label><input name="" type="button" id="submit" class="btn" value="添加"/></li>
            </ul>
            </form>
        </div>

    </div>

</div>
    
</body>
<script type="text/javascript">
    function preview(file)
    {
        var prevDiv = document.getElementById('preview');
        if (file.files && file.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" width="200px" height="100px"/>';
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img1" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }
</script>
<script src="/Public/Admin/layer/layer.js"></script>
<script>
    $('#submit').click(function () {
        $('#form').ajaxSubmit(function (res) {
            if(res.status=='ok'){
            layer.alert(res.msg,
                    {
                        yes: function () {
                            location.href = "<?php echo U('Admin/Brand/add');?>";
                        }
                    })
        }else{
                layer.alert(res.msg);
            }
        })

    })
</script>
</html>