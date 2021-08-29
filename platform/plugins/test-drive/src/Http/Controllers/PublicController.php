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
        $showroomID = $distributionSystemInterface->getFirstBy([
            "id" => request('showroom_id')
        ], ['*'], ['showrooms'])
            ->pluck('id')
            ->toArray() ?? [];

        $data = $carInterface->getModel()
            ->whereHas('showrooms', function ($q) use ($showroomID) {
                $q->where('app_showrooms.id', $showroomID);
            })
            ->select('id', 'name')
            ->where('app_cars.status', BaseStatusEnum::PUBLISHED);

        $cars = $carInterface->applyBeforeExecuteQuery($data)->get();

        return $response->setData([
            "data" => $cars
        ]);
    }

    public function postTestDrive(TestDriveInterface $testDriveInterface)
    {
        try {
            $testDriveInterface->createOrUpdate(request()->all());

            return redirect()->route('public.index')->with(
                [
                    'type' => 'success',
                    'message' => __('Bạn đã đăng ký thành công, xin cảm ơn!')
                ]
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with(
                [
                    'type' => 'error',
                    'message' => __('Có lỗi trong quá trình đăng ký, vui lòng thử lại!')
                ]
            );
        }
    }
}
