<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <link rel="shortcut icon" href="images/bitbug_favicon .icon" />
    <link rel="stylesheet" href="/Public/Home/css/showcart.css" />
    <link rel="stylesheet" href="/Public/Home/css/reset1.css" />
    <script src="/Public/Home/js/jquery.min.1.8.2.js"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>beauty</title>
    <style>
        .paypassword{border: 1px solid black;width: 300px;height: 150px;}
        .paypassword .dd1{width: 250px;height: 20px;font-weight: bold;font-size: 16px;}
        .paypassword .dd2{margin: 30px;}
        .paypassword .dd2 input{width: 250px;height: 25px;}
        .paypassword .dd3{width: 250px;height: 25px;text-align: center;}
        .paypassword .dd3 a:first-child{margin-left: 80px;}
        .paypassword .dd3 a{height: 20px;background: red;margin: 0 30px;border-radius: 5px;padding: 10px 15px;color:white;}
        .paypassword .dd3 a:hover{cursor: pointer;}
        .success p{color: #008800;font-weight: bold;font-size: 16px;margin-top: 10px  }
    </style>
</head>
<body>
<!-- top 开始 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<!--<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>-->
<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Admin/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.lazyload.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/search.css">
    <style>
        .Navigation_name { padding:0; margin:0; list-style-type:none;}
        .Navigation_name li { background:#fff;   color:#fff; }
        .Navigation_name li a { display:block;text-align:center;line-height:32px; color:#fff; font-size:13px; text-decoration:none;}
        .cur{ background-color: #d2d2d2;
            padding: 0 5px; font-weight:bold;}
    </style>
</head>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Home/Login/LoginOut');?>",'', function (res) {
              if (res.status == 1) {
                    layer.msg(res.info,{icon:1},function(){
                        location.href = "<?php echo U('Home/Index/index');?>";
                    });
                } else {
                    layer.open({
                        content: '错误提示',
                        type: 2,
                        skin:'msg'
                    });
                }
            }, 'json')
        });

/*头部我的收藏沈艳艳*/
        $(".s_cart").mouseenter(function(){
            $.post('<?php echo U("Home/Collect/collect");?>',function(res){
                var str='';
                var count=''
                if(res.status==1){
                    for(var i in res.info){
                        str+='<li>'
                        str+='<div class="img">' + '<img src="/Uploads/'+res.info[i]['imageurl']+res.info[i]['imagename']+'">' +
                        '</div>'
                        str+='<div class="content"><p>'
                        str+='<a href="'+'<?php echo U("Home/Order/goodsdetail");?>?gid='+res.info[i]['gid']+'">';
                        str+=res.info[i]['goodsname'].substr(0,10)+'</a></p><p>价格：￥'+res.info[i]['saleprice']+'</p></div>'
                        str+='<div class="Operations">'
                        str+='<p>'
                        str+='<a href="javascript:;" class="deleteCollect" gid="'+res.info[i]['gid']+'">';
                        str+= '删除</a>'
                        str+='</p></div></li>'
                    }if(res.info==1){
                        str='<div class="prompt"></div>' +
                        '<div class="nogoods"><b></b>您的收藏夹还没有宝贝哦，赶紧添加吧！！！！</div>'
                    }
                    $(".p_s_list").html(str);
                }else{
                        str='<div class="prompt"></div>' +
                        '<div class="nogoods"><b></b>登录之后才能看哦！！！</div>'
                         $(".dorpdown-layer").html(str);
                }
            });
        });
            $(".deleteCollect").live('click',function(){
                var a=$(this);
                var gid=$(this).attr('gid');
                $.get("<?php echo U('Collect/deleteCollect');?>?gid="+gid,function(res){
                    a.parents('li').hide();
                })
            });
/*头部我的收藏*/
    })
</script>




