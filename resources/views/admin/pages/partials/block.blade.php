<li data-grid-item="{!! $block->present()->blockEID !!}" class="grid-item ui-state-default col-12 {{--$block->present()->settings('columns')}} {{$block->present()->settings('offset','offset-')--}}">

	<div data-block-id="{!! $block->present()->blockEID !!}" class="card-group" role="tablist" aria-multiselectable="true" >
				
		{!! $block->present()->makeBlockDefaultFields !!}
									
		<div class="card card-default" >
		
			<div class="card-header" role="tab" id="heading_{!! $block->present()->blockEID !!}" >
				
				<div class="row">
					
					<div class="col-2 align-self-center bg-block-icon" style="background-image:url( {{ asset($block->present()->getBlockIcon) }} )" data-toggle="tooltip" data-trigger="hover" title="@if((Auth::user()->isAdminOrEditor()))Block type:{!! $block->block_lid !!}@else {!! $block->block_name !!} @endif" data-placement="bottom" data-html="true"></div>
			
					<h4 class="col align-self-center text-center card-title" >
						
						<span class="offset-1 px-0">{{ $block->block_name }}</span>
						<span class="ml-3 btn-group hover-fadein" role="group" >
						
							<div rel="tooltip" type="div" class="btn btn-link btn-sm "
								    data-placement="bottom"
								    title="@lang('admin.tip_action_edit')"
									data-toggle="modal" data-target="#blockModal"
									data-modal-block-id="{!! $block->present()->blockEID !!}"
									data-modal-title="@lang('admin.pages_block_modal_content_title')"
									data-modal-description="{{ $block->present()->blockLibraryColumn('description') }}"
									data-modal-block-name="{{ $block->block_name }}"
									data-modal-icon="{{ $block->present()->getBlockIcon() }}"
									data-modal-contents="#content_{!! $block->present()->blockEID !!}"
									data-modal-attributes="#settings_{!! $block->present()->blockEID !!}"
									data-modal-layout="#layout_{!! $block->present()->blockEID !!}"
									data-modal-publishing="#publishing_{!! $block->present()->blockEID !!}"
							>							
                            <i class="fas fa-edit"></i>

							</div>
							@if ($block->present()->blockStatus == 'pending')
							<div class="btn btn-link btn-sm revert-block" href="#" data-toggle="tooltip" data-placement="bottom" title="@lang('admin.tip_action_revert')">
								<i class="fas fa-undo"></i>
							</div>
							@endif
							<div class="btn btn-link btn-sm delete-block" href="#" data-toggle="tooltip" data-placement="bottom" title="@lang('admin.tip_action_delete')">
								<i class="fas fa-trash"></i>
							</div>
							
						</span>
	
					
					</h4>
					
					<div class="col align-self-center card-controls text-right">
						
						<ul class="float-right mr-4">
							<li><i class="updated block-edited badge badge-light mr-2">@lang('admin.pages_block_badge_edited')</i></li>
							<li><i class="updated block-resized badge badge-light mr-2">@lang('admin.pages_block_badge_resized')</i></li>
							<li><i class="updated block-moved badge badge-light mr-2">@lang('admin.pages_block_badge_moved')</i></li>
							<li>{!! $block->present()->statusBadge !!}</li>
						</ul>
						
					</div>
					
				</div>
			</div>
			
			
			<div id="content_{!! $block->present()->blockEID !!}" class="hide {{ $block->show }}" role="tabcard" aria-labelledby="heading_{{ $block->block_uid }}">
						
				<div class="card-block">

                    @include( $block->present()->blockTemplate('admin') )
					
				</div>
				
			</div>
	
	
			<div id="settings_{!! $block->present()->blockEID !!}" class="hide bg-warning" role="tabcard" aria-labelledby="settings_{{ $block->block_uid }}">
				
				<div class="row pt-3">
						
						<div class=" col-6">
						
							<label class="control-label">@lang('admin.pages_block_name')</label>
							<input class="form-control input-nostyle" type="text" name="{!! $block->present()->makeBlockDefaultField('block_name') !!}" value="{!! $block->block_name !!}">
							
							<small>{{ $block->present()->blockLibraryColumn('block_description') }}</small>
						</div>
					
						<div class="col-6 text-left">
						
                                <label>@lang('admin.pages_block_anchor')</label>
    
                                <div class="input-group">
        				
                    				<label class="switch justify-self-center" >
                    					  <input name="{{!! $block->present()->makeBlockDefaultField('block_anchor') !!}" value="1" type="checkbox" {{ $block->present()->isChecked( $block->block_anchor ) }} >
                    					  <span class="slider rounded"><i class="fas fa-check" data-fa-transform="right-10 down-3"></i><i class="fas fa-times" data-fa-transform="right-25 down-3"></i></span>
                                          
                    				</label>
                    			</div>
                    			
    						
						</div>
						
	
						
				</div>
				
			</div>
			
			<div id="layout_{!! $block->present()->blockEID !!}" class="hide bg-warning" role="tabcard" aria-labelledby="layout_{{ $block->block_uid }}">
				
				<div class="row">
	
				    {!! $block->present()->attributeFields !!}
                    <input class="hide" id="pushlive" name="{!! $block->present()->makeBlockDefaultField('block_status') !!}" value="1" type="checkbox">

				</div>
				
			</div>
			            							
		</div>
		
	</div>
	
</li>
	