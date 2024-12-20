/* ============================================================
 * Nestables
 * Creates draggable, nested list structures using jQuery Nestable
 * plugin
 * ============================================================ */


	window.addEventListener('DOMContentLoaded', function() {
        
        (function($) {
            
            $(document).ready(function() {
				
				if(window.jQuery){			    
				
				// NESTABLES / PAGELIST			        
			        $('#nestabledemo').nestable();
			        $('#pageschema').nestable();
			        $('#pagelist').nestable();

				}

            });
            
        })(jQuery);
    });