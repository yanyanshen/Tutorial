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

    $(file).next('label').css({position:"relative",top:"10px",opacity:"0.6"}).html('更换图片');
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
}/**
 * Created by Administrator on 2016/7/28.
 */
