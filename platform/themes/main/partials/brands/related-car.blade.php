
<div class="related-cars pb-5 overflow-x-hidden">
    <h2 class="related-cars__title font30 font-mi-bold">SẢN PHẨM ĐỀ XUẤT</h2>
    <ul class="list-related-cars">
        @forelse(get_car_relations($slug->key) as $car)
            <li class="list-related-cars__item">
                <a class="list-related-cars__link" href="{{route('public.brand.index',[
                    'slug' => $car->brand->slug,
                    'car' => $car->slug,
                ])}}">
                    <img src="{{get_object_image($car->image)}}" alt="" class="list-related-cars__img img-fluid">
                    <h3 class="list-related-cars__title font-mi-bold">{{$car->name}}</h3>
                    <h4 class="list-related-cars__viewmore font-mi-bold font15">{{trans('XEM CHI TIẾT')}} <i class="fas fa-arrow-right font15"></i></h4>
                </a>
            </li>
        @empty
        @endforelse
    </ul>

    <div class="list-car-relate-mobile row">
        <div class="swiper-container researchDevSwiper">
            <div class="swiper-wrapper">
                @forelse(get_car_relations($slug->key) as $car)
                <div class="swiper-slide">
                    <a class="list-car__link" href="{{route('public.brand.index',[
                            'slug' => $car->brand->slug,
                            'car' => $car->slug,
                        ])}}">
                        <img src="{{get_object_image($car->image)}}" alt="" class="list-related-cars__img">
                        <h3 class="list-related-cars__title font-cond-bold font30 fontmb-medium">{{$car->name}}</h3>
                        <h4 class="list-related-cars__viewmore  font-cond-bold font15 fontmb-little">{{trans('XEM CHI TIẾT')}} <i class="fas fa-arrow-right font15"></i></h4>
                    </a>
                </div>
            @empty
            @endforelse
            </div>
        </div>
    </div>
</div>