<div class="py-5 mt-5 filter-dark parallax" style="background-image: url({{ $block->present()->content("image") }}); background-position: right center; background-size: cover; background-repeat: no-repeat;">

    <div class="container">
                	
    	<div class="row">
        	<div class="col-md-6 text-white">
        
                <h2>
                    {!! $block->present()->content2html('heading',0) !!}&nbsp;
                </h2>
                <p class="lead">{!! $block->present()->content2html('content') !!}</p>
                <p>{!! $block->present()->content2html('footer',0) !!}</p>
            
            </div>
            
            <div class="col-md-6 text-white">
        
               <h2>{!! $block->present()->content2html('heading-right') !!}&nbsp;</h2>
               {{--   
                    <p class="lead">{!! $block->present()->content2html('content-right') !!}</p>
                    <p>{!! $block->present()->content2html('footer-right') !!}</p>
                --}}
            
				<i class="fa fa-phone"></i> <a href="tel:+44(0)20 7579 9320">+44(0)20 7579 9320</a><br>
				<br>
				<i class="fa fa-envelope"></i> <a href="mailto:contact@cabotsquare.com">contact@cabotsquare.com</a>
				
  
            </div>
            
    	</div>
    
    </div>
    
</div>

