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
                    <img loading="lazy" src="{{ Theme::asset()->url('images/car.png') }}" width="376" height="280" class="img-fluid" />
                </div>
                <div class="deposit__detail MyriadPro-Regular font15" id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-uppercase">KIA OPTIMA 2.0 GAT LUXURY</h5>
                            </div>
                        </div>
                    </div>
                    <div clFass="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <span class="text-uppercase">MÀU:</span> Kia Optima Trắng
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_accessory">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_accessory" aria-expanded="true" aria-controls="collapse_accessory">
                                <h5 class="mb-0 plus">Phụ kiện</h5>
                                <p class="">
                                    5,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_accessory" class="collapse" aria-labelledby="heading_accessory" data-parent="#accordion">
                            <div class="card-body">
                                <p class="">Phí xe</p>
                                <p class="">759,000,000đ</p>
                                <p class="">Phí trước bạ(10%)</p>
                                <p class="">59,000,000đ</p>
                                <p class="">Phí đăng kiểm biển số</p>
                                <p class="">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_retrofit">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_retrofit" aria-expanded="true" aria-controls="collapse_retrofit">
                                <h5 class="mb-0 plus">Trang bị thêm</h5>
                                <p class="">
                                    5,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_retrofit" class="collapse" aria-labelledby="heading_retrofit" data-parent="#accordion">
                            <div class="card-body">
                                <p class="">Phí xe</p>
                                <p class="">759,000,000đ</p>
                                <p class="">Phí trước bạ(10%)</p>
                                <p class="">59,000,000đ</p>
                                <p class="">Phí đăng kiểm biển số</p>
                                <p class="">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_expense">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_expense" aria-expanded="true" aria-controls="collapse_expense">
                                <h5 class="mb-0 plus">Chi phí</h5>
                                <p class="text-danger">
                                    819,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_expense" class="collapse show" aria-labelledby="heading_expense" data-parent="#accordion">
                            <div class="card-body">
                                <p class="">Phí xe</p>
                                <p class="">759,000,000đ</p>
                                <p class="">Phí trước bạ(10%)</p>
                                <p class="">59,000,000đ</p>
                                <p class="">Phí đăng kiểm biển số</p>
                                <p class="">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Ưu đãi</h5>
                                <p class="">
                                    -40,000,000đ
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
                    <h4 class="font18 MyriadPro-BoldCond text-uppercase mb-1">tổng chi phí dự tính</h4>
                    <p class="font18 MyriadPro-BoldCond text-uppercase d-block mb-5 text-danger mb-sm-4 mb-md-5">831,000,000đ</p>
                    <button class="deposit__info-button btn-block btn btn-primary MyriadPro-Regular font18" type="submit">Gửi yêu cầu báo giá</button>
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