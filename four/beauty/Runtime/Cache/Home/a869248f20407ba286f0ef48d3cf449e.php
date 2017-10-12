<?php if (!defined('THINK_PATH')) exit();?><table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
    <?php if(is_array($commresponlist1)): $i = 0; $__LIST__ = $commresponlist1;if( count($__LIST__)==0 ) : echo "$empty1" ;else: foreach($__LIST__ as $key=>$comment1): $mod = ($i % 2 );++$i;?><tr valign="top">
            <td width="160"><img src="/UserImg/photo<?php echo ($comment1["imgpath"]); echo ($comment1["imgname"]); ?>" width="20" height="20" align="absmiddle" />&nbsp;<?php echo ($comment1["username"]); ?> <br /><font color="#999999">（匿名用户）</font></td>
            <td width="180">
                型号：<font color="#999999"><?php echo ($comment1["ml"]); ?>ml</font>
                <br /><font color="orange"><?php echo ($comment1["costatus"]); ?></font>
            </td>
            <td>
                <?php echo ($comment1["content"]); ?><br />
                <?php if($comment1["imageurl"] != ''&&$comment1["imagename"] != ''): ?><a href="javascript:;" class="showimg" ><img src="/CommentImg/<?php echo ($comment1["imageurl"]); echo ($comment1["imagename"]); ?>" alt="" style="width: 50px;height: 50px;"/></a>
                    <a href="<?php echo U('Home/Order/seeimg',array('cid'=>$comment1['id']));?>" target="_blank" class="seebigimg" style="margin-left: 10px;">查看原图</a><br/><?php endif; ?>
                <font color="#999999"><?php echo (date('Y-m-d',$comment1["coaddtime"])); ?></font>
            </td>
            <td>
                <?php if($comment1["respid"] == 2): ?><span style="color:orange;">卖家回复:</span><?php echo ($comment1["response"]); ?><br />
                    <font color="#999999"><?php echo (date('Y-m-d',$comment1["readdtime"])); ?></font><?php endif; ?>
            </td>
        </tr><?php endforeach; endif; else: echo "$empty1" ;endif; ?>
</table>
<div>
   <?php echo ($page1); ?>
</div>