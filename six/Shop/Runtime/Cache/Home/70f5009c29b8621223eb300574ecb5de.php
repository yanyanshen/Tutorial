<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jqzoom.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
<!--<script src="/Shop/Public/Home/js/payfor.js" type="text/javascript"></script>-->
<script src="/Shop/Public/Home/js/layer/layer.js"></script>
    <link href="/Shop/Public/Home/css/loginDialog.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Shop/Public/Home/css/goods.css" type="text/css">
    <link rel="stylesheet" href="/Shop/Public/Home/css/common.css" type="text/css">
    <link rel="stylesheet" href="/Shop/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="/Shop/Public/Home/css/global.css" type="text/css">
    <title>产品名称详细页</title>
    <style>
        .huifu{margin-top: 20px;color: orange;padding-top: 10px;border-top: 1px #c6d8d8 solid}
        .no{
            display: inline-block;text-align: center;line-height: 50px;width: 150px;height:50px;
            background-color: #e8e8e8;
            font-size: 20px;
            border-radius: 6px;
            box-shadow: -3px -3px 5px #cbd1cf inset;
            margin-left: 20px;
            cursor: pointer;
        }
    </style>

    <script>
        $(function(){

            $(".example").click(function(){
                $("input[name='allprice']").val($("#buy-num").val());
                if(<?php echo ((isset($_SESSION["uid"]) && ($_SESSION["uid"] !== ""))?($_SESSION["uid"]):"false"); ?>){
                //$("#ECS_FORMBUY").submit();
                $.post("<?php echo U('cart/d_cart');?>",$("#ECS_FORMBUY").serialize(),function(res){
                    if(res.status!=0){
                        location.href="<?php echo U('Orders/orders');?>?id="+ res.info
                    }else{
                        layer.alert(res.info)
                    }
                },'json')
            }else{
                //弹出登录
                $("body").append("<div id='mask'></div>");

                $("#remind").html("");
                $("#txtName").val("");
                $("#txtPwd").val("");
                $("#mask").addClass("mask").fadeIn("slow");
                $("#LoginBox").fadeIn("slow");


                //文本框不允许为空---按钮触发
                $("#loginbtn").on('click', function () {
                    var txtName = $("#txtName").val();
                    var txtPwd = $("#txtPwd").val();
                    if (txtName == "" || txtName == undefined || txtName == null) {
                        if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
                            $(".warning").css({ display: 'block' });
                        }
                        else {
                            $("#warn").css({ display: 'block' });
                            $("#warn2").css({ display: 'none' });
                        }
                    }
                    else {
                        if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
                            $("#warn").css({ display: 'none' });
                            $(".warn2").css({ display: 'block' });
                        }
                        else {
                            $(".warning").css({ display: 'none' });
                        }
                    }
                });
                //文本框不允许为空---单个文本触发
                $("#txtName").on('blur', function () {
                    var txtName = $("#txtName").val();
                    if (txtName == "" || txtName == undefined || txtName == null) {
                        $("#warn").css({ display: 'block' });
                    }
                    else {
                        $("#warn").css({ display: 'none' });
                    }
                });
                $("#txtName").on('focus', function () {
                    $("#warn").css({ display: 'none' });
                });
                //
                $("#txtPwd").on('blur', function () {
                    var txtName = $("#txtPwd").val();
                    if (txtName == "" || txtName == undefined || txtName == null) {
                        $("#warn2").css({ display: 'block' });
                    }
                    else {
                        $("#warn2").css({ display: 'none' });
                    }
                });
                $("#txtPwd").on('focus', function () {
                    $("#warn2").css({ display: 'none' });
                });
                //关闭
                $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
                    $("#LoginBox").fadeOut("fast");
                    $("#mask").css({ display: 'none' });
                });
            }
        })

        $("#loginbtn").click(function(){
            name=$("#txtName").val();
            pwd=$("#txtPwd").val();
            $.post("<?php echo U('Users/login');?>",{username:name,password:pwd},function(res){
                if(res.status){
                    $("#remind").css("color","green");
                    $("#remind").html("登陆成功");
                   // $("#ECS_FORMBUY").submit()
                    $.post("<?php echo U('cart/d_cart');?>",$("#ECS_FORMBUY").serialize(),function(res){
                        if(res.status!=0){
                            location.href="<?php echo U('Orders/orders');?>?id="+ res.info
                        }else{
                            layer.alert(res.info)
                        }
                    },'json')

                }else{
                    $("#remind").css("color","red");
                    $("#remind").html("用户名或密码错误");
                }
            },'json')
        })

        $(".wrap_btn1").click(function(){
            num=$("#buy-num").val();
            id=<?php echo ($goods["id"]); ?>;
            $.post("<?php echo U('Cart/addcart');?>",{gid:id,buynum:num},function(res){
                if(res.status!=0){

                    layer.confirm('商品已成功添加到购物车',{btn:["再逛逛","去购物车"]},function(){
                        location.href="<?php echo U('Index/index');?>";
                    },function(){
                        location.href="<?php echo U('Cart/cart');?>";
                    })
                }else{
                    layer.msg("添加失败");
                }
            },'json')
        })

        })

    </script>

    <script>
        $(function(){

                //选项卡
            $("#property-id").click(function(){
                var str=""
                str+="<ul class='shangpsx_info'>";
                str+="<li><label>所属分类</label><span><?php echo ($goods['cate'][2]['catename']); ?></span></li>";
                str+="<li><label>品牌</label><span><?php echo ($goods['brand']['bname']); ?></span></li>";
                str+="<li><label>价格</label><span>￥<?php echo ($goods['saleprice']); ?>元</span></li>";
                str+="<li><label>简介</label><span><?php echo ($goods['goodsintro']); ?></span></li>";
                str+="</ul>";
                str+='<?php if(is_array($images)): foreach($images as $k=>$val): ?>';
                str+='<img src="/uploads/n0/<?php echo ($val); ?>"/><?php endforeach; endif; ?>';
                $("#shangpsx").html(str);
            });
            $("#shot-id").click(function(){
                var str="";
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>520私库所售商品符合以下情况，自售出之日（以实际收货日期为准）起7日内可以退货，15日内可以换货。</p>";
                str+="<img src='/Shop/Public/Home/imgs/rule1.jpg'>";
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>（一）买卖双方达成退换货协议，或520私库做出退换货处理结果后，商家应当在收到520私库处理结果后的24小时内或者与买家约定的时间内提供退换货地址。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>商家逾期未提供退换货地址的，以其在520私库系统内填写的“默认退货地址”作为退换货地址。<p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>（二）商家提供的退换货地址错误导致买家操作退回商品后无法送达的，商家承担因此产生的运费。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>（三）买家根据协议约定或520私库做出的处理结果操作退换货时，应当使用与商家发货时相同的运输方式发货。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>除非得到收件方的明确同意，发件方不得使用到付方式支付运费。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>退货后，商家有收货的义务。商家提供换货服务并重新发货后，买家有收货义务。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>（四）商品属于“三包”(系指法律法规规定的三包或520私库所在地适用的三包，以下简称“三包规定”)范围内的，买家要求商家履行换货或维修义务的，商家应当按照买家的要求提供相应服务。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>（五）享受“三包规定”保障的商品产生的保障范围内的争议，买家应当在交易成功后的九十天内提出申请。</p>"
                str+="<p style='font-size: 16px;line-height: 33px;text-indent: 33px;letter-spacing: 0.5px'>备注：不影响二次销售细则</p>"
                str+="<img src='/Shop/Public/Home/imgs/rule2.jpg'>";

                $("#shangpsx").html(str);
            });
            $("#coms1-id").click(function(){
                var id=<?php echo ($goods["id"]); ?>;
                var level=0;
                    var str="";
                $.post("<?php echo U('Goods/goodsDetail');?>",{'id':id,'level':level},function(res){

                    $("#shangpsx").html(res);
                })

            });

            $(".collected").click(function(){
                var id=$(this).attr("id");
                var gid=$(this).attr("name").substr(2);
                uid=<?php echo ((isset($_SESSION['uid']) && ($_SESSION['uid'] !== ""))?($_SESSION['uid']):"false"); ?>

            $.post("<?php echo U('Cart/collect');?>",{"gid":gid,"uid":uid},function(res){
                $.post("<?php echo U('Cart/collect_all');?>",{"gid":gid},function(res1){
                    col_num=res1.info
                    if(id==1){
                        $("[name='1_"+gid+"']").html("<em class='ico1'></em>收藏该商品( "+col_num+" )")
                        $("[name='1_"+gid+"']").attr("id",0)
                        $("[name='1_"+gid+"']").toggleClass("collect1")
                        $("[name='1_"+gid+"']").css("color","#999")
                    }else{
                        $("[name='1_"+gid+"']").html("<em class='ico1'></em>收藏该商品( "+col_num+" )")
                        $("[name='1_"+gid+"']").attr("id",1)
                        $("[name='1_"+gid+"']").toggleClass("collect1")
                        $("[name='1_"+gid+"']").css("color","#FF0000")
                    }
                })


                layer.msg(res.info);
            },"json")
        })

        })
        //购物车
    </script>

    <script>

        /** ------------- choose -------------------- **/
        /* reduce_add */
        var setAmount = {
            min:1,
            max:<?php echo ($goods["goodsnum"]); ?>,
            reg:function(x) {
                return new RegExp("^[1-9]\\d*$").test(x);
            },
            amount:function(obj, mode) {
                var x = $(obj).val();
                if (this.reg(x)) {
                    if (mode) {
                        x++;
                    } else {
                        x--;
                    }
                } else {
                    layer.alert('请输入正确的数量', {
                        skin: 'layui-layer-hong'
                        ,closeBtn: 0
                    })
                    $(obj).val(1);
                    $(obj).focus();
                }
                return x;
            },
            reduce:function(obj) {
                var x = this.amount(obj, false);
                if (x >= this.min) {
                    $(obj).val(x);
                    recalc();
                } else {
                    layer.alert('商品数量最少为'+ this.min, {
                        skin: 'layui-layer-hong'
                        ,closeBtn: 0
                    })
                    $(obj).val(1);
                    $(obj).focus();
                }
            },
            add:function(obj) {
                var x = this.amount(obj, true);
                if (x <= this.max) {
                    $(obj).val(x);
                    recalc();
                } else {
                    layer.alert('商品数量最多为'+ this.max, {
                        skin: 'layui-layer-hong'
                        ,closeBtn: 0
                    })
                    $(obj).val(<?php echo ($goods["goodsnum"]); ?>);
                    $(obj).focus();
                }
            },
            modify:function(obj) {
                var x = $(obj).val();
                if (x < this.min || x > this.max || !this.reg(x)) {
                    layer.alert("请输入正确的数量！", {
                        skin: 'layui-layer-hong'
                        ,closeBtn: 0
                    })
                    $(obj).val(1);
                    $(obj).focus();
                }
            }
        }
    </script>
