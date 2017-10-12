<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<title>产品列表页</title>
    <style type="text/css">

        #link{
            margin-left: 20%;
        }
    </style>
</head>
<script type="text/javascript" charset="UTF-8">
<!--
 //点击效果start
 function infonav_more_down(index)
 {
  var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
  if(inHeight > 60){
   $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
   $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
  }else{
   return false;
  }
 }
 function infonav_more_up(index)
 {
  var infonav_height = 85;
  $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
  $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
 }
   
 function onclick(event) {
  info_more_down();
 return false;
 }
 //点击效果end  
//-->
</script>
<body>
<!--头部开始-->


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
<!--头部结束-->
<!--产品列表样式-->
<div class="Inside_pages"> 
    <!--位置-->
    <div id="Filter_style">
        <h2><div class="Location_link"> <em></em><a href="#">共搜索到</a> &lt; <a href="#"><?php echo ($total); ?>件商品</a> </div></h2>
    <!--产品列表样式-->
    <div class="p_list  clearfix">
        <ul>
            <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "对不起,暂时没有此类商品" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="gl-item"> <em class="icon_special tejia"></em>
                <div class="Borders" >
                    <div class="img"><a href="#" onclick="window.location.href='<?php echo u('Goods/goods',array('id'=>$vo['id']));?>'"><img src="/upload/n1/<?php echo (array_shift(explode(',',$vo["pic"]))); ?>" style="width:220px;height:220px"></a></div>
                    <div class="name">
                        <h2><a href="#">
                        <?php echo mb_substr($vo['name'],0,12,"utf-8");?>
                        </a></h2>
                    </div>
                    <div class="Shop_name"><a href="#">两只老鼠旗舰店</a></div>
                    <div class="yushou">
                        <div class="yushou-p fl">¥<strong><?php echo ($vo['price']); ?></strong></div>
                        <a href="">
                        <div class="fr sold-go">抢购</div>
                        </a> </div>
                </div>
            </li><?php endforeach; endif; else: echo "对不起,暂时没有此类商品" ;endif; ?>
        </ul>
        <div class="Paging">
            <div class="Pagination"><?php echo ($page); ?></div>
        </div>
    </div>
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
<!--右侧菜单栏购物车样式-->

</div>
    </div>
</body>
<script type="text/javascript">
    $(function() {
        $('.cateList').hide();
    });

    function sort(v) {
        $(v).addClass('active').siblings().removeClass('active');
    }

    function search(id){
        var keywords= $("input[name='keywords']").val();
        var id=id;
        $.post("<?php echo U('search');?>",{"p":id,"keywords":keywords},function(res){
            $('.pxlist').html(res);
        })
    }
</script>
</html>