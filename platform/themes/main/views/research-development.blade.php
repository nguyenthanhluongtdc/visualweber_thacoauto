<div id="research-development-page">
    <div class="section-intro-wrapper overflow-x-hidden">
        <div class="container-remake">
            <div class="section-intro">
                @if(has_field($page, 'intro_module_research_development'))
                <h1 class="section-intro__title font-pri-bold font60 fontmb-large text-uppercase">{!! has_field($page,
                    'intro_module_research_development') !!}  </h1>
                @endif
                @if(has_field($page, 'description_module_research_development'))
                <p class="rd-production__content font20 font-pri  fontmb-small"> {!! has_field($page,
                    'description_module_research_development') !!}
                </p>
                @endif
            </div>
        </div>

        @includeIf("theme.main::views.pages.support-industry.rnd-banner")

        <div class="section-info-more-wrapper font-pri">
            <div class="content font20">
                <div class="container-remake">
                    @if(has_field($page, 'tittle_module_research_development'))
                        <h2 class="title font-pri-bold font60 fontmb-large text-uppercase ">
                            {!! has_field($page,
                                'tittle_module_research_development') !!}
                        </h2>
                    @endif
                    <ul>
                        @if(has_field($page, 'repeater_top_research_development'))
                        @foreach(has_field($page, 'repeater_top_research_development') as $item)
                        <li>
                            {!! has_sub_field($item, 'content_top_research_development') ? has_sub_field($item, 'content_top_research_development') : '' !!}
                        </li>

                        @endforeach
                        @endif
                    </ul>
                    @if(has_field($page, 'repeater_bottom_research_development'))
                        @foreach(has_field($page, 'repeater_bottom_research_development') as $item)
                            <div class=" fontmb-small">
                                <p>
                                    {!! has_sub_field($item, 'content_bottom_research_development') ? has_sub_field($item, 'content_bottom_research_development') : '' !!}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="list-image row">
                <div class="swiper-container researchDevSwiper">
                    <div class="swiper-wrapper">
                        @if(has_field($page, 'repeater_slider_research_development'))
                            @foreach(has_field($page, 'repeater_slider_research_development') as $item)
                                <div class="swiper-slide">
                                    <img loading="lazy" width="" height="" src="{{get_image_url(has_sub_field($item,'slider_image'))}}" alt="" />
                                </div>
                            @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
                        </div>
                         <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
                        </div>
                         <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
                        </div> --}}
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
            <div class="rnd-news-mobile container-remake">
                @if(has_field($page, 'repeater_module_news_research_development'))
                    @foreach(has_field($page, 'repeater_module_news_research_development') as $item)
                        <div class="rnd-news-mobile__wrapper" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
                            <div class="top">
                                <img loading="lazy" width="" height="" src="{{get_image_url(has_sub_field($item,'image_news_research_development'))}}" alt="???nh tin t???c" />
                            </div>
                            <div class="bottom">
                                <div class="fontmb-small font-pri">
                                    <p> {!! has_sub_field($item, 'description_news_research_development') ? has_sub_field($item, 'description_news_research_development') : '' !!}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="rnd-news-mobile__wrapper " data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
                    <div class="top">
                        <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                    </div>
                    <div class="bottom">
                        <p class="font-pri fontmb-little">N??ng c???p s???n ph???m: Chu???n h??a v?? n??ng c???p s???n ph???m ????? t??ng c??ng n??ng s??? d???ng v?? t???i ??u gi?? th??nh s???n ph???m</p>
                    </div>
                </div>
                <div class="rnd-news-mobile__wrapper" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
                    <div class="top">
                        <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                    </div>
                    <div class="bottom">
                        <p class="font-pri fontmb-little">Ph??t tri???n c??ng ngh???: Thay ?????i c??ng ngh??? mang t??nh ?????t ph?? ????? n??ng c???p ch???t l?????ng s???n ph???m v?? t???i ??u chi ph?? s???n xu???t</p>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="container-remake">
                <div class="line-border">
                    <div class="bg-dark h-100 w-25"> </div>
                </div>
            </div> --}}
        </div>

        @includeIf("theme.main::views.pages.mechanical.mechanical-news")
        @includeIf("theme.main::views.pages.mechanical.mechanical-news-mobile")

        <div class="form-contact-only-mobile">
            @includeIf("theme.main::views.pages.mechanical.mechanical-contact")
        </div>
    </div>
</div>
