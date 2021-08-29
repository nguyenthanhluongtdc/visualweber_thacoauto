{!! Theme::partial('templates.car-selection-menu', ['car' => $car]) !!}

<div class="my-5 container-remake MyriadPro-Regular font15">
    <form action="" method="POST" class="row">
        <div class="col-sm-12 col-md-8 mb-4">
            <div class="deposit__form no-grid">
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3">{{ __('Chọn tỉnh thành đăng ký xem') }}</h2>
                <div class="form-group max-w-4">
                    <div class="mb-3 ui fluid selection dropdown">
                        <input type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text MyriadPro-Regular font15">{{ __('Tỉnh/Thành phố') }}</div>
                        <div class="menu">
                            <div class="item" data-value="af">Afghanistan</div>
                            <div class="item" data-value="ax">Aland Islands</div>
                            <div class="item" data-value="al">Albania</div>
                            <div class="item" data-value="dz">Algeria</div>
                            <div class="item" data-value="as">American Samoa</div>
                        </div>
                    </div>
                </div>
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">{{ __('Chương trình khuyến mãi') }}</h2>
                    @if(isset($promotions) && !blank($promotions))
                        <div class="promotion__list">
                            @foreach ($promotions as $item)
                                <div class="promotion__item">
                                    <img loading="lazy" src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}"  alt="{{ $item->name }}" width="160" height="117" class="img-fluid" />
                                    <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" name="promotions[]" value="{{ $item->id }}" class="custom-control-input" id="customControlInline_{{ $item->id }}_promotions">
                                        <label class="custom-control-label" for="customControlInline_{{ $item->id }}_promotions">{{ $item->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="w-100">
                            {!! Theme::partial('templates.no-content') !!}
                        </div>
                    @endif
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">{{ __('Yêu cầu tư vấn Thêm') }}</h2>
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
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">{{ __("Phương thức thanh toán") }}</h2>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline7">
                    <label class="custom-control-label" for="customControlInline7">{{ __("Thanh toán tại đại lý") }}</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline8">
                    <label class="custom-control-label" for="customControlInline8">{{ __("Vai trả góp ngân hàng") }} <a data-fancybox data-src="#installment-modal" href="javascript:;" class="d-none d-inline-bloc ml-2"><u>{{ __("Chi tiết chi phí") }}</u></a></label>
                </div>
            </div>
            @includeIf('theme.main::views.pages.cost-estimate.installment')
        </div>
        <div class="col-sm-12 col-md-4 mb-4">
            <div class="deposit__info">
                <div class="deposit__info-imagereview">
                    <img loading="lazy" src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}" width="376" height="280" class="img-fluid" />
                </div>
                <div class="deposit__detail MyriadPro-Regular font15" id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-uppercase">{{ $car->name }}</h5>
                            </div>
                        </div>
                    </div>
                    <div clFass="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <span class="text-uppercase">{{ __("MÀU") }}:</span> {{ $color->name ?? __("chưa cập nhật") }}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_accessory">
                            @php
                                $accessories_price = isset($$accessories) ? $accessories->sum('price') ?? 0 : 0
                            @endphp
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_accessory" aria-expanded="true" aria-controls="collapse_accessory">
                                <h5 class="mb-0 plus">{{ __('Phụ kiện') }}</h5>
                                @if(isset($accessories) && !blank($accessories))
                                    <p class="">
                                        {{ number_format($accessories_price, 0, '.', ',') . 'đ' ?? '0đ' }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div id="collapse_accessory" class="collapse" aria-labelledby="heading_accessory" data-parent="#accordion">
                            @if(isset($accessories) && !blank($accessories))
                                <div class="card-body">
                                    @foreach ($accessories as $item)
                                        <p class="">{{ $item->name }}</p>
                                        <p class="">{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_retrofit">
                            @php
                                $equipments_price = isset($equipments) ? $equipments->sum('price') ?? 0 : 0;
                            @endphp
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_retrofit" aria-expanded="true" aria-controls="collapse_retrofit">
                                <h5 class="mb-0 plus">{{ __('Trang bị thêm') }}</h5>
                                @if(isset($equipments) && !blank($equipments))
                                    <p class="">
                                        {{ number_format($equipments_price, 0, '.', ',') . 'đ' ?? '0đ' }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div id="collapse_retrofit" class="collapse" aria-labelledby="heading_retrofit" data-parent="#accordion">
                            @if(isset($equipments) && !blank($equipments))
                                <div class="card-body">
                                    @foreach ($equipments as $item)
                                        <p class="">{{ $item->name }}</p>
                                        <p class="">{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        @php
                            $price = $item->price ?? 0;
                            $fee = $item->fee ?? 0;
                            $fee_license_plate = $item->fee_license_plate ?? 0;
                        @endphp
                        <div class="card-header" id="heading_expense">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_expense" aria-expanded="true" aria-controls="collapse_expense">
                                <h5 class="mb-0 plus">{{ __("Chi phí") }}</h5>
                                <p class="text-danger">
                                    {{ number_format($fee_license_plate + $price + $fee, 0, '.', ',') . 'đ' ?? '0đ' }}
                                </p>
                            </div>
                        </div>
                        <div id="collapse_expense" class="collapse show" aria-labelledby="heading_expense" data-parent="#accordion">
                            <div class="card-body">
                                <p class="">{{ __("Phí xe") }}</p>
                                <p class="">{{ $item->price ? number_format($car->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
                                <p class="">{{ __("Phí trước bạ(10%)") }}</p>
                                <p class="">{{ $item->fee ? number_format($car->fee, 0, '.', ',') . 'đ' : '0đ' }}</p>
                                <p class="">{{ __('Phí đăng kiểm biển số') }}</p>
                                <p class="">{{ $item->fee_license_plate ? number_format($car->fee_license_plate, 0, '.', ',') . 'đ' : '0đ' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        @php
                            $promotion = $car->promotion ?? 0;
                        @endphp
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ __("Ưu đãi") }}</h5>
                                <p class="">
                                    -{{ $item->promotion ? number_format($car->promotion, 0, '.', ',') . 'đ' : '0đ' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="pt-0 py-0"></div>
                        </div>
                    </div>
                </div>
                <div class="deposit__info-total">
                    <h4 class="font18 MyriadPro-BoldCond text-uppercase mb-1">{{ __('tổng chi phí dự tính') }}</h4>
                    @php
                        $total = $equipments_price + $accessories_price + $price + $fee + $fee_license_plate - $promotion;
                    @endphp
                    <p class="font18 MyriadPro-BoldCond text-uppercase d-block mb-5 text-danger mb-sm-4 mb-md-5">{{ number_format($total, 0, '.', ',') . 'đ' ?? '0đ' }}</p>
                    <button class="deposit__info-button btn-block btn btn-primary MyriadPro-Regular font18" type="submit">{{ __("Gửi yêu cầu báo giá") }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.dropdown').dropdown()
    })
</script>