<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <div class="Collection">您好，欢迎光临<?php echo session('mname')?session('mname'):'';?>！<a id="OUT"  style="color: #ff0000; cursor: pointer"><?php echo session('mname')?'退出':'';?></a>
            </div>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        欢迎光临本店！
                        <a href="<?php echo U('Home/Login/Login');?>" class="red">
                        <?php echo session('mname')?'':'[请登录]';?>
                    </a>
                        <?php echo session('mname')?'':'新用户';?>
                        <a href="<?php echo U('Home/Register/Register');?>" class="red">
                            <?php echo session('mname')?' ':'[免费注册]';?>
                        </a>
                    </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Index/index');?>">我的首页</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Member/Orderform');?>">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/MyCart/tocart');?>">购物车</a> </li>
                    <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover">
                        <a href="#" class="hd_menu">网站导航</a>
                        <div class="hd_menu_list">
                            <ul>
                                <li><a href="<?php echo U('Home/Footprint/footprint');?>">足迹</a></li>
                                <li><a href="<?php echo U('Home/Feedback/index');?>">反馈</a></li>
                                <li><a href="<?php echo U('Home/Member/index');?>">用户中心</a></li>
                                <li><a href="<?php echo U('Home/Member/showCollect');?>">我的收藏</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/mobile.png"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!--样式-->
    <!--顶部样式2-->
<div id="header "  class="header page_style">
    <div class="logo"><a href="<?php echo U('Index/index');?>"><img style="width: 210px;height: 122px" src="/Public/Mobile/images/Image-1.png" /></a></div>
        <!--结束图层-->
    <form action="<?php echo U('Home/Search/index');?>" method="get">
        <div class="Search">
                <p><input name="keywords" value="<?php echo ($keywords?$keywords:'面膜'); ?>" type="text"  class="text" style="width: 450px;height: 32px"/>
                <input name="" type="submit" value="搜 索"  class="Search_btn" style="padding: 0 15px;height: 38px"/></p>
                <p class="Words">
                    <a href="<?php echo U('Home/Search/index',array('cid'=>1));?>">面部护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>22));?>">身体护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>33));?>">香水彩妆</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>53));?>">洗发护发</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>70));?>">男性护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>83));?>">推荐品牌</a>
                </p>
        </div>
    </form>
        <!--购物车样式-->
    <div class="hd_Shopping_list" id="Shopping_list">
        <div class="s_cart"><a href="">我的收藏</a> <i class="ci-right">&gt;</i><i id="shopping-amount"></i></div>
        <div class="dorpdown-layer">
            <div class="spacer"></div>
            <ul class="p_s_list">
            </ul>
            <div class="Shopping_style">
                    <div class="p-total"></div>
                    <a href="<?php echo U('Home/Member/showCollect');?>" title="" id="btn-payforgoods" class="Shopping">查看更多</a>
            </div>
        </div>
    </div>
</div>

<div id="Menu" class="clearfix">
    <div class="index_style clearfix">
        <div id="allSortOuterbox">
            <div class="t_menu_img"></div>
        </div>
        <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail"});</script>
        <!--菜单栏-->
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name" id="Navigation_name">
                <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">首页</a></li>
                <li><a href="<?php echo U('Home/MustSee/index');?>" target="_blank">每日必看</a></li>
                <li><a href="<?php echo U('Home/BuyBrands/groupBuy');?>" target="_blank">限时团购</a></li>
                <li><a href="<?php echo U('Home/MustSee/girl');?>" target="_blank">女士专区</a></li>
                <li><a href="<?php echo U('Home/MustSee/boy');?>" target="_blank">男士专区</a></li>
                <li><a href="<?php echo U('Home/Huiyuan/index');?>" target="_blank">黄金会员专享</a></li>
                <!--<li><a  id="cj" name="<?php echo (session('mname')); ?>" href="javascript:;" >抽奖有礼</a><em class="hot_icon"></em></li>-->
                <li><a id="sign" name="<?php echo (session('mname')); ?>" href="javascript:;" target="_blank">签到领金币</a></li>
                <?php if($_SESSION['beauty_']['mid']> 0): ?><li><a  href="<?php echo U('Home/HongBao/showhongbao');?>">双11领红包</a></li>
                    <?php else: ?>
                    <li><a  href="<?php echo U('Home/Login/Login');?>">双11领红包</a></li><?php endif; ?>
            </ul>
        </div>
        <script>$("#Navigation").slide({titCell:".Navigation_nameidcj li"});</script>
        <a href="<?php echo U('Home/Sign/signCity');?>" class="link_bg"  style="color: red;font-size: 20px;font-weight: bolder;
        font-style: italic">
            <img style="vertical-align: middle;margin-bottom:5px;"  src="/Public/Home/images/jin.png" />金币商城
        </a>
    </div>
