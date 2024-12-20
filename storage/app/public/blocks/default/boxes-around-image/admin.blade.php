<div class="form-group">
	
	<div class="row item mb-1" data-uid="{{ $block->block_uid }}">
    
	    <div class="col-8">
	
		    <label class="mx-auto text-center">{{ $block->present()->contentLabel('heading') }}</label>
		    <input class="form-control" type="text" name="content[{{ $block->block_uid }}][heading]" value="{{ $block->present()->content('heading') }}">
		  
		    <label>{{ $block->present()->contentLabel('sub-heading') }}</label>
		    
		    <textarea class="form-control" name="content[{{ $block->block_uid }}][sub-heading]" >{{ $block->present()->content('sub-heading') }}</textarea>
	 
	    </div>
	
		<div class="col-4 fileupload-wrapper">
			
			<img id="preview-{{$block->block_uid}}" class="image-current img-fluid" src="{{ $block->present()->content('image') }}" {!! $block->present()->imagePlaceholderError() !!}>
			
			<div class="image-uploader">
				
				<div class="input-group">
					
					<span class="input-group-btn">
			
						<div class="btn-group" role="group" aria-label="images add/remove">
							<div type="button" class="btn btn-success" data-lfm="image" data-input="thumbnail-{{$block->block_uid}}" data-preview="preview-{{$block->block_uid}}" ><i class="fas fa-image"></i> @lang('admin.btn_insert',['1'=>'image'])</div>
							<div type="button" class="btn btn-danger @isnil( $block->present()->content('image') )hide @endisnil" data-lfm-remove-image="{{$block->block_uid}}"><i class="fas fa-trash"></i></div>
						</div>
		
					</span>
					
		
					<input id="thumbnail-{{$block->block_uid}}" type="hidden" value="{{ $block->present()->content('image') }}" name="content[{{ $block->block_uid }}][image]">
				</div>
			
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="form-group">

	<ul class="container-full-with px-0 items-wrapper s-ortable striped-list">

@for( $i = 0; $i < 5; $i++ )
	<li class="col item " data-uid="{{ $block->block_uid }}-{{$i}}">
		
		<div class="">
		   		    
		    <label>{{ $block->present()->contentLabel('content-heading') }}  </label>
		    <input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][content-heading]" value="{{ $block->present()->content('content-heading',$i) }}">
		
		    <label>{{ $block->present()->contentLabel('content') }} </label>
		    <textarea class="form-control" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>
		
		</div>
	
	</li>
@endfor
	

	</ul>
	
</div>