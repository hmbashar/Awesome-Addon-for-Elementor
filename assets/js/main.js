(function($){
	"use strict";

/*-----------------------
Both Page
-------------------------*/
	// Mobile Menu
	$('.main-menu').slicknav();

	// Latest news / Blog Slider
	$(".latest-news-content").owlCarousel({				
			items: 3,
			autoplay: true,
			dots: false,				
			loop: true,				
			nav: true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			margin:40,
			center: true,
			responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:1
			        },
			        750:{
			        	items:1
			        },
			        1000:{
			            items:3
			        }
			    }

		});
		// Google Maps
		$('.location-title h2').on('click', function(){
			$('.location-in-map').slideToggle(500);
			$(this).children('span').toggleClass('location-icon-rotate');
		});

		// scroll menu hover effect 
		// Cache selectors
		var lastId,
		    topMenu = $("#main-menu"),
		    topMenuHeight = topMenu.outerHeight()+15,
		    // All list items
		    menuItems = topMenu.find("a"),
		    // Anchors corresponding to menu items
		    scrollItems = menuItems.map(function(){
		      var item = $($(this).attr("href"));
		      if (item.length) { return item; }
		    });

		// Bind click handler to menu items
		// so we can get a fancy scroll animation
		menuItems.click(function(e){
		  var href = $(this).attr("href"),
		      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
		  $('html, body').stop().animate({ 
		      scrollTop: offsetTop
		  }, 300);
		  e.preventDefault();
		});

		// Bind to scroll
		$(window).on('scroll', function(){
		   // Get container scroll position
		   var fromTop = $(this).scrollTop()+topMenuHeight;
		   
		   // Get id of current scroll item
		   var cur = scrollItems.map(function(){
		     if ($(this).offset().top < fromTop)
		       return this;
		   });
		   // Get the id of the current element
		   cur = cur[cur.length-1];
		   var id = cur && cur.length ? cur[0].id : "";
		   
		   if (lastId !== id) {
		       lastId = id;
		       // Set/remove active class
		       menuItems
		         .parent().removeClass("active-menu")
		         .end().filter("[href='#"+id+"']").parent().addClass("active-menu");
		   }                   
		});


/*-----------------------
Index One
-------------------------*/
		// Main Slider
		$(".sliders").owlCarousel({
				
				items: 1,
				autoplay: true,				
				loop: true						
		});

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
		// Testimonial Slider
		$(".testimonial-content-area").owlCarousel({				
				items: 1,
				autoplay: true,
				dots: true,				
				loop: true,				
				nav: true,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

		});
		//Apps Slider
		$('.apps-screen-slider').waterwheelCarousel({			
			keyboardNav: true
		});
		// Project Counter
		$('.procounter').counterUp({
				delay: 10,
				time: 1000
		});
		//video popup from youtube
		$('.awesome-video-play').magnificPopup({
			items: [
				{
			        src: 'https://www.youtube.com/watch?v=vCdBIRtsL6o',
			        type: 'iframe'
			      },
			]
		});

	// Menu Position Fixed Added Class
	$(window).on('scroll', function(){
		var header_height = $('.header-area').height();
		var winWidth = $(window).width();

		if($(window).scrollTop() > header_height && winWidth > 760){
			$('.fixedmenu').addClass('fixed-menu')
		}
		else{
			$('.fixedmenu').removeClass('fixed-menu');
		}
	});
/*----------------------------
Index Two
------------------------------*/
		// Main Slider
		$('.home-two-sliders').owlCarousel({
			dots: false,
			items: 1,
			loop: true,
			autoplay:true
		});
		// Project Counter
		$('.single-sta-counter').counterUp({
				delay: 10,
				time: 1000
		});
		// Some Review Slider
		$('.some-review-content-slide').owlCarousel({
			dots: false,
			items: 4,
			loop: true,
			autoplay:true,
			responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },
			        750:{
			        	items:2
			        },
			        1000:{
			            items:4
			        }
			    }
		});
		// Data Fancybox

		//video popup from youtube
		$('.popup-youtube').magnificPopup({
			items: [
				{
			        src: 'https://www.youtube.com/watch?v=vCdBIRtsL6o',
			        type: 'iframe'
			      },
			]
		});

	// Menu Position Fixed Added Class
	$(window).on('scroll', function(){
		var header_height = $('.header-top').height();
		var finalHheight = header_height + 200;		
		var hwinWidth = $(window).width();
		if($(window).scrollTop() > finalHheight && hwinWidth > 760){
			$('.header-top').addClass('fixed_menu')
		}
		else{
			$('.header-top').removeClass('fixed_menu');
		}
	});


})(jQuery);