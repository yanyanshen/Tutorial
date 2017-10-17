<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/Shop/Public/Home/css/pingjia.css" rel="stylesheet" type="text/css" />
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/layer.js" type="text/javascript"></script>
<title>用户订单列表</title>
</head>
<style type="text/css">
    .title_name span.name{
        display: inline-block;
        width: 100px;
        height: 28px;
        text-align: center;
        line-height: 28px;
        cursor: pointer;
    }
    .spanon{
        background-color: #FF893B;
        border-bottom: 3px solid #F00;
    }
    /*星星评分*/
    .formItemDiff {
        width: 20px;
        height: 20px;
        background-image: url(/Shop/Public/Home/imgs/diff.png);
        background-position: 0px -575px;
        float: left;
        margin-top: 15px;
    }
    .formItemDiffFirst {
        margin-left: 20px;
    }
</style>
<script type="text/javascript">

</script>

<script type="text/javascript">
  $(document).ready(function(){

		  setInterval(showTime, 1000);                                
		  function timer(obj,txt){
						  obj.text(txt);
		  }        
		  function showTime(){                                
				  var today = new Date();
				  var weekday=new Array(7)
				  weekday[0]="星期日"
				  weekday[1]="星期一"
				  weekday[2]="星期二"
				  weekday[3]="星期三"
				  weekday[4]="星期四"
				  weekday[5]="星期五"
				  weekday[6]="星期六"                                        
				  var y=today.getFullYear()+"年";
				  var month=today.getMonth()+1+"月";
				  var td=today.getDate();
				  var d=weekday[today.getDay()];
				  var h=today.getHours();
				  var m=today.getMinutes();
				  var s=today.getSeconds();        
				  timer($("#y"),y+month);
				  //timer($("#MH"),month);        
				  timer($("h1"),td);        
				  timer($("#D"),d);
				  timer($("#H"),h);
				  timer($("#M"),m);
				  timer($("#S"),s);
		  }


      //更多订单
      $(".title_name span").click(function(){
          $(this).addClass('spanon').siblings().removeClass('spanon')
          var status=$(this).index();
          $.post("<?php echo U('Member/memberOrderlist');?>",{status:status},function(res){
              $(".Order_form_list").html(res);
          })
//          location.href="<?php echo U('Member/memberOrderList');?>?status="+status;
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
<div class="user_style clearfix" id="user">
<!--用户中心布局样式-->
<div class="left_style">
    <!--栏目名称-->
    <div class="title_username">个人中心</div>
    <div class="user_Head">
        <div class="user_time">
            <h4 id="y" class="years"></h4>
            <h1></h1>
            <h4 id="D"></h4>
        </div>
        <div class="user_portrait">
            <a href="<?php echo U('Member/memberEdit');?>" title="修改头像"></a>
            <?php if($_SESSION['avatar']!= ''): ?><img src="/uploads/avatar/<?php echo (session('avatar')); ?>" />
                <?php else: ?>
                <img src="/uploads/avatar/a.jpg" /><?php endif; ?>
            <div class="background_img"></div>
        </div>
    </div>
    <ul class="Section">
        <li><a href="#" class="on"><em></em><span>我的特色馆</span></a></li>
        <li><a href="<?php echo U('member/memberInfo');?>"><em></em><span>个人信息</span></a></li>
       <li><a href="<?php echo U('Member/reword');?>"><em></em><span>修改密码</span></a></li>
        <li><a href="<?php echo U('Member/memberOrderlist',array('status'=>0));?>"><em></em><span>我的订单</span></a></li>
        <li><a href="<?php echo U('Member/memberEdit');?>"><em></em><span>我的资料</span></a></li>
        <li><a href="<?php echo U('Member/memberCZ');?>"><em></em><span>在线充值</span></a></li>
        <li><a href="<?php echo U('Member/memberCollect');?>"><em></em><span>我的收藏</span></a></li>
        <li><a href="<?php echo U('Member/memberAddress');?>"><em></em><span>收货地址管理</span></a></li>
        <li><a href="<?php echo U('Member/memberHistory');?>"><em></em><span>我的足迹</span></a></li>
    </ul>
</div>
 <!--右侧样式布局-->
    <!--<p style="font-size: 18px;margin-top: 20px;margin-left: 20px;color: red">未付款的订单会在两天后到期</p>-->
 <div class="right_style r_user_style">
 <div class="Order_form">
       <div class="user_Borders">
            <div class="title_name">
            <span class="name spanon">全部订单</span>
                <span class="name" >待付款</span>
                <span class="name">待发货</span>
                <span class="name">待收货</span>
                <span class="name">已完成</span>
            <!--<a href="#">更多订单&gt;&gt;</a>-->
            </div>
            <div class="Order_form_list">
                <table>
                     <thead>
                        <tr>
                          <td class="list_name_title0">商品</td>
                            <td class="list_name_title1">单价(元)</td>
                            <td class="list_name_title2">数量</td>
                            <td class="list_name_title4">实付款(元)</td>
                            <td class="list_name_title5">订单状态</td>
                            <td class="list_name_title6">操作</td>
                         </tr>
                     </thead>
                    <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tbody>
                       <tr><td colspan="6" class="Order_form_time"><?php echo (date('Y-m-d H:s:i',$order["createtime"])); ?> 订单号：<?php echo ($order["ordersyn"]); ?></td></tr>
                       <tr>
                           <td colspan="3">
                             <table class="Order_product_style">
                                   <tbody>
                                   <?php if(is_array($order["goodsname"])): $i = 0; $__LIST__ = $order["goodsname"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsname): $mod = ($i % 2 );++$i;?><tr>
                                           <td>
                                                <div class="product_name clearfix">
                                                <a href="javascript:;" class="product_img"><img src="/uploads/n2/<?php echo (array_shift(explode(',',$order[image][$key]))); ?>" width="80px" height="80px"></a>
                                                <a href="<?php echo U('Goods/goodsDetail',array('id'=>$order[gid][$key]));?>"><?php echo ($goodsname); ?></a>
                                                <p class="specification"><?php echo ($order[goodsintro][$key]); ?></p>
                                                </div>
                                           </td>
                                           <td><?php echo ($order[saleprice][$key]); ?></td>
                                           <td><?php echo ($order[buynum][$key]); ?>
                                                   <?php if(($order[ispj][$key] == 0) and ($order["statusname"] == '订单完成')): ?><a href="javascript:;" class="pingjia" style="margin-left: 10px">评价</a>
                                                       <?php elseif($order[ispj][$key] == 1): ?>已评价
                                                       <?php else: endif; ?>
                                               <div style="display: none"><?php echo ($order[gid][$key]); ?></div>
                                               <div style="display: none"><?php echo ($order["id"]); ?></div>
                                               <div style="display: none"><?php echo ($goodsname); ?></div>
                                           </td>

                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                             </table>
                           </td>
                           <td class="split_line"><?php echo ($order["prices"]); ?></td>
                           <td class="split_line"><?php echo ($order["statusname"]); ?></td>
                           <td class="operating">
                             <!--<a href="javascript:;">查看详细</a>-->
                                 <?php switch($order["orderstatus"]): case "1": ?><a href="javascript:;" class="topay">去支付</a><?php break;?>
                                     <?php case "2": ?><a href="javascript:;" class="tip">提醒发货</a><?php break;?>
                                     <?php case "3": ?><a href="javascript:;" class="affirm">确认收货</a><?php break;?>
                                     <?php case "8": ?><a href="javascript:;" style="margin-left: 20px" class="odel">删除</a><?php break;?>
                                     <?php default: ?><a href="javascript:;" class="odel">删除</a><?php endswitch;?>
                               <div style="display: none"><?php echo ($order["id"]); ?></div>
                           </td>
                       </tr>
                     </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
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


<!--评价-->
<div class="wrap" id="wrap" style="display: none;">
    <h1>Send a message</h1>
    <div id='form_wrap'>
        <form action="" method="post" id="formpj" >
            <p>Hello <?php echo (session('username')); ?>,</p>
            <label for="message">你的评价: </label>
            <textarea  name="pingjia" value="" id="message" ></textarea>
            <label for="level">星级: </label>
            <div class="item" style=" margin-left:70px; display: inline-block">
                <div class="formItemDiff formItemDiffFirst"></div>
                <div class="formItemDiff"></div>
                <div class="formItemDiff"></div>
                <div class="formItemDiff"></div>
                <div class="formItemDiff"></div>
                <p id="pointP" style="display: none"></p>
            </div>
            <input type="text" name="level" value="" id="level" />
            <input type="button" name ="submit" value="提交评价" />
        </form>
    </div>
</div>

<script type="text/javascript" src="/Shop/Public/Home/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".formItemDiff").hover(function() {
            $(this).css("background-position", "0px -555px");
            $(this).prevAll().css("background-position", "0px -555px");
            $(this).nextAll().css("background-position", "0px -575px");
            $("#pointP").html($(this).prevAll().length+1);
            $("#level").val($("#pointP").html());
        });
    });
