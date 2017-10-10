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
            width:24px;
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
        .pag a:hover{
            background: #7AC4DD;
            color:#000000;
        }
        .pag span{
            background: #7AC4DD;
            color: #000000;
            font-weight: bold;
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
</head>
<script type="text/javascript">
       $(function(){
             active=function(id){
                 $.post("<?php echo U('Brand/edit');?>",{id:id},function(res){
                          layer.msg(res.info,{time:1000,icon:1},function(){
                              location=window.location.href;
                          })
                 })

             }
       })
</script>
<script type="text/javascript">
    $(function(){
        delet=function(id){
             var str="确认删除？"
            layer.confirm(str,{btn:['确认','取消'],title:['提示信息']},function(){
                $.post("<?php echo U('Brand/delete');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg(res.info,{time:1000,icon:1},function(){
                            location=window.location.href;
                        })
                    }else{
                        layer.msg(res.info)
                    }
                })
            },function(){

            })
        }
    })
</script>
<script type="text/javascript">
    $(function(){
        $('#Excel').click(function(){
            $.get("<?php echo U('Brand/excel');?>",'',function(res){
                if(res.status==1){
                    window.open("<?php echo U('Brand/excel');?>?keywords=<?php echo ($keywords); ?>&active=<?php echo ($active); ?>")
                }else{
                    layer.msg(res.info,{icon:2})
                }
            })
        })
    })
</script>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">品牌列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">

    <div id="usual1" class="usual"> 

  	<div id="tab2" class="tabson">

    <ul class="seachform">
        <form action="<?php echo U('Brand/index');?>" method="get">
    <li><label>品牌查询</label><input name="keywords" type="text" value="<?php echo ($keywords); ?>" class="scinput" />*</li>
    
            <li><label style="font-size: 13px">&nbsp;品牌状态查询&nbsp;</label>
            <div class="vocation">
                <select class="select3" name="active">
                    <option  value="2" <?php echo ($active==2?"selected":''); ?>><span style="font-weight: bold">全部</span></option>
                    <option value="0"  <?php echo ($active==0?"selected":''); ?>><span style="font-weight: bold">下架品牌</span></option>
                    <option value="1"   <?php echo ($active==1?"selected":''); ?>  ><span style="font-weight: bold">在线品牌</span></option>
                </select>
            </div>
            </li>
            <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
            <li><label>&nbsp;</label><input  id="Excel" style="width: auto;padding:10px;" name="" type="button" class="scbtn" value="导出品牌列表"/></li>
        </form>
    </ul>
  <div id="ybfy">
      <?php if(empty($list)): ?><span style="font-size: 20px;font-weight: bold;">没有找到相关条件的数据</span>
          <?php else: ?>
      <table class="tablelist">
          <thead>
              <tr>
                  <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                  <th>品牌logo</th>
                  <th>品牌名称</th>
                  <th>添加时间</th>
                  <th>状态</th>
                  <th>操作</th>
              </tr>
              </thead>
          <tbody>
          <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                  <td><?php echo ($k+$firstrow); ?></td>
                  <td><img src="/Uploads/brandsPic/logopic/100_<?php echo ($val['pic']); ?>" alt=""/></td>
                  <td><?php echo ($val['brandname']); ?></td>
                  <td><?php echo (date("Y-m-d H:s:i",$val['addtime'])); ?></td>
                  <td><?php echo ($val['active']==0?'下架':'展示'); ?></td>
                  <td><a  onclick="javascript:active(<?php echo ($val['id']); ?>);" style="cursor: pointer"   class="tablelink"><?php echo ($val['active']==0?'展示':'下架'); ?></a>   |  <a onclick="javascript:delet(<?php echo ($val['id']); ?>)" style="cursor: pointer" class="tablelink">删除</a></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>

          <div class="pagin">
              <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($firstrow/3+1); ?>&nbsp;</i>页</div>
              <ul class="paginList">
                  <li class="pag"><?php echo ($page); ?></li>
              </ul>
          </div><?php endif; ?>

  </div>
    </div>

	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    
    
    
    
    </div>
    <script type="text/javascript">
        function index(id) {
            var id = id ? id : 1;
            $.get("<?php echo U('Brand/index');?>", {"p": id}, function (res) {
                $('#ybfy').html(res);
            })
        }
    </script>


</body>

</html>