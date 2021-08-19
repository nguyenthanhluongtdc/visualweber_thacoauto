<div id="introduce-page" class="font-pri">
    <div class="navbar-menu">
        <div class="container-remake">
            <ul class="nav font-pri-bold">
                @if(has_field($page, 'title_module_aboutus_introduce'))
                    <li class="nav-item" data-aos="fade-down">
                        <a href="#{{Illuminate\Support\Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}" title="Về THACO AUTO" class="click_scroll">
                            {{has_field($page, 'title_module_aboutus_introduce')}}
                        </a>
                    </li>
                @endif
                <li class="nav-item" data-aos="fade-down" data-aos-delay="300">
                    <a href="#section_two" title="Sản xuất - Kinh doanh ô tô & Cơ khí" class="click_scroll">
                        Sản xuất - Kinh doanh ô tô & Cơ khí
                    </a>
                </li>

                @if(has_field($page, 'title_module_value_introduce'))
                <li class="nav-item" data-aos="fade-down" data-aos-delay="600">
                    <a href="#{{Illuminate\Support\Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}" title="{!! has_field($page, 'title_module_value_introduce') !!}" class="click_scroll">
                        {!! has_field($page, 'title_module_value_introduce') !!}
                    </a>
                </li>
                @endif

                <li class="nav-item" data-aos="fade-down" data-aos-delay="900">
                    <a href="#section_four" title="Tổ chức" class="click_scroll">
                        Tổ chức
                    </a>
                </li>
                <li class="nav-item" data-aos="fade-down" data-aos-delay="1200">
                    <a href="#section_five" title="Văn hoá" class="click_scroll">
                        Văn hoá
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section-aboutus-wrapper">
        @if(has_field($page, 'image_module_aboutus_introduce'))
            <div class="section-aboutus__picture" data-aos="fade-right">
                <img class="mw-100" src="{{get_image_url(has_field($page, 'image_module_aboutus_introduce'))}}" alt="">
            </div>
        @endif
        <div class="container-remake">
            <div class="section-aboutus" id="{{Illuminate\Support\Str::slug(has_field($page, 'title_module_aboutus_introduce'), '_')}}">
                <div class="section-aboutus__content font20" data-aos="fade-down-right">
                    @if(has_field($page, 'title_module_aboutus_introduce'))
                        <h2 class="section-aboutus__content__title font-pri-bold font60 fontmb-large" >
                            {!! has_field($page, 'title_module_aboutus_introduce') !!}
                        </h2>
                    @endif
                    @if(has_field($page, 'content_module_aboutus_introduce'))
                        {!! has_field($page, 'content_module_aboutus_introduce') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="section-production-business-wrapper" id="section_two">
        <div class="container-remake">
            <div class="section-production-business">
                <h2 class="section-production-business__title font-pri-bold font60 fontmb-lả" data-aos="fade-right">
                    SẢN XUẤT - KINH DOANH Ô TÔ & CƠ KHÍ
                </h2>

                <div class="section-production-business__content">
                    <div class="section-production-business__content__row __row-top">
                        <div class="col-left" data-aos="fade-down">
                            <div class="box-main font20">
                                <div class="symbol">
                                    <img src="{{Theme::asset()->url('images/introduce/symbol6.png')}}" alt="">
                                </div>
                                <div class="company-name font17 font-pri-bold fontmb-small">
                                    THACO AUTO
                                </div>
                                <div class="name font40 font-pri-bold fontmb-middle">
                                    sản xuất
                                </div>
                                <p class="description fontmb-little">
                                    THACO là doanh nghiệp hàng đầu và có quy mô lớn nhất tại Việt Nam về lĩnh vực sản xuất lắp ráp ô tô, sản xuất linh kiện phụ tùng, lắp ráp ô tô, đến giao nhận vận chuyển và phân phối, bán lẻ.
                                </p>
                            </div>
                        </div>
                        <div class="col-right col-top font-pri-bold fontmb-medium">
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol11.png')}}" alt="">
                                    </div>
                                    <div class="name  fontmb-small">
                                        R&d 
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol2.png')}}" alt="">
                                    </div>
                                    <div class="name  fontmb-small">
                                        Sản xuất - Lắp ráp Ô tô & xe máy
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol1.png')}}" alt="">
                                    </div>
                                    <div class="name  fontmb-small">
                                        công nghiệp hỗ trợ & cơ khí
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol3.png')}}" alt="">
                                    </div>
                                    <div class="name  fontmb-small">
                                        xuất khẩu
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-production-business__content__row __row-bottom">
                        <div class="col-left" data-aos="fade-right">
                           <div class="box-main font20">
                                <div class="symbol">
                                    <img src="{{Theme::asset()->url('images/introduce/symbol5.png')}}" alt="">
                                </div>
                                <div class="company-name font17 font-pri-bold fontmb-small">
                                    THACO AUTO
                                </div>
                                <div class="name font40 font-pri-bold fontmb-middle">
                                    kinh doanh
                                </div>
                                <p class="description fontmb-little">
                                    Kinh doanh ô tô với chuỗi giá trị xuyên suốt từ nghiên cứu và phát triển sản phẩm đến Sản xuất - Phân phối - Bán lẻ, đáp ứng nhu cầu thị trường trong nước và xuất khẩu.
                                </p>
                           </div>
                        </div>
                        <div class="col-right col-bottom font-pri-bold fontmb-medium">
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol12.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe du lịch
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol10.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        Mô tô & Xe máy
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol9.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe tải
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol8.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe bus
                                    </div>
                                </div>
                            </div>
                            <div class="col-right__item" data-aos="zoom-in" data-aos-delay="400">
                                <div class="box-center">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol7.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        dịch vụ - phụ tùng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-system-value-wrapper font20" id="{{Illuminate\Support\Str::slug(has_field($page, 'title_module_value_introduce'), '_')}}">
        <div class="container-remake">
            <div class="section-system-value">
                @if(has_field($page, 'title_module_value_introduce'))
                    <h2 class="section-system-value__title text-uppercase font-pri-bold font60 fontmb-large" data-aos="fade-right">
                        {!! has_field($page, 'title_module_value_introduce') !!}
                    </h2>
                @endif

                @if(has_field($page, 'description_module_value_introduce'))
                    <p class="section-system-value__des" data-aos="fade-right">
                        {!! has_field($page, 'description_module_value_introduce') !!}
                    </p>
                @endif

                <div class="section-system-value__content">
                    <div class="section-system-value__content__left">
                        @forelse(has_field($page, 'repeat_content_module_value_introduce') as $row)
                            <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="title font30 font-pri-bold fontmb-medium">
                                    {!! has_sub_field($row, 'title') !!}
                                </h3>
                                <p class="description fontmb-little">
                                    {!! has_sub_field($row, 'description') !!}
                                </p>
                            </div>
                        @empty
                            <div class="__left__row" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="title font30 font-pri-bold fontmb-medium">
                                    Tầm nhìn
                                </h3>
                                <p class="description fontmb-little">
                                    Doanh nghiệp sản xuất – kinh doanh – xuất khẩu ô tô & cơ khí của Việt Nam, phát triển bền vững trong bối cảnh hội nhập khu vực và thế giới.
                                </p>
                            </div>
                        @endforelse
                    </div>
                    
                    @if(has_field($page, 'image_module_value_introduce'))
                        <div class="section-system-value__content__right" data-aos="fade-right">
                            <img src="{{get_image_url(has_field($page, 'image_module_value_introduce'))}}" alt="">
                        </div>
                    @endif
                </div>

                <div class="services-mobile font-pri-bold">
                    <div class="row">
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol12.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe du lịch
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol8.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe bus
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol9.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe tải
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="box">
                                    <div class="symbol">
                                        <img src="{{Theme::asset()->url('images/introduce/symbol10.png')}}" alt="">
                                    </div>
                                    <div class="name fontmb-small">
                                        xe chuyên dụng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-leader-room" id="section_four">
       <div class="container-remake">
            <h2 class="section-leader-room__title font-pri-bold font60 fontmb-large" data-aos="fade-right">
                ban lãnh đạo
            </h2>
            <div class="section-leader-room__row font20">
                <div class="section-leader-room__row__header" data-aos="zoom-in">
                    <span class="box font25 fontmb-small">
                        Hội đồng quản trị thaco auto
                    </span>
                </div>
                <div class="section-leader-room__row__content row">
                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="300">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="600">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="900">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-leader-room__row font20">
                <div class="section-leader-room__row__header" data-aos="zoom-in">
                    <span class="box font25 fontmb-small">
                        ban kiểm soát
                    </span>
                </div>
                <div class="section-leader-room__row__content row">
                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="900">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-leader-room__row font20">
                <div class="section-leader-room__row__header" data-aos="zoom-in">
                    <span class="box font25 fontmb-small">
                        Ban tổng giám đốc
                    </span>
                </div>
                <div class="section-leader-room__row__content row">
                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="900">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="900">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="__content__col col-xl-3 col-md-4 col-sm-6 col-12" data-aos="fade-down" data-aos-delay="900">
                        <div class="avatar">
                            <img src="{{Theme::asset()->url('images/introduce/symbol-person.png')}}" alt="">
                        </div>
                        <div class="header-profile">
                            <strong class="name font25 fontmb-medium">
                                họ tên
                            </strong>
                            <p class="rote fontmb-majority">
                                <span>
                                    Chức danh
                                </span>
                                {{-- <span>
                                    :
                                </span>
                                <span>
                                    GIÁM ĐỐC
                                </span> --}}
                            </p>
                        </div>
                        <div class="more-info fontmb-majority">
                            <p>
                                <span>
                                    Sinh năm
                                </span>
                                <span>
                                    :
                                </span>
                                <span>
                                    **/**/****
                                </span>
                            </p>
                            <p>
                                <span>Nơi sinh </span>
                                <span>
                                    :
                                </span>
                            </p>
                            <p>
                                <span>
                                    Trình độ
                                </span>
                                <span>
                                    :
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

    <div class="section-behave-wrapper font20" id="section_five">
        <div class="container-remake">
            <div class="section-behave">
                <div class="section-behave__left">
                    <h2 class="section-behave__title font60 font-pri-bold fontmb-middle" data-aos="fade-right">
                        văn hóa ứng xử
                    </h2>
                    <div class="section-behave__des" data-aos="fade-right">
                        <p>
                            Quá trình phát triển của THACO AUTO là thành quả của nỗ lực vượt khó, tự tin, trí tuệ, kỷ luật và ý chí, nghị lực của người sáng lập cùng với đội ngũ nhân sự có thái độ làm việc tích cực, ý thức đóng góp cống hiến đã hình thành nên Văn hóa này.
                        </p>
                        <p>
                            Xây dựng môi trường làm việc “Văn hóa & thuận tiện”. Bên cạnh đặc trưng văn hóa THACO là: Kỷ luật, Nhân văn, Trung thực, Năng động, Sáng Tạo; Tận tâm phục vụ chính là yếu tố tiên quyết hàng đầu.
                        </p>
                    </div>
                </div>
                <div class="section-behave__right" data-aos="zoom-in">
                    <h2 class="right-title font-pri-bold fontmb-large" data-aos="fade-right">
                        văn hóa
                    </h2>
                    <img src="{{Theme::asset()->url('images/introduce/layer1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="section-criteria-wrapper font20">
        <div class="container-remake">
            <div class="section-criteria">
                <div class="section-criteria__header">
                    <h2 class="section-criteria__header__title font60 font-pri-bold fontmb-middle" data-aos="fade-right">
                        Tiêu chí 8T
                    </h2>
                    <p class="section-criteria__headers__des" data-aos="fade-right">
                        “Tiêu chí 8 chữ T” là những tiêu chí vàng đóng vai trò cốt lõi trong Văn hóa Thaco, hỗ trợ cho quá trình rèn luyện, tự kỷ luật và hoàn thiện bản thân của mỗi con người Thaco. Đây được xem như là những tiêu chí mà mỗi CB.CNV phấn đấu đạt đến để góp phần tạo nên thương hiệu Thaco tiêu biểu cho nền công nghiệp ô tô của đất nước. 
                    </p>
                </div>

                <div class="section-criteria__content justify-content-end row-first">
                    <div class="section-criteria__content__box" data-aos="fade-up" >
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shap1.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/love1.png')}}" alt="">
                                    <div class="name">
                                        TẬN TÂM 
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="300">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape2.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon2.png')}}" alt="">
                                    <div class="name">
                                        TRUNG THỰC
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="600">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape3.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon6.png')}}" alt="">
                                    <div class="name">
                                        TRÍ TUỆ
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="900">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape4.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon8.png')}}" alt="">
                                    <div class="name">
                                        TỰ TIN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    1
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/love1.png')}}" alt="">
                                    <div class="name">
                                        TẬN TÂM 
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    2
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon2.png')}}" alt="">
                                    <div class="name">
                                        TRUNG THỰC
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    3
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon6.png')}}" alt="">
                                    <div class="name">
                                        TRÍ TUỆ
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    4
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon8.png')}}" alt="">
                                    <div class="name">
                                        TỰ TIN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="section-criteria__content justify-content-start">
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="1200">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape5.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon4.png')}}" alt="">
                                    <div class="name">
                                        TÔN TRỌNG  
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="1500">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape6.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon7.png')}}" alt="">
                                    <div class="name">
                                        TRUNG TÍN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="1800">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape7.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon3.png')}}" alt="">
                                    <div class="name">
                                        TẬN TÌNH
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-criteria__content__box" data-aos="fade-up" data-aos-delay="2100">
                        <div class="box-center-bark">
                            <img src="{{Theme::asset()->url('images/introduce/shape8.png')}}" alt="">
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon5.png')}}" alt="">
                                    <div class="name">
                                        THUẬN TIỆN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    5
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon4.png')}}" alt="">
                                    <div class="name">
                                        TÔN TRỌNG 
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    6
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon7.png')}}" alt="">
                                    <div class="name">
                                        TRUNG TÍN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    7
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon3.png')}}" alt="">
                                    <div class="name">
                                        TẬN TÌNH
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-criteria__content__box">
                        <div class="box-center-bark">
                            <div class="word-art">
                                <span>
                                    8
                                </span>
                            </div>
                            <div class="defect-shape">
                                <div class="box-center">
                                    <img src="{{Theme::asset()->url('images/introduce/icon5.png')}}" alt="">
                                    <div class="name">
                                        THUẬN TIỆN
                                    </div>
                                    <div class="des">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="slider-video" data-aos="fade-right" data-aos-delay="300">
        <div class="swiper-container video-introduce">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                    <div class="btn-play">
                        <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                    <div class="btn-play">
                        <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div> --}}

    <div class="splide splide_video">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide" data-splide-youtube="https://www.youtube.com/watch?v=cdz__ojQOuU">
                    <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                    <div class="btn-play">
                        <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                    </div>
                    <div class="header_video">
                        <div class="name font30 font-pri-bold">
                            Bài hát Chu Lai - Trường Hải ca
                        </div>
                        <div class="conposed font25 font-pri">
                            Sáng tác Trần Quế Sơn
                        </div>
                    </div>
                </li>
                <li class="splide__slide" data-splide-youtube="https://www.youtube.com/watch?v=cdz__ojQOuU">
                    <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                    <div class="btn-play">
                        <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                    </div>
                    <div class="header_video ">
                        <div class="name font30 font-pri-bold">
                            Bài hát Chu Lai - Trường Hải ca
                        </div>
                        <div class="conposed font25 font-pri">
                            Sáng tác Trần Quế Sơn
                        </div>
                    </div>
                </li>
                <li class="splide__slide" data-splide-youtube="https://www.youtube.com/watch?v=cdz__ojQOuU">
                    <img src="{{Theme::asset()->url('images/introduce/video.jpg')}}" alt="">
                    <div class="btn-play">
                        <img src="{{Theme::asset()->url('images/introduce/btn-play.png')}}" alt="">
                    </div>
                    <div class="header_video">
                        <div class="name font30 font-pri-bold">
                            Bài hát Chu Lai - Trường Hải ca
                        </div>
                        <div class="conposed font-pri font25">
                            Sáng tác Trần Quế Sơn
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script>
    $(document).ready(function() {
        new Splide( '.splide_video', {
            type  : 'fade',
            rewind: true,
            height: '58.125rem',
            breakpoints: {
                1680: {
                    height : '50rem',
                },
                1360: {
                    height : '40rem',
                },
                992: {
                    height : '30rem',
                }, 576: {
                    height : '18rem',
                }
            }
        } ).mount();
    })
</script>