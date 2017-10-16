<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/Admin/Uploads/minilogo.ico" type="image/x-icon"/>
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/Orders.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/show.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/purebox-metro.css" rel="stylesheet" id="skin">
    <link href="/Public/Home/css/addtocart.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/ordersuccess.css" rel="stylesheet" type="text/css">
    <!--支付-->
    <link rel="shortcut icon" href="/Public/Home/images/bitbug_favicon.icon" />
    <link rel="stylesheet" href="/Public/Home/css/showcart.css" />
    <link rel="stylesheet" href="/Public/Home/css/reset1.css" />
    <!--支付-->
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <style type="text/css">
        /*.nav_on{ background:#FF7200;color:#ffffff}*/
       .nav_on{ background:#FF7200;color:white;}
    </style>
    <script type="text/javascript">
        $(function(){
            $(".Navigation_name li").removeClass();
            var reg1=/\/Home\/Index\//;
            var reg2=/\/Home\/ProductList\//;
            var reg3=/\/Home\/Sale\//;
            var reg4=/\/Home\/Vote\//;
            var reg5=/\/Home\/Auction\//;
            var reg6=/\/Home\/Integral\//;
            var reg7=/\/Home\/Connect\//;
            var nowurl=document.URL;
            if(reg1.test(nowurl)){
                $('#cplb').addClass("nav_on");
            }else if(reg2.test(nowurl)){
                $('#cplb').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg3.test(nowurl)){
                $('#xsqg').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg4.test(nowurl)){
                $('#tptj').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg5.test(nowurl)){
                $('#pmsc').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg6.test(nowurl)){
                $('#jfdh').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }else if(reg7.test(nowurl)){
                $('#lxwm').addClass("nav_on");
                $(".Navigation_name li").mouseleave(function(){
                    $(this).removeClass("on");
                })
            }
        })

    </script>
    <script type="text/javascript">
        url="<?php echo U('Index/buyCart');?>";
        delurl="<?php echo U('Cart/del');?>";
        pub="/Public";
        //退出
        function logout(){
            layer.confirm("你确定要退出吗？",{icon:3,btn:['确定','取消']},function(){
                $.get("<?php echo U('Home/Member/logout');?>",function(res){
                    if(res.status=="ok"){
                        layer.msg(res.msg,{icon:1,time:1000},function(){
                            window.location.href="<?php echo U('Home/Index/index');?>"
                        })
                    }
                })
            })
        }
        //我的购物车删除
        function del(gid){
            $.get(delurl,{gid:gid},function(res){
                if(res.status=="ok"){
                    $("div.hd_Shopping_list").click();
                }else{
                    layer.msg(res.msg,{icon:2});
                }
            });
        }
        //会员中心判断是否登陆过
        function islogin(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/showlist');?>";
            }else{
                layer.confirm("登陆后才能进入",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
        //我的订单判断是否登陆
        function isorder(){
            var mid=$("#islogin").val();
            if(mid){
                window.location.href="<?php echo U('Home/Personal/order');?>";
            }else{
                layer.confirm("登陆后才能查看",{icon:4,btn:['去登陆','算了吧']},function(){
                    window.location.href="<?php echo U('Home/Member/login');?>";
                })
            }
        }
    </script>

    <title>产品详细页</title>
</head>
<body>

<!--顶部样式-->
<div id="header_top">
    <input type="hidden" value="<?php echo (session('mid')); ?>" id="islogin"/>
    <div id="top">
        <div class="Inside_pages">
            <?php if($_SESSION['shop_']['mid']>= 1): ?><div class="Collection">下午好,<?php echo (session('username')); ?>,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div>
                <?php else: ?>
                <div class="Collection">下午好,欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div><?php endif; ?>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <!--<li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>-->
                    <?php if($_SESSION['shop_']['mid']>= 1): ?><li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a id="logout" href="javascript:logout()" class="red">[退出]</a>
                        </li>
                        <?php else: ?>
                        <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                            欢迎光临本店！<a href="<?php echo U('Home/Member/login');?>" class="red">[登录]</a>
                            新用户<a href="<?php echo U('Home/Member/register');?>" class="red">[免费注册]</a>
                        </li><?php endif; ?>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="javascript:isorder()">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/Cart/mycart');?>">购物车</a> </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        <a href="javascript:islogin()" class="red">[会员中心]</a>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/erweima.jpg"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--顶部样式1-->
    <div id="header"  class="header page_style">
        <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
        <!--结束图层-->
        <div class="Search">
            <!--<p><input name="" type="text"  class="text"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>-->
            <form action="<?php echo U('Home/ProductList/searchlist',array('maxprice'=>0,'minprice'=>0));?>" method="get">
                <p>
                    <input name="words" type="text"  value="<?php echo ($cx); ?>" class="text"/>
                    <input name="" type="submit" value="搜 索"  class="Search_btn" />
                </p>
            </form>
            <p class="Words"><a href="<?php echo U('Home/ProductList/catelist',array('path'=>1,'minprice'=>0,'maxprice'=>0));?>">甜品</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>3,'minprice'=>0,'maxprice'=>0));?>">零食</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>5,'minprice'=>0,'maxprice'=>0));?>">水果</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>7,'minprice'=>0,'maxprice'=>0));?>">生鲜蔬菜</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>8,'minprice'=>0,'maxprice'=>0));?>">肉类</a><a href="<?php echo U('Home/ProductList/catelist',array('path'=>2,'minprice'=>0,'maxprice'=>0));?>">饮品</a></p>
        </div>
        <!--购物车样式-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em class="iconfont icon-cart2"></em><a href="#">我的购物车</a>
                <!--<i class="ci-right">&gt;</i>-->
                <!--<i class="ci-count" id="shopping-amount">
                <?php if($_SESSION['shop_']['sum']>= 0): echo (session('sum')); ?>
                    <?php else: ?>
                    0<?php endif; ?>
            </i>-->
            </div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                <ul class="p_s_list">
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共<b id="totalnum"></b>件商品　共计<strong id="totalprice"></strong></div>
                    <a href="<?php echo U('Home/Cart/myCart');?>" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>
            </div>
            <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <!--<ul class="Navigation_name">-->
                <ul class="Navigation_name">
                    <li id="sy"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                    <li id="cplb"><a href="<?php echo U('Home/ProductList/showlist',array('bid'=>0,'minprice'=>0,'maxprice'=>0));?>">产品列表</a></li>
                    <li id="xsqg"><a href="<?php echo U('Home/Sale/showlist');?>">限时抢购</a><em class="hot_icon"></em></li>
                    <li id="tptj"><a href="<?php echo U('Home/Vote/showlist');?>">投票统计</a></li>
                    <li id="pmsc"><a href="<?php echo U('Home/Auction/showlist');?>">拍卖商城</a></li>
                    <li id="jfdh"><a href="<?php echo U('Home/Integral/showlist');?>">积分兑换</a></li>
                    <li id="lxwm"><a href="<?php echo U('Home/Connect/showlist');?>">联系我们</a></li>
                </ul>
            </div>
            <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
            <!-- <a href="#" class="link_bg"><img src="/Public/Home/images/link_bg_03.png" /></a>-->
        </div>
    </div>
