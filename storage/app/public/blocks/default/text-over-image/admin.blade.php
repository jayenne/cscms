<div class="form-group">

	<div class="row">
	    
	    <div data-order class="col-6 @if( $block->present()->content( 'content-order' ) == '1')order-last @endif">
	    	
	    	<label>{{ $block->present()->contentLabel('heading') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][heading]" >{{ $block->present()->content('heading') }}</textarea>
	    	
	    	<label>{{ $block->present()->contentLabel('content') }}</label>
			<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][content]" >{{ $block->present()->content('content') }}</textarea>
	    
	    	<label>{{ $block->present()->contentLabel('footer') }}</label>
			<input class="form-control" type="text" name="content[{{ $block->block_uid }}][footer]" value="{{ $block->present()->content('footer') }}" />
	
	{{--
			<div class=" mt-3">						
		
				<div class="btn-group" data-toggle="buttons">
					
					<label class="btn btn-light active">
						<input type="radio" name="content[{{ $block->block_uid }}][alignment]" value="left">
						<i class="fas fa-align-left"></i>
					</label>
				
					<label class="btn btn-light">
						<input type="radio" name="content[{{ $block->block_uid }}][alignment]" value="middle" >
						<i class="fas fa-align-center"></i>
					</label>
				
					<label class="btn btn-light">
						<input type="radio" name="content[{{ $block->block_uid }}][alignment]" value="right">
						<i class="fas fa-align-right"></i>
					</label>
				</div>

			</div>
	--}}	
		
	    </div>
	 	    
	    <div class="col-6 fileupload-wrapper">
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