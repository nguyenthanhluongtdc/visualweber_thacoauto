<div id="introduce-page" class="font-pri">
    <div class="navbar-menu font20 introduce-menu-fixed">
        <div class="container-remake overflow-x-hidden">
            <ul class="nav font-pri-bold">
                @if(has_field($page, 'title_module_aboutus_introduce'))
                <li class="nav-item" data-aos="fade-down">
                    <a href="#{{Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}"
                        title="{{has_field($page, 'title_module_aboutus_introduce')}}" class="click_scroll">
                        {{has_field($page, 'title_module_aboutus_introduce')}}
                    </a>
                </li>
                @endif

                <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                    <a href="#section_two" title="{!!get_field($page, 'homepage_production_business_title')!!}" class="click_scroll">
                        {!!get_field($page, 'homepage_production_business_title')!!}
                    </a>
                </li>

                @if(has_field($page, 'title_module_value_introduce'))
                <li class="nav-item" data-aos="fade-down" data-aos-delay="600">
                    <a href="#{{Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}"
                        title="{!! has_field($page, 'title_module_value_introduce') !!}" class="click_scroll">
                        {!! has_field($page, 'title_module_value_introduce') !!}
                    </a>
                </li>
                @endif

                <li class="nav-item" data-aos="fade-down" data-aos-delay="900">
                    <a href="#section_four" title="{!! has_field($page, 'title_module_room_introduce') !!}" class="click_scroll">
                        {!! has_field($page, 'title_module_room_introduce') !!}
                    </a>
                </li>
                <li class="nav-item" data-aos="fade-down" data-aos-delay="1200">
                    <a href="#section_five" title="{!! has_field($page, 'title_module_behave_introduce') !!}" class="click_scroll">
                        {!! has_field($page, 'title_module_behave_introduce') !!}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section-aboutus-wrapper">
        @if(has_field($page, 'image_module_aboutus_introduce'))
        <div class="section-aboutus__picture" data-aos="fade-right">
            <img loading="lazy" class="mw-100" src="{{get_image_url(has_field($page, 'image_module_aboutus_introduce'))}}" alt="Ảnh giới thiệu">
        </div>
        @endif
        <div class="container-remake">
            <div class="section-aboutus" id="{{Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}">
                <div class="section-aboutus__content font20" data-aos="fade-down-right">
                    @if(has_field($page, 'title_module_aboutus_introduce'))
                    <h2 class="section-aboutus__content__title font-pri-bold font60 fontmb-large">
                        {!! has_field($page, 'title_module_aboutus_introduce') !!}
                    </h2>
                    @endif
                    <div class="text-justify fontmb-small">
                        @if(has_field($page, 'content_module_aboutus_introduce'))
                        {!! has_field($page, 'content_module_aboutus_introduce') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- lĩnh vực hoạt động --}}
    @include('theme.main::partials.field-of-activity',$page)
    


    <div class="section-system-value-wrapper font20"
        id="{{Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}">
        <div class="container-remake">
            <div class="section-system-value">
                @if(has_field($page, 'title_module_value_introduce'))
                <h2 class="section-system-value__title text-uppercase font-pri-bold font60 fontmb-large"
                    data-aos="fade-right">
                    {!! has_field($page, 'title_module_value_introduce') !!}
                </h2>
                @endif

                @if(has_field($page, 'description_module_value_introduce'))
                <div class="section-system-value__des text-justify fontmb-small" data-aos="fade-right">
                    {!! has_field($page, 'description_module_value_introduce') !!}
                </div>
                @endif


                <div class="section-system-value__content">
                    @if(has_field($page, 'repeat_content_module_value_introduce') && !empty(has_field($page,
                    'repeat_content_module_value_introduce')))
                    <div class="section-system-value__content__left">
                        @forelse(has_field($page, 'repeat_content_module_value_introduce') as $row)
                        <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="title font30 font-pri-bold fontmb-middle">
                                {!! has_sub_field($row, 'title') !!}
                            </h3>
                            <div class="description font18 fontmb-small text-justify">
                                {!! has_sub_field($row, 'description') !!}
                            </div>
                        </div>
                        @empty
                        <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="title font30 font-pri-bold fontmb-middle">
                                Tầm nhìn
                            </h3>
                            <p class="description font18 fontmb-small text-justify">
                                Doanh nghiệp sản xuất – kinh doanh – xuất khẩu ô tô & cơ khí của Việt Nam, phát triển
                                bền vững trong bối cảnh hội nhập khu vực và thế giới.
                            </p>
                        </div>
                        @endforelse
                    </div>
                    @endif

                    @if(has_field($page, 'image_module_value_introduce'))
                    <div class="section-system-value__content__right" data-aos="fade-right">
                        <img loading="lazy" src="{{ Storage::disk('public')->exists(has_field($page, 'image_module_value_introduce')) ? get_image_url(has_field($page, 'image_module_value_introduce')) : RvMedia::getDefaultImage()}}"
                            alt="Ảnh hệ giá trị">
                    </div>
                    @endif
                </div>

                @if(has_field($page, 'repeat_business_module_value_introduce'))
                @if(!empty(has_field($page, 'repeat_business_module_value_introduce')))
                <div class="services-mobile font-pri-bold">
                    <div class="row"> 
                        @foreach(has_field($page, 'repeat_business_module_value_introduce') as $row)
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'symbol')) ? get_image_url(has_sub_field($row, 'symbol')) : RvMedia::getDefaultImage()}}"
                                            alt=" {!! has_sub_field($row, 'name') !!}">
                                    </div>
                                    <div class="name font30 fontmb-small">
                                        {!! has_sub_field($row, 'name') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <div class="section-leader-room" id="section_four">
        <div class="container-remake">
            <h2 class="section-leader-room__title font-pri-bold font60 fontmb-large" data-aos="fade-right">
                {!! has_field($page, 'title_module_room_introduce') !!}
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
                            <img loading="lazy" src="{{ Storage::disk('public')->exists(has_sub_field($sub_item,'avatar')) ? get_image_url(has_sub_field($sub_item,'avatar')) : RvMedia::getDefaultImage()}}"
                                alt="Avata ban lãnh đạo">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                {!! has_sub_field($sub_item, 'name') ? has_sub_field($sub_item, 'name') : __('chưa cập
                                nhật') !!}
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    {!! has_sub_field($sub_item, 'title') ? has_sub_field($sub_item, 'title') : __('chưa
                                    cập nhật') !!}
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
                            @if(has_sub_field($sub_item, 'year_of_birth'))
                            <p>
                                <span>
                                    {!! __('Sinh năm') !!}
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    {!! has_sub_field($sub_item, 'year_of_birth') ? has_sub_field($sub_item,
                                    'year_of_birth') : __('chưa cập nhật') !!}
                                </span>
                            </p>
                            @endif
                            @if(has_sub_field($sub_item, 'birth_place'))
                            <p>
                                <span> {!!__('Nơi sinh')!!} </span>
                                <span>
                                    :
                                </span>
                              
                                <span>{!! has_sub_field($sub_item, 'birth_place') ? has_sub_field($sub_item,
                                    'birth_place') : __('chưa cập nhật') !!}</span>
                               
                            </p>
                            @endif
                            @if(has_sub_field($sub_item, 'level'))
                            <p>
                                <span>
                                    {!! __('Trình độ') !!}
                                </span>
                                <span>
                                    :
                                </span>

                                <span>{!! has_sub_field($sub_item, 'level') ? has_sub_field($sub_item, 'level') :
                                    __('chưa cập nhật') !!}</span>
                            </p>
                            @endif
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
                    <div class="section-behave__des fontmb-small" data-aos="fade-right">
                        @if(has_field($page, 'content_module_behave_introduce'))
                        {!! has_field($page, 'content_module_behave_introduce') !!}
                        @endif
                    </div>
                </div>
                <div class="section-behave__right" data-aos="zoom-in">
                    {{-- <h2 class="right-title font-pri-bold fontmb-large" data-aos="fade-right">
                        văn hóa
                    </h2> --}}
                    @if(has_field($page, 'image_module_behave_introduce'))
                    <img loading="lazy" src="{{Storage::disk('public')->exists(has_field($page,'image_module_behave_introduce')) ? get_image_url(has_field($page, 'image_module_behave_introduce')) : RvMedia::getDefaultImage()}}"
                        alt="Ảnh văn hóa ứng xử">
                    @endif
                </div>
            </div>
        </div>
    </div>

    @php
        $criteria = has_field($page, 'repeater_module_tieuchi_introduce');

        if(!empty($criteria)) {
            $count = count($criteria);
        }else {
            $count = 0;
        }
    @endphp

    <div class="section-criteria-wrapper font20 desktop">
        <div class="container-remake">
            <div class="section-criteria">
                <div class="section-criteria__header">
                    <h2 class="section-criteria__header__title fontmb-large font60 font-pri-bold" data-aos="fade-right">
                        @if(has_field($page, 'title_module_tieuchi_introduce'))
                        {!! has_field($page, 'title_module_tieuchi_introduce') !!}
                        @endif
                    </h2>
                    @if(has_field($page, 'description_module_tieuchi_introduce'))
                    <p class="section-criteria__headers__des fontmb-small" data-aos="fade-right">
                        {!! has_field($page, 'description_module_tieuchi_introduce') !!}
                    </p>
                    @endif
                </div>

                @if($count > 0)
                <div class="section-criteria__content justify-content-end row-first">
                    @foreach ($criteria as $row)
                    <div class="section-criteria__content__box" data-aos="fade-up">
                        <div class="box-center-bark">
                            <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'image')) ? get_image_url(has_sub_field($row, 'image')) : RvMedia::getDefaultImage()}}"
                                alt="Icon tiêu chí 8T">
                            {{-- <div class="defect-shape">
                                <div class="box-center">
                                    <img loading="lazy" src="{{get_image_url(has_sub_field($row, 'symbol'))}}" alt=" {!! has_sub_field($row, 'title') !!}">
                                    <div class="name font25 fontmb-middle text-uppercase">
                                        {!! has_sub_field($row, 'title') !!}
                                    </div>
                                    <div class="des font18 fontmb-small">
                                        {!! has_sub_field($row, 'description') !!}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @break($loop->index == 3)
                    @endforeach
                </div>
                @endif

                @if($count > 4)
                <div class="section-criteria__content justify-content-start">
                    @for ($i = 4; $i < $count; $i++) <div class="section-criteria__content__box" data-aos="fade-up">
                        <div class="box-center-bark">
                            <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($criteria[$i], 'image')) ? get_image_url(has_sub_field($criteria[$i], 'image')) : RvMedia::getDefaultImage()}}"
                                alt="Icon tiêu chí 8T">
                            {{-- <div class="defect-shape">
                                <div class="box-center">
                                    <img loading="lazy" src="{{get_image_url(has_sub_field($criteria[$i], 'symbol'))}}" alt=" {!! has_sub_field($criteria[$i], 'title') !!}">
                                    <div class="name font25 fontmb-middle text-uppercase">
                                        {!! has_sub_field($criteria[$i], 'title') !!}
                                    </div>
                                    <div class="des font18 fontmb-small">
                                        {!! has_sub_field($criteria[$i], 'description') !!}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                </div>
                @endfor
            </div>
            @endif
        </div>
    </div>
</div>

<div class="section-criteria-wrapper mobile">
    <div class="section-criteria__header">
        <div class="container-remake">
            <h2 class="section-criteria__header__title fontmb-large font60 font-pri-bold" data-aos="fade-right">
                @if(has_field($page, 'title_module_tieuchi_introduce'))
                {!! has_field($page, 'title_module_tieuchi_introduce') !!}
                @endif
            </h2>
            @if(has_field($page, 'description_module_tieuchi_introduce'))
            <p class="section-criteria__headers__des fontmb-small" data-aos="fade-right">
                {!! has_field($page, 'description_module_tieuchi_introduce') !!}
            </p>
            @endif
        </div>
    </div>
    <div class="container-remake-fullRight">
        @if(!empty($criteria))
        <div class="section-criteria-swiper">
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    @foreach($criteria as $row)
                    <div class="swiper-slide">
                        <div class="section-criteria__content__box" data-aos="fade-up">
                            <div class="box-center-bark">
                                <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'image')) ? get_image_url(has_sub_field($row, 'image')) : RvMedia::getDefaultImage()}}"
                                    alt="Ảnh tiêu chí 8T">
                                {{-- <div class="defect-shape">
                                    <div class="box-center">
                                        <img loading="lazy" src="{{get_image_url(has_sub_field($row, 'symbol'))}}" alt="Ảnh tiêu chí 8T">
                                        <div class="name  font25 fontmb-middle text-uppercase">
                                            {!! has_sub_field($row, 'title') !!}
                                        </div>
                                        <div class="des fontmb-small">
                                            {!! has_sub_field($row, 'description') !!}
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        @endif
    </div>
</div>

<div class="splide splide_video">
    <div class="splide__track">
        <ul class="splide__list">
            @if(has_field($page, 'repeater_module_video_introduce'))
            @foreach(has_field($page, 'repeater_module_video_introduce') as $row)
            <li class="splide__slide">
                <a data-fancybox href="{{has_sub_field($row, 'link_video_youtube')}}">
                        <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'image')) ? get_image_url(has_sub_field($row, 'image')) : RvMedia::getDefaultImage()}}"
                            alt="Video giới thiêu">
                    <div class="btn-play">
                        <img loading="lazy" class="img-fluid" src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="Button Play">
                    </div>
                    <div class="header_video">
                        <div class="name font30 font-pri-bold">
                            {!! has_sub_field($row, 'name') !!}
                        </div>
                        <div class="conposed font25 font-pri">
                            {!! has_sub_field($row, 'description') !!}
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
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
                    slidesPerView: 1.8,
                },
                576: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                700: {
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