</head>

<body>
<!--顶部样式-->
<style>

    #top .clearfix .zhuce .red {
        color: rgba(179, 12, 9, 0.84);
        padding: 0px 5px;

    }
    .login_btn{
        width:115px; float: left;
    }
    a#out{
        font-size: 14px;
    }
    .login_name{
        float:left;
        font-size: 15px;
        color: red;
    }
</style>
<script type="text/javascript" src="/Shop/Public/Home/js/layer.js"></script>
<script>
    function addFavorite2() {
        var url = window.location;
        var title = document.title;
        var ua = navigator.userAgent.toLowerCase();
        if (ua.indexOf("360se") > -1) {
            alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
        }
        else if (ua.indexOf("msie 8") > -1) {
            window.external.AddToFavoritesBar(url, title); //IE8
        }
        else if (document.all) {
            try{
                window.external.addFavorite(url, title);
            }catch(e){
                alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
            }
        }
        else if (window.sidebar) {
            window.sidebar.addPanel(title, url, "");
        }
        else {
            alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
        }
    }

    //窗口冻结开始
    $(function(){
        headerHeight=$('.div').height();

        $(window).on('scroll',function(){
            var scrHeight=$(window).scrollTop();
            if(scrHeight){

            }
        })
    })
    //窗口冻结结束
