<div class="form-group">
    
    <label class="mx-auto text-center">{{ $block->present()->contentLabel('heading') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][heading]" >{{ $block->present()->content('heading') }}</textarea>
	
	@for( $i = 0; $i < $block->present()->itemsCount('content'); $i++ )
    
    <label>{{ $block->present()->contentLabel('content') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>
	
	@endfor
    
    <label>{{ $block->present()->contentLabel('footer') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][footer]" >{{ $block->present()->content('footer') }}</textarea>
	
</div>
