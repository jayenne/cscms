@extends('admin.layouts.index')
@section('content')
@section('page_name')
	<div class="card card-transparent">
		<div class="card-header ">
			<div class="card-title">@lang('admin.users_page_create_title')</div>
		</div>
	</div>
@endsection
<div class="container-fluid container-fixed-lg">
	<div class="row justify-content-center">
			<div class="col-6 card card-transparent">
				<div class="card-block">
					<div class="row">
						<div class="col-md-10">
							<form id="createUser" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
								{{ method_field('POST') }}
								@include('admin.users.partials.create-fields')
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
    <!-- END card -->
</div>
@push('footer_scripts')
	<script  src="{{ asset('system/js/is-updated.js') }}"></script>
	<script  src="{{ asset('system/js/update-page.js') }}"></script>
@endpush
@include('admin.users.partials.scripts')
@endsection