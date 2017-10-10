<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/Threelinkage/linkage.css" rel="stylesheet"  type="text/css"/>
<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.foucs.js" type="text/javascript"></script>
<script src="/Public/Home/js/geo.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />



    <title>用户地址管理</title>
</head>
<style type="text/css">
    #s1,#s2,#s3{ width: 50px; height: 34px; display: inline-block; border-radius: 0px;}

    input.error { border: 1px solid #EA5200;background: #ffdbb3;}
    div.error {
        background:url("/Public/Home/images/error.png") no-repeat 5px 2px;
        margin-left:75px;
        margin-top: 5px;
        padding-left: 22px;
        padding-bottom: 2px;
        font-weight: bold;
        color: #EA5200;
        vertical-align: middle
    }


</style>
<script type="text/javascript">
    $(function(){
        var validate=$("#form1").validate({
            rules:{
                name:{ required:true},
                town:{ chkpct:true},
                address:{ required:true, minlength:5},
                postcode:{ required:true, postCode:true},
                phone:{ required:true, mobile:true}
            },
            messages:{
                name:{ required:"收件人不能为空"},
                town:{ chkpct:"请选择地址到县级"},
                address:{ required:"不能为空", minlength:"最少5个字"},
                postcode:{ required:"不能为空", postCode:"请正确填写您的邮政编码"},
                phone:{ required:"不能为空", mobile:"请正确填写您的手机号码"}
            },
            errorElement:'div',
            errorPlacement: function(error, element) {
                error.appendTo( element.parent());
            }
        })
        jQuery.validator.addMethod("chkpct", function(value, element) {
            if(value=="市、县级市、县"){
                res=false;
            }else{
                res=true;
            }
            return this.optional(element) || res;
        }, "请选择地址");
        jQuery.validator.addMethod("postCode", function(value, element) {
            var codeReg= /^[0-9]{6}$/;
            return this.optional(element) || (codeReg.test(value));
        }, "请正确填写您的邮政编码");
        jQuery.validator.addMethod("mobile", function(value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");

        $("#submit_btn1").click(function(){
            if(validate.form()){
                $.post("<?php echo U('Order/chaA');?>",$("#form1").serialize(),function(res){
                    layer.msg("修改成功",function(){
                        location="<?php echo U('Order/myAddress');?>";
                    });
                },"json")
            }
        })

        $("#submit_btn2").click(function(){
            if(validate.form()){
                $.post("<?php echo U('Order/addA');?>",$("#form1").serialize(),function(res){
                    layer.msg(res.info,{time:1000,icon:6},function(){
                        location="<?php echo U('Order/myAddress');?>";
                    });

                },"json")
            }
        })

        del=function(id){
            $.post("<?php echo U('Order/delA');?>",{id:id},function(res){
                layer.msg(res.info,{time:1000,icon:6},function(){
                    location="<?php echo U('Order/myAddress');?>";
                });
            },'json')
        }
        def=function(id){
            $.post("<?php echo U('Order/defA');?>",{id:id},function(res){
                layer.msg(res.info,{time:1000,icon:6},function(){
                    location="<?php echo U('Order/myAddress');?>";
                });
            },'json')
        }
    })
</script>
<body onload="setup();preselect('<?php echo ($address["province"]); ?>');">
<!--顶部样式-->

<!--logo和搜索样式-->
<style type="text/css">
    .Navigation_name li.onon { background:#9d9d9d;color: #fff; }
</style>
<script type="text/javascript">
    jQuery.fn.addFavorite = function(l, h) {
        return this.click(function() {
            var t = jQuery(this);
            if(jQuery.browser.msie) {
                window.external.addFavorite(h, l);
            } else if (jQuery.browser.mozilla || jQuery.browser.opera) {
                t.attr("rel", "sidebar");
                t.attr("title", l);
                t.attr("href", h);
            } else {
                layer.alert("浏览器不支持，请使用Ctrl+D将本页加入收藏夹！",{title:"提示",icon:7});
            }
        });
    };
    $(function(){
        $('#fav').addFavorite(document.title,"www.ybc.com");

        refreshCart=function(){
            $.post("<?php echo U('Cart/getNum');?>",'',function(res){
                if(res.info){
                    $("#cartNum").text(res.info);
                }else{
                    $("#cartNum").text(0);
                }
            })
        }
        refreshCart();
        $(".Navigation_name li").removeClass();
        var reg1=/\/Home\/Integral\//;
        var reg2=/\/Home\/Group\//;
        var reg3=/\/Home\/Index\//;
        var nowurl=document.URL;
        if(reg1.test(nowurl)){

        }else if(reg2.test(nowurl)){
            $('#jrtgli').addClass("on");
            $(".Navigation_name li").mouseleave(function(){
                $(this).removeClass("on");
            })
        }else if(reg3.test(nowurl)){

        }else{

        }


    });
</script>
<!--顶部样式-->
<div id="top">
    <div class="top">
        <div class="Collection"><em></em><a href="javascript:;" title="收藏我们" id="fav">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <?php if(!isset($_SESSION['ybc_id'])): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                    <?php else: ?>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('UserCenter/usercenter');?>" target="_blank" class="red">[<?php echo (session('ybc_username')); ?>]</a><a href="<?php echo U('Login/logout');?>" class="red">[退出登录]</a></li><?php endif; ?>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Order/myOrderList');?>" target="_blank">我的订单</a></li>
                <li class="hd_menu_tit msg" data-addclass="hd_menu_hover"> <a href="<?php echo U('UserCenter/usermsg');?>" target="_blank">我的消息(<b id="msgNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>">购物车(<b id="cartNum">0</b>)</a> </li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('UserCenter/myCollect');?>">我的收藏</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Index/guanyuwomen');?>" target="_blank">关于我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--logo和搜索样式-->
<div id="header"  class="header">
    <div class="logo">
        <a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a>
        <div class="phone">
            免费咨询热线:<span class="telephone">400-3404-000</span>
        </div>
    </div>
    <div class="Search">
        <form action="<?php echo U('Goodslist/index');?>" method="get">
            <p>
                <input name="keywords" type="text"  value="<?php echo ($keywords); ?>" class="text"/><input name="" type="submit" value="" class="Search_btn"/>
            </p>
        </form>
        <p class="Words">
            <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
            <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
            <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
            <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
            <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
            <a href="<?php echo U('goodslist/index');?>?category1=44">茶具</a>
        </p>
    </div>
</div>
<!--导航栏样式-->
<!--<div class="prompt"></div><div class="nogoods"  style="height: 69px;"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
<div id="Menu" class="clearfix">
    <div class="Menu_style">
        <div id="allSortOuterbox" class="display">
            <div class="Category"><a href="#" class="Menu_img"><em></em></a></div>
            <div class="hd_allsort_out_box_new">
                <!--左侧栏目开始-->
                <div class="Menu_list">
                    <div class="menu_title">茶叶品种</div>
                    <a href="<?php echo U('goodslist/index');?>?category1=26">乌龙茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=27">绿茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=28">红茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=29">黑茶</a>
                    <a href="<?php echo U('goodslist/index');?>?category1=30">黄茶</a>
                </div>
                <div class="Menu_list">
                    <div class="menu_title">茶叶价格</div>
                    <a href="<?php echo U('Goodslist/index');?>?price=1">0-50</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=2">50-150</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=3">150-500</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=4">500-1000</a>
                    <a href="<?php echo U('Goodslist/index');?>?price=5">1000以上</a>
                </div>
                <div class="Menu_list">
                    <div class="menu_title">推荐茶叶</div>
                    <ul class="recommend">

                    </ul>
                </div>
            </div>
        </div>
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name">
                <li id="syli"><a class="nav_on" id="mynav1"  href="<?php echo U('Index/index');?>"><span>首页</span></a></li>
                <li><a class="nav_on" id="mynav2"  href="<?php echo U('goodslist/index');?>?category1=26"><span>乌龙茶</span></a></li>
                <li><a class="nav_on" id="mynav3"  href="<?php echo U('goodslist/index');?>?category1=27"><span>绿茶</span></a></li>
                <li><a class="nav_on" id="mynav7"  href="<?php echo U('goodslist/index');?>?category1=29"><span>黑茶</span></a></li>
                <li><a class="nav_on" id="mynav4"  href="<?php echo U('goodslist/index');?>?category1=44"><span>茶具</span></a></li>
                <li id="jrtgli"><a class="nav_on" id="mynav8"  href="<?php echo U('Group/index');?>" target="_blank"><span>今日团购</span></a></li>
                <li id="jfscli"><a class="nav_on" id="mynav9"  href="<?php echo U('Integral/integral');?>" target="_blank"><span>积分商城</span></a></li>
                <li><a class="nav_on" id="mynav11"  href="<?php echo U('Sign/index');?>"><span>每日签到</span></a></li>
                <li><a class="nav_on" id="mynav10"  href="<?php echo U('Index/lianxiwomen');?>" target="_blank"><span>联系我们</span></a></li>
            </ul>
        </div>
        <script type="text/javascript">
            $(function(){
                reg1=/Home\/Group\//;
                reg2=/Home\/Integral\//;
                reg3=/Home\/Sign\//;
                nowUrl=document.URL;
                if(reg1.test(nowUrl)){
                    $("#jrtgli").addClass('oonn');
                }
                if(reg2.test(nowUrl)){
                    $("#jfscli").addClass('oonn');
                }
                if(reg3.test(nowUrl)){
                    $("#jrqdli").addClass('oonn');
                }

                $("#Navigation>ul>li").mouseenter(function(){
                    $(this).addClass('on');
                })
                $("#Navigation>ul>li").mouseleave(function(){
                    $(this).removeClass('on');
                })
            })
        </script>
        <!--购物车-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em></em><a href="<?php echo U('Cart/cart');?>">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
            <div class="dorpdown-layer" style="width: 321px">
                <div class="spacer"></div>
                <div class="prompt"></div><div class="nogoods"  style="height: 69px;"><b></b>购物车中还没有商品，赶紧选购吧！</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        getMyCart=function(){
            $.post("<?php echo U('Cart/getMyCart');?>",'',function(res){
                if(res.status==1){
                    var str='';
                    var num=0;
                    var price=0;
                    str+="<div class='spacer'></div><ul class='p_s_list' style='max-height: 240px;overflow: auto; margin-bottom: 50px;'>";
                    for(var i in res.info){
                        num+=parseInt(res['info'][i]['buynum']);
                        price+=(parseInt(res['info'][i]['buynum'])*parseInt(res['info'][i]['price']));
                        str+="<li><div class='img'><img style='width: 50px;height: 50px' src='/Uploads/goodsPic/100/100_"+res['info'][i]['pic']+"'></div>";
                        str+="<div class='content'><p>产品名称：</p><p>";
                        str+="<a href='<?php echo U('Home/Detail/detail');?>?id="+res['info'][i]['id']+"' title="+res['info'][i]['goodsname']+">";
                        str+=res['info'][i]['goodsname'].substring(0,13);
                        str+=" </a></p></div>";
                        str+="<div class='Operations'> <p class='Price' style='color: lightslategray'>￥<span class='singlePrice'>";
                        str+=res['info'][i]['price'];
                        str+="</span>   x   <span class='buyNums'>";
                        str+=res['info'][i]['buynum'];
                        str+="<span/></p><p><a class='del' onclick='delCart("+res['info'][i]['id']+");' style='cursor: pointer'>移除</a></p></div> </li>";
                    }
                    str+="<ul/>";
                    str+="<div class='Shopping_style' style='position: absolute;bottom: 0px; width: 290px;'><div class='p-total'>共  <b>"+num+"</b> 件商品　共计￥<strong id='totalPrice1' style='font-size: 16px; color: #ff5555;'>"+price+"</strong></div>";
                    str+="<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods' class='Shopping'>去购物车结算</a></div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(num);
                }else{
                    var str='';
                    str+="<div class='spacer'></div><div class='prompt'></div><div class='nogoods'  style='height: 69px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $(".dorpdown-layer").html(str);
                    $("#shopping-amount").text(0);
                }
            })
        }
        getMyCart();

        //中文字符串的截取  str字符串  len长度  hasDot所要追加的内容
        function subString(str, len, hasDot)
        {
            var newLength = 0;
            var newStr = "";
            var chineseRegex = /[^\x00-\xff]/g;
            var singleChar = "";
            var strLength = str.replace(chineseRegex,"**").length;
            for(var i = 0;i < strLength;i++)
            {
                singleChar = str.charAt(i).toString();
                if(singleChar.match(chineseRegex) != null)
                {
                    newLength += 2;
                }
                else
                {
                    newLength++;
                }
                if(newLength > len)
                {
                    break;
                }
                newStr += singleChar;
            }

            if(hasDot && strLength > len)
            {
                newStr += "...";
            }
            return newStr;
        }








        $.get("<?php echo U('Index/left');?>",'',function(res){
            if(res.status==1){
                var str='';
                for(var i in res.info){
                    str+="<li><a href='<?php echo U('Detail/detail');?>?id="+res.info[i]['gid']+"' title='"+res.info[i]['goodsname']+"'>"+subString(res.info[i]['goodsname'],25,'...')+"</a></li>";
                }
                $(".recommend").html(str);
            }
        })



    })

    delCart=function(gid){
        $.post("<?php echo U('Cart/delCart');?>",{gid:gid},function(res){
            if (res.status==1) {
                layer.msg('移除成功',{time:1000,icon:1},function(){
                    getMyCart();
                    refreshCart();
                    getMyCart1();
                });
            }else{
                layer.msg('移除失败',{time:1000,icon:2},function(){
                    getMyCart();
                    refreshCart();
                    getMyCart1();
                });
            }
        })
    }

</script>


<script type="text/javascript">
    $(function(){
        $.get("<?php echo U('MemberMessage/index');?>",'',function(res){
            if(res.status==1){
                $("#msgNum").text(res.info);
                layer.tips("<a style='cursor:pointer;color:black;' href='"+"<?php echo U('UserCenter/usermsg');?>"+"'>"+"您有"+res.info+"条消息未读，点击查看"+"</a>", '.msg', {
                    tips: 3
                    ,time:10000000000
                });
            }else{
                $("#msgNum").text("0");
            }
        });
    })
</script>
<!--导航栏样式-->

<!--用户中心(地址管理界面)-->
<div class="user_style clearfix" id="user">
<div class="user_title"><em></em>用户中心</div>
 <div class="clearfix user" >
   <!--左侧菜单栏样式-->
     <div class="user_left">
         <?php if(!isset($_SESSION['avatar1'])): ?><div class="user_info">
                 <div class="Head_portrait"><a href="<?php echo U('UserCenter/usercenter');?>"><img src="/Public/Home/images/deavatar.jpg"   style="width:100px; height:100px;border-radius: 50px"/></a><!--头像区域--></div>
                 <div class="user_name">用户<?php echo (session('ybc_username')); ?><!--<a href="#">[个人资料]</a>--></div>
             </div>
             <?php else: ?>
             <div class="user_info">
                 <div class="Head_portrait"><a href="<?php echo U('UserCenter/usercenter');?>"><img src="/Uploads/avatar/100/100_<?php echo (session('avatar1')); ?>"  width="100px" height="100px"/></a><!--头像区域--></div>
                 <div class="user_name">用户<?php echo (session('ybc_username')); ?><!--<a href="#">[个人资料]</a>--></div>
             </div><?php endif; ?>
      <ul class="Section">
          <li><a href="<?php echo U('UserCenter/userinfo');?>"><em></em><span>个人信息</span></a></li>
          <li><a href="<?php echo U('UserCenter/changepassword');?>"><em></em><span>修改密码</span></a></li>
          <li><a href="<?php echo U('Order/myOrderList');?>"><em></em><span>我的订单</span></a></li>
          <li><a href="<?php echo U('UserCenter/myComment');?>"><em></em><span>我的评价</span></a></li>
          <li><a href="<?php echo U('UserCenter/userintegral');?>"><em></em><span>我的积分</span></a></li>
          <li><a href="<?php echo U('UserCenter/usermsg');?>"><em></em><span>我的消息</span></a></li>
          <li><a href="<?php echo U('UserCenter/myCollect');?>"><em></em><span>我的收藏</span></a></li>
          <li><a href="<?php echo U('Order/myAddress');?>"><em></em><span>收货地址管理</span></a></li>
          <li><a href="<?php echo U('Order/history');?>"><em></em><span>已购买的商品</span></a></li>
      </ul>
    </div>

    <!--右侧内容样式-->
    <div class="right_style r_user_style">
      <div class="user_Borders">
       <div class="title_name">
        <span class="name">地址管理</span>
       </div>
       <div class="about_user_info">
         <form id="form1" name="form1" method="post" action="">
       <div class="user_layout">
         <ul>
             <input type="hidden" name="id" value="<?php echo ($ai); ?>"/>
          <li class="li"><label class="user_title_name">收件人姓名：</label><input name="name" type="text" value="<?php echo ($address["name"]); ?>" class="add_text"><i>*</i></li>
          <li class="li"><label class="user_title_name">选择地址：</label>
              <div class="add_text" style="float: left; border: 0px; padding: 0px;" >
                  <select class="select" name="province" id="s1" style="margin: 0px;width: 80px; border-color: #ccc; border-radius: 0px;">
                      <option></option>
                  </select>
                  <select class="select" name="city" id="s2" style="margin: 0px; margin-left: 9px; width: 80px; border-color: #ccc; border-radius: 0px;">
                      <option></option>
                  </select>
                  <select class="select" name="town" id="s3" style="margin: 0px; margin-left: 9px; width: 80px; border-color: #ccc; border-radius: 0px;">
                      <option></option>
                  </select>
              </div>
              <i>*</i>
        </li >
          <li class="li"><label class="user_title_name">详细地址：</label><input name="address" value="<?php echo ($address["address"]); ?>" type="text" class="add_text"><i>*</i></li>
          <li class="li"><label class="user_title_name">邮&nbsp;&nbsp;&nbsp;编：</label><input name="postcode" value="<?php echo ($address["postcode"]); ?>" type="text" class="add_text"><i>*</i></li>
          <li class="li"><label class="user_title_name">手&nbsp;机&nbsp;号：</label><input name="phone" value="<?php echo ($address["phone"]); ?>" type="text" class="add_text"><i>*</i></li>
         </ul>
           <?php if($ac == c): ?><div class="operating_btn"><input id="submit_btn1" type="button" style="width: 300px;" value="确认修改" class="submit—btn"></div>
                <?php else: ?>
               <div class="operating_btn"><input id="submit_btn2" type="button" style="width: 300px;" value="确认添加" class="submit—btn"></div><?php endif; ?>
         </div>
          </form>       
       </div>
       <!--地址列表-->
       <div class="Address_List">
        <div class="title_name"><span class="name">用户地址列表</span></div>
        <div class="list">
         <table>
         <thead>
          <td class="list_name_title0">收件人姓名</td>
          <td class="list_name_title1">收货地址</td>
          <td class="list_name_title2">电话</td>
          <td class="list_name_title3">邮政编码</td>
          <td class="list_name_title5">操作</td>
         </thead>
             <?php if(empty($addrList)): ?><tr><td colspan="5"><h2 style="color:red;">你还没有任何地址信息</h2></td></tr><?php endif; ?>
        <?php if(is_array($addrList)): $i = 0; $__LIST__ = $addrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><tr>
              <?php if(($va["def"]) == "1"): ?><td style="background-image: url('/Public/Home/images/def.png');background-repeat: no-repeat;"><?php echo ($va["name"]); ?></td>
                <?php else: ?>
                  <td><?php echo ($va["name"]); ?></td><?php endif; ?>
              <td><?php echo ($va["address"]); ?></td>
              <td><?php echo ($va["phone"]); ?></td>
              <td><?php echo ($va["postcode"]); ?></td>
              <td>
                  <a href="<?php echo U('myAddress');?>?ac=c&ai=<?php echo ($va["id"]); ?>">修改</a>
                  <a onclick="del(<?php echo ($va["id"]); ?>)" style="cursor: pointer">删除</a>
                  <?php if(($va["def"]) != "1"): ?><a onclick="def(<?php echo ($va["id"]); ?>)" style="cursor: pointer">设为默认</a><?php endif; ?>
              </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
         </table>
        </div>
       </div>
      </div>
   </div>
 </div>
</div>
<div class="footerbox">
    <!--友情链接-->
    <div class="Links">
        <div class="link_title">友情链接</div>
        <div class="link_address"><a href="http://www.t0001.com/" target="_blank">河南茶叶协会</a>  <a href="http://news.t0001.com/" target="_blank">茶叶咨询频道</a>  <a href="http://news.t0001.com/" target="_blank">茶叶动态频道</a> <a href="http://news.t0001.com/" target="_blank">名家紫砂馆 </a>   <a href="http://news.t0001.com/" target="_blank">中国茶友会频道</a> <a href="http://news.t0001.com/" target="_blank">茶叶论坛</a> <a href="http://news.t0001.com/" target="_blank">茶叶大全</a></div>
    </div>
</div>
<div class="footer">
    <div class="streak"></div>
    <div class="footerbox clearfix">
        <div class="left_footer">
            <div class="img"><img src="/Public/Home/images/img_33.png" /></div>
            <div class="phone">
                <h2>服务咨询电话</h2>
                <p class="Numbers">400-3455-334</p>
            </div>
        </div>
        <div class="right_footer">
            <dl>
                <dt><em class="icon_img"></em>购物指南</dt>
                <dd><a href="#">怎样购物</a></dd>
                <dd><a href="#">积分政策</a></dd>
                <dd><a href="#">会员优惠</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">快递资费及送达时间</a></dd>
                <dd><a href="#">快递覆盖地区查询</a></dd>
                <dd><a href="#">验货与签收</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">货到付款</a></dd>
                <dd><a href="#">支付宝</a></dd>
                <dd><a href="#">财付通</a></dd>
                <dd><a href="#">网银支付</a></dd>
                <dd><a href="#">银联支付</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>售后服务</dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">退换货要求与运费规则</a></dd>
                <dd><a href="#">退换货流程</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>关于我们</dt>
                <dd><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
    </div>
    <div class="slogen">
        <div class="footerbox clearfix ">
            <ul class="wrap">
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_02.png" data-bd-imgshare-binded="1"></a>
                    <b>正品保证</b>
                    <span>正品行货 放心选购</span>
                </li>
                <li><a href="#"><img src="/Public/Home/images/icon_img_03.png" data-bd-imgshare-binded="2"></a>
                    <b>满68元包邮</b>
                    <span>购物满68元，免费快递</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_04.png" data-bd-imgshare-binded="3"></a>
                    <b>厂家直供</b>
                    <span>价格更低，质量更可靠</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_05.png" data-bd-imgshare-binded="4"></a>
                    <b>权威认证</b>
                    <span>政府扶持单位，安全保证</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="footerbox Copyright">
        <p><a href="<?php echo U('Index/guanyuwomen');?>">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
        <p>Copyright 2010 - 2016 巴山雀舌 河南巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
        <p>豫ICP备10200063号-1</p>
        <a href="#" class="return_img"></a>
    </div>
</div>
</body>
</html>