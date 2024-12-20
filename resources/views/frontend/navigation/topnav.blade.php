@push('block_scripts')
    <script >
        @include('frontend.partials.scripts')
    </script>
@endpush
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top dropshadow">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ asset('/img/logo.svg') }}" class="d-inline-block float-left" alt="" height="100"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @foreach ($pages as $navItem)
                @if( $navItem->add_to_nav == "1" && $navItem->present()->isLive )
                    @if( $navItem->restricted == "0" || (Auth::check() ))
                    <li class="nav-item {{$navItem->present()->dropDownClass}}">
                        <a class="nav-link {{ $navItem->present()->navActiveClass($page->slug) }}" href="{{ $navItem->present()->navLink }}" id="nav_{{$navItem->id}}" {{ $navItem->present()->navLinkTarget }} >
                            {{ $navItem->present()->titleNav }}
                            @if ( count($navItem->children) )
                            <span class="caret"></span>
                            @endif
                        </a>
                        @if (count($navItem->children))
                            <ul class="dropdown-menu">
                            @include('./frontend.navigation.topnavlinks', ['pages'=>$navItem->children])
                            </ul>
                        @endif
                    </li>
                    @endif
                @endif
                @endforeach
                @if(Auth::check())
                <li class="nav-item">
                    <div class="dropdown hidden-md-down">
                        <button class="btn btn-link p-0 profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-link">
                                <i class="icon inline-block fs-14">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                        <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" class=""></path>
                                    </svg>
                                </i>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                            @if(Auth::user()->isAdminOrEditor())
                            <a class="clearfix bg-master-lighter dropdown-item" href="/dashboard">
                                <span>@lang('frontend.nav_dashboard')</span>
                            </a>
                            <a class="clearfix bg-master-lighter dropdown-item" href="/admin/users/{{Auth::user()->id}}/edit">
                                <span>@lang('admin.nav_top_profile')</span>
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
                </li>
                @endif
            </ul>
        </div>
    </div>
        <div id="subnav" class="subnav w-100 bg-light text-center">
            <ul class="navbar-nav text-dark justify-content-center">
                @stack('top-subnav')
            </ul>
        </div>
</nav>