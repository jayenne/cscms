

<!-- CONTENT PANE -->

<div  id="tabContent" class="tab-pane slide-left active" aria-expanded="true">
    	                	
	<!-- MANDATORY FIELDS -->
    	<div class="px-4 py-5">
        	<div class="row form-group">
            	<div class="col-6">
                
                    <label for="title">@lang('admin.form_page_title')</label>
                    <div class="controls">
                    	<input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" placeholder="@lang('admin.form_page_title_placeholder')" required="" aria-required="true" type="text" />
                    </div>
                    
            	</div>
            	
                <div class="col-6">
    
    			    <label for="slug" class="col-md-3 control-label">@lang('admin.form_page_url')</label>
    			    <div class="controls">
    				    <input type="text" class="form-control" id="slug" name="slug" value="{{ $page->slug }}" data-slug="{{ $page->slug }}" />
    			    </div>
                </div>	 
        	</div> 
        </div>

		<!-- CONTENT BLOCKS -->
		<ul id="gridContainer" class="block-list col-12 sortable ">
		
		@if( count($page->blocks) > 0 )	
		
			@include('common.pushonce',['domain'=>'admin'])
		
			
				
				@foreach ($page->blocks as $block)
				
					@include('admin.pages.partials.block')
					
				@endforeach	
				
									                
		@endif
		
		</ul>
		
	<!-- END: CONTENT PANE -->

    
</div>




