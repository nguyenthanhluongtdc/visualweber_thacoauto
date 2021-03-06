<div class="section-support-industry-overview">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            @if(has_field($page, 'name_module_overview_sindustry'))
            <h2 class="mechandical-overview__title font60 font-pri-bold fontmb-large text-uppercase"> {!! has_field($page,
                'name_module_overview_sindustry') !!} </h2>
            @endif

            @if(has_field($page, 'description_module_overview_sindustry'))
                <div class="mechandical-overview__desc font20 font-pri mt-40 mb-40  fontmb-small" style="line-height: 1.5; text-align: justify;">
                    {!! has_field($page, 'description_module_overview_sindustry') !!}
                </div>
            @endif

            <div class="mechandical-overview__boxfield">
                @if(has_field($page, 'repeater_module_overview_sindustry'))
                    @foreach(has_field($page, 'repeater_module_overview_sindustry') as $row)
                        <div class="boxfield-item item">
                            <div class="content">
                                <div class="center">
                                    <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'symbol')) ? get_image_url(has_sub_field($row, 'symbol')) : RvMedia::getDefaultImage()}}" alt="{!! has_sub_field($row, 'name') !!} ">
                                    <p class="font24 font-pri-bold name fontmb-middle text-uppercase"> {!! has_sub_field($row, 'name') !!} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
{{--
<div class="section-support-industry-overview-mobile">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            @if(has_field($page, 'name_module_overview_sindustry'))
                <h2 class="mechandical-overview__title fontmb-large font-pri-bold">
                    {!! has_field($page, 'name_module_overview_sindustry') !!}
                </h2>
            @endif

            @if(has_field($page, 'description_module_overview_sindustry'))
                <div class="mechandical-overview__desc fontmb-little font-pri mt-40 mb-40">
                    {!! has_field($page, 'description_module_overview_sindustry') !!}n
                </div>
            @endif

            <div class="mechandical-overview__boxfield row">

                <div class="boxfield-item col-md-5 col-sm-5 col-5 p-0">
                   <img loading="lazy" src="{{ Theme::asset()->url('images/support-industry/linhkien-oto.png') }}" alt="">
                    <p class="fontmb-medium font-pri-bold name">LINH KI???N ?? T??</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img loading="lazy" src="{{ Theme::asset()->url('images/support-industry/phukienoto.png') }}" alt="">

                    <p class="fontmb-medium font-pri-bold name">PH??? KI???N ?? T??</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img loading="lazy" src="{{ Theme::asset()->url('images/support-industry/linhkien-xemay.png') }}" alt="">
                    <p class="fontmb-medium font-pri-bold name">LINH KI???N XE M??Y<br>
                        ?? T??</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img loading="lazy" src="{{ Theme::asset()->url('images/support-industry/sanpham-phutro.png') }}" alt="">
                    <p class="fontmb-medium font-pri-bold name">S???N PH???M PH??? TR???</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}