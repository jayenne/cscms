// TEXT BESIDE IMAGE

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
		
// LFM FILEMANAGER
	var domain = "/blockmanager";
	$('[data-lfm="image"]').filemanager('image', {prefix: domain});
	
});
