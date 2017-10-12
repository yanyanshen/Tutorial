<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>我的订单</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/YMDClass.mini.js"></script>
    <script src="/Public/Home/js/geo.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/password.js"></script>
    <script src="/Public/Home/js/denglu.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <script src="/Public/Home/js/order.js"></script>
    <script src="/Public/Home/js/reset.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/reset1.css" />
    <link rel="stylesheet" href="/Public/Home/style/denglu.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/order.css">
    <link rel="stylesheet" href="/Public/Home/style/swiper.min.css">
    <link rel="stylesheet" href="/Public/Home/style/password.css" />
    <link rel="stylesheet" href="/Public/Home/style/index.css" />
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <style>
        #list li{
            margin: 0 60px 0 30px;
        }
    </style>
    <style>



        #page a{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #3D96C9;
            color:#fff;
        }
        #page a:hover{
            background: deeppink;
            color:#000;
        }
        #page span.current{
            display: inline-block;
            width: 20px;
            height:18px;
            padding:5px;
            margin: 5px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #ff2832;
            color:#000;
            font-weight: bold;
        }
        #page span.rows{
            float:left;
            margin-right:50px;
            margin-top:5px;
            font-size: 20px;
        }
        #page span.rows b{
            font-size: 20px;
            color:red;
        }
    </style>
</head>
<body>
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

<!-- 我的订单开始 myorder-->
<!-- 左侧边栏开始 -->
<div class="myorder frm_sty clearfix">
    <div class="sidebar fl">
        <img src="/Public/Uploads/UserPic/<?php echo ((isset($vo["pic"]) && ($vo["pic"] !== ""))?($vo["pic"]):'5.jpg'); ?>" height="120px" width="120px">
        <a class="no" href="<?php echo u('Member/order');?>">我的订单</a>
        <a href="<?php echo u('Member/collect');?>">商品收藏</a>
        <a href="<?php echo u('Member/news');?>">我的消息</a>
        <a href="<?php echo u('Member/memberinfo');?>">个人中心</a>
        <a href="<?php echo u('Member/address');?>">收货地址</a>
    </div>
    <!-- 左侧边栏结束 -->
    <div class="order fl">
        <h4>我的订单</h4>
        <div class="orderCont">
                <table cellpadding="0" cellspacing="0" class="gwc_tb1">
                    <tr>
                        <td class="tb1_td1"><input id="Checkbox1" type="checkbox"  class="allselect"/>  </td>
                        <td class="tb1_td2"><a href="#">全选</a></td>
                        <td class="tb1_td3"><a href="#">删除</a></td>
                        <td class="tb1_td4"><a href="#">标为已读</a></td>
                    </tr>
                </table>
            <table cellpadding="0" cellspacing="0" class="gwc_tb2" >
                <volist></volist>
                    <tr>
                    <td class="tb2_td1"><input id="Checkbox2" name="newslist" type="checkbox"  class="allselect"/></td>
                    <td class="tb2_td2"><img src="/Public/Uploads/UserPic/5.jpg" height="20px"></td>
                    <td class="tb2_td3">登录提醒</td>
                    <td class="tb2_td4"><a href="#"><span>查看</span>|<span>删除</span></a></td>

                </tr>

                <td class="tb2_td5">您的账号于2016年04月18日13:19:50登录，如非本人操作，请尽快修改登录密码</td>
            </table>

        </div>
        <div class="pagin">
              <ul class="orderlist">
                   <li><div id="page">
                       <?php echo ($page); ?>
                   </div> </li>
               </ul>
        </div>
        <!--<div class="orderCont1">
            <ul class="clearfix">
                <li class="o_li1"><a href="#">上一页</a></li>
                <li class="o_li2 font_c">1</li>
                <li class="o_li3"><a href="#">2</a></li>
                <li class="o_li3"><a href="#">3</a></li>
                <li class="o_li1"><a href="#">下一页</a></li>
            </ul>
        </div>-->

</div>

</div>
<!-- hot样式开始 -->

    <!-- Swiper JS -->
    <script src="js/swiper.min.js"></script>

    <script>
        var swiper1 = new Swiper('.swiper1', {
            pagination: '.swiper-pagination1',
            paginationClickable: true,
            // 左右箭头js
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            parallax: true,
            loop:true
        });
    </script>
</div>

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
            <img src="/Public/Home/images/heart.png"/>
            <p>我的心愿单</p>
        </li>
        <li class="li5">
            <img src="/Public/Home/images/zuji.png"/>
            <p>我的足迹</p>
        </li>
        <li class="li6">
            <img src="/Public/Home/images/erweima.png"/>
            <p>
                <img src="/Public/Home/images/bottomNav_qrCode.png"/>
            </p>
        </li>
        <li class="li7">
            <img src="/Public/Home/images/ser.png"/>
            <p>客服中心</p>
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
</script>
<!-- 底部开始 -->

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

</body>

</html>