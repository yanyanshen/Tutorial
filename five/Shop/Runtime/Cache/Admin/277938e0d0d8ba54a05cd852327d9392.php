<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        div.pagin{background-color: red;}
        div.pagin div{float: right}
        div.pagin span{text-align:center;line-height: 30px; display: inline-block;width: 30px;height: 30px; background-color:orange;}
        div.pagin a{text-align:center;line-height: 30px;display: inline-block;width: 30px;height: 30px; background-color:gray;}
    </style>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">


    <div id="usual1" class="usual">



        <div id="tab2" class="tabson">


            <ul class="seachform">
                <li style="font-size:18px;color:#3994C7;font-weight:bolder">投票记录总信息表</li>
               <!-- <li><label>综合查询</label><input name="" type="text" class="scinput" /></li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>-->
                <li style="border-radius:5px;float: right;height:34px;width:80px;background-color:#3994C7;text-align:center;line-height:34px;">
                    <a style="color:white;font-size:16px;" href="<?php echo U('Vote/showlist');?>">返回</a>
                </li>

            </ul>


            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>图片</th>
                    <th>商品名</th>
                    <th>投票IP</th>
                    <th>是否拉黑</th>
                    <th>投票时间</th>
                    <th>投票次数</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($voteList)): $k = 0; $__LIST__ = $voteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vote): $mod = ($k % 2 );++$k;?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><img width="50" height="50" src="/Public/Admin/Uploads/goods/<?php echo ($vote['pic']); ?>"></td>
                    <td><?php echo ($vote['goodsname']); ?></td>
                    <td><?php echo ($vote['ip']); ?></td>
                    <?php if($vote['black'] > 0): ?><td>已拉黑</td>
                        <?php else: ?>
                        <td>未拉黑</td><?php endif; ?>
                    <td><?php echo date("Y-m-d H:i:s",$vote['votetime']);?></td>
                    <td><?php echo ($vote['votenum']); ?></td>
                    <td>
                        <?php if($vote['black'] > 0): ?><a href="javascript:removeBlack(<?php echo ($vote['id']); ?>)" class="tablelink">移出黑名单</a>
                            <?php else: ?>
                            <a href="javascript:addBlack(<?php echo ($vote['id']); ?>)" class="tablelink">加入黑名单</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <div class="pagin">
                <div><?php echo ($page); ?></div>
            </div>


        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>

<script type="text/javascript">
    //加入黑名单
    function addBlack(id){
            $.get("<?php echo U('Vote/addBlack');?>",{id:id},function(res){
                if(res.status=="ok"){
                    layer.msg("拉黑成功",{icon:1,time:2000},function(){
                        window.location.reload();
                    })
                }else{
                    layer.msg("拉黑失败",{icon:2,time:2000})
                }
            })

    }
    //移出黑名单
    function removeBlack(id){
        $.get("<?php echo U('Vote/removeBlack');?>",{id:id},function(res){
            if(res.status=="ok"){
                layer.msg("移出成功",{icon:1,time:2000},function(){
                    window.location.reload();
                })
            }else{
                layer.msg("移出失败",{icon:2,time:2000})
            }
        })

    }
</script>



</div>


</body>

</html>