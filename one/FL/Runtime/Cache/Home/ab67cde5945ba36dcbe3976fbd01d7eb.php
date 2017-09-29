<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人资料</title>
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/zzsc.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/component.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/shopping-mall-index.css" />
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/zhonglin.js"></script>
<script type="text/javascript" src="/Public/js/layer/layer.js"></script>
</head>

<body style="position:relative;">
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <ul class="t-con-l f-l">
            <li><span><span style="font-weight:bold;color:red"><?php echo session('name')?session('name'):'';?></span><?php echo session('name')?'，':'您好，';?>欢迎来到丰林</span></li>
            <li><a href="<?php echo u('Custom/login');?>"><?php echo session('mid')?'':'请登录';?></a></li>
            <li><a href="javascript:out();"><?php echo session('mid')?'退出':'';?></a></li>
            <li><a href="<?php echo u('Custom/register');?>">免费注册</a></li>
        </ul>
        <ul class="t-con-r f-r">
            <li><a href="<?php echo u('User/index');?>">我 (个人中心)</a></li>
            <li><a href="#">我的订单</a></li>
            <li class="erweima">
                <a href="#">扫描二维码</a>
                <div class="ewm-tu">
                    <a href="#"><img src="/Public/Home/images/erweima-tu.jpg" /></a>
                </div>
            </li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--logo search 开始-->
<div class="hd-info1 w1200">
    <div class="logo f-l">
        <h1><a href="<?php echo u('Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
    </div>
    <div class="dianji f-r">
    </div>
    <div class="search f-r">
        <ul class="sp">

            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <form action="<?php echo U('Search/index');?>" method="get" id="classform">
                    <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" value="<?php echo ($dd); ?>"/>
                </form>
            </div>
            <button id="jk" class="f-r">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <?php if(is_array($classProd)): $i = 0; $__LIST__ = array_slice($classProd,3,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valclass): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Search/index',array('class_name'=>$valclass['class_name']));?>"><?php echo ($valclass['class_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div>


<!--内容开始-->
    <div class="personal w1200">
    	<div class="personal-left f-l">
        	<div class="personal-l-tit">
            	<h3>个人中心</h3>
            </div>
            <ul>
            	<li class="per-li2 "><a href="<?php echo u('User/index');?>">个人资料<span>></span></a></li>
                <li class="per-li2 current-li"><a href="<?php echo u('User/xgmm');?>">账户安全<span>></span></a></li>
            	<li class="per-li3"><a href="<?php echo u('User/order');?>">我的订单<span>></span></a></li>
            	<li class="per-li5"><a href="<?php echo u('User/cart');?>">购物车<span>></span></a></li>
            	<li class="per-li6"><a href="<?php echo u('User/site');?>">管理收货地址<span>></span></a></li>
                <li class="per-li9"><a href="<?php echo u('User/zj');?>">浏览记录<span>></span></a></li>

            </ul>
        </div>
    	<div class="personal-r f-r">
        	<div class="personal-right">
                <div class="personal-r-tit">
                    <h3>个人资料</h3>
                </div>


                <div class="data-con">
                    <!--邮箱修改密码-->
                    <div class="x-mm">
                        <div class="form">
                            <div class="div-name">
                                <label for="name">邮箱</label><input type="text" id="name" class="infos" placeholder="请输入邮箱" />
                                <span id="ee1" style="color: red"></span>
                            </div>
                            <div class="div-phone">
                                <label for="phone">手机</label><input type="text" id="phone" class="infos" placeholder="请输入手机" />
                                <a href="javascript:;" class="send1" onclick="sends.send();">发送验证码</a>
                            </div>
                            <div class="div-ranks">
                                <label for="ranks">验证码</label><input type="text" id="ranks" class="infos" placeholder="请输入验证码"  />
                            </div>
                            <button class="btn-style-01 f-r" id="tij">保存</button>
                        </div>
                    </div>


                    <!--短信修改密码-->
                    <div class="t-mm">
                        <div class="dt1">
                            <p class="dt-p f-l">手机号：</p>
                            <input type="text" name="custom_tel" id="t1" placeholder="手机号"  /><span class="custom-style" id="tt1"></span>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="dt1">
                            <p class="dt-p f-l">验证码：</p>
                            <input type="text" name="tel_yzm" placeholder="验证码"  /><span class="custom-style"></span>
                            <div style="clear:both;"></div>
                        </div>

                        <div class="dt1 dt4">
                            <p class="dt-p f-l">新密码：</p>
                            <input type="text" name="tel_pwd" value="" placeholder="************" /><span class="custom-style"></span>

                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <button class="btn-pst" id="email" >绑定手机号
                    </button>
                    <button class="btn-pst" id="tel">短信修改密码</button>

                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
</body>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })

    $('#email').click(function(){
        $('.x-mm').css("display", "inline");
        $('.t-mm').css("display", "none");
    })
    $('#tel').click(function(){
        $('.t-mm').css("display", "inline");
        $('.x-mm').css("display", "none");
    })
var BUD=false;
    $("#name").keyup(function () {
        var email=$(this).val();
        $.get("<?php echo u('User/xgmm');?>",{'custom_email':email},function(rec){
            if(rec){
                $("#ee1").html("√");
                BUD=true;
            }else{
                $("#ee1").html("请输入正确邮箱");
                BUD=false;
            }
        })


    })
    $("#t1").keyup(function (e) {
        var tel=$(this).val();
        $.get("<?php echo u('User/xgmm');?>",{'custom_tel':tel},function(rec){
            $("#tt1").text(rec);
        })
    })

//    发送验证码倒计时
    var sends = {
        checked:1,
        send:function(){
            var numbers = /^1[3|4|5|7|8]\d{9}$/;
            var val = $('#phone').val().replace(/\s+/g,""); //获取输入手机号码
            if($('.div-phone').find('span').length == 0 && $('.div-phone a').attr('class') == 'send1'){
                if(!numbers.test(val) || val.length ==0){
                    $('.div-phone').append('<span class="error">手机格式错误</span>');
                    return false;
                }
            }
           if(BUD){
            if(numbers.test(val)){
                var time = 1;
                $('.div-phone span').remove();
                function timeCountDown(){
                    if(time==0){
                        clearInterval(timer);
                        $('.div-phone a').addClass('send1').removeClass('send0').html("发送验证码");
                        sends.checked = 1;
                        $.post("<?php echo u('User/xgmm');?>",{"tel_yzm":val},function(rec){

                        })
                        return true;
                    }
                    $('.div-phone a').html(time+"S后再次发送");
                    time--;
                    return false;
                    sends.checked = 0;
                }
                $('.div-phone a').addClass('send0').removeClass('send1');
                timeCountDown();
                var timer = setInterval(timeCountDown,1000);
            }
         }else{
               layer.alert("请输入邮箱！");
           }
        }
    }


    $("#tij").click(function(){
        var opo=$("#ranks").val();
       var tel= $("#phone").val();
        if(tel){
            $.get("<?php echo u('User/yanzheng');?>",{'yzm':opo,'tel':tel}, function (rec) {
                layer.alert(rec);
            })
        }else{
            layer.alert("必须填写正确手机号码和邮箱");
        }

    })
</script>

</html>