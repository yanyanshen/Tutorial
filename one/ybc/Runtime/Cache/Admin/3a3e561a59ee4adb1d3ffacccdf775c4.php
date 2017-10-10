<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/js/webupload/webuploader.css"/>
<script type="text/javascript">
    $(function(){
            KindEditor.ready(function(K) {
                K.create('#content7', {
                    allowFileManager : true,
                    afterBlur:function(){
                        this.sync('#content7');
                    }
                });
            });
        })
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
<script type="text/javascript">
     $(function(){
         $(".btn").click(function(){
             $("#form1").ajaxSubmit(function(data){
                 if(data){
                    layer.msg(data,{icon:2,time:1500})
                 }else{
                    layer.open({
                        content:"商品更新成功",
                        icon:1,
                        title:'恭喜你',
                        yes:function(){
                            location="<?php echo U('index');?>"
                        }
                    })
                 }
             })
         })
     })
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">广告管理</a></li>
    <li><a href="#">编辑广告商品</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">


        <!--表单开始-->

    <form action="<?php echo U('Adgood/editGood');?>" method="post" enctype="multipart/form-data" id="form1">
        <input type="hidden" name="gid" value="<?php echo ($info["gid"]); ?>"/>
    <ul class="forminfo">

    <li><label>广告商品名称<b>*</b></label>
    <input name="goodsname" type="text" class="dfinput" value="<?php echo ($info["goodsname"]); ?>"   style="width:345px;"/>
    </li>




        <li><label>广告分类<b>*</b></label>
            <div class="vocation">
                <select class="select1" name="aid">
                    <option value="0">--------分类列表--------</option>
                    <?php if(is_array($adcateList)): $i = 0; $__LIST__ = $adcateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>" <?php echo ($val['id']==$info['aid']?'selected':''); ?>><?php echo ($val['adcatename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </li>


    <li><label>品牌分类<b>*</b></label>
    <div class="vocation">
    <select class="select1" name="bid">
        <option value="0">请选择</option>
    <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php echo ($val['id']==$info['bid']?'selected':''); ?>>------<?php echo ($val["brandname"]); ?>------</option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>

        <li><label>商品分类<b>*</b></label>
            <div class="vocation">
                <select class="select1" name="cid">
                    <option value="0">--------分类列表--------</option>
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>" <?php echo ($val['id']==$info['cid']?'selected':''); ?>><?php echo ($val['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </li>

    <li><label>市场价格<b>*</b></label>
    <input name="oldprice" type="text" class="dfinput" value="<?php echo ($info["oldprice"]); ?>"   style="width:345px;"/>
    </li>

    <li><label>商城价格<b>*</b></label>
        <input name="price" type="text" class="dfinput" value="<?php echo ($info["price"]); ?>"  style="width:345px;"/>
    </li>

    <li><label>商品数量<b>*</b></label>
    <input name="num" type="text" class="dfinput" value="<?php echo ($info["num"]); ?>"  style="width:345px;"/>
    </li>




    <li><label>商城规格<b>*</b></label>
    <input name="weight" type="text" class="dfinput" value="<?php echo ($info["weight"]); ?>"  style="width:345px;"/>
    </li>

        <li>
            <label>广告图片<b>*</b></label>
            <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">

            <?php if(empty($adpic)): ?><span style="color: rgb(3,22,52);font-size: 18px;">该广告商品没有广告图片</span>
                <?php else: ?>

                <p id="preview0" ><img width="300" id="imghead0"  border=0 src='/Uploads/goodsPic/<?php echo ($adpic); ?>'></p><span></span>
                <input type="file" id="image0" name="ad" onchange="previewImage(this,'preview0','imghead0',300,300)" style="display:none;" >
                <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击修改</label><?php endif; ?>
            </div>
        </li>



        <li style="padding-top: 10px;">
            <label>商品主图<b>*</b></label>
            <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                <p id="preview1" ><img width="300" id="imghead1"  border=0 src='/Uploads/goodsPic/400/400_<?php echo ($info["pic"]); ?>'></p><span></span>
                <input type="file" id="image1" name="main" onchange="previewImage(this,'preview1','imghead1',300,300)" style="display:none;" >
                <label for="image1"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击修改</label>
            </div>
        </li>





        <li>
            <label>商品图片<b>*</b></label>
            <?php if(is_array($imageInfo)): $i = 0; $__LIST__ = $imageInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="usercity" style="border:3px dashed #e6e6e6;width:170px;height:155px;margin:5px 0px;position: relative">
                    <p id="preview<?php echo ($val["id"]); ?>" ><img width="150" id="imghead<?php echo ($val["id"]); ?>"  border=0 src='/Uploads/goodsPic/400/400_<?php echo ($val["picname"]); ?>'></p><span></span>
                    <input type="file" id="image<?php echo ($val["id"]); ?>" name="<?php echo ($val["id"]); ?>" onchange="previewImage(this,'preview<?php echo ($val["id"]); ?>','imghead<?php echo ($val["id"]); ?>',150,150)" style="display:none;" >
                    <label for="image<?php echo ($val["id"]); ?>"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改图片</label>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>





    <li style="padding-top: 10px;"><label>商品详情描叙<b>*</b></label>
    

    <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;"><?php echo ($info["detail"]); ?></textarea>
    
    </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认修改"/></li>
    </ul>

    </form>
       <!--表单结束 -->

    </div> 

	</div> 

    </div>


</body>

</html>






<!-----------------上传图片框框的效果----------------------->
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag,width,height)
    {
        var MAXWIDTH  = width;
        var MAXHEIGHT = height;
        var div = document.getElementById(pre);
        if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
            //$(this).prev('span').text('图片格式无效！');
            $('#'+pre).next('span').css({"color":"red","font-weight":"bold"}).text('图片类型无效！');
            return false;
        }else{
            $('#'+pre).next('span').css({"color":"green","font-weight":"bold"}).text('');
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.5)',color:'#fff'}).html('重新选择');
        // $(file).parent().append('<span class="update()" style="margin:0;top:30px;position:absolute;background:rgba(0,0,0,0.9);color:#ff0;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">确定更新</span>');
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