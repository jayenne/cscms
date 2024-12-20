$(document).ready(function(){

	$('.parallax').each(function(){
		$this = $(this);

		$bg = $this.css('background-image');
		$bg = $bg.replace('url(','').replace(')','').replace(/\"/gi, "");
			
		$this.css('background-image','');
		
		$this.parallax({imageSrc:$bg});
	});

});

