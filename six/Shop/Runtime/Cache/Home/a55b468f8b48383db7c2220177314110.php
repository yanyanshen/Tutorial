<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Shop/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/address1.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/address2.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
<!--<script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>-->
<script src="/Shop/Public/Home/js/layer.js" type="text/javascript"></script>
<title>确认订单界面</title>
</head>
<style type="text/css">
    .shade_content{
        display: none;
    }
    .list{
        border: 2px darkgrey solid;
        height: 246px;
        margin-left: 10px;
    }
    .adderss_list{
        height: 286px;
        overflow: hidden;
        position: relative;
    }
    .adderss_list:hover .list .hd{display: block}
    .list .hd{display: none}
    .list .hd .prev,.list .hd .next{
        position:absolute;
        left:0px;
        top:50%;
        z-index: 999;
        color:#FFF;
        line-height:70px;
        font-size:18px;
        text-align:center;
        font-family:"新宋体";
        font-weight: bold;
        margin-top:-25px;
        width:30px;
        height:70px;
        background-color: #0F8EEC;
        filter:alpha(opacity=50);
        opacity:0.5;
    }
    .list .hd .next{ left:auto; left:1120px; background-position:8px 5px; }
    .list .hd .prev:hover, .list .hd .next:hover{ filter:alpha(opacity=100);opacity:1;  }
    .defaul_btn{
        font-size: 16px;
        color: white;
        float: left;
        padding-top: 10px;
    }
    .defaul_btn_show{
        display: none;
    }
</style>
 <script type="text/javascript">
        $(function(){
           $(".next").click(function(){
               $(".list").animate({marginLeft:"-360px"},1000,function(){
                   $(".list ul").eq(0).appendTo($(".list"));
                   $(this).css("marginLeft","0")
               })
           });
            $(".prev").click(function(){
                $(".list ul:last").prependTo($(".list"));
                $(".list").css("marginLeft","-360px");
                $(".list").animate({marginLeft:0},1000);
            });
        });
        //设置默认地址
        $(function(){
            $('.defaul_btn').click(function(){
                var id=$(this).next().text();
                var a=$(this);
                $.post("<?php echo U('Orders/defaultAddress');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg("设置成功",{time:500});
                        a.parent('.Operate').parent('.adderss_operating').parent('.confirm')
                                .prepend("<div class='default'>默认地址</div>");
                        a.parent().parent().parent().siblings().children("div:contains('默认地址')").detach();
                    }else{
                        layer.msg("设置失败",{time:500});
                    }
                })

            })
        })


        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });



    </script>
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


