<!-- SHOW FLASH MESSAGES -->
@if (session('status') )
<div class="row text-center">
    <div class="alert alert-{{ session('status')}}">
        {{ session('message')}}
    </div>
</div>
@endif