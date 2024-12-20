@extends('admin.layouts.index')
 
@push('stylesheets')

@endpush

@push('footer_scripts')
	<script  src="{{ asset('system/js/update-page.js') }}"></script>
	<script  src="{{ asset('system/js/is-updated.js') }}"></script>
	<script  src="{{ asset('system/js/datatable.js') }}"></script>
@endpush

@section('form_controls')

		    <div class="row">
				

				<div class="col-xs-4 ">
					<a href="{{ route('pages.create') }}" class="btn btn-success text-light">
						<i class="fas fa-4x fa-plus" data-fa-mask="fas fa-file" data-fa-transform="shrink-5 down-2" ></i> @lang('admin.btn_create',['1'=>'page'])
					</a>
				</div>
								
		    </div>

@endsection
								
@section('content')
@include('admin.common.partials.modal-delete')

<div class="container">
	@include('admin.common.partials.status-message')

    
    @section('page_name')
		
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">@lang('admin.pages_pagename_pagelist')</div>
			</div>
		</div>
		
	@endsection

    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid container-fixed-lg">

        <!-- START card -->
        <div class="card card-transparent">
			
			<div class="card-block">
                <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">	           
		            <table data-table="no-ordering" class="table table-hover data-table table-responsive-block no-footer " id="pagesListTable" role="grid" aria-describedby="tableWithSearch_info">
	                  <thead>
	                    
	                    <tr>
	                      <th class="col-9">@lang('admin.th_page_title')</th>
						  <th class="col-2 text-left">@lang('admin.th_page_author')</th>
	                      <th class="col-1 text-center">@lang('admin.th_page_status')</th>
	                    </tr>
	                    
	                  </thead>
	                  <tbody>
	                
                @if($pages_tree->isEmpty())
				
	                <tr>
	                    <td colspan="4" align="center">@lang('admin.pages_no_pages')</td>
	                </tr>
				
				@else 
				
                    @foreach ($pages as $page )

	                    <tr>

							<td class="align-middle">
								
								<div class="align-left">
								
									<span data-toggle="tooltip" data-trigger="hover" title="<i class='fa fa-globe'></i> {{ $page->slug }}" data-placement="bottom" data-html="true">{!! $page->present()->indentedTitle !!}</span>
								
                                    <span role="group" class="ml-3 btn-group hover-fadein" role="group" aria-label="actions" >
                                        
                                        @if( Auth::user()->isAdminOrEditor() || Auth::user()->id == $page->user_id )
    										
    										{{-- EDIT --}}
    										<span class="btn btn-link btn-sm"
    				                        	data-toggle="tooltip"
    											data-trigger="hover"
    											title=" @lang('admin.tip_action_edit')"
    											data-placement="bottom"
    											data-html="true"
    										>
    											<a
    												type="button"
    												href="{{ route('pages.edit',['page'=>$page->id]) }}"
    											>
    												<i class="fas fa-edit text-dark"></i>
    											</a>
    										</span>
    										
                                            {{-- PREVIEW --}}
    										<span class="btn btn-link btn-sm"
    				                        	data-toggle="tooltip"
    											data-trigger="hover"
    											title=" @lang('admin.tip_action_preview')"
    											data-placement="bottom"
    											data-html="true"
    										>
    											<a
    												type="button"
    												href="@if($page->slug=='/'){{ url('preview','') }}@else {{ url('preview',$page->slug) }} @endif"
                                                    target="_BLANK"
    											>
    												<i class="fas fa-browser text-dark"></i>
    											</a>
    										</span>	
    										
    										
    										{{-- REVERT PAGE  --}}
    										
    										@if( Auth::user()->isAdminOrEditor() && $page->present()->status  !='1')
    										<span class="btn btn-link btn-sm"
    				                        	data-toggle="tooltip"
    											data-trigger="hover"
    											title="@lang('admin.tip_action_revert_page')"
    											data-placement="bottom"
    											data-html="true"
    										>
    											<a
    												type="button"
    												href=""
                                                    target="_BLANK"
    											>
    												<i class="fas fa-undo text-dark"></i>
    											</a>
    										</span>
    										@endif
    												                       
					                        @if($page->id !=1)
						                       
						                        <span class="btn btn-link btn-sm"
						                        	data-toggle="tooltip"
													data-trigger="hover"
													title=" @lang('admin.tip_action_delete')"
													data-placement="bottom"
													data-html="true"
												>
						                        	<a
								                        type="button"
									                    href="{{ route('pages.destroy', ['page' => $page->id]) }}"
									                        
									                    data-modal-header="@lang('admin.modal_confirm_delete_header',['1'=>'page'])"
									                    data-modal-body="@lang('admin.modal_confirm_delete_body',['1'=>'page'])"
									                    data-form="form_delete"
										                data-toggle="modal"
										                data-target="#confirm-delete"
										            >
										            
											            <i class="fas fa-trash text-dark"></i>
											            
											        </a>
						                        </span>
						                        
					                        @else 
					                        
						                        <span class="btn btn-link btn-sm"
						                        	data-toggle="tooltip"
													data-trigger="hover"
													title=" @lang('admin.tip_action_nondelete',['1'=>'page'])"
													data-placement="bottom"
													data-html="true"
												>
											         <i class="fas fa-minus-circle text-danger"></i>
						                        </span>
					                        
					                        @endif
								        				                    
                                        @else
        				                    <span class="btn btn-link btn-sm"
        						                        	data-toggle="tooltip"
        													data-trigger="hover"
        													title="@lang('admin.tip_action_nonauthorised',['1'=>'page'])"
        													data-placement="bottom"
        													data-html="true"
        									>
        										<i class="fas fa-minus-circle text-danger"></i>
        						            </span>
                                        @endif
				                    </span>
								
								</div>

							</td>
										  	  
							<td class="align-left">
								
								<span data-rel="popover" title="" data-placement="bottom" data-content="
									{{ $page->user->present()->getAvatarBadge( $page->user ) }}
									{{ $page->user->present()->displayNameTooltip }}
									">{{ $page->user->present()->displayName }}
								</span>
							 
							</td>	                      
	                      
							<td class="align-left">
							    <div class="text-left text-nowrap" data-toggle="tooltip" data-trigger="hover" title="{{ $page->present()->status }}">
								    <span class="col-12 badge badge-{{ $page->present()->statusToClass }}" data-toggle="tooltip" data-trigger="hover" title="{{ $page->present()->pageStatusTip }}" data-placement="bottom" data-html="true">
								    	<i class="fas {{ $page->present()->isLiveToIcon }}"></i> {{ $page->present()->pageStatus }} 
								    </span>
							    </div>
							</td>
							
	                    </tr>
                   @endforeach
                   
                @endif
                
                  </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- END card -->
        
    </div>
    <!-- END CONTAINER FLUID -->
    
       
    <div>
        {{ $pages->links() }}
    </div>
    
</div>


@endsection

