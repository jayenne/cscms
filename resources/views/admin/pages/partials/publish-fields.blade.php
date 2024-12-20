<!-- SETTINGS PANE -->
<div id="tabPublishing" class="tab-pane slide-left container-fluid" aria-expanded="false">
	
	<label class="control-label" for="publish_on">@lang('admin.form_page_publishing')</label>	
	
	<div class="form-row">
	
		
		<div class="form-group col-4">
		   
			<label for="publish_on" class="control-label">@lang('admin.form_page_published_on')</label>
	        
	        <div class="input-group date" data-target-input="nearest" data-toggle="tooltip" data-trigger="hover" title="<i class='fas fa-eye'></i> @lang('admin.tip_page_published_on')" data-placement="bottom" data-html="true">
	            
	            <input type="text" id="publish_on" name="publish_on" value="{{ $page->publish_on }}" class="form-control datetimepicker-input" data-target="#publish_on"/>
	            
	            <div class="input-group-append" data-target="#publish_on" data-toggle="datetimepicker">
	                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
	            </div>
	            
	        </div>
		        
		</div>
		
		<div class="form-group col-4">
		   
			<label for="publish_off" class="control-label">@lang('admin.form_page_published_off')</label>
	        
	        <div class="input-group date" data-target-input="nearest" data-toggle="tooltip" data-trigger="hover" title="<i class='fas fa-eye-slash'></i> @lang('admin.tip_page_published_off')" data-placement="bottom" data-html="true">
	            
	            <input type="text" id="publish_off" name="publish_off" value="{{ $page->publish_off }}" class="form-control datetimepicker-input" data-target="#publish_off"/>
	            
	            <div class="input-group-append" data-target="#publish_off" data-toggle="datetimepicker">
	                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
	            </div>
	            
	        </div>
		        
		</div>
		
		<div class="form-group col-2">
				
			<label class="control-label" for="publish_on">@lang('admin.form_page_published')</label>	
			
			<div class="input-group">
				
				<label class="switch" for="published" data-toggle="tooltip" data-trigger="hover" title="<i class='fa fa-eye'></i> @lang('admin.tip_page_live')" data-placement="bottom" data-html="true">
					  <input data-submit-on-change="false" id="published" name="published" value="1" type="checkbox" @if ($page->published ==1)checked="checked" @endif>
					  <span class="slider rounded"><i class="fas fa-eye" data-fa-transform="right-10 down-3"></i><i class="fas fa-eye-slash" data-fa-transform="right-25 down-3"></i></span>
				</label>
			
			</div>
				
		</div>
		
		@if(Auth::user()->isAdminOrEditor())

		<div class="form-group col-2">
				
			<label class="control-label" for="publish_on">@lang('admin.form_page_status')</label>	
			
			<div class="input-group">
				
				<label class="switch" for="status" data-toggle="tooltip" data-trigger="hover" title="<i class='fa @if ($page->status ==1)fa-check @else fa-times @endif'></i> @lang('admin.tip_page_status')" data-placement="bottom" data-html="true">
					  <input data-submit-on-change="false" id="status" name="status" value="1" type="checkbox" @if ($page->status ==1)checked="checked" @endif>
					  <span class="slider rounded"><i class="fas fa-check" data-fa-transform="right-10 down-3"></i><i class="fas fa-times" data-fa-transform="right-25 down-3"></i></span>
				</label>
			
			</div>
				
		</div>
		
		@endif
		
	</div>	 
</div>