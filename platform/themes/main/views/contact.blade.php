<section class="section-info-contact">
    <div class="container-remake">
        <h2 class="contact__title font60 font-pri-bold pb-4">THÔNG TIN LIÊN HỆ</h2>
        <div class="info-contact"  data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
           
            <div class="info-contact-form mb-6"> 
                <div class="row">
                    <div class="col-md-6 pr-0">
                            <div id="contact-form" class="form-horizontal form-contact-us">
            {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST']) !!}                   
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">NƠI GỬI ĐẾN:</label>
                        <div class="col-sm-6 pr-0">
                            <select name="" id="">
                                <option value="">THACO AUTO</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 text-label mt-3">HỌ TÊN:</label>
                        <div class="col-sm-9 row pr-0">
                            <div class="col-sm-6 pr-0">
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
                        <input type="checkbox" name="fieldset-1" id="radio-example-one" />
                        <label for="radio-example-one">TÔI XÁC NHẬN CUNG CẤP THÔNG TIN CÁ NHÂN ĐỂ LIÊN HỆ VỚI THACO AUTO.</label>
                        </div>
                    
                    
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
        
        
    </div>
</section>

<section class="section-info-contact-mobile" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="50">
    <div class="container-remake">
        <h2 class="contact__title font-pri-bold text-uppercase">Thông tin cá nhân</h2>
        <div class="info-contact">
           
            <div class="info-contact-form mb-6"> 
              
                <div id="contact-form" class="form-horizontal form-contact-us">
            {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST']) !!}                   
            <div class="contact-input">
                <label class="fontmb-medium font-pri-bold">Họ và tên<span>*</span></label> 
                <input type="text" required />
            </div>   
            <div class="contact-input">
                <label class="fontmb-medium font-pri-bold">Điện thoại<span>*</span></label> 
                <input  type="text" required />
            </div>  
            <div class="contact-input">
                <label class="fontmb-medium font-pri-bold">Email<span>*</span></label> 
                <input  type="text" required />
            </div>   
            <div class="contact-input">
                <label class="fontmb-medium font-pri-bold">Tiêu đề<span>*</span></label> 
                <input  type="text" required />
            </div>   
            <div class="contact-input wide">
                <label class="fontmb-medium font-pri-bold">Nội dung <span>*</span></label>
                <textarea   required></textarea>
                
            </div> 
            <div class="contact-noti">
                <label class="fontmb-medium font-pri-bold py-2">Thông báo bảo mật dữ liệu</label>
                <p class="font-pri text-noti">Thaco hoặc các đại lý của Thaco có thể sử dụng thông tin mà bạn cung cấp cùng với thông tin khác mà chúng tôi có thể liên hệ với bạn, bao gồm thư, điện thoại, SMS, fax hoặc email, với các ưu đãi hoặc thông tin về sản phẩm và dịch vụ của Thaco mà chúng tôi có thể cung cấp. Chúng tôi có thể giữ thông tin của bạn trong một khoản thời gian hợp lý để liên hệ với bạn về các đề nghị, lời mời hoặc thông tin về các sản phẩm và dịch vụ của chúng tôi. Để tiếp tục bạn phải đọc  <a href="#">Chính sách bảo mật</a></p>
                <div class="checkpolicy">
                    <div class="styled-input-single">
                        <input type="checkbox" name="fieldset-2" id="radio-example-two" />
                        <label for="radio-example-two" class="font28 font-pri text-noti">Tôi đã đọc và hiểu <a href="#">Chính sách bảo mật</a></label>
                        </div>
                    
                    
                    </div>
                </div>
                
            </div>
            <div class="btn-lrg  submit-btn fontmb-medium">GỬI THÔNG TIN</div>   
                   
                    
            
            {!! Form::close() !!}

                            </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
        
        
    </div>
</section>




<div class="contact-info-bottom container-remake">
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href=""><img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}" alt="img-detail"></a>
                    </div>
                </div>
                
                    
            </div>
            <div class="col-md-8 detail-content-wrap">
                
                    <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">TRỤ SỞ CHÍNH CÔNG TY <span> Ô TÔ</span> TRƯỜNG HẢI TẠI TP. HỒ CHÍ MINH </h3>
                    <div class="item">
                    <ion-icon name="location-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Số 10 Mai Chí Thọ, P.Thủ Thiêm, TP.Thủ Đức, TP.HCM</p>
                    </div>
                   <div class="item">
                    <ion-icon name="call-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Hotline: </span>1900545591</p>
                   </div>
                   <div class="item">
                    <ion-icon name="print-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Fax: </span>+84 (0)8-39977.742</p>
                    </div>
                    <div class="item">
                        <ion-icon name="at-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Website: </span>www.truonghaiauto.com.vn</p>
                    </div>
                    <div class="item">
                        <ion-icon name="mail-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Email: </span>rep.office@thaco.com.vn</p>
                    </div>    
                    
                  
            </div>
        </div>
</div>
<div class="detail-contact" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
    <div class="row content-contact">
        <div class="col-md-4 img-detail">
            <div class="image">
                <div class="post-thumbnail">
                    <a href=""> <img src="{{ Theme::asset()->url('images/contact/detail-contact2.png') }}" alt="img-detail"></a>
                </div>
            </div>
        </div>
       
        <div class="col-md-8 detail-content-wrap">
                <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI KHU PHỨC HỢP  CHU LAI - TRƯỜNG HẢI</h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Thôn 4, Xã Tam Hiệp, Huyện Núi thành, Tỉnh Quảng Nam.</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84-0510.3567.161 - 0510.3567.162 - 0510.3567.163</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Fax: </span> +84 - (0)510 - 3565777</p>
                </div>
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Email: </span> chulai-truonghai@dng.vnn.vn</p>
                </div>
                
                
                
                
        </div>
    </div>
</div>
<div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
<div class="row content-contact">
    <div class="col-md-4 img-detail">
        <div class="image">
            <div class="post-thumbnail">
                <a href=""><img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}" alt="img-detail"></a>
            </div>
        </div>
    </div>
    <div class="col-md-8 detail-content-wrap">
            <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI HÀ NỘI</h3>
            <div class="item">
                <ion-icon name="location-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn Văn Linh, Sài Đồng, Long Biên, Hà Nội</p> 
            </div>
            <div class="item">
                <ion-icon name="call-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84 - (0)43.8758914</p> 
            </div>
            <div class="item">
                <ion-icon name="print-outline"></ion-icon><p class="font-pri"><span class="font-pri-bold">Fax: </span>043.8759857</p>
            </div>
           
            
            
    </div>
