<div class="py-1 my-5 parallax" style="background-image: url({{ $block->present()->content("image") }}); background-position: right center; background-size: cover; background-repeat: no-repeat;">

	<div class="container">
	
		<div class="row ">
		
			<div class="col-md-9 mx-auto">
			
				<div class="row p-4 filter-dark my-5">
				
					<div class="col">
					
						<h2 class="text-left ">{!! $block->present()->content2html('heading') !!}</h2>
						
						<p class="mt-4">{!! $block->present()->content2html('content') !!}</p>
					
					</div>
				    
				</div>
			
			</div>
		
		</div>
	
	</div>

</div>