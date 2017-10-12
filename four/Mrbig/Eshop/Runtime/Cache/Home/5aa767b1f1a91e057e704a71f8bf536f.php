<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Mrbig/Public/Home/skins/all.css" rel="stylesheet" type="text/css" />
    <link href="/Mrbig/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Mrbig/Public/Home/css/style.css" rel="stylesheet" type="text/css" />

    <script src="/Mrbig/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="/Mrbig/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Mrbig/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Mrbig/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Mrbig/Public/Home/layer/layer.js" type="text/javascript"></script>
    <script src="/Mrbig/Public/Home/address/js/distpicker.data.js"></script>
    <script src="/Mrbig/Public/Home/address/js/distpicker.js"></script>
    <script src="/Mrbig/Public/Home/address/js/main.js"></script>
    <title>订单详情</title>
    <style type="text/css">
        #link{
            margin-left: 33%;
        }
    </style>
</head>

<body>
<!--头部开始-->


<link href="/Mrbig/Public/Home/Login/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Mrbig/Public/Home/layer/layer.js"></script>
<head>
        <div id="top">
            <div class="Inside_pages">
                <?php if($mrid > 0): ?><div class="Collection1">
                        <span>
                            Mr.Big欢迎您,<span style="font-size: 20px;color:red"><?php echo ($username); ?></span>
                            <a href="javascript:logout()">安全退出</a>
                        </span>
                    </div>
                    <?php else: ?>
                    <b><?php echo ($mrid); ?></b>
                    <div class="Collection2" >
                        <a href="javascript:login()" class="green">请登录</a>
                        <a href="<?php echo U('Home/Login/index');?>" class="green">免费注册</a>
                    </div><?php endif; ?>
                <div class="hd_top_manu clearfix" style="margin-top: -31px">
                    <ul class="clearfix">
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="javascript:user()">用户中心</a> </li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="header"  class="header page_style" >
            <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Mrbig/Public/Home/images/logo.png" /></a></div>
            <!--&lt;!&ndash;结束图层&ndash;&gt;-->
            <div class="Search">
                <div class="search_list">
                    <ul>
                        <li class="current"><a href="#">产品</a></li>
                    </ul>
                </div>
                <form action="<?php echo U('Home/Search/search');?>" method="get" class="clear search_cur" id="search">
                    <input name="keywords" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
                    <input type="submit" value="搜 索"  class="Search_btn"/>
                </form>
            </div>
            <!--&lt;!&ndash;购物车样式&ndash;&gt;-->


        </div>
        <!--&lt;!&ndash;菜单栏&ndash;&gt;-->
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name">
                <li><a href="">首页</a></li>
                <li class="hour"><span class="bg_muen"></span><a href="">半小时生活圈</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>1));?>">现代家具</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>2));?>">布艺软饰</a><em class="hot_icon"></em></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>3));?>">家纺</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>16));?>">家用电器</a></li>
                <li><a href="<?php echo u('Goods/goodsList',array('cid'=>18));?>">数码产品</a></li>
            </ul>
        </div>
        <script>$("#Navigation").slide({titCell:".Navigation_name li",trigger:"click"});</script>
    </div>
</head>
<script type="text/javascript">
    function login(){

        layer.open({
            type: 1,
            title:'登录',
            area: ['400px','700px'],
            shadeClose: true,
            content:$('#log')
        });
    }
    function logout(){
        layer.alert('hi');
        $.ajax({
            type:"post",
            url:"<?php echo u('Home/Login/logout');?>",
            success:function(data){
                alert(data.status);
                if(data.status=='ok'){
                    location.reload();
                }
            }
        })
    }
    function user(){
        $.post("<?php echo U('Home/User/user');?>",function(res){
            if(res.status=='no'){
                alert(res.msg);
            }else{
                location.href="<?php echo U('Home/User/user');?>";
            }
        })
    }
</script>



