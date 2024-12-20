<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('page-title')</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    
    <!--link rel="apple-touch-icon" href="pages/ico/60.png"-->
    <!--link rel="apple-touch-icon" sizes="76x76" href="{{ asset('system/ico/76.png') }}"-->
    <!--link rel="apple-touch-icon" sizes="120x120" href="{{ asset('system/ico/120.png') }}"-->
    <!--link rel="apple-touch-icon" sizes="152x152" href="{{ asset('system/ico/152.png') }}"-->
    
    <!--link rel="icon" type="image/x-icon" href="favicon.ico" /-->
    
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    
    <meta name="keywords" content="@yield('seo-keywords')" />
    <meta name="description" content="@yield('seo-description')" />
    <meta name="author" content="@yield('page-author')" />

    <!-- Fonts -->
    <!--link rel="dns-prefetch" href="https://fonts.gstatic.com"-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Styles -->

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	
	<!-- Stylesheet injection -->	    
	@stack('block_stylesheets')
	@stack('stylesheets')

	<!-- block_styles injection -->	    
	<style>
		@stack('block_styles')
	</style>

	<!-- Scritps -->
	
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" ></script>
	
</head>
<body>
    <div id="app">

	@include('frontend.navigation.topnav')
     
    	<main>

			@yield('content')
		
	   {{-- <!-- NOT IMPLEMENTED FRONTEND END MEMBER BLOCKS/FUCNTIONALITY -->
		   @guest
				@yield('content')			
	        @else
				@yield('content')
			@endguest
		--}}  
		
		</main>
  
   	@include('frontend.navigation.footernav')
   	@include('frontend.partials.cookiealert')
    </div>
	
	<script src="{{ asset('system/js/jquery.min.js') }}" ></script>
	<script src="{{ asset('js/app.js') }}" ></script>

	<!--script  src="{{ asset('system/js/fontawesome.min.js') }}"  ></script-->

	<!-- view footer_scripts -->
	@stack('footer_scripts')
	
	<!-- block javascript files -->
	@stack('block_scripts')
</body>
</html>
