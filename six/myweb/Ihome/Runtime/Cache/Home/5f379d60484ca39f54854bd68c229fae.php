<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基本信息</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/password.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/password.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/YMDClass.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{color:#ff0300;font-weight: bold;font-size: 14px;position:relative;float: left;left:600px;top: 3px}
        label.error{color:#ff0300;font-weight: bold;font-size: 14px;}
    </style>
</head>
<body>
<!--  顶部开始 --> 
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家网频道！</a></p>
        <ul class="fr">
            <li><a href="#"><span><?php echo (session('membername')); ?></span></a></li>
            <li><a href="javascript:logout()">退出</a>|</li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a>|</li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
        </ul>
    </div>
</div>
    <!-- 导航搜索栏 -->
    <div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
            <div class="bd fl">
                <!--<form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">-->
                    <!--<input name="searchwords" type="text" class="msg"  value="" placeholder="家具">-->
                    <!--<a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>-->
                <!--</form>-->
                <!--<p class="msg1">-->
                    <!--<a href="#">儿童家具 |</a>-->
                    <!--<a href="#">户外 |</a>-->
                    <!--<a href="#">沙发 |</a>-->
                    <!--<a href="#">实木床</a>-->
                <!--</p>-->
            </div>
            <div class="buy clearfix">
                <!--<span class="fl">1</span>-->
                <!--<a class="fl" href="../Cart/mycart.html">购物车</a>-->
                <!--&lt;!&ndash; <p class="fl"></p> &ndash;&gt;-->
            </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <div class="menu1">
                    </div>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
            </ul>
        </div>
     
    </div>
</div>
<div class="cont">
    <div class="cont_bg">
        <ul class="sidebar">
            <li class="touxiang"><img src="/Public/Home/images/touxiang.jpg"><p><?php echo (session('membername')); ?></p>
            </li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a></li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
            <li><a href="<?php echo U('Home/Member/userInfo');?>">个人信息</a></li>
            <li><a href="<?php echo U('Home/Member/adress');?>">收货地址</a></li>
        </ul>
    
     <!-- tab -->
    <div class="news">
        <ul class="clearfix">
            <li><a href="#">基本信息</a></li>
            <li><a href="#">修改密码</a></li>

        </ul>
        <div class="text">
            <?php if(is_array($memberInfo)): $i = 0; $__LIST__ = $memberInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><p class="text_p">用户名：<?php echo ($value["username"]); ?></p>
          <form id="form2" action="<?php echo u('Member/changeUserInfo');?>" method="post">
                    <p>昵称：&nbsp;&nbsp;&nbsp;<input name="nickname" class="form1" type="text" id="user" value=<?php echo ($value["nickname"]); ?> ></p><br />

              性别：
              <?php if($value["sex"] == 1 ): ?>&nbsp;&nbsp;&nbsp;  <input  name="sex" class="sex" type="radio" checked  value='1' />男
                  <input class="sex" type="radio" name="sex" value="2">女<br/>
                  <?php else: ?>
                  &nbsp;&nbsp;&nbsp;  <input  name="sex" class="sex" type="radio"   value='1' />男
                  <input class="sex" type="radio" name="sex" checked value="2">女<br/><?php endif; ?>
                    <p class="p1">出生年月：
                    <select name="year1"></select>
                    <select name="month1" ></select>
                    <select name="day1" ></select>
                    </p><br/>
                    <p class="p2">手机号：<input name="mobile" type="text" class="tel" value=<?php echo ($value["mobile"]); ?>><span class="red"></span><span id="msgTel" class="tips"></span></p><br />
                    <p class="p3">E-mail：<input name="email" type="text" class="e_mail"  value=<?php echo ($value["email"]); ?>><span id="msgMail" class="tips"></span></p><br />
                    <h2 id="btn2">保存</h2>

                <div class="file">
                    <p class="fr file_p"><img src="/Public/Home/images/touxiang.jpg"></p>
                    <input name="photo" type="file" id="photo" class="file_p1">
                    <p class="file_p2">
                        支持文件类型：jpg/png/gif
                    </p>
                </div>
                </form><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <div class="text02 clearfix">
           <form id="form3" action="<?php echo u('Member/changePwd');?>" method="post">
               <p>输入原密码：<input type="password" name="pwd"></p><br/>
               <p>新密码：<input type="password" name="npwd" id="npwd"></p><br/>
               <p>确认密码：<input type="password" name="nrpwd"></p><br/>
               <p><input id="btn3" type="button" value="确认修改"></p>
               <!--<p class="xiugai"><a href="#">确认修改</a></p>-->
           </form>
       </div>
    </div>
    </div>
</div>


<!-- 底部开始 -->
<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>爱家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
        
    </div>
</div>

</body>
<script>
    new YMDselect('year1','month1','day1','<?php echo ($value["year"]); ?>','<?php echo ($value["month"]); ?>','<?php echo ($value["day"]); ?>');
</script>
<script>
 /*------个人信息修改jQuery验证------*/

 $(function(){
     var validate=$('#form2').validate({
         //设置验证规则
         rules:{
             nickname:{
                 minlength:2,
                 maxlength:10
             },
             mobile:{
                 required:true,
                 mobile:true,
                 remote:{
                     url:"<?php echo U('Member/check_mobile');?>",
                     type:'post'
                 }
             },
             email:{
                 email:'email',
                 remote:{
                     url:"<?php echo U('Member/check_email');?>",
                     type:'post'
                 }
             }
         },

         //设置提示
         messages:{
             nickname:{
                 minlength:'昵称至少需要两个字符',
                 maxlength:'昵称最多10个字符'
             },
             email:{
                 email:'您的邮箱格式不正确',
                 remote:'邮箱已被注册'
             },
             mobile:{
                 required:'手机号码不能为空',
                 mobile:'手机号码格式不正确',
                 remote:'手机号码已被注册'
             }
         },
         errorElement:'label',
         errorPlacement: function(error, element) {
             error.appendTo( element.parent());
         }
     })
     // 手机号码验证
     jQuery.validator.addMethod("mobile", function(value, element) {
         var mobileReg = /^1[34578]{1}[0-9]{9}$/;
         return this.optional(element) || (mobileReg.test(value));
     }, "请正确填写您的手机号码");

     jQuery.validator.onfocus=true;

     $('#btn2').click(function(){
         if(validate.form()) {
             layer.confirm("确定保存？",{
                 yes:function(){
                     $.post("<?php echo u('Member/changeUserInfo');?>", $('#form2').serialize(), function (res) {
                         if (res.status == 'ok') {
                             layer.alert(res.msg, {
                                 yes: function () {
                                     location.reload();
                                 }
                             });
                         } else {
                             layer.alert(res.msg);
                         }
                     })
                 }
             })

         }
     })
 })
/*------密码修改jQuery验证--------*/
   $(function(){
      var validate=$('#form3').validate({
           //设置验证规则
           rules:{
               pwd:{
                   required:true
               },
               npwd:{
                   required:true
               },
               nrpwd:{
                   required:true,
                   equalTo:"#npwd"
               }
           },
           messages:{
               pwd:{
                   required:'请输入原密码'
               },
               npwd:{
                   required:'请输入新密码'
               },
               nrpwd:{
                   required:'请确认新密码',
                   equalTo:'两次密码输入不一致'
               }
           },

          errorElement:'div',
           errorPlacement: function(error, element) {
               error.appendTo( element.parent());
           }
       });
       jQuery.validator.onfocus=true;

       $('#btn3').click(function(){
           if(validate.form()) {
               layer.confirm("确定修改密码？",{
                   yes:function(){
                       $.post("<?php echo u('Member/changePwd');?>", $('#form3').serialize(), function (res) {
                           if (res.status == 'ok') {
                               layer.alert(res.msg, {
                                   yes: function () {
                                       location.reload();
                                   }
                               });
                           } else {
                               layer.alert(res.msg);
                           }
                       })
                   }
               })
           }
       })
   })

</script>

<script>
    function logout(){
//询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo u('Login/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo u('Index/index');?>"
                };
            })
        });
    }
</script>

</html>