<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Author" contect="http://www.webqin.net">
<title>忘记密码</title>
<link rel="shortcut icon" type="image/x-icon" href="/Public/Home/images/logo.ico" media="screen" />
<link type="text/css" href="/Public/Home/css/forgetpwd.css" rel="stylesheet" />
<script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
<link href="/Public/Home/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/common.css" rel="stylesheet" tyle="text/css" />
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script type="text/javascript">
 //导航定位
 $(function(){
	// $(".nav li:eq(2) a:first").addClass("navCur")
	 //验证手机 邮箱 
	 $(".selyz").change(function(){
	   var selval=$(this).find("option:selected").val();
		 if(selval=="0"){
			 $(".sel-yzsj").show()
			 }
		 else if(selval=="1"){
			 $(".sel-yzsj").hide()
			 }
		 })
	 })
</script>
    <script language="javascript">
        function get_mobile_code(){
            $.post('<?php echo U("mobileRegist");?>', {mobile:jQuery.trim($('#mobile').val())},function(msg){
                layer.msg(jQuery.trim(unescape(msg)));
                if(msg=='提交成功'){
                    RemainTime();
                }
            })
        }
        var iTime = 59;
        var Account;
        function RemainTime(){
            document.getElementById('zphone').disabled = true;
            var iSecond,sSecond="",sTime="";
            if (iTime >= 0){
                iSecond = parseInt(iTime%60);
                iMinute = parseInt(iTime/60)
                if (iSecond >= 0){
                    if(iMinute>0){
                        sSecond = iMinute + "分" + iSecond + "秒";
                    }else{
                        sSecond = iSecond + "秒";
                    }
                }
                sTime=sSecond;
                if(iTime==0){
                    clearTimeout(Account);
                    sTime='获取手机验证码';
                    iTime = 59;
                    document.getElementById('zphone').disabled = false;
                }else{
                    Account = setTimeout("RemainTime()",1000);
                    iTime=iTime-1;
                }
            }else{
                sTime='没有倒计时';
            }
            document.getElementById('zphone').value ='重发验证码(' +sTime+')';
        }
    </script>
    <script>
        $(function(){
            $('#btn1').click(function () {
                    $.post('<?php echo U("mobile");?>', $('#form1').serialize(), function (res) {
                        if (res.status == 1) {
                            layer.msg('正在努力提交...', {
                                icon: 16
                            }, function () {
                                location="<?php echo U('Forgetpwd/forgetpwd3');?>"
                            });
                        } else {
                            layer.msg('验证失败', {
                                icon: 5
                            }, function () {
                                location="<?php echo U('Forgetpwd/forgetpwd2');?>"
                            });
                        }
                    });
            })
        })
    </script>
</head>

<body>
<div id="top">
    <div class="top">
        <div class="Collection"><em></em><a href="javascript:;" title="收藏我们" id="fav">收藏我们</a></div>
        <div class="hd_top_manu clearfix">
            <ul class="clearfix">
                <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="<?php echo U('Login/login');?>" class="red">[请登录]</a> 新用户<a href="<?php echo U('Registered/registered');?>" class="red">[免费注册]</a></li>
                <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">联系我们</a></li>
                <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
                    <div class="hd_menu_list">
                        <ul>
                            <li><a href="http://www.zuipin.cn/4010653124.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju" target="_blank">常见问题</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_service.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h3" target="_blank">在线退换货</a></li>
                            <li><a href="http://www.zuipin.cn/board?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju">媒体报道</a></li>
                            <li><a href="http://www.zuipin.cn/help_center_shipment.html?utm_source=zuipin&utm_medium=page&utm_campaign=taocichaju#h2" target="_blank">配送范围</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
  <div class="content">
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写账户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
     <form action="" id="form1" method="post" class="forget-pwd">
       <dl>
        <dt>验证方式：</dt>
        <dd>
         <select class="selyz">
          <option value="0">已验证手机</option>
          <!--<option value="1">已验证邮箱</option>-->
         </select>
        </dd>
        <div class="clears"></div>
       </dl>
       <dl>
        <dt>用户名：</dt>
        <dd><input type="text" value="<?php echo (session('ybc_username')); ?>" name="username" placeholder="请输入用户名"/></dd>
        <div class="clears"></div>
       </dl>
       <dl class="sel-yzsj">
        <dt>已验证手机：</dt>
        <dd><input type="text"  placeholder="<?php echo (substr_replace(session('ybc_mobile'),'****',3,4)); ?>" value=""  readonly  /></dd>
           <input type="text" id="mobile" name="mobile" value="<?php echo (session('ybc_mobile')); ?>" style="display: none"/>
           <div class="clears"></div>
       </dl>
       <!--<dl class="sel-yzyx">
        <dt>已验证邮箱：</dt>
        <dd><input type="text" value="<?php echo (session('umail')); ?>" readonly /></dd>
        <div class="clears"></div>
       </dl>-->
       <dl>
        <dt>手机校验码：</dt>
        <dd><input type="text" name="mobile_code" /> <input type="button" id="zphone" onclick="get_mobile_code()" value="获取短信验证码" style="cursor: pointer; width: 105px;background-color: #cccccc;border: 1px solid #cccccc;color: #666666"/></dd>
        <div class="clears"></div>
       </dl>
       <div class="subtijiao"><input type="button" id="btn1" value="提交" /></div>
      </form><!--forget-pwd/-->
   </div><!--web-width/-->
  </div><!--content/-->
