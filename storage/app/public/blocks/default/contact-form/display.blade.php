<div class="container">

	<div class="row">
			
		<div class="col-6 {{$block->present()->contentIsTrueFalse( 'content-order','','order-12' )}} ">

			<div class="col">
		    	<h5>{{ $block->present()->content('heading-right') }}</h5>
			</div>
			
            <iframe src="https://snazzymaps.com/embed/96148" width="100%" height="400px" style="border:none;"></iframe>

		</div>	  
		
		<div class="col-6 d-flex align-items-center justify-content-center" style="height:400px;">
			
			<div>
		    	<h2>{{ $block->present()->content('heading') }}</h2>
		    	<p class="pre-wrap lead" style="white-space: pre-wrap">{{ $block->present()->content('content') }}</p>
                <p class="pre-wrap">
					<i class="fa fa-phone"></i> <a href="tel:+44(0)20 7579 9320">+44(0)20 7579 9320</a><br>
					<br>
					<i class="fa fa-envelope"></i> <a href="mailto:contact@cabotsquare.com">contact@cabotsquare.com</a>
				</p>
			</div>
				
		</div>
		
	</div>
    
    <div class="col-md-12 mt-3">
		<small class="small text-secondary">
			{!! $block->present()->content2html('footer') !!} <a href="{!! $block->present()->content('link') !!}" target="_blank">here.</a>
		</small>
	</div>
</div>