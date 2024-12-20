@extends('admin.layouts.index')

@section('content')

@section('page_name')
	<div class="card card-transparent">
		<div class="card-header ">
			<div class="card-title">@lang('admin.users_page_edit_title')</div>
		</div>
	</div>
@endsection

@include('admin.users.partials.edit-scripts')

@include('admin.users.partials.cropper-modal')

<div class="container-fluid ">				
		
    <div class="col-10 mx-auto card card-transparent">
					
        <div class="card-block">
				
            <div class="row">
						
				<div class="col-3 mr-5">
			
					<div id="dropzonePreview" class="fileupload-wrapper h-auto" >
												
						<div id="preview-{{$user->id}}" class="dz-preview dz-image-preview">
							
							<div class="dz-details">
								
								<div class="hover-container">
									
									<img data-dz-thumbnail class="hover-image clickable-{{$user->id}} img-fluid img-thumbnail rounded" src="{{ $user->present()->getAvatarAsset($user) }}"/>
									
									<div class="hover-middle">
										
										<div class="clickable-{{$user->id}} btn btn-sm btn-success">@lang('admin.users_avatar_btn_edit')</div>
										
										<div class="dz-progress">
											<span class="dz-upload" data-dz-uploadprogress></span>
										</div>
										
										<div class="dz-error-message">
											<span data-dz-errormessage></span>
										</div>
		
									</div>
									
								</div>
								
														
							</div>
							
						</div>
						
					</div>
					
				</div>

				<div class="col">
					
					<form id="userEditForm" action="{{ route('users.update', ['user' => $user->id]) }}" method="post" class="form-horizontal" role="form" autocomplete="off">
					
						{{ method_field('PUT') }}
					
						@include('admin.users.partials.edit-fields')
							
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

</div>

    <!-- END card -->

@include('admin.users.partials.scripts')

@endsection
