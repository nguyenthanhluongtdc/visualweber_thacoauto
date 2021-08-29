
@if(isset($posts))
    @forelse($posts as $post)
        <a href="{{$post->url}}" title="{!! $post->name !!}" class="item-popover">
            <div class="name">
                {!! $post->name !!}
            </div>
        </a>
    @empty
        <li class="item-popover">
            {!! __('Không tìm thấy kết quả nào') !!}
        </li>
    @endforelse
@else
    <li class="item-popover">
        {!! __('Không tìm thấy kết quả nào') !!}
    </li>
@endif