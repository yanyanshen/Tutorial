<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>修改收货地址</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <script src="/Public/Home/js/geo.js"></script>
</head>
<style>
    #div1{
        margin-left: 25px;
    }
    #div1 span{
        font-family:楷体;
    }
    #div1 em{
        color:red;
    }
    #div1 input{
        width:250px;
        height: 25px;
    }
</style>
<body>
<div id="div1">
    <form id="form1"  action="<?php echo u('Member/changeAdress1');?>" method="post">
        <?php if(is_array($adressInfo)): $i = 0; $__LIST__ = $adressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><em>*</em>&nbsp;<span>收货人:</span><br/>
        <input type="text" name="username" value="<?php echo ($val["username"]); ?>"><br/><br/>

            <input type="hidden" value="<?php echo ($val["id"]); ?>" name="id">

        <em>*</em>&nbsp;<span>所在地区:</span><br/>
        <select class="select" name="province" id="s1">
            <option></option>
        </select>
        <select class="select" name="city" id="s2">
            <option></option>
        </select>
        <select class="select" name="town" id="s3">
            <option></option>
        </select><br/><br/>

        <em>*</em>&nbsp;<span>详细地址:</span><br/>
        <textarea rows="2" cols="65" name="adressdetail"><?php echo ($val["adressdetail"]); ?></textarea><br/><br/>

        <em>*</em>&nbsp;<span>手机号码:</span><br/>
        <input type="text" name="mobile" value="<?php echo ($val["mobile"]); ?>"><br/><br/>

        <span>固定电话:</span><br/>
        <input type="text" name="tel" value="<?php echo ($val["tel"]); ?>"><br/><br/>

        <span>邮编:</span><br/>
        <input type="text" name="code" value="<?php echo ($val["code"]); ?>"><br/><br/>

        <input id="btn"  style="height: 30px;width: 114px" type="button" value="确认修改" /><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
</body>
<script>
    setup();
</script>
<script type="text/javascript">
    $(function(){
        var validate=$('#form1').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true,
                    minlength:2,
                    maxlength:10
                },
                adressdetail:{
                    required:true

                },
                mobile:{
                    required:true,
                    mobile:true
                }

            },

            //设置提示
            messages:{
                username:{
                    required:'请您填写收货人姓名',
                    minlength:'姓名至少需要两个字符',
                    maxlength:'姓名最多10个字符'
                },
                adressdetail:{
                    required:'请您填写收货人详细地址'

                },
                mobile:{
                    required:'请您填写收货人手机号码',
                    mobile:'手机号码格式不正确'
                }
            }
        })
        // 手机号码验证
        jQuery.validator.addMethod("mobile", function(value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");


        jQuery.validator.onfocus=true;

        $('#btn').click(function(){
            var index = parent.layer.getFrameIndex(window.name);
            if(validate.form()){
                $.post("<?php echo u('Member/changeAdress1');?>",$('#form1').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.alert(res.msg,{
                            yes:function(){
                                parent.layer.close(index);

                                //主页面更新未解决
                            }
                        })
                    }
                })
            }
        })
    })

</script>
</html>