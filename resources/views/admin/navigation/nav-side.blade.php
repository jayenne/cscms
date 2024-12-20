<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
    {{--
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="{{ asset('system/icons/add-more.svg') }}" alt="link1">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="{{ asset('system/icons/add-more.svg') }}" alt="link2">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="{{ asset('system/icons/add-more.svg') }}" alt="link3">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="{{ asset('system/icons/add-more.svg') }}" alt="link4">
                </a>
            </div>
        </div>
    --}}
        
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{ asset('system/img/logo-square-inverse.svg') }}" alt="csCMS" class="brand" data-src="{{ asset('system/img/logo-square-inverse.svg') }}" data-src-retina="{{ asset('system/img/logo-square-inverse.svg') }}" width="78" height="22">
        <div class="sidebar-header-controls">
            {{--
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down" data-pages-toggle="#appMenu"><i class="fas fa-angle-left fs-16 rotate"></i></button>
            --}}
            <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fas fa-lock-open"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
        <!-- USER MANAGER --> 
        
            <li class="m-t-30 ">
                <a href="{{ route('pages.index') }}" class="detailed">
                <span class="title">@lang('admin.nav_title_dashboard')</span>
                <span class="details"></span>
                </a>
                <span class="bg-success icon-thumbnail"><i class="fa fa-home"></i></span>
            </li>
        


		@if(Auth::user()->isAdmin())
            <li>
                <a href="{{ route('users.index') }}" class="">
                <span class="title">@lang('admin.nav_title_users')</span>
                <span class=""></span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
            </li>
		@endif
        <!-- PAGE MANAGER -->
            <li>
	            <a>
		            <span class="title">@lang('admin.nav_title_pages')</span>
		            <span class="fas fa-chevron-left rotate"></span>
		        </a>
	            <span class="icon-thumbnail">
					<i class="fas fa-file" ></i>
				</span>
	            <ul class="sub-menu">
	            	<li>
						<a href="{{ route('pages.index') }}">@lang('admin.nav_title_page_list')</a>
						<a class="icon-thumbnail" href="{{ route('pages.index') }}">
							<i class="fas fa-list"></i>
						</a>
						</span>
					</li>
	            	<li>
						<a href="{{ route('pages.create') }}">@lang('admin.btn_create',['1'=>'page'])</a>
						<a class="icon-thumbnail fa-layers fa-fw" href="{{ route('pages.create') }}">
							<i class="fas fa-4x fa-plus" data-fa-mask="fas fa-file" data-fa-transform="shrink-5 down-2" ></i>
						</a>
					</li>	              
	            </ul>
			</li>
		  <!-- FILE MANAGER -->
		  <li>
	            <a>
		            <span class="title">@lang('admin.nav_title_files')</span>
		            <span class="fas fa-chevron-left rotate"></span>
		        </a>
	            <span class="icon-thumbnail">
					<i class="fas fa-folder" ></i>
				</span>
	            <ul class="sub-menu">
					@if(Auth::user()->isAdmin())
					<li>
						<a href="{{ route('files.index') }}">@lang('admin.nav_title_file_details')</a>
						<a href="{{ route('files.index') }}" class="icon-thumbnail ">
							<i class="fas fa-file-plus"></i>
						</a>
					</li>
                    @endif
					<li>
						<a href="{{ route('files.create') }}?type=file">@lang('admin.nav_title_file_manager')</a>
						<a href="{{ route('files.create') }}?type=file" class="icon-thumbnail ">
							<i class="fas fa-copy"></i>
						</a>							
					</li>
										
					<li>
					    <a href="{{ route('files.create') }}?type=image">@lang('admin.nav_title_media_manager')</a>
					    <a href="{{ route('files.create') }}?type=image" class="icon-thumbnail">
							<i class="fas fa-images" ></i>
						</a>
					</li>
	            </ul>
          </li>

      @if(Auth::user()->isAdminOrEditor())
          <li>
              <a href="{{ route('log.views.export') }}" target="_blank" class="">
              <span class="title">@lang('admin.nav_export_video_views')</span>
              <span class=""></span>
              </a>
              <span class="icon-thumbnail"><i class="fa fa-download"></i></span>
          </li>
		@endif
 <!-- THEME MANAGER -->
	 	@if(Auth::user()->isAdmin() && Request::segment(2)=='pages' && config('app.env') != 'production')
            @push('foote_scripts')
            	@include('admin.navigation.partials.scripts')
            @endpush
            <li>
	            <a>
		            <span class="title">@lang('admin.nav_title_developer_theme')</span>
		            <span class="fas fa-chevron-left rotate"></span>
		        </a>
	            <span class="icon-thumbnail">
					<i class="fas fa-sliders-h" ></i>
				</span>
	            <ul class="sub-menu">
	            	<li>
		                <a data-ajax="blocks-sync" href="" >
			                <div class="title">@lang('admin.nav_title_developer_blocks_sync')</div>
			                <small>Sync files to database.</small>
		                </a>
		                <a data-ajax="blocks-sync" href="" class="icon-thumbnail"><i class="fas fa-sync"></i></a>
		            </li>
		            <li>
		                <a data-ajax="blocks-rebase" href="">
		                	<div class="title">@lang('admin.nav_title_developer_blocks_rebase')</div>
		                	<small>Reset attr to defaults.</small>
		                </a>
		                <a data-ajax="blocks-rebase" href="" class="icon-thumbnail"><i class="fas fa-recycle"></i></a>
		            </li>
	            </ul>
			</li>
		@endif
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>