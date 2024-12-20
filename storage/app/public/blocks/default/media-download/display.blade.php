<div class="container d-flex flex-wrap">
@for( $i = 0; $i < $block->present()->itemsCount() ; $i++ )

    @if( $block->present()->content('link', $i) != '' || $block->present()->content('file', $i) != '' )
			<div class="col-6 py-5 flex-fill align-self-stretch" >
				
				<div class="row">

					<div class="text-center col-4">
					
						@if( $block->present()->content('link', $i) == '')
						
							<div class="w-100">
								<img class="img-fluid d-block mx-auto" src="{{ $block->present()->contentImg('pdf.svg','display') }}" width="80px">
							</div>
						
							<div class="w-100">{!! $block->present()->content2html('date', $i) !!}</div>
						
							<div class="w-100">
								<a class="btn btn-outline-dark mt-4 btn-sm" href="{!! $block->present()->content2html('link', $i) !!}" target="_blank">Download</a>
							</div>
						
						@endif
						@if( $block->present()->content('file', $i) == '')

						
							<div class="w-100">
								<img class="img-fluid d-block mx-auto" src="{{ $block->present()->contentImg('link.svg','display') }}" width="80px">
							</div>
							
							<div class="w-100">{!! $block->present()->content2html('date', $i) !!}</div>
							
							<div class="w-100">
								<a class="btn btn-outline-dark mt-4 btn-sm" href="{!! $block->present()->content2html('link', $i) !!}" target="_blank">Visit link</a>
							</div>
							
						@endif

					</div>
					
					<div class="col-8">
						<h4 class="mb-3">{!! $block->present()->content2html('heading', $i) !!}</h4>
						<p class="my-1">{!! $block->present()->content2html('content', $i) !!}</p>
					</div>
						
				</div>
				
			</div>

	@endif
	
@endfor
</div>