<div class="header ">
        <!-- START MOBILE SIDEBAR TOGGLE -->

        <a href="#" class="btn-link toggle-sidebar hidden-lg-up m-1" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <!-- END MOBILE SIDEBAR TOGGLE -->
        {{--
        <div class="brand list-inline-item" >
            <img src="{{ asset('system/img/logo-square.svg') }}" alt="csCMS" data-src="{{ asset('system/img/logo-square.svg') }}" data-src-retina="{{ asset('system/img/logo-square.svg') }}" width="78" height="22">
        </div>
        --}}
		<div class="col-2 offset-1">@yield('page_name')</div>
		<div class="col">@yield('page_tabs')</div>
		<div class="col-2">@yield('form_controls')</div>

              
        <div class="d-flex align-items-center">
          <!-- START User Info-->
          
          <div class="dropdown pull-right hidden-md-down">
            
            <button class="btn btn-link profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	<div class="row">
            	<div class="p-r-10 fs-14 font-heading hidden-md-down">
			  		<span class="text-master mr-2">{{ Auth::user()->present()->displayName }}</span>
          		</div>
				
				{!! Auth::user()->present()->getAvatarBadge !!}
				
            	</div>
            </button>
            
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
            
            @if(Auth::user()->isAdminOrEditor())

				<a class="clearfix bg-master-lighter dropdown-item" href="/admin/users/{{Auth::user()->id}}/edit">
					<span><i class="fas fa-user-circle"></i> @lang('admin.nav_top_profile')</span>
				</a>
			
			@endif
			
			@impersonating
			
			    <a class="clearfix bg-master-lighter dropdown-item" href="{{ route('impersonate.leave') }}"><i class="fas fa-user-secret"></i> Quit impersonation</a>
			
			@endImpersonating
			
				<a class="clearfix bg-master-lighter dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<span><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</span>
				</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
            </div>
          </div>
          <!-- END User Info-->
          <!--
	          <a href="#" class="header-icon btn-link m-l-10 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"><i class="fas fa-alt_menu"></i></a>
        	-->
        </div>
      </div>