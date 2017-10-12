<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/index.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        #oldBox{
            position: fixed;
            top: 47%;
            left: 150px;
            height: 400px;
        }


        #link{
               	margin-left: 33%; 
        } 
    </style>
<script src="/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/layer/layer.js" type="text/javascript"></script>
<title>网站首页</title>
</head>
<body>
<!--<head>
    <div id="header_top">
        <div id="top">
            <div class="Inside_pages">
                <?php if($mrid > 0): ?><div class="Collection1">
                        <span>Mb欢迎您,<span style="font-size: 20px;color:red"><?php echo ($username); ?></span><a href="javascript:logout()">安全退出</a></span>
                    </div>
                    <?php else: ?>
                    <div class="Collection2" >
                        <a href="<?php echo U('Home/Login/index');?>" class="green">请登录</a>
                        <a href="<?php echo U('Home/Login/index');?>" class="green">免费注册</a>
                    </div><?php endif; ?>
                <div class="hd_top_manu clearfix" style="margin-top: -31px">
                    <ul class="clearfix">
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="javascript:user()">用户中心</a> </li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Goods/showCar');?>">我的购物车<b>(&nbsp;<?php echo ($num); ?>&nbsp;)</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="header"  class="header page_style" >
            <div class="logo"><a href="index.html"><img src="/Public/Home/images/logo.png" /></a></div>
            &lt;!&ndash;&lt;!&ndash;结束图层&ndash;&gt;&ndash;&gt;
            <div class="Search">
                <div class="search_list">
                    <ul>
                        <li class="current"><a href="#">产品</a></li>
                    </ul>
                </div>
                <form action="<?php echo U('Home/Search/search');?>" method="post" class="clear search_cur" id="search">
                    <input name="searchName" id="searchName" class="search_box" onkeydown="keyDownSearch()" type="text">
                    <input type="submit" value="搜 索"  class="Search_btn"/>
                </form>
            </div>
            &lt;!&ndash;&lt;!&ndash;购物车样式&ndash;&gt;&ndash;&gt;
            <?php if($mrid > 0): ?><div class="hd_Shopping_list" id="Shopping_list">
                <div class="s_cart"><a href="">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount"><?php echo ($num); ?></i></div>
                <div class="dorpdown-layer">
                    <div class="spacer"></div>
                    &lt;!&ndash;&lt;!&ndash;<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>&ndash;&gt;&ndash;&gt;
                    <?php if(is_array($array1)): $i = 0; $__LIST__ = $array1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><ul class="p_s_list">
                        <li>
                            <div class="img"><img src="/upload/n2/<?php echo (array_shift(explode(',',$res["pic"]))); ?>"></div>
                            <div class="content"><p class="name"><a href="#">产品名称</a></p><p><?php echo ($res["name"]); ?></p></div>
                            <div class="Operations">
                                <p class="Price">￥<?php echo ($res["price"]); ?></p>
                                <p><a href="#">删除</a></p></div>
                        </li>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="Shopping_style">
                        <a href="<?php echo U('Home/Goods/showCar');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                    </div>
                </div>
            </div>
            </else>
                <div></div><?php endif; ?>
        </div>
        &lt;!&ndash;&lt;!&ndash;菜单栏&ndash;&gt;&ndash;&gt;
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
</head>-->
<head>
    

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
</head>
<!--广告幻灯片样式-->

<div id="slideBox" class="slideBox">

    <div class="hd">
        <ul class="smallUl"></ul>
    </div>
    <div class="bd">
        <ul>
            <?php if(is_array($array)): $i = 0; $__LIST__ = $array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U('Home/Ad/ad',array('id'=>$res['id']));?>" target="_blank"><div style="background:url(/Public/Home/AD/n0/<?php echo ($res["image"]); ?>) rgb(226, 155, 197); background-position:center; width:100%; height:450px;"></div></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <!-- 下面是前/后按钮-->
    <a class="prev" href="javascript:void(0)"></a>
    <a class="next" href="javascript:void(0)"></a>
</div>
<script type="text/javascript">
    jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true});
</script>
 </div>
