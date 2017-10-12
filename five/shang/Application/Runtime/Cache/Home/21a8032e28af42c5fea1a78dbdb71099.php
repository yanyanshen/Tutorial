<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="/Public/Home/style/public.css" />
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="/Public/Home/style/membercenter.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/index.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/detail.css">
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <style type="text/css">
        body .demo-class .layui-layer-title{background:#ccc; color:red; border: none;}
        body .demo-class .layui-layer-content{background:#ccc; color:white; border: none;}
    </style>
</head>

<body>
<!--  头部开始 -->
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
<!-- 头部结束 -->
<div class="buyerbox box">
    <p class="orderpro01"><span><i>订单详情</i></span></p>
    <div class="orderprocon">
        <div class="clearfix" style="width:100%;">
            <div class="orderprodiv clearfix">
                <p class="orderproinfo"><span>订单信息</span></p>
                <p><span>订单状态：</span><em class="orderred"><?php switch($orderList["status"]): case "1": ?>已下单，未付款<?php break;?>
                    <?php case "2": ?>已付款，未发货<?php break;?>
                    <?php case "3": ?>已发货，未签收<?php break;?>
                    <?php case "4": ?>已签收，未评价<?php break;?>
                    <?php case "5": ?>已取消<?php break;?>
                    <?php case "6": ?>申请退货<?php break;?>
                    <?php case "7": ?>退货中<?php break;?>
                    <?php case "8": ?>已退货<?php break;?>
                    <?php case "9": ?>商家已取消，缺货<?php break;?>
                    <?php case "10": ?>已评价，订单完成<?php break;?>
                    <?php default: ?>非法<?php endswitch;?></em></p>
                <p><span>订单号：</span><?php echo ($orderList["ordersyn"]); ?></p>
                <p><span>下单时间：</span><?php echo date('Y-m-d',$orderList['createtime']);?></p>
                <p><span>用户名称：</span><?php echo ($username); ?></p>
            </div>

            <div class="orderprodiv clearfix" style="position:relative">
                <p class="orderproinfo orderproinfo001"><span>收货信息</span></p>
                 <?php if(empty($address["address"])): ?><a href="javascript:add();" style="color:red">新增地址</a>
                    <?php else: ?>
                    <a href="javascript:edit(<?php echo ($address['id']); ?>);" style="color:red">编辑地址</a>
                <p><span>收货地址：</span><b id="ars"><?php echo ($address["address"]); ?></b></p><?php endif; ?>
                <p><span>邮编：</span><?php echo ($address["zip"]); ?></p>
                <p><span>收货人：</span><?php echo ($address["name"]); ?></p>
                <p><span>联系方式：</span><?php echo ($address["tel"]); ?></p>
            </div>
        </div>
        <p class="orderproinfo"><span>支付方式</span></p>
        <div style="padding:30px 0;">
            <form action="">
                <input type="radio" checked="checked"  name="paytype" id="alipay" style="width:18px;vertical-align:middle"/>支付宝支付
                <input type="radio"  name="paytype" id="wxpay" style="width:18px;vertical-align:middle"/>微信支付<br/>
                账号：<input type="text"  name="zh" id="zh" style="background: #ccc; width:100px"/>
                密码：<input type="password"  name="mm" id="mm" style="background: #ccc;width:100px"/>
            </form>
        </div>
        <p class="orderproinfo"><span>商品信息</span></p>
        <table class="orderinfomation" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th class="orderdetitle">商品名称</th>
                <th class="orderdejiage">单价（元）</th>
                <th class="orderdesum">总量（件）</th>
                <th class="orderdezjia">商品总价</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($order_goods)): $i = 0; $__LIST__ = $order_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                <td class="orderdetitle" style="text-align:left;">
                    <img style="width:60px;vertical-align:middle" src="/Public/Uploads/goods/100_<?php echo ($v["pic"]); ?>"/>
                    <p><a href="#"><?php echo ($v["goodsname"]); ?></a></p>
                </td>
                <td class="orderdejiage"><?php echo ($v["price"]); ?>元</td>
                <td class="orderdesum"><?php echo ($v["buynum"]); ?>件</td>
                <td class="orderdezjia">￥<?php echo ($v['price']*$v['buynum']); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="ordersumer" id="buy">
            <del>商品总价:<span style="color:red;font-size:20px;">￥<?php echo ($orderList["preprices"]); ?></span></del>
            折后价格:<span style="color:red;font-size:20px;">￥<?php echo ($orderList["prices"]); ?></span>
            <a class="tobuy" href="javascript:tobuy()">支付</a>
        </div>

    </div>
</div>
<div style="clear:both;"></div>
<!-- 尾部开始 -->
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
<script type="text/javascript">
    function tobuy(){
        var v =$('#ars').text();
        var zh =$('#zh').val();
        var mm =$('#mm').val();

        if(v){
            v=1;
        }
        if(zh){
            zh=1;
        }
        if(mm){
            mm=1;
        }
        var flag=v&zh&mm;
        if(flag){
            $.get("<?php echo U('pay',array('oid'=>$orderList['oid']));?>",'',function(res){
                if(res.status=='ok'){
                    layer.msg(res.msg,{
                        icon: 1,
                        time: 2000
                    },function(){
                        location.href="<?php echo U('Home/Member/order');?>"
                    });
                }else{
                    layer.msg(res.msg,{
                        icon: 2,
                        time: 2000
                    });
                }
            });
        }else{
            if(!v){
                layer.alert('请填写收货地址');
            }else if(!zh){
                layer.alert('请填写支付账号');
            }else if(!mm){
                layer.alert('请填写支付密码');
            }
        }
    }
    function add(){
        layer.open({
            type: 2,
            skin: 'demo-class',
            title: '新增地址',
            shadeClose: true,
            shade: 0.8,
            area: ['500px', '50%'],
            content: "<?php echo U('add_ars');?>"
        });
    }
    function edit(id){
        layer.open({
            type: 2,
            skin: 'demo-class',
            title: '编辑地址',
            shadeClose: true,
            shade: 0.8,
            area: ['500px', '50%'],
            content: "<?php echo U('edit_ars');?>?id="+id
        });
    }
    function chk(){
        var chkAll=document.getElementById('chkAll');
        var chks=document.getElementsByName('chk[]');
        for(var i=0;i<chks.length;i++){
            chks[i].checked=chkAll.checked;
        }
    }
    document.getElementById('chkAll').onclick=chk;
    $('.cateList').hide();
    function jian(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum>1){
            document.getElementById('buynum'+n).value=parseInt(buynum)-1;
        }
        getprices();
        gettotalprice();
    }
    function jia(n){
        var buynum=document.getElementById('buynum'+n).value;
        if(buynum<199){
            document.getElementById('buynum'+n).value=parseInt(buynum)+1;
        }
        getprices();
        gettotalprice();
    }

    function chgnum(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>199){
            v.value=199;
        }
        if(isNaN(v.value)){
            v.value=1;
        }

        gettotalprice();
    }

    function getprices(){
        var nums=document.getElementsByClassName('num');
        var price=document.getElementsByClassName('price');
        var prices=document.getElementsByClassName('prices');
        for(var i=0;i<price.length;i++){

            prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(nums[i].value);

        }
    }

    function gettotalprice(){
        getprices();
        var inputs=document.getElementsByName('chk[]');
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<inputs.length;i++){
            if(inputs[i].checked){
                totalprice+=parseInt(prices[i].innerHTML);
            }
        }
        document.getElementById('totalprice').innerHTML='￥'+totalprice;
        document.getElementById('prices').value=totalprice;
    }

    gettotalprice();
</script>

</body>
</html>