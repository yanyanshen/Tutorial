<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>购物车 - 订单结算</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="拍鞋网,拍鞋网官方网站,拍鞋网商城" />
    <meta name="description" content="买鞋子哪个网站好，当然首选拍鞋网!中国最早成立的正品鞋子购物网站,国内最大的品牌鞋子销售广场。所售鞋子100%厂家授权,全国包邮,货到付款,提供最完美的购物体验！" />
    <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="/Public/Mobile/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script>var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','order','trolly'],'2015/09/15 16:10:43',0,false]; var DOMIN = {MAIN:"http://m.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};</script>
<script>
    var JAVASCRIPT_LIB = (('\v' !== 'v') ? 'zepto' : 'jquery');
    JAVASCRIPT_LIB="jquery";
    DOMIN.MAIN = 'http://m.paixie.net';
    DOMIN.PAIXIE = 'http://www.paixie.net';
    // uc浏览器添加书签功能
    window.onmessage = function(event){
        if(event.data.message != ''){
            $('#otherPage').remove();
        }else{
            $('#otherPage').show();
        }
    };
</script>
<link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
<!--改版后 com1-3.css可以去掉-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-3.css?2015091516" />
<!--新改的-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-4.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/download.css?2015091516" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/public-adaptation1-1.css?2015091516" />
<!--红包分享，临时添加-->
<!-- uc 浏览器添加书签 start --->
<iframe src="http://app.uc.cn/appstore/AppCenter/frame?uc_param_str=nieidnutssvebipfcp&amp;api_ver=2.0&amp;id=1904" width="100%" height="160" style="display:none" id="otherPage"></iframe>
<!-- uc 浏览器添加书签 end   ---->
<script>
</script>
<div class="mask hidden"></div>
<form action="" method="post" id="address">
<!--content-->
<?php if(is_array($addressInfo)): $i = 0; $__LIST__ = $addressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="hidden" value="<?php echo ($v["id"]); ?>" name="addressid"/>
<div class="page-role cart-page cart-trolly-page" id="js-cart-trolly-page">
    <div class="com-title" >
        <div style="float: left;margin-left: 10px;">
            <a title="返回" href="<?php echo U('Mobile/Address/manageAddress',array('oid'=>$oid));?>" style="color: white;">
                &lt;&nbsp;&nbsp;修改地址
            </a>
        </div>
        <div style="float: right;">
            <a href="javascript:;" style="color: white;" class="editor"><span>保存</span></a>
        </div>

    </div>
    <div class="pxui-area" id="js-trolly" style="display:block;">
        <div class="address" style="margin-top: 10px;">
            <div style="margin-left: 10px;">
                <p style="margin-top: 10px;"><span>收&nbsp;&nbsp;货&nbsp;&nbsp;人：</span><input type="text" name="username" style="height: 30px;width:78%;border:none;margin: 0;padding:0;" value="<?php echo ($v["username"]); ?>"/></p>
                <p style="margin-top: 15px;"><span>联系电话：</span><input type="text" name="mobile" style="height: 100%;margin: 0;padding:0;height: 30px;width:78%;border:none;" value="<?php echo ($v["mobile"]); ?>"/></p>
                <div style="">
                    <span style="display: inline-block;margin-top: 15px;padding: 0;">所在地区：</span>
                    <div data-toggle="distpicker" style="display: inline-block;margin-top: 8px;">
                        <select data-province="河南省" name="province"></select>
                        <select data-city="郑州市" name="country"></select>
                        <select data-district="中原区" name="city"></select>
                    </div>
                </div>
                <p style="margin-top: 15px;padding: 0;">
                    <textarea name="address" id="" rows="4" placeholder="详细地址" style="width:100%;margin: 15px 0;padding: 0;border: 1px solid lightgray;"><?php echo ($v["address"]); ?></textarea>
                </p>
            </div>
            <div style="height: 8px;background-color: lightgray;"></div>
            <div style="width: 100%;height: 30px;line-height: 30px;"><a style="float: left;margin-left: 10px;color: orangered;" class="delete" addid="<?php echo ($v["id"]); ?>">删除地址</a>
        </div>
    </div>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</form>
</body>
<script src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
<script src="/Public/Mobile/js/distpicker.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
</html>
<script type="text/javascript">
    //删除地址
    $('.delete').click(function(){
        a=$(this);
        addid=$(this).attr('addid');
        layer.open({
            content: '确定要删除改地址吗？'
            ,btn: ['确定', '取消']
            ,yes: function(){
                $.post('<?php echo U("Mobile/Address/deleteAddress");?>',{id:addid},function(res3){
                    if(res3.status==1){
                        layer.open({
                            content: '删除成功'
                            ,skin: 'msg'
                            ,time: 2//2秒后自动关闭
                            ,style:'line-heght:100px;'
                            ,end:function(){
                                location="<?php echo U('Mobile/Address/manageAddress',array('oid'=>$oid));?>";
                            }
                        });
                    }else{
                        layer.open({
                            content: '请稍后进行删除'
                            ,skin: 'msg'
                            ,time: 2//2秒后自动关闭
                            ,style:'line-heght:100px;'
                        });
                    }
                })
            }
        });
    })

    //保存编辑的地址
    $('.editor').click(function(){
        $.post('<?php echo U("Mobile/Address/editAddress");?>',$('#address').serialize(),function (res4) {
            if (res4.status==1) {
                layer.open({
                    content: '编辑成功'
                    , skin: 'msg'
                    , time: 2//2秒后自动关闭
                    , style: 'line-heght:100px;'
                    , end:function () {
                       location="<?php echo U('Mobile/Address/manageAddress',array('oid'=>$oid));?>";
                    }
                });
            } else {
                layer.open({
                    content: '请稍后进行编辑'
                    , skin: 'msg'
                    , time: 2//2秒后自动关闭
                    , style: 'line-heght:100px;'
                });
            }
        })
    })
</script>