
<div class="section-production-assemble-overview">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
          
            @if(has_field($page, 'tittle_production_assemble'))
            <h2 class="mechandical-overview__title font60 font-pri-bold text-uppercase">{!! has_field($page,
                'tittle_production_assemble') !!}</h2>
            @endif
            @if(has_field($page, 'description_production_assemble'))
            <div class="mechandical-overview__desc font20 font-pri mt-40 mb-40">
                {!! has_field($page, 'description_production_assemble') !!}
                  
            </div>
            @endif
            <div class="mechandical-overview__boxfield">

                @if(has_field($page, 'repeater_module_production_assemble'))
                @foreach(has_field($page, 'repeater_module_production_assemble') as $row)
               <div class="boxfield-item item">
                <img src="{{ has_sub_field($row, 'symbol') }}" alt="{!! has_sub_field($row, 'symbol') !!}" alt="">
                    <div class="text">
                        <p class="font24 font-pri-bold name">{!! has_sub_field($row, 'name') !!}</p>
                    </div>
                  
               </div>
               @endforeach
               @endif
{{-- 
               <div class="boxfield-item item">
                <img src="{{ Theme::asset()->url('images/manufacturing/assemble/logo-mazda2.png') }}" alt="">
                <div class="text">
                    <p class="font24 font-pri-bold name">XE MAZDA</p>
                </div>
                  
                </div>
                <div class="boxfield-item item">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/peugeot2.png') }}" alt="">
                  
                    <div class="text">
                        <p class="font24 font-pri-bold name">XE PEUGEOT</p>
                    </div>
                </div>
                <div class="boxfield-item item">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/xebus.png') }}" alt="">
                   
                    <div class="text">
                        <p class="font24 font-pri-bold name">XE BUS</p>
                    </div>
                </div>
                <div class="boxfield-item item">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/xetai.png') }}" alt="">
                   
                    <div class="text">
                        <p class="font24 font-pri-bold name">XE TẢI</p>
                    </div>
                </div>
                <div class="boxfield-item item">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/chuyendung.png') }}" alt="">
                  
                    <div class="text">
                        <p class="font24 font-pri-bold name">XE CHUYÊN DỤNG</p>
                    </div>
                </div>
                 --}}
               
            </div>
        </div>
    </div>
</div>


<div class="section-production-assemble-overview-mobile">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            @if(has_field($page, 'tittle_production_assemble'))
            <h2 class="mechandical-overview__title fontmb-large font-pri-bold text-uppercase">{!! has_field($page,
                'tittle_production_assemble') !!}</h2>
            @endif

            @if(has_field($page, 'description_production_assemble'))
            <div class="mechandical-overview__desc  font-pri mt-40 mb-40 fontmb-little">
                {!! has_field($page, 'description_production_assemble') !!}
                  
            </div>
            @endif
           
          
            <div class="mechandical-overview__boxfield row mt-5">
{{-- 
               <div class="boxfield-item item col-md-5 col-sm-5 col-5">
                <img src="{{ Theme::asset()->url('images/manufacturing/assemble/kia.png') }}" alt="">
                    <div class="text">
                        <p class="fontmb-medium font-pri-bold name">XE KIA</p>
                    </div>
                  
               </div> --}}
               @if(has_field($page, 'repeater_module_production_assemble'))
               @foreach(has_field($page, 'repeater_module_production_assemble') as $row)
               <div class="boxfield-item item col-md-5 col-sm-5 col-5">
                <img src="{{ has_sub_field($row, 'symbol') }}" alt="{!! has_sub_field($row, 'symbol') !!}" alt="">
                <div class="text">
                    <p class="fontmb-medium font-pri-bold name">{!! has_sub_field($row, 'name') !!}</p>
                </div>
                    {{-- <p class="font24 font-pri-bold name">XE MAZDA</p> --}}
                </div>

                @endforeach
                @endif
{{-- 
                <div class="boxfield-item item col-md-5 col-sm-5 col-5 p-0">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/peugeot2.png') }}" alt="">
                   
                    <div class="text">
                        <p class="fontmb-medium font-pri-bold name">XE PEUGEOT</p>
                    </div>
                </div>
                <div class="boxfield-item item col-md-5 col-sm-5 col-5 p-0">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/xebus.png') }}" alt="">
                  
                    <div class="text">
                        <p class="fontmb-medium font-pri-bold name">XE BUS</p>
                    </div>
                </div>
                <div class="boxfield-item item col-md-5 col-sm-5 col-5 p-0">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/xetai.png') }}" alt="">
                 
                    <div class="text">
                        <p class="fontmb-medium font-pri-bold name">XE TẢI</p>
                    </div>
                </div>
                <div class="boxfield-item item col-md-5 col-sm-5 col-5 p-0">
                    <img src="{{ Theme::asset()->url('images/manufacturing/assemble/chuyendung.png') }}" alt="">
                  
                    <div class="text">
                        <p class="fontmb-medium font-pri-bold name">XE CHUYÊN DỤNG</p>
                    </div>
                </div> --}}
                
               
            </div>
        </div>
    </div>
</div>
