<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.ba-resize.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jsapi.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/format+zh_CN,default,corechart.I.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.gvChart-1.0.1.min.js"></script>
    <script type="text/javascript" src="/Public/layer-v2.4/layer.js"></script>
    <title></title>
</head>
<script type="text/javascript">
    gvChartInit();
    jQuery(document).ready(function(){

        jQuery('#myTable5').gvChart({
            chartType: 'PieChart',
            gvSettings: {
                vAxis: {title: 'No of players'},
                hAxis: {title: 'Month'},
                //width: 100
                height: 250
            }
        });
    });
</script>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">工作台</a></li>
    </ul>
</div>
<div class="mainbox"></div>
  <div style="padding-left: 10px">
    <div id="width" style="height: 300px;">
        <!--<div  style="width:20%;border:1px solid black;height:300px;float: left" >-->
            <!--<div class="listtitle"><a href="<?php echo U('Notice/noticelist');?>" class="more1">更多</a>系统公告</div>-->
            <!--<ul class="newlist">-->
                <!--<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                    <!--<li id="dianji"><?php if($vo["fl"] == 0 ): ?>[系统]   <a id="<?php echo ($vo["id"]); ?>" href="<?php echo U('Notice/title',array('id'=>$vo['id']));?>"><?php echo (bsubstr($vo["title"],0,15,'utf-8',false)); ?></a><b><?php echo (date("m-d",$vo["createtime"])); ?></b> <?php echo ($vo["author"]); endif; ?></li>-->
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
            <!--</ul>-->
        <!--</div>-->
        <div  class="goods" style="width:30%;border:1px solid black;height: 300px; ;float:left;margin-left: 4px" >
            <div class="listtitle"><a href="<?php echo U('Notice/noticelist');?>" class="more1">更多</a>系统公告</div>
            <ul class="newlist">
                <?php if(is_array($listto)): $i = 0; $__LIST__ = $listto;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php if($vo["fl"] == 0 ): ?>[系统]
                    <?php else: ?> [动态]<?php endif; ?><a id="<?php echo ($vo["id"]); ?>" href="<?php echo U('Notice/title',array('id'=>$vo['id']));?>"><?php echo (bsubstr($vo["title"],0,15,'utf-8',false)); ?></a><b><?php echo (date("m-d",$vo["createtime"])); ?></b> <?php echo ($vo["author"]); ?>           </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div  class="goods" style="width:30%;border:1px solid black;height:300px ;float:left;margin-left: 4px;" >
            <div class="listtitle">销量统计信息</div>
            <table id='myTable5' style="width:100%">
                <thead>
                <tr>
                <th></th>
                <th>一季度销量</th>
                <th>二季度销量</th>
                <th>三季度销量</th>
                <th>四季度销量</th>
                <!--<th>May</th>-->
                <!--<th>Jun</th>-->
                <!--<th>Jul</th>-->
                <!--<th>Aug</th>-->
                <!--<th>Sep</th>-->
                <!--<th>Oct</th>-->
                <!--<th>Nov</th>-->
                <!--<th>Dec</th>-->
                </tr>
                </thead>
                <tbody>
                <tr>
                <th></th>
                <td>150</td>
                <td>200</td>
                <td>300</td>
                <td>100</td>
                <!--<td>376</td>-->
                <!--<td>398</td>-->
                <!--<td>398</td>-->
                <!--<td>398</td>-->
                <!--<td>398</td>-->
                <!--<td>398</td>-->
                <!--<td>398</td>-->
                </tr>
                </tbody>
            </table>
        </div>
        <div  style="width:30%;border:1px solid black;height: 300px; ;float:left;margin-left: 4px">

            <div class="listtitle"><a href="#" class="more1">更多</a>最新注册会员</div>
            <ul  class="newlistt">
                <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>用户名<?php echo ($vo["username"]); ?>；联系方式<?php echo ($vo["email"]); ?>;<a href="<?php echo U('Member/memDetail',array('mid'=>$vo['mid']));?>"> <i>查看</i> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

