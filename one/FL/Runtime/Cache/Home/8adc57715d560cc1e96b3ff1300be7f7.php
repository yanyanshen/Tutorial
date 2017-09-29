<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/lrtk.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/magiczoomplus.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/shopping-mall-index.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/detail.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/gwc.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/jquery.jqzoom.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.jqzoom-core.js"></script>
    <script type="text/javascript" src="/Public/Home/js/zhonglin.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <style>
        #loginForm li{width:360px;height:36px; font-size:16px; margin-top:40px;padding-left:20px;}
        #loginForm li input{width:270px;height:36px;margin-left:10px; padding-left:5px;}
        #loginForm li:nth-child(3) input{width:125px;}
        #loginForm li:nth-child(3) img{position:relative;left:48px;}
        #loginForm li:last-child input{margin-left:38px;margin-top:10px;;background-color:#FF5160;border:0;color:#fff;font-size:18px;height:36px;line-height:36px;}
        #custom_username-error,#custom_pwd-error,#yzm-error{padding-left:56px;}
    </style>

    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{
            color:#ff0300;
            font-weight: bold;
            font-size: 13px;
            /*margin-left:120px;*/  /*200px你自己随便调*/
        }
        #yzmimg{
            margin-left:146px;
            margin-top:-38px;
            margin-bottom:10px

        }
        #qq{
            margin-top:-38px;
            margin-right:120px;
        }
        #xinlang{
            margin-top:-38px;
            margin-right:70px;
        }
        #wangji{
            margin-right:290px;
        }
    </style>
</head>

<body style="position:relative;">
<!--top 开始-->

<div class="top">
    <div class="top-con w1200">
        <ul class="t-con-l f-l">
            <li><span><span style="font-weight:bold;color:red"><?php echo session('name')?session('name'):'';?></span><?php echo session('name')?'，':'您好，';?>欢迎来到丰林</span></li>
            <li><a href="<?php echo u('Custom/login');?>"><?php echo session('mid')?'':'请登陆';?></a></li>
            <li><a href="javascript:out();"><?php echo session('mid')?'退出':'';?></a></li>
            <li><a href="<?php echo u('Custom/register');?>">免费注册</a></li>
        </ul>
        <ul class="t-con-r f-r">
            <li><a href="<?php echo u('Home/User/index',array('url'=>'Home_User_index'));?>">我 (个人中心)</a></li>

            <li><a href="<?php echo u('User/order');?>">我的订单</a></li>
            <li class="erweima">
                <a href="#">扫描二维码</a>
                <div class="ewm-tu">
                    <a href="#"><img src="/Public/Home/images/erweima-tu.jpg" /></a>
                </div>
            </li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--logo search 开始-->
<div class="hd-info1 w1200">
    <div class="logo f-l">
        <h1><a href="<?php echo u('Index/index');?>" title="中林网站"><img src="/Public/images/logo.png" /></a></h1>
    </div>
    <div class="dianji f-r">
    </div>
    <div class="search f-r">
        <ul class="sp">
            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <form action="<?php echo U('Search/index');?>" method="get" id="classform">
                    <input type="text" placeholder="搜索商品..." ss-search-show="sp" name="prods" value="<?php echo ($dd); ?>"/>
                </form>
            </div>
            <button id="jk" class="f-r">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <?php if(is_array($classProd)): $i = 0; $__LIST__ = array_slice($classProd,3,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$valclass): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Search/index',array('class_name'=>$valclass['class_name']));?>"><?php echo ($valclass['class_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div>

<!--切换城市-->


<!--nav 开始-->
<div style="border-bottom:2px solid #F09E0B;">
    <div class="nav w1200">
        <a href="JavaScript:;" class="sp-kj" kj="">
            商品分类快捷
        </a>
        <div class="kj-show2 none" kj-sh="">
        </div>
        <ul>
            <?php if(is_array($firstClassList)): $i = 0; $__LIST__ = $firstClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Search/index',array('class_cid'=>$val[class_cid]));?>"><?php echo ($val["class_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--购物车-->
