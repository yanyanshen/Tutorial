<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>广告列表</title>
    <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    <link href="/Public/Admin/css/OrderPage.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Admin/css/OrderPage.css">
    <script>
        $(function(){
            //广告删除单个
            $('.del').click(function(){
                var a=$(this).attr("name");
                layer.confirm('真的要删除吗？', {icon: 3, title:'广告删除'}, function(){
                    layer.msg('删除成功',{icon:1,time:1000},function(){
                        location.href="<?php echo U('Advertising/del');?>?id="+a;
                    });
                });
            })
            //全选广告
            $("#selall").click(function(){
                if($(this).attr("checked")){
                    $('.selall').attr("checked","checked");
                }else{
                    $('.selall').removeAttr("checked");
                }
            });
            //广告批量删除
            $("input[name='submit']").click(function(){
                layer.confirm('真的要删除吗?', {icon: 3, title:'广告批量删除'}, function(){
                $.post("<?php echo U('Advertising/tdel');?>",$("#myform").serialize(),function(res){
                    if(res.status==1){
//                        location.reload();
                        layer.msg('删除成功',{icon:1,time:1000},function(){
                            location.href="<?php echo U('Advertising/advertising');?>";
                        });
                    }
                })
                });
            })
        })
    </script>
    <script>
        //隐藏错误提示框
        $(document).ready(function(){
            $(".hint").hide();
            var $search=$('#q_box');
            $("#query").click(function(){
                if($("#q_box").attr("value")=='') {
                    $('.hint').html("错误提示：搜索框文本不能为空！");
                    $('.hint').fadeIn(1000);
                    $('.hint').fadeOut(1200);
                    $search.focus();
                    return false;
                }
            });
        });
    </script>

    <style>
        .button {
            background-color: #3b95c8;
            display: inline-block;
            outline: none;
            cursor: pointer;
            color:#fff;
            border: 0px;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 1.5em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.5);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .3em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);
        }
        .button:hover {
            text-decoration: none;
        }
        .button:active {
            position: relative;
            top: 1px;
        }
    </style>
</head>
<body>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：广告管理->广告列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                </span>
            </span>
</div>
<div></div>
<div>
            <span>
                <form action="<?php echo U('Advertising/advertising');?>" method="get">
                    <table>
                        <tr>
                            <th width="64" style="float: left;margin-top: -2px;line-height: 25px">广告名称:</th>
                            <td><input style="float: left;margin-top: -4px;border-radius: 1px;height: 23px" placeholder="关键字" name="search"  value="" id="q_box" type="text" /></td>
                            <td><input style=" float: left;margin-top: -4px;cursor: pointer;" value="查询" type="submit" id="query" class="button"/></td>
                            <td><div class="hint" style="color: red;"></div></td>
                        </tr>
                    </table>
                </form>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
    <form method="post" name="myform" id="myform" class="adlist" action="/index.php/Admin/Advertising/tdel">
    <table class="table_a" border="1" width="100%">
        <tbody>
        <tr style="font-weight: bold;">
            <th style="width: 65px;">
                <input type="checkbox" name="" id="selall" value=""/>
            </th>
            <th>序号</th>
            <th>广告名称</th>
            <th>广告位售价</th>
            <th>位置</th>
            <th>广告压缩图</th>
            <th>链接</th>
            <th>状态</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#edf5ff'">
                <!--不知是否多一个value-->
                <th><input type="checkbox" name="tdel[]" class="selall" value="<?php echo ($vo['id']); ?>" /></th>
                <th><?php echo ($vo['id']); ?></th>
                <th><?php echo ($vo['name']); ?></th>
                <th><?php echo ($vo['sale']); ?></th>
                <th><?php echo ($vo['place']); ?></th>
                <?php if($vo['image'] != ''): ?><th><img src="/uploads/AdImgs/<?php echo ($vo['image']); ?>" width="150" height="80" /></th>
                    <?php else: ?>
                    <th>抱歉，该广告没有上传图片</th><?php endif; ?>
                <th><?php echo ($vo['url']); ?></th>
                <?php if($vo['status'] == '禁用'): ?><th>禁用</th>
                    <?php else: ?>
                    <th>可用</th><?php endif; ?>
                <th><?php echo (date('Y-m-d H:i:s',$vo['createtime'])); ?></th>
                <th>
                    <a title="编辑" href="/index.php/Admin/Advertising/edit/id/<?php echo ($vo['id']); ?>" style="text-decoration: none">编辑</a>
                    <a style="text-decoration: none" onfocus="this.blur()" class="del" href="#" name="<?php echo ($vo['id']); ?>" >删除</a>
                </th>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--批量删除-->
        <tr style="border: none">
            <td colspan="20" style="text-align: center;">
                <input style="cursor: pointer;float: left;margin-top: 8px;margin-left: -4px;" name="submit" type="button" value="确定删除" class="button" />
                    <?php echo ($pageHtml); ?>
            </td>
        </tr>
        </tbody>
    </table>
  </form>
</div>
</body>
</html>