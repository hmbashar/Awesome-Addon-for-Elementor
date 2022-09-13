(function($){
	"use strict";

/*-----------------------
Both Page
-------------------------*/

	// Our Talent Slider
	$(".aefe-tm-our-talent-slider-content").owlCarousel({				
			items: 4,
			autoplay: true,				
			loop: true,
			margin:25,
			dots: false,
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],				
			responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					800:{
						items:3
					},
					1000:{
						items:4
					}
				}

	});

if ($.fn.barfiller){  
	$('#bar1').barfiller({ barColor: '#f5ab35', duration: 3000 });
	$('#bar2').barfiller({ barColor: '#f5ab35', duration: 3000 });
	$('#bar3').barfiller({ barColor: '#f5ab35', duration: 3000  });
	$('#bar4').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar5').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar6').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar7').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar8').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar9').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar10').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar11').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar12').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar13').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar14').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
	$('#bar15').barfiller({ barColor: '#f5ab35', duration: 3000 }); 
}

})(jQuery);