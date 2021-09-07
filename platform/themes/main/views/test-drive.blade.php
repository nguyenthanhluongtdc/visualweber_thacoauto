@if(isset($car) && !blank($car))
    <div id="test-drive-page">
        <div class="section-main-wrapper">
            <div class="container-remake d-md-block">
                <div class="section-main">
                    {{-- @if(session()->has('message') || session()->has('type') || isset($errors))
                        @if (session()->has('type') && session('type')=='success')
                            <div class="alert alert-success font-helve-light font18 mt-2">
                                <p>{{ session('message') }}</p>
                            </div>
                        @endif
                        @if (session()->has('type') && session('type')=='error')
                            <div class="alert alert-danger font-helve-light font18 mt-2">
                                <p>{{ session('message') }}</p>
                            </div>
                        @endif
                        @if (isset($errors) && count($errors))
                            <div class="alert alert-danger font-helve-light font18">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span> <br>
                                @endforeach
                            </div>
                        @endif
                    @endif --}}
                    <form action="{{ route('public.test-drive.post-test-driver') }}" class="form" method="POST">
                        @csrf
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
                                        <button class="nav-link active fontmb-medium" data-toggle="tab" data-type="at_showroom" href="#at_showroom">
                                            {{ __("Đăng ký lái thử tại Showroom") }}
                                        <div class="bottom-line mt-1"></div>
                                    </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fontmb-medium" data-toggle="tab" data-type="at_home" href="#at_home">
                                            {{ __("Đăng ký lái thử tại nhà") }}
                                            <div class="bottom-line mt-1"></div>
                                        </button>
                                    </li>
                                </ul>
                                <input required name="type_register" value="at_showroom" class="d-none" id="type-register-input" />
                                <div class="tab-content font-pri content" id="myTabContent">
                                    <div id="at_showroom" class="container tab-pane active">
                                        <div class="form__select">
                                            <span class="title">{{ __("Xưng hô") }}</span>
                                            <select id="vocative" required name="vocative"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui lòng chọn") }}</option>
                                                <option value="male" {{ old('vocative') == "male" ? "selected" : "" }}>{{ __('Anh') }}</option>
                                                <option value="female" {{ old('vocative') == "female" ? "selected" : "" }}>{{ __('Chị') }}</option>
                                            </select>
                                        </div>

                                        <div class="form__text">
                                            <span class="title">{{ __('Họ & tên') }}</span>
                                            <input type="text" required name="name" value="{{ old('name') }}" placeholder="{{ __('Điền họ & tên') }}">
                                        </div>
                                        @error('name')
                                            <p class="text-danger">
                                                {!! $message !!}
                                            </p>
                                        @enderror

                                        <div class="form__text">
                                            <span class="title">{{ __("Số ĐT") }}</span>
                                            <input type="text" required name="phone" value="{{ old('phone') }}"  placeholder="{{ __("Điền số điện thoại") }}">
                                        </div>
                                        @error('phone')
                                            <p class="text-danger">
                                                {!! $message !!}
                                            </p>
                                        @enderror

                                        <div class="form__text">
                                            <span class="title">{{ __("Email") }}</span>
                                            <input type="text" required name="email" value="{{ old('email') }}" placeholder="{{ __("Điền email") }}">
                                        </div>
                                        @error('email')
                                            <p class="text-danger">
                                                {!! $message !!}
                                            </p>
                                        @enderror

                                        <div class="form__select">
                                            <span class="title">{{ __("Tỉnh/Thành phố") }}</span>
                                            <select id="province" required name="province_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Tỉnh/Thành phố") }}</option>
                                                @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                                                    <option value="{{ $key }}" {{ old('province_id') == $key ? "selected" : "" }}>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Quận/ Huyện") }}</span>
                                            <select id="district" required name="district_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Quận/ Huyện") }}</option>
                                                {{-- @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Showroom") }}</span>
                                            <select id="showroom" required name="showroom_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Showroom") }}</option>
                                                {{-- @foreach (collect() as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Xe đang sở hữu") }}</span>
                                            <select id="brand" required name="brand_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui lòng chọn") }}</option>
                                                @foreach (get_brands() ?? collect() as $item)
                                                    <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Quý khách đã sở hữu xe trong bao lâu") }}</span>
                                            <select id="time" required name="time"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui lòng chọn") }}</option>
                                                <option value="1" {{ old('time') == "1" ? "selected" : "" }}>{{ '1 '. __('Year') }}</option>
                                                <option value="2" {{ old('time') == "2" ? "selected" : "" }}>{{ '2 '.__('Year') }}</option>
                                                <option value="5" {{ old('time') == "5" ? "selected" : "" }}>{{ '5 '.__('Year') }}</option>
                                                <option value="more_5" {{ old('time') == "more_5" ? "selected" : "" }}>{{ __("Nhiều hơn 5 năm") }}</option>
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Quý khách dự định mua xe khi nào?") }}</span>
                                            <select id="want_to_buy" name="want_to_buy_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui lòng chọn") }}</option>
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Quý khách muốn thử loại xe nào?") }}</span>
                                            <select id="test_drive" name="test_drive_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui lòng chọn") }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-picture">
                                <img loading="lazy" src="{{ RvMedia::getImageUrl($car->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $car->name }}">
                            </div>
                        </div>

                        <div class="form-group form-check font15 font-pri reminder">
                            <input type="checkbox" required checked id="html" name="provision1">
                            <label for="html">
                                {{ __("Tôi trên 18 tuổi và tôi có bằng lái xe B2 hợp lệ. *") }}
                            </label>
                        </div>
                        <div class="form-group form-check font15 font-pri">
                            <input type="checkbox" required checked id="css" name="provision2">
                            <label for="css">
                                {{ __("Tôi theo đây đồng ý để THACO (và các công ty liên kết, đối tác của THACO) thu thập, sử dụng, hiệu chỉnh, lưu trữ, sao chép thông tin của tôi, cung cấp thông tin trên cho bên thứ ba có liên quan (bao gồm nhưng không giới hạn các công ty thuộc Tập đoàn BMW) nhằm mục đích chăm sóc khách hàng, gửi thiệp mời đến các sự kiện, các hoạt động tiếp thị, nghiên cứu và các mục đích thống kê khác giữa các đối tác hoặc công ty thành viên của tập đoàn BMW. Tôi cũng biết rằng thông tin cá nhân của tôi sẽ được sử dụng dựa trên luật bảo vệ sự riêng tư hiện hành.") }}
                            </label>
                        </div>
                        <div class="form-group form-check font15 font-pri">
                            <input type="checkbox" required checked id="javascript" name="provision3">
                            <label for="javascript">
                                {{ __("Tôi cũng đồng ý để THACO (và các công ty liên kết, đối tác của THACO) liên hệ với tôi nhằm mục đích thực hiện chương trình quảng cáo chăm sóc khách hàng qua số điện thoại/ email và thông tin liên hệ khác mà tôi đã đăng ký (dù tôi đã đăng ký danh sách không quảng cáo hay không)") }}
                            </label>
                        </div>

                        @if($errors->has('provision1') || $errors->has('provision2') || $errors->has('provision3'))
                            <p class="text-danger mt-3"> {!! __('* Vui lòng đồng ý với các điều khoản trên để tiếp tục') !!} </p>
                        @endif

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
@endif

