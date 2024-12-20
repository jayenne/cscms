<div class="form-group">
	
    <label>{{ $block->present()->contentLabel('content') }}</label>
    <textarea class="form-control"  name="content[{{ $block->block_uid }}][content]" rows="3">{{ $block->present()->content('content') }}</textarea>

</div>
