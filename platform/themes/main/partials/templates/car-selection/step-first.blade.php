<section class="section-car-selection-content">
    <div class="container-remake">
        <div class="car-selection-content row">
            <div class="car-selection-content__left col-sm-12 col-md-12">
                <div class="frame">
                    <img src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}">
                </div>
                <ul class="info-equip">
                    <li class="info-equip__item font15 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-1.png')}}" alt="filter icon">
                        <span>{{ number_format($car->horse_power * 0.7457, 2, '.', ',') }} {{ __("kW") }} ({{ $car->horse_power }} {{ __("HP") }})</span>
                    </li>
                    <li class="info-equip__item font15 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-2.png')}}" alt="filter icon">
                        <span>{{ __($car->fuel_type) }}</span>
                    </li>
                    <li class="info-equip__item font15 font-pri">
                        <img src="{{Theme::asset()->url('images/business/brand-detail/chon-xe-3.png')}}" alt="filter icon">
                        <span>{{ __($car->gear) }}</span>
                    </li>
                </ul>
                <div class="button">
                    <img src="{{Theme::asset()->url('images/business/brand-detail/360.png')}}" alt="">
                </div>
            </div>

            <div class="car-selection-content__right d-flex flex-column col-sm-12 col-md-12">
                <div class="car-version">
                    <div id="car-version-select" class="car-version__select font15 font-pri">
                        <h3 class="font15 font-pri mb-0">{{ __("Chọn phiên bản xe") }}</h3>
                        @if($car->childrens)
                            <i class="fas fa-chevron-down font12"></i>
                        @endif
                    </div>

                    <a href="" class="car-version__viewdetail font15 font-pri">{{ __("Xem chi tiết phiên bản") }}</a>
                </div>

                @if($car->childrens)
                    <ul id="car-version-list" class="car-version__list active">
                        @foreach ($car->childrens as $item)
                            <li class="car-version__item">
                                <a href="">
                                    <div class="car-version__title font15 font-pri">{{ $item->name }}</div>
                                    <div class="car-version__price font15 font-pri">{{ __("Giá từ") }} {{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '' }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="gray-line"></div>
                <div class="option__car flex-grow-1">
                    {!! Theme::partial('templates.car-selection.options', ['car' => $car]) !!}
                </div>
                <a class="select-button font18 font-pri fontmb-small d-inline-block"  type="button" href="">{{ __("Tiếp theo") }}</a>
            </div>
            <button class="btn-back mt-4">
                {{ __("Quay lại") }}
            </button>
        </div>

    </div>
</section>