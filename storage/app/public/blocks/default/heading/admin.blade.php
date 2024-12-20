<div class="form-group">
	
    <label>{{ $block->present()->contentLabel('heading') }}</label>
    <input type="text" class="form-control" name="content[{{ $block->block_uid }}][heading]" value="{{ $block->present()->content('heading') }}"/>

    <label>{{ $block->present()->contentLabel('subheading') }}</label>
    <input type="text" class="form-control" name="content[{{ $block->block_uid }}][subheading]" value="{{ $block->present()->content('subheading') }}"/>

</div>