<script>
    window.__urlAjaxDistrict = `{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.test-drive.get-district')) }}`
    window.__urlAjaxShowroom = `{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.test-drive.get-showroom')) }}`
    window.__urlAjaxCar = `{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.test-drive.get-car')) }}`

    $(document).ready(function() {
        $(document).on('change', '#province', async function() {
            const value = $(this).val()
            await changeDistrict(value)
            await changeShowroom(value)
        })

        async function changeDistrict(value) {
            const response = await $.get(window.__urlAjaxDistrict, {
                state_id: value
            })

            const { data } = response.data
            if(data instanceof Array) {
                let result = data.map((el, index) => `<option value="${el.id}" selected>${ el.name }</option>`)
                $('#district').html(result.join("")).trigger('change')
            }
        }

        $(document).on('change', '#showroom', async function() {
            const value = $(this).val()
            await changeCar(value)
        })

        async function changeShowroom(value) {
            const response = await $.get(window.__urlAjaxShowroom, {
                state_id: value
            })

            const { data } = response.data
            if(data instanceof Array) {
                let result = data.map((el, index) => `<option value="${el.id}" selected>${ el.name }</option>`)
                $('#showroom').html(result.join("")).trigger('change')
            }
        }

        async function changeCar(value) {
            const response = await $.get(window.__urlAjaxCar, {
                showroom_id: value
            })

            const { data } = response.data
            if(data instanceof Array) {
                let result = data.map((el, index) => `<option value="${el.id}" selected>${ el.name }</option>`)
                $('#want_to_buy').html(result.join("")).trigger('change')
                $('#test_drive').html(result.join("")).trigger('change')
            }
        }
    })
</script>