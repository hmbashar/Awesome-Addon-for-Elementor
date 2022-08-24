(function($){
	"use strict";

/*-----------------------
Both Page
-------------------------*/

	// Our Talent Slider
	$(".our-talent-slider-content").owlCarousel({				
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



})(jQuery);