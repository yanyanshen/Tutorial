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
    <script type="text/javascript" src="/Public/Home/js/shoppingcar.js"></script>
    </head>
<body>
<body>
<!-- 顶部开始 -->
<div class="top ">
    <div class="topCont frm_sty">
        <p><a href="#">欢迎光临苗家频道！</a></p>
        <ul class="fr">
            <li><a href="../Member/password.html"><span>叶叶 </span></a></li>
            <li><a href="#">退出</a>|</li>
            
            <li><a href="../Member/member.html">会员中心</a>|</li>
            <li><a href="../Member/order.html">我的订单</a>|</li>
            <li><a href="../Member/denglu.html">消息[<span>1</span>]</a>|</li>
            <li class="l1"><a href="#">网站导航</a></li>
        </ul>
    </div>
</div>


<!-- 导航搜索栏 -->
<div class="logo frm_sty clearfix">
    <a href="../Index/index.html"><img src="/Public/Home/images/logo.png" alt=""></a>
    <h3 class="fl">购物车</h3>
    <ul class="fr">
        <li class="li01"><a href=" #">我的购物车</a></li>
        <li class="li02"><a href="affirm.html">填写核对结算信息</a></li>
        <li class="li03"><a href=" #">成功提交订单</a></li>
    </ul>
</div>
<i></i>
<!-- 全部商品 开始 -->
<div class="name frm_sty clearfix">
    <p class="p1">全部商品</p>
   <!--  <p class="p2">已选商品(1)</p> -->
</div> 

<div class="gwc" style=" margin:auto;">
  <table cellpadding="0" cellspacing="0" class="gwc_tb1">
    <tr>
      <td class="tb1_td1"><input id="invert" type="checkbox" /></td>
      <td class="tb1_td2">全选</td>
      <td class="tb1_td3">商品名称</td>
      <td class="tb1_td4">单价（元）</td>
      <td class="tb1_td5">数量</td>
      <td class="tb1_td6">小计</td>
      <td class="tb1_td7">编辑</td>
    </tr>
  </table>
  
  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
    <tr>
      <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-1" /></td>
      <td class="tb2_td2"><a href="#"><img src="/Public/Home/images/1.jpg"/></a></td>
      <td class="tb2_td3"><a href="#">茂润烤鱼外皮香脆，肉质软嫩、色泽金黄味而鲜美、营养丰富</a></td>
      <td class="tb2_td4">49.00元</td>
      <td class="tb2_td5">
        <input id="min1" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
        <input id="text_box1" name="" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
        <input id="add1" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
        
      </td>
      <td class="tb2_td6"><label id="total1" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
      <td class="tb2_td7"><a href="#"><p class="btn1">删除</p></a><a href="#"><p>移到我的关注</p></a></td>
    </tr>
  </table>

   <script>
  //     $(function(){
  //       var i=$(this).index();
  //       $(".btn1").click(function(){
  //          $("this").eq(i).remove();
  //       });
  //     });
          
     
  </script>

  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
    <tr>
      <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-2" /></td>
      <td class="tb2_td2"><a href="#"><img src="/Public/Home/images/2.jpg"/></a></td>
      <td class="tb2_td3"><a href="#">茂润烤鱼外皮香脆，肉质软嫩、色泽金黄味而鲜美、营养丰富</a></td>
      <td class="tb2_td4">59.9元</td>
      <td class="tb2_td5">
        <input id="min2" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
        <input id="text_box2" name="" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
        <input id="add2" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
        
      </td>
      <td class="tb2_td6"><label id="total2" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
      <td class="tb2_td7"><a href="#"><p class="btn1">删除</p></a><a href="#"><p>移到我的关注</p></a></td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
    <tr>
      <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-3" /></td>
      <td class="tb2_td2"><a href="#"><img src="/Public/Home/images/3.jpg"/></a></td>
      <td class="tb2_td3"><a href="#">茂润烤鱼外皮香脆，肉质软嫩、色泽金黄味而鲜美、营养丰富</a></td>
      <td class="tb2_td4">24元</td>
      <td class="tb2_td5">
        <input id="min3" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
        <input id="text_box3" name="" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
        <input id="add3" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
   
      </td>
      <td class="tb2_td6"><label id="total3" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
      <td class="tb2_td7"><a href="#"><p class="btn1">删除</p></a><a href="#"><p>移到我的关注</p></a></td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
    <tr>
      <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-4" /></td>
      <td class="tb2_td2"><a href="#"><img src="/Public/Home/images/4.jpg"/></a></td>
      <td class="tb2_td3"><a href="#">茂润烤鱼外皮香脆，肉质软嫩、色泽金黄味而鲜美、营养丰富</a></td>
      <td class="tb2_td4">56元</td>
      <td class="tb2_td5">
        <input id="min4" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
        <input id="text_box4" name="" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
        <input id="add4" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
      
      </td>
      <td class="tb2_td6"><label id="total4" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
      <td class="tb2_td7"><a href="#"><p class="btn1">删除</p></a><a href="#"><p>移到我的关注</p></a></td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" class="gwc_tb2">
    <tr>
      <td class="tb2_td1"><input type="checkbox" value="1" name="newslist" id="newslist-5" /></td>
      <td class="tb2_td2"><a href="#"><img src="/Public/Home/images/5.jpg"/></a></td>
      <td class="tb2_td3"><a href="#">茂润烤鱼外皮香脆，肉质软嫩、色泽金黄味而鲜美、营养丰富</a></td>
      <td class="tb2_td4">89元</td>
      <td class="tb2_td5">
        <input id="min5" name=""  style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="-" />
        <input id="text_box5" name="" type="text" value="1" style=" width:30px; text-align:center; border:1px solid #ccc;" />
        <input id="add5" name="" style=" width:20px; height:19px;border:1px solid #ccc;" type="button" value="+" />
        
      </td>
      <td class="tb2_td6"><label id="total5" class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;"></label></td>
      <td class="tb2_td7"><a href="#"><p class="btn1">删除</p></a>
                  <a href="#"><p>移到我的关注</p></a></td>
    </tr>
  </table>

