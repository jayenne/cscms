@push('stylesheets')
  
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mfb.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
  
@endpush

@push('footer_scripts')

  <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/jquery.form.min.js') }}"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>

 
  <script>
    var route_prefix = "{{ url('/') }}";
    var lfm_route = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
  </script>

  <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}</script>

  <script>
    $.fn.fab = function () {
      var menu = this;
      menu.addClass('mfb-component--br mfb-zoomin').attr('data-mfb-toggle', 'hover');
      var wrapper = menu.children('li');
      wrapper.addClass('mfb-component__wrap');
      var parent_button = wrapper.children('a');
      parent_button.addClass('mfb-component__button--main')
        .append($('<i>').addClass('mfb-component__main-icon--resting fas fa-plus'))
        .append($('<i>').addClass('mfb-component__main-icon--active fas fa-times'));
      var children_list = wrapper.children('ul');
      children_list.find('a').addClass('mfb-component__button--child');
      children_list.find('i').addClass('mfb-component__child-icon');
      children_list.addClass('mfb-component__list').removeClass('hide');
    };
    $('#fab').fab({
      buttons: [
        {
          icon: 'fas fa-folder',
          label: "{{ trans('laravel-filemanager::lfm.nav-new') }}",
          attrs: {id: 'add-folder'}
        },
        {
          icon: 'fas fa-upload',
          label: "{{ trans('laravel-filemanager::lfm.nav-upload') }}",
          attrs: {id: 'upload'}
        }
      ]
    });

    Dropzone.options.uploadForm = {
      paramName: "upload[]", // The name that will be used to transfer the file
      uploadMultiple: false,
      parallelUploads: 5,
      clickable: '#upload-button',
      dictDefaultMessage: 'Or drop files here to upload',
      init: function() {
        var _this = this; // For the closure
        this.on('success', function(file, response) {
          if (response == 'OK') {
            refreshFoldersAndItems('OK');
          } else {
            this.defaultOptions.error(file, response.join('\n'));
          }
      });
      },
      acceptedFiles: "{{ lcfirst(str_singular(request('type'))) == 'image' ? implode(',', config('lfm.valid_image_mimetypes')) : implode(',', config('lfm.valid_file_mimetypes')) }}",
      maxFilesize: ({{ lcfirst(str_singular(request('type'))) == 'image' ? config('lfm.max_image_size') : config('lfm.max_file_size') }} / 1000)
    }
  </script>
@endpush