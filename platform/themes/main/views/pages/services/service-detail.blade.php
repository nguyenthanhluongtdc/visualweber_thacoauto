<section class="section-product-detail">
    <div class="container-remake">
        <div class="product-detail">
            @if(has_field($data, 'tieu_de_service_1'))
                <h2 class="product-detail__title font-mi-bold font60 fontmb-large">
                    {{ get_field($data, 'tieu_de_service_1') }}
                </h2>
            @endif
            @if(has_field($data, 'hinh_anh_service_1'))
                <img loading="lazy" src="{{ get_image_url(get_field($data, 'hinh_anh_service_1')) }}" alt="" class="product-detail__banner">
            @endif
            @if(has_field($data, 'mo_ta_service_1'))
                <div class="product-detail__desc font-pri font20">
                    {!! get_field($data, 'mo_ta_service_1') !!}
                </div>
            @endif
            @if(has_field($data, 'tieu_de_service_2'))
                <h2 class="product-detail__title font-mi-bold font60 fontmb-large">
                    {{ get_field($data, 'tieu_de_service_2') }}
                </h2>
            @endif
            @if(has_field($data, 'mo_ta_service_2'))
                <div class="product-detail__desc font-pri font20">
                    {!! get_field($data, 'mo_ta_service_2') !!}
                </div>
            @endif
            <div class="product-detail__slide">
                <div class="product-detail__slide--frame">
                    <div class="swiper-container detail-slide">
                        <div class="swiper-wrapper">
                            @if(has_field($data, 'slides'))
                                @foreach (get_field($data, 'slides') as $item)
                                    <div  class="swiper-slide">
                                        <img class="image-slide" loading="lazy" src="{{ has_sub_field($item, 'hinh_anh') ? get_image_url(get_sub_field($item, 'hinh_anh')) : "" }}" alt="">
                                    </div>
                                @endforeach
                            {{-- <div class="swiper-slide">
                                <img loading="lazy" src="{{Theme::asset()->url('images/services/slide-cham-soc-xe-2.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img loading="lazy" src="{{Theme::asset()->url('images/services/slide-cham-soc-xe-3.jpg')}}" alt="">
                            </div> --}}
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    @if(has_field($data, 'mo_ta_slide_service_2'))
                        <div class="detail-info">
                            <div class="detail-info--frame">
                                <div class="text font20 font-pri">{!! get_field($data, 'mo_ta_slide_service_2') !!}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="product-detail__features">
                @if(has_field($data, 'slogan_service_3'))
                    @foreach (get_field($data, 'slogan_service_3') as $item)
                        <div class="product-detail__card">
                            <div class="product-detail__card-image">
                                <div class="product-detail__card-frame">
                                    <img loading="lazy" src="{{ has_sub_field($item, 'hinh_anh') ? get_image_url(get_sub_field($item, 'hinh_anh')) : "" }}" alt="">
                                </div>
                            </div>
                            <h3 class="product-detail__card-title match match font30 font-mi-bold">{{ has_sub_field($item, 'tieu_de') ? get_sub_field($item, 'tieu_de') : "" }}</h3>
                            <div class="product-detail__card-desc font20 font-pri">
                                {!! has_sub_field($item, 'mo_ta') ? get_sub_field($item, 'mo_ta') : "" !!}
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="product-detail__card">
                    <div class="product-detail__card-image">
                        <div class="product-detail__card-frame">
                            <img loading="lazy" src="{{Theme::asset()->url('images/services/features-cham-soc-xe-2.jpg')}}" alt="">
                        </div>
                    </div>
                    <h3 class="product-detail__card-title font30 font-mi-bold">TẬN TÂM</h3>
                    <div class="product-detail__card-desc font20 font-pri">
                        Chủ sở hữu xe THACO sẽ được tận tâm tư vấn, cung cấp thông tin chính xác và rõ ràng.
                    </div>
                </div>
                <div class="product-detail__card">
                    <div class="product-detail__card-image">
                        <div class="product-detail__card-frame">
                            <img loading="lazy" src="{{Theme::asset()->url('images/services/features-cham-soc-xe-3.jpg')}}" alt="">
                        </div>
                    </div>
                    <h3 class="product-detail__card-title font30 font-mi-bold">CHUYÊN NGHIỆP</h3>
                    <div class="product-detail__card-desc font20 font-pri">
                        Quy trình làm việc là quá trình học hỏi và đúng kết từ kinh nghiệm, THACO sẽ đem lại cho bạn những trải nghiệm chuyên nghiệp nhất
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>