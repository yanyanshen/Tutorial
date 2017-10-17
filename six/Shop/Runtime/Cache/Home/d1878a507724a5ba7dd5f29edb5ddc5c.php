<?php if (!defined('THINK_PATH')) exit();?><div class="comment detail_div mt10"><div class="comment_summary"><div class="rate fl"><strong><em><?php echo ($good[3]); ?></em>%</strong><br /><span>好评度</span>
</div><div class='percent fl'><dl><dt>好评（<?php echo ($good[3]); ?>%)</dt><dd><div style='width:0px;'></div></dd></dl><dl><dt>中评（<?php echo ($good[2]); ?>%）</dt><dd><div style='width:0px;'></div></dd></dl>
    <dl><dt>差评（<?php echo ($good[1]); ?>%）</dt><dd><div style='width:0px;' ></div></dd></dl></div><div class='buyer fl'><dl><dt>评论查询：</dt>
    <dd><span><label for="v0">全部</label></span><?php if($good[4]==0): ?><input type="radio" class="level" name="level" value="0" id="v0" checked><?php else: ?><input type="radio" name="level" value="0" id="v0" ><?php endif; ?></dd>
    <dd><span><label for="v3">好评</label></span><?php if($good[4]==3): ?><input type="radio" class="level" name="level" value="3" id="v3" checked><?php else: ?><input type="radio" name="level" value="3" id="v3" ><?php endif; ?></dd>
    <dd><span><label for="v2">中评</label></span><?php if($good[4]==2): ?><input type="radio" class="level" name="level" value="2" id="v2" checked><?php else: ?><input type="radio" name="level" value="2" id="v2" ><?php endif; ?></dd>
    <dd><span><label for="v1">差评</label></span><?php if($good[4]==1): ?><input type="radio" class="level" name="level" value="1" id="v1" checked><?php else: ?><input type="radio" name="level" value="1" id="v1" ><?php endif; ?></dd>
    </dl></div></div></div>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class='comment_items mt10'><div class='user_pic'><dl><dt><a href=''><img src="/uploads/avatar/<?php echo ($val["images"]); ?>" alt='' width="60" height="60"/></a></dt><dd><a href='javascript:;'><?php echo ($val["username"]); ?></a></dd> </dl> </div>
            <div class='item'><div class='title'><span><?php echo date("Y-m-d H:i",$val["pjtime"]);?></span><strong class='star star<?php echo ($val["level"]); ?>'></strong> <!-- star5表示5星级 start4表示4星级，以此类推 --> </div>
                <div class='comment_content'><dl><dt>评价：</dt><dd><?php echo ($val["pingjia"]); ?></dd>
                    <?php if($val['return'] == 0): else: ?><dt>回复：</dt><dd style="color:darkorange"><?php echo ($val["return"]); ?></dd><?php endif; ?></dl>
                    <dl><dt>购买日期：</dt><dd><?php echo date("Y-m-d",$val["createtime"]);?></dd></dl></div>
                <div class='btns'><a href='javascript:;' class='useful' name="<?php echo ($val['id']); ?>">有用(<?php echo ($val["userful"]); ?>)</a></div></div><div class='cornor'></div></div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    <div class='page mt20'><?php echo ($page); ?></div>
<script src="/Shop/Public/Home/js/jquery.min.1.8.2.js"></script>
<script src="/Shop/Public/Home/js/layer.js"></script>
<script>
    $(function(){
        $(".percent").children().eq(0).children("dd").children("div").css("width",<?php echo ($good[3]); ?>+"px");
        $(".percent").children().eq(1).children("dd").children("div").css("width",<?php echo ($good[2]); ?>+"px");
        $(".percent").children().eq(2).children("dd").children("div").css("width",<?php echo ($good[1]); ?>+"px");

        $("input[name='level']").change(function(){
            var id=<?php echo ($goods["id"]); ?>;
            var level=0;
            $("input[name='level']").each(function(){
                if($(this).attr("checked")){
                    level=$(this).val();
                }
            })
            $.post("<?php echo U('Goods/goodsDetail');?>",{'id':id,'level':level},function(res){
                $("#shangpsx").html(res);
            })
        })


    })
</script>
<script>
    $(function(){

        $(".useful").click(function(){

         if(<?php echo ((isset($_SESSION['uid']) && ($_SESSION['uid'] !== ""))?($_SESSION['uid']):"false"); ?>){
                var pid=$(this).attr("name")
                 id=<?php echo ((isset($_SESSION['uid']) && ($_SESSION['uid'] !== ""))?($_SESSION['uid']):"0"); ?>;
                $.post("<?php echo U('Goods/useful');?>",{"pid":pid,"uid":id},function(res){
                    if(res.status!=0){
                        layer.msg("评论成功，感谢您的支持")
                    }else{
                        layer.msg("评论失败,您已经评价过了")
                    }
                })

            }else{

                layer.msg("请您先登录");


           }

        })
    })

    function search(id){
        var level=0;
        $("input[name='level']").each(function(){
            if($(this).attr("checked")){
                level=$(this).val();
            }
        })

        var id=id?id:1;
        $.post("<?php echo U('Goods/goodsDetail');?>",{"p":id,"level":level},function(res){
            $('#shangpsx').html(res);
        })
    }
</script>