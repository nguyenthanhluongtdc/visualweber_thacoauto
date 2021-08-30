
<div class="section-support-industry-tab">
    <div class="mechanical-tab-wrapper"
        style="background-image:url('{{ Theme::asset()->url('images/mechandical/bg-tab2.png') }}'); background-repeat: no-repeat;">
        <div class="container-remake mechanical-tab__content" data-aos="fade-up" data-aos-duration="1500"
            data-aos-easing="ease-in-out" data-aos-delay="50">
            <div class="py-lg-5 py-4">
                <div class="row">
                    {{-- {!!
                        Menu::renderMenuLocation($name_menu, [
                            'options' => [],
                            'theme' => true,
                            'view' => 'tabs_business',
                        ])
                    !!} --}}

                    @php
                        $menu_nodes = [];
                        $count = 0;
                        if(has_field($page, 'tabs_repeater_manufacture') && !empty(has_field($page, 'tabs_repeater_manufacture'))) {
                            $menu_nodes = has_field($page, 'tabs_repeater_manufacture');
                            $count = count($menu_nodes);
                        }
                    @endphp

                    @if($count != 0)
                        <div class="col-1"></div>
                        @if($count > 6)
                            <div class="tab col-2 item-right">
                                @foreach($menu_nodes as $key => $item)
                                    <button class="tablink font25 text-uppercase fontmb-medium" id-name="{{Str::Slug(has_sub_field($item, 'title_one'), '_').$key}}"
                                    >
                                    {!! has_sub_field($item, 'title_one') !!}
                                    </button>
                                    @break($loop->index == ceil(count($menu_nodes)/2)-1)
                                @endforeach
                            </div>

                            @else
                            <div class="tab col-3 item-right">
                                @foreach($menu_nodes as $key => $item)
                                    <button class="tablink font25 text-uppercase fontmb-medium" id-name="{{Str::Slug(has_sub_field($item, 'title_one'), '_').$key}}"
                                    >
                                    {!! has_sub_field($item, 'title_one') !!}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <div class="{{$count>6?'col-6':'col-7'}} item-top">
                            @foreach($menu_nodes as $key => $item)
                                <div id="{{Str::Slug(has_sub_field($item, 'title_one'), '_').$key}}" class="tabcontents">
                                    <img loading="lazy" src="{{ Storage::disk('public')->exists(has_sub_field($item, 'image')) ? get_image_url(has_sub_field($item, 'image')) : RvMedia::getDefaultImage()}}" alt=" {!! has_sub_field($item, 'title_two') !!}"
                                        class="mb-2" />
                                    <div class="content-bottom">
                                        <div class="top">
                                            <h4 class="font20 mb-2 text-uppercase fontmb-middle">
                                                {!! has_sub_field($item, 'title_two') !!}
                                            </h4>
                                            <div class="font-pri description font15 mb-2 fontmb-little">
                                                {!! has_sub_field($item, 'description') !!}
                                            </div>
                                        </div>
                                        <div class="read-more font18"><a target="_blank" href="{{has_sub_field($item, 'link')}}"> {!! __('Readmore') !!} </a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($count > 6)
                            <div class="tab col-2 item-left">
                                @for($i = ceil(count($menu_nodes)/2); $i < $count; $i++ )
                                    <button class="font25 text-uppercase tablink fontmb-medium" id-name="{{Str::Slug(has_sub_field($menu_nodes[$i], 'title_one'), '_').$i}}">
                                        {!! has_sub_field($menu_nodes[$i], 'title_one') !!}
                                    </button>
                                @endfor
                            </div>
                        @endif
                        <div class="col-1"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        let ele_prev = document.getElementsByClassName('tablink')[0];

        function openTabs(evt, tabsName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontents");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabsName).style.display = "block";
            ele_prev.classList.remove('active');
            evt.classList.add('active');
            ele_prev = evt;
        }
        // document.getElementById("defaultOpen").click();

        Array.from(document.getElementsByClassName('tablink')).forEach((ele, index)=>{
            ele.onclick = ()=> {
                openTabs(ele, ele.getAttribute('id-name'));
            }
        })

        ele_prev.click();
    })
</script>