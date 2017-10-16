<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Jquery/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/layer/layer.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="/Public/Jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
        <script type="text/javascript">KE.show({id : 'content7', cssPath : './index.css'});</script>
        <script type="text/javascript">
        $(document).ready(function(e) {$(".select1").uedSelect({width : 345});
            $(".select2").uedSelect({width : 167});
            $(".select3").uedSelect({width : 100});
        });
        </script>
        <style>
            .selectImg{  display:block;  width:60px;  margin:10px;padding:3px 15px;  border:1px solid #ccc;  border-radius:5px;  background:#3EAFE0;  font-size:10px;  text-align:center;  color:#fff;  }
            .preview{  position: relative;  float: left;  }
        </style>
    </head>
    <body>
        <div class="place">
            <span>位置：</span>
            <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">广告管理</a></li>
            <li><a href="#">添加广告</a></li>
            </ul>
        </div>
        <div class="formbody">
            <div id="usual1" class="usual">
                <div id="tab1" class="tabson">
                    <form action="<?php echo U('Admin/Lunbo/addLunBo');?>" enctype="multipart/form-data" method="post" id="cateInfo">
                        <ul class="forminfo">
                            <li>
                                <label>广告名称<b>*</b></label>
                                <input id='catename' name="adname" type="text" class="dfinput" value="" style="width:345px;"/>
                            </li>
                            <li><label>广告图片<b>*</b></label>
                                <div class="preview">
                                    <p id="preview1" style="width: 150px" ><img id="imghead1"  border=0 src='' alt=""></p><span></span>
                                    <input type="file" id="image1" name="adpic" style="display: none" onchange="previewImage(this,'preview1','imghead1')" />
                                    <label for="image1"  class="selectImg">选择图片</label>
                                </div>
                            </li>
                            <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认添加" id="btn"/></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        $('#btn').click(function(){
            alert($('form').serialize());
            if(!$('#catename').val()){
                layer.alert('广告名称不能为空');
                return false;
            }else{
                layer.confirm('你确定要添加该广告么？', {
                    btn: ['确定','取消']
                }, function(){
                    $.post("<?php echo U('Admin/Lunbo/addLunBo');?>",$('form').serialize(),function(res){
                        if(res.status=='error'){
                            layer.msg('该广告已存在', {icon: 1});
                        }else{
                            layer.msg('添加成功', {icon: 1,time:2000},function(){
                                location.reload();
                            });
                        }
                    });
                }, function(){
                    layer.msg('已取消', {icon:1});
                });
            }
        });

        //图片上传预览    IE是用了滤镜。
        function previewImage(file,pre,imag){
            var MAXWIDTH  = 100;
            var MAXHEIGHT = 100;
            var div = document.getElementById(pre);
            if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
                //$(this).prev('span').text('图片格式无效！');
                $('#'+pre).next('span').css({"color":"red","font-size":"13px","font-weight":"bold"}).text('图片类型无效！');
                return false;
            }else{
                $('#'+pre).next('span').css({"color":"green","font-size":"13px","font-weight":"bold"}).text('图片类型符合！');
            }
            if(file.files && file.files[0]){
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
            else{ //兼容IE
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

            $(file).next('label').css({opacity:"0.6"}).html('更换图片');
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if( rateWidth > rateHeight ) {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else {
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