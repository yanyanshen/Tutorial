<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
        <script type="text/javascript" src="/Public/layer-v2.4/layer.js"></script>
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
                    <!--<ul class="seachform">-->
                        <!--<li><label>综合查询</label><input name="" type="text" class="scinput"/></li>-->
                        <!--<li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>-->
                        <!--<ul class="toolbar1">-->
                            <!--<li class="click"><a href=""><span><img src="/Public/Admin/images/t01.png"/></span>添加</a></li>-->
                            <!--<li><a href=""><span><img src="/Public/Admin/images/t03.png" /></span>删除</a></li>-->
                        <!--</ul>-->
                    <!--</ul>-->
                    <table class="tablelist">
                        <thead>
                        <tr>
                            <th><input name="" type="checkbox" value=""  /></th>
                            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                            <th>链接图片</th>
                            <th>链接标题</th>
                            <th>链接地址</th>
                            <th>手机号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                                <td><input name="" type="checkbox" value="<?php echo ($value["id"]); ?>" id="del" /></td>
                                <td><?php echo ($k+$num); ?></td>
                                <td><img src="./../../../<?php echo ($value["imgsrc"]); ?>" alt="">  </td>
                                <td><?php echo ($value["title"]); ?></td>
                                <td><?php echo ($value["link"]); ?></td>
                                <td><?php echo ($value["phone"]); ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="tablelink">删除</a>
                                </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagin">
                        <!--<div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($num); ?>&nbsp;</i>页</div>-->
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


    <script>

        $("input").eq(0).change(function(){

         var a=$(this).attr("checked");
            if(a=='checked'){
                for (var i=1;i<$("input").length;i++){
                    $("input").eq(i).attr("checked","checked");
                }
            }else{

                for (var i=1;i<$("input").length;i++){
                    $("input").eq(i).attr("checked",false);
                }

            }

        });
    </script>

    <script>

        $('a').click(function(){
                    var num=  $('td input');
                    var count=num.length;
                    var del=[];
            for (var i=0;i<count;i++){
                 var checked = num.eq(i).attr('checked');
                var id=num.eq(i).attr('value');
                if (checked=='checked'){
                    del[i]=id;
                }
            }
             del = $.grep(del,function(value){
                return value >0;//筛选出空数组
            });
             if(del.length==0){
                 layer.alert("请选择删除的链接")
             }else{
                 layer.alert("确定删除这"+(del.length)+"组信息", function(index){
                     $.post("<?php echo U('Link/del');?>",{del},function(rel){
                         if(rel=="true"){
                             layer.alert('删除成功', function(index){
                                 window.location.reload()
                             });
                         }else{
                             layer.alert("删除失败，请重试")
                         }
                     })
                 });
            }

        })




    </script>



</html>