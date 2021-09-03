{!! Theme::partial('templates.car-selection-menu', ['car' => $car]) !!}

<div class="my-5 my-sm-3 container-remake MyriadPro-Regular font15">
    <form action="{{ route('public.brand.deposit', [$car->slug]) }}" method="GET" class="row overflow-x-hidden">
        @foreach (request()->all() as $key => $item)
            @if(is_array($item))
                @foreach ($item as $child)
                    <input type="hidden" value="{{ $child }}" name="{{ $key }}[]" />
                @endforeach
            @else
                <input type="hidden" value="{{ $item }}" name="{{ $key }}" />
            @endif
        @endforeach
        <div class="col-sm-12 col-lg-8 mb-4">
            <div class="deposit__form no-grid"> 
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 fontmb-middle">{{ __('Chọn tỉnh thành đăng ký xem') }}</h2>
                <div class="form-group max-w-4">
                    <select id="select_city" value="" name="city" class="mb-3 ui fluid selection dropdown fontmb-small"
                        class="font20 font-mi-cond js-example-disabled-results fontmb-small">
                        <option selected disabled value="">{{ __("Công ty tỉnh thành") }}</option>
                        @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select> 
                    @error('city')
                        <p class="text-danger mt-3"> 
                            {!! $message !!}
                        </p>
                    @endif
                </div>
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4 fontmb-middle">{{ __('Chương trình khuyến mãi') }}</h2>
                    @if(isset($promotions) && !blank($promotions))
                        <div class="promotion__list">
                            @foreach ($promotions as $item)
                                <div class="promotion__item">
                                    <img loading="lazy" src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}"  alt="{{ $item->name }}" width="160" height="117" class="img-fluid" />
                                    <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" name="promotions[]" value="{{ $item->id }}" class="custom-control-input" id="customControlInline_{{ $item->id }}_promotions">
                                        <label class="custom-control-label fontmb-small" for="customControlInline_{{ $item->id }}_promotions">{{ $item->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="w-100">
                            {!! Theme::partial('templates.no-content') !!}
                        </div>
                    @endif
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4 fontmb-middle">{{ __('Yêu cầu tư vấn Thêm') }}</h2>
                @if(isset($consultancies) && !blank($consultancies))
                    @foreach ($consultancies as $item)
                        <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="consultancies[]" value="{{ $item->id }}" id="customControlInline_{{ $item->id }}_consultancies">
                            <label class="custom-control-label" for="customControlInline_{{ $item->id }}_consultancies">{{ $item->name }}</label>
                        </div>
                    @endforeach
                @else
                    <div class="w-100">
                        {!! Theme::partial('templates.no-content') !!}
                    </div>
                @endif
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4 fontmb-middle">{{ __("Phương thức thanh toán") }}</h2>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="radio" name="type_payment" checked value="in_showroom" class="custom-control-input" id="customControlInline7">
                    <label class="custom-control-label fontmb-small" for="customControlInline7">{{ __("Thanh toán tại đại lý") }}</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="radio" name="type_payment" value="is_installment" class="custom-control-input" id="customControlInline8">
                    <label class="custom-control-label fontmb-small" for="customControlInline8">{{ __("Vai trả góp ngân hàng") }} <a data-fancybox data-src="#installment-modal" href="javascript:;" class="ml-2"><u>{{ __("Chi tiết chi phí") }}</u></a></label>
                </div>
                @error('type_payment')
                    <p class="text-danger mt-2"> {!! $message !!} </p>
                @enderror
            </div>
            @includeIf('theme.main::views.pages.cost-estimate.installment')
        </div>
        {!! Theme::partial('templates.car-cost-total', [
            'car' => $car,
            'color' => isset($color) ? $color : collect(),
            'accessories' => isset($accessories) ? $accessories : collect(),
            'equipments' => isset($equipments) ? $equipments : collect(),
            'promotionsArray' => isset($promotionsArray) ? $promotionsArray : collect()
        ])!!}
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.dropdown').dropdown()
    })
</script>