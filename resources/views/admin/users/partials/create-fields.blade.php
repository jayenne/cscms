{!! csrf_field() !!}

@if (!$errors->isEmpty())

<div class="alert alert-danger">
    
    <ul>
        @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
    
</div>

@endif

<div class="form-group row">
    
    <label for="name" class="col-2 control-label">@lang('admin.form_users_username')</label>
    
    <div class="col-10">
    	<input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" data-validation="length" data-validation-length="min2" required />
    </div>
    
</div>

<div class="form-group row">
    
    <label class="col-2 control-label" for="email">@lang('admin.form_users_email')</label>
    
    <div class="col-10">
    	<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" data-validation="email" required />
    </div>
    
</div>

<div class="form-group row">
   
    <label class="col-2 control-label" for="content">@lang('admin.form_users_roles')</label>
    
    <div class="col-10">
    @foreach($roles as $role)
 
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="roles[]"
                value="{{ $role->id }}"
            >
            <label class="form-check-label" for="roles">{{ $role->name }}</label>
        </div>

    @endforeach
    </div>
    
</div>

<div class="form-group row">
    
    <label class="col-2 control-label" for="password">@lang('admin.form_users_password')</label>
    
    <div class="col-4">
    	<input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" data-validation="strength" data-validation-strength="2" type="password" data-validation="length" data-validation-length="min6" />
    </div>

    
    <label class="col-2 control-label" for="password_confirm">@lang('admin.form_users_password_confirm')</label>

    <div class="col-4">
    	<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" data-validation="confirmation" data-validation-confirm="password"/>
    </div>
    
</div>


@section('form_controls')
					
    <div class="row">
		<div class="col-xs-4 ">
			<a href="/admin/users" class="btn btn-secondary " >@lang('admin.btn_cancel')</a>
		</div>
		
		<div class="col-xs-4 ">
			<button data-expiry="{{ config('session.lifetime') * 60 }}" data-targetform="#createUser" data-redirect="admin/users" class="btn btn-success ajaxsubmit">@lang('admin.btn_update',['1','user'])</button>
		</div>				
    </div>

@endsection

{{--
	<div class="form-group row">
	    
		<div class="col-2 offset-md-2 col-form-label">
			<a href="{{ URL::previous() }}" class="btn btn-secondary" >@lang('admin.btn_cancel')</a>
		</div>
		
		<div class="col-sm-3 col-form-label">
			<input type="submit" class="btn btn-primary" value="@lang('admin.form_submit')" />
		</div>
		
	</div>
--}}