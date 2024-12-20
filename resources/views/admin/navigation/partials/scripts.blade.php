@push('stylesheets')

@endpush

@push('footer_scripts')

<script >
	
	window.addEventListener('DOMContentLoaded', function() {
        
        (function($) {
            
            $(document).ready(function() {
				
				if(window.jQuery){
					
					var $delay_success = parseInt($('meta[name="notify-delay-success"]').attr('content'));					
					var $delay_failure = parseInt($('meta[name="notify-delay-failure"]').attr('content'));
					
				
					
					// REFRESH BLOCK LIBRARY
					$(document).on("click","[data-ajax='blocks-sync']", function(e) {
				        
				        e.preventDefault();
						
						var $data = {};

											
					    $target = $(this).data('target-form');
					    $form = $($target);
						
					    $url = '/api-blocks-sync';
					    					
				        $.ajax({
							type:"POST",
					        headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  							},
					        url: $url,
					        data: $data,
					        dataType: 'json',
					        success: function(data){
								$delay = $delay_success;
								$msg = data.status;
								
								$.notify({
									icon: 'fas fa-thumbs-up',
									title: 'Update status: ',
									message: $msg
								},{
									placement: {
										from:'top',
										align: 'center'
									},
									delay: $delay,
									allow_dismiss: true,
									type:'success'
								});
								
								if(data.html){
									$form.find('.sortable-column').append(JSON.parse(data.html));
								}
								
					        },error: function(xhr, status, error) {
								err = JSON.parse(xhr.responseText);
								$delay = $delay_failure;
								$.notify({
									icon: 'fas fa-exclamation-triangle',
									title: 'ERROR: ('+xhr.status+')',
									message: '<br/><br/>'+err.message+'<br/><br/>Please email this error message to your webmaster.'
								},{
									placement: {
										from:'top',
										align: 'center'
									},
									delay: 0,
									allow_dismiss: true,
									type:'danger'
								});
							
						    }
							
							
					    });

				    })
					
					
					$(document).on("click","[data-ajax='blocks-rebase']", function(e) {
				        
				        e.preventDefault();
						
						var $data = {};
												
					    $target = $(this).data('target-form');
					    $form = $($target);
						
					    $url = '/api-blocks-rebase';
					    				
				        $.ajax({
							type:"POST",
					        headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  							},	
					        url: $url,
					        data: $data,
					        dataType: 'json',
					        success: function(data){
								$delay = $delay_success;
								$msg = data.status;
								
								$.notify({
									icon: 'fas fa-thumbs-up',
									title: 'Update status: ',
									message: $msg
								},{
									placement: {
										from:'top',
										align: 'center'
									},
									delay: $delay,
									allow_dismiss: true,
									type:'success'
								});
								
								location.reload();
								
					        },error: function(xhr, status, error) {
								err = JSON.parse(xhr.responseText);
								$delay = $delay_failure;
								$.notify({
									icon: 'fas fa-exclamation-triangle',
									title: 'ERROR: ('+xhr.status+')',
									message: '<br/><br/>'+err.message+'<br/><br/>Please email this error message to your webmaster.'
								},{
									placement: {
										from:'top',
										align: 'center'
									},
									delay: 0,
									allow_dismiss: true,
									type:'danger'
								});
							
						    }
							
							
					    });

				    })
				}				
				

            });
            
        })(jQuery);
    });
    
</script>

@endpush