<div style="display: none" id="log">
<div class="container" style="border: 0;margin: 0">
        <div class="loginbox">
            <ul class="hd font18">
                <li class="w241 login cur" >账户登录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li class="w241 register">免费注册</li>
            </ul>
            <div class="bd">
                <form id="login" method="post" action="" style="text-align: center">
                    <div  class="username tbox " style="text-align: center">
                        <label ></label>
                        <input type="text" class="logtext" value="Admin" name="username" onFocus="if (this.value==this.defaultValue) this.value='';" onblur="if (this.value=='') this.value=this.defaultValue;">
                    </div>
                    <div  class="pwd tbox" style="text-align: center">
                        <label ></label>
                        <input type="password" class="logtext" value="密码" name="password" onFocus="if (this.value==this.defaultValue) this.value='';" onblur="if (this.value=='') this.value=this.defaultValue;">
                    </div>
                    <input type="button" class="dl" value="登录" style="margin-top: 40px ">
                    <ul class="partner">
                        <li><a href=""><i class="pq"></i>QQ账号</a></li>
                        <li><a href=""><i class="px"></i>新浪微博</a></li>
                        <li><a href=""><i class="pw"></i>微信</a></li>
                        <li><a href=""><i class="pm"></i>蘑菇街</a></li>
                        <div class="clear"></div>
                    </ul>
                </form>
                <form id="register" action="" method="post">
                    <dl>
                        <dt for="username">用户名：</dt>
                        <dd><input type="text"  name="username" id="username"></dd>
                    </dl>
                    <dl class="">
                        <dt for="password">设置密码：</dt>
                        <dd><input type="password"  name="password" id="password"></dd>
                    </dl>
                    <dl class="">
                        <dt for="confirm_password">确认密码：</dt>
                        <dd><input type="password" value="" id="confirm_password" name="rePassword"></dd>
                    </dl>
                    <dl class="">
                        <dt for="email">邮箱：</dt>
                        <dd><input vtype="email" value="" id="email" name="email" ></dd>
                    </dl>
                    <dl class="">
                        <dt >验证码：</dt>
                        <dd><input type="text" value="" name="verify"></dd>
                        <dd>
                            <img src="<?php echo U('Home/Login/verify');?>" onclick="this.src='<?php echo u('Home/Login/verify',array('id'=>mt_rand()));?>'" style=" border:#cccbc8 solid 1px ; margin-top:10px; margin-left: 90px"></dd>
                    </dl>
                    <input type="submit" value="注册" class="zc">
                </form>
            </div>
        </div>
    </div>

</div>
<script src="/Mrbig/Public/Home/js/jquery.1.8.3.min.js"></script>
<script type="text/javascript">
    //登录注册页面切换
    $(function(){
        $("#register").hide();
        $(".hd li").click(function(){
            $(this).addClass("cur").siblings().removeClass("cur");
            $(".bd form").hide().eq($(this).index()).show();
        });
    });
    $('.dl').click(function(){
        $.ajax({
         type:"post",
         url:"<?php echo U('Home/Login/login');?>",
         data:$("#login").serialize(),
         success:function(data){
             if(data.status=='ok'){
             layer.alert(data.msg);
             location.href=window.location.href;
         }else{
             layer.alert(data.msg);
             location.href="<?php echo ($_SERVER['HTTP_REFERER']); ?>"
         }

         }
         })
    })
    $(function(){
        var validate=$("#register").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 2,
                    remote:{
                        url:'<?php echo U("Home/Login/chkUsername");?>',
                        type:'post'
                    }
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    debug:true,
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email:true
                },
                verify:{
                    required: true,
                    remote:{
                        url:'<?php echo U("Home/Login/chkVerify");?>',
                        type:'post'
                    }
                }
            },
            messages: {
                username: {
                    required: "请输入用户名",
                    minlength: "您的用户名必须包含至少2个字符",
                    remote: "用户名存在请重新添加"
                },
                password: {
                    required: "请输入密码",
                    minlength: "密码必须大于5个字符"
                },
                confirm_password: {
                    required: "请输入确认密码",
                    minlength: "密码必须大于5个字符",
                    equalTo: "两次输入的密码要一致"
                },
                email: "请输入正确的邮箱格式",
                verify: "请输入正确验证码"
            }
        });
        jQuery.validator.onfocus=true;
        $('.zc').click(function(){
            $("#register").submit(false);
            $.ajax({
                type:"post",
                url:"<?php echo u('register');?>",
                data:$("#register").serialize(),
                success:function(data){
                    layer.alert(data.msg);
                    //location.href="<?php echo U('login');?>"
                }
            })
        });

    });


</script>
</div>
<!--头部结束-->
<body>
<br>

