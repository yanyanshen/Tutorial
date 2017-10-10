<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加列表</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/webupload/webuploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/webupload/upload.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Admin/js/webupload/webuploader.css"/>



  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 520
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});

        var uploadUrl ='<?php echo U("Goods/UploadgoodsPic");?>';
        var listUrl = '<?php echo U("Goods/index");?>';

          $(function() {
              KindEditor.ready(function(K) {
                  K.create('#content7', {
                      allowFileManager : true,
                      filterModel:true,
                      afterBlur:function(){
                          this.sync('#content7');
                      }
                  });
              });
              //提交商品发布表单

              $('#add').click(function(){
                  $('#goodsform').ajaxSubmit(function(res){
                      if(res.status==1){
                          $('.uploadBtn').click();
                      }else{
                          layer.msg(res.info,{icon: 2});
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
    <li><a href="#"></a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

        <form action="<?php echo U('Goods/addgoods');?>" method="post" enctype="multipart/form-data" id="goodsform">
    <ul class="forminfo">
            <ul class="forminfo">
                <li><label>商品名称<b>*</b></label><input name="goodsname" type="text" class="dfinput" value="" placeholder="请填写商品名称" style="width:520px;"/><label></label></li>
                <li><label>商品分类<b>*</b></label>
                    <div class="vocation">
                        <select class="select1" name="cid">
                            <option >请选择</option>
                            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </li>
                <li><label>品牌名称<b>*</b></label>
                    <div class="vocation">
                        <select class="select1" name="bid">
                            <option >请选择</option>
                            <?php if(is_array($brandlist)): $i = 0; $__LIST__ = $brandlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val1['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($val1['brandname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </li>
                <li><label>市场价格<b>*</b></label><input name="oldprice" type="text" class="dfinput" value="" placeholder="请填写商品销售价格" style="width:520px;"/></li>
                <li><label>商城价格<b>*</b></label><input name="price" type="text" class="dfinput" value="" placeholder="请填写商品市场价格" style="width:520px;"/></li>
                <li><label>商城规格<b>*</b></label><input name="weight" type="text" class="dfinput" value="" placeholder="请填写商品规格" style="width:520px;"/></li>
                <li><label>商品数量<b>*</b></label><input name="num" type="text" class="dfinput" value="" placeholder="请填写商品库存" style="width:520px;"/></li>
                <li>
                    <label>商品主图<b>*</b></label>
                    <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                        <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                        <input type="file" id="image1" name="image[]" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                        <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择主图</label>
                    </div>
                </li>
                <li><label>商品副图<b>*</b></label>
                    <div class="uploader-list-container vocation" style="width: 525px;border:0px;">
                        <div class="queueList" style="margin: 0px">
                            <div id="dndArea" class="placeholder" >
                                <div id="filePicker-2"></div>
                                <p>或将照片拖到这里，单次最多可选10张</p>
                            </div>
                        </div>
                        <div class="statusBar" style="display:none;">
                            <div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
                            <div class="info"></div>
                            <div class="btns">
                                <div id="filePicker2"></div>
                                <div class="uploadBtn" style="display: none">开始上传</div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><label>商品详情<b>*</b></label>
                    <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;"></textarea>
                </li>
                <li><label>&nbsp;</label><input  id="add" type="button" class="btn" value="马上添加"/></li>
            </ul>
   </ul>
        </form>
	</div>
 
	</div>

    </div>


</body>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 300;
        var MAXHEIGHT = 300;
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