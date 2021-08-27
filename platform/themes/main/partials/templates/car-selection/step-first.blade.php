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

            <div class="car-selection-content__right  col-sm-12 col-md-12">
                <div class="car-version">
                    <div id="car-version-select" class="car-version__select font15 font-pri">
                        @if($car->childrents)
                            <h3 class="font15 font-pri mb-0">{{ __("Chọn phiên bản xe") }}</h3>
                            <i class="fas fa-chevron-down font12"></i>
                        @endif
                    </div>

                    <a href="" class="car-version__viewdetail font15 font-pri">Xem chi tiết phiên bản</a>
                </div>
                @if($car->childrents)
                    <ul id="car-version-list" class="car-version__list active">
                        <li class="car-version__item">
                            <a href="">
                                <div class="car-version__title font15 font-pri">KIA OPTIMA 2.0 GAT LUXURY</div>
                                <div class="car-version__price font15 font-pri">Giá từ 759,000,000đ</div>
                            </a>
                        </li>
                        <li class="car-version__item">
                            <a href="">
                                <div class="car-version__title font15 font-pri">KIA OPTIMA 2.4 GAT PREMIUM</div>
                                <div class="car-version__price font15 font-pri">Giá từ 919,000,000đ</div>
                            </a>
                        </li>
                    </ul>
                @endif
                <div class="gray-line"></div>
                <div class="option__car">
                    {!! Theme::partial('templates.car-selection.options', ['car' => $car]) !!}
                </div>
                <a class="select-button font18 font-pri fontmb-small d-inline-block"  type="button" href="">Tiếp theo</a>
            </div>
            <button class="btn-back mt-4">
                Quay lại
            </button>
        </div>

    </div>
</section>