<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>美伦美尚！</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/jquery.lazyload.js"></script>
    <script src="/Public/Home/js/index.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/headerAndFooter.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/index.css" />
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
</head>
<body>
<!-- header开始 -->
<!-- top开始 -->
<div class="top">
    <div class="topCont frm_sty clearfix">
        <p class="fl">  <b style="color:#000;"><?php switch($_SESSION['shang_home']['level']): case "1": ?>普通会员<?php break;?>
            <?php case "2": ?>铜牌会员<?php break;?>
            <?php case "3": ?>银牌会员<?php break;?>
            <?php case "4": ?>金牌会员<?php break;?>
            <?php case "5": ?>钻石会员<?php break; endswitch;?>
            <?php echo (session('username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;</b>欢迎来到美伦美尚！</p>
        <p class="fr">
            <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                <?php else: ?>
                <a href="<?php echo u('User/login');?>">登录</a>&nbsp&nbsp&nbsp
                <a href="<?php echo u('User/register');?>">注册</a>&nbsp&nbsp&nbsp<?php endif; ?>

        </p>
    </div>
</div>
<!-- top结束 -->
<div class="topNav">
    <div class="topNavCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" alt="" height="85px"/></h1>
        <ul class="fl clearfix">
            <li  ><a href="<?php echo u('Index/index');?>" >首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>


        </ul>
        <form action="<?php echo u('Home/Index/search');?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name" value="<?php echo ($name); ?>"/>
            <input type="submit" id="submit" value="" />
        </form>
    </div>
</div>
<!-- topNav结束 -->
<!-- 置顶导航istop开始 -->
<div class="istop">
    <div class="istopCont frm_sty clearfix">
        <h1 class="fl"><img src="/Public/Home/images/logo.png" height="85px" alt="" /></h1>
        <ul class="fl clearfix">
            <li><a href="<?php echo u('Index/index');?>" target="_blank">首页</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'护肤'));?> "  >护肤</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>"  >彩妆</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'香水'));?>">香水</a></li>
            <li><a href="<?php echo U('Index/search',array('name'=>'洗护'));?>">洗护</a></li>
        </ul>
        <form action="<?php echo U(Index/search);?>" method="get" class="fr clearfix">
            <input type="text" class="text" name="name"/>
            <input type="submit" id="submit" value=""/>
        </form>
    </div>
</div>
<!-- 置顶导航istop结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }

