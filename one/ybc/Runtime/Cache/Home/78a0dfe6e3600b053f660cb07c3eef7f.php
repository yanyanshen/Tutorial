<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
    <title>订单详情界面</title>

</head>
 <script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
<script type="text/javascript">
    $(function(){
        $("#payBtn").click(function(){
            location="<?php echo U('Order/newOrder');?>?id=<?php echo ($oid); ?>";
        })

        $("#remind").click(function(){
            layer.msg("已提醒发货",{time:1500,icon:1});
        })

        $("#cGoods").click(function(){
            layer.confirm("是否确认收货？",{title:"确认收货"},function(){
                $.post("<?php echo U('Order/qrsh');?>",{ id:<?php echo ($oid); ?>},function(res){
                    layer.msg(res.info,{time:1000},function(){
                        location.reload();
                    });
                },'json')
            });
        })

        $("#estimate").click(function(){
            location="<?php echo U('Order/history');?>"
        })

        $("#back").click(function(){
            history.go(-1);
        })

        toComment=function(gid,hid){
            $.post('<?php echo U("Order/toComment");?>',{gid:gid},function(res){
                if(res.status==1){
                    location="<?php echo U('Detail/detail');?>?id="+gid+"&hid="+hid+"#coms1";
                }else{
                    layer.msg(res.info,{icon:5});
                }
            })
        }
    })
</script>
<body>
<!--顶部样式-->
<!--logo和搜索样式-->
<!--导航栏样式-->
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

<div id="Orders" class="Inside_pages  clearfix">
    <div class="Orders_style clearfix">
        <div class="address clearfix">
            <div class="title">收货人信息</div>
            <div class="adderss_list clearfix">
                <div class="title_name">选择收货地址 <?php if(($status) == "1"): ?><a href="<?php echo U('selectAddr');?>?oid=<?php echo ($info["id"]); ?>">+选择地址</a><?php endif; ?></div>

                <div class="Shipping_address">
                    <ul class="detailed">
                        <?php if($info['address_id']): ?><li><label>收货人姓名</label><span><?php echo ($info["username"]); ?></span></li>
                            <li><label>详细地址</label><span><?php echo ($info["address"]); ?></span></li>
                            <li><label>邮政编码</label><span><?php echo ($info["postcode"]); ?></span></li>
                            <li><label>联系电话</label><span><?php echo ($info["phone"]); ?></span></li>
                            <?php else: ?>
                            <li><span style="color: red">暂无收货地址信息</span></li><?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="title">订单信息</div>
            <div class="adderss_list clearfix">

                <div class="Shipping_address">
                    <ul class="detailed">
                            <li><label>订单编号</label><span><?php echo ($info["ordersyn"]); ?></span></li>
                            <li><label>订单状态</label><span><?php echo ($info["status"]); ?></span></li>
                            <li><label>订单时间</label><span><?php echo date("Y-m-d H:i:s",$info['addtime']);?></span></li>
                            <li><label>收货时间</label><span><?php if($info['contime']): echo date("Y-m-d H:i:s",$info['contime']);?>
                                <?php else: ?>
                                暂未收货<?php endif; ?></span></li>
                    </ul>
                </div>
            </div>

            <form class="form" method="post">
                <fieldset>

                    <!--付款方式-->
                    <div class="payment">
                        <div class="title_name">支付方式</div>
                        <ul>
                            <li><input type="radio" <?php echo ($info['paymethod']==1?'checked':''); ?> <?php echo ($status!="1"?"disabled":''); ?> name="radio" value="1" data-labelauty="货到付款"></li>
                            <li><input type="radio" <?php echo ($info['paymethod']==2?'checked':''); ?> <?php echo ($status!="1"?"disabled":''); ?> name="radio" value="2" data-labelauty="支付宝"></li>
                            <li><input type="radio" <?php echo ($info['paymethod']==3?'checked':''); ?> <?php echo ($status!="1"?"disabled":''); ?> name="radio" value="3" data-labelauty="微信支付"></li>
                        </ul>
                    </div>
                    <!--产品列表-->
                    <div class="Product_List" id="Product_List">
                        <table>
                            <thead><tr class="title"><td class="name">商品名称</td><td class="price">商品价格</td>
                                <td class="Quantity">购买数量</td><td class="Money">金额</td>
                                <?php if(($status) == "4"): ?><td>评价</td><?php endif; ?></tr></thead>
                            <tbody>
                            <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><tr valign="middle">
                                    <td  class="Product_info">
                                        <div style="display: inline;"><a href=""><img src="/Uploads/goodsPic/100/100_<?php echo ($va["pic"]); ?>" width="100px" height="100px"/></a></div>
                                        <div style="display: inline;"><a href="" class="product_name"><?php echo ($va["goodsname"]); ?></a></div>
                                    </td>
                                    <td><i>￥</i><?php echo ($va["price"]); ?></td>
                                    <td><?php echo ($va["buynum"]); ?></td>
                                    <td class="Moneys"><i>￥</i><?php echo ($va["total"]); ?></td>
                                    <?php if(($status) == "4"): ?><td>
                                        <?php if($va['sfpj'] == 1): ?>已评价
                                            <?php else: ?>
                                            <a style='color: #0088ff;' href='javascript:toComment(<?php echo ($va["gid"]); ?>,<?php echo ($va["hid"]); ?>);'>去评价</a><?php endif; ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="Pay_info">
                            <label>订单留言</label><input name="message" value="<?php echo ($info["message"]); ?>" type="text" <?php echo ($status!="1"?"disabled":''); ?>  onkeyup="checkLength(this);" class="text_name " />  <span class="wordage">剩余字数：<span id="sy" style="color:Red;">50</span></span>
                        </div>
                        <!--价格-->
                        <div class="price_style">
                            <div class="right_direction" style="width: 300px;">
                                <ul style="width: 150px;">
                                    <li><label>商品总价</label><i>￥</i><span><?php echo ($totalprice); ?></span></li>
                                    <li><label>配&nbsp;&nbsp;送&nbsp;&nbsp;费</label><i>￥</i><span>
            <?php if(($status) == "1"): if($totalprice >= 68): ?>0<?php else: ?>10<?php endif; ?>
                <?php else: ?>
                <?php echo ($info["postage"]); endif; ?>
         </span></li>
                                    <li class="shiji_price"><label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label><i>￥</i><span>
            <?php if(($status) == "1"): if($totalprice >= 68): echo ($totalprice); else: echo ($totalprice+10); endif; ?>
                <?php else: ?>
                <?php echo ($info["orderprice"]); endif; ?>
         </span></li>
                                </ul>
                                <div class="btn">
                                    <?php if(($status) == "4"): ?><input id="back" type="button" value="返回" class="submit_btn"/>
                                        <?php else: ?>
                                        <input id="<?php echo ($status==1?'payBtn':''); echo ($status==2?'remind':''); echo ($status==3?'cGoods':''); echo ($status==5?'back':''); ?>" type="button" value="<?php echo ($info["mnext"]); ?>" class="submit_btn"/><?php endif; ?>
                                </div>
                                <?php if(($status) == "1"): ?><div class="integral right">待订单确认后，你将获得<span><?php echo ($totalprice); ?></span>积分</div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <!--友情链接-->
    <div class="Links">
        <div class="link_title">友情链接</div>
        <div class="link_address"><a href="#">四川茶叶协会</a>  <a href="#">链接地址</a>  <a href="#">链接地址</a>  <a href="#">链接地址 </a>   <a href="#">链接地址</a> <a href="#">链接地址</a> <a href="#">链接地址</a></div>
    </div>
