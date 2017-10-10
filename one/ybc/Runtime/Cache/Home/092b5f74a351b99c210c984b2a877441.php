<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/slide.js"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.foucs.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.downCount.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<!--[if IE 7]>
<link rel="stylesheet" href="assets//Public/Home/css/font-awesome-ie7.min.css">

<![endif]-->
<title>商品团购</title>
</head>
<script type="text/javascript">
    $(function(){
        $('img').lazyload({
            effect:"fadeIn"
        })
    })
</script>
<script type="text/javascript">
    $(function(){
        apply=function(id){
            $.get("<?php echo U('check');?>",'',function(res){
                if(res.status==1){
                    $.get("<?php echo U('apply');?>",{id:id},function(res1){
                        if(res1.status==1){
                            layer.confirm('报名成功,你需要设置提醒吗？',{
                                btn:['需要','不需要'],
                                title:'温馨提示'
                            },function(){
                                $.get("<?php echo U('chkMail');?>",{"gid":res1.info},function(res2){
                                  if(res2.status==1){
                                      layer.msg(res2.info,{icon:6,time:3000})
                                  }else{
                                      layer.msg(res2.info,{icon:6,time:2000},function(){
                                          location="<?php echo U('UserCenter/userinfo');?>";
                                      });

                                  }
                                })
                            })
                        }else{
                            layer.msg(res1.info,{icon:6,time:2000});
                        }
                    })
                }else{
                    layer.msg(res.info,{icon:6,time:1000},function(){
                        location.href="<?php echo U('Home/Login/login');?>";
                    })
                }
            })
        }
        toCollect=function(gid){
            $.post("<?php echo U('Detail/toCollect');?>",{gid:gid},function(res){
                if(res.status==1){
                    layer.msg(res.info,{time:1000,icon:1});
                    str="clt"+gid;
                    str1='';
                    str1+='<img onclick="toCollect('+gid+')" src="/Public/Home/images/heart2.png" class="heart2" style="cursor: pointer;"/>';
                    $('#'+str).html(str1);
                }else{
                    layer.msg(res.info,{time:1000,icon:6})
                }
            })
        }
        outCollect=function(gid){
            $.post("<?php echo U('Detail/outCollect');?>",{gid:gid},function(res){
                if(res.status==1){
                    layer.msg(res.info,{time:1000,icon:1});
                    str="clt"+gid;
                    str1='';
                    str1+='<img onclick="toCollect('+gid+')" src="/Public/Home/images/heart1.png" class="heart1" style="cursor: pointer;"/>';
                    $('#'+str).html(str1);
                }else{
                    layer.msg(res.info,{time:1000,icon:6})
                }
            })
        }
        noLogin=function(){
            layer.msg('登陆后您才能收藏哦',{time:1000,icon:6});
        }
    })
</script>
<body>
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
<script type="text/javascript">
    $(function(){
        getMyCart1=function(){
            $.post("<?php echo U('Cart/getMyCart');?>",'',function(res){
                if(res.status==1){
                    var str='';
                    var num=0;
                    var price=0;
                    str+="<div class='mycart' style='font-size: 15px;color: #008800;height: 29px;'><b>我的购物车</b></div><ul class='p_s_list' style='overflow: auto;max-height: 272px;margin-bottom: 40px;'>";
                    for(var i in res.info){
                        num+=parseInt(res['info'][i]['buynum']);
                        price+=(parseInt(res['info'][i]['buynum'])*parseInt(res['info'][i]['price']));
                        str+="<li class='goodsList' style='height: 60px;'><div class='img' style='float: left;margin-left: 6px;'><img style='width:55px;height:55px' src='/Uploads/goodsPic/100/100_"+res['info'][i]['pic']+"'></div>";
                        str+="<div class='content' style='float: left;width: 120px;height: 60px;'><p class='goodsNames' style='float: left;margin-left: 6px;color: lightslategray;height: 22px'>产品名称：</p><p class='goodsName' style='float: left;margin-left: 9px;margin-top: 5px;height: 22px'>";
                        str+="<a href='<?php echo U('Home/Detail/detail');?>?id="+res['info'][i]['id']+"' title="+res['info'][i]['goodsname']+">";
                        str+=res['info'][i]['goodsname'].substring(0,9);
                        str+=" </a></p></div>";
                        str+="<div class='Operations' style='float: right;height: 60px;'> <p class='Price' style='color: lightslategray;height: 22px'>￥<span class='singlePrice'>";
                        str+=res['info'][i]['price'];
                        str+="</span>   x   <span class='buyNums1'>";
                        str+=res['info'][i]['buynum'];
                        str+="</span><p><a class='del1' onclick='delCart("+res['info'][i]['id']+");' style='cursor: pointer'>移除</a></p></div> </li><hr/>";
                    }
                    str+="<ul/>";
                    str+="<div class='Shopping_style' style='position: absolute;width: 280px;height: 34px;line-height: 34px;'><div class='p-total' style='float: left;margin-left: 5px'>共  <b>"+num+"</b> 件商品　共计￥<b class='tPrice' id='totalPrice2' style='font-size: 16px; color: #ff5555;'>"+price+"</b></div>";
                    str+="<a href='<?php echo U('Cart/cart');?>' id='btn-payforgoods1' class='Shopping' style='height:22px;line-height:22px;font-size:10px;margin-top:10px;margin-right:10px;float:right;background-color:#008800;color:#fff0f0;border-radius:2px'>去购物车结算</a></div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(num);
                }else{
                    var str='';
                    str+="<div class='message' style='height: 83px;'><b></b>购物车中还没有商品，赶紧选购吧！</div>";
                    $("#cartGoods").html(str);
                    $("#cartBox-num").text(0);
                }
            })
        }
        getMyCart1();
    });
