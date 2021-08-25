<section class="section-product-intro">
    <div class="container-remake">
        <div class="product-intro">
            <div class="product-intro--left">
                @if(has_field($page, 'tittle_product_intro'))
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle"> 
                    {!! has_field($page,
                    'tittle_product_intro') !!}  </h2>
                @endif
                @if(has_field($page, 'desc_product_intro'))
                <p class="product-intro--left__content font-pri font20 fontmb-small mb-5">
                    {!! has_field($page,
                        'desc_product_intro') !!}  
                </p>
                @endif
                <a href="#" class="product-intro--left__button font-pri font18 fontmb-small">{{ __("Readmore") }}</a>
            </div>
            <div class="product-intro--right">
                <div class="swiper-container product-intro__swiper">
                    <div class="swiper-wrapper">
                        @if(has_field($page, 'repeater_slide_product_intro'))
                        @foreach(has_field($page, 'repeater_slide_product_intro') as $item)
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{get_image_url(has_sub_field($item,'image_slide_product_intro'))}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 fontmb-middle font-mi-bold text-uppercase">
                                        {!! has_sub_field($item, 'title_slide_product_intro') ? has_sub_field($item, 'title_slide_product_intro') : '' !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-2.jpg')}}" alt="">
                                <div class="image-frame__overlay">

                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>--}}
                    </div> 
                    <div class="swiper-button-next product-intro__swiper--next">
                        <img src="{{Theme::asset()->url('images/business/next.png')}}" alt="">
                    </div>
                    <div class="swiper-button-prev product-intro__swiper--prev">
                        <img src="{{Theme::asset()->url('images/business/prev.png')}}" alt="">
                    </div>
                    <div class="swiper-pagination product-intro__swiper--pagination"></div>

                </div>
            </div>
        </div>
        <div class="product-intro">
            <div class="product-intro--left">
                @if(has_field($page, 'tittle_product_intro2'))
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle"> 
                    {!! has_field($page,
                    'tittle_product_intro2') !!}  </h2>
                @endif
                @if(has_field($page, 'desc_product_intro2'))
                <p class="product-intro--left__content font-pri font20 fontmb-small mb-5">
                    {!! has_field($page,
                        'desc_product_intro2') !!}  
                </p>
                @endif
                <a href="#" class="product-intro--left__button font-pri font18 fontmb-small ">{{ __("Readmore") }}</a>
            </div>
            <div class="product-intro--right">
                <div class="swiper-container product-intro__swiper">
                    <div class="swiper-wrapper">
                        @if(has_field($page, 'repeater_slide_product_intro2'))
                        @foreach(has_field($page, 'repeater_slide_product_intro2') as $item)
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{get_image_url(has_sub_field($item,'image_slide_product_intro2'))}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 fontmb-middle font-mi-bold text-uppercase">
                                        {!! has_sub_field($item, 'title_slide_product_intro2') ? has_sub_field($item, 'title_slide_product_intro2') : '' !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-3.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="swiper-button-next product-intro__swiper--next">
                        <img src="{{Theme::asset()->url('images/business/next.png')}}" alt="">
                    </div>
                    <div class="swiper-button-prev product-intro__swiper--prev">
                        <img src="{{Theme::asset()->url('images/business/prev.png')}}" alt="">
                    </div>
                    <div class="swiper-pagination product-intro__swiper--pagination"></div>
                </div>
            </div>
        </div>
        <div class="product-intro">
            <div class="product-intro--left">
                @if(has_field($page, 'tittle_product_intro3'))
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle"> 
                    {!! has_field($page,
                    'tittle_product_intro3') !!}  </h2>
                @endif
                @if(has_field($page, 'desc_product_intro3'))
                <p class="product-intro--left__content font-pri font20 fontmb-small mb-5">
                    {!! has_field($page,
                        'desc_product_intro3') !!}  
                </p>
                @endif
                <a href="#" class="product-intro--left__button font-pri font18 fontmb-small">{{ __("Readmore") }}</a>
            </div>
            <div class="product-intro--right">
                <div class="product-intro__image">
                    @if(has_field($page, 'img_product_intro3'))
                    <img src="{{get_image_url(has_sub_field($item,'img_product_intro3'))}}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>