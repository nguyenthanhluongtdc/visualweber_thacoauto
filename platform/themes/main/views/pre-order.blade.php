{{-- thêm sidebar here --}}
<section class="section-step-menu-pre-order">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item item-1 {{ \Request::route()->getName() == 'public.brand.car-selection' ? 'active' : '' }}">
                <a href="javascript:;" class="font18 fontmb-middle font-pri text-uppercase color-gray">
                    {{ __("1. LỰA CHỌN XE") }}
                </a>
            </li>
            <li class="step-menu__item item-2 {{ \Request::route()->getName() == 'public.brand.cost-estimate' ? 'active' : '' }}">
                <a href="javascript:;" class=" font18 fontmb-middle font-pri text-uppercase color-gray">
                    {{ __("2. DỰ TOÁN CHI PHÍ") }}
                </a>
            </li>
            <li class="step-menu__item item-3">
                <a href="javascript:;" class="font18 fontmb-middle font-pri text-uppercase color-gray">
                    {{ __("3. ĐẶT CỌC ĐĂNG KÝ") }}
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="section-pre-order-content">
    <div class="container-remake">
        <div class="pre-order-content row">
            <div class="pre-order-content__left col-sm-12 col-md-12">
                <div class="select-provinces">
                    <h3 class="select-provinces__title font18 font-cond-bold fontmb-middle">CHỌN TỈNH THÀNH ĐĂNG KÝ XE</h3>
                    <select class="provinces-select2 font15 font-pri" name="" id="">
                        <option value="">TP. HỒ CHÍ MINH</option>
                        <option value="">HÀ NỘI</option>
                    </select>
                </div>
                <div class="select-promotions">
                    <h3 class="select-promotions__title font18 font-cond-bold  fontmb-middle">CHỌN CHƯƠNG TRÌNH KHUYẾN MÃI</h3>
                    <div class="select-promotions__list">
                        <div class="select-promotions__item">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/promotions-1.jpg')}}" alt="Ảnh chương trình khuyến mãi">
                            </div>
                            <div class="custom-control mt-1 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label font18 font-cond" for="customControlInline">Lorem ipsum</label>
                            </div>
                        </div>
                        <div class="select-promotions__item">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/promotions-2.jpg')}}" alt="Ảnh chương trình khuyến mãi">
                            </div>
                            <div class="custom-control mt-1 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline2">
                                <label class="custom-control-label font18 font-cond" for="customControlInline2">Lorem ipsum</label>
                            </div>
                        </div>
                        <div class="select-promotions__item">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/promotions-3.jpg')}}" alt="Ảnh chương trình khuyến mãi">
                            </div>
                            <div class="custom-control mt-1 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline3">
                                <label class="custom-control-label font18 font-cond" for="customControlInline3">Lorem ipsum</label>
                            </div>
                        </div>
                    </div>
                    <div class="select-promotions__list-mobile">
                        <div class="select-promotions__item-mobile my-3">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/khuyenmai1.png')}}" alt="Ảnh chọn khuyến mãi">
                            </div>
                            <div class="content mt-2">
                                <div class="left span-2 d-flex align-center custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline6">
                                    <label class="custom-control-label font40 font-cond-bold" for="customControlInline6"></label>

                                </div>
                                <div class="right mt-2">
                                    <h3 class="select-deposit__title font40 font-cond-bold text-uppercase fontmb-medium">mua xe kia trong tháng 7 nhận ưu đãi lên đến 100 triệu đồng</h3>
                                    <p class="font-pri fontmb-small ">Với chương trình ưu đãi lên đến 100 triệu đồng, khách hàng yêu mến thương hiệu Kia có thể dễ dàng sở hữu..</p>
                                </div>
                            </div>
                        </div>
                        <div class="select-promotions__item-mobile my-3">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/khuyenmai2.png')}}" alt="Ảnh chọn khuyến mãi">
                            </div>
                            <div class="content mt-2">
                                <div class="left span-2 d-flex align-center custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline7">
                                    <label class="custom-control-label font40 font-cond-bold" for="customControlInline7"></label>

                                </div>
                                <div class="right mt-2">
                                    <h3 class="select-deposit__title font40 font-cond-bold text-uppercase fontmb-medium">kia việt nam đồng hành cùng khách hàng, hỗ trợ lên đến 65 triệu đồng trong tháng 6/2021</h3>
                                    <p class="font-pri fontmb-small">Trước những diễn biến đang còn phức tạp của dịch Covid 19 với mong muốn đồng hành và hỗ trợ tốt nhất cho..</p>
                                </div>
                            </div>
                        </div>
                        <div class="select-promotions__item-mobile my-3">
                            <div class="frame">
                                <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/khuyenmai3.png')}}" alt="Ảnh chọn khuyến mãi">
                            </div>
                            <div class="content mt-2">
                                <div class="left span-2 d-flex align-center custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline8">
                                    <label class="custom-control-label font40 font-cond-bold" for="customControlInline8"></label>

                                </div>
                                <div class="right mt-2">
                                    <h3 class="select-deposit__title font40 font-cond-bold text-uppercase fontmb-medium">ưu đãi lớn lên đến 77 triệu đồng trong tháng 5</h3>
                                    <p class="font-pri fontmb-small">Tăng trưởng mạnh mẽ về doanh số trong thánh 4, KIA tiếp tục khuấy động thị trường với ưu đãi lên đến..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="select-deposit">
                    <h3 class="select-deposit__title font18 font-cond-bold fontmb-middle">LỰA CHỌN CHÍNH SÁCH ĐẶT CỌC</h3>
                    <div class="select-deposit__list">
                        <div class="select-deposit__item">
                            <div class="custom-control mt-1 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline4">
                                <label class="custom-control-label font15 font-pri fontmb-medium" for="customControlInline4">Đặt cọc giá bán lẻ 10tr</label>
                            </div>
                            <div class="select-deposit_desc font-pri font15 fontmb-small">
                                <p>Mức đặt cọc 50.000.000 VNĐ/Xe.<br>
                                    Khách hàng được chuyển nhượng/chuyển giao, chấm dứt Thỏa thuận đặt cọc và rút lại Tiền Đặt Cọc theo quy trình và hướng dẫn của KIA.
                                    Khách hàng có quyền chuyển đổi Tiền Đặt Cọc.</p>
                            </div>
                        </div>
                        <div class="select-deposit__item">
                            <div class="custom-control mt-1 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline5">
                                <label class="custom-control-label font15 font-pri fontmb-medium" for="customControlInline5">Đặt cọc giá bán lẻ 50tr</label>
                            </div>
                            <div class="select-deposit_desc font-pri font15 fontmb-small">
                                <p>Mức đặt cọc 50.000.000 VNĐ/Xe.<br>
                                    Khách hàng được chuyển nhượng/chuyển giao, chấm dứt Thỏa thuận đặt cọc và rút lại Tiền Đặt Cọc theo quy trình và hướng dẫn của KIA.
                                    Khách hàng có quyền chuyển đổi Tiền Đặt Cọc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pre-order-content__right col-sm-12 col-md-12">
                <div class="car-selected">
                    <div class="car-selected__image">
                        <div class="frame">
                            <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/car-detail.png')}}" alt="Ảnh đặt cọc">
                        </div>
                    </div>
                    <h3 class="car-selected__title font15 font-pri fontmb-middle fontmb-cond-bold">KIA OPTIMA 2.0 GAT LUXURY</h3>
                    <div class="gray-line"></div>
                    <h3 class="car-selected__title font15 font-pri  fontmb-small">MÀU: Kia Optima Trắng</h3>
                    <div class="gray-line"></div>
                    <h3 class="car-selected__title font15 font-pri fontmb-middle fontmb-cond-bold">Thông số kỹ thuật</h3>
                    <ul class="specifications__list">
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Kích thước tổng thể (DxRxC)</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">4.855 x 1.860 x 1.465 mm</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Chiều dài cơ sở</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">2.805 mm</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Khoảng sáng gầm xe</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">150 mm</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Bán kính quay vòng</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">5.450 mm</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Trọng lượng Không tải</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">1.450 kg</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Trọng lượng Toàn tải</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">.520 kg</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Dung tích thùng nhiên liệu</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">70 L</span>
                        </li>
                        <li class="specifications__item">
                            <span class="specifications__name font15 font-pri fontmb-small">Số chỗ ngồi</span>
                            <span class="specifications__specification font15 font-pri fontmb-small">5</span>
                        </li>
                    </ul>
                    <div class="gray-line"></div>
                </div>
                <div class="deposit-price">
                    <h3 class="deposit-price__title font20 font-cond-bold fontmb-medium">ĐẶT CỌC GIÁ BÁN LẺ</h3>
                    <span class="deposit-price__price font20 font-cond-bold fontmb-medium">10,000,000đ</span>
                </div>

                <a class="select-button font18 font-pri fontmb-small" type="button" href="">Tiếp theo</a>
            </div>
            <button class="btn-back fontmb-small">
                Quay lại
            </button>
        </div>
    </div>
</section>