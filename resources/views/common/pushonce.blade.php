@if( count($page->blocks) >0 && ($domain == 'display' || ( $domain == 'admin')) )

<!-- PUSH SCRIPTS ONCE -->
<!-- REDUCE ALL SCRIPTS TO A UNIQE ARRAY -->

	@php

		$block_styles = [];
		$styles = [];

		$block_scripts = [];
		$scripts = [];

	@endphp
	
		
	@foreach( $page->blocks as $block)

		@php
			
			$block_styles[] = $block->present()->getBlockScriptTag( $domain ,'css', true);
			$styles[]		= $block->present()->getTemplateBlockScriptTag( $domain ,'css', true);
			
			$block_scripts[]= $block->present()->getBlockScriptTag( $domain ,'js', true);
			$scripts[]		= $block->present()->getTemplateBlockScriptTag( $domain ,'js', true);
		
		@endphp
		
	@endforeach

	@push('block_stylesheets')
		
		@php
			
			$block_styles = $block->present()->flatten_array($block_styles);
			$styles = $block->present()->flatten_array($styles);

			echo implode("\r\n",$block_styles);
			echo implode("\r\n",$styles);
		
		@endphp	
				
	@endpush

	@push('block_scripts')
		
		@php
			
			$block_scripts = $block->present()->flatten_array($block_scripts);
			$scripts = $block->present()->flatten_array($scripts);

			echo implode("\r\n",$block_scripts);
			echo implode("\r\n",$scripts);

		@endphp	
				
	@endpush
	

<!--// REDUCE ALL SCRIPTS TO A UNIQE ARRAY -->
			
@endif	