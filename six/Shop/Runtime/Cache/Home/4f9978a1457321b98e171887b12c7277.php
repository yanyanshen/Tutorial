<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/jquery.lazyload.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Shop/Public/Home/js/ads.js"></script>
    <title>�̳���ҳ</title>
    <style type="text/css">
        #pop{background:#fff;width:300px; height:282px;font-size:12px;position:fixed;right:0;bottom:0;}
        #pop_head{line-height:32px;background:#f6f0f3;border-bottom:1px solid #e0e0e0;font-size:12px;padding:0 0 0 10px;}
        #pop_head h2{font-size:14px;color:#666;line-height:32px;height:32px;}
        #pop_head #popClose{position:absolute;right:10px;top:1px;}
        #pop_head a#popClose:hover{color:#f00;cursor:pointer;}
    </style>
<title>商城首页-传统版</title>
    <style>
    </style>
    <style>

        #nav{width: 60px;position: fixed;left: 5px;bottom:300px;list-style: none;display: none;cursor: pointer;}
        #nav li{height: 55px;line-height: 55px;border-bottom: 1px dashed #ccc;text-align: center;position: relative;font-size: 25px;margin-top: 1px;}
        #nav li span{position: absolute;display: inline-block;height: 55px;line-height: 55px;width: 100%;text-align: center;left: 0;top: 0;display: none;background: #f00;color: #fff;}


        .div{
            width: 100%;
            height: 110px;
            padding: 0;
            margin:0;
            position: fixed;
            top:0;
            z-index: 9999;
            display: none;
            background: #ecf0f1;
        }
        .div2{
            width: 1200px;
            height: 110px;
            margin: 0 auto;
            display: block;


        }
        .logo1{
            float: left;
        }
        .Search1 {
            float: right;
            margin:35px 140px 66px 0;
            width: 634px;
            height: 34px;

        }
        .Search1 .text{
            font-size: 12px;
            width: 495px;
            height: 32px;
            border:2px solid  #008cd6;
            line-height: 24px;
            padding: 0px 0px 0px 40px;
            vertical-align: top;
        }
        .Search_btn{
            background:#008cd6;
            padding:0px 29px;
            color:#FFFFFF;
            font-size:16px;
            height: 35px;
            border: 0;
            vertical-align: top;
            cursor: pointer;
        }

        .Product_area .clearfix{
            background: #f8f8f0;
        }
        .Product_area .clearfix div{
            color:  #fefefe;
        }






        .tv_hot2 {
            width: 220px;
        }

        /*.avatar {*/
            /*position: relative;*/
        /*}*/
        .tv_hot2 .avatar2 {
            display: block;
            height: 150px;
            /*超出部分隐藏*/
            overflow: hidden;
            width: 220px;
        }
        .tv_hot2 .avatar2 img {
            height: 150px;
        }

        .avatar2:hover {
            box-shadow: 0 0 10px gray;
        }
       .avatar2:hover img {
            transform: scale(1.5);
            transition: all 1s ease 0s;
            -webkit-transform: scale(1.3);
            -webkit-transform: all 1s ease 0s;
        }



       .tv_hot2 .avatar2 div{
           position: absolute;
           z-index: 1;
           width: 72px;
           height: 150px;
           border-top: 3px solid #e93524;
           background-color: #fff;margin: 0;padding: 0;display: block;color: red
       }
        .tv_hot2 .avatar2 div p{

        }


        .tv_hot {
            width: 219px;
        }

        /*.avatar {*/
        /*position: relative;*/
        /*}*/
        .tv_hot .avatar {
            display: block;
            height: 219px;
            /*超出部分隐藏*/
            overflow: hidden;
            width: 219px;
        }
        .tv_hot .avatar img {
            height: 219px;
        }
        .avatar:after {
            /*bottom: 0;*/
            /*content: url("");*/
            /*left: 5px;*/
            /*position: absolute;*/
            /*z-index: 10;*/
        }
        .avatar:hover {
            box-shadow: 0 0 10px gray;
        }
        .avatar:hover img {
            transform: scale(1.5);
            transition: all 1s ease 0s;
            -webkit-transform: scale(1.3);
            -webkit-transform: all 1s ease 0s;
        }
    </style>
</head>

