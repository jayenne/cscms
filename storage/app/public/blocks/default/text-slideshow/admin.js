function itemiseImputNameContent($items){
	
	// iterate all input where name=content[][] within this item 
	//console.log('IL:',$items.length);
	
	$items.each(function(i){

		$named = $items.find('[name^="content"]');
		
		$named.each(function(){
			
			$name = $(this).attr('name');
	
			$split = $name.split('\[' );

			$str = $split[0]+'['+$split[1]+'['+$split[2]+'['+i+']';
				
		});
	
 
	});
	
	
}

$('.modal').on('shown.bs.modal', function (e) {
	
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
		
		$($item.find(':input')).val('');
				
	    var $add_btn	= $(".add.btn");
	    var $del_btn	= $(".del.btn");
			    
	    $($add_btn).click(function(e){
	        e.preventDefault();

	        if($n < $max_items){
				//rebuild data
				$id = $item.attr('[data-uid]');
				$name = '';				
				
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
