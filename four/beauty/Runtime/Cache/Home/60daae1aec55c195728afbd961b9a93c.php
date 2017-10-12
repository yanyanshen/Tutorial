<?php if (!defined('THINK_PATH')) exit();?><table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
    <?php if(is_array($commresponlist3)): $i = 0; $__LIST__ = $commresponlist3;if( count($__LIST__)==0 ) : echo "$empty3" ;else: foreach($__LIST__ as $key=>$comment3): $mod = ($i % 2 );++$i;?><tr valign="top">
            <td width="160"><img src="/UserImg/photo<?php echo ($comment3["imgpath"]); echo ($comment3["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($comment3["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
            <td width="180">
                型号：<font color="#999999"><?php echo ($comment3["ml"]); ?>ml</font>
                <br /><font color="orange"><?php echo ($comment3["costatus"]); ?></font>
            </td>
            <td>
                <?php echo ($comment3["content"]); ?><br />
                <?php if($comment3["imageurl"] != ''&&$comment3["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($comment3["imageurl"]); echo ($comment3["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                    <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$comment3['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                <font color="#999999"><?php echo (date('Y-m-d',$comment3["coaddtime"])); ?></font>
            </td>
            <td>
                <?php if($comment3["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($comment3["response"]); ?><br />
                    <font color="#999999"><?php echo (date('Y-m-d',$comment3["readdtime"])); ?></font><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; else: echo "$empty3" ;endif; ?>
</table>
<div>
   <?php echo ($page3); ?>
</div>
<!--
<div class="commentcontent" style="display: none" id="goodreview">
<table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
    <?php if(is_array($commresponlist['greate'])): $i = 0; $__LIST__ = $commresponlist['greate'];if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><tr valign="top">
            <td width="160"><img src="/UserImg/photo<?php echo ($val1["imgpath"]); echo ($val1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
            <td width="180">
                型号：<font color="#999999"><?php echo ($val1["ml"]); ?>ml</font>
                <br /><font color="orange"><?php echo ($val1["costatus"]); ?></font>
            </td>
            <td>
                <?php echo ($val1["content"]); ?><br />
                <?php if($comment3["imageurl"] != ''&&$comment3["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val1["imageurl"]); echo ($val1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                    <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                <font color="#999999"><?php echo (date('Y-m-d',$val1["coaddtime"])); ?></font>
            </td>
            <td>
                <?php if($val1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val1["response"]); ?><br />
                    <font color="#999999"><?php echo (date('Y-m-d',$val1["readdtime"])); ?></font><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
</table>
<div>
    <?php echo ($page); ?>
</div>
</div>

<div class="commentcontent" style="display: none" id="middlereview">
<table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
    <?php if(is_array($commresponlist['middle'])): $i = 0; $__LIST__ = $commresponlist['middle'];if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><tr valign="top">
            <td width="160"><img src="/UserImg/photo<?php echo ($val2["imgpath"]); echo ($val2["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val2["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
            <td width="180">
                型号：<font color="#999999"><?php echo ($val2["ml"]); ?>ml</font>
                <br /><font color="orange"><?php echo ($val2["costatus"]); ?></font>
            </td>
            <td>
                <?php echo ($val2["content"]); ?><br />
                <?php if($val2["imageurl"] != ''&&$val2["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val2["imageurl"]); echo ($val2["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                    <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val2['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                <font color="#999999"><?php echo (date('Y-m-d',$val2["coaddtime"])); ?></font>
            </td>
            <td>
                <?php if($val2["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val2["response"]); ?><br />
                    <font color="#999999"><?php echo (date('Y-m-d',$val2["readdtime"])); ?></font><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
</table>
<div>
    <?php echo ($page); ?>
</div>

    </div>

<div class="commentcontent"  style="display: none" id="badreview">
<table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
    <?php if(is_array($commresponlist['bad'])): $i = 0; $__LIST__ = $commresponlist['bad'];if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($i % 2 );++$i;?><tr valign="top">
            <td width="160"><img src="/UserImg/photo<?php echo ($val3["imgpath"]); echo ($val3["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($val3["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
            <td width="180">
                型号：<font color="#999999"><?php echo ($val3["ml"]); ?>ml</font>
                <br /><font color="orange"><?php echo ($val3["costatus"]); ?></font>
            </td>
            <td>
                <?php echo ($val3["content"]); ?><br />
                <?php if($val3["imageurl"] != ''&&$val3["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($val3["imageurl"]); echo ($val3["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                    <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$val3['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                <font color="#999999"><?php echo (date('Y-m-d',$val3["coaddtime"])); ?></font>
            </td>
            <td>
                <?php if($val3["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($val3["response"]); ?><br />
                    <font color="#999999"><?php echo (date('Y-m-d',$val3["readdtime"])); ?></font><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
</table>
<div>
    <?php echo ($page); ?>
</div>
    </div>-->