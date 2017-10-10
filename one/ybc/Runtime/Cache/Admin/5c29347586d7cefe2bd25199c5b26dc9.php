<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>-->
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true,
                filterMode: true,
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
                   $("#form1").ajaxSubmit(function(data) { // res 保存提交后返回的数据，一般为 json 数据
                       if(data){
                           layer.msg(
                               data,{icon:2,time:1500}
                           )
                       }else{
                           layer.open({
                               content:"文章发布成功",
                               icon:1,
                               title:'恭喜你！',
                               yes:function(){
                               location.href="<?php echo U('index');?>"
                           }
                           })
                       }
                   });
        })
    });

</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">文章管理</a></li>
    <li><a href="#">发布文章</a></li>
    </ul>
    </div>


    <form action="<?php echo U('addArticle');?>" method="post" enctype="multipart/form-data" id="form1">
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
    <ul class="forminfo">
    <li><label>文章标题<b>*</b></label><input name="title" type="text" class="dfinput" placeholder="请填写文章标题" value=""  style="width:518px;"/></li>
    <li><label>文章作者<b>*</b></label><input name="author" type="text" class="dfinput" placeholder="请填写文章作者" value=""  style="width:518px;"/></li>

    <li><label>文章标签<b>*</b></label><input name="teatag" type="text" class="dfinput" placeholder="请填写标签" value=""  style="width:518px;"/></li>
    <li><label>上传图片<b>*</b></label>

        <div class="usercity" style="border:3px dashed #e6e6e6;width:514px;height:300px;position: relative">
            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
            <input type="file" id="image1" name="file" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
            <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择图片</label>
        </div>


    </li>
    <li style="padding-top: 10px;"><label>文章简介<b>*</b></label><textarea name="descript"  class="dfinput" placeholder="请填写文章简介"    style="width:518px;height: 200px;border-radius: 10px"></textarea></li>


    <li><label>文章内容<b>*</b></label>

    <textarea id="content7" name="content"  style="width:700px;height:250px;"></textarea>
    
    </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发布"/></li>
    </ul>
    
    </div> 

	</div> 

    </div>
    </form>

</body>

</html>


<!-----------------上传图片框框的效果----------------------->
<script type="text/javascript">
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新选择图片');
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