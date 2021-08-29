{!! do_shortcode('[filter-media category="' . $category->id . '"][/filter-media]') !!}
<div class="news-thaco-content container-remake overflow-hidden show-desktop">
    <div class="news-thaco-top">
        @php
        $posts = get_posts_by_category($category->id ?? 19, 999);
        $postsFeatures = get_featured_posts_by_category($category->id ?? 19, 2);
        
        @endphp
        @if (!empty($postsFeatures))
        @foreach ($postsFeatures as $post)
        <div class="item">
            <div class="item-img">
                <div class="post-thumbnail">
                    <a href=""><img loading="lazy" src="{{ get_object_image($post->image) }}" alt="Bản tin Thaco"></a>
                </div>
            </div>
            <div class="item-content">
                <h5 class="title font30 font-pri-bold">
                    <a href="">{{$post->name}}</a>
                </h5>
                <p class="day font15 font-pri color-gray">
                    {{date_format($post->created_at,"d-m-Y")}}
                </p>
                <p class="desc font-pri font20">
                    {{Str::words($post->description,30)}}
                </p>
                <a href="{{$post->url}}" class="view-detail font-pri font15">
                    {{ __("Xem chi tiết") }}<span><i class="fas fa-arrow-right font15"></i></span>
                </a>

                <p class="size-dowload">
                    <span class="font-pri"><a href="">{{ __("DOWNLOAD") }}</a></span>
                </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <ul class="news-thaco-list" id="myList">
        @if (!empty($posts))
        @foreach ($posts as $post)
        <li class="news-thaco-item">
            <div class="item-shareholder">
                <div class="item-wrap">
                    <div class="left">
                        <img loading="lazy" src="{{ Theme::asset()->url('images/main/up.png') }}" alt="{{$post->name}}" class="up-show">
                        <img loading="lazy" src="{{ Theme::asset()->url('images/main/down.png') }}" alt="{{$post->name}}" class="down-hide">
                    </div>
                    <div class="mid">
                        <h5 class="title font-pri-bold font25 color-gray">
                            {{$post->name}}
                        </h5>

                    </div>
                    <div class="right font-pri color-gray">
                        {{date_format($post->created_at,"d-m-Y")}}
                    </div>
                </div>
                <div class="desc-none">
                    <div class="wrap">
                        <div class="desc-left font-cond font20">{{@get_file_name(get_field($post, 'newspaper_file'))}}
                        </div>
                        <div class="desc-right">
                            <span class="font-cond font20">{{@get_file_size(get_field($post, 'newspaper_file'))}}</span>
                            <a href="{{ get_object_image(get_field($post, 'newspaper_file')) }}"
                                class="font-pri">{{ __("DOWNLOAD") }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </li>
        @endforeach
        @endif
    </ul>
    <div id="loadMore" class="font20 hidden">
        <span>{{ __("Readmore") }}</span>
        <span>
            <i class="fas fa-arrow-right font15"></i>
        </span>
    </div>

    <div class="page-pagination hidden-desktop">
        @if(!empty($posts))
            {{ $posts->links('vendor.pagination.custom') }}
        @endif
    </div>
</div>

<div class="news-thaco-content container-remake overflow-hidden show-mobile">
    <div class="news-thaco-top">
        @php
            $posts_mb = get_posts_by_category($category->id ?? 19, 3);
        @endphp
        @if (!empty($posts_mb))
            @foreach ($posts_mb as $post)
                <div class="item">
                    <div class="item-img">
                        <div class="post-thumbnail">
                            <a href=""><img loading="lazy" src="{{ get_object_image($post->image) }}" alt="Bản tin Thaco"></a>
                        </div>
                    </div>
                    <div class="item-content">
                        <h5 class="title font30 font-pri-bold">
                            <a href="">{{$post->name}}</a>
                        </h5>
                        <p class="day font15 font-pri color-gray">
                            {{date_format($post->created_at,"d-m-Y")}}
                        </p>
                        <p class="desc font-pri font20">
                            {{Str::words($post->description,30)}}
                        </p>
                        <a href="{{$post->url}}" class="view-detail font-pri font15">
                            {{ __("Xem chi tiết") }}<span><i class="fas fa-arrow-right font15"></i></span>
                        </a>

                        <p class="size-dowload">
                            <span class="font-pri"><a href="">{{ __("DOWNLOAD") }}</a></span>
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="page-pagination hidden-desktop">
        @if(!empty($posts_mb))
            {{ $posts_mb->links('vendor.pagination.custom') }}
        @endif
    </div>
</div>