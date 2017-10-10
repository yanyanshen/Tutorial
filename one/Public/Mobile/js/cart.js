$(function(){

/* 数量增加的总价与总个数变化 */

    $(".product #add5").click(function(){
        var t=$(this).siblings('input[id=text_box5]');
        t.val(parseInt(t.val())+1);
        if(parseInt(t.val())>29){
            t.val(29);
        }else if ($(this).parent().siblings(".tab1-td1").find("#newslist-5").is(':checked')) {
            var tatle=parseFloat($(".clase").find("#tatle").html());
            var num= parseInt($(".clase").find(".num").html())+1;
            tatle+= parseFloat($(this).siblings(".price").find("i").html());
            output(tatle,num);
        };
    });
/* 数量减少的总价与总个数变化 */

    $(".product #min5").click(function(){
        var t=$(this).siblings('input[id=text_box5]');
        t.val(parseInt(t.val())-1);
        if(parseInt(t.val())<1){
            t.val(1);
        }else if ($(this).parent().siblings(".tab1-td1").find("#newslist-5").is(':checked')) {
            var tatle=parseFloat($(".clase").find("#tatle").html());
            var num= parseInt($(".clase").find(".num").html())-1;
            tatle-= parseFloat($(this).siblings(".price").find("i").html());
            output(tatle,num);
        };
    });

    changeNum=function(v){
        if(v.value<1){
            v.value=1;
        }
        if(v.value>29){
            v.value=29;
        }
        if(isNaN(v.value)){
            v.value=1;
        }
    }

    $(".tab1-td1 :checkbox").click(function(){
        allchk();
    });
    function allchk(){
        var chknum = $(".tab1-td1 :checkbox").size();//选项总个数
        var chk = 0;
        $(".tab1-td1 :checkbox").each(function () {
            if($(this).attr("checked")==true){
                chk++;
            }
        });
        if(chknum==chk){//全选
            $("#invert").attr("checked",true);
        }else{//不全选
            $("#invert").attr("checked",false);
        }
    }

    /* 点击产品列表前的checkbox时总价与总个数的变化 */

    $(".product input[type=checkbox]").click(function(){
        var num=0,sum=0,tatle=0.00,sumtatle=0.00;

        for (var i = 0; i < $(".product>table").length; i++) {
            if ($(".product>table").eq(i).find("#newslist-5").is(':checked')) {
                var result= count(i,tatle,num,sumtatle,sum);
                sumtatle=result[0];
                sum=result[1];
            }else{
                tatle+= 0.00;
            };
        };
        output(sumtatle,sum);
    });

/* 点击全选前的checkbox时总价与总个数的变化 */

    $(".clase #invert").click(function(){
        var num=0,tatle=0.00,sum=0,sumtatle=0.00;

        if ($(this).is(':checked')) {
            for (var i = 0; i < $(".product>table").length; i++) {
                $(".product>table").eq(i).find("#newslist-5").prop("checked",true);
                var result= count(i,tatle,num,sumtatle,sum);
                sumtatle=result[0];
                sum=result[1];
            };
        }else{
            for (var i = 0; i < $(".product>table").length; i++) {
                $(".product>table").eq(i).find("#newslist-5").prop("checked",false);
                sumtatle+=0.00;
                sum= 0;
            };
        };
        output(sumtatle,sum);
    });

/* 封装数据 */

    function output (totalPrice,totalNum){
        $(".clase").find("#tatle").html(parseFloat(totalPrice));
        $(".clase").find("#orderPrice").val(parseFloat(totalPrice));
        $(".clase").find(".num").html(totalNum);
    };

/* 用json对象封装数据（也可以用数组封装，思想一样） */

    function count (i,tatle,num,sumtatle,sum){
        tatle=parseFloat($(".product>table").eq(i).find("i").html());
        num=parseInt($(".product>table").eq(i).find("#text_box5").val());
        tatle*=num;
        sumtatle+=tatle;
        sum+=num;
        return [sumtatle,sum];
    };
});