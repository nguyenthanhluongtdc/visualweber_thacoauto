
    {!! do_shortcode('[filter-media][/filter-media]') !!}
    <div class="container-remake">
        @php
            $posts = get_posts_by_category(15, 5);
            $postsFeatures = get_featured_posts_by_category(15, 5);
        @endphp
        <div class="meida-top">   
            @if (!empty($postsFeatures))
                @foreach ($postsFeatures as $post)
                    <div class="media-top-item">
                        <div class="item-image">
                            <a href="{{$post->url}}" >
                                <img src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image, 'post-large') : RvMedia::getDefaultImage()}}" alt="">
                            </a>
                        </div>
                        <div class="item-content flex-fill">
                            <h4 class="title font-pri-bold font30 text-uppercase fontmb-medium">
                                <a href="{{$post->url}}">{{$post->name}}</a>
                            </h4>
                            <div class="bottom">
                                <p class="desc font-pri font20 fontmb-small">
                                    {{$loop->first ? Str::words($post->description,40): Str::words($post->description,20)}}
                                </p>
                                <p class="city-day font-pri font15">
                                    <span class="city">{{ \MetaBox::getMetaData($post, 'region_post', true) ?? '--' }}</span>
                                    <span>{{date_format($post->created_at,"d-m-Y")}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="media-bottom">
            <div class="list-all-post">
                <div class="list-all-post-wrap">
                    @if (!empty($posts))
                        @foreach ($posts as $post)
                        <div class="all-post-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href="{{$post->url}}">
                                        <img src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                                    </a>
                                </div>
                            </div>
                            <div class="post-content">
                                <h4 class="font-mi-bold font30 fontmb-medium"><a href="{{$post->url}}">{{$post->name}}</a></h4>
                                <p class="desc font-pri font20 fontmb-small">{{Str::words($post->description,40)}}</p>
                                <p class="city-day font-pri font15 fontmb-small">
                                    <span class="city">{{ \MetaBox::getMetaData($post, 'region_post', true) ?? '--' }}</span>
                                    <span>{{date_format($post->created_at,"d-m-Y")}}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>
                @if(!empty($posts))
                    {{ $posts->links('vendor.pagination.custom') }}
                @endif
            </div>
            <div class="list-post-new">
                <div class="wrap">
                    <h2 class="font-mi-bold font30">tin tức mới nhất</h2>
                    <ul id="new-posts" class="">
                        @if (!empty($postsFeatures))
                            @foreach ($postsFeatures as $post)
                            <div class="post-new-item">
                                <div class="post-thumbnail-wrap">
                                    <div class="post-thumbnail">
                                        <a href="{{$post->url}}"><img src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="{{$post->name}}"></a>
                                    </div>
                                </div>
                                <h5 class="title font-mi-bold font20 fontmb-medium">
                                    <a href="{{$post->url}}">{{$post->name}}</a>
                                </h5>
                            </div>
                            @php
                                $lastCreated = $post->created_at;
                            @endphp
                            @endforeach
                        @endif
                    </ul>
                    <div class="loading d-none">
                        <img src="{{Theme::asset()->url('images/media/loading.gif')}}" alt="">
                    </div>
                    <div class="view-all-news font15 font-mi-bold">
                        <a id="posts-load-more" href="javascript:;">Xem thêm<span><i class="fas fa-arrow-right font15"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .action-button {
            top: 50%;
        }
    </style>