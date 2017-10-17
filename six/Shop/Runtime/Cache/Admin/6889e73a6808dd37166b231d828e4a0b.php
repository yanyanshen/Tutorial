<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加管理组</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
    <!--//此处引入三级联动-->
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".submit").click(function(){
                $(".sub").click();
            })






            $("form[name='form1']").submit(function(){
                var a=0;
                a=parseInt(a);
                $(".check").each(function(){
                    if($(".check").attr("checked")){
                        a=a+1;
                    }
                })
                if(a==0){
                    layer.msg("请选择后在提交,如果没有成员，请点击右上角返回")
                }else{
                    $.post("<?php echo U('Group/addmember');?>",$(this).serialize(),function(res){
                        if(res.status){
                            layer.msg(res.info);
                            function url(){
                                location.href='<?php echo U("Group/groupList");?>';
                            }
                            setTimeout(url,1000)
                        }else{
                            layer.msg(res.info);
                        }
                    },'json');
                }

                return false;
            })


        })

    </script>





</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：权限管理-》添加成员</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('Group/groupList');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="<?php echo U('Group/groupList');?>" method="post" enctype="multipart/form-data" name="form1">
        <table border="1" width="100%" class="table_a">
            <tr style="font-weight: bold;">
                <td colspan="5">为<?php echo ($name["title"]); ?>添加组员</td>
            </tr>
            <tr>
                <?php if(is_array($member)): $k = 0; $__LIST__ = $member;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><td width="20%"><label for="<?php echo ($v['id']); ?>"><?php echo ($v["username"]); ?><input type="checkbox" id="<?php echo ($v['id']); ?>" name="uid[]" value="<?php echo ($v['id']); ?>" class="check" <?php echo ($v["status"]==1?"checked":""); ?>></label></td>
                    <?php if($k/5 == 0): ?></tr>
                        <tr><?php endif; endforeach; endif; else: echo "$empty" ;endif; ?>
                <?php if($k%5 == 0): else: ?>
                    <?php $__FOR_START_8530__=0;$__FOR_END_8530__=5-$k%5;for($i=$__FOR_START_8530__;$i < $__FOR_END_8530__;$i+=1){ ?><td width="20%"></td><?php } endif; ?>


            </tr>
            <tr>
                <td colspan="2"></td>
                <td  align="center">
                    <input type="hidden" name="group_id" value="<?php echo ($name['id']); ?>">
                    <a class="submit" style="display: inline-block;padding:4px 12px;background-color:#3b95c8;border-radius: 5px;color:white;">确认添加</a>
                    <input type="submit" value="添加" style="display: none" class="sub">
                </td>
                <td colspan="2"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>