{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="media-event-list container-remake">
    @php
        if(get_field($page, 'type_news')!=1){
            $posts = get_posts_by_category(16, 1);
        }
        else{
            $posts = get_posts_by_category(17, 1);
        }
    @endphp
    @if (!empty($posts))
        @foreach ($posts as $post)
        <div class="event-item"> 
            <div class="title">
                <div class="icon-title">
                    <img src="{{ Theme::asset()->url('images/media/event.png') }}" alt="Icon title">
                </div>
                <div class="title-wrap">
                    <h5 class="font30 font-pri-bold color-gray"><a href="{{$post->url}}">{{$post->name}}
                    </a></h5>
                    <p class="time font20 font-pri">{{date_format($post->created_at,"d-m-Y")}}</p>
                </div>
            </div>
            <div class="image-content">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href="{{$post->url}}"><img src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image) : RvMedia::getDefaultImage() }}" alt=""></a>
                    </div>
                </div>
                <div class="content">
                    <p class="font25 font-pri">{{Str::words($post->description,100)}}</p>
                    <div class="view-detail font-pri-bold font18">
                        <a href="{{$post->url}}">xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>

<div class="container-remake">
    {{ $posts->links('vendor.pagination.custom') }}
</div>