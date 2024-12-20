$('.modal').on('shown.bs.modal', function (e) {
	
	// LFM FILEMANAGER
		var $domain = "/blockmanager";
		$('[data-lfm="image"]').filemanager('image', {prefix: $domain});
			
		var $add_btn	= $(".add.btn");
	    var $del_btn	= $(".del.btn");
	    	   
		$('[data-lfm-remove-image]').click(function(e){ //on add input button click
	        
	        e.preventDefault();
	        
	        $id = $(this).data('lfm-remove-image');
	        
	        $preview = $('#preview-'+$id).attr('src','');
	        $thumbnail = $('#thumbnail-'+$id).val('').trigger('change');
	    });
	    
	    $( "input[id^='thumbnail-']" ).change(function() {
			$this = $(this);
			$id = $this.attr('id');
			$str = $id.substring(10);
				
			$("button[data-lfm-remove-image='"+$str+"']").toggleClass('hide');

		});	   
		
});