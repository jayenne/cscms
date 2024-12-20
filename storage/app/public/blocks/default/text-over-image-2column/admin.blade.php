<div class="form-group">

	<div class="row">
	    
	    <div data-order class="col-6">
	    	
	    	<label>{{ $block->present()->contentLabel('heading') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][heading]" >{{ $block->present()->content('heading') }}</textarea>
	    	
	    	<label>{{ $block->present()->contentLabel('content') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][content]" >{{ $block->present()->content('content') }}</textarea>
	    
	    	<label>{{ $block->present()->contentLabel('footer') }}</label>
			<input class="form-control" type="text" name="content[{{ $block->block_uid }}][footer]" value="{{ $block->present()->content('footer') }}" />	
		
	    </div>
	    
	    <div data-order class="col-6">
	    	
	    	<label>{{ $block->present()->contentLabel('heading') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][heading-right]" >{{ $block->present()->content('heading-right') }}</textarea>
	    	
	    	<label>{{ $block->present()->contentLabel('content') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][content-right]" >{{ $block->present()->content('content-right') }}</textarea>
	    
	    	<label>{{ $block->present()->contentLabel('footer') }}</label>
			<input class="form-control" type="text" name="content[{{ $block->block_uid }}][footer-right]" value="{{ $block->present()->content('footer-right') }}" />	
		
	    </div>
	
	</div>
	
</div>

<div class="form-group">

	<div class="row">    	 	    
	    
	    <div class="col-12 fileupload-wrapper">
			<img id="preview-{{$block->block_uid}}" class="image-current img-fluid" src="{{ $block->present()->content('image') }}" {!! $block->present()->imagePlaceholderError() !!} >
			
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