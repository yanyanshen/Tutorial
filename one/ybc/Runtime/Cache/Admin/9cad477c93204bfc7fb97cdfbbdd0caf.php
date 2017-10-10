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
<script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
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
    /***************上下架操作********/
    active=function(id){
        layer.confirm('你确定要这项操作吗？',{
            btn:['确定','取消'],
            title:'温馨提示'
        },function(){
            $.get("<?php echo U('put');?>",{id:id},function(res){
                if(res){
                    layer.msg(res,{icon:1,time:1500},function(){
                        location=location.href;
                    })
                }else{
                    layer.msg('操作失败',{icon:2,time:1500})
                }
            })
        })
    };

    /********************删除操作*****************/
    del=function(id){
        layer.confirm('你确定要删除吗？',{
            btn:['确定','取消'],
            title:'温馨提示'
        },function(){
            $.get("<?php echo U('del');?>",{id:id},function(res){
                if(res){
                    layer.msg(res,{icon:1,time:1500},function(){
                        location=location.href;
                    })
                }else{
                    layer.msg('删除失败',{icon:2,time:1500})
                }
            })
        })
    }

    //******************导出表格操作************
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
    <li><a href="#">团购管理</a></li>
    <li><a href="#">团购列表</a></li>
    </ul>
    </div>
    <div class="formbody">
    <div id="usual1" class="usual">
  	<div id="tab2" class="tabson">



<!-----------查询开始-------------->
        <form action="<?php echo U('index');?>" method="get">
    <ul class="seachform">
    <li><label>关键字</label><input name="keyword" type="text" class="scinput" placeholder="请填写查询的关键字"  value="<?php echo ($keyword); ?>"/></li>




    <li><label>查询类型</label>
    <div class="vocation">
    <select class="select3" name="way">
    <?php switch($way): case "goodsname": ?><option value="goodsname" selected>商品名称</option>
            <option value="brandname">商品品牌</option><?php break;?>
        <?php case "brandname": ?><option value="goodsname">商品名称</option>
            <option value="brandname" selected>商品品牌</option><?php break;?>
        <?php default: ?>
        <option value="goodsname">商品名称</option>
        <option value="brandname">商品品牌</option><?php endswitch;?>
    </select>
    </div>
    </li>


    <li><label>按时间查询:</label>
         <input placeholder="请选择开始日期" style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor: pointer" class="inline laydate-icon" id="start" name="startime" value="<?php echo ($startime); ?>" > 至
         <input placeholder="请选择结束日期" style="width: 150px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df; cursor:pointer;" class="inline laydate-icon" id="end" name="endtime" value="<?php echo ($endtime); ?>" >

    </li>


    
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    <li><label>&nbsp;</label><input name="" type="button" class="scbtn" id="export" value="导出团购表"/></li>

    </ul>
        </form>

        <div class="ybfy">

    <table class="tablelist">
    	<thead>
    	<tr >
        <th style="text-align: center">编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th style="text-align: center">商品图片</th>
        <th style="text-align: center">商品名称</th>
        <th style="text-align: center">商品品牌</th>
        <th style="text-align: center">团购价格</th>
        <th style="text-align: center">开始时间</th>
        <th style="text-align: center">结束时间</th>
        <th style="text-align: center">现在状态</th>
        <th style="text-align: center">操作</th>
        </tr>
        </thead>
        <tbody>

        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="text-align: center">
        <td><?php echo ($k+$firstRow); ?></td>
        <td><img src="/Uploads/goodsPic/100/100_<?php echo ($val['pic']); ?>" alt="商品图片" title="<?php echo ($val["goodsname"]); ?>"/></td>
        <td><?php echo ($val["goodsname"]); ?></td>
        <td><?php echo ($val["brandname"]); ?></td>
        <td><?php echo ($val["price"]); ?>.00</td>
        <td><?php echo (date('Y-m-d',$val["startime"])); ?></td>
        <td><?php echo (date('Y-m-d',$val["endtime"])); ?></td>
        <td><?php echo ($val['active']==1?'上架':'下架'); ?></td>
        <td><a style="cursor:pointer;" onclick="javascript:active(<?php echo ($val['id']); ?>);" class="tablelink"><?php echo ($val['active']==0?'上架':'下架'); ?></a>
            <a style="cursor:pointer;padding-left: 10px;" onclick="javascript:del(<?php echo ($val['id']); ?>);" class="tablelink">删除</a>
            <a style="padding-left: 10px;" href="<?php echo U('edit');?>?id=<?php echo ($val["id"]); ?>" class="tablelink">编辑</a>
        </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <?php if(empty($list)): ?><tr style="text-align: center">
                <td colspan="9">没有查询到相关数据</td>
            </tr><?php endif; ?>


        </tbody>
    </table>
    
       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstRow/4+1); ?>&nbsp;</i>页</div>
        <ul class="paginList">

        <li class="pag"><?php echo ($page); ?></li>

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
            var startime=$("input[name='startime']").val();
            var endtime=$("input[name='endtime']").val();
            $.get("<?php echo U('index');?>", {"p": id, "keywords": keyword,"way":way,"startime":startime,"endtime":endtime}, function (res) {
                $('.ybfy').html(res);
            })
        }

	</script>
    </div>
</body>

</html>



<script type="text/javascript">

    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };

    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-06-16',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，充值开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
</script>