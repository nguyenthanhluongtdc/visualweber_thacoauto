<section class="general-manufacturing overflow-x-hidden">
    <div class="container-remake"> 
        @if(has_field($page, 'repeater_module_classify_manufacturing'))
            @foreach(has_field($page, 'repeater_module_classify_manufacturing') as $row)
                <div class="production mt-5 " data-aos="fade-left" data-aos-duration="1600"  data-aos-delay="100" >
                    <h2 class="production__title font60 font-pri-bold fontmb-middle">
                        {!! has_sub_field($row, 'name') !!}
                    </h2>
                    <div class="production__content font20 font-pri mt-10 mb-40">
                        {!! has_sub_field($row, 'description') !!}
                        <div class="read-more desktop">
                            <a href="{{has_sub_field($row, 'link')}}" class="read-more__link font-pri font20"> {!! __('Readmore') !!} <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="production__image">
                        <a href="{{has_sub_field($row, 'link')}}" title=""> 
                            <img  src="{{ get_image_url(has_sub_field($row, 'image')) }}" alt="">
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>