</script>

<script type="text/javascript">
    $(function(){
            $(".pingjia").live('click',function(){
                var gid=$(this).next().text();
                var oid=$(this).next().next().text();
                var goodsname=$(this).next().next().next().text();
                $('#formpj').prepend("<input type='hidden' name='gid' value='"+gid+"'/>");
                $('#formpj').prepend("<input type='hidden' name='oid' value='"+oid+"'/>");
                $('#formpj').prepend("<input type='hidden' name='goodsname' value='"+goodsname+"' />");
                layer.open({
                    type: 1,
                    shift: 3,
                    title: false,
                    closeBtn: 0,
                    shadeClose: true,
                    skin: 'layui-layer-rim',
                    area: ['1000px', '700px'],
                    content: $('#wrap')
                });
            })

        //提交评价
        $("#wrap input[type='button']").click(function(){
            $.post("<?php echo U('Member/pingjia');?>",$('#formpj').serialize(),function(res){
                if(res.status==1){
                    layer.msg("感谢您的支持",{icon:1,time:1000});
                    setTimeout(a,1000);
                    function a(){
                        layer.closeAll();
                        location.reload();
                    }
                }else{
                    layer.msg("评论提交失败",{icon:1,time:1000})
                }
            })
        })
    })

</script>
<script type="text/javascript">
    $(function () {
        $('.topay').live('click',function(){
            var oid=$(this).next().text();
                layer.load();
                setTimeout(a,800);
                function a(){
                    location.href="<?php echo U('Orders/orders');?>?id="+oid;
                }
        })
        $('.tip').live('click',function(){
            var oid=$(this).next().text();
            $.post("<?php echo U('Orders/ordernews');?>",{oid:oid},function(res){
                if(res.status==1){
                    layer.msg("提醒发货成功",{icon:1,time:1000})
                }else{
                    layer.msg(res.info,{icon:4,time:1000})
                }
            })
        })
        $('.odel').live('click',function(){
            var oid=$(this).next().text();
            $.post("<?php echo U('Admin/Order/orderDel');?>",{id:oid},function(res){
                if(res==1){
                    layer.msg("删除成功",{icon:1,time:1000},function(){location.reload();})
                }else{
                    layer.msg("删除失败",{icon:7,time:1000});
                }
            })
        });
        $('.affirm').live('click',function(){
            var oid=$(this).next().text();
            layer.prompt({title: '输入支付密码，并确认',formType: 1},function(val){
                $.post("<?php echo U('Member/affirm');?>",{pwd:val,oid:oid},function(res){
                    if(res.status==1){
                        layer.msg('确认收货成功',{icon:1,time:1000},function(){
                            location.reload();
                        });
                    }else{
                        layer.msg('密码错误,你今天还有两次机会',{icon:4,time:1000});
                    }
                })
            })
        })
    })
</script>

<script type="text/javascript">
    $(".Section li a span:contains('我的订单')").parent().addClass("on");
    $(".Section li a span:contains('我的特色馆')").parent().removeClass("on");
</script>
</body>
</html>