@push('header_styles')
	
@endpush
@push('block_scripts')

@endpush

<div class="form-group">

	<ul class="container-fluid px-0 items-wrapper s-ortable striped-list">
	    
	    <!-- ITEMS -->

	@for( $i = 0; $i < $block->present()->itemsMax(); $i++ )
	   
	    <li class="row item" data-uid="{{ $block->block_uid }}-{{$i}}">
		    
		    <div class="col">
				
				<label>{{ $block->present()->contentLabel('heading') }}</label>
				<input type="text" class="form-control" name="content[{{ $block->block_uid }}][{{$i}}][heading]" value="{{ $block->present()->content('heading',$i) }}" />
		    
				<label>{{ $block->present()->contentLabel('link') }}</label>
				<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][link]" value="{{ $block->present()->content('link',$i) }}" />

			</div>
		    
			<div class="col-4 fileupload-wrapper">
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
		    
	    </li>
	    
	@endfor
	
	</ul>

</div>