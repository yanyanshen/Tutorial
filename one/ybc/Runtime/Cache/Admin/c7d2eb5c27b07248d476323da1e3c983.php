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
    <script type="text/javascript" src="/Public/Admin/js/timer/WdatePicker.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
    <style>
        #page :first-child{ border-left:1px solid #DDD;}
        #page a{ float:left; width:31px;height:28px;border:1px solid #DDD; text-align:center;line-height:30px;border-left:none;color:#3399d5;}
        #page a:Hover{ background:#f5f5f5;}
        #page span{ float: left; width:31px;height:28px;border:1px solid #DDD; text-align:center;line-height:30px;border-left:none;color:#3399d5; background:#f5f5f5; cursor:default;color:#737373;}

        .page{ margin-top: 30px;}
        .page div a{ display: inline-block;font-size:16px;width: 30px; height: 30px; line-height: 30px; text-align: center; border-radius: 3px; border: 1px solid #ccc; margin: 0px 5px; }
        .page div a:hover{ background-color: #ccc;}
        .page div .current{ display: inline-block;font-size:16px;width: 30px; height: 30px; line-height: 30px; text-align: center; border-radius: 3px; border: 1px solid #ccc; margin: 0px 5px; background-color: #ccc;}
        .page div .rows{ display: inline-block;font-size:16px; height: 30px; line-height: 30px; text-align: center;   margin: 0px 5px; }
        .page div .first{ display: inline-block;font-size:16px; width: 60px; height: 30px; line-height: 30px; text-align: center;    }
        .page div .end{ display: inline-block;font-size:16px; width: 60px; height: 30px; line-height: 30px; text-align: center;    }
        .page div .prev{ width: 90px;  }
        .page div .next{  width: 90px;     }
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


            $('#plcz').click(function(){
                $.post('<?php echo U("plcz");?>?<?php echo ($url1?$url1:""); ?>',$("#form2").serialize(),function(res){
                    if(res.status==1){
                        layer.alert(res.info,{icon:1},function(){
                            location=window.location.href;
                        });
                    }else{
                        layer.alert(res.info,{icon:2});
                    }
                },'json')
            })

            dgcz=function(id){
                $.post('<?php echo U("dgcz");?>',{id:id},function(res){
                    if(res.status==1){
                        layer.alert(res.info,{icon:1},function(){
                            location=window.location.href;
                        });
                    }else{
                        layer.alert(res.info,{icon:2});
                    }
                },'json')
            }

            $('#check').click(function(){
                        if($('#check').attr("checked")){
                            $("[id='chk']").attr("checked",true)
                        }else{
                            $("[id='chk']").removeAttr("checked")
                        }
                    }
            )

        })
    </script>

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


            <ul class="seachform">
                <form action="<?php echo U('Admin/Services/index');?>?<?php echo ($url1?$url1:''); ?>" method="post" id="form1">
                    <li><label>用户</label><input name="username" type="text" class="scinput" value="<?php echo ($username); ?>" /></li>
                    <li><label>日期</label>
                        <input placeholder="请输入日期" style="width: 100px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df;" class="laydate-icon scinput" name="date1" value="<?php echo ($date1); ?>" onclick="laydate()"> 至
                        <input placeholder="请输入日期" style="width: 100px; height: 32px; border-top:solid 1px #a7b5bc; border-left:solid 1px #a7b5bc; border-right:solid 1px #ced9df; border-bottom:solid 1px #ced9df;" class="laydate-icon scinput" name="date2" value="<?php echo ($date2); ?>" onclick="laydate()">
                    </li>


                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                </form>

            </ul>



            <table class="tablelist">
                <?php if(empty($list)): else: ?>
                    <thead>
                    <tr>
                        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                        <th>用户名</th>
                        <th>商品图片</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>商品数量</th>
                        <th>申请时间</th>
                        <th>申请类型</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead><?php endif; ?>
                <tbody>
                <form action="<?php echo U('plcz');?>?<?php echo ($url1?$url1:''); ?>" method="post" id="form2">
                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$va): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k+$firstRow); ?></td>
                            <td><?php echo ($va["mname"]); ?></td>
                            <td><img src="/Uploads/goodsPic/100/100_<?php echo ($va["pic"]); ?>" alt="商品图片"/></td>
                            <td><?php echo ($va["goodsname"]); ?></td>
                            <td><?php echo ($va["price"]); ?></td>
                            <td><?php echo ($va["buynum"]); ?></td>
                            <td><?php echo date("Y-m-d H:i:s",$va['applytime']);?></td>
                            <td><?php echo ($va['type']==1?'退货':'换货'); ?></td>
                            <td>
                                <?php if(($va["status"]) == "1"): ?>未处理<?php endif; ?>
                                <?php if(($va["status"]) == "2"): ?>未通过<?php endif; ?>
                                <?php if(($va["status"]) == "3"): ?>已通过<?php endif; ?>
                                <?php if(($va["status"]) == "4"): ?>顾客取消<?php endif; ?>
                            </td>
                            <td><a href="<?php echo U('Admin/Services/detail');?>?id=<?php echo ($va["id"]); ?>" class="tablelink"><?php if(($va["status"]) == "1"): ?>处理<?php else: ?>查看<?php endif; ?></a>
                        </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                </form>
                </tbody>
            </table>
            <?php if(empty($list)): else: ?>

                <div class="page"><?php echo ($page); ?></div><?php endif; ?>

        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>





</div>


</body>

</html>