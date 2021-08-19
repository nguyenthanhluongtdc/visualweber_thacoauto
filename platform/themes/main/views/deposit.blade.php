{{-- thêm sidebar here --}}
<section class="section-step-menu-deposit">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item item-1 font18 font-pri ">
                <span>
                    1. LỰA CHỌN XE
                </span>
            </li>
            <li class="step-menu__item item-2 font18 font-pri">
                <span>
                    2. DỰ TOÁN CHI PHÍ
                </span>
            </li>
            <li class="step-menu__item item-3 font18 font-pri active">
                <span>
                    3. ĐẶT CỌC ĐĂNG KÝ
                </span>
            </li>
        </ul>
    </div>
</section>


<div class="my-3 container-remake MyriadPro-Regular font15 deposit-wrapper">
    <form action="" method="POST" class="row">
        <div class="col-sm-12 col-md-12 col-xl-8 mb-4">
            <h2 class="font20 MyriadPro-BoldCond text-uppercase mb-3 fontmb-middle">thông tin khách hàng</h2>
            <p class="mb-4 fontmb-small">Thông tin khách hàng sẽ được đưa vào thoả thuận hợp đồng. Quý khách vui lòng nhập chính xác các nội dung dưới đây</p>
            <div class="deposit__form">
                <div class="form-group span-3 ">
                    <input type="text" class="form-control MyriadPro-Regular font15 fontmb-small" name="username" placeholder="Nhập họ và tên" />
                </div>
                <div class="form-group span-3 ">
                    <input type="text" class="form-control MyriadPro-Regular font15 fontmb-small" name="phone" placeholder="Nhập số điện thoại" />
                </div>
                <div class="form-group span-3">
                    <div class="ui fluid selection dropdown">
                        <input type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text MyriadPro-Regular font15 fontmb-small">Chọn showroom gần bạn</div>
                        <div class="menu">
                            <div class="item fontmb-small" data-value="af"></i>Afghanistan</div>
                            <div class="item fontmb-small" data-value="ax"></i>Aland Islands</div>
                            <div class="item fontmb-small" data-value="al"></i>Albania</div>
                            <div class="item fontmb-small" data-value="dz"></i>Algeria</div>
                            <div class="item fontmb-small" data-value="as"></i>American Samoa</div>
                        </div>
                    </div>
                    {{-- <input type="text" class="form-control MyriadPro-Regular font15" name="showroom" placeholder="Chọn showroom" /> --}}
                </div>
                <div class="form-group span-3 ">
                    <input type="text" class="form-control MyriadPro-Regular font15 fontmb-small" name="email" placeholder="Nhập email" />
                </div>
                <div class="form-group span-2">
                    <textarea rows="7" class="form-control MyriadPro-Regular font15 fontmb-small" name="email" placeholder="Nhập nội dung"></textarea>
                </div>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label fontmb-small" for="customControlInline">Tôi cam kết các thông tin khách hàng cung cấp tại đây hoàn toàn chính xác</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline2">
                    <label class="custom-control-label fontmb-small" for="customControlInline2">Tôi đã đọc, hiểu rõ và xác nhận đồng ý với toàn bộ nội dung <a href="#">Điều khoản</a> trong Thoả Thuận Đặt Cọc trên cũng như Chính Sách Ưu Đãi
                        áp dụng tại thời điểm đặt mua xe ô tô này trên KIA Online</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline3">
                    <label class="custom-control-label fontmb-small" for="customControlInline3">Tôi đồng ý với các <a href="#">Điều kiện & Điều khoản</a> của KIA Online</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-4 mb-4">
            <div class="deposit__info">
                <div class="deposit__info-imagereview">
                    <img src="{{ Theme::asset()->url('images/car.png') }}" width="376" height="280" class="img-fluid" />
                </div>
                <div class="deposit__detail MyriadPro-Regular font15" id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-uppercase fontmb-small">KIA OPTIMA 2.0 GAT LUXURY</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text fontmb-small">
                                    <span class="text-uppercase fontmb-small">MÀU:</span> Kia Optima Trắng
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_accessory">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_accessory" aria-expanded="true" aria-controls="collapse_accessory">
                                <h5 class="mb-0 plus text fontmb-small">Phụ kiện</h5>
                                <p class="fontmb-small">
                                    5,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_accessory" class="collapse" aria-labelledby="heading_accessory" data-parent="#accordion">
                            <div class="card-body fontmb-small">
                                <p class="fontmb-small">Phí xe</p>
                                <p class="fontmb-small">759,000,000đ</p>
                                <p class="fontmb-small">Phí trước bạ(10%)</p>
                                <p class="fontmb-small">59,000,000đ</p>
                                <p class="fontmb-small">Phí đăng kiểm biển số</p>
                                <p class="fontmb-small">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_retrofit">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_retrofit" aria-expanded="true" aria-controls="collapse_retrofit">
                                <h5 class="mb-0 plus text fontmb-small">Trang bị thêm</h5>
                                <p class="fontmb-small">
                                    5,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_retrofit" class="collapse" aria-labelledby="heading_retrofit" data-parent="#accordion">
                            <div class="card-body">
                                <p class="fontmb-small">Phí xe</p>
                                <p class="fontmb-small">759,000,000đ</p>
                                <p class="fontmb-small">Phí trước bạ(10%)</p>
                                <p class="fontmb-small">59,000,000đ</p>
                                <p class="fontmb-small">Phí đăng kiểm biển số</p>
                                <p class="fontmb-small">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading_expense">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse_expense" aria-expanded="true" aria-controls="collapse_expense">
                                <h5 class="mb-0 plus text fontmb-small">Chi phí</h5>
                                <p class="text-danger fontmb-small">
                                    819,000,000đ
                                </p>
                            </div>
                        </div>
                        <div id="collapse_expense" class="collapse show" aria-labelledby="heading_expense" data-parent="#accordion">
                            <div class="card-body fontmb-small">
                                <p class=" fontmb-small">Phí xe</p>
                                <p class="fontmb-small">759,000,000đ</p>
                                <p class="fontmb-small">Phí trước bạ(10%)</p>
                                <p class="fontmb-small">59,000,000đ</p>
                                <p class="fontmb-small">Phí đăng kiểm biển số</p>
                                <p class="fontmb-small">1,000,000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text fontmb-small">Ưu đãi</h5>
                                <p class="fontmb-small">
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
                    <h4 class="font18 MyriadPro-BoldCond text-uppercase mb-1 fontmb-medium">tổng chi phí dự tính</h4>
                    <p class="font18 MyriadPro-BoldCond text-uppercase d-block mb-5 text-danger mb-sm-4 mb-md-5 fontmb-medium">831,000,000đ</p>
                    <button class="deposit__info-button btn-block btn btn-primary MyriadPro-Regular font18 fontmb-small" type="submit">Gửi yêu cầu báo giá</button>
                </div>
            </div>
        </div>
    </form>
    <button class="btn-back fontmb-small">
        Quay lại
    </button>
</div>

<script>
    $(document).ready(function() {
        $('.dropdown').dropdown()
    })
</script>