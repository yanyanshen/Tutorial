<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
        <script src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
        <script src="/Public/Admin/js/layer.js"></script>
        <link rel="stylesheet" href="/Public/Admin/css/OrderPage.css">
    </head>
    <script>
        $(function(){
            $('.del').click(function(){
                var a=$(this).attr("name");
                layer.confirm('真的要删除吗?', {icon: 3, title:'品牌编辑'}, function(index){
                    location.href="<?php echo U('Brand/del');?>?id="+a

                });
            })
        })
    </script>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
            a{
                text-decoration: none;
            }
            /*.pages{*/
                /*width: 100.5%;*/
                /*text-align:right;*/
                /*padding: 10px 0;*/
                /*clear:both;*/
            /*}*/
            /*.pages a,.pages .current{*/
                /*font-size: 18px;*/
                /*margin: 0 2px;*/
            /*}*/
            /*.pages a,.pages .current{*/
                /*border:1px dotted gray;*/
                /*background: #fff;*/
                /*padding: 2px 6px;*/
                /*text-decoration: none;*/
            /*}*/
            /*.pages .current,.pages a:hover{*/
                /*background: #7AB63F;*/
                /*color: #fff;*/
            /*}*/
            /*.pages .now{*/
                /*color: black;*/
            /*}*/
            /*.pages b{*/
                /*font-size: 20px;*/
                /*color: orange;*/
            /*}*/

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
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：品牌管理-》品牌列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('Brand/add');?>">【添加品牌】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="<?php echo U('Brand/show');?>" method="get">
                    品牌&nbsp;<!--<select name="s_product_mark" style="width: 200px;line-height: 29px;padding: 4px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>-->
                    <input type="text" name="where" value="<?php echo ($where); ?>">
                    <input value="查询" type="submit" class="button"/>
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>品牌名称</td>
                        <td>品牌logo</td>
                        <td>官网</td>
                        <td>描述</td>
                        <td>类别</td>
                    <td>id</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$value): $mod = ($k % 2 );++$k;?><tr id="product<?php echo ($k+1); ?>">
                        <td><?php echo ($k); ?></td>

                        <td><a href="<?php echo U('Brand/update');?>"><?php echo ($value["bname"]); ?></a></td>

                        <td><img src="/uploads/logo/<?php echo ($value['logo']); ?>" height="60" width="60"></td>
                        <td><?php echo ($value["website"]); ?></td>
                        <td><?php echo ($value["description"]); ?></td>
                        <?php switch($value['type']): case "1": ?><td>男装品牌</td><?php break;?>
                            <?php case "2": ?><td>女装品牌</td><?php break;?>
                            <?php case "3": ?><td>国内品牌</td><?php break;?>
                            <?php case "4": ?><td>国外品牌</td><?php break;?>
                            <?php default: ?>default<?php endswitch;?>
                        <td><?php echo ($value["id"]); ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$value["addtime"]);?></td>
                        <td><a href="<?php echo U('Brand/update',array('id'=>$value['id']));?>">修改</a>
                       <a href="#" class="del" name="<?php echo ($value['id']); ?>">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                           <div class="pages"><?php echo ($show); ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
<script>
    function show(i){
        var id=i?i:1;
        var name=$("input[name='where']").val();
        $.get("<?php echo U('show');?>",{"p":id,"where":name},function(res){
            $("body").html(res);
        })
    }
</script>

</html>