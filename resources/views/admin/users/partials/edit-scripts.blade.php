@push('stylesheets')

  <link rel="stylesheet" href="{{ asset('system/css/cropper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('system/css/dropzone.min.css') }}">

@endpush

@push('footer_scripts')

<script src="{{ asset('system/js/cropper.min.js') }}"></script>
<script src="{{ asset('system/js/jquery-cropper.min.js') }}"></script>
<script src="{{ asset('system/js/dropzone.min.js') }}"></script>

<script>

    Dropzone.autoDiscover = false;

    $(document).ready(function() {
					
			// transform cropper dataURI output to a Blob which Dropzone accepts
			function dataURItoBlob(dataURI) {
			    var byteString = atob(dataURI.split(',')[1]);
			    var ab = new ArrayBuffer(byteString.length);
			    var ia = new Uint8Array(ab);
			    for (var i = 0; i < byteString.length; i++) {
			        ia[i] = byteString.charCodeAt(i);
			    }
			    return new Blob([ab], { type: 'image/jpeg' });
			}
			
			// modal window template
			var modalTemplate = $('#cropper-modal');		
			// initialize dropzone
			var myDropzone = new Dropzone(
			    "#dropzonePreview",
			    {
					autoDiscover: false,
					autoProcessQueue: false,
			        
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},

					url: "/user-image-upload",
					paramName: "file",
				    previewTemplate		: document.getElementById('dropzonePreview').innerHTML,
					clickable:'.clickable-{{$user->id}}',
					dictDefaultMessage: "",
					uploadMultiple: false,
					maxFiles: 1,
					maxFilesize: 8, //mb
					acceptedFiles: 'image/*',
				    parallelUploads: 1,
				    addRemoveLinks: false,
				    dictRemoveFile: 'Remove file',
				    dictFileTooBig: 'Image is larger than 8MB',
				    
									    
				    thumbnailWidth: 200,
				    thumbnailHeight: 200,
				    thumbnailMethod: 'contain',
				    /*
				    resizeWidth: 200,
				    resizeHeight: 200,
				    resizeMethod: 'contain',
				    resizeQuality: 1.0,
				    */
				    timeout: 10000,
					accept: function(file, done) {
					    //done();
					  },
					  init: function() {
					    this.on("addedfile", function() {
					      if (this.files[1]!=null){
					        this.removeFile(this.files[0]);
					      }
					    });
					  },
					  
				    sending:function(file, xhr, formData){
			          formData.append('user_id', "{{ $user->id }}" );	
			        },
			        
				    success: function (file, response) {
				        var $filename = response.filename;
				        file.previewElement.classList.add("dz-success");
				    },
				    
				    error: function (file, response) {
				        file.previewElement.classList.add("dz-error");
				    }

			    }
			);
			
		// listen to thumbnail event
		myDropzone.on('thumbnail', function (file) {
			if (file.cropped) {
				return;
			}
			var cachedFilename = file.name;
			myDropzone.removeFile(file);
		
			var $cropperModal = $(modalTemplate);
			var $uploadCrop = $cropperModal.find('.crop-upload');
			var $img = $('<img />');
			var reader = new FileReader();
			
			reader.onloadend = function () {
				$cropperModal.find('.image-container').html($img);
				$img.attr('src', reader.result);
				$img.cropper({
					preview: '.image-preview',
					viewMode: 1,
					zoomable: false,
					aspectRatio: 1 / 1,
					autoCrop: true,
					autoCropArea: 0.8,
					movable: true,
					cropBoxResizable: true,
					minContainerHeight : 320,
					minContainerWidth : 568,
					minCropBoxWidth: 200,
					mnCropBoxHeight: 200,
				});
			};
			
			reader.readAsDataURL(file);		
			$cropperModal.modal('show');		
			
			$uploadCrop.on('click', function() {
				var blob = $img.cropper('getCroppedCanvas').toDataURL();
				var newFile = dataURItoBlob(blob);
				newFile.cropped = true;
				newFile.name = cachedFilename;
				myDropzone.addFile(newFile);
				myDropzone.processQueue();
				$cropperModal.modal('hide');
			});
			
			$('.rotate-left').on('click', function(){
		        $img.cropper('rotate', -90);
		    });
		    $('.rotate-right').on('click', function(){
		        $img.cropper('rotate', 90);
		    });
		    $('.reset').on('click', function(){
		        $img.cropper('reset');
		    });
		});
	});
	
 
</script>

@endpush