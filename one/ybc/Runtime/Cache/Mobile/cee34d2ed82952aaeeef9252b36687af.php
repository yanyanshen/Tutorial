<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <title><?php echo ($type==1?'退':'换'); ?>货</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <script src="/Public/Mobile/js/jquery.form.js"></script>
    <script src="/Public/Mobile/js/jquery.uploadView.js"></script>
    <style type="text/css">
        html { font-size: 10px;}
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.5rem; background:#fff;}
        ul,ul li { list-style: none;}
        .one{ margin-top: 1rem; padding:0 1rem; font-size: 2rem; color: #ee0000; }
        .two{ margin-top: 1rem; padding:0 1rem; font-size: 1.5rem; }
        .three{ margin-top: 1rem; padding:0 1rem; height: auto; display: inline-block; font-size: 1rem; width: 100%; overflow: hidden; }
        .three textarea{ resize: none; float: right; width: 70%; border: 0;padding: 0; height:auto; }
        .three span{ float: left; width: 30% }
        .three img{ width: 100% }

        .btn-upload { width: 98%; height: 32px; position: relative; margin-bottom: 10px; margin-right: 0.1rem;}
        .btn-upload a { display: inline-block; width: 98%; line-height: 1.8rem; padding: 0.6rem 0; text-align: center; color: #4c4c4c; background: #fff; border: 1px solid #cecece; }
        .btn-upload a span{ width: 98%;}
        .btn-upload input { width: 98%;  height: 3rem;  position: absolute; left: 0px; top: 0; z-index: 1; filter: alpha(opacity=0); -moz-opacity: 0; opacity: 0; cursor: pointer; }
        .js_uploadBox{ width: 33%; float: left;}
    </style>
</head>
<script type="text/javascript">
    $(function(){

        $('#form1').submit(function() {
            $(this).ajaxSubmit(function(res) {
                if(res.status==1){
                    layer.open({content:res.info,skin:'msg',time:1});
                    setInterval(function(){history.back();},1000);
                }else{
                    layer.open({content:res.info,skin:'msg',time:2});
                }
            });
            return false; //阻止表单默认提交
        });

        apply=function(){
            reason=$.trim($("#reason").val());
            message=$.trim($("#message").val());
            if(reason==''){
                layer.open({ content:"申请原因不能为空"})
            }else if(reason.length<5 || reason.length>20){
                layer.open({ content:"申请原因应在5~20个字符之间"})
            }else if(message==''){
                layer.open({ content:"详细原因不能为空"})
            }else if(message.length<10 || message.length>200){
                layer.open({ content:"详细原因应在10~200个字符之间"})
            }else{
                layer.open({content:"是否提交？",btn:['yes','no'],yes:function(){
                    $("#form1").submit();
                }})
            }
        }
        $(".js_upFile").uploadView({
            uploadBox: '.js_uploadBox',//设置上传框容器
            showBox : '.js_showBox',//设置显示预览图片的容器
            width : 100, //预览图片的宽度，单位px
            height : 100, //预览图片的高度，单位px
            allowType: ["gif", "jpeg", "jpg", "bmp", "png"], //允许上传图片的类型
            maxSize :2, //允许上传图片的最大尺寸，单位M
            success:function(e){
                $(".js_uploadText").text('更改图片');
            }
        });
    })


</script>
<body>
<div style="display: inline-block; background:#000;color:#fff;width: 100%;height: 4rem;line-height: 4rem;padding-left: 0.8rem;">
    <a href="javascript:history.go(-1);" style="font-size: 2rem;text-decoration: none; color: #fff  ;">&lt; 售后申请</a>
</div>
<div class="one">申请<?php echo ($type==1?'退':'换'); ?>货</div>
<div class="two"></div>

<hr/>
<form action="<?php echo U('Services/apply');?>?hid=<?php echo ($hid); ?>&type=<?php echo ($type); ?>" method="post" enctype="multipart/form-data" id="form1">
<div class="three"><span>申请原因：</span><textarea id="reason" name="reason"><?php echo ($info["reason"]); ?></textarea></div>
<div class="three"><span>申请理由：</span><textarea id="message" name="message" style="height: 5rem;"><?php echo ($info["message"]); ?></textarea></div>
<div class="three"><span>上传图片：</span></div>
<div class="three">
    <div class="control-group js_uploadBox">
        <div class="btn-upload">
            <a href="javascript:void(0);"><span class="js_uploadText">选择图片</span></a>
            <input class="js_upFile" type="file" name="pic[]">
        </div>

        <div class="js_showBox "><img class="js_logoBox" src="" width="100px" ></div>
    </div>
    <div class="control-group js_uploadBox">
        <div class="btn-upload">
            <a href="javascript:void(0);"><span class="js_uploadText">选择图片</span></a>
            <input class="js_upFile" type="file" name="pic[]">
        </div>

        <div class="js_showBox "><img class="js_logoBox" src="" width="100px" ></div>
    </div>
    <div class="control-group js_uploadBox">
        <div class="btn-upload">
            <a href="javascript:void(0);"><span class="js_uploadText">选择图片</span></a>
            <input class="js_upFile" type="file" name="pic[]">
        </div>
        <div class="js_showBox "><img class="js_logoBox" src="" width="100px" ></div>
    </div>
</div>
</form>
<div onclick="apply()" style="margin: 1rem auto; text-align: center; padding: 0.5rem; width: 6rem;border-radius: 0.3rem; background: #ee0000; color: #fff;">提交申请</div>

</body>
</html>