</script>

<script language='javascript'>
    function getDiv(){
        var _div = document.getElementsByTagName('div');
        for(var i in _div){
            if(_div[i].className=='time'){
                return _div[i];
            }
        }
    }
    function getText(){
        var _date = new Date();
        var _time = _date.getHours();
        var _text = '';
        if(_time>=6&&_time<9)
            _text = '早上好';
        else if(_time>=9&&_time<11)
            _text = '上午好';
        else if(_time>=11&&_time<13)
            _text = '中午好'
        else if(_time>=13&&_time<17)
            _text = '下午好';
        else
            _text = '晚上好';
        return _text;
    }
    $(function(){
        var winHeight = $(window).height();
        $(window).on('scroll',function(){
            var scTop = $(window).scrollTop();
//        alert(scTop);
            if(scTop>800) {
//            $("#header2").css({display:"block",border:'1px solid red',width: '1689px',padding: '0',marginLeft:'20px',position: 'fixed',top:'0',zIndex: '9999'});
//        }
                $(".div").show(400);
            }
            else{
                $(".div").hide(400);
            }
        })


    })
</script>
<div id="header_top">
    <div class="head">
        <div id="top">
            <div class="Inside_pages">
                <div class="Collection"><div class="time"><script>jQuery('.time').html(getText());</script>,欢迎光临520私库商城！<em></em><a href="#" onclick="javascript:addFavorite2()">收藏我们</a></div></div>
                <div class="hd_top_manu clearfix">
                    <ul class="clearfix">
                        
                        <li class="login_name"><a target="_blank" href="<?php echo U('Member/memberInfo');?>"><?php echo (session('username')); ?></a></li>
                        <?php
 if(isset($_SESSION['uid']) or $_SESSION['uid']>0){ ?>
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            <a id="out" href="<?php echo U('Users/out');?>">[退出]</a>
                            <?php
 }else{ ?>
                        <li class="login_btn"> </a>新用户<a id="show" href="<?php echo U('Users/login');?>" class="red">[登录]</a>
                            <a href="<?php echo U('Users/registered');?>" class="red">[注册]</a></li>
                        <?php
 } ?>
                        <!--<li class="hd_menu_tit" data-addclass="hd_menu_hover"><a target="_self" href="<?php echo U('Member/memberInfo');?>">用户中心</a></li>-->
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Cart/cart');?>" name="show_cart">购物车(<b id="snum">0</b>)</a> </li>
                        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
                        <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="<?php echo U('Index/helper');?>" class="hd_menu">客户服务</a>

                            <div class="hd_menu_list">


                                <ul>
                                    <li><a href="<?php echo U('Index/helper');?>">常见问题</a></li>
                                    <li><a href="<?php echo U('Index/helper');?>">在线退换货</a></li>
                                    <li><a href="<?php echo U('Index/helper');?>">在线投诉</a></li>
                                    <li><a href="<?php echo U('Index/helper');?>">配送范围</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-phone"></em>手机版</a>
                            <div class="hd_menu_list erweima">
                                <ul>
                                    <img src="/Shop/Public/Home/imgs/images/erweima.png"  width="100px" height="100"/>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--样式-->
        <!--顶部样式2-->

        <div id="header "  class="header page_style">
            <div class="logo"><a href="<?php echo U('Index/index');?>"><img src="/Shop/Public/Home/imgs/images/logo.png" /></a></div>
            <!--可修改图层-->
            <!--<div class="festival"><a href="#"><img src="/Shop/Public/Home/imgs/images/logo_yd.png" /></a></div>-->
            <!--结束图层-->
            <div class="Search" style="margin-left: 100px;">
                <form action="<?php echo U('Goods/goodsList');?>" method="get" name="search" id="searchForm">
                    <p><input name="goodsname" type="text"  class="text" id="goodsname" value="<?php echo (session('goodsdetail')); ?>"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>
                    <!-- <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p> -->
                </form>
            </div>
            <!--可修改图层2-->
            <!--<div class="festival1"><a href="#"><img src="/Shop/Public/Home/imgs/images/logo_sd.png" /></a></div>--><!--结束-->
            <!--购物车样式-->
            <div class="hd_Shopping_list" id="Shopping_list">
                <div class="s_cart">
                <em></em><a href="#">我的购物车</a>
              
                    <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i>
               
                </div>
                <div class="dorpdown-layer">
                    <div class="spacer"></div>
                    <div class="prompt"></div>

                    <ul class="p_s_list">
                    </ul>
                    <div class="Shopping_style">
                        <div class="p-total">共<b>1</b>件商品　共计<strong>￥ 515.00</strong></div>
                        <a href="<?php echo U('Goods/shop_cart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".hd_Shopping_list").mouseenter(function(){
            $(this).addClass('hover');
            $.post('<?php echo U("Index/smallcar");?>',function(res){
                var str='';
                var str2='';

                var num=0;
                var totalprice=0;
                
                if(res){
                    for(var i in res){
                    str+='<li>';
                    str+='<div class="img"><img src="/uploads/n1/'+res[i].image+'"></div>';
                    str+='<div class="content"><p><a href="#">'+res[i].goodsname+'</a></p></div>';
                    str+='<div class="Operations">';
                    str+='<p class="Price">￥'+res[i].saleprice+'*'+res[i].buynum+'</p>';
                    str+='<p><a href="javascript:;" name="'+res[i].gid+'" class="ggid">删除</a></p></div>';
                    str+='</li>';
                    num=num+res[i].buynum*1;
                    totalprice=totalprice+(res[i].saleprice*1)*(res[i].buynum*1);
                    }

                    $('.p_s_list').html(str);
                }else{
                    if($(".nogoods").attr("class")){

                    }else{
                    str='<div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>';
                    $('.prompt').after(str);
                    $('.p_s_list').empty();
                    }
                }
                
                str2+='<div class="p-total">共<b>'+num+'</b>件商品　共计<strong>￥ '+totalprice+'</strong></div>';
                str2+='<a href="<?php echo U('Cart/cart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>';
                var coun=document.getElementById('shopping-amount');
                var coun2=document.getElementById('snum');
                coun.innerHTML=num;
                coun2.innerHTML=num;
                $('.Shopping_style').html(str2);
            },'json')

        })
       

        $('.ggid').live('click',function(){
            id=$(this).attr("name")
            $.post("<?php echo U('Cart/cartdel');?>",{gid:id},function(res){
                // alert(res);
                if(res.status>0){
                    layer.msg('删除成功');
                }else{
                    layer.msg('删除失败');
                }
            })
        })
        $(".hd_Shopping_list").mouseleave(function(){
            $(this).removeClass('hover');
            // $('.')
        })
    })

