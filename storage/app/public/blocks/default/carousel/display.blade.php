<div class="container">
    <div class="flickety-carousel" data-flickity='{"groupCells": 1,"pauseAutoPlayOnHover": true,"autoPlay": 1500,"contain": true,"wrapAround": true, "pageDots": false, "lazyLoad": true }'>   

 <!--========= Slides =========-->

    @for( $i = 0; $i < $block->present()->itemsCount() ; $i++ )

        <div class="carousel-cell oh">
            <img class="img-fluid d-block align-self-center" src="{{ $block->present()->content('image', $i ) }}">
            <div class="glass-overlay slide-up">
                <h5>{!! $block->present()->content2html('company', $i ) !!}</h5>
                <hr>
                <p class="small ">{!! $block->present()->content2html('sector', $i ) !!}</p>
                <p class="">{!! $block->present()->content2html('description', $i ) !!}</p>
                <div class="row mt-3 mx-auto">
                  <a href="{!! $block->present()->content2html('link', $i ) !!}" class="btn btn-sm btn-outline-light text-center mx-auto">@lang('frontend.link_read_more')</a>
                </div>
            </div>
        </div>
           
     @endfor
         
    </div>
    
</div>
