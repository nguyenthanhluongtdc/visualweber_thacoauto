<?php
namespace Platform\Deposit\Http\Controllers;

use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends BaseController{
    public function __construct()
    {
        
    }
    public function store(Request $request){
         $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'email'=> 'required|email:rfc,dns',
            'note'=> 'max:400',
            'country' => 'required',
            'provision1' => 'accepted',
            'provision2' => 'accepted',
            'provision3' => 'accepted',
         ];

         $customMessages = [
            'country.required' => __('* Vui lòng chọn showroom'),
            'required' => __('* Trường bắt buộc nhập'),
            'regex' => __('* Dữ liệu phải là dãy số'),
            'phone.min' => __('* Số điện thoại không hợp lệ (ít nhất 10 chữ số)'),
            'phone.max' => __('* Số điện thoại không hợp lệ (tối đa 11 chữ số)'),
            'note.max' => __('* Dữ liệu nhỏ hơn 400 ký tư'),
            'email'  => __('* Email không hợp lệ'),
         ];

         $this->validate($request, $rules, $customMessages);
         
         try{

            DB::beginTransaction();
               $deposit = new \Platform\Deposit\Models\Deposit;
               $deposit = $deposit->create([
                  'name'=>$request->get('name'),
                  "phone"=>$request->get('phone'),
                  "email"=>$request->get('email'),
                  "note"=>$request->get('note'),
                  "showroom_id"=>$request->get('showroom_id'),
                  "car_id"=>$request->get('car_id'),
                  "color_id"=>$request->get('color_id'),
                  "price"=>$request->get('price'),
                  "fee"=>$request->get('fee'),
                  "fee_license_plate"=>$request->get('fee_license_plate'),
                  "promotion"=>$request->get('promotion'),
               ]);
               if($deposit instanceof \Platform\Deposit\Models\Deposit){
                  if($request->get('accessories')){
                     $accessoryInterface = resolve('Platform\Car\Repositories\Interfaces\AccessoryInterface');
                     foreach($request->get('accessories') as $accessory){
                        if($value = $accessoryInterface->findById($accessory)){
                           $data = new \Platform\Deposit\Models\DepositAccessories;
                           $data->create([
                              'name'=>$value->name,
                              'price'=>$value->price,
                              'deposit_id'=>$deposit->id,
                           ]);
                        }
                     }
                  }
                  if($request->get('equipments')){
                     $equipmentInterface = resolve('Platform\Car\Repositories\Interfaces\EquipmentInterface');
                     foreach($request->get('equipments') as $equipment){
                        if($value = $equipmentInterface->findById($equipment)){
                           $data = new \Platform\Deposit\Models\DepositEquipment;
                           $data->create([
                              'name'=>$value->name,
                              'price'=>$value->price,
                              'deposit_id'=>$deposit->id,
                           ]);
                        }
                     }
                  }
                  DB::commit();
                  return redirect()->route('public.index')->with(
                     [
                         'type' => 'success',
                         'message' => trans('Bạn đã đăng ký thành công, xin cảm ơn!')
                     ]
                 );
               }
            DB::rollback();
            return redirect()->back()->with(
               [
                   'type' => 'error',
                   'message' => trans('Có lỗi trong quá trình đăng ký, vui lòng thử lại!')
               ]
           );
         }catch(\Throwable $th){
            dd($th->getMessage());
         }
    }
}