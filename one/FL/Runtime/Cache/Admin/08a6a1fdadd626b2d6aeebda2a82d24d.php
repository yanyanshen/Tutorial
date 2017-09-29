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
    <!--<script type="text/javascript" src="/Public/Admin/js/jquery.uploadify.min.js"></script>-->
    <!--<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>-->

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
            <form action="<?php echo u('Admin/Prod/addProd');?>" method="post" enctype="multipart/form-data" id="prodForm">
                <ul class="forminfo">
                    <li><label>商品名称<b>*</b></label><input name="prod_name" type="text" class="dfinput" value=""  style="width:612px;"/></li>
                    <li><label>商品分类<b>*</b></label>
                        <div class="vocation">
                            <select name="prod_cid" class="select2" >
                                <?php if(is_array($classNameList)): $i = 0; $__LIST__ = $classNameList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["class_cid"]); ?>"><?php echo ($val["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>
                    <li><label>商品品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="prod_bid" class="select2" >
                                <?php if(is_array($brandNameList)): $i = 0; $__LIST__ = $brandNameList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["brand_bid"]); ?>">&nbsp;&nbsp;&nbsp;<?php echo ($val["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>
                    <li><label>商品包装<b>*</b></label>
                        <!--<input name="prod_pack" type="text" class="dfinput" value=""  style="width:165px;"/>-->
                        <div class="vocation">
                            <select name="prod_pack" class="select2" >
                                <option value="袋装">&nbsp;&nbsp;&nbsp;袋装</option>
                                <option value="盒装">&nbsp;&nbsp;&nbsp;盒装</option>
                                <option value="罐装">&nbsp;&nbsp;&nbsp;罐装</option>
                            </select>
                        </div>
                    </li>
                    <li><label>商品产地<b>*</b></label>
                        <!--<input name="prod_country" type="text" class="dfinput" value=""  style="width:165px;"/>-->
                        <div class="vocation">
                            <select name="prod_area" class="select2" >
                                <option value="中国">&nbsp;&nbsp;&nbsp;中国</option>
                                <option value="台湾">&nbsp;&nbsp;&nbsp;台湾</option>
                                <option value="韩国">&nbsp;&nbsp;&nbsp;韩国</option>
                                <option value="日本">&nbsp;&nbsp;&nbsp;日本</option>
                                <option value="越南">&nbsp;&nbsp;&nbsp;越南</option>
                                <option value="缅甸">&nbsp;&nbsp;&nbsp;缅甸</option>
                                <option value="泰国">&nbsp;&nbsp;&nbsp;泰国</option>
                                <option value="马来西亚">&nbsp;&nbsp;&nbsp;马来西亚</option>
								<option value="印度尼西亚">&nbsp;&nbsp;&nbsp;印度尼西亚</option>
                                <option value="英国">&nbsp;&nbsp;&nbsp;英国</option>
                                <option value="美国">&nbsp;&nbsp;&nbsp;美国</option>
                                <option value="瑞典">&nbsp;&nbsp;&nbsp;瑞典</option>
                                <option value="德国">&nbsp;&nbsp;&nbsp;德国</option>
                                <option value="意大利">&nbsp;&nbsp;&nbsp;意大利</option>
                            </select>
                        </div>
                    </li>
                    <li><label>商品展示<b>*</b></label>
                        <!--<input name="prod_pack" type="text" class="dfinput" value=""  style="width:165px;"/>-->
                        <div class="vocation">
                            <select name="prod_show_big" class="select2" >
                                <option value="1">&nbsp;&nbsp;&nbsp;大图</option>
                                <option value="0">&nbsp;&nbsp;&nbsp;小图</option>
                            </select>
                        </div>
                    </li>
                    <li><label>商品编号<b>*</b></label>
                        <input name="prod_number" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>
                    <li><label>商品毛重<b>*</b></label>
                        <input name="prod_weight" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>
                    <li><label>商城价格<b>*</b></label>
                        <input name="prod_sale_price" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>
                    <li><label>市场价格<b></b></label>
                        <input name="prod_price" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>
                    <li><label>商品数量<b>*</b></label>
                        <input name="prod_qty" type="text" class="dfinput" value=""  style="width:165px;"/>
                    </li>

                    <li style="width:860px; "><label>商品图片<b>*</b></label>
                        <div style="display: inline-block;float:left;">
                            <input name="pic[]" type="file"  style="width:170px;" onchange="preview(this)" id="pic1" class="0"/>
                            <input name="pic[]" type="file"  style="width:170px;" onchange="preview(this)" id="pic2"/><br/>
                            <input name="pic[]" type="file"  style="width:170px;" onchange="preview(this)" id="pic3"/>
                            <input name="pic[]" type="file"  style="width:170px;" onchange="preview(this)" id="pic4"/>
                        </div>
                        <div style="float:left;" id="pics" >
                            <img src="" alt="" id="pic1img" width="100px;" height="100px" style="float:left;display: none"/>
                            <img src="" alt="" id="pic2img" width="100px;" height="100px" style="float:left; display: none"/>
                            <img src="" alt="" id="pic3img" width="100px;" height="100px" style="float:left; display: none"/>
                            <img src="" alt="" id="pic4img" width="100px;" height="100px" style="float:left; display: none"/>
                        </div>
                    </li>
                    <li ><label>商品描述<b>*</b></label>
                        <textarea id="content7" name="prod_desc" style="width:614px;height:150px;margin-top:30px;"></textarea>
                    </li>
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
            if(!$("[name=prod_name]").val()){
                $(".forminfo li").eq(0).append("<b>商品名称不能为空</b>");
                 submit_able=false;
            }
            if(!$("[name=prod_number]").val()){
                $(".forminfo li").eq(6).append("<b>商品编号不能为空</b>");
                submit_able=false;
            }
            if(!$("[name=prod_weight]").val()){
                $(".forminfo li").eq(7).append("<b>商品重量不能为空</b>");
                submit_able=false;
            }
            if(!$("[name=prod_sale_price]").val()){
                $(".forminfo li").eq(8).append("<b>商品价格不能为空</b>");
                submit_able=false;
            }
            if(!$("[name=prod_qty]").val()){
                $(".forminfo li").eq(10).append("<b>商品数量不能为空</b>");
                submit_able=false;
            }
            if(!$("[type=file]").eq(0).val()&&!$("[type=file]").eq(1).val()&&!$("[type=file]").eq(2).val()&&!$("[type=file]").eq(3).val()){
                $(".forminfo li").eq(11).append("<b>商品图片不能为空</b>");
                submit_able=false;
            }
            if(!$("[name=prod_desc]").val()){
                $(".forminfo li").eq(12).append("<b>商品描述不能为空</b>");
                submit_able=false;
            }
            if(!submit_able){
                return false;
            }
        })
    })
