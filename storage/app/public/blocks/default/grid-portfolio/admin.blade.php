@push('header_styles')
	
@endpush
@push('block_scripts')

	<script>
		$('.collapse').collapse('hide');	
	</script>

@endpush

	<ul id="parent-{{ $block->block_uid }}" class="accordion sortable container-fluid px-0 striped-list">
	    
	    <!-- ITEMS -->
		@for( $i = 0; $i < $block->present()->itemsMax(); $i++ )
	    <li class="row item mb-1" data-uid="{{ '#'.$block->present()->anchor('content',$i) }}">

		    <div class="btn delete-block-item"><i class="fas fa-trash"></i></div>

			<div class="card-header" id="{{ $block->block_uid }}-{{$i}}-trigger">
				
				<div class="row mx-0 d-flex">
					<img src="{{ $block->present()->content('image-small',$i) }}" class="img-sm greyscale" height="80" {!! $block->present()->imagePlaceholderError() !!} />
					<h4 class="col card-title text-left align-self-center block-name" title="Permalink: {{ '#'.$block->present()->anchor('content',$i) }}">
						<div class="btn btn-link" type="div" data-toggle="collapse" data-target="#{{ $block->block_uid }}-{{$i}}" aria-expanded="false" aria-controls="{{ $block->block_uid }}-{{$i}}">
						{{ $block->present()->content('heading',$i, 'EMPTY') }}</div>
					</h4>
				</div>
				
			</div>
		
		    <div id="{{ $block->block_uid }}-{{$i}}" class="collapse container-fluid" aria-labelledby="{{ $block->block_uid }}-{{$i}}-trigger" data-parent="#parent-{{ $block->block_uid }}" data-uid="{{ $block->block_uid }}-{{$i}}">
		
					<div class="row"> 
							
						<div class="col-6 ">
			
							<label>{{ $block->present()->contentLabel('heading', 'label') }}</label>
							<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][heading]" value="{{ $block->present()->content('heading',$i) }}" />
				
                            <label>{{ $block->present()->contentLabel('content', 'label') }}</label>
							<textarea class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>
					  
					    </div>

						<div class="col-6">
							
							<div class="row h-100">
							
    							<div class="col-6 fileupload-wrapper align-self-center">
    								
    								<img id="preview-{{$block->block_uid}}-{{$i}}-small" class="image-current d-block img-thumbnail" src="{{ $block->present()->content('image-small',$i) }}" onerror="this.src='{{ $block->present()->contentImagePlaceholder }}';">
    								
    								<div class="image-uploader">
    									
    									<div class="input-group">
    										
    										<span class="input-group-btn">
    								
    											<div class="btn-group" role="group" aria-label="images add/remove">
    												<div type="div" class="btn btn-success" data-lfm="image" data-input="thumbnail-{{$block->block_uid}}-{{$i}}-small" data-preview="preview-{{$block->block_uid}}-{{$i}}-small" ><i class="fas fa-upload"></i> Logo</div>
    												<div type="div" class="btn btn-danger @isnil( $block->present()->content('image-small',$i) )hide @endisnil" data-lfm-remove-image="{{$block->block_uid}}-{{$i}}-small"><i class="fas fa-trash"></i></div>
    											</div>
    				
    										</span>
    										
    				
    										<input id="thumbnail-{{$block->block_uid}}-{{$i}}-small" type="hidden" value="{{ $block->present()->content('image-small',$i) }}" name="content[{{ $block->block_uid }}][{{$i}}][image-small]">
    									</div>
    								
    								</div>
    								
    						    </div>
    						    
    						    <div class="col-6 fileupload-wrapper align-self-center">
    								
    								<img id="preview-{{$block->block_uid}}-{{$i}}-large" class="image-current d-block img-thumbnail " src="{{ $block->present()->content('image-large',$i) }}" onerror="this.src='{{ $block->present()->contentImagePlaceholder }}';">
    								
    								<div class="image-uploader">
    									
    									<div class="input-group">
    										
    										<span class="input-group-btn">
    								
    											<div class="btn-group" role="group" aria-label="images add/remove">
    												<div type="div" class="btn btn-small btn-success" data-lfm="image" data-input="thumbnail-{{$block->block_uid}}-{{$i}}-large" data-preview="preview-{{$block->block_uid}}-{{$i}}-large" ><i class="fas fa-upload"></i> Detail</div>
    												<div type="div" class="btn btn-small btn-danger @isnil( $block->present()->content('image-large',$i) )hide @endisnil" data-lfm-remove-image="{{$block->block_uid}}-{{$i}}-large"><i class="fas fa-trash"></i></div>
    											</div>
    				
    										</span>
    										
    				
    										<input id="thumbnail-{{$block->block_uid}}-{{$i}}-large" type="hidden" value="{{ $block->present()->content('image-large',$i) }}" name="content[{{ $block->block_uid }}][{{$i}}][image-large]">
    									</div>
    								
    								</div>
    								
    						    </div>
    						    
    						</div>
						
					</div>
					
					</div>  
		
					<div class="row my-3">
						    
					    <div class="col-6">
							
			    			<label>{{ $block->present()->contentLabel('website','label') }}</label>
							<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][website]" value="{{ $block->present()->content('website',$i) }}" />
					    	
					    	<label>{{ $block->present()->contentLabel('sectors','label') }}</label>
							<input class="form-control" type="text" id="content[{{ $block->block_uid }}][{{$i}}][sectors]" name="content[{{ $block->block_uid }}][{{$i}}][sectors]" value="{{ $block->present()->content('sectors',$i) }}" />
    
					    </div>
					
					    <div class="col-6">

							<label>{{ $block->present()->contentLabel('entry-year','label') }}</label>
							<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][entry-year]" value="{{ $block->present()->content('entry-year',$i) }}" />
					    	
					    	<label>{{ $block->present()->contentLabel('exit-year','label') }}</label>
							<input class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][exit-year]" value="{{ $block->present()->content('exit-year',$i) }}" placeholder="{{ $block->present()->contentLabel('exit-year','placeholder') }}" />
			    		
						</div>
				    
				    </div>
				
		      
			</div>
		
		</li>
		    
		@endfor
	
	</ul>

