<div id="introduce-page" class="font-pri">
    <div class="navbar-menu font20">
        <div class="container-remake">
            <ul class="nav font-pri-bold">
                @if(has_field($page, 'title_module_aboutus_introduce'))
                <li class="nav-item" data-aos="fade-down">
                    <a href="#{{Illuminate\Support\Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}"
                        title="Về THACO AUTO" class="click_scroll">
                        {{has_field($page, 'title_module_aboutus_introduce')}}
                    </a>
                </li>
                @endif
                <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                    <a href="#section_two" title="Sản xuất - Kinh doanh ô tô & Cơ khí" class="click_scroll">
                        Sản xuất - Kinh doanh ô tô & Cơ khí
                    </a>
                </li>

                @if(has_field($page, 'title_module_value_introduce'))
                <li class="nav-item" data-aos="fade-down" data-aos-delay="600">
                    <a href="#{{Illuminate\Support\Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}"
                        title="{!! has_field($page, 'title_module_value_introduce') !!}" class="click_scroll">
                        {!! has_field($page, 'title_module_value_introduce') !!}
                    </a>
                </li>
                @endif

                <li class="nav-item" data-aos="fade-down" data-aos-delay="900">
                    <a href="#section_four" title="Tổ chức" class="click_scroll">
                        Tổ chức
                    </a>
                </li>
                <li class="nav-item" data-aos="fade-down" data-aos-delay="1200">
                    <a href="#section_five" title="Văn hoá" class="click_scroll">
                        Văn hoá
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section-aboutus-wrapper">
        @if(has_field($page, 'image_module_aboutus_introduce'))
        <div class="section-aboutus__picture" data-aos="fade-right">
            <img class="mw-100" src="{{get_image_url(has_field($page, 'image_module_aboutus_introduce'))}}" alt="">
        </div>
        @endif
        <div class="container-remake">
            <div class="section-aboutus"
                id="{{Illuminate\Support\Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}">
                <div class="section-aboutus__content font20" data-aos="fade-down-right">
                    @if(has_field($page, 'title_module_aboutus_introduce'))
                    <h2 class="section-aboutus__content__title font-pri-bold font60 fontmb-large">
                        {!! has_field($page, 'title_module_aboutus_introduce') !!}
                    </h2>
                    @endif
                    @if(has_field($page, 'content_module_aboutus_introduce'))
                    {!! has_field($page, 'content_module_aboutus_introduce') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="section-production-business-wrapper" id="section_two">
        <div class="container-remake">
            <div class="section-production-business">
                <h2 class="section-production-business__title font-pri-bold font60 fontmb-large" data-aos="fade-right">
                    SẢN XUẤT - KINH DOANH Ô TÔ & CƠ KHÍ
                </h2>

                <div class="section-production-business__content">
                    <div class="section-production-business__content__row __row-top">
                        <div class="col-left" data-aos="fade-down">
                            <div class="box-main font20">
                                <div class="symbol">
                                    <img src="{{get_image_url(theme_option('image_manufacturing'))}}" alt="">
                                </div>
                                <div class="company-name font17 font-pri-bold fontmb-small">
                                    THACO AUTO
                                </div>
                                <div class="name font40 font-pri-bold fontmb-middle">
                                    {!! theme_option('name_manufacturing') !!}
                                </div>
                                <p class="description fontmb-little">
                                    {!! theme_option('description_manufacturing') !!}
                                </p>
                            </div>
                        </div>

                        @php
                            $manufacturing = json_decode(theme_option('repeater_munufacturing'))??[];
                        @endphp

                        @if(!empty($manufacturing))
                            <div class="col-right col-top font-pri-bold fontmb-medium">
                                @foreach($manufacturing as $item)
                                    <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="box-center">
                                            <div class="symbol">
                                                <img src="{{get_image_url($item[0]->value)}}" alt="">
                                            </div>
                                            <div class="name font20 fontmb-small">
                                                {!! $item[1]->value !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="section-production-business__content__row __row-bottom">
                        <div class="col-left" data-aos="fade-right">
                            <div class="box-main font20">
                                <div class="symbol">
                                    <img src="{{get_image_url(theme_option('image_business'))}}" alt="">
                                </div>
                                <div class="company-name font17 font-pri-bold fontmb-small">
                                    THACO AUTO
                                </div>
                                <div class="name font40 font-pri-bold fontmb-middle">
                                    {!! theme_option('name_business') !!}
                                </div>
                                <p class="description fontmb-little">
                                    {!! theme_option('description_business') !!}
                                </p>
                            </div>
                        </div>

                        @php
                            $business = json_decode(theme_option('repeater_business'))??[];
                        @endphp

                        @if(!empty($business))
                            <div class="col-right col-bottom font-pri-bold fontmb-medium">
                                @foreach($business as $item)
                                <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="box-center">
                                        <div class="symbol">
                                            <img src="{{get_image_url($item[0]->value)}}" alt="">
                                        </div>
                                        <div class="name font20 fontmb-small">
                                            {!! $item[1]->value !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-system-value-wrapper font20"
        id="{{Illuminate\Support\Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}">
        <div class="container-remake">
            <div class="section-system-value">
                @if(has_field($page, 'title_module_value_introduce'))
                <h2 class="section-system-value__title text-uppercase font-pri-bold font60 fontmb-large"
                    data-aos="fade-right">
                    {!! has_field($page, 'title_module_value_introduce') !!}
                </h2>
                @endif

                @if(has_field($page, 'description_module_value_introduce'))
                <p class="section-system-value__des" data-aos="fade-right">
                    {!! has_field($page, 'description_module_value_introduce') !!}
                </p>
                @endif

                <div class="section-system-value__content">
                    <div class="section-system-value__content__left">
                        @forelse(has_field($page, 'repeat_content_module_value_introduce') as $row)
                        <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="title font30 font-pri-bold fontmb-medium">
                                {!! has_sub_field($row, 'title') !!}
                            </h3>
                            <p class="description font18 fontmb-little">
                                {!! has_sub_field($row, 'description') !!}
                            </p>
                        </div>
                        @empty
                        <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="title font30 font-pri-bold fontmb-medium">
                                Tầm nhìn
                            </h3>
                            <p class="description font18 fontmb-little">
                                Doanh nghiệp sản xuất – kinh doanh – xuất khẩu ô tô & cơ khí của Việt Nam, phát triển
                                bền vững trong bối cảnh hội nhập khu vực và thế giới.
                            </p>
                        </div>
                        @endforelse
                    </div>

                    @if(has_field($page, 'image_module_value_introduce'))
                    <div class="section-system-value__content__right" data-aos="fade-right">
                        <img src="{{get_image_url(has_field($page, 'image_module_value_introduce'))}}" alt="">
                    </div>
                    @endif
                </div>

                <div class="services-mobile font-pri-bold">
                    <div class="row">
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol12.png')}}" alt="">
                                    </div>
                                    <div class="name font20 fontmb-small">
                                        xe du lịch
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol8.png')}}" alt="">
                                    </div>
                                    <div class="name font20 fontmb-small">
                                        xe bus
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol9.png')}}" alt="">
                                    </div>
                                    <div class="name font20 fontmb-small">
                                        xe tải
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol10.png')}}" alt="">
                                    </div>
                                    <div class="name font20 fontmb-small">
                                        xe chuyên dụng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-leader-room" id="section_four">
        <div class="container-remake">
            <h2 class="section-leader-room__title font-pri-bold font60 fontmb-large" data-aos="fade-right">
                ban lãnh đạo
            </h2>

            @if(has_field($page, 'repeater_room_introduce'))
                @foreach(has_field($page, 'repeater_room_introduce') as $item)
                    <div class="section-leader-room__row font20">
                        <div class="section-leader-room__row__header" data-aos="zoom-in">
                            <span class="box font25 fontmb-small">
                                {!! has_sub_field($item, 'name_room') ? has_sub_field($item, 'name_room') : '' !!}
                            </span>
                        </div>
                        <div class="section-leader-room__row__content row">
                            @foreach(has_sub_field($item, 'repeater_people_introduce') as $sub_item)
                                <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down"
                                    data-aos-delay="300">
                                    <div class="avatar">
                                        <img src="{{get_image_url(has_sub_field($sub_item,'avatar'))}}" alt="">
                                    </div>
                                    <div class="header-profile">
                                        <strong class="name font25 fontmb-medium">
                                            {!! has_sub_field($sub_item, 'name') ? has_sub_field($sub_item, 'name') : __('chưa cập nhật') !!}
                                        </strong>
                                        <p class="rote fontmb-majority">
                                            <span>
                                                {!! has_sub_field($sub_item, 'title') ? has_sub_field($sub_item, 'title') : __('chưa cập nhật') !!}
                                            </span>
                                            {{-- <span>
                                                :
                                            </span>
                                            <span>
                                                GIÁM ĐỐC
                                            </span> --}}
                                        </p>
                                    </div>
                                    <div class="more-info fontmb-majority">
                                        <p>
                                            <span>
                                                Sinh năm
                                            </span>
                                            <span>
                                                :
                                            </span>
                                            <span>
                                                {!! has_sub_field($sub_item, 'year_of_birth') ? has_sub_field($sub_item, 'year_of_birth') : __('chưa cập nhật') !!}
                                            </span>
                                        </p>
                                        <p>
                                            <span>Nơi sinh </span>
                                            <span>
                                                :
                                            </span>
                                            <span>{!! has_sub_field($sub_item, 'birth_place') ? has_sub_field($sub_item, 'birth_place') : __('chưa cập nhật') !!}</span>
                                        </p>
                                        <p>
                                            <span>
                                                Trình độ
                                            </span>
                                            <span>
                                                :
                                            </span>
                                            <span>{!! has_sub_field($sub_item, 'level') ? has_sub_field($sub_item, 'level') : __('chưa cập nhật') !!}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="section-behave-wrapper font20" id="section_five">
        <div class="container-remake">
            <div class="section-behave">
                <div class="section-behave__left">
                    <h2 class="section-behave__title font60 font-pri-bold fontmb-large" data-aos="fade-right">
                        @if(has_field($page, 'title_module_behave_introduce'))
                            {!! has_field($page, 'title_module_behave_introduce') !!}
                        @endif
                    </h2>
                    <div class="section-behave__des" data-aos="fade-right">
                        @if(has_field($page, 'content_module_behave_introduce'))
                            {!! has_field($page, 'content_module_behave_introduce') !!}
                        @endif
                    </div>
                </div>
                <div class="section-behave__right" data-aos="zoom-in">
                    <h2 class="right-title font-pri-bold fontmb-large" data-aos="fade-right">
                        văn hóa
                    </h2>
                    @if(has_field($page, 'image_module_behave_introduce'))
                        {!! has_field($page, 'image_module_behave_introduce') !!}
                        <img src="{{get_image_url(has_field($page, 'image_module_behave_introduce'))}}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>


    @php
        $criteria = json_decode(theme_option('repeater_criteria'))??[];
        $count = count($criteria);
    @endphp
    <div class="section-criteria-wrapper font20 desktop">
        <div class="container-remake">
            <div class="section-criteria">
                <div class="section-criteria__header">
                    <h2 class="section-criteria__header__title fontmb-large font60 font-pri-bold"
                        data-aos="fade-right">
                        Tiêu chí 8T
                    </h2>
                    <p class="section-criteria__headers__des" data-aos="fade-right">
                        “Tiêu chí 8 chữ T” là những tiêu chí vàng đóng vai trò cốt lõi trong Văn hóa Thaco, hỗ trợ cho
                        quá trình rèn luyện, tự kỷ luật và hoàn thiện bản thân của mỗi con người Thaco. Đây được xem như
                        là những tiêu chí mà mỗi CB.CNV phấn đấu đạt đến để góp phần tạo nên thương hiệu Thaco tiêu biểu
                        cho nền công nghiệp ô tô của đất nước.
                    </p>
                </div>

                <div class="section-criteria__content justify-content-end row-first">
<<<<<<< HEAD
                   
                    @for ($i = 0; $i < $count; $i++)
                        <div class="section-criteria__content__box" data-aos="fade-up">
                            <div class="box-center-bark">
                                <img src="{{get_image_url($criteria[$i][0]->value)}}" alt="">
                                <div class="defect-shape">
                                    <div class="box-center">
                                        <img src="{{get_image_url($criteria[$i][1]->value)}}" alt="">
                                        <div class="name font20">
                                            {!! $criteria[$i][2]->value !!}
                                        </div>
                                        <div class="des">
                                            {!! $criteria[$i][3]->value !!}
                                        </div>
=======
                    <div class="section-criteria__content__box" data-aos="fade-up">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shap1.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/love1.png')}}" alt="">
                                    <div class="name font20">
                                        TẬN TÂM
                                    </div>
                                    <div class="des fontmb-little">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="300">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape2.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon2.png')}}" alt="">
                                    <div class="name font20">
                                        TRUNG THỰC
                                    </div>
                                    <div class="des fontmb-little">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="600">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape3.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon6.png')}}" alt="">
                                    <div class="name font20">
                                        TRÍ TUỆ
                                    </div>
                                    <div class="des fontmb-little">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="900">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape4.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon8.png')}}" alt="">
                                    <div class="name font20">
                                        TỰ TIN
                                    </div>
                                    <div class="des fontmb-little">
                                        Lorem ipsum dolor sit amet, consectetur.
>>>>>>> 721c1875d6c0304917ef7a6853f174aa0ce08f9b
                                    </div>
                                </div>
                            </div>
                        </div>

                        @break($i == 3)
                    @endfor
                </div>

                @if($count > 4)
                <div class="section-criteria__content justify-content-start">
                     
                        @for ($i = 4; $i < $count; $i++)
                            <div class="section-criteria__content__box" data-aos="fade-up">
                                <div class="box-center-bark">
                                    <img src="{{get_image_url($criteria[$i][0]->value)}}" alt="">
                                    <div class="defect-shape">
                                        <div class="box-center">
                                            <img src="{{get_image_url($criteria[$i][1]->value)}}" alt="">
                                            <div class="name font20">
                                                {!! $criteria[$i][2]->value !!}
                                            </div>
                                            <div class="des">
                                                {!! $criteria[$i][3]->value !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="section-criteria-wrapper mobile">
        <div class="container-remake">
            <div class="section-criteria__header">
                <h2 class="section-criteria__header__title fontmb-large font60 font-pri-bold"
                    data-aos="fade-right">
                    Tiêu chí 8T
                </h2>
                <p class="section-criteria__headers__des" data-aos="fade-right">
                    “Tiêu chí 8 chữ T” là những tiêu chí vàng đóng vai trò cốt lõi trong Văn hóa Thaco, hỗ trợ cho
                    quá trình rèn luyện, tự kỷ luật và hoàn thiện bản thân của mỗi con người Thaco. Đây được xem như
                    là những tiêu chí mà mỗi CB.CNV phấn đấu đạt đến để góp phần tạo nên thương hiệu Thaco tiêu biểu
                    cho nền công nghiệp ô tô của đất nước.
                </p>
            </div>
            <div class="section-criteria-swiper">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($criteria as $item)
                            <div class="swiper-slide">
                                <div class="section-criteria__content__box" data-aos="fade-up">
                                    <div class="box-center-bark">
                                        <img src="{{get_image_url($item[0]->value)}}" alt="">
                                        <div class="defect-shape">
                                            <div class="box-center">
                                                <img src="{{get_image_url($item[1]->value)}}" alt="">
                                                <div class="name mb-3 mt-4 fontmb-medium ">
                                                    {!! $item[2]->value !!}
                                                </div>
                                                <div class="des">
                                                    {!! $item[3]->value !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <div class="splide splide_video">
        <div class="splide__track">
            <ul class="splide__list">
                @if(has_field($page, 'repeater_module_video_introduce')) 
                    @foreach(has_field($page, 'repeater_module_video_introduce') as $row)
                        <li class="splide__slide" data-splide-youtube="{{has_sub_field($row, 'link_video_youtube')}}">
                            <img src="{{get_image_url(has_sub_field($row,'image'))}}" alt="">
                            <div class="btn-play">
                                <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                            </div>
                            <div class="header_video">
                                <div class="name font30 font-pri-bold">
                                    {!! has_sub_field($row, 'name') !!}
                                </div>
                                <div class="conposed font25 font-pri">
                                    {!! has_sub_field($row, 'description') !!}
                                </div>
                            </div>
                        </li>
                    @endforeach
                        <li class="splide__slide" data-splide-youtube="https://www.youtube.com/watch?v=cdz__ojQOuU">
                            <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                            <div class="btn-play">
                                <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                            </div>
                            <div class="header_video ">
                                <div class="name font30 font-pri-bold">
                                    Bài hát Chu Lai - Trường Hải ca
                                </div>
                                <div class="conposed font25 font-pri">
                                    Sáng tác Trần Quế Sơn
                                </div>
                            </div>
                        </li>
                @endif
            </ul>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script>
    $(document).ready(function() {
        new Splide( '.splide_video', {
            type  : 'fade',
            rewind: true,
            height: '58.125rem',
            breakpoints: {
                1680: {
                    height : '50rem',
                },
                1360: {
                    height : '40rem',
                },
                992: {
                    height : '30rem',
                }, 576: {
                    height : '18rem',
                }
            }
        } ).mount();

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 2.5,
            spaceBetween: 15,
            breakpoints: {
                0: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    })
</script>