<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>会员列表</title>
    <script type="text/javascript"  src="/Public/Admin/js/member/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/admincp.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/jquery.cookie.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/member/jquery.validation.min.js"></script>
    <link href="/Public/Admin/css/member/min.css"  type="text/css" rel="stylesheet"/>
    <link href="/Public/Admin/css/member/skin_0.css"  type="text/css" rel="stylesheet" id="cssfile2"/>
    <link href="/Public/Admin/css/member/font-min.css"  type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer.js"></script>
    <script type="text/javascript">


    </script>
</head>


<style>
    #page a,#page span{
        display:inline-block;
        width:15px;
        height:18px;
        padding: 5px;
        margin: 2px;
        text-decoration: #ff2566;
        background: #ff9900;
        color:#0D93BF;
        border: #3dadbc;
        text-align: center;
    }
    span.rows{
        width:256px;
        height:18px;
        font-size:14px;
    }
    a.next,a.num,span.current,a.prev{
        font-size: 14px;
    }
    #page a:hover{
        background: #d5754d;
        color: #b30c09;
    }

    #page span{
        background: #3dadbc;

        font-weight: bold;
    }

    .name{
        width: 100px;
    }

    input[type="text"] {


        margin-left: 120px;

    }


     .button {
         background-color: #3b95c8;
         display: inline-block;
         outline: none;
         cursor: pointer;
         color:#fff;
         border: 0px;
         text-align: center;
         text-decoration: none;
         font: 14px/100% Arial, Helvetica, sans-serif;
         padding: .5em 1.5em .55em;
         text-shadow: 0 1px 1px rgba(0,0,0,.5);
         -webkit-border-radius: .5em;
         -moz-border-radius: .5em;
         border-radius: .3em;
         -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
         -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
         box-shadow: 0 1px 2px rgba(0,0,0,.2);
     }
    .button:hover {
        text-decoration: none;
    }
    .button:active {
        position: relative;
        top: 1px;
    }

</style>

