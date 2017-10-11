<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/three17/pinmo/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/three17/pinmo/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.form.js"></script>
    <script src="/three17/pinmo/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#select1").uedSelect({
                width : 345
            });
            $("#select2").uedSelect({
                width : 167
            });
            $("#select3").uedSelect({
                width : 100
            });
        });
    </script>
    <style type="text/css">
        .upload1{
            display: block;
            float:left;
            width: 80px;
            height:30px;
            border:1px solid #eee;
            margin-left: 0px;
            margin-bottom: 10px;
            background:#00C4F6;
            font-size: 14px;
            color: #fff;
            text-align: center;
            line-height: 30px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">添加广告</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Ad/add');?>" method="post" id="form" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>广告名称<b>*</b></label>
                        <input name="adname" type="text" class="dfinput" value=""  style="width:518px;"/>
                    </li>
                    <li><label>广告添加链接<b>*</b></label>
                        <input name="adurl" type="text" class="dfinput" value=""  style="width:518px;"/>
                    </li>
                    <li><label>广告位置<b>*</b></label>


                        <div class="vocation">
                            <select  name="position" id="select2" value="广告位置">


                                <option value="r1">右一</option>
                                <option value="r2">右二</option>
                                <option value="r3">右三</option>
                                <option value="r4">右四</option>
                                <option value="l1">左一</option>
                                <option value="l2">左二</option>
                                <option value="l3">左三</option>
                                <option value="zc">注册页面</option>
                                <option value="dl">登录图</option>
                                <option value="logo">LOGO图</option>
                                <option value="lunbo">轮播图</option>


                            </select>
                        </div>

                    </li>


                    <li style="margin-left: 85px"><div id="preview" ></div></li>
                    <li><label>广告图片<b>*</b></label>

                        <input name="adpic[]" type="file"  onchange="preview(this)" id="pic" style="display: none" />
                        <label for="pic" class="upload1">添加图片</label>
                    </li>

                    <li><label>广告描述<b>*</b></label>


                        <textarea id="content7" name="des" style="width:700px;height:250px;visibility:hidden;"></textarea>

                    </li>
                    <li><label>&nbsp;</label><input name="" id="submit" type="button" class="btn" value="马上发布"/></li>
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
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" width="200px" height="200px"/>','<img src="' + evt.target.result + '" width="200px" height="200px"/>';
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img1" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
            prevDiv.innerHTML = '<div class="img1" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }

    $('#submit').click(function () {
        $('#form').ajaxSubmit(function (res) {
            if(res.status=='ok'){
                layer.alert(res.msg,
                        {
                            yes: function () {
                                location.href = "<?php echo U('Admin/Ad/add');?>";
                            }
                        })
            }else{
                layer.alert(res.msg);
            }
        })

    })
</script>
</html>