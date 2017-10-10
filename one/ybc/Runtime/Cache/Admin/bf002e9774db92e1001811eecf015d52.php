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
    <style type="text/css">
        .pag a,.pag span{

            display: inline-block;
            width:25px;
            height:25px ;
            padding: 5px;
            margin: 5px;
            text-decoration: none;
            text-align: center;
            line-height: 25px;
            background: #f0ead8;
            color:#000000;
            border-radius: 5px;
            border: 1px solid #c2d2d7;
        }
        .pag a:hover{
            background: #ccc;
            color:#000000;
        }
        .pag span{
            background: #15fffa;
            color: #ccc;
            font-weight: bold;
        }
        .del:hover{
            color:#00a4ac;
        }
    </style>

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
<script type="text/javascript">
    $(function(){
        /********************************上下架操作***************************/
        active=function(id){
            layer.confirm("你确定该操作吗？",{
                btn:['确定','取消'],
                title:"温馨提示"
            },function(){
                $.get("<?php echo U('put');?>",{id:id},function(res){
                    if(res){
                        layer.msg(res,{icon:1,time:1500},function(){
                            location=location.href;
                        })
                    }else{
                        layer.msg('操作失败',{icon:2,time:1500},function(){
                            location=location.href;
                        })
                    }
                })
            })
        };
        
        /********************************删除操作************************************/
        del=function(id){
            layer.confirm('您确定要删除商品吗？',{
                btn:['确定','取消'],
                title:"温馨提示"
            },function(){
                $.get("<?php echo U('del');?>",{id:id},function(res){
                    if(res){
                        layer.msg(res,{icon:1},function(){
                            location=location.href;
                        })
                    }else{
                        layer.msg("删除失败",{icon:2},function(){
                            location=location.href;
                        })
                    }
                })
            })
        }


        //***************导出EXCEL表格操作***********
        $("#export").click(function(){
            layer.confirm("确认导出?",{
                btn:['确认','取消'],
                title:"温馨提示"
            },function(){
                layer.msg("正在导出",{icon:6,time:2000},function(){
                    location="<?php echo U('export');?>";
                })
            })
        })
    })
</script>
</head>
<body>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">广告管理</a></li>
    <li><a href="#">广告商品列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual">
  	<div id="tab2" class="tabson">


        <form action="<?php echo U('index');?>" method="get">
    <ul class="seachform">
    <li><label>商品查询</label><input name="keyword" value="<?php echo ($keyword); ?>" type="text" class="scinput" placeholder="请输入您要查询的关键字" style="width: 200px;" /></li>
    <li><label>查询类别</label>
    <div class="vocation">
    <select class="select3" name="way" style="width: 150px">
    <?php switch($way): case "adgoodsname": ?><option value="goodsname" selected>按商品名字</option>
            <option value="bid">按商品品牌</option><?php break;?>
        <?php case "bid": ?><option value="goodsname">按商品名字</option>
            <option value="bid" selected>按商品品牌</option><?php break;?>
        <?php default: ?>
        <option value="goodsname">按商品名字</option>
        <option value="bid">按商品品牌</option><?php endswitch;?>
    </select>
    </div>
    </li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    <li><label>&nbsp;</label><input name="" type="button" class="scbtn" id="export" value="导出广告商品表" style="width: 120px;"/></li>
    </ul>

        </form>

        <div class="ybfy">

    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>商品图片</th>
        <th>广告商品名称</th>
        <th>商品分类</th>
        <th>广告分类</th>
        <th>品牌</th>
        <th>市场价格</th>
        <th>网站价格</th>
        <th>库存数量</th>
        <th>规格</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>

        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><img src="/Uploads/goodsPic/100/100_<?php echo ($val["pic"]); ?>" alt=""/></td>
        <td><?php echo ($val["goodsname"]); ?></td>
        <td><?php echo ($val["category"]); ?></td>
        <td><?php echo ($val["adcate"]); ?></td>
        <td><?php echo ($val["brandname"]); ?></td>
        <td>￥<?php echo ($val["oldprice"]); ?></td>
        <td>￥<?php echo ($val["price"]); ?></td>
        <td><?php echo ($val["num"]); ?></td>
        <td><?php echo ($val["weight"]); ?>(克或者个)</td>
        <td><?php echo ($val['active']==1?'上架':'下架'); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$val["addtime"])); ?></td>
        <td><a href="<?php echo U('edit');?>?id=<?php echo ($val["id"]); ?>" class="tablelink">编辑</a>
            <a onclick="javascript:active(<?php echo ($val['id']); ?>);" class="tablelink" style="cursor: pointer;"><?php echo ($val['active']==1?'下架':'上架'); ?></a>
            <a onclick="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="cursor: pointer;">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <?php if(empty($list)): ?><tr align="center">
                <td colspan="13">没有查询到相关商品...</td>
            </tr><?php endif; ?>

        </tbody>
    </table>
    
       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/4+1); ?>&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="pag">
            <?php echo ($page); ?>
        </li>
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

        function search(id){
            var keyword=$("input[name='keyword']").val();
            var way=$("select[name='way']").val();

            var id = id ? id : 1;
            $.get("<?php echo U('index');?>",{"p":id,"keyword":keyword,"way":way},function(res){
                $(".ybfy").html(res);
            })
        }

	</script>
    </div>






</body>

</html>