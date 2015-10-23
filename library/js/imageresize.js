jQuery(document).ready(function(){
    jQuery('.figure-left').click(function(){
    	console.log("hello from bones library!");
    	console.log(jQuery(this));
    	console.log(jQuery(this).css('width'));
       /*
 if(jQuery(this).css('width')=="320px"){
            jQuery(this).animate({'width': '98%'},'slow');
            jQuery(this).children().animate({'width': '98%'},'slow','linear');
		}else{
	            jQuery(this).animate({'width': "320px"},'slow');
	            jQuery(this).children().animate({'width': "320px"},'slow');
		}
*/
		//jQuery("figure").removeClass("figure-left");
		if(jQuery(this).css('width')<="500px"){
			jQuery(this).animate({'width': '100%'},'slow','linear');
		}
		if(jQuery(this).css('width')>="500px"){
			jQuery(this).animate({'width': '50%'},'slow','linear');
		}
		
})
 jQuery('.figure-right').click(function(){
    	console.log("hello from bones library!");
    	console.log(jQuery(this));
    	console.log(jQuery(this).css('width'));
		if(jQuery(this).css('width')<="500px"){
			jQuery(this).animate({'width': '100%'},'slow','linear');
		}
		if(jQuery(this).css('width')>="500px"){
			jQuery(this).animate({'width': '50%'},'slow','linear');
		}
		
})
jQuery('.figure-medium-left').click(function(){
    	console.log("hello from bones library!");
    	console.log(jQuery(this));
    	console.log(jQuery(this).css('width'));
		if(jQuery(this).css('width')<="500px"){
			jQuery(this).animate({'width': '100%'},'slow','linear');
		}
		if(jQuery(this).css('width')>="500px"){
			jQuery(this).animate({'width': '65%'},'slow','linear');
		}
		
})

});