</div>


<style>
    .active1{
        background-color: red;
        color: white;
    }
    label{
        cursor: pointer;
    }
</style>

<!--<script src="/Public/Home/js/jqzoom.js"></script>
<csript src="/Public/Home/css/jquery.jqzoom.css"></csript>-->
<script type="text/javascript">
    //立即兑换
    function addToBuy(){
        //判断用户是否登陆过
//        document.getElementById("ECS_FORMBUY").submit();
        var mid=$('#mid').val();
        if( mid){
            $.post("<?php echo U('Order/toBuyCreateOrder');?>",$("#saleForm").serialize(),function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:6,time:2000},function(){
                        window.location.href="<?php echo U('Order/showlist');?>?oid="+res.oid;
                    })
                }else{
                    layer.alert(res.msg,{icon:4})
                }
            });
        }else{
            layer.alert("登陆成功后才能抢购",{icon:4},function(){
                layer.open({
                    type:2,
                    title:"",
                    skin:'demo-class',
                    area:["480px","56%"],
                    shadeClose: true,
                    shade: 0.8,
                    content:"<?php echo U('Sale/tologin');?>"
                })
            })
        }
    }
</script>
<body>

<!--团购详细样式-->
<div class="Inside_pages">
    <div class="Location_link">
        <em></em><a href="#">限时抢购商品</a>
    </div>
    <div class="clearfix detail_main " id="goodsInfo">
        <!--图片展示样式-->
        <div class=" left">
            <div class="picFocus">
                <div class="bd">
                    <ul>
                        <?php if(is_array($goodsPic)): $i = 0; $__LIST__ = $goodsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="#">
                                <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($val['picname']); ?>" /></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                </div>
                <div class="hd">
                    <ul>
                        <?php if(is_array($goodsPic)): $i = 0; $__LIST__ = $goodsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="#">
                                <img src="/Public/Admin/Uploads/goods/thumb350/350_<?php echo ($val['picname']); ?>" /></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">jQuery(".picFocus").slide({ mainCell:".bd ul",autoPlay:false });</script>
        </div>
        <form action="<?php echo U('Order/toBuyCreateOrder');?>" method="post" id="saleForm">
            <input type="hidden" id="mid" value="<?php echo (session('mid')); ?>"/>
        <input name="gid" id="gid" type="hidden" value="<?php echo ($goodslist['id']); ?>">
        <input name="price" type="hidden" value="<?php echo ($goodslist['price']); ?>">
        <div class="left main_box">
            <h2 class="title">[限时抢购 八折优惠]<?php echo ($goodslist["goodsname"]); ?>（每个ID限购5件）</h2>
            <div class="time">
                <input id="endTime" type="hidden" value="<?php echo ($goodsactive['endtime']); ?>">
                <input id="TIME" type="hidden" value="<?php echo (NOW_TIME); ?>">
                <div class="icon_time"></div><span style="color:#ff635b;" id="shijian">2天21小时34分27.6秒</span></div>
            <div class="Numbers">购买数量
                <a href="javascript:void(0);" id="min">-</a>
                <input id="text_box" name="buynum" type="text" value="1" class="number_text">
                <a href="javascript:void(0);" id="add">+</a>
                <span style="color:#ff635b;">最多购买五件商品</span>
            </div>
            <div class="status_banner">
                <div class="currentPrice"> <small>¥</small><?php echo ($goodslist["price"]); ?></div>
                <div class="left"><del class="originPrice">¥<?php echo ($goodslist["marketprice"]); ?></del></div>
                <div style="padding-left:20px;"><a  style="margin-top:14px;padding-left:20px;" href="javascript:addToBuy()"  class="buyaction J_BuySubmit"><span>马上抢</span></a></div>
            </div>
            <div class="numOfPeople"><span class="num"><?php echo ($goodslist["num"]); ?></span>件已售</div>
        </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $(function () {
                    $("#add").click(function () {
                        var t = $('#text_box');
                        t.val(parseInt(t.val()) + 1)
                        if (parseInt(t.val()) > 5) {
                            layer.alert("每个人最多限购五件商品",{icon:4});
                            t.val(5);
                        }
                    })
                    $("#min").click(function () {
                        var t = $('#text_box');
                        t.val(parseInt(t.val()) - 1)
                        if (parseInt(t.val()) < 1) {
                            layer.alert("商品数量至少为一件",{icon:2});
                            t.val(1);
                        }
                    })
                })
            })
        </script>


        <script type="text/javascript" src="/Public/Home/js/jquery.countdown.min.js"></script>
        <script type="text/javascript">
            $(function(){
                for(var i=1;i<16;i++){
                    var t1=$('#TIME').val();
                    var t2=$('#endTime').val();
                    var t=parseInt(t2-t1)*1000;
                    var twoDaysFromNow = new Date().valueOf() +t;
                    $('#shijian').countdown(twoDaysFromNow, function(event) {
                        if(t<0){
                            $(this).html('本次抢购已结束,敬请期待下次活动');
                        }else{
                            $(this).html(event.strftime( '还剩%D 天 %H 小时 %M 分钟 %S 秒'));
                        }
                    });
                }

            })
        </script>




        <!--品牌样式-->
    </div>
    <!--样式-->
    <div class="clearfix">
        <div class="left_style">
            <div class="user_Records">
                <div class="title_name">用户浏览记录</div>
                <ul>
                    <?php if(is_array($historyInfo)): $k = 0; $__LIST__ = $historyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$historyList): $mod = ($k % 2 );++$k; if($k <= 6): if($historyList['id'] > 0): ?><li>
                                    <a href="<?php echo U('Detail/detail',array('gid'=>$historyList['id']));?>">
                                        <p><img src="/Public/Admin/Uploads/goods/<?php echo ($historyList['pic']); ?>" data-bd-imgshare-binded="1"></p>
                                        <p class="p_name"><?php echo ($historyList['goodsname']); ?></p>
                                    </a>
                                    <p><span class="p_Price"><i>￥</i><?php echo ($historyList['price']); ?></span><b><?php echo ($historyList['marketprice']); ?></b></p>
                                </li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="right_style">
            <div class="inDetail_boxOut ">
                <div class="inDetail_box">
                    <div class="fixed_out ">

                        <ul class="sit" style="width: 950px;height: 41px;background: white">
                            <li class="active1" style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">商品详情</li>
                            <li style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">卖家承诺</li>
                            <li class="sdetail" style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">买家评论</li>
                        </ul>
                        <div class="subbuy" style="width: 220px;height: 40px;text-align: center">
                            <!--<span class="extra currentPrice"><?php echo ($detailInfo["price"]); ?></span>-->
                            <a href="javascript:addToBuy()" class="extra  notice J_BuyButtonSub">立即购买</a></div>
                    </div>
                    <div class="change" style="max-height: 30000px;position: relative">
                        <div class="active2">
                            <?php if(is_array($goodsPic)): $i = 0; $__LIST__ = $goodsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsPic): $mod = ($i % 2 );++$i;?><img src="/Public/Admin/Uploads/goods/thumb800/800_<?php echo ($goodsPic['picname']); ?>"  /><?php endforeach; endif; else: echo "" ;endif; ?></div>
                        <div style="display: none;text-align: left;width:1000px;line-height: 30px">
                            <pre>
                            <p style="text-align: center">质量安全承诺书</p>
                            为了认真贯彻执行《食品安全法》和《农产品质量安全法》，确保农产品流通安全，本市场（店）郑重承诺：
                            一、严格依照《食品安全法》、《农产品质量安全法》等法律法规从事农产品经营活动，对社会和公众负责，诚信经营，保证所经营农产品的安全，<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接受社会监督，承担社会责任。
                            二、具有与经营的品种、数量相适应的农产品包装、贮存等场地且符合下列要求：
                            1、经营场所与有毒、有害场所以及其他污染源保持规定距离；
                            2、经营场所与个人生活空间分开；
                            3、经营场所保持内部环境整洁；【水果产品质量承诺书】
                            三、具有与经营的品种、数量相适应防腐、洗涤以及处理废水、存放垃圾和废弃物的设备或者设施且符合下列要求：
                            1、设备及设施空间布局和操作流程设计符合规定，合理布局；
                            2、贮存、运输和装卸农产品的容器、工具和设备安全、无害、保持清洁，符合保证安全所需的温度等特殊要求，不得将农产品与有毒、有害物品一起运输；
                            3、备有数量足够、安全无害的工具、容器，标志明显，防止直接入口农产品与非直接入口农产品类食品、原料与成品交叉污染；
                            4、容器、工具和设备与个人生活用品严格分开。
                            四、建立食品进货查检记录制度。采购农产品时查验供货者的农产品合格的证明文件，并如实记录农产品的名称、规格、数量、供货者名称及联系方<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;式、进货日期等内容，保存期限不少于二年。
                            五、所经营的下列农产品符合农产品质量安全规定的要求。
                            1、蔬菜（含食用菌）、水果类——有机磷类、氨基甲酸脂类农药残留，重金属含量符合质量安全要求。
                            2、畜禽类——不含瘦肉精、莱克多巴胺及激素类。
                            3、水产类——甲醛、氯霉素及重金属含量不超标。
                            六、实行市场准入制度
                            【水果产品质量承诺书】
                            1、创造条件设立检测室，配备配备符合检测要求的速测仪器和专职的检测人员，适时开展农产品质量检测工作，并将检测结果在醒目位置公示。
                            2、对获得国家无公害农产品（产地）、绿色食品、有机食品的食用农产品，凭认证证书和专用标志直接进入市场销售；国外入境上市农产品凭入境<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;检验检疫证书入市销售。
                            3、对行业行政主管部门认定的无公害农产品生产基地的产品和实行定点屠宰并取得检疫合格证的畜产品，实行索证抽检。凭农产品产地认定证书<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;、近期产品检测合格证明和畜产品定点屠宰印章、检疫合格证可以直接进入市场销售；无近期产品检测合格证明的，进行现场抽检，合格后方可进入市场销售。
                            4、对来源于非认证基地的农产品并且未取得任何认证的产品，实行现场检测，由市场开办者进行检测，经检测合格后，进入市场销售。
                            5、不盗用、伪造使用无公害、绿色、有机农产品标示，以及农产品产地证明。
                            七、实行不合格农产品退市制度
                            对检测不合格的农产品，禁止进入市场销售，进行退市、无害化处理或销毁，并向农产品质量监管部门报告。
                            八、实行质量安全结果公示制度
                            应在场内显著位置设立“农产品质量安全公示牌”，对进场销售的农产品质量安全状况进行公示。公示内容包括农产品的品名、产地、质量安全状况等信息。
                            九、实行标识管理制度
                            制作不同标识牌，挂牌销售，推行产品分级包装和产地标识管理。标识牌要注明产品名称、产地、生产者、生产日期、产品质量等内容。
                            十、销售明知是不符合食品安全标准的农产品，承诺赔偿消费者损失，并支付价款十倍的赔偿金。自觉接受群众监督。
                            十一、以上承诺如有违反，自愿接受农产品质量管理部门依照法律法规给予的处罚。
                        </pre></div>
                        <div style="display: none ">
                            <h2 style="font-size: 25px;margin-right: 300px;">全部评论</h2>
                            <d style="display: block;width: 82%;height: 100px;border: 1px solid #c2ccd1;margin-top: 20px">
                                <p style="height: 60%;width:100px;border-right: 1px solid #c2ccd1;margin-top: 20px;text-align: center">评分<br><r style="width: 98px;height: 98px;text-align: center;font-size: 23px;color: orangered">5.0</r></p><p style="margin-bottom: 20px;background: url(/Public/Home/images/pf.jpg) no-repeat;width:70%;margin:-35px -30px 80px 230px">
                                0
                            </p>
                            </d>
                            <ul>
                                <br>
                                <form action="" method="get">
                                    <label><input name="Fruit" type="radio" value="" />全部</label>　
                                </form>
                            </ul>
                            <ul class="jiesou" style="margin-top: 50px;color: #6c6c6c">
                                <!--<li style="float: left;width: 1000px"><li>买家评论:<?php echo ($val["commentcontent"]); ?></li><li style="width: 200px;float: right;"> <?php echo ($val["username"]); ?></li></li>
                                <p><?php echo (date("Y/m/d",$val['addtime'])); ?></p>
                                    <br>
                                <li style="color: orangered;width: 600px">卖家回复:
                                    <?php if($val['isreply'] == 1): echo ($val['replycontent']); ?>
                                        <?php else: ?>
                                        亲的好评对小店来说是多么重要，它是对小店服务的肯定，更是对小店工作的默默支持，它激发了小店追求更高标准的潜力，让小店感觉到一切的付出都是那么的值得，感谢亲的支持，相信小店会做的更好，因为有亲。也希望亲时刻记得有小店这样一位朋友在期待亲的再次光临！<?php endif; ?>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.sit li').click(function(){
            var i=$(this).index();
            $('.sit li').removeClass('active1').eq(i).addClass('active1');
            $('.change div').hide().eq(i).show();
        })
    })
    $(function () {
        $('.sdetail').click(function () {
            var gid=$('#gid').val();
            $.post("<?php echo U('shower');?>",'gid='+gid,function (res) {
                var str='';
                for(var i in res){
                    str+="买家评论:";
                    str+="<li style='float: left;width: 1000px'><li>"+res[i].commentcontent+"</li><li style='width: 200px;float: right;'> 会员:"+res[i].username+"</li></li>";
                    str+="<p>"+res[i].addtime+"</p><br>";
                    str+="卖家回复:<li style='color:#AF874D'>";
                    if(res[i].isreply== 1){
                        str+= ""+res[i].replycontent+"<br><br><hr style='color: #c5d9e8;width: 82%'><br>";
                    }else{
                        str+="亲的好评对小店来说是多么重要,它是对小店服务的肯定,更是对小店工作的默默支持,它激发了小店追求更高标准的潜力,让小店感觉到一切的付出都是<br>那么的值得,感谢亲的支持,相信小店会做的更好,因为有亲.也希望亲时刻记得有小店这样一位朋友在期待亲的再次光临!<br><br><hr style='color: #c5d9e8;width: 82%'></li><br>";
                    }
                }
                $('.jiesou').html(str);
            },'json')
        })
    })
