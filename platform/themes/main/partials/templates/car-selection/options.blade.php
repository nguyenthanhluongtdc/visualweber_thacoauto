
<div class="select-color">
    <h3 class="select-color__title font15 font-pri">{{ __('Lựa chọn màu') }}</h3>
    @if($car->colors->count() > 0)
        <ul class="info-color">
            @foreach ($car->colors ?? collect() as $key => $item)
                <li class="info-color__item {{ $key == 0 ? 'active' : '' }}" style="background-color: {{ $item->code }}"></li>
            @endforeach
        </ul>
    @else
        <span class="font-pri font15 w-100 text-center py-4">{{ __("chưa cập nhật") }}</span>
    @endif
</div>
<div class="select-equip">
    <h3 class="select-equip__title font15 font-pri">{{ __("Phụ kiện") }}</h3>
    <div class="select-equip__list">
        @forelse ($car->accessories ?? collect() as $item)
            <div class="select-equip__item">
                <div class="frame">
                    <img src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $item->name }}">
                </div>
                <div class="checkbox-frame w-100">
                    <div class="cframe">
                        <input class="checkbox" name="accessories[]" value="{{ $item->id }}" type="checkbox">
                        <span class="checkmark"></span>
                    </div>
                    <label class="font-pri font15" for="">{{ $item->name }} <span>{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '' }}</span> </label>
                </div>
            </div>
        @empty
            <span class="font-pri font15 w-100 text-center py-4">{{ __("chưa cập nhật") }}</span>
        @endforelse
    </div>
</div>
<div class="select-equip">
    <h3 class="select-equip__title font15 font-pri">{{ __("Trang bị thêm") }}</h3>
    <div class="select-equip__list">
        @forelse ($car->equipments ?? collect() as $item)
            <div class="select-equip__item">
                <div class="frame">
                    <img src="{{ RvMedia::getImageUrl($item->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $item->name }}">
                </div>
                <div class="checkbox-frame w-100">
                    <div class="cframe">
                        <input class="checkbox" name="equipments[]" value="{{ $item->id }}" type="checkbox">
                        <span class="checkmark"></span>
                    </div>
                    <label class="font-pri font15" for="">{{ $item->name }} <span>{{ $item->price ? number_format($item->price, 0, '.', ',') . 'đ' : '' }}</span> </label>
                </div>
            </div>
        @empty
            <span class="font-pri font15 w-100 text-center py-4">{{ __("chưa cập nhật") }}</span>
        @endforelse
    </div>
</div>