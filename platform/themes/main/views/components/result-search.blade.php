
@forelse($posts as $post)
    <div class="box-main">
        <a href="{{$post->url}}" title="{!! $post->name !!}" class="item-popover">
            <div class="name">
                {!! $post->name !!}
            </div>
        </a>
    </div>

    @empty

@endforelse