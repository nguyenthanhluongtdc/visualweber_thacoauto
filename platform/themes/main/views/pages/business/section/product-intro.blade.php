<section class="section-product-intro">
    <div class="container-remake">
        @if(has_field($page, 'repeater_overview_product_intro'))
        @foreach(has_field($page, 'repeater_overview_product_intro') as $item)
        <div class="product-intro">
            <div class="product-intro--left">
              
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle text-uppercase">
                    {!! has_sub_field($item, 'tittle_product_intro') ? has_sub_field($item, 'tittle_product_intro') : '' !!}
                  </h2>
              
                <div class="product-intro--left__content font-pri font20 fontmb-small">
                    <p>
                        {!! has_sub_field($item, 'desc_product_intro') ? has_sub_field($item, 'desc_product_intro') : '' !!}
                    </p>
                </div>

               
                <a href="#" class="product-intro--left__button font-pri font18 fontmb-small">{{ __("Readmore") }}</a>
            </div>
          
            <div class="product-intro--right">
                <div class="swiper-container product-intro__swiper">
                    <div class="swiper-wrapper">
                        @foreach(has_sub_field($item, 'slide_repeater_product_intro') as $sub_item)
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{ Storage::disk('public')->exists(has_sub_field($sub_item,'image')) ? get_image_url(has_sub_field($sub_item,'image')) : RvMedia::getDefaultImage()}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 fontmb-middle font-mi-bold text-uppercase">
                                        {!! has_sub_field($sub_item, 'tittle') ? has_sub_field($sub_item, 'tittle') : __('chưa cập
                                        nhật') !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-2.jpg')}}" alt="">
                                <div class="image-frame__overlay">

                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <div class="swiper-button-next product-intro__swiper--next">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/next.png')}}" alt="">
                    </div>
                    <div class="swiper-button-prev product-intro__swiper--prev">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/prev.png')}}" alt="">
                    </div>
                    <div class="swiper-pagination product-intro__swiper--pagination"></div>

                </div>
            </div>
           
        </div>
        @endforeach
        @endif
        {{-- <div class="product-intro">
            <div class="product-intro--left">
                @if(has_field($page, 'tittle_product_intro2'))
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle">
                    {!! has_field($page,
                    'tittle_product_intro2') !!}  </h2>
                @endif
                @if(has_field($page, 'desc_product_intro2'))
                <div class="product-intro--left__content font-pri font20 fontmb-small">
                    <p>
                        {!! has_field($page,
                            'desc_product_intro2') !!}
                    </p>
                </div>

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
                                <img loading="lazy" src="{{get_image_url(has_sub_field($item,'image_slide_product_intro2'))}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 fontmb-middle font-mi-bold text-uppercase">
                                        {!! has_sub_field($item, 'tittle_slide_product_intro2') ? has_sub_field($item, 'tittle_slide_product_intro2') : '' !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-3.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/product-intro-slide-1.jpg')}}" alt="">
                                <div class="image-frame__overlay">
                                    <h3 class="image-frame__title font40 font-mi-bold fontmb-middle">
                                        DỊCH VỤ
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next product-intro__swiper--next">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/next.png')}}" alt="">
                    </div>
                    <div class="swiper-button-prev product-intro__swiper--prev">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/prev.png')}}" alt="">
                    </div>
                    <div class="swiper-pagination product-intro__swiper--pagination"></div>
                </div>
            </div>
        </div> --}}
        @if(has_field($page, 'repeater_overview_2'))
        @foreach(has_field($page, 'repeater_overview_2') as $item)
        <div class="product-intro">
            <div class="product-intro--left">
              
                <h2 class="product-intro--left__title font-mi-bold font40 fontmb-middle text-uppercase">
                    {!! has_sub_field($item, 'tittle') ? has_sub_field($item, 'tittle') : '' !!}
                </h2>
               
                <div class="product-intro--left__content font-pri font20 fontmb-small">
                    <p>
                        {!! has_sub_field($item, 'desc') ? has_sub_field($item, 'desc') : '' !!} 
                    </p>
                </div>

             
                <a href="#" class="product-intro--left__button font-pri font18 fontmb-small">{{ __("Readmore") }}</a>
            </div>
            <div class="product-intro--right">
                <div class="product-intro__image">
                    <img loading="lazy" src="{{get_image_url(has_sub_field($item,'image'))}}" alt=" {!! has_sub_field($item, 'tittle') ? has_sub_field($item, 'tittle') : '' !!}">     
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>