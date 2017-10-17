<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8"/>
    <link href="/Public/Admin/css/admin.css" type="text/css" rel="stylesheet"/>
    <script language=javascript>
        function expand(el) {
            childobj = document.getElementById("child" + el);

            if (childobj.style.display == 'none') {
                childobj.style.display = 'block';
            }
            else {
                childobj.style.display = 'none';
            }
            return;
        }
    </script>
</head>
<body>
<table height="100%" cellspacing=0 cellpadding=0 width=170
       background=/Public/Admin/img/menu_bg.jpg border=0>
    <tr>
        <td valign=top align=middle>
            <table cellspacing=0 cellpadding=0 width="100%" border=0>

                <tr>
                    <td height=10></td>
                </tr>
            </table>

            <?php if(is_array($info)): $k1 = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k1 % 2 );++$k1;?><table cellspacing=0 cellpadding=0 width=150 border=0>

                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(<?php echo ($k1); ?>)
                            href="javascript:void(0);" onfocus="this.blur()"><?php echo ($v1["name"]); ?></a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id="child<?php echo ($k1); ?>" style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <?php if(is_array($v1['child'])): $k2 = 0; $__LIST__ = $v1['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2;?><tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U($v2['url']);?>" onfocus="this.blur()" target=right><?php echo ($v2["name"]); ?></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<!--                <tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U('Role/add_role');?>" onfocus="this.blur()" target=right>添加管理员</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U('Nev/nevList');?>" onfocus="this.blur()" target=right>菜单列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U('Nev/addNev');?>" onfocus="this.blur()" target=right>添加菜单</a></td>
                </tr>-->
                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(10)
                            href="javascript:void(0);">权限管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child10 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Rule/ruleList');?>"
                           target=right>权限列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Rule/addRule');?>"
                           target=right>添加权限</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U('Group/groupList');?>" onfocus="this.blur()" target=right>管理组列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9 src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild href="<?php echo U('Group/addGroup');?>" onfocus="this.blur()" target=right>添加管理组</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(2)
                            href="javascript:void(0);">分类管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child2 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Category/cateList');?>"
                           target=right>分类列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Category/add');?>"
                           target=right>添加分类</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg>
                        <a class=menuparent onclick=expand(3)
                            href="javascript:void(0);">品牌管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child3 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Brand/show');?>"
                           target=right>品牌列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo u('Brand/add');?>"
                           target=right>添加品牌</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>

            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(4)
                            href="javascript:void(0);">商品管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child4 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Goods/goodsList');?>"
                           target=right>商品列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Goods/add_goods');?>"
                           target=right>添加商品</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Goods/add_goods');?>"
                           target=right>商品回收站</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>

            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(9)
                            href="javascript:void(0);">活动管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child9 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Active/activeList');?>"
                           target=right>活动商品</a></td>
                </tr>


                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>

            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(5)
                            href="javascript:void(0);">评价管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child5 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('pingjia/pingjiaList');?>"
                           target=right>评价列表</a></td>
                </tr>
                &lt;!&ndash;<tr height=20>&ndash;&gt;
                    &lt;!&ndash;<td align=middle width=30><img height=9&ndash;&gt;
                                                   &lt;!&ndash;src="/Public/Admin/img/menu_icon.gif" width=9></td>&ndash;&gt;
                    &lt;!&ndash;<td><a class=menuchild&ndash;&gt;
                           &lt;!&ndash;href="<?php echo U('pingjia/pingjiaReturn');?>"&ndash;&gt;
                           &lt;!&ndash;target=right>评价回复</a></td>&ndash;&gt;
                &lt;!&ndash;</tr>&ndash;&gt;
                &lt;!&ndash;<tr height=20>&ndash;&gt;
                    &lt;!&ndash;<td align=middle width=30><img height=9&ndash;&gt;
                                                   &lt;!&ndash;src="/Public/Admin/img/menu_icon.gif" width=9></td>&ndash;&gt;
                    &lt;!&ndash;<td><a class=menuchild&ndash;&gt;
                           &lt;!&ndash;href="<?php echo U('pingjia/pingjiaDetail');?>"&ndash;&gt;
                           &lt;!&ndash;target=right>评价详情</a></td>&ndash;&gt;
                &lt;!&ndash;</tr>&ndash;&gt;
                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(6)
                            href="javascript:void(0);">会员管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child6 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Member/member');?>"
                           target=right>会员列表</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Member/add');?>"
                           target=right>添加会员</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(7)
                            href="javascript:void(0);">订单管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child7 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Order/orderList',array('status'=>0));?>"
                           target=right>全部订单</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Order/orderList',array('status'=>1));?>"
                           target=right>未付款订单</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Order/orderList',array('status'=>2));?>"
                           target=right>等待发货订单</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Order/orderList',array('status'=>3));?>"
                           target=right>已发货订单</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Order/orderList',array('status'=>4));?>"
                           target=right>已完成订单</a></td>
                </tr>
                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>


            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <tr height=22>
                    <td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a
                            class=menuparent onclick=expand(8)
                            href="javascript:void(0);">广告管理</a></td>
                </tr>
                <tr height=4>
                    <td></td>
                </tr>
            </table>
            <table id=child8 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Advertising/advertising');?>"
                           target=right>广告列表</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="<?php echo U('Advertising/add');?>"
                           target=right>添加广告</a></td>
                </tr>

                <tr height=4>
                    <td colspan=2></td>
                </tr>
            </table>
-->
            <!--<table cellspacing=0 cellpadding=0 width=150 border=0>-->

                <!--<tr height=22>-->
                    <!--<td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a-->
                            <!--class=menuparent onclick=expand(6)-->
                            <!--href="javascript:void(0);">高级管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=4>-->
                    <!--<td></td>-->
                <!--</tr>-->
            <!--</table>-->
            <!--<table id=child6 style="display: none" cellspacing=0 cellpadding=0-->
                   <!--width=150 border=0>-->

                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>广告管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>访问统计</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>邮件发送设置</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>联系部门</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>用户留言</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>招聘职位</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>应聘人员</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>留言簿</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>产品订购</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>链接管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>文件管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>信息转移</a></td>-->
                <!--</tr>-->
                <!--<tr height=4>-->
                    <!--<td colspan=2></td>-->
                <!--</tr>-->
            <!--</table>-->
            <!--<table cellspacing=0 cellpadding=0 width=150 border=0>-->

                <!--<tr height=22>-->
                    <!--<td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a-->
                            <!--class=menuparent onclick=expand(7)-->
                            <!--href="javascript:void(0);">系统管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=4>-->
                    <!--<td></td>-->
                <!--</tr>-->
            <!--</table>-->
            <!--<table id=child7 style="display: none" cellspacing=0 cellpadding=0-->
                   <!--width=150 border=0>-->

                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>基本设置</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>样式管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>栏目管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>功能管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>菜单管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>首页设置</a></td>-->
                <!--</tr>-->
                <!--<tr height=20>-->
                    <!--<td align=middle width=30><img height=9-->
                                                   <!--src="/Public/Admin/img/menu_icon.gif" width=9></td>-->
                    <!--<td><a class=menuchild-->
                           <!--href="#"-->
                           <!--target=main>管理员列表</a></td>-->
                <!--</tr>-->
                <!--<tr height=4>-->
                    <!--<td colspan=2></td>-->
                <!--</tr>-->
            <!--</table>-->
            <!--<table cellspacing=0 cellpadding=0 width=150 border=0>-->

                <!--<tr height=22>-->
                    <!--<td style="padding-left: 30px" background=/Public/Admin/img/menu_bt.jpg><a-->
                            <!--class=menuparent onclick=expand(0)-->
                            <!--href="javascript:void(0);">个人管理</a></td>-->
                <!--</tr>-->
                <!--<tr height=4>-->
                    <!--<td></td>-->
                <!--</tr>-->
            <!--</table>-->
            <table id=child0 style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="#"
                           target=main>修改口令</a></td>
                </tr>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="/Public/Admin/img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           onclick="if (confirm('确定要退出吗？')) return true; else return false;"
                           href="http://www.865171.cn"
                           target=_top>退出系统</a></td>
                </tr>
            </table>
        </td>
        <td width=1 bgcolor=#d1e6f7></td>
    </tr>
</table>
</body>
</html>