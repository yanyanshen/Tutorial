<?php if (!defined('THINK_PATH')) exit();?><dl class="if2-r-box2">
    <dt>
    <p class="box2-p1">好评率</p>
    <p class="box2-p2"><?php echo ($goodRate); ?>%</p>
    <p class="box2-p3">共<?php echo ($cusCount); ?>人评论</p>
    </dt>
    <dd>
        <P>买过的人觉得</P>
        <ul>
            <li><a href="#">香脆可口(198)</a></li>
            <li><a href="#">口感不错(160)</a></li>
            <li><a href="#">分量足(84)</a></li>
            <li><a href="#">味道不错(47)</a></li>
            <li><a href="#">价格便宜(34)</a></li>
            <li><a href="#">包装不错(30)</a></li>
            <li><a href="#">吃货必备(26)</a></li>
            <li><a href="#">送货快(14)</a></li>
            <li><a href="#">孩子喜欢(4)</a></li>
            <div style="clear:both;"></div>
        </ul>
    </dd>
    <div style="clear:both;"></div>
</dl>
<div class="if2-r-box3">
<ul>
    <li class="<?php echo ($cid==0?'current-li':''); ?>"><a href="JavaScript:index(1);">全部（<?php echo ($total); ?>）</a></li>
    <li class="<?php echo ($cid==1?'current-li':''); ?>"><a href="JavaScript:index(1);">好评（<?php echo ($good); ?>）</a></li>
    <li class="<?php echo ($cid==2?'current-li':''); ?>"><a href="JavaScript:index(1);">中评（<?php echo ($notbad); ?>）</a></li>
    <li class="<?php echo ($cid==3?'current-li':''); ?>"><a href="JavaScript:index(1);">差评（<?php echo ($bad); ?>）</a></li>
    <!--<li class="<?php echo ($cid==4?'current-li':''); ?>"><a href="JavaScript:index(1);">图片（1）</a></li>
    <li class="<?php echo ($cid==5?'current-li':''); ?>"><a href="JavaScript:index(1);">追加评论（1）</a></li>-->
    <div style="clear:both;"></div>
</ul>
<div class="pixlist">
<?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cval): $mod = ($i % 2 );++$i;?><dl>
        <dt>
            <a href="#"><img src="/Public/Home/images/box3-dt-tu.gif" /></a>
        </dt>
        <dd>
            <a href="#"><?php echo ($cval["comment_custom_id"]); ?></a>
            <p class="b3-p1"><?php echo ($cval["comment_content"]); ?></p>
            <p class="b3-p2"><?php echo date("Y-m-d H:i:s",$cval[comment_createtime]);?></p>
            <div style="clear:both;"></div>
            <?php if(is_array($appendList)): $i = 0; $__LIST__ = $appendList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aval): $mod = ($i % 2 );++$i; if($cval[comment_custom_id] == $aval[comment_custom_id]): ?><div class="b3-zuijia">
                        <p class="zj-p1">追加评论：</p>
                        <p class="zj-p2"><?php echo ($aval["comment_content"]); ?></p>
                        <p class="zj-p3"><?php echo date('Y-m-d H:i:s',$aval[comment_createtime]);?></p>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </dd>
        <div style="clear:both;"></div>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
<!--分页-->
<div>
    <div class="listpage">
        <?php echo ($page); ?>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    /*评论切换20160721 9:11*/
    $(".if2-r-box3 ul li").click(function(){
        $(this).siblings().removeClass("current-li");
        $(this).addClass("current-li");

    })
</script>