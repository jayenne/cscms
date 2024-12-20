function itemiseImputNameContent($items){
	
	// iterate all input where name=content[][] within this item 
	//console.log('IL:',$items.length);
	
	$items.each(function(i){

		$named = $items.find('[name^="content"]');
		
		$named.each(function(){
			
			$name = $(this).attr('name');
	
			$split = $name.split('\[' );

			$str = $split[0]+'['+$split[1]+'['+$split[2]+'['+i+']';
			
			//console.log('i:',i,' newstr:', $str);
	
		});
	
 
	});
	
	
}

$('.modal').on('shown.bs.modal', function (e) {
		
	// LFM FILEMANAGER
		var $domain = "/blockmanager";
		$('[data-lfm="image"]').filemanager('image', {prefix: $domain});
	
	
    
	// INIT SLIDES
		var $n = 0; //initlal text box count
	
	//

	// ADD / DELETE SLIDES
	    var $min_items	= 2;
	    var $max_items	= 5;
        var $items		= $(".item");
	    var $wrapper	= $items[0].closest('ul');

		
		itemiseImputNameContent( $($wrapper) );
		
		// SET UP CLONE
		var $item				= $($items).first().clone();
		var $placeholder_img	= $($item).find('img').data('placeholder');
		
		$($item.find(':input')).val('');
		$($item.find('img')).attr('src',$placeholder_img);
				
	    var $add_btn	= $(".add.btn");
	    var $del_btn	= $(".del.btn");
			    
	    $($add_btn).click(function(e){
	        e.preventDefault();

	        console.log('add', $n , $max_items);

	        if($n < $max_items){
				//rebuild data
				$id = $item.attr('[data-uid]');
				$name = '';
				$preview = '';
				$thumbnail = '';
				
				
				
				
				
				console.log('ITEM: ',$id, $name, $preview, $thumbnail);
	            // increment... 
	            // img id="preview-{{$block->block_uid}}"
	            // a data-lfm="image" 
	            // a data-input="thumbnail-{{$block->block_uid}}"
	            // a data-preview="preview-{{$block->block_uid}}"
	            // input id="thumbnail-{{$block->block_uid}}
	            // input name="content[{{ $block->block_uid }}][image]"
	            
	            $($wrapper).append($item); //add input box
	            
	            itemiseImputNameContent( $($wrapper) );

	            $n++; //increment items
	        }
	    
	    });
	   
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
	
		
		$($del_btn).click(function(e){ //on add input button click
	        e.preventDefault();
	        
	        console.log('del', $n , $min_items);
	        
	        if($n > $min_items){ //max input box allowed
	            $(this).closest('.item').remove();
	            itemiseImputNameContent( $($wrapper) );
	            $n--; //text box decrement
 
 	        }
	        
	    });

	
	    
});
