<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <form action="" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
                <li><label>商品名称<b>*</b></label>
                    <input name="goodsname" type="text" class="dfinput" value=""  style="width:518px;"/>
                </li>

                <li><label>商品分类<b>*</b></label>


                    <div class="vocation">
                        <select class="select2" name="cid">
                            <option>添加分类</option>
                            <option value="0">顶级分类</option>

                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["cid"]); ?>"> <?php echo ($vol["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </div>

                </li>
                <li><label>商品品牌<b>*</b></label>


                    <div class="vocation">
                        <select class="select2" name="bid">
                            <option>添加品牌</option>
                            <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["bid"]); ?>"> <?php echo ($val["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>

                </li>

                <li><label>商品数量<b>*</b></label>
                    <input name="num" type="text" class="dfinput" value=""  style="width:167px;"/>
                </li>

                <li><label>商品价格<b>*</b></label>
                    <input name="price" type="text" class="dfinput" value=""  style="width:167px;"/>
                </li>
                <li><label>商品图片<b>*</b></label></li>
                    <!--<input id="preview1" name="pic[]" type="file" /><input id="preview2" name="pic[]" type="file" /> <br/>
                    <input id="preview3" name="pic[]" type="file" /><input id="preview4" name="pic[]" type="file" />-->
                    <div class="usercity">
                        <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                        <input type="file" id="image1" name="image[]" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                        <label for="image1"  style="margin:10px;text-align:center;color:#fff;border-radius:5px;width:60px;height:26px;line-height:26px;font-size:14px;background:#00C4F6;padding:3px 15px;border:1px solid #ccc;display: inline-block">选择图片</label>
                    </div>
                    <div class="usercity">
                        <p id="preview2" ><img id="imghead2"  border=0 src=''></p><span></span>
                        <input type="file" id="image2" name="image[]" onchange="previewImage(this,'preview2','imghead2')" style="display:none;" >
                        <label for="image2"  style="margin:10px;text-align:center;color:#fff;border-radius:5px;width:60px;height:26px;line-height:26px;font-size:14px;background:#00C4F6;padding:3px 15px;border:1px solid #ccc;display: inline-block">选择图片</label>
                    </div>
                    <div class="usercity">
                        <p id="preview3" ><img id="imghead3"  border=0 src=''></p><span></span>
                        <input type="file" id="image3" name="image[]" onchange="previewImage(this,'preview3','imghead3')" style="display:none;" >
                        <label for="image3"  style="margin:10px;text-align:center;color:#fff;border-radius:5px;width:60px;height:26px;line-height:26px;font-size:14px;background:#00C4F6;padding:3px 15px;border:1px solid #ccc;display: inline-block">选择图片</label>
                    </div>
                    <div class="usercity">
                        <p id="preview4" ><img id="imghead4"  border=0 src=''></p><span></span>
                        <input type="file" id="image4" name="image[]" onchange="previewImage(this,'preview4','imghead4')" style="display:none;" >
                        <label for="image4"  style="margin:10px;text-align:center;color:#fff;border-radius:5px;width:60px;height:26px;line-height:26px;font-size:14px;background:#00C4F6;padding:3px 15px;border:1px solid #ccc;display: inline-block">选择图片</label>
                    </div>
                
                <li><label>商品描述<b>*</b></label>

                    <textarea id="content7" name="description" style="width:700px;height:250px;visibility:hidden;"></textarea>

                </li>
                <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/></li>
            </ul>
            </form>
        </div>




    </div>


</div>


</body>

<script src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript">
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 600;
        var MAXHEIGHT = 300;
        var div = document.getElementById(pre);
        if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
            //$(this).prev('span').text('图片格式无效！');
            $('#'+pre).next('span').css({"color":"red","font-weight":"bold"}).text('图片类型无效！');
            return false;
        }else{
            $('#'+pre).next('span').css({"color":"green","font-weight":"bold"}).text('图片类型符合！');
        }
        if (file.files && file.files[0])
        {
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
            }
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;}
            reader.readAsDataURL(file.files[0]);
        }
        else //兼容IE
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            file.blur();
            var src = document.selection.createRange().text;
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        }

        $(file).next('label').css({position:"relative",top:"-75px",opacity:"0.6"}).html('更换图片');
    }
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;

            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }

        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
</script>


</html>