<div class="{{$page->present()->dropDownClass}}" aria-labelledby="nav_{{$page->id}}">
@foreach ($pages as $page)
    <a class="dropdown-item" href="{{$page->slug}}">
        {{ $page->title}}
        @if (count($page->children))
            <span class="caret"></span>
        @endif
    </a>

    @if (count($page->children))
        <ul class="dropdown-menu">
        @include('./frontend.navigation.topnavlinks', ['pages'=>$page->children])
        </ul>
    @endif
@endforeach
</div>