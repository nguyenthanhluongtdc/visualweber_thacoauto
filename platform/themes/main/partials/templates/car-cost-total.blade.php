    <div class="col-sm-12  col-lg-4 mb-4 overflow-x-hidden">
        <div class="deposit__info">
            <div class="deposit__info-imagereview">
                <img loading="lazy" src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}" width="376" height="280" class="img-fluid" />
            </div>
            <div class="deposit__detail MyriadPro-Regular font15" id="accordion">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-uppercase fontmb-small">{{ $car->name }}</h5>
                        </div>
                    </div>
                </div>
                <div clFass="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fontmb-small">
                                <span class="text-uppercase fontmb-small">{{ __("MÀU") }}:</span> {{ $color->name ?? __("chưa cập nhật") }}
                            </h5>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-header" id="heading_accessory">
                        @php
                            $accessories_price = isset($accessories) ? ( $accessories->sum('price') ?? 0) : 0;
                        @endphp
                        <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_accessory" aria-expanded="true" aria-controls="collapse_accessory">
                            <h5 class="mb-0 plus fontmb-small">{{ __('Phụ kiện') }}</h5>
                            @if(isset($accessories) && !blank($accessories))
                                <p class="fontmb-small">
                                    {{ number_format($accessories_price, 0, '.', ',') . 'đ' ?? '0đ' }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div id="collapse_accessory" class="collapse" aria-labelledby="heading_accessory" data-parent="#accordion">
                        @if(isset($accessories) && !blank($accessories))
                            <div class="card-body">
                                @foreach ($accessories as $item)
                                    <p class="fontmb-small">{{ $item->name }}</p>
                                    <p class="fontmb-small">{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
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
                            <h5 class="mb-0 plus fontmb-small">{{ __('Trang bị thêm') }}</h5>
                            @if(isset($equipments) && !blank($equipments))
                                <p class="fontmb-small">
                                    {{ number_format($equipments_price, 0, '.', ',') . 'đ' ?? '0đ' }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div id="collapse_retrofit" class="collapse" aria-labelledby="heading_retrofit" data-parent="#accordion">
                        @if(isset($equipments) && !blank($equipments))
                            <div class="card-body">
                                @foreach ($equipments as $item)
                                    <p class=" fontmb-small">{{ $item->name }}</p>
                                    <p class="fontmb-small">{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    @php
                        $price = $car->price ?? 0;
                        $fee = $car->fee ?? 0;
                        $fee_license_plate = $car->fee_license_plate ?? 0;
                    @endphp
                    <div class="card-header" id="heading_expense">
                        <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_expense" aria-expanded="true" aria-controls="collapse_expense">
                            <h5 class="mb-0 plus fontmb-small">{{ __("Chi phí") }}</h5>
                            <p class="text-danger fontmb-small">
                                {{ number_format($fee_license_plate + $price + $fee, 0, '.', ',') . 'đ' ?? '0đ' }}
                            </p>
                        </div>
                    </div>
                    <div id="collapse_expense" class="collapse show" aria-labelledby="heading_expense" data-parent="#accordion">
                        <div class="card-body">
                            <p class="fontmb-small">{{ __("Phí xe") }}</p>
                            <p class="fontmb-small">{{ $car->price ? number_format($car->price, 0, '.', ',') . 'đ' : '0đ' }}</p>
                            <p class="fontmb-small">{{ __("Phí trước bạ(10%)") }}</p>
                            <p class="fontmb-small">{{ $car->fee ? number_format($car->fee, 0, '.', ',') . 'đ' : '0đ' }}</p>
                            <p class="fontmb-small">{{ __('Phí đăng kiểm biển số') }}</p>
                            <p class="fontmb-small">{{ $car->fee_license_plate ? number_format($car->fee_license_plate, 0, '.', ',') . 'đ' : '0đ' }}</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    @php
                        $promotion = $car->promotion ?? 0;
                    @endphp
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fontmb-small">{{ __("Ưu đãi") }}</h5>
                            <p class="fontmb-small">
                                -{{ $car->promotion ? number_format($car->promotion, 0, '.', ',') . 'đ' : '0đ' }}
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
                <h4 class="font18 MyriadPro-BoldCond text-uppercase mb-1 fontmb-middle">{{ __('tổng chi phí dự tính') }}</h4>
                @php
                    $total = $equipments_price + $accessories_price + $price + $fee + $fee_license_plate - $promotion;
                @endphp
                <p class="font18 MyriadPro-BoldCond text-uppercase d-block mb-5 text-danger mb-sm-4 mb-md-5 fontmb-middle">{{ number_format($total, 0, '.', ',') . 'đ' ?? '0đ' }}</p>
                <button class="deposit__info-button btn-block btn btn-primary MyriadPro-Regular font18 fontmb-small" type="submit">{{ __("Gửi yêu cầu báo giá") }}</button>
            </div>
        </div>
    </div>