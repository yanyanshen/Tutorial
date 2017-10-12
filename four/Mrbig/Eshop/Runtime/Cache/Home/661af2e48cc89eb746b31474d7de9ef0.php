<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/user_style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/skins/all.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        #formdz table tr{
            height: 50px;
            font-size: 18px;
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
<script src="/Public/Home/address/js/distpicker.data.js"></script>
<script src="/Public/Home/address/js/distpicker.js"></script>
<script src="/Public/Home/address/js/main.js"></script>
<script src="/Public/Home/js/uploadPreview.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.form.js" type="text/javascript"></script>



<title>用户中心</title>
</head>

<body>
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
<!--用户中心样式-->
<div class="user_style clearfix">
 <div class="user_center clearfix">
 <div class="left_style">
     <div class="menu_style">
     <div class="user_title"><a href="user.html">用户中心</a></div>
     <div class="user_Head">
     <div class="user_portrait">
         <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><a href="#" title="修改头像" class="btn_link"></a>
         <img src="/Public/Home/Head/<?php echo ($res["head"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="background_img"></div>
      </div>
      <div class="user_name">
       <p><span class="name"><?php echo ($username); ?></span><br/>
           <a href="javascript:chkPwd()">[修改密码]</a></p>
       </div>           
     </div>
     <div class="sideMen">
     <!--菜单列表图层-->
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="">我的订单</a></li>
          <li> <a href="javascript:address()" >收货地址</a></li>
        </ul>
      </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>个人管理</dt>
        <dd>
      <ul>
        <li><a href="javascript:userid()">用户信息</a></li>
      </ul>
    </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_3"></em>账户管理</dt>
      <dd>
       <ul>
          <li><a href="javascript:money()" onclick="zhye()">账户余额</a></li>
          <li><a href="javascript:informetion()">消费记录</a></li>
          <li><a href="javascript:bankCard()" onclick="yhkbd()">银行卡绑定</a></li>
      </ul>
     </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_4"></em>购物车</dt>
      <dd>
        <ul>
          <li> <a href="javascript:clearCart()">清空购物车</a></li>
          <li> <a href="javascript:shopCar()" >我的购物车</a></li>
        </ul>
      </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
   <!--浏览记录样式-->

 </div>
 <div class="right_style">
     <div class="info_content">
     <div class="user_info">
      <ul class="">
       <li class="Balance"><a href="#"><img src="/Public/Home/images/user_img_05.png" /><h4>余额：￥:<?php echo ($money); ?></h4></a></li>
       <li class="Order_form"><a href="#"><img src="/Public/Home/images/user_img_04.png" /><h4>订单：(<?php echo ($orderNum); ?>)</h4></a></li>

       <li class="Favorable"><a href="#"><img src="/Public/Home/images/user_img_07.png" /><h4><?php echo ($grade); ?></h4></a></li>
       <li class="integral"><a href="#"><img src="/Public/Home/images/user_img_06.png" /><h4><?php echo ($bonuspoint); ?></h4></a></li>
      </ul>
     </div>
     <!--样式-->

         <table style="width: 100%;text-align: center;line-height: 50px;font-size: 20px">
             <th  >
             <td style="width: 20%;height: 100px;">订单编号</td>
             <td  style="width: 20%;height: 100px">快递</td>
             <td  style="width: 20%;height: 100px">价格(元)</td>
             <td  style="width: 20%;height: 100px">订单状态</td>
             <td  style="width: 20%;height: 100px">操作</td>
             </th>
             <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><tr>
                 <td style="float: left;height: 50px">
                 </td>
                 <td><a href=""><?php echo ($res["oid"]); ?></a> </td>
                 <td><?php echo ($res["wlname"]); ?></td>
                 <td><?php echo ($res["pmoney"]); ?></td>
                 <td><?php echo ($res["status"]); ?></td>
                 <td style="font-size: 12px;height: 30px"><a href="javascript:back(<?php echo ($res['id']); ?>)">申请退货</a>
                     <a href="javascript:orderOk(<?php echo ($res['id']); ?>)">确认收货</a><br/>
                     <a href="<?php echo U('Goods/showOid',array('id'=>$res['id']));?>">订单详情</a><br/>
                 </td>
             </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         </table>
         <script type="text/javascript">
              function back($id){
                  layer.confirm('您确定要退货吗？',{
                      btn:['确定','再考虑']
                  },function(){
                      $.get("<?php echo U('back');?>",{'id':$id},function(res){
                          if(res.status=='ok'){
                              layer.alert(res.msg);
                          }else{
                              layer.alert(res.msg);
                          }
                      })
                  },function(){
                      layer.msg('购物不易且退且珍惜!',{
                          time:10000
                      })
                  })
              }
             function orderOk($id){
                 layer.confirm('您确定要确认收货吗？',{
                     btn:['确定','再考虑']
                 },function(){
                     $.get("<?php echo U('orderOk');?>",{'id':$id},function(res){
                         if(res.status=='ok'){
                             layer.alert(res.msg);
                         }else{
                             layer.alert(res.msg);
                         }
                     })
                 },function(){
                     layer.msg('购物不易,收货请珍惜!',{
                         time:10000
                     })
                 })
             }

         </script>
     </div>
 </div>
     <!--收藏商品-->
     <div class="Collections_p" style="float: right">
         <div class="slideGroups">
             <div class="parHd">
                 <ul><li>收藏的商品</li></ul>
             </div>
             <div class="parBd">
                 <div class="Collect_Products">
                     <a class="sPrev" href="javascript:void(0)">&lt;</a>
                     <ul>
                         <?php if(is_array($arrOld)): $key = 0; $__LIST__ = $arrOld;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($key % 2 );++$key;?><li>
                             <div class="pic">
                                 <a href="<?php echo U('Goods/goods',array('id'=>$key));?>">
                                     <img src="/upload/n2/<?php echo (array_shift(explode(',',$res["pic"]))); ?>">
                                 </a>
                             </div>
                             <div class="title"><a href="#"><?php echo ($res["name"]); ?></a></div>
                             <div class="p_Price">￥<?php echo ($res["price"]); ?></div>
                         </li><?php endforeach; endif; else: echo "" ;endif; ?>
                         <?php if(is_array($arrOld)): $key = 0; $__LIST__ = $arrOld;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($key % 2 );++$key;?><li>
                                 <div class="pic">
                                     <a href="<?php echo U('Goods/goods',array('id'=>$key));?>">
                                         <img src="/upload/n2/<?php echo (array_shift(explode(',',$res["pic"]))); ?>">
                                     </a>
                                 </div>
                                 <div class="title"><a href="#"><?php echo ($res["name"]); ?></a></div>
                                 <div class="p_Price">￥<?php echo ($res["price"]); ?></div>
                             </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                     <a class="sNext" href="javascript:void(0)">&gt;</a>
                 </div>
               </div>
             </div>
         </div>
         <script type="text/javascript">
             /* 内层图片无缝滚动 */
             jQuery(".slideGroups .Collect_Products").slide({ mainCell:"ul",vis:5,prevCell:".sPrev",nextCell:".sNext",effect:"leftMarquee",interTime:50,autoPlay:true,trigger:"click"});

             /* 外层tab切换 */
             jQuery(".slideGroups").slide({titCell:".parHd li",mainCell:".parBd",trigger:"click"});

         </script>
     </div>
     <!--结束-->
 </div>

