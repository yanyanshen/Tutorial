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
            <form action="<?php echo u('Admin/Prod/addProd');?>" method="post" enctype="multipart/form-data" id="prodForm">
                <ul class="forminfo">
                    <li><label>会员名称<b>*</b></label>
                        <input name="prod_name" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
<!--                    <li><label>商品分类<b>*</b></label>
                        <div class="vocation">
                            <select name="prod_cid" class="select2" >
                                <?php if(is_array($classNameList)): $i = 0; $__LIST__ = $classNameList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["class_cid"]); ?>"><?php echo ($val["class_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>-->
<!--                    <li><label>商品品牌<b>*</b></label>
                        <div class="vocation">
                            <select name="prod_bid" class="select2" >
                                <?php if(is_array($brandNameList)): $i = 0; $__LIST__ = $brandNameList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["brand_bid"]); ?>">&nbsp;&nbsp;&nbsp;<?php echo ($val["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>-->
                    <li><label>会员姓名<b>*</b></label>
                        <input name="prod_number" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员性别<b>*</b></label>
                        <input name="prod_weight" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员年龄<b>*</b></label>
                        <input name="prod_sale_price" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员类型<b>*</b></label>
                        <input name="prod_price" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员级别<b>*</b></label>
                        <input name="prod_qty" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员积分<b>*</b></label>
                        <input name="prod_qty" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员折扣<b>*</b></label>
                        <input name="prod_qty" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
                    <li><label>会员时间<b>*</b></label>
                        <input name="prod_qty" type="text" class="dfinput" value=""  style="width:200px;"/>
                    </li>
<!--
                    <li><label>商品图片<b>*</b></label>
                        <div style="display: inline-block">
                            <input name="pic[]" type="file"  style="width:170px;"/>
                            <input name="pic[]" type="file" style="width:170px;"/><br/>
                            <input name="pic[]" type="file"  style="width:170px;"/>
                            <input name="pic[]" type="file"  style="width:170px;"/>
                        </div>
                    </li>-->
                    <li><label>商品描述<b>*</b></label>
                        <textarea id="content7" name="prod_desc" style="width:614px;height:150px;"></textarea>
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
</html>