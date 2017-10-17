function chk(){
    var chkAll=document.getElementById('chkAll');
    var chks=document.getElementsByName('chk[]');
    for(var i=0;i<chks.length;i++){
        chks[i].checked=chkAll.checked;
    }
}
// document.getElementById('chkAll').onclick=chk;
// $('.cateList').hide();
function jian(n){
    var buynum=document.getElementById('buynum'+n).value;
    if(buynum>1){
        document.getElementById('buynum'+n).value=parseInt(buynum)-1;
    }
    getprices();
    gettotalprice();
}
function jia(n){
    var buynum=document.getElementById('buynum'+n).value;
    if(buynum<199){
        document.getElementById('buynum'+n).value=parseInt(buynum)+1;
    }
    getprices();
    gettotalprice();
}

function chgnum(v){
    if(v.value<1){
        v.value=1;
    }
    if(v.value>199){
        v.value=199;
    }
    if(isNaN(v.value)){
        v.value=1;
    }

    gettotalprice();
}

function getprices(){
    var nums=document.getElementsByClassName('num');
    var price=document.getElementsByClassName('price');
    var prices=document.getElementsByClassName('prices');
    for(var i=0;i<price.length;i++){

        prices[i].innerHTML=parseInt(price[i].innerHTML)*parseInt(nums[i].value);

    };
}

function gettotalprice(){
    getprices();
    var inputs=document.getElementsByName('chk[]');
    var prices=document.getElementsByClassName('prices');
    var totalprice=0;
    for(var i=0;i<inputs.length;i++){
        if(inputs[i].checked){
            totalprice+=parseInt(prices[i].innerHTML);
        };
    };
    document.getElementById('totalprice').innerHTML='￥'+totalprice;
    document.getElementById('orderprice').value=totalprice;
}

gettotalprice();