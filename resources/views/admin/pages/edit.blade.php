@extends('admin.layouts.index')

@push('stylesheets')
    <link href="{{ asset('system/css/nestable.css') }}" rel="stylesheet">
@endpush

@push('footer_scripts')
		
	<script  src="{{ asset('system/js/is-updated.js') }}"></script>
	<script  src="{{ asset('system/js/update-page.js') }}"></script>
	
@endpush


@section('content')

<div class="container-fluid container-fixed-lg">
   
   	@include('admin.common.partials.status-message')

    <!-- START CONTAINER FLUID -->
	@section('page_name')
		
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">@lang('admin.pages_page_edit_title')</div>
			</div>
		</div>
		
	@endsection

<!-- ADD NEW BLOCKS -->
@section('page_tabs')

	<div class="form-group col">
		
        <!--label class="control-label row mx-0" for="title">@lang('admin.form_page_block_title_add')</label-->
		
		<select placeholder="@lang('admin.form_page_block_title_add')" name="block_create_ids[]" id="block_create_ids" class="form-control col" data-target-form="#editpage" data-page-id="{{ $page->id }}" triggerChange="true">
			<option value="" icon=""></option>
			
			@foreach($blocks_library as $item)
			
				<option value="{{ $item->block_lid }}" icon="{{ $item->present()->getBlockIcon() }}">{{ $item->block_name }}</option>

			@endforeach
		
		</select>
			
	</div>	

@endsection					

		<!--// ADD NEW BLOCKS -->
			
	<div class="container-fluid">
						
			<form id="editpage"  action="{{ route('pages.update', ['page' => $page->id]) }}" method="POST" class="ajax form-horizontal" role="form" autocomplete="off">
				{{ method_field('PUT') }}
				{!! csrf_field() !!}

				@if (!$errors->isEmpty())
				
					<div class="alert alert-danger">
					    
					    <ul>
					        @foreach ($errors->all() as $message)
					        <li>{{ $message }}</li>
					        @endforeach
					    </ul>
					    
					</div>
				
				@endif	    
				
				
				
					<ul class="nav nav-tabs nav-tabs-simple" role="tablist">
					
					    <li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabContent" aria-expanded="true" class="active">@lang('admin.form_page_tab_content')</a></li>
					   
					    <li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabSettings" aria-expanded="false">@lang('admin.form_page_tab_display')</a></li>
					    <li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabSEO" aria-expanded="false">@lang('admin.form_page_tab_seo')</a></li>
					    
					    @if(Auth::user()->isAdminOrEditor())
					    	<li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabPublishing" aria-expanded="false">@lang('admin.form_page_tab_publishing')</a></li>
						@endif
						
					</ul>
				
					
					<div class="card">
						        			
						<div class="card-block p-0">
					
						    <div class="tab-content">
								
								@include('admin.pages.partials.edit-modal')
								@include('admin.pages.partials.content-fields')
								@include('admin.pages.partials.attribute-fields')
								@include('admin.pages.partials.seo-fields')
								
								@if(Auth::user()->isAdminOrEditor())
									@include('admin.pages.partials.publish-fields')
								
								@endif
								<!--- CLOSE PANES --->
								@section('form_controls')
								
							    <div class="row">
									<div class="btn-group">
										<a href="/admin/pages" class="btn btn-secondary " >@lang('admin.btn_cancel',['1'=>'page'])</a>
										
										<button data-expiry="{{ config('session.lifetime') * 60 }}" data-targetform="#editpage" class="btn ajaxsubmit">@lang('admin.btn_update',['1','page'])</button>
										
										<a class="btn btn-secondary text-dark"
                                            type="button"
											href="{!! url('preview',$page->slug) !!}"
                                            target="_BLANK"
                                            data-toggle="tooltip"
											data-trigger="hover"
											title=" @lang('admin.tip_action_preview')"
											data-placement="bottom"
											data-html="true"
										><i class="fas fa-browser text-dark"></i></a>
    								</div>
    											
							    </div>
								
								@endsection
									
						    </div>
						    
						</div>
						
					</div>

				<!--- CLOSE FORM--->
			</form>

	</div>
	
	
</div>



@endsection

