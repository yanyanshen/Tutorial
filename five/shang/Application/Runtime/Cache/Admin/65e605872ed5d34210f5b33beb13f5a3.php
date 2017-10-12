<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="editor/kindeditor.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

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
    <style>
        #page a{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background: #3D96C9;
            color:#fff;
        }
        #page a:hover{
            background: #ff2832;
            color:#000;
        }
        #page span.current{
            display: inline-block;
            width: 18px;
            height:18px;
            padding:5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            border: 1px solid #c2ccd1;
            background:red;
            color:#fff;
            font-weight: bold;
        }
        #page span.rows{
            float:left;
            margin-right:50px;
            margin-top:5px;
            font-size: 20px;
        }
        #page span.rows b{
            font-size: 20px;
            color:red;
        }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">会员管理</a></li>
        <li><a href="#">会员列表</a></li>
    </ul>
</div>

<div class="formbody">


    <div id="usual1" class="usual">



        <div id="tab2" class="tabson">
            <form action="" method="get">
                <ul class="seachform">
                    <li><label>会员查询</label><input name="key" type="text" class="scinput" value="<?php echo ($username); ?>"/></li>
                    <li><label>会员等级<b> </b></label>
                        <div class="vocation" >
                            <select  class="select2" name="level">
                                <option value="<?php echo ($level); ?>">
                                    <?php switch($level): case "5": ?>&nbsp;钻石会员&nbsp;<?php break;?>
                                        <?php case "4": ?>&nbsp;金牌会员&nbsp;<?php break;?>
                                        <?php case "3": ?>&nbsp;银牌会员&nbsp;<?php break;?>
                                        <?php case "2": ?>&nbsp;铜牌会员&nbsp;<?php break;?>
                                        <?php case "1": ?>&nbsp;注册会员&nbsp;<?php break;?>
                                        <?php case "0": ?>&nbsp;禁用&nbsp;<?php break;?>
                                        <?php default: ?>全部<?php endswitch;?>
                                </option>
                                <option value="" >&nbsp;全部&nbsp;</option>
                                <option value="5" >&nbsp;钻石会员&nbsp;</option>
                                <option value="4" >&nbsp;金牌会员&nbsp;</option>
                                <option value="3" >&nbsp;银牌会员&nbsp;</option>
                                <option value="2" >&nbsp;铜牌会员&nbsp;</option>
                                <option value="1">&nbsp;注册会员&nbsp;</option>
                                <option value="0" >&nbsp;禁用&nbsp;</option>
                            </select>
                        </div>

                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>等级</th>
                    <th>消费额度</th>
                    <th>电话</th>
                    <th>地址 </th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><?php echo ($val["username"]); ?></td>
                        <td><?php echo ($val["nickname"]); ?></td>
                        <td><?php echo ($val["email"]); ?></td>
                        <td>
                            <?php switch($val["level"]): case "5": ?>&nbsp;钻石会员&nbsp;<?php break;?>
                                <?php case "4": ?>&nbsp;金牌会员&nbsp;<?php break;?>
                                <?php case "3": ?>&nbsp;银牌会员&nbsp;<?php break;?>
                                <?php case "2": ?>&nbsp;铜牌会员&nbsp;<?php break;?>
                                <?php case "1": ?>&nbsp;注册会员&nbsp;<?php break;?>
                                <?php case "0": ?>&nbsp;禁用&nbsp;<?php break;?>
                                <?php default: ?>非法<?php endswitch;?>
                        </td>
                        <td><?php echo ($val["expense"]); ?></td>
                        <td><?php echo ($val["tel"]); ?></td>
                        <td><?php echo ($val["address"]); ?></td>
                        <td>
                            <?php if(($val["level"]) > "0"): ?><a href="<?php echo U('Admin/User/off',array('id'=>$val['id']));?> " class="tablelink">禁用</a>
                                <?php else: ?>
                                <a href="javascript:on(<?php echo ($val['id']); ?>)" class="tablelink">解禁</a><?php endif; ?>
                            <a href="<?php echo U('Admin/User/edit',array('id'=>$val['id']));?> " class="tablelink">查看</a>
                            <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<b class="blue"><?php echo ($count); ?> </b>条记录</div>

                <ul class="paginList">
                    <li><div id="page">
                        <?php echo ($page); ?>
                    </div></li>
                </ul>
            </div>



        </div>

    </div>
</div>

<script type="text/javascript">
    $("#usual1 ul").idTabs();
</script>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>

<script>
    function del(id){
        //询问框
        layer.confirm('您确定要删除吗?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Admin/User/del');?> ",{'id':id},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/User/index');?>";
                }else{
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/User/index');?>";
                }
            })
        });
    }
    function on(id){
        //询问框

        $.get("<?php echo U('Admin/User/on');?> ",{'id':id},function(res){
            if(res.status=='ok'){
                layer.alert(res.msg,{
                    yes:function(){
                        location.reload();
                    }
                });
            }else{
                layer.alert(res.msg);
            }
        })

    }

</script>





</body>

</html>