<!--内容样式-->
<div id="mian">
 <div class="clearfix marginbottom">
 <!--产品分类样式-->
  <div class="Menu_style" id="allSortOuterbox">
   <div class="title_name"><em></em><a name="goods"></a> 所有商品分类</div>
   <div class="content hd_allsort_out_box_new">
    <ul class="Menu_list">
        <?php if(is_array($cateList)): $i = 0; $__LIST__ = array_slice($cateList,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="name">
                <div class="Menu_name"><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo['id']));?>"><?php echo (mb_substr($vo["catename"],0,10,'UTF-8')); ?></a> <span>&lt;</span></div>
                <div class="link_name">
                    <?php if(is_array($vo['secondCate'])): $i = 0; $__LIST__ = array_slice($vo['secondCate'],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo1['id']));?>"><?php echo (mb_substr($vo1["catename"],0,3,'UTF-8')); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="menv_Detail">
                    <div class="cat_pannel clearfix">
                        <div class="hd_sort_list">
                            <?php if(is_array($vo['secondCate'])): $i = 0; $__LIST__ = array_slice($vo['secondCate'],0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl class="clearfix" data-tpc="1">
                                    <dt><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo1['id']));?>"><?php echo ($vo1["catename"]); ?><i>></i></a></dt>
                                    <!--<?php if(is_array($vo1['thirdCate'])): $i = 0; $__LIST__ = array_slice($vo1['thirdCate'],0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>&lt;!&ndash;<dd><a href="<?php echo u('Goods/goodsList',array('cid'=>$vo2['id']));?>"><?php echo ($vo2["catename"]); ?>|</a></dd>&ndash;&gt;<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
   </div>
  </div>
  <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail"});</script>
  <!--产品栏切换-->
     <div class="product_list left">
         <div class="slideGroup">
             <div class="parHd">
                 <ul><li>新品上市</li><li>超值特惠</li><li>本期团购</li><li>产品精选</li><li>抢先一步</li></ul>
             </div>
             <div class="parBd">
                 <div class="slideBoxs">
                     <a class="sPrev" href="javascript:void(0)"></a>
                     <ul>
                         <?php if(is_array($goodslist1)): $i = 0; $__LIST__ = array_slice($goodslist1,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li >
                                 <div class="pic"><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"/></a></div>
                                 <div class="title">
                                     <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank" class="name"><?php echo ($val["name"]); ?></a>
                                     <h3><b>￥</b><?php echo ($val["price"]); ?></h3>
                                 </div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)"></a>
                 </div><!-- slideBox End -->

                 <div class="slideBoxs">
                     <a class="sPrev" href="javascript:void(0)"></a>
                     <ul>
                         <?php if(is_array($goodslist2)): $i = 0; $__LIST__ = array_slice($goodslist2,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                 <div class="pic"><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>' target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"/></a></div>
                                 <div class="title">
                                     <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank" class="name"><?php echo ($val["name"]); ?></a>
                                     <h3><b>￥</b><?php echo ($val["price"]); ?></h3>
                                 </div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)"></a>
                 </div><!-- slideBox End -->

                 <div class="slideBoxs">
                     <a class="sPrev" href="javascript:void(0)"></a>
                     <ul>
                         <?php if(is_array($goodslist3)): $i = 0; $__LIST__ = array_slice($goodslist3,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                 <div class="pic"><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"/></a></div>
                                 <div class="title">
                                     <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank" class="name"><?php echo ($val["name"]); ?></a>
                                     <h3><b>￥</b><?php echo ($val["price"]); ?></h3>
                                 </div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)"></a>
                 </div><!-- slideBox End -->
                 <div class="slideBoxs">
                     <a class="sPrev" href="javascript:void(0)"></a>
                     <ul>
                         <?php if(is_array($goodslist4)): $i = 0; $__LIST__ = array_slice($goodslist4,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                 <div class="pic"><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"/></a></div>
                                 <div class="title">
                                     <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank" class="name"><?php echo ($val["name"]); ?></a>
                                     <h3><b>￥</b><?php echo ($val["price"]); ?></h3>
                                 </div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)"></a>
                 </div><!-- slideBox End -->
                 <div class="slideBoxs">
                     <a class="sPrev" href="javascript:void(0)"></a>
                     <ul>
                         <?php if(is_array($goodslist5)): $i = 0; $__LIST__ = array_slice($goodslist5,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                 <div class="pic"><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"/></a></div>
                                 <div class="title">
                                     <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" target="_blank" class="name"><?php echo ($val["name"]); ?></a>
                                     <h3><b>￥</b><?php echo ($val["price"]); ?></h3>
                                 </div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)"></a>
                 </div><!-- slideBox End -->

             </div><!-- parBd End -->
         </div>
         <script type="text/javascript">
             /* 内层图片无缝滚动 */
             jQuery(".slideGroup .slideBoxs").slide({ mainCell:"ul",vis:4,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});
             /* 外层tab切换 */
             jQuery(".slideGroup").slide({titCell:".parHd li",mainCell:".parBd"});
         </script>
        <!--广告样式-->
        <!--静态广告-->
      <!--广告样式-->
         <div class="Ads_style">
             <?php if(is_array($goodslist2)): $i = 0; $__LIST__ = array_slice($goodslist2,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'">
                 <div class="two fl">
                     <img src="/upload/n0/<?php echo (array_shift(explode(',',$val["pic"]))); ?>" width="340" height="340"/>
                     <div class="msg3">
                         <span class="bt1">&nbsp;&nbsp;<?php echo ($val["name"]); ?></span>
                         <h5 class="fl"><span>￥</span><?php echo ($val["price"]); ?></h5>
                         <div class="border1"></div>
                         <div class="border2"></div>
                     </div>
                 </div>
                 </a><?php endforeach; endif; else: echo "" ;endif; ?>
         </div>
     </div>
 </div>
    <!--楼层开始-->
    <!--一层板块-->
    <div class="clearfix Plate_style">
        <div class="Plate_column Plate_column_left">
            <div class="Plate_name">
                <a href="<?php echo U('Home/Market/market');?>"><h2>喧夜有眠</h2></a>
                <a href="#" class="Plate_link"> <img src="/Public/Home/images/10.jpg" width="190" height="400"/></a>
            </div>
            <div class="Plate_product">
                <ul id="lists">
                    <?php if(is_array($goodslist3)): $i = 0; $__LIST__ = array_slice($goodslist3,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="product_display">
                           
                            <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" class="img_link"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"  width="140" height="140"/></a>
                            <a href="#" class="name" align="center"><?php echo ($val["name"]); ?></a>
                            <h3 align="center"><b>￥</b><?php echo ($val["price"]); ?></h3>
                            <div class="Detailed">
                                <div class="content">
                                    <p class="center"><a href="<?php echo u('Goods/pay',array('id'=>$val['id']));?>'" class="Buy_btn">立即购买</a></p>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>

        </div>
        <!--二层板块-->
        <div class="Plate_column Plate_column_right">
            <div class="Plate_name">
                <a href="<?php echo U('Home/Market/market');?>"><h2>数码产品</h2></a>
                <a href="#" class="Plate_link"> <img src="/Public/Home/images/11.jpg" width="190" height="400"/></a>
            </div>
            <div class="Plate_product">
                <ul id="lists">
                    <?php if(is_array($goodslist4)): $i = 0; $__LIST__ = array_slice($goodslist4,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="product_display">
                           
                            <a  href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" class="img_link"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"  width="140" height="140"/></a>
                            <a href="#" class="name"  align="center"><?php echo ($val["name"]); ?></a>
                            <h3  align="center"><b>￥</b><?php echo ($val["price"]); ?></h3>
                            <div class="Detailed">
                                <div class="content">
                                    <p class="center"><a href="<?php echo u('Goods/pay',array('id'=>$val['id']));?>'" class="Buy_btn">立即购买</a></p>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>

        <!--三层板块-->
        <div class="Plate_column Plate_column_left">
            <div class="Plate_name">
                <a href="<?php echo U('Home/Market/market');?>"><h2>智慧生活</h2></a>
                <a href="#" class="Plate_link"> <img src="/Public/Home/images/44.jpg" width="190" height="400"/></a>

            </div>
            <div class="Plate_product">
                <ul id="lists">
                    <?php if(is_array($goodslist5)): $i = 0; $__LIST__ = array_slice($goodslist5,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="product_display">
                           
                            <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" class="img_link"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"  width="140" height="140"/></a>
                            <a href="#" class="name"  align="center"><?php echo ($val["name"]); ?></a>
                            <h3  align="center"><b>￥</b><?php echo ($val["price"]); ?></h3>
                            <div class="Detailed">
                                <div class="content">
                                    <p class="center"><a href="<?php echo u('Goods/pay',array('id'=>$val['id']));?>'" class="Buy_btn">立即购买</a></p>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--四层板块-->
        <div class="Plate_column Plate_column_right">
            <div class="Plate_name">
                <h2>日食记</h2>
                <a href="#" class="Plate_link"> <img src="/Public/Home/images/33.jpg" width="190" height="400"/></a>
            </div>
            <div class="Plate_product">
                <ul id="lists">
                    <?php if(is_array($goodslist6)): $i = 0; $__LIST__ = array_slice($goodslist6,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="product_display">
                         
                            <a href='<?php echo u('Goods/goods',array('id'=>$val['id']));?>'" class="img_link"><img src="/upload/n2/<?php echo (array_shift(explode(',',$val["pic"]))); ?>"  width="140" height="140"/></a>
                            <a href="#" class="name"  align="center"><?php echo ($val["name"]); ?></a>
                            <h3  align="center"><b>￥</b><?php echo ($val["price"]); ?></h3>
                            <div class="Detailed">
                                <div class="content">
                                    <p class="center"><a href="<?php echo u('Goods/pay',array('id'=>$val['id']));?>'" class="Buy_btn">立即购买</a></p>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--楼层结束-->
    <!--友情链接-->
    <div class="link_style clearfix">
        <div class="title">友情链接</div>
        <div class="link_name">
           
<a href="#"><img src="/Public/Home/products/logo/741.png"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/1089.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/156.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/199.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/245.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/339.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/458.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/618.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/644.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/690.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/740.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/741.png"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/1089.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/1145.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/1208.jpg"  width="100"/></a>
<a href="#"><img src="/Public/Home/products/logo/1252.jpg"  width="100"/></a>

        </div>
    </div>
</div>
<!--网站地图-->
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
<div class="fixedBox">
  <ul class="fixedBoxList">
    <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
		<a href="<?php echo U('Goods/showCar');?>"> <p class="good_cart"><?php echo ($num); ?></p>
			<span class="fixeBoxSpan"></span> <strong>购物车</strong>

			<div class="cartBox">
                <?php if(is_array($array1)): $i = 0; $__LIST__ = $array1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><div class="message">
                    <img src="/upload/n2/<?php echo (array_shift(explode(',',$res["pic"]))); ?>" style="width: 80px;height: 80px" alt="图片未加载"/>
                    <?php echo ($res["name"]); ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </a>
    </li>
    <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>

      <div class="ServiceBox">
        <div class="bjfffs"></div>
        <dl onclick="javascript:;">
		    <dt><img src="/Public/Home/images/qj.jpg" style="width: 70px;height: 75px"></dt>
		       <dd><strong>QQ客服1</strong>
		          <p class="p1">9:00-22:00</p>
		           <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
		          </dd>
		        </dl>
				<dl onclick="javascript:;">
		          <dt><img src="/Public/Home/images/qj.jpg" style="width: 70px;height: 75px"></dt>
		          <dd> <strong>QQ客服1</strong>
		            <p class="p1">9:00-22:00</p>
		            <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
		          </dd>
		        </dl>
	          </div>
     </li>
	 <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
			<span class="fixeBoxSpan"></span> <strong>微信</strong>
			<div class="cartBox">
       		<div class="bjfff"></div>
			<div class="QR_code">
			 <p><img src="/Public/Home/images/link.png" width="180px" height="180px" /></p>
			 <p>微信扫一扫，关注我们</p>
			</div>		
			</div>
			</li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>
<div id="oldBox" >
    <h2 style="color:#FF9933">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/Public/Home/images/collect.jpg" style="width: 85px;height: 75px"></dt></h2><br>
    <marquee  direction="up" scrollamount="5" >
    <?php if(is_array($oldArr)): $i = 0; $__LIST__ = $oldArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><ul>
        <li><a href="<?php echo U('Goods/goods',array('id'=>$res['id']));?>"><img src="/upload/n2/<?php echo (array_shift(explode(',',$res["pic"]))); ?>"  alt="对不起图片君休息"></a>  </li>
        <br><li style="font:  bold 20px '新宋体';color: #a9816f "><?php echo (mb_substr($res["name"],0,7,'utf-8')); ?></li><br>
    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </marquee>
</div>
</body>
</html>
<script type="text/javascript">
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