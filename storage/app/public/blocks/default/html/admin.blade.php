@push('block_stylesheets')
{{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">--}}
@endpush
@push('header_styles')
@endpush
@push('block_scripts')
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>--}}
@endpush

<div class="form-group">
	
    <label>{{ $block->present()->contentLabel('heading') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][heading]" rows="3">{{ $block->present()->content('heading') }}</textarea>
    
    <label>{{ $block->present()->contentLabel('content') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][content]" rows="3">{{ $block->present()->content('content') }}</textarea>
    
    <label>{{ $block->present()->contentLabel('footer') }}</label>
    <textarea class="form-control" name="content[{{ $block->block_uid }}][footer]" rows="3">{{ $block->present()->content('footer') }}</textarea>

</div>
