<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>品牌列表</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/Public/Admin/js/jquery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
        background: #ff2832;
        color:#000;
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
        <li><a href="#">首页</a></li>
        <li><a href="#">品牌管理</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form action="" method="get">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="key" type="text" class="scinput" /></li>
                    <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <!--                    <th><input name="" type="checkbox" value="" checked="checked"/></th>-->
                    <th>品牌编号</th>
                    <th>品牌图</th>
                    <th>品牌名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($brand)): $k = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><img src="/Public/Uploads/brands/<?php echo ($val["logo"]); ?>"></td>
                        <td><?php echo ($val["brand_name"]); ?></td>
                        <td><a href="<?php echo u('edit_brand',array('bid'=>$val['bid']));?>">修改</a>&nbsp;&nbsp;
                           <!-- <a href="<?php echo u('del_brand',array('bid'=>$val['bid']));?>" >删除</a>-->
                        <a href="javascript:del_brand(<?php echo ($val['bid']); ?>)" class="tablelink" >删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>

            <div class="pagin">
                <ul class="pageList">
                    <li><div id="page">
                        <?php echo ($page); ?>
                    </div></li>
                </ul>
            </div>
    </div>
    </div>
</div>
    <script type="text/javascript">
        //$("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
       // $('.tablelist tbody tr:odd').addClass('odd');
    </script>
<script>
    function del_brand(bid){
        //询问框
        layer.confirm('您确定要删除吗?', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.get("<?php echo U('Admin/Brand/del_brand');?>",{'bid':bid},function(res){
                if(res.status=='ok'){
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/Brand/listbrand');?>";
                }else{
                    layer.alert(res.msg);
                    location.href="<?php echo U('Admin/Brand/listbrand');?>";
                }
            });
        })
    }
</script>

</body>
</html>