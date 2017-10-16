<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/layer-v2.4/layer.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="/Public/Admin/js/adminlist.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
        <style>
            button{
                line-height:30px;
                height:30px;
                width:auto;
               /*// color:#ffffff;*/
                background-color:#c5f1fd;
                font-size:16px;
                font-weight:normal;
                padding-left: 10px;
                padding-right: 10px;
                -webkit-border-top-left-radius:3px;
                -moz-border-radius-topleft:3px;
                border-top-left-radius:3px;
                -webkit-border-top-right-radius:3px;
                -moz-border-radius-topright:3px;
                border-top-right-radius:3px;
                -webkit-border-bottom-left-radius:3px;
                -moz-border-radius-bottomleft:3px;
                border-bottom-left-radius:3px;
                -webkit-border-bottom-right-radius:3px;
                -moz-border-radius-bottomright:3px;
                border-bottom-right-radius:3px;
                text-align:center;
                display:inline-block;
                text-decoration:none;
            }
            button:hover{
                background-color:#4a8cf7;
                background:-moz-linear-gradient(top, #4a8cf7 5%, #4aa3f7 100%);
                background:-o-linear-gradient(top, #4a8cf7 5%, #4aa3f7 100%);
                background:-ms-linear-gradient(top, #4a8cf7 5%, #4aa3f7 100%);
                background:linear-gradient(to bottom, #4a8cf7 5%, #4aa3f7 100%);
                background:-webkit-linear-gradient(top, #4a8cf7 5%, #4aa3f7 100%);
            }
        </style>
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
                    <form action="<?php echo U('Admins/ser');?>" enctype="multipart/form-data" method="post">
                    <ul class="seachform">
                        <li><label>查询管理员</label><input name="key" type="text" class="scinput"/></li>
                        <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                        <li style="color: #ff0000">请注意，超级管理员之间只可以修改个人的信息以及管理员的信息，更高的权限需请联系root</li>
                        <ul class="toolbar1">
                            <li class="click"><a href="<?php echo U('Admins/add');?>"><span><img src="/Public/Admin/images/t01.png"/></span>添加</a></li>
                            <!--<li><a href=""><span><img src="/Public/Admin/images/t03.png" /></span>删除</a></li>-->
                        </ul>
                    </ul>
                    </form>
                    <table class="tablelist" style="text-align: center;">
                        <thead>
                        <tr >
                            <th  style="text-align: center">
                                <!--<input name="" type="checkbox" value="" checked="checked"/></th>-->
                            <th  style="text-align: center">编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                            <th  style="text-align: center">管理员名称</th>
                            <th  style="text-align: center">管理员属性</th>
                            <th  style="text-align: center">登录时间</th>
                            <th  style="text-align: center">创建时间</th>
                            <th  style="text-align: center">创建发起人</th>
                            <th  style="text-align: center">登陆IP</th>
                            <th  style="text-align: center">手机号码</th>
                            <th  style="text-align: center">邮箱</th>
                            <th  style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr>
                                    <td></td>
                                <!--<td><input name="" type="checkbox" value="" /></td>-->
                                <td><?php echo ($k+$num); ?></td>
                                <td><button name="<?php echo ($value["vip"]); ?>" id=<?php echo ($value["id"]); ?> class="username"><?php echo ($value["username"]); ?></button></td>
                                <!--<td>  <button id=<?php echo ($value["id"]); ?> class="vip">-->
                                <td>
                                    <!--管理员权限判断显示-->
                                    <?php if($value["vip"] == 1 ): ?><button style="background-color: dodgerblue">超级管理员</button><button id=<?php echo ($value["id"]); ?> class="vip" name="1">管理员</button>
                                        <?php else: ?> <button id=<?php echo ($value["id"]); ?> class="vip" name="0">超级管理员</button> <button  style="background-color: dodgerblue ">管理员</button><?php endif; ?>
                                     </td>
                                <td><?php echo (date("Y-m-d",$value["logintime"])); ?></td>
                                <td><?php echo (date("Y-m-d",$value["createtime"])); ?> </td>
                                <td><?php echo ($value["createpeop"]); ?></td>
                                <td><?php echo ($value["loginip"]); ?></td>
                                <td><button name="<?php echo ($value["vip"]); ?>" id=<?php echo ($value["id"]); ?> class="phone"><?php echo ($value["phone"]); ?></button> </td>
                                <td><button name="<?php echo ($value["vip"]); ?>" id=<?php echo ($value["id"]); ?> class="email"><?php echo ($value["email"]); ?></button> </td>
                                <td>
                                    <input type="hidden" value="<?php echo ($vip); ?>" id="vip"/>
                                    <input type="hidden" id="id" value="<?php echo (session('id')); ?>"/>
                                    <button  name="<?php echo ($value["vip"]); ?>" class="del" id=<?php echo ($value["id"]); ?>>删除</button>
                                    <!--<button  name="<?php echo ($value["vip"]); ?>" class="set" id=<?php echo ($value["id"]); ?>>冻结</button>-->
                                    <!--<a href="#" class="tablelink"><?php echo ($value['issale']?'下架':'上架'); ?></a>-->
                                </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagin">
                        <!--<div class="message">-->
                            <!--&lt;!&ndash;共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($num); ?>&nbsp;</i>页&ndash;&gt;-->
                        <!--&lt;!&ndash;<?php echo ($page); ?>&ndash;&gt;-->
                        <!--</div>-->

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

        $('button').click(function (){
            var vip =$("#vip").val()
            var a=$(this).attr('id')
            var b=$(this).attr('class')
            var uid=$("#id").val();
            var vip_name=$(this).attr('name');
            if(vip>0){
                if(uid==10000){
                    post(b,a,vip,vip_name,uid);
                }else{
                    if(vip==vip_name){
                        if(a==uid){
                            post(b,a,vip,vip_name,uid);
                        }else{
                            layer.msg("超管之间只能修改个人信息")
                        }
                    }if(vip>vip_name){
                        post(b,a,vip,vip_name,uid);
                    }
                }
            }else{
                if(a==uid){
                    post(b,a)
                }else{
                    layer.msg("管理员之间只能修改个人信息")
                }
            }
        })

    </script>

</html>