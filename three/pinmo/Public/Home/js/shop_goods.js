
/**
 * Goods Page Js
 * wanglele 2013/03/28
 */
 jQuery(function(){
 	jQuery("#good_num_jian").click(function(){
 		var num = jQuery("#good_nums").val();
 		num = parseInt(num);
 		num = num-1;
 		if(num<=1){
 			num = 1;
 		}
 		jQuery("#good_nums").val(num);
 	});

 	jQuery("#good_num_jia").click(function(){
 		var num = jQuery("#good_nums").val();
 		num = parseInt(num);
 		num = num+1;
        if(num>199){
            num = 199;
        }
 		jQuery("#good_nums").val(num);
 	});
     document.getElementById('good_nums').onkeyup=function(){
         if(this.value<1){
             this.value=1;
         }
         if(this.value>199){
             this.value=199;
         }
         if(isNaN(this.value)){
             this.value=1;
         }
     }
 });