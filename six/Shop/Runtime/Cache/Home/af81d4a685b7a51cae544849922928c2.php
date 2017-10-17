<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>

<script src="/Shop/Public/Home/js/lrtk.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/layer.js" type="text/javascript"></script>
    <link href="/Shop/Public/Home/css/loginDialog.css" rel="stylesheet" type="text/css" />
<title>购物车</title>
</head>
<script type="text/javascript">
$(document).ready(function () {
   //全选
   $("#CheckedAll").click(function () {
       if (this.checked) {                 //如果当前点击的多选框被选中
           $('.check').attr("checked", true);
           all=0
           diff=0
           $(".num").each(function(){

               var num=$(this).val();
               var n1=$(this).next("a").attr("name");
               var price=$("#price_item_"+n1).text().substr(1)
               var mprice=$("#Original_Price_"+n1).text().substr(1)
               var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
               num=parseFloat(num)
               price=parseFloat(price)
               mprice=parseFloat(mprice)
               all=parseFloat(all)
               diff=parseFloat(diff)
               var price_one=num*price;
               $(".price_"+n1).val(price_one)
               $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
               if($("#check"+n1).attr("checked")){
                   all=all+price_one
                   diff_once=(mprice-price)*num
               }
               diff=diff+diff_once
               $(".price_"+n1).val(price_one)
               $("#total_points").text(all)
               $("#all_price1").val(all)
               $("#Preferential_price").text("￥"+diff.toFixed(2))
               all=all.toFixed(2);
               $("#all_price").text("￥"+all);

           })



       } else {
           $('.check').attr("checked", false);
           all=0
           diff=0
           $(".num").each(function(){

               var num=$(this).val();
               var n1=$(this).next("a").attr("name");
               var price=$("#price_item_"+n1).text().substr(1)
               var mprice=$("#Original_Price_"+n1).text().substr(1)
               var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
               num=parseFloat(num)
               price=parseFloat(price)
               mprice=parseFloat(mprice)
               all=parseFloat(all)
               diff=parseFloat(diff)
               var price_one=num*price;
               $(".price_"+n1).val(price_one)
               $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
               if($("#check"+n1).attr("checked")){
                   all=all+price_one
                   diff_once=(mprice-price)*num
               }
               diff=diff+diff_once
               $(".price_"+n1).val(price_one)
               $("#total_points").text(all)
               $("#all_price1").val(all)
               $("#Preferential_price").text("￥"+diff.toFixed(2))
               all=all.toFixed(2);
               $("#all_price").text("￥"+all);

           })
       }
   });
   $('.check').click(function () {
       var flag = true;
       $('.check').each(function () {
           if (!this.checked) {
               flag = false;
           }
       });

       if (flag) {
           $('#CheckedAll').attr('checked', true);
           all=0
           diff=0
           $(".num").each(function(){

               var num=$(this).val();
               var n1=$(this).next("a").attr("name");
               var price=$("#price_item_"+n1).text().substr(1)
               var mprice=$("#Original_Price_"+n1).text().substr(1)
               var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
               num=parseFloat(num)
               price=parseFloat(price)
               mprice=parseFloat(mprice)
               all=parseFloat(all)
               diff=parseFloat(diff)
               var price_one=num*price;
               $(".price_"+n1).val(price_one)
               $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
               if($("#check"+n1).attr("checked")){
                   all=all+price_one
                   diff_once=(mprice-price)*num
               }
               diff=diff+diff_once
               $(".price_"+n1).val(price_one)
               $("#total_points").text(all)
               $("#all_price1").val(all)
               $("#Preferential_price").text("￥"+diff.toFixed(2))
               all=all.toFixed(2);
               $("#all_price").text("￥"+all);

           })
       } else {
           $('#CheckedAll').attr('checked', false);
           all=0
           diff=0
           $(".num").each(function(){

               var num=$(this).val();
               var n1=$(this).next("a").attr("name");
               var price=$("#price_item_"+n1).text().substr(1)
               var mprice=$("#Original_Price_"+n1).text().substr(1)
               var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
               num=parseFloat(num)
               price=parseFloat(price)
               mprice=parseFloat(mprice)
               all=parseFloat(all)
               diff=parseFloat(diff)
               var price_one=num*price;
               $(".price_"+n1).val(price_one)
               $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
               if($("#check"+n1).attr("checked")){
                   all=all+price_one
                   diff_once=(mprice-price)*num
               }
               diff=diff+diff_once
               $(".price_"+n1).val(price_one)
               $("#total_points").text(all)
               $("#all_price1").val(all)
               $("#Preferential_price").text("￥"+diff.toFixed(2))
               all=all.toFixed(2);
               $("#all_price").text("￥"+all);

           })
       }
   });
   //输出值
//   $("#send").click(function () {
//       if($(".check").attr("checked")){
//            var str = "你是否要删除选中的商品：\r\n";
//            $('.check').each(function () {
//            str += $(this).val() + "\r\n";
//            })
//           alert(str);
//       }else{
//           var str = "你未选中任何商品，请选择后在操作！";
//           alert(str);
//       }
//
//   });
    $("#send").click(function(){
        var a=0;
        var a=parseInt(a)
        var str = "你是否要删除选中的商品：\r\n";
        $(".check").each(function(){
            if($(this).attr("checked")){
                a=a+1
                str += $(this).parents("td").prevAll(".name").children(".p_name").children("a").text() + "\r\n"
            }
        })

        if(a!=0) {
            layer.confirm(str,{btn:["确认","删除"]},function(){
                $.post("<?php echo U('Cart/alldel');?>", $(".form1").serialize(), function (res) {
                    if (res.status != 0) {
                        layer.msg("删除成功")
                            $(".table_list").html("<div style='margin:40px auto 0; font-size:30px;color:#a9a9a9;text-align: center '>购物车空空如也，赶紧去购物吧</div>")


                    } else {
                        layer.msg("删除失败");
                    }
                }, "json")
            },function(){})
        }else{
            layer.alert("你未选中任何商品，请选择后在操作！")
        }
    })


})
</script>
<script  type="text/javascript">
    $(function(){
        $(".jian").click(function(){
            var n=$(this).attr("name");
            var num=$("#num"+n).val();
            n=parseFloat(n)
            num=parseFloat(num)
            if(num<=1){
                layer.alert("数量不能少于1");
            }else{
                num=parseFloat(num)-1
                $("#num"+n).val(num);

                all=0
                diff=0
                $(".num").each(function(){

                    var num=$(this).val();
                    var n1=$(this).next("a").attr("name");
                    var price=$("#price_item_"+n1).text().substr(1)
                    var mprice=$("#Original_Price_"+n1).text().substr(1)
                    var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
                    num=parseFloat(num)
                    price=parseFloat(price)
                    mprice=parseFloat(mprice)
                    all=parseFloat(all)
                    diff=parseFloat(diff)
                    var price_one=num*price;
                    $(".price_"+n1).val(price_one)
                    $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
                    if($("#check"+n1).attr("checked")){
                        all=all+price_one
                        diff_once=(mprice-price)*num
                    }
                    diff=diff+diff_once
                    $(".price_"+n1).val(price_one)
                    $("#total_points").text(all)
                    $("#all_price1").val(all)
                    $("#Preferential_price").text("￥"+diff.toFixed(2))
                    all=all.toFixed(2);
                    $("#all_price").text("￥"+all);

                })
                }

            })

        $(".jia").click(function(){
            var n=$(this).attr("name");
            var max=$(".goodsnum"+n).val()
            var num=$("#num"+n).val();
                n=parseFloat(n);
                max=parseFloat(max)
                num=parseFloat(num)
            if(num>=max){
                layer.alert("数量不能大于库存数量");
            }else{

                num=parseFloat(num)+1;
                $("#num"+n).val(num);
               // $("#all_price").test();
                 all=0
                diff=0
                $(".num").each(function(){

                    var num=$(this).val();
                    var n1=$(this).next("a").attr("name");
                    var price=$("#price_item_"+n1).text().substr(1)
                    var mprice=$("#Original_Price_"+n1).text().substr(1)
                    var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
                    num=parseFloat(num)
                    price=parseFloat(price)
                    mprice=parseFloat(mprice)
                    all=parseFloat(all)
                    diff=parseFloat(diff)
                    var price_one=num*price;
                    $(".price_"+n1).val(price_one)
                    $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
                    if($("#check"+n1).attr("checked")){
                        all=all+price_one
                        diff_once=(mprice-price)*num
                    }
                    diff=diff+diff_once
                    $(".price_"+n1).val(price_one)
                    $("#total_points").text(all)
                    $("#Preferential_price").text("￥"+diff.toFixed(2))
                    $("#all_price1").val(all)
                    all=all.toFixed(2);
                    $("#all_price").text("￥"+all);

                })
            }
        })
        $(".num").keyup(function(){
                 var n=$(this).next("a").attr("name");
                 var max=$(".goodsnum"+n).val()
                 var num=$(this).val()
                n=parseFloat(n);
                max=parseFloat(max)
                if(isNaN(num)){
                    layer.alert("数量必须为数字");
                    $("#num"+n).val(1)
                }
                num=parseFloat(num);
                if(num<1){
                    layer.alert("数量不能少于1");
                    $("#num"+n).val(1)
                }
                if(num>max){
                    layer.alert("数量不能大于库存数量");
                    $("#num"+n).val(max)
                }
            all=0
            diff=0
            $(".num").each(function(){

                var num=$(this).val();
                var n1=$(this).next("a").attr("name");
                var price=$("#price_item_"+n1).text().substr(1)
                var mprice=$("#Original_Price_"+n1).text().substr(1)
                var diff_once=0;
//                   var all=$("#all_price").test();
//                   all=parseFloat(all)
                num=parseFloat(num)
                price=parseFloat(price)
                mprice=parseFloat(mprice)
                all=parseFloat(all)
                diff=parseFloat(diff)
                var price_one=num*price;
                $(".price_"+n1).val(price_one)
                $("#total_item_"+n1).text("￥"+price_one.toFixed(2));
                if($("#check"+n1).attr("checked")){
                    all=all+price_one
                    diff_once=(mprice-price)*num
                }
                diff=diff+diff_once
                $(".price_"+n1).val(price_one)
                $("#total_points").text(all)
                $("#all_price1").val(all)
                $("#Preferential_price").text("￥"+diff.toFixed(2))
                all=all.toFixed(2);
                $("#all_price").text("￥"+all);

            })
        })



        //立即购买
        $(".cartsubmit").click(function(){
            var a=0;
            a=parseInt(a)
            $(".check").each(function(){
                if($(this).attr("checked")){
                    a=a+1
                }
            })

            if(a!=0){
                if(<?php echo ((isset($_SESSION["uid"]) && ($_SESSION["uid"] !== ""))?($_SESSION["uid"]):"false"); ?>){
                $.post("<?php echo U('Cart/buy');?>",$(".form1").serialize(),function(res){
                    if(res.status!=0){
                       location="<?php echo U('Orders/orders');?>?id="+ res.info
                    }else{
                        layer.alert(res.info)
                    }
                })
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
            }else{

                layer.alert("请选择商品后在提交");
            }

        })

    $("#loginbtn").click(function(){
        name=$("#txtName").val();
        pwd=$("#txtPwd").val();
        $.post("<?php echo U('Users/login');?>",{username:name,password:pwd},function(res){
            if(res.status){
                $("#remind").css("color","green");
                $("#remind").html("登陆成功");
                $.post("<?php echo U('Cart/buy');?>",$(".form1").serialize(),function(res){
                    if(res.status!=0){
                        location.href="<?php echo U('Orders/orders');?>?id="+ res.info
                    }else{
                        layer.alert(res.info)
                    }
                })
            }else{
                $("#remind").css("color","red");
                $("#remind").html("用户名或密码错误");
            }
        },'json')
    })
    $(".del_one").click(function(){
        var gid=$(this).attr("name");
        str=$(this).parents("td").prevAll(".name").children(".p_name").children("a").text()
       // str=$("input[class='check'][value='gid']").parent().next(".name").childern(".p_name").childern("a").text();
        layer.confirm('您确定要删除商品'+str+'吗？',{btn:['确认','退出']},function(){

            $.post("<?php echo U('Cart/cartdel');?>",{gid:gid},function(res){
                if(res.status!=0){
                    layer.msg("删除成功");
                        $("[name='"+gid+"']").parents(".tr").remove();
                        if(!$(".table_list").text()){
                            $(".table_list").html("<div style='margin:40px auto 0; font-size:30px;color:#a9a9a9;text-align: center '>购物车空空如也，赶紧去购物吧</div>")
                        }

                }else{
                    layer.alert("删除失败");
                }
            },"json")
        },function(){})


    })



    $(".collect").click(function(){
        var id=$(this).attr("id");
        var gid=$(this).attr("name").substr(2);
        uid=<?php echo ((isset($_SESSION['uid']) && ($_SESSION['uid'] !== ""))?($_SESSION['uid']):"false"); ?>;
        $.post("<?php echo U('Cart/collect');?>",{"gid":gid,"uid":uid},function(res){


            if(id==0){
                $("[name='1_"+gid+"']").text("已收藏商品")
                $("[name='1_"+gid+"']").attr("id",1)
                $("[name='1_"+gid+"']").css("color","#FF0000")
            }else{
                $("[name='1_"+gid+"']").text("收藏该商品")
                $("[name='1_"+gid+"']").attr("id",0)
                $("[name='1_"+gid+"']").css("color","#999")
            }
            layer.msg(res.info);
        },"json")
    })







    })
</script>
<body>
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
<!--购物车样式图层-->
<div class="Inside_pages">
 <div class="shop_carts">
   <div class="Process"></div>
 <div class="Shopping_list">
  <div class="title_name">
    <ul>
    <li class="checkbox"></li>
    <li class="name" style="width: 450px">商品名称</li>
    <li class="scj">市场价</li>
    <li class="bdj">本店价</li>
    <li class="sl" style="width: 187px">购买数量</li>
    <li class="xj">小计</li>
    <LI class="cz">操作</LI>
  </ul>
 </div>
  <div class="shopping">
  <form  method="post" action="<?php echo U('Cart/buy');?>" enctype="multipart/form-data" class="form1">
 <table class="table_list">

     <?php if(is_array($goods)): $k = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr class="tr">
   <td class="checkbox"><input name="gid[]" type="checkbox" value="<?php echo ($val['gid']); ?>" id="check<?php echo ($k); ?>" class="check"/>
       <input name="id[]" type="hidden" value="<?php echo ($val['gid']); ?>" /></td>
    <td class="name" style="width: 440px">
      <div class="img"><a href="<?php echo U('goods/goodsDetail',array('id'=>$val['gid']));?>"><img src="/uploads/n2/<?php echo ($val['image']); ?>" /></a></div>
      <div class="p_name"><a href="<?php echo U('goods/goodsDetail',array('id'=>$val['gid']));?>"><?php echo ($val["goodsname"]); ?></a></div>
    </td>
    <td class="scj sp"><span id="Original_Price_<?php echo ($k); ?>">￥<?php echo ($val["markprice"]); ?></span></td>
    <td class="bgj sp" style="width: 140px"><span id="price_item_<?php echo ($k); ?>" class="price">￥<?php echo ($val["saleprice"]); ?></span></td>
    <td class="sl" style="width: 120px;padding-left: 32px;padding-right: 32px;">
        <div class="Numbers">
          <a  href="javascript:void(0)" class="jian" name="<?php echo ($k); ?>">-</a>
          <input type="text" name="num[]" value="<?php echo ($val['buynum']); ?>" id="num<?php echo ($k); ?>" class="number_text num">
          <a  href="javascript:void(0)" class="jia" name="<?php echo ($k); ?>">+</a>
         </div>
        <input type="hidden" name="goodsnum[]" value="<?php echo ($val['goodsnum']); ?>" class="goodsnum<?php echo ($k); ?>">
    </td>
    <td class="xj" ><span id="total_item_<?php echo ($k); ?>" class="prices">￥<?php echo ($val["saleprice"]*$val['buynum']); ?>.00</span><input type="hidden" name="price1[]"  value="" class="price_<?php echo ($k); ?>"></td>
    <td class="cz">
     <p><a href="#" class="del_one" name="<?php echo ($val['gid']); ?>">删除</a><p>
     <?php if($val['status']==0): ?><p><a href="javascript:;" class="collect" name="1_<?php echo ($val['gid']); ?>" id="0" style="color: #999">收藏该商品</a></p><?php else: ?><p><a href="javascript:;" class="collect" name="1_<?php echo ($val['gid']); ?>" id="1" style="color: #FF0000">已收藏商品</a></p><?php endif; ?>
    </td>
   </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
       <!--<tr class="tr on">
       <td class="checkbox"><input name="checkitems" type="checkbox" value="金龙鱼 东北大米 蟹稻共生 盘锦大米5KG" /></td>
      <td class="name">
        <div class="img"><a href="#"><img src="common/images/cp-4jpg.jpg" /></a></div>
        <div class="p_name"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
      </td>
      <td class="scj sp">￥39.50</td>
      <td class="bgj sp" id="price_item_2">￥32.40</td>
      <td class="sl">
          <div class="Numbers">
            <a onClick="setAmount.reduce('#qty_item_')" href="javascript:void(0)" class="jian">-</a>
            <input type="text" name="qty_item_" value="1" id="qty_item_" onkeyup="setAmount.modify('#qty_item_')" class="number_text">
            <a onclick="setAmount.add('#qty_item_')" href="javascript:void(0)" class="jia">+</a>
           </div>
      </td>
      <td class="xj" ><span id="total_item_2"></span><input type="hidden" name="total_price" id="total_price" value=""></td>
      <td class="cz">
       <p><a href="#">删除</a><P>
       <p><a href="#">收藏该商品</a></p>
      </td>
     </tr>
--> </table>
 <div class="sp_Operation clearfix">
  <div class="select-all">
  <div class="cart-checkbox"><input type="checkbox"   id="CheckedAll" name="toggle-checkboxes" class="jdcheckbox" clstag="clickcart">全选</div>
  <div class="operation"><a href="javascript:void(0);" id="send">删除选中的商品</a></div>
    </div>
     <!--结算-->
    <div class="toolbar_right">
    <ul class="Price_Info">
    <li class="p_Total"><label class="text">商品总价：</label><span class="price sumPrice" id="all_price">￥0.00</span><input type="hidden" id="all_price1" name="allprice"></li>
    <li class="Discount"><label class="text">已&nbsp;&nbsp;节&nbsp;&nbsp;省：</label><span class="price" id="Preferential_price">￥0.00</span></li>
    <li class="integral">本次购物可获得<b id="total_points">0</b>积分</li>
    </ul>
    <div class="btn"><a class="cartsubmit" href="javascript:;"></a><a class="continueFind" href="<?php echo U('Index/index');?>"></a></div>
  </div>
  </div>
   </form>
      
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
      <div class="row" style="position:relative;height:70px">
          密码: <span class="inputBox">
                <input type="password" id="txtPwd" placeholder="密码" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn2">*</a>
      </div>
      <div class="row" style="margin-top: 50px;">
          <a href="javascript:;" id="loginbtn">登录</a>
      </div>
  </div>
 </div>
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

</body>
</html>