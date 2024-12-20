
<!-- SETTINGS PANE -->
<div id="tabSettings" class="tab-pane slide-left container-fluid" aria-expanded="false">

	<div class="form-row">               
		
		<div class="form-group col-2">
			
			<label class="control-label" for="add_to_nav">@lang('admin.form_page_add_to_nav')</label>	
			<div class="col align-self-center">	
			<label class="switch" for="add_to_nav" data-toggle="tooltip" data-trigger="hover" title="<i class='fa fa-eye'></i> @lang('admin.tip_page_show_on_nav')" data-placement="bottom" data-html="true">
				  
				  <input id="add_to_nav" name="add_to_nav" value="1" type="checkbox" @if ($page->add_to_nav ==1)checked="checked" @endif>
				  <span class="slider rounded"><i class="fas fa-eye" data-fa-transform="right-10 down-3"></i><i class="fas fa-eye-slash" data-fa-transform="right-25 down-3"></i></span>
			
			</label>
			</div>
		</div>
		
	   	<div class="form-group col">	    
				
				<label for="title_nav" class="control-label">@lang('admin.form_page_title_nav')</label>
				<input type="text" class="form-control" name="title_nav" rows="3" id="title_nav" value="{{$page->present()->titleNav}}">        
				
		</div>
	
		<div class="form-group col">	    
				
				<label for="redirect" class="control-label">@lang('admin.form_page_redirect')</label>
				<input type="text" class="form-control" name="redirect" rows="3" id="redirect" value="{{$page->redirect}}">        
				
		</div>
		
		<div class="form-group col">	    
			<label for="target" class="control-label">@lang('admin.form_page_redirect_target')</label>
			<div class="form-check align-items-center">
				<input class="form-check-input" type="checkbox" id="target" value="1" @if( $page->target == '1')checked @endif />
				<label for="target" class="form-check-label">@lang('admin.form_page_redirect_target_blank')</label>
		    </div>	
		</div>
		
	</div>
	
	<div class="form-row">
	    
		{{--<label class="control-label">@lang('admin.form_page_order')</label>--}}
		
		<div class="form-group col-3">
	    						
			<label for="order_option" class="control-label">@lang('admin.form_page_order_position')</label>
				
			<select name="order_option" id="order_option" class="form-control w-100" data-init-plugin="select2" triggerChange="true" style="width:100%">
				<option></option>
				<option value="before" @if( $page->parent_id == 'before') checked @endif>@lang('admin.form_page_order_position_before')</option>
				<option value="after" @if( $page->parent_id == 'after') checked @endif>@lang('admin.form_page_order_position_after')</option>
				<option value="child" @if( $page->parent_id == 'child') checked @endif>@lang('admin.form_page_order_position_child')</option>
			</select>
	
		</div>
		
		<div class="form-group col-3 ml-2"> 
			     
			<label for="order_relation_id" class="control-label">@lang('admin.form_page_order_relation')</label>
        	
        	<select name="order_relation_id" id="order_relation_id" class="form-control w-100" data-init-plugin="select2" triggerChange="true" style="width:100%">
				
				<option></option>								
				
				@foreach ($pages as $orderedPage )
					
					@if( $orderedPage->depth > 0 && $orderedPage->getPrevSibling() === null)
						
						<optgroup>
					
					@endif
					
						<option value="{{ $orderedPage->id }}" @if($orderedPage->id == $page->id) disabled @endif>{!! $orderedPage->present()->indentedTitle !!}</option>
					
					@if( $orderedPage->depth > 0 && $orderedPage->getNextSibling() === null)
					
						</optgroup>
					
					@endif

				@endforeach
								
			</select>

		</div>
		
	</div>

{{--
	<div class="form-row">		
		<div class="form-group">	    
			
			<label for="layout" class="control-label">@lang('admin.form_page_layout')</label>
			<input type="text" class="form-control" name="layout" rows="3" id="layout" value="{{$page->layout}}">        
			
		</div>
	</div>
--}}

	                
</div>				
<!-- END: SETTINGS PANE -->