</div>
<!--底部样式-->
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
    <dd><a href="#">关于我们</a></dd>
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
  <p><a href="#">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
  <p>Copyright 2010 - 2015 巴山雀舌 四川巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
  <p>川ICP备10200063号-1</p>
   <a href="#" class="return_img"></a>
 </div>
</div>
 <!--右侧菜单栏购物车样式-->
<div class="fixedBox">
  <ul class="fixedBoxList">
      <li class="fixeBoxLi user"><a href="#"> <span class="fixeBoxSpan"></span> <strong>用户</strong></a> </li>
    <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
		<p class="good_cart">0</p>
			<span class="fixeBoxSpan"></span> <strong>购物车</strong>
			<div class="cartBox">
       		<div class="bjfff"></div><div class="message">购物车内暂无商品，赶紧选购吧</div>    </div></li>
    <li class="fixeBoxLi Service "> <span class="fixeBoxSpan"></span> <strong>客服</strong>
      <div class="ServiceBox">
        <div class="bjfffs"></div>
        <dl onclick="javascript:;">
		    <dt><img src="/Public/Home/images/Service1.png"></dt>
		       <dd><strong>QQ客服1</strong>
		          <p class="p1">9:00-22:00</p>
		           <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
		          </dd>
		        </dl>
				<dl onclick="javascript:;">
		          <dt><img src="/Public/Home/images/Service1.png"></dt>
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
			 <p><img src="/Public/Home/images/erweim.jpg" width="150px" height="150px" style=" margin-top:10px;" /></p>
			 <p>微信扫一扫，关注我们</p>
			</div>		
			</div>
			</li>

    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan"></span> <strong>收藏</strong> </a> </li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>
<script type="text/javascript">
function checkLength(which) {
	var maxChars = 50; //
	if(which.value.length > maxChars){
		layer.alert("您出入的字数超多限制!",{icon:7});
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