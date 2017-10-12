<?php if (!defined('THINK_PATH')) exit();?><table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
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