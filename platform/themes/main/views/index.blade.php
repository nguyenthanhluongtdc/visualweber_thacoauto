{{-- @php Theme::layout('no-sidebar') @endphp --}}

<div class="slider-main-carousel owl-carousel owl-theme">
    @forelse (get_field($page, 'main_banner_homepage') as $item)
    <div class="slider-main-item">
        <a href="{{get_sub_field($item, 'link')}}"><img src="{{ get_image_url(get_sub_field($item, 'image')) }}" alt="Banner trang chủ"></a>
    </div>
    @empty

    @endforelse

    {{-- <div class="slider-main-item">
        <img src="{{ Theme::asset()->url('images/main/slider2.jpg') }}" alt="">
        <div class="content-slider">
            <h2 class="font-pri-bold font60">THACO AUTO GIỚI THIỆU NEW PEUGEOT 3008</h2>
            <P class="font-cond">Peugeot – Thương hiệu xe Châu Âu với hơn 210 năm lịch sử & 100 năm dấu ấn tại Việt Nam
            </P>
            <a href="" class="font-pri-bold">{{ __("Readmore") }}</a>
        </div>
    </div> --}}
</div>

<div class="section-news-home container-remake">
    <h2 class="font-pri-bold font60 fontmb-large color-gray">{{ __('TIN TỨC VÀ SỰ KIỆN') }}</h2>
    <div class="content">
        <div class="left left-desktop" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
            @php
                $postDesktop = get_featured_posts(4);
                $postMobile = get_featured_posts(2);
            @endphp
            @if (!empty($postDesktop))
                @foreach ($postDesktop as $post)
                    @if($loop->first)
                    <div class="left-top">
                        <div class="frame">
                            <div class="item-img-main">
                                <a href="{{$post->url}}"><img src="{{ get_object_image($post->image, 'post-large') }}" alt=""></a>
                            </div>

                            <div class="item-main">
                                <div class="item-content">
                                    <h3 class="title font-pri-bold font30 fontmb-medium text-uppercase">
                                        <a href="{{$post->url}}">{{$post->name}}</a>
                                    </h3>
                                    <p class="desc font-pri font18 fontmb-small">
                                        {{Str::words($post->description,30)}}
                                    </p>
                                    <div class="city-day font-pri font18 fontmb-small">
                                        <span class="city">{{ \MetaBox::getMetaData($post, 'region_post', true) ?? '--' }}</span>
                                        <span class="day">{{date_format($post->created_at,"d-m-Y")}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="item">
                        <div class="item-content">
                            <h3 class="title font-pri-bold font20 fontmb-medium text-uppercase">
                                <a href="{{$post->url}}">{{$post->name}}</a>
                            </h3>
                            <p class="desc font-pri font18 fontmb-little">
                                {{Str::words($post->description,25)}}
                            </p>
                            <div class="city-day font-pri font18 fontmb-small">
                                <span class="city">{{ \MetaBox::getMetaData($post, 'region_post', true) ?? '--' }}</span>
                                <span class="day">{{date_format($post->created_at,"d-m-Y")}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif

            {{-- <div class="avatar-news">
                <img src="{{ Theme::asset()->url('images/main/avt.png') }}" alt="avatar">
            </div> --}}
        </div>
        <div class="left left-mobile">
            @if (!empty($postMobile))
                @if($postMobile->first())
                    <div class="item-img-main">
                        <a href="{{$postMobile->first()->url}}"><img src="{{ get_object_image($postMobile->first()->image, 'post-large') }}" alt=""></a>
                    </div>
                @endif
                @foreach ($postMobile as $post)
                    <div class="item">
                        <div class="item-content">
                            <h3 class="title font-pri-bold font18 text-uppercase">
                                <a href="{{$post->url}}">{{$post->name}}</a>
                            </h3>
                            <p class="desc font-pri font18">
                                {{Str::words($post->description,20)}}
                            </p>
                            <div class="city-day font-pri font18">
                                <span class="city">{{ \MetaBox::getMetaData($post, 'region_post', true) ?? '--' }}</span>
                                <span class="day">{{date_format($post->created_at,"d-m-Y")}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="right">
            <div class="top" data-aos="fade-left" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="250">
                @php
                    $post = is_plugin_active('blog') ? get_first_video_post() : collect();
                @endphp

                @if(isset(get_field($post, 'video_gallery')[0]))
                    <div class="img-item">
                        <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field(get_field($post, 'video_gallery')[0], 'youtube_code')}}">
                            <div class="play"></div>
                            <img src="{{ get_object_image($post->image) }}" alt="">
                        </a>
                    </div>
                    <h3 class="title font30 fontmb-small text-uppercase">
                        <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field(get_field($post, 'video_gallery')[0], 'youtube_code')}}" class="font-pri-bold color-gray font30 fontmb-small">{{$post->name}}</a>
                    </h3>
                @endif
            </div>

            <div class="bottom" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
                <p class="title font-pri-bold font20 fontmb-middle">
                    {{ __("Điểm tin") }}
                </p>

                <div class="scollbar-wrap-home">
                    <div id="hours">
                        <img class="logo-frame flag-1" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-2" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-3" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-4" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-5" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-6" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                        <img class="logo-frame flag-7" src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                    </div>
                    <div id="cells">
                        <div class="cell-item flag-1">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-2">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-3">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-4">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-5">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-6">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        <div class="cell-item flag-7">
                            <img src="{{ Theme::asset()->url('images/main/diemtin2.png') }}" alt="">
                            <span class="font-pri-bold fontmb-small">
                                <a href="#">Ưu Đãi Peugeot 3008 2021 Tháng 6 Lên Đến 73 Triệu Đồng</a>
                            </span>
                        </div>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- lĩnh vực hoạt động --}}
