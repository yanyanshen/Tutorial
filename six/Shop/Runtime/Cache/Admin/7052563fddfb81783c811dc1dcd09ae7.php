<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script>
        $(function(){

            var validate=$('.form1').validate({
                //验证规则
                rules:{
                    bname:{
                        required:true
                    },
                    logo:{
                        required:true
                    },
                    website:{
                        required:true
                    }
                },
                //设置提示信息
                messages:{
                    bname:{
                        required:'商品名不能为空'
                    },
                    logo:{
                        required:'市场价格不能为空'
                    },
                    website:{
                        required:'本站价格不能为空'
                    }
                },

                success: function(label) {
                label.addClass("ok").text('通过验证');
                },
            validClass: "ok"
            })



            $(document).ready(function(){
                option={
                    url:  "<?php echo U('Brand/addbrand');?>",
                    type:  "post",
                    success:  shows,
                    error:  showe

                };

            })
                $(".form1").submit(function(){

                        $(this).ajaxSubmit(option);
                    return false;
                });

            function shows(){
                layer.msg("添加成功",{icon:1})
                function url(){
                    location.href='<?php echo U("Brands/add");?>';
                }
                setTimeout(url,1000)
            }
            function showe(){
                layer.msg("添加失败",{icon:2})
            }



        })
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
                <span style="float:left">当前位置是：品牌管理-》添加品牌信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Brand/show');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="<?php echo U('Brand/addbrand');?>" method="post" enctype="multipart/form-data" class="form1">
        <table border="1" width="100%" class="table_a">
            <input type="hidden" value="" class="thereturn">
            <tr>
                <td>品牌名称</td>
                <td><input type="text" name="bname" placeholder="请填写品牌名称" /></td>
            </tr>
            <tr>
                <td class="td_right">品牌logo：</td>
                <td class="" id="goodsfile">
                    <!--<div>-->
                        <!--<input type="file" name="logo" class="input-text lh30" size="10">-->
                    <!--</div>-->
                    <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                        <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                        <input type="file" id="image1" name="logo" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                        <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择主图</label>
                    </div>
                </td>





            </tr>
            <tr>
                <td class="td_right">品牌域名：</td>
                <td>
                    <div>
                        <input type="text" name="website" class="input-text lh30" size="10">
                    </div>
                </td>
            </tr>
            <tr>
                <td>品牌类别</td>
                <td>
                    <select name="type">
                        <option value="1">男装品牌</option>
                        <option value="2">女装品牌</option>
                        <option value="3">国内品牌</option>
                        <option value="4">国外品牌</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>品牌简介</td>
                <td>
                    <textarea name="description" rows="7" cols="50" id="goodspro"></textarea>
                </td>
            </tr>

            <tr>

                <td colspan="2" align="center">
                    <input type="submit" value="添加" class="button">
                    <input type="reset" value="重置" class="button">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
<script src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
<script src="/Public/Admin/js/laydate.js"></script>
<script>
    KindEditor.ready(function(K) {
        K.create('#goodspro',{
        allowFileManager:true,
            afterBlur:function(){
                    this.sync("#goodspro");

        }
    });

    });
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


    //    KindEditor.ready(function(m) {
//        window.editor = m.create('#goodsdetail');
//
//    });

</script>
</html>