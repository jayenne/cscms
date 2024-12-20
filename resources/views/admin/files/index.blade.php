@extends('admin.layouts.index')
@include('admin.common.partials.scripts')
@include('admin.files.partials.scripts')

@section('content')

<div class="container">
   
	@include('admin.common.partials.status-message')
    
    @section('page_name')
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">@lang('admin.files_pagename_documentlist')</div>
			</div>
		</div>
	@endsection
	  
    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid container-fixed-lg">

        <!-- START card -->
        <div class="card card-transparent">
          
			<div class="card-block">
                <!--div class="col-sm-2 hidden-xs">
			        <div id="tree"></div>
			    </div-->
                
                <div id="tableWithSearch_wrapper" class="dataTables_wrapper no-footer">	           
		            <table data-table="ordering" class="table table-hover data-table table-responsive-block no-footer" id="tableWithSearch" role="grid" aria-describedby="tableWithSearch_info">
	                  <thead>
	                    <tr>
	                      <th class="col-md-3">@lang('admin.th_file_title')</th>
						  <th class="col">@lang('admin.th_file_excerpt')</th>
						  <th class="col-sm-2">@lang('admin.th_file_author')</th>

	                    </tr>
	                  </thead>
	                  <tbody>
	               
                @if($files->count() === 0)
				
	                <tr>
	                    <td colspan="4" align="center">@lang('admin.files_no_files')</td>
	                </tr>
				
				@else 
				
                    @foreach ($files as $file)
	                    <tr>
	                      <td class="align-middle">
						  		<span class="d-flex flex-nowrap">
						  			<i class="fas {{ $file->icon }} fa-3x"></i>&nbsp;
						  			<div  data-toggle="tooltip" data-trigger="hover" title="<i class='fas fa-file-alt mr-2'></i>{{ $file->path }}" data-placement="bottom" data-html="true">{{ $file->title }}</div>
						  		</span>
	                      </td>
	                      
	                      <td class="align-left">
						  		<div class="pull-left" data-toggle="tooltip" data-trigger="hover" title="<i class='fas fa-align-left mr-2'></i>{{ $file->present()->limitStringLength($file->excerpt,30,'&hellip;') }}" data-placement="bottom" data-html="true">{{ $file->excerpt }}</div>
	                      </td>
	                      
	                      <td class="align-right">
		                        <div class="pull-right text-nowrap" data-toggle="tooltip" data-trigger="hover" title="
			                        <i class='fa fa-user-circle mr-2'></i>
				                        @foreach ($file->user()->first()->roles as $role)
									    {{ $loop->first ? '' : ', ' }}
									    {{ $role->name }}
									@endforeach
				                " data-placement="bottom" data-html="true" >
					                <span class="d-flex flex-nowrap">
					                <span>{{ $file->user()->first()->username }}</span>
					                <span class="rounded-circle ml-2">
						              <img src="{{ $file->user()->first()->present()->getAvatarAsset($file->user()) }}" class="img-xs rounded-circle">
						            </span>

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
        {{ $files->links() }}
    </div>
    
</div>


@endsection

