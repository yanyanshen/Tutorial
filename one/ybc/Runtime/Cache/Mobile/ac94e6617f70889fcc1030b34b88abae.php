<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="/Public/Mobile/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <link href="/Public/Mobile/css/bootstrap.min.css" rel="stylesheet">
    <script src="/Public/Mobile/js/distpicker.js"></script>
    <link rel="stylesheet" href="/Public/Mobile/css/LArea.css">
    <script src="/Public/Mobile/js/LAreaData1.js"></script>
    <script src="/Public/Mobile/js/LAreaData2.js"></script>
    <script src="/Public/Mobile/js/LArea.js"></script>
    <title><?php echo ($aid?'编辑':'添加'); ?>收货地址</title>
    <style type="text/css">
        a,address,b,big,blockquote,body,cite,code,dd,del,div,dl,dt,em,fieldset,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,label,legend,li,ol,p,pre,small,span,strong,ul,var{ margin: 0; padding: 0; box-sizing: border-box;}
        body { font-family:"微软雅黑"; font-size:0.28rem; background:#fff;}
        ul,ul li { list-style: none;}
        #form1 ul li{ width: 100%; height: 3rem;line-height: 2.8rem; border-bottom: 1px solid #ccc; padding: 0 0.5rem; font-size: 0.5rem;}
        #form1 ul li span{ float: left; width: 4rem; }
        #form1 ul li input{ float: left; height: 2.8rem;border: 0; width: 14rem;}
        #form1 ul li textarea{ width: 100%;height: 2.8rem;line-height: 1.4rem; border: 0; resize: none;}
        #delBtn{ margin: 0.5rem auto; width: 3rem; text-align: right; height: 2rem; line-height: 2rem;background: url("/Public/Mobile/images/del.jpg") no-repeat;background-size: auto 2rem;}
    </style>
</head>
<script type="text/javascript">
    $(function(){
        saveAddr=function(){
            layer.open({
                content:"确认保存？",
                btn:['yes','no'],
                yes:function(){
                    $.post("<?php echo U('Order/saveAddr');?>?<?php echo ($aid?'aid=':''); echo ($aid?$aid:''); echo ($oid?'&oid=':''); echo ($oid?$oid:''); ?>",$("#form1").serialize(),function(res){
                        if(res.status==1){
                            layer.open({content:res.info,btn:['我知道了'],shadeClose:false,yes:function(){
                                location.href=res.url;
                            }});
                        }else{
                            layer.open({content:res.info});
                        }
                    })
                }
            })
        }

        $("#delBtn").click(function(){
            layer.open({
                content:'确认删除？',
                btn:['yes','no'],
                yes:function(){
                    $.post("<?php echo U('Order/delAdd');?>",{id:id},function(res){
                        if(res.status==1){
                            layer.open({ content:"已删除",btn:['我知道了'],shadeClose:false,yes:function(){
                                history.back();
                                location.reload();
                            }})
                        }else{
                            layer.open({ content:"删除失败"})
                        }
                    })
                }
            });
        })
    })
</script>
<body>
<div style="display: inline-block; background:#eee;width: 100%;height: 2.5rem;line-height: 2.5rem;padding: 0 0.5rem;">
    <a href="javascript:history.go(-1);" style="font-size: 1.3rem;text-decoration: none; color: #000;">&lt; <?php echo ($aid?'编辑':'添加'); ?>收货地址</a>
    <a style="font-size: 1.3rem; float: right; color: #FF822F" onclick="saveAddr()">保存</a>
</div>
<form action="" id="form1">
    <ul>
        <li><span>收货人</span><input type="text" name="name" value="<?php echo ($addr["name"]); ?>"/></li>
        <li><span>联系电话</span><input type="text" name="phone" value="<?php echo ($addr["phone"]); ?>"/></li>
        <li><span>所在地区</span>
            <div>
                <div class="content-block">
                    <input id="demo1" type="text" readonly="" placeholder="请选择所在地区" name="pct" value="<?php echo ($pct); ?>"  />
                    <input id="value1" type="hidden" value="20,234,504"/>
                </div>
            </div>
        </li>
        <li><textarea name="address" id="" cols="30" rows="10" placeholder="详细地址"><?php echo ($addr["address"]); ?></textarea></li>
        <li><span>邮政编码</span><input type="text" name="postcode" value="<?php echo ($addr["postcode"]); ?>"/></li>
        <li><span style="width: 6rem;">设为默认地址</span><input style="float: right; width: 1rem;" <?php echo ($addr['def']?'checked disabled':''); ?> type="checkbox" name="def" value="1"/></li>
    </ul>
</form>
<?php echo ($aid?'<div id="delBtn">删除</div>':''); ?>
</body>
<script>
    var area1 = new LArea();
    area1.init({
        'trigger': '#demo1', //触发选择控件的文本框，同时选择完毕后name属性输出到该位置
        'valueTo': '#value1', //选择完毕后id属性输出到该位置
        'keys': {
            id: 'id',
            name: 'name'
        }, //绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
        'type': 1, //数据源类型
        'data': LAreaData //数据源
    });
    area1.value=[1,13,3];//控制初始位置，注意：该方法并不会影响到input的value
    var area2 = new LArea();
    area2.init({
        'trigger': '#demo2',
        'valueTo': '#value2',
        'keys': {
            id: 'value',
            name: 'text'
        },
        'type': 2,
        'data': [provs_data, citys_data, dists_data]
    });
</script>
</html>