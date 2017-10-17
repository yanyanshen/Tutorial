<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改头像</title>
    <link href="__ADMINSKIN__/css/style.css" rel="stylesheet" type="text/css" />
    <link href="__ADMINSKIN__/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="__ADMINSKIN__/css/webuploader.css" />
    <!--在此添加图片编辑css-->
    <script src="/Shop/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Shop/Public/Mobile/js/jquery.form.js"></script>
    <script src="/Shop/Public/Mobile/js/layer_mobile/layer.js"></script>
    <script type="text/javascript" src="__ADMINSKIN__/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="__ADMINSKIN__/js/select-ui.min.js"></script>
    <script type="text/javascript" src="__ADMINSKIN__/js/webuploader.js"></script>
    <script type="text/javascript" src="__ADMINSKIN__/js/upload.js"></script>
    <!--添加广告-->
    <script type="text/javascript">
        $(function(){
            $(document).ready(function(){
                option={
                    url:"<?php echo U('MyInfo/edit');?>",
                    type: "post",
                    success: shows,
                    error: showe
                }
            })
            $("#form1").submit(function(){
                $(this).ajaxSubmit(option);
                return false;
            })
            function shows(res){
                if(res.status!=0) {
                    layer.open({
                        content: '恭喜你更改头像成功'
                        ,skin: 'msg'
                        ,time: 1//2秒后自动关闭
                    });
                    function a(){
                        location.href="<?php echo U('MyInfo/myInfo');?>"
                    }
                    setTimeout(a,1000);
                }else{
                    layer.open({
                        content: '对不起更改头像失败'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            }
            function showe(res){
                if(res.status==0) {
                    layer.open({
                        content: '对不起更改头像失败'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
//                    layer.msg("更改失败！",{icon:5,time:1200},function(){
//                        location.href="<?php echo U('Member/memberEdit');?>";
//                    });
                }
            }
        })
    </script>
</head>
        <body>
        <a href="<?php echo U('MyInfo/myInfo');?>" style="text-decoration: none"><div style="width: 100%;height: 60px; font-size: 40px; background: #1C1C20;color: white; line-height: 60px;">&nbsp;
                <返回</div></a>
            <div style="margin-top: 30px;margin-left: -80px">
                <form action="" method="get" enctype="multipart/form-data" id="form1">
                    <table style="width: 220px;float: left;margin-left: 140px">
                        <tr>
                            <td style="border: hidden;">
                                <div class="usercity" style="border:3px dashed #e6e6e6;width:500px;height:500px;position: relative;float: left;">
                                    <p id="preview1" ><img id="imghead1" border=0 src=''></p><span></span>
                                    <input type="file" name="pic"  id="image" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                                    <label for="image"  style="float:left;margin-left:140px;margin-top:200px;color:#fff;text-align:center;border-radius:4px;width:220px;height:50px; font-weight:500;line-height:50px;font-size:36px;background:#E40112;padding:4px 6px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击更改头像</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="btn" style="float: left;margin-left: 30px;margin-top: 230px;">
                        <input id="ti" type="submit" value="&nbsp;保&nbsp;&nbsp;&nbsp;存" style=" border: hidden; text-align: center;font-size: 30px;border-radius: 4px;font-weight: 500; color: #ffffff; background:#E40112;cursor: pointer;width: 180px;height: 50px;" />
                    </div>
                </form>
            </div>
        </body>
<!--显示出广告图片-->
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 400;
        var MAXHEIGHT = 400;
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'30px',width:'180px',padding:'3px'}).html('重新选择');
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