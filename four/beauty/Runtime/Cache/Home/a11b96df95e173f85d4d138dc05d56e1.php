<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/yhcss/style.css" />
    <!--[if IE 6]>
    <script src="/Public/Home/js/js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input, a');
    </script>
    <![endif]-->
    <script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/lrscroll_1.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/n_nav.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/yhcss/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/yhcss/MagicZoom.css" />
    <script type="text/javascript" src="/Public/Home/js/yhjs/MagicZoom.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/num.js">
        var jq = jQuery.noConflict();
    </script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/p_tab.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/shade.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <title>详情页</title>
    <style type="text/css">
        #form3 dl div{margin: 10px 0;}
        #form3 dl div input{width: 200px;height: 30px;}
        #form3 dl .div4 input{width: 100px;margin: 0 10px;}
        #form3 dl .div6 dd{float: left;margin: 0 16px;}
        #form3 dl dd label.error{font-size: 12px;font-weight: bold;color: red;display:block;text-align: center;}
        #form3 dl dd label.ok{display:block; color:green;text-align: center;}
        ul li{margin: 25px 0;}
        #layercart ul{text-align: center;}
        #layercart ul li:first-child{font-weight: bold;font-size: 16px;}
        #layercart ul li a{display: inline-block;background-color: red;width: 80px;height: 30px;
            margin: 0 25px;text-align: center;line-height: 30px;color: white;}


        .ul,.active,.greate2,.middle2,.bad2,.commentcontent,#div1{margin:0;padding: 0;}
        .ul{width: 950px;height: 35px;background-color: lightgray;}
        .ul li{list-style: none;float:left;width:100px;height: 35px;line-height: 35px;text-align: center;cursor: pointer;}
        #div1>div{width: 950px;display: none;}
        #div1 .commentcontent{display:block;}
        .active{background-color: red;color:white;}
        .current{color:red}
        .pagelist a{border: 1px solid #CCCCCC;display: inline-block;width: 40px;height: 25px;line-height: 25px;text-align: center;}

    </style>
    <title>详情页</title>
</head>
<!--评价选项卡的JS-->
<script type="text/javascript">
</script>
<script>

    jQuery(function(){
       jQuery("#collect").click(function(){
           jQuery.get("<?php echo U('Home/Collect/collectGoods');?>",jQuery("#goods").serialize(),function(res){
               if(res.status==1){
                   layer.msg('您已成功收藏该商品',{icon:1},{time:500});
               }else{
                   if(res.info=='该商品已经在收藏夹里哦'){
                       layer.msg(res.info);
                   }else if(res.info=='请先登录'){
                           location.href='<?php echo U("Login/Login");?>'
                   }
               }
           })
        })
    })
</script>


<script>
    jQuery(function() {
        jQuery('#OUT1').click(function () {
            jQuery.post("<?php echo U('Home/Login/LoginOut');?>", '', function (res) {
                if (res.status == 1) {
                    layer.msg('退出成功',{icon: 1,time:1000},function () {
                                location.href = "<?php echo U('Home/Index/index');?>";
                            }
                    )
                } else {
                    layer.open({
                        content: res.info,
                        icon: 2,
                        title: '错误提示'
                    });
                }
            }, 'json')
        })

    })

</script>





<body>
<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <!--End 所在收货地区 End-->
        <span class="fr">
        	<span class="fl">你好<?php echo session('mname')?session('mname'):'';?>欢迎光临!<a id="OUT1"  style="color: #ff0000; cursor: pointer">
                <?php echo session('mname')?'退出':'';?></a><em></em>
                <a href="<?php echo U('Home/Login/Login');?>"><?php echo session('mname')?'':'请登录';?></a>&nbsp;
                <a href="<?php echo U('Home/Register/Register');?>" style="color:#ff4e00;"><?php echo session('mname')?'':'免费注册';?></a>
                &nbsp;|&nbsp;<a href="<?php echo U('Home/Index/index');?>">我的首页</a><a href="<?php echo U('Home/Member/Orderform');?>">&nbsp;|&nbsp;我的订单</a>&nbsp;|
                <a href="<?php echo U('Home/MyCart/tocart');?>">购物车</a>
            </span>
        	<span class="ss">
                <div class="ss_list">
                    <a href="#">网站导航</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="<?php echo U('Home/Footprint/footprint');?>">足迹</a></li>
                                <li><a href="<?php echo U('Home/Feedback/index');?>">反馈</a></li>
                                <li><a href="<?php echo U('Home/Member/index');?>">用户中心</a></li>
                                <li><a href="<?php echo U('Home/Member/showCollect');?>">我的收藏</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/Public/Home/images/yhimages/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo" style="width: 250px;"><a href="Index.html"><img src="/Public/Home/images/logo.png" /></a></div>
    <div class="search">
        <form action="<?php echo U('Home/Search/index');?>" method="get">
            <input name="keywords" value="<?php echo ($keywords); ?>" type="text"  class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>

        <span class="fl">
            <!--显示一些顶级分类-->
            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/index',array('cid'=>$cate['id']));?>"><?php echo ($cate["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
    </div>
</div>
<!--//<div>每日必看</div>-->
<!--End Header End-->
<!--Begin Menu Begin-->
<div class="menu_bg">

</div>
<!--End Menu End-->
<div class="i_bg">
    <div class="postion">
        <span class="fl"><?php echo ($pathinfo); ?></span>
    </div>
    <div class="content">

        <div id="tsShopContainer">
            <!--商品的主图-->
            <?php if(is_array($zhugoodsimage)): $i = 0; $__LIST__ = $zhugoodsimage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhu): $mod = ($i % 2 );++$i;?><div id="tsImgS"><a href="/Uploads/<?php echo ($zhu["imageurl"]); echo ($zhu["imagename"]); ?>" title="Images" class="MagicZoom" id="MagicZoom"><img src="/Uploads/<?php echo ($zhu["imageurl"]); echo ($zhu["imagename"]); ?>" width="390" height="390" /></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        <!--商品的副图-->
                        <?php if(is_array($fugoodsimage)): $i = 0; $__LIST__ = $fugoodsimage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu1): $mod = ($i % 2 );++$i;?><li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="/Uploads/<?php echo ($fu1["picurl"]); echo ($fu1["picname"]); ?>" tsImgS="/Uploads/<?php echo ($fu1["picurl"]); echo ($fu1["picname"]); ?>" width="79" height="79" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/Public/Home/images/yhimages/loading.gif" alt="Loading..." />
        </div>
        <form action="<?php echo U('Home/Huiyuan/tobuy');?>" id="goods" method="post">
            <?php if(is_array($goodsdetail1)): $i = 0; $__LIST__ = $goodsdetail1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><input type="hidden" name="gid" value="<?php echo ($val["id"]); ?>" id="gid"/>
        <div class="pro_des">
            <div class="des_name">
                <p><?php echo ($val["goodsname"]); ?></p>
                <?php echo ($val["goodsname"]); ?>
            </div>
            <div class="des_price">
                本店销售价格：<b style="color: #CCCCCC;"><del><b  style="color: #CCCCCC;">￥</b><b class="memprice"  style="color: #CCCCCC;"><?php echo ($val["saleprice"]); ?></b></del></b><br />
                黄金会员价格：<b>￥</b><b class="saleprice" style="margin-right: 20px;"><?php echo ($val["memprice"]); ?></b>
                消费积分：<span><?php echo ($val["score"]); ?>R</span>
            </div>
            <div class="des_choice">
                <span class="fl">型号选择：</span>
                <ul id="des_li">
                        <div class="theme-options">
                            <ul>
                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><li class="sku-line"><i><?php echo ($type['ml']); ?>ml</i></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <input type="hidden" name="xinghao"/>
                            </ul>
                        </div>
                </ul>
            </div>

            <div class="des_share">
                <div class="d_sh" style="margin-left: 0;">
                    分享
                    <div class="bdsharebuttonbox">
                        <a href="#" class="bds_more" data-cmd="more"></a>
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    </div>
                </div>
                <script type="text/javascript">
                    window._bd_share_config={
                        "common":{
                            "bdPopTitle":"您的自定义pop窗口标题",
                            "bdSnsKey":{},
                            "bdText":"此处填写自定义的分享内容",
                            "bdMini":"2",
                            "bdMiniList":false,
                            "bdPic":"http://localhost/centlight/public/attachment/201410/24/14/5449ef39574f5_282x220.jpg", /* 此处填写要分享图片地址 */
                            "bdStyle":"0",
                            "bdSize":"16"
                        },
                        "share":{}
                    };
                    with(document)0[
                            (getElementsByTagName('head')[0]||body).
                                    appendChild(createElement('script')).
                                    src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)
                            ];
                </script>
                <div class="d_care" style="margin-right: 50px;">
                       <a id="collect">收藏商品</a>
                </div>
                <div>剩余:<span style="margin-right: 50px;"><?php echo ($val["num"]); ?>&nbsp;件</span>月销量:<span><?php echo ($val["salenum"]); ?></span>件</div>
            </div>
            <div class="des_join">
                <div class="j_nums">
                    <input type="text" value="1" id="buynum" name="salenum" class="n_ipt" readonly/>
                    <input type="button" value="+" onclick="addUpdate(jq(this));" class="n_btn_1" />
                    <input type="button" value="-" onclick="jianUpdate(jq(this));" class="n_btn_2" />
                </div>
                <span class="fl"><a  href="javascript:layerUser();" style="display:inline-block;text-align:center;font-size:16px;line-height:50px;color:white;width: 120px;height:50px;background-color: red;">立即购买</a></span>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
