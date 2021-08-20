<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Car\Http\Requests\CarRequest;
use Platform\Car\Repositories\Interfaces\CarInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Car\Tables\CarTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Forms\CarForm;
use Platform\Base\Forms\FormBuilder;

class CarController extends BaseController
{
    /**
     * @var CarInterface
     */
    protected $carRepository;

    /**
     * @param CarInterface $carRepository
     */
    public function __construct(CarInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @param CarTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CarTable $table)
    {
        page_title()->setTitle(trans('plugins/car::car.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car::car.create'));

        return $formBuilder->create(CarForm::class)->renderForm();
    }

    /**
     * @param CarRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CarRequest $request, BaseHttpResponse $response)
    {
        $car = $this->carRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CAR_MODULE_SCREEN_NAME, $request, $car));

        return $response
            ->setPreviousUrl(route('car.index'))
            ->setNextUrl(route('car.edit', $car->id))
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
        $car = $this->carRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $car));

        page_title()->setTitle(trans('plugins/car::car.edit') . ' "' . $car->name . '"');

        return $formBuilder->create(CarForm::class, ['model' => $car])->renderForm();
    }

    /**
     * @param int $id
     * @param CarRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CarRequest $request, BaseHttpResponse $response)
    {
        $car = $this->carRepository->findOrFail($id);

        $car->fill($request->input());

        $car = $this->carRepository->createOrUpdate($car);

        event(new UpdatedContentEvent(CAR_MODULE_SCREEN_NAME, $request, $car));

        return $response
            ->setPreviousUrl(route('car.index'))
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
            $car = $this->carRepository->findOrFail($id);

            $this->carRepository->delete($car);

            event(new DeletedContentEvent(CAR_MODULE_SCREEN_NAME, $request, $car));

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
            $car = $this->carRepository->findOrFail($id);
            $this->carRepository->delete($car);
            event(new DeletedContentEvent(CAR_MODULE_SCREEN_NAME, $request, $car));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
