<div id="test-drive-page">
    <div class="section-main-wrapper">
        <div class="container-remake d-md-block">
            <div class="section-main">
                <form action="#" class="form">
                    <div class="row row__main">
                        <div class="top-menu-mobile mb-5">
                            <div class="box-picture-mobile mb-3">
                                <img loading="lazy" src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}">
                            </div>
                            <p class="font-pri text-uppercase font30">{{ $car->name }}</p>
                        </div>

                        <div class="form-register">
                            <ul class="nav nav-tabs font20" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active fontmb-medium" data-toggle="tab" href="#at_showroom">
                                        {{ __("Đăng ký lái thử tại Showroom") }}
                                    <div class="bottom-line mt-1"></div>
                                </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fontmb-medium" data-toggle="tab" href="#at_home">
                                        {{ __("Đăng ký lái thử tại nhà") }}
                                        <div class="bottom-line mt-1"></div>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content font-pri content" id="myTabContent">
                                <div id="at_showroom" class="container tab-pane active">
                                    <div class="form__select">
                                        <span class="title">{{ __("Xưng hô") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="vocative">
                                            <ul class="dropdown-menu">
                                                <li id="male">{{ __('Anh') }}</li>
                                                <li id="female">{{ __('Chị') }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__text">
                                        <span class="title">{{ __('Họ & tên') }}</span>
                                        <input type="text" name="name" placeholder="{{ __('Điền họ & tên') }}">
                                    </div>

                                    <div class="form__text">
                                        <span class="title">{{ __("Số ĐT") }}</span>
                                        <input type="text" name="phone" placeholder="{{ __("Điền số điện thoại") }}">
                                    </div>

                                    <div class="form__text">
                                        <span class="title">{{ __("Email") }}</span>
                                        <input type="text" name="email" placeholder="{{ __("Điền email") }}">
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Tỉnh/Thành phố") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Tỉnh/Thành phố") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="province">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Quận/ Huyện") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Quận/ Huyện") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Showroom") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Showroom") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="showroom">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Xe đang sở hữu") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="your_car">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Quý khách đã sở hữu xe trong bao lâu") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Quý khách dự định mua xe khi nào?") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">{{ __("Quý khách muốn thử loại xe nào?") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div  id="at_home" class="container tab-pane fade">
                                    <div class="form__select">
                                        <span class="title">{{ __("Xưng hô") }}</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="vocative">
                                            <ul class="dropdown-menu">
                                                <li id="male">{{ __("Anh") }}</li>
                                                <li id="female">{{ __("Female") }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__text">
                                        <span class="title">Họ & tên</span>
                                        <input type="text" name="name" placeholder="Điền họ & tên">
                                    </div>

                                    <div class="form__text">
                                        <span class="title">Số ĐT</span>
                                        <input type="text" name="phone" placeholder="Điền số điện thoại">
                                    </div>

                                    <div class="form__text">
                                        <span class="title">Email</span>
                                        <input type="text" name="email" placeholder="Điền email">
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Tỉnh thành</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>Tỉnh thành</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="province">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Quận/ Huyện</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>Quận/ Huyện</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Showroom</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>Showroom</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="showroom">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Xe đang sở hữu</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="your_car">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Quý khách đã sở hữu xe trong bao lâu</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Quý khách dự định mua xe khi nào?</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form__select">
                                        <span class="title">Quý khách muốn thử loại xe nào?</span>
                                        <div class="dropdown">
                                            <div class="select">
                                                <span>{{ __("Vui lòng chọn") }}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="district">
                                            <ul class="dropdown-menu">
                                                <li id="male">Male</li>
                                                <li id="female">Female</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="box-picture">
                            <img loading="lazy" src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}">
                        </div>
                    </div>

                    <div class="form-group form-check font15 font-pri reminder">
                        <input type="checkbox" id="html">
                        <label for="html">
                            {{ __("Tôi trên 18 tuổi và tôi có bằng lái xe B2 hợp lệ. *") }}
                        </label>
                    </div>
                    <div class="form-group form-check font15 font-pri">
                        <input type="checkbox" id="css">
                        <label for="css">
                            {{ __("Tôi theo đây đồng ý để THACO (và các công ty liên kết, đối tác của THACO) thu thập, sử dụng, hiệu chỉnh, lưu trữ, sao chép thông tin của tôi, cung cấp thông tin trên cho bên thứ ba có liên quan (bao gồm nhưng không giới hạn các công ty thuộc Tập đoàn BMW) nhằm mục đích chăm sóc khách hàng, gửi thiệp mời đến các sự kiện, các hoạt động tiếp thị, nghiên cứu và các mục đích thống kê khác giữa các đối tác hoặc công ty thành viên của tập đoàn BMW. Tôi cũng biết rằng thông tin cá nhân của tôi sẽ được sử dụng dựa trên luật bảo vệ sự riêng tư hiện hành.") }}
                        </label>
                    </div>
                    <div class="form-group form-check font15 font-pri">
                        <input type="checkbox" id="javascript">
                        <label for="javascript">
                            {{ __("Tôi cũng đồng ý để THACO (và các công ty liên kết, đối tác của THACO) liên hệ với tôi nhằm mục đích thực hiện chương trình quảng cáo chăm sóc khách hàng qua số điện thoại/ email và thông tin liên hệ khác mà tôi đã đăng ký (dù tôi đã đăng ký danh sách không quảng cáo hay không)") }}
                        </label>
                    </div>

                    <div class="form-submit font18">
                        <button class="btn-submit fontmb-small">
                            {{ __("Gửi đi") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>

</style>

<script>
    /*Dropdown Menu*/
    $('.dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu').slideUp(300);
    });
    $('.dropdown .dropdown-menu li').click(function () {
        $(this).parents('.dropdown').find('span').text($(this).text());
        $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    });

    /*End Dropdown Menu*/
    $('.dropdown-menu li').click(function () {
    var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
        msg = '<span class="msg">Hidden input value: ';
    $('.msg').html(msg + input + '</span>');
    });
</script>