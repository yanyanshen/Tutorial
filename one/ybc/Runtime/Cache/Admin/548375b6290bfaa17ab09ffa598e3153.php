<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加列表</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/js/webupload/webuploader.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>

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
        var uploadUrl ='<?php echo U("Integral/UploadgoodsPic");?>';
        var listUrl = '<?php echo U("Integral/index");?>';
          $(function(){
              KindEditor.ready(function(K) {
                  K.create('#content7', {
                      allowFileManager : true,
                      afterBlur:function(){
                          this.sync('#content7');
                      }
                  });
              });
                $('#edit').click(function(){
                   $('#goodsform').ajaxSubmit(function(res){
                       if(res.status==1){
                           layer.msg(res.info,{icon: 1,time:1000},function(){
                               location.href=listUrl;
                           });
                       }else{
                           layer.msg(res.info,{icon: 2,time:1000});
                       }
                   })
                    return false;
                })
          })
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
 
    
    <ul class="forminfo">
        <form action="<?php echo U('Integral/edit');?>" method="post" enctype="multipart/form-data" id="goodsform">
            <ul class="forminfo">
                <li><label>商品名称<b>*</b></label><input name="goodsname" type="text" class="dfinput" value="<?php echo ($goods['goodsname']); ?>"  style="width:345px;"/><label></label></li>
                <li><label>商城价格<b>*</b></label><input name="price" type="text" class="dfinput" value="<?php echo ($goods['price']); ?>"  style="width:345px;"/></li>
                <li><label>商城积分<b>*</b></label><input name="points" type="text" class="dfinput" value="<?php echo ($goods['points']); ?>"  style="width:345px;"/></li>
                <li>
                    <label>商品主图<b>*</b></label>
                    <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                        <p id="preview0" ><img width="300" id="imghead0"  border=0 src='/Uploads/integralGoodsPic/800/800_<?php echo ($goods["pic"]); ?>'></p><span></span>
                        <input type="file" id="image0" name="0" onchange="previewImage(this,'preview0','imghead0',400,400)" style="display:none;" >
                        <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改主图</label>
                    </div>
                </li>
                <li>
                    <label>商品图片<b>*</b></label>
                    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><div class="usercity" style="border:3px dashed #e6e6e6;width:170px;height:155px;margin:5px 0px;position: relative">
                            <p id="preview<?php echo ($pic["id"]); ?>" ><img width="150" id="imghead<?php echo ($pic["id"]); ?>"  border=0 src=' /Uploads/integralGoodsPic/400/400_<?php echo ($pic["picname"]); ?>'></p><span></span>
                            <input type="file" id="image<?php echo ($pic["id"]); ?>" name="<?php echo ($pic["id"]); ?>" onchange="previewImage(this,'preview<?php echo ($pic["id"]); ?>','imghead<?php echo ($pic["id"]); ?>',150,150)" style="display:none;" >
                            <label for="image<?php echo ($pic["id"]); ?>"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改图片</label>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li>
                    <label>商品详情<b>*</b></label>
                    <textarea name="detail" id="content7" style="    width: 680px" rows="30"><?php echo ($goods["detail"]); ?></textarea>
                </li>

                <li><label>&nbsp;</label><input name="" id="edit" type="button" class="btn" value="确定修改"/></li>
            </ul>
            <input type="hidden" name="id" value="<?php echo ($goods["id"]); ?>"/>
        </form>
   </ul>
	</div>
 
	</div>

    </div>

</body>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 150;
        var MAXHEIGHT = 150;
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新选择主图');
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