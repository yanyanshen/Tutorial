<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基本信息</title>
    <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Home/js/password.js"></script>
    <link rel="stylesheet" href="/Public/Home/style/password.css" />
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <script src="/Public/Home/js/jquery.validate.js"></script>
    <script src="/Public/Home/js/jquery.form.js"></script>
    <script src="/Public/Home/js/YMDClass.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        label.error{color:#ff0300;font-weight: bold;font-size: 14px;  }
        .text table{ width:900px; text-align: center; border:1px solid #f0ad4e;  border-collapse: collapse;  }
        .text table th{  background: RGB(239,228,176);  height:40px;  font-size: 14px;  }
        .text table td{  text-align: center;  height: 50px;  font-size: 13px;  border-bottom:1px solid #f0ad4e;  }
    </style>
</head>
<body>

<!--  顶部开始 -->
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家频道！</a></p>
        <ul class="fr">
            <li><a href="#"><span><?php echo (session('membername')); ?></span></a></li>
            <li><a href="javascript:logout()">退出</a>|</li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a>|</li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
        </ul>
    </div>
</div>
<!-- 导航搜索栏 -->
<div class="search">
    <div class="searchCont frm_sty clearfix">
        <!-- 标志搜索栏开始 -->
        <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
        <div class="bd fl">
            <!--<form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">-->
                <!--<input name="searchwords" type="text" class="msg"  value="" placeholder="家具">-->
                <!--<a href="javascript:document.getElementById('searchform').submit();" class="btn fl">搜索</a>-->
            <!--</form>-->
            <!--<p class="msg1">-->
                <!--<a href="#">儿童家具 |</a>-->
                <!--<a href="#">户外 |</a>-->
                <!--<a href="#">沙发 |</a>-->
                <!--<a href="#">实木床</a>-->
            <!--</p>-->
        </div>
        <div class="buy clearfix">
            <!--<span class="fl">1</span>-->
            <!--<a class="fl" href="../Cart/mycart.html">购物车</a>-->
            <!--&lt;!&ndash; <p class="fl"></p> &ndash;&gt;-->
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
                    <div class="menu1">
                    </div>
                </div>
            </div>
            <ul class="topNav clearfix">
                <li><a href="#">首页</a></li>
                <!--<li><a href="#f1">卧室家具</a></li>-->
                <!--<li><a href="#f2">儿童家具</a></li>-->
                <!--<li><a href="#">书房家具</a></li>-->
                <!--<li><a href="#">阳台户外</a></li>-->
                <!--<li><a href="#">热销商品</a></li>-->
            </ul>
        </div>
    </div>
</div>

<div class="cont">
    <div class="cont_bg">
        <ul class="sidebar">
            <li class="touxiang"><img src="/Public/Home/images/touxiang.jpg"><p><?php echo (session('membername')); ?></p></li>
            <li><a href="member.html">会员中心</a></li>
            <li><a href="order.html">我的订单</a></li>
            <li><a href="userinfo.html">个人信息</a></li>
            <li><a href="adress.html">收货地址</a></li>
        </ul>
        <!-- tab -->
        <div class="news">
            <ul class="clearfix"><li><a href="#">收货地址</a></li></ul>
            <div class="text">
                   <input style="height: 30px;width: 114px" id="btn1" type="button" value="新增收货地址">&nbsp;&nbsp;&nbsp;<span style="color:orangered;font-size: 15px">您已创建<?php echo ($count); ?>个收货地址，最多可创建20个</span><br/><br/>
                <table>
                      <tr>
                          <th width="10%">收货人</th>
                          <th width="20%">所在地区</th>
                          <th width="38%">详细地址</th>
                          <th width="7%">邮编</th>
                          <th width="10%">电话/手机</th>
                          <th width="15%">操作</th>
                      </tr>
                  <?php if(is_array($adressInfo)): $k = 0; $__LIST__ = $adressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                          <td><?php echo ($val["username"]); ?></td>
                          <td><?php echo ($val["province"]); echo ($val["city"]); echo ($val["town"]); ?></td>
                          <td><?php echo ($val["adressdetail"]); ?></td>
                          <td><?php echo ($val["code"]); ?></td>
                          <td><?php echo ($val["mobile"]); ?><br><?php echo ($val["tel"]); ?></td>
                          <td><a id="change" href="javascript:changeAdress(<?php echo ($val["id"]); ?>)" class="<?php echo ($val["id"]); ?>">修改</a>&nbsp;|&nbsp;<a href="javascript:deleteAdress(<?php echo ($val["id"]); ?>)">删除</a></td>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  </table>
                  <?php echo ($Page); ?>
              </div>
          </div>
      </div>
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
                <p>爱家频道客户端</p>
                <img src="/Public/Home/images/erweima.jpg">
            </div>

        </div>
    </div>
    <div class="footer_b"><p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p></div>
</div>
</body>
<script>
    $('#btn1').click(function(){
        //iframe层-禁滚动条
        layer.open({
            type: 2,
            title: '新增收货地址',
            area: ['700px', '560px'],
            skin: 'layui-layer-rim', //加上边框
            content: ["<?php echo u('Member/adressForm');?>", 'no']
        });
    })

    $("tr").mouseover(function(){
        $(this).css("background","RGB(239,228,176)")
    })
    $("tr").mouseleave(function(){
        $(this).css("background","white")
    })

    function changeAdress(id){
        layer.open({
            type: 2,
            title: '修改收货地址',
            area: ['700px', '570px'],
            skin: 'layui-layer-rim', //加上边框
            content: ["/index.php/Home/Member/changeAdress/id/"+id]
        })
    }

    function deleteAdress(id){
        layer.confirm('您确定要删除收货地址?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("/index.php/Home/Member/deleteAdress/id/"+id,'',function(res){
                if(res.status=='ok'){
                    location.reload();
                };
            })
        });
    }
    function logout(){
        layer.confirm('您确定要退出当前账户?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo u('Login/logout');?>",'',function(res){
                if(res.status=='ok'){
                    location.href="<?php echo u('Index/index');?>"
                };
            })
        });
    }
</script>
</html>