<body>
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

//返回顶部开始
$(function(){
//    var t=$(window).height(); //获取可视窗口高度


    $('#one_piece').click(function(){$('body').animate({scrollTop: '0px'}, 800);});
//        $('#one_piece').click(function(){$('body').animate({scrollTop: t+'px'}, 800);});

//    $(window).on('scroll',function(){
//        var t2=$(window).scrollTop(); //获取滚动条的高度
//        if(''){
//
//        }
//    })

})
//返回顶部结束



    //鼠标划过样式开始
    $(function(){
        $(".Menu_list").mouseover(function(){
            $(this).css({background:'#f0e8e8'});
        })

    })
//鼠标划过样式结束


//懒加载开始
$(function(){
    $("img.lazy").lazyload({
        effect:"fadeIn",
        threshold:10
    });
})
//懒加载结束


//楼层导航开始
$(function(){
    var winHeight = $(window).height(), //获取浏览器可视窗口的高度
            headerHeight1 = $('.Slide_style').height(),  //获取header的高度
            headerHeight2=$('.index_style').height(),
            headerHeight3=$('.Brand').height();
            onOff = false;    //布尔值变量,通错这个变量可以防止快速连续点击的时候出现的连续滚动
    $(window).on('scroll',function(){
        var scTop = $(window).scrollTop();  //获取滚动条的滚动距离
        //当楼侧开始出现时显示楼层导航条
        if(scTop >= (headerHeight1+ headerHeight2 + headerHeight3 -2800) - winHeight ){
            $('#nav').fadeIn(400);   //也可以不传参数，传参数表示运动时间
        }else{
            $('#nav').hide(400);
        }

        //滚动时切换显示楼层
        if(!onOff){
            $('.floors').each(function(index,element){
                var _top = $(this).offset().top; //offset获取匹配元素在当前视窗的相对偏移
                //当每层楼的最上面滚动到浏览器窗口的中间时切换导航条的显示
                if(scTop >= _top - winHeight / 2){
                    //此处添加curr类样式并不是改变显示样式，而是为了标当前所在的楼层  ,显示出li的儿子标签
                    //eq()匹配一个给定索引值的元素
                    $('#nav>li').eq(index).addClass('curr').children().show()
                            .end().siblings().removeClass('curr').children().hide(); //end()将匹配到的元素列表变回到前一次的状态
                }
            });
        }
    })

    $('#nav>li').hover(function(){
        $(this).children().show();
    },function(){
        //此处用到.not('.curr')来过滤当前楼层，鼠标移开时仍然保持当前的显示样式
        $(this).not('.curr').children().hide();
    }).on('click',function(){
        onOff = true;  //将开关变量onOff置为true
        var index = $(this).index(),  //获取当前电机的li的索引
                _top = $('.floors').eq(index).offset().top;//获取相对于的楼层到文档顶部的距离
        $(this).addClass('curr').children().show().end()
                .siblings().removeClass('curr').children().hide();

        $('html,body').animate({'scrollTop':_top},400,function(){
            onOff = false; //在运动执行完毕的毁掉函数中将onOff的值重置为false
        });

        //或者也可以用scrollIntoView()方法，只是该方法没有滚动的效果，而是直接跳到浏览器可是窗口的最上面.用法如下：
        /*var index = $(this).index();
         $('.floor').get(index).scrollIntoView();*/
    });

});

    //楼层导航结束

</script>

<body id="totop">
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

<!--可修改图层2-->
  <!--<div class="festival1"><a href="#"><img src="/Shop/Public/Home/imgs/images/logo_sd.png" /></a></div>--><!--结束-->
 <!--购物车样式-->

<!--菜单导航样式-->
<div id="header2 "  class="div">
    <div class="div2">
        <div class="logo1"><a href="<?php echo U('Index/index');?>"><img src="/Shop/Public/Home/imgs/images/logo.png" /></a></div>
        <div class="Search1">
            <form action="<?php echo U('Goods/goodsList');?>" method="get" name="search" id="searchForm2">
                <p><input name="goodsname" type="text"  class="text" id="goodsname2"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>
            </form>
        </div>
     </div>
