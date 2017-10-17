<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加广告</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <!--在此添加图片编辑css-->
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/webuploader.css" />
    <!--在此添加图片编辑css-->
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/laydate.js"></script>
    <!--在这引入图片编辑js-->
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/webuploader.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/upload.js"></script>
    <!--添加广告-->
    <script type="text/javascript">
        $(function(){
            $(document).ready(function(){
                option={
                    url:  "<?php echo U('Advertising/add');?>",
                    type:  "post",
                    success:  shows,
                    error:  showe
                };
            })
            $("#ad_form").submit(function(){
                $(this).ajaxSubmit(option);
                return false;
            });
            function shows(res){
                if(res.status==1) {
                    layer.msg("添加广告成功",{icon:1,time:1000},function(){
                        location.href="<?php echo U('Advertising/advertising');?>";
                    });
                }else{
                    layer.msg("内容未填写完整！",{icon:5,time:1200},function(){
                    });
                }
            }
            function showe(res){
                if(res.status!=1) {
                    layer.msg("内容未填写完整！",{icon:5,time:1200},function(){
                    });
                }
            }
        })
    </script>
    <!--富文本编辑器-->
    <script>
        KindEditor.ready(function(K) {
            K.create('#details',{
                allowFileManager:true,
                afterBlur:function(){
                    this.sync("#details");
                }
            });
        });
    </script>
    <!--显示出广告图片-->
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

            $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px',width:'80px',padding:'3px'}).html('重新选择');
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

    <style>
        .button {
            background-color: #3b95c8;
            display: inline-block;
            outline: none;
            cursor: pointer;
            color:#fff;
            border: 0px;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 1.5em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.5);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .3em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);
        }
        .button:hover {
            text-decoration: none;
        }
        .button:active {
            position: relative;
            top: 1px;
        }
    </style>
</head>
<body>
<div class="div_head">
            <span>
                <span style="float:left">当前位置是：广告管理->广告添加</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Advertising/advertising');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>
<div style="font-size: 13px;margin: 10px 5px">
    <form action="#" method="post" enctype="multipart/form-data" id="ad_form">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td style="padding-left: 15px;">广告名称：</td>
                <td><input type="text" name="ad_name"  id="adname" placeholder="请输入广告名称" /></td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">广告位售价：</td>
                <td><input type="text" name="ad_sale" id="sale" placeholder="请输入广告位售价" /></td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">位置：</td>
                <td><input type="text" name="ad_place" id="place" placeholder="首页（banner）1F 2F 3F 4F" /></td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">链接：</td>
                <td><input type="text" name="ad_url" id="link" placeholder="请输入商品跳转链接"/></td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">状态：</td>
                <td>
                    <label><input type="radio" name="ad_rem"  value="可用"/>可用</label><br/>
                    <label><input type="radio" name="ad_rem"  value="禁用"/>禁用</label><br/>
                </td>

            </tr>
            <tr>
                <td style="padding-left: 15px;">广告图片：</td>
                <td>
                    <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:340px;position: relative;float: left;">
                        <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                        <input type="file" name="ad_pic"  id="image" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                        <label for="image"  style="float:left;margin-left:195px;margin-top:140px;color:#fff;text-align:center;border-radius:4px;width:120px;height:20px; font-weight: 600; line-height:20px;font-size:18px;background:#00b7ee;padding:4px 6px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击上传图片</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">广告详情：</td>
                <td>
                    <textarea name="advertising" id="details"  rows="18" cols="50" >
                    </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input style="cursor: pointer" type="submit" value="添加" class="button"/>
                    <input style="cursor: pointer" type="reset" value="重置" class="button"/>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
<script>
    //$('#sub').attr('disabled',true);
    $('#sub').prop('disabled',true);
    $('textarea').on('input',function(){
        //alert('test');
        var len = $(this).val().length;
        if(len>0){
            $('#sub').prop('disabled',false);

        }else{
            $('#sub').prop('disabled',true);
        }
        $('span').text(150 - len);
    });

    $('#pic').on('click',function(){
        $(this).toggleClass('uppic');
        var len = $('textarea').val().length;
        if($(this).hasClass('uppic')){
            $('span').text(150 - len - 24);
            //已经upload了图片
            $(this).text('√ upload_OK');
        }else{
            //还没upload图片
            $(this).text('Add Pic');
            $('span').text(150 - len);
        }

        //判断下看下是否有内容
        var lens = $('span').text();
        if(lens< 150){
            $('#sub').prop('disabled',false);
        }else{
            $('#sub').prop('disabled',true);
        }
    });
</script>
</html>