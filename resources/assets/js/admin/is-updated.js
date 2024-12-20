
	    
		function isUpdated($state = false)
		{

		    if ($state === true) {
		    	
		    	
			    window.onbeforeunload = function() {
			        return "This page has been edited. Leaving this page without saving will lose any changes. Are you sure you want to leave?";
			    }
			    
			    
		        if (!$("button.ajaxsubmit").hasClass("btn-warning")) {
		            $("button.ajaxsubmit").addClass("btn-warning");
		        }
		    
		    } else {
				
				window.onbeforeunload=function(){null}
				
		        $("button.ajaxsubmit").removeClass("btn-warning");
		        $(".updated.badge").fadeOut(0);
		    
		    }
		
		    return $state;
		}
            
        // FORM FIELD CHANGE DETECTON
        $("input, textarea, select").on("input propertychange paste", function () {
            isUpdated(true);
        });

        // enable update button for select2 fields
        $("[data-init-plugin='select2']").on("select2:select", function () {
            isUpdated(true);
        });

        // enable update button for summernote fields
        $(".wysiwyg").on("summernote.keyup", function () {
            isUpdated(true);
        });

        $(".sortable").on("sortchange", function () {
            isUpdated(true);
        });
   