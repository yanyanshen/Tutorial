<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台首页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/echarts.min.js"></script>

</head>


<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
    </ul>
</div>

<div class="mainindex">


    <div class="welinfo">
        <span><img src="/Public/Admin/images/sun.png" alt="天气" /></span>
        <b>Admin早上好，欢迎使用后台管理系统</b>
    </div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
        <i>您上次登录的时间：2013-10-09 15:22</i> <i>您上次登录IP：2013-10-09 15:22</i> 如非本人操作，请及时更改密码
    </div>

    <div class="xline"></div>

    <!--    <ul class="iconlist">
    
       <li><img src="/Public/Admin/images/ico01.png" /><p><a href="#">管理设置</a></p></li>
       <li><img src="/Public/Admin/images/ico02.png" /><p><a href="#">发布文章</a></p></li>
       <li><img src="/Public/Admin/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
       <li><img src="/Public/Admin/images/ico04.png" /><p><a href="#">文件上传</a></p></li>
       <li><img src="/Public/Admin/images/ico05.png" /><p><a href="#">目录管理</a></p></li>
       <li><img src="/Public/Admin/images/ico06.png" /><p><a href="#">查询</a></p></li>
            
    </ul>
    
      
    
    <div class="xline"></div> -->
    <div class="box"></div>

    <div class="welinfo">
        <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>

    <ul class="infolist">
        <li><span>服务器软件：<?php echo ($softWare); ?></span></li>
        <li><span>开发语言：<?php echo ($developLang); ?></span></li>
        <li><span>数据库: <?php echo ($developSql); ?></span></li>
    </ul>

    <div class="xline"></div>

    <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egoods.com" target="_blank"><?php echo ($domainName); ?></a>)</div>
    <div id="main1" style="width: 40%;height:600px;float: right;"></div>
    <div id="main" style="width: 60%;height:600px;position: absolute"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '商城销量排行'
            },
            tooltip: {},
            legend: {
                data:['销量前十']
            },
            xAxis: {
                data: [<?php if(is_array($rank)): $k = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>"<?php echo (mb_substr($v['goodsname'],0,5,'utf-8')); ?>",<?php endforeach; endif; else: echo "" ;endif; ?>]
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'bar',
                data: [<?php if(is_array($rank)): $k = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; echo ($v['salenum']); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>]
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main1'));
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



</div>



</body>

</html>