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
    <script type="text/javascript" src="/Public/Admin/js/timer/WdatePicker.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
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
        .pages a,.pages span{
            display: inline-block;
            width:20px;
            height:20px ;
            border-radius: 2px;
            padding: 5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 20px;
            background: #D4E7F0;
            color:#000000;
            border: 1px solid #c2d2d7;
        }
        .pages a:hover{
            background: #7AC4DD;
            color:#000000;
        }
        .pages span{
            background: #7AC4DD;
            color: #000000;
            font-weight: bold;
        }
        .laydate-icon{
            width: 100px;
            height: 32px;
            border-top:solid 1px #a7b5bc;
            border-left:solid 1px #a7b5bc;
            border-right:solid 1px #ced9df;
            border-bottom:solid 1px #ced9df;
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="">评价管理</a></li>
        <li><a href="">评价列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <form action="<?php echo U('Comment/commentList');?>" method="get">
                    <li><label>商品ID</label><input name="goodsId" value="<?php echo ($goodsId); ?>" type="text" class="scinput" /></li>
                    <li><label>商品名称</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
                    <li><label>用户</label><input name="membername" value="<?php echo ($membername); ?>" type="text" class="scinput" /></li>
                    <li><label>评价级别</label>
                        <div class="vocation">
                            <select class="select3" name="level">
                                <option value="0" <?php echo ($level==0?"selected":""); ?>>全部</option>
                                <option value="1" <?php echo ($level==1?"selected":""); ?>>好评</option>
                                <option value="2" <?php echo ($level==2?"selected":""); ?>>中评</option>
                                <option value="3" <?php echo ($level==3?"selected":""); ?>>差评</option>
                            </select>
                        </div>
                    </li>
                    <li><label>评价时间</label>
                        <input placeholder="请输入日期" class="laydate-icon" name="date1" value="<?php echo ($date1); ?>" onclick="laydate()"> 至
                        <input placeholder="请输入日期" class="laydate-icon" name="date2" value="<?php echo ($date2); ?>" onclick="laydate()">
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </form>
            </ul>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>商品ID</th>
                    <th>商品信息</th>
                    <th>用户</th>
                    <th>评价内容</th>
                    <th>评价级别</th>
                    <th>评价时间</th>
                    <th>回复人</th>
                    <th>回复内容</th>
                    <th>回复时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($i+$firstRow); ?></td>
                        <td><?php echo ($data['gid']); ?></td>
                        <td><img src="/Uploads/goodsPic/100/100_<?php echo ($data["pic"]); ?>" style="width: 69px;height: 69px;float: left"/>    <span style="line-height: 69px;float: left"><?php echo ($data['goodsname']); ?></span></td>
                        <td><?php echo ($data['membername']); ?></td>
                        <td><?php echo ($data['text1']); ?></td>
                        <td>
                            <?php if(($data['level']) == "1"): ?>好评<?php endif; ?>
                            <?php if(($data['level']) == "2"): ?>中评<?php endif; ?>
                            <?php if(($data['level']) == "3"): ?>差评<?php endif; ?>
                        </td>
                        <td><?php echo (date('Y-m-d H:i:s',$data['addtime1'])); ?></td>
                        <td><?php echo ($data['adminname']?$data['adminname']:'暂无'); ?></td>
                        <td><?php echo ($data['text2']?$data['text2']:'暂无'); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$data['addtime2']?$data['addtime2']:'aaa')); ?></td>
                        <?php if($data['adminname']): ?><td>
                                <a href="<?php echo U('commentDetail');?>?id=<?php echo ($data["id"]); ?>" class="tablelink">详情</a>
                                <a onclick="javascript:delComment(<?php echo ($data['id']); ?>);" class="tablelink" style="cursor: pointer"> 删除</a>
                            </td>
                        <?php else: ?>
                            <td>
                                <a href="<?php echo U('commentDetail');?>?id=<?php echo ($data["id"]); ?>" class="tablelink">回复</a>
                                <a onclick="javascript:delComment(<?php echo ($data['id']); ?>);" class="tablelink" style="cursor: pointer"> 删除</a>
                            </td><?php endif; ?>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <div class="pagin">
                <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/5+1); ?>&nbsp;</i>页</div>
                <ul class="paginList">
                    <li class="pages"><?php echo ($show); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){

            delComment=function(id){
                var str = "你是否要删除该条评论信息以及下面的回复内容？";
                layer.confirm(str,{icon:7,title:'提示',btn:['确认删除','取消']},
                    function(){
                        $.post("<?php echo U('delComment');?>",{id:id},function(res){
                            if(res.status==1){
                                layer.msg(res.info,{time:1500,icon:1},function(){
                                    location=window.location.href;
                                });
                            }else{
                                layer.msg(res.info,{time:1500,icon:2});
                            }
                        })
                    }
                )
            }

            $("#usual1 ul").idTabs();
            $('.tablelist tbody tr:odd').addClass('odd');
        })
    </script>
</div>
</body>
</html>