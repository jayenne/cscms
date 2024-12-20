<div class="container text-center">
	<h2>{{ $block->present()->content2html("heading") }}</h2>
</div>

<div class="row mt-3 mb-5">
	@for( $i = 0; $i < $block->present()->itemsCount('content'); $i++ )
					
		<div class="col-lg-3 col-md-6 my-2">
			<div class="bg-trans-mid text-dark p-3 h-100 d-flex @if($i < $block->present()->itemsCount('content')-1 )arrow-box @endif">
				<p class="align-self-center">{{ $block->present()->content2html("content", "$i") }}</p>
			</div>
		</div>
		
	@endfor	
 
</div>

<div class="containter">
	<p>{{ $block->present()->content2html("footer") }}</p>
</div>