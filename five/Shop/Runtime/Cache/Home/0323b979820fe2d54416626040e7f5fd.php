<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
    <style>
        #box{width:440px;height:570px;margin:0 auto;border:1px solid gray;}
        table tr{height:40px;line-height:40px;font-size:16px;}
        table tr td{padding-left:20px;color:#000}
        #submoney{border-radius:10px;text-decoration:none;color:white;background-color:#FF3333;/*background:transparent;*/height:40px;width:150px;font-size:20px;border:1px solid gray;cursor:pointer;}
        #sub{border-radius:10px;text-decoration:none;color:white;background-color:#FF3333;/*background:transparent;*/height:40px;width:150px;font-size:20px;border:1px solid gray;cursor:pointer;}
        #submoney:hover{background-color:#ff6c5c;}
        #sub:hover{background-color: #ff6c5c;}
        button.btn{margin-left:20px;margin-top:10px;}
        input{padding-left:10px;}
        #timer{color:#FF3333;font-weight:bolder}
    </style>
</head>
<body>
    <div id="box">
        <form action="<?php echo U('Auction/auctionprice');?>" method="post" id="form1">
        <input type="hidden" value="<?php echo ($auctionInfo['starttime']); ?>" id="start"/>
        <input type="hidden" value="<?php echo ($auctionInfo['endtime']); ?>" id="end"/>
        <input type="hidden" value="<?php echo ($auctionInfo['id']); ?>" name="ag_id" id="agid"/>
        <table>
            <tr>
                <td>商品名称：</td>
                <td style="color:red;font-weight:bolder"><?php echo (mb_substr($auctionInfo["goodsname"],0,18,"utf-8")); ?></td>
            </tr>
            <tr>
                <td>当前价格：</td>
                <td>￥<font color="#FF3333" size="6"><?php echo ($auctionInfo["auctionprice"]); ?></font> <em>RMB</em></td>
            </tr>
            <tr>
                <td>起拍价格：</td>
                <td>￥<?php echo ($auctionInfo["startprice"]); ?> RMB</td>
            </tr>
            <tr>
                <td>保底价格：</td>
                <td>￥<?php echo ($auctionInfo["commonprice"]); ?> RMB</td>
            </tr>
            <tr>
                <td>最高价格：</td>
                <td>￥<?php echo ($auctionInfo["maxprice"]); ?> RMB</td>
            </tr>
            <tr>
                <td>加价幅度：</td>
                <td><?php echo ($auctionInfo["range"]); ?></td>
            </tr>
            <tr>
                <td>宝贝数量：</td>
                <td><?php echo ($auctionInfo["num"]); ?></td>
            </tr>
            <tr>
                <td>出价人数：</td>
                <td><?php echo ($auctionInfo["totalNum"]); ?>人</td>
            </tr>
            <tr>
                <td>出价次数：</td>
                <td><?php echo ($auctionInfo["perpleNum"]); ?>次</td>
            </tr>
            <tr>
                <td>剩余时间：</td>
                <td id="timer"></td>
            </tr>
            <tr>
                <td>竞拍价格：</td>
                <td>
                    <button id="jian">-</button>
                    <input id="offer" name="auctionprice" placeholder="出价" type="text" size="3">
                    <button id="jia">+</button>
                </td>
            </tr>
        </table>
                <button class="btn" id="submoney">报名交保证金</button>
                <button class="btn" id="sub">确定出价</button>
        </form>
    </div>
</body>
</html>
<script>
    $(function(){
        //交易保证金
        $("#submoney").click(function(){
            layer.confirm("最低保证金为当前竞拍商品最高价的一半",{icon:6,btn:['同意','算了']},function(){
                layer.prompt({
                    title:"请输入保证金"
                },function(value,index,elem){
                    var val=value;
                    var id=$("#agid").val();
                    $.post("<?php echo U('Auction/deposit');?>",{deposit:val,ag_id:id},function(res){
                        if(res.status=="ok"){
                            layer.alert(res.msg,{icon:6});
                        }else{
                            layer.alert(res.msg,{icon:5});
                        }
                    })
                    layer.close(index);
                })
            })
            return false;//阻止表单默认提交
            /*layer.prompt(function(value,index,elem){
                var val=value;
                var id=$("#agid").val();
                $.post("<?php echo U('Auction/deposit');?>",{deposit:val,ag_id:id},function(res){
                    if(res.status=="ok"){
                        layer.alert(res.msg,{icon:6});
                    }else{
                        layer.alert(res.msg,{icon:5});
                    }
                })
                layer.close(index);
            })*/
        })
        //确认出价
        $("#sub").click(function(){
            $.post("<?php echo U('Auction/auctionprice');?>",$("#form1").serialize(),function(res){
                if(res.status=="ok"){
                    layer.alert(res.msg,{icon:6},function(){
                        parent.location.reload();
                    })
                }else{
                    layer.alert(res.msg,{icon:5})
                }
            })
            return false;
        })
    })
</script>
<script>
    //时间处理
    $(function(){
        setInterval(changTime, 1000);    //每一秒都循环一次函数
        function changTime(){
            document.getElementById("timer").innerHTML = getTime1();
        }
        function getTime1() {
            var now = new Date().getTime(); //获取当前的
            var end = ($('#end').val()) * 1000;
            var temp = end - now;
            if (temp <= 0)
            {
                return "拍卖已收场 ";
            } else {
                var temp2 = new Date();
                temp2.setTime(temp);
                var sec = Math.floor((temp) / 1000 % 60);
                var min = Math.floor(temp / (60 * 1000) % 60);
                var hou = Math.floor(temp / (60 * 60 * 1000) % 24);
                var day = Math.floor(temp / (24 * 60 * 60 * 1000));
                return day + "天 " + hou + "小时 " + min + "分钟 " + sec + "秒";
            }
        }
    })
    //出价额度和幅度处理
    document.getElementById("offer").value=<?php echo ($auctionInfo["auctionprice"]); ?>?<?php echo ($auctionInfo["auctionprice"]); ?>:<?php echo ($auctionInfo["startprice"]); ?>;
    var offer1=document.getElementById("offer").value;
    offer1=parseInt(offer1);
    $(function(){
        //出价框失去焦点时
        $("#offer").blur(function(){
            var offer2=parseInt($("#offer").val());
            //出价框时区焦点时，文本值不能小于当前起拍价
            if(offer1>offer2){
                $("#offer").val(offer1);
            }else{
                $("#offer").val(offer2);
            }
        })
        //减少按钮被点击时
        var range=parseInt(<?php echo ($auctionInfo["range"]); ?>);//获得加价幅度
        var nowPrice=parseInt(<?php echo ($auctionInfo["auctionprice"]); ?>);
        $("#jian").click(function(){
            var offer2=parseInt($("#offer").val());
            var res=offer2-range;
            if(res<nowPrice){
                $("#offer").val(nowPrice);
            }else{
                $("#offer").val(res);
            }
            return false;//阻止表单默认提交
        })
        //增加按钮被点击时
        var maxPrice=parseInt(<?php echo ($auctionInfo["maxprice"]); ?>);
        $("#jia").click(function(){
            var offer2=parseInt($("#offer").val());
            var res=parseInt(offer2)+parseInt(range);
            if(res>maxPrice){
                $("#offer").val(maxPrice);
            }else{
                $("#offer").val(res);
            }
            return false;//阻止表单默认提交
        })
    })
</script>