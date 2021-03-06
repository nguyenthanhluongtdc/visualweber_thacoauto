@if(isset($car) && !blank($car))
    <div id="test-drive-page">
        <div class="section-main-wrapper">
            <div class="container-remake d-md-block">
                <div class="section-main">
                    @if(session()->has('message') || session()->has('type') || isset($errors))
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
                    @endif
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
                                            {{ __("????ng k?? l??i th??? t???i Showroom") }}
                                        <div class="bottom-line mt-1"></div>
                                    </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fontmb-medium" data-toggle="tab" data-type="at_home" href="#at_home">
                                            {{ __("????ng k?? l??i th??? t???i nh??") }}
                                            <div class="bottom-line mt-1"></div>
                                        </button>
                                    </li>
                                </ul>
                                <input required name="type_register" value="at_showroom" class="d-none" id="type-register-input" />
                                <div class="tab-content font-pri content" id="myTabContent">
                                    <div id="at_showroom" class="container tab-pane active">
                                        <div class="form__select">
                                            <span class="title">{{ __("X??ng h??") }}</span>
                                            <select id="vocative" required name="vocative"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui l??ng ch???n") }}</option>
                                                <option value="male" {{ old('vocative') == "male" ? "selected" : "" }}>{{ __('Anh') }}</option>
                                                <option value="female" {{ old('vocative') == "female" ? "selected" : "" }}>{{ __('Ch???') }}</option>
                                            </select>
                                        </div>

                                        <div class="form__text">
                                            <span class="title">{{ __('H??? & t??n') }}</span>
                                            <input type="text" required name="name" value="{{ old('name') }}" placeholder="{{ __('??i???n h??? & t??n') }}">
                                        </div>

                                        <div class="form__text">
                                            <span class="title">{{ __("S??? ??T") }}</span>
                                            <input type="text" required name="phone" value="{{ old('phone') }}"  placeholder="{{ __("??i???n s??? ??i???n tho???i") }}">
                                        </div>

                                        <div class="form__text">
                                            <span class="title">{{ __("Email") }}</span>
                                            <input type="text" required name="email" value="{{ old('email') }}" placeholder="{{ __("??i???n email") }}">
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("T???nh/Th??nh ph???") }}</span>
                                            <select id="province" required name="province_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("T???nh/Th??nh ph???") }}</option>
                                                @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                                                    <option value="{{ $key }}" {{ old('province_id') == $key ? "selected" : "" }}>{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Qu???n/ Huy???n") }}</span>
                                            <select id="district" required name="district_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Qu???n/ Huy???n") }}</option>
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
                                            <span class="title">{{ __("Xe ??ang s??? h???u") }}</span>
                                            <select id="brand" required name="brand_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui l??ng ch???n") }}</option>
                                                @foreach (get_brands() ?? collect() as $item)
                                                    <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Qu?? kh??ch ???? s??? h???u xe trong bao l??u") }}</span>
                                            <select id="time" required name="time"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui l??ng ch???n") }}</option>
                                                <option value="1" {{ old('time') == "1" ? "selected" : "" }}>{{ '1 '. __('Year') }}</option>
                                                <option value="2" {{ old('time') == "2" ? "selected" : "" }}>{{ '2 '.__('Year') }}</option>
                                                <option value="5" {{ old('time') == "5" ? "selected" : "" }}>{{ '5 '.__('Year') }}</option>
                                                <option value="more_5" {{ old('time') == "more_5" ? "selected" : "" }}>{{ __("Nhi???u h??n 5 n??m") }}</option>
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Qu?? kh??ch d??? ?????nh mua xe khi n??o?") }}</span>
                                            <select id="want_to_buy" name="want_to_buy_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui l??ng ch???n") }}</option>
                                            </select>
                                        </div>

                                        <div class="form__select">
                                            <span class="title">{{ __("Qu?? kh??ch mu???n th??? lo???i xe n??o?") }}</span>
                                            <select id="test_drive" name="test_drive_id"
                                                class="font20 font-mi-cond js-example-disabled-results">
                                                <option selected disabled>{{ __("Vui l??ng ch???n") }}</option>
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
                            <input type="checkbox" required checked id="html">
                            <label for="html">
                                {{ __("T??i tr??n 18 tu???i v?? t??i c?? b???ng l??i xe B2 h???p l???. *") }}
                            </label>
                        </div>
                        <div class="form-group form-check font15 font-pri">
                            <input type="checkbox" required checked id="css">
                            <label for="css">
                                {{ __("T??i theo ????y ?????ng ?? ????? THACO (v?? c??c c??ng ty li??n k???t, ?????i t??c c???a THACO) thu th???p, s??? d???ng, hi???u ch???nh, l??u tr???, sao ch??p th??ng tin c???a t??i, cung c???p th??ng tin tr??n cho b??n th??? ba c?? li??n quan (bao g???m nh??ng kh??ng gi???i h???n c??c c??ng ty thu???c T???p ??o??n BMW) nh???m m???c ????ch ch??m s??c kh??ch h??ng, g???i thi???p m???i ?????n c??c s??? ki???n, c??c ho???t ?????ng ti???p th???, nghi??n c???u v?? c??c m???c ????ch th???ng k?? kh??c gi???a c??c ?????i t??c ho???c c??ng ty th??nh vi??n c???a t???p ??o??n BMW. T??i c??ng bi???t r???ng th??ng tin c?? nh??n c???a t??i s??? ???????c s??? d???ng d???a tr??n lu???t b???o v??? s??? ri??ng t?? hi???n h??nh.") }}
                            </label>
                        </div>
                        <div class="form-group form-check font15 font-pri">
                            <input type="checkbox" required checked id="javascript">
                            <label for="javascript">
                                {{ __("T??i c??ng ?????ng ?? ????? THACO (v?? c??c c??ng ty li??n k???t, ?????i t??c c???a THACO) li??n h??? v???i t??i nh???m m???c ????ch th???c hi???n ch????ng tr??nh qu???ng c??o ch??m s??c kh??ch h??ng qua s??? ??i???n tho???i/ email v?? th??ng tin li??n h??? kh??c m?? t??i ???? ????ng k?? (d?? t??i ???? ????ng k?? danh s??ch kh??ng qu???ng c??o hay kh??ng)") }}
                            </label>
                        </div>

                        <div class="form-submit font18">
                            <button class="btn-submit fontmb-small">
                                {{ __("G???i ??i") }}
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