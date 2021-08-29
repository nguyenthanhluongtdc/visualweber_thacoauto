<?php

namespace Platform\Manufacturing\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Manufacturing\Http\Requests\ManufacturingRequest;
use Platform\Manufacturing\Repositories\Interfaces\ManufacturingInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Manufacturing\Tables\ManufacturingTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Manufacturing\Forms\ManufacturingForm;
use Platform\Base\Forms\FormBuilder;

class ManufacturingController extends BaseController
{
    /**
     * @var ManufacturingInterface
     */
    protected $manufacturingRepository;

    /**
     * @param ManufacturingInterface $manufacturingRepository
     */
    public function __construct(ManufacturingInterface $manufacturingRepository)
    {
        $this->manufacturingRepository = $manufacturingRepository;
    }

    /**
     * @param ManufacturingTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(ManufacturingTable $table)
    {
        page_title()->setTitle(trans('plugins/manufacturing::manufacturing.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/manufacturing::manufacturing.create'));

        return $formBuilder->create(ManufacturingForm::class)->renderForm();
    }

    /**
     * @param ManufacturingRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ManufacturingRequest $request, BaseHttpResponse $response)
    {
        $manufacturing = $this->manufacturingRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MANUFACTURING_MODULE_SCREEN_NAME, $request, $manufacturing));

        return $response
            ->setPreviousUrl(route('manufacturing.index'))
            ->setNextUrl(route('manufacturing.edit', $manufacturing->id))
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
        $manufacturing = $this->manufacturingRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $manufacturing));

        page_title()->setTitle(trans('plugins/manufacturing::manufacturing.edit') . ' "' . $manufacturing->name . '"');

        return $formBuilder->create(ManufacturingForm::class, ['model' => $manufacturing])->renderForm();
    }

    /**
     * @param int $id
     * @param ManufacturingRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ManufacturingRequest $request, BaseHttpResponse $response)
    {
        $manufacturing = $this->manufacturingRepository->findOrFail($id);

        $manufacturing->fill($request->input());

        $manufacturing = $this->manufacturingRepository->createOrUpdate($manufacturing);

        event(new UpdatedContentEvent(MANUFACTURING_MODULE_SCREEN_NAME, $request, $manufacturing));

        return $response
            ->setPreviousUrl(route('manufacturing.index'))
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
            $manufacturing = $this->manufacturingRepository->findOrFail($id);

            $this->manufacturingRepository->delete($manufacturing);

            event(new DeletedContentEvent(MANUFACTURING_MODULE_SCREEN_NAME, $request, $manufacturing));

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
            $manufacturing = $this->manufacturingRepository->findOrFail($id);
            $this->manufacturingRepository->delete($manufacturing);
            event(new DeletedContentEvent(MANUFACTURING_MODULE_SCREEN_NAME, $request, $manufacturing));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
