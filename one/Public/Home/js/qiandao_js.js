$(function() {
    var signFun = function() {

        var dateArray = [1,2,3,4,5,6]; // 假设已经签到的
        
        var $dateBox = $("#js-qiandao-list"),
            $currentDate = $(".current-date"),
            $qiandaoBnt = $("#js-just-qiandao"),
            _html = '',
            _handle = true,
            myDate = new Date();
        $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');

        var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();

        var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
        var totalDay = d.getDate(); //获取当前月的天数

        for (var i = 0; i < 42; i++) {
            _html += ' <li><div class="qiandao-icon"></div></li>'
        }
        $dateBox.html(_html) //生成日历网格

        var $dateLi = $dateBox.find("li");
        for (var i = 0; i < totalDay; i++) {
            $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i+1));
            for (var j = 0; j < dateArray.length; j++) {
                if (i == dateArray[j]) {
                    $dateLi.eq(i + monthFirst-1).addClass("qiandao");
                }
            }
        } //生成当月的日历且含已签到

        $(".date" + myDate.getDate()).addClass('able-qiandao');

        $dateBox.on("click", "li", function() {

            //查询是否登录
            $.get("{:U('Sign/chkLogin')}",'',function(res){
                if(res.status==1){
                    //代表已经登录
                    //判断今天是否已经签到
                    $.get("{:U('Sign/chkSign')}",'',function(res1){
                        if(res1.status==1){
                            //没有签到

                            if ($(this).hasClass('able-qiandao') && _handle) {

                                $.get("{:U('Sign/sign')}",'',function(res2){
                                    if(res2.status==1){
                                        $(this).addClass('qiandao');
                                        qiandaoFun();
                                    }else{
                                        layer.msg(res2.info,{icon:5,time:2000},function(){
                                            location=location.href;
                                        })
                                    }

                                });


                            }





                        }else{
                            //已经签到了
                            $(this).addClass('qiandao');//吧表格中的日期属性设置为敲到的样式
                            _handle = false;//不能再点击
                        }
                    })
                }else{
                    //代表没有登录,然后跳转到登录页面
                    layer.msg(res.info,{icon:6,time:1500},function(){
                        location="{:U('Home/Login/login')}";
                    })
                }
            });

            }); //签到表



        $qiandaoBnt.on("click", function() {
            if (_handle) {
                qiandaoFun();
            }
        }); //签到按钮

        function qiandaoFun() {
            $qiandaoBnt.addClass('actived');
            openLayer("qiandao-active", qianDao);
            _handle = false;
        }

        function qianDao() {
            $(".date" + myDate.getDate()).addClass('qiandao');
        }
    }();

    function openLayer(a, Fun) {
        $('.' + a).fadeIn(Fun)
    } //打开弹窗

    var closeLayer = function() {
            $("body").on("click", ".close-qiandao-layer", function() {
                $(this).parents(".qiandao-layer").fadeOut()
            })
        }(); //关闭弹窗

    $("#js-qiandao-history").on("click", function() {
        openLayer("qiandao-history-layer", myFun);

        function myFun() {
            console.log(1)
        } //打开弹窗返回函数
    })

})
