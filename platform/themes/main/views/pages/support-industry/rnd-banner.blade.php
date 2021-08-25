<div class="section-intro-bannerFull" style="background-image: url({{Theme::asset()->url('images/manufacturing/manu11.jpg')}})">
    <div class="bg-opacity"></div>
    <div class="content">
        <div class="column-left text-center ">
            <h2 class="title font-pri-bold text-white text-uppercase">
                @if(has_field($page, 'title_banner1_banner_research_development'))
                <span class="font30 text-uppercase"> {!! has_field($page,'title_banner1_banner_research_development') !!}</span> <br>
                @endif
                @if(has_field($page, 'title_banner2_banner_research_development'))
                <span class="font60 text-uppercase">{!! has_field($page,'title_banner2_banner_research_development') !!}</span>
                @endif
            </h2>
            @if(has_field($page, 'date_banner_research_development'))
            <div class="sub-title text-white font15">
                {!! has_field($page,'date_banner_research_development') !!}
            </div>
            @endif
        </div>

        <ul class="column-right ">
            @if(has_field($page, 'repeater_banner_research_development'))
            @foreach(has_field($page, 'repeater_banner_research_development') as $item)
            <li class="item">
                <div class="symbol">
                   <img src="{{get_image_url(has_sub_field($item,'icon_counter_banner_research_development'))}}" alt="">
                </div>

                <div class="description counter">
                   
                    <strong class="number counter-value"data-count="{!! has_sub_field($item, 'number_counter_banner_research_development') ? has_sub_field($item, 'number_counter_banner_research_development') : '' !!}" data-speed="500">
                        0
                    </strong>

                   
                    <span class="text">
                        {!! has_sub_field($item, 'text_counter_banner_research_development') ? has_sub_field($item, 'text_counter_banner_research_development') : '' !!}
                    </span>
            
                </div>
            </li>
            @endforeach
            @endif
            {{-- <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/country.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'contry_banner_research_development'))
                    <strong class="number counter-value" data-count="{!! has_field($page,'contry_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_contry_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_contry_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li> --}}

            {{-- <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/staff.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'staff_banner_research_development'))
                    <strong class="number counter-value"data-count="{!! has_field($page,'staff_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_staff_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_staff_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li> --}}
{{-- 
            <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/factory.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'factory_banner_research_development'))
                    <strong class="number counter-value"data-count="{!! has_field($page,'factory_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_factory_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_factory_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li> --}}
        </ul>
        
    </div>
</div>


<div class="section-intro-bannerFull-mobile" style="background-image: url({{Theme::asset()->url('images/manufacturing/manu11.jpg')}})">
    <div class="bg-opacity"></div>
    <div class="content row">
        <div class="column-left text-center col-4">
            <h2 class="title font-pri-bold text-white text-uppercase">
                @if(has_field($page, 'title_banner1_banner_research_development'))
                <span class="text1 text-uppercase">  {!! has_field($page,'title_banner1_banner_research_development') !!}</span> <br>
                @endif
                @if(has_field($page, 'title_banner2_banner_research_development'))
                <span class="text2 text-uppercase">{!! has_field($page,'title_banner2_banner_research_development') !!}</span>
                @endif
            </h2>

            @if(has_field($page, 'date_banner_research_development'))
            <div class="sub-title text-white font15">
                {!! has_field($page,'date_banner_research_development') !!}
            </div>
            @endif
        </div>
        <ul class="column-right col-4">
            @if(has_field($page, 'repeater_banner_research_development'))
            @foreach(has_field($page, 'repeater_banner_research_development') as $item)
            <li class="item">
                <div class="symbol">
                    <img src="{{get_image_url(has_sub_field($item,'icon_counter_banner_research_development'))}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'client_banner_research_development'))
                    <strong class="number counter-value"data-count="{!! has_sub_field($item, 'number_counter_banner_research_development') ? has_sub_field($item, 'number_counter_banner_research_development') : '' !!}" data-speed="500">
                        0
                    </strong>
                    @endif

                    @if(has_field($page, 'tittle_client_banner_research_development'))
                    <span class="text">
                        {!! has_sub_field($item, 'text_counter_banner_research_development') ? has_sub_field($item, 'text_counter_banner_research_development') : '' !!}
                    </span>
                    @endif
                </div>
            </li>
            @endforeach
            @endif
            {{-- <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/country.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'contry_banner_research_development'))
                    <strong class="number counter-value" data-count="{!! has_field($page,'contry_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_contry_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_contry_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li>

            <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/staff.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'staff_banner_research_development'))
                    <strong class="number counter-value"data-count="{!! has_field($page,'staff_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_staff_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_staff_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li>

            <li class="item">
                <div class="symbol">
                    <img src="{{Theme::asset()->url('images/mechandical/factory.png')}}" alt="">
                </div>

                <div class="description counter">
                    @if(has_field($page, 'factory_banner_research_development'))
                    <strong class="number counter-value"data-count="{!! has_field($page,'factory_banner_research_development') !!}" data-speed="500">
                        0
                    </strong>
                    @endif
                    @if(has_field($page, 'tittle_factory_banner_research_development'))
                    <span class="text">
                        {!! has_field($page,'tittle_factory_banner_research_development') !!}
                    </span>
                    @endif
                </div>
            </li> --}}
        </ul>
        
    </div>
</div>