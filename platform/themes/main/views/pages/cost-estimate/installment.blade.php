<div style="display: none;" class="MyriadPro-Regular font15" id="installment-modal">
      <div class="deposit__form deposit__form-gray">
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Số tiền muốn vay") }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="country">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15 d-flex justify-content-between align-items-center">
                     <span>{{ __("Chọn số tiền vay") }}</span>
                     <span class="text-secondary">{{ __("triệu đồng") }}</span>
                  </div>
                  <div class="menu">
                     <div class="item d-flex justify-content-between align-items-center" data-value="af">
                        <span>500</span>
                        <span class="text-secondary">{{ __("triệu đồng") }}</span>
                     </div>
                  </div>
            </div>
         </div>
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
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __('Thời gian vay') }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="country">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15 d-flex justify-content-between align-items-center">
                     <span>{{ __("Chọn thời gian vay") }}</span>
                     <span class="text-secondary">{{ __("Year") }}</span>
                  </div>
                  <div class="menu">
                     <div class="item d-flex justify-content-between align-items-center" data-value="af">
                        <span>5</span>
                        <span class="text-secondary">{{ __("Year") }}</span>
                     </div>
                     <div class="item d-flex justify-content-between align-items-center" data-value="af">
                        <span>4</span>
                        <span class="text-secondary">{{ __("Year") }}</span>
                     </div>
                     <div class="item d-flex justify-content-between align-items-center" data-value="af">
                        <span>3</span>
                        <span class="text-secondary">{{ __("Year") }}</span>
                     </div>
                  </div>
            </div>
         </div>
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Thời gian cố định lãi xuất") }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="country">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Chọn thời gian") }}</div>
                  <div class="menu">
                     <div class="item" data-value="af">Afghanistan</div>
                     <div class="item" data-value="ax">Aland Islands</div>
                     <div class="item" data-value="al">Albania</div>
                     <div class="item" data-value="dz">Algeria</div>
                     <div class="item" data-value="as">American Samoa</div>
                  </div>
            </div>
         </div>
         <div class="form-group">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Ngân hàng") }}</label>
            <div class="mb-3 ui fluid selection dropdown">
                  <input type="hidden" name="country">
                  <i class="dropdown icon"></i>
                  <div class="default text MyriadPro-Regular font15">{{ __("Chọn ngân hàng") }}</div>
                  <div class="menu">
                     <div class="item" data-value="af">Afghanistan</div>
                     <div class="item" data-value="ax">Aland Islands</div>
                     <div class="item" data-value="al">Albania</div>
                     <div class="item" data-value="dz">Algeria</div>
                     <div class="item" data-value="as">American Samoa</div>
                  </div>
            </div>
         </div>
         <div class="form-group span-2">
            <label class="required MyriadPro-Regular font17 mb-2 d-inline-block">{{ __("Ước tính") }}</label>
            <div class="MyriadPro-Regular installment-estimate">
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-3">{{ __("Số tiền phải trả hàng tháng") }}</p>
                     <p class="font17">10 triệu đồng</p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-3">{{ __("Số tháng") }}</p>
                     <p class="font17">36</p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-3">{{ __("Ngân hàng") }}</p>
                     <p class="font17">Vietcombank</p>
                  </div>
                  <div class="installment-estimate__item">
                     <p class="font15 d-inline-block mb-3">{{ __("Tổng tiền") }}</p>
                     <p class="font17">800 triệu đồng</p>
                  </div>
            </div>
         </div>
      </div>
</div>