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
    <script type="text/javascript" src="/Public/Admin/js/jqurey.form.js"></script>
  
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
    <style type="text/css">
        .search_style{left:10px;height: 30px;margin-bottom: 10px;  border:1px solid #ddd; padding:30px 20px; position:relative; margin-top:20px; }
        .search_style .title_names{ position:absolute; top:-20px; font-size:18px; background-color:#ffffff; padding:5px 20px; left:10px;}
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
        .td-manage a{
            cursor: pointer;
        }
        #page{float: right}

    </style>
</head>
<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">广告管理</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div id="usual1" class="usual">
            <div id="tab2" class="tabson">
                <ul class="seachform">
                    <form action="<?php echo U('Ads/showlist');?>" method="post" name="form1">
                        <li><label>广告查询</label><input name="adname" type="text" class="scinput" value="<?php echo ($scwords?$scwords:''); ?>"  /></li>
                        <li><label>位置</label>
                            <div class="vocation">
                                <select class="select3" name="adposition">
                                        <option id="0" value="0" >首页轮播</option>
                                        <option id="1" value="1" >一楼</option>
                                        <option id="2" value="2" >二楼</option>
                                        <option id="3" value="3">三楼</option>
                                        <option id="4" value="4">四楼</option>
                                        <option id="5" value="5">活动</option>
                                        <option id="6" value="6">兑换</option>
                                        <option id="7" value="7">其他</option>
                                </select>
                            </div>
                        </li>
                        <li><label>&nbsp;</label><input name="scbtn" type="submit" class="scbtn" value="查询"/></li>
                    </form>
                </ul>
                <table class="tablelist">
                    <thead>
                <tr>
                    <!--<th><input name="" type="checkbox" value="" checked="checked"/></th>-->
                    <th>编号</th>
                    <th>广告标题</th>
                    <th>广告图片</th>
                    <th>广告位置</th>
                    <th>置顶</th>
                    <th>操作</th>
                </tr>
                </thead>
                    <tbody>
                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <!--<td><input name="" type="checkbox" value="" /></td>-->
                        <td><?php echo ($val["id"]); ?></td>
                        <td><?php echo ($val["adname"]); ?></td>
                        <td><img src="/Public/Admin/Uploads/ads/<?php echo ($val["adlogo"]); ?>"  width="150"/></td>

                        <td>
                            <?php switch($val["adposition"]): case "0": ?>首页轮播<?php break;?>
                                <?php case "1": ?>一楼<?php break;?>
                                <?php case "2": ?>二楼<?php break;?>
                                <?php case "3": ?>三楼<?php break;?>
                                <?php case "4": ?>四楼<?php break;?>
                                <?php case "5": ?>活动<?php break;?>
                                <?php default: ?>其它<?php endswitch;?>
                        </td>

                        <td>
                            <?php if($val['top'] == 0): ?><span>隐藏</span>
                                <?php else: ?>
                                <span>展示</span><?php endif; ?>
                        </td>
                        <td><a href="<?php echo U('Admin/Ads/edictlist',array('id'=>$val['id']));?>">编辑</a>
                            <?php if($val['top'] == 0): ?><a  href="javascript:enabled(<?php echo ($val['id']); ?>)">展示</a>
                                <?php else: ?>
                                <a  href="javascript:disabled(<?php echo ($val['id']); ?>)">隐藏</a><?php endif; ?>
                            <a id="opt" href="javascript:del(<?php echo ($val['id']); ?>)">删除</a>
                            <?php if($val['top'] == 0): else: ?>
                                <a  href="javascript:zhiding(<?php echo ($val['id']); ?>)">置顶</a><?php endif; ?>

                        </td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </tbody>
                </table>

            </div>
            <div id="page" style="margin-top: 20px;"><?php echo ($page); ?></div>
        </div>

        <script type="text/javascript">
          $("#usual1 ul").idTabs();
        </script>

        <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
        </script>

        <script type="text/javascript">
            //禁用品牌
            function disabled(aid){
                layer.confirm("你确定要隐藏我吗？",{
                    icon:3,
                    title:'提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('Ads/disabled');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:1000},function(){
                                window.location.href="<?php echo U('Ads/showlist');?>";
                            });
                        }else{
                            layer.msg(res.msg,{icon:2,time:1000});
                        }

                    },'json')
                })
            }
            //启用品牌
            function enabled(aid){
                layer.confirm("你确定要展示我吗？",{
                    icon:3,
                    title:'提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('Ads/enabled');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:1000},function(){
                                window.location.href="<?php echo U('Ads/showlist');?>";
                            });
                        }else{
                            layer.msg(res.msg,{icon:2,time:1000});
                        }

                    },'json')
                })
            }
            function zhiding(aid){
                layer.confirm("你确定要置顶我吗？",{
                    icon:3,
                    title:'提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('Ads/zhiding');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:1000},function(){
                                window.location.href="<?php echo U('Ads/showlist');?>";
                            });
                        }else{
                            layer.msg(res.msg,{icon:2,time:1000});
                        }

                    },'json')
                })
            }
        </script>


        <script type="text/javascript">
            function del(aid){
                layer.confirm("你确定要删除吗？",{
                    icon:3,
                    title:'提示',
                    btn:['确定','取消']
                },function(){
                    $.get("<?php echo U('Ads/del');?>","id="+aid,function(res){
                        if(res.status=="ok"){
                            layer.msg(res.msg,{icon:1,time:1000},function(){
                                window.location.href="<?php echo U('Ads/showlist');?>";
                            });
                        }else{
                            layer.msg(res.msg,{icon:2,time:1000});
                        }

                    },'json')
                })
            }

        </script>
    </div>


</body>

</html>