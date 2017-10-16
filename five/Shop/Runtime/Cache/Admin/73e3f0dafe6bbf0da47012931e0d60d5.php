<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/kindeditor/kindeditor-all-min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

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
        textarea{width:300px;height:100px;border:1px solid #c8c8c8;font-family: "微软雅黑", "Microsoft Yahei", Arial, Helvetica, sans-serif, "宋体";font-size: 16px;}
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
        <div id="tab1" class="tabson">
                <ul class="forminfo">
                    <?php if(is_array($goods)): $k = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><li><label>商品名称<b>*</b></label><input  type="text" class="dfinput" value="<?php echo ($val['goodsname']); ?>"  style="width:345px;cursor: pointer" disabled/></li>
                        <li><label>市场价格<b>*</b></label><input type="text" class="dfinput" value="<?php echo ($val["marketprice"]); ?>"  style="width:345px;cursor: pointer" disabled/> </li>
                        <li><label>商品价格<b>*</b></label><input type="text" class="dfinput" value="<?php echo ($val["price"]); ?>"  style="width:345px;cursor: pointer" disabled/><span></span></li>
                        <li><label>商品数量<b>*</b></label><input type="text" class="dfinput" value="<?php echo ($val["num"]); ?>"  style="width:345px;cursor: pointer" disabled/><span></span></li>
                        <li><label>商品主图<b>*</b></label>
                            <img src="/Public/Admin/Uploads/goods/<?php echo ($val["pic"]); ?>" width="150px" height="150px" alt=""/>
                        </li>
                        <li><label>商品介绍<b>*</b></label>
                            <textarea disabled name="introduction" style=""><?php echo ($val["introduction"]); ?></textarea>
                        </li>
                        <li><label>商品参数<b>*</b></label>
                            <textarea disabled name="parameter"  style=""><?php echo ($val["parameter"]); ?></textarea>
                        </li>
                        <li><label>商品描述<b>*</b></label>
                            <textarea disabled name="description" style=""><?php echo ($val["description"]); ?></textarea>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    <li><label>&nbsp;</label><a href="<?php echo U('Admin/Sale/qianggou');?>"  style="font-size: 18px; color: #FF0000; margin-left: 100px;">返回</a></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>