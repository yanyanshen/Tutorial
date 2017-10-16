<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        #mid{width:200px;text-align:center;height:30px;margin-top:20px;margin-left:40px;padding-left:10px;}
        #sub{width:200px;text-align:center;height:36px;font-size:18px;border:0px;
            margin-top:20px;margin-left:40px;cursor:pointer;background-color:#FF3333;color:black;}
        #sub:hover{background-color:red;color:white;font-size:22px;font-weight:bolder}
    </style>
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
</head>
<body>
    <div style="width:300px;height:120px;background-color:#C5C5C5;;margin:0 auto;">
        <form action="<?php echo U('AuthGroup/addMember');?>" method="post" id="form1">
            <input type="hidden" value="<?php echo ($group_id); ?>" name="group_id">
            <select id="mid" name="uid">
                <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><option value="<?php echo ($val['uid']); ?>"><?php echo ($val['adminname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input id="sub" type="button" value="确认添加">
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    $("#sub").click(function(){
        $.post("<?php echo U('Admin/AuthGroup/addMember');?>",$("#form1").serialize(),function(res){
            if(res.status=="ok"){
                layer.msg(res.msg,{icon:6,time:2000},function(){
                    parent.location.reload();
                })
            }else{
                layer.alert(res.msg);
            }
        })
    })
</script>