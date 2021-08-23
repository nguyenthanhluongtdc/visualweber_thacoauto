<section class="section-info-contact">
    <div class="container-remake">
        @if (has_field($page, 'title_contact'))
        <h2 class="contact__title font60 font-pri-bold pb-4">{!! get_field($page, 'title_contact') !!}</h2>
        @endif
        <div class="info-contact" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out"
            data-aos-delay="50">

            <div class="info-contact-form mb-6">
                @if(session()->has('success_msg') || session()->has('error_msg') || isset($errors))
                @if (session()->has('success_msg'))
                    <div class="alert alert-success font-helve-light font18">
                        <p>{{__('Send successfully')}}</p>
                    </div>
                @endif
                @if (session()->has('error_msg'))
                    <div class="alert alert-danger font-helve-light font18">
                        <p>{{ session('error_msg') }}</p>
                    </div>
                @endif
                @if (isset($errors) && count($errors))
                    <div class="alert alert-danger font-helve-light font18">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span> <br>
                        @endforeach
                    </div>
                @endif
            @endif
                <div class="contact-form-group">
                    <div class="contact-message contact-success-message" style="display: none"></div>
                    <div class="contact-message contact-error-message" style="display: none"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-0">
                        <div id="contact-form" class="form-horizontal form-contact-us">
                            {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST', 'class' => 'contact-form']) !!}
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-label mt-3">{{ __('Send to') }}:</label>
                                <div class="col-sm-6 pr-0">
                                    <select name="company" id="send_company">
                                        @if (has_field($page, 'send_to_list'))
                                        @foreach (get_field($page, 'send_to_list') as $key => $item)
                                        <option value="sendto{{$key+1}}">{{ get_sub_field($item, 'send_to_item') }}</option>
                                        @endforeach
                                        
                                        @endif
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-label mt-3">{{ __('Full name') }}:</label>
                                <div class="col-sm-9 row pr-0">
                                    <div class="col-sm-6 pr-0">
                                        <input type="text" class="form-control" id="contact_name_first"
                                            placeholder="{{ __('Surname') }}*" name="firstname" value="{{ old('firstname') }}">
                                    </div>
                                    <div class="col-sm-6 pr-0">
                                        <input type="text" class="form-control" id="contact_name_last"
                                            placeholder="{{ __('First name') }}*" name="lastname" value="{{ old('lastname') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-label mt-3">{{ __('Phone') }}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact_phone" placeholder="+84"
                                        name="phone" value="{{ old('phone') }}">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-label mt-3">{{ __('Content') }}:</label>
                                <div class="col-sm-9">
                                    <textarea name="content" id="contact_content" class="form-control" rows="5"
                                        placeholder="{{ __('Nội dung') }}">{{ old('content') }}</textarea>
                                </div>

                            </div>
                            <div class="policy col-sm-9 float-right">
                                <div class="check-policy">
                                    <div class="styled-input-single">
                                        <input type="checkbox" name="agree" id="radio-example-one" />
                                        <label for="radio-example-one">{{ __('I CONFIRM PROVIDE PERSONAL INFORMATION TO CONTACT THACO AUTO') }}</label>
                                    </div>


                                </div>
                                <button class="btn btn-secondary" type="submit" value="SEND">
                                    {{ __('Send') }}
                                </button>

                            </div>

                           
                            {!! Form::close() !!}

                        </div>
                       
                    </div>

                    <div class="col-md-6 pl-0">
                        <div class="img-form">
                            <img src="{{ RvMedia::getImageUrl(get_field($page, 'img_contact_top'))}}" alt="contact-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

{{-- <section class="section-info-contact-mobile" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out"
    data-aos-delay="50">
    <div class="container-remake">
        <h2 class="contact__title font-pri-bold text-uppercase fontmb-large">Thông tin cá nhân</h2>
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
                        <input type="text" required />
                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold">Email<span>*</span></label>
                        <input type="text" required />
                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold">Tiêu đề<span>*</span></label>
                        <input type="text" required />
                    </div>
                    <div class="contact-input wide">
                        <label class="fontmb-medium font-pri-bold">Nội dung <span>*</span></label>
                        <textarea required></textarea>

                    </div>
                    <div class="contact-noti">
                        <label class="fontmb-medium font-pri-bold pt-4 pb-2">Thông báo bảo mật dữ liệu</label>
                        <p class="text-noti font-pri">Thaco hoặc các đại lý của Thaco có thể sử dụng thông tin mà bạn
                            cung cấp cùng với thông tin khác mà chúng tôi có thể liên hệ với bạn, bao gồm thư, điện
                            thoại, SMS, fax hoặc email, với các ưu đãi hoặc thông tin về sản phẩm và dịch vụ của Thaco
                            mà chúng tôi có thể cung cấp. Chúng tôi có thể giữ thông tin của bạn trong một khoản thời
                            gian hợp lý để liên hệ với bạn về các đề nghị, lời mời hoặc thông tin về các sản phẩm và
                            dịch vụ của chúng tôi. Để tiếp tục bạn phải đọc <a href="#">Chính sách bảo mật</a></p>
                        <div class="checkpolicy">
                            <div class="styled-input-single">
                                <input type="checkbox" name="fieldset-2" id="radio-example-two" />
                                <label for="radio-example-two" class="font28 text-noti font-pri">Tôi đã đọc và hiểu <a
                                        href="#">Chính sách bảo mật</a></label>
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
</section> --}}


@if (has_field($page, 'list_contact_office'))


<div class="contact-info-bottom container-remake">
    @foreach (get_field($page, 'list_contact_office') as $item)
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        @if (has_sub_field($item, 'img_contact_office'))
                        <a href=""><img src="{{ RvMedia::getImageUrl(get_sub_field($item, 'img_contact_office'))}}"
                                alt="img-detail"></a>
                        @endif
                    </div>
                </div>


            </div>
            <div class="col-md-8 detail-content-wrap">
                @if (has_sub_field($item, 'title_contact_office'))
                <h3 class="detail-title font40 font-pri-bold mt-4 mb-3"> {{ get_sub_field($item, 'title_contact_office') }} </h3>
                @endif

                @if (has_sub_field($item, 'address_contact_office'))
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">{{__('Address')}}: </span>{{ get_sub_field($item, 'address_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'hotline_contact_office'))
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>{{ get_sub_field($item, 'hotline_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'fax_contact_office'))
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span>{{ get_sub_field($item, 'fax_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'website_contact_office'))
                <div class="item">
                    <ion-icon name="at-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Website: </span>{{ get_sub_field($item, 'website_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'email_contact_office'))
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Email: </span>{{ get_sub_field($item, 'email_contact_office') }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>

    @endforeach

    {{-- <div class="detail-contact" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href=""> <img src="{{ Theme::asset()->url('images/contact/detail-contact2.png') }}"
                                alt="img-detail"></a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 detail-content-wrap">
                <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI KHU PHỨC HỢP CHU LAI -
                    TRƯỜNG HẢI</h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Thôn 4, Xã Tam Hiệp, Huyện Núi
                        thành, Tỉnh Quảng Nam.</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84-0510.3567.161 - 0510.3567.162 -
                        0510.3567.163</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span> +84 - (0)510 - 3565777</p>
                </div>
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Email: </span> chulai-truonghai@dng.vnn.vn</p>
                </div>




            </div>
        </div>
    </div>
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href=""><img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}"
                                alt="img-detail"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 detail-content-wrap">
                <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI HÀ NỘI</h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn
                        Văn Linh, Sài Đồng, Long Biên, Hà Nội</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84 - (0)43.8758914</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span>043.8759857</p>
                </div>



            </div>
        </div>
    </div> --}}
</div>

@endif

{{-- <div class="contact-info-bottom container-remake">
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">

                        <a href=""><img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}"
                                alt="img-detail"></a>
                    </div>
                </div>


            </div>
            <div class="col-md-8 detail-content-wrap">

                <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">TRỤ SỞ CHÍNH CÔNG TY <span> Ô TÔ</span> TRƯỜNG
                    HẢI TẠI TP. HỒ CHÍ MINH </h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Số 10 Mai Chí Thọ, P.Thủ Thiêm,
                        TP.Thủ Đức, TP.HCM</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>1900545591</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span>+84 (0)8-39977.742</p>
                </div>
                <div class="item">
                    <ion-icon name="at-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Website: </span>www.truonghaiauto.com.vn</p>
                </div>
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Email: </span>rep.office@thaco.com.vn</p>
                </div>


            </div>
        </div>
    </div>
    <div class="detail-contact" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href=""> <img src="{{ Theme::asset()->url('images/contact/detail-contact2.png') }}"
                                alt="img-detail"></a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 detail-content-wrap">
                <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI KHU PHỨC HỢP CHU LAI -
                    TRƯỜNG HẢI</h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Thôn 4, Xã Tam Hiệp, Huyện Núi
                        thành, Tỉnh Quảng Nam.</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84-0510.3567.161 - 0510.3567.162 -
                        0510.3567.163</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span> +84 - (0)510 - 3565777</p>
                </div>
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Email: </span> chulai-truonghai@dng.vnn.vn</p>
                </div>




            </div>
        </div>
    </div>
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        <a href=""><img src="{{ Theme::asset()->url('images/contact/detail-contcact1.png') }}"
                                alt="img-detail"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 detail-content-wrap">
                <h3 class="detail-title font40 font-pri-bold mt-3 mb-3">VĂN PHÒNG THACO TẠI HÀ NỘI</h3>
                <div class="item">
                    <ion-icon name="location-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Địa chỉ: </span>Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn
                        Văn Linh, Sài Đồng, Long Biên, Hà Nội</p>
                </div>
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Hotline: </span>+84 - (0)43.8758914</p>
                </div>
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri"><span class="font-pri-bold">Fax: </span>043.8759857</p>
                </div>



            </div>
        </div>
    </div>
</div> --}}




@if (has_field($page, 'list_contact_office'))

@endif

<div class="contact-info-bottom-mobile container-remake">
    @foreach (get_field($page, 'list_contact_office') as $item)

    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            @if (has_sub_field($item, 'title_contact_office'))
            <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">{{ get_sub_field($item, 'title_contact_office') }}</h3>
            @endif
            <div class="detail-content-wrap">
                <div class="left">
                    <div class="item location">
                        <ion-icon name="location-outline"></ion-icon>
                        <p class="font-pri-bold">{{__('Address')}}: </p>
                    </div>
                    @if (has_sub_field($item, 'hotline_contact_office'))
                    <div class="item ">
                        <ion-icon name="call-outline"></ion-icon>
                        <p class="font-pri-bold">Hotline: </p>
                    </div>
                    @endif
                    @if (has_sub_field($item, 'fax_contact_office'))
                    <div class="item">
                        <ion-icon name="print-outline"></ion-icon>
                        <p class="font-pri-bold">Fax: </p>
                    </div>
                    @endif
                    @if (has_sub_field($item, 'website_contact_office'))
                    <div class="item">
                        <ion-icon name="at-outline"></ion-icon>
                        <p class="font-pri-bold">Website: </p>
                    </div>
                    @endif
                    @if (has_sub_field($item, 'email_contact_office'))
                    <div class="item">
                        <ion-icon name="mail-outline"></ion-icon>
                        <p class="font-pri-bold">Email: </p>
                    </div>
                    @endif
                </div>
                <div class="right">
                    @if (has_sub_field($item, 'address_contact_office'))
                    <div class="item location">
                        <p class="font-pri"> {{ get_sub_field($item, 'address_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'hotline_contact_office'))
                    <div class="item ">
                        <p class="font-pri">{{ get_sub_field($item, 'hotline_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'fax_contact_office'))
                    <div class="item">
                        <p class="font-pri"> {{ get_sub_field($item, 'fax_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'website_contact_office'))
                    <div class="item">
                        <p class="font-pri">{{ get_sub_field($item, 'website_contact_office') }} </p>
                    </div>
                    @endif
                    @if (has_sub_field($item, 'email_contact_office'))
                    <div class="item">
                        <p class="font-pri"> {{ get_sub_field($item, 'email_contact_office') }}</p>
                    </div>
                    @endif
                </div>



            </div>
        </div>
    </div>
    @endforeach
    {{-- <div class="detail-contact" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            <h3 class="detail-title font40 font-pri-bold mt-4 mb-3">VĂN PHÒNG THACO CHU LAI</h3>
            <div class="detail-content-wrap">
                <div class="left">
                    <div class="item location">
                        <ion-icon name="location-outline"></ion-icon>
                        <p class="font-pri-bold">Địa chỉ: </p>
                    </div>
                    <div class="item ">
                        <ion-icon name="call-outline"></ion-icon>
                        <p class="font-pri-bold">Hotline: </p>
                    </div>
                    <div class="item">
                        <ion-icon name="print-outline"></ion-icon>
                        <p class="font-pri-bold">Fax: </p>
                    </div>
                    <div class="item">
                        <ion-icon name="mail-outline"></ion-icon>
                        <p class="font-pri-bold">Email: </p>
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
                        <ion-icon name="location-outline"></ion-icon>
                        <p class="font-pri-bold">Địa chỉ: </p>
                    </div>
                    <div class="item ">
                        <ion-icon name="call-outline"></ion-icon>
                        <p class="font-pri-bold">Hotline: </p>
                    </div>
                    <div class="item">
                        <ion-icon name="print-outline"></ion-icon>
                        <p class="font-pri-bold">Fax: </p>
                    </div>

                </div>
                <div class="right">
                    <div class="item location">
                        <p class="font-pri">Lô D6, KCN Hà Nội Đài Tư, 386 Nguyễn Văn Linh, Sài Đồng, Long Biên, Hà Nội
                        </p>
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
    </div> --}}

</div>