</div>
<div id="Menu" class="clearfix">
    <div class="Inside_pages">
        <div id="allSortOuterbox">
            <div class="t_menu_img"></div>
            <div class="Category"><a href="#"><em></em>所有产品分类</a></div>
            <div class="hd_allsort_out_box_new">
                <!--左侧栏目开始-->
                <ul class="Menu_list">


                    
                    <?php if(is_array($Cate)): foreach($Cate as $k1=>$val1): ?><li class="name" style="padding-bottom: 0">
                        <span class="Menu_name">
                            <!-- 顶级分类 -->
                            <a href="<?php echo U('Goods/goodsList',array('id1'=>$val1['id']));?>" style="text-size:1px"><?php echo ($val1['catename']); ?></a> <span>&lt;</span></span>


                        <div class="link_name" style="height: 65px; overflow: hidden;text-overflow: ellipsis">


                            <?php if(is_array($Cate[$k1]['c'])): foreach($Cate[$k1]['c'] as $k3=>$val3): if(is_array($Cate[$k1]['c'][$k3]['c'])): $k4 = 0; $__LIST__ = $Cate[$k1]['c'][$k3]['c'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($k4 % 2 );++$k4;?><span><a href="<?php echo U('Goods/goodsList',array('id3'=>$val4['id']));?>"><?php echo ($val4["catename"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
                        </div>
                        <div class="menv_Detail" style="height: 623px; z-index: 9999;">
                            <div class="cat_pannel clearfix">
                                <div class="hd_sort_list">
                                    <?php if(is_array($Cate[$k1]['c'])): foreach($Cate[$k1]['c'] as $k3=>$val3): ?><dl class="clearfix" data-tpc="1">
                                        <!--二级分类-->
                                       <dt><a href="<?php echo U('Goods/goodsList',array('id2'=>$val3['id']));?>"><?php echo ($val3['catename']); ?></a></dt>
                                            <!-- 三级分类 -->
                                            <?php if(is_array($Cate[$k1]['c'][$k3]['c'])): $k4 = 0; $__LIST__ = $Cate[$k1]['c'][$k3]['c'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($k4 % 2 );++$k4;?><dd><a href="<?php echo U('Goods/goodsList',array('id3'=>$val4['id']));?>"><?php echo ($val4["catename"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </dl><?php endforeach; endif; ?>
<!--///////-->
                                </div>
                                <div class="Brands" style="">
                                    <?php if(is_array($Cate[$k1]['g'])): $k = 0; $__LIST__ = $Cate[$k1]['g'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" name="a" style="height: 140px;width: 140px"><img src="/uploads/n0/<?php echo reset(explode(',',$val['image']));?>" style="width: 100%;height: 100%"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                            <!--品牌-->
                        </div>
                    </li><?php endforeach; endif; ?>

                </ul>
            </div>
        </div>
        <script>
            if(!($("a[name='a']").children('img').attr("src"))){
                $("img").remove();
            }
        </script>
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
                
            </ul>
        </div>
        <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
    </div>
</div>
</div>
<div class="Slide_style" >

   	<div id="slideBox" class="slideBox">
			<div class="hd">
				<ul class="smallUl"></ul>
			</div>
			<div class="bd">
				<ul>
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valn): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/goodsList',array('id1'=>5));?>" target="_self"><div style="background:url(/uploads/AdImgs/<?php echo ($valn["image"]); ?>) no-repeat; background-position:center; width:100%; height:645px; background-size:100% 100%"></div></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
			<a class="prev" href="javascript:void(0)"><em class="left_arrow"></em></a>
			<a class="next" href="javascript:void(0)"><em class="right_arrow"></em></a>

		</div>
		<script type="text/javascript">
		jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,delayTime:500,interTime:5000});
		</script>
 </div>

<div class="index_style clearfix">
 <!--推荐图层样式-->
  <div class="recommend">
   <div class="recommend_bg"></div>
   <div class="list">
     <div class="picScroll">
        <div class="hd">
        <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
        </div>
        <div class="bd">
          <ul>
              <?php if(is_array($tj)): $k = 0; $__LIST__ = $tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="recommend_info">
                      <!--<a href="#" class="img_link"><img src="/Shop/Public/Home/imgs/Products/x-1.jpg"  width="130px" height="130px"/></a>-->
                      <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="img_link"><img src="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>"  width="130px" height="130px"/></a>
                      <div class="content">
                          <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="title_name"><?php echo ($val["goodsname"]); ?></a>
                          <h2><i>￥</i><?php echo ($val["saleprice"]); ?></h2>
                      </div>
                      <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="buy_btn"> 立即购买</a>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
           
          </ul>
        </div>
     </div>
     <script>jQuery(".picScroll").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:4});</script>
   </div>
  </div>
  <!--品牌列表样式-->
  <div class="Brand clearfix AA">
   <div class="title_name"><span>品牌库</span><span class="English">BRANDS LIBRARIES</span></div>
   <div class="img_title">
     <div class="img_title_name">
      <h1>大品牌，大智慧</h1>
      <h2>优质品牌，精选品牌</h2>
     </div>
     </div>
    <div class="Brand_style">
     <div class="hd">
      <ul>
       <li>女装品牌</li>
       <li>男装品牌</li>
       <li>外国品牌</li>
       <li>国内品牌</li>
      </ul>
     </div>
     <div class="bd">
      <ul>
          <li>
              <?php if(is_array($female)): $k = 0; $__LIST__ = $female;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Goods/goodsList',array('id'=>$v1['id']));?>"  style="margin-left:25px;width:146px;height:90px"><img src="/uploads/logo/<?php echo ($v1["logo"]); ?>"  width="125" height="38" style="margin:30px 0 0 30px;"/></a><?php endforeach; endif; else: echo "" ;endif; ?>

              <!--<a href="#"><img src="/Shop/Public/Home/imgs/Brand/p-20.jpg" width="125" height="38"/></a>-->
          </li>
      </ul>
         <ul>
             <?php if(is_array($man)): $k = 0; $__LIST__ = array_slice($man,0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Goods/goodsList',array('id'=>$v2['id']));?>"  style="margin-left:25px;width:146px;height:90px"><img src="/uploads/logo/<?php echo ($v2["logo"]); ?>"  width="125" height="38" style="margin:30px 0 0 30px;"/></a><?php endforeach; endif; else: echo "" ;endif; ?>

         </ul>

         <ul>
<!--///-->
             <?php if(is_array($home)): $k = 0; $__LIST__ = array_slice($home,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Goods/goodsList',array('id'=>$v4['id']));?>"  style="margin-left:25px;width:146px;height:90px"><img src="/uploads/logo/<?php echo ($v3["logo"]); ?>"  width="125" height="38" style="margin:30px 0 0 30px;"/></a>
<!--=======--><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
         <ul>
                 <?php if(is_array($external)): $k = 0; $__LIST__ = array_slice($external,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v4): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Goods/goodsList',array('id'=>$v4['id']));?>"  style="margin-left:25px;width:146px;height:90px"><img src="/uploads/logo/<?php echo ($v4["logo"]); ?>"  width="125" height="38" style="margin:30px 0 0 30px;"/></a>
<!--/////--><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
     </div>
    </div>
    <script>jQuery(".Brand_style").slide({trigger:"click"});</script>
  </div>
  <!--产品版块样式图层-->
  <div class="Product_area clearfix">
   <div class="area_title"><div class="name"><span class="floors">1F</span>男装女装</div></div>
   <div class="list_style clearfix">
    <div class="Left_side">
     <ul>
         <?php if(is_array($goods)): $k3 = 0; $__LIST__ = array_slice($goods,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val3['image']));?>" width="219px" height="219px"/>

          </a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
          
     </ul>
    </div>
    <div class="middle">
     <!--广告-->
      <div class="hd">
         <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
      </div>
      <div class="bd">
      <ul>
          <?php if(is_array($first)): $i = 0; $__LIST__ = $first;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/goodsList',array('id1'=>1));?>"><img src="/uploads/AdImgs/<?php echo reset(explode(',',$v1['image']));?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div>
    </div>
    <script type="text/javascript">
		jQuery(".middle").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:7000});
		</script>
     <div class="Left_side">
     <ul>
         <?php if(is_array($goods)): $k3 = 0; $__LIST__ = array_slice($goods,8,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val3['image']));?>" width="219px" height="219px"/>

           </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
     
     </ul>
    </div>
    <div class="advertising">
        <?php if(is_array($goods)): $k3 = 0; $__LIST__ = array_slice($goods,4,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
         <!--<div style="">-->
             <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
             <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
             <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
         <!--</div>-->
         <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
              style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
         <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
     </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
     <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-8.jpg" width="219" height="150"/></a>-->

     <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="da_AD" style="text-align: left">
         <?php if(is_array($goods)): $k3 = 0; $__LIST__ = array_slice($goods,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?> " width="159" height="150"/><?php endforeach; endif; else: echo "" ;endif; ?>
     </a>

     <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-10.jpg" width="219" height="150"/></a>-->
        <?php if(is_array($goods)): $k3 = 0; $__LIST__ = array_slice($goods,11,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
         <!--<div style="">-->
             <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
             <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
             <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
         <!--</div>-->
         <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
              style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
         <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
     </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--品牌-->
    <div class="Brand_Gallery">
        <?php if(is_array($logoinfo)): $k = 0; $__LIST__ = array_slice($logoinfo,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><a href="#"><img class='lazy' src="/Shop/Public/Home/imgs/big/1.gif" data-original="/uploads/logo/<?php echo ($val['logo']); ?>" width="120" height="32"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
   </div>
  </div>
    <!--产品版块样式图层-->
  <div class="Product_area clearfix">
   <div class="area_title"><div class="name"><span class="floors">2F</span>男鞋女鞋</div></div>
   <div class="list_style clearfix">
    <div class="Left_side">
     <ul>
         <?php if(is_array($goods2)): $k = 0; $__LIST__ = array_slice($goods2,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>" width="219px" height="219px"/>

      </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            
     </ul>
    </div>
    <div class="middle">
     <!--广告-->
      <div class="hd">
         <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
      </div>
      <div class="bd">
      <ul>
          <?php if(is_array($secend)): $i = 0; $__LIST__ = $secend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/goodsList',array('id1'=>4));?>"><img src="/uploads/AdImgs/<?php echo reset(explode(',',$v2['image']));?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div>
    </div>
    <script type="text/javascript">
		jQuery(".middle").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:7000});
		</script>
     <div class="Left_side">
     <ul>
         <?php if(is_array($goods2)): $k = 0; $__LIST__ = array_slice($goods2,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>" width="219px" height="219px"/>

       </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        
     </ul>
    </div>
       <div class="advertising">
           <?php if(is_array($goods2)): $k3 = 0; $__LIST__ = array_slice($goods2,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                  <!--<div style="">-->
                      <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                      <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                      <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                  <!--</div>-->
                  <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                       style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                  <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
              </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-8.jpg" width="219" height="150"/></a>-->

               <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="da_AD">
                   <?php if(is_array($goods2)): $k3 = 0; $__LIST__ = array_slice($goods2,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val3['image']));?> " width="159" height="150"/><?php endforeach; endif; else: echo "" ;endif; ?>
               </a>

           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-10.jpg" width="219" height="150"/></a>-->
           <?php if(is_array($goods2)): $k3 = 0; $__LIST__ = array_slice($goods2,3,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                   <!--<div style="">-->
                       <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                       <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                       <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                   <!--</div>-->
                   <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                        style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                   <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
               </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
    <!--品牌-->
    <div class="Brand_Gallery">
        <?php if(is_array($logoinfo2)): $k = 0; $__LIST__ = array_slice($logoinfo2,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($k % 2 );++$k;?><a href="#"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/logo/<?php echo ($val2['logo']); ?>" width="120" height="32"/></a><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
   </div>
  </div>
    <!--产品版块样式图层-->
  <div class="Product_area clearfix">
   <div class="area_title"><div class="name"><span class="floors">3F</span>箱包大全</div></div>
   <div class="list_style clearfix">
    <div class="Left_side">
     <ul>
         <?php if(is_array($goods3)): $k = 0; $__LIST__ = array_slice($goods3,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>"  width="219px" height="219px"/>

      </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      
     </ul>
    </div>
    <div class="middle">
     <!--广告-->
      <div class="hd">
         <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
      </div>
      <div class="bd">
      <ul>
          <?php if(is_array($three)): $i = 0; $__LIST__ = $three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/goodsList',array('id1'=>5));?>"><img src="/uploads/AdImgs/<?php echo reset(explode(',',$v3['image']));?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div>
    </div>
    <script type="text/javascript">
		jQuery(".middle").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:7000});
		</script>
     <div class="Left_side">
     <ul>
         <?php if(is_array($goods3)): $k = 0; $__LIST__ = array_slice($goods3,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>"  width="219px" height="219px"/>

       </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    
     </ul>
    </div>
       <div class="advertising">
           <?php if(is_array($goods3)): $k3 = 0; $__LIST__ = array_slice($goods3,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                   <!--<div style="">-->
                       <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                       <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                       <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                   <!--</div>-->
                   <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                        style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                   <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
               </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-8.jpg" width="219" height="150"/></a>-->

               <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="da_AD">
                   <?php if(is_array($goods3)): $k3 = 0; $__LIST__ = array_slice($goods3,5,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val3['image']));?> " width="159" height="150"/><?php endforeach; endif; else: echo "" ;endif; ?>
               </a>

           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-10.jpg" width="219" height="150"/></a>-->
           <?php if(is_array($goods3)): $k3 = 0; $__LIST__ = array_slice($goods3,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                  <!--<div style="">-->
                      <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                      <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                      <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                  <!--</div>-->
                  <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                       style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                  <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
              </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
    <!--品牌-->
    <div class="Brand_Gallery">
        <?php if(is_array($logoinfo3)): $k = 0; $__LIST__ = array_slice($logoinfo3,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k % 2 );++$k;?><a href="#"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/logo/<?php echo ($val3['logo']); ?>" width="120" height="32"/></a><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
   </div>
  </div>
     <!--产品版块样式图层-->
  <div class="Product_area clearfix">
   <div class="area_title"><div class="name"><span class="floors">4F</span>精品配饰</div></div>
   <div class="list_style clearfix">
    <div class="Left_side">
     <ul>
         <?php if(is_array($goods4)): $k = 0; $__LIST__ = array_slice($goods4,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val4['id']));?>" class="avatar"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val4['image']));?>"  width="219px" height="219px"/>
          <!--<div><?php echo ($val4["goodsname"]); ?></div>-->
          <!--<div><span>￥</span><?php echo ($val4["saleprice"]); ?></div>-->
          <!--<div class="Layers"><img src="/Shop/Public/Home/imgs/images/bg_img.png" /></div>-->
      </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          
     </ul>
    </div>
    <div class="middle">
     <!--广告-->
      <div class="hd">
         <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
      </div>
      <div class="bd">
      <ul>
          <?php if(is_array($four)): $i = 0; $__LIST__ = $four;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v4): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Goods/goodsList',array('id1'=>6));?>"><img src="/uploads/AdImgs/<?php echo reset(explode(',',$v4['image']));?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div>
    </div>
    <script type="text/javascript">
		jQuery(".middle").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:7000});
		</script>
     <div class="Left_side">
     <ul>
         <?php if(is_array($goods4)): $k = 0; $__LIST__ = array_slice($goods4,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($k % 2 );++$k;?><li class="tv_hot fl"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val4['id']));?>" class="avatar"><img  class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val4['image']));?>"  width="219px" height="219px"/>
           <!--<div><?php echo ($val4["goodsname"]); ?></div>-->
           <!--<div><span>￥</span><?php echo ($val4["saleprice"]); ?></div>-->
           <!--<div class="Layers"><img src="/Shop/Public/Home/imgs/images/bg_img.png"  width="219" height="219"/></div>-->
       </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            
     </ul>
    </div>
       <div class="advertising">
           <?php if(is_array($goods4)): $k3 = 0; $__LIST__ = array_slice($goods4,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                  <!--<div style="">-->
                      <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                      <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                      <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                  <!--</div>-->
                  <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                       style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                  <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
              </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-8.jpg" width="219" height="150"/></a>-->

               <a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?>" class="da_AD">
                   <?php if(is_array($goods4)): $k3 = 0; $__LIST__ = array_slice($goods4,6,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n1/<?php echo reset(explode(',',$val3['image']));?> " width="159" height="150"/><?php endforeach; endif; else: echo "" ;endif; ?>
               </a>

           <!--<a href="#"><img src="/Shop/Public/Home/imgs/Products/AD-10.jpg" width="219" height="150"/></a>-->
           <?php if(is_array($goods4)): $k3 = 0; $__LIST__ = array_slice($goods4,3,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($k3 % 2 );++$k3;?><span class="tv_hot2"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val3['id']));?> "  style="text-align: right;position: relative" class="avatar2">
                 <!--<div style="">-->
                     <!--<p style="text-align: left;margin-top: 20px;">￥</p>-->
                     <!--<p style="text-align: left;"><span style="font-size: 18px"><?php echo ($val3["saleprice"]); ?></span></p>-->
                     <!--<p style="text-align: left;margin-top: 30px;background-color:#e7e7e7;height: 50px;text-align: center;padding-top:10px;"><?php echo ($val3["goodsname"]); ?></p>-->
                 <!--</div>-->
                 <img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/n0/<?php echo reset(explode(',',$val3['image']));?>"  width="220" height="150"
                      style="transition: transform .5s,-webkit-transform .5s,-moz-transform .5s;
              overflow: hidden;
  position: absolute;
  right: 0px;
  top: 0px;"/>
                 <!--<span style="position: absolute;top:50px"><?php echo ($val3["goodsname"]); ?></span><span style="position: absolute;top:90px"><?php echo ($val3["goodsname"]); ?></span>-->
             </a></span><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
    <!--品牌-->
    <div class="Brand_Gallery">
        <?php if(is_array($logoinfo4)): $k = 0; $__LIST__ = $logoinfo4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($k % 2 );++$k;?><a href="#"><img class='lazy' src="/Shop/Public/Home/imgs/big/3.gif" data-original="/uploads/logo/<?php echo ($val4['logo']); ?>" width="120" height="32"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
   </div>
  </div>
  <!--热销-->
<div id="showcase" class="advanced">
	<div id="guessyou" class="m"><div class="mt"><h2>猜你喜欢</h2><a href="javascript:;" class="extra">更多</a></div>
    <div class="mc"><div class="spacer"><i></i></div>
    <ul id="lists">
        <?php if(is_array($Show)): $k = 0; $__LIST__ = $Show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li class="fore1">
     <div class="p-img">
     <a data-clk="" href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" target="_blank"><img data-lazy-img="done" width="190" height="190" title="<?php echo ($val["goodsname"]); ?>" src="/uploads/n1/<?php echo reset(explode(',',$val['image']));?>" class="" width="219px" height="219px"></a>
     </div>
     <div class="p-info">
      <div class="p-name">
      <a style="display: block;text-align: center;" data-clk="" href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" target="_blank" title="<?php echo ($val["goodsname"]); ?>"><?php echo ($val["goodsname"]); ?></a></div>
      <!--<div class="p-price" data-lazyload-fn="done">-->
          <!--&lt;!&ndash;<span class="left"><i>¥</i><?php echo ($val["markprice"]); ?></span><span class="Original_Price"><?php echo ($val["saleprice"]); ?></span>&ndash;&gt;-->
      <!--</div>-->
      </div>
      <div class="Detailed" style="display: none;">
	   <div class="content">
		  <p class="center"><a href="<?php echo U('Goods/goodsDetail',array('id'=>$val['id']));?>" class="Buy_btn">立即购买</a></p>
		  </div>
	   </div>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
     
       </ul>
      </div>
     </div>
     </div>
</div>
<div>
    <ul id="nav">
        <li>1F<span style="display: inline-block;" class="curr">1楼</span></li>
        <li>2F<span>2楼</span></li>
        <li>3F<span>3楼</span></li>
        <li>4F<span>4楼</span></li>
        <li id="one_piece" style="background: #808080;line-height:55px " >TOP</li>
    </ul>
</div>
<div id="pop" style="display:none;margin-right: 75px">
    <div id="pop_head">
        <a id="popClose" title="关闭">关闭</a>
        <h2>520私库广告</h2>
    </div>
    <div id="pop_content">
        <a href="<?php echo U('Goods/goodsList',array('id1'=>5));?>" target="_blank"><img src="/uploads/AdImgs/<?php echo reset(explode(',',$v3['image']));?>" style="width: 300px;height: 280px" alt="广告"/></a>
    </div>
</div>
<script type="text/javascript">
            var int = new Pop();
</script>
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
</body>
</html>