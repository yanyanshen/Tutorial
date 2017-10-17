<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>分配权限列表</title>

    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    <script src="/Public/Admin/js/jQuery-1.8.2.min.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/layer.js"></script>
    <script>
        $(function(){
            $(".submit").click(function(){
                $(".sub").click();
            })

            $("form[name='form1']").submit(function(){
                $.post("<?php echo U('Group/update');?>",$(this).serialize(),function(res){
                    if(res.status!=0){
                        layer.msg(res.info);
                        function url(){
                            location.href='<?php echo U("Group/groupList");?>';
                        }
                        setTimeout(url,1000)
                    }else{
                        layer.msg(res.info);
                    }
                },'json');
                return false;
            })



            $("input[class^=second]").click(function(){

               var id=$(this).attr("class").substr(6)
               var third=$(this).parents("td").next().children("label").children(".third"+id)

               if($(this).attr("checked")){
                    third.each(function(){
                        if($(this).attr("checked")){
                        }else{
                            $(this).attr("checked",true);
                        }
                    })
                }else{
                    third.each(function () {
                        if($(this).attr("checked")){
                            $(this).attr("checked",false);
                        }else{

                        }
                    })
                }
            })

            $(".first").click(function(){
                var id=$(this).val();
                if($(this).attr("checked")){
                    $(".second"+id).each(function(){
                        if($(this).attr("checked")){
                        }else{
                            $(this).attr("checked",true);
                        }
                    })
                    $(".third"+id).each(function(){
                        if($(this).attr("checked")){
                        }else{
                            $(this).attr("checked",true);
                        }
                    })
                }else {
                    $(".second" + id).each(function () {
                        if($(this).attr("checked")){
                            $(this).attr("checked",false);
                        }else{

                        }
                    })
                    $(".third" + id).each(function () {
                        if($(this).attr("checked")){
                            $(this).attr("checked",false);
                        }else{

                        }
                    })
                }
            })






        })
    </script>
</head>
<body>
<style>
    .tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：管理组管理-》分配权限</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('Group/groupList');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px; margin: 10px 5px;">
    <form action="<?php echo U('Group/update');?>" method="post" name="form1">
        <input type="hidden" name="id" value="<?php echo ($id); ?>">
    <table class="table_a" border="1" width="100%">
        <tbody><tr style="font-weight: bold;">
            <td colspan="5">分配权限</td>
        </tr>

        <?php if(is_array($groups)): $k1 = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k1 % 2 );++$k1;?><tr id="first" style="height: 48px">
                <td style="height: 50px"><label for="<?php echo ($v1['id']); ?>"><?php echo ($v1["title"]); ?><input type="checkbox" id="<?php echo ($v1['id']); ?>" name="rid[]" value="<?php echo ($v1['id']); ?>" class="first" <?php echo ($v1['status']==0?'':'checked'); ?>></label></td>
                        <td>

                        <?php if(is_array($v1["child"])): $k2 = 0; $__LIST__ = $v1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2;?><table style="border-collapse:collapse;border: 1px solid #E3E6EB" border="1" width="100%">
                            <tr id="second<?php echo ($v2['id']); ?>">
                                <td><label for="<?php echo ($v2['id']); ?>"><?php echo ($v2["title"]); ?><input type="checkbox" id="<?php echo ($v2['id']); ?>" name="rid[]" value="<?php echo ($v2['id']); ?>" class="second<?php echo ($v1['id']); ?>" <?php echo ($v2['status']==0?'':'checked'); ?>></label></td>
                                <?php if(!empty($v2["child"])): ?><td>
                                <?php if(is_array($v2["child"])): $k3 = 0; $__LIST__ = $v2["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?><label for="<?php echo ($v3['id']); ?>"><?php echo ($v3["title"]); ?><input type="checkbox" id="<?php echo ($v3['id']); ?>" name="rid[]" value="<?php echo ($v1['id']); ?>" class="third<?php echo ($v1['id']); ?>" <?php echo ($v3['status']==0?'':'checked'); ?>></label>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                                    </td><?php endif; ?>
                            </tr>
                            </table><?php endforeach; endif; else: echo "" ;endif; ?>


                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <tr>
            <td colspan="2" align="center">
                <a class="submit" style="display: inline-block;padding:4px 12px;background-color:#3b95c8;border-radius: 5px;color:white;">确认添加</a>
                <input type="submit" value="添加" style="display: none" class="sub">
            </td>
        </tr>
        </tbody>
    </table>
    </form>
</div>
</body>
<script>

</script>
</html>