</script>

<!--菜单导航样式-->

<!--//-->
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<style>
    #allSortOuterbox .hd_allsort_out_box_new{
        height: 540px;
    }
    .Menu_list li{
        background: rgb(234,232,233);
    }
    .Menu_list li:hover{
        background:white;
    }
</style>
<script>
    $(function(){
        $(".Category").mouseenter(function(){
            var str='';

            $.get("<?php echo U('Index/fcate');?>",{},function(res){
                for(var i in res){
//                   alert(res[i]['id']);
                    str+="<li class='name' id='"+res[i]['id']+"'>";
                    str+="<div class='Menu_name' style='height: 20px;padding-bottom: 0;line-height: 30px;'>"+"<a href='<?php echo U('Goods/goodsList');?>?id1="+res[i]['id']+"' >"+res[i]['catename']+"</a> <span>&lt;</span></div>";
//                    alert(res[i]['catename']);
                    str+='<div class="link_name" style="padding-bottom: 0;width:190px;height:24px;"><p style="margin-top: 5px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis">';
                    for(var m in res[i]['child']){
                        // alert(res[i]['child'][m]);
                        for(var n in res[i]['child'][m]['c']){


                        str+="<a href='<?php echo U('Goods/goodsDetail');?>?id="+res[i]['child'][m]['c'][n]['id']+"'>"+res[i]['child'][m]['c'][n]['catename']+"</a>";

                    }}
                    str+="</p></div>";
                    str+="<div class='menv_Detail' style='height: 540px;margin-left: 40px;'></div>";
                    str+="</li>";
                }
                //将拼接的字符串写入到相应的标签内
                $(".Menu_list").html(str);

           },'json')
        })
        $(".Category").mouseleave(function(){
            //鼠标移开时，制空
            $(".Menu_list").html();
        })


        //第二级
        $(".name").live({
            mouseenter:function(){
                var str2='';
                var id=$(this).attr("id"); //当鼠标进入该标签时，通过此id可以传值
                $.get("<?php echo U('Index/scate');?>",{id:id},function(res){
                    str2+='<div class="cat_pannel clearfix">';
                    str2+='<div class="hd_sort_list">';
                    for(var i in res[0]){
                        str2+=' <dl class="clearfix" data-tpc="1">';
                            str2+="<dt><a href='<?php echo U("goods/goodsList");?>?id2="+res[0][i]['id']+"'>"+res[0][i]['catename']+"</a></dt>";
                        for(var n in res[0][i]['child']){

                                str2+="<dd><a href='<?php echo U("goods/goodsList");?>?id3="+res[0][i]['child'][n]['id']+"'   style='margin-left: 10px'>"+res[0][i]['child'][n]['catename']+"</a></dd>";
                     }
                        str2+='</dl>';
                    }
                    str2+='</div>';
                    str2+='<div class="Brands">';
                    for(var p in res['image']){
                        str2+="<a href='#' style='height: 90px;width: 90px;'><img style='height: 100%;width: 100%' src='/uploads/n1/"+res['image'][p]['image']+"'/></a>";
                    }
                    str2+='</div></div>';
                    //单引号不解析变量
                    $("li[id='"+id+"']").children(".menv_Detail").html(str2);
                    //防止下一层li标签覆盖（其上所有）上层li标签，设置先显示，然后隐藏当前li标签的所有de兄弟标签
                    $("li[id='"+id+"']").children(".menv_Detail").show();
                    $("li[id='"+id+"']").siblings().children(".menv_Detail").hide();
               },'json')}
        })

    })

    //鼠标划过样式开始