</div>
</div>
</div>






<div class="contact-info-bottom-mobile container-remake">
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
                    <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">TRỤ SỞ CHÍNH CÔNG TY TRƯỜNG HẢI</h3>
                <div class="detail-content-wrap">
                    <div class="left">
                        <div class="item location">
                            <ion-icon name="location-outline"></ion-icon><p class="font-pri-bold">Địa chỉ: </p>
                        </div>
                        <div class="item ">
                            <ion-icon name="call-outline"></ion-icon><p class="font-pri-bold">Hotline: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="print-outline"></ion-icon><p class="font-pri-bold">Fax: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="at-outline"></ion-icon><p class="font-pri-bold">Website: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="mail-outline"></ion-icon><p class="font-pri-bold">Email: </p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="item location">
                            <p class="font-pri"> Số 10 Mai Chí Thọ, P.Thủ Thiêm, TP.Thủ Đức, Thành phố Hồ Chí Minh</p>
                        </div>
                        <div class="item ">
                            <p class="font-pri">1900545591 </p>
                        </div>
                        <div class="item">
                            <p class="font-pri"> +84 (0)8-39977.742</p>
                        </div>
                        <div class="item">
                            <p class="font-pri">www.truonghaiauto.com.vn </p>
                        </div>
                        <div class="item">
                            <p class="font-pri"> rep.office@thaco.com.vn</p>
                        </div>
                    </div>
                    
                    
                  
            </div>
        </div>
    </div>

    <div class="detail-contact" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
                    <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">VĂN PHÒNG THACO CHU LAI</h3>
                <div class="detail-content-wrap">
                    <div class="left">
                        <div class="item location">
                            <ion-icon name="location-outline"></ion-icon><p class="font-pri-bold">Địa chỉ: </p>
                        </div>
                        <div class="item ">
                            <ion-icon name="call-outline"></ion-icon><p class="font-pri-bold">Hotline: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="print-outline"></ion-icon><p class="font-pri-bold">Fax: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="mail-outline"></ion-icon><p class="font-pri-bold">Email: </p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="item location">
                            <p class="font-pri">Thôn 4, Xã Tam Hiệp, Huyện Núi thành, Tỉnh Quảng Nam.</p>
                        </div>
                        <div class="item ">
                            <p class="font-pri">+84-0510.3567.161 - 0510.3567.162 - 0510.3567.163</p>
                        </div>
                        <div class="item">
                            <p class="font-pri"> +84 - (0)510 - 3565777</p>
                        </div>
                        <div class="item">
                            <p class="font-pri">chulai-truonghai@dng.vnn.vn</p>
                        </div>
                       
                    </div>
                    
                    
                  
            </div>
        </div>
    </div>

    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
                    <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">VĂN PHÒNG THACO TẠI HÀ NỘI</h3>
                <div class="detail-content-wrap">
                    <div class="left">
                        <div class="item location">
                            <ion-icon name="location-outline"></ion-icon><p class="font-pri-bold">Địa chỉ: </p>
                        </div>
                        <div class="item ">
                            <ion-icon name="call-outline"></ion-icon><p class="font-pri-bold">Hotline: </p>
                        </div>
                        <div class="item">
                            <ion-icon name="print-outline"></ion-icon><p class="font-pri-bold">Fax: </p>
                        </div>
                        
                    </div>
                    <div class="right">
                        <div class="item location">
                            <p class="font-pri">Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn Văn Linh, Sài Đồng, Long Biên, Hà Nội</p>
                        </div>
                        <div class="item ">
                            <p class="font-pri">+84 - (0)43.8758914</p>
                        </div>
                        <div class="item">
                            <p class="font-pri">043.8759857</p>
                        </div>
                      
                    </div>
                    
                    
                  
            </div>
        </div>
    </div>

</div>


