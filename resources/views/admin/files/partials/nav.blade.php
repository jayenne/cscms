<nav class="navbar navbar-default" id="nav">
	<div class="navbar-header">
		
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-buttons">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<a class="navbar-brand clickable hide" id="to-previous">
			<i class="fa fa-arrow-left"></i>
			<span class="hidden-xs">{{ trans('laravel-filemanager::lfm.nav-back') }}</span>
		</a>
		
		<a class="navbar-brand visible-xs" href="#">{{ trans('laravel-filemanager::lfm.title-panel') }}</a>
	
	</div>
	
	
	  <!-- Links -->
	  <ul class="nav nav-pills flex-column flex-sm-row">
	    
	    <li class="nav-item">
	    	<a class="flex-sm-fill text-sm-center nav-link clickable" id="thumbnail-display">
				<i class="fa fa-th-large"></i>
				<span>{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>
			</a>
	    </li>
	    
	    <li class="nav-item">
	     	<a class="flex-sm-fill text-sm-center nav-link clickable" id="list-display">
				<i class="fa fa-list"></i>
				<span>{{ trans('laravel-filemanager::lfm.nav-list') }}</span>
			</a>
	    </li>
	
	    <li class="nav-item dropdown">
			
			<a class="flex-sm-fill text-sm-center nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
			
			<div class="dropdown-menu">
				
				<a class="dropdown-item" href="#" id="list-sort-alphabetic">
					<i class="fas fa-sort-alpha-down"></i> {{ trans('laravel-filemanager::lfm.nav-sort-alphabetic') }}
				</a>
			
				<a class="dropdown-item" href="#" id="list-sort-time">
					<i class="fas fa-sort-amount-down"></i> {{ trans('laravel-filemanager::lfm.nav-sort-time') }}
				</a>
			
			</div>
		</li>
	    
	  </ul>
	
	
</nav>