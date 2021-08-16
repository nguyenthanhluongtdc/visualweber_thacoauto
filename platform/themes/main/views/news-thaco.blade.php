{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="news-thaco-content container-remake">
    <div class="news-thaco-top">
        @php
            $posts = get_posts_by_category(19, 999);
            $postsFeatures = get_featured_posts_by_category(19, 2);
        @endphp
        @if (!empty($postsFeatures))
            @foreach ($postsFeatures as $post)
            <div class="item">
                <div class="item-img">
                    <div class="post-thumbnail">
                        <a href=""><img src="{{ get_object_image($post->image) }}" alt="Bản tin Thaco"></a>
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
                    Xem chi tiết<span><i class="fas fa-arrow-right font15"></i></span>
                    </a>
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
                            <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                class="up-show">
                            <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                class="down-hide">
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
                        <div class="desc-left font-cond font20">{{@get_file_name(get_field($post, 'newspaper_file'))}}</div>
                        <div class="desc-right">
                            <span class="font-cond font20">{{@get_file_size(get_field($post, 'newspaper_file'))}}</span>
                            <a href="{{ get_object_image(get_field($post, 'newspaper_file')) }}" class="font-pri">DOWNLOAD</a>
                        </div>
                        </div>
                    </div>
                </div>

            </li>
            @endforeach
        @endif
    </ul>
    <div id="loadMore" class="font20"><span>Xem thêm</span><span><i class="fas fa-arrow-right font15"></i></div>
</div>