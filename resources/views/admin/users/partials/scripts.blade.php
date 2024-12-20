@push('stylesheets')

@endpush
@push('footer_scripts')
{{-- 
<script >
/*
    $(document).ready(function() {

		$('.custom-tag-input').tagsinput({});

		$.validate({
			modules : 'date, security, location',
			lang: 'en',

			onModulesLoaded : function() {
				//alert('All modules loaded!');
				var optionalConfig = {
			      fontSize: '12pt',
			      padding: '4px',
			      bad : 'Very bad',
			      weak : 'Weak',
			      good : 'Good',
			      strong : 'Strong'
			    };
			    
			    //$('input[name="password"]').displayPasswordStrength(optionalConfig);
			},
			onSuccess : function($form) {
			}
		
		});
		
		function wordCount(val){
		    var wom = val.match(/\S+/g);
		    return {
		        charactersNoSpaces : val.replace(/\s+/g, '').length,
		        characters         : val.length,
		        words              : wom ? wom.length : 0,
		        lines              : val.split(/\r*\n/).length
		    }
		};
		
		(function(){
			
			var $ta = $('[data-validation-length-counter]');
			
		    			    
		    if($ta.length >0){
			    $ta.after('<small id="wordcounter" class="form-text text-muted"></small>');
			    var $type = $ta.attr('data-validation-length-counter');
				var $limit = $($ta).attr('data-validation-length').replace(/\D/g,'');
			    var $err = false;
				
				$result = $('#wordcounter');		
	
			    $($ta).keyup(function(){
					
					var $stats = wordCount( this.value );
		
					$($result).html(
						"Characters (and spaces): "+ $stats.characters +
						"<br>Words: "+ $stats.words
					);
					
					
					if ($type == 'min' && $stats.characters < $limit || $type == 'max' && $stats.characters > $limit){
						
						$err = true;
						
					} else {
						
						$err = false;
						
					}
					
					if($err == true){
						
						$($ta).addClass('bg-danger');
						$($result).addClass('bg-danger');
						
					} else {
						
						$($ta).removeClass('bg-danger');
						$($result).removeClass('bg-danger');
					}
					
				});
			}
			
		})();
		
		
	});
	
 */
</script>
--}}
@endpush