@extends('admin.layouts.index')
@push('meta')
<meta name="notification_duration_success" content="{{ config('app.notification_duration_success') }}">
<meta name="notification_duration_error" content="{{ config('app.notification_duration_error') }}">
@endpush

@push('stylesheets')

@endpush

@push('footer_scripts')
	<script  src="{{ asset('system/js/is-updated.js') }}"></script>
	<script  src="{{ asset('system/js/update-page.js') }}"></script>
@endpush

@section('content')

<div class="container-fluid container-fixed-lg">
   
    <!-- START CONTAINER FLUID -->
	@section('page_name')
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">@lang('admin.pages_page_edit_title')</div>
			</div>
		</div>
	@endsection
			
	<div class="container-fluid ">

			<form id="editpage" enctype="multipart/form-data" action="{{ route('pages.store') }}" method="post" class="ajax form-horizontal" autocomplete="off">
				{{ method_field('POST') }}
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
					    <li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabSettings" class="" aria-expanded="false">@lang('admin.form_page_tab_display')</a></li>
					    <li class="nav-item"><a href="#" data-toggle="tab" role="tab" data-target="#tabSEO" class="" aria-expanded="false">@lang('admin.form_page_tab_seo')</a></li>
					</ul>
					
					<div class="card">
						        			
						<div class="card-block">
					
						    <div class="tab-content">
								
								@include('admin.pages.partials.content-fields')
								@include('admin.pages.partials.attribute-fields')
								@include('admin.pages.partials.seo-fields')
								<!--- CLOSE PANES --->
								@section('form_controls')
								
										    <div class="row">
												<div class="col-xs-4 ">
													<a href="/admin/pages" class="btn btn-secondary " >@lang('admin.btn_cancel',['1'=>'page'])</a>
												</div>
												
												<div class="col-xs-4 ">
													<button data-expiry="{{ config('session.lifetime') * 60 }}" {{--disabled--}} data-targetform="#editpage" class="btn btn-success ajaxsubmit">@lang('admin.btn_update',['1','page'])</button>
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