</script>
<!-- header结束 -->
<!-- banner开始 -->
<div class="banner clearfix">
    <div class="bannerCont clearfix frm_sty">
        <div class="left fl">
            <h3>全部商品分类</h3>
            <ul>
                <li class="li1"><a href="#">推荐品牌 &nbsp &nbsp   &nbsp &nbsp&nbsp &nbsp &gt &nbsp</a>
                    <div class="menu menu2">
                        <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p ><a href="<?php echo U('Index/search',array('name'=>$val['brand_name']));?> ">
                                <img src=/Public/Uploads/brands/<?php echo ($val["logo"]); ?>"  alt=""/>
                            </a>
                            </p><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </li>
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="li2"><a href=""><?php echo ($v["cname"]); ?>&nbsp &nbsp    &nbsp &nbsp&nbsp &nbsp &gt &nbsp</a>
                        <div class="menu menu3">
                            <?php if(is_array($v['second'])): $i = 0; $__LIST__ = $v['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><dt > <b><a href="<?php echo U('Index/search',array('name'=>$v2['cname']));?>"><?php echo ($v2["cname"]); ?>:</a></b></dt>
                                <dd><?php if(is_array($v2['third'])): $i = 0; $__LIST__ = $v2['third'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/search',array('name'=>$v3['cname']));?>"><?php echo ($v3["cname"]); ?></a>&nbsp&nbsp&nbsp<?php endforeach; endif; else: echo "" ;endif; ?></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
        </div>
    </div>
    <div class="right fr">
        <ul class="banner_img">
            <?php if(is_array($adlist)): $i = 0; $__LIST__ = $adlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/search',array('name'=>$val['title']));?>"><img src= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" alt=""/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="banner_menu"></ul>
        <div class="btn_l">&lt;</div>
        <div class="btn_r">&gt;</div>
    </div>
</div>

<!-- banner结束 -->
    <!-- icon开始 -->
 <div class="icon">
     <div class="iconCont frm_sty">
         <ul class="clearfix">
             <li class="li1">正品保障</li>
             <li class="li2">免息分期</li>
             <li class="li3">全球联保</li>
             <li class="li4">正规发票</li>
             <li class="li5">假一赔三</li>
             <li class="li6">终身售后</li>
         </ul>
     </div>
 </div>
    <!-- icon结束 -->
    <!-- 1f hotitem开始 -->
 <div class="hotitem floor">
     <div class="hotitemCont frm_sty">
         <div class="title title1 clearfix">
             <p class="fl">&nbsp 1F &nbsp热销单品</p>
             <p class="fr"><span class="span1">&lt</span><span class="span2">&gt</span></p>
         </div>
         <div class="btm">
          <div class="btmCont">
             <ul class="clearfix">
                 <?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li style="width:225px"><a href="<?php echo U('Index/detail',array('gid'=>$val['gid']));?>">
                         <img  src="/Public/Uploads/goods/350_<?php echo ($val["pic"]); ?>" width="200"  alt="" />
                         <p><?php echo ($val["goodsname"]); ?><br /><span class="span1"><?php echo mb_substr($val['description'],0,15,'utf-8');?></span><br /><span class="span2">￥<?php echo ($val["price"]); ?></span></p>
                     </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
          </div>
         </div>
     </div>
 </div>
    <!-- 1f hotitem结束 -->
    <!-- 2f iflashbuy开始 -->
 <div class="iflashbuy floor">
     <div class="iflashbuyCont frm_sty">
         <div class="title title2 clearfix">
             <p class="fl">&nbsp 2F &nbsp闪购</p>

         </div>
         <div class="btm clearfix">

             <div class="left fl">
                 <?php if(is_array($brandList2f)): $i = 0; $__LIST__ = $brandList2f;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/search',array('name'=>$val['brand_name']));?>">
                         &nbsp&nbsp<?php echo ($val["brand_name"]); ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                     </a><?php endforeach; endif; else: echo "" ;endif; ?>
                 <p class="p2">
                     <span>限时限量  抢完即止</span>
                     <span>正品大牌  底价闪购</span>
                     <span>全球联保  购物无忧</span>
                 </p>
                 <img class="lazy" data-original= "/Public/Home/images/2f_left_2.png" src="/Public/Home/images/loading.jpg" alt="" />
             </div>

             <div class="right fr">
                 <ul class="clearfix">

                     <?php if(is_array($frList)): $i = 0; $__LIST__ = $frList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li >
                         <a href="<?php echo U('Index/detail',array('gid'=>$val['gid']));?>">
                             <img class="lazy" data-original= "/Public/Uploads/goods/350_<?php echo ($val["pic"]); ?> " width="240" height="240"/>
                         </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                   <!--<li  class="li2"><a href="<?php echo U('Index/detail',array('gid'=>'67'));?>">
                         <p>韩束  <br /><span class="span1">珍珠白，白出晶彩 </span><br /> <span class="span2">满399减100</span></p>
                    -->
                 </ul>
             </div>
         </div>
     </div>
 </div>
    <!-- 2f iflashbuy结束 -->
    <!-- 3f hot开始 -->
<div class="hot floor">
    <div class="hotCont frm_sty">
        <div class="title title2 clearfix">
             <p class="fl">&nbsp 3F &nbsp热销</p>

         </div>
         <div class="head clearfix">
             <div class="left fl">
                 <ul>
                     <?php if(is_array($brand2)): $i = 0; $__LIST__ = $brand2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                             <a href="<?php echo U('Index/search',array('name'=>$val['brand_name']));?>"> <img class="lazy" data-original= "/Public/Uploads/brands/<?php echo ($val["logo"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="150px" height="105px"></a>
                         </li><?php endforeach; endif; else: echo "" ;endif; ?>
                 </ul>
             </div>
             <div class="right fr">
                 <ul class="clearfix ul1">
                     <li class="li1 fl">
                         <ul class="big">
                             <?php if(is_array($adlist11)): $i = 0; $__LIST__ = $adlist11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/search',array('name'=>$val['title']));?>"><img src= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>"  alt=""/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                         </ul>
                         <ul class="menu"></ul>
                         <div class="btn_l">&lt;</div>
                         <div class="btn_r">&gt;</div>
                     </li>
                     <li class="li2 fl"><a href="<?php echo U('Index/search',array('name'=>'SK-II'));?>">
                         <p>SK-Ⅱ  <br /><span class="span1">开启神仙水之旅 </span><br /> <span class="span2">立减200</span></p>
                         <img class="lazy" data-original= "/Public/Home/images/3f_right_2_1.png" src="/Public/Home/images/loading.jpg" alt="" />
                     </a></li>
                     <li class="li3 fl"><a href="<?php echo U('Index/search',array('name'=>'迪奥'));?>">
                         <p>迪奥  <br /><span class="span1">花漾甜心淡香水</span><br /> <span class="span2">7.5折</span></p>
                     </a></li>
                     <li class="li4 fl">
                        <ul class="small">
                            <?php if(is_array($adlist12)): $i = 0; $__LIST__ = $adlist12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/search',array('name'=>$val['title']));?>"><img class="lazy" data-original= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.jpg" alt=""/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                         </ul>
                         <ul class="menu"></ul>
                         <div class="btn_l">&lt;</div>
                         <div class="btn_r">&gt;</div>
                     </li>
                     <li class="li5 fl"><a href="<?php echo U('Index/search',array('name'=>'口红'));?>">
                         <p>克里斯汀  <br /><span class="span1">魅惑丰唇蜜</span><br /> <span class="span2">赠送唇笔</span></p>
                     </a></li>
                     <li class="li6 fl"><a href="<?php echo U('Index/search',array('name'=>'彩妆'));?>">
                         <p>亲亲唇膏  <br /><span class="span1">法式诱惑 一吻定情</span><br /> <span class="span2">额外礼品赠送</span></p>
                     </a></li>
                 </ul>
             </div>
         </div>
         <div class="btm clearfix">
             <ul class="clearfix fl ul1">
                 <?php if(is_array($goodsList1)): $i = 0; $__LIST__ = $goodsList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/detail',array('gid'=>$val['gid']));?>">
                         <img class="lazy" data-original= "/Public/Uploads/goods/350_<?php echo ($val["pic"]); ?>" width="200" src="/Public/Home/images/loading.jpg" alt="" />
                         <p><?php echo ($val["goodsname"]); ?><br /><span class="span1">￥<?php echo ($val["price"]); ?></span></p>
                     </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
             <ul class="clearfix fl ul2">
                 <?php if(is_array($goodsList2)): $i = 0; $__LIST__ = $goodsList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/detail',array('gid'=>$val['gid']));?>">
                         <img class="lazy" data-original= "/Public/Uploads/goods/350_<?php echo ($val["pic"]); ?>" width="200" src="/Public/Home/images/loading.jpg" alt="" />
                         <p><?php echo ($val["goodsname"]); ?><br /><span class="span1">￥<?php echo ($val["price"]); ?></span></p>
                     </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
             <p class="fr last"><img class="lazy" data-original= "/Public/Home/images/3f_btm_5.png" src="/Public/Home/images/loading.jpg" alt="" />&nbsp &nbsp 换一批</p>
         </div>
    </div>
</div>
    <!-- 3f hot结束 -->
    <!-- 4f like开始 -->
<div class="like floor">
    <div class="likeCont frm_sty">
        <div class="title title2 clearfix">
             <p class="fl">&nbsp 4F &nbsp猜你喜欢</p>
         </div>
        <ul class="clearfix">
            <?php if(is_array($goodsList3)): $i = 0; $__LIST__ = $goodsList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/detail',array('gid'=>$val['gid']));?>">
                    <img class="lazy" data-original= "/Public/Uploads/goods/350_<?php echo ($val["pic"]); ?>" width="270" src="/Public/Home/images/loading.jpg" alt="" />
                </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
    <!-- 4f like结束 -->
<!-- 5f brand开始 -->
<div class="brand floor">
    <div class="brandCont frm_sty clearfix">
        <div class="title title2 clearfix">
            <p class="fl">&nbsp 5F &nbsp品牌馆</p>

        </div>
        <div class="left fl">
            <ul class="clearfix">
                <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('Brand/brand',array('bid'=>$val['bid']));?>"> <img class="lazy" data-original= "/Public/Uploads/brands/<?php echo ($val["logo"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="150px" height="105px"></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="right fr">
            <ul class="clearfix">
                <li class="li1 all">
                    <ul >
                        <?php if(is_array($adlist1)): $i = 0; $__LIST__ = $adlist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Index/search',array('name'=>$val['title']));?>"><img class="lazy" data-original= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="398" height="294"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <ul class="banner-menu"></ul>
                    <div class="btn_l">&lt;</div>
                    <div class="btn_r">&gt;</div>
                </li>
                <li class="li2 all">
                    <ul>

                        <?php if(is_array($adlist2)): $i = 0; $__LIST__ = $adlist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Index/search',array('name'=>$val['title']));?>"><img class="lazy" data-original= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="398" height="294"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="btn_l">&lt;</div>
                    <div class="btn_r">&gt;</div>
                </li>
                <li class="li3 all">
                    <ul>
                        <?php if(is_array($adlist3)): $i = 0; $__LIST__ = $adlist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Index/search',array('name'=>$val['title']));?>"><img class="lazy" data-original= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="398" height="294"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="btn_l">&lt;</div>
                    <div class="btn_r">&gt;</div>
                </li>
                <li class="li4 all">
                    <ul>
                        <?php if(is_array($adlist4)): $i = 0; $__LIST__ = $adlist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('Index/search',array('name'=>$val['title']));?>"><img class="lazy" data-original= "/Public/Uploads/Ad/<?php echo ($val["pic"]); ?>" src="/Public/Home/images/loading.jpg" alt="" width="398" height="294"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="btn_l">&lt;</div>
                    <div class="btn_r">&gt;</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 5f brand结束 -->


    <!--leftNav 楼层导航开始-->
<div class="leftNav">
  <ul>
    <li class="focus">1F <span>热销单品</span></li>
    <li>2F<span>闪购</span></li>
    <li>3F<span>热销</span></li>
    <li>4F<span>猜你喜欢</span></li>
    <li>5F<span>品牌馆</span></li>
  </ul>
</div>
<!--leftNav 楼层导航结束-->
<!-- footer开始 -->

<!-- bottomNav开始 -->
<div class="bottomNav">
    <div class="bottomNavCont frm_sty">
        <div class="head">
            <ul class="clearfix">
                <li class="li1">行业权威推荐</li>
                <li class="li2">欧洲品牌授权</li>
                <li class="li3">银行战略合作</li>
                <li class="li4">7天无理由退货</li>
                <li class="li5">终身售后服务</li>
            </ul>
        </div>
        <div class="btm clearfix">
            <div class="left fl">
                <ul class="clearfix">
                    <li class="li_big">
                        <ul>新手
                            <li><a href="#">注册新会员</a></li>
                            <li><a href="#">如何订购</a></li>
                            <li><a href="#">正品保障</a></li>
                            <li><a href="#">常见问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>支付
                            <li><a href="#">支付方式</a></li>
                            <li><a href="#">分期付款</a></li>
                            <li><a href="#">支付问题</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>配送
                            <li><a href="#">配送方式</a></li>
                            <li><a href="#">包裹签收</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>保障
                            <li><a href="#">服务承诺</a></li>
                            <li><a href="#">价格保护</a></li>
                            <li><a href="#">售后政策</a></li>
                        </ul>
                    </li>
                    <li class="li_big">
                        <ul>帮助
                            <li><a href="#">商务合作</a></li>
                            <li><a href="#">了解我们</a></li>
                            <li><a href="#">人才招聘</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right fr clearfix">
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />微信服务号</p>
                <p><img src="/Public/Home/images/bottomNav_qrCode.png" alt="" /><br />商城客户端</p>
            </div>
        </div>
    </div>
</div>
<!-- bottomNav结束 -->
<!-- bottom开始 -->
<div class="bottom">
    <div class="bottomCont frm_sty">
        <p>Copyright © 2008-2016 vip.com，All Rights Reserved 豫ICP备08114786号 ICP经营许可证：豫B7-20090329 网络文化经营许可证：豫网文〔2016〕1601-110 </p>
        <p>使用本网站即表示接受可俪用户协议。版权所有 河南可俪化妆品有限责任公司</p>
        <img src="/Public/Home/images/index_bottom.jpg" alt="" />
    </div>
</div>
<!-- bottom结束 -->
<!-- footer结束 -->
    <!-- 侧面导航开始 -->
<!-- 侧面导航开始 -->
<div class="rightNav">
    <ul>
        <li class="li1"><img src="/Public/Home/images/user.png"/>
            <ul>
                <li>
                    <h1><img src="/Public/Home/images/quxiao.png" alt="" /></h1>
                    <h2><img src="/Public/Home/images/nvhai.png"/></h2>
                    <b>您好！请
                        <?php if(($_SESSION['shang_home']['id']) > "0"): ?><a href="javascript:logout()">退出</a> &nbsp&nbsp&nbsp
                            <a href="<?php echo u('Member/memberinfo');?>">会员中心</a>
                            <?php else: ?>
                            <a href="<?php echo u('User/login');?>">登录 </a>
                            &nbsp;| &nbsp;<a href="<?php echo u('User/register');?>">注册</a><?php endif; ?>
                    </b>
                    <h5></h5>
                    <?php if(($_SESSION['shang_home']['id']) > "0"): ?><span class="span2"><a href="<?php echo u('Member/Order');?>">我的订单 </a></span>

                        <?php else: endif; ?>
                </li>
            </ul>

        </li>
        <h4><img src="/Public/Home/images/lineke.png"/></h4>

        <li class="li2">
            <a href="<?php echo U('Home/Mycar/mycar');?>">
                <h3>
                    <img src="/Public/Home/images/shop.png"/>
                </h3>
                <p>购物车</p>
                <h1><?php if(($_SESSION['shang_home']['num']) < "0"): ?>0<?php else: echo (session('num')); endif; ?></h1>
            </a>
        </li>
        <h5><img src="/Public/Home/images/lineke.png"/></h5>

        <li class="li4">
            <a href="javascript:collect(<?php echo (session('id')); ?>);">
                <img src="/Public/Home/images/heart.png"/>
                <p>我的收藏</p>
            </a>
        </li>
        <li class="li5">
            <a href="<?php echo U('Home/Index/myfoot');?>">
            <img src="/Public/Home/images/zuji.png"/>
            <p>我的足迹</p>
            </a>
        </li>
        <li class="li6">
            <p>
            </p>
        </li>
        <li class="li7">
            <p></p>
        </li>
        <li class="li8">
            <img src="/Public/Home/images/totop.png" class="toTop"/>
            <p>返回顶部</p>
        </li>
    </ul>
</div>
<!-- 侧面导航结束 -->
<script>
    function logout(){
        //询问框
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Home/User/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo U('Home/Index/index');?>";
                }
            });
        });
    }
    function collect(v){
        if(v){
            location.href="<?php echo u('Home/Member/collect');?>";
        }else{
            layer.alert('请先登录',{
                yes:function(){
                    location.href="<?php echo u('Home/User/login');?>";
            }})
        }
    }
</script>
<!-- 侧面导航结束 -->
</body>
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
</html>