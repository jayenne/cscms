<div class="bgimg-half-to-full {{$block->present()->contentIsTrueFalse( 'content-order','','bgimg-right' )}}" style="background-image: url({{ $block->present()->content("image") }});"></div>
	
<div class="container" >
	
	<div class="row {{$block->present()->contentIsTrueFalse( 'content-order','','flex-row-reverse' )}}">
			
		<div class="col-md"></div>	  
		
		<div class="col-md-6 align-self-center">
			
			<h3>{!! $block->present()->content2html("heading") !!}</h3>
			<p>{!! $block->present()->content2html("content") !!}</p>
			
			<br></br>
			
			<small class="pt-5 text-muted">{!! $block->present()->content2html("footer") !!}</small>
	
		</div>
		
	</div>
	
</div>