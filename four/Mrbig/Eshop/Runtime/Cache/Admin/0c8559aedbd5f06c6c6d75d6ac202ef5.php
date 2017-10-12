<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html Public "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="/Public/Admin/Js/prototype.lite.js" type="text/javascript"></script>
    <script src="/Public/Admin/Js/moo.fx.js" type="text/javascript"></script>
    <script src="/Public/Admin/Js/moo.fx.pack.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Style/skin.css" />
    <script type="text/javascript">
        window.onload = function () {
            var contents = document.getElementsByClassName('content');
            var toggles = document.getElementsByClassName('type');
            var myAccordion = new fx.Accordion(
            toggles, contents, {opacity: true, duration: 400}
            );
            myAccordion.showThisHideOpen(contents[0]);
            for(var i=0; i<document .getElementsByTagName("a").length; i++){
                var dl_a = document.getElementsByTagName("a")[i];
                    dl_a.onfocus=function(){
                        this.blur();
                    }
            }
        }
    </script>
</head>

<body>
    <table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
        <tr>
            <td width="182" valign="top">
                <div id="container">
                    <h1 class="type"><a href="javascript:void(0)">管理中心</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="main.html" target="main">后台首页</a></li>
                            <li><a href="../Admin/add_admin.html" target="main">添加管理</a></li>
                            <li><a href="../Admin/adminList.html" target="main">管理列表</a></li>

                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">品牌管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="../Brand/brandList.html" target="main">品牌列表</a></li>
                            <li><a href="../Brand/addbrand.html" target="main">添加品牌</a></li>

                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">商品分类</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Category/add_category');?>" target="main">添加分类</a></li>
                            <li><a href="<?php echo U('Admin/Category/categoryList');?>" target="main">分类列表</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">商品管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Goods/add');?>" target="main">添加商品</a></li>
                            <li><a href="<?php echo U('Admin/Goods/glist');?>" target="main">商品列表</a></li>
                        </ul>
                    </div>
                    <!-- *********** -->
                    <h1 class="type"><a href="javascript:void(0)">订单管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_1');?>" target="main">未付款</a></li>
                        </ul>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_2');?>" target="main">已付款</a></li>
                        </ul>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_3');?>" target="main">已发货</a></li>
                        </ul>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_4');?>" target="main">确认收货</a></li>
                        </ul>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_5');?>" target="main">退货订单</a></li>
                        </ul>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/Order/order_6');?>" target="main">退货成功</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">广告管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                       <ul class="RM">
                       <li><a href="<?php echo U('Admin/Ad/listAd');?>" target="main">广告列表</a></li>
                       <li><a href="<?php echo U('Admin/Ad/ad');?>" target="main">添加广告</a></li>
                       </ul> 
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">会员管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Admin/User/userList');?>" target="main">会员列表</a></li>
                        </ul>
                    </div>
                    <!-- *********** -->
                    <h1 class="type"><a href="javascript:void(0)">新闻中心</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/Public/Admin/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                      
                           <ul class="RM">
                            <li><a href="../Message/addmessage.html" target="main">在线留言</a></li>
                            <li><a href="../Message/messageList.html" target="main">留言列表</a></li>
                            <li><a href="../New/addnews.html" target="main">发布动态</a></li>
                            <li><a href="../New/newList.html" target="main">动态列表</a></li>
                        </ul>
                       
                    </div>
                    <!-- *********** -->
                </div>
            </td>
        </tr>
    </table>
</body>
</html>