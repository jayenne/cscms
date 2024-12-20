<div class="py-5 filter-dark parallax" style="background-image: url({{ $block->present()->content("image") }}); background-position: right center; background-size: cover; background-repeat: no-repeat;">

	<div class="container">
	
		<div class="row ">
		
			<div class="col-md-6">
			
				<h2 class="text-left "><img class="img-fluid mb-2 mr-3" src="{{ $block->present()->contentImg('logo-inverse.svg','display') }}" width="60">{!! $block->present()->content2html('heading') !!}</h2>
						
				<p class="mt-4">{!! $block->present()->content2html('content') !!}</p>
				<p class="mt-4">{!! $block->present()->content2html('footer') !!}</p>
									
			</div>
		
			<div class="col-md-6">
							
				<div class="card mt-4">
					<div class="p-5 mt-2 position-absoute">
					<h4 class="text-left ">{{ $block->present()->content2html('heading-right') }}</h4>
					
					<p class="mt-4">{!! $block->present()->content2html('content-right') !!}</p>
					<p class="mt-4">{!! $block->present()->content2html('footer-right') !!}</p>
					
                    <i class="fa fa-phone"></i> <a href="tel:+44(0)20 7579 9320">+44(0)20 7579 9320</a><br>
                    <p><i class="fa fa-envelope"></i> <a href="mailto:investor@cabotsquare.com">investor@cabotsquare.com</a></p>
                    <p><i class="fa fa-external-link"></i> <a href="https://dynamoeu.netagesolutions.com/Portal/Login/Cabot_Square/VC-Investors/" target="_blank">Investor Login</a></p>
                
					</div>
				</div>
			
			</div>

		</div>
	
	</div>

</div>