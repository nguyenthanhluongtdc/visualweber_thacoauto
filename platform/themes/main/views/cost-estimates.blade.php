{{-- thêm sidebar here --}}
<section class="section-step-menu">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item font18 font-pri ">
                <span>
                    1. LỰA CHỌN XE
                </span>
            </li>
            <li class="step-menu__item font18 font-pri active">
                <span>
                    2. DỰ TOÁN CHI PHÍ
                </span>
            </li>
            <li class="step-menu__item font18 font-pri">
                <span>
                    3. ĐẶT CỌC ĐĂNG KÝ
                </span>
            </li>
        </ul>
    </div>
</section>

<div class="my-5 container-remake MyriadPro-Regular font15">
    <form action="" method="POST" class="row">
        <div class="col-sm-12 col-md-8 mb-4">
            <div class="deposit__form no-grid">
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3">Chọn tỉnh thành đăng ký xem</h2>
                <div class="form-group max-w-4">
                    <div class="ui fluid selection dropdown">
                        <input type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text MyriadPro-Regular font15">Chọn tỉnh thành</div>
                        <div class="menu">
                            <div class="item" data-value="af"></i>Afghanistan</div>
                            <div class="item" data-value="ax"></i>Aland Islands</div>
                            <div class="item" data-value="al"></i>Albania</div>
                            <div class="item" data-value="dz"></i>Algeria</div>
                            <div class="item" data-value="as"></i>American Samoa</div>
                        </div>
                    </div>
                </div>
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">Chương trình khuyến mãi</h2>
                <div class="promotion__list">
                    <div class="promotion__item">
                        <img src="{{ Theme::asset()->url('images/promotion/1.png') }}" width="160" height="117" class="img-fluid" />
                        <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline1">
                            <label class="custom-control-label" for="customControlInline1">Lorem ipsum</label>
                        </div>
                    </div>
                    <div class="promotion__item">
                        <img src="{{ Theme::asset()->url('images/promotion/2.png') }}" width="160" height="117" class="img-fluid" />
                        <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline2">
                            <label class="custom-control-label" for="customControlInline2">Lorem ipsum</label>
                        </div>
                    </div>
                    <div class="promotion__item">
                        <img src="{{ Theme::asset()->url('images/promotion/3.png') }}" width="160" height="117" class="img-fluid" />
                        <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline3">
                            <label class="custom-control-label" for="customControlInline3">Lorem ipsum</label>
                        </div>
                    </div>
                </div>
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">Yêu cầu tư vấn Thêm</h2>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline4">
                    <label class="custom-control-label" for="customControlInline4">Gói gian hạn bảo hành</label>
                </div>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline5">
                    <label class="custom-control-label" for="customControlInline5">Gói bảo hiểm ô tô</label>
                </div>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline6">
                    <label class="custom-control-label" for="customControlInline6">Gói bảo dưỡng</label>
                </div>
                <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3 mt-4">Phương thức thanh toán</h2>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline7">
                    <label class="custom-control-label" for="customControlInline7">Thanh toán tại đại lý</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline8">
                    <label class="custom-control-label" for="customControlInline8">Vai trả góp ngân hàng <a data-fancybox data-src="#installment-modal" href="javascript:;" class="d-inline-block ml-2"><u>Chi tiết chi phí</u></a></label>
                </div>
            </div>
            <div style="display: none;" class="MyriadPro-Regular font15" id="installment-modal">
                <h2>Hello!</h2>
                <p>You are awesome!</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 mb-4">
            <div class="deposit__info">
                <div class="deposit__info-imagereview">
                    <img src="{{ Theme::asset()->url('images/car.png') }}" width="376" height="280" class="img-fluid" />
                </div>
                <div class="deposit__detail MyriadPro-Regular font15" id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-uppercase">KIA OPTIMA 2.0 GAT LUXURY</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
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