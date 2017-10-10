<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
</head>
<body style="background-image: url(/Public/Admin/images/tea5.jpg);background-repeat:no-repeat;background-size: cover;"  >
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
        </ul>
    </div>
    <div class="mainindex">
    <div class="welinfo">
        <ul>
        <span><img src="/Public/Admin/images/sun.png" alt="天气" /></span>
        <li><a class="red"><?php echo (session('aname')); ?></a>，你好，欢迎使用后台管理系统</li>
        </ul>
    </div>
    <div class="welinfo">
        <span><img src="/Public/Admin/images/time.png" alt="时间" /></span>
        <div id="localtime"></div>
        <script type="text/javascript">
            function showLocale(objD)
            {
                var str,dt,colorhead,colorfoot;
                dt="北京时间：";
                var yy = objD.getYear();
                if(yy<1900) yy = yy+1900;
                var MM = objD.getMonth()+1;
                if(MM<10) MM = '0' + MM;
                var dd = objD.getDate();
                if(dd<10) dd = '0' + dd;
                var hh = objD.getHours();
                if(hh<10) hh = '0' + hh;
                var mm = objD.getMinutes();
                if(mm<10) mm = '0' + mm;
                var ss = objD.getSeconds();
                if(ss<10) ss = '0' + ss;
                var ww = objD.getDay();
                if ( ww==0 ) colorhead="<font color=\"#FF0000\">";
                if ( ww > 0 && ww < 6 ) colorhead="<font color=\"#373737\">";
                if ( ww==6 ) colorhead="<font color=\"#008000\">";
                if (ww==0) ww="星期日";
                if (ww==1) ww="星期一";
                if (ww==2) ww="星期二";
                if (ww==3) ww="星期三";
                if (ww==4) ww="星期四";
                if (ww==5) ww="星期五";
                if (ww==6) ww="星期六";
                colorfoot="</font>"
                str = colorhead+dt + yy + "年" + MM + "月" + dd + "日" + hh + ":" + mm + ":" + ss + " " + ww + colorfoot;
                return str;
            }
            function tick()
            {
                var today;
                today = new Date();
                document.getElementById("localtime").innerHTML = showLocale(today);
                window.setTimeout("tick()", 1000);
            }
            tick();
        </script>
    </div>
    <div class="xline"></div>
    <div class="box"></div>

        <div class="welinfo">
        <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>基本配置信息</b>
    </div>
    <ul class="infolist">
    <li><span>框架结构：ThinkPHP</span></li>
    <li><span>开发语言：PHP</span></li>
    <li><span>数据库:MySql</span></li>
    </ul>
    <div class="xline"></div>
        <div class="welinfo">
            <span><img src="/Public/Admin/images/dp.png" alt="提醒" /></span>
            <b>商品销售排行</b>
            </div>
        <div id="main" style="width: 1200px;height: 400px;">

        </div>
        <div class="xline"></div>
    <div class="uimakerinfo"><b>版权所有：一杯茶</b>(<a href="http://www.ybc.com" target="_blank">www.ybc.com</a>)</div>

    </div>
</body>
<script type="text/javascript" src="/Public/Admin/js/echarts.min.js"></script>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));
    var option = {
        title: {
            text: '商品销量TOP10'
        },
        tooltip: {},
        legend: {
            data:['销量']
        },
        xAxis: {
            data: []
        },
        yAxis: {},
        series: [{
            name: '销量',
            type: 'bar',
            data: []
        }]
    };
    //异步加载数据
      $.get('<?php echo U("Index/getGoodsTop");?>').done(function (data) {
     // 填入数据
     myChart.setOption({
     xAxis: {
     data: data.info.x
     },
     series: [{
     // 根据名字对应到相应的系列
     name: '销量1',
     data: data.info.y
     }]
     });
     });
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</html>