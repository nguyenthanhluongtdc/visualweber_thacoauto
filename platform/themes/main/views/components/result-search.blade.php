
@foreach($posts as $post)
    <a href="{{$post->url}}" title="{!! $post->name !!}" class="item-popover">
        <div class="name">
            {!! $post->name !!}
        </div>
    </a>
@endforeach