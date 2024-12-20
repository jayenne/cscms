@extends('admin.layouts.index')

@push('stylesheets')
    <link href="{{ asset('system/css/nestable.css') }}" rel="stylesheet">
@endpush

@push('footer_scripts')
	<script  src="{{ asset('system/js/nestable.js') }}"></script>
@endpush

@section('content')


<div class="container">
	@include('admin.common.partials.modal-delete')
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

                
                @if($pages->isEmpty())
		
	                <div>
	                    <div coldiv="4" align="center">@lang('admin.pages_no_pages')</div>
	                </div>
				
				@else 

					<div class="container-fluid">    
						<div class="dd" id="pagelist">
							<ol class="dd-list">
								@foreach ($pages as $page)
								
									@if( $page->depth > 0 && $page->getPrevSibling() === null)
										
										<ol class="dd-list">
									
									@endif
											<li class="dd-item" data-id="{{ $page->id }}">
												
												<div class="form-row align-items-center">									
												
													<div class="container-fluid">
														
														<div class="input-group mb-2">
															
															<div class="input-group-prepend">
																<div class="input-group-text dd-handle"><i class="fas fa-bars"></i></div>
															</div>
													
															<div class="d-flex flex-row dd-content form-control">
													
																<div class="col d-flex justify-content-start">
																	{!! $page->present()->title !!}
																</div>
																
																<div class="col-4 d-flex justify-content-end">
																	
																	<div class="text-right text-nowrap mr-4" data-toggle="tooltip" data-trigger="hover" data-title="
																	@foreach ($page->user()->first()->roles as $role)
																	{{ $loop->first ? '' : ', ' }}
																	{{ $role->name }}
																	@endforeach" data-placement="bottom" >
																		{{ $page->user->username }}
																	</div>
																	
																	<div class="text-right text-nowrap" data-toggle="tooltip" data-trigger="hover" title="{{ $page->present()->status }}">
																		
																		<div class="badge badge-{{ $page->present()->statusToClass }}" data-toggle="tooltip" data-trigger="hover" title="{{ $page->present()->pageStatusTip }}" data-placement="bottom" data-html="true">
																			<i class="fas {{ $page->present()->isLiveToIcon }}"></i> {{ $page->present()->pageStatus }} 
																		</div>
																		
																	</div>
																	
																</div>
																
															</div>
														
														</div>
														
													</div>
													
												</div>

									
									@if( $page->depth > 0 && $page->getNextSibling() === null && $page->children()->count() === 0)
											</li>
										</ol>
									
									@endif
								
								@endforeach
							</ol>
						</div>
					</div>


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

