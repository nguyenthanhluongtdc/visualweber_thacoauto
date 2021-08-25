<?php

namespace Platform\Distributionsystem\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Distributionsystem\Http\Requests\DistributionsystemRequest;
use Platform\Distributionsystem\Repositories\Interfaces\DistributionsystemInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Distributionsystem\Tables\DistributionsystemTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Distributionsystem\Forms\DistributionsystemForm;
use Platform\Base\Forms\FormBuilder;

class DistributionsystemController extends BaseController
{
    /**
     * @var DistributionsystemInterface
     */
    protected $distributionsystemRepository;

    /**
     * @param DistributionsystemInterface $distributionsystemRepository
     */
    public function __construct(DistributionsystemInterface $distributionsystemRepository)
    {
        $this->distributionsystemRepository = $distributionsystemRepository;
    }

    /**
     * @param DistributionsystemTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(DistributionsystemTable $table)
    {
        page_title()->setTitle(trans('plugins/distributionsystem::distributionsystem.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/distributionsystem::distributionsystem.create'));

        return $formBuilder->create(DistributionsystemForm::class)->renderForm();
    }

    /**
     * @param DistributionsystemRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(DistributionsystemRequest $request, BaseHttpResponse $response)
    {
        $distributionsystem = $this->distributionsystemRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(DISTRIBUTIONSYSTEM_MODULE_SCREEN_NAME, $request, $distributionsystem));

        return $response
            ->setPreviousUrl(route('distributionsystem.index'))
            ->setNextUrl(route('distributionsystem.edit', $distributionsystem->id))
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
        $distributionsystem = $this->distributionsystemRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $distributionsystem));

        page_title()->setTitle(trans('plugins/distributionsystem::distributionsystem.edit') . ' "' . $distributionsystem->name . '"');

        return $formBuilder->create(DistributionsystemForm::class, ['model' => $distributionsystem])->renderForm();
    }

    /**
     * @param int $id
     * @param DistributionsystemRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, DistributionsystemRequest $request, BaseHttpResponse $response)
    {
        $distributionsystem = $this->distributionsystemRepository->findOrFail($id);

        $distributionsystem->fill($request->input());

        $distributionsystem = $this->distributionsystemRepository->createOrUpdate($distributionsystem);

        event(new UpdatedContentEvent(DISTRIBUTIONSYSTEM_MODULE_SCREEN_NAME, $request, $distributionsystem));

        return $response
            ->setPreviousUrl(route('distributionsystem.index'))
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
            $distributionsystem = $this->distributionsystemRepository->findOrFail($id);

            $this->distributionsystemRepository->delete($distributionsystem);

            event(new DeletedContentEvent(DISTRIBUTIONSYSTEM_MODULE_SCREEN_NAME, $request, $distributionsystem));

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
            $distributionsystem = $this->distributionsystemRepository->findOrFail($id);
            $this->distributionsystemRepository->delete($distributionsystem);
            event(new DeletedContentEvent(DISTRIBUTIONSYSTEM_MODULE_SCREEN_NAME, $request, $distributionsystem));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
