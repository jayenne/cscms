@extends('admin.layouts.index')

@section('content')
    <div class="login-wrapper h-100">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <div class="overpic"></div>
        <!--img src="{{ asset('system/img/backgrounds/login.jpg') }}" data-src="{{ asset('system/img/backgrounds/login.jpg') }}" data-src-retina="{{ asset('system/img/backgrounds/login.jpg') }}" alt="" class="lazy"-->
        <!-- END Background Pic-->
        <!-- START Background Caption-->
	        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
	          <h2 class="semi-bold text-white">
						@lang('admin.login_strapline')</h2>
	          <p class="small">
	            @lang('admin.app_copyright')
	          </p>
	        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="{{ asset('system/img/logo-square.svg') }}" alt="csCMS" data-src="{{ asset('system/img/logo-square.svg') }}" data-src-retina="{{ asset('system/img/logo-square.svg') }}" width="78" height="22">
          <p class="p-t-35">Sign into your account</p>
          
          <!-- START Login Form -->
	      <form method="POST" action="{{ route('login') }}" id="form-login" class="p-t-15" role="form">
                        @csrf
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label for="email">{{ __('E-Mail Address') }}</label>
              <div class="controls">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="User Name" required autofocus>
				@if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <!-- END Form Control-->
            
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label for="password">{{ __('Password') }}</label>
              <div class="controls">
	            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
              </div>
            </div>
            <!-- START Form Control-->
            {{--
            <div class="row">
              <div class="col-md-6 no-padding sm-p-l-10">
                <div class="checkbox ">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
              
              <div class="col-md-6 d-flex align-items-center justify-content-end">
                <a href="{{ route('password.request') }}" class="text-info small">{{ __('Forgot Your Password?') }}</a>
              </div>
              
            </div>
            --}}
            <!-- END Form Control-->
   
            <button class="btn btn-primary btn-cons m-t-10" type="submit">{{ __('Login') }}</button>
      
          </form>
          <!--END Login Form-->
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <script>
      window.onload = function() {
        var inputs = document.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
          if (inputs[i].type == 'password') {
            inputs[i].oninput = function() {
              this.value = this.value.replace(/^\s+/, '').replace(/\s+$/, '');
              console.log('changing password to '+this.value);
            };
          }
        }
      }
    </script>
@endsection
