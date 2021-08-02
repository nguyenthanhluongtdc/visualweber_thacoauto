<section class="section-info-contact">
    <div class="container-remake">
        <div class="info-contact">
            <h2 class="contact__title font60 font-pri-bold">THÔNG TIN LIÊN HỆ</h2>
            <div class="info-contact-form">
                <div class="row">
                    <div class="col-md-6 pr-0">
                        
                            <div id="contact-form" class="form-horizontal form-contact-us h-100">
                                {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST']) !!}                   
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-label">NƠI GỬI ĐẾN:</label>
                                            <div class="col-sm-9">
                                                <select name="" id="">
                                                    <option value="">THACO AUTO</option>
                                                </select>
                                            </div>
                                          
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-label">HỌ TÊN:</label>
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
                                            <label for="" class="col-sm-3 text-label">SDT:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="contact_phone" placeholder="+84" name="phone" value="{{ old('phone') }}">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-label">NỘI DUNG:</label>
                                            <div class="col-sm-9">
                                                <textarea name="content" id="contact_content" class="form-control" rows="5" placeholder="Điền nội dung">{{ old('content') }}</textarea>
                                            </div>
                                          
                                        </div>
                                <div class="policy col-sm-12">
                                    <div class="check-policy">
                                        {{-- <input class="" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked> --}}
                                        <label class="customcheck">
                                            
                                            <input type="checkbox" checked="checked">
                                            <div class="check-policy__content">
                                            <a href="#" class="check-policy__link" title="checkbox">TÔI XÁC NHẬN CUNG CẤP THÔNG TIN CÁ NHÂN ĐỂ LIÊN HỆ VỚI THACO AUTO.</a> 
                                            </div>
                                            <span class="checkmark"></span>
                                        </label>        
                                      </div>
                                    <button class="btn btn-secondary" type="submit" value="SEND">
                                        Gửi
                                    </button>
        
                                </div>
                                {!! Form::close() !!}
        
                            </div>
                       
                    </div>
                    <div class="col-md-6 pl-0">
                        <div class="img-form h-100">
                            <img src="{{ Theme::asset()->url('images/contact/contact-form.jpg') }}" alt="contact-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>