</script>
<div class="fixedBox">
    <ul class="fixedBoxList">
        <?php if(isset($_SESSION['ybc_id'])): ?><li class="fixeBoxLi user"><a href="<?php echo U('UserCenter/usercenter');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li>
            <?php else: ?>
            <li class="fixeBoxLi user"><a href="<?php echo U('Login/login');?>"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li><?php endif; ?>

        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart" id="cartBox-num">0</p>
            <a href="<?php echo U('Cart/cart');?>"><span class="fixeBoxSpan"></span> <strong>购物车</strong></a>
            <div class="cartBox" id="cartGoods">
                <span class="mycart"><b>我的购物车</b></span>
                <div class="message">购物车内暂无商品，赶紧选购吧</div>
            </div>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服1</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=781075774&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:781075774:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
                <dl onclick="javascript:;">
                    <dt><img src="/Uploads/public/kefu1.png" width="60" height="60"></dt>
                    <dd><strong>QQ客服2</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=872233743&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:872233743:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></p>
                    </dd>
                </dl>
            </div>
        </li>

        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartbox">
            <span class="fixeBoxSpan"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="QR_code">
                    <p><img src="/Uploads/public/erweima.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <p>微信扫一扫，关注我们</p>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi Home" id="collectLi">
            <a href="<?php echo U('UserCenter/myCollect');?>"> <span class="fixeBoxSpan"></span> <strong>收藏</strong></a>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>
    <!--购物车-->
