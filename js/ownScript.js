jQuery(document).ready(function(){
/*global jQuery:false */
/*jshint devel:true, laxcomma:true, smarttabs:true */
"use strict";

	jQuery(function() {
		if (jQuery.browser.webkit) {
			jQuery(".slider_full img").css('position','relative');
			jQuery(".slider_full img").css('top','auto');
		}
		
		if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1){
			jQuery(".section").css('background-attachment','scroll');
			jQuery(".section").css('background-position','50% 0px');
		}
	});



	  // change header - depends o scroll
			//jQuery(window).scroll(function () {
				//if (jQuery(this).scrollTop() > 0) {
				//    jQuery('#header h1').addClass('showme');
				//    jQuery('#nav').addClass('nav_classic');
				//} else {
				//	jQuery('#header h1').removeClass('showme');
				//	jQuery('#nav').removeClass('nav_classic');
				//}
			//});
	

	// add header_scroll class when refresh
	  jQuery(function() {
	  
		  // grab the initial top offset of the navigation 
		  var sticky_navigation_offset_top = jQuery('body').offset().top;
		  
		  // our function that decides weather the navigation bar should have "fixed" css position or not.
		  var sticky_navigation = function(){
			  var scroll_top = jQuery(window).scrollTop() > 0; // our current vertical position from the top
			  
			  // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
			  if (scroll_top > sticky_navigation_offset_top) { 
					jQuery('#nav').addClass('nav_classic');
					jQuery('#header img').fadeIn();
			  }  
		  };
  
		  // run our function on load
		  sticky_navigation();
		  
		  // and run it again every time you scroll
		  jQuery(window).scroll(function() {
			   sticky_navigation();
		  });
		  
	  });




	// add nav current class on load
	jQuery(function() {
		jQuery('#nav li:first').addClass('current');
	});
	
	// initiate page scroller plugin	
	jQuery('.scroll').onePageNav({
		begin: function() {
		console.log('start');},
		end: function() {
		console.log('stop');},
		filter: ':not(.external a)'
	});


	// add spec class to nav
	jQuery("ul.sub-menu,ul.children").parents().addClass('scrollparent');

	// parallax
	jQuery('.section').parallax("50%", 0.05);
	jQuery('.section_template').parallax("50%", 0.6);


	// trigger + show menu on fire
	  jQuery(window).resize(function() {
	  /*If browser resized, check width again */
		  if (jQuery(window).width() < 639) {
			   jQuery('#navigation').addClass('hidenav');
			   jQuery('a#navtrigger').addClass('showtrig');
			  }
		  else {
			  jQuery('#navigation').removeClass('hidenav');
			  jQuery('a#navtrigger').removeClass('showtrig');}
	  });
	  
        jQuery('a#navtrigger').click(function(){ 
                jQuery('#navigation').toggleClass('shownav'); 
                jQuery('#sec-nav').toggleClass('shownav'); 
                jQuery(this).toggleClass('active'); 
                return false; 
        });

	// fading out/in slider stuff
	var fadeStart=100 // 100px scroll or less will equiv to 1 opacity
		,fadeUntil=500 // 500px scroll or more will equiv to 0 opacity
		,fading = jQuery('.stuff,#header_bottom,.section_template h2')
	;
	
	jQuery(window).bind('scroll', function(){
		var offset = jQuery(document).scrollTop()
			,opacity=0
		;
		if( offset<=fadeStart ){
			opacity=1;
		}else if( offset<=fadeUntil ){
			opacity=1-offset/fadeUntil;
		}
		fading.css('opacity',opacity);
	});


	/* wp gallery hover */	
			
	jQuery('.item_full,.item_carousel,.item_slider').hover(function() {
		jQuery(this).find('a.hoverstuff-link,a.hoverstuff-zoom')
			.animate({opacity: '1'}, 100); 
	
		} , function() {
	
		jQuery(this).find('a.hoverstuff-link,a.hoverstuff-zoom')
			.animate({opacity: '0'}, 400); 
	});

	jQuery('.item_full,.item_carousel,.format-image').hover(function() {
		jQuery(this).find('img')
			.animate({opacity: '.1'}, 100); 
	
		} , function() {
	
		jQuery(this).find('img')
			.animate({opacity: '1'}, 400); 
	});



	/* Tooltips */
	jQuery("body").prepend('<div class="tooltip rad"><p></p></div>');
	var tt = jQuery("div.tooltip");
	
	jQuery(".flickr_badge_image a img,ul.social-menu li a,.nav_item i").hover(function() {								
		var btn = jQuery(this);
		
		tt.children("p").text(btn.attr("title"));								
					
		var t = Math.floor(tt.outerWidth(true)/2),
			b = Math.floor(btn.outerWidth(true)/2),							
			y = btn.offset().top - 30,
			x = btn.offset().left - (t-b);
					
		tt.css({"top" : y+"px", "left" : x+"px", "display" : "block"});			
		   
	}, function() {		
		tt.hide();			
	});



	function lightbox() {
		// Apply PrettyPhoto to find the relation with our portfolio item
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			// Parameters for PrettyPhoto styling
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
	}
	
	if(jQuery().prettyPhoto) {
		lightbox();
	}
	
	/* brandsbox */
	jQuery.brandsBox.embed('#home-clients', {
			
			"collection" : "/wp-content/themes/scroller/brandsbox/client.xml",
			"cols" : 6,
			"rows" : 1,
			"scrollingTransition" : "none",
			"scrollingOrientation" : "horizontal",
			"colorMode" : "color",
			"scrollingDelay" : 9999999999999999,
			"startOpacity" : 1,
			"hoverOpacty" : 0.4,
		}); 
		
		jQuery.brandsBox.embed('#web-miniport', {
			
			"collection" : "/wp-content/themes/scroller/brandsbox/web.xml",
			"cols" : 1,
			"rows" : 2,
			"scrollingTransition" : "slide",
			"scrollingOrientation" : "vertical",
			"colorMode" : "color",
			"scrollingDelay" : 5000,
			"startOpacity" : 1,
			"hoverOpacty" : 0.8,
		});
		
		jQuery.brandsBox.embed('#brand-miniport', {
			
			"collection" : "/wp-content/themes/scroller/brandsbox/brand.xml",
			"cols" : 1,
			"rows" : 2,
			"scrollingTransition" : "slide",
			"scrollingOrientation" : "horizontal",
			"colorMode" : "color",
			"scrollingDelay" : 5000,
			"startOpacity" : 1,
			"hoverOpacty" : 0.8,
		});
		

});