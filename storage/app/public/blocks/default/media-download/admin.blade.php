    	
@for( $i = 0; $i < $block->present()->itemsMax(); $i++ )

	<div class="form-group">
    	
    	<div class="row">
            
            <div class="col-6">
        	    
        	    <div class="col pt-2">
        	        <label class="mx-auto text-center">{{ $block->present()->contentLabel('heading') }}</label>
        	        <input class="form-control" name="content[{{ $block->block_uid }}][{{$i}}][heading]" value="{{ $block->present()->content('heading', $i) }}">
        	    </div>
        	    
        	    <div class="col pt-2">
        	        <label>{{ $block->present()->contentLabel('content') }}</label>
                    <textarea class="form-control h-mn-50" name="content[{{ $block->block_uid }}][{{$i}}][content]" >{{ $block->present()->content('content',$i) }}</textarea>
        	    </div>
        		
        	</div>
    	
            <div class="col-6">
    			   
    			<div class="col pt-2">
    			
    				<label>{{ $block->present()->contentLabel('link') }}</label>
    		    	<input class="form-control" name="content[{{ $block->block_uid }}][{{$i}}][link]" value="{{ $block->present()->content('link', $i) }}">
    			
    			</div>
    			
    			<div class="col pt-2">
    				
    				<label>{{ $block->present()->contentLabel('file') }}</label>
    				
    				{{--
    				<div class="input-group date" data-target-input="nearest">
    	            
    				    <input id="{{$block->block_uid}}[{{$i}}]" class="form-control" type="text" value="{{ $block->present()->content('file', $i) }}" name="content[{{ $block->block_uid }}][{{$i}}][file]">
        	            
        	            <div class="input-group-append" data-target="#{{$block->block_uid}}[{{$i}}]" >
        	                <div data-lfm="files" data-input="thumbnail-{{$block->block_uid}}[{{$i}}]" data-preview="preview-{{$block->block_uid}}[{{$i}}]" class="input-group-text"><i class="fas fa-file-pdf"></i></div>
        	            </div>
        	            
        	        </div>
                    --}}
                    
                    <div class="input-group">
                        
                        <div class="input-group">
                    
                            <input id="thumbnail-{{$i}}" class="form-control" type="text" name="content[{{ $block->block_uid }}][{{$i}}][file]" value="{{ $block->present()->content('file', $i) }}">
                            
                            <div data-lfm="files" id="lfm{{$i}}" data-input="thumbnail-{{$i}}"  class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-file-pdf text-dark"></i></div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
    		    </div>
    		    
    		    <div class="col pt-2">
        		    
        		    <label>{{ $block->present()->contentLabel('date') }}</label>
                
                    <div class="input-group date" data-target-input="nearest">
        	            
        	            <input type="text" id="publish-{{$i}}" name="content[{{ $block->block_uid }}][{{$i}}][date]" value="{{ $block->present()->content('date', $i) }}" class="form-control datetimepicker-input" data-target="#publish-{{$i}}"/>
        	            
        	            <div class="input-group-append" data-target="#publish-{{$i}}" data-toggle="datetimepicker">
        	            
        	                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
        	            
        	            </div>

        	        </div>
        	        
        		</div> 
        		
            </div>
            
		</div>
		
	</div>



@endfor
    
 	
