
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
                        <div class="item-img">
                            <div class="post-thumbnail">
                                <a href="{{$post->url}}"><img src="{{ get_object_image($post->image, 'post-large') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="item-content flex-fill">
                            <h4 class="title font-pri-bold font30 text-uppercase">
                                <a href="{{$post->url}}">{{$post->name}}</a>
                            </h4>
                            <p class="desc font-pri font20">
                                {{$loop->first ? Str::words($post->description,40): Str::words($post->description,20)}}
                            </p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>{{date_format($post->created_at,"d-m-Y")}}</span>
                            </p>
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
                                    <a href="{{$post->url}}"><img src="{{ get_object_image($post->image, 'post-related') }}" alt="Tin tức"></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <h4 class="font-mi-bold font20"><a href="{{$post->url}}">{{$post->name}}</a></h4>
                                <p class="desc font-pri font20">{{Str::words($post->description,40)}}</p>
                                <p class="city-day font-pri font15">
                                    <span class="city">Hà Nội</span>
                                    <span>{{date_format($post->created_at,"d-m-Y")}}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    
                </div>
                <div class="page-pagination">
                    @if(!empty($posts))
                        @includeIf("theme.main::views.components.news-pagination",['paginator'=>$posts])
                    @endif
                </div>
            </div>
            <div class="list-post-new">
                <div class="wrap">
                    <h2 class="font-mi-bold font30">tin tức mới nhất</h2>
                    <ul class="">
                        <div class="post-new-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href=""><img src="{{ Theme::asset()->url('images/media/post5.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="">Nâng cao năng suất làm việc với 5S, Kaizen và quản trị tinh gọn</a>
                            </h5>
                        </div>
                        <div class="post-new-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href=""><img src="{{ Theme::asset()->url('images/media/post6.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="">Nâng cao năng suất làm việc với 5S, Kaizen và quản trị tinh gọn</a>
                            </h5>
                        </div>
                        <div class="post-new-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href=""><img src="{{ Theme::asset()->url('images/media/post7.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="">Nâng cao năng suất làm việc với 5S, Kaizen và quản trị tinh gọn</a>
                            </h5>
                        </div>
                        <div class="post-new-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href=""><img src="{{ Theme::asset()->url('images/media/post8.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="">Nâng cao năng suất làm việc với 5S, Kaizen và quản trị tinh gọn</a>
                            </h5>
                        </div>
                        <div class="post-new-item">
                            <div class="post-thumbnail-wrap">
                                <div class="post-thumbnail">
                                    <a href=""><img src="{{ Theme::asset()->url('images/media/post9.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <h5 class="title font-mi-bold font20">
                                <a href="">Nâng cao năng suất làm việc với 5S, Kaizen và quản trị tinh gọn</a>
                            </h5>
                        </div>
                    </ul>
                    <div class="view-all-news font15 font-mi-bold">
                        <a href="#"><span>Xem thêm</span><span><i class="fas fa-arrow-right font15"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    