<section class="section-product-detail">
    <div class="container-remake">
        <div class="product-detail">
            <h2 class="product-detail__title font-mi-bold font60 fontmb-large">
                {{$data->name}}
            </h2>
            <img src="{{get_image_url(get_field($data, 'car_category_banner'))}}" alt="{{$data->name}}" class="product-detail__banner">
            <h2 class="product-detail__title font-mi-bold font60 fontmb-large">
                {{get_field($data, 'car_category_detail_title')}}
            </h2>
            <div class="product-detail__desc font-pri font20 fontmb-small">
                {!!get_field($data, 'car_category_detail_description')!!}
            </div>
            <div class="product-detail__slide">
                <div class="product-detail__slide--frame">
                    <div class="swiper-container detail-slide">
                        <div class="swiper-wrapper">
                            @if(!blank(get_field($data, 'car_category_detail_slide')))
                            @foreach (get_field($data, 'car_category_detail_slide') as $item)
                            <div class="swiper-slide">
                                <img src="{{get_image_url(has_sub_field($item, 'image'))}}" alt="{{$data->name}}">
                            </div>
                                
                            @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="detail-info">
                        <div class="detail-info--frame">
                            
                            <div class="text font15 fontmb-little font-pri">
                                <div class="logo mb-4">
                                    <img src="{{get_image_url(has_field($data, 'car_category_detail_logo'))}}" alt="{{$data->name}}">
                                </div>
                                <div class="position-relative">
                                    <input type="checkbox" id="expanded">
                                    <p class="fontmb-small">
                                        {!!get_field($data, 'car_category_detail_description_2')!!}
                                    </p>
                                    <label for="expanded" role="button" class="btn-load-more">... {{__('xem thêm')}} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-detail__features">
                @if(!blank(get_field($data, 'car_category_detail_slogan')))
                    @foreach (get_field($data, 'car_category_detail_slogan') as $item)
                    <div class="product-detail__card">
                        <div class="product-detail__card-image">
                            <div class="product-detail__card-frame">
                                <img src="{{get_image_url(has_sub_field($item, 'image'))}}" alt="{{has_sub_field($item, 'title')}}">
    
                            </div>
                        </div>
                        <h3 class="product-detail__card-title font25 font-mi-bold fontmb-medium">{{has_sub_field($item, 'title')}}</h3>
                        <div class="product-detail__card-desc font20 font-pri fontmb-small">
                            {!!has_sub_field($item, 'description')!!}
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="relate-product">
                <h2 class="title font-mi-bold font60 fontmb-large fontmb-cond-bold">
                    SẢN PHẨM KIA
                </h2>
                <div class="car">
                    <h3 class="cate font-mi-bold font30 fontmb-middle">
                        HATCHBACK
                    </h3>
                    <div class="swiper-container related-slide mt-2">
                        <div class="swiper-wrapper">
                            @if(!blank(get_field($data, 'car_category_detail_slide')))
                            @foreach (get_field($data, 'car_category_detail_slide') as $item)
                            
                            <div class="car-frame swiper-slide">
                                <div class="car-img">
                                    <img src="{{Theme::asset()->url('images/services/kia-soluto.png')}}" alt="">
                                </div>
                               
                                <div class="d-flex align-content-between flex-wrap car-content">
                                    <div class="info h-100">
                                        <h3 class="car-name font-mi-bold font25 mb-2 fontmb-cond-bold fontmb-medium">
                                            KIA SOLUTO
                                        </h3>
                                        <p class="car-decs font-mi-bold font18 fontmb-cond-bold fontmb-little">
                                            KẾT NỐI GIÁ TRỊ THẬT
                                        </p>
                                        <a href="#" class="readmore font-mi-bold font18 fontmb-cond-bold fontmb-little">
                                            XEM CHI TIẾT ->
                                        </a>
                                    </div>
                                  
                                </div>
                            </div>
                                
                            @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
