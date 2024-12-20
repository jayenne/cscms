<div class="hero pv-5 text-center mb-5">
        
    <div id="kb" class="carousel randomize animate_text  {{ $block->present()->settings('transition','kb-wrapper kb-') }}" data-ride="carousel" data-interval="5000" data-pause="hover">

        <!--======= Wrapper for Slides =======-->
        <div class="carousel-inner" role="listbox">

            <!--========= Slides =========-->
            @set('firstslide','active')
            
            @for( $i = 0; $i < $block->present()->itemsCount('content'); $i++ )
	            
	            @if( $block->present()->content("image", $i ) !='')
	            	
		            <div data-slidename="slide{{$i}}" class="carousel-item {{$firstslide}}">
					    
					    <img class="w-100" src="{{ $block->present()->content('image', $i ) }}" alt="">
					    
					    <div class="container carousel-caption kb-caption">
					        
					        <div class="container-fluid py-5">
						        <div class="col-xs-12 col-md-6 p-4 bg-trans-dark text-white text-left">
						        	
						        	<h1 class="">{!! $block->present()->content2html('heading', $i ) !!}</h1>
						        	
						        	<p>{!! $block->present()->content2html('content', $i ) !!}</p>
						        
						        </div>
						        
							</div>
					    
					    </div>
					
					</div>
					
					@set('firstslide','')
					
				@endif
				
			@endfor
			
			@unset('firstslide')
        
        <div class="kb-overlay"></div>
        
    	</div>
    
    </div>
    
</div>
