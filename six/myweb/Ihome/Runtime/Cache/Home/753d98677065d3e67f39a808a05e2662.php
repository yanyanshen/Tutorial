<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>购物车</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="/Public/Home/style/reset.css" />
    <link rel="stylesheet" href="/Public/Home/style/shoppingcar.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.1.4.2-min.js"></script>
        <script type="text/javascript" src="/Public/Home/js/jquery.1.4.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/shoppingcar.js"></script>
        <script src="/Public/layer/layer.js"></script>
        <style type="text/css">
            .page a{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;}
            .page span.current{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;background:#3d96c9;}
            .page a:hover{background:#999999;color:#1a1a1a;}
        </style>
    </head>
<body>
<!-- 顶部开始 -->
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临爱家频道！</a></p>
        <ul class="fr">
            <li><a href="#"><span><?php echo (session('membername')); ?></span></a></li>
            <li><a href="<?php echo U('Home/Login/logout');?>">退出</a>|</li>
            <li><a href="<?php echo U('Home/Member/member');?>">会员中心</a>|</li>
            <li><a href="<?php echo U('Home/Member/order');?>">我的订单</a></li>
        </ul>
    </div>
</div>


<!-- 导航搜索栏 -->
<div class="logo frm_sty clearfix">
    <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
    <h3 class="fl">购物车</h3>
    <ul class="fr">
        <li class="li01"><a href="javascript:;">我的购物车</a></li>
        <li class="li02"><a href="<?php echo U('Home/Cart/pay');?>">填写核对结算信息</a></li>
        <li class="li03"><a href=" #">成功提交订单</a></li>
    </ul>
</div>
<i></i>
<!-- 全部商品 开始 -->
<div class="name frm_sty clearfix">
    <p class="p1">全部商品</p>
   <!--  <p class="p2">已选商品(1)</p> -->
</div>
<form action="/index.php/Home/Cart/cartToOrder" method="post" id="form2">
<div class="gwc" style=" margin:auto;">

  <table cellpadding="0" cellspacing="0" class="gwc_tb1">
    <tr>
      <td class="tb1_td1"></td>
      <td class="tb1_td2"></td>
      <td class="tb1_td3">商品名称</td>
      <td class="tb1_td4">单价（元）</td>
      <td class="tb1_td5">数量</td>
      <td class="tb1_td6">小计</td>
      <td class="tb1_td7">编辑</td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
      <?php if(is_array($cartlist)): $k = 0; $__LIST__ = $cartlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr id="tr">
          <td class="tb2_td1"><input type="checkbox"  value="<?php echo ($value["gid"]); ?>" name="buythis[]" id="newslist-1" /></td>
          <td class="tb2_td2"><a href="#"><img src="/Public/Upload/Goodspic/<?php echo ($value["pic"]); ?>"/></a></td>
          <td class="tb2_td3"><a href="#"><?php echo ($value["goodsname"]); ?></a></td>
          <td class="tb2_td4"><?php echo ($value["price"]); ?></td>
          <td class="tb2_td5">
            <input id="min1" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
            <input id="text_box1" name="<?php echo ($value["gid"]); ?>" type="text" value="<?php echo ($value["buynum"]); ?>" style=" width:30px; text-align:center; border:1px solid #ccc;"    />
            <input id="add1" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
          </td>
          <td class="tb2_td6"><label id="total1" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
          <td class="tb2_td7"><a href="/index.php/Home/Cart/delCart/id/<?php echo ($value["id"]); ?>"><p class="btn1">删除</p></a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
<div class="btn frm_sty clearfix">
    <div class="page"><?php echo ($page); ?></div>
 </div>
  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
    <tr>
      <td class="tb3_td1">
        <!--<input id="invert" type="checkbox"  />全选-->
        <!--<input id="cancel" type="checkbox" />取消-->
      </td>
      <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label>件</td>
      <td class="tb3_td3">合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style=""></label>  </span> </td>
      <td class="tb3_td4"><span id="jz1">结算</span><a href="javascript:void(0);" style=" display:none;"  onclick="document.getElementById('form2').submit();" class="jz2" id="jz2">结算</a></td>
    </tr>
  </table>
</div>
</form>
 <!-- 底部开始-->
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
                <a href="#"><img src="/Public/Home/images/erweima.jpg"></a>
            </div>
            
        </div>
    </div>
    <div class="footer_b"><p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p></div>
</div>
<!-- 底部 结束 -->
</body>
<script>
    $(".tb2_td5 #text_box1").keyup(function(e) {
        var b=($(this).val().replace(/\D/g,''));
           if(!isNaN(b)){
               if(b<0){
                   $(this).val(0)
               }
               if(b>30){
                       $(this).val(30);
                       layer.msg("如需购买更多请直接联系网站VIP客服");
                   }else{
                       $(this).val(parseInt(b));
                   }
           }
          if(b.trim()==''){
              $(this).val(0)
          }
        if(isNaN(b)){
            $(this).val(0)
        }
        tol();
        total();
    })

    $(".tb2_td5 input").click(function(e) {
        var id= $(e.target).attr('id');
           if(id=="min1"){
               var bc= $(e.target).next().val();
                 if(bc>0){
                     var ef=bc*1-1*1;
                     $(e.target).next().val(ef)
                 }
           }
          if(id=="add1"){
              var cd= $(e.target).prev().val();
                         if(!isNaN(cd)){
                             var qq=cd*1+1*1;
                             if(qq<30){
                                 $(e.target).prev().val(qq);
                             }else{
                                 $(e.target).prev().val(30);
                                 layer.msg("如需购买更多请联系网站VIP客服")
                             }
                         }}
        tol();
        total();
    });

    function tol(){
    var len=$(".gwc_tb2 tr").length;
       for(var b=0;b<len;b++){
           var num=$("#tr #text_box1").eq(b).val();
           var price=$("#tr .tb2_td4").eq(b).html();
           $("#tr .tb2_td6").eq(b).html(parseFloat((num*price),2))
       }
    }
tol();
    function total(){
        var len= $("#tr #newslist-1").length;
        var  c=0;
        var tal=0;
        for (var a=0;a<len;a++){
            if($("#tr #newslist-1").eq(a).attr("checked")==true){
                if($("#tr #text_box1").eq(a).val()!=0){
                    c=c*1+1*1;
                }
                var price=$("#tr .tb2_td4").eq(a).html();
                var num=$("#tr #text_box1").eq(a).val();
                tal += parseFloat((num*price),2);
            }
        }
        $(".tb3_td2").html('已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">'+c+'</label>');
        $(".tb3_td3").html('合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style="">'+tal+'</label>  </span>');
       return tal;
    }
    $("#tr #newslist-1").click(function(){
         total();
        if(total()>0){
            $("#jz2").css("display", "block");
            $("#jz1").css("display", "none");
        }else{
            $("#jz2").css("display", "none");
            $("#jz1").css("display", "block");
        }
        tol()
    })
     $(".gwc_tb2 input").click(function(){
         total();
         if(total()>0){
             $("#jz2").css("display", "block");
             $("#jz1").css("display", "none");
         }else{
             $("#jz2").css("display", "none");
             $("#jz1").css("display", "block");
         }
         tol()
     })

$("#invert").click(function(){
    tol();
    if( $("#invert").attr("checked")){
        $(".gwc_tb2 input[name=newslist]").each(function () {   $(this).attr("checked", true); })
        if(total()>0){
            $("#jz1").css("display", "none");
            $("#jz2").css("display", "block");
        }
    }else{
        $(".gwc_tb2 input[name=newslist]").each(function () {   $(this).attr("checked", false); })
        $("#jz2").css("display", "none");
        $("#jz1").css("display", "block");
        $(".tb3_td2").html('已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label>');
        $(".tb3_td3").html('合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style="">0</label>  </span>');
    }
})
    if( $("#invert").attr("checked")){
        total();
        tol();
        if(total()>0){
            $("#jz2").css("display", "block");
            $("#jz1").css("display", "none")
        }}
</script>
</html>