<div id="Orders" class="Inside_pages  clearfix">
<div class="Process"></div>
  <div class="Orders_style clearfix">
     <div class="address clearfix">
       <div class="title">收货人信息</div>
          <div class="adderss_list clearfix">
            <div class="title_name">选择收货地址 <a href="javascript:;" class="addAddress" onclick="onclick_open()">+使用新地址</a></div>
            <div class="list" id="select">
                <div class="hd">
                    <a class="prev" href="javascript:void(0)">&lt;</a>
                    <a class="next" href="javascript:void(0)">&gt;</a>
                </div>
                <?php if(is_array($addressList)): $i = 0; $__LIST__ = $addressList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul class="confirm">
                        <div class="adderss_operating">
                         <div style="display: none"><?php echo ($val["id"]); ?></div>
                         <div class="Operate">
                             <a href="javascript:;" class="delete_btn"></a><div style="display: none;"><?php echo ($val["id"]); ?></div>
                             <a href="javascript:;" class="modify_btn"></a><div style="display: none;"><?php echo ($val["id"]); ?></div>
                             <a href="javascript:;" class="defaul_btn">设为默认</a><div style="display: none;"><?php echo ($val["id"]); ?></div>
                         </div>
                        </div>
                        <div class="user_address">
                            <li><?php echo ($val["name"]); ?></li>
                            <li><?php echo ($val["address"]); echo ($val["detailaddress"]); ?></li>
                            <li class="Postcode"><?php echo ($val["code"]); ?></li>
                            <li><?php echo ($val["mobile"]); ?></li>
                        </div>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
           </div>
      <!--收货地址样式-->
    <!-- <div class="Shipping_address">
       <ul class="detailed">
        <li><label>收货人姓名</label><span>张晓</span></li>
        <li><label>电子邮件</label><span>4567454@qq.com</span></li>
        <li><label>详细地址</label><span>四川成都武侯区簇景西路20号3栋1单元302号</span></li>
        <li><label>邮政编码</label><span></span></li>
        <li><label>移动电话</label><span></span></li> 
         <li><label>固定电话</label><span></span></li>        
       </ul>
     </div>-->
     </div>       
        <form class="form" method="post">  
        <fieldset> 
     <!--快递选择-->
     <div class="express_delivery">
       <div class="title_name">选择快递方式</div>
    
        <ul class="dowebok">
        <li><input type="radio" name="radio" data-labelauty="韵达快递" value="韵达快递">
          <div class="description">
           <em class="arrow"></em>
           <p>免费</p>
           <p>资费：<em>0</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
           <!--<p><a href="#">点击查看是否在配送范围内</a></p>-->
          </div>
        </li>
        <li>
            <input type="radio" name="radio" data-labelauty="中通快递" value="中通快递">
            <div class="description">
               <em class="arrow"></em>
               <p>需要额外支付5元运费</p>
               <p>资费：<em>5</em>元</p>
            </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="申通快递" value="申通快递">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="邮政EMS" value="邮政EMS">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="圆通快递" value="圆通快递">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="国通快递" value="国通快递">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="顺丰快递" value="顺丰快递">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付20元运费</p>
             <p>资费：<em>20</em>元</p>
           <!--<p class="Note">满88元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="邮政小包" value="邮政小包">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        <li><input type="radio" name="radio" data-labelauty="天天快递" value="天天快递">
         <div class="description">
           <em class="arrow"></em>
             <p>需要额外支付5元运费</p>
             <p>资费：<em>5</em>元</p>
           <!--<p class="Note">满68元包邮</p>-->
          </div>
        </li>
        </ul>       
      
     </div>
    
     <!--付款方式-->
     <div class="payment">
      <div class="title_name">支付方式</div>
       <ul>
        <li><input type="radio" name="radio1" data-labelauty="余额支付" value="余额支付"></li>
        <!--<li><input type="radio" name="radio1" data-labelauty="支付宝"></li>
        <li><input type="radio" name="radio1" data-labelauty="财付通"></li>
        <li><input type="radio" name="radio1" data-labelauty="银联支付"></li>
         <li><input type="radio" name="radio1" data-labelauty="货到付款"></li>-->
       </ul>
     </div>
      <!--发票样式-->
     <!--<div class="invoice_style">
       <ul>
         <li class="invoice_left"><input name="" type="checkbox" value="" data-labelauty="是否开发票"/> </li>
         <li class="invoice_left"><select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
              <option disabled="disabled" selected="selected">发票类型</option>
              <option value="办公用品">办公用品</option>
              <option value="食品">食品</option>
              <option value="20元红包">20元红包</option>
              <option value="50元红包">50元红包</option>
              <option value="100元红包">100元红包</option>
              <option value="200元红包">200元红包</option>
            </select>
         </li>
         <li class="invoice_left">发票抬头
         <input name="" type="text" class="text_info" /></li>
         <li class="invoice_left">
         <select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
              <option disabled="disabled" selected="selected">发票内容</option>
              <option value="办公用品">办公用品</option>
              <option value="食品">食品</option>
              <option value="数码配件">数码配件</option>
              <option value="电脑">电脑</option>
              <option value="手机">手机</option>
              <option value="200元红包">200元红包</option>
            </select>
         
         </li>
        </ul>
     </div>-->
     <!--红包列表-->
     <div class="Product_List">
     <!--<div class="envelopes">
     选择已有红包<select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                    <option disabled="disabled" selected="selected">选择红包金额</option>
                    &lt;!&ndash;placeholder&ndash;&gt;
                    <option value="5元红包">5元红包</option>
                    <option value="10元红包">10元红包</option>
                    <option value="20元红包">20元红包</option>
                    <option value="50元红包">50元红包</option>
                    <option value="100元红包">100元红包</option>
                    <option value="200元红包">200元红包</option>
                </select>
                或者输入红包序列号<input name="" type="text" class="text_number" /><input type="submit"  class="verification_btn" value="验证序列号"/>
     </div>-->
         <!--商品-->
      <table>
       <thead><tr class="title"><td class="name">商品名称</td><td class="price">商品价格</td><td class="Preferential">优惠价</td><td class="Quantity">购买数量</td><td class="Money">金额</td></tr></thead>
       <tbody>
       <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><tr>
                <td class="Product_info">
                 <a href="#"><img src="/uploads/n2/<?php echo (array_shift(explode(',',$goods["image"]))); ?>"  width="100px" height="100px"/></a>
                 <a href="#" class="product_name" style="text-align: center;line-height: 100px"><?php echo ($goods["goodsname"]); ?></a>
                 </td>
                <td><i>￥</i><?php echo ($goods["saleprice"]); ?></td>
                <td><i>￥</i><?php echo ($goods["saleprice"]); ?></td>
                <td id="buynum"><?php echo ($goods["buynum"]); ?></td>
                <td class="Moneys"><i>￥</i><?php echo ($goods[saleprice]*$goods["buynum"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       </tbody>
      </table>
         <!--留言-->
      <div class="Pay_info">
       <label>订单留言</label><input name="message" value="" type="text"  onkeyup="checkLength(this);" class="text_name " />  <span class="wordage">剩余字数：<span id="sy" style="color:Red;">50</span></span>
      </div>
      <!--价格-->
      <div class="price_style">
      <div class="right_direction">
        <ul>
         <li><label>商品总价</label><i>￥</i><span class="total"><?php echo ($goodsList[0]["prices"]); ?></span></li>
         <li><label>优惠金额</label><i>￥</i><span>00.00</span></li>
         <li><label>配&nbsp;&nbsp;送&nbsp;&nbsp;费</label><i>￥</i><span class="youfei">0</span></li>
         <li class="shiji_price"><label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label><i>￥</i><span><?php echo ($goodsList[0]["prices"]); ?></span></li>
        </ul>   
        <div class="btn">
            <div style="display: none"><?php echo ($goodsList[0][oid]); ?></div>
            <input name="" type="button" value=""  class="return_btn" style="background: white;cursor: default"/>
            <input name="submit" type="button" value="提交订单" class="submit_btn"/>

        </div>
         <div class="integral right">待订单确认后，你将获得<span><?php echo ($goodsList[0]['prices']/10); ?></span>积分</div>
      </div>
      </div>
     </div>  
     </fieldset>
        </form>
  </div>
</div>

</div>
  <!--底部样式-->

  <!--底部-->
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



<!--弹窗添加收货地址-->
<div class="shade_content">
    <div class="col-xs-12 shade_colse">
        <button onclick="javascript:onclick_close();">x</button>
    </div>
    <div class="nav shade_content_div">
        <div class="col-xs-12 shade_title">
            新增收货地址
        </div>
        <div class="col-xs-12 shade_from">
            <form action="<?php echo U('Member/addAddress');?>" method="post" id="formAddress">
                <div class="col-xs-12">
                    <span style="color: red">*</span>
                    <span class="span_style" >地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区</span>
                    <input class="input_style" type="" name="address" id="region" value="<?php echo ($address); ?>" placeholder="&nbsp;&nbsp;请输入您的所在地区" />
                    <span style="color: red"></span>
                </div>
                <div class="col-xs-12">
                    <span style="color: red">*</span>
                    <span class="span_style" >详细地址</span>
                    <input class="input_style" type="" name="detailaddress" id="address" value="" placeholder="&nbsp;&nbsp;请输入您的详细地址" />
                    <span style="color: red"></span>
                </div>
                <div class="col-xs-12">
                    <span class="span_style" >邮政编号</span>
                    <input class="input_style" type="" name="code" id="number_this" value="" placeholder="&nbsp;&nbsp;请输入您的邮政编号" />
                </div>
                <div class="col-xs-12">
                    <span style="color: red">*</span>
                    <span class="span_style" class="span_sty" >姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
                    <input class="input_style" type="" name="name" id="name_" value="" placeholder="&nbsp;&nbsp;请输入您的姓名" />
                    <span style="color: red"></span>
                </div>
                <div class="col-xs-12">
                    <span style="color: red">*</span>
                    <span class="span_style" id="">手机号码</span>
                    <input class="input_style" type="" name="mobile" id="phone" value="" placeholder="&nbsp;&nbsp;请输入您的手机号码" />
                    <span style="color: red"></span>
                </div>
                <div class="col-xs-12">
                    <span style="color: red;">带&nbsp;*&nbsp;的为必填选项</span>
                </div>
                <div class="col-xs-12">
                    <input class="btn_remove" type="button"  onclick="javascript:onclick_close();" value="取消" />
                    <input type="button" class="sub_set" id="sub_setID" value="保存" />
                </div>
            </form>
        </div>
    </div>
</div>


<script src="/Shop/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>
<!--字段必填验证-->
<script type="text/javascript">
    $(function(){
        $("#sub_setID").click(function(){
            var username=$(".login_name").children().text();
            if(username==''){
                alert('请登录');
            }else{
                if ($("input[name='address']").val() == '') {
                    $("input[name='address']").next().text("请填写收货地区");
                };
                if($("input[name='detailaddress']").val()==''){
                    $("input[name='detailaddress']").next().text("请填写详细地址");
                };
                if($("input[name='name']").val()==''){
                    $("input[name='name']").next().text("请填写收件人姓名");
                };
                if($("input[name='mobile']").val()==''){
                    $("input[name='mobile']").next().text("请填写正确的联系方式");
                }
            }
        })
        $("input[name='address1']").live('blur',function() {
            if ($(this).val() == '') {
                $(this).next().text("请填写收货地区");
            } else {
                $(this).next().text("");
            }
        })
        $("input[name='detailaddress']").live('blur',function() {
            if($(this).val()==''){
                $(this).next().text("请填写详细地址");
            } else {
                $(this).next().text("");
            }
        })
        $("input[name='name']").live('blur',function() {
            if($(this).val()==''){
                $(this).next().text("请填写收件人姓名");
            } else {
                $(this).next().text("");
            }
        })
        $($("input[name='mobile']")).live('blur',function() {
            if($(this).val()==''){
                $(this).next().text("请填写联系方式");
            } else {
                $(this).next().text("");
            }
        })

    })
</script>

<script type="text/javascript">
    $(".dowebok li").click(function(){
        var youfei=$(this).children("div").children("p").children().text();
        $(".youfei").text(youfei);
        var totalprice=$('.total').text();
        $('.shiji_price span').text(totalprice*1+youfei*1);
    })
</script>
<!--收货地址管理-->
<script type="text/javascript">
    //添加收货地址关闭
    function onclick_close() {
        var shade_content = $(".shade_content");
        var shade = $(".shade");
        layer.confirm('确认关闭么！该收货信息将不会保存', {
                    btn:['确定','取消']
                },function(){
                    layer.closeAll();
                    shade_content.hide();
                    shade.hide();
                },function(){
                }
        )
    };
    //打开收货地址
    function onclick_open() {
        $("input[name='address']").val('')
        $("input[name='detailaddress']").val('')
        $("input[name='code']").val('')
        $("input[name='name']").val('')
        $("input[name='mobile']").val('')
        $("input[name='id']").detach();
        $(".shade").show();
        var input_out = $(".input_style");
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: false,
            skin: 'yourclass',
            content: $('.shade_content')
        });

    };

    //添加收货地址
    $(function(){
        $("#sub_setID").click(function(){
            $.post("<?php echo U('Orders/addAddress');?>",$("#formAddress").serialize(),function(res){

                if(res.status==1){
                    layer.confirm("更换收货地址后您需要重新确认订单",{
                        btn:['确定','取消']
                    },function(){
                        location.reload();
                    },function(){})

                }else if(res.status==0){
                    layer.msg("添加失败,请检查填写是否正确",{icon:7});
                }
            })
        })
    });
    //第一个默认选中
    $(function(){
        $('.list ul').eq(0).addClass("active");
        $('.list ul').eq(0).prepend("<div class='default'>默认地址</div>");
    });
    //删除收货地址
    $(function(){
        $(".delete_btn").click(function(){
            var id=$(this).next().text();
            layer.confirm("确认删除该收货地址？",{btn:['删除','取消']},function(){

                $.post("<?php echo U('Orders/delAddress');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg("删除成功",{icon:5});
                        location.reload();
                    }else{
                        layer.msg("删除失败，请稍候再试",{icon:4})
                    }
                })
            })

        })
    });
    //修改收货地址
    $(".modify_btn").click(function(){
        var id=$(this).next().text();
        $("#formAddress").prepend("<input type='hidden' name='id' value='"+id+"'/>");
        $.post("<?php echo U('Orders/updateAddress');?>",{id:id},function(res){
            $("input[name='address']").val(res['address'])
            $("input[name='detailaddress']").val(res['detailaddress'])
            $("input[name='code']").val(res['code'])
            $("input[name='name']").val(res['name'])
            $("input[name='mobile']").val(res['mobile'])


            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: false,
                skin: 'yourclass',
                content: $('.shade_content')
            })
        },'json')
    })



 //添加收货地址结束

 //提交订单
    $(function(){
        $('.submit_btn').click(function(){

            var message = $("input[name='message']").val();
            var deliver = $("input:radio:checked").val();
            var oid = $("input[name='submit']").prev().prev().text();
            var aid = $(".active .adderss_operating").children().eq(0).text();
            var money = $('.shiji_price span').text();
            var jifen = $('.integral span').text();
            //先判断是否设置了支付密码
            $.post("<?php echo U('Orders/ispaypwd');?>",function(res){
                //如果已经设置了
                if(res.status==1){
                    var a=$(".Postcode").prev().text();
                    var b=$("input[name='radio1']:checked").val();
                    if(a){  //选择收货地址
                        if(b) {  //选择付款方式
                            $.post("<?php echo U('Orders/addorders');?>", {message: message, deliver: deliver, aid: aid, oid: oid},
                                    function (res) {
                                        if (res.status == 1) {
                                            layer.load(2, {time: 800});
                                            setTimeout(a, 800);
                                            function a() {
                                                layer.prompt({
                                                    title: '输入支付密码，并确认',
                                                    formType: 1 //prompt风格，支持0-2
                                                }, function (pwd) {
                                                    $.post("<?php echo U('Orders/payorders');?>", {pwd: pwd, money: money, jifen: jifen,oid:oid}, function (res)
                                                    {
                                                        if (res == 0) {
                                                            layer.load();
                                                            setTimeout(b, 800);
                                                            function b() {
                                                                location.href = "<?php echo U('Orders/ordersfinish');?>"
                                                            }
                                                        } else if (res == 2) {
                                                            layer.msg("密码错误，今天还有两次机会", {icon: 2});
                                                        } else {
                                                            layer.confirm("余额不足", {btn: ['去充值', '放弃付款']}, function () {
                                                                location.href = "<?php echo U('Member/memberCZ');?>?oid="+oid;
                                                            })
                                                            $(".layui-layer-btn1").click(function(){location.href = "<?php echo U('Member/memberOrderlist');?>";})
                                                        }
                                                    })

                                                })
                                                $(".layui-layer-btn1").click(function(){location.href = "<?php echo U('Member/memberOrderlist');?>";})
                                            }

                                        }
                                        else {
                                            location.reload
                                        }

                                    })
                        }else{
                            layer.msg("请选择支付方式",{icon:7})
                        }
                    }else{
                        layer.msg("请选择收货地址",{icon:7})
                    }
                }else{   //如果没有支付密码，前去设置
                    layer.confirm(res.info,{btn:['设置','取消']},function(){
                        location.href = "<?php echo U('Member/memberEdit');?>?oid="+oid;
                    })
                    $(".layui-layer-btn1").click(function(){location.href = "<?php echo U('Member/memberOrderlist');?>";})
                };
            });
        })
    })


//商品数量限制
function checkLength(which) {
    var maxChars = 50; //
    if(which.value.length > maxChars){
        alert("您出入的字数超多限制!");
        // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
        which.value = which.value.substring(0,maxChars);
        return false;
    }else{
        var curr = maxChars - which.value.length; //250 减去 当前输入的
        document.getElementById("sy").innerHTML = curr.toString();
        return true;
    }
}


</script>
<script>
$(function(){
    $(':input').labelauty();
});
</script>
</body>
</html>