window.addEventListener('DOMContentLoaded', function() {
    
    (function($) {
        
        $(document).ready(function() {
			
			if(window.jQuery){

				// SHRINKABLE NAV
				
				$(window).scroll(function() {
					
					
					if ($(document).scrollTop() > 50) {
						
						$('nav').addClass('shrinkable');
					
					} else {
						
						$('nav').removeClass('shrinkable');
					
					}
					
				});
	        }
	        
		
		});
		
	})(jQuery);
	
});

// SCROLL FIX 
window.addEventListener('DOMContentLoaded', function() {
    
    (function($) {
        
        $(document).ready(function() {
			
			if(window.jQuery){

				// BOOTSTRAP SCROLL-SPY
				$('body').scrollspy({ target: '#subnav' });
				
				// SMOOTH SCROLL NAVIGATION
				function scrollNav() {	

					$('a[href*="#"]')
						
						.not('[href="#"]')
						.not('[href="#0"]')
						.click(function(event) {

							if (
								location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
								&& 
								location.hostname == this.hostname
							) {

								var target = $(this.hash);
								target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

								if (target.length) {

									event.preventDefault();
									$('html, body').animate({
										scrollTop: target.offset().top
									}, 1000, function() {

										var $target = $(target);
										$target.focus();
										if ($target.is(":focus")) {
										return false;
									
									} else {
										
										$target.attr('tabindex','-1');
										$target.focus();
										
									};
								});
							}
						}
					});
				};
					
			    scrollNav();	
	        }
	        
		
		});
		
	})(jQuery);
	
});