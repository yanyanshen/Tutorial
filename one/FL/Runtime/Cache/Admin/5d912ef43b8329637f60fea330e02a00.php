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
            <form action="<?php echo u('Admin/Advertise/addAdvertise');?>" method="post" enctype="multipart/form-data" id="prodForm">
                <ul class="forminfo">
                    <li><label>广告位置<b>*</b></label>
                        <!--<input name="prod_pack" type="text" class="dfinput" value=""  style="width:165px;"/>-->
                        <div class="vocation" >
                            <select name="ad_pos_id" class="select2">
                                <option value="1">&nbsp;轮播图1</option>
                                <option value="2">&nbsp;轮播图2</option>
                                <option value="3">&nbsp;轮播图3</option>
                                <option value="4">&nbsp;轮播图4</option>
                                <option value="5">&nbsp;轮播图5</option>
                                <option value="6">&nbsp;顶层位置1</option>
                                <option value="7">&nbsp;顶层位置2</option>
                                <option value="8">&nbsp;顶层位置3</option>
                                <option value="9">&nbsp;顶层位置4</option>
                                <option value="10">&nbsp;顶层位置5</option>
                            </select>
                        </div>
                    </li>
                    <li><label>是否展示<b>*</b></label>
                        <div class="vocation" >
                            <select name="ad_isshow" class="select2">
                                <option value="1">&nbsp;是</option>
                                <option value="0">&nbsp;否</option>
                            </select>
                        </div>
                    </li>
                    <li><label>广告图片<b>*</b></label>
                        <div style="display: inline-block">
                            <input name="pic[]" type="file"  style="width:170px;"/>
                        </div>
                    </li>
                    <li><label>广告链接<b>*</b></label>
                        <input name="ad_url" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>
                    <!--<li><label>商品描述<b>*</b></label>
                        <textarea id="content7" name="prod_desc" style="width:614px;height:100px;"></textarea>
                    </li>-->
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function(){
        $("#prodForm").submit(function(){
            var submit_able=true;
            if(!$("[type=file]").eq(0).val()){
                $(".forminfo li").eq(1).append("<b>广告图片不能为空</b>");
                submit_able=false;
            }
            if(!$("[name=ad_url]").val()){
                $(".forminfo li").eq(3).append("<b>广告链接不能为空</b>");
                submit_able=false;
            }
            if(!submit_able){
                return false;
            }
        })
    })
</script>
</html>