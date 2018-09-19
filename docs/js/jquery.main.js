$(document).ready(function() {

	"use strict";	
	
	initStickyHeader();
	// sticky header init
	function initStickyHeader() {
		"use strict";

		var win = jQuery(window),
			stickyClass = 'sticky';

		jQuery('#header').each(function() {
			var header = jQuery(this);
			var headerOffset = header.offset().top || 0;
			var flag = true;


			jQuery(this).css('height' , jQuery(this).innerHeight());

			function scrollHandler() {
				if (win.scrollTop() > headerOffset) {
					if (flag){
						flag = false;
						header.addClass(stickyClass);
					}
				} else {
					if (!flag) {
						flag = true;
						header.removeClass(stickyClass);
					}
				}
			}

			scrollHandler();
			win.on('scroll resize orientationchange', scrollHandler);
		});
	}

	
	$.scrollIt({
		topOffset: -68,
		scrollTime: 1500,
		easing: 'easeInOutExpo'
	});

	initCounter();
	// Counter init
	function initCounter() {
		"use strict";

		jQuery('.counter').counterUp({
			delay: 10,
			time: 2000
		});
	}

	initSlickSlider();
	function initSlickSlider() {
		"use strict";

		jQuery('.main-slider').slick({
		  fade: true,
		  speed: 300,
		  dots: true,
		  arrows: false,
		  autoplay: true,
		  infinite: true,
		  centerPadding: '0'
		});
		jQuery('.testimonials-gallery').slick({
		  dots: false,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 1,
		  centerPadding: '15%',
		  centerMode: true,
		  adaptiveHeight: true,
		  autoplay: true,
	  	  autoplaySpeed: 2000
		});
		jQuery('.line-slider').slick({
			speed: 800,
			dots: false,
			arrows: false,
			infinite: true,
			autoplay: true,
			slidesToShow: 6,
			autoplaySpeed: 2000,
			adaptiveHeight: true,
			responsive: [
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 4
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 3
					}
				},
				{
				breakpoint: 480,
					settings: {
						slidesToShow: 2
					}
				}
			]
		});
	}

	initLightbox();
	// modal popup init
	function initLightbox() {
		
		"use strict";

		jQuery('a.lightbox, a[rel*="lightbox"]').fancybox({
			padding: 0
		});
	}

	initbackTop();
	// sticky header init
	function initbackTop() {
		"use strict";

		var jQuerybackToTop = jQuery("#back-top");
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > 100) {
				jQuerybackToTop.addClass('active');
			} else {
				jQuerybackToTop.removeClass('active');
			}
		});
		jQuerybackToTop.on('click', function(e) {
			jQuery("html, body").animate({scrollTop: 0}, 500);
		});
	}

	initSameHeight();
	// align blocks height
	function initSameHeight() {
		"use strict";

		jQuery('.sameheight-container').sameHeight({
			elements: '.sameheight',
			useMinHeight: true,
			flexible: true,
			multiLine: true
		});
	}

	initStyleChanger();
	// style changer
	function initStyleChanger() {
		"use strict";
		
		var element = jQuery('#style-changer');

		if(element) {
			$.ajax({
				url: element.attr('data-src'),
				type: 'get',
				dataType: 'text',
				success: function(data) {
					var newContent = jQuery('<div>', {
						html: data
					});

					newContent.appendTo(element);
				}
			});
		}
	}

	initVegasSlider();
	function initVegasSlider() {
	jQuery("#bgvid").vegas({
	  slides: [
	    {   src: 'images/polina.jpg',
	        video: {
	            src: [
	                'video/polina.webm',
	                'video/polina.mp4'
	            ],
	            loop: true,
	            timer: false,
	            mute: true
	        }
	    }
	]
	});
	}

	initTextRotator();
	// TextRotator init
	function initTextRotator() {
		"use strict";

		jQuery("#js-rotating").Morphext({
			// The [in] animation type. Refer to Animate.css for a list of available animations.
			animation: "bounceIn",
			// An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
			separator: ",",
			// The delay between the changing of each phrase in milliseconds.
			speed: 2000,
			complete: function () {
			    // Called after the entrance animation is executed.
			}
		});
	}

	initTextRotator2();
	// TextRotator2 init
	function initTextRotator2() {
		"use strict";

		jQuery('#rotating2').textillate({
			selector: '.rotating-hold',

			// enable looping
			loop: true,

			// sets the minimum display time for each text before it is replaced
			minDisplayTime: 2000,

			// sets the initial delay before starting the animation
			// (note that depending on the in effect you may need to manually apply
			// visibility: hidden to the element before running this plugin)
			initialDelay: 0,

			// set whether or not to automatically start animating
			autoStart: true,

			// custom set of 'in' effects. This effects whether or not the
			// character is shown/hidden before or after an animation
			inEffects: [],

			// custom set of 'out' effects
			outEffects: [ 'hinge' ],

			// in animation settings
			in: {
				// set the effect name
				effect: 'fadeInLeftBig',

				// set the delay factor applied to each consecutive character
				delayScale: 1.5,

				// set the delay between each character
				delay: 50,

				// set to true to animate all the characters at the same time
				sync: false,

				// randomize the character sequence
				// (note that shuffle doesn't make sense with sync = true)
				shuffle: false,

				// reverse the character sequence
				// (note that reverse doesn't make sense with sync = true)
				reverse: false
			},
			out: {
				effect: 'hinge',
				delayScale: 1.5,
				delay: 50,
				sync: false,
				shuffle: false,
				reverse: false,
			},
			type: 'char'
		});
	}

});

jQuery( window ).on( "load" , function() {
	"use strict";

	jQuery( "#loader" ).delay( 600 ).fadeOut( 300 );

});