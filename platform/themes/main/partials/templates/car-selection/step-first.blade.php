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

            <form action="{{ route('public.brand.cost-estimate', $car->slug) }}" method="GET" class="car-selection-content__right d-flex flex-column col-sm-12 col-md-12">
                <div class="car-version">
                    <div id="car-version-select" class="car-version__select font15 font-pri">
                        <h3 class="title__row fontmb-medium font15 font-pri mb-0 ">{{ __("Chọn phiên bản xe") }}</h3>
                        @if($car->childrens)
                            <i class="fas fa-chevron-down font12 fontmb-small"></i>
                        @endif
                    </div>

                    <a href="{{has_field($car, 'current_version_car_link')}}" class="car-version__viewdetail font15 font-pri">{{ __("Xem chi tiết phiên bản") }}</a>
                </div>
                @if($car->childrens)
                    <ul id="car-version-list" class="car-version__list active" style="height: auto;">
                        @foreach ($car->childrens as $item)
                            <li class="car-version__item">
                                <a href="javascript:;" class="car-version__item-link" data-car_id="{{ $item->id }}">
                                    <div class="car-version__title font15 font-pri">{{ $item->name }}</div>
                                    <div class="car-version__price font15 font-pri">{{ __("Giá từ") }} {{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="gray-line"></div>

                {!! Theme::partial('templates.loading') !!}
                <div class="option__car flex-grow-1">
                    <div class="select-color  swiper mySwiperColorThumb">
                        <h3 class="title__row select-color__title fontmb-medium font15 font-pri">{{ __('Lựa chọn màu') }}</h3>
                        @if($car->colors->count() > 0)
                            <input name="color" class="d-none" value="{{ isset($request['color']) && !blank($request['color']) ? $request['color'] : ($car->colors->first()->id ?? '') }}" id="picker-color" />
                            <ul class="info-color swiper-wrapper">
                                @foreach ($car->colors ?? collect() as $key => $item)
                                    <li data-value="{{ $item->id }}" class="info-color__item  swiper-slide {{ ($key == 0 || (isset($request['color']) && !blank($request['color']) && $request['color'] == $item->id)) ? 'active' : '' }}" style="background-color: {{ $item->code }}"></li>
                                @endforeach
                            </ul>
                        @else
                            <span class="font-pri font15 w-100 text-center py-4 text-danger">{{ __("chưa cập nhật") }}</span>
                        @endif
                    </div>
                    <div class="select-equip">
                        <h3 class="title__row select-equip__title fontmb-medium font15 font-pri">{{ __("Phụ kiện") }}</h3>
                        @if(isset($car->accessories) && !blank($car->accessories))
                        <div class="select-equip__list">
                            @php
                                $accessories = $request['accessories'] ?? [];
                            @endphp
                            @foreach ($car->accessories ?? collect() as $item)

                                <div class="select-equip__item">
                                    <div class="frame">
                                        <img src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $item->name }}">
                                    </div>
                                    <div class="checkbox-frame w-100">
                                        <div class="cframe">
                                            <input class="checkbox" name="accessories[]" {{ in_array($item->id, $accessories) ? 'selected' : '' }} value="{{ $item->id }}" type="checkbox">
                                            <span class="checkmark"></span>
                                        </div>
                                        <label class="font-pri font15 fontmb-small text-center" for="">{{ $item->name }} <br> <span>{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</span> </label>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                            @else
                                <span class="font-pri font15 w-100 text-center py-4 text-danger">{{ __("chưa cập nhật") }}</span>
                    @endif
                    </div>
                    <div class="select-equip">
                        <h3 class="title__row select-equip__title fontmb-medium font15 font-pri">{{ __("Trang bị thêm") }}</h3>
                        @if(isset($car->equipments) && !blank($car->equipments))
                        <div class="select-equip__list">
                            @php
                                $equipments = $request['equipments'] ?? [];
                            @endphp
                            @foreach ($car->equipments ?? collect() as $item)
                                <div class="select-equip__item">
                                    <div class="frame">
                                        <img src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $item->name }}">
                                    </div>
                                    <div class="checkbox-frame w-100">
                                        <div class="cframe">
                                            <input class="checkbox" name="equipments[]" {{ in_array($item->id, $equipments) ? 'selected' : '' }} value="{{ $item->id }}" type="checkbox">
                                            <span class="checkmark"></span>
                                        </div>
                                        <label class="font-pri font15 fontmb-small text-center" for="">{{ $item->name }} <br> <span>{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</span> </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                                <span class="font-pri font15 w-100 text-center py-4 text-danger">{{ __("chưa cập nhật") }}</span>

                                @endif
                    </div>
                </div>
                <button type="submit" class="select-button font18 font-pri fontmb-small d-inline-block">{{ __("Tiếp theo") }}</button>
            </form>
            <button class="btn-back mt-4">
                {{ __("Quay lại") }}
            </button>
        </div>
    </div>
</section>

<script>
    var app = {
        dropdownCarVersions: function () {
            $(document).on('click', '#car-version-select', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active')
                    $(this).parent().parent().find('#car-version-list').css({
                        'height': 'auto',
                        'transition': "0.2s",
                    })
                }
                else {
                    $(this).addClass('active')
                    $(this).parent().parent().find('#car-version-list').css({
                        'height': '0',
                        'transition': "0.2s",
                    })
                }
            });
        },
        handlePickerColorCar: () => {
            $(document).on('click', '.info-color__item', function () {
                $('.info-color__item').removeClass('active')
                $(this).addClass('active')
                const value = $(this).data('value')
                $('#picker-color').val(value)
            })
        }
    }

    $(document).ready(function() {
        app.dropdownCarVersions()
        app.handlePickerColorCar()
    })
</script>