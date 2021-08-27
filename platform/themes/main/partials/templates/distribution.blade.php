@forelse ($data as $item)
    <div class="branch-item mb-20" data-item="{{ json_encode(has_field($item, 'lat_lng_he_thong_phan_phoi') ? get_field($item, 'lat_lng_he_thong_phan_phoi') : '') }}">
        <p class="branch-name font30 mb-20">{{ $item->name }}</p>
        <p class="branch-address font20 mb-20">{{ has_field($item, 'dia_chi_he_thong_phan_phoi') ? get_field($item, 'dia_chi_he_thong_phan_phoi') : '' }}</p>
        <div class="logo-wrap mb-20">
            <div class="logo-wrap__left">
                @if (has_field($item, 'danh_sach_thuong_hieu_he_thong_phan_phoi'))
                    @forelse (get_field($item, 'danh_sach_thuong_hieu_he_thong_phan_phoi') as $child)
                        <div class="logo-item">
                            <img src="{{ has_sub_field($child, 'hinh_anh') ? get_image_url(get_sub_field($child, 'hinh_anh')) : '' }}" alt="{{ has_sub_field($child, 'ten') ? get_sub_field($child, 'ten') : '' }}">
                        </div>
                    @empty
                        <span class="font-pri font20">{{ __("Nội dung đang được cập nhật") }}</span>
                    @endforelse
                @else
                    <span class="font-pri font20">{{ __("Nội dung đang được cập nhật") }}</span>
                @endif
            </div>
            <div class="logo-wrap__right font17 font-pri font-17">
                <a href="{{ $item->url }}">{{ __("Xem chi tiết") }} <i class="fa fa-arrow-right"
                        aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
@empty
    <span class="font-pri font20" style="color: white;">{{ __("Nội dung đang được cập nhật") }}</span>
@endforelse