//    $(function() {
//        $(".Menu_list").mouseenter(function () {
//            var i=$(this).children().hasClass('a').index();
//            if(i){
//
//            }
//            $(this).children().css('background','red');
//        })
//    })


    // $(function(){
    //     $(".Menu_list").mouseenter(function(){
    //         $(this).children('.name').on('mouseenter',function(){
    //             // alert(11);
    //             $(this).css({background:'white'})
    //         });
    //         $(this).children('.name').on('mouseleave',function(){
    //             $(this).css({background:rgb(234,232,233)})
    //         });
    //     })

    //     //
    // })
    //鼠标划过样式结束
</script>


<!--新的-->
<div id="Menu" class="clearfix">
    <div class="Inside_pages">
        <div id="allSortOuterbox" class="display">
            <div class="t_menu_img"></div>
            <div class="Category"><a href="<?php echo U('Index/index');?>"><em></em>所有产品分类</a></div>
            <div class="hd_allsort_out_box_new">
                <!--左侧栏目开始-->
                <ul class="Menu_list">
                    <!--<li class="name">-->
                        <!--<div class="Menu_name"><a href="#" >男装女装</a> <span>&lt;</span></div>-->
                        <!--<div class="link_name">-->
.
                            <!--<p><a href="#">酱香型</a></p>-->
                        <!--</div>-->
                        <!--<div class="menv_Detail">-->
                            <!--<div class="cat_pannel clearfix">-->
                                <!--<div class="hd_sort_list">-->
                                    <!--<dl class="clearfix" data-tpc="1">-->
                                        <!--<dt>白酒</dt>-->
                                        <!--<dd><a href="#">酱香型</a></dd>-->

                                    <!--</dl>-->

                                <!--</div><div class="Brands">-->

                                <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/p_logo_5.jpg" /></a>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--&lt;!&ndash;品牌&ndash;&gt;-->
                        <!--</div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
        <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
        <!--菜单栏-->
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name">
                <li> <a href=""></a> </li>
                <li><a href="<?php echo U('Goods/clothing');?>" target="_blank">服装城</a></li>
                <li><a href="<?php echo U('Goods/shoes');?>" target="_blank">鞋城</a></li>
                <li><a href="<?php echo U('Goods/bags');?>" target="_blank">箱包大全</a></li>
                <li><a href="<?php echo U('Goods/jewelry');?>" target="_blank">精美饰品</a></li>
                <li><a href="<?php echo U('Goods/goodsGroup');?>" target="_blank">限时抢购</a></li>
        </div>
        <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
    </div>