<div class="footer">
    <div class="streak"></div>
    <div class="footerbox clearfix">
        <div class="left_footer">
            <div class="img"><img src="/Public/Home/images/img_33.png" /></div>
            <div class="phone">
                <h2>服务咨询电话</h2>
                <p class="Numbers">400-3455-334</p>
            </div>
        </div>
        <div class="right_footer">
            <dl>
                <dt><em class="icon_img"></em>购物指南</dt>
                <dd><a href="#">怎样购物</a></dd>
                <dd><a href="#">积分政策</a></dd>
                <dd><a href="#">会员优惠</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">快递资费及送达时间</a></dd>
                <dd><a href="#">快递覆盖地区查询</a></dd>
                <dd><a href="#">验货与签收</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">产品信息</a></dd>
                <dd><a href="#">怎样购物</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>配送方式</dt>
                <dd><a href="#">货到付款</a></dd>
                <dd><a href="#">支付宝</a></dd>
                <dd><a href="#">财付通</a></dd>
                <dd><a href="#">网银支付</a></dd>
                <dd><a href="#">银联支付</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>售后服务</dt>
                <dd><a href="#">退换货原则</a></dd>
                <dd><a href="#">退换货要求与运费规则</a></dd>
                <dd><a href="#">退换货流程</a></dd>
            </dl>
            <dl>
                <dt><em class="icon_img"></em>关于我们</dt>
                <dd><a href="#">关于我们</a></dd>
                <dd><a href="#">友情链接</a></dd>
                <dd><a href="#">媒体报道</a></dd>
                <dd><a href="#">新闻动态</a></dd>
                <dd><a href="#">企业文化</a></dd>

            </dl>
        </div>
    </div>
    <div class="slogen">
        <div class="footerbox clearfix ">
            <ul class="wrap">
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_02.png" data-bd-imgshare-binded="1"></a>
                    <b>正品保证</b>
                    <span>正品行货 放心选购</span>
                </li>
                <li><a href="#"><img src="/Public/Home/images/icon_img_03.png" data-bd-imgshare-binded="2"></a>
                    <b>满68元包邮</b>
                    <span>购物满68元，免费快递</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_04.png" data-bd-imgshare-binded="3"></a>
                    <b>厂家直供</b>
                    <span>价格更低，质量更可靠</span>
                </li>
                <li>
                    <a href="#"><img src="/Public/Home/images/icon_img_05.png" data-bd-imgshare-binded="4"></a>
                    <b>权威认证</b>
                    <span>政府扶持单位，安全保证</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="footerbox Copyright">
        <p><a href="#">关于我们</a> | <a href="#">隐私申明</a> | <a href="#">成为供应商</a> | <a href="#">茶叶</a> | <a href="#">博客</a> |<a href="#">友情链接</a> | <a href="#">网站地图</a></p>
        <p>Copyright 2010 - 2015 巴山雀舌 四川巴山雀舌茗茶实业有限公司 zuipin.cn All Rights Reserved </p>
        <p>川ICP备10200063号-1</p>
        <a href="#" class="return_img"></a>
    </div>
</div>
</body>
</html>