<!--显示品牌logo和进入品牌专区-->
        <div class="s_brand">
            <?php if(is_array($brandInfo)): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><div class="s_brand_img"><img src="/Upload/logo<?php echo ($brand['blogopath']); echo ($brand['blogoname']); ?>" width="188" height="132" /></div>
            <div class="s_brand_c"><a href="<?php echo U('Home/BrandGoods/showBrand',array('bid'=>$brand['id']));?>">进入品牌专区</a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

    </div>
    <div class="content mar_20">
        <div class="l_history">
            <!--用户还喜欢的商品-->
            <div class="fav_t">用户还喜欢</div>
            <ul>
                <?php if(is_array($likegoods)): $i = 0; $__LIST__ = $likegoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$like): $mod = ($i % 2 );++$i;?><li>
                    <div class="img"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$like['id']));?>"><img src="/Uploads/<?php echo ($like["imageurl"]); ?>300_<?php echo ($like["imagename"]); ?>" width="200" height="200" /></a></div>
                    <div class="name"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$like['id']));?>"><?php echo ($like["goodsname"]); ?></a></div>
                    <div class="price">
                        <font>￥<span><?php echo ($like["saleprice"]); ?></span></font> &nbsp; <?php echo ($like["score"]); ?>R
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="l_list">
            <script type="text/javascript">
                jQuery(function(){
                    var le=jQuery('.saleprice').length;
                    totalprice=0;
                    for(var i=1;i<le;i++){
                        saleprice=parseInt(jQuery('.saleprice').eq(i).text());
                        totalprice+=saleprice;
                    }
                    jQuery('.totalprice1').val(totalprice);
                });
                flag=true;
                jQuery('.layui-layer-ico').live({
                    click:function(){
                        flag=true;
                    }
                });
            </script>
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current"><a href="#p_attribute">商品详情</a></li>
                        <li><a href="#p_comment">商品评论<span name="totalcount">(<?php echo ($totalcount); ?>)</span></a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">

                </div>
            </div>

            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                    <table border="0" align="center" style="width:745px; font-size:14px; font-family:'宋体';" cellspacing="0" cellpadding="0">
                        <tr>
                            <?php if(is_array($zhugoodsimage)): $i = 0; $__LIST__ = $zhugoodsimage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhu1): $mod = ($i % 2 );++$i;?><td width="300"><img src="/Uploads/<?php echo ($zhu1["imageurl"]); ?>300_<?php echo ($zhu1["imagename"]); ?>" width="300" height="300" style="margin-right: 40px;"/></td><?php endforeach; endif; else: echo "" ;endif; ?>
                                <td>
                                <b name="goodsname"><?php echo ($goodsname); ?></b><br />
                                【商品规格】：<span name="ml"><?php echo ($ml); ?></span><br />
                                【商品质地】：<span name="shape"><?php echo ($shape); ?></span><br/>
                                【商品日期】：与专柜同步更新<br/>
                                【商品产地】：中国<br/>
                                【商品包装】：<span name="pack"><?php echo ($pack); ?></span><br/>
                                【适用人群】：<span name="apply"><?php echo ($apply); ?></span><br />
                            </td>
                        </tr>
                    </table>

                    <p align="center">
                        <?php if(is_array($fugoodsimage)): $i = 0; $__LIST__ = $fugoodsimage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu): $mod = ($i % 2 );++$i;?><img src="/Uploads/<?php echo ($fu["picurl"]); echo ($fu["picname"]); ?>" width="746" height="425" /><br /><br /><?php endforeach; endif; else: echo "" ;endif; ?>
                    </p>

                </div>
            </div>

            <div class="des_border" id="p_comment">
                <!--<div class="des_t">商品评论</div>-->

                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="175" class="jud_per">
                            <p name="greate"><?php echo (round($greate,2)); ?>%</p>好评度
                        </td>
                        <td width="300">
                            <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="90" name="greate">好评<font color="#999999">（<?php echo (round($greate,2)); ?>%）</font></td>
                                    <td><div style="height: 13px;background: red;float: left;width: <?php echo ($greate*3/2); ?>px;"></div>
                                        <div style="height: 13px;background: #DADADA;float: left;width: <?php echo -$greate*3/2+150;?>px;"></div>
                                    </td>
                                    <td><?php echo (round($greate,2)); ?>%</td>
                                </tr>
                                <tr>
                                    <td>中评<font color="#999999" name="middle">（<?php echo (round($middle,2)); ?>%）</font></td>
                                    <td><div style="width: <?php echo ($middle*3/2); ?>px;height: 13px;background: red;float: left"></div>
                                        <div style="width: <?php echo -$middle*3/2+150;?>px;height: 13px;background: #DADADA;float: left"></div>
                                    </td>
                                    <td><?php echo (round($middle,2)); ?>%</td>
                                </tr>
                                <tr>
                                    <td>差评<font color="#999999" name="bad">（<?php echo (round($bad,2)); ?>%）</font></td>
                                    <td><div style="width: <?php echo ($bad*3/2); ?>px;height: 13px;background: red;float: left"></div>
                                        <div style="width: <?php echo -$bad*3/2+150;?>px;height: 13px;background: #DADADA;float: left"></div>
                                    </td>
                                    <td><?php echo (round($bad,2)); ?>%</td>
                                </tr>
                            </table>
                        </td>
                        <td width="185" class="jud_bg" name="goodsname">
                            购买过<?php echo ($goodsname); ?>的顾客，在收到商品才可以对该商品发表评论
                        </td>
                        <td class="jud_bg">您可对已购买商品进行评价<br /><a href="<?php echo U('Home/Member/Orderform');?>"><img src="/Public/Home/images/yhimages/btn_jud.gif" /></a></td>
                    </tr>
                </table>

                <ul class="ul">
                    <li style="margin: 0" class="active" cosid="0">全部评价(<?php echo ($totalcount); ?>)</li>
                    <li style="margin: 0" class="greate2" cosid="1" >好评(<?php echo ($greatecount); ?>)</li>
                    <li style="margin: 0" class="middle2" cosid="2">中评(<?php echo ($middlecount); ?>)</li>
                    <li style="margin: 0" class="bad2" cosid="3" >差评(<?php echo ($badcount); ?>)</li>
                </ul>
                <div id="div1">
                    <div class="commentcontent" id="allreview">
                        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                            <?php if(is_array($commresponlist1)): $i = 0; $__LIST__ = $commresponlist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment1): $mod = ($i % 2 );++$i;?><tr valign="top">
                                    <td width="160"><img src="/UserImg/photo<?php echo ($comment1["imgpath"]); echo ($comment1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($comment1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                                    <td width="180">
                                        型号：<font color="#999999"><?php echo ($comment1["ml"]); ?>ml</font>
                                        <br /><font color="orange"><?php echo ($comment1["costatus"]); ?></font>
                                    </td>
                                    <td>
                                        <?php echo ($comment1["content"]); ?><br />
                                        <?php if($comment1["imageurl"] != ''&&$comment1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($comment1["imageurl"]); echo ($comment1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$comment1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                                        <font color="#999999"><?php echo (date('Y-m-d',$comment1["coaddtime"])); ?></font>
                                    </td>
                                    <td>
                                        <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($comment1["response"]); ?><br />
                                            <font color="#999999"><?php echo (date('Y-m-d',$comment1["readdtime"])); ?></font><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="pagelist">
                            <?php echo ($page1); ?>
                        </div>
                    </div>
                  <div class="commentcontent" style="display: none"  id="goodreview">
                        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                            <?php if(is_array($commresponlist2)): $i = 0; $__LIST__ = $commresponlist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><tr valign="top">
                                    <td width="160"><img src="/UserImg/photo<?php echo ($val1["imgpath"]); echo ($val1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                                    <td width="180">
                                        型号：<font color="#999999"><?php echo ($val1["ml"]); ?>ml</font>
                                        <br /><font color="orange"><?php echo ($val1["costatus"]); ?></font>
                                    </td>
                                    <td>
                                        <?php echo ($val1["content"]); ?><br />
                                        <?php if($val1["imageurl"] != ''&&$val1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val1["imageurl"]); echo ($val1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                                        <font color="#999999"><?php echo (date('Y-m-d',$val1["coaddtime"])); ?></font>
                                    </td>
                                    <td>
                                        <?php if($val1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val1["response"]); ?><br />
                                            <font color="#999999"><?php echo (date('Y-m-d',$val1["readdtime"])); ?></font><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="pagelist">
                            <?php echo ($page2); ?>
                        </div>
                    </div>
                    <div class="commentcontent" style="display: none"  id="middlereview">
                        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                            <?php if(is_array($commresponlist3)): $i = 0; $__LIST__ = $commresponlist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><tr valign="top">
                                    <td width="160"><img src="/UserImg/photo<?php echo ($val2["imgpath"]); echo ($val2["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val2["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                                    <td width="180">
                                        型号：<font color="#999999"><?php echo ($val2["ml"]); ?>ml</font>
                                        <br /><font color="orange"><?php echo ($val2["costatus"]); ?></font>
                                    </td>
                                    <td>
                                        <?php echo ($val2["content"]); ?><br />
                                        <?php if($val2["imageurl"] != ''&&$val2["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val2["imageurl"]); echo ($val2["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val2['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                                        <font color="#999999"><?php echo (date('Y-m-d',$val2["coaddtime"])); ?></font>
                                    </td>
                                    <td>
                                        <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val2["response"]); ?><br />
                                            <font color="#999999"><?php echo (date('Y-m-d',$val2["readdtime"])); ?></font><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="pagelist">
                            <?php echo ($page3); ?>
                        </div>
                    </div>
                    <div class="commentcontent" style="display: none" id="badreview">
                        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                            <?php if(is_array($commresponlist4)): $i = 0; $__LIST__ = $commresponlist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($i % 2 );++$i;?><tr valign="top">
                                    <td width="160"><img src="/UserImg/photo<?php echo ($val3["imgpath"]); echo ($val3["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val3["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                                    <td width="180">
                                        型号：<font color="#999999"><?php echo ($val3["ml"]); ?>ml</font>
                                        <br /><font color="orange"><?php echo ($val3["costatus"]); ?></font>
                                    </td>
                                    <td>
                                        <?php echo ($val3["content"]); ?><br />
                                        <?php if($val3["imageurl"] != ''&&$val3["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val3["imageurl"]); echo ($val3["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val3['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                                        <font color="#999999"><?php echo (date('Y-m-d',$val3["coaddtime"])); ?></font>
                                    </td>
                                    <td>
                                        <?php if($val3["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val3["response"]); ?><br />
                                            <font color="#999999"><?php echo (date('Y-m-d',$val3["readdtime"])); ?></font><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="pagelist">
                            <?php echo ($page4); ?>
                        </div>
                    </div>
                </div>
         </div>
        </div>
    </div>


    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/Public/Home/images/yhimages/close.gif" /></span>
            </div>
            <div class="notice_c">

                <table border="0" align="center" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td width="40"><img src="/Public/Home/images/yhimages/suc.png" /></td>
                        <td>
                            <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                            <a href="#">查看我的关注 >></a>
                        </td>
                    </tr>
                    <tr height="50" valign="bottom">
                        <td>&nbsp;</td>
                        <td><a href="#" class="b_sure">确定</a></td>
                    </tr>
                </table>
                <div>
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
    <!--End 弹出层-收藏成功 End-->
    <!--Begin Footer Begin -->
    <div class="b_btm_bg bg_color">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="72"><img src="/Public/Home/images/yhimages/b1.png" width="62" height="62" /></td>
                    <td><h2>正品保障</h2>正品行货  放心购买</td>
                </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="72"><img src="/Public/Home/images/yhimages/b2.png" width="62" height="62" /></td>
                    <td><h2>满38包邮</h2>满38包邮 免运费</td>
                </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="72"><img src="/Public/Home/images/yhimages/b3.png" width="62" height="62" /></td>
                    <td><h2>天天低价</h2>天天低价 畅选无忧</td>
                </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="72"><img src="/Public/Home/images/yhimages/b4.png" width="62" height="62" /></td>
                    <td><h2>准时送达</h2>收货时间由你做主</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
                服务热线：<br />
                <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/Public/Home/images/yhimages/er.gif" width="118" height="118" /></div>
            <img src="/Public/Home/images/yhimages/ss.png" />
        </div>
    </div>
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/Public/Home/images/yhimages/b_1.gif" width="98" height="33" /><img src="/Public/Home/images/yhimages/b_2.gif" width="98" height="33" /><img src="/Public/Home/images/yhimages/b_3.gif" width="98" height="33" /><img src="/Public/Home/images/yhimages/b_4.gif" width="98" height="33" /><img src="/Public/Home/images/yhimages/b_5.gif" width="98" height="33" /><img src="/Public/Home/images/yhimages/b_6.gif" width="98" height="33" />
        </div>
    </div>
    <!--End Footer End -->
</div>
<input type="hidden" id="mid" value="<?php echo (session('mid')); ?>"/>
<input type="hidden" name="uservip" value="<?php echo ($uservip); ?>"/>
</body>

<script src="/Public/Home/js/yhjs/ShopShow.js"></script>

<!--[if IE 6]>
<script src="/Public/Home/js/js/zh_CN.js"></script>
<![endif]-->
<script type="text/javascript">
    //商品规格选择
    jQuery(function() {
        jQuery(".theme-options").each(function() {
            var i = jQuery(this);
            var p = i.find("ul>li");
            jQuery(".theme-options ul li").first('li').addClass('checked');
            jQuery(".theme-options ul li").siblings('input').val(jQuery(".theme-options ul li").first('li').text());
            p.click(function() {
                if (!!jQuery(this).hasClass("checked")) {
                    jQuery(this).removeClass("checked");

                } else {
                    jQuery(this).addClass("checked").siblings("li").removeClass("checked");
                    jQuery(this).siblings('input').val(jQuery(this).text())

                }

            })
        })

    })
</script>
<script type="text/javascript">
    jQuery(function(){
        gid=jQuery('input[name="gid"]').val();
        jQuery('.theme-options ul li').click(function(){
            ml=jQuery('input[name="xinghao"]').val();
            jQuery.post("<?php echo U('Home/Huiyuan/saleprice');?>",{gid:gid,xinghao:ml},function(resinfo){
                if(resinfo.status){
                    jQuery('.des_price .saleprice').text(resinfo.info['memprice']);
                    jQuery('.des_price .memprice').text(resinfo.info['saleprice']);
                }
            })
        })
    })
</script>

<script type="text/javascript">
    //立即购买的登录弹框
    flag=true;
    jQuery('.layui-layer-ico').live('click',function(){
        flag=true;
    });
    function layerUser() {
    var mid=jQuery('#mid').val();
    var uservip=jQuery('input[name="uservip"]').val();
     var   gid=jQuery('input[name="gid"]').val();
    if(mid){
        if(uservip==3){
            jQuery('#goods').submit();
        }else{
            layer.msg('黄金会员才能购买哦,去消费升级会员吧');
        }
    }else {
        if (flag) {
            flag = false;
            layer.open({
                type: 1,
                shade: false,
                title: "登录",//false为不显示标题
                content: "<div style='width:300px;height:350px;background:white;padding:30px'>" +
                '<form id="form3" method="post" enctype="multipart/form-data" action="">' +
                '<dl>' +
                '<div class="div1">' +
                '<dd><img src="/Public/Mobile/images/Image-1.png"/></dd>' +
                '</div>' +
                '<div class="div2">' +
                '<dd>用户名：<input name="username" type="text" style="margin-left: 15px;"/></dd>' +
                '</div>' +
                '<div class="div3">' +
                '<dd>密&nbsp;&nbsp;&nbsp;码：<input name="password" type="password" style="margin-left: 15px;"/></dd>' +
                '</div>' +
                '<div class="div5">' +
                '<input type="submit" value="登录" style="width: 300px;border-radius: 5px;height: 30px;background-color: red;"/>' +
                '</div>' +
                '<div class="div6">' +
                '<dd>还没有商城会员</dd>' +
                '<dd><a href="<?php echo U('Home/Register/register');?>">立即注册</a></dd>' +
                '<dd><a href="<?php echo U('Home/ChangPassword/index');?>">忘记密码</a></dd>' +
                '</div>' +
                '</dl>' +
                '</form>' +
                '</div>' + ';'
        })
    }
}
    var validate=jQuery('#form3').validate({
        rules:{
            username:{
                required:true,
                remote:{
                    url:'<?php echo U("Home/Order/layer");?>',
                    type:'post'
                }
            },
            password: {
                required: true
            }
        },
        messages:{
            username:{
                required:'用户名不能为空',
                remote:'用户名不存在'
            },
            password: {
                required:'密码不能为空'
            }
        },
        success: function(label) {
            label.addClass("ok").text('验证通过');
        },
        validClass: "ok"
    })
        jQuery('#form3').submit(function(){
            if(validate.form()){
                jQuery.post("<?php echo U('Home/Order/layerLogin');?>",jQuery('#form3').serialize(),function(response){
                    if(response.status==0){
                      layer.msg('用户名或密码错误');
                    }else{
                        layer.msg('登陆成功',function(){
                            if(uservip==3){
                                jQuery('#goods').submit();
                            }else{
                                location="<?php echo U('Home/Huiyuan/goodsdetail');?>?gid="+gid;
                            }
                        });
                    }
                },'json');
            }
            return false;
        })
}
</script>
</html>

<script type="text/javascript">
    jQuery(function(){
        jQuery('.ul li').click(function(){
            i=jQuery(this).index();
            jQuery('.ul li').removeClass('active').eq(i).addClass('active');
            jQuery('#div1>div').hide().eq(i).show();
        })

    });
    function goodsdetail1(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Home/Order/goodsdetail');?>",{"p":id,"gid":gid,cid:1},function(res){
            jQuery('#div1>div').eq(0).html(res);
        })
    }
    function goodsdetail2(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Home/Order/goodsdetail');?>",{"p":id,"gid":gid,cid:2},function(res){
            jQuery('#div1>div').eq(1).html(res);
        })
    }
    function goodsdetail3(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Home/Order/goodsdetail');?>",{"p":id,"gid":gid,cid:3},function(res){
            jQuery('#div1>div').eq(2).html(res);
        })
    }
    function goodsdetail4(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Home/Order/goodsdetail');?>",{"p":id,"gid":gid,cid:4},function(res){
            jQuery('#div1>div').eq(3).html(res);
        })
    }
</script>