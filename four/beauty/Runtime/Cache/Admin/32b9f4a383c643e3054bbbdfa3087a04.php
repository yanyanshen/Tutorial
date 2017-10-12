<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品发布</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/js/webuploader/webuploader.css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
<script type="text/javascript">
    var uploadUrl = '<?php echo U("uploadGoodsPic");?>';
    var listUrl = '<?php echo U("index");?>';

    $(document).ready(function(e) {
        KindEditor.ready(function (K) {
            K.create('#content7', {
                allowFileManager: true,
                afterBlur: function () {  //利用该方法处理当富文本编辑框失焦之后，立即同步数据
                    this.sync("#content7");
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

    /*添加分类三级联动*/
    var getCate=function(pid,name,id){
        $.post('<?php echo U("Admin/Goods/getCateByPid");?>',{pid:pid},function(res){
            if(res.status){
                var str='';
                for(var i in res.info){
                    selected=res.info[i].id==id?'selected ':'';
                    str+='"<option '+ selected +'value="' + res.info[i].id + '">' + res.info[i].cname + '</option>"';
                }
                $('select[name="'+name+'"]').html(str);
                $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
            }
        })
    };
 /*   getCate(0,'firstCate');*/

    getCate(0,'firstCate',<?php echo ($cate[0]['id']); ?>);
    if("<?php echo ($cate[0]['id']); ?>"){
        getCate(<?php echo ($cate[0]['id']?$cate[0]['id']:1); ?>,'secondCate',<?php echo ($cate[1]['id']?$cate[1]['id']:1); ?>);
    }
    if("<?php echo ($cate[1]['id']); ?>"){
        getCate(<?php echo ($cate[1]['id']?$cate[1]['id']:1); ?>,'secondCate',<?php echo ($cate[2]['id']?$cate[2]['id']:1); ?>);
    }
    $('select[name="firstCate"]').change(function(){
        getCate($(this).find(':selected').val(),'secondCate');
        $(this).parents('.vocation').next('.vocation').show();
        $('select[name="thirdCate"]').empty().parents('.vocation').hide();
    });

    $('select[name="secondCate"]').change(function(){
        getCate($(this).val(),'thirdCate');
        $(this).parents('.vocation').next('.vocation').show();
    });

    $.post("<?php echo U('Admin/Goods/brandlist');?>",function(res){
        if(res.status){
            var str='<option value="0" selected>请选择</option>';
            for(var i in res.info){
                str+='<option value="'+res.info[i].id +'">' + res.info[i].bname+ '</option>';
            }
            $('select[name="bname"]').html(str);
            $('select[name="bname"]').parent().find(".uew-select-text").text($('select[name="bname"]').find(':selected').text());
        }
    });


    //提交商品发布表单
    $('.btn').click(function(){
        $('#editor').ajaxSubmit(function(res){
            if(res.status){
                layer.msg(res.info,{icon:1},function(){
                            location.href=listUrl;
                        });
            }else{
                layer.msg('编辑失败');
            }
        })
        return false;
    })

});


</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">商品管理</a></li>
    <li><a href="#">商品发布</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">
 <form action="<?php echo U('Admin/Goods/editor');?>" id="editor" method="post" enctype="multipart/form-data">
    <ul class="forminfo">
        <input type="hidden" name="gid" value="<?php echo ($goodsOne["id"]); ?>"/>
        <input type="hidden" name="cid" value="<?php echo ($goodsOne["cid"]); ?>"/>
        <input type="hidden" name="bid" value="<?php echo ($goodsOne["bid"]); ?>"/>
    <li><label>商品名称<b>*</b></label><input name="goodsname" type="text" class="dfinput" value="<?php echo ($goodsOne["goodsname"]); ?>"  style="width:518px;"/></li>
        <li><label>商品分类<b>*</b></label>
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
        <li><label>商品品牌<b>*</b></label>
            <div class="vocation">
            <select name="bname" class="select1" style="width: 150px;">

            </select>
        </div></li>
        <li>
            <label>商品属性<b>*</b></label>
            <?php if(is_array($type)): $k = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><input name="ml[]" type="text" class="dfinput" value="<?php echo ($v["ml"]); ?>" style="width:100px;margin-right: 10px;"><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>
        <li><label>商品积分<b>*</b></label><input name="score" type="text" class="dfinput" value="<?php echo ($goodsOne["score"]); ?>" style="width:345px;"></li>
        <li><label>市场价格<b>*</b></label><input name="marketprice" type="text" class="dfinput" value="<?php echo ($goodsOne["marketprice"]); ?>" style="width:345px;"></li>
        <li><label>折扣价格<b>*</b></label><input name="discount" type="text" class="dfinput" value="<?php echo ($goodsOne["discount"]); ?>" style="width:345px;"></li>
        <li><label>销售价格<b>*</b></label>
            <?php if(is_array($type)): $k = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><input name="saleprice[]" type="text" class="dfinput" value="<?php echo ($v["saleprice"]); ?>" style="width:100px;margin-right: 10px;"><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>
        <li><label>黄金会员专享<b>*</b></label><input name="ismember" type="text" class="dfinput" value="<?php echo ($goodsOne["ismember"]); ?>" style="width:100px;"></li>
        <li><label>库存<b>*</b></label><input name="num" type="text" class="dfinput" value="<?php echo ($goodsOne["num"]); ?>" style="width:345px;"></li>
        <li>
            <label>商品主图<b>*</b></label>
            <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                <p id="preview0" ><img width="300" id="imghead0"  border=0 src='/Uploads/<?php echo ($goodsOne["imageurl"]); ?>300_<?php echo ($goodsOne["imagename"]); ?>'></p><span></span>
                <input type="file" id="image0" name="0" onchange="previewImage(this,'preview0','imghead0',300,300)" style="display:none;" >
                <label for="image0"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改主图</label>
            </div>
        </li>
        <li>
            <label>商品图片<b>*</b></label>
            <?php if(is_array($goodspic)): $i = 0; $__LIST__ = $goodspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="usercity" style="border:3px dashed #e6e6e6;width:170px;height:155px;margin:5px 0px;position: relative">
                    <p id="preview<?php echo ($v["id"]); ?>" ><img width="150" id="imghead<?php echo ($v["id"]); ?>"  border=0 src='/Uploads/<?php echo ($v["picurl"]); ?>100_<?php echo ($v["picname"]); ?>'></p><span></span>
                    <input type="file" id="image<?php echo ($v["id"]); ?>" name="<?php echo ($v["id"]); ?>" onchange="previewImage(this,'preview<?php echo ($v["id"]); ?>','imghead<?php echo ($v["id"]); ?>',150,150)" style="display:none;" >
                    <label for="image<?php echo ($v["id"]); ?>"  style="margin:0;top:0;position:absolute;background:rgba(0,0,0,0.4);color:#fff;font-size:12px;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">修改图片</label>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>
        <li><label>商品详情<b>*</b></label>
            <textarea id="content7" name="detail" style="width:700px;height:250px;visibility:hidden;"><?php echo ($v["description"]); ?></textarea>
        </li>
        <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确定修改"/></li>
    </ul>
        </form>
    </div>
    </div>
    </div>
</body>
</html>
<script>
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

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.5)',color:'#fff'}).html('重新选择');
        // $(file).parent().append('<span class="update()" style="margin:0;top:30px;position:absolute;background:rgba(0,0,0,0.9);color:#ff0;text-align:center;border-radius:4px;width:60px;height:20px;line-height:20px;padding:3px 3px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">确定更新</span>');
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