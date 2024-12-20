<div class="form-group">

	<ul class="container-fluid px-0 sortable striped-list">

    <!-- ITEMS -->
	@for( $i = 0; $i < $block->present()->itemsMax(); $i++ )

	    <li class="row item mb-1" data-uid="{{ $block->block_uid }}-{{$i}}">
		    
		    {{--<div class="btn delete-item"><i class="fas fa-trash"></i></div>--}}
		    
		    {{--<div class="btn duplicate-item" ><i class="fas fa-copy"></i></div>--}}
		    
		    <div class="col">
				
				<label>{{ $block->present()->contentLabel('heading') }}</label>
				<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][heading]" >{{ $block->present()->content('heading',$i) }}</textarea>
		    	
		    	<label>{{ $block->present()->contentLabel('content') }}</label>
				<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>

		    	<label>{{ $block->present()->contentLabel('footer') }}</label>
				<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][footer]" value="{{ $block->present()->content('footer',$i) }}" />
		    				
			</div>
		    
			<div class="col-4">
    			<div class="fileupload-wrapper w-100 h-100 d-flex align-items-center jusitfy-content-center">
                    <img id="preview-{{$block->block_uid}}-{{$i}}" class="image-current img-fluid" src="{{ $block->present()->content('image',$i) }}" {!! $block->present()->imagePlaceholderError() !!}>
    				<div class="image-uploader">
    					
    					<div class="input-group">
    						
    						<span class="input-group-btn">
    				
    							<div class="btn-group" role="group" aria-label="images add/remove">
    								<div type="button" class="btn btn-success" data-lfm="image" data-input="thumbnail-{{$block->block_uid}}-{{$i}}" data-preview="preview-{{$block->block_uid}}-{{$i}}" ><i class="fas fa-image"></i> @lang('admin.btn_insert',['1'=>'image'])</div>
    								<div type="button" class="btn btn-danger @isnil( $block->present()->content('image',$i) )hide @endisnil" data-lfm-remove-image="{{$block->block_uid}}-{{$i}}"><i class="fas fa-trash"></i></div>
    							</div>
    
    						</span>
    						
    
    						<input id="thumbnail-{{$block->block_uid}}-{{$i}}" type="hidden" value="{{ $block->present()->content('image',$i) }}" name="content[{{ $block->block_uid }}][{{$i}}][image]">
    					</div>
    				</div>
				</div>
		    </div>
		    
	    </li>
	    
	@endfor
	
	</ul>
	
    {{--<div class="btn add-item"><i class="fas fa-plus"></i></div>--}}

</div>