</div>


<script type="text/javascript">
    var urlstr = location.href;
    //alert((urlstr + '/').indexOf($(this).attr('href')));
    var urlstatus=false;
    $("#Navigation_name a").each(function () {
        if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
            $(this).addClass('cur'); urlstatus = true;
        } else {
            $(this).removeClass('cur');
        }
    });
    if (!urlstatus) {$("#Navigation_name a").eq(0).addClass('cur'); }

</script>




<script>



    $(function(){
        $('#sign').click(function(){
            var session1=$(this).attr('name');
            //alert(session);
            if(!session1){
                location="<?php echo U('Home/Login/Login');?>";
            }else{
                location="<?php echo U('Home/Sign/sign');?>";
            }
        });
    })

</script>
<!-- nav 开始 -->

<!-- nav结束 -->
<!-- 购物车的内容 开始-->
<div class="Process" style="text-align: center;"><img src="/Public/Home/images/Process_img_03.png" /></div>
<div class="shoppingMain">
    <ul class="title clearfix">
        <li class="xuanzhong">
            <a href="show.html"><p  class="mycar"><span>1</span>我的购物车</p></a>
        </li>
        <li>
            <a href="order.html"><p  class="write"><span>2</span>填写订单</p></a>
        </li>
        <li>
            <a href="showcart.html"><p class="pay"><span>3</span>订单支付</p></a>
        </li>
    </ul>
    <div class="border">
       <!-- <?php echo U('Home/Order/topay');?>-->
        <form action="" method="post" id="pay">
        <div class="myCar">
            <div class="success">
                <h3>订单已提交成功，请尽快付款!</h3>
                <input type="hidden" name="oid" value="<?php echo ($oid); ?>"/>
                <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><!--<p class="p1">您的订单号：<input name="orderno" value="<?php echo ($val["orderno"]); ?>" style="border: none">
                <p class="p2">订单金额：<input name="trueprice" value="<?php echo ($val["price"]); ?>" style="border: none;width: 30px;"/>元</p>-->
                    <p >您的订单号：<?php echo ($val["orderno"]); ?></p>
                    <p >订单金额：<?php echo ($val["price"]); ?> 元</p><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="pay1">
                <div class="chir_pay">
                    <a href="#" >支付方式</a>
                    <a href="#" class="ac">支付平台</a>
                    <a href="#" >网上银行</a>
                </div>
                <div class="pay2">
                    <span></span>支付平台
                </div>
                <div class="pay3">
                    <ul class="clearfixs">
                        <li style="font-size: 20px"><input type="radio" name="radio" value="1"> 余额支付</li>
                        <li><input type="radio" name="radio" value="2" > <img src="/Public/Home/images/logo_alipay.gif" alt="" /></li>
                        <li><input type="radio" name="radio" value="3"> <img src="/Public/Home/images/logo_yeepay.gif" alt="" /></li>
                        <li><input type="radio" name="radio" value="4"> <img src="/Public/Home/images/logo_weixin.gif" alt="" /></li>
                    </ul>
                </div>

            </div>
            <p class="p3">在线支付成功后，请勿关闭支付成功页面，等待返回到商城</p>
           <!-- <input type="submit" value="确认无误，点击支付" name="submit" class="input1" style="margin-left: 250px;" onclick="layerpay()">-->
            <a href="javascript:layerpay();" style="background-color:red;display:inline-block;width: 212px;height: 52px;color:#ffffff;text-align: center;line-height: 52px;margin-left: 250px;font-weight: bold;font-size: 14px;">确认无误，点击支付</a>
            <a href="<?php echo U('Home/Member/Orderform');?>" style="background-color:red;display:inline-block;width: 212px;height: 52px;color:#ffffff;text-align: center;line-height: 52px;margin-left: 30px;font-weight: bold;font-size: 14px;">返回 我的订单</a>
        </div>
        </form>
    </div>
