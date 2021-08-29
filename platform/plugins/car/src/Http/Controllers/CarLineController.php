<?php

namespace Platform\Car\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Car\Http\Requests\CarLineRequest;
use Platform\Car\Repositories\Interfaces\CarLineInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Car\Tables\CarLineTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Car\Forms\CarLineForm;
use Platform\Base\Forms\FormBuilder;

class CarLineController extends BaseController
{
    /**
     * @var CarLineInterface
     */
    protected $carLineRepository;

    /**
     * @param CarLineInterface $carLineRepository
     */
    public function __construct(CarLineInterface $carLineRepository)
    {
        $this->carLineRepository = $carLineRepository;
    }

    /**
     * @param CarLineTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CarLineTable $table)
    {
        page_title()->setTitle(trans('plugins/car::car-line.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/car::car-line.create'));

        return $formBuilder->create(CarLineForm::class)->renderForm();
    }

    /**
     * @param CarLineRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CarLineRequest $request, BaseHttpResponse $response)
    {
        $carLine = $this->carLineRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CAR_LINE_MODULE_SCREEN_NAME, $request, $carLine));

        return $response
            ->setPreviousUrl(route('car-line.index'))
            ->setNextUrl(route('car-line.edit', $carLine->id))
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
        $carLine = $this->carLineRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $carLine));

        page_title()->setTitle(trans('plugins/car::car-line.edit') . ' "' . $carLine->name . '"');

        return $formBuilder->create(CarLineForm::class, ['model' => $carLine])->renderForm();
    }

    /**
     * @param int $id
     * @param CarLineRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CarLineRequest $request, BaseHttpResponse $response)
    {
        $carLine = $this->carLineRepository->findOrFail($id);

        $carLine->fill($request->input());

        $carLine = $this->carLineRepository->createOrUpdate($carLine);

        event(new UpdatedContentEvent(CAR_LINE_MODULE_SCREEN_NAME, $request, $carLine));

        return $response
            ->setPreviousUrl(route('car-line.index'))
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
            $carLine = $this->carLineRepository->findOrFail($id);

            $this->carLineRepository->delete($carLine);

            event(new DeletedContentEvent(CAR_LINE_MODULE_SCREEN_NAME, $request, $carLine));

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
            $carLine = $this->carLineRepository->findOrFail($id);
            $this->carLineRepository->delete($carLine);
            event(new DeletedContentEvent(CAR_LINE_MODULE_SCREEN_NAME, $request, $carLine));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