<body>
<form  name="form1" id="form_member"  action="<?php echo U('member/member');?>" method="post" >


    <table class="table tb-type2 nobdb">
        <tr class="thead">
            <th>&nbsp;</th>
            <th colspan="2">编号[ID]</th>
            <th colspan="2" class="vip">会员</th>
            <th class="align-center"><span fieldname="logins" nc_type="order_by">登录次数</span></th>
            <th class="align-center"><span fieldname="last_login" nc_type="order_by">最后登时间</span></th>
            <th class="align-center">登录</th>
            <th class="align-center">操作</th>
        </tr>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tbody>
            <tr class="hover member">

                <td class="w24"><input type="checkbox" name='del_id[]' value="3" class="checkitem"></td>

                <td class="w48 picture"><div class="size-44x44"><span class="thumb size-44x44"><i></i><img src="/Public/Admin/img/member/ps.gif"  onload="javascript:DrawImage(this,44,44);  " width="44" height="44"/></span></div></td>
                <td > <span><?php echo ($val["id"]); ?></span></td>

                <td><p class="name"><strong><?php echo ($val["username"]); ?></strong></p>
                    <p class="smallfont">注册时间:&nbsp;<?php echo (date('Y-m-d H:i:s',$val['regdate'])); ?></p>

                    <div class="im"><span class="email" >
                        <p class="smallfont">联系电话:&nbsp;<?php echo ($val["mobile"]); ?></p></span></div>
                    <!--v3-b11 显示手机号码-->
                    </div></td>
                <td></td>
                <td class="align-center"><?php echo ($val["loginnum"]); ?></td>
                <td class="w150 align-center"><p><?php echo (date('Y-m-d H:i:s',$val['lastdate'])); ?></p>
                    <p>登陆IP&nbsp;<?php echo ($val["regip"]); ?></p></td>

                <td class="align-center" style="cursor: pointer">
                    <!--<a href="<?php echo U('member/status');?>?id=<?php echo ($val['id']); ?>">禁止登陆</a>||<a href="<?php echo U('member/status');?>?id=<?php echo ($val['id']); ?>">允许登陆</a>-->
                    <?php
 if($val['status']==1){ ?>
                    <!--<a href="<?php echo U('member/status1');?>?id=<?php echo ($val['id']); ?>" >允许登录</a>-->
                    <a class="btn-y" id="<?php echo ($val['id']); ?>">允许登陆</a>
                    <?php
 }else{ ?>
                    <!-- <a  href="<?php echo U('member/status');?>?id=<?php echo ($val['id']); ?>">禁止登录</a>-->
                    <a class="btn-s" id="<?php echo ($val['id']); ?>">禁止登陆</a>


                    <?php
 } ?>
                </td>

                <td class="align-center"><a href="<?php echo U('member/editor');?>?id=<?php echo ($val['id']); ?>">编辑</a> |
                    <!-- <a class="del-btn"   href="<?php echo U('member/del');?>?id=<?php echo ($val['id']); ?>" onclick="if(confirm('您确定要删除吗?')){$('#form_member').submit();}">删除</a>-->
                    <a class="del-btn" id="<?php echo ($val['id']); ?>"><span style="cursor:pointer">删除</span></a>
                </td>
            </tr>
            </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
        <tfoot class="tfoot">
        <tr>
            <td class="w24"><!--<input type="checkbox" class="checkall" id="checkallBottom" name="chk[<?php echo ($date['id']); ?>]" value="">--></td>
            <td colspan="16">
                <!-- <label for="checkallBottom">全选</label>
                &nbsp;&nbsp;<a  class="btn" onclick="if(confirm('您确定要删除吗?')){$('#form_member').submit();}" href="<?php echo U('member/del');?>?id=<?php echo ($date['id']); ?>" ><span>删除</span></a>-->
                <input type="text" placeholder=" 请输入关键字" name="Keywords"/>
                <input type="submit" value="搜索" class="button"/>
                <!-- <div class="pagination"> <ul><li><span>首页</span></li><li><span>上一页</span></li><li><span class="currentpage">1</span></li><li><span>下一页</span></li><li><span>末页</span></li></ul> </div></td>-->
                <div class="pagination"><?php echo ($page); ?></div>
            </td>
        </tr>
        </tfoot>
    </table>
</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-y').click(function(){
            id=$(this).attr('id')
            $.post('<?php echo U("member/status1");?>',{id:id},function(res){
                if(res.status==1){
                    //layer.msg('玩命提示中');
                    layer.msg('激活成功',{time:1000},function(){
                        location.reload()
                    })
                }else{
                    layer.alert('激活失败')
                }
            },'json')
        })
    })

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-s').click(function(){
            id=$(this).attr('id')
            $.post('<?php echo U("member/status");?>',{id:id},function(res){
                if(res.status==1){
                    layer.msg('禁用成功',{time:1000},function(){
                        location.reload()
                    })
                }else{
                    layer.alert('禁用失败')
                }
            },'json')
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.del-btn').click(function(){
            id=$(this).attr('id')
            $.post('<?php echo U("member/del");?>',{id:id},function(res){
                if(res.status!=0){
                    layer.alert('删除成功',function(){
                        location.reload()
                    })
                }else{
                    layer.alert('删除失败')
                }
            },'json')

        })
    })
</script>

<script>
    $(function(){
        $('#ncsubmit').click(function(){
            $('input[name="op"]').val('member');$('#formSearch').submit();
        });
    });
</script>

</body>
<style>
    .pagination{  font-size: 20px;  }  .pagination a,.pagination span{  display:inline-block;  padding: 5px;  margin: 2px;  text-decoration: #ff2566;  background: rgba(179, 12, 9, 0.04);  color:#0D93BF;  border: rgba(179, 12, 9, 0.08);  text-align: center;  }
    .paginationa:hover{  background: #d5754d;  color: #b30c09;  }
    .pagination span{  background: rgba(176, 204, 255, 0.09);  font-weight: bold;  }
</style>
</html>