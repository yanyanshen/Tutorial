<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="/Public/Home/js/jQuery.1.8.2.min.js"></script>
    <script src="/Public/Home/js/layer/layer.js"></script>
</head>
<body>
<div class="information box">
    <div class="intro_infor_title" >
    </div>
    <div class="intro_infor_cont">
        <p style="width: 960px;"><?php echo ($goodsList["description"]); ?></p>
        <p class="notice"></p>
    </div>
    <form action="" method="post" id="form1">
    <div class="pro_judge" id="fiveth" >
        <div class="judge_title"></div>
        <div class="judge_cont">
        </div>
        <h1 id="maxNum" style="font-size: 20px">请在下面文本框内进行评价</h1>
        <input type="hidden" name="oid" value="<?php echo ($oid); ?>">
        <input type="hidden" name="gid" value="<?php echo ($gid); ?>">
        <textarea id="area" name="message"  style=" width:800px;height:150px;font-size:30px; "></textarea>
        <div style="border-radius:10px;text-align: center;width:150px;cursor: pointer; background: red;"><a href="javascript:comment()" style="text-decoration:none;font-size: 30px;color:#ffffff">添加评价</a></div>
    </div>
    </form>
</div>
</body>
<script type="text/javascript">
    var area=document.getElementById('area');
    area.onkeydown=function(event){
        var e=event||window.event;
        area.style.backgroundColor="#eee";
        var maxNum=area.value.length;
        var h1=document.getElementById('maxNum');
        h1.innerHTML='最多<span style="color: red">150</span>个字，还剩<span style="color: red">'+(149-maxNum)+'</span>个字';
        if(maxNum>148){
            area.readOnly=true;
            //防止按退格键返回上个网页
                if (e.keyCode == 8) {  //alert(document.activeElement.type);
                    if (document.activeElement.type.toLowerCase() == "textarea" || document.activeElement.type.toLowerCase() == "text") {
                        if (document.activeElement.readOnly == false)
                            return true;
                    }
                    return false;
                }
            }
    };
    function comment(){
        var maxNum=area.value.length;
        if(maxNum<15){
            layer.alert('不能少于15个字');
            return false;
        }
        $.post("<?php echo U('Home/Member/comment');?>",$('#form1').serialize(),function(res){
            if(res.status=='ok'){
                layer.msg(res.msg,{
                    icon: 1,
                    time: 1000
                },function(){
                    parent.location.reload();
                     location.close();
                });

            }else{
                layer.msg(res.msg,{
                    icon: 2,
                    time: 1000
                });

            }
        })
    }
</script>
</html>