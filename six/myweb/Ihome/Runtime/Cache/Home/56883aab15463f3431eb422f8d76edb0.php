<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <title>欢迎光临爱家网！</title>
    <link rel="stylesheet" href="/Public/Home/style/reset.css"/>
    <link rel="stylesheet" href="/Public/Home/style/index.css"/>
    <link rel="stylesheet" href="/Public/Home/style/style.css"/>
    <link href="/Public/Home/indexdown/css/base.css" rel="stylesheet">
    <link href="/Public/Home/indexdown/css/main.css" rel="stylesheet">
    <style>
        .myShopCar1{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
        .carlist{position: absolute;width:450px;padding:10px;background: #fff;left:1302px;top:125px;border:1px solid #F1F1F1;display:none;z-index:999;  }
        #goodslist dd{position:relative;float:left;margin-left: 8px;}
        #myShopCar{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
    </style>
</head>
<body>
<!-- 顶部开始 -->
<div>
    <div class="header">
        <div class="headerCont frm_sty clearfix">
            <p class="p1">欢迎光临爱家频道！</p>
            <p class="tel">4008-8888-8888</p>
            <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/login');?>">用户中心</a><?php else: ?><a href="<?php echo u('Member/member');?>">会员中心</a><?php endif; ?></a>
            <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/register');?>">注册</a><?php else: ?><a href="javascript:logout()">退出</a><?php endif; ?></a>
            <a><?php if(empty($_SESSION['membername'])): ?><a href="<?php echo u('Home/Login/login');?>">亲，请登录</a><?php else: ?><a href="<?php echo u('Member/userInfo');?>"><?php echo (session('membername')); ?></a><?php endif; ?></a>
        </div>
    </div>
    <!-- 导航搜索栏 -->
    <div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><a href="javascript:;"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
            <div class="bd fl">
                <form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">
                    <input name="searchwords" type="text" class="msg" id="msg" value="" placeholder="家具">
                    <a href="javascript:document.getElementById('searchform').submit();" class="btn fl" id="abtn">搜索</a>
                </form>
                <p class="msg1"><a href="<?php echo U('Home/Search/search');?>">&nbsp;</a></p>
            </div>
            <div class="buy clearfix">
                <span class="fl">1</span>
                <a class="fl" id='mycart' href="<?php echo U('Home/Cart/showcart');?>">购物车</a>
                <div class="carlist">
                    <dl id="goodslist" style="font-size: 15px">
                        <dt>商品名称</dt>
                        <dd>商品图片</dd>
                        <dd>购买数量</dd>
                        <dd>价钱</dd>
                    </dl>
                </div>
            </div>
    </div>
    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
                <div class="menu">
                    <?php if(is_array($firstlist)): $i = 0; $__LIST__ = $firstlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="menu1" id="list">
                                <h4><?php echo ($value["catename"]); ?></h4>
                                <?php if(is_array($value['second'])): $i = 0; $__LIST__ = array_slice($value['second'],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="#"><?php echo ($val["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="submenu">
                                    <h4><?php echo ($value["catename"]); ?></h4>
                                    <?php if(is_array($value['second'])): $i = 0; $__LIST__ = $value['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p><?php echo ($val["catename"]); ?></p>
                                        <?php if(is_array($val['third'])): $i = 0; $__LIST__ = $val['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/search');?>?cid=<?php echo ($v["cid"]); ?>"><?php echo ($v["catename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="javascript:;">首页</a></li>
                <li><a href="#f1">卧室家具</a></li>
                <li><a href="#f2">儿童家具</a></li>
                <li><a href="#">书房家具</a></li>
                <li><a href="#">阳台户外</a></li>
                <li><a href="#">热销商品</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 导航开始 -->
<!-- banner开始 -->
 <div class="banner">
        <ul class="banner-img">
            <li><a href="#"><img src="/Public/Home/images/b1.jpg" alt="" /></a></li>
            <li><a href="#"><img src="/Public/Home/images/b2.jpg" alt="" /></a></li>
            <li><a href="#"><img src="/Public/Home/images/b3.jpg" alt="" /></a></li>
        </ul>
        <ul class="banner-menu"></ul>
        <div class="btn_l">&lt;</div>
        <div class="btn_r">&gt;</div>
    </div>
<!--banner 结束-->
</div>
<!-- 推荐开始 -->
<div>
    <div class="recommend frm_sty clearfix">
        <?php if(is_array($secondGoods)): $i = 0; $__LIST__ = array_slice($secondGoods,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="rec1">
                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($val["gid"]); ?>"><img src="/Public/Upload/Goodspic/thumb_150_<?php echo ($val["pic"]); ?>" alt=""></a>
                <p class="msg2">10月特献 <span>实木家私</span></p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!-- 推荐结束 -->
    <!-- 一楼开始 -->
    <div class="list1 frm_sty" id="f1">
        <div class="tab clearfix">
            <h3 class="fl"><span>1F</span>卧室家具</h3>
            <ul class="clearfix">
                <li><a href="#">全实木床</a></li>
                <li><a href="#">衣柜</a></li>
                <a class="more" href="#">MORE>></a>
            </ul>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($firstGoods)): $i = 0; $__LIST__ = array_slice($firstGoods,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value['goodsname'],0,10,'utf-8')); ?>
                                            <p><span>￥</span><?php echo ($value["price"]); ?></p>
                                        </span>
                                        <div class="border1"></div><div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($firstGoods)): $i = 0; $__LIST__ = array_slice($firstGoods,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?>
                                            <p><span>￥</span><?php echo ($value["price"]); ?></p>
                                        </span>
                                        <div class="border1"></div><div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 一楼结束 -->
<!-- 二楼开始 -->
<div>
    <div class="list3 frm_sty">
        <div class="tab clearfix">
            <h3 class="fl"><span>2F</span>儿童家具</h3>
            <ul class="clearfix">
                <li><a href="#">儿童书桌</a></li>
                <li><a href="#">儿童衣柜</a></li>
                <a class="more" href="#">MORE>></a>
            </ul>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($thirdGoods)): $i = 0; $__LIST__ = array_slice($thirdGoods,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                                        <h5 class="fl"><span>￥</span><?php echo ($value["price"]); ?></h5>
                                        <div class="border1"></div>
                                        <div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($thirdGoods)): $i = 0; $__LIST__ = array_slice($thirdGoods,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                                        <h5 class="fl"><span>￥</span><?php echo ($value["price"]); ?></h5>
                                        <div class="border1"></div>
                                        <div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 二楼结束 -->

<!-- 三楼开始 -->
<div>
    <div class="list4 frm_sty">
        <div class="tab clearfix">
            <h3 class="fl"><span>3F</span>书房家具</h3>
            <ul class="clearfix">
                <li><a href="#">逍遥</a></li>
                <li><a href="#">书柜</a></li>
                <a class="more" href="#">MORE>></a>
            </ul>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($forthGoods)): $i = 0; $__LIST__ = array_slice($forthGoods,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?>
                                            <p><span>￥</span><?php echo ($value["price"]); ?></p>
                                        </span>
                                        <div class="border1"></div>
                                        <div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div>
                <ul class="tab1Cont clearfix">
                    <?php if(is_array($forthGoods)): $i = 0; $__LIST__ = array_slice($forthGoods,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                            <div class="two">
                                <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                    <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                    <div class="msg3">
                                        <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?>
                                            <p><span>￥</span><?php echo ($value["price"]); ?></p>
                                        </span>
                                        <div class="border1"></div>
                                        <div class="border2"></div>
                                    </div>
                                </a>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- 三楼结束 -->

<!--四楼开始 -->
<div>
<div class="list5 frm_sty">
    <div class="tab clearfix">
        <h3 class="fl"><span>4F</span>阳台户外</h3>
        <ul class="clearfix">
            <li><a href="#">晾衣架</a></li>
            <li><a href="#">遮阳伞</a></li>
            <a class="more" href="#">MORE>></a>
        </ul>
        <div>
            <ul class="tab1Cont clearfix">
                <?php if(is_array($fiveGoods)): $i = 0; $__LIST__ = array_slice($fiveGoods,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                        <div class="two">
                            <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                <div class="msg3">
                                    <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                                    <h5 class="fl"><span>￥</span><?php echo ($value["price"]); ?></h5>
                                    <div class="border1"></div>
                                    <div class="border2"></div>
                                </div>
                            </a>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div>
            <ul class="tab1Cont clearfix">
                <?php if(is_array($fiveGoods)): $i = 0; $__LIST__ = array_slice($fiveGoods,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="list12">
                        <div class="two">
                            <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>" style="height:390px">
                                <img class="img2" src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="">
                                <div class="msg3">
                                    <span class="bt1"><?php echo (iconv_substr($value["goodsname"],0,10,'utf-8')); ?></span>
                                    <h5 class="fl"><span>￥</span><?php echo ($value["price"]); ?></h5>
                                    <div class="border1"></div>
                                    <div class="border2"></div>
                                </div>
                            </a>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-- 四楼结束 -->
</div>

<div class="hot frm_sty">
    <h2>热销商品</h2>
    <div class="news-box frm_sty">
        <ul class="box">
            <?php if(is_array($fiveGoods)): $i = 0; $__LIST__ = $fiveGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                    <div class="top"></div>
                    <div class="left"></div>
                    <div class="bottom"></div>
                    <div class="right"></div>
                    <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($value["gid"]); ?>"><img src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["pic"]); ?>" alt="" /></a>
                    <p><?php echo ($value["goodsname"]); ?></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<!--产品结束-->
    <script src="/Public/Home/indexdown/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/Home/indexdown/js/main.js"></script>
    <div class="WeBodyHp">
        <ul>
            <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["link"]); ?>" rel="<?php echo ($vo["title"]); ?>"  target="_blank"><span> <img src="/Public/Upload/LinkPic/<?php echo ($vo["imgsrc"]); ?>" alt="<?php echo ($vo["title"]); ?>"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
<!-- 底部开始 -->
<div class="footer">
    <div class="footer_cont frm_sty">
        <div class="service">
            <ul>
                <li class="ser1">
                    <span></span>
                    <h4><a href="#">正品保证</a></h4>
                    <p>正品保障，提供发票</p>
                </li>
                <li class="ser2">
                    <span></span>
                    <h4><a href="#">急速物流</a></h4>
                    <p>急速物流，急速送达</p>
                </li>
                <li class="ser3">
                    <span></span>
                    <h4><a href="#">无忧售后</a></h4>
                    <p>7天无理由退换货</p>
                </li>
                <li class="ser4">
                    <span></span>
                    <h4><a href="#">帮助中心</a></h4>
                    <p>您的购物指南</p>
                </li>
            </ul>
        </div>
        <div class="guild clearfix">
            <ul class="guild01 clearfix">
                <li class="strong"><a href="#">购物指南</a></li>
                <li><a href="#">导购指标</a></li>
                <li><a href="#">免费注册</a></li>
                <li><a href="#">会员等级</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">品牌大全</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">支付方式</a></li>
                <li><a href="#">易付定支会付</a></li>
                <li><a href="#">网银注册</a></li>
                <li><a href="#">快捷支付</a></li>
                <li><a href="#">分期付款</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">物流配送</a></li>
                <li><a href="#">免运费政策</a></li>
                <li><a href="#">配送服务承诺</a></li>
                <li><a href="#">签收验货</a></li>
                <li><a href="#">物流查询</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">售后服务</a></li>
                <li><a href="#">退换货政策</a></li>
                <li><a href="#">退换货流程</a></li>
                <li><a href="#">退款说明</a></li>
                <li><a href="#">退换货申请</a></li>
            </ul>
            <ul>
                <li class="strong"><a href="#">商家服务</a></li>
                <li><a href="#">商家入驻</a></li>
                <li><a href="#">培训中心</a></li>
                <li><a href="#">信息公告</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">商家帮助</a></li>
                <li><a href="#">服务市场</a></li>
            </ul>
            <div class="weixin fr">
                <p>爱家网客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 爱家有限公司版权所有 桂ICP备10101010号-201600001</p>
    </div>
</div>
    

<!-- 返回顶部 -->
<!-- <div class="toTop">TOP</div> -->

<!-- 滚屏效果 -->
<div class="leftNav">
  <ul>
    <li class="focus f1"><a href="javascript:void(0)">分类</a></li>
    <li class="focus f1"><a href="javascript:void(0)">1F</a></li>
    <li class="f2"><a href="javascript:void(0)" >2F</a></li>
    <li class="f3"><a href="javascript:void(0)">3F</a></li>
    <li class="f4"><a href="javascript:void(0)">4F</a></li>
    <li class="f5"><a href="javascript:void(0)">热卖</a></li>
  </ul>
</div>
<!-- 右导航 -->
<div class="rightNav">
    <div class="right">
      <ul class="rightCont">
            <li class="wo">
                <a class="me" href="<?php echo u('Home/Member/member');?>"><p class="p1">1</p></a>
                <div class="woCont">
                    <div class="wo1">
                        <img src="/Public/Home/images/yeye.jpg" alt="">
                        <p></p>
                    </div>
                    <ul class="wo2">
                        <li><img src="/Public/Home/images/dingdan.png" alt=""><a href="<?php echo u('Member/order','Home');?>">我的订单</a></li>
                        <li><img src="/Public/Home/images/xiaoxi.png" alt=""><a href="<?php echo u('Member/email','Home');?>">我的消息</a></li>
                    </ul>
                </div>
            </li>
        <li class="sc">
            <a class="me" href="<?php echo U('Home/Member/member');?>"><p class="p1">1</p></a>
            <p class="sc1">我的收藏</p>
        </li>
        <li class="time">
            <a class="me" href="<?php echo U('Home/Member/member');?>"><p class="p1">1</p></a>
            <p class="time1">浏览记录</p>
        </li>
        <li class="kf">
            <a class="me" href="<?php echo U('Home/Member/member');?>"><p class="p1">1</p></a>
            <p class="kf1">客服服务</p>
        </li>
        <li class="toTop"></li>
      </ul>
    </div>
</div>

<!-- 置顶导航 -->
<div class="topFixed">
    <ul class="frm_sty">
        <li><a href="#">首页</a></li>
        <li><a href="#">卧室家具</a></li>
        <li><a href="#">儿童家具</a></li>
        <li><a href="#">书房家具</a></li>
        <li><a href="#">阳台户外</a></li>
        <li><a href="#">热销商品</a></li>
    </ul>
</div>
<script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
<script src="/Public/Home/js/imageflow.js"></script>
<script src="/Public/Home/js/index.js"></script>
<script src="/Public/Home/js/reset.js"></script>
</body>
    <script>
        $('#mycart').mouseenter(function(){
            $(this).addClass('myShopCar1');
            $('.carlist').show();
            $.post('/Home/Cart/mycart?act=getCartList',null,function(res){
                $("#goodslist").html(res);
            })
        });

        $("#mycart").mouseleave(function(){
            $(this).removeClass("myShopCar1");
            $('.carlist').hide();
        });
        function logout(){
            //询问框
            layer.confirm('您确定要退出当前账户?', {
                btn: ['确定','取消']
            }, function(){
                $.get("<?php echo u('Login/logout');?>",'',function(res){
                    if(res.status=='ok'){
                        location.href="<?php echo u('Index/index');?>"
                    };
                })
            });
        }
        $('#abtn').click(function(){
            if(!$('#msg').val()){
                layer.alert('请输入要搜索的商品名称');
                return false;
            }
        })
    </script>
</html>