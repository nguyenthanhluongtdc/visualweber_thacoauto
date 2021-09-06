@if ($deposit)
    <p>{{ trans('plugins/contact::contact.tables.time') }}: <i>{{ $deposit->created_at }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.full_name') }}: <i>{{ $deposit->name }}</i></p>
    <p>{{ trans('plugins/contact::contact.tables.email') }}: <i><a href="mailto:{{ $deposit->email }}">{{ $deposit->email }}</a></i></p>
    <p>{{ trans('plugins/contact::contact.tables.phone') }}: <i>@if ($deposit->phone) <a href="tel:{{ $deposit->phone }}">{{ $deposit->phone }}</a> @else N/A @endif</i></p>
    <p>{{ trans('Tỉnh/Thành phố') }}: <i>{{ $deposit->city_id ? get_cities_by_id($deposit->city_id) : 'N/A' }}</i></p>
    <p>{{ trans('Showroom') }}: <i>{{ $deposit->showroom_id ? get_showroom_by_id($deposit->showroom_id)->name : 'N/A' }}</i></p>
    <p>{{ trans('Tên xe') }}: <i>{{ $deposit->car_id ? get_car_by_id($deposit->car_id)->name : 'N/A' }}</i></p>
    <p>{{ trans('Hãng xe') }}: <i>{{ $deposit->car_id ? get_car_by_id($deposit->car_id)->brand->name : 'N/A' }}</i></p>
    <p>{{ trans('Màu sắc') }}: <i>{{ $deposit->color_id ? get_color_by_id($deposit->color_id)->name : 'N/A' }}</i></p>
    <p>{{ trans('Giá gốc') }}: <i>{{ $deposit->car_id ? number_format(get_car_by_id($deposit->car_id)->price, 0, '.', ',') . 'đ' : '0đ'}}</i></p>
    <p>{{ trans('Phí rước bạ') }}: <i>{{ $deposit->subject ? $deposit->subject : 'N/A' }}</i></p>
    <p>{{ trans('Phí ra biển số') }}: <i>{{ $deposit->subject ? $deposit->subject : 'N/A' }}</i></p>
    <p>{{ trans('Phụ kiện đi kèm') }}: <i>
        @if(!empty(get_deposit_accessories_by_id($deposit->id)))
        @foreach (get_deposit_accessories_by_id($deposit->id) as $item)
        @if ($loop->last)
        {{$item->name}}
        @else
        {{$item->name.' | '}}
        @endif    
        @endforeach
        @endif
    </i></p>
    <p>{{ trans('Trang bị đi kèm') }}: <i>
        @if(!empty(get_deposit_equipments_by_id($deposit->id)))
        @foreach (get_deposit_equipments_by_id($deposit->id) as $item)
        @if ($loop->last)
        {{$item->name}}
        @else
        {{$item->name.' | '}}
        @endif    
        @endforeach
        @endif
    </i></p>
    <p>{{ trans('Chương trình khuyến mãi') }}: <i>
        @if(!empty(get_deposit_promotions_by_id($deposit->id)))
        @foreach (get_deposit_promotions_by_id($deposit->id) as $item)
        @if ($loop->last)
        {{$item->name}}
        @else
        {{$item->name.' | '}}
        @endif    
        @endforeach
        @endif
    </i></p>
    <p>{{ trans('Tổng tiền giảm khuyến mãi') }}: <i class="text-danger">-{{ $deposit->price_discount_total ? number_format($deposit->price_discount_total, 0, '.', ',') . 'đ' : '0đ'}}</i></p>
    <p>{{ trans('Tổng tiền') }}: <i class="">{{ $deposit->total_price ? number_format($deposit->total_price, 0, '.', ',') . 'đ' : '0đ'}}</i></p>
    <p>{{ trans('Hình thức thanh toán') }}: 
        <i class="">
        @if ($deposit->type_payment == 'in_showroom')
            {{ trans('Thanh toán tại showroom') }}
        @elseif ($deposit->type_payment == 'is_installment')
            {{ trans('Thanh toán trả góp') }}
        @endif

        </i>
    </p>
    @if ($deposit->type_payment == 'is_installment')
    <p class="mr-4">{{ trans('Ngân hàng') }}: <i>{{ get_bank_by_id($deposit->bank_id) ? get_bank_by_id($deposit->bank_id)->name : 'N/A' }}</i></p>
    <p class="mr-4">{{ trans('Số tháng trả góp - lãi suất') }}: <i>{{ $deposit->car_id ? get_car_by_id($deposit->car_id)->name : 'N/A' }}</i></p>
    @endif
    <p>{{ trans('Ghi chú của khách hàng') }}:</p>
    <pre class="message-content">{{ $deposit->note ? $deposit->note : '...' }}</pre>
@endif
