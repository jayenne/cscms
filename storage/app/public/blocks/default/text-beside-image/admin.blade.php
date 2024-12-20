<div class="form-group">
	<div class="row">
	    
	    <div class="col-6 px-1 switchable @if( $block->present()->content( 'content-order' ) == '1')order-last @endif">
	    	<label>{{ $block->present()->contentLabel('heading') }}</label>
			<textarea class="form-control " type="text" name="content[{{ $block->block_uid }}][heading]" >{{ $block->present()->content('heading') }}</textarea>
	    	
	    	<label>{{ $block->present()->contentLabel('content') }}</label>
			<textarea class="form-control " type="text" name="content[{{ $block->block_uid }}][content]" >{{ $block->present()->content('content') }}</textarea>
	    
	    	<label>{{ $block->present()->contentLabel('footer') }}</label>
			<input class="form-control" type="text" name="content[{{ $block->block_uid }}][footer]" value="{{ $block->present()->content('footer') }}" />

			<div class="input-group my-3">
					
				<label class="switch md align-self-center" for="{{ $block->block_uid }}-content-order" >
					  
					  <input id="{{ $block->block_uid }}-content-order" name="content[{{ $block->block_uid }}][content-order]" value="1" type="checkbox" {{ $block->present()->contentIsTrueFalse( 'content-order','checked','' ) }}>
					  <span data-switch="#{{ $block->block_uid }}-content-order" class="slider rounded" >
					  	<i class="fas fa-image" data-fa-transform="right-10 down-3"></i>
					  	<i class="fas fa-align-left" data-fa-transform="right-10 down-3"></i>
					  	<i class="fas fa-align-left" data-fa-transform="right-20 down-3"></i>
					  	<i class="fas fa-image" data-fa-transform="right-25 down-3"></i>
					  </span>
				
				</label>
				
				<label class="ml-5 align-self-center">Image / Text Layout</label>
				
			</div>
    	    
	    </div> 
	     
	    <div class="col-6 px-2 fileupload-wrapper">
			<img id="preview-{{$block->block_uid}}" class="image-current img-fluid" src="{{ $block->present()->content('image') }}" {!! $block->present()->imagePlaceholderError() !!}>
			
			<div class="image-uploader">
				
				<div class="input-group">
				
				<span class="input-group-btn">
					<a data-lfm="image" data-input="thumbnail-{{$block->block_uid}}" data-preview="preview-{{$block->block_uid}}" class="btn btn-success">
						<i class="fas fa-image"></i> @lang('admin.btn_insert',['1'=>'image'])
					</a>
				</span>
				
					<input id="thumbnail-{{$block->block_uid}}" type="hidden" value="{{ $block->present()->content('image') }}" name="content[{{ $block->block_uid }}][image]">
				</div>
			
			</div>

	    </div>
	    
    </div>

</div>