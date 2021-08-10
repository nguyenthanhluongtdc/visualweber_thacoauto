<div class="my-5 container-remake MyriadPro-Regular font15">
    <form action="" method="POST" class="row">
        <div class="col-sm-12 col-md-8 col-8">
            <h2 class="font18 MyriadPro-BoldCond text-uppercase mb-3">thông tin khách hàng</h2>
            <p class="mb-4">Thông tin khách hàng sẽ được đưa vào thoả thuận hợp đồng. Quý khách vui lòng nhập chính xác các nội dung dưới đây</p>
            <div class="deposit__form">
                <div class="form-group">
                    <input type="text" class="form-control MyriadPro-Regular font15" name="username" placeholder="Nhập họ và tên" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control MyriadPro-Regular font15" name="phone" placeholder="Nhập số điện thoại" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control MyriadPro-Regular font15" name="showroom" placeholder="Chọn showroom" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control MyriadPro-Regular font15" name="email" placeholder="Nhập email" />
                </div>
                <div class="form-group span-2">
                    <textarea rows="7" class="form-control MyriadPro-Regular font15" name="email" placeholder="Nhập nội dung"></textarea>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline">Tôi cam kết các thông tin khách hàng cung cấp tại đây hoàn toàn chính xác</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline2">
                    <label class="custom-control-label" for="customControlInline2">Tôi đã đọc, hiểu rõ và xác nhận đồng ý với toàn bộ nội dung <a href="#">Điều khoản</a> trong Thoả Thuận Đặt Cọc trên cũng như Chính Sách Ưu Đãi
áp dụng tại thời điểm đặt mua xe ô tô này trên KIA Online</label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline3">
                    <label class="custom-control-label" for="customControlInline3">Tôi đồng ý với các <a href="#">Điều kiện & Điều khoản</a> của KIA Online</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-4">
            <div class="deposit__info">
                <div class="deposit__info-imagereview">
                    <img src="{{ Theme::asset()->url('images/car.png') }}" width="376" height="280" class="img-fluid" />
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Phụ kiện
                                </button>
                                <p class="">
                                    5,000,000đ
                                </p>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
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