</div>
</div>
</div>



<div>
    <!--收货地址-->
    <div class="right_style" id="shdz" style="display: none">
        <!--地址管理-->
        <form id="formdz" method="post">
            <table cellpadding="0" cellspacing="0"  class="add_content">
                <tr style="margin-top: 30px">
                    <td class="label">联&nbsp;&nbsp;系&nbsp;人：<i>*</i></td>
                    <td><input name="name" type="text"  class="addtext"/></td>
                </tr>
                <tr style="margin-top: 30px">
                    <td class="label">所在地区：<i>*</i></td><td>
                    <div data-toggle="distpicker">
                        <select class="form-control" id="province1" name="province"></select>
                        <select class="form-control" id="city1" name="city"></select>
                        <select class="form-control" id="district1" name="town1"></select>
                    </div>
                </tr>
                <tr style="margin-top: 30px"><td class="label">街道地址：<i>*</i></td><td><input name="town" type="text"  class="addtext"  style="width:300px"/></td></tr>
                <tr style="margin-top: 30px"><td class="label">邮政编码：<i>*</i></td><td><input name="yid" type="text"  class="addtext"/></td></tr>
                <tr style="margin-top: 30px"><td class="label">手机号码：</td><td><input name="mobile" type="text"  class="addtext"/></td></tr>
                <tr style="margin-top: 30px"><td class="label">公司名称：</td><td><input name="" type="text"  class="addtext"/></td></tr>
                <tr style="margin-top: 30px">
                    <td colspan="5" class="center">
                        <input name="" type="button" value="保存地址"   id="bc" style="background-color: #009772"/>
                    </td>
                </tr >
            </table>
        </form>
            <!--用户地址-->
            <div class="address_content" style="text-align: center">
                <ul>
                    <div class="add_address_style">
                        <div class="user_Remark">用来保存自己的发货，退货地址，用户最多只能添加20个地址。</div>
                        <table class="display_address">
                            <thead>
                            <tr class="label_name">


                                <td class="label_2" width="60px">联系人</td>
                                <td class="label_3" width="180px">所在地区</td>
                                <td class="label_4" width="180px">街道地址</td>
                                <td class="label_5" width="100px">邮政编码</td>

                                <td class="label_7" width="100px">手机号码</td>
                                <td class="label_8" width="100px">备注</td>
                                <td class="label_9" width="100px">操作</td>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($arraydz)): $i = 0; $__LIST__ = $arraydz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                                    <td><?php echo ($vo["addname"]); ?></td>
                                    <td><?php echo ($vo["address"]); ?></td>
                                    <td><?php echo ($vo["town"]); ?></td>
                                    <td><?php echo ($vo["yid"]); ?></td>
                                    <td><?php echo ($vo["mobile"]); ?></td>
                                    <td></td>
                                    <td><a  id="del" href="javascript:del(<?php echo ($vo["id"]); ?>)">删除</a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                            </tbody>
                        </table>
                        <script type="text/javascript">

                            $('#bc').click(function(){
                                $.ajax({
                                    url:"<?php echo U('Home/Address/address');?>",
                                    data:$('#formdz').serialize(),
                                    type:'get',
                                    success:function(res){
                                        if(res.status=='ok'){
                                            alert(res.msg);
                                        }else{
                                            alert(res.msg);
                                        }
                                    }
                                })
                            });
                            function del($id){
                                $.ajax({
                                    url:"<?php echo U('Home/Address/del');?>",
                                    type:'get',
                                    data:{'id':$id},
                                    success:function(res){
                                        if(res.status=='ok'){
                                            layer.alert(res.msg);
                                        }else{
                                            layer.alert(res.msg);
                                        }
                                    }
                                })
                            }
                        </script>

                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<div>
    <!--用户信息-->
    <div class="right_style" id="yhxx" style="display: none">
            <!--个人信息-->
            <div class="Personal_info" id="Personal">
                <ul class="xinxi">

                    <form name="reg_testdate" action="" id="userForm" method="post">
                        <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><li><label>真实姓名：</label>  <span><input name="tname" type="text" value="<?php echo ($res["tname"]); ?>"  class="text"  disabled="disabled"/></span></li>
                    <li><label>出身日期：</label> <span class="time"><?php echo ($res["birthday"]); ?></span>
                        <div class="add_time">
                                    <select name="YYYY" onChange="YYYYDD(this.value)">
                                        <option value="">请选择 年</option>
                                    </select>
                                    <select name="MM" onChange="MMDD(this.value)">
                                        <option value="">选择 月</option>
                                    </select>
                                    <select name="DD">
                                        <option value="">选择 日</option>
                                    </select>
                        </div>
                    </li>
                    <li><label>用户性别：</label> <span class="sex"><?php echo ($res["sex"]); ?></span>
                        <div class="add_sex">
                            <input type="radio" name="sex" value="保密" checked="checked">
                            保密&nbsp;&nbsp;
                            <input type="radio" name="sex" value="男">
                            男&nbsp;&nbsp;
                            <input type="radio" name="sex" value="女">
                            女&nbsp;&nbsp;</div></li>
                    <li><label>用户QQ：</label>  <span><input name="QQ" type="text" value="<?php echo ($res["qq"]); ?>"  class="text"  disabled="disabled"/></span></li>
                    <li><label>移动电话：</label>  <span><input name="mobile" type="text" value="<?php echo ($res["mobile"]); ?>"  class="text"  disabled="disabled"/></span></li>
                    <div class="bottom"><input name="" type="button" value="修改信息"  class="modify"/><input name="" type="button" value="保存"   id="sub"/></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </form>

                </ul>
                <ul class="Head_portrait">
                    <!--<li class="User_avatar"><img src="/Public/Home/images/people.png" /></li>-->
                    <!--<li><input name="name" type="submit" value="上传头像"  class="submit"/></li>-->
                    <!--<li><input name="name" type="submit" value="使用头像"  class="submit"/></li>-->
                    <li><h2>头像预览</h2></li>
                    <form action="<?php echo U(uploadHead);?>" method="POST" enctype="multipart/form-data" id="headForm">
                    <li><div id="imgdiv"><img id="imgShow" width="200" height="200" /></div></li>
                    <li><input type="file" class="submit" name="image" value="" id="up_img" /></li>
                    <li><input type="button" value="使用头像" id="submit" class="submit"/></li>
                    </form>
                    <script>
                        window.onload = function () {
                            new uploadPreview({ UpBtn: "up_img", DivShow: "imgdiv", ImgShow: "imgShow" });
                        }
                        $('#submit').click(function(){

                            $('#headForm').ajaxSubmit(function(res){
                                if(res.status=='ok'){
                                    alert(res.msg);
                                }else{
                                    alert(res.msg);
                                }
                            });
                        })
                    </script>
                </ul>
            </div>
        </div>
