<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
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
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo ($cosid); ?>" name="cosid"/>
                    <ul class="forminfo">
                        <li><label>回复内容<b>*</b></label><textarea  id="" name="content" cols="30" rows="10"  style="width:600px;height:200px;border:1px solid #cccccc;"></textarea></li>
                    </ul>
                <input id="response" type="button" value="立即回复" style="width: 100px;height: 30px;background-color: #408ad5;border-radius: 5px;margin-left: 300px;"/>
            </form>

        </div>
    </div>
</div>
</body>

</html>
<script type="text/javascript">
    $(function(){
        $('#response').click(function(){
            $.post("<?php echo U('Admin/Comment/pilresponse');?>",$('#form1').serialize(),function(res){
                if(res.status==1){
                    layer.msg(res.info,{time:500},function(){
                        location='<?php echo U("Admin/Comment/index");?>';
                    });
                }
                else{
                    layer.msg('回复内容不能为空',{time:800});
                }
            },'json')
        })
    })
</script>