<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加广告</title>
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
        <li><a href="#">广告管理</a></li>
        <li><a href="#">添加广告</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo u('Admin/Ad/add');?>" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>广告分类<b>*</b></label>

                        <div class="vocation">
                            <select class="select2" name="pid">
                                <option name="pid" value="1">首页轮播图</option>
                                <option name="pid" value="13">首页三楼轮播</option>
                                <option name="pid" value="15">首页五楼轮播</option>
                                <option name="pid" value="3">其他</option>
                            </select>
                        </div>

                    </li>
                    <li><label>广告标题<b>*</b></label>
                        <input name="title" type="text" class="dfinput" value=""  style="width:167px;"/></li>
                    <li><label>是否置顶<b>*</b></label>
                        <input name="top" type="radio"  value="1" checked/>是
                        <input name="top" type="radio"  value="0" />否</li>
                    <li><label>广告图片<b>*</b></label>
                        <input type="file" style="display:none" name="pic" id="doc" style="width:150px;" onchange="javascript:setImagePreview();">
                      <label for="doc" class="btn">&nbsp&nbsp请选择图片</label>
                    </li>
                    <li><label>图片预览<b>*</b></label>
                        <br/><img id="preview" src="" width="150" alt="图片预览"/>

                    <li><label>&nbsp;</label><input type="submit" class="btn" value="添加"/></li>
                </ul>
            </form>
        </div>

    </div>

</div>


</body>
<script type="text/javascript">
    //下面用于图片上传预览功能
    function setImagePreview(avalue) {
        var docObj=document.getElementById("doc");

        var imgObjPreview=document.getElementById("preview");
        if(docObj.files &&docObj.files[0])
        {
//火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '150px';
            //imgObjPreview.style.height = '180px';
//imgObjPreview.src = docObj.files[0].getAsDataURL();

//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要以下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }
        else
        {
//IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
//必须设置初始大小
            localImagId.style.width = "150px";
           // localImagId.style.height = "180px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        return true;
    }

</script>
</html>