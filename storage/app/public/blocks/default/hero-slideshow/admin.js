$('#blockModal').on('shown.bs.modal', function (e) {

    var $modal = $(this);
    var $blockid = "#content_"+$modal.attr('data-block-id');

    
    function reindexUIDs($items){

        $items.each(function(i){
            
            $this = $(this);
            $uid = $this.attr('data-uid');
            $this.attr('data-uid',assignNewID($uid,i));
        
        });       
        
    }

    function reindexAttribute($items,$attr='id',$num=0){

        $items.each(function(i){
            
            if($num != 0) i=$num;
            
            $this = $(this);
            $uid = $this.attr($attr);
            $this.attr($attr,assignNewID($uid,i));

        });       
        
    }

    function reindexDataInputs($items){

        $items.each(function(i){
            
            $this = $(this);
            $uid = $this.attr('[data-input]');
            $this.attr('[data-input]',assignNewID($uid,i));
        
        });       
        
    }
    
    function assignNewID($str,$num=0){
        
        if (!$str) return;
        
        var $arr = $str.split("-");
        
        $arr.pop();
        
        $arr.push($num);
        
        return $arr.join('-');
                        
    }

    
    function getIndex($str){
        
        if (!$str) return 0;
        
        var $arr = $str.split("-");
        
        $num = $arr.pop();
        
        return $num;
                        
    }

    function reindexNames($items,$num=0){

        $items.each(function(i){
            if($num > 0){
                i = $num;
            }
            
            $this = $(this);
            $name = $this.attr('name');
            $n = assignNewName($name,i);
                        
            $this.attr('name',$n);
        
        });       
        
    }

    function assignNewName($str, $num=0){
        
        if (!$str) return;
        
        var $arr = $str.split(/[\[\]]+/g).filter(function(v){return v!==''});
        $first = $arr.shift();
        $arr.pop();
        $arr.push($num);

        return $first+'['+$arr.join('][')+']';
    
    }

    
// INIT SLIDES
	var $n = 0; //initlal text box count

// ADD / DELETE SLIDES
    var $min_items	= 2;
    var $max_items	= 5;
	var $wrapper	= $modal.find('.sortable');
	var $items		= $wrapper.children();
	
	$n = $items.length;
		
	// SET UP CLONE
	var $item				= $($items).first().clone(true,true);
	var $placeholder_img	= $($item).find('img').attr('placeholder');
	
	$($item.find(':input')).val('');
	$($item.find('img')).attr('src',$placeholder_img);
			
    var $add_btn	= $(".add-item");
    var $dup_btn	= $(".duplicate-item");
    var $del_btn	= $(".delete-item");
	
    // delete slide item
	$($del_btn).click(function(e){ //on add input button click
        
        e.preventDefault();
        
        $item = $(this).closest('[data-uid]');
        $items = $item.siblings().addBack();

        $n = $items.length;

        if($n > $min_items){ //max input box allowed
            
            $(this).parent().slideUp('500',function(){
                $this = $(this);
                $uid = $this.attr('data-uid');
                
                $this.remove();
                
                var $tmp = $($blockid).find('li[data-uid="'+$uid+'"]');
                $tmp.remove();
                
                console.log('deleted item',$uid,$tmp);
                isUpdated(true);

            });
            
        }
        
    });
    
	// add slide item
	/*    
    $($add_btn).click(function(e){
        e.preventDefault();

        //console.log('add', $n , $max_items);
        //console.log('blockid',$blockid);
        
        if($n < $max_items){
			//rebuild data
			$id = $item.attr('[data-uid]');
			$name = '';
			$preview = '';
			$thumbnail = '';
						
            // increment... 
            // img id="preview-{{$block->block_uid}}"
            // a data-lfm="image" 
            // a data-input="thumbnail-{{$block->block_uid}}"
            // a data-preview="preview-{{$block->block_uid}}"
            // input id="thumbnail-{{$block->block_uid}}
            // input name="content[{{ $block->block_uid }}][image]"
            
            $($wrapper).append($item); //add input box

            $n++; //increment items
        }
    
    });
   */
    
    // duplicate slide item
	$($dup_btn).click(function(e){ //on add input button click
        e.preventDefault();

        $item = $(this).closest('[data-uid]');
        $items = $item.siblings().addBack();

        $n = $items.length;
        
        if($n < $max_items){

            $source = $(this).closest('[data-uid]');
			$item = $source.clone(true);
			$items = $item.siblings().addBack();
			
			//console.log('item1',$item);
			
			// reindex item id
			reindexUIDs($items);			

			$items.each(function(){
    			
    			$num = getIndex($(this).attr('data-uid'));

                //console.log('this item:',$this, $num);

    			
                // reindex input names
                $inputs = $(this).find('[name]');
                reindexNames($inputs,$num);
                

                // reindex input ids
    			$inputs = $(this).find('[id]');
                reindexAttribute($inputs,'id',$num);
    			//console.log('iditems:',$iditems);

                // reindex lfm buttons
                $inputs = $(this).find('[data-input]');
                reindexAttribute($inputs,'data-input',$num);
                
                $inputs = $(this).find('[data-preview]');
                reindexAttribute($inputs,'data-preview',$num);
    			          
                $inputs = $(this).find('[data-lfm-remove-image]');
                reindexAttribute($inputs,'data-lfm-remove-image',$num);
    			
			});
			
			$item = $item.clone(true).hide().insertAfter($source).slideDown();
			//console.log('item2',$item);
        }
        
    });

    
// LFM FILEMANAGER
	var $domain = "/blockmanager";
	$('[data-lfm="image"]').filemanager('image', {prefix: $domain});

    // image buttons
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