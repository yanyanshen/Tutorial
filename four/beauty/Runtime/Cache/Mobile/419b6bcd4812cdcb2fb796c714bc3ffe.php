<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>头像上传</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="拍鞋网,拍鞋网官方网站,拍鞋网商城" />
    <meta name="description" content="买鞋子哪个网站好，当然首选拍鞋网!中国最早成立的正品鞋子购物网站,国内最大的品牌鞋子销售广场。所售鞋子100%厂家授权,全国包邮,货到付款,提供最完美的购物体验！" />
    <link rel="icon" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/beauty/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="/beauty/Public/Mobile/css/bootstrap.min.css" rel="stylesheet">
    <style>
         .error{font-size: 10px;font-weight: bold;color: red;display:inline-block;text-align: center;}
         .ok{display:inline-block; color:green;text-align: center;font-size: 8px;}
    </style>
</head>
<body>
<link rel="stylesheet" href="/beauty/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
<!--改版后 com1-3.css可以去掉-->
<link type="text/css" rel="stylesheet" href="/beauty/Public/Mobile/css/com1-3.css?2015091516" />
<!--新改的-->
<link type="text/css" rel="stylesheet" href="/beauty/Public/Mobile/css/com1-4.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/beauty/Public/Mobile/css/download.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/beauty/Public/Mobile/css/public-adaptation1-1.css?2015091516" />
<!--红包分享，临时添加-->
<!-- uc 浏览器添加书签 start --->
<iframe src="http://app.uc.cn/appstore/AppCenter/frame?uc_param_str=nieidnutssvebipfcp&amp;api_ver=2.0&amp;id=1904" width="100%" height="160" style="display:none" id="otherPage"></iframe>
<!-- uc 浏览器添加书签 end   ---->
<script>
</script>
<div class="mask hidden"></div>
<!--content-->
<form action="<?php echo U('Mobile/AddPhoto/addUserImg');?>" method="post" id="address">
<div class="page-role cart-page cart-trolly-page" id="js-cart-trolly-page">
    <div class="com-title" >
    <div style="float: left;margin-left: 10px;">
        <a title="返回" href="<?php echo U('Mobile/Member/index');?>" style="color: white;">
            &lt;&nbsp;&nbsp;更换头像
        </a>
    </div>
    </div>

</div>
    <ul>
    <li style="height: 40px">
        <label style="font-size: 16px">请选择图片<b style="color: #ff0000">*</b></label>
        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
            <input type="file" id="image1" name="img" onchange="previewImage(this,'preview1','imghead1')" style="display:none; " >
            <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择头像</label>
        </div>
    </li>

    <li style="height: 40px"><input style="margin:350px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:40px;line-height:40px;font-size:18px;background:#FF4E00;padding:0px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);"
                                    type="submit" id="submit" value="确定更换"/>
    </li>
    </ul>
    </div>
</div>
</form>
</body>
<script src="/beauty/Public/Mobile/js/jquery.min.1.8.2.js"></script>
<script src="/beauty/Public/Mobile/js/distpicker.js"></script>
<script src="/beauty/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript" src="/beauty/Public/Mobile/js/layer_mobile/layer.js"></script>
</html>

<script type="text/javascript">
    //头像异步提交
    $(function(){
        $('#submit').click(function(){
            $('#address').ajaxSubmit(function (res) {
                if (res.status == 1) {
                   layer.open({
                       content: res.info,
                       time:1000,
                       type: 1,
                       skin:'msg',
                       success: function () {
                           location.href = "<?php echo U('Mobile/Member/index');?>";
                       }
                   })
                }else{
                    layer.open({
                        content:'头像更换失败',
                        type: 1,
                        skin:'msg',
                        end: function () {
                            location.href = "<?php echo U('Mobile/AddPhoto/AddPhoto');?>";
                        }
                    })
                }
            });
            return false;
        })
    })
</script>


<!--
头像上传
-->
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