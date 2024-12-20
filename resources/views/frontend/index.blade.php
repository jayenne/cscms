@extends('frontend.layouts.index')


@section('content')


<div class="container-full-width">

@if($page->preview)

    <div style="position:fixed;top:0;z-index:999999;padding:3px;"><a href="#" onclick="window.close();return false;" class="badge badge-danger"><i title="Preview mode" class="fa fa-eye-slash"></i></a></div>

@endif

	@if (session('status'))
	   
	    <div class="alert alert-success">
	    
	        {{ session('status') }}
	    
	    </div>
	
	@endif
	
	@if( count($page->blocks) > 0)

		@include('common.pushonce',['domain'=>'display'])
	
		@foreach($page->blocks as $block )
						 
			@if( $block->block_content_values_approved != null )
				
				@if($block->block_anchor)
					
					@push('top-subnav')
				
						{!! $block->present()->anchor('link') !!}
				
					@endpush
				
					{!! $block->present()->anchor('anchor') !!}
				
				@endif
				
				<div data-block-name="{{ $block->block_lid }}" id="{{ $block->present()->blockEID }}-{{$loop->index}}" class="{{ $block->present()->settings('wrapper') }} {{ $block->present()->settings('background','bg-') }}">
		
					<div class="{{-- $block->present()->settings('height','h-') --}} {{ $block->present()->settings('padding') }} {{ $block->present()->settings('margin') }} {{ $block->present()->settings('columns') }} {{ $block->present()->settings('offset','offset-') }}">
					
						@include( $block->present()->blockTemplate(),['block'=>$block])
					
					</div>
					
				</div>
				
			@endif
			
		@endforeach
		
	@endif
	
</div>
@endsection


