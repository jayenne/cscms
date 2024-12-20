@push('header_styles')
	
@endpush
@push('block_scripts')

@endpush

<div class="form-group">

	<ul class="container-fluid px-0 items-wrapper s-ortable striped-list">
	    
	<!-- ITEMS -->
	@for( $i = 0; $i < $block->present()->itemsMax(); $i++ )
	   
	    <li class="row item mb-1" data-uid="{{ $block->block_uid }}-{{$i}}">
		    
		    <div class="col">
				
				<label>{{ $block->present()->contentLabel('heading') }}</label>
				<textarea class="form-control h-mn-75" type="text" name="content[{{ $block->block_uid }}][{{$i}}][heading]" >{{ $block->present()->content('heading',$i) }}</textarea>
		    </div>
		    <div class="col">
		    	<label>{{ $block->present()->contentLabel('content') }}</label>
				<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>

		    	<label>{{ $block->present()->contentLabel('footer') }}</label>
				<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][footer]" value="{{ $block->present()->content('footer',$i) }}" />
		    				
			</div>
					    
	    </li>
	    
	@endfor
	
	</ul>

</div>