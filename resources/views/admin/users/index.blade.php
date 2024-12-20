@extends('admin.layouts.index')
@include('admin.common.partials.scripts')
@include('admin.users.partials.scripts')



		
@section('form_controls')

		    <div class="row">
				

				<div class="col-xs-4 ">

					<a href="{{ route('users.create') }}" class="btn btn-success text-light">
						<i class="fas fa-4x fa-plus" data-fa-mask="fas shrink-5 fa-user" data-fa-transform="shrink-5 down-4" ></i> @lang('admin.btn_create',['1'=>'user'])
					</a>
					
				</div>
								
		    </div>

@endsection


@section('content')

<div class="container">
 
	@include('admin.common.partials.status-message')

    @section('page_name')
		
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">@lang('admin.users_page_userlist')</div>
			</div>
		</div>
		
	@endsection
	
    <!-- START CONTAINER FLUID -->
	<div class=" container-fluid container-fixed-lg">
		
		
        <!-- START card -->
 
        <div class="card-block">

	        <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">
	
				<table data-table="ordering" class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
			        
			        <thead>
			        
			            <tr>
			                
			                <th class="col">@lang('admin.th_users_name')</th>
			                
			                <th class="">@lang('admin.th_users_email')</th>
			                
			                <th class="">@lang('admin.th_users_roles')</th>
			                
			
			            </tr>
			        
			        </thead>
			
					@foreach ($users as $user)
		            <tr>
		                <td>
			               <div class="page-action-group hover-fadein btn-group" role="group" aria-label="actions" >
								<span class="btn btn-link"
		                        	data-toggle="tooltip"
									data-trigger="hover"
									title=" @lang('admin.tip_action_edit')"
									data-placement="bottom"
									data-html="true"
								>
									<a
										type="button"
										href="{{ route('users.edit',['user'=>$user->id]) }}"
									>
										<i class="fas fa-edit text-dark"></i>
									</a>
								</span>
		                        @if($user->id != 1)
			                    @canImpersonate
			                     <span class="btn btn-link"
		                        	data-toggle="tooltip"
									data-trigger="hover"
									title=" @lang('admin.tip_action_impersonate')"
									data-placement="bottom"
									data-html="true"
								>
									<a href="{{ route('impersonate', $user->id) }}"><i class="fa fa-user-secret text-dark"></i></a>
			                    </span>
								@endCanImpersonate
		                        <span class="btn btn-link"
		                        	data-toggle="tooltip"
									data-trigger="hover"
									title=" @lang('admin.tip_action_delete')"
									data-placement="bottom"
									data-html="true"
								>
				                    <a 
			                        href="{{ route('users.destroy', ['users' => $user->id]) }}"
			                        data-modal-header="@lang('admin.modal_confirm_delete_header',['1','user'])"
				                    data-modal-body="@lang('admin.modal_confirm_delete_body',['1','user'])"
				                    data-form="form_delete"
					                data-toggle="modal"
					                data-target="#confirm-delete">
						            	<i class="fa fa-trash text-dark"></i>
						        	</a>
			                    </span>
			                   				                         
		                        @else
		                        <span class="btn btn-link"
		                        	data-toggle="tooltip"
									data-trigger="hover"
									title=" @lang('admin.tip_action_nondelete',['1'=>'page'])"
									data-placement="bottom"
									data-html="true">
							        <i class="fas fa-minus-circle text-danger"></i>
		                        </span>
		                        @endif
		                    </div>
				               <span class="mr-2"><img src="{{ $user->present()->getAvatarAsset($user) }}" class="img-xs rounded-circle"></span>
				              <span>{{ $user->present()->displayName }}</span>
				            </td>
			                <td>{{ $user->email }}</td>
			                <td><span class="text-nowrap">{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</span></td>
			            </tr>
						@endforeach
			    
			    	</table>
			    	
		    	</div>
		    	
	    	</div>
	    	
	        
	        
        </div>   
    
    </div>

</div>

@endsection