<ul id="og-grid" class="og-grid">
	
	@for( $i = 0; $i < $block->present()->itemsCount('heading'); $i++ )
    	
    	@if( $block->present()->content("heading", $i) )
    	<li>
                                                
            <div id="{{ $block->present()->anchor('content',$i) }}" data-toggle="og-grid" data-largesrc="{!! $block->present()->content('image-large', $i ) !!}" data-content='
    
                <div class="col-md-12">
                    <div class="row">
                    <h3>{{ $block->present()->content("heading", $i) }}</h3>
                </div>
                    
                <div class="row">
        					
        			<hr class="dark" />
                    <h4>{{ $block->present()->content("role", $i) }}</h4>
                    <p>{!! $block->present()->content("content", $i) !!}</p>
        				
        		</div>
         
                <div class="row">
                    <div class="pull-left d-flex align-self-center"><a href="mailto:{{ $block->present()->content("email", $i) }}">{{ $block->present()->content("email", $i) }}</a></div>
                </div>
                    
            </div>
            '>
            	<div class="og-grid-details">
            		<div class="og-grid-name">{{ $block->present()->content('heading', $i) }}</div>
            		<span class="og-grid-role">{{ $block->present()->content('role', $i) }}</span>
            	</div>
            	<div class="clearfix"></div>
            </div>
            
        </li>
    	@endif
    	
    @endfor
	
</ul>