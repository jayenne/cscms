<h2 class="h1 font-weight-light text-center">{!! $block->present()->content2html("heading") !!}</h2>
<div>{!! $block->present()->content2htmldecode("content") !!}</div>
<div class="footer">{!! $block->present()->content("footer") !!}</div>