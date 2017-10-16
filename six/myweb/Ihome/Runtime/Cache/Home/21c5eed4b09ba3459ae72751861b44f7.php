<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>退换货</title>
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/returngood.css" />
</head>
<body>
<!-- 顶部开始 -->
<!-- 顶部开始 -->
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家频道！</a></p>
        <ul class="fr">
            <li><a href="#"><span><?php echo (session('username')); ?></span></a></li>
            <li><a href="<?php echo U('Home/Login/logout');?>">退出</a>|</li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a>|</li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
        </ul>
    </div>
</div>


<!-- 导航搜索栏 -->
<div class="search">
        <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
            <h1 class="fl"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></h1>
            <div class="bd fl">
                <form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">
                    <input name="searchwords" type="text" class="msg"  value="" placeholder="家具">
                    <a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>
                </form>
                <p class="msg1">
                    <a href="#">干笋 |</a>
                    <a href="#">腊肉 |</a>
                    <a href="#">银耳环 |</a>
                    <a href="#">糯米糕</a>
                </p>
            </div>
            <div class="buy clearfix">
                <span class="fl">1</span>
                <a class="fl" href="<?php echo U('Home/Cart/showcart');?>">购物车</a>
                <!-- <p class="fl"></p> -->
            </div>
    </div>

    <div class="nav">
        <div class="navCont frm_sty">
            <div class="classify fl">
                <div class="fenlei">
                    <h2>全部商品分类</h2>
                    <img class="xiala" src="/Public/Home/images/xiala.png" alt="">
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                <li><a href="#f1">卧室家具</a></li>
                <li><a href="#f2">儿童家具</a></li>
                <li><a href="#">书房家具</a></li>
                <li><a href="#">阳台户外</a></li>
                <li><a href="#">热销商品</a></li>
            </ul>
        </div>
     
    </div>
</div>
<i></i>
<!-- 内容开始  sidebar-->
<div class="cont frm_sty clearfix">
    <div class="cont_bg">
        <ul class="sidebar">
            <li class="touxiang">
                <img src="/Public/Home/images/touxiang.jpg">
                <p><?php echo (session('username')); ?></p>
            </li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a></li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
            <li class="focus"><a href="">退款维权</a></li>
            <li><a href="<?php echo U('Home/Member/userInfo');?>">个人信息</a></li>
            <li><a href="<?php echo U('Home/Member/adress');?>">收货地址</a></li>
        </ul>
     <!-- tab -->
        <div class="news clearfix">
            <ul class="clearfix">
                <li>退货申请</li>
                <li>换货申请</li>
            </ul>

                                   <!-- 换货 -->
            <div class="gwc">
                <table cellpadding="0" cellspacing="0" class="gwc_tb1">
                    <tr>
                      <td class="tb1_td2">申请时间</td>
                      <td class="tb1_td3">订单编号</td>
                      <td class="tb1_td4">标题</td>
                      <td class="tb1_td5">处理状态</td>
                      <td class="tb1_td6">操作</td>
                    </tr>
                </table>

                <table cellpadding="0" cellspacing="0" class="gwc_tb2">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">已处理</td>
                      <td class="tb2_td6"><!-- <a href="#">取消</a><br/> --><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">已处理</td>
                      <td class="tb2_td6"><!-- <a href="#">取消</a><br/> --><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">已处理</td>
                      <td class="tb2_td6"><!-- <a href="#">取消</a><br/> --><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">正在处理</td>
                      <td class="tb2_td6"><a href="#">取消</a><br/><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <p>共4条记录</p>
            </div>

                                 <!-- 退货 -->
            <div class="gwc2">
                <table cellpadding="0" cellspacing="0" class="gwc_tb1">
                    <tr>
                      <td class="tb1_td2">申请时间</td>
                      <td class="tb1_td3">订单编号</td>
                      <td class="tb1_td4">标题</td>
                      <td class="tb1_td5">处理状态</td>
                      <td class="tb1_td6">操作</td>
                    </tr>
                </table>

                <table cellpadding="0" cellspacing="0" class="gwc_tb2">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">已处理</td>
                      <td class="tb2_td6"> <!-- <a href="#">取消</a> <br/> --><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
                    <tr>
                      <td class="tb1_td2">2016-03-12</td>
                      <td class="tb1_td3"><a href="#">20162040384</a></td>
                      <td class="tb1_td4"><a href="#">苗家银饰手环</a></td>
                      <td class="tb1_td5">正在处理</td>
                      <td class="tb2_td6"><a href="#">取消</a><br/><a href="#">查看详情</a></td>
                    </tr>
                  </table>
                  <p>共2条记录</p>
            </div>    
        </div>
    </div>   
</div>             

 <!-- 底部  开始-->
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
                <p>苗家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 苗家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
        
    </div>
</div>
    
<!-- 底部 结束 -->


        
        
       

                    
 <script src="/Public/Home/js/jquery.1.4.2-min.js"></script>
<script src="/Public/Home/js/returngood.js"></script>   
</body>
</html>

</body>
</html>