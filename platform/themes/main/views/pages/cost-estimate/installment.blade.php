<script>
   var getMonthsAcceptLoans_url = '{{route('public.ajax.getMonthsAcceptLoans')}}'
   var getPercentLoans_url = '{{route('public.ajax.getPercentLoans')}}'
</script>

<div style="display: none;" class="MyriadPro-Regular font15" id="installment-modal">
   <div class="loading d-none">
      <img loading="lazy" src="{{Theme::asset()->url('images/media/loading.gif')}}" alt="Gif loading">
  </div>
   <div class="deposit__form deposit__form-gray ">
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Chỗ ở hiện nay") }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="country">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Chọn chỗ ở hiện tại") }}</div>
                  <div class="menu">
                     @forelse(get_countries() as $country)
                     <div class="item" data-value="{{$country->matp}}">{{$country->name}}</div>
                     @empty
                     @endforelse
                  </div>
            </div>
         </div>

         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Giá trị tài sản định mua") }}</label>
            <div class="money-input">
               <div class="money">
                  <input type="number" value="{{round($car->price, 0)}}" name="money" id="money" disabled>
               </div>
               <div class="unit">
                  <div class="mb-3 ui fluid selection dropdown disabled">
                     <input class="custom-input" type="hidden" name="unit" disabled>
                     {{-- <i class="dropdown icon"></i> --}}
                     <div class="default text MyriadPro-Regular font15 d-flex justify-content-between align-items-center">
                        <span class="text-secondary">{{ __("đồng") }}</span>
                     </div>
                     <div class="menu">
                        <div class="item d-flex justify-content-between align-items-center" data-value="af">
                           <span class="text-secondary">{{ __("đồng") }}</span>
                        </div>
                        {{-- <div class="item d-flex justify-content-between align-items-center" data-value="af">
                           <span class="text-secondary">{{ __("tỷ đồng") }}</span>
                        </div> --}}
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Ngân hàng") }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="bank" id="banks">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Chọn ngân hàng") }}</div>
                  <div class="menu">
                     @forelse($banks as $item)
                     <div class="item" data-value="{{$item->id}}">{{$item->name}}</div>
                     @empty
                     @endforelse
                  </div>
            </div>
         </div>

         

         
      
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __('Thời gian vay') }}</label>
            <div class="mb-3 ui fluid selection dropdown disabled" id="loan-month-form">
                  <input type="hidden" name="loan-month" id="loan-month">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15 d-flex justify-content-between align-items-center">
                     <span>{{ __("Chọn thời gian vay") }}</span>
                  </div>
                  <div class="menu" id="loan-month-value">
                     {{-- ajax --}}
                  </div>
            </div>
         </div>
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Số tiền vay") }}</label>
            <div class="mb-3 ui fluid selection dropdown disabled" id="percent-loan-form">
                  <input type="hidden" name="percent-loan" id="percent-loan">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Chọn số tiền muốn vay") }}</div>
                  <div class="menu" id="percent-loan-value">
                     {{-- ajax --}}
                  </div>
            </div>
         </div>
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Thời gian cố định lãi xuất") }}</label>
            <div class="mb-3 ui fluid selection dropdown disabled" id="interest-rate-form">
                  <input type="hidden" name="interest-rate" id="interest-rate">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Vui lòng chọn thời gian để xem kết quả") }}</div>
                  <div class="menu" id="interest-rate-value">
                     {{-- ajax --}}
                  </div>
            </div>
         </div>
         <div class="form-group span-2">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Ước tính") }}</label>
            <div class="MyriadPro-Regular installment-estimate">
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-md-3 mb-1">{{ __("Số tiền phải trả hàng tháng") }}</p>
                     <p class="font17" id="total-loan-per-month"></p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-md-3 mb-1">{{ __("Số tháng") }}</p>
                     <p class="font17" id="total-month"></p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-md-3 mb-1">{{ __("Ngân hàng") }}</p>
                     <p class="font17" id="total-bank"></p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-md-3 mb-1">{{ __("Tổng tiền") }}</p>
                     <p class="font17" id="total-loan"></p>
                  </div>
            </div>
         </div>
      </div>
</div>