</div>
<div>

</div>
<div>
    <!--账户管理-->
    <div style="margin: 100px auto">
    <div  id="zhgl" style="display:none">
        <div class="user_Account_style">
            <div class="user_Account">
                <div class="title_name">我的账户余额：（小充钱包）</div>
                <div class="Balance clearfix">
                    <p class="je_Balance">账户余额：<b><i><?php echo ($money); ?></i></b>元 </p>
                    <p class="clearfix Account_btn"><a href="#" class="Recharge_btn" id="toPay">充值</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div style="display: none" id="zhiFu">
        <ul style="text-align: center;">
            <form action="" method="post" id="payForm">
            <li style="margin-top: 20px"><input type="radio" name="pay"  value="财付通" style="line-height: 50px;height: 50px"/><img src="/Public/Home/images/zhifu1_07.png"></li>
            <li style="margin-top: 20px"><input type="radio" name="pay" checked="checked" value="支付宝" style="line-height: 50px;height: 50px"/><img src="/Public/Home/images/zhifu1_10.png"></li>
            <li style="margin-top: 20px"><input type="radio" name="pay" value="银联" style="line-height: 50px;height: 50px"/><img src="/Public/Home/images/zhifu1_12.png"></li>
            <li style="margin-top: 20px;font-size: 20px"><b>金额:</b><input type="text" name="money" style="width: 140px"/></li>
            <li style="margin-top: 20px;font-size: 20px"><input type="button" value="充值" style="width: 80px;height: 30px" id="chong"/></li>
            </form>
        </ul>

    </div>
    <script type="text/javascript">
        $('#toPay').click(function(){
            layer.open({
                type: 1,
                title:'充值',
                area: ['400px','400px'],
                shadeClose: true,
                content: $('#zhiFu')
            });
        })
        $('#chong').click(function(){
            $.post("<?php echo U('chong');?>",$('#payForm').serialize(),function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg);
                }else{
                    layer.alert(res.msg);
                }
            })
        })

    </script>
