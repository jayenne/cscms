// CONTACT FORM
/*
$('.modal').on('shown.bs.modal', function (e) {
			
	// L/R SIDE SWITCHER
		$slider = $(this).find('.slider');
		
		$slider.on('click',function(e){
			
			// toggle sides
			$block = $(this).closest('[data-order]');
			$block.toggleClass('order-last');
			
			// toggle checkbox
			el = $(this).data('switch');
			
			$(el).val( Math.abs( $(el).val() - 1) );

			
			console.log( 'checked: ', $(el).val(), $(el).is(':checked') );

		})
		
	// LFM FILEMANAGER
		var domain = "/blockmanager";
		$('[data-lfm="image"]').filemanager('image', {prefix: domain});
});
*/
$('#blockModal').on('shown.bs.modal', function (event) {
	// L/R SIDE SWITCHER
    var $modal = $(this);
    var $blockid = "#content_"+$modal.attr('data-block-id');
    var $block = $modal.find('.switchable');
    var $slider = $($block).find('.slider');
    var $el = $($slider).data('switch');
    var $val = + $($el).is(':checked');
    
    $slider.on('click',function(e){
      
        $val = + $($el).is(':checked');
        $val =  Math.abs( $val - 1);
    	
    	$($el).val($val);			
         
        if( $val == 1 ){
            $block.addClass('order-last');
            $($blockid).find('.switchable').addClass('order-last');
        } else {
            $block.removeClass('order-last');
            $($blockid).find('.switchable').removeClass('order-last');
        }    	
    	    				  		
    })
});