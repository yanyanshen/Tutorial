<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/timer/WdatePicker.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jqurey.form.js"></script>
    <style type="text/css">
        #page a,#page span{
            display: inline-block;width: 18px;height: 18px;padding: 5px;margin: 2px;text-decoration: none;background: #f0ead8;
            color: #009900;border: 1px solid #c9e2b3;
        }
        #page a:hover{
            background: #333;
            color: #fff;

        }
        #page span {
            background: #333;
            color: #fff;
            font-weight: bold;
        }
    </style>
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


            <!--<ul class="seachform">
                <form action="Admin/Sale/qianggou" method="post">
                    <li><label>抢购开始时间</label>
                        <input class="Wdate" value="<?php echo ($scwords); ?>" name="starttime" type="text" onfocus="WdatePicker({isShowClear:false,readOnly:true})"     style="height:30px;" />
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </form>
            </ul>-->


            <table class="tablelist">
                <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品标题</th>
                    <th>商品图片</th>
                    <th>抢购开始</th>
                    <th>抢购结束</th>
                    <th>投票操作</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($val["gid"]); ?></td>
                        <td><?php echo ($val["goodsname"]); ?></td>
                        <td><img src="/Public/Admin/Uploads/goods/<?php echo ($val["pic"]); ?>" alt="" height="100px" width="100px"/></td>
                        <td>
                            <?php if($val['starttime'] == 0): ?>未设置
                                <?php else: echo date('Y-m-d H:i:m',$val['starttime']); endif; ?>
                        </td>
                        <td>
                            <?php if($val['endtime'] == 0): ?>未设置
                                <?php else: echo date('Y-m-d H:i:m',$val['endtime']); endif; ?>

                        </td>
                        <td>
                            <?php if($val['addvote'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>)">加入</a>
                                <?php else: ?>
                                <a href="javascript:disabled(<?php echo ($val['id']); ?>)">禁用</a><?php endif; ?>
                           </td>
                        <td>
                            <a href="<?php echo U('Admin/Sale/addlist',array('gid'=>$val['gid']));?>" class="tablelink">查看</a>
                            <a href="<?php echo U('Admin/Sale/edictlist',array('id'=>$val['id'],'gid'=>$val['gid']));?>" class="tablelink">设置</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <!--<div class="pagin">
                <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
                <ul class="paginList">
                    <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
                    <li class="paginItem"><a href="javascript:;">1</a></li>
                    <li class="paginItem current"><a href="javascript:;">2</a></li>
                    <li class="paginItem"><a href="javascript:;">3</a></li>
                    <li class="paginItem"><a href="javascript:;">4</a></li>
                    <li class="paginItem"><a href="javascript:;">5</a></li>
                    <li class="paginItem more"><a href="javascript:;">...</a></li>
                    <li class="paginItem"><a href="javascript:;">10</a></li>
                    <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
                </ul>
            </div>-->


            <div id="page" style="margin-top: 20px; float: right"><?php echo ($page); ?></div>
        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>



    <!--查看-->
    <script type="text/javascript">

    </script>




</div>


</body>

</html>
<script type="text/javascript">
    //禁用
    function disabled(id){
        layer.confirm("你确定要禁用投票吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Sale/disabled');?>","id="+id,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Sale/qianggou');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
    //启用
    function enabled(bid){
        layer.confirm("你确定要加入投票吗？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Sale/enabled');?>","id="+bid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Sale/qianggou');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
</script>