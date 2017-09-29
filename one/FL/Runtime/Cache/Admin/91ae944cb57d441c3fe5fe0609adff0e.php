<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script src="/Public/js/jQuery-1.8.2.min.js"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{

            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
            margin-left:86px;  /*200px你自己随便调*/
        }
    </style>

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
    <form action="<?php echo U('Admin/Admin/addAdmin');?>" method="post" enctype="multipart/form-data" id="form1">
        <div id="usual1" class="usual">
            <div id="tab1" class="tabson">
                <ul class="forminfo">
                    <div>
                    <li><label>管理员名称<b>*</b></label>
                        <input type="text" name="username" class="dfinput" style="width:167px;"/>
                    </li>
                    </div>
                    <div>
                    <li>
                        <label>管理员密码<b>*</b></label>
                        <input type="password" name="pwd" class="dfinput" style="width:167px;"/>
                    </li>
                    </div>
                    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="添加管理员"/><!--<button class="btn" >添加品牌</button>--></li>
                </ul>
            </div>
        </div>
    </form>
</div>

</body>
<script src="/Public/js/jQuery-1.8.2.min.js"></script>
<script src="/Public/js/jquery.validate.js"></script>
<script src="/Public/js/layer/layer.js"></script>
<script type="text/javascript">
    $(function(){
        var validate=$('#form1').validate({
            rules: {
                username: {
                    required: true,
                    remote:{
                        url:"<?php echo U('Admin/Admin/chkUsername');?>",
                        type:'post'
                    }
                },
                pwd: {
                    required: true
                }
            },
            messages:{
                 username:{
                        required:'用户名不能为空',
                        remote:'用户名已存在'
                    },
                 pwd:{
                        required:'密码不能为空'
                    }
             },
            errorElement:'div',
             errorPlacement: function(error, element) {
                    error.appendTo( element.parent());
             }
        })


        $('.btn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Admin/Admin/addAdmin');?>",$('#form1').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                location.href="<?php echo U('Admin/Admin/adminList');?>";
                            }
                        });
                    }else{
                        layer.alert(res.msg);
                    };
                })
            }
        })

    })
</script>
</html>