<div class="btn frm_sty clearfix">
     <ul class="ul1 fl">
        <li class="l1"><a href="#"><下一页</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">...</a></li>
        <li class="l1"><a href="#">下一页></a></li>
     </ul>
      <ul class="ul2 fr">
        <li class="l2"><a href="#">共6页</a></li>
        <li class="l2"><a href="#">到第<input id="text_box1" name="" type="text" value="1" style=" width:25px; text-align:center; border:1px solid #d2d2d2;margin:0 3px;" />页</a></li>
        <li class="l1"><a href="#">确定</a></li>
     </ul>
 </div>

  <table cellpadding="0" cellspacing="0" class="gwc_tb3">
    <tr>
      <td class="tb3_td1">
        <input id="invert" type="checkbox" />全选
        <input id="cancel" type="checkbox" />取消
      </td>
      <td class="tb3_td2">已选商品 <label id="shuliang" style="color:#ff5500;font-size:14px; font-weight:bold;">0</label> 件</td>
      
      <td class="tb3_td3">合计(不含运费):<span>￥</span> <span style=" color:#ff5500;"><label id="zong1" style=""></label>  </span> </td>
      
      <td class="tb3_td4"><span id="jz1">结算</span><a href="affirm.html" style=" display:none;"  class="jz2" id="jz2">结算</a></td>
    </tr>
  </table>
</div>
<!-- 猜您喜欢 开始 -->
<div class="guess frm_sty clearfix">
    <ul class="ul11">
      <li class="l11"><a href="#">猜您喜欢</a></li>
      <li class="l12"><a href="#">更多></a></li>
    </ul>
    
    <ul class="Cont">
        <li><a href="#"><img src="/Public/Home/images/tu1.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu2.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu3.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu4.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li><a href="#"><img src="/Public/Home/images/tu5.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l6"><a href="#"><img src="/Public/Home/images/tu6.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l7"><a href="#"><img src="/Public/Home/images/tu7.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
        <li class="l8"><a href="#"><img src="/Public/Home/images/tu8.png"/><span class="txt">云南普洱茶勐海七子<br/>云南普洱茶生茶饼分享收藏
</span></a></li>
     </ul>
  
</div>
<!-- 猜您喜欢  -->

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
                <a href="#"><img src="/Public/Home/images/erweima.jpg"></a>
            </div>
            
        </div>
    </div>
    <div class="footer_b">
        <p>Copyright @ 2016-2028 苗家频道有限公司版权所有 桂ICP备10101010号-201600001</p>
        
    </div>
</div>
    
