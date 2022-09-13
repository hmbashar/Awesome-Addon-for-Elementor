(function($){
	$(document).ready(function(){
	//First child show
	$('#aefe_accordion').children('.single_accordion:nth-child(2)').children('.accordion_content').slideDown();
	
	//first child add active class
	$('#aefe_accordion').children('.single_accordion:nth-child(2)').addClass('active_single_accordion').children('.accordion_hearder').addClass('accordion_active');
	
	//Main Accordion
	$('.accordion_hearder').click(function(){
	  //Accordion Content Toggle Slide
	  $(this).next('.accordion_content').slideToggle()
	  //add class
	  .toggleClass('accordion_active')
	  //When click any accordion other content slide up.
	  .parents('.single_accordion').toggleClass("active_single_accordion").siblings().removeClass("active_single_accordion").children('.accordion_content').slideUp()
	  //Active class remove other accordion header
	  .prev('.accordion_hearder').removeClass('accordion_active');
	  
	});
		
	
})
	
	
	
})(jQuery);