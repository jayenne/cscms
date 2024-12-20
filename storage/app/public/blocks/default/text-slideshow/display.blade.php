<div class="carousel slide {{ $block->present()->settings('transition','carousel-') }}" data-ride="carousel" data-interval="6000" data-pause="hover">
    <!--======= Wrapper for Slides =======-->
    <div class="carousel-inner" role="listbox">

        <!--========= Slides =========-->
        @set('firstslide','active')
        
        @for( $i = 0; $i < $block->present()->itemsCount; $i++ )
            
            @if( $block->present()->content("content", $i ) !='')
            	
	            <div data-slidename="slide{{$i}}" class="carousel-item {{$firstslide}}">
				    
				    <div class="container">
					        
				        <div class="col-md-8 text-white text-left">
				        	
				        	<p class="lead"><i>&quot;</i>{!! $block->present()->content2html('heading', $i ) !!}<i>&quot;</i></p>					        	
				        
				        </div>
				        
				        <div class="col-md-4 text-right float-right">
					
				        	<div class="border-bottom-1-dark">{!! $block->present()->content2html('content', $i ) !!}</div>
				        	<div class="clearboth small">{!! $block->present()->content2html('footer', $i ) !!}</div>

						</div>
				    
				    </div>
				
				</div>
				
				@set('firstslide','')
				
			@endif
			
		@endfor
		
		@unset('firstslide')
        
	</div>

</div>

