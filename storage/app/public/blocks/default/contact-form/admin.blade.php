<div class="form-group">

	<div class="row">
	    
	    <div class="col-6 px-1 switchable col-6 @if( $block->present()->content( 'content-order' ) == '1')order-last @endif">

		    <label>{{ $block->present()->contentLabel('heading') }}</label>
		    <input class="form-control mb-3" name="content[{{ $block->block_uid }}][heading]" value="{{ $block->present()->content('heading',0) }}" />
	
			<label>{{ $block->present()->contentLabel('content') }}</label>
		    <textarea class="form-control" name="content[{{ $block->block_uid }}][content]" >{{ $block->present()->content('content') }}</textarea>

			<label>{{ $block->present()->contentLabel('footer') }}</label>
		    <textarea class="form-control" name="content[{{ $block->block_uid }}][footer]" >{{ $block->present()->content('footer') }}</textarea>

		    <label>{{ $block->present()->contentLabel('link') }}</label>
		    <input class="form-control mb-3" name="content[{{ $block->block_uid }}][link]" value="{{ $block->present()->content('link') }}" />

			<div class="input-group mt-3">
					
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
	    
	    <div class="col-6 px-2">

		    <label>{{ $block->present()->contentLabel('heading-right') }}</label>
		    <input class="form-control mb-3" name="content[{{ $block->block_uid }}][heading-right]" value="{{ $block->present()->content('heading-right') }}" />
		
			
			<div class="map-wrapper">
				
				<iframe src="https://snazzymaps.com/embed/96148" width="100%" style="height:350px;border:none;"></iframe>
			
			</div>

	    </div>
	    
    </div>

</div>