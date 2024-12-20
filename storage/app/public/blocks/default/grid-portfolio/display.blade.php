<ul id="og-grid" class="og-grid">
	
	@for( $i = 0; $i < $block->present()->itemsCount('heading'); $i++ )
	@if( $block->present()->content("heading", $i) )
	<li>
			<div id="{{ $block->present()->anchor('content',$i) }}" data-toggle="og-grid" data-largesrc="{!! $block->present()->content('image-large', $i ) !!}"  data-content='<div class="col-md-12">
				
				<div class="row">
					
					<span><h3>{{ $block->present()->content("heading", $i) }}</h3></span>

				</div>
				
				<div class="row">
					
					<hr class="dark" />
					<h4>{{ $block->present()->content("sectors", $i) }}</h4>
					<p>{!! $block->present()->content("content", $i) !!}</p>
				
				</div>
			

			<div class="row">
				
				<table class="table table-borderless table-sm">
					
					
					<tr>
						<td><i class="fa fa-square"></i></td>
						<td>{{ $block->present()->contentLabel("entry-year","label") }}: {{ $block->present()->content("entry-year", $i) }}</td>
					</tr>
					
					<tr>	
						<td><i class="fa fa-square"></i></td>
						<td>{{ $block->present()->contentLabel("exit-year","label") }}: @if( $block->present()->content("exit-year", $i) ) {{ $block->present()->content("exit-year", $i) }} @else {{ $block->present()->contentLabel("exit-year","placeholder") }} @endif </td>
					</tr>
    				
                    <tr>	
						<td><i class="fa fa-external-link-square"></i></td>
						<td><a href={!! $block->present()->content("website", $i) !!} target="_blank">{{ $block->present()->content("website", $i) }}</a></td>
					</tr>
						
				</table>

			</div>
		</div>'>
            <img src="{{ $block->present()->content('image-small', $i ) }}" alt="{{ $block->present()->content('heading', $i) }}">
            
				
			<div class="og-grid-details">
				
				<div class="og-grid-name">{{ $block->present()->content('heading', $i) }}</div>
				<span>{{ $block->present()->content	('sectors', $i) }}</span>
			</div>
			
			<div class="clearfix"></div>
			
		</div>
	</li>
	@endif
	
	@endfor
	
</ul>