</script>
</body>
</html>


<!--<div class="slogen">
    <div class="index_style">
        <ul class="wrap">
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_34.png" data-bd-imgshare-binded="1"></a>
                <b>安全保证</b>
                <span>多重保障机制 认证商城</span>
            </li>
            <li><a href="#"><img src="/Public/Home/images/slogen_28.png" data-bd-imgshare-binded="2"></a>
                <b>正品保证</b>
                <span>正品行货 放心选购</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_30.png" data-bd-imgshare-binded="3"></a>
                <b>七天无理由退换</b>
                <span>七天无理由保障消费权益</span>
            </li>
            <li>
                <a href="#"><img src="/Public/Home/images/slogen_31.png" data-bd-imgshare-binded="4"></a>
                <b>天天低价</b>
                <span>价格更低，质量更可靠</span>
            </li>
        </ul>
    </div>
</div>-->
<!--底部图层-->
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>售后保障</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>13));?>">&nbsp;售后政策</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>14));?>">&nbsp;价格保护</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>15));?>">&nbsp;退款说明</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>16));?>">&nbsp;取消订单 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>17));?>">&nbsp;货到付款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>18));?>">&nbsp;在线支付</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>19));?>">&nbsp;分期付款</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>20));?>">&nbsp;异常情况</a></dd>
            </dl>
            <dl>
                <dt>新手上路</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>2));?>">&nbsp;交易条款</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>6));?>">&nbsp;售后流程</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>7));?>">&nbsp;购物流程</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>8));?>">&nbsp;隐私说明 </a></dd>
            </dl>
            <dl>
                <dt>特色服务</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>21));?>">&nbsp;次日送达</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>22));?>">&nbsp;送货入库</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>23));?>">&nbsp;无忧退换货</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>24));?>">&nbsp;全国联保</a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>9));?>">&nbsp;保险需求测试</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>10));?>">&nbsp;专题及活动</a></dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>11));?>">&nbsp;挑选保险产品</a> </dd>
                <dd><a href="<?php echo U('Home/Article/articledetail',array('id'=>12));?>">&nbsp;常见问题 </a></dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
