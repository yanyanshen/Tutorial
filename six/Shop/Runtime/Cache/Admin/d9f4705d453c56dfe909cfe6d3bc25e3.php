<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>管理员列表</title>
        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script type="application/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="application/javascript" src="/Public/Admin/js/layer.js"></script>
        <script type="application/javascript" src="/Public/Admin/js/jquery.form.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
        <script>
            $(function(){
                //管理员删除
                $('.del').click(function(){
                    var a=$(this).attr("name");
                    layer.confirm('真的要删除吗?', {icon: 3, title:'管理员删除'}, function(){
                        location.href="<?php echo U('Role/del');?>?id="+a
                    });
                })
            })
        </script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <style type="text/css">
            .num{
                padding-left:10px;
                color: #0000ff;
                font-size: 15px;
                text-decoration: none;
            }
            .prev{
                color: #0000ff;
                text-decoration: none;
            }
            .next{
                color: #0000ff;
                text-decoration: none;
            }
            .first{
                color: #0000ff;
                text-decoration: none;
            }
            .last{
                color: #0000ff;
                text-decoration: none;
            }
            .current{
                padding-left:10px;
                color:#ff0000;
                font-size:16px;
            }
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：管理员管理->管理员列表</span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td style="text-align: center">管理员编号</td>
                        <td style="text-align: center">管理员账号</td>
                        <td style="text-align: center">管理员等级</td>
                        <td style="text-align: center">操作</td>
                    </tr>
                    <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#edf5ff'">
                            <td style="text-align: center"><?php echo ($vo['id']); ?></td>
                            <td style="text-align: center"><?php echo ($vo['username']); ?></td>
                            <td style="text-align: center"><?php echo ($vo['group']); ?></td>
                            <td style="text-align: center">&nbsp;&nbsp;&nbsp;
                                <a style="text-decoration: none" onfocus="this.blur()" href="<?php echo U('Role/update_role');?>?id=<?php echo ($vo['id']); ?>">编辑</a>&nbsp;
                                <a style="text-decoration: none" onfocus="this.blur()" href="#" class="del" name="<?php echo ($vo['id']); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: right;">
                            <div>
                            <?php echo ($pageHtml); ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>