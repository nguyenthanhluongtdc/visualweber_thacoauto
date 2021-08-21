<div id="research-development-page">
    <div class="section-intro-wrapper">
        <div class="container-remake">
            <div class="section-intro">
                @if(has_field($page, 'intro_module_research_development'))
                <h1 class="section-intro__title font-pri-bold font40 fontmb-large text-uppercase">{!! has_field($page,
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
                    <h2 class="title font-pri-bold font40 fontmb-large text-uppercase ">
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
                            <img width="" height="" src="{{get_image_url(has_sub_field($item,'slider_image'))}}" alt="" />
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
                        </div>
                         <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
                        </div>
                         <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu7.jpg')}}" alt="" />
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
                        <img width="" height="" src="{{get_image_url(has_sub_field($item,'image_news_research_development'))}}" alt="" />
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
                        <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu5.jpg')}}" alt="" />
                    </div>
                    <div class="bottom">
                        <p class="font-pri fontmb-little">Nâng cấp sản phẩm: Chuẩn hóa và nâng cấp sản phẩm để tăng công năng sử dụng và tối ưu giá thành sản phẩm</p>
                    </div>
                </div>
                <div class="rnd-news-mobile__wrapper" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
                    <div class="top">
                        <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu6.jpg')}}" alt="" />
                    </div>
                    <div class="bottom">
                        <p class="font-pri fontmb-little">Phát triển công nghệ: Thay đổi công nghệ mang tính đột phá để nâng cấp chất lượng sản phẩm và tối ưu chi phí sản xuất</p>
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
        <div class="section-mechanical-contact-mobile"  data-aos="zoom-in" data-aos-duration="1500" data-aos-easing="ease-in-out" data-aos-delay="50">
   
            {{-- data-aos="zoom-in" data-aos-duration="1500" data-aos-easing="ease-in-out" data-aos-delay="50" --}}
        
                <h2 class="mechanical-contact__title font60 font-pri-bold mb-4 container-remake">LIÊN HỆ</h2>
                <div class="mechanical-contact mt-60 mb-60">
                    <div class="container-remake"> 
                    <div class="mechanical-contact__content">
                        <div class="mechanical-contact__content__top row">
                            <div class="right col-md-12 mt-5">
                                <img src="{{Theme::asset()->url('images/mechandical/form-contact.jpg')}}" alt="">
                            </div>
                            <div class="left col-md-12">
                                <div class="address font28">
                                    <span class="text">KHU CÔNG NGHIỆP TAM HIỆP, HUYỆN NÚI THÀNH, QUẢNG NAM.</span>
                                </div>
                                <div class="phone font28">
                                    <span class="text">0235.3567.16 - 0235.3567.162 - 
                                        0235.3567.163</span>
                                </div>
                                <div class="email font28">
                                    <span class="text">CHULAICOMPLEX@THACO.COM.VN</span>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div class="mechanical-contact__info mt-4 ">
                            <div class="row input-container ">
                                <div class="col-md-12 pr-0">
                                    <div class="styled-input">
                                        <input type="text" required />
                                        <label class="font20">họ và tên</label> 
                                    </div>
                                </div>
                                <div class="col-md-12 pr-0">
                                    <div class="styled-input">
                                        <input type="text" required />
                                        <label class="font20">email</label> 
                                    </div>
                                </div>
                                <div class="col-md-12 pr-0">
                                    <div class="styled-input">
                                        <input type="text" required />
                                        <label class="font20">số điện thoại</label> 
                                    </div>
                                </div>
                                <div class="col-md-12 pr-0">
                                    <div class="styled-input">
                                        <input type="text" required />
                                        <label class="font20">tiêu đề</label> 
                                    </div>
                                </div>
                                <div class="col-md-12 pr-0">
                                    <div class="styled-input wide">
                                        <textarea required></textarea>
                                        <label class="font20">nội dung</label>
                                    </div>
                                </div>
         
                                <div class="col-md-12 mb-4">
                                    <div class="btn-lrg  submit-btn font20">GỬI ĐI</div>
                                </div>
        
                        </div>      
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
        
    </div>
</div>