<div class="section-field-home">
    <div class="section-field-home-wrap container-remake">
        <h2 class="font-pri-bold font60 fontmb-large color-gray" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
            {{get_field($page, 'homepage_production_business_title')}}
        </h2>
        <div class="field-home-content">
            <div class="top">
                <div class="top-left" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" >
                    <img src="{{ get_image_url(get_field($page,'homepage_production_logo')) }}" alt="{{get_field($page, 'homepage_production_title')}}">
                    <p class="name-img font-pri-bold font18 color-pri fontmb-small">THACO AUTO</p>
                    <p class="title font-pri-bold font40 fontmb-middle color-gray">{{get_field($page, 'homepage_production_title')}}</p>
                    <P class="desc font-pri font20 color-gray">{{get_field($page, 'homepage_production_descrtiption')}}</P>
                </div>
                <div class="top-right">
                    <div class="top-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img src="{{ get_image_url(get_field($page,'homepage_production_block_1_logo')) }}" alt="{{get_field($page, 'homepage_production_block_1')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_1')!!}</a></p>
                    </div>
                    <div class="top-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img src="{{ get_image_url(get_field($page,'homepage_production_block_2_logo')) }}" alt="{{get_field($page, 'homepage_production_block_2')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_2')!!}</a></p>
                    </div>
                    <div class="top-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img src="{{ get_image_url(get_field($page,'homepage_production_block_3_logo')) }}" alt="{{get_field($page, 'homepage_production_block_3')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_3')!!}</a></p>
                    </div>

                    <div class="top-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img src="{{ get_image_url(get_field($page,'homepage_production_block_4_logo')) }}" alt="{{get_field($page, 'homepage_production_block_4')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_4')!!}</a></p>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="bottom-left" data-aos="fade-down" data-aos-duration="1200" data-aos-easing="ease-in-out">
                    <img src="{{ get_image_url(get_field($page,'homepage_business_logo')) }}" alt="{{get_field($page, 'homepage_business_title')}}">
                    <p class="name-img font-pri-bold font18 color-pri fontmb-small">THACO AUTO</p>
                    <p class="title font-pri-bold font40 color-gray fontmb-middle">{{get_field($page, 'homepage_business_title')}}</p>
                    <P class="desc font-pri font20 color-gray">{{get_field($page, 'homepage_business_descrtiption')}}</P>
                </div>
                <div class="bottom-right">
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol">
                            <img src="{{ get_image_url(get_field($page,'homepage_business_block_1_logo')) }}" alt="{{get_field($page, 'homepage_business_block_1')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">{!!get_field($page, 'homepage_business_block_1')!!}</a></p>
                    </div>
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol">
                            <img src="{{ get_image_url(get_field($page,'homepage_business_block_2_logo')) }}" alt="{{get_field($page, 'homepage_business_block_2')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">{!!get_field($page, 'homepage_business_block_2')!!}
                            </a></p>
                    </div>
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol">
                            <img src="{{ get_image_url(get_field($page,'homepage_business_block_3_logo')) }}" alt="{{get_field($page, 'homepage_business_block_3')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">{!!get_field($page, 'homepage_business_block_3')!!}</a></p>
                    </div>
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol">
                            <img src="{{ get_image_url(get_field($page,'homepage_business_block_4_logo')) }}" alt="{{get_field($page, 'homepage_business_block_4')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">{!!get_field($page, 'homepage_business_block_4')!!}</a></p>
                    </div>

                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol">
                            <img src="{{ get_image_url(get_field($page,'homepage_business_block_5_logo')) }}" alt="{{get_field($page, 'homepage_business_block_5')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="" class="link-item-home">{!!get_field($page, 'homepage_business_block_5')!!}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- quan hệ cổ đông --}}
<div class="section-shareholder-home container-remake">
    <div class="shareholder-home-top" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
        <h2 class="font-pri-bold font60 color-gray fontmb-large">Quan hệ cổ đông</h2>
        <div class="menu-tab-right font25 fontmb-small">
            <ul class="nav nav-pills font-pri-bold color-gray hidden-scrollbar" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#shareholder1">Công bố thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#shareholder2">Thông tin cổ đông</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#shareholder3">Báo cáo thường nhiên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#shareholder4">Báo cáo tài chính</a>
                </li>
            </ul>
            <div class="link-views-all font-pri-bold font18 color-gray">
                <a href="" class="color-gray">
                    Xem tất cả <span><i class="fas fa-arrow-right font15"></i></span>
                </a>
            </div>
        </div>
    </div>


    <div class="shareholder-home-content">
        <div class="tab-content font-25 fontmb-small" >
            <div id="shareholder1" class="tab-pane active ">
                <div class="tab-content-item">
                    <div class="tab-content-left" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img src="{{ Theme::asset()->url('images/main/cthome1.jpg') }}" alt="">
                    </div>
                    <div class="tab-content-right" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="250">
                        <div class="list-content">
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin phát hành cổ phiếu để tăng vốn cổ phần từ nguồn vốn chủ sở hữu
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font20 font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray font20">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Nghị quyết Đại hội đồng Cổ đông Công ty Cổ phần Ô tô Trường Hải
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản kiểm phiếu lấy ý kiến Cổ đông bằng văn bản
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản và Nghị quyết ĐHĐCĐ năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font20 font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin ngày đăng ký cuối cùng để thực hiện quyền tham dự Đại hội cổ
                                        đông năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin về việc bổ sung ngành nghề kinh doanh và sửa đổi điều lệ THACO
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="shareholder2" class="tab-pane fade">
                <div class="tab-content-item">
                    <div class="tab-content-left">
                        <img src="{{ Theme::asset()->url('images/main/cthome2.jpg') }}" alt="">
                    </div>
                    <div class="tab-content-right">
                        <div class="list-content">
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin phát hành cổ phiếu để tăng vốn cổ phần từ nguồn vốn chủ sở hữu
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Nghị quyết Đại hội đồng Cổ đông Công ty Cổ phần Ô tô Trường Hải
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản kiểm phiếu lấy ý kiến Cổ đông bằng văn bản
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản và Nghị quyết ĐHĐCĐ năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin ngày đăng ký cuối cùng để thực hiện quyền tham dự Đại hội cổ
                                        đông năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin về việc bổ sung ngành nghề kinh doanh và sửa đổi điều lệ THACO
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="shareholder3" class="tab-pane fade">
                <div class="tab-content-item">
                    <div class="tab-content-left">
                        <img src="{{ Theme::asset()->url('images/main/cthome3.jpg') }}" alt="">
                    </div>
                    <div class="tab-content-right">
                        <div class="list-content">
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin phát hành cổ phiếu để tăng vốn cổ phần từ nguồn vốn chủ sở hữu
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Nghị quyết Đại hội đồng Cổ đông Công ty Cổ phần Ô tô Trường Hải
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản kiểm phiếu lấy ý kiến Cổ đông bằng văn bản
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản và Nghị quyết ĐHĐCĐ năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin ngày đăng ký cuối cùng để thực hiện quyền tham dự Đại hội cổ
                                        đông năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin về việc bổ sung ngành nghề kinh doanh và sửa đổi điều lệ THACO
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="shareholder4" class="tab-pane fade">
                <div class="tab-content-item">
                    <div class="tab-content-left">
                        <img src="{{ Theme::asset()->url('images/main/cthome1.jpg') }}" alt="">
                    </div>
                    <div class="tab-content-right">
                        <div class="list-content">
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin phát hành cổ phiếu để tăng vốn cổ phần từ nguồn vốn chủ sở hữu
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Nghị quyết Đại hội đồng Cổ đông Công ty Cổ phần Ô tô Trường Hải
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản kiểm phiếu lấy ý kiến Cổ đông bằng văn bản
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Biên bản và Nghị quyết ĐHĐCĐ năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin ngày đăng ký cuối cùng để thực hiện quyền tham dự Đại hội cổ
                                        đông năm 2018
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>
                            <div class="item-shareholder">
                                <div class="left">
                                    <img src="{{ Theme::asset()->url('images/main/up.png') }}" alt=""
                                        class="up-show">
                                    <img src="{{ Theme::asset()->url('images/main/down.png') }}" alt=""
                                        class="down-hide">
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        Công bố thông tin về việc bổ sung ngành nghề kinh doanh và sửa đổi điều lệ THACO
                                    </h5>
                                    <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf</div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right font-pri color-gray">
                                    10/07/2020
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- đối tác --}}
<div class="section-partner-home container-remake" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
    <h2 class="font-pri-bold font60 color-gray fontmb-large text-uppercase">{{get_field($page, 'homepage_partner_title')}}</h2>
    <div class="partner-home-carousel owl-carousel">
        @if(has_field($page, 'homepage_slide_partner'))
            @forelse (get_field($page, 'homepage_slide_partner') as $item)
                <div class="item">
                    <div class="logo">
                        <a href="{{get_sub_field($item, 'lien_ket')}}"><img src="{{ get_image_url(get_sub_field($item, 'logo')) }}" alt="{{__('Partner logo')}}"></a>
                    </div>
                </div>
            @empty
                {{__('No data to show')}}
            @endforelse
        @endif
    </div>
</div>
