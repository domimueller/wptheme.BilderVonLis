jQuery( document ).ready(function($) {

	
	// scrolling on home page
	$( ".custom-slidercontroller-container" ).click(function() {
	    $([document.documentElement, document.body]).animate({
        	scrollTop: $("#primary").offset().top
    	}, 1000);
	});

	// enable tooltips
  	$('[data-toggle="tooltip"]').tooltip();


});