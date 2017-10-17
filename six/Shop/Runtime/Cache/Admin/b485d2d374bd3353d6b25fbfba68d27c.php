<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script type="text/javascript">
            var time_now_server,time_now_client,time_end,time_server_client,timerID;
            //结束时间
            time_end=new Date(Date.now()+2*60*60*1000);
            time_end=time_end.getTime();
//            time_end=time_end.getTime();
            //开始的时间:如果不填入时间日期默认为当前的日期时间
            time_now_server=new Date;
            time_now_server=time_now_server.getTime();
            time_now_client=new Date();
            time_now_client=time_now_client.getTime();
            time_server_client=time_now_server-time_now_client;
            setTimeout("show_time()",1000);
            //显示时间函数
            function show_time()
            {
                var timer = document.getElementById("timer");
                if(!timer){
                    return ;
                }
                timer.innerHTML =time_server_client;

                var time_now,time_distance,str_time;
                var int_day,int_hour,int_minute,int_second;
                var time_now=new Date();
                time_now=time_now.getTime()+time_server_client;
                time_distance=time_end-time_now;
                if(time_distance>0)
                {
//                    int_day=Math.floor(time_distance/86400000)
//                    time_distance-=int_day*86400000;
                    int_hour=Math.floor(time_distance/3600000)
                    time_distance-=int_hour*3600000;
                    int_minute=Math.floor(time_distance/60000)
                    time_distance-=int_minute*60000;
                    int_second=Math.floor(time_distance/1000)

                    if(!(int_hour>=10)){
                        int_hour="0"+int_hour;
                    }
                    if(!(int_minute>=10)){
                        int_minute="0"+int_minute;
                    }
                    if(!(int_second>=10)){
                        int_second="0"+int_second;
                    }
//                    str_time=int_day+"天"+int_hour+"小时"+int_minute+"分钟"+int_second+"秒";
                    str_time=int_hour+"小时"+int_minute+"分钟"+int_second+"秒";
                    timer.innerHTML=str_time;
                    setTimeout("show_time()",1000);

                }
                else
                {
                    timer.innerHTML =timer.innerHTML;
                    clearTimeout(timerID)
//                    location.href="<?php echo U('Login/logout');?>";
                }
            }
        </script>

    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" align=center border=0>
            <tr height=28>
                <td background=/Public/Admin/img/title_bg1.jpg>当前位置: 后台首页</td>

            </tr>
            <tr>
                <td bgcolor=#b1ceef height=1></td></tr>
            <tr height=20>
                <td background=/Public/Admin/img/shadow_bg.jpg></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="90%" align=center border=0>
            <tr height=100>
                <td align=middle width=90><img height=90 src="/Public/Admin/img/myfoundtwo.png"
                                                width=90></td>
                <td width=55>&nbsp;</td>
                <td>
                    <table height=100 cellspacing=0 cellpadding=0 width="100%" border=0>
                        <tr>
                            <td></td></tr>
                        <tr>
                            <td></td></tr>
                        <tr>
                            <td><input type="text" value="" id="Aday" style="width: 40px;height: 15px;float: left;
                           margin-top: 1px;border: none"/>欢迎进入网站管理中心！</td></tr>
                        <tr>
                            <td>当前时间：
                                <input type="text" value="" id="clock" style="border: none;font-size: 13px"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td></tr>
                    </table></td></tr>
           </table>
        <table cellspacing=0 cellpadding=0 width="95%" align=center border=0>
            <tr height=4>
                <td></td></tr>
            <tr height=6>
                <td style="padding-left: 10px; font-weight: bold; color: #ffffff"
                    align=middle></td></tr>
            <tr bgcolor=#ecf4fc height=8>
                <td></td></tr>
            <tr height=15>
                <td></td></tr></table>
        <table cellspacing=0 cellpadding=2 width="95%" align=center border=0>
            <tr>
                <td align=right width=100>登陆帐号：</td>
                <td style="color: #880000"><?php echo ($_SESSION['admin']['username']); ?></td></tr>
            <tr>
                <td align=right>登陆次数：</td>
                <td style="color: #880000"><?php echo ($_SESSION['admin']['loginnums']); ?></td></tr>
            <tr>
            <td align=right>注册时间：</td>
            <td style="color: #880000"><?php echo (date('Y-m-d H:i:s',$_SESSION['admin']['regdate'])); ?></td></tr>
            <tr>
                <td align=right>上次登录：</td>
                <td style="color: #880000"><?php echo (date('Y-m-d H:i:s',$_SESSION['admin']['logintime'])); ?></td></tr>
            <!--<tr>-->
                <!--<td align=right>身份过期：</td>-->
                <!--<td style="color: #880000">-->
                    <!--<div id="timer" style="font-size:5px; text-align:left; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif;"></div>-->
                    <!--<div id="yu" style="font-size:5px; text-align:left; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif;"></div>-->
                <!--</td></tr>-->
            <!--改了一下ip-->
            <tr>
                <td align=right>上次登录IP：</td>
                <td style="color: #880000"><?php echo ($_SESSION['admin']['lastloginip']); ?></td></tr>
            <tr>
                <td align=right>数据库：</td>
                <td style="color: #880000">Mysql : <?php echo (THINK_VERSION); ?></td></tr>
            <tr>
                <td align=right>开发语言：</td>
                <td style="color: #880000">ThinkPHP 3.23beta</td></tr>
            <tr>
                <td align=right>服务器软件：</td>
                <td style="color: #880000"><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></td></tr>
        </table>
         <div id="main" style="width: 900px;height:500px;"></div>
    </body>
        <script type="text/javascript">
            var int=setInterval("clock()",1000);
            function clock(){
                var dt=new Date();
                var str="";
                var year=dt.getFullYear();
                var month=(dt.getMonth()+1);
                if(!(month>=10)){
                    month='0'+month;
                }
                var day=dt.getDate();
                if(!(day>=10)){
                    day='0'+day;
                }
                var hours=dt.getHours();
                if(!(hours>=10)){
                    hours='0'+hours;
                }
                var minutes=dt.getMinutes();
                if(!(minutes>=10)){
                    minutes='0'+minutes;
                }
                var seconds=dt.getSeconds();
                if(!(seconds>=10)){
                    seconds='0'+seconds;
                }
                var nowT=str+year+"年"+month+"月"+day+"日"+" "+hours+":"+minutes+":"+seconds+" ";
                document.getElementById("clock").value=nowT;

                if(!(hours > 6)){document.getElementById("Aday").value=("凌晨好，")}
                else if (!(hours > 9)){document.getElementById("Aday").value=("早上好，")}
                else if (!(hours > 12)){document.getElementById("Aday").value=("上午好，")}
                else if (!(hours > 14)){document.getElementById("Aday").value=("中午好，")}
                else if (!(hours > 17)){document.getElementById("Aday").value=("下午好，")}
                else if (!(hours > 19)){document.getElementById("Aday").value=("傍晚好，")}
                else if (!(hours > 22)){document.getElementById("Aday").value=("晚上好，")}
                else {document.getElementById("Aday").value=("夜里好，")}
            }
        </script>
</html>
<script type="text/javascript" src="/Public/Admin/js/echarts.min.js"></script>
<script>
    var myChart = echarts.init(document.getElementById('main'));
    
    option = {
      title: {
                text: '商品销量排行榜'
            },
    legend: {
        data:['销量']
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : [<?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>"<?php echo (mb_substr($v['goodsname'],0,5,'utf-8')); ?>",<?php endforeach; endif; else: echo "" ;endif; ?>],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'销量',
            type:'bar',
            barWidth: '60%',
            data:[<?php if(is_array($info)): $k = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>"<?php echo (mb_substr($v['salenum'],0,5,'utf-8')); ?>",<?php endforeach; endif; else: echo "" ;endif; ?>]
        }
    ]
};
myChart.setOption(option);
</script>