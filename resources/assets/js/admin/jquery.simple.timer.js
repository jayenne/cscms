// SESSION NOTIFICATIONS
/*
*
* 1st warning at 5 mins
* 2nd warning at 1 min
*
*/

$( document ).ready(function(){
	
	var timer = null;	
	
	var $session_timeout = $('meta[name=session-lifetime]').attr('content');
	
	var $warning1 = 300;
	var $warning2 = 60;
	var $delay_warning = 5000;
	var $delay_expired = 0;
	
	var $msg_warning1 = '1<sup>st</sup> Warning: This session will expire in '+$warning1+'seconds. You should save your updates now. Any chnges made after this session expires will not be saved.';
	var $msg_warning2 = '2<sup>nd</sup> Warning: This session will expire in '+$warning2+'seconds. You should REALLY save your updates now. Any changes after this session expires will not be saved.'
	var $msg_expired  = 'EXPIRED: You will need to login again. Unfortunaly any changes made sing you last saved have been be lost.'
	
	var timer = setInterval(refreshCountdown, 1000);

	$( document ).ajaxComplete(function() {
		
		$today = new Date();
		var $time = $today.getHours() + ":" + $today.getMinutes() + ":" + $today.getSeconds();
				
		clearInterval(timer);
		
		timer = setInterval(refreshCountdown, 1000);
	
	});
	
	function sendNotify($msg,$type,$delay){
		$.notify({
			icon: 'fas fa-exclamation-triangle',
			title: 'SESSION STATUS: ',
			message: $msg
		},{
			placement: {
				from:'top',
				align: 'center'
			},
			delay: $delay,
			allow_dismiss: true,
			type:$type
		});
	}
	
	function refreshCountdown() {	
		
		$session_timeout -= 1;
				
		if (!isNaN($session_timeout)) {
								    
		    if( $session_timeout == $warning1 || $session_timeout == $warning2 || $session_timeout <=0 ) {
			    			    
			    if( $session_timeout == $warning1 ) {
					$msg = $msg_warning1;
					$type = 'info';  
					$delay = $delay_warning;
					
				} else if ( $session_timeout == $warning2 ) {
					$msg = $msg_warning2;
					$type = 'warning'; 
					$delay = $delay_warning;
					
			    } else if ( $session_timeout <= 0) {
				    $msg = $msg_expired;
					$type = 'danger';
					$delay = $delay_expired;
					
					sendNotify($msg,$type,$delay);
					
					clearInterval(timer);
					
					return;
					
			    }
			   
				sendNotify($msg,$type,$delay);

								
		    }
		    	
	    }
	         
	};

})