</div>
<div>
    <!--银行卡绑定-->
    <div class="right_style" style="display: none" id="yhkbd">
        <!--内容详细-->
        <div class="title_style"><em></em>收款账户</div>
        <div class="content_style">
            <!--收款账号-->
            <div class="Account_style clearfix">
                <div class="Account_prompt">只支持支付宝,银联和微信账号，每个账号只能为一个。</div>
                <!-- <div class="add_Bank_card"><a href="#" class="add_btn">设置收款银行卡</a></div>-->
                <div class="Bank_card clearfix">
                    <div class="Bank_card_style add_Account">
                        <a href="javascript:ovid(0)" class="aadd_Bank_btn btn" id="Alipay">支付宝账户</a>
                    </div>
                    <div class="Bank_card_style">
                        <div class="Alipay_zh">
                            <span class="logo"><img src="/Public/Home/images/zfb.jpg" /></span>
                            <span class="bank_name">账户：133454534332</span>
                            <span class="time">开通时间：2016-04-19</span>
                        </div>
                    </div>
                    <div class="Bank_card_style default">
                        <div class="card_box_name">
                            <span class="bank_logo"><img src="/Public/Home/images/NTo2Wh8TF.png" /></span>
                            <span class="bank_name">建设银行</span>
                            <span class="bank_num4">尾号45343</span>
                            <span class="card_type_CC card_type_DC"></span>
                        </div>
                        <div class="bank_operating"><a href="javascript:ovid(0)" class="left account_info">查看</a><a href="#" class="right">删除</a></div>
                        <div class="bank_default">默认收款账户</div>
                    </div>
                    <div class="Bank_card_style add_Account">
                        <a href="javascript:ovid(0)" class="aadd_Bank_btn btn" id="UnionPay">银联账户</a>
                    </div>
                    <div class="Bank_card_style add_Account">
                        <a href="javascript:ovid(0)" class="aadd_Bank_btn btn" id="WeChat">微信账户</a>
                    </div>
                </div>
            </div>
        </div>
    </div   >

         <div class="Account_bankstyle" id="Account_bank" style="display:none">
             <div class="addAccount_style">
                 <ul class="UnionPay_style">
                     <li><label class="label_name">银行</label><select name="" size="1">
                         <option value="1">中国建设银行</option>
                         <option value="2">中国银行</option>
                         <option value="3">中国工商银行</option>
                         <option value="4">中国农业银行</option>
                         <option value="5">中国招商银行</option>
                         <option value="6">中国中信银行</option>
                     </select></li>
                     <li><label class="label_name">账户</label><input name="" type="text"  class="text" style=" width:300px;"/></li>
                     <li><label class="label_name">姓名</label><input name="" type="text"  class="text"/></li>
                     <li><label class="label_name">开户时间</label><input name="" type="text"  class="text inline laydate-icon" id="start" width="200px;"/></li>
                     <li><button class="btn Opened_btn" type="button">点击开通</button></li>
                 </ul>
                 <!--支付宝账户-->
                 <div class="Alipay_style">
                     <div><label class="label_name">支付宝账户</label><input name="" type="text"  class="text" style=" width:300px"/></div>
                     <button class="btn Opened_btn" type="button">点击开通</button>
                 </div>
                 <!--微信账户-->
                 <div class="WeChat_style">
                     <div><label class="label_name">微信账户</label><input name="" type="text"  class="text" style=" width:300px"/></div>
                     <button class="btn Opened_btn" type="button">点击开通</button>
                 </div>
             </div>
         </div>
         <!--账户信息-->
         <div id="account_info" class="acc_info_style" style="display:none">
             <ul class="list_info">
                 <li><label class="label_name">开户银行</label><span>中国建设银行</span></li>
                 <li><label class="label_name">开户账户</label><span>6226 4564 6789 345</span></li>
                 <li><label class="label_name">姓名</label><span>张孝全</span></li>
                 <li><label class="label_name">开通时间</label><span>2016年4月19日</span></li>
                 <li><label class="label_name">限额</label><span>50万(单笔交易量最高为50万)</span></li>
             </ul>
         </div>
         <script type="text/javascript">
             $('.aadd_Bank_btn').on('click', function(){
                 layer.open({
                     type: 1,
                     title:'添加账户',
                     area: ['500px',''],
                     shadeClose: true,
                     content: $('#Account_bank')
                 });
             });
             $('.account_info').on('click', function(){
                 layer.open({
                     type: 1,
                     title:'账户信息',
                     area: ['600px',''],
                     shadeClose: true,
                     content: $('#account_info')
                 });
             });
             $(".aadd_Bank_btn").bind("click",function(){
                 var cid = $(this).attr("id");
                 var cname = $(this).attr("title");
                 $(".addAccount_style").attr("id",cid).ready();
                 $("#Bcrumbs").attr("href",cid).ready();
                 $(".Current_page").html(cname).ready();


             });
             laydate({
                 elem: '#start', //目标元素'
                 event: 'focus' //响应事件。
             });
         </script>

