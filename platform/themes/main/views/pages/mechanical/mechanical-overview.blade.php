<div class="section-mechanical-overview">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            @if(has_field($page, 'tittle_mechanical'))
            <h2 class="mechandical-overview__title font60 font-pri-bold text-uppercase">{!! has_field($page,
                'tittle_mechanical') !!}</h2>
            @endif
            @if(has_field($page, 'description_mechanical'))
            <div class="mechandical-overview__desc font20 font-pri mt-40 mb-40">
                {!! has_field($page, 'description_mechanical') !!}
            </div>
            @endif
            <div class="mechandical-overview__boxfield pl-3">
                @if(has_field($page, 'repeater_module_mechanical'))
                @foreach(has_field($page, 'repeater_module_mechanical') as $row)
               <div class="boxfield-item">
                   <img src="{{ has_sub_field($row, 'symbol') }}" alt="{!! has_sub_field($row, 'symbol') !!}" alt="">
                   <p class="font24 font-pri-bold name text-uppercase">{!! has_sub_field($row, 'name') !!}</p>
               </div>
               @endforeach
               @endif
               {{-- <div class="boxfield-item">
                    <img src="{{ Theme::asset()->url('images/mechandical/giacong-khuonmau.png') }}" alt="">
                    
                    <p class="font24 font-pri-bold name">GIA CÔNG CƠ KHÍ
                        KHUÔN MẪU</p>
                </div>
                <div class="boxfield-item">
                    <img src="{{ Theme::asset()->url('images/mechandical/cokhi-oto.png') }}" alt="">
                    <p class="font24 font-pri-bold name">CƠ KHÍ<br>
                        Ô TÔ</p>
                </div>
                <div class="boxfield-item">
                    <img src="{{ Theme::asset()->url('images/mechandical/cokhi-xaydung.png') }}" alt="">
                    <p class="font24 font-pri-bold name">CƠ KHÍ <br>
                        XÂY DỰNG</p>
                </div>
                <div class="boxfield-item">
                    <img src="{{ Theme::asset()->url('images/mechandical/thietbi-congnghiep.png') }}" alt="">
                    <p class="font24 font-pri-bold name">THIẾT BỊ<br>
                        CÔNG NGHIỆP</p>
                </div>
                <div class="boxfield-item">
                    <img src="{{ Theme::asset()->url('images/mechandical/lamnghiep.png') }}" alt="">
                    <p class="font24 font-pri-bold name">CƠ KHÍ NÔNG
                        LÂM NGHIỆP</p>
                </div>
                 --}}
               
            </div>
            
        </div>
    </div>
</div>

<div class="section-mechanical-overview-mobile">
    <div class="container-remake">
        <div class="mechandical-overview mt-60 mb-60">
            <h2 class="mechandical-overview__title font-pri-bold fontmb-large">CƠ KHÍ</h2>
            <div class="mechandical-overview__desc font-pri mt-40 mb-40 fontmb-little">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                 nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                 
            </div>
            <div class="mechandical-overview__boxfield row">
                
               <div class="boxfield-item col-md-5 col-sm-5 col-5 p-0">
                   <img src="{{ Theme::asset()->url('images/mechandical/thep-giacong.png') }}" alt="">
                   <p class="font40 font-pri-bold name fontmb-medium">THÉP VÀ DỊCH VỤ
                    GIA CÔNG THÉP</p>
               </div>
               <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img src="{{ Theme::asset()->url('images/mechandical/giacong-khuonmau.png') }}" alt="">
                    
                    <p class="font40 font-pri-bold name fontmb-medium">GIA CÔNG CƠ KHÍ <br>
                        KHUÔN MẪU</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img src="{{ Theme::asset()->url('images/mechandical/cokhi-oto.png') }}" alt="">
                    <p class="font40 font-pri-bold name fontmb-medium">CƠ KHÍ
                        Ô TÔ</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img src="{{ Theme::asset()->url('images/mechandical/cokhi-xaydung.png') }}" alt="">
                    <p class="font40 font-pri-bold name fontmb-medium">CƠ KHÍ
                        XÂY DỰNG</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img src="{{ Theme::asset()->url('images/mechandical/thietbi-congnghiep.png') }}" alt="">
                    <p class="font40 font-pri-bold name fontmb-medium">THIẾT BỊ
                        CÔNG NGHIỆP</p>
                </div>
                <div class="boxfield-item col-md-5 col-sm-5 col-5">
                    <img src="{{ Theme::asset()->url('images/mechandical/lamnghiep.png') }}" alt="">
                    <p class="font40 font-pri-bold name fontmb-medium">CƠ KHÍ NÔNG
                        LÂM NGHIỆP</p>
                </div>
                
               
            </div>
            
        </div>
    </div>
</div>
