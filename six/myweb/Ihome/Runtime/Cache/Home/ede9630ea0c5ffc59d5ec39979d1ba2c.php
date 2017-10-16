<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>欢迎光临爱家频道！</title>
        <LINK rel=stylesheet type=text/css href="/Public/Home/style/common.css">
        <link rel="stylesheet" href="/Public/Home/style/reset.css" />
        <link rel="stylesheet" href="/Public/Home/style/DetailPages.css" />
        <script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
        <script src="/Public/layer/layer.js"></script>
        <script type="text/javascript" src="/Public/Home/js/jquery.imagezoom.min.js"></script>
        <script src="/Public/Home/js/DetailPages.js"></script>
        <script type=text/javascript src="/Public/Home/js/kefu.js"></script>
        <link rel="stylesheet" href="/Public/Home/style/reset.css">
        <link rel="stylesheet" href="/Public/Home/style/member.css">
        <style>
            .myShopCar1{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
            .carlist{position: absolute;width:450px;padding:10px;background: #fff;left:1302px;top:125px;border:1px solid #F1F1F1;display:none;z-index:999;  }
            #goodslist dd{position:relative;float:left;margin-left: 8px;}
            #myShopCar{margin-left: 1px;background:#fff;border:1px solid #F1F1F1;borderBottom:0;}
        </style>
    </head>
    <body>
    <!-- 顶部开始 -->
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
            <h1 class="fl"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/Ihomelogo.png" alt="" width=180px></a></h1>
            <div class="bd fl">
                <form action="<?php echo U('Home/Search/search');?>" method="get" id="searchform">
                    <input name="searchwords" type="text" class="msg" id="msg" value="" placeholder="家具">
                    <a href="javascript:document.getElementById('searchform').submit();" class="btn fl" id="abtn">搜索</a>
                </form>
                <p class="msg1">
                    <a href="<?php echo U('Home/Search/search');?>">&nbsp;</a>
                </p>
            </div>
            <div class="buy clearfix">
                <span class="fl">1</span>
                <a class="fl"  id="mycart"  href="<?php echo U('Home/Cart/myCart');?>">购物车</a>
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
                </div>
                <ul class="topNav clearfix">
                    <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 导航开始结束 -->
    <!-- 淘宝产品区域开始 -->
    <!--当前位置开始-->
    <div class="frm_sty now">
        <ul class="clearfix">
            <li><p>当前位置：</p></li>
            <li><a href="#">首页&nbsp;&nbsp; ></a></li>
            <li><span><?php echo (iconv_substr($goodsinfo["goodsname"],0,5,'utf-8')); ?></span></li>
        </ul>
    </div>
    <!-- 描述开始 -->
    <div class="frm_sty detail clearfix">
    <!-- 淘宝风聚焦图 -->
        <div class="box">
            <?php if(is_array($goodspic)): $i = 0; $__LIST__ = array_slice($goodspic,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="tb-booth tb-pic tb-s310">
                <a href=""><img src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["picname"]); ?>"  rel="/Public/Upload/Goodspic/<?php echo ($value["picname"]); ?>" class="jqzoom" /></a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <ul class="tb-thumb" id="thumblist">
                <?php if(is_array($goodspic)): $i = 0; $__LIST__ = $goodspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><div class="tb-pic tb-s40"><a href="#">
                        <img src="/Public/Upload/Goodspic/thumb_80_<?php echo ($value["picname"]); ?>" mid="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["picname"]); ?>" big="/Public/Upload/Goodspic/<?php echo ($value["picname"]); ?>"></a></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    <!-- 右部描述 -->
        <input type="hidden" class="mid" value="<?php echo (session('mid')); ?>">
        <form action="" method="post" id="form1">
                <div class="fr">
                    <input type="hidden" name="gid" value="<?php echo ($goodsinfo["gid"]); ?>" class="gid"/>
                    <h3><?php echo ($goodsinfo["goodsname"]); ?></h3>
                    <p><?php echo ($goodsinfo["description"]); ?></p>
                    <div class="price">
                        <ul class="clearfix">
                            <li class="li1"><p>价格</p></li>
                            <li><p><b>￥<?php echo ($goodsinfo["price"]); ?></b><a href="#"></a></p></li>
                            <!--<li class="li3"><p>已有<span>50</span>人评价</p></li>-->
                        </ul>
                        <ul class="clearfix">
                            <li class="li1"><p>销量</p></li>
                            <li><p><?php echo ($goodsinfo["salenum"]); ?>件</p></li>
                        </ul>
                    </div>
                    <div class="sale clearfix">
                        <ul class="clearfix">
                            <li class="li1"><p>促销</p></li>
                            <li><p>以下促销可在购物车任选其:</p>
                            <p><span>满减</span>满68.00元即赠热销商品，赠完即止，请在购物车点击领取</p>
                            <p><span>满减</span>满99.00元减20.00,满108.00减30.00</p>
                            <p><span>包邮</span>本店消费满￥79包邮</p>
                            </li>
                        </ul>
                        <h4>可选颜色</h4>
                        <ul class="ul2" id="ul2">
                            <li><p><?php echo ($goodsinfo["color"]); ?></p></li>
                        </ul>
                    </div>
                    <div class="buycar clearfix">
                        <p>数量</p>
                        <td class="tb1_td5">
                            <input id="min1" name=""  style=" width:30px; height:30px;border:1px solid #ccc;" type="button" value="-" />
                            <input id="text_box1" name="buynum" type="text" value="1" style=" width:50px;height:28px; text-align:center; border:1px solid #ccc;" />
                            <input id="add1" name="" style=" width:30px; height:30px;border:1px solid #ccc;" type="button" value="+" />
                        </td>
                        <a href="#" id="pay" onclick="pay()"><span class="span1"style="width: 100px" >立即购买</span></a>
                        <a href="#" id="addtocart" onclick="addtocart()"><span class="span2" style="width: 100px">加入购物车</span></a>
                        <a href="javascript:;"><span class="span2" style="width: 70px ;margin-left: 0" id="focus">关注</span><span class="span2" style="width: 70px ;margin-left: 0;display: none" id="quite">已关注</span></a>
                    </div>
                </div>
        </form>
    </div>
    <!-- 描述结束 -->
    <!-- 产品详情页开始 -->
    <div class="frm_sty container clearfix">
        <!-- 左侧分栏目 -->
        <div class="slidebar">
        <div class="s1">
        <h4 class="title"><a href="#">HOT 热门商品</a></h4>
            <ul>
                <?php if(is_array($goodspic)): $i = 0; $__LIST__ = $goodspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><img src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["picname"]); ?>" alt="" /><a href="#"><span class="txt">热销家私</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="s2">
        <h4 class="title"><a href="#">相关商品</a></h4>
            <ul>
                <?php if(is_array($goodspic)): $i = 0; $__LIST__ = $goodspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="/Public/Upload/Goodspic/thumb_390_<?php echo ($value["picname"]); ?>" alt="" /><span class="txt">精选家私</span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        </div>
        <!-- 右部内容详情 -->
        <div class="content">
        <!-- 标题内容 -->
        <!-- 右侧导航 -->
            <div class="title">
            <ul class="clearfix">
                <li class="focus"><a href="javascript:void(0);">产品参数</a></li>
                <li><a href="javascript:void(0);">商品信息</a></li>
                <li><a href="javascript:void(0);">累计评价</a></li>
                <li><a href="javascript:void(0);">使用方法</a></li>
            </ul>
            </div>
        <!-- 商品描述内容 -->
        <div class="m">
            <div class="detail">
                <div class="canshu">
                <ul class="clearfix">
                    <li class="li1"><p>产品参数：</p></li>
                    <li class="li2">
                        <p><?php echo ($goodsinfo["description"]); ?></p>
                    </li>
                </ul>
                <img src="/Public/Home/images/bg.jpg" alt="" />
                </div>
            </div>
             <div class="pmsg">
                <h3>商品信息</h3>
                 <?php if(is_array($goodspic)): $i = 0; $__LIST__ = $goodspic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div>
                        <img src="/Public/Upload/Goodspic/<?php echo ($value["picname"]); ?>" alt="" style="width: 740px"/>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 累计评价开始 -->
            <div class="msg">
                    <h3>累计评价</h3>
                <?php if(is_array($goodscomment)): $i = 0; $__LIST__ = $goodscomment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul>
                        <li class="li1"></li>
                        <li class="li2">
                            <p>会员：<?php echo ($val["username"]); ?></p>
                            <p>评论时间：<?php echo (date("Y-m-d  H:i",$val["comtime"])); ?></p>
                            <p><?php echo ($val["content"]); ?></p>
                        </li>
                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="use">
            <h3>使用方法</h3>
                <div>
                    <img src="/Public/Home/images/shiyong.jpg" alt="" style="width: 760px;height:700px;"/>
                </div>
            </div>
            </div>
            <!-- 使用方法开始   -->

        </div>
        </div>
        <div>

    </div>
    <!-- 猜你喜欢 -->
    <div class="guess frm_sty clearfix">
        <ul class="ul11">
          <li class="l11"><a href="#">猜您喜欢</a></li>
          <li class="l12"><a href="#">更多></a></li>
        </ul>
        <ul class="Cont">
            <?php if(is_array($guesslist)): $i = 0; $__LIST__ = array_slice($guesslist,2,16,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li style="margin-left: 10px;margin-top: 10px"><a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($val["gid"]); ?>"><img src="/Public/Upload/Goodspic/thumb_150_<?php echo ($val["pic"]); ?>"/><span class="txt" style="width: 150px"><?php echo (iconv_substr($val["goodsname"],0,5,'utf-8')); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    <!--<浏览记录></浏览记录>-->
    <div class="jilu frm_sty clearfix">
        <div class="title">
            <h3>浏览记录</h3>
        </div>
        <ul>
            <?php if(isset($history)): if(is_array($history)): $i = 0; $__LIST__ = array_slice($history,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="li">
                        <a href="<?php echo U('Home/Detail/detail');?>?gid=<?php echo ($vo["gid"]); ?>">
                            <img  src="/Public/Upload/Goodspic/thumb_390_<?php echo ($vo["pic"]); ?>" style="width: 190px;height:270px " alt="">
                            <p class="p2" style="position: absolute;z-index: 400"><?php echo ($vo["goodsname"]); ?>   <p class="p1" style="position: absolute;top: -0px;" > </p> </p>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <li class="li">
                    <p >暂时没有浏览记录</p>
                </li><?php endif; ?>
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
            <p>Copyright @ 2016-2028 爱家频道有限公司版权所有 桂ICP备10101010号-201600001</p>

        </div>
    </div>
    <!-- 返回顶部 -->
    <div class="toTop">返回<br/>顶部</div>
    <!-- 右侧导航 -->
    <div class="rightNav">
      <ul>
        <li class="focus"><a href="#" >产品参数</a></li>
        <li><a href="#">商品信息</a></li>
        <li><a href="#" >累计评价</a></li>
        <li><a href="#">使用方法</a></li>
      </ul>
    </div>
    <!-- 右部客服 -->
    <div id=floatTools class=float0831>
      <div class=floatL><a style="DISPLAY: none" id=aFloatTools_Show class=btnOpen
    title="查看在线客服"
    onclick="javascript:$('#divFloatToolsView').animate({width: 'show', opacity: 'show'}, 'normal',function(){ $('#divFloatToolsView').show();kf_setCookie('RightFloatShown', 0, '', '/', 'www.istudy.com.cn'); });$('#aFloatTools_Show').attr('style','display:none');$('#aFloatTools_Hide').attr('style','display:block');"
    href="javascript:void(0);">展开</a> <a id="aFloatTools_Hide" class="btnCtn"
    title="关闭在线客服"
    onclick="javascript:$('#divFloatToolsView').animate({width: 'hide', opacity: 'hide'}, 'normal',function(){ $('#divFloatToolsView').hide();kf_setCookie('RightFloatShown', 1, '', '/', 'www.istudy.com.cn'); });$('#aFloatTools_Show').attr('style','display:block');$('#aFloatTools_Hide').attr('style','display:none');"
    href="javascript:void(0);">收缩</a> </div>
      <div id=divFloatToolsView class=floatR>
        <div class="tp"></div>
        <div class="cn">
          <ul>
            <li class="top">
              <h3 class="titZx">QQ咨询</h3>
            </li>
            <li><span class="icoZx">在线咨询</span> </li>
            <li><a class="icoTc" href="#">A客服</a> </li>
            <li><a class="icoTc" href="javascript:void(0);">B客服</a> </li>
            <li><a class="icoTc" href="#">C客服</a> </li>
            <li class="bot"><a class=icoTc href="javascript:void(0);">D客服</a> </li>
          </ul>
          <ul class="webZx">
            <li class=webZx-in><a href="http://www.qq.com/" target="_blank" style="float : left"><img src="/Public/Home/images/right_float_web.png" border="0px"></a> </li>
          </ul>
          <ul>
            <li>
              <h3 class="titDh">电话咨询</h3>
            </li>
            <li><span class="icoTl">400-000-0000</span> </li>
            <li class="bot">
              <h3 class="titDc"><a href="http://www.index.html/" target="_blank">新版调查</a></h3>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </body>
    <script>
        // 置顶导航的右部导航效果
        $(function(){
            $(".rightNav li").click(function(){
                var i=$(this).index();
                T=$(".container .content .m>div").eq(i).offset().top;
                $(this).addClass("focus").siblings().removeClass("focus");
                $("body").animate({scrollTop: T},1000);
            });
            $(document).scroll(function(){
                var T=$("body").scrollTop();
                for(var j=0;j<4;j++){
                    divT=$(".container .content .m>div").eq(j).offset().top-70;
                    if (T>divT){
                        $(".rightNav li").eq(j).addClass("focus").siblings().removeClass("focus");
                    }
                }
            });
        });
        //右部详情信息的滚屏效果
        $(function(){
            $(".container .content .title li").click(function(){
                var i=$(this).index();
                T=$(".container .content .m>div").eq(i).offset().top;
                $(this).addClass("focus").siblings().removeClass("focus");
                $("body").animate({scrollTop: T},1000);
            });
            $(document).scroll(function(){
                var T=$("body").scrollTop();
                for(var j=0;j<4;j++){
                    divT=$(".container .content .m>div").eq(j).offset().top;
                    if (T>divT){
                        $(".container .content .title li").eq(j).addClass("focus").siblings().removeClass("focus");
                    }
                }
            });
        });

        function pay(){
              if($(".mid").val()==''){
                  layer.open({
                      type: 2,
                      title: '快速登录',
                      shadeClose: true,
                      shade: 0.9,
                      area: ['550px', '530px'],
                      content: 'quicklogin/', //;
                      success: function(layero, index){
                          if(rel==1){
                              layer.close(index)
                          }
                      }
                  });
              }else{
                  document.getElementById('form1').action="<?php echo u('Home/Cart/pay');?>";
                  document.getElementById('form1').submit();
              }
        }
        function addtocart(){
            if($(".mid").val()==''){
                layer.open({
                    type: 2,
                    title: '快速登录',
                    shadeClose: true,
                    shade: 0.9,
                    area: ['550px', '530px'],
                    content: 'quicklogin/',
                    success: function(layero, index){
                        if(rel==1){
                            layer.close(index)
                        }
                    }
                });
            }else{
                document.getElementById('form1').action="<?php echo u('Home/Cart/addToCart');?>";
                document.getElementById('form1').submit();
            }
        }

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

        function gz(){
            var gGid=($('.gid').val());
            $.get("<?php echo U('Detail/checkFocus');?>",{gid:gGid},function(rel){
                if(rel=="true"){
                    $("#focus").hide();
                    $("#quite").show();
                }else{
                    $("#focus").show();
                    $("#quite").hide();
                }
            });
        }
        gz();
        $("#focus").click(function(){
            var gGid=($('.gid').val());
            $.get("<?php echo U('Member/focus');?>",{gid:gGid},function(rel){
                layer.msg(rel);
                gz();
            })
        });

        $("#quite").click(function(){
            var gGid=($('.gid').val());
            $.get("<?php echo U('Detail/quite');?>",{gid:gGid},function(rel){
                   if(rel=="true"){
                       layer.msg('成功取消关注');
                       gz();
                   }
            })
        })

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
        $('#abtn').click(function(){
            if(!$('#msg').val()){
                layer.alert('请输入要搜索的商品名称');
                return false;
            }
        })
    </script>
</html>