<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员登记表</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script src="/Public/Admin/js/echarts.min.js"></script>
    <style>
        .lev{
            margin: 20px 150px;
            width: 160px;
            cursor: pointer;
        }
        .lev img{
            height:84px ;
            width: 100px;

        }
        .lev span{
            width: 100px;
            text-align: center;

        }
        .active{
            margin: 0 auto;
            background-color: rgba(10,214,245,0.3);
            padding:1px;
            border-radius: 155px;
        }
        .catepage{
            float: right;
            margin-top:30px ;
        }
        .catepage a{
            border-radius: 50px;
            margin: 2px;
            width: 25px;
            height: 25px;
            line-height: 25px;
            border: 1px solid #ccc;
            display: inline-block;
            text-align: center;
            background-color:#3C95C8 ;
            padding: 5px;
            font-weight: bolder;

        }
        .catepage a:hover{
            background-color: white;
            color: #00aaee;
            font-weight: bolder;
        }
        .current{
            border-radius: 50px;
            width: 25px;
            height: 25px;
            border: 1px solid #ccc;
            line-height: 23px;
            display: inline-block;
            padding: 5px;
            text-align: center;
        }
        .tablelist tr th{
            text-align: center;
        }

    </style>
    <script>
    $(function(){
    $('.sit ul').click(function(){
    var i=$(this).index();
    $('.sit ul').removeClass('active').eq(i).addClass('active');
    $('.change table').hide().eq(i).show();

    })
    })
    </script>

</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">会员等级</a></li>
    </ul>
</div>
<div style="width: 1250px">
<div class="sit" style="float: left;width: 400px">
                <ul class="active">
                        <li class="lev"><img src="/Public/Admin/images/y4.jpg" alt="">
                            <span>花费￥0-2999<br>普通会员(<?php echo ($count); ?>)</span></li>
                </ul>
                <ul >
                        <li class="lev"><img  src="/Public/Admin/images/y1.jpg" alt="">
                            <span>花费￥3000-4999<br>青铜会员(<?php echo ($count1); ?>)</span></li>
                </ul>
                <ul>
                        <li class="lev"><img src="/Public/Admin/images/y2.jpg" alt="">
                            <span>花费￥5000-7999<br>白银会员(<?php echo ($count2); ?>)</span></li>
                </ul>
                <ul>
                        <li class="lev"><img src="/Public/Admin/images/y3.jpg" alt="">
                            <span>花费￥8000-9999<br>黄金会员(<?php echo ($count3); ?>)</span></li>
                </ul>
                <ul>
                        <li class="lev"><img src="/Public/Admin/images/y5.jpg" alt="">
                            <span>花费￥10000+<br>钻石会员(<?php echo ($count4); ?>)</span></li>
                </ul>