</script>
<script type="text/javascript">
    function getFileUrl(sourceId) {
        var url;
        if (navigator.userAgent.indexOf("MSIE") >= 1 && !(navigator.userAgent.indexOf("MSIE 10.0") > 0) ) { // IE10取消了滤镜
            //url = document.getElementById(sourceId).value;
            document.all.imgOne.select();
            $("#preview").focus();
            url = document.selection.createRange().text;

        } else if (navigator.userAgent.indexOf("Firefox") > 0) { // Firefox
            url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
        } else if (navigator.userAgent.indexOf("Chrome") > 0) { // Chrome
            url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
        }else if(navigator.userAgent.indexOf("MSIE 10.0") > 0){
            url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
        }else{
            url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
        }
        return url;
    }

    /**
     * 将本地图片 显示到浏览器上
     */
    function preImg(sourceId, targetId) {
        var url = getFileUrl(sourceId);
        var imgPre = document.getElementById(targetId);
        if(window.navigator.userAgent.indexOf("MSIE") >= 1 && !(navigator.userAgent.indexOf("MSIE 10.0") > 0) ) {
            var picpreview=document.getElementById("preview");
            picpreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = url;
        }else{
            imgPre.src = url;
        }

    }
</script>


<script type="text/javascript">
    function preview(e){
        var fileURL1;
        if (navigator.userAgent.indexOf("MSIE") >= 1 && !(navigator.userAgent.indexOf("MSIE 10.0") > 0) ) { // IE10取消了滤镜
            //url = document.getElementById(sourceId).value;
            document.all.imgOne.select();
            $("#preview").focus();
            fileURL1 = document.selection.createRange().text;

        } else if (navigator.userAgent.indexOf("Firefox") > 0) { // Firefox
            fileURL1 = window.URL.createObjectURL(e.files.item(0));
        } else if (navigator.userAgent.indexOf("Chrome") > 0) { // Chrome
            fileURL1 = window.URL.createObjectURL(e.files.item(0));
        }else if(navigator.userAgent.indexOf("MSIE 10.0") > 0){
            fileURL1 = window.URL.createObjectURL(e.files.item(0));
        }else{
            fileURL1 = window.URL.createObjectURL(e.files.item(0));
        }

        var imgid= e.id+'img';
        $("#"+imgid).show();
        $("#"+imgid).attr("src",fileURL1);
    }
</script>
</html>