
<div class="showroom-wrap mt-40">
    @isset($showrooms)
        @forelse ($showrooms as $item)
            <div class="showroom-item">
                <div class="left">
                    <div class="img-container">
                        <div class="skewed">
                            <img loading="lazy" src="{{ has_field($item, "hinh_anh_showroom") ? get_image_url(get_field($item, 'hinh_anh_showroom')) : "" }}" alt="{{ $item->name }}">
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h2 class="showroom-name font30">{{ $item->name }}
                        <div class="logo-container">
                            <img loading="lazy" class="img-fluid" src="{{ has_field($item, "logo_showroom") ? get_image_url(get_field($item, 'logo_showroom')) : "" }}" alt="{{ $item->name }}">
                        </div>
                    </h2>
                    <ul class="showroom-info">
                        <li>
                            <p class="font20"><span>{{ __("Địa chỉ") }}: </span>{{ has_field($item, 'dia_chi_showroom') ? get_field($item, 'dia_chi_showroom') : '' }}</p>
                        </li>
                        <li>
                            <p class="font20"><span>{{ __("Hotline") }}: </span>{{ has_field($item, 'hotline_showroom') ? get_field($item, 'hotline_showroom') : '' }}</p>
                        </li>
                        <li>
                            <p class="font20"><span>{{ __("Website") }}: </span>{{ has_field($item, 'website_showroom') ? get_field($item, 'website_showroom') : '' }}</p>
                        </li>
                    </ul>
                   
                    <div class="d-flex align-items-end justify-content-between flex-wrap">
                        @if(has_field($item, 'link_dat_hen_online_showroom'))
                            <a href="{{ get_field($item, 'link_dat_hen_online_showroom') }}" class="online-service-booking font20">{{ __("đặt hẹn dịch vụ online") }}</a>
                        @endif
                        @if(has_field($item, 'danh_sach_dich_vu_show_room'))
                            <div class="category-container">
                                <ul>
                                    @foreach (get_field($item, 'danh_sach_dich_vu_show_room') as $child)
                                        <li>
                                            <img loading="lazy" src="{{ has_sub_field($child, 'icon') ? get_image_url(get_sub_field($child, 'icon')) : ''  }}" alt="{{ has_sub_field($child, 'icon') ? get_sub_field($child, 'icon') : ''  }}">
                                            <p class="font20 font-pri">{{ has_sub_field($child, 'ten_dich_vu') ? get_sub_field($child, 'ten_dich_vu') : ''  }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                                
                            </div>
                        @endif
                    </div>
                   
                </div>
            </div>
        @empty
            {!! Theme::partial('templates.no-content') !!}
        @endforelse
    @else
        {!! Theme::partial('templates.no-content') !!}
    @endif
</div>