<div class="J-global-toolbar">
    <div class="toolbar-wrap J-wrap">
        <div class="toolbar">
            <div class="toolbar-panels J-panel">
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out" id="item-content">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="" class="title"><i></i><em class="title">购物车</em></a>
                        <span class="close-panel J-close"></span>
                    </h3>



                    <?php if(is_array($cart)): $i = 0; $__LIST__ = array_slice($cart,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tbar-cart-item" >
                            <div class="jtc-item-goods">
                                <span class="p-img"><a href="#" target="_blank"><img src="/Uploads/Prod/<?php echo ($vo[0]["prod_pic"]); ?>" alt="" height="50" width="50" /></a></span>
                                <div class="p-name">
                                    <a href="#"><?php echo ($vo[0]["prod_name"]); ?></a>
                                </div>
                                <div class="p-price"><strong>¥<?php echo ($vo[0]["prod_price"]); ?></strong>×<?php echo ($vo[0]["num"]); ?><p  class="mid-je f-r">¥ <span class="prices"><?php echo ($vo[0][prod_price]*$vo[0][num]); ?></span></p></div>

                                <a href="<?php echo u('');?>" class="p-del J-del">删除</a>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>



                    <div class="tbar-panel-footer J-panel-footer">
                        <div class="tbar-checkout">
                            <div class="jtc-number"> <strong class="J-count">商品种类数量</strong><?php echo ($count); ?> </div>
                            <div class="jtc-number"> <strong class="J-count">商品总价</strong><span id="pric">￥<?php echo ($totalPrice); ?></span></div>
                            <a class="jtc-btn J-btn" href="<?php echo u('User/cart');?>" target="_blank" >去购物车结算</a>
                        </div>
                    </div>
                </div>
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
                        <span class="close-panel J-close"></span>
                    </h3>
                    <div class="tbar-panel-footer J-panel-footer">


                        <?php if(is_array($zj)): $i = 0; $__LIST__ = array_slice($zj,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tbar-cart-item" >
                                <div class="jtc-item-goods">
                                    <span class="p-img"><a href="#" target="_blank"><img src="/Uploads/Prod/<?php echo ($vo["prod_pic"]); ?>" alt="" height="50" width="50" /></a></span>
                                    <div class="p-name">
                                        <a href="#"><?php echo ($vo["prod_name"]); ?></a>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>




                    </div>
                </div>
            </div>
            <div class="toolbar-header"></div>

            <div class="toolbar-tabs J-tab">
                <div class="toolbar-tab tbar-tab-cart">
                    <i class="tab-ico" id="tabbbb"></i>
                    <span id="gwc"></span>
                    <em class="tab-text">购物车</em>
                    <span class="tab-sub J-count " id="prodCount"><?php echo ($count); ?></span>
                </div>
                <div class=" toolbar-tab tbar-tab-history ">
                    <i class="tab-ico"></i>
                    <em class="tab-text">我的足迹</em>
                    <span class="tab-sub J-count "><?php echo ($zjss); ?></span>
                </div>
            </div>



            <div class="toolbar-mini"></div>

        </div>

        <div id="J-toolbar-load-hook"></div>

    </div>
</div>


<!--内容开始-->
<div class="details w1200 ">
    <div class="deta-info1 goodsinfo">
        <div class="dt-if1-l f-l leftinfo">
               <div class="item" style="position: relative">
                   <a href="/Uploads/Prod/<?php echo ($firstBigPic); ?>" class="jqzoom" rel='gal1'  title="triumph" >
                       <img src="/Uploads/Prod/350_<?php echo ($firstBigPic); ?>"  title="triumph" />
                   </a>
               </div>
               <!--显示上面大图和放大镜-->
                <div class="dt-qie-con f-l">
                    <a class="dt-qie-left f-l" href="JavaScript:;"><img src="/Public/Home/images/dt-if1-qietu-left.gif" /></a>
                    <ul  id="thumblist" class="clear">
                        <?php if(is_array($prodLittlePic)): $i = 0; $__LIST__ = $prodLittlePic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$small): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($i?'':'zoomThumbActive'); ?>" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '/Uploads/Prod/350_<?php echo substr($small[pic_name],4);?>',largeimage: '/Uploads/Prod/<?php echo substr($small[pic_name],4);?>'}"><img width='50px' height="50px" src='/Uploads/Prod/140_<?php echo substr($small[pic_name],4);?>'/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <a class="dt-qie-right f-r" href="JavaScript:;"><img src="/Public/Home/images/dt-if1-qietu-right.gif" /></a>
                </div>

                <!--显示下面三张小图-->
            <div class="dt-if1-fx">
                <p>商品编码：<?php echo ($prod_number); ?></p>
                <p>分享到：<a href="#"><img src="/Public/Home/images/dt-xl.gif" /></a><a href="#"><img src="/Public/Home/images/dt-kj.gif" /></a><a href="#"><img src="/Public/Home/images/dt-wx.gif" /></a></p>
            </div>
        </div>

        <div class="dt-if1-m f-l rightinfo">
            <div class="dt-ifm-hd">
                <h3><a href="#"><?php echo ($prodsdata[0]["prod_name"]); ?></a></h3>
                <p><?php echo ($prodsdata[0]["prod_desc"]); ?></p>
            </div>
            <div class="dt-ifm-gojia">
                <dl>
                    <dt>宅购价</dt>
                    <dd>
                        <p class="p1">
                            <span class="sp1">¥<?php echo ($prodsdata[0]["prod_sale_price"]); ?></span><span class="sp2"><?php echo ($prodsdata[0]["prod_price"]); ?></span>
                        </p>
                        <p class="p2">
                            <span class="sp1"><img src="/Public/Home/images/dt-ifm-sp1-img.gif" />5分</span><span class="sp2">共有<?php echo ($prodinfo[0]["prod_comment_num"]); ?>条评价</span>
                        </p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
            <dl class="dt-ifm-spot">
                <dt>活动</dt>
                <dd>
                    <P><span>包邮</span>本店满50.00元免运费</P>
                    <P><span>满赠</span>本店满500.00元赠300.00元礼品（随机赠送）</P>
                </dd>
                <div style="clear:both;"></div>
            </dl>

            <dl class="dt-ifm-box2">
                <br/>
                <dt>库存：<?php echo ($prodsdata[0]["prod_qty"]); ?></dt>
                 <dt>  <span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;已售：<?php echo ($prodsdata[0]["prod_offt"]); ?></span></dt>
                <div style="clear:both;"></div>
            </dl>

                <dl class="dt-ifm-box3">
                    <form action="<?php echo u('Order/index');?>" method="post" id="form3">
                    <dt>数量</dt>
                        <dd>
                            <a class="box3-left" href="javascript:;" id="decre">-</a>
                            <input type="text" value="1" name="num_<?php echo ($prodsdata[0]["prod_id"]); ?>" id="buynum">
                            <a class="box3-right" href="JavaScript:;" id="incre">+</a>

                        </dd>
                    <div style="clear:both;"></div>
                    <input type="hidden" value="<?php echo ($prodsdata[0]["prod_id"]); ?>" name="chk[]"/>
                    </form>
                </dl>
                <div class="dt-ifm-box4">
                    <input type="submit" class="btn1" id="ljgm" value="立即购买">
                    <input type="button" class="btn2 add-to-cart"  value="加入购物车">

                </div>

        </div>
        <div class="dt-if1-r f-r">
            <div class="dt-ifr-fd">
                <div class="dt-ifr-tit">
                    <h3>同类推荐</h3>
                </div>
                <?php if(is_array($leisiprod)): $i = 0; $__LIST__ = array_slice($leisiprod,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$leisi): $mod = ($i % 2 );++$i;?><dl>
                    <dt><a href="<?php echo U('Detail/index',array('prod_id'=>$leisi[prod_id]));?>"><img  style="width:62px; height:62px;" src="/Uploads/Prod/140_<?php echo ($leisi['prod_pic']); ?>" /></a></dt>
                    <dd>
                        <a href="<?php echo U('Detail/index',array('prod_id'=>$leisi[prod_id]));?>"><?php echo ($leisi['prod_name']); ?></a>
                        <p>¥<?php echo ($leisi['prod_sale_price']); ?></p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="deta-info2">
        <div class="dt-if2-l f-l">
            <div class="if2-l-box1">
                <div class="if2-tit">
                    <h3>达人选购</h3>
                </div>
                <ul>
                    <?php if(is_array($popularProds)): $i = 0; $__LIST__ = $popularProds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$popVal): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo u('Home/Detail/index',array('prod_id'=>$popVal[prod_id]));?>"><img src="/Uploads/Prod/140_<?php echo ($popVal['prod_pic']); ?>" /></a>
                        <a class="if2-li-tit" href="#"><?php echo ($popVal["prod_name"]); ?></a>
                        <p>¥<?php echo ($popVal["prod_sale_price"]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
            <div class="if2-l-box1" style="margin-top:18px;">
                <div class="if2-tit">
                    <h3>看了又看</h3>
                </div>
                <ul>
                    <?php if(is_array($lookedProds)): $i = 0; $__LIST__ = $lookedProds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lookVal): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo u('Home/Detail/index',array('prod_id'=>$lookVal[prod_id]));?>"><img src="/Uploads/Prod/140_<?php echo ($lookVal['prod_pic']); ?>" /></a>
                        <a class="if2-li-tit" href="#"><?php echo ($lookVal["prod_name"]); ?></a>
                        <p>¥<?php echo ($lookVal["prod_sale_price"]); ?></p>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="dt-if2-r f-r">
            <ul class="if2-tit2">
                <li class="current" com-det="dt1"><a href="JavaScript:;">产品信息</a></li>
                <li com-det="dt2"><a href="JavaScript:index(1);">商品评论</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div com-det-show="dt1">
                <dl class="if2-r-box1">
                    <dd>
                        <p>规格参数</p>
                        <ul>
                            <?php if(is_array($prodinfo)): $i = 0; $__LIST__ = $prodinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>品牌：<?php echo ($val["prod_bid"]); ?></li>
                                <li>产地：<?php echo ($val["prod_area"]); ?></li>
                                <li>商品编号：<?php echo ($val["prod_number"]); ?></li>
                                <li>商品毛重（g）：<?php echo ($val["prod_weight"]); ?></li>
                                <li>商品包装：<?php echo ($val["prod_pack"]); ?></li>
                                <li>商品分类：<?php echo ($val["prod_cid"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div style="clear:both;"></div>
                        </ul>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="if2-tu1" style="height:800px;">
                    <?php if(is_array($prodBigPic)): $i = 0; $__LIST__ = array_slice($prodBigPic,1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$big): $mod = ($i % 2 );++$i;?><img src="/Uploads/Prod/<?php echo substr($big,4);?>"  style="margin-top:27px;"/><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div style="clear:both;"></div>
                </div>

            </div>
            <div style="display:none;" com-det-show="dt2">
                <dl class="if2-r-box2">
                    <dt>
                        <p class="box2-p1">好评率</p>
                        <p class="box2-p2">96.5%</p>
                        <p class="box2-p3">共539人评论</p>
                    </dt>
                    <dd>
                        <P>买过的人觉得</P>
                        <ul>
                            <li><a href="#">香脆可口(198)</a></li>
                            <li><a href="#">口感不错(160)</a></li>
                            <li><a href="#">分量足(84)</a></li>
                            <li><a href="#">味道不错(47)</a></li>
                            <li><a href="#">价格便宜(34)</a></li>
                            <li><a href="#">包装不错(30)</a></li>
                            <li><a href="#">吃货必备(26)</a></li>
                            <li><a href="#">送货快(14)</a></li>
                            <li><a href="#">孩子喜欢(4)</a></li>
                            <div style="clear:both;"></div>
                        </ul>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="if2-r-box3">
                    <ul>
                        <li class="current-li"><a href="JavaScript:index(1);">全部（<?php echo ($total); ?>）</a></li>
                        <li><a href="JavaScript:index(1);">好评（<?php echo ($good); ?>）</a></li>
                        <li><a href="JavaScript:index(1);">中评（<?php echo ($notbad); ?>）</a></li>
                        <li><a href="JavaScript:index(1);">差评（<?php echo ($bad); ?>）</a></li>
                        <!--<li><a href="JavaScript:index(1);">图片（1）</a></li>
                        <li><a href="JavaScript:index(1);">追加评论（1）</a></li>-->
                        <div style="clear:both;"></div>
                    </ul>
                    <div class="pixlist">
                        <?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cval): $mod = ($i % 2 );++$i;?><dl>
                                <dt>
                                    <a href="#"><img src="/Public/Home/images/box3-dt-tu.gif" /></a>
                                </dt>
                                <dd>
                                    <a href="#"><?php echo ($cval["comment_custom_id"]); ?></a>
                                    <p class="b3-p1"><?php echo ($cval["comment_content"]); ?></p>
                                    <p class="b3-p2"><?php echo date("Y-m-d H:i:s",$cval[comment_createtime]);?></p>
                                    <div style="clear:both;"></div>
                                    <?php if(is_array($appendList)): $i = 0; $__LIST__ = $appendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aval): $mod = ($i % 2 );++$i; if($cval[comment_custom_id] == $aval[comment_custom_id]): ?><div class="b3-zuijia">
                                                <p class="zj-p1">追加评论：</p>
                                                <p class="zj-p2"><?php echo ($aval["comment_content"]); ?></p>
                                                <p class="zj-p3"><?php echo date('Y-m-d H:i:s',$aval[comment_createtime]);?></p>
                                            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </dd>
                                <div style="clear:both;"></div>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        <div>
                            <div class="listpage">
                                <?php echo ($page); ?>
                            </div>
                        </div>
                </div>
                </div>

        </div>
        <div style="clear:both;"></div>
        <input type="hidden" value="<?php echo ($prod_id); ?>"/>
    </div>
    </div>