</div>
<div>
    <!--消费记录-->
    <div class="right_style" style="display: none" id="xfjl">
        <!--消费记录样式-->
        <div class="user_address_style">
            <div class="title_style"><em></em>消费记录</div>
            <div class="Exp_record_style">
                <!--  <div class="prompt_xinxi">暂无任何消费记录</div>-->
                <table cellpadding="0"  cellspacing="0"  width="100%" class="record_list">
                    <thead><tr class="label_name"><td width="20%">创建时间</td><td width="10%">金额</td><td width="10%">状态</td><td width="20%">操作</td></tr></thead>
                    <tbody>
                    <?php if(is_array($inforArr)): $i = 0; $__LIST__ = $inforArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><tr class="content"><td><?php echo ($res["inforTime"]); ?></td><td><b class="xf"><?php echo ($res["money"]); ?></b></td><td>完成</td><td><a href="#">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="right">
                    <?php echo ($page); ?>
                    <input type="submit" value="GO" class="btn_go"> 共：<?php echo ($total); ?>条</div>
            </div>
        </div>
    </div>
</div>
<div>
    <!--购物车-->
    <div class="Order_form_list" style="display: none" id="wdgwc">
        <table>
            <thead>
            <tr>
                <td class="list_name_title0" style="width: 20%">商品</td>
                <td class="list_name_title1" style="width: 20%">单价(元)</td>
                <td class="list_name_title2" style="width: 20%">数量</td>
                <td class="list_name_title4" style="width: 20%">总价(元)</td>
                <td class="list_name_title6" style="width: 20%">操作</td>
            </tr>
            </thead>
            <?php if(is_array($arr3)): $i = 0; $__LIST__ = $arr3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><tr>
                <tr class="Order_info">
                    <td colspan="6" class="Order_form_time">
                        <input name="checkitems" type="checkbox" value="天然绿色多汁香甜无污染水蜜桃"  class=""/>
                        <span>添加时间:</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="product_name clearfix">
                            <a href="#" class="product_img"><img src="/upload/n0/<?php echo (array_shift(explode(',',$res['pic']))); ?>" width="80px" height="80px"></a>
                            <a href="3"><?php echo ($res['name']); ?></a>
                        </div>
                    </td>
                    <td class="split_line" id="price"><?php echo ($res['price']); ?></td>
                    <td>
                        <a href="javascript:jian()">减</a>
                        <input type="text" value="<?php echo ($res['num']); ?>" class="float-lt choose_input" name="num" id="num" style="width: 20px"/>
                        <a href="javascript:jia()">加</a>
                    </td>
                    <td class="split_line" id="prices"><?php echo ($prices); ?></td>
                    <td class="operating">
                        <a href="#">联系客服</a>

                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
