<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/jQuery-1.8.2.js"></script>
<script src="/Public/Home/js/jquery.simpleGal.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.imagezoom.min.js"></script>
<script type="text/javascript" src="/Public/Home/layer/layer.js"></script>


<style>

    #link{
        margin-left: 33%;
    }
    img {
	max-width: none;
}
.tb-pic a {
	display: table-cell;
	text-align: center;
	vertical-align: middle;
}
.tb-pic a img {
	vertical-align: middle;
}
.tb-pic a {
*display:block;
*font-family:Arial;
*line-height:1;
}
.tb-thumb {
	margin: 10px 0 0;
	overflow: hidden;
}
.tb-thumb li {
	float: left;
	width: 86px;
	height: 86px;
	overflow: hidden;
	border: 1px solid #cdcdcd;
	margin-right: 5px;
}
.tb-thumb li:hover, .tb-thumb .tb-selected {
	width: 84px;
	height: 84px;
	border: 2px solid #799e0f;
}
.tb-s310, .tb-s310 a {
	height: 365px;
	width: 365px;
}
.tb-s310, .tb-s310 img {
	max-height: 365px;
	max-width: 365px;
}
.tb-booth {
	border: 1px solid #CDCDCD;
	position: relative;
	z-index: 1;
}
div.zoomDiv {
	z-index: 999;
	position: absolute;
	top: 0px;
	left: 0px;
	background: #ffffff;
	border: 1px solid #ccc;
	display: none;
	overflow: hidden;
}
div.zoomMask {
	position: absolute;
	background: url("/Public/Home/images/mask.png") repeat;
	cursor: move;
	z-index: 1;
}
<!--弹出隐藏层-->
 .black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 1200px;
	background-color: black;
	z-index: 9999;
	-moz-opacity: 0.4;
	opacity: 0.40;
	filter: alpha(opacity=40);
}
.white_content {
	display: none;
	position: absolute;
	top: 20%;
	left: 40%;
	width: 400px;
	height: 175px;
	border: none;
	background-color: white;
	z-index: 100200;
	overflow: auto;
}
.white_content_small {
	display: none;
	position: absolute;
	top: 20%;
	left: 30%;
	width: 40%;
	height: 50%;
	background-color: white;
	z-index: 1002;
	overflow: auto;
}
.dialogbox {
	padding: 20px;
	line-height: 40px;
}
.addbtn {
	width: 22px;
	height: 22px;
	background: url(/Public/Home/images/close2.png) no-repeat;
	margin-right: 5px;
	margin-top: 3px;
	border: none;
	float: right;
}
</style>
</head>
<body>


