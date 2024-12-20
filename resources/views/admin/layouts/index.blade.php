<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	
	@stack('meta')
	
    <title>{{ config('app.name') }}</title>
    
    <!--link rel="apple-touch-icon" href="pages/ico/60.png"-->
    <!--link rel="apple-touch-icon" sizes="76x76" href="{{ asset('system/ico/76.png') }}"-->
    <!--link rel="apple-touch-icon" sizes="120x120" href="{{ asset('system/ico/120.png') }}"-->
    
    <!--link rel="apple-touch-icon" sizes="152x152" href="{{ asset('system/ico/152.png') }}"-->
    <!--link rel="icon" type="image/x-icon" href="favicon.ico" /-->
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <meta name="session-lifetime" content="{{ config('session.lifetime') * 60 }}" />
    <meta name="notify-delay-success" content="{{ config('app.notification_duration_success') }}" />
    <meta name="notify-delay-failure" content="{{ config('app.notification_duration_failure') }}" />
    
    <meta name="description" content="{{ config('app.description') }}" />
    <meta name="author" content="{{ config('app.author') }}" />

    <!-- Styles -->
    <link href="{{ asset('system/css/admin.css') }}" rel="stylesheet">

	<!-- Stylesheet injection -->	    
	@stack('stylesheets')
	@stack('block_stylesheets')
	<!-- block_styles injection -->	    
	<style>
		@stack('block_styles')
	</style>
	
	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<!--script  src="{{ asset('system/js/modernizr.min.js ') }}" ></script-->
	<script  src="{{ asset('system/js/jquery.min.js') }}" ></script>
	
	<!-- Script injection -->	    
	@stack('header_scripts')
	
</head>
<body  class="fixed-header dashboard" >
    <div id="app">
	    @if($errors->any())
        <div class="row collapse">
            <ul class="alert-box warning radius">
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        
	    @guest
	    
	    <main>
			@yield('content')
		</main>	
		
        @else
	    <!-- BEGIN SIDEBPANEL-->
	     @include('admin.navigation.nav-side') 
	    <!-- END SIDEBPANEL-->
	    
	    <!-- END PAGE CONTAINER -->
		<div class="page-container ">
			
			<!-- START HEADER -->
			@include('admin.navigation.nav-top')
			<!-- END HEADER -->
		    
		    <!-- START PAGE CONTENT WRAPPER -->
			<div class="page-content-wrapper ">
			<!-- START PAGE CONTENT -->
				<div class="content sm-gutter">
				  <!-- START CONTAINER FLUID -->
				  <div class="container-fluid padding-25 sm-padding-10">
					<!-- YEILD CONTENT-->					
   
					<main class="py-4">
						@yield('content')
					</main>			   
				  </div>
				</div>
			</div>
			
		      <!-- END PAGE CONTENT WRAPPER -->
		</div>
      <!-- END PAGE CONTAINER -->
	  
	  <!--START QUICKVIEW -->
	  {{--@include('admin.pages.partials.quickview')--}}
	  <!--END QUICKVIEW -->
	  
	  <!-- START OVERLAY -->
	  {{--@include('admin.pages.partials.overlay')--}}
	  <!-- END OVERLAY -->
	  @endguest
        
        
    </div>

	<!-- system footer scripts -->	    
	<script  src="{{ asset('system/js/moment.min.js') }}"  ></script>
	<script  src="{{ asset('system/js/fontawesome.min.js') }}"  ></script>
	<script  src="{{ asset('system/js/pace.min.js') }}"  ></script>
	<script  src="{{ asset('system/js/app.js') }}" ></script>	

	<!-- block_scripts -->
	<script  src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
	
	<!-- view footer_scripts -->
	@stack('footer_scripts')
	
	<!-- block javascript files -->
	@stack('block_scripts')
	
</body>
</html>
