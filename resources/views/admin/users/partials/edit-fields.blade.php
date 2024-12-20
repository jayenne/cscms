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
    	<input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" data-validation="length" data-validation-length="min2" required />
    </div>
    
</div>

<div class="form-group row">
    
    <label for="name" class="col-2 control-label">@lang('admin.form_users_forename')</label>
    
    <div class="col-4">
    	<input type="text" class="form-control" id="forename" name="forename" value="{{ @$user->profile->forename }}" data-validation="length" data-validation-length="min2" required />
    </div>
 
    <label for="name" class="col-2 control-label">@lang('admin.form_users_surname')</label>
    
    <div class="col-4">
    	<input type="text" class="form-control" id="surname" name="surname" value="{{ @$user->profile->surname }}" data-validation="length" data-validation-length="min2" required />
    </div>
       
</div>

<div class="form-group row">
    
    <label class="col-2 control-label" for="email">@lang('admin.form_users_email')</label>
    
    <div class="col-10">
    	<input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" data-validation="email" required />
    </div>
    
</div>

<div class="form-group row">
    
    <label for="phone" class="col-2 control-label">@lang('admin.form_users_phone')</label>
    
    <div class="col-10">
    	<input type="text" class="form-control" id="phone" name="phone" value="{{ @$user->profile->phone}}" data-validation="telephone" />
    </div>
       
</div>

<div class="form-group row">
    
    <label for="links" class="col-2 control-label">@lang('admin.form_users_links')</label>
    
    <div class="col-10">
    	<input type="url" class="tagsinput custom-tag-input" id="links" name="links" value="{{@$user->profile->links}}" data-validation="url" />
    </div>
       
</div>

<div class="form-group row">
    
    <label class="col-2 control-label" for="biography">@lang('admin.form_users_biography')</label>
    
    <div class="col-10">
    	<textarea class="form-control" id="biography" rows="7" name="biography" data-validation="length" data-validation-length="min6" data-validation-length-counter="min" />{{ @$user->profile->biography }}</textarea>
    </div>
    
</div>
 
<div class="form-group row">
   
    <label class="col-2 control-label" for="content">@lang('admin.form_users_roles')</label>
    
    <div class="col-10">
    @foreach($roles as $role)
 
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="roles[]"
                value="{{ $role->id }}"
                {{ $user->hasRole($role->name)?'checked':''}}>
            <label class="form-check-label" for="roles">{{ $role->name }}</label>
        </div>

    @endforeach
    </div>
    
</div>

<div class="form-group row">
    
    <label class="col-2 control-label" for="email">@lang('admin.form_users_password')</label>
    
    <div class="col-4">
    	<input type="password" class="form-control" id="password" name="password" value="" data-validation="strength" data-validation-strength="2" data-validation="length" data-validation-length="min6" />
    </div>

    
    <label class="col-2 control-label" for="email">@lang('admin.form_users_password_confirm')</label>

    <div class="col-4">
    	<input type="password" class="form-control" id="password_confirm" name="password_confirm" value="" data-validation="confirmation" data-validation-confirm="password"/>
    </div>
    
</div>

<div class="form-group row">
    
	<div class="col-2 offset-md-2 col-form-label">
		<a href="{{ URL::previous() }}" class="btn btn-secondary" >@lang('admin.btn_cancel')</a>
	</div>
	
	<div class="col-sm-3 col-form-label">
		<input type="submit" class="btn btn-primary" value="@lang('admin.form_submit')" />
	</div>
	
</div>
