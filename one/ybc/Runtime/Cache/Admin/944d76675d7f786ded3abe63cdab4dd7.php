<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/webupload/webuploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/webupload/upload.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Admin/js/webupload/webuploader.css"/>

<script type="text/javascript">
    var uploadUrl ='<?php echo U("Adgood/UploadgoodsPic");?>';
    var listUrl = '<?php echo U("Adgood/index");?>';

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


    //三级联动
    var getCate=function(aid,name){
        $.post('<?php echo U("Adcategory/addCategory");?>',{aid:aid},function(res){
            if(res.status){
                var str='<option value="0" selected>请选择</option>';
                for(var i in res.info){
                    str+='"<option value="' + res.info[i].id + '">' +"---" +res.info[i].adcatename+"---" + '</option>"';
                }
                $('select[name="'+name+'"]').html(str);
                $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
            };
        })
    }
    getCate(0,'firstCate');

    $('select[name="firstCate"]').change(function(){
        getCate($(this).val(),'secondCate');
        $(this).parents('.vocation').next('.vocation').show();
        $('select[name="thirdCate"]').empty().parents('.vocation').hide();
    })

    $('select[name="secondCate"]').change(function(){
        getCate($(this).val(),'thirdCate');
        $(this).parents('.vocation').next('.vocation').show();
    })


});
</script>
<script type="text/javascript">
     $(function(){
         $(".btn").click(function(){
             $("#form1").ajaxSubmit(function(data){
                 if(data){

                    layer.msg(data,{icon:2,time:1500})

                 }else{
                     $('.uploadBtn').click();

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
    <li><a href="#">添加广告商品</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">


        <!--表单开始-->

    <form action="<?php echo U('Adgood/add');?>" method="post" enctype="multipart/form-data" id="form1">

    <ul class="forminfo">

    <li><label>广告商品名称<b>*</b></label>
    <input name="goodsname" type="text" class="dfinput" value="" placeholder="请填写广告商品名称"  style="width:345px;"/>
    </li>

        <li><label>广告分类<b>*</b></label>
            <div class="vocation">
                <select class="select2" name="firstCate">
                </select>
            </div>
            <div class="vocation" style="display:none">
                <select class="select2" name="secondCate" >
                </select>
            </div>
            <div class="vocation" style="display:none">
                <select class="select2" name="thirdCate" >
                </select>
            </div>
        </li>


    <li><label>品牌分类<b>*</b></label>
    <div class="vocation">
    <select class="select1" name="bid">
        <option value="0">请选择</option>
    <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>">------<?php echo ($val["brandname"]); ?>------</option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </li>

        <li><label>商品分类<b>*</b></label>
            <div class="vocation">
                <select class="select1" name="cid">
                    <option value="0">--------分类列表--------</option>
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['catename']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </li>

    <li><label>市场价格<b>*</b></label>
    <input name="oldprice" type="text" class="dfinput" value=""  placeholder="请填写该商品市场价格" style="width:345px;"/>
    </li>

    <li><label>商城价格<b>*</b></label>
        <input name="price" type="text" class="dfinput" value="" placeholder="请填写该商品的销售价格" style="width:345px;"/>
    </li>

    <li><label>商品数量<b>*</b></label>
    <input name="num" type="text" class="dfinput" value="" placeholder="请填写该商品的库存" style="width:345px;"/>
    </li>




    <li><label>商城规格<b>*</b></label>
    <input name="weight" type="text" class="dfinput" value="" placeholder="请填写该商品的规格" style="width:345px;"/>
    </li>

        <li><label>广告图片<b>*</b></label>

            <div class="usercity" style="border:3px dashed #e6e6e6;width:514px;height:300px;position: relative">
                <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                <input type="file" id="image1" name="adpic" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择图片</label>
            </div>
        </li>


    <li style="padding-top: 10px;"><label>商品大图<b>*</b></label>

            <div class="usercity" style="border:3px dashed #e6e6e6;width:514px;height:300px;position: relative">
                <p id="preview2" ><img id="imghead2"  border=0 src=''></p><span></span>
                <input type="file" id="image2" name="file" onchange="previewImage(this,'preview2','imghead2')" style="display:none;" >
                <label for="image2"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择图片</label>
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





    <li style="padding-top: 10px;"><label>商品详情描叙<b>*</b></label>
    

    <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;"></textarea>
    
    </li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发布"/></li>
    </ul>

    </form>
       <!--表单结束 -->

    </div> 

	</div> 

    </div>


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