<!-- 底部 结束 -->
<script>
  $(document).ready(function () {
  //反选
  $("#invert").click(function () {
    $(".gwc_tb2 input[name=newslist]").each(function () {
      if ($(this).attr("checked")) {
        $(this).attr("checked", false);
        //$(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
      } else {
        $(this).attr("checked", true);
        //$(this).next().css({ "background-color": "#3366cc", "color": "#000000" });
      } 
    });
    GetCount();
  });

  //取消
  $("#cancel").click(function () {
    $(".gwc_tb2 input[name=newslist]").each(function () {
      $(this).attr("checked", false);
      // $(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
    });
    GetCount();
  });

  // 所有复选(:checkbox)框点击事件
  $(".gwc_tb2 input[name=newslist]").click(function () {
    if ($(this).attr("checked")) {
      //$(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
    } else {
      // $(this).next().css({ "background-color": "#ffffff", "color": "#000000" });
    }
  });

  // 输出
  $(".gwc_tb2 input[name=newslist]").click(function () {
    // $("#total2").html() = GetCount($(this));
    GetCount();
    //alert(conts);
  });
});
//******************
function GetCount() {
  var conts = 0;
  var aa = 0;
  $(".gwc_tb2 input[name=newslist]").each(function () {
    if ($(this).attr("checked")) {
      for (var i = 0; i < $(this).length; i++) {
        conts += parseInt($(this).val());
        aa += 1;
      }
    }
  });
  $("#shuliang").text(aa);
  $("#zong1").html((conts).toFixed(2));
  $("#jz1").css("display", "none");
  $("#jz2").css("display", "block");
}
</script>
<!---商品加减算总数-->
  <script type="text/javascript">
  $(function () {
    var t = $("#text_box1");
    $("#add1").click(function () {
      t.val(parseInt(t.val()) + 1)
      setTotal(); GetCount();
    })
    $("#min1").click(function () {
      t.val(parseInt(t.val()) - 1)
       if (t.val()<0){ t.val(0);}
      setTotal(); GetCount();
    })
    function setTotal() {

      $("#total1").html((parseInt(t.val()) * 49.9).toFixed(2));
      $("#newslist-1").val(parseInt(t.val()) * 49.9);
    }
    setTotal();

  })
  </script>
  <!-- 商品加减算总数 -->
  <script type="text/javascript">
  $(function () {
    var t = $("#text_box2");
    $("#add2").click(function () {
      t.val(parseInt(t.val()) + 1)
      setTotal(); GetCount();
    })
    $("#min2").click(function () {
      t.val(parseInt(t.val()) - 1)
       if (t.val()<0){ t.val(0);}
      setTotal(); GetCount();
    })
    function setTotal() {

      $("#total2").html((parseInt(t.val()) * 59.9).toFixed(2));
      $("#newslist-2").val(parseInt(t.val()) * 59.9);
    }
    setTotal();
  })

// 商品加减算总数
 
  $(function () {
    var t = $("#text_box3");
    $("#add3").click(function () {
      t.val(parseInt(t.val()) + 1)
      setTotal(); GetCount();
    })
    $("#min3").click(function () {
      t.val(parseInt(t.val()) - 1)
      if (t.val()<0){ t.val(0);}
      setTotal(); GetCount();
    })
    function setTotal() {

      $("#total3").html((parseInt(t.val()) * 24).toFixed(2));
      $("#newslist-3").val(parseInt(t.val()) * 24);
    }
    setTotal();
  })

  $(function () {
    var t = $("#text_box4");
    $("#add4").click(function () {
      t.val(parseInt(t.val()) + 1)
      setTotal(); GetCount();
    })
    $("#min4").click(function () {
      t.val(parseInt(t.val()) - 1)
       if (t.val()<0){ t.val(0);}
      setTotal(); GetCount();
    })
    function setTotal() {

      $("#total4").html((parseInt(t.val()) * 56).toFixed(2));
      $("#newslist-4").val(parseInt(t.val()) * 56);
    }
    setTotal();
  })

  $(function () {
    var t = $("#text_box5");
    $("#add5").click(function () {
      t.val(parseInt(t.val()) + 1)
      setTotal(); GetCount();
    })
    $("#min5").click(function () {
      t.val(parseInt(t.val()) - 1)
       if (t.val()<0){ t.val(0);}
      setTotal(); GetCount();
    })
    function setTotal() {

      $("#total5").html((parseInt(t.val()) * 89).toFixed(2));
      $("#newslist-5").val(parseInt(t.val()) * 89);
    }
    setTotal();
  })
  </script>

  <!---总数-->
  <script type="text/javascript">
  $(function () {
    $(".quanxun").click(function () {
      setTotal();
      //alert($(lens[0]).text());
    });
    function setTotal() {
      var len = $(".tot");
      var num = 0;
      for (var i = 0; i < len.length; i++) {
        num = parseInt(num) + parseInt($(len[i]).text());

      }
      //alert(len.length);
      $("#zong1").text(parseInt(num).toFixed(2));
      $("#shuliang").text(len.length);
    }
    //setTotal();
  })

// 猜您喜欢 覆盖层
 $(function(){
        //给每个li中a添加元素overlay
        $(".guess li").append("<span class='overlay'></span>");
        //经过li时让overlay,txt过渡动画
        $(".guess li").hover(function(){
            $(this).find(".txt").slideToggle().next().slideToggle();   
        });
        
     });

  </script>
    
</body>
</html>