</div>

<!--底部服务-->
<div class="ft-service">
    <div class="w1200">
        <div class="sv-con-l2 f-l">
            <dl>
                <dt><a href="#">新手上路</a></dt>
                <dd>
                    <a href="#">购物流程</a>
                    <a href="#">在线支付</a>
                </dd>
            </dl>
            <dl>
                <dt><a href="#">配送方式</a></dt>
                <dd>
                    <a href="#">货到付款区域</a>
                    <a href="#">配送费标准</a>
                </dd>
            </dl>
            <dl>
                <dt><a href="#">购物指南</a></dt>
                <dd>
                    <a href="#">常见问题</a>
                    <a href="#">订购流程</a>
                </dd>
            </dl>
            <dl>
                <dt><a href="#">售后服务</a></dt>
                <dd>
                    <a href="#">售后服务保障</a>
                    <a href="#">退款说明</a>
                    <a href="#">新手选购商品总则</a>
                </dd>
            </dl>
            <dl>
                <dt><a href="#">关于我们</a></dt>
                <dd>
                    <a href="#">投诉与建议</a>
                </dd>
            </dl>
            <div style="clear:both;"></div>
        </div>
        <div class="sv-con-r2 f-r">
            <p class="sv-r-tle">187-8660-5539</p>
            <p>周一至周五9:00-17:30</p>
            <p>（仅收市话费）</p>
            <a href="#" class="zxkf">24小时在线客服</a>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
