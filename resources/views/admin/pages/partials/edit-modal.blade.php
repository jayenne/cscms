<div id="blockModal" data-block-id="" class="modal fade" tabindex="-1" role="dialog" >
    
    <div class="modal-dialog modal-lg card-group" role="document">
        
        <div class="modal-content card card-default">
            
            <div class="card-header separator mb-3">
                
                <div class="row mx-0 d-flex bg-block-icon">
					
					<h4 class="col card-title text-center align-self-center block-name" ></h4>			
					<h6 class="description"></h6>

				</div>
			    <div class="clearfix"></div>

            </div>
            
            <div class="modal-body card-body ">

	            <div class="modal-nav ">
	                
	                <ul class="nav nav-tabs nav-tabs-simple">
	                    
	                    <li class="nav-item"><a class="active" href="#tabBlockContents" data-toggle="tab">Contents</a></li>
	                    
	                    <li class="nav-item"><a href="#tabBlockAttributes" data-toggle="tab" >Attributes</a></li>
					
					@if(Auth::user()->isAdminOrEditor()) 
	                    
	                    <li class="nav-item"><a href="#tabBlockLayout" data-toggle="tab" >Layout</a></li>
	                    <!--li class="nav-item"><a href="#tabBlockPublishing" data-toggle="tab" >Publishing</a></li-->
	                
	                @endif
	                    
	                </ul>
	                
	            </div>

				<div class="tab-content">
	                	
	                <div class="tab-pane active" id="tabBlockContents"></div>
	                <div class="tab-pane" id="tabBlockAttributes"></div>

					@if(Auth::user()->isAdminOrEditor()) 
					
	                <div class="tab-pane" id="tabBlockLayout"></div>
	                <!--div class="tab-pane" id="tabBlockPublishing"></div-->
	                
	                @endif
	            </div>
	        
	        <div class="clearfix"></div>
   
            </div>

            <div class="modal-footer bg-light py-3">
   
                @if(Auth::user()->isAdminOrEditor()) 
                    
                    <div class="input-group mr-3 mt-2">
                    
                		
                		<label class="switch justify-self-center" for="pushlive-proxy">
                			  <input id="pushlive-proxy" name="pushlive-proxy" value="1" type="checkbox">
                			  <span class="slider rounded"><i class="fas fa-check" data-fa-transform="right-10 down-3"></i><i class="fas fa-times" data-fa-transform="right-25 down-3"></i></span>
                		</label>
                        <label class="ml-2 col-form-label">@lang('admin.pages_block_status')</label>
                	</div>
                	
                @endif	

                <div type="div" class="btn btn-success" data-dismiss="modal">Close</div>
            </div>
            
        </div>
        
    </div>
    <div class="clearfix"></div>
</div>
