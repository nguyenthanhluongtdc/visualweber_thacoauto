<section class="section-info-contact overflow-x-hidden">
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
                                <label for="company" class="col-sm-3 text-label mt-3">{{ __('Send to') }}:</label>
                                <div class="col-sm-6 pr-0">
                                    <select name="company" id="contact_company">
                                        @if (has_field($page, 'send_to_list'))
                                        @foreach (get_field($page, 'send_to_list') as $key => $item)
                                        <option value="{{ get_sub_field($item, 'email') }}">{{ get_sub_field($item, 'send_to_item') }}</option>
                                        @endforeach

                                        @endif
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-label mt-3">{{ __('Full name') }}:</label>
                                <div class="col-sm-9 row pr-0">
                                    <div class="col-sm-6 pr-0">
                                        <input type="text" class="form-control" id="contact_firstname"
                                            placeholder="{{ __('Surname') }}*" name="firstname" value="{{ old('firstname') }}"  required>

                                    </div>
                                    <div class="col-sm-6 pr-0">
                                        <input type="text" class="form-control" id="contact_lastname"
                                            placeholder="{{ __('First name') }}*" name="lastname" value="{{ old('lastname') }}" required>
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
                                        placeholder="{{ __('Content') }}" required>{{ old('content') }}</textarea>
                                </div>

                            </div>
                            <div class="policy col-sm-9 float-right">
                                <div class="check-policy">
                                    <div class="styled-input-single">
                                        <input type="checkbox" name="agree" id="radio-example-one" />
                                        <label for="radio-example-one">{{ __('I CONFIRM PROVIDE PERSONAL INFORMATION TO CONTACT THACO AUTO') }}</label>
                                    </div>


                                </div>
                                @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="form-group">
                                            {!! Captcha::display() !!}
                                        </div>
                                    </div>
                                 @endif
                                 <div class="btn-control text-center">
                                    <button class="btn btn-secondary" type="submit" value="SEND">
                                        {{ __('Send') }}
                                    </button>
                                 </div>
                               

                            </div>


                            {!! Form::close() !!}

                        </div>

                    </div>

                    <div class="col-md-6 pl-0">
                        <div class="img-form">
                            <img loading="lazy" src="{{ RvMedia::getImageUrl(get_field($page, 'img_contact_top'))}}" alt="contact-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<section class="section-info-contact-mobile" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out"
    data-aos-delay="50">
    <div class="container-remake">
        <h2 class="contact__title font-pri-bold text-uppercase fontmb-large"> {{ __('personal information') }}</h2>
        <div class="info-contact">

            <div class="info-contact-form mb-6">

                <div id="contact-form" class="form-horizontal form-contact-us">
                    {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST']) !!}
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold text-uppercase">{{ __('Send to') }}<span>*</span></label>
                            <select name="company" class="contact-form-input" id="contact_company">
                                @if (has_field($page, 'send_to_list'))
                                @foreach (get_field($page, 'send_to_list') as $key => $item)
                                <option value="{{ get_sub_field($item, 'email') }}">{{ get_sub_field($item, 'send_to_item') }}</option>
                                @endforeach

                                @endif
                            </select>

                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold text-uppercase">{{ __('Full name') }}<span>*</span></label>
                        <input type="text" class="contact-form-input" name="name" value="{{ old('name') }}" id="contact_name"
                       placeholder="{{ __('Name') }}" required />
                        {{-- <input type="text" required /> --}}
                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold text-uppercase">{{ __('Phone') }}<span>*</span></label>
                        <input type="text" class="contact-form-input" name="phone" value="{{ old('phone') }}" id="contact_phone2"
                       placeholder="{{ __('Phone') }}" required>
                        {{-- <input type="text" required /> --}}
                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold text-uppercase">Email<span>*</span></label>
                        <input type="email" class="contact-form-input" name="email" value="{{ old('email') }}" id="contact_email"
                       placeholder="{{ __('Email') }}" required>
                        {{-- <input type="text" required /> --}}
                    </div>
                    <div class="contact-input">
                        <label class="fontmb-medium font-pri-bold text-uppercase">{{ __('Subject') }}<span>*</span></label>
                        <input type="text" class="contact-form-input" name="subject" value="{{ old('subject') }}" id="contact_subject"
                       placeholder="{{ __('Subject') }}" required>
                     
                    </div>
                    <div class="contact-input wide">
                        <label class="fontmb-medium font-pri-bold text-uppercase">{{ __('Content') }}<span>*</span></label>
                        <textarea name="content" id="contact_content2" class="contact-form-input" rows="5" placeholder="{{ __('Message') }}" required>{{ old('content') }}</textarea>
                      

                    </div>
                    <div class="contact-noti">
                        <label class="fontmb-medium font-pri-bold pt-4 pb-2 text-uppercase">{{ __('Data privacy notice') }}</label>
                        <p class="text-noti font-pri fontmb-little">{!! get_field($page, 'policy_mobie_text') !!} <a href="#">{{ __('Privacy Policy') }}</a></p>
                        <div class="checkpolicy">
                            <div class="styled-input-single">
                                <input type="checkbox" name="agree" id="radio-example-two" />
                                <label for="radio-example-two" class="font28 text-noti font-pri fontmb-medium">{{ __('I have read and understand') }} <a
                                        href="#">{{ __('Privacy Policy') }}</a></label>
                            </div>


                        </div>
                    </div>

                </div>
                {{-- <div class="btn-lrg  submit-btn fontmb-medium">GỬI THÔNG TIN</div> --}}
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
                
            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="form-group">
                        {!! Captcha::display() !!}
                    </div>
                </div>
            @endif
                <button class="btn-lrg  submit-btn fontmb-medium text-uppercase" type="submit" value="SEND">
                    {{ __('Send') }}
                </button>

                {!! Form::close() !!}

            </div>

        </div>

    </div>
    </div>
    </div>


    </div>
</section>


@if (has_field($page, 'list_contact_office'))


<div class="contact-info-bottom container-remake">
    @foreach (get_field($page, 'list_contact_office') as $item)
    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            <div class="col-md-4 img-detail">
                <div class="image">
                    <div class="post-thumbnail">
                        @if (has_sub_field($item, 'img_contact_office'))
                        <a href=""><img loading="lazy" src="{{ RvMedia::getImageUrl(get_sub_field($item, 'img_contact_office'))}}"
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
                    <p class="font-pri font18"><span class="font-pri-bold">{{__('Address')}}: </span>{{ get_sub_field($item, 'address_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'hotline_contact_office'))
                <div class="item">
                    <ion-icon name="call-outline"></ion-icon>
                    <p class="font-pri font18"><span class="font-pri-bold">Hotline: </span>{{ get_sub_field($item, 'hotline_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'fax_contact_office'))
                <div class="item">
                    <ion-icon name="print-outline"></ion-icon>
                    <p class="font-pri font18"><span class="font-pri-bold">Fax: </span>{{ get_sub_field($item, 'fax_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'website_contact_office'))
                <div class="item">
                    <ion-icon name="at-outline"></ion-icon>
                    <p class="font-pri font18"><span class="font-pri-bold">Website: </span>{{ get_sub_field($item, 'website_contact_office') }}</p>
                </div>
                @endif

                @if (has_sub_field($item, 'email_contact_office'))
                <div class="item">
                    <ion-icon name="mail-outline"></ion-icon>
                    <p class="font-pri font18"><span class="font-pri-bold">Email: </span>{{ get_sub_field($item, 'email_contact_office') }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>

    @endforeach

   
</div>

@endif
@if (has_field($page, 'list_contact_office'))

@endif

<div class="contact-info-bottom-mobile container-remake">
    @foreach (get_field($page, 'list_contact_office') as $item)

    <div class="detail-contact" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
        <div class="row content-contact ">
            @if (has_sub_field($item, 'title_contact_office'))
            <h3 class="detail-title font40 font-pri-bold mt-4 mb-2">{{ get_sub_field($item, 'title_contact_office') }}</h3>
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
                        <p class="font-pri font18"> {{ get_sub_field($item, 'address_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'hotline_contact_office'))
                    <div class="item ">
                        <p class="font-pri font18">{{ get_sub_field($item, 'hotline_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'fax_contact_office'))
                    <div class="item">
                        <p class="font-pri font18"> {{ get_sub_field($item, 'fax_contact_office') }}</p>
                    </div>
                    @endif

                    @if (has_sub_field($item, 'website_contact_office'))
                    <div class="item">
                        <p class="font-pri font18">{{ get_sub_field($item, 'website_contact_office') }} </p>
                    </div>
                    @endif
                    @if (has_sub_field($item, 'email_contact_office'))
                    <div class="item">
                        <p class="font-pri font18"> {{ get_sub_field($item, 'email_contact_office') }}</p>
                    </div>
                    @endif
                </div>



            </div>
        </div>
    </div>
    @endforeach
</div>
