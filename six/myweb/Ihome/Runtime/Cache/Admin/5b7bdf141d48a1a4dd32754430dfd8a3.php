<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Jquery/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/layer/layer.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="/Public/Jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
        <script type="text/javascript">KE.show({id : 'content7', cssPath : './index.css'});</script>
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
            <li><a href="#">分类管理</a></li>
            <li><a href="#">添加分类</a></li>
            </ul>
        </div>
        <div class="formbody">
            <div id="usual1" class="usual">
                <div id="tab1" class="tabson">
                    <form action="<?php echo U('Admin/Category/addCategory');?>" method="post" id="cateInfo">
                        <ul class="forminfo">
                            <li><label>商品类别<b>*</b></label>
                                <div class="vocation">
                                    <select class="select1" name="pid">
                                        <option>添加分类</option>
                                        <option value="0">顶级分类</option>
                                        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><option value='<?php echo ($value["cid"]); ?>'>
                                                <?php echo ($value["catename"]); ?>
                                            </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </li>
                            <li><label>分类名称<b>*</b></label><input id='catename' name="catename" type="text" class="dfinput" value="" style="width:345px;"/></li>
                            <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认添加" id="btn"/></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        $('#btn').click(function(){
            if(!$('#catename').val()){
                layer.alert('分类名称不能为空');
                return false;
            }else{
                layer.confirm('你确定要添加该分类么？', {
                    btn: ['确定','取消']
                }, function(){
                    $.post("<?php echo U('Admin/Category/addCategory');?>",$('form').serialize(),function(res){
                        if(res.status=='error'){
                            layer.msg('该分类已存在', {icon: 1});
                        }else{
                            layer.msg('添加成功', {icon: 1,time:2000},function(){
                                location.reload();
                            });
                        }
                    });
                }, function(){
                    layer.msg('已取消', {icon:1});
                });
            }
        });
    </script>
</html>