<!-----------------------广告循环-------------------->
<div style="height:472px; width:100%; background-position:center">

    <style type="text/css">
        /* css 重置 */
        *{margin:0; padding:0; list-style:none; }
        body{ background:#fff; font:normal 12px/22px 宋体;  }
        img{ border:0;  }
        a{ text-decoration:none; color:#333;  }
        /* 本例子css */
        .slideBox{ width:100%; height:472px; overflow:hidden; position:relative;}
        .slideBox .hd{ height:15px; overflow:hidden; position:absolute; right:5px; bottom:5px; z-index:1; }
        .slideBox .hd ul{ overflow:hidden; zoom:1; float:left;  }
        .slideBox .hd ul li{ float:left; margin-right:2px;  width:15px; height:15px; line-height:14px; text-align:center; background:#fff; cursor:pointer; }
        .slideBox .hd ul li.on{ background:#f00; color:#fff; }
        .slideBox .bd{ position:relative; height:100%; z-index:0;   }
        .slideBox .bd li{ zoom:1; vertical-align:middle; }  .slideBox .bd img{ width:100%; height:472px; display:block;  }
    </style>
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul><li>1</li><li>2</li><li>3</li></ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($groupAd)): $i = 0; $__LIST__ = $groupAd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" target="_blank"><img src="/Uploads/goodsPic/<?php echo ($val["adpic"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true,interTime:2000});
    </script>
</div>
<!--位置-->
<div class="Bread_crumbs">
 <div class="Inside_pages clearfix">
   <div class="left">当前位置：<a href="#">今日团购</a></div>
 </div>
</div>

<!--团购样式-->
<div class="Inside_pages clearfix">
 <div class="Group_buy">
    <div class="Group_title"><em></em>今日团购<span>GROUP-BUYING</span></div>
    <div class="Group_list clearfix">
     <div class="left_Group">


         <?php if(is_array($leftInfo)): $k = 0; $__LIST__ = $leftInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><div class="Group_prodcut">
      <div class="clearfix">
       <div class="Group_info">
         <ul>
          <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><li class="Group_p_name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...
          <?php elseif($val['groupnum'] > $val['applynum']): ?>
              <li class="Group_p_name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...
          <?php else: ?>
              <li class="Group_p_name"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...</a><?php endif; ?>
     <!--收藏-->
             <span id="clt<?php echo ($val['gid']); ?>">
             <?php if($loginStatus): if(empty($val['collect'])): ?><img src="/Public/Home/images/heart1.png" class="heart1" style="cursor: pointer;" onclick="toCollect(<?php echo ($val['gid']); ?>)"/>
                 <?php else: ?>
                     <img src="/Public/Home/images/heart2.png" class="heart2" style="cursor: pointer;" onclick="outCollect(<?php echo ($val['gid']); ?>)"/><?php endif; ?>
             <?php else: ?>
                 <img src="/Public/Home/images/heart1.png" class="heart3" style="cursor: pointer;" onclick="noLogin()"/><?php endif; ?>
             </span>
         </li>
          <li class="Group_p_about">品牌：<?php echo ($val["brand"]); ?></li>
          <li>规格：<?php echo ($val["weight"]); ?>(克/个)</Li>
          <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($val["price"]); ?>.00</span> <span class="Group_List">原价：<?php echo ($val["oldprice"]); ?></span></li>
          <li class="Group_p_buy">
           <span class="Group_Number" style="color:red"><em></em>开团还需<?php echo ($val['groupnum']); ?>人</span>

              <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><span class="Group_button right">
                      <a style="cursor: pointer;background: #ccc; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">暂时无法购买</a></span>
                  <?php elseif($val['groupnum'] > $val['applynum']): ?>
                  <span class="Group_button right">
                      <a onclick="javascript:apply(<?php echo ($val['id']); ?>);" style="cursor: pointer;background: red; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">立即报名</a></span>
                  <?php else: ?>
                  <span class="Group_button right"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" class="buy_button"></a></span><?php endif; ?>

          </li>
         </ul>
       </div>

       <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><div class="Group_img"><a style="cursor: pointer"><img class="lazy" data-original="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.gif"  height="195" width="326"/></a></div>
           <?php elseif($val['groupnum'] > $val['applynum']): ?>
           <div class="Group_img"><a style="cursor: pointer"><img class="lazy" data-original="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.gif"  height="195" width="326"/></a></div>
           <?php else: ?>
           <div class="Group_img"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>"><img class="lazy" data-original="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.gif"  height="195" width="326"/></a></div><?php endif; ?>


       </div>

          <?php if($val['startime'] > $nowtime): ?><div class="Group_time" >
                  <em></em><span style="position: relative;left:-55px;">距离<span style="color: red;font-size: 20px;">开始</span>还有</span>
                  <ul class="countdown k<?php echo ($k); ?>" >
                      <li> <span class="days" >00</span></li>
                      <li class="seperator">天</li>
                      <li> <span class="hours">00</span></li>
                      <li class="seperator">小时</li>
                      <li> <span class="minutes">00</span></li>
                      <li class="seperator">分</li>
                      <li> <span class="seconds">00</span></li>
                  </ul>
                  <script type="text/javascript">
                      var k="<?php echo (date('Y-m-d',$val["startime"])); ?>";
                      $(".k<?php echo ($k); ?>").downCount({
                          date: k,
                          offset: +8
                      }, function () {
                          alert('倒计时结束!');
                      });
                  </script>
              </div>
            <?php elseif($val['endtime'] < $nowtime): ?>
              <div class="Group_time">
                  <span style="color:#b8b8ad;">活动已经结束，下次再见！</span>
              </div>
            <?php else: ?>
              <div class="Group_time" >
                  <em></em><span style="position: relative;left:-55px;">距离<span style="color: red;font-size: 20px;">结束</span>还有</span>
                  <ul class="countdown d<?php echo ($k); ?>" >
                      <li> <span class="days" >00</span></li>
                      <li class="seperator">天</li>
                      <li> <span class="hours">00</span></li>
                      <li class="seperator">小时</li>
                      <li> <span class="minutes">00</span></li>
                      <li class="seperator">分</li>
                      <li> <span class="seconds">00</span></li>
                  </ul>
                  <script type="text/javascript">
                      var k="<?php echo (date('Y-m-d',$val["endtime"])); ?>";
                      $(".d<?php echo ($k); ?>").downCount({
                          date: k,
                          offset: +8
                      }, function () {
                          alert('倒计时结束!');
                      });
                  </script>
              </div><?php endif; ?>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>



     </div>



     <!--右侧团购样式-->
     <div class="right_Group">


        <!----------------------主要推荐团购位置--------------------------->


         <?php if(is_array($mainInfo)): $k = 0; $__LIST__ = $mainInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><div class="right_Group_p_style">
       <div class="clearfix">
        <div class="left_Group_name">
         <ul>
             <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><li class="Group_p_name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...
                 <?php elseif($val['groupnum'] > $val['applynum']): ?>
                 <li class="Group_p_name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...
                 <?php else: ?>
                 <li class="Group_p_name"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...</a><?php endif; ?>
         <span  id="clt<?php echo ($val['gid']); ?>">
             <?php if($loginStatus): if(empty($val['collect'])): ?><img src="/Public/Home/images/heart1.png" class="heart1" style="cursor: pointer;" onclick="toCollect(<?php echo ($val['gid']); ?>)"/>
                     <?php else: ?>
                     <img src="/Public/Home/images/heart2.png" class="heart2" style="cursor: pointer;" onclick="outCollect(<?php echo ($val['gid']); ?>)"/><?php endif; ?>
                 <?php else: ?>
                 <img src="/Public/Home/images/heart1.png" class="heart3" style="cursor: pointer;" onclick="noLogin()"/><?php endif; ?>
        </span>
         </li>
          <li class="Group_p_about">品牌：<?php echo ($val["brand"]); ?></li>
          <Li class="spacing">规格：<?php echo ($val["weight"]); ?>(克/个)</Li>
          <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($val["price"]); ?>.00</span> <span class="Group_List">原价：<?php echo ($val["oldprice"]); ?></span></li>
          <li class="Group_p_buy">
           <span class="Group_Number" style="color:red"><em></em>开团还需<?php echo ($val['groupnum']); ?>人</span>


              <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><span class="Group_button right">
                      <a style="cursor: pointer;background: #ccc; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">暂时无法购买</a></span>
                  <?php elseif($val['groupnum'] > $val['applynum']): ?>
                  <span class="Group_button right">
                      <a onclick="javascript:apply(<?php echo ($val['id']); ?>);" style="cursor: pointer;background: red; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">立即报名</a></span>
                  <?php else: ?>
                  <span class="Group_button right"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" class="buy_button"></a></span><?php endif; ?>

          </li>
         </ul>
        </div>

           <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><div class="Group_img"><a style="cursor: pointer"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="370" width="326"/></a></div>
               <?php elseif($val['groupnum'] > $val['applynum']): ?>
               <div class="Group_img"><a style="cursor: pointer"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="370" width="326"/></a></div>
               <?php else: ?>
           <div class="Group_img"><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="370" width="326"/></a></div><?php endif; ?>


       </div>

         <?php if($val['startime'] > $nowtime): ?><div class="Group_time" >
                 <em></em><span style="position: relative;left:-55px;">距离<span style="color: #f60011;font-size: 20px;">开始</span>还有</span>
                 <ul class="countdown s<?php echo ($k); ?>" >
                     <li> <span class="days" >00</span></li>
                     <li class="seperator">天</li>
                     <li> <span class="hours">00</span></li>
                     <li class="seperator">小时</li>
                     <li> <span class="minutes">00</span></li>
                     <li class="seperator">分</li>
                     <li> <span class="seconds">00</span></li>
                 </ul>
                 <script type="text/javascript">
                     var k="<?php echo (date('Y-m-d',$val["startime"])); ?>";
                     $(".s<?php echo ($k); ?>").downCount({
                         date: k,
                         offset: +8
                     }, function () {

                     });
                 </script>
             </div>
             <?php elseif($val['endtime'] < $nowtime): ?>
             <div class="Group_time">
                 <span style="color:#b8b8ad;">活动已经结束，下次再见！</span>
             </div>
             <?php else: ?>
             <div class="Group_time" >
                 <em></em><span style="position: relative;left:-55px;">距离<span style="color: red;font-size: 20px;">结束</span>还有</span>
                 <ul class="countdown m<?php echo ($k); ?>" >
                     <li> <span class="days" >00</span></li>
                     <li class="seperator">天</li>
                     <li> <span class="hours">00</span></li>
                     <li class="seperator">小时</li>
                     <li> <span class="minutes">00</span></li>
                     <li class="seperator">分</li>
                     <li> <span class="seconds">00</span></li>
                 </ul>
                 <script type="text/javascript">
                     var k="<?php echo (date('Y-m-d',$val["endtime"])); ?>";
                     $(".m<?php echo ($k); ?>").downCount({
                         date: k,
                         offset: +8
                     }, function () {

                     });
                 </script>
             </div><?php endif; ?>
     </div><?php endforeach; endif; else: echo "" ;endif; ?>


     <!--团购列表-->
     <div class="other_Group clearfix">
         <?php if(is_array($rightInfo)): $k = 0; $__LIST__ = $rightInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><div class="g_p_list">
             <div class="g_p_style">
                 <div class="g_p_img">

                     <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><a style="cursor: pointer;"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="220" width="254"/></a>
                         <?php elseif($val['groupnum'] > $val['applynum']): ?>
                         <a style="cursor: pointer;"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="220" width="254"/></a>
                         <?php else: ?>
                         <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>"><img src="/Uploads/goodsPic/<?php echo ($val["pic"]); ?>"   height="220" width="254"/></a><?php endif; ?>


                     
                 </div>
                 <ul>
                     <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><li><a  class="name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...</a>
                         <?php elseif($val['groupnum'] > $val['applynum']): ?>
                         <li><a  class="name" style="color: #693;font-size: 18px;cursor: pointer;;" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...</a>
                         <?php else: ?>
                         <li><a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" class="name" title="<?php echo ($val["goodsname"]); ?>"><?php echo (truncate_cn($val["goodsname"],20,'',0)); ?>...</a><?php endif; ?>
                     <span id="clt<?php echo ($val['gid']); ?>">
                     <?php if($loginStatus): if(empty($val['collect'])): ?><img src="/Public/Home/images/heart1.png" class="heart1" style="cursor: pointer;" onclick="toCollect(<?php echo ($val['gid']); ?>)"/>
                             <?php else: ?>
                             <img src="/Public/Home/images/heart2.png" class="heart2" style="cursor: pointer;" onclick="outCollect(<?php echo ($val['gid']); ?>)"/><?php endif; ?>
                         <?php else: ?>
                         <img src="/Public/Home/images/heart1.png" class="heart3" style="cursor: pointer;" onclick="noLogin()"/><?php endif; ?>
                     </span>
                     </li>
                     <li>品牌：<?php echo ($val["brand"]); ?></li>
                     <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($val["price"]); ?>.00</span> <span class="Group_List" style="color:orangered">开团还需<?php echo ($val['groupnum']); ?>人</span></li>
                     <li class="Group_p_buy">


                         <span class="Group_button right">
                         <?php if(($val['startime'] > $nowtime) OR ($val['endtime'] < $nowtime)): ?><a style="cursor: pointer;background: #ccc; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">暂时无法购买</a>
                             <?php elseif($val['groupnum'] > $val['applynum']): ?>
                             <a onclick="javascript:apply(<?php echo ($val['id']); ?>);" style="cursor: pointer;background: red; border-radius: 5px;line-height: 32px;text-align: center;font-size: 14px;color: #ffffff" class="buy_button">立即报名</a></span>
                         <?php else: ?>
                             <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($val["gid"]); ?>" class="buy_button"></a><?php endif; ?>
                         </span>


                     </li>
                 </ul>

                <!---------------倒计时----------->

                 <?php if($val['startime'] > $nowtime): ?><ul class="rightDown rt<?php echo ($k); ?>" >
                         <li>客官莫急，活动尚未开始！</li>
                     </ul>
                     <?php elseif($val['endtime'] < $nowtime): ?>
                     <ul class="rightDown rt<?php echo ($k); ?>" >
                         <li>客官来晚啦，活动结束啦！</li>
                     </ul>
                     <?php else: ?>
                     <ul class="rightDown rt<?php echo ($k); ?>" style="color:red" >
                         <li> <span class="days" >00</span></li>
                         <li class="seperator">天</li>
                         <li> <span class="hours">00</span></li>
                         <li class="seperator">小时</li>
                         <li> <span class="minutes">00</span></li>
                         <li class="seperator">分</li>
                         <li> <span class="seconds">00</span></li>
                     </ul>
                     <script type="text/javascript">
                         var k="<?php echo (date('Y-m-d',$val["endtime"])); ?>";
                         $(".rt<?php echo ($k); ?>").downCount({
                             date: k,
                             offset: +8
                         }, function () {

                         });
                     </script><?php endif; ?>

             </div>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>


       <!---->
     </div>
     </div>
    </div>
 
</div>

    <!--友情链接-->

</div>
<!--底部样式-->
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