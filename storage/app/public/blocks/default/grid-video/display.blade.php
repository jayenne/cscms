<ul id="og-grid" class="grid-video">
  @for( $i = 0; $i < $block->present()->itemsCount('heading'); $i++ )
  @if( $block->present()->content("heading", $i) )
  <li >
    <div class="video-item">
      <a href="#play{{ $i }}" rel="{{ $i }}" class="open-popup-link">
        <div class="overlay">
          <img class="grid-video-poster" src="{{ $block->present()->content('image', $i ) }}"/>
          <div class="grid-video-overlay">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-play-circle fa-w-16 fa-5x"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z" class=""></path></svg>
          </div>
        </div>
        <div class="og-grid-details">
          <div class="og-grid-name">{{ $block->present()->content('heading', $i) }}</div>
          <!--div class="--og-grid-body">hello{{-- $block->present()->content('body', $i) --}}</div-->
        </div>
        <div class="clearfix"></div>
      </a>
    </div>
    <div id="play{{ $i }}" class="player mfp-hide">
      <video
        id="videoplayer_{{ $i }}"
        rel="/storage/{{ $block->present()->content('link', $i) }}"
        class="video-js vjs-default-skin vjs-big-play-centered"
        data-setup='{ "controls": true, "autoplay": false, "preload": "none" }'>
        <source src="/storage/{{ $block->present()->content('link', $i) }}" type="application/x-mpegURL"/>
        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
      </video>
    </div>
  </li>
  @endif
  @endfor
</ul>

@push('block_stylesheets')
<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
@endpush
@push('footer_scripts')
<script src="https://unpkg.com/video.js/dist/video.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
 <script>
    $('document').ready(function(){ 

      $('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true,
        preloader: true,
        callbacks: {
          open: function() {
            vid = document.activeElement.rel;
            src = document.getElementById('videoplayer_'+vid);
            video = videojs('videoplayer_'+vid);
            video.play();
          },
          close: function() {
            video.pause();
          }
        }
      });
    })

    /* Video loggin */
    function logview($data){
      $data['_token'] = document.querySelector('meta[name="csrf-token"]').content;
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "{{ route('log.views') }}", true); 
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
           var response = this.responseText;
         }
      };
      xhttp.send(JSON.stringify($data));
    }

    (function(){
      var videos = document.getElementsByTagName('video'); 

      for(i=0;i<videos.length;i++) {
        let video = videojs(videos[i]);
        let video_id = videos[i].getAttribute('rel');

        video.on('timeupdate', function(){
          let t = Math.ceil(this.currentTime());
          let $data = {'filename':video_id,'time':t,'completed':0};
          logview($data);
        });

        video.on('pauses', function(){
          var t = Math.ceil(this.currentTime());
            var $data = {'filename':video_id,'time':t,'completed':0};
            logview($data);
        });

        video.on('ended', function(){
          var t = Math.ceil(this.currentTime());
          var $data = {'filename':video_id,'time':t,'completed':1};
          logview($data);
        });
      }
    })();

</script>
@endpush