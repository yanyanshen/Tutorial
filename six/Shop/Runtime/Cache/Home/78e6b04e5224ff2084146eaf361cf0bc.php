<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Shop/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
    <link href="/Shop/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Shop/Public/Home/css/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/Shop/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/editor/min.css"  type="text/css" rel="stylesheet"/>
    <link href="/Public/Admin/css/editor/skin_0.css"  type="text/css" rel="stylesheet" />
    <link href="/Public/Admin/css/editor/font-min.css"  type="text/css" rel="stylesheet"/>
    <script src="/Shop/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>

    <script src="/Shop/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/geo.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/layer.js" type="text/javascript"></script>
    <script src="/Shop/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
    <title>修改密码</title>
</head>
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
    })
</script>
<style type="text/css">
    .r_user_style {background: #FFFFFF;border:3px solid #ddd; box-shadow: 0px 3px 3px #cccccc;width: 960px; margin-top: 22px;}  div.page{  height: 684px;  background-color: #fff; background-image: url("/Shop/Public/Home/imgs/bg.jpeg") ; }  .tbody-s{  margin-left: 300px;  }  form#user_form{  margin-top:150px;  }  .top{  margin-top: 100px;  }  .btn-s{  margin-left: 90px;  }  input#member_code.txt{  width: 150px;  }  .btn-10,  {  padding: 10px 6px 10px 5px;  font-size: 14px;  text-align: center;  border: 3px #71b351;  background: rgba(49, 20, 33, 0.12);  margin-left: 20px;  color: rgba(113, 179, 81, 0.82);  }
</style>
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
<!--内页样式-->
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
    <div class="right_style r_user_style">
        <!--地址管理-->
        <div class="user_address">
            <div id="append_parent"></div>
            <div id="ajaxwaitid"></div>
            <div class="page">
                <form id="user_form" enctype="multipart/form-data" method="post" action="<?php echo U('member/editor');?>?id=<?php echo ($date['id']); ?>">
                    <div class="tbody-s">
                        <input type="hidden" name="form_submit" value="ok" />
                        <input type="hidden" name="member_id" value="2" />
                        <input type="hidden" name="old_member_avatar" value="" />
                        <input type="hidden" name="member_name" value="admin" />
                        <table class="table tb-type2">
                            <tbody>
                            <tr class="noborder">
                                <td class="vatop rowform"><?php echo ($date['username']); ?></td>
                                <td class="vatop tips"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="required"><label for="member_password">旧密码:</label></td>
                            </tr>
                            <tr class="noborder">
                                <td class="vatop rowform"><input type="password" id="member_password" name="password" class="txt" value=""></td>
                                <td class="vatop tips"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="required"><label for="member_repassword">新密码:</label></td>
                            </tr>
                            <tr class="noborder">
                                <td class="vatop rowform"><input type="password" id="member_repassword" name="repassword" class="txt" value=""></td>
                                <td class="vatop tips"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="required"><label class="validation" for="member_mobile">手机号码:</label></td>
                            </tr>
                            <tr class="noborder">
                                <td class="vatop rowform"><input type="text" value="" id="member_mobile" name="mobile" class="txt"></td>
                                <td class="vatop tips"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="required"><label class="member_code">验证码:</label> </td>
                            </tr>
                            <tr class="noborder">
                                <td class="vatop rowform"><input type="text" value="" id="member_code" name="code" class="txt"  ><input type="button" id="btn" value="获取验证码" onclick="Code_send()"><s></s></a>
                                </td>
                                <td class="vatop tips"></td>
                            </tr>
                            <!--V3-B11 手机号码-->
                            </tbody>
                            <tfoot>
                            <tr class="tfoot">
                                <!--<td colspan="15"><a href="javascript:document.getElementById('user_form').submit();" class="btn-s" id="<?php echo ($date['id']); ?>"><span>提交</span></a></td>-->
                                <td colspan="15"><a  class="btn-s" id="" style="cursor: pointer" href="javascript:void(0)" onclick="code()"><span>提交</span></a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
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
</body>
</html>
<style>
    input#btn{  color: #0d93bf;  border: solid 1px#75ccef;  height: 25px;  padding: -1px 1px 0px 1px;  margin-top: -1px;  }
    input#btn:hover{  cursor: pointer;  color: #666;  }
</style>
<script src="/Shop/Public/Home/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script> <!--逻辑功能代码 -->
<script type="text/javascript">
/*
  function addCookie(name,value,expiresHours){
        if(expiresHours>0){
            var date=new Data();
            date.setTime(date.getTime()+expiresHours*1000);
            $.cookie(name,escape(value),{expires:date});
        }else{
            $.cookie(name,escape(value));
        }
    }
    function editCookie(name,value,expiresHours){
        if(expiresHours>0){
            var date=new Date();
            date.setTime(date.getTime()+expiresHours*1000);
            $cookie(name,escape(value),{expires:date});

        }else{
            $.cookie(name,escape(value));
        }
    }
    function getCookieValue(name){
        return $.cookie(name);
    }
    $(function(){
        $('#btn').click(function(){
            Code_send($('#btn'));
        });
        V= getCookieValue("secondsremained");
        if(V>0){
           // setTime($('#btn'));
            settime($("#btn"));
        }
    })
*/

  var InterValObj;
  var count=60;
  var curCount;
    function Code_send(){
        var mobile=$('#member_mobile').val();
        var Length=$('#member_mobile').val().length;
        if(mobile==''){
            layer.msg('请填写手机号');
        }else{
            if(Length!==11){
                layer.msg('请填写11位的手机号')
                $('#btn').val('');
            }else{
                if(!mobile.match(/^1[3|4|5|7|8][0-9]\d{4,8}$/)){
                    layer.msg('请填写正确的手机号码')
                }
                $.ajax({
                    url:'<?php echo U("member/Code_send");?>',
                    type:'post',
                    data:{'mobile':$('#member_mobile').val()},
                    error:function(){
                        layer.msg('网络错误')
                        $("#btn").val("重新获取");
                    },
                    success:function(res){
                        if(res==0){
                            curCount=count;
                            $("#btn").attr("disabled",true);
                            $("#btn").val(curCount+'秒后可重新获取');
                            InterValObj=window.setInterval(SetRemainTime,1000);
                            layer.msg('验证码已发送请注意接收');
                        }else if(res==1){
                            layer.msg('手机号和账户不匹配')
                        }else{
                            if(res==2){
                               layer.msg('网络错误 请重新获取')
                                 $("#btn").val("重新获取");
                            }
                        }
                    }
                })
            }
        }
    }
    function SetRemainTime(){
        if(curCount==0){
            window.clearInterval(InterValObj);
            $("#btn").val("重新获取");
        }else{
            curCount--;
            $("#btn").val(curCount+'秒后可重新获取');
        }
    }
</script>
<script type="text/javascript">
    function code(){
        var password=$('#member_password').val();
        var rePassword=$('#member_repassword').val();
        var mobile=$('#member_mobile').val();
        var code=$('#member_code').val();
        var Mol=$('#member_mobile').val().length;
        if(password==''){
            layer.msg('请填写密码');
        }else if(rePassword==''){
            layer.msg('请填写密码');
        }else if(mobile==''){
            layer.msg('请填写手机号');
        }else if(code==''){
            layer.msg('请填写验证码')
        }else{
            if(Mol!==11){
                layer.msg('请填写11位的手机号')
            }else{
                if(!mobile.match(/^1[3|4|5|7|8][0-9]\d{4,8}$/)){
                    layer.msg('请填写正确的手机号码')
                }
                $.ajax({
                    url:'<?php echo U("member/send_Code");?>',
                    type:'post',
                    data:{'password':$('#member_password').val(),'rePassword':$('#member_repassword').val(),'mobile':$('#member_mobile').val(),'code':$('#member_code').val()},
                    error:function(){
                        layer.msg('网络错误 请重新填写');
                    },
                    success:function(res){
                        if(res==0){
                            layer.msg('新密码不能旧密码相同')
                        }else if(res==1){
                            layer.msg('旧密码错误');
                        }else if(res==2) {
                            layer.msg('验证码错误');
                        }else{
                            if(res==3){
                                layer.msg('修改成功 请重新登陆');
                                function url(){
                                    window.location='<?php echo U("users/login");?>'
                                }
                                setTimeout(url,3000);
                            }
                        }
                    }
                })
            }
        }
    }
</script>