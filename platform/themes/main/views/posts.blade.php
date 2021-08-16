
    {!! do_shortcode('[filter-media][/filter-media]') !!}
    <div class="container-remake">
        <div class="meida-top">
            @if (!empty(get_featured_posts_by_category(15, 4)))
                @foreach (get_featured_posts_by_category(15, 4) as $post)
                    <div class="media-top-item">
                        <div class="item-img">
                            <div class="post-thumbnail">
                                <a href="{{$post->url}}"><img src="{{ get_object_image($post->image) }}" alt=""></a>
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
                    <div class="all-post-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href=""><img src="{{ Theme::asset()->url('images/media/post5.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="font-mi-bold font20"><a href="">THACO trao tặng 126 xe chuyên dụng vận chuyển vắc xin và
                                    phục vụ tiêm chủng lưu động</a></h4>
                            <p class="desc font-pri font20">Sáng ngày 10/7/2021, tại Lễ phát động triển khai chiến dịch tiêm
                                chủng vắc xin phòng Covid-19 toàn quốc, THACO đã trao tặng 126 xe chuyên dụng trong đó gồm 63 xe
                                tải chuyên dụng vận chuyển vắc xin và 63 xe chuyên dụng phục...</p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>20-12-2021</span>
                            </p>
                        </div>
                    </div>
                    <div class="all-post-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href=""><img src="{{ Theme::asset()->url('images/media/post6.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="font-mi-bold font20"><a href="">THACO trao tặng 126 xe chuyên dụng vận chuyển vắc xin và
                                    phục vụ tiêm chủng lưu động</a></h4>
                            <p class="desc font-pri font20">Sáng ngày 10/7/2021, tại Lễ phát động triển khai chiến dịch tiêm
                                chủng vắc xin phòng Covid-19 toàn quốc, THACO đã trao tặng 126 xe chuyên dụng trong đó gồm 63 xe
                                tải chuyên dụng vận chuyển vắc xin và 63 xe chuyên dụng phục...</p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>20-12-2021</span>
                            </p>
                        </div>
                    </div>
                    <div class="all-post-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href=""><img src="{{ Theme::asset()->url('images/media/post7.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="font-mi-bold font20"><a href="">THACO trao tặng 126 xe chuyên dụng vận chuyển vắc xin và
                                    phục vụ tiêm chủng lưu động</a></h4>
                            <p class="desc font-pri font20">Sáng ngày 10/7/2021, tại Lễ phát động triển khai chiến dịch tiêm
                                chủng vắc xin phòng Covid-19 toàn quốc, THACO đã trao tặng 126 xe chuyên dụng trong đó gồm 63 xe
                                tải chuyên dụng vận chuyển vắc xin và 63 xe chuyên dụng phục...</p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>20-12-2021</span>
                            </p>
                        </div>
                    </div>
                    <div class="all-post-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href=""><img src="{{ Theme::asset()->url('images/media/post8.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="font-mi-bold font20"><a href="">THACO trao tặng 126 xe chuyên dụng vận chuyển vắc xin và
                                    phục vụ tiêm chủng lưu động</a></h4>
                            <p class="desc font-pri font20">Sáng ngày 10/7/2021, tại Lễ phát động triển khai chiến dịch tiêm
                                chủng vắc xin phòng Covid-19 toàn quốc, THACO đã trao tặng 126 xe chuyên dụng trong đó gồm 63 xe
                                tải chuyên dụng vận chuyển vắc xin và 63 xe chuyên dụng phục...</p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>20-12-2021</span>
                            </p>
                        </div>
                    </div>
                    <div class="all-post-item">
                        <div class="post-thumbnail-wrap">
                            <div class="post-thumbnail">
                                <a href=""><img src="{{ Theme::asset()->url('images/media/post9.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="font-mi-bold font20"><a href="">THACO trao tặng 126 xe chuyên dụng vận chuyển vắc xin và
                                    phục vụ tiêm chủng lưu động</a></h4>
                            <p class="desc font-pri font20">Sáng ngày 10/7/2021, tại Lễ phát động triển khai chiến dịch tiêm
                                chủng vắc xin phòng Covid-19 toàn quốc, THACO đã trao tặng 126 xe chuyên dụng trong đó gồm 63 xe
                                tải chuyên dụng vận chuyển vắc xin và 63 xe chuyên dụng phục...</p>
                            <p class="city-day font-pri font15">
                                <span class="city">Hà Nội</span>
                                <span>20-12-2021</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="page-pagination">
                   <ul class="pagination font25 font-pri-bold">
                       <li>1</li>
                       <li>2</li>
                       <li>3</li>
                       <li>4</li>
                       <li>5</li>
                       <li>6</li>
                       <li>7</li>
                       <li>8</li>
                       <li>9</li>
                       <li>10</li>
                       <li class="color">></li>
                       <li class="color">>></li>
                   </ul>
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
    