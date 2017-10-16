<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的信息</title>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/style.css"/>
    <script src="/Public/Mobile/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="top-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="/Public/Mobile/images/left.png"/>
    </a>
    <h3>我的资料</h3>
    <a class="iconb" href="shopcar.html">
    </a>
</header>

<div class="contaniner">
    <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><ul class="self-data">
        <li>
            <a href="<?php echo U('Personal/myPhoto');?>">
                <p>头像</p>
                <span><img src="/Public/Mobile/images/right.png"/></span>
                <figure> <?php if($v['pic'] == 0): ?><img id="img0" src="/Public/Home/images/people.png"/>
                    <?php else: ?>
                    <img id="img0" src="/Public/Admin/Uploads/member/thumb100/100_<?php echo ($v['pic']); ?>" style="height: 40px;width: 40px"/><?php endif; ?></figure>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Personal/nameChange');?>">
                <p>昵称</p>
                <span><img src="/Public/Mobile/images/right.png"/></span>
                <small><?php echo ($v['username']); ?></small>

            </a>
        </li>
        <li>
            <a href="<?php echo U('Personal/myGender');?>">
                <p>性别</p>
                <span><img src="/Public/Mobile/images/right.png"/></span>
                <select>
                    <option><?php if($v['gender'] == 0): ?><td>男</td>
                        <?php elseif($v['gender'] == 1): ?>
                        <td>女</td>
                        <?php else: ?>
                        <td>保密</td><?php endif; ?></option>
                </select>

            </a>
        </li>
    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>





</body>
</html>