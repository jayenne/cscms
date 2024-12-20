<div class="container">

	@include('admin.common.partials.status-message')
    
    @section('page_name')
		<div class="card card-transparent">
			<div class="card-header ">
				<div class="card-title">{{ trans('laravel-filemanager::lfm.title-panel') }}</div>
			</div>
		</div>
	@endsection
	
	<div class="container-fluid" id="wrapper">
	   	   
		<div class="row">
      <div class="col-sm-2 hidden-xs">
        <div id="tree"></div>
      </div>

      <div class="col-sm-10 col-xs-12" id="main">
        
        @include('admin.files.partials.nav')
        
        <div class="visible-xs" id="current_dir" style="padding: 5px 15px;background-color: #f8f8f8;color: #5e5e5e;"></div>

        <div id="alerts"></div>

        <div id="content"></div>
        
      </div>

      <ul id="fab">
        <li>
          <a href="#"></a>
          <ul class="hide">
            <li>
              <a href="#" id="add-folder" data-mfb-label="{{ trans('laravel-filemanager::lfm.nav-new') }}">
                <i class="fa fa-folder"></i>
              </a>
            </li>
            <li>
              <a href="#" id="upload" data-mfb-label="{{ trans('laravel-filemanager::lfm.nav-upload') }}">
                <i class="fa fa-upload"></i>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
		
  </div>

  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aia-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ trans('laravel-filemanager::lfm.title-upload') }}</h4>
        </div>
        
        <div class="modal-body">
          <form action="{{ route('unisharp.lfm.upload') }}" role='form' id='uploadForm' name='uploadForm' method='post' enctype='multipart/form-data' class="dropzone">
            @csrf

            <div class="form-group" id="attachment">

              <div class="controls text-center">
                <div class="input-group" style="width: 100%">
                  <a class="btn btn-primary" id="upload-button">{{ trans('laravel-filemanager::lfm.message-choose') }}</a>
                </div>
              </div>
            </div>
            <input type='hidden' name='working_dir' id='working_dir'>
            <input type='hidden' name='type' id='type' value='{{ request("type") }}'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="lfm-loader" >
	<img width="60" height="60" src="{{asset('system/img/loader.svg')}}">
</div>