<div style="margin: 50px 500px;">
    <table style="width: 1000px;border: solid 2px #e0d8ae;font-size: 20px">
        <thead>

        <tr>
            <th></th>
            <br><br>
            <th>&nbsp;&nbsp;订单编号<br></th>
            <th>商品</th>
            <th>数量</th>
            <th>状态</th>

        </tr>

        </thead>
        <tbody>
        <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td></td>
            <td>&nbsp;&nbsp;<?php echo ($oid); ?></td>
            <td class="img_link">
                <a href="#" class="img"><img src="/Mrbig/upload/n0/<?php echo (array_shift(explode(',',$vo["pic"]))); ?>" width="80" height="80"></a>
                <a href="#" class="title"><?php echo ($vo["name"]); ?></a>
            </td>
            <td><?php echo ($vo["payNum"]); ?></td>
            <td></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>

    </table>
    <div style="font-size: 20px">
        <?php if(is_array($addArr)): $i = 0; $__LIST__ = $addArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><b>收货地址:<?php echo ($res["address"]); echo ($res["town"]); ?></b><br/>
        <b>收货人:<?php echo ($res["addname"]); ?>电话:<?php echo ($res["mobile"]); ?>邮编:<?php echo ($res["yid"]); ?></b><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>


   <br> <span style="font-size: 20px;color: darkred;margin-left: 83%">订单总价:<?php echo ($count); ?>￥</span><br/><br>
    <input type="button" value="点击购买" id="pay" style="width: 150px;height: 50px;font-size: 25px;text-align: center;line-height: 50px;margin-left: 83.5%;"/>


</div>
<div style="display: none" id="zhiFu">
    <ul style="text-align: center;">
        <form action="" method="post" id="otoPay">
            <li style="margin-top: 20px;font-size: 15px"><b>订单:</b><input name="order" value="<?php echo ($oid); ?>"type="text" style="width: 200px"/></li>
            <li style="margin-top: 20px;font-size: 15px"><b>金额:￥</b><input type="text" value="<?php echo ($count); ?>" name="money" style="width: 200px"/></li>
            <li style="margin-top: 20px"><input type="radio" checked="checked" name="pay" value="mb" style="line-height: 50px;height: 50px"/><img src="/Mrbig/Public/Home/images/zhifu1_06.png"></li>
            <li style="margin-top: 20px"><input type="radio" name="pay" value="cft" style="line-height: 50px;height: 50px"/><img src="/Mrbig/Public/Home/images/zhifu1_07.png"></li>
            <li style="margin-top: 20px"><input type="radio" name="pay" value="zfb" style="line-height: 50px;height: 50px"/><img src="/Mrbig/Public/Home/images/zhifu1_10.png"></li>
            <li style="margin-top: 20px"><input type="radio" name="pay" value="yl" style="line-height: 50px;height: 50px"/><img src="/Mrbig/Public/Home/images/zhifu1_12.png"></li>
            <li style="margin-top: 20px;font-size: 20px"><input type="button" id="button" value="确定购买" style="width: 120px;height: 30px"/></li>
        </form>


    </ul>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript">
    $('#pay').click(function(){
        layer.open({
            type: 1,
            title:'购买商品',
            area: ['400px','550px'],
            shadeClose: true,
            content: $('#zhiFu')
        });
    })
    $('#button').click(function(){
        $.post("<?php echo U('orderToPay');?>",$('#otoPay').serialize(),function(res){
            if(res.status=='ok'){
                layer.alert(res.msg);
            }else{
                layer.alert(res.msg);
            }
        })
    })

</script>

<!--网站地图-->
<div class="fri-link-bg clearfix">
    <div class="fri-link" id="link">

        <div class="left"><img src="/Mrbig/Public/Home/images/link.png" width="90"  height="90" />
            <p>扫描下载APP</p>
        </div>
        <div class="">
            <dl>
                <a href="<?php echo U('Home/Teach/teach');?>"><dt>新手上路</dt></a>
                <dd><a href="#">售后流程</a></dd>
                <dd><a href="#">购物流程</a></dd>
                <dd><a href="#">订购方式</a> </dd>
                <dd><a href="#">隐私声明 </a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>售后保障</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>

        </div>
    </div>
</div>
<!--网站地图END-->
<!--网站页脚-->
<div class="copyright">
    <div class="copyright-bg">
        <div class="hotline">为生活充电在线 <span>招商热线：4000-889912354</span> 客服热线：400-1515495</div>
        <div class="hotline co-ph">
            <p>版权所有Copyright ©Mr.Big信息科技有限责任公司</p>
            <p>ICP备15241423521号 不良信息举报</p>
            <p>总机电话：0521-4835/194/195/196 客服电话：4000-63568995 传 真：zhazha.xx.567

                E-mail:54994578@niubi.gov.cn</p>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function logout(){
        $.ajax({
            type:"post",
            url:"<?php echo u('Home/Login/logout');?>",
            data:'',
            success:function(data){
                alert(data.status);
                if(data.status=='ok'){
                    location.reload();
                }
            }
        })

    }
    function user(){
        $.post("<?php echo U('Home/User/user');?>",function(res){
            if(res.status=='no'){
                layer.alert(res.msg);
            }else{
                location.href="<?php echo U('Home/User/user');?>";
            }
        })
    }
</script>
</html>