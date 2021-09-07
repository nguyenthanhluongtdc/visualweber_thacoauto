@php
    $request = request()->all();
    $indexCarInRequest = array_search('car',array_keys($request));
    if($indexCarInRequest){
        $requestUnsetCar = array_splice($request,$indexCarInRequest,1);
    }
    $request = array_merge($request,['slug' => $slug->key]);
@endphp
<section class="section-car-filter overflow-x-hidden">
    <div class="car-filter container-remake">
        <h2 class="car-filter__title text-uppercase fontmb-large font30 font-mi-bold">{{ __("Kiểu dáng xe") }}</h2>
    </div>
    <div class="car-filter--top-mobile">
        <div class="container-remake">
            <ul class="car-model font18 font-pri ">
                <li class="car-model__item {{ request('vehicle', '') == '' ? 'active' : ''  }}">
                    <a href="{{route('public.brand.index',[
                            'slug' => $slug->key,
                        ])}}" class="text-uppercase">{{ __('Tất cả') }}</a>
                </li>
                @foreach (get_vehicles($slug ? $slug->key : null) ?? collect() as $item)
                    <li class="car-model__item {{ request('vehicle', '') == $item->name ? 'active' : ''  }} ">
                        <a href="{{route('public.brand.index',[
                            'slug' => $slug->key,
                            'vehicle'=>$item->slug
                        ])}}" class="text-uppercase">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="font18 font-pri pre-order desktop">{{ __("PRE-ORDER") }}</a>
        </div>
    </div>
    <div class="container-remake">
            {{-- <div class="car-filter">
                <h2 class="car-filter__title font30 font-mi-bold text-uppercase">{{ __("Kiểu dáng xe") }}</h2>
            </div> --}}
            <div class="car-filter--top">
                <ul class="car-model font18 font-pri car-model">
                    <li class="car-model__item {{ request('vehicle', '') == '' ? 'active' : ''  }}">
                        <a href="{{route('public.brand.index',[
                        'slug' => $slug->key,
                        ])}}" class="text-uppercase">{{ __('Tất cả') }}</a>
                    </li>
                    @foreach (get_vehicles($slug ? $slug->key : null) ?? collect() as $item)
                        <li class="car-model__item {{ request('vehicle', '') == $item->name ? 'active' : ''  }}">
                            <a href="{{route('public.brand.index',[
                                'slug' => $slug->key,
                                'vehicle'=>$item->slug
                            ])}}" class="text-uppercase">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <a href="#" class="font18 font-pri pre-order desktop text-uppercase">{{ __("PRE-ORDER") }}</a>
            </div>

            <div class="car-filter--center">
                <form id="formPrice" class="d-flex flex-column" method="GET" action="{{route('public.brand.index',['slug'=>$slug->key])}}">
                    @if(request()->all())
                        @forelse(request()->all() as $key=>$input)
                            @if(!in_array($key,['price','country']))
                                <input type="hidden" name="{{$key}}" value="{{$input}}">
                            @endif
                        @empty
                        @endforelse
                    @endif
                    
                    {{-- Showroom --}}
                    <div class="d-flex">
                        <div class="mr-sm-5 mr-2">
                            <select class="font18 font-pri country selectjs d-none" name="country" onchange="submitFormPrice(this)"style="width:200px;">
                                <option selected disabled>{{ __("Công ty tỉnh thành") }}</option>
                                @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                                    <option {{ intval(request('country', -1)) == $key ? 'selected' : '' }}  value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="slider-range mb-3 ml-0">
                            <div class="slider-range__value font18 font-pri">
                                <span>Đến: </span>
                                <span class="filter-value">{{request()->get('price') ? request()->get('price') : '100000000'}}</span>đ
                            </div>
                            <div class="slider-range__frame">
                            <span class="slider-range__line"></span>
                                <input name="price" type="range" min="100000000" max="20000000000" step="50000000" value="{{request()->get('price')}}" class="slider" id="myRange" onchange="submitFormPrice(this)">
                            </div>
                        </div>
                    </div>
                    @if(request()->get('country'))
                        <div class="row__country">
                            <select class="font18 font-pri showroom selectjs js-example-responsive" name="showroom" onchange="submitFormPrice(this)" style="width: 200px;">
                                <option selected disabled>{{ __("Đại lý") }}</option>
                                @foreach (get_showroom_by_state(request()->get('country'),$slug->key ?? '',request()->get('vehicle')) ?? collect() as $key => $item)
                                    <option {{ intval(request('showroom', -1)) == $item->slug ? 'selected' : '' }}  value="{{ $item->slug }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    {{-- End --}}

            </form>
            </div>
            <div class="row_pre-order mobile">
                <a href="#" class="font18 font-pri pre-order ml-auto text-uppercase">{{ __("PRE-ORDER") }}</a>
            </div>
            <div class="car-filter--bottom position-relative">
                {{-- <button type="button" class="modal-button btn-join">
                    <span class="frame text-uppercase">
                        <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/filter.png')}}" alt="filter icon">
                        {{ __("BỘ LỌC NÂNG CAO") }}
                    </span>
                </button> --}}
                <a data-fancybox data-src="#modal-filter" href="javascript:;" class="modal-button"><span class="frame text-uppercase">
                    <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/filter.png')}}" alt="filter icon">
                    <p>{{ __("BỘ LỌC NÂNG CAO") }}</p>
                </span></a>
                <div class="overlay-filter" id="modal-filter">
                    <div class="row-filter">
                        <input type="hidden" name="production">
                        <div class="row-filter__title font25">
                            Công suất
                        </div>
                        <div class="row-filter__content row">
                            @forelse(get_horse_power_by_brand_and_vehicle($slug->key,request()->get('vehicle')) as $key=>$value)
                                @php
                                    $request_merge = $request;
                                    if(array_search($value,$request_merge)){
                                        $index = array_search('horse_power',array_keys($request_merge));
                                        if($index !== false){
                                            array_splice($request_merge,$index,1);
                                        }
                                    }else{
                                        $request_merge = array_merge($request_merge,['horse_power'=>$value]);
                                    }
                                @endphp
                                <div class="col-sm-4 col-6 item">
                                    <a href="{{
                                        route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($value,$request) ? 'active' : ''}}">
                                        <div class="symbol">
                                            <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            {{$value}}HP
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="equipment">
                        <div class="row-filter__title font25">
                        Trang bị
                        </div>
                        <div class="row-filter__content row">
                            @forelse(get_equipment_by_brand_and_vehicle($slug->key,request()->get('vehicle')) as $key=>$value)
                                @php
                                    $request_merge = $request;
                                    if(array_search($value->slug,$request_merge)){
                                        $index = array_search('vehicle',array_keys($request_merge));
                                        if($index !== false){
                                            array_splice($request_merge,$index,1);
                                        }
                                    }else{
                                        $request_merge = array_merge($request_merge,['vehicle'=>$value->slug]);
                                    }
                                @endphp
                                <div class="col-sm-4 col-6 item">
                                    <a href="{{
                                        route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($value->slug,$request) ? 'active' : ''}}">
                                        <div class="symbol">
                                            <img src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            {{$value->name}}
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="color">
                        <div class="row-filter__title font25">
                        Màu sơn
                        </div>
                        <div class="row-filter__content row">
                            @forelse(get_color_by_brand_and_vehicle($slug->key,request()->get('color')) as $key=>$value)
                            @php
                                $request_merge = $request;
                                if(array_search($value->code,$request_merge)){
                                    $index = array_search('color',array_keys($request_merge));
                                    if($index !== false){
                                        array_splice($request_merge,$index,1);
                                    }
                                }else{
                                    $request_merge = array_merge($request_merge,['color'=>$value->code]);
                                }
                            @endphp
                            <div class="col-sm-4 col-6 item">
                                <a href="{{
                                    route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($value->code,$request) ? 'active' : ''}}">
                                    <div class="symbol">
                                        <img loading="lazy" src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                    </div>
                                    <div class="name font25">
                                        {{$value->name}}
                                    </div>
                                </a>
                            </div>
                        @empty
                        @endforelse
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="engine">
                        <div class="row-filter__title font25">
                        Động cơ
                        </div>
                        <div class="row-filter__content row">
                            @forelse(get_engine_by_brand_and_vehicle($slug->key,request()->get('engine')) as $key=>$value)
                                @php
                                    $request_merge = $request;
                                    if(array_search($value,$request_merge)){
                                        $index = array_search('engine',array_keys($request_merge));
                                        if($index !== false){
                                            array_splice($request_merge,$index,1);
                                        }
                                    }else{
                                        $request_merge = array_merge($request_merge,['engine'=>$value]);
                                    }
                                @endphp
                                <div class="col-sm-4 col-6 item">
                                    <a href="{{
                                        route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($value,$request) ? 'active' : ''}}">
                                        <div class="symbol">
                                            <img src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            {{$value}}
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="fuel">
                        <div class="row-filter__title font25">
                        Nhiên liệu
                        </div>
                        <div class="row-filter__content row">
                            @forelse(config('base.fuel_types') as $key=>$gear)
                                @php
                                    $request_merge = $request;
                                    if(array_search($key,$request_merge)){
                                        $index = array_search('fuel_type',array_keys($request_merge));
                                        if($index !== false){
                                            array_splice($request_merge,$index,1);
                                        }
                                    }else{
                                        $request_merge = array_merge($request_merge,['fuel_type'=>$key]);
                                    }
                                @endphp
                                <div class="col-sm-4 col-6 item">
                                    <a href="{{route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($key,$request) ? 'active' : ''}}">
                                        <div class="symbol">
                                            <img src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            {{trans($gear)}}
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="row-filter">
                        <input type="hidden" name="gear">
                        <div class="row-filter__title font25">
                        Hộp số
                        </div>
                        <div class="row-filter__content row">
                            @forelse(config('base.gears') as $key=>$gear)
                                @php
                                        $request_merge = $request;
                                        if(array_search($key,$request_merge)){
                                            $index = array_search('gear',array_keys($request_merge));
                                            if($index !== false){
                                                array_splice($request_merge,$index,1);
                                            }
                                        }else{
                                            $request_merge = array_merge($request_merge,['gear'=>$key]);
                                        }
                                    @endphp
                                <div class="col-sm-4 col-6 item">
                                    <a href="{{
                                        route('public.brand.index',$request_merge)}}" class="col-filter {{array_search($key,$request) ? 'active' : ''}}">
                                        <div class="symbol">
                                            <img src="{{Theme::asset()->url('images/setting.png')}}" alt="">
                                        </div>
                                        <div class="name font25">
                                            {{trans($gear)}}
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>


<script>
    function submitFormPrice(){
        if(document.getElementById('formPrice')){
            $('#formPrice').submit();
        }
    }
    $(document).ready(function() {
        // Array.from(document.getElementsByClassName('col-filter')).forEach(function(element){
        //     element.onclick =(e)=> {
        //         e.preventDefault();
        //         element.classList.toggle('active');
        //     }
        // })

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