
<section class="section-info-contact">
    <div class="container-remake">
        <h2 class="contact__title font60 font-pri-bold pb-4">THÔNG TIN LIÊN HỆ</h2>
        <div class="info-contact">
           
            <div class="info-contact-form mb-6"> 
                <div class="row">
                    <div class="col-md-6 pr-0">
                            <div id="contact-form" class="form-horizontal form-contact-us">
            {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST']) !!}                   
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">NƠI GỬI ĐẾN:</label>
                        <div class="col-sm-9">
                            <select name="" id="">
                                <option value="">THACO AUTO</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">HỌ TÊN:</label>
                        <div class="col-sm-9 row pr-0">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="contact_name_first" placeholder="Họ*" name="first-name" value="{{ old('name') }}"> 
                            </div>
                            <div class="col-sm-6 pr-0">
                                <input type="text" class="form-control" id="contact_name_last" placeholder="Tên*" name="last-name" value="{{ old('name') }}">    
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">SDT:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contact_phone" placeholder="+84" name="phone" value="{{ old('phone') }}">
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">NỘI DUNG:</label>
                        <div class="col-sm-9">
                            <textarea name="content" id="contact_content" class="form-control" rows="5" placeholder="{{ __('Nội dung') }}">{{ old('content') }}</textarea>
                        </div>
                        
                    </div>
            <div class="policy col-sm-9 float-right">
                <div class="check-policy">
                    <div class="styled-input-single">
                        <input type="radio" name="fieldset-1" id="radio-example-one" />
                        <label for="radio-example-one">TÔI XÁC NHẬN CUNG CẤP THÔNG TIN CÁ NHÂN ĐỂ LIÊN HỆ VỚI THACO AUTO.</label>
                        </div>
                    {{-- <input type="radio" class="radio" name="choice" id="a-opt" value="option1" checked/> --}}
                    
                    </div>
                <button class="btn btn-secondary" type="submit" value="SEND">
                    Gửi
                </button>

            </div>
            {!! Form::close() !!}

                            </div>
                       
                    </div>
                    <div class="col-md-6 pl-0">
                        <div class="img-form">
                            <img src="{{ Theme::asset()->url('images/contact/contact-form.png') }}" alt="contact-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-contact">
                <div class="row content-contact">
                    <div class="col-md-4 img-detail">
                            <img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}" alt="img-detail">
                    </div>
                    <div class="col-md-8 detail-content-wrap">
                        
                            <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">TRỤ SỞ CHÍNH CÔNG TY Ô TÔ TRƯỜNG HẢI TẠI TP. HỒ CHÍ MINH</h3>
                            <p class="font-pri"><ion-icon name="location-outline"></ion-icon><span class="font-pri-bold">Địa chỉ: </span>Số 10 Mai Chí Thọ, P.Thủ Thiêm, TP.Thủ Đức, TP.HCM</p>
                            <p class="font-pri"><ion-icon name="call-outline"></ion-icon><span class="font-pri-bold">Hotline: </span>1900545591</p>
                            <p class="font-pri"><ion-icon name="print-outline"></ion-icon><span class="font-pri-bold">Fax: </span>+84 (0)8-39977.742</p>
                            <p class="font-pri"><ion-icon name="at-outline"></ion-icon><span class="font-pri-bold">Website: </span>www.truonghaiauto.com.vn</p>
                            <p class="font-pri"><ion-icon name="mail-outline"></ion-icon><span class="font-pri-bold">Email: </span>rep.office@thaco.com.vn</p>
                    </div>
                </div>
        </div>
        <div class="detail-contact">
            <div class="row content-contact">
                <div class="col-md-4 img-detail">
                        <img src="{{ Theme::asset()->url('images/contact/detail-contact2.png') }}" alt="img-detail">
                </div>
                <div class="col-md-8 detail-content-wrap">
                        <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI KHU PHỨC HỢP CHU LAI - TRƯỜNG HẢI</h3>
                        <p class="font-pri"><ion-icon name="location-outline"></ion-icon><span class="font-pri-bold">Địa chỉ: </span>Thôn 4, Xã Tam Hiệp, Huyện Núi thành, Tỉnh Quảng Nam.</p>
                        <p class="font-pri"><ion-icon name="call-outline"></ion-icon><span class="font-pri-bold">Hotline: </span>+84-0510.3567.161 - 0510.3567.162 - 0510.3567.163</p>
                        <p class="font-pri"><ion-icon name="print-outline"></ion-icon><span class="font-pri-bold">Fax: </span> +84 - (0)510 - 3565777</p>
                        <p class="font-pri"><ion-icon name="mail-outline"></ion-icon><span class="font-pri-bold">Email: </span> chulai-truonghai@dng.vnn.vn</p>
                </div>
            </div>
    </div>
    <div class="detail-contact">
        <div class="row content-contact">
            <div class="col-md-4 img-detail">
                    <img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}" alt="img-detail">
            </div>
            <div class="col-md-8 detail-content-wrap">
                    <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI HÀ NỘI</h3>
                    <p class="font-pri"><ion-icon name="location-outline"></ion-icon><span class="font-pri-bold">Địa chỉ: </span>Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn Văn Linh, Sài Đồng, Long Biên, Hà Nội</p>
                    <p class="font-pri"><ion-icon name="call-outline"></ion-icon><span class="font-pri-bold">Hotline: </span>+84 - (0)43.8758914</p>
                    <p class="font-pri"><ion-icon name="print-outline"></ion-icon><span class="font-pri-bold">Fax: </span>043.8759857</p>
            </div>
        </div>
</div>
    </div>
</section>