</div>
<div id="chkPwd" style="display: none">
   <!--修改密码-->
   <form action="" method="post" style="text-align: center;font-size: 20px" id="form">
       <ul>
           <li style="line-height: 70px;height: 70px"><b>用户名:<input type="text" name="username"/></b></li>
           <li style="line-height: 70px;height: 70px"><b>原密码:<input type="text" name="pwd"/></b></li>
           <li style="line-height: 70px;height: 70px"><b>新密码:<input type="text" name="newPwd"/></b></li>
           <li style="line-height: 70px;height: 70px"><b>新密码:<input type="text" name="reNewPwd"/></b></li>
           <li style="line-height: 70px;height: 70px"><input type="button" value="提交" style="width: 70px;height: 40px" id="button"/></li>
       </ul>
   </form>
   <script type="text/javascript">
        $('#button').click(function(){
            $.ajax({
                url:"<?php echo U('chkPwd');?>",
                data:$('#form').serialize(),
                type:'post',
                success:function(res){
                    if(res.status=='ok'){
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
   </script>
</div>
   <!--结束-->


<!--网站地图-->
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
<script type="text/javascript">

    function money(){
        layer.open({
            type: 1,
            title:'订单详情',
            area: ['600px','450px'],
            shadeClose: true,
            content: $('#zhgl')
        });
    }
    function shopCar(){
        layer.open({
            type: 1,
            title:'我的购物车',
            area: ['1200px','800px'],
            shadeClose: true,
            content: $('#wdgwc')
        });
    }
    function informetion(){
        layer.open({
            type: 1,
            title:'消费记录',
            area: ['1000px','600px'],
            shadeClose: true,
            content: $('#xfjl')
        });
    }
    function userid(){
        layer.open({
            type: 1,
            title:'个人信息',
            area: ['1000px','600px'],
            shadeClose: true,
            content: $('#yhxx')
        });
    }
    function address(){
        layer.open({
            type: 1,
            title:'收货地址',
            area: ['1000px','800px'],
            shadeClose: true,
            content: $('#shdz')
        });
    }
    function bankCard(){
        layer.open({
            type: 1,
            title:'银行卡绑定',
            area: ['1000px','600px'],
            shadeClose: true,
            content: $('#yhkbd')
        });

    }
    function chkPwd(){
        layer.open({
            type: 1,
            title:'修改密码',
            area: ['400px','400px'],
            shadeClose: true,
            content: $('#chkPwd')
        });
    }
    function clearCart(){
        layer.confirm('确定要清空购物车吗？', {
            btn: ['确定','哦不'] //按钮
        }, function(){
            $.post("<?php echo U('clearCart');?>",function(res){
                if(res.status=='ok'){
                    alert(res.msg);
                }else{
                    alert(res.msg);
                }
            })
        }, function(){
            layer.msg('也可以这样', {
                time: 20000, //20s后自动关闭
                btn: ['明白了', '知道了']
            });
        });
    }
</script>
<script language="JavaScript">
    function YYYYMMDDstart(){
        MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        //先给年下拉框赋内容
        var y  = new Date().getFullYear();
        for (var i = (y-30); i < (y+30); i++) //以今年为准，前30年，后30年
            document.reg_testdate.YYYY.options.add(new Option(" "+ i +" 年", i));

        //赋月份的下拉框
        for (var i = 1; i < 13; i++)
            document.reg_testdate.MM.options.add(new Option(" " + i + " 月", i));

        document.reg_testdate.YYYY.value = y;
        document.reg_testdate.MM.value = new Date().getMonth() + 1;
        var n = MonHead[new Date().getMonth()];
        if (new Date().getMonth() ==1 && IsPinYear(YYYYvalue)) n++;
        writeDay(n); //赋日期下拉框Author:meizz
        document.reg_testdate.DD.value = new Date().getDate();
    }
    if(document.attachEvent)
        window.attachEvent("onload", YYYYMMDDstart);
    else
        window.addEventListener('load', YYYYMMDDstart, false);
    function YYYYDD(str) //年发生变化时日期发生变化(主要是判断闰平年)
    {
        var MMvalue = document.reg_testdate.MM.options[document.reg_testdate.MM.selectedIndex].value;
        if (MMvalue == ""){ var e = document.reg_testdate.DD; optionsClear(e); return;}
        var n = MonHead[MMvalue - 1];
        if (MMvalue ==2 && IsPinYear(str)) n++;
        writeDay(n)
    }
    function MMDD(str)   //月发生变化时日期联动
    {
        var YYYYvalue = document.reg_testdate.YYYY.options[document.reg_testdate.YYYY.selectedIndex].value;
        if (YYYYvalue == ""){ var e = document.reg_testdate.DD; optionsClear(e); return;}
        var n = MonHead[str - 1];
        if (str ==2 && IsPinYear(YYYYvalue)) n++;
        writeDay(n)
    }
    function writeDay(n)   //据条件写日期的下拉框
    {
        var e = document.reg_testdate.DD; optionsClear(e);
        for (var i=1; i<(n+1); i++)
            e.options.add(new Option(" "+ i + " 日", i));
    }
    function IsPinYear(year)//判断是否闰平年
    {
        return(0 == year%4 && (year%100 !=0 || year%400 == 0));
    }
    function optionsClear(e)
    {
        e.options.length = 1;
    }

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
</body>
</html>