<link href="/Public/Home/Login/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
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
            <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
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
<script src="/Public/Home/js/jquery.1.8.3.min.js"></script>
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
<div class="sup-wid">
    <div class="pro_detail" >
        <div class="pro_detail_img float-lt">
            <div class="gallery">
                <div class="tb-booth tb-pic tb-s310">
                    <a href="">
                        <img src="/upload/n0/<?php echo ($pic[0]); ?>"  alt="展品细节展示放大镜特效" rel="/upload/n0/<?php echo ($pic[1]); ?>" class="jqzoom" />
                    </a>
                </div>
                <ul class="tb-thumb" id="thumblist">
                    <?php if(is_array($pic)): $k = 0; $__LIST__ = array_slice($pic,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="<?php if(($k) == "1"): ?>tb-selected<?php endif; ?>">
                            <div class="tb-pic tb-s40">
                                <a href="#">
                                <img src="/upload/n2/<?php echo ($pic[$key]); ?>"  mid="/upload/n1/<?php echo ($pic[$key]); ?>" big="/upload/n0/<?php echo ($pic[$key]); ?>">
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <form action="" method="get" id="oldForm">
            <input type="text" style="display: none" value="<?php echo ($id); ?>" name="pid">
            <input type="button" value="加入收藏" id="h1" class="addcart" />
            </form>
            <script type="text/javascript">
                 $('#h1').click(function(){
                     $.get("<?php echo U('Home/Goods/old');?>", $('#oldForm').serialize(),function(res){
                         if(res.status=='ok'){
                             layer.alert(res.msg);
                         }else{
                             layer.alert(res.msg);
                         }
                     })
                 })
            </script>
        </div>
        <form action="" method="post" id="form">
            <div class="float-lt pro_detail_con">
            <div class="pro_detail_tit"><?php echo ($name); ?></div>
            <div class="pro_detail_ad"><?php echo htmlspecialchars_decode($information);?></div>
            <div class="pro_detail_score margin-t20">
                <ul>
                    <li class="margin-r20">评分</li>
                </ul>
                <ul>
                    <li style="width:16px; height:16px;"><img src="/Public/Home/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/Public/Home/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/Public/Home/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/Public/Home/images/iconfont-xingxingman.png" width="16" height="16" /></li>
                    <li style="width:16px; height:16px;"><img src="/Public/Home/images/iconfont-xingxingkong.png" width="16" height="16" /></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_price  margin-t20"><span class="margin-r20">市场价</span><span style=" font-size:16px"><s>￥:<?php echo ($marketprice); ?></s></span></div>
            <div class="clear"></div>
                <div class="yushou">
                    <div class="fl font24">售价：<strong><?php echo ($price); ?>元</strong></div>
                </div>
            <div class="clear"></div>
            <div class="pro_detail_number margin-t30">
                <div class="margin-r20 float-lt">数量</div>
                <div class=""> <a href="javascript:jian()"> <i class="jian" ></i></a>
                    <input type="text" value="1" class="float-lt choose_input" name="num" id="num"/>
                    <a href="javascript:jia()"><i class="jia"></i></a> <span>&nbsp;盒</span></div>
                <div class="clear"></div>
            </div>
            <div class="guige">
                <div class="margin-r20 float-lt" style="line-height:25px;">规格</div>
                <ul>
                    <li class="guige-cur">规格一</li>

                </ul>
                <div class="clear"></div>
            </div>
            <div class="pro_detail_number margin-t20">
                <div class="margin-r20 float-lt">月成交量：<span class="colorred"><strong>999件</strong></span></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="pro_detail_btn margin-t30">
                <ul>
                    <li class="pro_detail_shop"><a href="javascript:pay()" id="pay">立即购买</a></li>
                    <li class="pro_detail_add"><a id="toCar">加入购物车</a></li>
                </ul>
            </div>
        </div>
        </form>

    </div>
    <div class="clear"></div>
    <script>
		$(function(){
			$(".pro_tab li").each(function(i){
				$(this).click(function(){
					$(this).addClass("cur").siblings().removeClass("cur");
					$(".conlist .conbox").eq(i).show().siblings().hide();
				})
			})
		})
	</script>
    <div class="pro_con margin-t55" style="overflow:hidden;">
        <div class="pro_tab">
            <ul>
                <li class="cur">产品介绍</li>
            </ul>
        </div>
        <div class="conlist">
            <div class="conbox" style="display:block; font-size: 20px; color: #3d3d45">
                <p><?php echo htmlspecialchars_decode($information);?></p>
                <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/upload/n0/<?php echo ($vo); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="hotpro">
        <div class="hotpro_title">热销产品</div>
        <div class="hotpro_box">
            <div class="pro-view-hot">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><ul>
                        <li class="pro-img"><a href="<?php echo U('goods',array('id'=>$res['id']));?>"><img src="/upload/n1/<?php echo (array_shift(explode(',',$res["pic"]))); ?>" /></a></li>
                        <li class="price"><strong>￥ 36.00</strong><span>已销售<?php echo ($res["num"]); ?></span></li>
                        <li><a href="<?php echo U('goods',array('id'=>$res['id']));?>" class="title"><?php echo ($res["name"]); ?> </a></li>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

    <div class="helper">
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/Public/Home/images/h1.png" width="60" height="60" /><span>新手上路</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/Public/Home/images/h2.png" width="60" height="60" /><span>如何支付</span> </h4>
            </div>
        </div>
        <div class="mod">
            <div class="mod-wrap">
                <h4><img src="/Public/Home/images/h3.png" width="60" height="60" /><span>配送运输</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/Public/Home/images/h4.png" width="60" height="60" /><span>售后服务</span> </h4>
            </div>
        </div>
        <div class="mod mod-last">
            <div class="mod-wrap">
                <h4><img src="/Public/Home/images/h5.png" width="60" height="60" /><span>联系我们</span> </h4>
            </div>
        </div>
    </div>
</div>

<div class="clear">&nbsp;</div>

<div class="fri-link-bg clearfix">
    <div class="fri-link" id="link">

        <div class="left"><img src="/Public/Home/images/link.png" width="90"  height="90" />
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
<!--网站页脚END-->






<script type="text/javascript">

    $(document).ready(function() {

        $(".jqzoom").imagezoom();

        $("#thumblist li a").mousemove(function () {
            $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
            $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
            $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
        });
    })



function jian(){
    var buynum=document.getElementById('num').value;
    if(buynum>1){
        document.getElementById('num').value=parseInt(buynum)-1;
    }
}
function jia(){
    var buynum=document.getElementById('num').value;
    if(buynum<199){
        document.getElementById('num').value=parseInt(buynum)+1;
    }
}
function pay(){
    var res=document.getElementById('form');
    res.action="<?php echo U('Home/Goods/pay',array('id'=>$id));?>";
    res.submit();
}

document.getElementById('num').onkeyup=function(){
    if(this.value<1){
    }
        this.value=1;
    if(this.value>199){
        this.value=199;
    }
    if(isNaN(this.value)){
        this.value=1;
    }
};

     $('#toCar').click(function(){
         $.post("<?php echo U('toCar',array('id'=>$id));?>",$('#form').serialize(),function(res){
             if(res.status=='no'){
                 layer.alert(res.msg);
             }else if(res.status=='ok'){
                 layer.alert(res.msg);
             }else{
                 layer.alert(res.msg);
             }
         })
     })


function old(){
    layer.open({

    })
}
function logout(){
    $.ajax({
        type:"post",
        url:"<?php echo u('Home/Login/logout');?>",
        data:'',
        success:function(data){
            layer.alert(data.status);
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
</body>
</html>