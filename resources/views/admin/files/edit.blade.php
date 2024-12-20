@extends('admin.layouts.index')

@push('stylesheets')
<!--link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet"-->
@endpush

@push('footer_scripts')

<!--script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script-->

@endpush

@section('content')

<div class="container-fluid container-fixed-lg">
	
	<div class="card card-transparent">
		
		<div class="card-header ">
		
			<div class="card-title">@lang('admin.pages_page_edit_title')</div>
		
		</div>
		
		<div class="card-block">
			
			<div class="row">
					
				<div class="col-md-10">
					
					<form action="{{ route('pages.update', ['page' => $page->id]) }}" method="post" class="form-horizontal" role="form" autocomplete="off">
					
						{{ method_field('PUT') }}
					
						@include('admin.pages.partials.fields')
					
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
    <!-- END card -->
</div>

@include('admin.pages.partials.scripts')

@endsection
