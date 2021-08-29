<section class="section-car-filter">
    <div class="car-filter container-remake">
        <h2 class="car-filter__title-mobile font30 font-mi-bold">{{ __("Kiểu dáng xe") }}</h2>
    </div>
    <div class="car-filter--top-mobile">
        <ul class="car-model font18 font-pri ">
            <li class="car-model__item {{ request('car_line', '') == '' ? 'active' : ''  }}">
                <span>{{ __('Tất cả') }}</span>
            </li>
            @foreach (get_car_lines() ?? collect() as $item)
                <li class="car-model__item" {{ request('car_line', '') == $item->id ? 'active' : ''  }}>
                    <span class="text-uppercase">{{ $item->name }}</span>
                </li>
            @endforeach
        </ul>
        <a href="#" class="font18 font-pri pre-order desktop">{{ __("PRE-ORDER") }}</a>
    </div>
    <div class="container-remake">
        <form action="">
            <div class="car-filter">
                <h2 class="car-filter__title font30 font-mi-bold text-uppercase">{{ __("Kiểu dáng xe") }}</h2>
            </div>
            <div class="car-filter--top">
                <ul class="car-model font18 font-pri car-model">
                    <li class="car-model__item {{ request('car_line', '') == '' ? 'active' : ''  }}">
                        <span>{{ __('Tất cả') }}</span>
                    </li>
                    @foreach (get_car_lines() ?? collect() as $item)
                        <li class="car-model__item" {{ request('car_line', '') == $item->id ? 'active' : ''  }}>
                            <span class="text-uppercase">{{ $item->name }}</span>
                        </li>
                    @endforeach
                </ul>
                <a href="#" class="font18 font-pri pre-order desktop text-uppercase">{{ __("PRE-ORDER") }}</a>
            </div>

            <div class="car-filter--center">
                <select class="provinces-select2 font18 font-pri" name="" id="">
                    <option value="">TP. HỒ CHÍ MINH</option>
                    <option value="">HÀ NỘI</option>
                </select>
                <div class="slider-range">
                    <div class="slider-range__value font18 font-pri">
                        <span>Đến: </span>
                        <span class="filter-value"></span>đ
                    </div>
                    <div class="slider-range__frame">
                        <span class="slider-range__line"></span>
                        <input type="range" min="100000000" max="20000000000" step="50000000" value="50000000" class="slider" id="myRange">
                    </div>
                </div>

            </div>
            <div class="row_pre-order mobile">
                <a href="#" class="font18 font-pri pre-order ml-auto text-uppercase">{{ __("PRE-ORDER") }}</a>
            </div>
            <div class="car-filter--bottom position-relative">
                <button type="button" class="modal-button btn-join">
                    <span class="frame text-uppercase">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/filter.png')}}" alt="filter icon">
                        {{ __("BỘ LỌC NÂNG CAO") }}
                    </span>
                </button>

                <div class="overlay">
                    <div class="row-filter">
                        <input type="hidden" name="production">
                        <div class="row-filter__title font25">
                            Công suất
                        </div>
                        <div class="row-filter__content row">
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            86Hp
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            90Hp
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            100Hp
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            110Hp
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            120Hp
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-6 item">
                                    <a href="" class="col-filter">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            130Hp
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="equipment">
                        <div class="row-filter__title font25">
                        Trang bị
                        </div>
                        <div class="row-filter__content row">
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Đèn pha tự động
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Đèn cửa kính mạ Crom
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Gạt mưa tự động
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Đèn chào
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Hệ thống chống trộm
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name2 font25">
                                        Túi khí
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="color">
                        <div class="row-filter__title font25">
                        Màu sơn
                        </div>
                        <div class="row-filter__content row">

                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Đen
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter active">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Trắng
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Xám
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="engine">
                        <div class="row-filter__title font25">
                        Động cơ
                        </div>
                        <div class="row-filter__content row">

                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        1.8
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter active">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        2.4
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        3.0
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="fuel">
                        <div class="row-filter__title font25">
                        Nhiên liệu
                        </div>
                        <div class="row-filter__content row">

                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter active">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Xăng
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Dầu
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="gear">
                        <div class="row-filter__title font25">
                        Hộp số
                        </div>
                        <div class="row-filter__content row">

                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter active">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Số sàn
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-6 item">
                                <a href="" class="col-filter">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        Tự động
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        Array.from(document.getElementsByClassName('col-filter')).forEach(function(element){
            element.onclick =(e)=> {
                e.preventDefault();
                element.classList.toggle('active');
            }
        })

        const button = document.querySelector(".btn-join");
        const modal = document.querySelector(".overlay");

        button.addEventListener("click",function(){
            modal.classList.toggle("active");
        })

        document.body.addEventListener("click",function(e){
            if(e.target.classList[0]=="overlay") {
                modal.style.display="none"
            }
        })
    })
</script>