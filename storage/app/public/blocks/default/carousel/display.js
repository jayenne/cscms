$('document').ready(function(){

    var $flickity = new Flickity( '.flickety-carousel', {
      // options...
    });
    
    $flickity.on( 'ready.flickity', function() {
      console.log( 'Flickity is ready' )
    })

})