</div>
</div>
</div>
<!--产品详细页-->
<div class="clearfix  Inside_pages">
 <!--位置-->
 <div id="goodsInfo">
 <div class="Location_link">
  <em></em>
        <?php if(is_array($goods['cate'])): foreach($goods['cate'] as $k0=>$v0): ?><a href="#"><?php echo ($v0["catename"]); ?></a>  &gt;&nbsp;<?php endforeach; endif; ?>
     <?php echo ($goods["goodsname"]); ?>
 </div>
 <!--产品详细介绍-->
 <div class="Details_style clearfix" >
  <div class="mod_picfold clearfix">

    <div class="clearfix" id="detail_main_img">
	 <div class="layout_wrap preview">
     <div id="vertical" class="bigImg">
		<img src="/uploads/n0/<?php echo reset($images);?>" width="350" height="350" alt="" id="midimg" />
		<div style="display:none;" id="winSelector"></div>
	</div>
     <div class="smallImg">
		<div class="scrollbutton smallImgUp disabled">&lt;</div>
		<div id="imageMenu">
			<ul>

                <?php if(is_array($images)): foreach($images as $k=>$val): ?><li><img src="/uploads/n0/<?php echo ($val); ?>" width="68" height="68" alt="<?php echo ($goods['goodsname']); ?>"/></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="scrollbutton smallImgDown">&gt;</div>
	</div><!--smallImg end-->	
	<div id="bigView" style="display:none;"><div><img width="800" height="800" alt="" src="" /></div></div>
	 </div>

	</div>

		 <div class="Sharing">
	 <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1441079683326"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
  <!--收藏-->
	  <div class="Collect">
          <!--<div class="collect1" style="display: none"></div>-->
          <?php if($goods['status']==1): ?><a href="javascript:collect(92)" name="1_<?php echo ($goods['id']); ?>" class="collected collect1" id="1" style="color:#FF0000"><em class="ico1"></em>收藏该商品( <?php echo ((isset($collect) && ($collect !== ""))?($collect):"0"); ?> )</a>
            <?php else: ?>
              <a href="javascript:collect(92)" name="1_<?php echo ($goods['id']); ?>" class="collected" id="0" style="color:#999"><em class="ico1"></em>收藏该商品( <?php echo ((isset($collect) && ($collect !== ""))?($collect):"0"); ?> )</a><?php endif; ?>
      </div>
	 </div>
   </div>
   <!--信息样式-->
    <div class="textInfo">
    <form action="<?php echo U('cart/d_cart');?>" name="ECS_FORMBUY" id="ECS_FORMBUY" enctype="multipart/form-data" method="post">
        <input type="hidden" name="gid" value="<?php echo ($goods['id']); ?>"/>
        <input type="hidden" name="goodsname" value="<?php echo ($goods['goodsname']); ?>"/>
        <input type="hidden" name="price" value="<?php echo ($goods['saleprice']); ?>"/>
	  <div class="title"><h1><?php echo ($goods["goodsname"]); ?></h1><p style="display: none"><?php echo ($goods["goodsnum"]); ?></p></div>
	  <div class="mod_detailInfo_priceSales">
	  <div class="margins">
	  <div class="Price clearfix"><label>价格</label><span>¥<?php echo ($goods["saleprice"]); ?><b><?php echo ($goods["markprice"]); ?></b></span></div>

	  </div>
	  <div class="s_Review">
	   <a href="#">好评率<b><?php echo ($good[3]); ?>%</b>[评论<b><?php echo ($good[0]); ?></b>条]</a>
	  </div>
	  </div>
	 <div class="buyinfo" id="detail_buyinfo">
		<dl>
        <dt>数量</dt>
        <dd>
		  <div class="choose-amount left">
			<a class="btn-reduce" href="javascript:;" onclick="setAmount.reduce('#buy-num')">-</a>
			<a class="btn-add" href="javascript:;" onclick="setAmount.add('#buy-num')">+</a>
			<input class="text" id="buy-num" value="1" name="num" onkeyup="setAmount.modify('#buy-num');">
		 </div>
		 <div class="P_Quantity">剩余：<?php echo ($goods["goodsnum"]); ?>件</div>
        </dd>
	    <dd>
	        <div class="wrap_btn">
                <?php if($goods['goodsnum'] > 0): ?><a href="javascript:addToCart_bak(92)" class="wrap_btn1" title="加入购物车"></a>
		        <a href="javascript:addToCart(92)" class="wrap_btn2 example" title="立即购买" ></a>
                    <?php else: ?><span class="no" title="已售完" >已售完</span><?php endif; ?>
            </div>
		</dd>
	  </dl>
	  </div>
	  <div class="Guarantee clearfix">
	   <dl><dt>支付方式</dt><dd><em></em>货到付款（部分地区）</dd><dd><em></em>在线支付</dd> 
	   <dd> <div class="payment " id="payment" style="width:160px;height:24px;text-align: center;line-height: 24px">
                                    <a href="javascript:void(0);" class="paybtn" >支付方式<span class="iconDetail"></span></a>
                                <ul><li>货到付款</li><li>礼品卡支付</li><li>网上支付</li><li>银行转账</li></ul></div>
	  </dd></dl></div>	  
	</form>
  </div>

    
     <div id="LoginBox">
         <div class="row1" style="position: relative;">
             <a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="closeBtn">×</a>
         </div>
         <div class="row1" style="margin-top: 30px;">
         <label style="display:inline-block;line-height: 38px;margin: 0; vertical-align:middle;margin-left:160px">账号登录</label>
         </div>
         <div class="row" style="margin-top: 30px;position:relative;height:100px">
             账号: <span class="inputBox">
                <input type="text" id="txtName" placeholder="账号/邮箱" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn">*</a>
             <label style="display:inline-block;width:150px;height:38px;font-size: 15px;position: absolute;left:130px;top:40px" id="remind"></label>
         </div>
         <div class="row"style="position:relative;height:70px">
             密码: <span class="inputBox">
                <input type="password" id="txtPwd" placeholder="密码" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn2">*</a>
         </div>
         <div class="row" style="margin-top: 50px;">
             <a href="javascript:;" id="loginbtn">登录</a>
         </div>
     </div>

  <!--产品推荐-->
    <div class="Recommend">
      <div class="title_name">同类产品推荐</div>
	  <div class="Recommend_list">
	    <ul>
            <?php if(is_array($goods['like'])): $k1 = 0; $__LIST__ = $goods['like'];if( count($__LIST__)==0 ) : echo "暂时没有同类商品" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($k1 % 2 );++$k1;?><li class="clearfix">
		 <div class="pic_img"><a href="<?php echo U('Goods/GoodsDetail',array('id'=>$val1['id']));?>"><img src="/uploads/n2/<?php echo reset(explode(',',$val1['image']));?>" width="100" height="100"></a></div>
		 <div class="r_content">
			<div class="title"><a href="<?php echo U('Goods/GoodsDetail',array('id'=>$val1['id']));?>"><?php echo ($val1["goodsname"]); ?></a></div>
			<div class="p_Price">￥<?php echo ($val1["saleprice"]); ?></div>
          </div>
		 </li><?php endforeach; endif; else: echo "暂时没有同类商品" ;endif; ?>
		</ul>
	  </div>
   </div>
  </div> 
   </div>
  <!--产品-->
  <div class="clearfix">
   <div class="left_style">
   <div class="user_Records">
     <div class="title_name">用户浏览记录</div>
	 <ul>
     <?php if(is_array($info3)): $k = 0; $__LIST__ = $info3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k <= 6): ?><li>
	   <a href="<?php echo U('Goods/goodsDetail',array('id'=>$vo['gid']));?>">
	   <p><img src="/uploads/n1/<?php echo (array_shift(explode(',',(isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'default.jpg'))); ?>" data-bd-imgshare-binded="1"></p>
	   <p class="p_name"><?php echo ($vo["goodsintro"]); ?></p>
	   </a>
	   <p><span class="p_Price" style="margin-left:40px;">￥<?php echo ($vo["markprice"]); ?></span><b>￥<?php echo ($vo["saleprice"]); ?></b></p>
	  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
   </div>
   </div>
   <div class="right_style">	  
	<div class="inDetail_boxOut " id="inDetail_box">
	 <div class="inDetail_box" >
	  <div class="fixed_out ">
	   <ul class="inLeft_btn fixed_bar">
                  <li class="active"><a id="property-id" href="#payment" class="current">商品属性</a></li>
                  <li><a id="shot-id" href="#payment" class="after-sale">售后服务</a></li>
                  <li><a id="coms1-id" href="#payment" class="discuss">买家评论(<?php echo ($good[0]); ?>)</a></li>
                </ul>
               <div class="subbuy">
          <span class="extra currentPrice"> ¥<?php echo ($goods["saleprice"]); ?></span>
                   <?php if($goods['goodsnum'] > 0): ?><a href="#" class="extra  notice J_BuyButtonSub example">立即购买</a></div>
          <?php else: ?>
          <span class="no" title="已售完" >已售完</span><?php endif; ?>
	  </div>
	 </div>	  
	</div>  

   <div id="shangpsx">
       <ul class="shangpsx_info">
            <li><label>所属分类</label><span><?php echo ($goods["cate"][2]["catename"]); ?></span></li>
            <li><label>品牌</label><span><?php echo ($goods["brand"]["bname"]); ?></span></li>
            <li><label>颜色</label><span><?php echo ($goods["color"]); ?></span></li>
            <li><label>尺寸</label><span><?php echo ($goods["size"]); ?></span></li>
            <li><label>价格</label><span>￥<?php echo ($goods["saleprice"]); ?>元</span></li>
            
        </ul>
        <?php if(is_array($images)): foreach($images as $k=>$val): ?><img src="/uploads/n0/<?php echo ($val); ?>"  alt="<?php echo ($goods['goodsname']); ?>"/><?php endforeach; endif; ?>
    </div>
       <!-- 商品评论 end -->
   </div>
   </div>
  </div>
  <!--底部样式-->
