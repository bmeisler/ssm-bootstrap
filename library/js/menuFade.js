$(function () {
	console.log("menuFade from Bones library");
    var msie6 = $.browser == 'msie' && $.browser.version < 7;
    
    if (!msie6) {
	    var top = $('.sticky-menu').offset().top - parseFloat($('#access').css('margin-top').replace(/auto/, 0)) - 10;               
	    console.log('starting top: ' + top);
	    $(window).scroll(function (event) {
		    // what the y position of the scroll is
		    var y = $(this).scrollTop();
		    console.log(y);
		
		    // whether that's below the form
		    if (y >= top) {
			    // if so, ad the fixed class
			    console.log("y is > top");
			    $('.sticky-menu').addClass('fixed');
			    } else {
			    // otherwise remove it
			    $('.sticky-menu').removeClass('fixed');
		    }
		});
	}
});


/**
 * Created with IntelliJ IDEA.
 * User: bmeisler
 * Date: 2/2/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */
