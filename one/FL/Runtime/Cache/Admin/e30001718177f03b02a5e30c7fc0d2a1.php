<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
    <form action="<?php echo u('Admin/Admin/editAdmin');?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div id="usual1" class="usual">
            <div id="tab1" class="tabson">
                <ul class="forminfo">
                    <li><label>会员名称<b>*</b></label>
                        <input type="text" name="username" id="username" class="dfinput" style="width:167px;" disabled value="<?php echo ($user["username"]); ?>"/>
                        <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>"/><!--在模板中用$Think,在控制器中用I-->
                    </li>
                    <li><label>会员密码<b>*</b></label>
                        <input type="password" name="pwd" id="pwd" class="dfinput" style="width:167px;" value=""/>
                    </li>
                    <li><label>新密码<b>*</b></label>
                        <input type="password" name="newpwd" id="newpwd" class="dfinput" style="width:167px;" value=""/>
                    </li>
                    <li><label>确认新密码<b>*</b></label>
                        <input type="password" name="repwd" id="repwd" class="dfinput" style="width:167px;" value=""/>
                    </li>
                    <!--<li><label>品牌图片<b>*</b></label>
                        <input name="brand_pic" type="file" style="width:170px;" value="{}"/>
                        <img src="<?php echo substr($brand_pic,1);?>" alt="" width="80px;"/>
                    </li>-->
                    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="提交"/><!--<button class="btn" >添加品牌</button>--></li>
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
           //设置验证
           rules:{
               pwd:{
                       required:true,
                       remote:{
                           url:"<?php echo U('Admin/Admin/chkPwd');?>",
                           data:{ //要传过的值  返回true时表示通过验证，false反
                               id: function() { return $("input[name='id']").val();}
                           },
                           type:'post'
                       }
                   },
                   newpwd:{
                       required:true,
                       minlength:3,
                       maxlength:8
                   },
                   repwd:{
                       required:true,
                       equalTo: "#newpwd"
                   }
               },
                messages:{
                    pwd: {
                        required:'密码不能为空',
                        remote: '密码不匹配'
                    },
                    newpwd:{
                        required:'新密码不能为空',
                        minlength:'最少三位数',
                        maxlength:'最多8位数'
                    },
                    repwd:{
                        required:'确认新密码不能为空',
                        equalTo: "两次密码输入不一致"
                    }
                },
           errorElement:'div',
           errorPlacement: function(error, element) {
               error.appendTo( element.parent());
           }
       })

       $('.btn').click(function(){
           if(validate.form()){
               $.post("<?php echo U('Admin/Admin/editAdmin');?>",$('#form1').serialize(),function(res){
                   if(res.status=='ok'){
                       layer.alert(res.msg,{
                           yes: function(){
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