<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <style>
        .ul,.active,.greate2,.middle2,.bad2,.commentcontent,#div1{margin:0;padding: 0;}
        .ul{width: 100%;height: 35px;background-color: lightgray;}
        .ul li{list-style: none;float:left;width:16%;height: 35px;line-height: 35px;text-align: center;cursor: pointer;}
        #div1>div{width:100%;display: none;}
        #div1 .commentcontent{display:block;}
        .active{background-color: red;color:white;}
        .current{color:red}
        .pagelist a{border: 1px solid #CCCCCC;display: inline-block;width: 50px;height: 25px;line-height: 25px;text-align: center;}
    </style>
    <script type="text/javascript" src="/Public/Mobile/goodsdetail/js/jquery-1.10.2.min.js"></script>
    <link href="/Public/Mobile/goodsdetail/css/mall.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="child_header">
    <!--可以返回到上一个页面，相当于是历史页面-->
    <div class="goback"><a href="javascript:history.back(-1)"><i></i></a></div>
    <div class="current_location"><span>商品评价(<?php echo ($totalcount1); ?>)</span></div>
</div>
<input type="hidden" name="gid" value="<?php echo ($gid); ?>"/>
<ul class="ul">
    <li style="margin: 0;color: #ffffff;" class="active" cosid="0">全部评价(<?php echo ($totalcount1); ?>)</li>
    <li style="margin: 0;color: #ffffff;" class="greate2" cosid="1" >好评(<?php echo ($totalcount2); ?>)</li>
    <li style="margin: 0;color: #ffffff;" class="middle2" cosid="2">中评(<?php echo ($totalcount3); ?>)</li>
    <li style="margin: 0;color: #ffffff;" class="bad2" cosid="3" >差评(<?php echo ($totalcount4); ?>)</li>
    <li style="margin: 0;color: #ffffff;" class="img1">有图(<?php echo ($totalcount5); ?>)</li>
    <li style="margin: 0;color: #ffffff;" class="zuijia" >追加(<?php echo ($totalcount6); ?>)</li>
</ul>
<div id="div1">
    <div class="commentcontent" id="allreview">
        <table border="0" class="jud_list" style="width:100%; margin-top:15px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist1)): $i = 0; $__LIST__ = $commresponlist1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment1): $mod = ($i % 2 );++$i;?><tr valign="top" style="margin: 30px 0;">
                    <td width="20%" style="font-size: 12px;"><img src="/UserImg/photo<?php echo ($comment1["imgpath"]); echo ($comment1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($comment1["username"]); ?> <br /></td>
                    <td width="20%" style="font-size: 12px;">
                        型号：<font color="#999999"><?php echo ($comment1["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($comment1["costatus"]); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php echo ($comment1["content"]); ?><br />
                        <?php if($comment1["imageurl"] != ''&&$comment1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($comment1["imageurl"]); echo ($comment1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$comment1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 2px;font-size: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$comment1["coaddtime"])); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($comment1["response"]); ?><br />
                            <font color="#999999"><?php echo (date('Y-m-d',$comment1["readdtime"])); ?></font><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page1); ?>
        </div>
    </div>
    <div class="commentcontent" style="display: none"  id="goodreview">
        <table border="0" class="jud_list" style="width:100%; margin-top:15px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist2)): $i = 0; $__LIST__ = $commresponlist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><tr valign="top" style="margin:15px 0;">
                    <td width="20%" style="font-size: 12px;"><img src="/UserImg/photo<?php echo ($val1["imgpath"]); echo ($val1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="20%" style="font-size: 12px;">
                        型号：<font color="#999999"><?php echo ($val1["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($val1["costatus"]); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php echo ($val1["content"]); ?><br />
                        <?php if($val1["imageurl"] != ''&&$val1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val1["imageurl"]); echo ($val1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$val1["coaddtime"])); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php if($val1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val1["response"]); ?><br />
                            <font color="#999999"><?php echo (date('Y-m-d',$val1["readdtime"])); ?></font><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page2); ?>
        </div>
    </div>
    <div class="commentcontent" style="display: none"  id="middlereview">
        <table border="0" class="jud_list" style="width:100%; margin-top:15px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist3)): $i = 0; $__LIST__ = $commresponlist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><tr valign="top" style="margin:15px 0;">
                    <td width="20%" style="font-size: 12px;"><img src="/UserImg/photo<?php echo ($val2["imgpath"]); echo ($val2["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val2["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="20%" style="font-size: 12px;">
                        型号：<font color="#999999"><?php echo ($val2["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($val2["costatus"]); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php echo ($val2["content"]); ?><br />
                        <?php if($val2["imageurl"] != ''&&$val2["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val2["imageurl"]); echo ($val2["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val2['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$val2["coaddtime"])); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val2["response"]); ?><br />
                            <font color="#999999"><?php echo (date('Y-m-d',$val2["readdtime"])); ?></font><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page3); ?>
        </div>
    </div>
    <div class="commentcontent" style="display: none" id="badreview">
        <table border="0" class="jud_list" style="width:100%; margin-top:15px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist4)): $i = 0; $__LIST__ = $commresponlist4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($i % 2 );++$i;?><tr valign="top" style="margin: 15px 0;">
                    <td width="20%" style="font-size: 12px;"><img src="/UserImg/photo<?php echo ($val3["imgpath"]); echo ($val3["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val3["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="20" style="font-size: 12px;">
                        型号：<font color="#999999"><?php echo ($val3["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($val3["costatus"]); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php echo ($val3["content"]); ?><br />
                        <?php if($val3["imageurl"] != ''&&$val3["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val3["imageurl"]); echo ($val3["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val3['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$val3["coaddtime"])); ?></font>
                    </td>
                    <td width="30%" style="font-size: 12px;">
                        <?php if($val3["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val3["response"]); ?><br />
                            <font color="#999999"><?php echo (date('Y-m-d',$val3["readdtime"])); ?></font><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page4); ?>
        </div>
    </div>
    <div class="commentcontent" style="display: none"  id="imgcomment">
        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist5)): $i = 0; $__LIST__ = $commresponlist5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val5): $mod = ($i % 2 );++$i;?><tr valign="top">
                    <td width="160"><img src="/UserImg/photo<?php echo ($val5["imgpath"]); echo ($val5["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val5["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="180">
                        型号：<font color="#999999"><?php echo ($val5["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($val5["costatus"]); ?></font>
                    </td>
                    <td>
                        <?php echo ($val5["content"]); ?><br />
                        <?php if($val5["imageurl"] != ''&&$val5["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val5["imageurl"]); echo ($val5["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val5['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$val5["coaddtime"])); ?></font>
                    </td>
                    <td>
                        <?php if($val5["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val5["response"]); ?><br />
                            <font color="#999999"><?php echo (date('Y-m-d',$val5["readdtime"])); ?></font><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page5); ?>
        </div>
    </div>
    <div class="commentcontent" style="display: none"  id="zuijiacomment">
        <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
            <?php if(is_array($commresponlist6)): $i = 0; $__LIST__ = $commresponlist6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val6): $mod = ($i % 2 );++$i;?><tr valign="top">
                    <td width="160"><img src="/UserImg/photo<?php echo ($val6["imgpath"]); echo ($val6["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val6["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
                    <td width="180">
                        型号：<font color="#999999"><?php echo ($val6["ml"]); ?>ml</font>
                        <br /><font color="orange"><?php echo ($val6["costatus"]); ?></font>
                    </td>
                    <td>
                        <?php echo ($val6["content"]); ?><br />
                        <?php if($val6["picurl"] != ''&&$val6["picname"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val6["picurl"]); echo ($val6["picname"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                            <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val6['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                        <font color="#999999"><?php echo (date('Y-m-d',$val6["coaddtime"])); ?></font>
                    </td>
                    <td>
                        <?php if($val6["zuijiatime"] == 1): ?><span style="color:orange;">[当天追加]:</span><?php echo ($val6["zuijia"]); ?><br/>
                            <?php else: ?>
                            <span style="color:orange;">[<?php echo ($val6["zuijiatime"]); ?>天后追加]:</span><?php echo ($val6["zuijia"]); ?><br /><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="pagelist">
            <?php echo ($page6); ?>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    jQuery(function(){
        jQuery(' .ul li').click(function(){
            i=jQuery(this).index();
            jQuery(' .ul li').removeClass('active').eq(i).addClass('active');
            jQuery('#div1>div').hide().eq(i).show();
        })
    });

    function goodsdetail1(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:1},function(res){
            jQuery('#div1>div').eq(0).html(res);
        })
    }
    function goodsdetail2(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:2},function(res){
            jQuery('#div1>div').eq(1).html(res);
        })
    }
    function goodsdetail3(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:3},function(res){
            jQuery('#div1>div').eq(2).html(res);
        })
    }
    function goodsdetail4(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:4},function(res){
            jQuery('#div1>div').eq(3).html(res);
        })
    }

    function goodsdetail5(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:5},function(res){
            jQuery('#div1>div').eq(4).html(res);
        })
    }

    function goodsdetail6(id){
        var gid=jQuery('input[name="gid"]').val();
        var id=id?id:1;
        jQuery.get("<?php echo U('Mobile/Goods/allcomment');?>",{"p":id,"gid":gid,cid:6},function(res){
            jQuery('#div1>div').eq(5).html(res);
        })
    }

</script>