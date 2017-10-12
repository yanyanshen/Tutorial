<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>用户登录</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/all.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css"/>
    <link rel="stylesheet" href="/Public/Home/style/entry.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        label.error{

            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
        }

    </style>

</head>

<body>
<!--头部>
<!-- top开始 -->
<div class="top">
    <div class="topCont frm_sty clearfix">
        <p class="fl">  <b style="color:#000;"><?php switch($_SESSION['shang_home']['level']): case "1": ?>普通会员<?php break;?>
            <?php case "2": ?>铜牌会员<?php break;?>
            <?php case "3": ?>银牌会员<?php break;?>
            <?php case "4": ?>金牌会员<?php break;?>
            <?php case "5": ?>钻石会员<?php break; endswitch;?>
            <?php echo (session('username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>欢迎来到美伦美尚！</p>
        <p class="fr">
            <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                <?php else: ?>
                <a href="<?php echo u('User/login');?>">登录</a>&nbsp&nbsp&nbsp
                <a href="<?php echo u('User/register');?>">注册</a>&nbsp&nbsp&nbsp<?php endif; ?>

        </p>
    </div>
</div>
<!-- top结束 -->
<div class="topNav">
    <div class="topNavCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" alt="" height="85px"/></h1>
        <ul class="fl clearfix">
            <li  ><a href="<?php echo u('Index/index');?>" >首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>


        </ul>
        <form action="<?php echo u('Home/Index/search');?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name" value="<?php echo ($name); ?>"/>
            <input type="submit" id="submit" value="" />
        </form>
    </div>
</div>
<!-- topNav结束 -->
<!-- 置顶导航istop开始 -->
<div class="istop">
    <div class="istopCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" height="85px" alt="" /></h1>
        <ul class="fl clearfix">
            <li><a href="<?php echo u('Index/index');?>" target="_blank">首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>
        </ul>
        <form action="<?php echo U(Index/search);?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name"/>
            <input type="submit" id="submit" value=""/>
        </form>
    </div>
</div>
<!-- 置顶导航istop结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }

</script>
<!-->


<div class="outside">
    <div class="inside">
        <div class="left clearfix">
        </div>
        <div class="right clearfix">
            <h2>用户登录</h2>
            <form action="<?php echo u('User/login');?>" method="post" id="form1" enctype="multipart/form-data">
                <p><input type="text" id="t1" name="name" placeholder="请输入用户名" /><br/></p>
                <p><input type="password" id="t2" placeholder="请输入密码" name="mm"/><br /></p>
                <input type="text" id="t3" placeholder="请输入验证码" name="verify"/><div></div>
                <h4 style="position: relative;top:-68px;">
                    <img src="<?php echo u('verify');?>" id="verify" alt="verify" style="height:35px;width:80px"
                         onclick="this.src='<?php echo u('verify',array('id'=>mt_rand()));?>'"/>
                </h4>
                <div style="position: relative;top:-40px;" class="input">
                    <input type="button" value="登录" id="input"/>
                </div>
            </form>

            <h4>没有账号？<span><a href="<?php echo u('User/register');?>">免费注册</a></span></h4>
            <h5><a href="#">忘记密码?</a></h5>
        </div>
    </div>
</div>
<!-- footer开始 -->

<!-- bottomNav开始 -->
<div class="bottomNav">
    <div class="bottomNavCont frm_sty">
        <div class="head">
            <ul class="clearfix">
                <li class="li1">行业权威推荐</li>
                <li class="li2">欧洲品牌授权</li>
                <li class="li3">银行战略合作</li>
                <li class="li4">7天无理由退货</li>
                <li class="li5">终身售后服务</li>
            </ul>
        </div>
        <div class="btm clearfix">
            <div class="left fl">
                <ul class="clearfix">
                    <li class="li_big">
                        <ul>新手
                            <li><a href="#">注册新会员</a></li>
                            <li><a href="#">如何订购</a></li>
                            <li><a href="#">正品保障</a></li>
                            <li><a href="#">常见问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>支付
                            <li><a href="#">支付方式</a></li>
                            <li><a href="#">分期付款</a></li>
                            <li><a href="#">支付问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>配送
                            <li><a href="#">配送方式</a></li>
                            <li><a href="#">包裹签收</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>保障
                            <li><a href="#">服务承诺</a></li>
                            <li><a href="#">价格保护</a></li>
                            <li><a href="#">售后政策</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>帮助
                            <li><a href="#">商务合作</a></li>
                            <li><a href="#">了解我们</a></li>
                            <li><a href="#">人才招聘</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right fr clearfix">
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />微信服务号</p>
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />商城客户端</p>
            </div>
        </div>
    </div>
</div>
<!-- bottomNav结束 -->
<!-- bottom开始 -->
<div class="bottom">
    <div class="bottomCont frm_sty">
        <p>Copyright © 2008-2016 vip.com，All Rights Reserved 豫ICP备08114786号 ICP经营许可证：豫B7-20090329 网络文化经营许可证：豫网文〔2016〕1601-110 </p>
        <p>使用本网站即表示接受可俪用户协议。版权所有 河南可俪化妆品有限责任公司</p>
        <img src="/Public/Home/images/index_bottom.jpg" alt="" />
    </div>
</div>
<!-- bottom结束 -->
<!-- footer结束 -->
</body>
<script type="text/javascript">
    $(function(){
        var validate=$("#form1").validate({
            //设置验证规则
            rules:{
                name:{
                    required:true,
                    minlength:3,
                    maxlength:15,
                    remote:{
                        url:"<?php echo u('User/test2');?>",
                        type:'post'
                    }

                },
                mm:{
                    required:true,
                    minlength:3,
                    maxlength:15
                },
                verify:{
                    required:true,
                    remote:{
                        url:"<?php echo u('User/checkVerify');?>",
                        type:'post'
                    }
                }
            },
            //设置提示信息
            messages:{
                name:{
                    required:'用户名不能为空',
                    minlength:'用户名至少为3个字符',
                    maxlength:'用户名最多不能超过15个字符',
                    remote:'该用户不存在'


                },
                mm:{
                    required:'密码不能为空',
                    minlength:'密码长度至少为3个字符',
                    maxlength:'密码最多不能超过15个字符'
                },
                verify:{
                    required:'请输入验证码',
                    remote:'验证码不正确'
                }
            },

            /*  success:function(label){
             label.addClass("ok");
             },
             validClass:"ok",*/

            errorPlacement:function(error,element){
                error.appendTo(element.parent());
            }

        });

        jQuery.validator.onfocus=true;

        $('#input').click(function(){
            if(validate.form()){
                $.post("<?php echo U('Home/User/login');?>",$('#form1').serialize(),function(res){
                    if(res.status=='ok'){
                        layer.msg(res.msg,{
                            icon: 1,
                            time: 1000
                        },function(){
                            if(res.gid==0){
                                location.href="<?php echo U('Home/Mycar/mycar');?>";
                            }else if(res.gid>0){
                                location.href="<?php echo U('Home/Index/detail');?>"+'?gid='+res.gid;

                            }else{
                                location.href="<?php echo U('Home/Index/index');?>";
                            }
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

    })
</script>
</html>