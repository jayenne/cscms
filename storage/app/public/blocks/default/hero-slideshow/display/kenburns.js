/*
	JavaScript For Responsive Bootstrap Carousel

    Author: Razboynik
    Author URI: http://filwebs.ru
    Description: Bootstrap Carousel Effect Ken Burns

*/

function shuffle(array) {
    
    var currentIndex = array.length, temporaryValue, randomIndex;
    
    while (0 !== currentIndex) {
    
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    
    }

  return array;
}


$(function ($) {
    
    "use strict";
    function doAnimations(elems) {

        var animEndEv = 'webkitAnimationEnd animationend';
        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }
        
    var currentSlide;
    var rand;
    var $immortalCarousel = $('.animate_text'),
        $firstAnimatingElems = $immortalCarousel.find('.carousel-item:first').find("[data-animation ^= 'animated']");
    
    var i = 0;
    var n = $('.carousel.randomize').find('.carousel-item').length;    
    
    var randArray = shuffle(Array.from(new Array(n),(val,index)=>index+1));
  
    $immortalCarousel.carousel(currentSlide);
    
    setInterval(function(){ 
        
        if(i >= n-1){ i = 0 } else { i++ };
    
        currentSlide = randArray[i];

        $('#kb.carousel').carousel(currentSlide);
        
    },5000);

    doAnimations($firstAnimatingElems);
    $immortalCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });



})(jQuery);