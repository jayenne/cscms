/* ============================================================
 * Data tables
 * initalalize datatables
 * plugin
 * ============================================================ */


window.addEventListener('DOMContentLoaded', function() {
    
    (function($) {
        
        $(document).ready(function() {
			
			if(window.jQuery){			    
			
			// DATATABLES 
				
				$('table[data-table="ordering"]').DataTable( {
			        "paging":   true,
			        "ordering": true,
			        "info":     false
			    } );
			    
				
			    $('table[data-table="no-ordering"]').DataTable( {
			        "paging":   true,
			        "ordering": false,
			        "info":     true

			    } );
			}
        });
        
    })(jQuery);
});	