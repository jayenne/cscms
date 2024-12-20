<div class="form-group">
	
    <label>{{ $block->present()->contentLabel('heading') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][heading]" rows="3">{{ $block->present()->content('heading') }}</textarea>
    
    <label>{{ $block->present()->contentLabel('content') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][content]" rows="3">{{ $block->present()->content('content') }}</textarea>
    
    <label>{{ $block->present()->contentLabel('footer') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][footer]" rows="3">{{ $block->present()->content('footer') }}</textarea>

</div>
