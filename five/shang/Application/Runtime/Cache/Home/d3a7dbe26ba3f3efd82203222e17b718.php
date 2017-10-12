<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑地址</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/geo.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <style type="text/css">
        .btn {
            background: red;
            border-radius:10px;
            width: 80px;
            height:40px;
            margin-left: 120px;
            margin-bottom: 120px;
        }
        .btn:hover{
            cursor:pointer;
        }
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        label.error{

            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div  class="box">
    <form action="" id="form1" method="post">
        <p class="p0"> 姓名：&nbsp;&nbsp;&nbsp;<input value="<?php echo ($address["name"]); ?>" name="name" class="form" type="text" id="username"/></p>
        <p class="p1">地址：<select class="select" name="a1" id="s1"> </select>
            <select class="select" name="a2" id="s2"></select>
            <select class="select" name="a3" id="s3"></select>
        <p class="p2">详细地址：<input  type="text" value="<?php echo ($address["detail"]); ?>" name="detail" id="address2"> </p>
        <p class="p3">手机号：<input type="text" value="<?php echo ($address["tel"]); ?>" name="tel" id="tel"> </p><br />
        <p class="p4">邮编：<input type="text" value="<?php echo ($address["zip"]); ?>" name="zip" id="zip"> </p>
        <input type="hidden" name="id" value="<?php echo ($address["id"]); ?>">
        <input class="btn" type="button" id="btn" value="确定">
    </form>

</div>
</body>
<script>
    setup();
    preselect('<?php echo ($address["a1"]); ?>');
    $('#s2 option').each(function(i,n){
        if(n.value == "<?php echo ($address["a2"]); ?>"){
            $(n).attr('selected','true')
        };
    });
    $('#s3 option').first().html("<?php echo ($address["a3"]); ?>").val("<?php echo ($address["a3"]); ?>");

    $(function() {
        var validate = $("#form1").validate({
            //设置验证规则
            rules: {
                name: {
                    required: true
                },
                address2: {
                    required: true
                },
                zip: {
                    postCode: true
                },
                tel: {
                    required: true,
                    mobile: true
                }
            },
            //设置提示信息
            messages: {
                name: {
                    required: '请填写姓名'
                },
                address2: {
                    required: '请填写详细地址'
                },
                zip: {
                    postCode: '邮编格式错误'
                },
                tel: {
                    required: '请填写手机号码',
                    mobile: '请输入正确的手机号码'
                }
            },

            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }

        });
        // 邮政编码验证
        jQuery.validator.addMethod("postCode", function (value, element) {
            var codeReg = /^[0-9]{6}$/;
            return this.optional(element) || (codeReg.test(value));
        }, "请正确填写您的邮政编码");

        // 手机号码验证
        jQuery.validator.addMethod("mobile", function (value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");
        jQuery.validator.onfocus=true;
        $('#btn').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Home/Order/edit_ars');?>",$('#form1').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.msg(res.msg,{
                            icon: 1,
                            time: 1000
                        },function(){
                            parent.location.reload();
                            location.close();

                        });

                    }else{
                        layer.msg(res.msg,{
                            icon: 2,
                            time: 1000
                        });

                    }
                })
            }

        })
    });
</script>

</html>