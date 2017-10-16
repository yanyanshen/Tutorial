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
        <style type="text/css">
            .page a{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;}
            .page span.current{display: inline-block;width:18px;height:18px;padding:5px;margin:2px;
                border:1px solid #238ac5;text-align: center;background:#3d96c9;}
            .page a:hover{background:#999999;color:#1a1a1a;}
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
                    <form action="<?php echo u('Category/selList','Admin');?>" method="post">
                    <ul class="seachform">
                        <li><label>商品查询</label><input name="catename" type="text" class="scinput" /></li>
                        <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                    </ul>
                    </form>
                    <table class="tablelist">
                        <thead>
                            <tr>
                            <tr>
                                <th><input name="" type="checkbox" value="" checked="checked"/></th>
                                <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                                <th>分类名称</th>
                                <th>CID</th>
                                <th>PID</th>
                                <th>上级分类</th>
                                <th>是否过期</th>
                                <th>操作</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($catelist)): $k = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                                <td><input name="" type="checkbox" value="" /></td>
                                <td><?php echo ($k+$firstRow); ?></td>
                                <td><?php echo ($value["catename"]); ?></td>
                                <td><?php echo ($value["cid"]); ?></td>
                                <td><?php echo ($value["pid"]); ?></td>
                                <td><?php echo ($value["path"]); ?></td>
                                <td><?php echo ($value['issale']?'过期':'可用'); ?></td>
                                <td><a href="#" class="tablelink">查看</a>
                                    <a href="#" class="tablelink"> 删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                       <div class="pagin">
                            <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($num); ?>&nbsp;</i>页</div>
                            <div class="paginList">
                                <div class="page">
                                <?php echo ($page); ?>
                                </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</html>