</div>
<!-- 购物车为0时界面结束 -->
<!-- footer开始 -->
<div class="footer fom_sty fom_w">
    <ul >
        <li class="fli1">
            <p></p>
            <h2>获取帮助<br /><span><a href="#">联系我们</a>|<a href="#">加入我们</a></span></h2>
        </li>
        <li class="fli2">
            <p></p>
            <h2>防伪查询<br /><span><a href="#">输入查询码</a></span></h2>
        </li>
        <li class="fli3">
            <p></p>
            <h2>售后服务<br /><span><a href="#">使用说明</a></span></h2>
        </li>
    </ul>
    <h5>温馨提示：近日有不法分子假冒+4006100011冒充官方客服人员进行电话诈骗，请您提高警惕，注意保护个人账户信息，切勿泄漏他人。如遇类似问题， 请勿回拨来电号码，直接拨打客服电话400-610-0011询问。</h5>
    <h5>沪ICP备14035278号-2 上海电子商务有限公司版权所有 ©1990-2016</h5>
    <h5><a href="#">关于李宁</a> | <a href="#">法律声明</a> | 投资者关系 Investor Relations | <a href="#">特许经营 </a>
        | <a href="#">客服热线</a>
    </h5>
</div>
<!-- footer结束 -->
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>新手上路</dt>
                <dd><a href="#">售后流程</a></dd>
                <dd><a href="#">购物流程</a></dd>
                <dd><a href="#">订购方式</a> </dd>
                <dd><a href="#">隐私声明 </a></dd>
                <dd><a href="#">推荐分享说明 </a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>售后保障</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
<!-- 右侧导航 -->

<!-- 右侧栏结束 -->
</body>
</html>
<script type="text/javascript">
    flag=true;
    jQuery('.layui-layer-ico').live('click',function(){
        flag=true;
    });
  function layerpay(){
      oid=$('input[name="oid"]').val();
      radio=$('input[name="radio"]:checked').val();
      if(radio){
          if(flag) {
              flag = false;
              layer.open({
                  type: 1,
                  shade: false,
                  title: false,//false为不显示标题
                  content: "<div style='width:300px;height:150px;background:white;padding:30px'>" +
                  '<dl class="paypassword">' +
                  '<dd class="dd1">请输入支付密码</dd>' +
                  '<dd class="dd2"><input type="password" name="password"/></dd>' +
                  '<dd class="dd3">' +
                  '<a id="confirm">确定</a>' +
                  '<a id="cancel">取消</a>' +
                  '</dd>' +
                  '</dl>' +
                  '</div>' + ';'
              });
          }
      }else{
          layer.msg('请填写支付方式',{time:1000});
      }
      //输入支付密码;
      $('#confirm').click(function(){
          password=$('input[name="password"]').val();
          $.post('<?php echo U("Home/Member/dopay");?>',{oid:oid,paypwd:password,radio:radio},function(res){
//              alert(res);
              if(res.status==1){
                  layer.msg('支付成功',{icon:6,time:3000},function(){
                      location='<?php echo U("Home/Member/paysuccess");?>?oid='+oid;
                  });
              }else{
                  if(res.info=='你的资金账户被冻结'){
                      layer.msg('你的资金账户被冻结',{icon:5,time:3000});
                  }else if(res.info=='你的余额不足'){
                      layer.msg('你的余额不足',{icon:5,time:3000});
                  }else if(res.info=='支付密码错误'){
                      layer.msg('支付密码错误',{icon:5,time:3000});
                  }else{
                      layer.msg('订单付款失败',{icon:5,time:3000});
                  }
              }
          })
      });

      //取消支付的订单
      $('#cancel').click(function(){
          layer.msg('订单还没有支付，请尽快支付',{time:500},function(){
              parent.layer.closeAll();
          });
      })
  }
</script>