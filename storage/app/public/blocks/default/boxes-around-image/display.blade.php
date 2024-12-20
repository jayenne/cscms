    
    <div class="container">
     
      <div class="row">
        
        <div class="col-md-12 text-center">
        
          <h2 class="pb-4 text-dark">{{ $block->present()->content("heading") }}</h2>
          <p>{{ $block->present()->content2html("sub-heading") }}</p>
        
        </div>
      
      </div>
      
      <div class="row">
        
        <div class="align-self-center text-md-right text-center col-md-4">
        
          <h3 class="text-dark">{{ $block->present()->content("content-heading", 0) }}</h3>
          <p class="mb-5">{{ $block->present()->content2html("content", 0) }}</p>
        
          <h3 class="text-dark">{{ $block->present()->content("content-heading", 1) }}</h3>
          <p class="mb-5">{{ $block->present()->content2html("content", 1) }}</p>
        
        </div>
        
        <div class="my-3 col-md-4">
        
          <img class="img-fluid d-block" src="{{ $block->present()->content("image") }}">
        
        </div>
        
        <div class="align-self-center text-md-left text-center col-md-4">
          
          <h3 class="text-dark">{{ $block->present()->content("content-heading", 2) }}</h3>
          <p class="mb-3">{{ $block->present()->content2html("content", 2) }}</p>
          
          <h3 class="text-dark">{{ $block->present()->content("content-heading", 3) }}</h3>
          <p>{{ $block->present()->content2html("content", 3) }}</p>
        
        </div>
      
      </div>
      
      <div class="row mt-3">
        
        <div class="mx-auto align-self-center text-md-right text-center col-md-8">
        
          <h3 class="text-center text-dark">{{ $block->present()->content("content-heading", 4) }}</h3>
          <p class="text-left">{{ $block->present()->content2html("content", 4) }}</p>
        
        </div>
        
      </div>
      
    </div>
    