@forelse ($data as $item)
    @php
        $popupData = [
            'popup_info' => [
                'id' => $item->id,
                'name' => has_field($item, 'ten_popup_he_thong_phan_phoi') ? get_field($item, 'ten_popup_he_thong_phan_phoi') : '',
                'content' => has_field($item, 'mo_ta_he_thong_phan_phoi') ? get_field($item, 'mo_ta_he_thong_phan_phoi') : '',
                'seemore' => $item->url
            ],
            'location' => has_field($item, 'lat_lng_he_thong_phan_phoi') ? get_field($item, 'lat_lng_he_thong_phan_phoi') : ''
        ]
    @endphp
    <div class="branch-item mb-20 locate_item" data-item="{{ json_encode($popupData) }}">
        <p class="branch-name font30 mb-20">{{ $item->name }}</p>
        <p class="branch-address font20 mb-20">{{ has_field($item, 'dia_chi_he_thong_phan_phoi') ? get_field($item, 'dia_chi_he_thong_phan_phoi') : '' }}</p>
        <div class="logo-wrap mb-20">
            <div class="logo-wrap__left">
                @if (has_field($item, 'danh_sach_thuong_hieu_he_thong_phan_phoi'))
                    @forelse (get_field($item, 'danh_sach_thuong_hieu_he_thong_phan_phoi') as $child)
                        <div class="logo-item">
                            <img loading="lazy" src="{{ has_sub_field($child, 'hinh_anh') ? get_image_url(get_sub_field($child, 'hinh_anh')) : '' }}" alt="{{ has_sub_field($child, 'ten') ? get_sub_field($child, 'ten') : '' }}">
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