<div id="research-development-page" class="overflow-x-hidden">
    <div class="section-intro-wrapper expor">
        <div class="container-remake">
            <div class="section-intro">
                @if(has_field($page, 'intro_module_export'))
                <h1 class="section-intro__title font-pri-bold font40 fontmb-large text-uppercase">{!! has_field($page,'intro_module_export') !!}   </h1>
                @endif
                @if(has_field($page, 'description_module_export'))
                <p class="rd-production__content font20 fontmb-small font-pri">
                    {!! has_field($page,'description_module_export') !!} 
                </p>
                @endif
            </div>
        </div>
 
        @includeIf("theme.main::views.pages.support-industry.rnd-banner")
        <div class="section-info-more-wrapper font-pri">
            <div class="content font20">
                <div class="container-remake">
                    @if(has_field($page, 'tittle_module_export'))
                    <h2 class="title font-pri-bold font40 fontmb-large text-uppercase ">
                        {!! has_field($page,'tittle_module_export') !!}
                    </h2>
                    @endif
                </div>
            </div>
            <div class="list-image-mobile container-remake">
               
                @if(has_field($page, 'repeater_main_project_module_export'))
                @foreach(has_field($page, 'repeater_main_project_module_export') as $item)
                <div class="swiper-slide">
                    <img width="" height="" src="{{get_image_url(has_sub_field($item,'image'))}}" alt="" class="image"/>
                        <div class="text text-uppercase fontmb-middle font-pri-bold my-3">{!! has_sub_field($item, 'description') ? has_sub_field($item, 'description') : '' !!}</div>
                </div> 
                @endforeach
                @endif

               
                @if(has_field($page, 'repeater_side_project_module_export'))
                @foreach(has_field($page, 'repeater_side_project_module_export') as $item)
                <div class="news">
                        <div class="left p-0">
                            <img width="" height="" src="{{get_image_url(has_sub_field($item,'image'))}}" alt="" />
                        </div>
                        <div class="right">
                            <h3 class="text-dark fontmb-middle font-pri-bold">{!! has_sub_field($item, 'description') ? has_sub_field($item, 'description') : '' !!}</h3>
                        </div>
                    
                </div>
                @endforeach
                @endif

                {{-- <div class="news">
                    <div class="left p-0">
                        <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}" alt="" />
                    </div>
                    <div class="right">
                        <h3 class="text-dark fontmb-medium font-pri-bold">Lorem ipsum dolor sit amet consectetur adipisi elit. Minima nostrum, magnam</h3>
                    </div>
                
            </div>
            <div class="news">
                <div class="left p-0">
                    <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}" alt="" />
                </div>
                <div class="right">
                    <h3 class="text-dark fontmb-medium font-pri-bold">Lorem ipsum dolor sit amet consectetur adipisi elit. Minima nostrum, magnam</h3>
                </div>
            
        </div>
        <div class="news">
            <div class="left p-0">
                <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}" alt="" />
            </div>
            <div class="right">
                <h3 class="text-dark fontmb-medium font-pri-bold">Lorem ipsum dolor sit amet consectetur adipisi elit. Minima nostrum, magnam</h3>
            </div>
        
        </div> --}}

            </div>
            <div class="list-image row">
                <div class="swiper-container researchDevSwiper">
                    <div class="swiper-wrapper">
                       
                        @if(has_field($page, 'repeater_slider_export'))
                        @foreach(has_field($page, 'repeater_slider_export') as $item)
                        <div class="swiper-slide">
                            <img width="" height="" src="{{get_image_url(has_sub_field($item,'slider_image'))}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu4.jpg')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/duantieubieu1.png')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/duantieubieu1.png')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu4.jpg')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu4.jpg')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/duantieubieu1.png')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/duantieubieu1.png')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu4.jpg')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/manu4.jpg')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img width="" height="" src="{{Theme::asset()->url('images/manufacturing/duantieubieu1.png')}}" alt="" class="image"/>
                            <div class="overlay">
                                <div class="text text-uppercase font30 font-pri-bold">thaco xuất khẩu ô tô qua thái lan</div>
                                <div class="read-more"><a href="">Xem chi tiết</a></div>
                            </div>
                        </div> --}}
                       
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>

            {{-- <div class="container-remake">
                <div class="line-border">
                    <div class="bg-dark h-100 w-25"> </div>
                </div>
            </div> --}}
        </div>

        @includeIf("theme.main::views.pages.mechanical.mechanical-news")
        @includeIf("theme.main::views.pages.mechanical.mechanical-news-mobile")
        @includeIf("theme.main::views.pages.mechanical.mechanical-contact")
       
        
        
    </div>
</div>