<input type="hidden" id="prod_id" value="<?php echo ($prodsdata[0]["prod_id"]); ?>" />
<!--底部 版权-->
<div class="footer w1200">
    <p>
        <a href="#">关于我们</a><span>|</span>
        <a href="#">友情链接</a><span>|</span>
        <a href="#">宅客微购社区</a><span>|</span>
        <a href="#">诚征英才</a><span>|</span>
        <a href="#">商家登录</a><span>|</span>
        <a href="#">供应商登录</a><span>|</span>
        <a href="#">热门搜索</a><span>|</span>
        <a href="#">宅客微购新品</a><span>|</span>
        <a href="#">开放平台</a>
    </p>
    <p>
        沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
    </p>
</div>

<script type="text/javascript">

        $('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: true,
            alwaysOn:false,
            title:false,
            zoomWidth:430,
            zoomHeight:430,
            xOffset:20,
            yOffset:0
        });

    $("#buynum").keyup(function(){
        var num=this.value;
        if(num>100){
            this.value=100;
        }
        if(num<1){
            this.value=1;
        }
        if(isNaN(num)){
            this.value=1;
        }
    })

    $('.add-to-cart').on('click', function () {
        var cart = $('#tabbbb');   //目标地点
        var imgtodrag = $('.item').find('img').eq(0);  //抓取图片
        if (imgtodrag) {
            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            }).css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '1000'

            }).appendTo($('body')).animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 75,
                'height': 75
            },1000);
            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {

                $(this).detach();
                num=$("#buynum").val();
                prod_id=$("#prod_id").val();

                $.post("<?php echo U('index');?>",{'id':prod_id,'num':num},function(res){
                    layer.alert(res.status);
                    $("#prodCount").html(res.count);
                    layer.msg(res.status, {icon: 1});
                })
            });
        }

    });
    function gettotalprice(){
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<prices.length;i++){

            totalprice+=parseInt(prices[i].innerHTML);

        };

        document.getElementById('pric').innerHTML='￥'+totalprice;
    }
    gettotalprice();

