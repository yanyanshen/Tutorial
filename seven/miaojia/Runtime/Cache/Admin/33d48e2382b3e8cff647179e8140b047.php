<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/Public/Admin/css/common.css">
  <link rel="stylesheet" href="/Public/Admin/css/style.css">
  <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/Admin/js/jquery.SuperSlide.js"></script>
  <script type="text/javascript" src="/Public/Admin/js/index.js"></script>
  <title>后台首页</title>
</head>
<body>
    <div class="top">
      <div id="top_t">
        <div id="logo" class="fl"></div>
        <div id="photo_info" class="fr">
          <div id="photo" class="fl">
            <a href="#"><img src="/Public/Admin/images/a.png" alt="" width="60" height="60"></a>
          </div>
          <div id="base_info" class="fr">
            <div class="help_info">
              <a href="<?php echo u('clearRuntime');?>" id="hp">&nbsp;</a>
              <a href="2" id="gy">&nbsp;</a>
              <a href="<?php echo u('logout');?>" id="out">&nbsp;</a>
            </div>
            <div class="info_center">
                <?php echo (session('admin_name')); ?>
            </div>
          </div>
        </div>
      </div>
      <div id="side_here">
        <div id="side_here_l" class="fl"></div>
        <div id="here_area" class="fl">当前位置：</div>
      </div>
    </div>
    <div class="side">
        <div class="sideMenu" style="margin:0 auto">
          <h3>导航菜单</h3>
          <ul>
              <li><a href="<?php echo u('kj');?>" target="right">系统首页</a> </li>
          </ul>
            <h3>管理员管理</h3>
            <ul>
                <li><a href="<?php echo u('Admin/adminList');?>" target="right">管理员列表</a></li>
                <li><a href="<?php echo u('Admin/add_admin');?>" target="right">添加管理员</a></li>
            </ul>
            <h3>分类管理</h3>
            <ul>
                <li><a href="<?php echo u('Category/categoryList');?>" target="right">分类列表</a></li>
                <li><a href="<?php echo u('Category/add_category');?>" target="right">添加分类</a></li>
            </ul>
          <h3>商品管理</h3>
          <ul>
              <li><a href="<?php echo u('Goods/goodsList');?>" target="right">商品列表</a></li>
              <li><a href="<?php echo u('Goods/add_goods');?>" target="right">添加商品</a></li>
          </ul>
          <h3>会员管理</h3>
          <ul>
              <li><a href="<?php echo u('User/userList');?>" target="right">会员列表</a></li>
          </ul>
            <h3>订单管理</h3>
            <ul>
                <li><a href="<?php echo u('Order/orderList');?>" target="right">全部订单</a></li>
                <li><a href="<?php echo u('Order/orderList',array('status'=>'1'));?>" target="right">未付款订单</a></li>
                <li><a href="<?php echo u('Order/orderList',array('status'=>'2'));?>" target="right">等待发货订单</a></li>
                <li><a href="<?php echo u('Order/orderList',array('status'=>'3'));?>" target="right">已发货订单</a></li>
                <li><a href="<?php echo u('Order/orderList',array('status'=>'4'));?>" target="right">已完成订单</a></li>
            </ul>
       </div>
    </div>
    <div class="main">
       <iframe name="right" id="rightMain" src="<?php echo u('kj');?>" frameborder="no" scrolling="auto" width="100%" height="auto" allowtransparency="true"></iframe>
    </div>
    <div class="bottom">
      <div id="bottom_bg">版权所有:云和数据©copyright 2016 公司地址:河南省郑州市冬青街26号</div>
    </div>
    <div class="scroll">
          <a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a>
          <a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a>
    </div>
</body>

</html>