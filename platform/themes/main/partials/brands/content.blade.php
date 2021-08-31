@php
    $cars = get_cars($slug->key,request()->get('vehicle'),request()) ?? collect();
    $carFeature = count($cars) ? $cars[0] : null;
    if(request()->get('car')){
        $carFeature = get_car_by_slug(request()->get('car'));
    }
@endphp
<section class="section-car-filter-content overflow-x-hidden">
    <div class="container-remake">
        <div class="list-car-mobile row">
            <div class="swiper-container researchDevSwiper">
                <div class="swiper-wrapper">
                    @forelse($cars as $car)
                    <div class="swiper-slide">
                        <a class="list-car__link" href="#">
                            <img src="{{get_object_image($car->image)}}" alt="" class="list-car__img">
                            <h3 class="list-car__title font-pri font18"><span>{{$car->name}}</span></h3>
                            <div class="bottom-line"></div>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>

            </div>
        </div>
        <ul class="list-car">
            @forelse($cars as $car)
            <li class="list-car__item">
                <a class="list-car__link" href="
                {{route('public.brand.index',[
                        'slug' => $slug->key,
                        'vehicle'=>request()->get('vehicle'),
                        'car' => $car->slug
                ])}}">
                    <img src="{{get_object_image($car->image)}}" alt="" class="list-car__img">
                    <h3 class="list-car__title font-pri font18"><span>{{$car->name}}</span></h3>
                </a>
            </li>
            @empty
            @endforelse
        </ul>
        @if($carFeature)
        <div class="car-detail row">
            <div class="car-detail__image col-sm-12 col-md-12">
                <div class="car-detail__background"></div>
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"class="swiper mySwiperColor">
                    <div class="swiper-wrapper">
                        @forelse($carFeature->colors as $color)
                            <div class="swiper-slide">
                                <div class="car-detail__frame">
                                    <img class="img-fluid" src="{{get_object_image($color->image)}}" alt="">
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="car-detail__info col-sm-12 col-md-12">
                <h3 class="info-title font30 font-mi-bold">{{$carFeature->name}}</h3>
                <ul class="info-equip">
                    <li class="info-equip__item font18 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-1.png')}}" alt="filter icon">
                        <span>{{ceil($carFeature->horse_power*0.7457)}} kW ({{$carFeature->horse_power}} HP)</span>
                    </li>
                    <li class="info-equip__item font18 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-2.png')}}" alt="filter icon">
                        <span>{{ __($carFeature->fuel_type) }}</span>
                    </li>
                    <li class="info-equip__item font18 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-3.png')}}" alt="filter icon">
                        <span>{{ __($carFeature->gear) }}</span>
                    </li>
                </ul>
                @if(count($carFeature->colors))
                <div thumbsSlider="" class="swiper mySwiperColorThumb">
                    <div class="swiper-wrapper info-color">
                        @forelse($carFeature->colors as $color)
                            <div class="swiper-slide ">
                                <li class="info-color__item " style="background-color: {{$color->code}}"></li>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                @endif

                @if(count($carFeature->childrens))
                <ul class="info-option">
                    @forelse($carFeature->childrens as $child)
                    <li class="info-option__item">
                        <h3 class="info-option-title font18 font-pri">
                            <a href="{{route('public.brand.index',[
                                'slug' => $slug->key,
                                'vehicle'=>request()->get('vehicle'),
                                'car' => $child->slug
                        ])}}">{{$child->name}}</a>
                        </h3>
                        <p class="info-option-price font15 font-pri">{{trans('Giá từ')}} {{number_format($child->price)}}đ</p>
                    </li>
                    @empty
                    @endforelse
                </ul>
                @endif
                <ul class="info-other">
                    <li class="info-other__item">
                        <a class="font18 font-pri" href="{{ route('public.brand.test-drive', [$carFeature->slug]) }}">{{trans('Đăng ký lái thử')}}</a>
                    </li>
                    @if($carFeature->brochure)
                        <li class="info-other__item">
                            <a class="font18 font-pri" target="_blank" href="{{get_object_image($carFeature->brochure)}}">{{trans('Xem brochure')}}</a>
                        </li>
                    @endif
                </ul>
                <a href="{{ route('public.brand.car-selection',[
                    'car' => $carFeature->slug,
                    'showroom' => request()->get('showroom')
                ]) }}" class="text-center info-button font18 font-pri d-inline-block fontmb-small">{{ __('Tiếp theo') }}</a>

                <div class="info-hotline font18 font-pri">{{ __("HOTLINE") }} - {{ theme_option('hotline-contact') }}</div>
            </div>
        </div>
        @endif
        {!! Theme::partial('brands/related-car',['slug'=>$slug]) !!}
    </div>
</section>