</div>
<div class="change" style="float: left;width: 600px;height: 722px;background-color: rgba(10,214,245,0.3);">
   <!-- <yi-->
    <table class="tablelist" style="text-align: center">
        <tr>
            <th>编号</th>
            <th>id</th>
            <th>会员名</th>
            <th>等级</th>
            <th>余额</th>
            <th>花费</th>
            <th>积分</th>
            <th>状态控制</th>
        </tr>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="border-bottom: 1px solid whitesmoke">
                <td width="80px"><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["username"]); ?></td>
                <td><?php echo ($val["level_name"]); ?></td>
                <td><?php echo ($val["money"]); ?></td>
                <td><?php echo ($val["costs"]); ?></td>
                <td><?php echo ($val["credit"]); ?></td>
                <td>
                    <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                        <?php else: ?>
                        <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                    <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

  <!--  //er-->
    <table class="tablelist" style="text-align: center;display: none">
        <tr>
            <th>编号</th>
            <th>id</th>
            <th>会员名</th>
            <th>等级</th>
            <th>余额</th>
            <th>花费</th>
            <th>积分</th>
            <th>状态控制</th>
        </tr>
        <?php if(is_array($list1)): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="border-bottom: 1px solid whitesmoke">
                <td width="80px"><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["username"]); ?></td>
                <td><?php echo ($val["level_name"]); ?></td>
                <td><?php echo ($val["money"]); ?></td>
                <td><?php echo ($val["costs"]); ?></td>
                <td><?php echo ($val["credit"]); ?></td>
                <td>
                    <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                        <?php else: ?>
                        <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                    <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </table>
    <!--  //er-->
    <table class="tablelist" style="text-align: center;display: none">
        <tr>
            <th>编号</th>
            <th>id</th>
            <th>会员名</th>
            <th>等级</th>
            <th>余额</th>
            <th>花费</th>
            <th>积分</th>
            <th>状态控制</th>
        </tr>
        <?php if(is_array($list2)): $k = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="border-bottom: 1px solid whitesmoke">
                <td width="80px"><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["username"]); ?></td>
                <td><?php echo ($val["level_name"]); ?></td>
                <td><?php echo ($val["money"]); ?></td>
                <td><?php echo ($val["costs"]); ?></td>
                <td><?php echo ($val["credit"]); ?></td>
                <td>
                    <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                        <?php else: ?>
                        <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                    <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <table class="tablelist" style="text-align: center;display: none">
        <tr>
            <th>编号</th>
            <th>id</th>
            <th>会员名</th>
            <th>等级</th>
            <th>余额</th>
            <th>花费</th>
            <th>积分</th>
            <th>状态控制</th>
        </tr>
        <?php if(is_array($list3)): $k = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="border-bottom: 1px solid whitesmoke">
                <td width="80px"><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["username"]); ?></td>
                <td><?php echo ($val["level_name"]); ?></td>
                <td><?php echo ($val["money"]); ?></td>
                <td><?php echo ($val["costs"]); ?></td>
                <td><?php echo ($val["credit"]); ?></td>
                <td>
                    <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                        <?php else: ?>
                        <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                    <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <table class="tablelist" style="text-align: center;display: none">
        <tr>
            <th>编号</th>
            <th>id</th>
            <th>会员名</th>
            <th>等级</th>
            <th>余额</th>
            <th>花费</th>
            <th>积分</th>
            <th>状态控制</th>
        </tr>
        <?php if(is_array($list4)): $k = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr style="border-bottom: 1px solid whitesmoke">
                <td width="80px"><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["username"]); ?></td>
                <td><?php echo ($val["level_name"]); ?></td>
                <td><?php echo ($val["money"]); ?></td>
                <td><?php echo ($val["costs"]); ?></td>
                <td><?php echo ($val["credit"]); ?></td>
                <td>
                    <?php if($val['active'] == 0): ?><a href="javascript:enabled(<?php echo ($val['id']); ?>);">　启用　</a>
                        <?php else: ?>
                        <a href="javascript:disabled(<?php echo ($val['id']); ?>);">　禁用　</a><?php endif; ?>
                    <a href="javascript:del(<?php echo ($val['id']); ?>)" class="tablelink" style="color: red">　删除　</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

</div>

<div id="main" style="width: 600px;height:600px;float: left"></div>
</div>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    myChart.setOption({
        series : [
            {
                name: '访问来源',
                type: 'pie',
                radius: '55%',
                data:[
                    {value:<?php echo ($count); ?>, name:'普通会员'},
                    {value:<?php echo ($count1); ?>, name:'青铜会员'},
                    {value:<?php echo ($count2); ?>, name:'白银会员'},
                    {value:<?php echo ($count3); ?>, name:'黄金会员'},
                    {value:<?php echo ($count4); ?>, name:'钻石会员'}
                ]
            }
        ]
    })
</script>
</body>

<script>
    //禁用
    function disabled(aid){
        layer.confirm("确定禁用？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Member/disabled');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Member/level');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
    //启用
    function enabled(aid){
        layer.confirm("确定启用？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Member/enabled');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Member/level');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
    //删除
    function del(aid){
        layer.confirm("确定删除？",{
            icon:3,
            title:'提示',
            btn:['确定','取消']
        },function(){
            $.get("<?php echo U('Member/del');?>","id="+aid,function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:1,time:1000},function(){
                        window.location.href="<?php echo U('Member/level');?>";
                    });
                }else{
                    layer.msg(res.msg,{icon:2,time:1000});
                }

            },'json')
        })
    }
</script>

</html>