</script>

<script type="text/javascript">

    $(".toolbar-tab").click(function(){
        $.post("<?php echo U('index');?>",{'item':1},function(res){
            $("#item-content").html(res);
        })
    })
</script>





</body>
<script type="text/javascript" src="/Public/Home/js/gwc.js"></script>

<script type="text/javascript">
    function index(id){
        var id=id;
        var pid=$("input:hidden").val();
        var cid=$(".current-li").index();
        $.get("<?php echo U('index');?>",{"p":id,"pid":pid,"cid":cid},function(res){
            $('[com-det-show=dt2]').html(res);
        })
    }
</script>

<script type="text/javascript">

    $("#ljgm").click(function(){

        $.post("<?php echo U('Custom/isLogin');?>",null,function(res){
            if(res=='true'){
                $('#form3').submit();
            }else{
                layer.open({
                    type:1,
                    skin:'layui-lay-rim',
                    area:['380px','420px'],
                    shift:2,
                    title:'请登录',
                    content:'<form  action="" name="loginForm" method="post" id="loginForm" style="border:0">'+
                    '<ul>'+
                    '<li>用户名<input type="text" placeholder="手机号/邮箱" name="custom_username"></li>'+
                    '<li>密码&nbsp;&nbsp;&nbsp;<input type="password" placeholder="密码" name="custom_pwd"></li>'+
                    '<li>验证码<input type="text" placeholder="验证码" name="yzm"><img id=\'yzmimg\' src="<?php echo U('Home/Custom/verify');?>" class=\'yzmImg\' height="38px" width="140px" /></li>'+
                    '<li><input type="submit" value="登录" id="log-btn"></li>'+
                    '</ul>'+
                    '</form>'
                });

                $('#yzmimg').click(function(){
                    $(this).attr("src","<?php echo u('Home/Custom/verify');?>")
                });

                    var validate=$('#loginForm').validate({
                        //设置验证规则
                        rules:{
                            custom_username:{
                                required:true
                            },
                            custom_pwd:{
                                required:true
                            },
                            yzm:{
                                required:true,
                                remote:{
                                    url:'<?php echo U("Home/Custom/chkVerify");?>',
                                    type:'post'
                                }
                            }
                        },
                        messages:{
                            custom_username:{
                                required:'用户名不能为空'
                            },
                            custom_pwd:{
                                required:'密码不能为空'
                            },
                            yzm:{
                                required:'请输入验证码',
                                remote:'验证码不正确'
                            }
                        },

                        errorElement:'div',
                        errorPlacement: function(error, element) {
                            error.appendTo( element.parent());
                        }
                    });

                    jQuery.validator.onfocus=true;

                    $('#loginForm').submit(function(){
                        if(validate.form()){
                            $.post("<?php echo U('Home/Custom/login');?>",$('#loginForm').serialize(),function(res){
                                if(res.status=='ok'){
                                    layer.msg(res.msg, {icon: 1},function(){
                                        layer.closeAll();
                                        location.reload();
                                    });
                                }else{
                                    layer.alert(res.msg);
                                }
                            })
                        }
                        return false;
                    })
                return false;
            }
        });

    })
</script>
<script type="text/javascript">
    function out(){
        $.post("<?php echo u('Custom/logout');?>",null,function(res){
            if(res.status=='ok'){
                location.reload();
            }
        })
    }
</script>

<script type="text/javascript">
    $('#jk').click(function(){
        $('#classform').submit();
    })
</script>

</html>