<!--底部样式-->
<div class="ft_footer_service" id="footer">
    <div class="footerbox" >
        <!--底部-->
        <div class="Menu_style ensure ">
            <div class="phone">
                400-3456-333
            </div>
            <div class="icon_en">
                <a href="#" class="icon_link"><img src="/Shop/Public/Home/imgs/images/footer_icon_31.png" /><span class="left"><h2>退换货</h2>7天无理由退换货</span></a>
                <a href="#" class="icon_link"><img src="/Shop/Public/Home/imgs/images/footer_icon_33.png" /><span class="left"><h2>正品保障</h2>企业认证产品</span></a>
                <a href="#" class="icon_link"><img src="/Shop/Public/Home/imgs/images/footer_icon_35.png" /><span class="left"><h2>满包邮</h2>满68元包邮</span></a>
                <a href="#" class="icon_link"><img src="/Shop/Public/Home/imgs/images/footer_icon_37.png" /><span class="left"><h2>直供产品</h2>厂家直销平台</span></a>
            </div>
        </div>
    </div>
</div>
<!--底部样式-->
<div class="footer">
    <div class="footerbox clearfix">
        <div class="clearfix">
            <div class="left help_link">
                <dl>
                    <dt>投保指南</dt>
                    <dd><a href="#">保险需求测试</a></dd>
                    <dd><a href="#">专题及活动</a></dd>
                    <dd><a href="#">挑选保险产品</a> </dd>
                    <dd><a href="#">常见问题 </a></dd>
                </dl>
                <dl>
                    <dt>保险服务</dt>
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
            <!--信息内容-->

            <!--认证-->
            <!--认证展示样式-->
            <div class="Authenticate left clearfix" id="Authenticate_show">
                <div class="Authenticate_show">
                    <div class="picMarquee-left">
                        <div class="hd">
                            <a class="next">&lt;</a>
                            <a class="prev">&gt;</a>
                        </div>
                        <div class="bd">
                            <ul class="picList">
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic1.jpg" /></a></div>
                                    <!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图1</a></div>-->
                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic2.jpg" /></a></div>
                                    <!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图2</a></div>-->
                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic3.jpg" /></a></div>

                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic4.jpg" /></a></div>

                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/images/pic5.jpg" /></a></div>

                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic6.jpg" /></a></div>

                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic6.jpg" /></a></div>

                                </li>
                                <li>
                                    <div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="/Shop/Public/Home/imgs/images/pic6.jpg" /></a></div>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <script type="text/javascript">
                        jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50});
                    </script>
                </div>
            </div>
        </div>
        <div class="text_link">
            <p>
                <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
            <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
        </div>
    </div>