<div class="mainbox"></div>

    <div id="widthto" class="down" style="height: 300px;padding-left: 5px">


        <div style="width:30%;border:1px solid black;height: 100%; ;float:left">

            <div class="listtitle">登陆信息</div>




            <ul class="newlist" style="height:100%;width: 100%" >
                    <li ><i>管理员ID</i><?php echo ($info["id"]); ?></li>
                    <li><i>管理员属性</i> <?php if($info["vip"] == 1 ): ?>超级管理员<?php else: ?> 管理员<?php endif; ?>  </li>
                    <li><i>登陆时间</i><?php echo (date("m-d h:i:s",$info["logintime"])); ?></li>
                    <li><i>登陆Ip</i><?php echo ($info["loginip"]); ?></li>
                    <li>Thinkphp版本&nbsp;&nbsp;<?php echo THINK_VERSION;?></li>
                    <li><i>域名</i><?php echo ($info["www"]); ?></li>
                    <li><i>数据库</i><?php echo ($info["ser"]); ?></li>
                    <li><i>服务器空间</i><?php echo ($info["kj"]); ?></li>
                    <li><i>服务器环境</i><?php echo ($info["os"]); ?></li>
            </ul>

        </div>

        <div  style="width:30%;border:1px solid black;height: 300px; ;float:left;margin-left: 4px">

            <div class="listtitle">系统更新</div>

            <ul class="tooli">
            <li id="clean"><span><img src="/Public/Admin/images/d01.png" /></span><p><a href="javascript:void(0)">清空缓存</a></p></li>
            <li><span><img src="/Public/Admin/images/d02.png" /></span><p><a href="javascript:void(0)" id="sql">数据库备份</a></p></li>
            <li><span><img src="/Public/Admin/images/d03.png" /></span><p><a href="javascript:void(0)" id="backsql">数据库还原</a></p></li>
            <!--<li><span><img src="/Public/Admin/images/d04.png" /></span><p><a href="#">服务器重启</a></p></li>-->
            <!--<li><span><img src="/Public/Admin/images/d05.png" /></span><p><a href="#">图片管理</a></p></li>-->
            <!--<li><span><img src="/Public/Admin/images/d06.png" /></span><p><a href="#">交易</a></p></li>-->
            <!--<li><span><img src="/Public/Admin/images/d07.png" /></span><p><a href="#">档案袋</a></p></li>-->
            </ul>

        </div>

        <!--<div class="tj"  style="width:20%;border:1px solid black;height: 300px; ;float:left;margin-left: 4px">-->
            <!--<div class="listtitle">数量统计</div>-->
            <!--<ul class="newlist">-->
                <!--<li><i>管理员数：</i><?php echo ($count[0]); ?></li>-->
                <!--<li><i>会员数：</i><?php echo ($count[1]); ?></li>-->
                <!--<li><i>文档数：</i><?php echo ($count[2]); ?></li>-->
                <!--&lt;!&ndash;<li><i>普通文章：</i>2315</li>&ndash;&gt;-->
                <!--<li><i>软件：</i><?php if($count[3] == 0 ): ?>暂无数据<?php else: ?> <?php echo ($count[3]); endif; ?></li>-->
                <!--<li><i>评论数</i><?php if($count[4] == 0 ): ?>暂无数据<?php else: ?> <?php echo ($count[4]); endif; ?></li>-->
            <!--</ul>-->
        <!--</div>-->


        <div class="tj"  style="width:30%;border:1px solid black;height: 300px; ;float:left;margin-left: 4px">
            <div class="listtitle">网站数据统计</div>
            <ul class="newlist">
                <li><i>管理员数：</i><?php echo ($count[0]); ?></li>
                <li><i>会员数：</i><?php echo ($count[1]); ?></li>
                <li><i>文档数：</i><?php echo ($count[2]); ?></li>
                <!--<li><i>普通文章：</i>2315</li>-->
                <li><i>软件：</i>  <?php if($count[3] == 0 ): ?>暂无数据<?php else: ?> <?php echo ($count[3]); endif; ?>  </li>
                <li><i>评论数</i><?php if($count[4] == 0 ): ?>暂无数据<?php else: ?> <?php echo ($count[3]); endif; ?></li>
            </ul>
        </div>

    </div>
  </div>
<input type="hidden" id="uid" class="<?php echo (session('id')); ?>" value="<?php echo (session('vip')); ?>">

</body>
<script type="text/javascript" src="/Public/Admin/js/notice.js"></script>
<script type="text/javascript">
    setWidth();
    $(window).resize(function(){
        setWidth();
    });
    function setWidth(){
        var width =($('.leftinfos').width()-12)/2;
        $('.infoleft,.inforight').width(width);

    }
</script>

<script>
   var width= $(document).width();
    $('#width').css("width",width);
   $('#widthto').css("width",width);
</script>


</html>