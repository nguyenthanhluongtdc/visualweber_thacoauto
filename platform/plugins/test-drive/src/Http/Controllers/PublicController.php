<?php

namespace Platform\TestDrive\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Http\Controllers\BaseController;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Repositories\Interfaces\CarInterface;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Location\Repositories\Interfaces\CityInterface;
use Platform\TestDrive\Repositories\Interfaces\TestDriveInterface;
use Illuminate\Support\Facades\Log;

class PublicController extends BaseController
{
    public function getDistrictByState(BaseHttpResponse $response, CityInterface $cityRepository)
    {
        $cities = $cityRepository->advancedGet([
            'condition' => [
                'status'   => BaseStatusEnum::PUBLISHED,
                'state_id' => request('state_id'),
            ],
            'order_by'  => ['order' => 'DESC'],
            'select' => ['id', 'name']
        ]);

        return $response->setData([
            "data" => $cities
        ]);
    }

    public function getShowroomByState(BaseHttpResponse $response, DistributionSystemInterface $distributionSystemInterface)
    {
        $showrooms = $distributionSystemInterface->advancedGet([
            'condition' => [
                'status'   => BaseStatusEnum::PUBLISHED,
                'state_id' => request('state_id'),
            ],
            'order_by'  => ['created_at' => 'DESC'],
            'select' => ['id', 'name']
        ]);

        return $response->setData([
            "data" => $showrooms
        ]);
    }

    public function getCarByShowroom(BaseHttpResponse $response, DistributionSystemInterface $distributionSystemInterface, CarInterface $carInterface)
    {
        $showroomID = $distributionSystemInterface->getFirstBy(["id" => request()->get('showroom_id')],['*'],['showrooms']);

        $data = $carInterface->getModel()
            ->whereHas('showrooms', function ($q) use ($showroomID) {
                $q->where('app_showrooms.id', $showroomID ? $showroomID->showrooms->pluck('id')->toArray() : []);
            })
            ->select('id', 'name')
            ->where('app_cars.status', BaseStatusEnum::PUBLISHED);

        $cars = $carInterface->applyBeforeExecuteQuery($data)->get();

        return $response->setData([
            "data" => $cars
        ]);
    }

    public function postTestDrive(TestDriveInterface $testDriveInterface, BaseHttpResponse $response)
    {

        $rules = [
            'name' => 'required|max:150',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'email' => 'required|email:rfc,dns',
            'provision1' => 'accepted',
            'provision2' => 'accepted',
            'provision3' => 'accepted',
        ];
        $customMessages = [
            'required' => __('* Trường bắt buộc nhập'),
            'regex' => __('* Dữ liệu phải là dãy số'),
            'phone.min' => __('* Số điện thoại không hợp lệ (ít nhất 10 chữ số)'),
            'phone.max' => __('* Số điện thoại không hợp lệ (tối đa 11 chữ số)'),
            'email'  => __('* Email không hợp lệ'),
        ];

        $this->validate(request(), $rules, $customMessages);
        try {
            $data = $testDriveInterface->createOrUpdate(request()->all());
            return redirect()->route('public.test-drive.get-car')->with(
                [
                    'type' => 'success',
                    'message' => __('Bạn đã đăng ký thành công, xin cảm ơn!')
                ]
            );
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Log::error($th->getMessage());
            return redirect()->back()->with(
                [
                    'type' => 'error',
                    'message' => __('Có lỗi trong quá trình đăng ký hoặc chưa điền đủ trường. Vui lòng thử lại!')
                ]
            );
        }
    }
}
