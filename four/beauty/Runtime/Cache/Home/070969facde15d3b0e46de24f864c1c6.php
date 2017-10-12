<?php if (!defined('THINK_PATH')) exit();?><table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
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
                        <font color="#999999"><?php echo (date('Y-m-d',$val1["readdtime"])); ?></font><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="pagelist">
        <?php echo ($page5); ?>
    </div>