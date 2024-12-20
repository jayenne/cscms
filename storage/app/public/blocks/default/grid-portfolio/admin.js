// GRID PORTFOLIO
/*
$('.modal').on('shown.bs.modal', function (e) {

    var $modal = $(this);
    var $blockid = "#content_"+$modal.attr('data-block-id');

	var $wrapper	= $modal.find('.sortable');
	var $items		= $wrapper.children();

    var $del_btn = $(".delete-item");

    
    // delete slide item
    $($del_btn).click(function(e){ //on add input button click
        
        e.preventDefault();
        
        $item = $(this).closest('[data-uid]');
        $items = $item.siblings().addBack();
    
        $n = $items.length;
    
        $(this).parent().slideUp('500',function(){
            $this = $(this);
            $uid = $this.attr('data-uid');
            
            $this.remove();
            isUpdated( true);
            var $tmp = $($blockid).find('li[data-uid="'+$uid+'"]');
            $tmp.remove();

        });
        
    });
		
	// LFM FILEMANAGER
		var domain = "/blockmanager";
		$('[data-lfm="image"]').filemanager('image', {prefix: domain});
});
*/