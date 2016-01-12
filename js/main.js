jQuery(document).ready(function($){
	$('#colcontainer').isotope({
	  // options
	  	itemSelector: '.grid-item',
	  	layoutMode: 'fitRows'
	});

	var $container = $('#book-items').imagesLoaded( function() {
	  $container.isotope({
		  itemSelector: '.item',
		  layoutMode: 'fitRows'
	  });
	});




		$('#issue-items').isotope({
	  // options
	  	itemSelector: '.item',
	  	layoutMode: 'fitRows'
	});

var navIsBig = true;
var $nav = $('nav');

//change the navbar depending on the scroll position
 $(document).scroll( function() {
  //  var value = $(this).scrollTop();

  //  if ( value > 100 && navIsBig ){
  //     $nav.animate({height:45},"slow");
  //     $('nav').css('background-color', 'red');
  //     navIsBig = false;

  //  } else if (value <= 100 && !navIsBig ) {
  //     $nav.animate({height:100},"slow");
  //     $('nav').css('background-color', 'white');
  //     navIsBig = true;
  // }
 });
 // var isSearchShowing = false;
 // //$('#search-field').hide();
 // $('#search_btn').click(function(){
 // 	if (isSearchShowing ===false){
	//  	//$('#search-field').show();
	//  	//$nav.animate({height:100},"slow");
	//  	isSearchShowing = true;
	//  }else{
	//  	//$('#search-field').hide();
	//  	//$nav.animate({height:45},"slow");
	//  	isSearchShowing = false;
	//  }
 
 // });

});