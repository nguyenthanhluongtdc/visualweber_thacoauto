
<div class="section-support-industry-overview">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            @if(has_field($page, 'tittle_production_assemble'))
                <h2 class="mechandical-overview__title font60 font-pri-bold fontmb-large text-uppercase"> {!! has_field($page,
                'tittle_production_assemble') !!} </h2>
            @endif

            @if(has_field($page, 'description_production_assemble'))
                <div class="mechandical-overview__desc font20 font-pri mt-40 mb-40  fontmb-small" style="line-height: 1.5; text-align: justify;">
                    {!! has_field($page, 'description_production_assemble') !!}
                </div>
            @endif

            <div class="mechandical-overview__boxfield">
                @if(has_field($page, 'repeater_module_production_assemble'))
                    @foreach(has_field($page, 'repeater_module_production_assemble') as $row)
                        <div class="boxfield-item item">
                                    <img loading="lazy" src="{{Storage::disk('public')->exists(has_sub_field($row, 'symbol')) ? get_image_url(has_sub_field($row, 'symbol')) : RvMedia::getDefaultImage()}}" alt="{!! has_sub_field($row, 'name') !!} ">
                                    <p class="font24 font-pri-bold name fontmb-middle text-uppercase"> {!! has_sub_field($row, 'name') !!} </p>
                                
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>