<!--右侧菜单栏购物车样式-->
<div class="fixedBox">
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/showlist');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong>
                </a>
                <?php else: ?>
                <a href="<?php echo U('Member/login');?>">
                    <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong></a><?php endif; ?>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-service"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <div class="bjfffs"></div>

                <dl onclick="javascript:;">
                    <dd> <strong style="float: left;top:12px;left: 30px;position: absolute">QQ客服1</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=993001867&site=qq&menu=yes">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:993001867:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                    </dd><br><br>
                    <dd> <strong style="float: left;top:52px;left: 30px;position: absolute">QQ客服2</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=211663882&site=qq&menu=yes">
                            <img border="0" style="" src="http://wpa.qq.com/pa?p=2:211663882:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                        <!--                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=591813766&site=qq&menu=yes">
                                                    <img border="0" src="http://wpa.qq.com/pa?p=2:591813766:53" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>-->
                    </dd>
                </dl>

            </div>
        </li>
        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
            <span class="fixeBoxSpan iconfont icon-erweima"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <div class="QR_code">
                    <p><img src="/Public/Home/images/two-code.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <span style="color: #000">微信扫一扫，关注我们</span>
                </div>
            </div>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/collection');?>"> <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong>收藏</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="<?php echo U('Personal/foot');?>"> <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi Home">
            <?php if($_SESSION['shop_']['mid']!= 0): ?><a href="#"> <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong> </a>
                <?php else: ?>
                <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong><?php endif; ?>
        </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>

</body>
</html>