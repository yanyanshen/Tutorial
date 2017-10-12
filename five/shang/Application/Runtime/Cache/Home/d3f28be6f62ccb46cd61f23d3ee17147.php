<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品成功加入购物车</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/headerAndFooter.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/style/index.css">
    <link type="text/css" rel="stylesheet" rev="stylesheet" href="/Public/Home/style/membercenter.css" />
    <style type="text/css">
        #pageBody input{
            width:15px;
            height: 15px;
        }
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
<div class="buyer_day box">
    <p class="select_title"><span>我的购物车</span></p>
    <?php if(!empty($num)): ?><form action="" method="post" id="form1">
        <input type="hidden" name="prices" id="prices"/>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="day_list">
            <thead>
            <tr>
                <th class="xuhao"></th>
                <th width="15%">商品图片</th>
                <th width="30%">商品名称</th>
                <th width="10%">商品单价(元)</th>
                <th width="20%">商品数量</th>
                <th width="10%">小计(元)</th>
                <th width="5%">操作</th>
            </tr>
            </thead>
            <tbody id="pageBody">
        <?php if(is_array($mygoods)): $k = 0; $__LIST__ = $mygoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if(!empty($v["goodsname"])): ?><tr>
                <td class="xuhao" style="color: #ff0000"><input checked="checked" onchange="gettotalprice();" type="checkbox" value="<?php echo ($v["gid"]); ?>" name="chk[]" /></td>
                <td >
                    <a href="">
                        <img src="/Public/Uploads/goods/100_<?php echo ($v["pic"]); ?>" alt="" style="width:80px;margin:10px;" />
                    </a>
                </td>
                <td ><a href=""><?php echo ($v["goodsname"]); ?></a></td>
                <td ><a href="javascript:;" class="price"><?php echo ($v["price"]); ?></a></td>
                <td >
                    <a href="javascript:jian(<?php echo ($k); ?>);" class="decrement">-</a>&nbsp;
                    <input style="margin:10px" type="text" name="buynum<?php echo ($v["gid"]); ?>" value="<?php echo ($v['buynum']?$v['buynum']:1); ?>" class="num" id="buynum<?php echo ($k); ?>" onkeyup="chgnum(this)" />&nbsp;
                    <a href="javascript:jia(<?php echo ($k); ?>);" class="increment">+</a>
                <td class="prices"></td>
                <td ><a href="javascript:del(<?php echo ($v['gid']); ?>);"  class="tablelink">删除</a></td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <?php if(empty($v)): ?><div style="color:red;font-size: 20px">购物车里没有商品</div>
            <?php else: ?>
            <tr>
                <td  class="xuhao" style="color: #ff0000">
                    <input type="checkbox"  checked="checked" onchange="gettotalprice();" id="chkAll" name="chkAll" />
                </td>
                <td colspan="5" id="buy">
                    <span>总价:<b id="totalprice">￥888.88</b></span>
                    <a href="javascript:account()" target="_self" class="tobuy">去结算</a>
                </td>
            </tr><?php endif; ?>
            </tbody>

        </table>

    </form>
        <?php else: ?> <div style="color:red;font-size: 20px">购物车里没有商品</div><?php endif; ?>
    <div style="clear:both;"></div>

</div>
<div style="clear:both;"></div>
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
<script type="text/javascript">
    function account(){
        $.post("<?php echo U('Mycar/createorder');?>",$('#form1').serialize(),function(res){
            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('Home/Order/order');?>?oid="+res.oid;
                    }
                });

            }else if(res.status=='login'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.href="<?php echo U('User/login');?>";
                    }
                });

            }else{
                layer.alert(res.msg);

            }
        })
    }
    function del(gid){
        //询问框
        layer.confirm('您确定要删除吗?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo u('Mycar/del');?>",{gid:gid},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg,{
                        yes:function(){
                            location.reload();
                        }
                    });
                }else{
                    layer.alert(res.msg);
                }
            })
        })
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
            if(isNaN(prices[i].innerHTML)){
                prices[i].innerHTML=0;
            }

        };
    }

    function gettotalprice(){
        getprices();
        var inputs=document.getElementsByName('chk[]');
        var prices=document.getElementsByClassName('prices');
        var totalprice=0;
        for(var i=0;i<inputs.length;i++){
            if(inputs[i].checked){
                totalprice+=parseInt(prices[i].innerHTML);
                if(isNaN(totalprice)){
                    totalprice=0;
                }
            };
        };
        document.getElementById('totalprice').innerHTML='￥'+totalprice;
        document.getElementById('prices').value=totalprice;
    }

    gettotalprice();
</script>
</html>