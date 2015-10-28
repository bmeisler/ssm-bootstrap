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
});