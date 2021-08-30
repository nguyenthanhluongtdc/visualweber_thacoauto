<?php

namespace Platform\Vehicle\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Vehicle\Http\Requests\VehicleRequest;
use Platform\Vehicle\Repositories\Interfaces\VehicleInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Vehicle\Tables\VehicleTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Vehicle\Forms\VehicleForm;
use Platform\Base\Forms\FormBuilder;

class VehicleController extends BaseController
{
    /**
     * @var VehicleInterface
     */
    protected $vehicleRepository;

    /**
     * @param VehicleInterface $vehicleRepository
     */
    public function __construct(VehicleInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @param VehicleTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(VehicleTable $table)
    {
        page_title()->setTitle(trans('plugins/vehicle::vehicle.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/vehicle::vehicle.create'));

        return $formBuilder->create(VehicleForm::class)->renderForm();
    }

    /**
     * @param VehicleRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(VehicleRequest $request, BaseHttpResponse $response)
    {
        $vehicle = $this->vehicleRepository->createOrUpdate($request->input());

        // store categories
        $categories = $request->input('brands');
        if (!empty($categories) && is_array($categories)) {
            $vehicle->brands()->sync($categories);
        }

        event(new CreatedContentEvent(VEHICLE_MODULE_SCREEN_NAME, $request, $vehicle));

        return $response
            ->setPreviousUrl(route('vehicle.index'))
            ->setNextUrl(route('vehicle.edit', $vehicle->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $vehicle = $this->vehicleRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $vehicle));

        page_title()->setTitle(trans('plugins/vehicle::vehicle.edit') . ' "' . $vehicle->name . '"');

        return $formBuilder->create(VehicleForm::class, ['model' => $vehicle])->renderForm();
    }

    /**
     * @param int $id
     * @param VehicleRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, VehicleRequest $request, BaseHttpResponse $response)
    {
        $vehicle = $this->vehicleRepository->findOrFail($id);

        $vehicle->fill($request->input());

        $vehicle = $this->vehicleRepository->createOrUpdate($vehicle);

        // store categories
        $categories = $request->input('brands');
        if (!empty($categories) && is_array($categories)) {
            $vehicle->brands()->sync($categories);
        }
        
        event(new UpdatedContentEvent(VEHICLE_MODULE_SCREEN_NAME, $request, $vehicle));

        return $response
            ->setPreviousUrl(route('vehicle.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $vehicle = $this->vehicleRepository->findOrFail($id);

            $this->vehicleRepository->delete($vehicle);

            event(new DeletedContentEvent(VEHICLE_MODULE_SCREEN_NAME, $request, $vehicle));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $vehicle = $this->vehicleRepository->findOrFail($id);
            $this->vehicleRepository->delete($vehicle);
            event(new DeletedContentEvent(VEHICLE_MODULE_SCREEN_NAME, $request, $vehicle));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
