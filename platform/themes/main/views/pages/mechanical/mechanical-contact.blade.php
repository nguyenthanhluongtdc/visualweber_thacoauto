<div class="section-mechanical-contact-again" data-aos="zoom-in" data-aos-duration="1500" data-aos-easing="ease-in-out" data-aos-delay="50">
    <div class="container-remake">
        <h2 class="mechanical-contact__title font60 font-pri-bold mb-4 fontmb-large text-uppercase"> {!! __('Contact') !!} </h2>
    </div>
    <div class="section-mechanical-contact-again__content">
        <div class="container-remake">
            <div class="mechanical-contact mt-60 mb-60">
                <div class="mechanical-contact__content">
                    <div class="mechanical-contact__content__top row">
                        <div class="left col-5">
                            @if(theme_option('address_contact'))
                            <div class="address font20">
                                <span class="text fontmb-medium">
                                    {!! theme_option('address_contact') !!}
                                </span>
                            </div>
                            @endif

                            @if(theme_option('phone_contact'))
                            <div class="phone font20">
                                <span class="text fontmb-medium">
                                    {!! theme_option('phone_contact') !!}
                                </span>
                            </div>
                            @endif

                            @if(theme_option('email_contact'))
                            <div class="email font20">
                                <span class="text fontmb-medium">
                                    {!! theme_option('email_contact') !!}
                                </span>
                            </div>
                            @endif

                        </div>
                        {{-- <div class="col-1"></div> --}}
                        <div class="right col-7">
                            <img loading="lazy" src="{{Storage::disk('public')->exists(theme_option('image_contact')) ? get_image_url(theme_option('image_contact')) : RvMedia::getDefaultImage()}}" alt="???nh li??n h???">
                        </div>

                    </div>

                    {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST', 'class' => 'contact-form']) !!}
                    <div class="mechanical-contact__info">
                        <div class="row input-container">
                            <div class="col-6">
                                <div class="styled-input">
                                    <input type="text" name="name" required />
                                    <label class="font20 fontmb-medium">
                                        {!! __('h??? v?? t??n') !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="styled-input">
                                    <input type="text" name="email" required />
                                    <label class="font20 fontmb-medium">
                                        {!! __('Email') !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="styled-input">
                                    <input type="text" name="phone" required />
                                    <label class="font20 fontmb-medium">
                                        {!! __('s??? ??i???n tho???i') !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="styled-input">
                                    <input type="text" name="subject" required />
                                    <label class="font20 fontmb-medium">
                                        {!! __('ti??u ?????') !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="styled-input wide">
                                    <textarea rows="4" name="content" required></textarea>
                                    <label class="font20 fontmb-medium">
                                        {!! __('n???i dung') !!}
                                    </label>
                                </div>
                            </div>
                            <input type="checkbox" name="agree" checked/ style="opacity: 0">
                            <div class="col-md-12">
                                <button type="submit" class="contact-button  fontmb-medium btn-lrg  submit-btn font20 text-uppercase"  >
                                    {!! __('g???i ??i') !!}
                                </button>
                            </div>
                        </div>
                    </div>
                    @if(session()->has('success_msg') || session()->has('error_msg') || isset($errors))
                @if (session()->has('success_msg'))
                    <div class="alert alert-success font-helve-light font18" style="margin-top : 30px">
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
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{--
<div class="section-mechanical-contact-mobile"  data-aos="zoom-in" data-aos-duration="1500" data-aos-easing="ease-in-out" data-aos-delay="50">
        <h2 class="mechanical-contact__title fontmb-large font-pri-bold mb-4 container-remake">LI??N H???</h2>
        <div class="mechanical-contact mt-60 mb-60">
            <div class="container-remake">
            <div class="mechanical-contact__content">
                <div class="mechanical-contact__content__top row">
                    <div class="right col-md-12 mt-5">
                        <img loading="lazy" src="{{Theme::asset()->url('images/mechandical/form-contact.jpg')}}" alt="">
                    </div>
                    <div class="left col-md-12 ">
                        <div class="address">
                            <span class="text">KHU C??NG NGHI???P TAM HI???P, HUY???N N??I TH??NH, QU???NG NAM.</span>
                        </div>
                        <div class="phone font28">
                            <span class="text">0235.3567.16 - 0235.3567.162 -
                                0235.3567.163</span>
                        </div>
                        <div class="email font28">
                            <span class="text">CHULAICOMPLEX@THACO.COM.VN</span>
                        </div>
                    </div>


                </div>
                <div class="mechanical-contact__info mt-4 ">
                    <div class="row input-container ">
                        <div class="col-md-12 pr-0">
                            <div class="styled-input">
                                <input type="text" required />
                                <label class="font20">h??? v?? t??n</label>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="styled-input">
                                <input type="text" required />
                                <label class="font20">email</label>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="styled-input">
                                <input type="text" required />
                                <label class="font20">s??? ??i???n tho???i</label>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="styled-input">
                                <input type="text" required />
                                <label class="font20">ti??u ?????</label>
                            </div>
                        </div>
                        <div class="col-md-12 pr-0">
                            <div class="styled-input wide">
                                <textarea required></textarea>
                                <label class="font20">n???i dung</label>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="btn-lrg  submit-btn font20">G???I ??I</div>
                        </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
