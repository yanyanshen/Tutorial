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
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/editor/kindeditor-all.js"></script>
    <script type="text/javascript" src="/three17/pinmo/Public/Admin/js/jquery.form.js"></script>
    <script src="/three17/pinmo/Public/Admin/layer/layer.js"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
        $(document).ready(function(e) {
            $("#select2").uedSelect({
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
        <li><a href="#">编辑商品</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Goods/edit');?>" method="post" id="form" enctype="multipart/form-data">
                <ul class="forminfo">
                    <?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><label>商品名称<b>*</b></label>
                            <input name="goodsname" type="text" class="dfinput" value="<?php echo ($value["goodsname"]); ?>"  style="width:518px;"/>
                        </li>

                        <li><input name="id" type="hidden" value=<?php echo ($value["id"]); ?> /></li>

                        <li><label>市场价格<b>*</b></label>
                            <input name="marketprice" type="text" class="dfinput" value="<?php echo ($value["marketprice"]); ?>"  style="width:518px;"/>
                        </li>
                        <li><label>商城价格<b>*</b></label>
                            <input name="price" type="text" class="dfinput" value="<?php echo ($value["price"]); ?>"  style="width:518px;"/>
                        </li>
                        <li><label>库存<b>*</b></label>
                            <input name="num" type="text" class="dfinput" value="<?php echo ($value["num"]); ?>"  style="width:518px;"/>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li><label>品牌分类<b>*</b></label>


                        <div class="vocation">
                            <select  name="brand" id="select1" value="">

                                <?php if(is_array($brandinfo)): $i = 0; $__LIST__ = $brandinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value=<?php echo ($value["id"]); ?>><?php echo ($value["brand"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>


                            </select>
                        </div>

                    </li>
                    <li><label>商品分类<b>*</b></label>


                        <div class="vocation">
                            <select  name="cid" class="select2" value="">

                                <?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value=<?php echo ($value["cid"]); ?>><?php echo ($value["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>


                            </select>
                        </div>

                    </li>

                    <li style="margin-left: 70px"><div id="preview" ></div></li>
                    <li><label>商品图片<b>*</b></label>

                        <input id="pic1" name="goodspic[]" onchange="preview(this)" type="file" multiple="multiple" style="display: none"/>
                        <label for="pic1" class="upload1">添加图片</label>
                    </li>

                    <li><label>商品描述<b>*</b></label>


                        <textarea id="content7" name="description" style="width:700px;height:250px;visibility:hidden;"></textarea>

                    </li>
                    <li><label>&nbsp;</label><input name="" type="button" id="submit" class="btn" value="马上发布"/></li>
                </ul>
            </form>
        </div>




    </div>


</div>


</body>
<script>
    $('#submit').click(function (){
        $('#form').ajaxSubmit(function(res){
            layer.alert(res.msg);
        })
    })
</script>
<script type="text/javascript">

    //下面用于多图片上传预览功能

    function preview(avalue) {

        var docObj = document.getElementById("pic1");

        var dd = document.getElementById("preview");

        dd.innerHTML = "";

        var fileList = docObj.files;

        for (var i = 0; i < fileList.length; i++) {

            dd.innerHTML += "<div style='float:left;margin-left: 16px;' > <img id='img" + i + "'  /> </div>";

            var imgObjPreview = document.getElementById("img"+i);

            if (docObj.files && docObj.files[i]) {

                //火狐下，直接设img属性

                imgObjPreview.style.display = 'block';

                imgObjPreview.style.width = '150px';

                imgObjPreview.style.height = '180px';

                //imgObjPreview.src = docObj.files[0].getAsDataURL();

                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式

                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);

            }

            else {

                //IE下，使用滤镜

                docObj.select();

                var imgSrc = document.selection.createRange().text;

                alert(imgSrc)

                var localImagId = document.getElementById("img" + i);

                //必须设置初始大小

                localImagId.style.width = "150px";

                localImagId.style.height = "180px";

                //图片异常的捕捉，防止用户修改后缀来伪造图片

                try {

                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

                }

                catch (e) {

                    alert("您上传的图片格式不正确，请重新选择!");

                    return false;

                }

                imgObjPreview.style.display = 'none';

                document.selection.empty();

            }

        }

        return true;

    }
    $('#submit').click(function () {
        $('#form').ajaxSubmit(function (res) {
            if(res.status=='ok'){
                layer.alert(res.msg,
                        {
                            yes: function () {
                                location.href = "<?php echo U('Admin/Goods/goodsList');?>";
                            }
                        })
            }else{
                layer.alert(res.msg);
            }
        })

    })

</script>
</html>