</div>
 <!--底部样式-->

 <!--右侧菜单栏购物车样式-->
<style>
.cartBox{width: 800px;color: black}
.scar{width:100%;}
.scar li{height: 50px;line-height: 50px;margin-bottom: 4px;border-bottom: 1px solid #D4D4D4;position: relative;}
.scar li .a1{width: 50px;height: 50px;float: left;}
.scar li .a1 img{width: 50px;height: 50px;}
.scar li .span11{width: 130px;height: 50px; float: left;text-align: left;margin-left: 5px; }
.scar li .span11 a{color: black;text-decoration: none;}
.scar li .span22{width: 50px;float: left;color: red;position: absolute;top: -12px;right: 20px;}
.scar li .a2{width: 30px; height: 50px;float: right;margin-right: 10px;margin-left: 3px;margin-top: 5px;position: absolute}
.tt{height: 50px;}
.ttt{width: 160px;height: 50px;float: left;margin-left: 0px;line-height: 50px;text-align: left;}
.ttt strong{float:right;height: 50px;line-height: 50px;margin-top: 15px;}
.tttt{width: 80px;height: 30px;display: block;float: right;margin:10px 20px 0 0;background:#E4393C;text-align: center;line-height: 30px;}
</style>
<div class="fixedBox">
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user"><a href="#"> <span class="fixeBoxSpan iconfont icon-my"></span> <strong>用户</strong></a> </li>
        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart" id="good_cart">0</p>
            <span class="fixeBoxSpan iconfont icon-cart"></span> <strong>购物车</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <ul class="scar">
                  
                </ul>  
                <div class="tt">
                    <div class="ttt">共<b></b>件商品　共计<strong>￥ 515.00</strong></div>
                    <a href="<?php echo U('Goods/shop_cart');?>" title="去购物车结算" id="btn-payforgoods" class="tttt">去购物车结算</a>
                </div>
            </div>
        </li>
        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-qq1"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <div class="bjfffs"></div>
                <dl onclick="javascript:;">
                    <dt><img src="/Shop/Public/Home/imgs/images/Service1.png"></dt>
                    <dd><strong>QQ客服1</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
                    </dd>
                </dl>
                <dl onclick="javascript:;">
                    <dt><img src="/Shop/Public/Home/imgs/images/Service1.png"></dt>
                    <dd> <strong>QQ客服2</strong>
                        <p class="p1">9:00-22:00</p>
                        <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
                    </dd>
                </dl>
            </div>
        </li>
        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
            <span class="fixeBoxSpan iconfont icon-weixin"></span> <strong>微信</strong>
            <div class="cartBox">
                <!-- <div class="bjfff"></div> -->
                <div class="QR_code" >
                    <p><img src="/Shop/Public/Home/imgs/images/erweima.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <p>微信扫一扫，关注我们</p>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan iconfont  icon-collect"></span> <strong>收藏</strong> </a> </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>
<script>
    $(function(){
        $(".cart_bd").mouseenter(function(){
            $(this).addClass('hover');
            $.post('<?php echo U("Index/smallcar");?>',function(res){
                var str='';
                var str2='';

                var num=0;
                var totalprice=0;
                
                if(res){
                    for(var i in res){

                    str+='<li>';
                    str+='<a href="" class="a1"><img src="/uploads/n1/'+res[i].image+'"></a>';
                    str+='<span class="span11"><a style="color:black;" href="#">'+res[i].goodsname+'</a></span>';
                    str+='<span class="span22">￥'+res[i].saleprice+'*'+res[i].buynum+'</span>';
                    str+='<a style="color:black;" href="javascript:;" name="'+res[i].gid+'" class="gid a2">删除</a>';
                    str+='</li>';
                    num=num+res[i].buynum*1;
                    totalprice=totalprice+(res[i].saleprice*1)*(res[i].buynum*1);
                    }

                    $('.scar').html(str);
                }else{
                    if($(".message").attr("class")){

                    }else{
                    str='<div class="message">购物车内暂无商品，赶紧选购吧</div>';
                    $('.bjfff').after(str);
                    $('.scar').empty();
                    }
                }
                str2+='<div class="ttt">共<b>'+num+'</b>件商品　共计<strong style="color:black;">￥ '+totalprice+'</strong></div>'; 
                str2+='<a href="<?php echo U('Cart/cart');?>" title="去购物车结算" id="btn-payforgoods" class="tttt">去购物车结算</a>';
                
                
                var coun=document.getElementById('good_cart');
                coun.innerHTML=num;
                $('.tt').html(str2);
            },'json')

        })
       

        $('.gid').live('click',function(){
            id=$(this).attr("name")
            $.post("<?php echo U('Cart/cartdel');?>",{gid:id},function(res){
                // alert(res);
                if(res.status>0){
                    layer.msg('删除成功');
                }else{
                    layer.msg('删除失败');
                }
            })
        })
        // $(".hd_Shopping_list").mouseleave(function(){
        //     $(this).removeClass('hover');
        //     // $('.')
        // })
    })

</script>
</body>
</html>