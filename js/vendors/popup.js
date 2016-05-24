/* Popup JS Starts Here */
// function to show our popups
function showPopup(whichpopup){
	//$("body").css("overflow","hidden");
	var docHeight = $(document).height(); 
	var scrollTop = $(window).scrollTop();
	
	$('.overlay-wrapper').show().css({'height' : docHeight}); 
	$('.popup'+whichpopup).show().css({'top': scrollTop+50+'px'}); 
}

// function to close our popups
function closePopup(){
	$('.overlay-wrapper, .overlay-content').hide(); //hide the overlay
	//$("body").css("overflow","auto");
}

$('.show-popup').on('click',function(event){
	event.preventDefault(); 
	var selectedPopup = $(this).data('showpopup');
	showPopup(selectedPopup); 
});

// hide popup when user clicks on close button or if user clicks anywhere outside the container
$('.close-btn, .overlay-wrapper').on('click',function(){
	closePopup();
});
 
// hide the popup when user presses the esc key
$(document).keyup(function(e) {
	if (e.keyCode == 27) { // if user presses esc key
		closePopup();
	}
});
/* Popup JS Ends Here */