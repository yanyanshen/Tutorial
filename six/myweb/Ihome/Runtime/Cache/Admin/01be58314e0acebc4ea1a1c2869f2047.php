<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Jquery/jQuery-1.8.2.min.js"></script>
    <script src="/Public/kindeditor/kindeditor-all.js"></script>
    <script type="text/javascript" src="/Public/layer-v2.4/layer.js"></script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    <form action="<?php echo U('noticeAdd');?>" method="post" enctype="multipart/form-data">
        <ul class="forminfo">
            <li><label>编辑类型<b>*</b></label>
                <div class="vocation">
                    <select class="dfinput" name="type" id="fl">
                        <option value="0">商城动态</option>
                        <option value="1">商城公告</option>
                    </select>
                </div>
            </li>
            <li><label>文章标题<b>*</b></label><input id="title" name="title" type="text" class="dfinput" value=""/>标题不能超过30个字符</li>
            <li><label>关键字&nbsp;&nbsp;&nbsp;<b>*</b></label><input id="word" name="keyword" type="text" class="dfinput" value=""/>多个关键字用,隔开</li>
            <li><label>引用地址</label><input id="url" name="url" type="text" class="dfinput" value="http://www.it.com" /></li>
            <!--<li><label>文章内容<b>*</b></label><textarea name="content" cols="" rows="" class="textinput"></textarea></li>-->
            <li><texarea style="width: 550px;height: 300px;" id="ked" name="text" value=""></texarea></li>
            <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认保存"/></li>
        </ul>
    </form>
    </div>
</body>
<script>
    KindEditor.ready(function(K) {
        K.create('#ked', {
            resizeType : 1,
            allowPreviewEmoticons : true,
            allowImageUpload : true,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link'],
            afterBlur: function(){this.sync();}
        });
    });
    $(".btn").click(function(){
        var fl=$("#fl").val();
        var title=$("#title").val();
        var word=$("#word").val().trim();
              if(word==''){
                  word=title;
              }
        var content=$("#ked").html();
        var url=$("#url").val();
        if(title.trim()==''){
            layer.alert('标题不能为空')
        }else{
            if(content.trim()==''){
                layer.alert('内容不能为空')
            }else{
                var  data={'fl':fl,'title':title,'keyword':word,'url':url,'content':content};
                $.ajax({
                    url:"add",
                    type:'post'         ,
                    data:data,
                    success:(function(rel){
                        alert(rel)
                        if(rel=="添加成功"){
                            window.location.href="notice"
                        }
                    })
                })
            }
        }
    })
</script>

</html>