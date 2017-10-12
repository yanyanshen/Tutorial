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
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
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
            background: deeppink;
            color:#000;
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
        <li><a href="index">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">

        <div id="tab2" class="tabson">
            <form action="" method="get">
            <ul class="seachform">
                <li><label>分类查询</label><input name="key" type="text" class="scinput" /></li>
                <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
            </ul>
                </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>分类名称</th>
                    <th>CID</th>
                    <th>PID</th>
                    <th>商品分类</th>

                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><?php echo ($val["cname"]); ?></td>
                    <td><?php echo ($val["cid"]); ?></td>
                    <td><?php echo ($val["pid"]); ?></td>
                    <td><?php echo ($val["path"]); ?></td>

                    <td>
                        <a href="<?php echo U('Gory/gory_edit',array('cid'=>$val['cid']));?>" class="tablelink">编辑</a>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo U('Gory/gory_del',array('cid'=>$val['cid']));?>" class="tablelink">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <div class="pagin">
                <ul class="pageList">
                    <li><div id="page">
                        <?php echo ($Page); ?>
                    </div></li>
                </ul>
            </div>

            </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>